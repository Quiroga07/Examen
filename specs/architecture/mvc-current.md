# Modular Monolith MVC Architecture (`specs/architecture/mvc-current.md`)

## 1. Document Overview
This document specifies the initial target architecture for ABC Software Corp.'s enterprise software modernization: a **Modular Monolith** organized under the **Model-View-Controller (MVC)** design pattern.

For Partial Exam 2, the selected implementation stack is PHP with Laravel and Docker; exact versions are intentionally unspecified. In accordance with assessment directives:
- The system is architected as a cohesive single-process application, avoiding microservices complexity in this initial phase (`NFR-001`).
- Clear boundaries isolate distinct business modules to facilitate future evolution toward Hexagonal Architecture (`NFR-002`).
- All architectural elements link directly to governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `AC-xxx`).
- GRE, DispatchAdvice, transport, and sandbox behavior are deferred and out of the assessed scope. No active module, controller, or service is specified for them.

---

## 2. Layered Responsibilities

```
+----------------------------------------------------------------------------------------------------+
|                                    PRESENTATION LAYER (V & C)                                      |
|                                                                                                    |
|  [Windows Desktop Views (MSI)]                 [Android Mobile Views (APK)]                        |
|                 \                                          /                                       |
|                  v                                        v                                        |
|  +----------------------------------------------------------------------------------------------+  |
|  | CONTROLLERS                                                                                  |  |
|  | - WarehouseController   - BillingController   - CatalogController   - DocumentTransmissionController |  |
|  | - MigrationController                                                                       |  |
|  | * Enforces input validation against DTOs, handles UI orchestration, triggers Domain Services |  |
|  +----------------------------------------------------------------------------------------------+  |
+---------------------------------------------------|------------------------------------------------+
                                                    | (Invokes Service Interfaces)
+---------------------------------------------------v------------------------------------------------+
|                                        MODEL LAYER                                                 |
|                                                                                                    |
|  +----------------------------------------------------------------------------------------------+  |
|  | APPLICATION SERVICES                                                                         |  |
|  | - WarehouseService     - BillingService      - CatalogQueryService      - TaxCalculationService |  |
|  | - GenerateInvoiceXmlUseCase (FR-009, AC-009) - MigrationService (FR-015–FR-017)               |  |
|  +----------------------------------------------------------------------------------------------+  |
|                                                    |                                               |
|  +-------------------------------------------------v--------------------------------------------+  |
|  | DOMAIN MODEL & INVARIANTS                                                                    |  |
|  | - Product, Movement, ElectronicDocument, TaxBreakdown, RucNumber                            |  |
|  | * Encapsulates assessed business invariants; zero UI/DB dependencies (NFR-002)              |  |
|  +----------------------------------------------------------------------------------------------+  |
|                                                    |                                               |
|  +-------------------------------------------------v--------------------------------------------+  |
|  | DATA ACCESS & REPOSITORY ABSTRACTIONS                                                        |  |
|  | - IProductRepository    - IMovementRepository  - IInvoiceRepository                         |  |
|  | - ICatalogRepository    - ILegacyExtractionCursor  - ISunatDeliveryPort                       |  |
|  | - IUblGeneratorPort (FR-009, NFR-010)                                                        |  |
|  +----------------------------------------------------------------------------------------------+  |
+---------------------------------------------------|------------------------------------------------+
                                                    | (Persistence & I/O)
+---------------------------------------------------v------------------------------------------------+
|                                     INFRASTRUCTURE & STORAGE                                       |
|                                                                                                    |
|  [Repository / Delivery Adapters] [UblInvoiceXmlAdapter + XSD-generated types] [RDBMS / SUNAT] |
+----------------------------------------------------------------------------------------------------+
```

