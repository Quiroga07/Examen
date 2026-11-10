# REST API Design Specification

This document describes the internal API contract in [openapi.yaml](./openapi.yaml), based on the approved requirements, use cases, and DTOs. Every operation in the contract carries requirement/use-case traceability.

## 1. Scope and conventions

- Base path: `/api/v1`; the API describes this application's operations only. It defines no external SUNAT/PSE/OSE URLs.
- Responses and request bodies use JSON unless an operation explicitly returns an XML or archived CDR artifact.
- GRE, DispatchAdvice, transport, and demonstration-sandbox behavior are outside the assessed API scope; no operations or payloads are defined for them.
- UBL and CDR semantics follow the compliance specifications. Product-specific ISC applicability and calculation inputs are not inferred by the API.

## 2. Authentication and common responses

All operations require HTTP bearer authentication using the `bearerAuth` scheme. The contract does not define token issuance, claims, credentials, or external identity-provider endpoints. Each operation documents:

- `401 Unauthorized` when credentials are missing or invalid.
- `403 Forbidden` when an authenticated caller is not authorized.

The response body for these errors, and for documented JSON errors, uses the existing `ErrorResponse` schema. The formal role/permission matrix remains open under [Q-03](../../docs/01-open-questions.md).

## 3. HTTP status semantics

| Status | Meaning in this contract |
|---|---|
| `200 OK` | Synchronous retrieval, validation, or transmission result |
| `201 Created` | Resource or movement created synchronously |
| `202 Accepted` | Invoice, baja, or migration request accepted for pending/asynchronous processing; `Location` identifies the resource to query |
| `400 Bad Request` | Malformed request or missing required input |
| `401 Unauthorized` | Missing or invalid bearer credentials |
| `403 Forbidden` | Caller lacks authorization |
| `404 Not Found` | Requested resource or artifact is unavailable |
| `409 Conflict` | State or uniqueness conflict, including duplicate invoice numbering |
| `422 Unprocessable Entity` | Semantically invalid request |
| `500 Internal Server Error` | Internal processing failure |
| `502 Bad Gateway` | Failure communicating with the configured provider during transmission or baja submission |

Invoice creation can return `201` when issuance completes synchronously or `202` when accepted but still pending. The `202` response uses a `Location` header to the invoice resource; it adds no processing-state field. Baja submission and migration submission return `202` with a `Location` header to their existing document/run resources; the resulting lifecycle or completed reconciliation summary is retrieved from those resources.

## 4. Operations and traceability

| Method and path | Operation ID | Requirement/use-case traceability |
|---|---|---|
| `POST /api/v1/warehouse/inbound-movements` | `recordInboundMovement` | FR-001, FR-002, FR-003, FR-005; UC-001 |
| `POST /api/v1/warehouse/outbound-movements` | `recordOutboundMovement` | FR-002, FR-004, FR-005, FR-006; UC-002 |
| `GET /api/v1/products` | `listProducts` | FR-001, FR-006 |
| `POST /api/v1/products` | `createProduct` | FR-001, FR-006, FR-011 |
| `GET /api/v1/products/{productId}` | `getProductById` | FR-001 |
| `GET /api/v1/catalogs/{catalogNumber}` | `getSunatCatalog` | FR-011, FR-023; UC-013 |
| `POST /api/v1/tax/ruc/validate` | `validateRucNumber` | FR-007; UC-003 |
| `POST /api/v1/invoices` | `issueElectronicInvoice` | FR-006–FR-009, FR-011–FR-012; UC-004, UC-005 |
| `GET /api/v1/invoices/{documentId}` | `getInvoiceById` | FR-012 |
| `GET /api/v1/invoices/{documentId}/xml` | `getInvoiceXml` | FR-009; UC-005 |
| `POST /api/v1/invoices/{documentId}/notes` | `issueCreditDebitNote` | FR-021, FR-009, FR-011, FR-012; UC-011 |
| `POST /api/v1/invoices/{documentId}/baja` | `requestInvoiceBaja` | FR-022, FR-012; UC-012 |
| `GET /api/v1/invoices/{documentId}/cdr` | `getInvoiceCdr` | FR-010, FR-012; UC-006, AC-010 |
| `POST /api/v1/invoices/{documentId}/transmit` | `transmitInvoice` | FR-010, FR-012; UC-006 |
| `POST /api/v1/migration/runs` | `executeMigrationRun` | FR-015, FR-016; UC-008 |
| `GET /api/v1/migration/runs/{migrationRunId}` | `getMigrationRunById` | FR-016; UC-008 |

