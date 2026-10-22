# REST API Design Specification (`specs/api/api-design.md`)

## 1. Executive Summary and Architectural Context

This document establishes the official REST API design for ABC Software Corp.'s enterprise management and Peruvian electronic invoicing modernization project. It accompanies the formal [OpenAPI 3.0.3 Contract (`specs/api/openapi.yaml`)](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml).

### 1.1 Specification Decisions & Scope Boundaries
1. **OpenAPI 3.0.3 Project Standard**: OpenAPI 3.0.3 is adopted as the engineering contract definition language for this project unless the academic course or evaluation committee explicitly mandates a different specification format.
2. **Strict Application-Internal Scope**: All endpoints defined herein belong exclusively to ABC Software Corp.'s modernized system. **No external SUNAT, PSE, or OSE service URLs or endpoints are invented**. External interactions are encapsulated behind internal application integration adapters ([ADR-003](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md#adr-003-abstract-integration-adapter-for-sunat--pse--ose-transmission)).
3. **Use Case and Requirement Traceability**: Every API operation is derived directly from documented Use Cases ([specs/requirements/use-cases.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md)) and carries an `x-requirement-ids` extension linking it to Functional Requirements, Non-Functional Requirements, and Acceptance Criteria.
4. **Conditional GRE Scope Segregation**: In accordance with the teacher's assessment boundaries, all Electronic Remission Guide (*Guía de Remisión Electrónica* - GRE / UBL Despatch Advice) operations are excluded from the confirmed OpenAPI contract and documented conditionally in [Section 6](#6-conditional--proposed-api-operations-goods-transport-and-gre) pending scope resolution ([Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)).
5. **No Invented Mechanisms**: No authentication mechanisms, user roles, demo credentials, tax algorithms, or external endpoints have been fabricated. Unresolved items are logged in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. API Design Principles and Standards

### 2.1 URI Conventions
- **Base Path**: `/api/v1`
- **Resource Naming**: Plural nouns (e.g., `/products`, `/invoices`, `/migration/runs`), lowercase, hyphen-separated for multi-word paths (e.g., `/warehouse/inbound-movements`).
- **Sub-resources**: Natural hierarchy where ownership exists (e.g., `/invoices/{documentId}/xml`).

### 2.2 HTTP Methods and Semantics
| Method | Usage | Idempotency | Expected Success Status |
|---|---|---|---|
| `GET` | Retrieve resource state or list | Idempotent / Safe | `200 OK` |
| `POST` | Create resources, execute calculations, or trigger state machines | Non-Idempotent | `201 Created` or `200 OK` |

### 2.3 HTTP Status Code Catalog
- `200 OK`: Request succeeded; returns representation payload.
- `201 Created`: Resource successfully created or transaction posted; returns newly created entity.
- `400 Bad Request`: Syntactically invalid JSON, missing mandatory fields, or malformed data types.
- `404 Not Found`: Target resource identifier does not exist.
- `409 Conflict`: Business invariant violation (e.g., insufficient warehouse stock balance, duplicate SKU, or migration hash mismatch).
- `422 Unprocessable Entity`: Semantically invalid business payload (e.g., invalid RUC checksum, negative quantity, unmapped SUNAT catalog code).
- `500 Internal Server Error`: Unhandled server-side processing error.
- `502 Bad Gateway`: Failure communicating with configured external tax delivery adapter (SUNAT/PSE/OSE).

### 2.4 Content Negotiation & Serialization
- Default Request & Response: `Content-Type: application/json; charset=utf-8`
- Raw UBL XML Delivery: `Content-Type: application/xml; charset=utf-8` (for `/invoices/{documentId}/xml`)
- Monetary Amounts: Serialized as numerical decimals with exactly two fractional digits (`scale: 2`), avoiding binary floating-point drift (`NFR-009`).
- Timestamps: ISO-8601 strings in UTC (`YYYY-MM-DDTHH:mm:ssZ`).

