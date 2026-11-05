# Functional Requirements Specification (`specs/requirements/functional-requirements.md`)

## 1. Document Overview
This document specifies the functional requirements for the modernization of ABC Software Corp.'s enterprise system. In accordance with the spec-first methodology, every requirement is traced directly to its authoritative source:
- **Teacher Assessment**: Broad enterprise modernization, warehouse operations, tax compliance, and legacy migration.
- The delegate's supplementary transport/GRE scenario is deferred and is not part of the active assessed requirements.

No visual FoxPro schemas, tax rates, codes, or technology decisions are invented. Unresolved parameters are linked directly to [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Requirement Classification Legend
- **Confirmed**: Explicitly mandated by the assessment context.
- **Inferred**: Derived strictly through necessary logical implication from confirmed facts.
- **Deferred / Out of Scope**: Retained for traceability, but not part of the active assessed scope.

---

## 3. Requirements Catalog

### 3.1 Module 1: Legacy Warehouse & Inventory Continuity

#### `FR-001`: Record Product Catalog Entries
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: Product is one of the five stated legacy facts.
- **Description**: The system shall record and maintain product items handled in wholesale and retail grocery and merchandise operations.
- **Acceptance Criterion**: The system successfully persists product entries with identifiers and descriptive data without relying on legacy Visual FoxPro runtime.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Exact legacy product fields and classifications).

#### `FR-002`: Record Transaction Dates
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: Date is one of the five stated legacy facts.
- **Description**: The system shall record the transaction date for incoming and outgoing movements.
- **Acceptance Criterion**: Each recorded movement retains its transaction date; no time-of-day value is inferred from the legacy case.
- **Open Questions**: None.

#### `FR-003`: Record Incoming Goods (Inbound Stock Movements)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: Incoming movement is one of the five stated legacy facts.
- **Description**: The system shall record incoming goods into the warehouse, reflecting supplier receptions or internal inventory entries, updating stock balances accordingly.
- **Acceptance Criterion**: When an inbound receipt is confirmed, the product inventory balance increments by the exact received quantity and an audit movement is registered.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy inventory valuation or balance update logic).

#### `FR-004`: Record Outgoing Goods (Outbound Dispatches and Sales)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: Outgoing movement is one of the five stated legacy facts.
- **Description**: The system shall record outgoing merchandise movements representing wholesale deliveries, retail sales dispatches, or inventory write-offs.
- **Acceptance Criterion**: When an outbound dispatch is processed, stock availability is verified, inventory decrements by the dispatched quantity, and negative stock is prevented unless permitted by validated business rules.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy negative stock rules).

#### `FR-005`: Record Internal Document Numbers
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: Internal document number is one of the five stated legacy facts.
- **Description**: The system shall record internal document numbers and preserve legacy values during migration, distinguishing them from any separately governed external numbering.
- **Acceptance Criterion**: Each migrated internal document number is retained as an internal identifier without conversion to a SUNAT series or correlative; generation, format, and numbering rules remain subject to schema discovery.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), and [Q-14](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-14-what-is-the-format-and-business-meaning-of-legacy-internal-document-numbers).

#### `FR-006`: Support Wholesale and Retail Operations
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 1: *"ABC Software Corp. is a medium-sized company operating in both wholesale and retail commerce of groceries and general merchandise."*
- **Description**: The system shall support operational workflows for both wholesale transactions (B2B bulk orders, business customer identification) and retail transactions (B2C consumer checkout).
- **Acceptance Criterion**: The system allows transactions to be categorized as wholesale or retail, applying corresponding pricing and customer identification requirements.
- **Open Questions**: [Q-02](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) (Document distinction between Facturas for wholesale and Boletas for retail).

---

### 3.2 Module 2: Peruvian Tax Compliance & Electronic Invoicing

#### `FR-007`: Validate Taxpayer RUC Numbers
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3: *"The legacy system suffers from critical tax compliance and electronic document issues: difficulty validating RUC numbers (Registro Único de Contribuyentes)."*
- **Description**: The system shall validate RUC identification numbers entered for commercial and electronic billing transactions, rejecting non-conforming inputs prior to document issuance.
- **Acceptance Criterion**: Customer RUC inputs are validated against verified legal identity standards; invalid numbers are rejected with diagnostic error notifications without assuming unverified external endpoints or integration methods.
- **Open Questions**: [Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Clarification of mandated validation mechanism: offline Modulo 11 check digit calculation vs. online SUNAT padrón consultation vs. external API).

