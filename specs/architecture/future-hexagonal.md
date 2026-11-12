# Future Hexagonal Architecture Vision (`specs/architecture/future-hexagonal.md`)

## 1. Document Overview
This document specifies the evolutionary roadmap for transitioning ABC Software Corp.'s modular monolith MVC architecture toward **Hexagonal Architecture (Ports and Adapters)** or **Clean Architecture**.

For Partial Exam 2, the selected implementation stack is PHP with Laravel and Docker. Exact versions are unspecified; this stack decision does not change MVC as the initial architecture.

In strict adherence to the assessment directives:
- **No microservices are built now**: The application remains a cohesive, single-process deployment (`NFR-001`).
- The transition focuses on **architectural decoupling** to protect core business logic from framework and infrastructure volatility (`NFR-002`).
- The design prepares the system for future **REST services** and **horizontal scaling** without requiring domain rewrites (`NFR-003`).
- All ports, adapters, and evolutionary steps are linked directly to governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `AC-xxx`).
- GRE, DispatchAdvice, transport, and sandbox behavior are deferred and out of the assessed scope; they are not modeled as active ports, adapters, or modules.

---

## 2. Hexagonal Architectural Model (Ports & Adapters)

```
+-------------------------------------------------------------------------------------------------------------+
|                                         FUTURE HEXAGONAL ARCHITECTURE                                      |
|                                                                                                             |
| DRIVING ADAPTERS                     APPLICATION CORE                         DRIVEN ADAPTERS              |
|                                                                                                             |
| +----------------------+    +---------------------------+    +-----------------------------+               |
| | MVC Controllers       |--->| Inbound Use-Case Ports    |    | Repository Ports            |               |
| | (initial interface)   |    | IRecordInboundPort       |    | IProductRepositoryPort      |---> RDBMS    |
| +----------------------+    | IRecordOutboundPort      |    | IMovementRepositoryPort     |               |
|                             | IIssueInvoicePort         |    | IInvoiceRepositoryPort     |               |
| +----------------------+    | IValidateRucPort          |    +-----------------------------+               |
| | Future REST Adapter  |--->|                           |                                                   |
| +----------------------+    | Use Cases + Domain        |----> IUblGeneratorPort -----> UblInvoiceXmlAdapter |
|                             | IssueInvoiceUseCase       |                         (FR-009, NFR-010)       |
| +----------------------+    | GenerateInvoiceXmlUseCase |                         /            |           |
| | Future client        |--->|                           |                UBL 2.1 XSD-generated classes    |
| | adapters             |    +---------------------------+                + official-schema serialization |
| +----------------------+                 |                               (PHP tool to confirm)             |
|                                          +----> ISunatDeliveryPort -----> SUNAT/PSE delivery adapters     |
|                                          +----> ILegacyExtractionPort --> VFP read-only adapter           |
|                                                                                                             |
+-------------------------------------------------------------------------------------------------------------+
```

This compact overview highlights the XML-generation boundary rather than enumerating every capability. The full capability-level view, including note, baja, and catalog ports/use cases, is maintained in [`diagrams/future-hexagonal.mmd`](../../diagrams/future-hexagonal.mmd).

