# Architecture Decision Records (`specs/architecture/architecture-decisions.md`)

## 1. Document Overview
This document records the fundamental Architectural Decision Records (ADRs) governing the enterprise software modernization of ABC Software Corp. Each record outlines the architectural context, decision drivers, chosen pattern, positive and negative consequences, requirement traceability (`FR-xxx`, `NFR-xxx`, `AC-xxx`), and links to unresolved questions in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. ADR Summary Index

| ADR ID | Decision Title | Status | Primary Driver |
|---|---|---|---|
| `ADR-001` | Modular Monolith using Model-View-Controller (MVC) Pattern | **Accepted** | `NFR-001`, Assessment Mandate |
| `ADR-002` | Domain Decoupling for Future Hexagonal / Clean Architecture Evolution | **Accepted** | `NFR-002`, `NFR-003`, Assessment Mandate |
| `ADR-003` | Dual Client Distribution via Windows MSI and Android APK | **Accepted** (Tech Pending) | `NFR-004`, `NFR-005`, [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) |
| `ADR-004` | Non-Destructive, Read-Only Legacy Extraction and Staging Pipeline | **Accepted** | `NFR-007`, `NFR-008`, `FR-015`, `AC-014` |
| `ADR-005` | Multi-Environment Sandbox Isolation for DEMO User | **Accepted** | `FR-014`, `NFR-011`, `AC-013` |
| `ADR-006` | Pluggable, Conditional Isolation for Electronic Remission Guide (GRE) | **Proposed / Conditional** | `FR-018` - `FR-020`, [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) |

---

## 3. Architectural Decision Records

### `ADR-001`: Adopt a Modular Monolith with MVC Pattern for Initial Release
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-001`, `FR-001` through `FR-017`, `AC-016`
- **Context**:
  ABC Software Corp. is modernizing from a legacy Visual FoxPro 9 system. The immediate business necessity is tax compliance, reliable inventory tracking, and electronic document generation. The assessment explicitly requires an initial architecture based on a clean or modular monolith using the Model-View-Controller (MVC) pattern.
- **Decision**:
  The system will be architected as a single deployable **Modular Monolith** organized into distinct, cohesive internal modules (`WarehouseModule`, `BillingModule`, `TaxComplianceModule`, `MigrationModule`, and `DemoSandboxModule`). The presentation tier will strictly implement the **Model-View-Controller (MVC)** architectural pattern.
- **Consequences**:
  - *Positive*: Minimal operational overhead; avoids distributed transaction complexities; enforces strong compile-time modular boundaries; enables straightforward local debugging and unified packaging.
  - *Negative*: Shared in-process memory requires disciplined module interface adherence to avoid tight coupling.
- **Related Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) (Specific programming language and MVC framework).

---

### `ADR-002`: Decouple Domain Logic for Evolution toward Hexagonal / Clean Architecture
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-002`, `NFR-003`, `AC-016`
- **Context**:
  The assessment mandates that the initial modular monolith must be prepared to evolve toward Hexagonal Architecture (Ports and Adapters) or Clean Architecture and, in the future, support REST services and horizontal scaling without requiring a complete rewrite.
- **Decision**:
  All core domain models, aggregates, business invariants, and calculation algorithms will be implemented in a pure, framework-agnostic domain layer. Controllers and views in the MVC structure will interact with business logic strictly through application service interfaces (driving ports). All external interactions (database access, SUNAT web services, legacy file reading) will be accessed through repository and gateway interfaces (driven ports).
- **Consequences**:
  - *Positive*: Domain logic remains 100% testable in isolation; transitioning controllers to future REST APIs or transitioning data access from local repositories to remote adapters requires zero alterations to business rules.
  - *Negative*: Introduces interface abstraction layers and DTO translation overhead between presentation, application, and persistence boundaries.