#### `FR-008`: Verify and Calculate Applicable Taxes (IGV and ISC)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Items 3 & 5: *"Calculation errors in applicable taxes, specifically IGV ... and ISC... The case notes an 18% IGV rate, but tax rates, codes, and calculation rules must be verified against official SUNAT regulations before being treated as definitive."*
- **Description**: The system shall calculate applicable Peruvian taxes, including IGV and ISC, using the applicable tax classification and, for ISC, the selected SUNAT Catalog 08 system (`01` al valor, `02` específico, or `03` al precio de venta al público) with verified calculation inputs and rounding rules.
- **Acceptance Criterion**: For configured and verified tax inputs, tax amounts and totals equal the applicable formula results to 2 decimal places with the required rounding, and line-item aggregates reconcile with document totals. No product applicability or rate is inferred.
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Product applicability and business-specific ISC schedule inputs).

#### `FR-009`: Generate Standardized Electronic Document XML
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3: *"The legacy system suffers from ... Complete absence of formal, standardized XML generation."*
- **Description**: The system shall generate compliant electronic document XML files following the applicable UBL (*Universal Business Language*) standard for issued commercial receipts.
- **Acceptance Criterion**: Every issued electronic document produces an XML document adhering strictly to official XML syntax and UBL namespaces without manual post-editing.
- **Open Questions**: [Q-02](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Exact UBL versions and document types).

#### `FR-010`: Interface with Electronic Invoicing Service (SUNAT or PSE/OSE)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3: *"Lack of adequate electronic integration with SUNAT ... or an authorized Electronic Services Provider (PSE / OSE)."*
- **Description**: The system shall provide an integration interface capable of transmitting signed electronic document payloads to SUNAT or an authorized electronic service provider (PSE/OSE) and processing responses (CDR - Constancia de Recepción).
- **Acceptance Criterion**: The integration interface successfully serializes document requests, sends them via the authorized protocol, receives the response payload, and parses acceptance or rejection codes.
- **Open Questions**: [Q-12](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Authorized test pathway: SUNAT Beta, PSE/OSE, or local simulator).

#### `FR-011`: Support SUNAT Standard Catalogs
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 5: *"The new system must consider Peruvian tax rules and SUNAT catalogs, including document types, statuses, and currencies."*
- **Description**: The system shall maintain and utilize verified SUNAT catalog codes for:
  - Document types and currencies (Catalogs 01 and 02).
  - Measurement units and identity types (Catalogs 03 and 06).
  - IGV affectation, ISC system, tax, alternative-price, and invoice operation codes (Catalogs 05, 07, 08, 16, and 51 as applicable).
- **Acceptance Criterion**: Each catalog-backed field uses the relevant official code and UBL location; ISC system codes are distinct from IGV affectation codes.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Other catalog profiles applicable to the company's assessed documents).

#### `FR-012`: Electronic Document Lifecycle and Status Tracking
- **Source**: Teacher Assessment
- **Status**: Inferred
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 5: *"The new system must consider Peruvian tax rules and SUNAT catalogs, including ... statuses..."*
- **Description**: The system shall manage the lifecycle states of an electronic document (e.g., Draft, Generated, Signed, Sent, Accepted, Rejected, Cancelled).
- **Acceptance Criterion**: State transitions follow an immutable state machine where documents cannot be modified once signed/sent, and rejections record the specific error code returned.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Specific state definitions under SUNAT regulations).

---

### 3.3 Module 3: Users and Invoicing Roles

#### `FR-013`: Role-Based Electronic Invoicing Workflows
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"It also requests use cases based on the needs of electronic invoicing users..."*
- **Description**: The system shall support role-based user workflows tailored to billing clerks, warehouse operators, and accounting administrators.
- **Acceptance Criterion**: Users cannot access or execute operations outside their designated invoicing and warehouse roles.
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) (Formal matrix of user roles).

#### `FR-014`: DEMO User Profile
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"It also requests use cases based on the needs of electronic invoicing users and mentions a DEMO user."*
- **Description**: The system shall provide a designated DEMO user profile. This requirement does not specify sandboxing, isolation, simulated transactions, or other demonstration-mode behavior.
- **Acceptance Criterion**: The designated DEMO user profile is available; credentials and access rights are determined after clarification.
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-03-what-profile-and-permissions-should-be-assigned-to-the-demo-user) (Profile credentials and access rights).


---

### 3.4 Module 4: Legacy Data Preservation and Migration