### 2.5 Standard Error Response Schema (`ErrorResponse`)
All `4xx` and `5xx` error responses adhere to the standard schema defined in [specs/domain/dtos-and-schemas.md (Section 8)](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md#8-standardized-error-payload-schema):
```json
{
  "errorCode": "INVALID_RUC_CHECKSUM",
  "message": "The provided customer RUC does not satisfy statutory validation rules.",
  "target": "customer.identityNumber",
  "timestamp": "2026-10-22T10:30:00Z",
  "details": [
    "Modulo 11 check digit calculated: 7, received: 9"
  ]
}
```

---

## 3. Confirmed API Operations Catalog

The following table catalogs all operations implemented in [specs/api/openapi.yaml](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml):

| Module | HTTP Method | Endpoint Path | Operation ID | Derived Use Case | Requirement Traceability (`x-requirement-ids`) |
|---|---|---|---|---|---|
| **Warehouse** | `POST` | `/api/v1/warehouse/inbound-movements` | `recordInboundMovement` | [`UC-001`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-001-record-incoming-warehouse-goods) | `FR-001`, `FR-002`, `FR-003`, `FR-005`, `NFR-009`, `AC-003` |
| **Warehouse** | `POST` | `/api/v1/warehouse/outbound-movements` | `recordOutboundMovement` | [`UC-002`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-002-record-outgoing-warehouse-goods-sales--dispatches) | `FR-002`, `FR-004`, `FR-005`, `FR-006`, `AC-004` |
| **Products** | `GET` | `/api/v1/products` | `listProducts` | Product Catalog | `FR-001`, `FR-006`, `AC-001` |
| **Products** | `POST` | `/api/v1/products` | `createProduct` | Product Catalog | `FR-001`, `FR-006`, `FR-011`, `AC-001` |
| **Products** | `GET` | `/api/v1/products/{productId}` | `getProductById` | Product Catalog | `FR-001`, `AC-001` |
| **Tax Identity**| `POST` | `/api/v1/tax/ruc/validate` | `validateRucNumber` | [`UC-003`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-003-validate-taxpayer-identity-ruc-check) | `FR-007`, `NFR-009`, `AC-007`, `Q-13` |
| **Invoicing** | `POST` | `/api/v1/invoices` | `issueElectronicInvoice` | [`UC-004`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-004-compute-transaction-taxes-igv-and-isc), [`UC-005`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-005-generate-and-sign-electronic-document-xml) | `FR-006`, `FR-007`, `FR-008`, `FR-009`, `FR-011`, `FR-012`, `NFR-009`, `NFR-010`, `AC-008`, `AC-009` |
| **Invoicing** | `GET` | `/api/v1/invoices/{documentId}` | `getInvoiceById` | Invoice Lifecycle | `FR-012`, `AC-009` |
| **Invoicing** | `GET` | `/api/v1/invoices/{documentId}/xml` | `getInvoiceXml` | [`UC-005`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-005-generate-and-sign-electronic-document-xml) | `FR-009`, `NFR-010`, `AC-009` |
| **Invoicing** | `POST` | `/api/v1/invoices/{documentId}/transmit` | `transmitInvoice` | [`UC-006`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-006-transmit-document-to-sunat--pse--ose-and-process-cdr) | `FR-010`, `FR-012`, `NFR-012`, `AC-010`, `Q-12` |
| **DEMO Sandbox**| `POST`| `/api/v1/demo/sessions` | `initDemoSession` | [`UC-007`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-007-perform-invoicing-and-warehouse-simulation-as-demo-user) | `FR-014`, `NFR-011`, `AC-013`, `Q-03` |
| **Migration** | `POST` | `/api/v1/migration/runs` | `executeMigrationRun` | [`UC-008`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md#uc-008-execute-safe-non-destructive-migration-cycle) | `FR-015`, `FR-016`, `NFR-007`, `NFR-008`, `AC-014`, `AC-015` |
| **Migration** | `GET` | `/api/v1/migration/runs/{migrationRunId}`| `getMigrationRunById`| Migration Audit | `FR-016`, `NFR-008`, `AC-015` |

---

## 4. Specific Operation Details

### 4.1 RUC Validation Endpoint (`POST /api/v1/tax/ruc/validate`)
- **Purpose**: Validates customer tax identification numbers prior to sales or invoice drafting (`FR-007`, `UC-003`).
- **Request Schema**: `ValidateRucRequest` (`rucNumber: string`, 11 digits numeric).
- **Response Schema**: `ValidateRucResponse` (`rucNumber`, `isValid: boolean`, `validationMessage: string`, `legalPrefix: string`, `verificationSource: string`).
- **Handling of Unverified Details**:
  - No external SUNAT scraping endpoints, unofficial REST services, or Captcha solvers are invented.
  - The verification source defaults to statutory check digit analysis (`OFFLINE_MODULO_11`), while leaving online consultation marked as an open question ([Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration)).
- **Error Responses**:
  - `400 Bad Request`: Input is not an 11-digit numeric string.

### 4.2 Electronic Invoice Issuance (`POST /api/v1/invoices`)
- **Purpose**: Executes tax calculations, assigns series and correlative numbering, formats UBL 2.1 XML, and applies digital signature (`FR-006`, `FR-008`, `FR-009`, `UC-004`, `UC-005`).
- **Request Schema**: `IssueElectronicInvoiceRequest` (Customer identity, document type `01` or `03`, currency `PEN`/`USD`, lines with quantity and unit price).
- **Response Schema**: `ElectronicInvoiceResponse` (Legal document number, comprehensive `TaxBreakdown`, total payable, lifecycle state `SIGNED`, and XML digest).
- **Error Responses**:
  - `400 Bad Request`: Missing lines or invalid header attributes.
  - `422 Unprocessable Entity`: Customer RUC verification fails, line amount calculations drift from total, or unsupported tax affectation code.

### 4.3 Electronic Invoice Transmission (`POST /api/v1/invoices/{documentId}/transmit`)
- **Purpose**: Dispatches the signed XML payload in a compressed ZIP container to the configured tax provider adapter and registers the returned CDR response (`FR-010`, `FR-012`, `UC-006`).
- **Response Schema**: `ElectronicInvoiceResponse` updated with `lifecycleStatus: ACCEPTED` or `REJECTED`, and full `CdrResult` (`cdrCode`, `cdrDescription`, `receivedTimestamp`).
- **Handling of Unverified Details**: The transmission adapter connects either to SUNAT Beta services, a PSE/OSE, or a hermetic local mock simulator as determined by the evaluation committee under [Q-12](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration). No production endpoints or live tax credentials are hardcoded.
- **Error Responses**:
  - `404 Not Found`: Invoice ID not found.
  - `409 Conflict`: Invoice is not in a transmittable state (e.g., already `ACCEPTED`).
  - `502 Bad Gateway`: Downstream network timeout or gateway failure.

### 4.4 DEMO User Sandbox Endpoint (`POST /api/v1/demo/sessions`)
- **Purpose**: Initializes an isolated demonstration session executing warehouse and invoicing workflows in a safe sandbox (`FR-014`, `UC-007`, `AC-013`).
- **Request Schema**: `DemoSessionInit` (`requestedBy: string`, `seedCatalogType: string`).
- **Response Schema**: `DemoSimulationResult` (`sessionId: string`, `isDemo: true`, `watermarkText: "DEMO / NOT VALID FOR TAX"`, `simulatedXml: string`, `simulatedCdr: CdrResult`, `productionEmissionsBlocked: true`).
- **Handling of Unverified Details**:
  - Zero hardcoded credentials (no invented `demo/demo` passwords).
  - Zero arbitrary roles, personal data, or permissions assumed.
  - All sandbox operational parameters are documented as pending confirmation under [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

### 4.5 Legacy Migration Execution (`POST /api/v1/migration/runs`)
- **Purpose**: Triggers read-only staging extraction from Visual FoxPro 9, verifies database file hash immutability (`NFR-007`), maps valid records, logs rejected rows, and produces mathematical reconciliation proof (`FR-015`, `FR-016`, `UC-008`).
- **Response Schema**: `MigrationReconciliationSummary` (`totalSourceRecords`, `successfullyMigrated`, `rejectedRecords`, `reconciliationFormulaValid: true`).
- **Error Responses**:
  - `409 Conflict`: Source DBF SHA-256 hash changed during execution or source file lock detected.

---

## 5. Security and Authentication Boundaries

### 5.1 Status of Authentication & Authorization
In strict compliance with the directive: **"Do not invent security mechanisms, roles, permissions, or personal data"**:
- Authentication schemes (e.g., HTTP Bearer JWT tokens, OAuth 2.0, or session cookies) are **not hardcoded** into the OpenAPI contract.
- The authentication mechanism is recorded as an open architectural decision pending confirmation under [Q-07 (Technology Platform)](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) and [Q-21 (API Security)](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).
- Role-based authorization controls (`FR-013`, `AC-012`) will be applied once the formal role matrix requested in [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) is provided by the evaluation committee.

---

## 6. Conditional / Proposed API Operations: Goods Transport and GRE

> **Important Scope Notice**: In accordance with the teacher's assessment, the Electronic Remission Guide (*Guía de Remisión Electrónica - GRE*) originates exclusively from the **Delegate's Supplementary Case**. It remains **Conditional / Pending Confirmation** ([Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)).
> 
> Therefore, these endpoints are **excluded from the confirmed `openapi.yaml` contract** and documented below as proposed specifications if the course confirms GRE inclusion:

### 6.1 Proposed Operation: `POST /api/v1/transport/gre` (CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Purpose**: Generates and digitally signs an Electronic Remission Guide (GRE) for public or private customer merchandise transport (`FR-018`, `FR-019`, `UC-009`, `AC-020`).
- **Request Payload**: Reuses `CreateGreRequestDto` ([specs/domain/dtos-and-schemas.md Section 7.1](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md#71-creategrerequestdto-conditional)):
  - Transfer reason (Cat. 20), Transport mode (Cat. 18 `01` Public / `02` Private), Total gross weight in KGM.
  - Origin and destination UBIGEO district codes and physical addresses.
  - Carrier details (for public transport) or Vehicle plate and driver DNI/license (for private transport).
- **Response Payload**: Reuses `GreValidationResultDto` ([specs/domain/dtos-and-schemas.md Section 7.2](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md#72-grevalidationresultdto-conditional)):
  - `isXsdValid: boolean`, `xmlPayloadHash: string`, `schemaErrors: string[]`.
- **Expected Status Codes**:
  - `201 Created`: GRE generated, digitally signed, and validated against local XSD.
  - `400 Bad Request`: Missing mandatory driver, vehicle, or transport reason fields.
  - `422 Unprocessable Entity`: Local XSD validation failure (`FR-020`, `AC-021`).

### 6.2 Proposed Operation: `GET /api/v1/transport/gre/{greId}/departure-clearance` (CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Purpose**: Gate clearance verification ensuring vehicles cannot exit the warehouse without an accepted, XSD-verified GRE (`FR-018`, `UC-009`, `AC-019`).
- **Response Payload**: Reuses `GreDepartureClearanceDto` ([specs/domain/dtos-and-schemas.md Section 7.3](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md#73-gredepartureclearancedto-conditional)):
  - `transportOrderId`, `greNumber`, `departureCleared: boolean`, `clearanceTimestamp: DateTime`, `gateMessage: string`.
- **Expected Status Codes**:
  - `200 OK`: Returns clearance status and gate authorization message.
  - `404 Not Found`: GRE ID not found.

---

## 7. Traceability Cross-Reference to Core Specifications

The API design ties directly into the project's analytical specifications:

- **Requirements**: Every operation maps to functional IDs in [specs/requirements/functional-requirements.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/functional-requirements.md).
- **Use Cases**: Endpoints directly implement interactors described in [specs/requirements/use-cases.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/requirements/use-cases.md).
- **DTOs and Schemas**: Schemas in `openapi.yaml` strictly mirror the contracts defined in [specs/domain/dtos-and-schemas.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/domain/dtos-and-schemas.md).
- **Architecture**: Endpoints serve as the driving HTTP adapters in the Hexagonal Architecture evolution ([specs/architecture/future-hexagonal.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md)).
- **Regulatory Matrix**: Documented in [specs/compliance/sunat-ubl-traceability.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/sunat-ubl-traceability.md).

---

## 8. Summary of Unresolved Decisions & Open Questions

The following technical and architectural decisions are pending official clarification:

| Decision Area | Question ID | Summary of Ambiguity | Impact on API Contract |
|---|---|---|---|
| **GRE Inclusion** | [`Q-01`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) | Is GRE part of evaluated scope? | Determines whether `/transport/gre` operations move into the confirmed contract. |
| **CPE Document Types**| [`Q-02`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) | Are Credit/Debit Notes required? | Will add `/credit-notes` and `/debit-notes` endpoints if confirmed. |
| **DEMO User Profile** | [`Q-03`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries) | Credentials, role boundaries, and evaluation workflows. | Governs authentication headers and sandbox seed parameters. |
| **Technology Stack** | [`Q-07`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) | Target language, web framework, and runtime. | Dictates backend framework implementation of OpenAPI schemas. |
| **SUNAT Test Pathway**| [`Q-12`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) | SUNAT Beta vs. PSE/OSE vs. hermetic mock simulator. | Dictates backend configuration of the `/invoices/{id}/transmit` adapter. |
| **RUC Validation Method**| [`Q-13`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) | Offline Modulo 11 check vs. online SUNAT padrón query. | Dictates whether `/tax/ruc/validate` is purely local or delegates to external adapter. |
| **Costing & Inventory**| [`Q-18`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) | Inventory unit valuation (costing) required? | Governs whether `unitCost` in inbound movement lines is mandatory or optional. |
| **API Authentication**| [`Q-21`](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) | REST authentication standard (JWT Bearer vs. Session Cookie). | Dictates OpenAPI `components.securitySchemes` definitions. |
