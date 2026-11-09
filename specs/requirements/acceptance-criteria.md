# Acceptance Criteria Specification (`specs/requirements/acceptance-criteria.md`)

## 1. Document Overview
This document formalizes the verifiable acceptance criteria for ABC Software Corp.'s modernized system. Each criterion provides an objective, testable verification method (Demonstration, Automated Test, Inspection, or Audit Reconciliation) linked to corresponding Functional Requirements (`FR-xxx`), Non-Functional Requirements (`NFR-xxx`), and Use Cases (`UC-xxx`).

---

## 2. Acceptance Criteria Catalog

### 2.1 Warehouse Management and Core Commercial Operations

#### `AC-001`: Product Catalog Record Creation
- **Target Requirement**: `FR-001`, `UC-001`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration / Automated Test
- **Criterion**: Given a valid product description and identifier, when submitted by an authorized operator, then the product is persisted in the database and is immediately selectable in warehouse reception and sales workflows.

#### `AC-002`: Transaction Date Preservation
- **Target Requirement**: `FR-002`, `UC-001`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test / Inspection
- **Criterion**: Given an incoming or outgoing movement, its transaction date is retained. The legacy case establishes a date, not a time of day or timezone.

#### `AC-003`: Inbound Stock Increment
- **Target Requirement**: `FR-003`, `UC-001`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: Given a product with an initial stock balance $S_0$, when an inbound receipt of quantity $Q > 0$ is posted, then the resulting stock balance equals exactly $S_0 + Q$, and a corresponding inbound ledger entry is generated.

#### `AC-004`: Outbound Stock Decrement and Negative Stock Prevention
- **Target Requirement**: `FR-004`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: Given a product with available stock $S$, when an outbound order of quantity $Q$ is processed:
  1. If $Q \le S$, stock decrements to $S - Q$.
  2. If $Q > S$, the transaction is blocked, displaying an insufficient inventory alert, preventing negative stock unless explicit legacy override rules are confirmed.

#### `AC-005`: Internal Document Number Preservation
- **Target Requirement**: `FR-005`, `UC-001`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: When a legacy record is migrated, its internal document number is retained as an internal identifier and is not converted to a SUNAT series or correlative. Format and numbering rules await schema discovery.

#### `AC-006`: Dual-Mode Support for Wholesale and Retail Operations
- **Target Requirement**: `FR-006`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration
- **Criterion**: Given the sales interface, when switching between Wholesale and Retail modes, the system dynamically enforces wholesale requirements (mandatory business customer identity, bulk units) versus retail requirements (simplified consumer checkout).

---

### 2.2 Tax Compliance, RUC Validation, and XML Generation

#### `AC-007`: RUC Number Structural and Identity Validation
- **Target Requirement**: `FR-007`, `UC-003`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test / Demonstration
- **Criterion**: Given a candidate RUC input, when validated by the system, then the input is verified against confirmed statutory criteria and invalid numbers are rejected prior to invoice generation, without assuming unverified external endpoints or integration methods (specific verification mechanism subject to confirmation under [Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration)).

#### `AC-008`: Mathematical Precision in Tax Calculations (IGV and ISC)
- **Target Requirement**: `FR-008`, `NFR-009`, `UC-004`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: Given invoice payloads with verified tax configuration:
  1. Line taxes (IGV and, when applicable, ISC) and subtotals are calculated using the selected applicable system and official inputs; ISC configurations cover Catalog 08 systems `01`, `02`, and `03` without assuming product applicability or rates.
  2. Tax and monetary amounts follow the applicable SUNAT precision/rounding requirements, and line amounts reconcile with document totals with no unsupported business defaults.

#### `AC-009`: Formal UBL XML Generation and Well-Formedness
- **Target Requirement**: `FR-009`, `NFR-010`, `UC-005`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test / Inspection
- **Criterion**: Given an approved invoice transaction, when XML generation is triggered, the output file must be 100% syntactically well-formed XML declaring official OASIS UBL namespaces without requiring manual correction.

#### `AC-010`: Integration Interface and CDR Processing
- **Target Requirement**: `FR-010`, `FR-012`, `NFR-012`, `UC-006`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration / Automated Test
- **Criterion**: Given a signed electronic document payload transmitted to the authorized integration endpoint (SUNAT, PSE/OSE, or local simulator):
  1. When an acceptance CDR is returned, status updates to `ACCEPTED` and the CDR file is archived.
  2. When a rejection CDR is returned, status updates to `REJECTED` and the specific error code is recorded.

#### `AC-011`: Strict Usage of SUNAT Catalog Enums
- **Target Requirement**: `FR-011`, `UC-004`, `UC-005`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test / Code Inspection
- **Criterion**: In stored data and generated XML, catalog-backed document, currency, unit, identity, tax-affectation, ISC-system, pricing-reference, and invoice-operation fields use the applicable official SUNAT code and required UBL location. Catalog 07 tax affectation codes are not conflated with Catalog 08 ISC system codes.

