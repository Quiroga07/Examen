# Modular Monolith MVC Architecture (`specs/architecture/mvc-current.md`)

## 1. Document Overview
This document specifies the initial target architecture for ABC Software Corp.'s enterprise software modernization: a **Modular Monolith** organized under the **Model-View-Controller (MVC)** design pattern.

In accordance with assessment directives:
- The system is architected as a cohesive single-process application, avoiding microservices complexity in this initial phase (`NFR-001`).
- Clear boundaries isolate distinct business modules to facilitate future evolution toward Hexagonal Architecture (`NFR-002`).
- All architectural elements link directly to governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `AC-xxx`).
- The **Transport Module (GRE)** is explicitly marked as **Conditional / Pending Confirmation** in accordance with case boundaries.

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
|  | - WarehouseController   - BillingController   - DemoController                               |  |
|  | - MigrationController   - TransportController (Conditional)                                  |  |
|  | * Enforces input validation against DTOs, handles UI orchestration, triggers Domain Services |  |
|  +----------------------------------------------------------------------------------------------+  |
+---------------------------------------------------|------------------------------------------------+
                                                    | (Invokes Service Interfaces)
+---------------------------------------------------v------------------------------------------------+
|                                        MODEL LAYER                                                 |
|                                                                                                    |
|  +----------------------------------------------------------------------------------------------+  |
|  | APPLICATION SERVICES                                                                         |  |
|  | - WarehouseService     - BillingService      - TaxCalculationService                         |  |
|  | - XmlGenerationService - MigrationService    - TransportService (Conditional)                |  |
|  +----------------------------------------------------------------------------------------------+  |
|                                                    |                                               |
|  +-------------------------------------------------v--------------------------------------------+  |
|  | DOMAIN MODEL & INVARIANTS                                                                    |  |
|  | - Product, Movement, ElectronicDocument, TaxBreakdown, RucNumber, DemoSandboxSession         |  |
|  | * Encapsulates core business invariants (INV-001 to INV-008), zero UI/DB dependencies        |  |
|  +----------------------------------------------------------------------------------------------+  |
|                                                    |                                               |
|  +-------------------------------------------------v--------------------------------------------+  |
|  | DATA ACCESS & REPOSITORY ABSTRACTIONS                                                        |  |
|  | - IProductRepository    - IMovementRepository  - IInvoiceRepository                         |  |
|  | - ILegacyExtractionCursor                      - ISunatDeliveryGateway                      |  |
|  +----------------------------------------------------------------------------------------------+  |
+---------------------------------------------------|------------------------------------------------+
                                                    | (Persistence & I/O)
+---------------------------------------------------v------------------------------------------------+
|                                     INFRASTRUCTURE & STORAGE                                       |
|                                                                                                    |
|  [Modern Relational RDBMS]       [Legacy VFP 9 (Read-Only)]       [SUNAT / PSE Gateway / Simulator] |
+----------------------------------------------------------------------------------------------------+
```

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
  - `BillingController`: Coordinates customer RUC validation (`FR-007`, `UC-003`), invoice drafting (`FR-006`, `UC-004`), and tax calculation previews.
  - `DocumentTransmissionController`: Triggers digital signing (`FR-009`, `UC-005`), transmission to SUNAT/PSE/OSE (`FR-010`, `UC-006`), and CDR status inspection.
  - `DemoSandboxController`: Manages isolated testing sessions for the DEMO user (`FR-014`, `UC-007`).
  - `MigrationController`: Provides administrative UI for triggering read-only legacy extraction and viewing reconciliation reports (`FR-015`, `FR-016`, `UC-008`).
  - `TransportController` *(Conditional)*: Coordinates Electronic Remission Guide generation, XSD validation, and vehicle departure clearance (`FR-018` - `FR-020`, `UC-009`).

### 2.3 Model Layer
The Model layer is partitioned into three distinct sub-layers to enforce separation of concerns:
1. **Application Services**:
   - Orchestrates domain business flows, manages transactions, and coordinates infrastructure gateways.
   - Examples: `WarehouseService`, `BillingService`, `TaxCalculationService`, `UblXmlService`, `MigrationPipelineService`.
2. **Domain Model & Invariants**:
   - Pure domain entities, value objects, and business invariants as defined in [specs/domain/domain-model.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md).
   - Independent of frameworks, databases, and UI components (`NFR-002`).
3. **Data Access & Repository Abstractions**:
   - Interface contracts for data persistence (`IProductRepository`, `IMovementRepository`, `IInvoiceRepository`, `ILegacyExtractionCursor`).

---

## 3. Modular Boundaries (Cohesive Monolith)

To prevent the monolithic codebase from becoming a tangled "Big Ball of Mud", the application is organized into explicit, self-contained functional modules:

```
src/ or App/
├── Modules/
│   ├── WarehouseModule/          # FR-001 to FR-005: Products, movements, stock balance
│   ├── BillingModule/            # FR-006, FR-007, FR-012: Sales, customers, RUC validation
│   ├── TaxComplianceModule/      # FR-008 to FR-011: Tax math, UBL XML, digital signature, SUNAT
│   ├── MigrationModule/          # FR-015 to FR-017: VFP read-only extract, staging, reconciliation
│   ├── DemoSandboxModule/        # FR-014: Isolation context, mock CDR simulator
│   └── TransportModule/          # FR-018 to FR-020: GRE, vehicles, XSD schema validator (CONDITIONAL)
└── SharedKernel/                 # Money, Common Enums, Result/Error models, Audit logger
```

### Module Boundary Rules:
1. **No Circular Module Dependencies**: The `WarehouseModule` must not depend directly on the `BillingModule`. The `BillingModule` coordinates with warehouse services via documented interfaces.
2. **Isolated Database Persistence**: Each module defines its own entity configurations and repositories.
3. **Cross-Module Communication via Contracts**: Modules communicate in-process using DTOs defined in [specs/domain/dtos-and-schemas.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md).

---

## 4. Cross-Cutting Concerns

### 4.1 Authentication and Role-Based Access Control
- **Traces to**: `FR-013`, `FR-014`, `AC-012`, `AC-013`
- **Specification**: In-process authorization filters on MVC controllers enforce role-based execution:
  - `WarehouseOperator`: Restricted to `WarehouseController` actions.
  - `BillingClerk`: Accesses `BillingController` and `DocumentTransmissionController`.
  - `DemoUser`: Automatically intercepts data access, switching connection strings to the isolated sandbox store.

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
| Transport Module Isolation | Modularity, Conditional Scope | `FR-018`, `ADR-006` | GRE module can be decoupled without breaking billing core |
