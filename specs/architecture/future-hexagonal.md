# Future Hexagonal Architecture Vision (`specs/architecture/future-hexagonal.md`)

## 1. Document Overview
This document specifies the evolutionary roadmap for transitioning ABC Software Corp.'s modular monolith MVC architecture toward **Hexagonal Architecture (Ports and Adapters)** or **Clean Architecture**.

In strict adherence to the assessment directives:
- **No microservices are built now**: The application remains a cohesive, single-process deployment (`NFR-001`).
- The transition focuses on **architectural decoupling** to protect core business logic from framework and infrastructure volatility (`NFR-002`).
- The design prepares the system for future **REST services** and **horizontal scaling** without requiring domain rewrites (`NFR-003`).
- All ports, adapters, and evolutionary steps are linked directly to governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `AC-xxx`).
- Components related to the **Electronic Remission Guide (GRE)** remain explicitly **Conditional**.

---

## 2. Hexagonal Architectural Model (Ports & Adapters)

```
+-------------------------------------------------------------------------------------------------------+
|                                        HEXAGONAL ARCHITECTURE                                         |
|                                                                                                       |
|   DRIVING (PRIMARY) ADAPTERS                                              DRIVEN (SECONDARY) ADAPTERS |
|                                                                                                       |
|  +---------------------------+       +-------------------------+       +---------------------------+  |
|  | MVC Web Controller        |       | Inbound / Driver Ports  |       | Outbound / Driven Ports   |  |
|  +---------------------------+ ----> | - IRecordInboundPort    |       | - IProductRepositoryPort  |  |
|                                      | - IIssueInvoicePort     |       | - IMovementRepositoryPort |  |
|  +---------------------------+ ----> | - IValidateRucPort      |       | - IInvoiceRepositoryPort  | -+-> Modern RDBMS
|  | Windows Desktop Adapter   |       | - IExtractLegacyPort    |       |                           |  |  (PostgreSQL/SQLServer)
|  | (MSI Packaged Client)     |       +-------------------------+       +---------------------------+  |
|  +---------------------------+                    |                                  |                |
|                                                   v                                  v                |
|  +---------------------------+       +-------------------------+       +---------------------------+  |
|  | Android Mobile Adapter    |       |    APPLICATION CORE     |       | ISunatDeliveryPort        | -+-> SUNAT / PSE
|  | (APK Packaged Client)     | ----> |  - Domain Aggregates    | ----> | - DirectBetaAdapter       |  |  (Web Services)
|  +---------------------------+       |  - Value Objects        |       | - OseAdapter              |  |
|                                      |  - Business Invariants  |       | - LocalSimulatorAdapter   |  |
|  +---------------------------+       |  - Use Case Interactors |       +---------------------------+  |
|  | FUTURE REST API Adapter   | ----> +-------------------------+                                      |
|  | (Json/Http Endpoints)     |                                         +---------------------------+  |
|  +---------------------------+                                         | ILegacyExtractionPort     | -+-> Legacy VFP 9
|                                                                        | - VfpReadOnlyStreamAdapter|  |  (Read-Only Files)
|  +---------------------------+       +-------------------------+       +---------------------------+  |
|  | Transport Gate Adapter    | ----> | IDispatchGrePort        | ----> | IXsdValidatorPort         | -+-> Local SUNAT
|  | (Conditional GRE Gate)    |       | (CONDITIONAL)           |       | (CONDITIONAL)             |  |  XSD Schemas
|  +---------------------------+       +-------------------------+       +---------------------------+  |
|                                                                                                       |
+-------------------------------------------------------------------------------------------------------+
```

---

## 3. Component Breakdown

### 3.1 The Hexagonal Core (Domain & Application Use Cases)
- **Nature**: Independent of any presentation technology, database engine, or external network protocol (`NFR-002`).
- **Contents**:
  - **Domain Entities & Value Objects**: `Product`, `WarehouseMovement`, `ElectronicDocument`, `TaxBreakdown`, `RucNumber`, `Money` ([specs/domain/domain-model.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md)).
  - **Domain Invariants**: Modulo 11 check digit verification (`INV-004`), arbitrary-precision tax balance rules (`INV-005`), and stock decrement rules (`INV-003`).
  - **Use Case Interactors**: Classes implementing specific operational use cases (`RecordInboundUseCase`, `IssueInvoiceUseCase`, `ValidateRucUseCase`, `MigrateLegacyDataUseCase`).