The XML boundary is the same as in the initial MVC design: `GenerateInvoiceXmlUseCase` depends on the outbound `IUblGeneratorPort`; infrastructure supplies the replaceable `UblInvoiceXmlAdapter`. The scoped adapter serializes unsigned UBL Invoice 2.1 using classes and metadata generated from the official OASIS Invoice XSD and retained under `tools/ubl-xsd-poc/`; the xsd2php CLI remains isolated from root runtime dependencies. The approved internal mapping conventions and limits are recorded in [ADR-007](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md#adr-007-ubl-invoice-xml-generation-behind-an-output-port). Production data sources and SUNAT-profile requirements remain open (`FR-009`, `AC-009`, `NFR-002`, `NFR-010`).

The instructor-added API capabilities use the same staged boundary: `BillingController` delegates note issuance (`FR-021`/`UC-011`), `DocumentTransmissionController` delegates baja (`FR-022`/`UC-012`) through `ISunatDeliveryPort`, and `CatalogController` delegates read-only catalog lookup (`FR-023`/`UC-013`) through `ICatalogRepositoryPort`. No new provider URL or catalog-refresh protocol is implied.

---

## 3. Component Breakdown

### 3.1 The Hexagonal Core (Domain & Application Use Cases)
- **Nature**: Independent of any presentation technology, database engine, or external network protocol (`NFR-002`).
- **Contents**:
  - **Domain Entities & Value Objects**: `Product`, `WarehouseMovement`, `ElectronicDocument`, `TaxBreakdown`, `RucNumber`, `Money` ([specs/domain/domain-model.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md)).
  - **Domain Invariants**: Modulo 11 check digit verification (`INV-004`), arbitrary-precision tax balance rules (`INV-005`), and stock decrement rules (`INV-003`).
  - **Use Case Interactors**: Classes implementing assessed operational use cases (`RecordInboundUseCase`, `IssueInvoiceUseCase`, `IssueCreditDebitNoteUseCase`, `RequestBajaUseCase`, `QuerySunatCatalogUseCase`, `GenerateInvoiceXmlUseCase`, `ValidateRucUseCase`, `MigrateLegacyDataUseCase`).

---

### 3.2 Inbound (Driver / Primary) Ports & Adapters
Driver ports expose the application core's capabilities to the outside world; driving adapters translate user or external inputs into port invocations.

#### Inbound Ports (Interfaces):
- `IRecordInboundPort` (`FR-003`, `UC-001`): Accepts `CreateInboundMovementRequestDto`, returns `WarehouseMovementResponseDto`.
- `IRecordOutboundPort` (`FR-004`, `UC-002`): Validates stock availability and records outbound movements.
- `IIssueInvoicePort` (`FR-006`, `FR-008`, `FR-009`, `UC-005`): Computes taxes, verifies RUC, and orchestrates UBL generation.
- `IValidateRucPort` (`FR-007`, `UC-003`): Evaluates RUC structure and Modulo 11 check digits.
- `IExtractLegacyPort` (`FR-015`, `FR-016`, `UC-008`): Launches non-destructive legacy migration pipeline.
- `IIssueCreditDebitNotePort` (`FR-021`, `UC-011`): Accepts the documented note type, original document reference, and shared line DTO; note-specific business rules remain open.
- `IRequestBajaPort` (`FR-022`, `UC-012`): Requests baja for an identified document and exposes the confirmed lifecycle outcome; eligibility/provider details remain open.
- `IQuerySunatCatalogPort` (`FR-023`, `UC-013`): Returns code/description entries for a supported catalog.

#### Driving Adapters:
1. **MVC Controller Adapter (Initial)**:
   - Existing Laravel MVC controllers remain the initial driving adapters; they delegate application behavior to use cases. This is the intended evolution path, not a replacement of the initial MVC architecture.
2. **Windows Desktop MSI Client Adapter**:
   - Desktop view models invoking driver ports via in-process service boundaries or local IPC (`NFR-004`).
3. **Android Mobile APK Adapter**:
   - Mobile activity/fragment handlers binding barcode scans and warehouse touch inputs to driver ports (`NFR-005`).
4. **Future REST API Controller Adapter**:
   - Lightweight HTTP controllers serializing incoming JSON payloads into DTOs and delegating execution to the same driver ports without changing a single line of business logic (`NFR-003`).

---

### 3.3 Outbound (Driven / Secondary) Ports & Adapters
Driven ports represent external services, persistence mechanisms, and third-party tools required by the application core to fulfill its responsibilities.

#### Outbound Ports (Interfaces):
- `IProductRepositoryPort` (`FR-001`): Persistence operations for the product catalog.
- `IMovementRepositoryPort` (`FR-003`, `FR-004`): Appends immutable inventory movements and retrieves stock balances.
- `IInvoiceRepositoryPort` (`FR-008`, `FR-009`, `FR-012`): Persists electronic invoices and updates document lifecycle status.
- `ICatalogRepositoryPort` (`FR-011`, `FR-023`, `UC-013`): Reads catalog entries from the configured application catalog source; no external SUNAT URL or refresh protocol is assumed.
- `ISunatDeliveryPort` (`FR-010`, `FR-022`, `UC-006`, `UC-012`): Transmits signed UBL XML payloads, submits configured baja requests, and retrieves provider outcomes/CDRs.
- `ILegacyExtractionPort` (`FR-015`, `UC-008`): Read-only streaming extractor for legacy Visual FoxPro `.DBF` files.
- `IUblGeneratorPort` (`FR-009`, `AC-009`, `NFR-010`): Generates UBL Invoice 2.1 XML from the application invoice model. The use case depends on this port, never on a generator library or schema-generated classes.

#### Driven Adapters:
1. **RDBMS Persistence Adapter**:
   - Implements `IProductRepositoryPort`, `IMovementRepositoryPort`, and `IInvoiceRepositoryPort` using an enterprise relational database (e.g., PostgreSQL or SQL Server) via an ORM or micro-ORM (`Q-08`).
2. **Legacy VFP Read-Only Extraction Adapter**:
   - Implements `ILegacyExtractionPort` using low-level binary streaming to read Visual FoxPro files in strictly read-only mode, computing SHA-256 hashes before and after (`AC-014`).
3. **SUNAT Delivery Adapters (Pluggable)**:
   - `SunatBetaServiceAdapter`: Connects directly to official SUNAT Beta SOAP/REST web services.
   - `OseProviderAdapter`: Connects to an authorized Electronic Service Provider (PSE/OSE).
   - No local simulator or sandbox adapter is specified; sandbox behavior is deferred and out of assessed scope.
4. **UBL Invoice XML Adapter (Proposed)**:
   - `UblInvoiceXmlAdapter` implements `IUblGeneratorPort` in infrastructure. Proposed approach: use classes generated from the official [OASIS UBL 2.1 Invoice XSD](https://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd) and serialize them to produce the required XML (`FR-009`, `AC-009`, `NFR-010`).
   - Confirm a PHP-compatible XSD code-generation/serialization tool before implementation. Keep the adapter replaceable; the port contract and application use case must not depend on the selected tool or generated classes.

---

## 4. Progressive Migration Strategy (MVC to Hexagonal)

The transition from the current MVC modular monolith toward Hexagonal Architecture is achieved through a **6-step non-breaking evolutionary process**:

```
Step 1: Extract Use Cases from Controllers
        Controllers delegate all business rules to Use Case Interactors implementing Driver Ports.

Step 2: Formalize Driven Ports (Interfaces)
        Convert all direct database access and external calls into Outbound Port interfaces.

Step 3: Implement Dependency Injection (Laravel Service Container)
        Inject driven adapters (repositories, SUNAT delivery, and UBL XML generation) into application interactors.

Step 4: Implement the UBL XML adapter behind IUblGeneratorPort
        Confirm a compatible PHP tool, generate classes from official UBL 2.1 XSD, and keep tool-specific code in infrastructure.

Step 5: Expose Alternative Driving Adapters (REST API)
        Mount future REST controllers alongside existing MVC views, sharing identical Driver Ports.

Step 6: Externalize Session State for Horizontal Scaling
        Eliminate in-memory session persistence, enabling multiple stateless application instances.
```

---

## 5. Horizontal Scalability and REST Services Readiness

In accordance with `NFR-003`:
1. **Stateless Application Core**:
   - Use cases and domain models maintain zero in-process conversational state. User sessions and authentication tokens (e.g., JWT or secure session cookies) are validated per request.
2. **Database Externalization**:
   - Application nodes share a central enterprise RDBMS supporting connection pooling and read-replicas.
3. **Concurrent Scaling**:
   - Because application nodes are stateless, additional backend instances can be provisioned behind a load balancer (horizontal scaling) to absorb high wholesale transaction volumes or month-end billing surges without architectural bottlenecks.
4. **REST API Coexistence**:
   - The modular monolith can serve MVC desktop/mobile views and REST endpoints concurrently, using the same domain core and business invariants.
