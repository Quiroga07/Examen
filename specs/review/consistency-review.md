# Architectural and Quality Consistency Review (`specs/review/consistency-review.md`)

**Final instructor-feedback review:** The requirements and matrix identify all five case-stated legacy facts, while preserving physical schema names as unknown. Formats 12.1/14.1, the three ISC systems and applicable CDR response categories are documented with the cited official sources. The MVC and future Hexagonal designs retain the XML-generation output port and now trace the note, baja, and catalog capabilities. GRE, DispatchAdvice, transport, and demo-sandbox behavior remain deferred. This review corrected date/number semantics, synchronized related API schemas, and recorded remaining generator and business decisions as pending.

## 1. Overview and Quality Gate Purpose

This document reviews the quality, architecture, and regulatory consistency of the specifications prepared for ABC Software Corp. It verifies that:
1. The four assessment deliverables are represented and their gaps are recorded; representation does not mean every pending implementation decision is resolved.
2. The core assessment directives—specifically **RUC validation**, the **DEMO user profile**, **preservation of legacy Visual FoxPro data and business logic**, and the explicit deferral of GRE/transport and demo-sandbox behavior—are faithfully executed without invented assumptions.
3. No premature implementation details, fabricated external URLs, unverified credentials, or unsupported database schemas have leaked into the analytical baseline.
4. All technical ambiguities and missing information are formally cataloged in the open-questions registers.

---

## 2. Assessment Deliverables Audit