#### `FR-015`: Non-Destructive Legacy Data Extraction
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 4: *"The case requires planning a migration while preserving historical data... The existing database must not be damaged or deleted."*
- **Description**: The system migration facility shall extract historical data from Visual FoxPro 9 in a strictly read-only, non-destructive manner.
- **Acceptance Criterion**: Verification via cryptographic file hashes confirms that original Visual FoxPro files are unmodified before, during, and after extraction.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy file formats and access methods).

#### `FR-016`: Legacy-to-Target Data Mapping and Ingestion
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 4: *"The migration must define how legacy information maps to the new system. We do not know the actual Visual FoxPro database structure; do not invent tables, columns, or internal rules."*
- **Description**: The system shall execute mapping transformations from legacy fields (once inspected and approved) into the new relational domain schema, rejecting records that violate domain constraints into an error log.
- **Acceptance Criterion**: 100% of extractable valid legacy historical records are loaded into target domain structures with verified transformation logs and zero silent truncations.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Schema definition and sanitization rules).

#### `FR-017`: Preservation of Valid Legacy Business Logic
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 4: *"The case requires planning a migration while preserving historical data and valid existing business logic."*
- **Description**: The system shall re-implement valid warehouse inventory rules and document sequencing identified in the legacy system within the new domain layer.
- **Acceptance Criterion**: Migrated inventory movements produce stock balance outcomes identical to legacy calculations for the same historical input data.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy source code availability).

---

### 3.5 Deferred Items: Supplementary Transport and GRE Scenario

> **Scope Notice**: The items below are retained only to preserve existing IDs. They are **deferred and out of the assessed scope** for this phase; no active behavior or acceptance criterion is established.

#### `FR-018`: Electronic Remission Guide (GRE) Mandatory Dispatch Validation
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope (Q-01 resolved)
- **Description**: Deferred; no transport or GRE departure behavior is specified for this phase.

#### `FR-019`: UBL Dispatch Advice XML Generation
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope (Q-01 resolved)
- **Description**: Deferred; no UBL Dispatch Advice generation behavior is specified for this phase.

#### `FR-020`: XSD Schema Validation for Electronic Remission Guide
- **Source**: Delegate's Supplementary Case
- **Status**: Deferred / Out of assessed scope (Q-01 resolved)
- **Description**: Deferred; no GRE-specific XSD validation behavior is specified for this phase.

---

## 4. Traceability Summary Matrix

| Requirement ID | Module / Focus | Source | Status | Verifiable Criterion Summary |
|---|---|---|---|---|
| `FR-001` | Product Catalog | Assessment | Confirmed | Product data persisted in new system |
| `FR-002` | Transaction Dates | Assessment | Confirmed | Transaction date recorded for incoming and outgoing movements |
| `FR-003` | Inbound Stock | Assessment | Confirmed | Stock balance increments upon receipt |
| `FR-004` | Outbound Dispatches | Assessment | Confirmed | Stock decrements, negative stock prevented |
| `FR-005` | Internal Tracking | Assessment | Confirmed | Legacy internal document numbers preserved as internal identifiers |
| `FR-006` | Wholesale & Retail | Assessment | Confirmed | Dual-mode support for B2B and B2C flows |
| `FR-007` | RUC Validation | Assessment | Confirmed | Rejection of invalid tax identity numbers without unverified endpoints (subject to Q-13) |
| `FR-008` | Tax Math (IGV/ISC) | Assessment | Confirmed | 2-decimal rounded tax calculation equals formula |
| `FR-009` | XML Generation | Assessment | Confirmed | Valid UBL XML produced without manual edits |
| `FR-010` | SUNAT/PSE Interface| Assessment | Confirmed | Interface sends payload and parses CDR response |
| `FR-011` | SUNAT Catalogs | Assessment | Confirmed | Validated SUNAT codes used across all docs |
| `FR-012` | Document Lifecycle | Assessment | Inferred | State machine enforces immutable transitions |
| `FR-013` | Invoicing Roles | Assessment | Confirmed | Access control for billing/warehouse roles |
| `FR-014` | DEMO User Profile | Assessment | Confirmed | Designated DEMO user profile is available |
| `FR-015` | Read-Only Extract | Assessment | Confirmed | Hash-verified zero modification of legacy DB |
| `FR-016` | Data Ingestion | Assessment | Confirmed | 100% valid legacy records mapped and logged |
| `FR-017` | Logic Preservation| Assessment | Confirmed | Stock calculations match legacy outcomes |
| `FR-018` | GRE Departure Gate| Delegate Case| Deferred | Out of assessed scope |
| `FR-019` | UBL Dispatch XML | Delegate Case| Deferred | Out of assessed scope |
| `FR-020` | GRE XSD Validation | Delegate Case| Deferred | Out of assessed scope |
