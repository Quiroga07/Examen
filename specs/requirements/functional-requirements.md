# Functional Requirements Specification (`specs/requirements/functional-requirements.md`)

## 1. Document Overview
This document specifies the functional requirements for the modernization of ABC Software Corp.'s enterprise system. In accordance with the spec-first methodology, every requirement is traced directly to its authoritative source:
- **Teacher Assessment**: Broad enterprise modernization, warehouse operations, tax compliance, and legacy migration.
- **Delegate's Supplementary Case**: Customer merchandise transport, Electronic Remission Guide (*Guía de Remisión Electrónica* - GRE), UBL Dispatch Advice, and XSD validation.

No visual FoxPro schemas, tax rates, codes, or technology decisions are invented. Unresolved parameters are linked directly to [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Requirement Classification Legend
- **Confirmed**: Explicitly mandated by the assessment context or delegate's scenario narrative.
- **Inferred**: Derived strictly through necessary logical implication from confirmed facts.
- **Pending Confirmation**: Conditional upon unresolved scope boundaries or stakeholder answers.

---

## 3. Requirements Catalog

### 3.1 Module 1: Legacy Warehouse & Inventory Continuity

#### `FR-001`: Record Product Catalog Entries
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: *"The legacy system records basic warehouse data, specifically: ... Product catalog entries."*
- **Description**: The system shall record and maintain product items handled in wholesale and retail grocery and merchandise operations.
- **Acceptance Criterion**: The system successfully persists product entries with identifiers and descriptive data without relying on legacy Visual FoxPro runtime.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Exact legacy product fields and classifications).

#### `FR-002`: Record Transaction Dates
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: *"The legacy system records basic warehouse data, specifically: Dates of transactions."*
- **Description**: The system shall record the exact timestamp/date for every incoming, outgoing, or inventory adjustment transaction.
- **Acceptance Criterion**: Every transaction record contains a validated, immutable transaction date and time that passes chronological integrity checks.
- **Open Questions**: None.

#### `FR-003`: Record Incoming Goods (Inbound Stock Movements)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: *"The legacy system records ... Incoming goods (receptions/purchases)..."*
- **Description**: The system shall record incoming goods into the warehouse, reflecting supplier receptions or internal inventory entries, updating stock balances accordingly.
- **Acceptance Criterion**: When an inbound receipt is confirmed, the product inventory balance increments by the exact received quantity and an audit movement is registered.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy inventory valuation or balance update logic).

#### `FR-004`: Record Outgoing Goods (Outbound Dispatches and Sales)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: *"The legacy system records ... outgoing goods (dispatches/sales)..."*
- **Description**: The system shall record outgoing merchandise movements representing wholesale deliveries, retail sales dispatches, or inventory write-offs.
- **Acceptance Criterion**: When an outbound dispatch is processed, stock availability is verified, inventory decrements by the dispatched quantity, and negative stock is prevented unless permitted by validated business rules.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy negative stock rules).

#### `FR-005`: Track Internal Document Tracking Numbers
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 2: *"The legacy system records ... Internal document tracking numbers."*
- **Description**: The system shall preserve and continue generating sequential internal document numbers for warehouse receipts, dispatch orders, and internal transfer vouchers.
- **Acceptance Criterion**: Generated internal document numbers maintain sequence integrity, uniqueness, and cross-reference legacy historical document numbers without collisions.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration) (Legacy numbering format and gap management).

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
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 3: *"The legacy system suffers from critical tax compliance ... deficiencies: Inability/difficulty in validating RUC numbers (Registro Único de Contribuyentes)."*
- **Description**: The system shall validate RUC identification numbers entered for commercial and electronic billing transactions, verifying structure, valid 11-digit length, legal prefix, and checksum algorithms.
- **Acceptance Criterion**: The validation algorithm rejects invalid lengths, non-numeric strings, invalid legal prefixes (e.g., other than 10, 15, 17, 20), and failed Modulo 11 check digits prior to document generation.
- **Open Questions**: [Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Offline Modulo 11 check vs. online SUNAT consultation).

#### `FR-008`: Verify and Calculate Applicable Taxes (IGV and ISC)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Items 3 & 5: *"Calculation errors in applicable taxes, specifically IGV ... and ISC... The case notes an 18% IGV rate, but tax rates, codes, and calculation rules must be verified against official SUNAT regulations before being treated as definitive."*
- **Description**: The system shall calculate applicable Peruvian taxes, including Value Added Tax (IGV) and Selective Consumption Tax (ISC), on line items and document totals using verified mathematical formulas and rounding rules.
- **Acceptance Criterion**: For any given taxable base, tax amounts and totals equal the verified formula results to 2 decimal places with half-up rounding, with zero discrepancy between line-item aggregates and document totals.
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Applicable ISC product lists and specific calculation modes).

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
  - Document Types (e.g., Catalogo 01).
  - Document Statuses.
  - Currencies (e.g., Catalogo 02 - PEN, USD).
- **Acceptance Criterion**: All stored transactions and generated XML documents use verified codes from the official SUNAT catalogs without arbitrary string values.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Complete list of active catalogs applicable to the company).

#### `FR-012`: Electronic Document Lifecycle and Status Tracking
- **Source**: Teacher Assessment
- **Status**: Inferred
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 5: *"The new system must consider Peruvian tax rules and SUNAT catalogs, including ... statuses..."*
- **Description**: The system shall manage the lifecycle states of an electronic document (e.g., Draft, Generated, Signed, Sent, Accepted, Rejected, Cancelled).
- **Acceptance Criterion**: State transitions follow an immutable state machine where documents cannot be modified once signed/sent, and rejections record the specific error code returned.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Specific state definitions under SUNAT regulations).

