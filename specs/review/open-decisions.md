# Register of Open Decisions and Implementation Blockers (`specs/review/open-decisions.md`)

## 1. Executive Summary

This register consolidates all open architectural, functional, technological, and regulatory decisions identified across the analytical specifications of the ABC Software Corp. project.

**Instructor-feedback note:** This register now distinguishes confirmed SUNAT/UBL structures from business-specific choices and records GRE/transport and demo-sandbox behavior as deferred.

In accordance with the project's **spec-first** and **non-assumption** principles:
- **Specification status**: The relevant domain, DTO, and compliance specifications have been updated; the API contract and architecture are unchanged in this phase.
- **Pending before implementation**: The decisions below represent unstated inputs or policy choices that require clarification before implementation or deployment.

---

## 2. Categorized Open Decisions Register

### Category A: Scope and Functional Boundaries

#### `OD-01`: GRE / DispatchAdvice / Transport Scope
- **Source Question**: [`Q-01 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).
- **Affected Artifacts**: `FR-018` to `FR-020`, `UC-009`/`UC-010`, `AC-019` to `AC-021`, and related traceability references.
- **Current Baseline**: GRE, DispatchAdvice, and transport are deferred and out of the assessed scope. Their existing identifiers are retained as deferred references; no active requirements or operations are defined.
- **Status**: **Resolved for this phase — Deferred / Out of scope**

#### `OD-02`: Exhaustive List of Required Electronic Payment Receipts (CPE)
- **Source Question**: [`Q-02 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [`REG-01 in regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-01-cpe-document-types-in-mandatory-scope).
- **Affected Artifacts**: `FR-006`, `FR-009`, `FR-011`, `UC-004`, `UC-005`, `POST /api/v1/invoices`.
- **Current Baseline**: Models *Factura Electrónica* (Code `01`) and *Boleta de Venta Electrónica* (Code `03`). Credit/Debit notes are noted as potential extensions.
- **Options for Resolution**:
  - *Option A*: Only Facturas and Boletas are evaluated for core grading.
  - *Option B*: Electronic Credit Notes (`07`) and Debit Notes (`08`) are also mandatory.
- **Implementation Impact**: Dictates whether credit note adjustment workflows, reversal invariants, and additional UBL templates must be coded.
- **Status**: **Pending Academic Confirmation**

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

#### `OD-07`: Mandated Programming Language, Framework, and Runtime
- **Source Question**: [`Q-07 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `NFR-001`, `NFR-002`, `NFR-006`, [`specs/architecture/mvc-current.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md), [`specs/architecture/future-hexagonal.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md).
- **Current Baseline**: Clean Modular Monolith MVC and Ports & Adapters designed in technology-neutral terms.
- **Ecosystem Options**:
  - *.NET Ecosystem*: C#, ASP.NET Core MVC / Web API, EF Core, .NET MAUI / MSIX.
  - *Java Ecosystem*: Java 21, Spring Boot MVC, Spring Data JPA, Android Native SDK.
  - *TypeScript Ecosystem*: NestJS / Express, TypeORM / Prisma, Electron, React Native.
- **Implementation Impact**: Fundamental prerequisite before solution scaffolding, package installation, or code authoring.
- **Status**: **Pending Academic Confirmation**

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

#### `OD-10`: REST API Authentication and Security Standard
- **Source Question**: [`Q-21 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- **Affected Artifacts**: `FR-013`, `specs/api/openapi.yaml`, [`specs/api/api-design.md Section 5`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#5-security-and-authentication-boundaries).
- **Current Baseline**: `openapi.yaml` omits hardcoded security schemes to avoid unverified assumptions.
- **Options for Resolution**: HTTP Bearer JWT tokens, Cookie-based session authentication, or TLS Basic Auth for evaluation.
- **Implementation Impact**: Dictates `securitySchemes` in `openapi.yaml` and security filter middleware.
- **Status**: **Pending Academic Confirmation**

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
- **Current Baseline**: Abstract `ISunatDeliveryPort` defined with two interchangeable adapters (`SunatSoapDeliveryAdapter` and `LocalSimulatorDeliveryAdapter`).
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

#### `OD-14`: Dual Series Numbering Strategy vs. Internal Numbers
- **Source Question**: [`Q-14 in docs/01-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).
- **Affected Artifacts**: `FR-005`, `FR-011`, `AC-005`, `DocumentSeriesNumber`.
- **Current Baseline**: Dual numbering supported (internal tracking number preserved alongside legal SUNAT series `F###` / `B###`).
- **Options for Resolution**: Confirm whether internal vouchers are permanently maintained as parallel tracking numbers or completely superseded by SUNAT series.
- **Implementation Impact**: Affects document database schema foreign keys.
- **Status**: **Pending Academic Confirmation**

---

## 3. Prerequisite Roadmap to Implementation

Before beginning technical implementation or writing code, decisions must be resolved in this sequence:

```
[Phase 1: Academic Confirmation]
  - Resolve OD-01 (GRE scope)
  - Resolve OD-07 (Technology stack: .NET, Java, TS, or Python)
  - Resolve OD-08 (Target RDBMS: PostgreSQL, SQL Server, MySQL)
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
  - Resolve OD-10 (REST authentication standard)
  - Resolve OD-11 (RUC validation mode: offline vs online)
  - Resolve OD-12 (SUNAT test pathway: Beta vs OSE vs Simulator)
         │
         ▼
[Phase 4: Software Implementation Execution]
  - Solution scaffolding, ORM mapping, Domain implementation, API coding
```