| Deliverable Mandate | Associated Repository Artifacts | Completeness & Compliance Evaluation |
|---|---|---|
| **Deliverable 1: Domain Model, DTOs, and Validation Schemas** | - [`specs/domain/domain-model.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md)<br>- [`specs/domain/dtos-and-schemas.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md) | **UPDATED; PARTIAL**: Models Catalog 08 ISC systems `01`/`02`/`03`, line-level calculation data, and named invoice mappings. Product-specific applicability, rates, units, and full invoice profile inputs remain pending. |
| **Deliverable 2: Architecture Specifications & Mermaid Diagrams** | - [`specs/architecture/mvc-current.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md)<br>- [`specs/architecture/future-hexagonal.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md)<br>- [`specs/architecture/architecture-decisions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md)<br>- [`specs/architecture/deployment-options.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/deployment-options.md)<br>- [`diagrams/mvc-current.mmd`](file:///c:/Users/LOQ/Documents/GitHub/Examen/diagrams/mvc-current.mmd)<br>- [`diagrams/future-hexagonal.mmd`](file:///c:/Users/LOQ/Documents/GitHub/Examen/diagrams/future-hexagonal.mmd) | **UPDATED; REVIEWED**: MVC remains the initial architecture, evolving toward Hexagonal Architecture; the XML-generation port is explicit. Note, baja, and catalog requirements now trace to components/ports. PHP/Laravel/Docker is the Partial Exam 2 stack; exact versions and a compatible XML tool remain open. |
| **Deliverable 3: API & Service Contracts** | - [`specs/api/openapi.yaml`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>- [`specs/api/api-design.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md) | **UPDATED; STRUCTURAL LINT UNVERIFIED**: Includes bearer security, HTTP responses, mapped invoice fields, and note, baja, CDR-download, and catalog operations. Full OpenAPI parser/linter validation was unavailable without installing tooling. |
| **Deliverable 4: SUNAT & UBL Compliance Traceability Matrix** | - [`specs/compliance/sunat-ubl-traceability.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/sunat-ubl-traceability.md)<br>- [`specs/compliance/regulatory-open-questions.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md) | **UPDATED**: Adds the requested catalog and UBL paths, full CDR status ranges, and supported format contracts with official-source/version citations. Business-specific applicability remains open. |

---

## 3. Deep-Dive Compliance Verification of Key Assessment Items

### 3.1 Item 1: Taxpayer RUC Validation
- **Requirement Grounding**: Grounded directly in the assessment's problem statement (*"The legacy system suffers from ... difficulty validating RUC numbers"*).
- **Identifier**: Assigned stable ID [`FR-007`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md#fr-007-validate-taxpayer-ruc-numbers).
- **Traceability Linkages**:
  - Use Case: [`UC-003`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-003-validate-taxpayer-identity-ruc-check) (*Validate Taxpayer Identity*).
  - Acceptance Criterion: [`AC-007`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/acceptance-criteria.md#ac-007-ruc-number-structural-and-identity-validation).
  - Domain Model: `RucNumber` Value Object, Domain Invariant `INV-004` ([specs/domain/domain-model.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/domain-model.md)).
  - DTOs: `ValidateRucRequestDto`, `ValidateRucResponseDto` ([specs/domain/dtos-and-schemas.md Section 4.1](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md#41-validaterucrequestdto-and-validaterucresponsedto)).
  - Architecture: Inbound port `IValidateRucPort` ([specs/architecture/future-hexagonal.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md)), `BillingController` ([specs/architecture/mvc-current.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md)).
  - Compliance Matrix: Mapped in [specs/compliance/sunat-ubl-traceability.md Section 4](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/sunat-ubl-traceability.md#4-traceability-matrix-electronic-invoices-cpe---facturas--boletas) to `/Invoice/.../PartyIdentification/cbc:ID` and SUNAT Catálogo No. 06 Code `6`.
  - API Endpoint: Defined in [specs/api/openapi.yaml](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) as `POST /api/v1/tax/ruc/validate` and enforced within `POST /api/v1/invoices`.
- **Invention Guard**: Zero external SUNAT scrape URLs, captcha solvers, or unverified endpoints have been invented.
- **Unresolved Decision Logged**: Formally cataloged in [docs/01-open-questions.md (Q-13)](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) and [specs/compliance/regulatory-open-questions.md (REG-07)](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/regulatory-open-questions.md#item-reg-07-ruc-validation-scope-offline-vs-online-padrón) to verify whether validation is evaluated as an offline Modulo 11 check digit algorithm or an online query against SUNAT's *Padrón Reducido RUC*.

### 3.2 Item 2: DEMO User Profile and Deferred Sandbox
- **Requirement Grounding**: The assessment mentions a DEMO user; this does not establish sandbox isolation, simulated invoices/CDRs, or live-emission blocking.
- **Active Requirement**: [`FR-014`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md#fr-014-demo-user-profile) retains the profile requirement; credentials and access rights remain open under `Q-03`.
- **Scope**: Sandbox behavior, demo DTOs, GRE, DispatchAdvice, and transport are deferred. No active contracts or operations for them are defined in this phase.

### 3.3 Item 3: Preservation of Visual FoxPro 9 Data and Business Logic
- **Requirement Grounding**: Grounded in the assessment's directive (*"preserve historical data and valid existing business logic. The existing database must not be damaged or deleted"*).
- **Identifiers**: [`FR-015`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md#fr-015-non-destructive-legacy-data-extraction), [`FR-016`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md#fr-016-historical-data-cleansing-transformation-and-ingestion), [`FR-017`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md#fr-017-preservation-of-valid-legacy-business-logic), [`NFR-007`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/non-functional-requirements.md#nfr-007-absolute-preservation-and-immutability-of-legacy-database), [`NFR-008`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/non-functional-requirements.md#nfr-008-migration-mathematical-reconciliation-integrity).
- **Traceability Linkages**:
  - Use Case: [`UC-008`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-008-execute-safe-non-destructive-migration-cycle).
  - Acceptance Criteria: [`AC-014`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/acceptance-criteria.md#ac-014-zero-modification-of-legacy-database-files) (SHA-256 hash identity), [`AC-015`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/acceptance-criteria.md#ac-015-mathematical-reconciliation-formula-integrity) ($N_{\text{src}} = N_{\text{mig}} + N_{\text{rej}}$), [`AC-016`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/acceptance-criteria.md#ac-016-preservation-and-verification-of-legacy-business-logic).
  - Migration Specifications: [`specs/migration/legacy-data-inventory.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/legacy-data-inventory.md) and [`specs/migration/mapping-and-reconciliation.md`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/mapping-and-reconciliation.md).
  - Architecture: [`ADR-004`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md#adr-004-non-destructive-read-only-legacy-extraction-and-staging-pipeline), `MigrationPipelineModule`, `LegacyReaderAdapter`.
  - API Endpoints: `POST /api/v1/migration/runs` and `GET /api/v1/migration/runs/{id}` in [specs/api/openapi.yaml](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml).
- **Invention Guard**: No FoxPro table names (e.g., `ARTICULOS.DBF`, `KARDEX.DBF`), column schemas, index tags, or code routines were fabricated.
- **Unresolved Decisions Logged**: Detailed inspection protocol established; physical schema dump ([`Q-04`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)), business logic location ([`Q-05`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)), soft-delete policy ([`Q-16`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)), and code page encoding ([`Q-17`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)) are explicitly marked as blocking inputs.

### 3.4 Item 4: Deferred GRE / DispatchAdvice and Transport
- **Scope Decision**: GRE, DispatchAdvice, and transport are outside the active assessed scope. Legacy identifiers for related requirements, use cases, and criteria are retained only as deferred traceability references.
- **Current Specifications**: No active domain or DTO contracts or operations for these concepts are defined; their IDs remain deferred.

---

## 4. Cross-Specification Consistency Checks

| Boundary | Cross-Checked Specifications | Consistency Finding | Status |
|---|---|---|---|
| **Legacy facts vs. migration** | `00-context-and-scope.md`, `legacy-data-inventory.md`, `mapping-and-reconciliation.md` | Date, incoming movement, outgoing movement, product, and internal document number each map to target concepts. Actual VFP table/column names and types remain unknown under Q-04. | **Conceptual mapping consistent; physical mapping pending** |
| **Requirements vs. Use Cases / Criteria** | `functional-requirements.md`, `use-cases.md`, `acceptance-criteria.md` | Active requirement IDs map to use cases/criteria; notes, baja, and catalog queries trace to instructor feedback. Supplementary GRE/transport and sandbox IDs remain deferred. | **Consistent; unconfirmed business behavior remains pending** |
| **Domain Model vs. DTOs** | `domain-model.md`, `dtos-and-schemas.md` | Movement dates are date-only; internal numbers are opaque values distinct from SUNAT numbering; line Catalog 07 affectation uses `TaxExemptionReasonCode`; lifecycle includes `TRANSMITTED`; CDR outcome categories agree. | **Aligned; full invoice profile inputs remain pending** |
| **DTOs vs. OpenAPI 3.0.3** | `dtos-and-schemas.md`, `openapi.yaml` | Invoice request schemas include the documented operation type, payment terms, legend, buyer name, tax affectation, ISC, and pricing-reference data. Note, baja, CDR-download, and catalog operations remain scoped and traceable. | **Structurally cross-checked; full YAML lint unverified** |
| **Architecture vs. API / Requirements** | MVC and Hexagonal specs/diagrams, `openapi.yaml` | XML generation remains behind `IUblGeneratorPort`; note issuance, baja, and read-only catalog query now have controller/use-case/port references. | **Consistent at specification level; implementations not assessed** |
| **SUNAT–UBL vs. Domain/API** | `sunat-ubl-traceability.md`, domain/DTOs, `openapi.yaml` | Named UBL paths link to invoice fields; formats 12.1/14.1 and CDR categories have source-backed traceability. The API request is not a complete profile specification. | **Named mappings verified; implementation profile remains partial** |
| **OpenAPI security/responses** | `openapi.yaml`, `api-design.md`, Q-21 | Bearer authentication is required; `401`/`403`, duplicate-number `409`, asynchronous `202`, and applicable provider `502` semantics are documented. Token issuance/claims and authorization policy remain open. | **Contract covered; implementation policy pending** |

---

## 5. Historical Corrections Log

The following items describe earlier review phases and are retained as history; they are not the result of this final review.

During the consistency review, minor cross-referencing and formatting items were identified and corrected:
1. **RUC Modulo 11 Formula Duplication in Traceability Matrix**:
   - *Finding*: `specs/compliance/sunat-ubl-traceability.md` Section 6.1 contained an accidental duplicate formula snippet for the Modulo 11 check digit.
   - *Correction*: Cleaned up duplicate formula lines using `replace_file_content` to maintain clean presentation.
2. **Traceability Table Status Formatting**:
   - *Finding*: `functional-requirements.md` summary table listed `FR-007` acceptance summary with an unconditioned mention of Modulo 11.
   - *Correction*: Updated table cell to explicitly declare that input validation does not assume unverified external endpoints and is subject to Q-13.
3. **Traceability Linkage to REST Endpoints**:
   - *Finding*: `specs/compliance/sunat-ubl-traceability.md` originally mapped regulatory items only to UBL XPaths without explicit API endpoint references.
   - *Correction*: Added an `API Operation (Contract)` column linking each regulatory item directly to the corresponding endpoint in `specs/api/openapi.yaml`.
4. **Missing REST Authentication Open Decision**:
   - *Finding*: The OpenAPI 3.0.3 specification intentionally omitted security schemes to avoid inventing mechanisms, but this was not tracked as a distinct numbered open question.
   - *Correction*: Formally logged as `Q-21` in `docs/01-open-questions.md` and cross-referenced in `api-design.md`.

---

### 5.1 Final Review Findings

#### `RV-01`: UBL Invoice 2.1 Generator Readiness — Partial
- The MVC and future Hexagonal designs specify the same boundary: `GenerateInvoiceXmlUseCase` depends on `IUblGeneratorPort`; infrastructure owns replaceable XSD-generated classes/serialization.
- The internal `UblInvoiceGenerationData` shape, field types/cardinalities, UBL paths, and distinction between XSD and business/input-contract requiredness are specified separately from the API request DTO in `specs/domain/dtos-and-schemas.md` section 4.2.1.
- The isolated `tools/ubl-xsd-poc/` proves generation from the full local official UBL 2.1 schema bundle, serialization of a synthetic fixture, and local Invoice XSD validation. A root Composer dry run also resolved its two runtime packages as normal dependencies without proposed upgrades or downgrades; production dependencies and adapter code are not integrated.
- The project defines `productId` as an internal UUID/alphanumeric Product identifier, but does not establish that it is seller-assigned or assigned under a standard system; its UBL item-identification mapping remains open. `description` maps to `Item/Description`, and `unitPrice` maps to `Price/PriceAmount`; tax inclusion/exclusion for that amount remains unresolved.
- Production sources for issuer data and legal numbering, unit selection, applicable tax schemes/subtotal grouping, calculations/rounding, document-tax-total emission, profile-required fields/optionality, and an approved profile-level XML oracle remain unresolved under Q-26 and the related business questions. UBL XSD requires `TaxCategory` and its `TaxScheme` for each subtotal, but permits `TaxTotal` without subtotals and document-level totals to be absent. The proposed internal rule requiring a subtotal when a total input is supplied reconciles ADR-007's explicit scheme-ID requirement but remains a proposal. Whether an input value is required by the internal contract does not establish a SUNAT profile rule.
- **Verdict**: The specified input shape and isolated XSD proof permit a scoped adapter implementation using explicit inputs. The specifications do **not** justify claiming a fully SUNAT-profile-conformant generator. The full invoicing application is not a prerequisite for isolated tests.

#### `RV-02`: Legacy Date and Internal Number Semantics — Corrected
- The case establishes a date, not a timestamp or timezone, and an internal document number, not a SUNAT series/correlative.
- Domain, DTO, API, and traceability now use date-only movement values and preserve internal numbers without assumed structure or generation. Migration maps all five facts conceptually; physical source names, types, and relationships remain unknown under Q-04.
- Movement request schemas no longer require a cause, supplier reference, sales mode, or buyer identity. The optional unit-cost field remains pending under Q-18 and is not treated as a legacy fact.
- Supplier/transfer causes, inventory adjustments/write-offs, and business-specific product attributes are not treated as legacy facts. Target workflow examples do not establish old schema fields.

#### `RV-03`: CDR Categories and Lifecycle — Corrected
- The domain/DTO semantics distinguish CDR `0` acceptance, `2000–3999` rejections, `4000+` observations, and `0100–0999`/`1000–1999` service/submission exceptions. The status model includes `TRANSMITTED`; an exception response is not represented as a CDR outcome.

#### `RV-04`: Requirement-to-Architecture/API Links — Updated
- `FR-021`–`FR-023` trace through `UC-011`–`UC-013`, `AC-022`–`AC-024`, domain/DTO contracts, MVC controllers/use cases, Hexagonal ports, and OpenAPI operations.
- The API contract uses bearer authentication and the requested response semantics. Q-21 concerns token issuer/claims and authorization policy, not the already-selected bearer scheme.
- OpenAPI security/response/schema references and operation structure received local structural checks. No parser/linter is installed or available in the workspace; full OpenAPI lint is unverified.

#### `RV-05`: Remaining Unsupported or Conditional Business Detail
- Exact product-tax applicability/rates, ICBPER applicability, payment policy, Catalog 51 profile selection, note rules, baja eligibility/provider outcomes, and catalog coverage/versioning remain pending under Q-11, Q-20, Q-19, Q-22, Q-02, Q-24, and Q-25 respectively.
- Target DTO fields and workflow examples beyond the five legacy facts are not evidence of physical legacy columns; migration source names and types remain explicitly unknown.
- GRE, DispatchAdvice, transport, and demo-sandbox behavior are deferred, with no active API operation or requirement behavior for them.

## 6. Academic Readiness Verdict

### **VERDICT: GENERATOR MAY PROCEED ONLY AS A SCOPED, TESTABLE ADAPTER**

The approved UBL 2.1 baseline and named element mappings permit isolated serializer work and unit tests with explicitly supplied fixtures. Full generator conformance is **not ready** until Q-07/Q-10/Q-11/Q-19/Q-22/Q-26 decisions and approved test vectors resolve the missing profile/input contract. No pending item is marked complete.