#### `AC-022`: Credit and Debit Note Contract
- **Target Requirement**: `FR-021`, `UC-011`
- **Source**: Instructor Grading Feedback
- **Status**: Confirmed
- **Verification Method**: API Contract Inspection / Demonstration
- **Criterion**: The application API accepts a credit or debit note request linked to an identified original invoice, distinguishes the two note types, and returns the resulting electronic-document representation. Unspecified reason and adjustment rules are not assumed.

#### `AC-023`: Baja Request and Lifecycle
- **Target Requirement**: `FR-022`, `FR-012`, `UC-012`
- **Source**: Instructor Grading Feedback
- **Status**: Confirmed
- **Verification Method**: API Contract Inspection / Demonstration
- **Criterion**: The API accepts a baja request for an identified electronic document and makes the subsequent document lifecycle retrievable. The cancelled state is reported only after provider/authority confirmation; provider-specific request and response fields are not assumed.

#### `AC-024`: SUNAT Catalog Query
- **Target Requirement**: `FR-023`, `FR-011`, `UC-013`
- **Source**: Instructor Grading Feedback
- **Status**: Confirmed
- **Verification Method**: API Contract Inspection / Demonstration
- **Criterion**: A read-only query for a supported catalog returns entries containing their code and description, without modifying catalog data or inventing metadata.

---

### 2.3 Roles, Usability, and DEMO User

#### `AC-012`: Role-Based Access Enforcement
- **Target Requirement**: `FR-013`, `NFR-001`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: An operator authenticated as a warehouse worker is restricted from issuing legal invoices or modifying tax configurations; an invoicing clerk is restricted from modifying inventory adjustments outside sales.

#### `AC-013`: DEMO User Sandbox Execution (Deferred)
- **Target Requirement**: `FR-014`, `NFR-011`, `UC-007`
- **Source**: Derived from an interpretation of the DEMO user mention
- **Status**: Deferred / Out of assessed scope
- **Verification Method**: Not applicable while deferred
- **Criterion**: Sandbox execution, isolation from production, and simulated outputs are not acceptance criteria in this phase. The in-scope DEMO user profile is covered by `FR-014`.


---

### 2.4 Legacy Migration and Immutability

#### `AC-014`: Zero Modification of Legacy Database Files
- **Target Requirement**: `FR-015`, `NFR-007`, `UC-008`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Audit Inspection / Hash Comparison
- **Criterion**: The cryptographic SHA-256 hashes of all source Visual FoxPro database files (`.DBF`, `.DBC`, etc.) before and after running the migration pipeline must be 100% identical.

#### `AC-015`: Complete Historical Data Reconciliation
- **Target Requirement**: `FR-016`, `FR-017`, `NFR-008`, `UC-008`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Audit Reconciliation
- **Criterion**: An automated reconciliation report verifies:
  $$\text{Source Legacy Records} = \text{Successfully Migrated Records} + \text{Rejected Records in Exception Log}$$
  with zero records unclassified or silently dropped.

---

### 2.5 Architecture, Distribution, and Modularity

#### `AC-016`: Modular Monolith MVC Layer Separation
- **Target Requirement**: `NFR-001`, `NFR-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Architecture Fitness Test / Code Review
- **Criterion**: Controller classes contain no business rules or direct SQL queries, delegating exclusively to domain/application services; domain models contain zero framework dependencies.

#### `AC-017`: Windows MSI Package Clean Installation
- **Target Requirement**: `NFR-004`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration / Packaging Test
- **Criterion**: The generated `.msi` file installs on a clean Windows environment, places application shortcuts, executes correctly, and uninstalls cleanly without leaving residual binaries.

#### `AC-018`: Android APK Package Deployment
- **Target Requirement**: `NFR-005`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration / Mobile Test
- **Criterion**: The generated `.apk` package installs and launches on a compatible Android device or emulator, demonstrating user interface responsiveness.

---

### 2.6 Deferred Supplementary Case: Goods Transport and GRE

> **Scope Notice**: The following IDs are retained for traceability only. The supplementary transport/GRE scenario is **deferred and out of the assessed scope** for this phase; no acceptance tests are active.

#### `AC-019`: Mandatory Electronic Remission Guide (GRE) Gate for Vehicle Departure
- **Target Requirement**: `FR-018`, `UC-009`
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope
- **Verification Method**: Not applicable while deferred
- **Criterion**: No GRE departure-gate acceptance criterion is established in this phase.

#### `AC-020`: UBL Dispatch Advice XML Schema Validity
- **Target Requirement**: `FR-019`, `UC-009`
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope
- **Verification Method**: Not applicable while deferred
- **Criterion**: No UBL Dispatch Advice generation acceptance criterion is established in this phase.

#### `AC-021`: Strict XSD Schema Validation Pass
- **Target Requirement**: `FR-020`, `NFR-010`, `UC-010`
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope
- **Verification Method**: Not applicable while deferred
- **Criterion**: No GRE-specific XSD validation acceptance criterion is established in this phase.
