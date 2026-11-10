# Register of Open Decisions and Implementation Blockers (`specs/review/open-decisions.md`)

## 1. Executive Summary

This register consolidates all open architectural, functional, technological, and regulatory decisions identified across the analytical specifications of the ABC Software Corp. project.

**Instructor-feedback note:** This register now distinguishes confirmed SUNAT/UBL structures from business-specific choices and records GRE/transport and demo-sandbox behavior as deferred.

In accordance with the project's **spec-first** and **non-assumption** principles:
- **Specification status**: The instructor feedback has been incorporated into requirements, use cases, DTOs, acceptance criteria, the API contract, and traceability. No application code is changed in this phase.
- **Pending before implementation**: The decisions below represent unstated inputs or policy choices that require clarification before implementation or deployment.

---

## 2. Categorized Open Decisions Register

### Category A: Scope and Functional Boundaries

#### `OD-01`: GRE / DispatchAdvice / Transport Scope
- **Source Question**: [`Q-01 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).
- **Affected Artifacts**: `FR-018` to `FR-020`, `UC-009`/`UC-010`, `AC-019` to `AC-021`, and related traceability references.
- **Current Baseline**: GRE, DispatchAdvice, and transport are deferred and out of the assessed scope. Their existing identifiers are retained as deferred references; no active requirements or operations are defined.
- **Status**: **Resolved for this phase — Deferred / Out of scope**

#### `OD-02`: Note-Specific CPE Rules
- **Source Question**: [`Q-02 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [`REG-02 in regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-02-mandatory-range-of-electronic-payment-receipts-cpe).
- **Instructor decision**: Credit and debit notes are in the assessed API scope; requirements `FR-021`/`UC-011` and the note operation/schema have been added.
- **Remaining details**: Note reason codes, note-specific required data, eligibility, and adjustment semantics remain open under `Q-02`.
- **Status**: **Capability confirmed; detailed business rules pending**

#### `OD-15`: Baja Eligibility and Provider Response
- **Source Question**: [`Q-24 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-24-what-are-the-baja-eligibility-and-provider-response-details).
- **Affected Artifacts**: `FR-022`, `UC-012`, `POST /api/v1/invoices/{documentId}/baja`.
- **Baseline**: The API accepts a baja request and directs clients to the existing document resource; no provider ticket or provider-specific payload is specified.
- **Remaining details**: Eligible document states, pending/accepted/rejected response semantics, and any provider reference.
- **Status**: **Capability confirmed; provider/business details pending**

#### `OD-16`: SUNAT Catalog Query Coverage and Versioning
- **Source Question**: [`Q-25 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-25-which-sunat-catalogs-and-catalog-versions-are-queryable).
- **Affected Artifacts**: `FR-023`, `UC-013`, `GET /api/v1/catalogs/{catalogNumber}`.
- **Baseline**: The query returns the minimum code/description pairs for a supported catalog.
- **Remaining details**: Supported catalog numbers, applicable versions/effective dates, and filtering needs.
- **Status**: **Capability confirmed; catalog coverage details pending**

#### `OD-03`: DEMO User Profile and Sandbox Boundary
- **Source Question**: [`Q-03 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).
- **Affected Artifacts**: `FR-014`, `UC-007`, and `Q-03`; sandbox-specific `NFR-011`/`AC-013` are deferred.
- **Current Baseline**: The DEMO user profile is in scope. Sandbox isolation, simulated transactions/CDRs, and production-emission blocking are not implied and remain deferred.
- **Open Decision**: Profile credentials and access rights still require clarification under `Q-03`.
- **Status**: **Partially resolved — Profile in scope; sandbox out of scope**

---

### Category B: Legacy Visual FoxPro 9 Database & Migration

#### `OD-04`: Physical and Logical Schema of Legacy FoxPro 9 Database
- **Source Question**: [`Q-04 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).
- **Affected Artifacts**: `FR-015`, `FR-016`, [`specs/migration/legacy-data-inventory.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/legacy-data-inventory.md), [`specs/migration/mapping-and-reconciliation.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/mapping-and-reconciliation.md).
- **Current Baseline**: Established 10-step non-destructive inspection protocol and staging store envelope (`LegacyRawRecordEnvelopeDto`). No table names or field types invented.
- **Prerequisite Input**: Delivery of legacy `.DBC` / `.DBF` files or DDL schema exports by the course instructors.
- **Implementation Impact**: Blocks creation of the physical-to-logical SQL transformation scripts.
- **Status**: **Pending Schema Provision**

#### `OD-05`: Location and Accessibility of Valid Legacy Business Logic
- **Source Question**: [`Q-05 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).
- **Affected Artifacts**: `FR-017`, `AC-016`, [`mapping-and-reconciliation.md Section 6`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/mapping-and-reconciliation.md#6-preservation-and-re-implementation-of-valid-legacy-business-logic).
- **Current Baseline**: Identifies potential locations (`.DBC` stored procedures, `.PRG` code files, `.SCX` form methods, `.VCX` classes).
- **Options for Resolution**:
  - *Option A*: Source code files (`.PRG` / `.VCX`) are provided for extraction.
  - *Option B*: Business logic must be elicited via functional user requirement interviews.
- **Implementation Impact**: Governs whether a legacy decompiler/code parser is required or if rules are rewritten from specification.
- **Status**: **Pending Logic Disclosure**

#### `OD-06`: Visual FoxPro Soft-Delete and Encoding Policies
- **Source Questions**: [`Q-06`, `Q-16`, `Q-17 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).
- **Affected Artifacts**: `FR-015`, `FR-016`, `AC-014`, `AC-015`, `POST /api/v1/migration/runs`.
- **Current Baseline**: Staging extraction isolates raw records with deletion markers; reconciliation formula accounts for all records.
- **Options for Resolution**:
  - Soft-deletes: Filter during extraction (`SET DELETED ON` equivalent) vs. migrate into a separate deleted audit table.
  - Encoding: Windows-1252 (Latin 1) vs. MS-DOS CP850 transcoding.
- **Implementation Impact**: Governs the binary parser flags and charset conversion logic in the legacy reader adapter.
- **Status**: **Pending Inspection**

---

### Category C: Technology Platform & Distribution Architecture

#### `OD-07`: Selected PHP/Laravel/Docker Stack and UBL Tooling
- **Source Question**: [`Q-07 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `NFR-001`, `NFR-002`, `NFR-006`, [`specs/architecture/mvc-current.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md), [`specs/architecture/future-hexagonal.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md).
- **Current Baseline**: PHP with Laravel and Docker is selected for Partial Exam 2; MVC is the initial design and evolves toward Hexagonal Architecture. Exact versions are unspecified.
- **Remaining Decision**: Confirm a PHP-compatible tool for generation/serialization of classes from the official UBL 2.1 Invoice XSD. Keep it behind `IUblGeneratorPort`.
- **Implementation Impact**: Blocks selecting the infrastructure XML adapter/tool, not isolated serializer tests against specified mappings and fixtures.
- **Status**: **Stack selected; XML tooling and exact versions pending**

#### `OD-17`: Complete UBL Invoice Generator Input Contract
- **Source Question**: [`Q-26 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-26-what-complete-input-mapping-and-test-oracle-define-the-ubl-invoice-21-xml-generator).
- **Affected Artifacts**: `FR-009`, `AC-009`, `NFR-010`, `IUblGeneratorPort`, `IssueElectronicInvoiceRequestDto`, and the OpenAPI invoice schemas.
- **Current Baseline**: UBL 2.1, the replaceable output port, and specifically requested SUNAT/UBL field mappings are documented. The invoice endpoint schema now includes the approved conditional fields.
- **Remaining Decision**: Resolve issuer data/configuration, product unit and tax-scheme inputs, complete profile-required fields/optionality, the unsigned-XML/signature boundary, and approved generator test vectors. Related tax/payment/profile choices remain open under `Q-11`, `Q-19`, and `Q-22`.
- **Implementation Impact**: Blocks a complete SUNAT-profile-conformant generator; scoped XML serialization tests can be written for mapped fields and fixture inputs without implementing the invoicing application.
- **Status**: **Partial contract; generator conformance details pending**

#### `OD-08`: Mandated Target Relational Database Management System (RDBMS)
- **Source Question**: [`Q-08 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `ADR-001`, `ADR-004`, `specs/migration/mapping-and-reconciliation.md`.
- **Current Baseline**: Relational database schema requirements specified with ANSI standard types and constraints.
- **Options for Resolution**: PostgreSQL 16+, Microsoft SQL Server 2022, MySQL 8+, or SQLite (for local demo).
- **Implementation Impact**: Dictates DDL migration scripts, SQL dialects, and connection string configurations.
- **Status**: **Pending Academic Confirmation**

#### `OD-09`: Distribution Topology and Mobile Connectivity Model
- **Source Questions**: [`Q-09`, `Q-15 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `NFR-004`, `NFR-005`, [`specs/architecture/deployment-options.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/deployment-options.md).
- **Current Baseline**: Topology A (Centralized Web Monolith with REST services consumed by lightweight MSI and Android APK clients) is recommended.
- **Options for Resolution**:
  - *Online-Only*: Android APK requires constant Wi-Fi/4G connection to central REST API.
  - *Offline-First*: Android APK embeds local SQLite database with synchronization queue.
- **Implementation Impact**: Dictates mobile client architecture and conflict resolution algorithms.
- **Status**: **Pending Academic Confirmation**

#### `OD-10`: Bearer-Token Issuance and Authorization Policy
- **Source Question**: [`Q-21 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `FR-013`, `specs/api/openapi.yaml`, [`specs/api/api-design.md Section 2`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#2-authentication-and-common-responses).
- **Current Baseline**: The OpenAPI contract requires HTTP bearer authentication and documents `401` and `403`. Token issuance, claims, and role/operation permissions are unspecified.
- **Options for Resolution**: HTTP Bearer JWT tokens, Cookie-based session authentication, or TLS Basic Auth for evaluation.
- **Implementation Impact**: Determines authentication middleware and operation authorization; the contract's bearer scheme is already fixed.
- **Status**: **Contract scheme specified; implementation policy pending**
- **Clarification**: The listed alternatives are historical/unapproved and superseded by the bearer-only OpenAPI contract. Do not select or add them without an approved scope change.

---

### Category D: Peruvian Tax Compliance & SUNAT Integration

#### `OD-11`: Taxpayer RUC Verification Mechanism (Offline Check vs. Online Query)
- **Source Question**: [`Q-13 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [`REG-07 in regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-07-ruc-validation-scope-offline-vs-online-padrón).
- **Affected Artifacts**: `FR-007`, `UC-003`, `AC-007`, `RucNumber`, `POST /api/v1/tax/ruc/validate`.
- **Current Baseline**: Statutory 11-digit Modulo 11 check digit algorithm is fully specified as an internal value object invariant; online consultation is marked pending confirmation without inventing external endpoints.
- **Options for Resolution**:
  - *Option A*: Offline mathematical validation (Modulo 11 check digit) is sufficient for grading.
  - *Option B*: Online query against SUNAT's *Padrón Reducido RUC* or official REST API is required (must provide endpoint URL and credentials).
- **Implementation Impact**: Governs whether an external HTTP client adapter must be implemented.
- **Status**: **Pending Regulatory Clarification**

#### `OD-12`: Authorized Electronic Invoicing Testing Pathway
- **Source Question**: [`Q-12 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [`REG-06 in regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-06-testing-and-staging-pathway).
- **Affected Artifacts**: `FR-010`, `UC-006`, `AC-010`, `POST /api/v1/invoices/{id}/transmit`.
- **Current Baseline**: An abstract `ISunatDeliveryPort` is specified; no provider adapter, simulator, endpoint, or test pathway is selected or implemented. Demo-sandbox behavior remains out of scope.
- **Options for Resolution**:
  - *Option A*: Real connection to SUNAT Beta web services (requires course test SOL credentials and test certificate).
  - *Option B*: Connection to an authorized OSE/PSE staging API.
  - *Option C*: Local hermetic mock simulator returning simulated CDR responses.
- **Implementation Impact**: Dictates PKI keystore loading and SOAP client configuration.
- **Status**: **Pending Regulatory Clarification**

#### `OD-13`: Product-Specific ISC Applicability and Inputs
- **Source Question**: [`Q-11 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [`REG-03 in regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-03-product-specific-isc-applicability-and-inputs).
- **Affected Artifacts**: `FR-008`, `UC-004`, `AC-008`, `TaxBreakdown`.
- **Current Baseline**: Catalog 08 systems `01`, `02`, and `03` are identified and modeled. Product applicability and effective rates/amounts are not assumed and do not default to zero.
- **Options for Resolution**: Provide the assessed products and, for each applicable product, its effective official schedule, calculation inputs, measurement unit, and applicable public-sale-price/`TierRange` data.
- **Specification Impact**: Completes business-specific product configuration and representative tax cases without changing the catalogued system set.
- **Status**: **Pending Regulatory Clarification**

#### `OD-14`: Legacy Internal Document Number Format and Handling
- **Source Question**: [`Q-14 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).
- **Affected Artifacts**: `FR-005`, `AC-005`, `InternalDocumentNumber`, and migration mappings.
- **Current Baseline**: The known legacy internal number is preserved as a distinct value and is never mapped to the SUNAT series or correlative.
- **Remaining Decision**: The legacy number's format, uniqueness scope, and any target-side generation policy await schema and business-rule discovery.
- **Implementation Impact**: Blocks physical migration mapping and any assumed generation/uniqueness behavior; it does not block the conceptual mapping.
- **Status**: **Pending Academic Confirmation**

---

## 3. Prerequisite Roadmap to Implementation

Before beginning technical implementation or writing code, decisions must be resolved in this sequence:

```
[Phase 1: Academic Confirmation]
  - OD-01 is resolved: GRE and transport are deferred.
  - OD-07 stack selection is resolved; confirm XML tool compatibility and exact versions.
  - Resolve OD-08 (Target RDBMS).
         │
         ▼
[Phase 2: Legacy Inspection & Input Delivery]
  - Resolve OD-04 (Provision of VFP 9 schema files / DBFs)
  - Resolve OD-05 (Legacy business logic location)
  - Resolve OD-06 (Soft-delete & character encoding)
         │
         ▼
[Phase 3: Integration & Testing Environment]
  - Resolve OD-03 (DEMO user credentials and workflows)
  - Resolve OD-10 (Bearer-token issuer/claims and authorization policy)
  - Resolve OD-11 (RUC validation mode: offline vs online)
  - Resolve OD-12 (SUNAT test pathway: Beta vs OSE vs Simulator)
         │
         ▼
[Phase 4: Software Implementation Execution]
  - Solution scaffolding, ORM mapping, Domain implementation, API coding
```
