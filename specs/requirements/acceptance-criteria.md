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

#### `AC-002`: Transaction Timestamp Immutability
- **Target Requirement**: `FR-002`, `UC-001`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test / Inspection
- **Criterion**: Given any warehouse movement or commercial transaction, when recorded by the system, then an immutable UTC/local timestamp is assigned, and any subsequent attempt to modify this timestamp is rejected with a data integrity exception.

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

#### `AC-005`: Internal Tracking Number Uniqueness and Sequencing
- **Target Requirement**: `FR-005`, `UC-001`, `UC-002`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: Given concurrent inbound or outbound transactions, each generated internal tracking number must increment sequentially according to configured series rules without collisions, gaps, or duplicates.

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
- **Criterion**: Given test invoice payloads containing mixed taxable lines:
  1. Line taxes (IGV, ISC) and subtotals must calculate to 2 decimal places using half-up rounding.
  2. The sum of line amounts must equal the document total with 0.00 currency discrepancy (zero floating-point drift).

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
- **Criterion**: In database storage and generated XML nodes, document types, statuses, and currencies must strictly match verified SUNAT catalog codes, rejecting unmapped or arbitrary string values.

---

### 2.3 Roles, Usability, and DEMO Sandbox

#### `AC-012`: Role-Based Access Enforcement
- **Target Requirement**: `FR-013`, `NFR-001`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Automated Test
- **Criterion**: An operator authenticated as a warehouse worker is restricted from issuing legal invoices or modifying tax configurations; an invoicing clerk is restricted from modifying inventory adjustments outside sales.

#### `AC-013`: Safe DEMO User Sandbox Execution
- **Target Requirement**: `FR-014`, `NFR-011`, `UC-007`
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Verification Method**: Demonstration / Test
- **Criterion**: When operating under the requested DEMO user profile:
  1. Operations execute within a demonstration environment without altering production records or legacy files.
  2. External network calls to live production tax endpoints are blocked or resolved locally.
  3. No official tax liabilities are generated.
  4. No credentials, permissions, personal data, or demo workflows are assumed beyond the explicit DEMO context requested ([Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)).


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

### 2.6 Supplementary Case: Goods Transport and GRE

> **Scope Notice**: The following criteria originate exclusively from the **Delegate's Supplementary Case** and are **Pending Confirmation** regarding whether they are part of the evaluated core assessment.

#### `AC-019`: Mandatory Electronic Remission Guide (GRE) Gate for Vehicle Departure
- **Target Requirement**: `FR-018`, `UC-009`
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Verification Method**: Demonstration / Automated Test
- **Criterion**: For customer merchandise transport dispatches, the departure authorization gate returns `BLOCKED` if an associated GRE document does not have `VALID` / `ACCEPTED` status.

#### `AC-020`: UBL Dispatch Advice XML Schema Validity
- **Target Requirement**: `FR-019`, `UC-009`
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Verification Method**: Automated Test
- **Criterion**: The XML generated for an Electronic Remission Guide uses the `<DespatchAdvice>` UBL 2.1 root element and populates all mandatory transport, carrier, driver, and destination nodes.

#### `AC-021`: Strict XSD Schema Validation Pass
- **Target Requirement**: `FR-020`, `NFR-010`, `UC-010`
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Verification Method**: Automated Test
- **Criterion**: 100% of generated GRE XML documents pass local validation against official SUNAT XSD schemas without warnings; artificially injected schema violations (e.g., missing mandatory tag) are caught locally and prevent document issuance.
