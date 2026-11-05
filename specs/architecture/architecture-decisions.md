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
| `ADR-005` | DEMO Sandbox Isolation | **Deferred / Out of Scope** | Prior supplementary scope; no active behavior |
| `ADR-006` | GRE / Transport Module | **Deferred / Out of Scope** | `FR-018` - `FR-020` retained as deferred identifiers |
| `ADR-007` | UBL Invoice XML Generation Behind an Output Port | **Proposed** | `FR-009`, `AC-009`, `NFR-002`, `NFR-010` |
| `ADR-008` | PHP / Laravel and Docker for Partial Exam 2 | **Selected; Versions Unspecified** | `NFR-001`, `NFR-002` |

---

## 3. Architectural Decision Records

### `ADR-001`: Adopt a Modular Monolith with MVC Pattern for Initial Release
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-001`, `FR-001` through `FR-017`, `AC-016`
- **Context**:
  ABC Software Corp. is modernizing from a legacy Visual FoxPro 9 system. The immediate business necessity is tax compliance, reliable inventory tracking, and electronic document generation. The assessment explicitly requires an initial architecture based on a clean or modular monolith using the Model-View-Controller (MVC) pattern.
- **Decision**:
  The system will be architected as a single deployable **Modular Monolith** organized into cohesive assessed modules (`WarehouseModule`, `BillingModule`, `TaxComplianceModule`, and `MigrationModule`). The initial presentation tier will implement **Model-View-Controller (MVC)**. GRE, transport, and sandbox behavior are deferred and are not active modules. PHP with Laravel and Docker are the selected implementation stack for Partial Exam 2; exact versions are not specified.
- **Consequences**:
  - *Positive*: Minimal operational overhead; avoids distributed transaction complexities; supports clear module boundaries; enables straightforward local debugging and unified packaging.
  - *Negative*: Shared in-process memory requires disciplined module interface adherence to avoid tight coupling.
- **Related Open Questions**: Exact PHP/Laravel/Docker versions, client packaging technology, and deployment topology remain unspecified; see [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) and [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-002`: Decouple Domain Logic for Evolution toward Hexagonal / Clean Architecture
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-002`, `NFR-003`, `AC-016`
- **Context**:
  The assessment mandates that the initial modular monolith must be prepared to evolve toward Hexagonal Architecture (Ports and Adapters) or Clean Architecture and, in the future, support REST services and horizontal scaling without requiring a complete rewrite.
- **Decision**:
  All core domain models, aggregates, business invariants, and calculation algorithms will be implemented in a framework-independent domain layer. The initial MVC controllers delegate to application use cases/services. External interactions, including invoice XML generation, database access, SUNAT web services, and legacy file reading, are accessed through output-port interfaces. This creates a staged evolution path toward Hexagonal Architecture without replacing MVC as the initial architecture.
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
  3. PHP/Laravel and Docker are the selected implementation stack for the Partial Exam 2 application; this does not select the desktop/mobile client technology or packaging mechanism. Those details and deployment topology remain open.
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

### `ADR-005`: DEMO Sandbox Isolation — Deferred
- **Status**: Deferred / Out of Assessed Scope
- **Traces to**: Deferred identifiers only (`NFR-011`, `AC-013`); `FR-014` concerns the DEMO profile and does not establish sandbox behavior.
- **Decision**: No sandbox module, isolated data store, simulated CDR behavior, or live-emission interception is specified for the assessed solution.

---

### `ADR-006`: GRE / Transport Module — Deferred
- **Status**: Deferred / Out of Assessed Scope
- **Traces to**: `FR-018`, `FR-019`, `FR-020`, `UC-009`, `UC-010`, `AC-019` - `AC-021`, [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)
- **Context**:
  Prior supplementary material described merchandise transport dispatches, GRE, UBL Dispatch Advice, and XSD validation. Those features are not part of the assessed scope.
- **Decision**: No GRE, DispatchAdvice, transport, or transport-specific XSD components are included in the assessed architecture. Existing `FR-018` through `FR-020` references remain deferred only; no active transport module or API operation is specified.

---

### `ADR-007`: UBL Invoice XML Generation Behind an Output Port
- **Status**: Proposed (Tool Compatibility Pending)
- **Traces to**: `FR-009`, `UC-005`, `AC-009`, `NFR-002`, `NFR-010`
- **Context**: UBL Invoice 2.1 XML must meet the assessed schema-conformance requirement, while application use cases must not depend on a specific XML library or generated class model.
- **Decision**: `GenerateInvoiceXmlUseCase` depends on `IUblGeneratorPort`. An infrastructure adapter, `UblInvoiceXmlAdapter`, implements the port. The proposed implementation uses classes generated from the official [OASIS UBL 2.1 Invoice XSD](https://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd) and serializes them to XML. Confirm a PHP-compatible XSD code-generation/serialization tool before implementation. Keep the port stable so the adapter and tool can be replaced without changing the use case or domain.
- **Consequences**:
  - *Positive*: Isolates schema/tool-specific code in infrastructure and permits alternate generators or serializers.
  - *Negative*: Generated classes and serialization behavior require verification against the official UBL 2.1 schema and SUNAT profile.
- **Implementation Boundary**: The MVC controller invokes the use case; the use case depends on `IUblGeneratorPort`; only the infrastructure adapter depends on generated classes and the selected tool.

---

### `ADR-008`: PHP / Laravel and Docker for Partial Exam 2
- **Status**: Selected (Exact Versions Unspecified)
- **Traces to**: `NFR-001`, `NFR-002`
- **Decision**: Use PHP with Laravel and Docker as the implementation stack for Partial Exam 2. Retain the modular monolith and MVC as the initial architecture. Do not infer exact language, framework, or container versions.
- **Open Details**: Exact versions, compatible XSD generation/serialization tooling, target RDBMS, and any desktop/mobile client technology or packaging topology remain unconfirmed. This selection does not imply Docker produces MSI or APK packages.