## 5. Existing DTOs and artifact contracts

- Invoice creation, retrieval, and transmission use `IssueElectronicInvoiceRequest` and `ElectronicInvoiceResponse`. Duplicate invoice numbering returns `409`; request validation and tax/domain validation use the documented `400`/`422` responses.
- The invoice request carries the mapped operation type, payment terms, amount-in-words legend, buyer legal name, Catalog 07 affectation code, optional Catalog 08 ISC inputs, and optional Catalog 16 pricing reference. Their applicability is conditional where the approved DTO/profile says so.
- Invoice XML download returns the generated XML as `application/xml`.
- Credit/debit note issuance uses `CreateCreditDebitNoteRequest` with Catalog 01 document type `07` or `08` and existing invoice-line data; the path identifies the original Factura or Boleta. It returns an `ElectronicInvoiceResponse`.
- Baja submission takes the document ID in the path and no body because no additional request fields are established. It returns `202 Accepted` with a `Location` header to the existing document resource; `CANCELLED` is returned by that resource only after confirmation.
- SUNAT catalog lookup is read-only and returns `SunatCatalogEntry` code/description pairs for the requested supported `catalogNumber`.
- CDR download returns the archived artifact as `application/zip`, consistent with CDR archival in UC-006. It does not introduce a new JSON payload.
- `CdrResult` retains the raw response code and description. Code `0` indicates acceptance; `2000–3999` are rejection errors; `4000+` are observations. `0100–0999` SUNAT exceptions and `1000–1999` taxpayer format/structure exceptions are service/submission exceptions rather than CDR acceptance or rejection outcomes.
- Migration completion uses the existing `MigrationReconciliationSummary`; the actual legacy database table and column names remain unknown until its schema is available.

## 6. Contract questions that remain open

The capabilities and minimum API contracts below are confirmed by instructor grading feedback. The following specific business or regulatory details remain unresolved:

| Topic | Current contract treatment | Open detail |
|---|---|---|
| Credit/debit notes | `POST /invoices/{documentId}/notes` distinguishes Catalog 01 document types `07` and `08` and accepts existing invoice-line data | Reason codes, other mandatory note fields, eligibility, and adjustment semantics remain open under [Q-02](../../docs/01-open-questions.md). |
| Baja | `POST /invoices/{documentId}/baja` accepts the request and identifies the existing lifecycle resource | Eligibility, provider response/pending semantics, and any provider reference remain open under [Q-24](../../docs/01-open-questions.md). |
| SUNAT catalog queries | `GET /catalogs/{catalogNumber}` returns code/description pairs | Supported catalog numbers, versions/effective dates, and filtering needs remain open under [Q-25](../../docs/01-open-questions.md). |
| Invoice lifecycle representation | `ElectronicInvoiceResponse` includes `CANCELLED`; `202` identifies the invoice resource without a new status field | The DTO does not represent every lifecycle state in the domain/use cases (including pending retry); mapping and asynchronous persistence semantics need approval. |
| Bearer authentication | `bearerAuth`, `401`, and `403` are specified | Token issuance/claims and the role-permission matrix remain open under Q-03/Q-21. |
| Provider pathway | Transmission uses the internal provider adapter; `502` describes upstream communication failure | The authorized provider and test pathway remain open under [Q-12](../../docs/01-open-questions.md). |
| RUC verification | No external SUNAT URL is specified | Offline versus online validation scope remains open under [Q-13](../../docs/01-open-questions.md). |
| ISC | The contract exposes generic Catalog 08 line inputs without defaults | Product applicability and effective rates/units/reference-price inputs remain open under [Q-11](../../docs/01-open-questions.md). |
| UBL XML generator | The output port and named SUNAT/UBL mappings are specified | Full generator readiness remains partial: issuer configuration, exact profile-required fields/optionality, line tax-scheme serialization, test vectors, and PHP XSD-tool compatibility require confirmation under Q-07/Q-10/Q-22 and review finding `RV-01`. |

## 7. Specification references

- Requirements and use cases: [specs/requirements](../requirements)
- DTOs and schemas: [specs/domain/dtos-and-schemas.md](../domain/dtos-and-schemas.md)
- SUNAT/UBL compliance mapping: [specs/compliance/sunat-ubl-traceability.md](../compliance/sunat-ubl-traceability.md)
- Architecture boundaries: [specs/architecture](../architecture)