`GenerateInvoiceXmlUseCase` depends on `IUblGeneratorPort`; `UblInvoiceXmlAdapter` implements the port in infrastructure and uses classes generated from the official OASIS UBL 2.1 Invoice XSD to serialize the invoice. The MVC controller invokes the use case, not the XML library or generated classes. A compatible PHP code-generation/serialization tool must be confirmed before implementation; the adapter remains replaceable behind the port (`FR-009`, `AC-009`, `NFR-002`, `NFR-010`; [ADR-007](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md#adr-007-ubl-invoice-xml-generation-behind-an-output-port)).

### 2.1 View Layer (Presentation)
- **Role**: Renders visual interfaces, handles user gestures/inputs, and displays validated data models.
- **Components**:
  - **Windows Desktop Views**: Designed for office desktop displays (billing desks, accounting, warehouse dispatch offices), distributed via Windows MSI installer (`NFR-004`, `AC-017`).
  - **Android Mobile Views**: Responsive, touch-optimized views suitable for warehouse receiving and yard dispatch operations, distributed via Android APK (`NFR-005`, `AC-018`).
- **Constraint**: Views contain zero business logic and zero direct database queries; they interact exclusively with Controller ViewModels and DTOs.

### 2.2 Controller Layer
- **Role**: Coordinates user interactions, binds and validates incoming HTTP/action payloads against formal DTO schemas (`specs/domain/dtos-and-schemas.md`), coordinates application services, and returns populated view models.
- **Key Controllers**:
  - `WarehouseController`: Handles inbound receipts (`FR-003`, `UC-001`), outbound dispatches (`FR-004`, `UC-002`), and stock balance views.
  - `BillingController`: Coordinates customer RUC validation (`FR-007`, `UC-003`), invoice drafting (`FR-006`, `UC-004`), and credit/debit note requests (`FR-021`, `UC-011`) through the application service.
  - `CatalogController`: Serves read-only SUNAT catalog queries (`FR-023`, `UC-013`) through `CatalogQueryService` and the catalog repository abstraction.
  - `DocumentTransmissionController`: Coordinates UBL Invoice XML generation (`FR-009`, `UC-005`), signing, transmission to the selected SUNAT/PSE/OSE pathway (`FR-010`, `UC-006`), baja requests (`FR-022`, `UC-012`), and CDR status inspection. XML generation is invoked through `GenerateInvoiceXmlUseCase` and `IUblGeneratorPort`; the implementation is in infrastructure.
  - `MigrationController`: Provides administrative UI for triggering read-only legacy extraction and viewing reconciliation reports (`FR-015`, `FR-016`, `UC-008`).

### 2.3 Model Layer
The Model layer is partitioned into three distinct sub-layers to enforce separation of concerns:
1. **Application Services**:
   - Orchestrates domain business flows and transactions. Invoice XML generation is a use case that calls the `IUblGeneratorPort` abstraction (`FR-009`, `AC-009`, `NFR-010`).
   - Examples: `WarehouseService`, `BillingService` (including note issuance), `CatalogQueryService`, `TaxCalculationService`, `GenerateInvoiceXmlUseCase`, and `MigrationPipelineService`.
2. **Domain Model & Invariants**:
   - Pure domain entities, value objects, and business invariants as defined in [specs/domain/domain-model.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md).
   - Independent of frameworks, databases, and UI components (`NFR-002`).
3. **Application Output Ports and Data Access Abstractions**:
   - Interface contracts for persistence and external capabilities (`IProductRepository`, `IMovementRepository`, `IInvoiceRepository`, `ICatalogRepository`, `ILegacyExtractionCursor`, `ISunatDeliveryPort`, `IUblGeneratorPort`). Baja uses the delivery boundary; catalog lookup uses a read-only repository without implying an external SUNAT URL. The MVC application service depends on `IUblGeneratorPort`, not its infrastructure implementation (`NFR-002`).
   - The infrastructure `UblInvoiceXmlAdapter` implements the output port and encapsulates the selected PHP-compatible generation/serialization tool and its XSD-generated UBL 2.1 classes. Tool compatibility remains to be confirmed (`ADR-007`).

---

## 3. Modular Boundaries (Cohesive Monolith)

To prevent the monolithic codebase from becoming a tangled "Big Ball of Mud", the application is organized into explicit, self-contained functional modules:

```
src/ or App/
├── Modules/
│   ├── WarehouseModule/          # FR-001 to FR-005: Products, movements, stock balance
│   ├── BillingModule/            # FR-006–FR-012, FR-021–FR-022: Sales, notes, RUC, lifecycle and baja
│   ├── CatalogModule/            # FR-011, FR-023: Read-only SUNAT catalog queries
│   ├── TaxComplianceModule/      # FR-008 to FR-012: Tax math, UBL XML, signing, SUNAT lifecycle
│   └── MigrationModule/          # FR-015 to FR-017: VFP read-only extract, staging, reconciliation
└── SharedKernel/                 # Money, Common Enums, Result/Error models, Audit logger
```

### Module Boundary Rules:
1. **No Circular Module Dependencies**: The `WarehouseModule` must not depend directly on the `BillingModule`. The `BillingModule` coordinates with warehouse services via documented interfaces.
2. **Isolated Database Persistence**: Each module defines its own entity configurations and repositories.
3. **Cross-Module Communication via Contracts**: Modules communicate in-process using DTOs defined in [specs/domain/dtos-and-schemas.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md).

---

## 4. Cross-Cutting Concerns

### 4.1 Authentication and Role-Based Access Control
- **Traces to**: `FR-013`, `AC-012`
- **Specification**: In-process authorization filters on MVC controllers enforce role-based execution:
  - `WarehouseOperator`: Restricted to `WarehouseController` actions.
  - `BillingClerk`: Accesses `BillingController` and `DocumentTransmissionController`.

### 4.2 Immutable Audit Trail
- **Traces to**: `NFR-012`, `FR-010`
- **Specification**: An audit logging interceptor captures every state transition of electronic invoices (Draft -> Signed -> Sent -> Accepted/Rejected) with UTC timestamps, user IDs, and payload hashes.

### 4.3 Standardized Error Handling
- **Traces to**: `NFR-001`, `NFR-003`
- **Specification**: Global exception handlers catch domain invariant violations (e.g., `INV-004` invalid RUC or `INV-005` tax balance mismatch) and serialize them into standard `ErrorResponseDto` payloads without exposing internal stack traces.

---

## 5. Architectural Quality Attributes Traceability

| Component / Layer | Quality Attribute | Governing Requirement | Verifiable Criterion |
|---|---|---|---|
| Modular Monolith Structure | Modularity, Low Complexity | `NFR-001`, `ADR-001` | Zero circular dependencies across module packages |
| Domain Isolation from UI | Maintainability, Evolvability | `NFR-002`, `ADR-002` | Domain models have 0 imports of web/controller packages |
| Windows MSI Packaging | Desktop Portability | `NFR-004`, `AC-017` | Generates verified Windows `.msi` installation package |
| Android APK Packaging | Mobile Portability | `NFR-005`, `AC-018` | Generates verified Android `.apk` package |
| Read-Only Legacy Extraction | Data Safety | `NFR-007`, `AC-014` | Legacy files maintain identical SHA-256 hashes |
| UBL XML Generation Boundary | Replaceability, Testability | `FR-009`, `AC-009`, `NFR-002`, `NFR-010`, `ADR-007` | Use case depends on `IUblGeneratorPort`; only the infrastructure adapter depends on the selected UBL generation tool |
