# Non-Functional Requirements Specification (`specs/requirements/non-functional-requirements.md`)

## 1. Document Overview
This document specifies the quality attributes, architectural constraints, packaging standards, and compliance benchmarks for ABC Software Corp.'s modernized enterprise system. Every non-functional requirement is assigned a stable identifier, attributed to its authoritative source, classified by certainty status, grounded with evidence from [docs/00-context-and-scope.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/00-context-and-scope.md), and linked to open questions in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Requirement Classification Legend
- **Confirmed**: Explicitly mandated by the assessment context or delegate's scenario narrative.
- **Inferred**: Derived strictly through necessary logical implication from confirmed facts.
- **Pending Confirmation**: Conditional upon unresolved scope boundaries or stakeholder answers.

---

## 3. Requirements Catalog

### 3.1 Category 1: Architecture and Modularity

#### `NFR-001`: Modular Monolith MVC Architectural Pattern
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"The initial architecture must be a clean or modular monolith using MVC..."*
- **Quality Attribute**: Modularity, Maintainability
- **Description**: The core application shall be structured as a modular monolith adhering to the Model-View-Controller (MVC) design pattern, organizing warehouse, tax calculation, and invoicing capabilities into distinct, cohesive internal modules.
- **Acceptance Criterion**: Static code analysis or package verification confirms that business logic resides in modular services/domain layers rather than controller handlers, and circular dependencies between modules are zero.
- **Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) (Mandated programming language and MVC framework).

#### `NFR-002`: Decoupling for Evolution toward Hexagonal / Clean Architecture
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"prepared to evolve toward Hexagonal Architecture or Clean Architecture..."*
- **Quality Attribute**: Architectural Evolvability, Testability
- **Description**: The domain model and business rules shall be fully decoupled from user interface frameworks, database access libraries, and external communication protocols using interface abstractions (ports and adapters readiness).
- **Acceptance Criterion**: Core business domain entities and calculation services have no direct references to UI components, SQL/ORM vendor libraries, or specific HTTP transport packages.
- **Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