---

### 3.2 Inbound (Driver / Primary) Ports & Adapters
Driver ports expose the application core's capabilities to the outside world; driving adapters translate user or external inputs into port invocations.

#### Inbound Ports (Interfaces):
- `IRecordInboundPort` (`FR-003`, `UC-001`): Accepts `CreateInboundMovementRequestDto`, returns `WarehouseMovementResponseDto`.
- `IRecordOutboundPort` (`FR-004`, `UC-002`): Validates stock availability and records outbound movements.
- `IIssueInvoicePort` (`FR-006`, `FR-008`, `FR-009`, `UC-005`): Computes taxes, verifies RUC, and orchestrates UBL generation.
- `IValidateRucPort` (`FR-007`, `UC-003`): Evaluates RUC structure and Modulo 11 check digits.
- `IExtractLegacyPort` (`FR-015`, `FR-016`, `UC-008`): Launches non-destructive legacy migration pipeline.
- `IDispatchGrePort` *(Conditional)* (`FR-018`, `FR-019`, `UC-009`): Generates and validates Electronic Remission Guides.

#### Driving Adapters:
1. **MVC Controller Adapter (Current)**:
   - Existing MVC controllers act as driving adapters, binding HTTP form posts or action invocations to Inbound Ports.
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
- `ISunatDeliveryPort` (`FR-010`, `UC-006`): Transmits signed UBL XML payloads to tax authority endpoints and retrieves CDR responses.
- `ILegacyExtractionPort` (`FR-015`, `UC-008`): Read-only streaming extractor for legacy Visual FoxPro `.DBF` files.
- `IXsdValidatorPort` *(Conditional)* (`FR-020`, `UC-010`): Validates XML payloads against official SUNAT XSD schemas.

#### Driven Adapters:
1. **RDBMS Persistence Adapter**:
   - Implements `IProductRepositoryPort`, `IMovementRepositoryPort`, and `IInvoiceRepositoryPort` using an enterprise relational database (e.g., PostgreSQL or SQL Server) via an ORM or micro-ORM (`Q-08`).
2. **Legacy VFP Read-Only Extraction Adapter**:
   - Implements `ILegacyExtractionPort` using low-level binary streaming to read Visual FoxPro files in strictly read-only mode, computing SHA-256 hashes before and after (`AC-014`).
3. **SUNAT Delivery Adapters (Pluggable)**:
   - `SunatBetaServiceAdapter`: Connects directly to official SUNAT Beta SOAP/REST web services.
   - `OseProviderAdapter`: Connects to an authorized Electronic Service Provider (PSE/OSE).
   - `LocalSimulatorDeliveryAdapter`: Implements `ISunatDeliveryPort` locally to return simulated CDR acceptance/rejection payloads for testing and the DEMO user (`FR-014`, `NFR-011`).
4. **Local XSD Schema Validator Adapter *(Conditional)***:
   - Implements `IXsdValidatorPort` using local XML schema validating parsers against official OASIS/SUNAT XSD files (`AC-021`).

---

## 4. Progressive Migration Strategy (MVC to Hexagonal)

The transition from the current MVC modular monolith to Hexagonal Architecture is achieved through a **5-step non-breaking evolutionary process**:

```
Step 1: Extract Use Cases from Controllers
        Controllers delegate all business rules to Use Case Interactors implementing Driver Ports.

Step 2: Formalize Driven Ports (Interfaces)
        Convert all direct database access and external calls into Outbound Port interfaces.

Step 3: Implement Dependency Injection (IoC Container)
        Inject driven adapters (repositories, SUNAT delivery gateways) into application interactors.

Step 4: Expose Alternative Driving Adapters (REST API)
        Mount future REST controllers alongside existing MVC views, sharing identical Driver Ports.

Step 5: Externalize Session State for Horizontal Scaling
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