- **Related Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-08](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-003`: Dual Client Distribution via Windows MSI and Android APK
- **Status**: Accepted (Packaging Targets Mandated; Client Technology Pending)
- **Traces to**: `NFR-004`, `NFR-005`, `AC-017`, `AC-018`, [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-15](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints)
- **Context**:
  The assessment specifies distribution targets including a Windows desktop environment distributed via an **MSI installer** and an Android mobile environment distributed via an **APK package**. The concrete client-server communication topology and front-end technologies are not stated.
- **Decision**:
  1. The system architecture will support dual distribution targets: a Windows desktop MSI package and an Android APK package.
  2. To avoid speculative implementation, the architecture defines contract-driven DTO boundaries (`specs/domain/dtos-and-schemas.md`) allowing the clients to communicate with the modular monolith via server-rendered views or future API endpoints.
  3. The specific client implementation technology (e.g., native C#/WPF vs. MAUI vs. Web wrapper) is formally maintained as an open decision pending evaluation committee guidance.
- **Consequences**:
  - *Positive*: Satisfies deployment requirements while insulating core domain specifications from client framework churn.
  - *Negative*: Requires designing mobile-responsive view models and contracts suitable for both desktop screen real estate and mobile handheld devices.
- **Related Open Questions**: [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-15](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-004`: Non-Destructive, Read-Only Legacy Extraction and Staging Pipeline
- **Status**: Accepted
- **Traces to**: `FR-015`, `FR-016`, `NFR-007`, `NFR-008`, `AC-014`, `AC-015`
- **Context**:
  The assessment mandates that the existing Visual FoxPro 9 database must not be damaged, altered, or deleted under any circumstance. Historical data must be preserved with 100% mathematical reconciliation.
- **Decision**:
  The migration architecture will employ an isolated extraction worker operating strictly with read-only file streams. Legacy data is extracted into an intermediate staging schema (`LegacyRawRecordEnvelopeDto`) and validated before loading into modern domain entities. Cryptographic SHA-256 hashes of all source files will be checked before and after extraction to certify immutability.
- **Consequences**:
  - *Positive*: Eliminates risk of legacy file corruption; provides mathematical audit proof of data completeness; separates extraction from domain normalization.
  - *Negative*: Requires intermediate storage capacity for the raw staging envelopes.
- **Related Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-16](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

### `ADR-005`: Multi-Environment Sandbox Isolation for DEMO User
- **Status**: Accepted
- **Traces to**: `FR-014`, `NFR-011`, `UC-007`, `AC-013`
- **Context**:
  The assessment explicitly requests use cases based on the needs of electronic invoicing users and mentions a DEMO user. The DEMO user must be able to explore workflows without creating legal tax liabilities or polluting production data.
- **Decision**:
  When a session is authenticated under the `DEMO_USER` profile, the application activates the `DemoSandboxModule`. All data mutations are redirected to an isolated sandbox database (or in-memory mock store). All external calls to SUNAT or PSE/OSE endpoints are intercepted and resolved by a local simulator returning mock CDR responses.
- **Consequences**:
  - *Positive*: Guaranteed safety during academic evaluation and user training; prevents fraudulent or erroneous tax emissions.
  - *Negative*: Requires maintaining a seed dataset and mock simulation responses.
- **Related Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### `ADR-006`: Pluggable, Conditional Isolation for Electronic Remission Guide (GRE)
- **Status**: Proposed / Conditional
- **Traces to**: `FR-018`, `FR-019`, `FR-020`, `UC-009`, `UC-010`, `AC-019` - `AC-021`, [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)
- **Context**:
  The delegate's supplementary narrative introduces merchandise transport dispatches, mandatory GRE generation, UBL Dispatch Advice, and XSD validation. The prompt explicitly cautions not to assume this represents the entire system.
- **Decision**:
  All GRE-specific domain models, use cases, and XSD validation services will be encapsulated within an isolated `TransportModule`. This module interacts with the core warehouse via event/service interfaces, ensuring that if GRE is confirmed as part of the evaluated core scope, it is fully functional; if excluded, it can be decoupled without modifying the core warehouse or billing engines.
- **Consequences**:
  - *Positive*: Preserves modularity; protects core assessment deliverables from dependency on supplementary scenarios.
  - *Negative*: Requires loose coupling between sales orders and transport dispatch entities.
- **Related Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).