#### `NFR-003`: Future Horizontal Scalability and REST Service Readiness
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"and, in the future, support REST services and horizontal scaling."*
- **Quality Attribute**: Scalability, Extensibility
- **Description**: Application state management shall be designed to operate statelessly across application nodes, with persistence externalized to an enterprise RDBMS to allow horizontal replication and future REST endpoint exposure.
- **Acceptance Criterion**: The application backend preserves no in-process session state that prevents running multiple instances against a shared database, and service contracts are structured to map cleanly to future REST endpoints.
- **Open Questions**: [Q-08](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### 3.2 Category 2: Deployment, Platforms, and Packaging

#### `NFR-004`: Windows Distribution via MSI Installer
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"The assessment mentions Windows distribution through an MSI installer..."*
- **Quality Attribute**: Portability, Installability
- **Description**: The Windows desktop distribution of the client/application must be packaged as a standard Microsoft Installer (`.msi`) file supporting standard installation, uninstallation, and dependency verification on modern Windows environments.
- **Acceptance Criterion**: The generated `.msi` package installs cleanly on a fresh Windows system, creates appropriate application shortcuts, and cleanly uninstalls without leaving orphaned binary files.
- **Open Questions**: [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) (Packaging tooling and client-server topology).

#### `NFR-005`: Android Distribution via APK Package
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"and Android distribution through an APK."*
- **Quality Attribute**: Portability, Mobile Installability
- **Description**: The mobile application distribution must be packaged as an Android Package Kit (`.apk`) file capable of installation on supported Android runtime environments.
- **Acceptance Criterion**: The generated `.apk` package successfully sideloads and executes on target Android devices or emulators without crashing on startup.
- **Open Questions**: [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) (Target Android API levels and architecture).

#### `NFR-006`: Technology Agnosticism Pending Stakeholder Clarification
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"If the application technologies are unclear, record the question instead of choosing by assumption."*
- **Quality Attribute**: Governance, Compliance
- **Description**: The specification must remain technically neutral until the evaluation committee confirms the programming language, framework, and database engine, relying on standard interfaces and architectural patterns.
- **Acceptance Criterion**: Zero code or platform-specific dependencies are committed to the repository until official confirmation is received in `docs/01-open-questions.md`.
- **Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-08](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### 3.3 Category 3: Data Safety, Integrity, and Migration

#### `NFR-007`: Absolute Preservation and Immutability of Legacy Database
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 4: *"The existing database must not be damaged or deleted. The migration must define how legacy information maps to the new system."*
- **Quality Attribute**: Data Safety, Non-Destructiveness
- **Description**: The migration extraction process must operate strictly in read-only mode against the legacy Visual FoxPro 9 database. Under no circumstances may tables, rows, columns, or files in the legacy database be dropped, updated, locked exclusively, or deleted.
- **Acceptance Criterion**: SHA-256 cryptographic hashes of all legacy Visual FoxPro files remain identical before and after any extraction or migration operation.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

#### `NFR-008`: Zero Historical Data Loss and Reconciliation Auditability
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 4: *"The case requires planning a migration while preserving historical data and valid existing business logic."*
- **Quality Attribute**: Data Integrity, Auditability
- **Description**: The migration pipeline must guarantee that 100% of extractable historical records are accounted for, providing comprehensive reconciliation reports comparing source row counts, checksums, and monetary totals against target records.
- **Acceptance Criterion**: The reconciliation report demonstrates that the number of source records equals (migrated records + rejected records in the error log), with zero unaccounted data loss.
- **Open Questions**: [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Sanitization rules for historical inconsistencies).

---

### 3.4 Category 4: Regulatory Compliance and Standards

#### `NFR-009`: Tax Calculation Precision and Rounding Compliance
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3 & 5: *"errors calculating taxes such as IGV and ISC... tax rates, codes, and rules must be verified against official sources before being treated as definitive."*
- **Quality Attribute**: Regulatory Compliance, Accuracy
- **Description**: All currency calculations, tax computations (IGV, ISC), and invoice totals must implement official rounding rules (standard half-up to 2 decimal places) using arbitrary-precision arithmetic (e.g., `BigDecimal` or `decimal`) to prevent floating-point discrepancies.
- **Acceptance Criterion**: Automated calculation tests across edge cases (fractional amounts, mixed tax rates) pass with zero rounding drift or penny mismatch between line totals and grand totals.
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

#### `NFR-010`: Standardized UBL and XSD Syntactic Strictness
- **Source**: Delegate's Case & Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1 Item 3 and Section 2.2 Item 3: *"no formal XML generation... mentions UBL Dispatch Advice and XML validation using XSD."*
- **Quality Attribute**: Interoperability, Syntactic Validity
- **Description**: All generated electronic documents (invoices, remission guides) must strictly adhere to the designated OASIS UBL standard and pass local validation against official SUNAT XSD schemas without schema warnings or errors.
- **Acceptance Criterion**: 100% of generated XML documents pass validation against official XSD schemas prior to digital signature and external transmission.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### 3.5 Category 5: Usability, Security, and Demonstration Safety

#### `NFR-011`: DEMO User Isolation and Sandbox Safety
- **Source**: Teacher Assessment
- **Status**: Inferred / Pending Confirmation
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"It also requests use cases based on the needs of electronic invoicing users and mentions a DEMO user."*
- **Quality Attribute**: Security, Data Protection
- **Description**: Transactions executed under the DEMO user account must be fully segregated from production ledgers, preventing accidental submission of test invoices to SUNAT production endpoints and preventing data corruption.
- **Acceptance Criterion**: When running under the DEMO profile, the system disallows external production network transmission and clearly marks generated documents as "DEMO / NON-VALUED".
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

#### `NFR-012`: Immutable Audit Trail for Electronic Billing Transactions
- **Source**: Teacher Assessment
- **Status**: Inferred
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3: *"no adequate electronic integration with SUNAT or an electronic service provider."*
- **Quality Attribute**: Auditability, Non-Repudiation
- **Description**: The system must log an immutable audit trail for every electronic document generation, digital signature application, transmission attempt, and received CDR response, recording timestamps, user IDs, and payload hashes.
- **Acceptance Criterion**: Every state transition of an electronic document has a corresponding tamper-evident log record capturing the exact actor, timestamp, and transition details.
- **Open Questions**: [Q-12](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

## 4. Non-Functional Traceability Summary Matrix

| NFR ID | Quality Dimension | Source | Status | Verifiable Acceptance Metric |
|---|---|---|---|---|
| `NFR-001` | Modularity | Assessment | Confirmed | Clean MVC separation, zero circular dependencies |
| `NFR-002` | Evolvability | Assessment | Confirmed | Core domain free of UI/DB/HTTP framework imports |
| `NFR-003` | Scalability | Assessment | Confirmed | Stateless application design ready for REST |
| `NFR-004` | Windows Packaging | Assessment | Confirmed | Clean install/uninstall via official MSI package |
| `NFR-005` | Android Packaging | Assessment | Confirmed | Sideloadable Android APK package execution |
| `NFR-006` | Tech Neutrality | Assessment | Confirmed | Zero speculative code/framework dependencies committed |
| `NFR-007` | Data Safety | Assessment | Confirmed | Identical SHA-256 hashes of legacy DB files |
| `NFR-008` | Zero Data Loss | Assessment | Confirmed | 100% reconciliation of source vs. migrated/rejected rows |
| `NFR-009` | Calculation Accuracy | Assessment | Confirmed | Arbitrary-precision tax math with zero penny rounding drift |
| `NFR-010` | XML Strictness | Del. & Ass. | Confirmed | 100% pass rate on local XSD schema validation |
| `NFR-011` | Sandbox Safety | Assessment | Inferred | Zero transmission of DEMO transactions to live SUNAT |
| `NFR-012` | Auditability | Assessment | Inferred | Immutable audit log for all document lifecycle transitions |