---

### 3.3 Module 3: Users, Invoicing Roles, and Demonstration Mode

#### `FR-013`: Role-Based Electronic Invoicing Workflows
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"It also requests use cases based on the needs of electronic invoicing users..."*
- **Description**: The system shall support role-based user workflows tailored to billing clerks, warehouse dispatchers, and accounting administrators.
- **Acceptance Criterion**: Users cannot access or execute operations outside their designated invoicing and warehouse roles.
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) (Formal matrix of user roles).

#### `FR-014`: Dedicated DEMO User and Isolated Sandbox Operation
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.1, Item 6: *"It also requests use cases based on the needs of electronic invoicing users and mentions a DEMO user."*
- **Description**: The system shall provide an explicit DEMO user profile allowing evaluators or trainees to execute invoicing and warehouse flows in a safe sandbox mode without creating official tax liabilities or altering production data.
- **Acceptance Criterion**: A user authenticated as DEMO can complete transactions with simulated outputs, clearly watermarked/flagged as demonstration data, without issuing legal tax documents or corrupting real historical records.
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) (Sandbox database vs. in-memory seed dataset for DEMO user).

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

### 3.5 Module 5: Supplementary Case — Goods Transport & Electronic Remission Guide (GRE)

> **Important Scope Notice**: Requirements in this section originate exclusively from the **Delegate's Supplementary Case**. They represent a specific transport scenario and must **not** be assumed to represent the entire system. Their status is **Pending Confirmation** regarding whether they form part of the evaluated core assessment.

#### `FR-018`: Electronic Remission Guide (GRE) Mandatory Dispatch Validation
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.2, Items 1 & 2: *"The narrative describes transporting merchandise to customers and requiring a valid Electronic Remission Guide (GRE) before the vehicle leaves."*
- **Description**: For customer merchandise transport orders, the system shall require and verify a valid, issued Electronic Remission Guide (*Guía de Remisión Electrónica* - GRE) before the transport vehicle is authorized for departure.
- **Acceptance Criterion**: The dispatch workflow blocks vehicle departure authorization until a GRE is in valid/approved status.
- **Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) (Core vs. supplementary scope status of GRE).

#### `FR-019`: UBL Dispatch Advice XML Generation
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.2, Item 3: *"It mentions UBL Dispatch Advice and XML validation using XSD."*
- **Description**: The system shall generate an XML document for the Electronic Remission Guide strictly conforming to the OASIS UBL Dispatch Advice schema (UBL 2.1).
- **Acceptance Criterion**: Generated GRE XML files contain the mandatory UBL Dispatch Advice root element (`<DespatchAdvice>`) and required transport/carrier/goods child nodes.
- **Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

#### `FR-020`: XSD Schema Validation for Electronic Remission Guide
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Evidence from Context**: `docs/00-context-and-scope.md` Section 2.2, Item 3: *"It mentions UBL Dispatch Advice and XML validation using XSD."*
- **Description**: The system shall validate the generated GRE XML against the official SUNAT XSD schemas prior to signing or transmitting to external endpoints.
- **Acceptance Criterion**: Any GRE XML payload containing missing mandatory tags, invalid formats, or illegal enumerations is caught by local XSD validation with explicit error diagnostics, preventing transmission.
- **Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

## 4. Traceability Summary Matrix

| Requirement ID | Module / Focus | Source | Status | Verifiable Criterion Summary |
|---|---|---|---|---|
| `FR-001` | Product Catalog | Assessment | Confirmed | Product data persisted in new system |
| `FR-002` | Transaction Dates | Assessment | Confirmed | Immutable timestamp recorded on all transactions |
| `FR-003` | Inbound Stock | Assessment | Confirmed | Stock balance increments upon receipt |
| `FR-004` | Outbound Dispatches | Assessment | Confirmed | Stock decrements, negative stock prevented |
| `FR-005` | Internal Tracking | Assessment | Confirmed | Unique, sequential internal document numbers |
| `FR-006` | Wholesale & Retail | Assessment | Confirmed | Dual-mode support for B2B and B2C flows |
| `FR-007` | RUC Validation | Assessment | Confirmed | Modulo 11 and structural validation rejection |
| `FR-008` | Tax Math (IGV/ISC) | Assessment | Confirmed | 2-decimal rounded tax calculation equals formula |
| `FR-009` | XML Generation | Assessment | Confirmed | Valid UBL XML produced without manual edits |
| `FR-010` | SUNAT/PSE Interface| Assessment | Confirmed | Interface sends payload and parses CDR response |
| `FR-011` | SUNAT Catalogs | Assessment | Confirmed | Validated SUNAT codes used across all docs |
| `FR-012` | Document Lifecycle | Assessment | Inferred | State machine enforces immutable transitions |
| `FR-013` | Invoicing Roles | Assessment | Confirmed | Access control for billing/warehouse roles |
| `FR-014` | DEMO User Mode | Assessment | Confirmed | Isolated sandbox operation without tax liabilities |
| `FR-015` | Read-Only Extract | Assessment | Confirmed | Hash-verified zero modification of legacy DB |
| `FR-016` | Data Ingestion | Assessment | Confirmed | 100% valid legacy records mapped and logged |
| `FR-017` | Logic Preservation| Assessment | Confirmed | Stock calculations match legacy outcomes |
| `FR-018` | GRE Departure Gate| Delegate Case| Pending Conf. | Vehicle dispatch blocked without valid GRE |
| `FR-019` | UBL Dispatch XML | Delegate Case| Pending Conf. | GRE generates valid UBL Dispatch Advice XML |
| `FR-020` | XSD Validation | Delegate Case| Pending Conf. | XML validated against XSD before sending |
