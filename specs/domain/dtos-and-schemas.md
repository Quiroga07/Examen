# DTOs and Validation Schemas Specification (`specs/domain/dtos-and-schemas.md`)

## 1. Document Overview
This document specifies the Data Transfer Objects (DTOs) and formal contract schemas for ABC Software Corp.'s enterprise system modernization. These DTOs define the input, output, and inter-module communication payloads across warehouse operations, tax calculation, electronic invoicing, and migration staging.

**Instructor-feedback note:** This revision adds the three Catalog 08 ISC systems, the requested SUNAT–UBL invoice fields, and verified CDR/format data contracts. Business-specific tax applicability remains open.

In accordance with the spec-first methodology:
- Every DTO and schema field is tied directly to its governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `UC-xxx`, `AC-xxx`).
- DTOs are classified as **Confirmed**, **Proposed**, or **Business-Specific / Pending Confirmation**.
- Specifications are technology-agnostic (using language-neutral types: `String`, `Integer`, `Decimal`, `Boolean`, `DateTime`, `Enum`).
- No arbitrary external endpoints, uninspected Visual FoxPro tables, or speculative frameworks are assumed.

---

## 2. Classification Legend
- **Confirmed**: Payload structures mandated by core assessment requirements.
- **Proposed**: Clean architectural contracts designed to support confirmed requirements without coupling to concrete frameworks.
- **Business-Specific / Pending Confirmation**: Product tax applicability, rates, units, and payment policies not stated in the assessment.

---

## 3. Warehouse and Inventory DTOs

### 3.1 `CreateInboundMovementRequestDto`
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-002`, `FR-003`, `FR-005`, `UC-001`, `AC-003`
- **Purpose**: Input payload for recording incoming merchandise into the warehouse (supplier reception or transfer).

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transactionTimestamp` | `DateTime` | Mandatory | Cannot be in future; defaults to current system time | Date and time of receipt (`FR-002`) |
| `internalTrackingNumber` | `String` | Optional | If omitted, auto-generated sequentially | Optional pre-assigned internal voucher |
| `supplierReference` | `String` | Optional | Max 50 chars | External supplier invoice/remission guide |
| `lines` | `List<MovementLineDto>`| Mandatory | At least 1 item required | Line items received |

#### Sub-DTO: `MovementLineDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `productId` | `String` | Mandatory | Must match active `Product` | Product identifier |
| `quantity` | `Decimal` | Mandatory | Strictly $> 0.00$; scale 2 | Physical quantity received |
| `unitCost` | `Decimal` | Optional | $\ge 0.00$; scale 2 | Acquisition cost per unit |

---

### 3.2 `CreateOutboundMovementRequestDto`
- **Status**: Confirmed
- **Traces to**: `FR-002`, `FR-004`, `FR-005`, `FR-006`, `UC-002`, `AC-004`
- **Purpose**: Input payload for recording merchandise departures (wholesale dispatch, retail sale, or write-off).

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transactionTimestamp` | `DateTime` | Mandatory | Cannot be in future | Date and time of dispatch (`FR-002`) |
| `operationMode` | `Enum` | Mandatory | `WHOLESALE` or `RETAIL` | Commercial operation mode (`FR-006`) |
| `customerIdentity` | `String` | Conditional | Mandatory if `WHOLESALE` | Customer RUC or identification |
| `lines` | `List<MovementLineDto>`| Mandatory | At least 1 item required | Line items dispatched |

---

### 3.3 `WarehouseMovementResponseDto`
- **Status**: Confirmed
- **Traces to**: `FR-002`, `FR-003`, `FR-004`, `FR-005`, `AC-002`, `AC-005`
- **Purpose**: Output payload returned after recording any warehouse movement.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `movementId` | `String` | Mandatory | Immutable unique movement identifier |
| `internalTrackingNumber` | `String` | Mandatory | Assigned sequential internal tracking voucher (`FR-005`) |
| `movementType` | `Enum` | Mandatory | `INBOUND_PURCHASE`, `OUTBOUND_SALE`, `ADJUSTMENT` |
| `transactionTimestamp` | `DateTime` | Mandatory | Immutable recorded timestamp (`FR-002`, `AC-002`) |
| `totalItemCount` | `Integer` | Mandatory | Number of distinct product lines |
| `totalQuantity` | `Decimal` | Mandatory | Sum of all line quantities |
| `status` | `String` | Mandatory | Current movement status (`POSTED`) |

---

### 3.4 `ProductCatalogItemDto`
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-006`, `AC-001`
- **Purpose**: Data contract for creating or representing catalog product items.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `productId` | `String` | Mandatory | Unique identifier | Product internal ID |
| `productCode` | `String` | Mandatory | Non-blank, max 30 chars | Commercial SKU / code |
| `description` | `String` | Mandatory | Non-blank, max 250 chars | Commercial item name (`FR-001`) |
| `unitOfMeasure` | `String` | Mandatory | SUNAT Cat. 03 code (e.g., `NIU`) | Unit of measurement (`FR-011`) |
| `unitPrice` | `Decimal` | Mandatory | $\ge 0.00$; scale 2 | Base sales price (`FR-006`) |
| `currency` | `String` | Mandatory | `PEN` or `USD` | ISO currency code (`FR-011`) |
| `taxCategory` | `String` | Mandatory | Valid SUNAT Cat. 07 code | Tax regime code (`FR-008`, `FR-011`) |
| `iscTaxConfiguration` | `IscTaxConfigurationDto` | Optional | Only for a product confirmed as ISC-applicable; Catalog 08 code `01`, `02`, or `03` | Effective-dated ISC system and configured statutory inputs; no default applicability or rate |
| `isActive` | `Boolean` | Mandatory | Default `true` | Operational availability |

#### Sub-DTO: `IscTaxConfigurationDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `systemCode` | `String` | Conditional | SUNAT Catalog 08: `01`, `02`, or `03` | `01` al valor; `02` específico; `03` al precio de venta al público |
| `effectiveFrom` / `effectiveTo` | `Date` | Conditional | Date-bounded where the official schedule changes | Effective period of the selected official schedule |
| `ratePercent` | `Decimal` | Conditional | Use only where the applicable system and official schedule define a percentage | Scheduled rate input; value remains business-specific |
| `amountPerUnit` | `Decimal` | Conditional | Use only for applicable specific-system schedules | Scheduled amount and its measurement unit |
| `publicSalePrice` | `Decimal` | Conditional | Use only where the applicable system requires it | Legally defined public-sale-price basis for system 03 |
| `tierRange` | `String` | Conditional | Required for positive-base ISC invoice lines per current SUNAT validation; do not set on non-ISC lines | UBL `TierRange` value; do not infer a code |

---

## 4. Tax Compliance and Electronic Invoicing DTOs

### 4.1 `ValidateRucRequestDto` and `ValidateRucResponseDto`
- **Status**: Confirmed
- **Traces to**: `FR-007`, `UC-003`, `AC-007`, `Q-13`
- **Purpose**: Contract for validating Peruvian single taxpayer registration numbers (RUC).
- **Specification Constraint**: In accordance with the teacher's assessment, no external SUNAT endpoints, scraping routines, or unverified integration methods are invented. The specific validation mechanism (statutory offline check digit vs. online SUNAT consultation) is subject to confirmation under [Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

#### `ValidateRucRequestDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `rucNumber` | `String` | Mandatory | Exactly 11 digits, numeric characters only | RUC candidate string to validate |

#### `ValidateRucResponseDto`
| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `rucNumber` | `String` | Mandatory | The evaluated RUC string |
| `isValid` | `Boolean` | Mandatory | `true` if length, prefix, and Modulo 11 check digit pass |
| `validationMessage` | `String` | Mandatory | Descriptive validation result or failure explanation |
| `legalPrefix` | `String` | Optional | Extracted prefix (e.g., `20` Legal Entity, `10` Natural Person) |
| `verificationSource` | `String` | Mandatory | `OFFLINE_MODULO_11` (or online if confirmed in `Q-13`) |

---

### 4.2 `IssueElectronicInvoiceRequestDto`
- **Status**: Confirmed
- **Traces to**: `FR-006`, `FR-008`, `FR-009`, `FR-011`, `UC-004`, `UC-005`, `AC-008`
- **Purpose**: Contract requesting the generation, tax computation, and issuance of an electronic invoice (Factura or Boleta).

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `documentType` | `String` | Mandatory | SUNAT Cat. 01 (`01` Factura, `03` Boleta) | Legal document type (`FR-011`, `Q-02`) |
| `series` | `String` | Mandatory | Formats: `F###` (Factura) or `B###` (Boleta) | Legal series code (`Q-14`) |
| `issueDate` | `DateTime` | Mandatory | Current date (or max 2 days past per SUNAT) | Date of tax emission (`FR-002`) |
| `currency` | `String` | Mandatory | `PEN` or `USD` (SUNAT Cat. 02) | Transaction currency (`FR-011`) |
| `operationTypeCode` | `String` | Conditional | SUNAT Catalog 51 where applicable | Operation type serialized in UBL `cbc:ProfileID`; not `InvoiceTypeCode/@listID` |
| `paymentTerms` | `PaymentTermsDto` | Conditional | Required where the applicable SUNAT document profile requires payment condition/detail | `cac:PaymentTerms` data; see `REG-08` |
| `legend1000` | `String` | Conditional | SUNAT Catalog 52 legend code `1000` where required | Amount in words, serialized as `cbc:Note/@languageLocaleID="1000"` |
| `customer` | `CustomerIdentityDto`| Mandatory | Requires valid RUC if `documentType = 01` | Customer tax identification |
| `lines` | `List<InvoiceLineItemDto>`| Mandatory | At least 1 line item required | Billed merchandise lines |

#### Sub-DTO: `CustomerIdentityDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `identityType` | `String` | Mandatory | SUNAT Cat. 06 (`6` RUC, `1` DNI, etc.) | Identity document type code; used as the relevant UBL identifier scheme |
| `identityNumber` | `String` | Mandatory | Validated format (11 digits for RUC) | Legal document number (`FR-007`); maps to buyer `PartyIdentification/ID` with its identity scheme |
| `legalName` | `String` | Mandatory | Non-blank, max 200 chars | Registered legal name; maps to buyer `PartyLegalEntity/RegistrationName` |
| `fiscalAddress` | `String` | Optional | Mandatory for wholesale Facturas | Legal tax address |

#### Sub-DTO: `PaymentTermsDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `paymentCondition` | `Enum` | Conditional | `CONTADO` or `CREDITO` as applicable | Payment condition represented in `cac:PaymentTerms` |
| `netPendingAmount` | `Decimal` | Conditional | Credit condition only | Net amount pending payment |
| `installments` | `List<PaymentInstallmentDto>` | Conditional | Credit condition only | Due-date and amount details when required |

#### Sub-DTO: `PaymentInstallmentDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `installmentNumber` | `String` | Conditional | Preserve the applicable SUNAT/UBL representation | Installment identifier |
| `dueDate` | `Date` | Conditional | Credit condition only | Installment due date |
| `amount` | `Decimal` | Conditional | Non-negative monetary amount | Installment amount |

#### Sub-DTO: `InvoiceLineItemDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `lineNumber` | `Integer` | Mandatory | 1-based sequential integer | Item line number |
| `productId` | `String` | Mandatory | Valid catalog item | Product identifier |
| `description` | `String` | Mandatory | Non-blank | Line item commercial description |
| `quantity` | `Decimal` | Mandatory | Strictly $> 0.00$; scale 2 | Billed quantity |
| `unitPrice` | `Decimal` | Mandatory | $\ge 0.00$; scale 2 | Base price per unit (excluding or including tax per mode) |
| `taxCategory` | `String` | Mandatory | SUNAT Cat. 07 code | Tax affectation code (`FR-008`, `FR-011`) |
| `taxExemptionReasonCode` | `String` | Conditional | SUNAT Catalog 07 value, consistent with the line tax category | UBL classified tax category affectation reason |
| `iscCalculation` | `IscCalculationDto` | Optional | Only for an ISC-applicable line; Catalog 08 code `01`/`02`/`03` | Calculation inputs and result for this invoice line |
| `pricingReference` | `PricingReferenceDto` | Optional | Include where applicable under Catalog 16 | Alternative price and SUNAT price type code |

#### Sub-DTO: `IscCalculationDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `systemCode` | `String` | Mandatory | SUNAT Catalog 08: `01`, `02`, or `03` | ISC system used for this line |
| `taxableBase` | `Decimal` | Conditional | As defined by the applicable system and official schedule | Calculation base |
| `quantity` / `unitOfMeasure` | `Decimal` / `String` | Conditional | Required for applicable specific-system calculations | Quantity and statutory measurement unit |
| `ratePercent` | `Decimal` | Conditional | Only if defined by the applicable official schedule | Percentage input |
| `amountPerUnit` | `Decimal` | Conditional | Only if defined by the applicable official schedule | Specific amount input |
| `publicSalePrice` | `Decimal` | Conditional | Only for applicable system 03 calculation | Public-sale-price input |
| `tierRange` | `String` | Conditional | Required by current SUNAT validation when ISC scheme `2000` has a positive base; prohibited on non-ISC lines | UBL `TaxCategory/cbc:TierRange` value; no code inferred |
| `iscAmount` | `Decimal` | Mandatory | Scale and rounding per applicable regulation/profile | Calculated ISC amount |

#### Sub-DTO: `PricingReferenceDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `alternativePriceAmount` | `Decimal` | Conditional | Monetary value | UBL alternative condition price |
| `priceTypeCode` | `String` | Conditional | SUNAT Catalog 16 (`01`, `02`, `03`) | Price type serialized as `AlternativeConditionPrice/cbc:PriceTypeCode`; not the actual unit price |

---

### 4.3 `ElectronicInvoiceResponseDto`
- **Status**: Confirmed
- **Traces to**: `FR-008`, `FR-009`, `FR-011`, `FR-012`, `FR-021`, `FR-022`, `AC-008`, `AC-009`, `AC-022`, `AC-023`
- **Purpose**: Output payload returning computed tax amounts, total payable, document status, and generated UBL XML metadata.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `documentId` | `String` | Mandatory | System unique identifier |
| `legalNumber` | `String` | Mandatory | Formatted series and correlative (e.g., `F001-00000042`) |
| `documentType` | `String` | Mandatory | SUNAT Cat. 01 code (`01`, `03`, `07`, `08`) |
| `taxSummary` | `TaxBreakdownDto` | Mandatory | Comprehensive tax breakdown (`FR-008`, `AC-008`) |
| `totalPayable` | `Decimal` | Mandatory | Final grand total payable; scale 2 (`FR-008`) |
| `currency` | `String` | Mandatory | Currency code (`PEN`, `USD`) |
| `lifecycleStatus` | `Enum` | Mandatory | `DRAFT`, `GENERATED`, `SIGNED`, `ACCEPTED`, `REJECTED`, `CANCELLED` |
| `xmlDigest` | `String` | Optional | SHA-256 hash / signature digest of generated UBL XML |
| `cdrDetails` | `CdrResultDto` | Optional | Populated once transmitted to SUNAT/PSE/OSE |

#### Sub-DTO: `TaxBreakdownDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `taxableAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Total base subject to IGV (`FR-008`) |
| `igvAmount` | `Decimal` | Mandatory | Scale 2; exactly 18% of taxable base | Value Added Tax calculated amount |
| `iscAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Selective Consumption Tax calculated amount |
| `iscLineDetails` | `List<IscCalculationDto>` | Optional | Empty when no line incurs ISC | Line-level system, inputs, and results |
| `exoneratedAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Total value of exempt goods (`Ley IGV Ap. I`) |
| `inafectAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Total value of inafecto goods |
| `totalDiscounts` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Applied commercial discounts |

---

### 4.4 `CdrResultDto`
- **Status**: Confirmed
- **Traces to**: `FR-010`, `FR-012`, `UC-006`, `AC-010`
- **Purpose**: Payload representing SUNAT or PSE/OSE response receipt (*Constancia de Recepción*).

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `cdrCode` | `String` | Mandatory | Raw authority CDR `ResponseCode`; `0` indicates acceptance, a nonzero code indicates rejection. No numeric ranges are assumed. |
| `cdrDescription` | `String` | Mandatory | Official response description from authority |
| `receivedTimestamp` | `DateTime` | Mandatory | Date and time the CDR was returned and registered |
| `cdrFileHash` | `String` | Optional | SHA-256 hash of the received CDR ZIP/XML file |
| `notes` | `List<String>` | Optional | Informational observation codes/text returned separately from `ResponseCode`; not a status range |

### 4.5 `CreateCreditDebitNoteRequestDto`
- **Status**: Confirmed
- **Source**: Instructor Grading Feedback
- **Traces to**: `FR-021`, `UC-011`
- **Purpose**: Minimal note-issuance contract. The original Factura or Boleta identifier is supplied in the API path; the request identifies the note type and carries lines using the existing `InvoiceLineItemDto`.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `documentType` | `String` | Mandatory | SUNAT Cat. 01 (`07` Nota de Crédito, `08` Nota de Débito) | Selects the note type using the document-type catalog code |
| `lines` | `List<InvoiceLineItemDto>` | Mandatory | At least one line | Note line data reuses the established invoice-line contract |

### 4.6 Baja API Contract (Path-Only Request)
- **Status**: Confirmed
- **Source**: Instructor Grading Feedback
- **Traces to**: `FR-022`, `UC-012`
- **Purpose**: No request-body DTO is defined because the existing invoice `documentId` path parameter identifies the document to submit for baja and no additional request fields are established. The operation returns acceptance through HTTP `202` and a `Location` to the existing document resource; `ElectronicInvoiceResponseDto` is used to retrieve the subsequent lifecycle state. A document is `CANCELLED` only after confirmation.
- **Open Questions**: Provider-specific eligibility, pending/response semantics, and any provider reference remain open under `Q-24`.

### 4.7 `SunatCatalogEntryDto`
- **Status**: Confirmed
- **Source**: Instructor Grading Feedback
- **Traces to**: `FR-023`, `FR-011`, `UC-013`
- **Purpose**: Minimal read-only catalog entry returned by a catalog query.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `code` | `String` | Mandatory | Preserve the catalog code as text | Catalog entry code |
| `description` | `String` | Mandatory | Catalog-provided display text | Catalog entry description |

The queried catalog is identified by the `catalogNumber` path parameter. Supported catalog coverage, version/effective date, and filtering needs remain open under `Q-25`; no extra metadata is assumed.

---

## 5. Deferred DTO Scope

Demo-sandbox, GRE, DispatchAdvice, and transport DTOs are outside the active assessed scope and are not defined by this specification.

## 6. Migration Staging & Reconciliation DTOs

### 6.1 `LegacyRawRecordEnvelopeDto`
- **Status**: Confirmed
- **Traces to**: `FR-015`, `FR-016`, `NFR-007`, `NFR-008`, `UC-008`, `AC-014`
- **Purpose**: Generic envelope storing raw legacy records extracted from Visual FoxPro 9 without assuming a premature schema.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `stagingId` | `String` | Mandatory | Unique UUID | Staging row identifier |
| `sourceTable` | `String` | Mandatory | Identified legacy table name | Discovered legacy DBF table name |
| `sourceRecordNumber`| `Integer` | Mandatory | $> 0$ | Physical record number in legacy table |
| `rawPayloadJson` | `String` | Mandatory | Valid JSON string | Exact raw key-value pairs extracted from VFP |
| `extractedAt` | `DateTime` | Mandatory | System timestamp | Extraction timestamp |
| `sourceFileSha256` | `String` | Mandatory | 64-char hex string | SHA-256 hash of source DBF at extraction time |

---

### 6.2 `MigrationReconciliationSummaryDto`
- **Status**: Confirmed
- **Traces to**: `FR-016`, `NFR-008`, `AC-015`
- **Purpose**: Payload presenting mathematical reconciliation audit results after running a migration cycle.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `migrationRunId` | `String` | Mandatory | Unique migration execution ID | Batch execution tracking identifier |
| `sourceTableName` | `String` | Mandatory | Name of migrated legacy table | Target legacy source |
| `totalSourceRecords`| `Integer` | Mandatory | Exact count of rows in source table | Total records inspected in VFP |
| `successfullyMigrated`| `Integer` | Mandatory | Ingested into new domain tables | Valid records loaded |
| `rejectedRecords` | `Integer` | Mandatory | Logged in exception table | Records violating domain validation |
| `reconciliationFormulaValid`| `Boolean` | Mandatory | Must satisfy: $\text{Source} = \text{Migrated} + \text{Rejected}$ | Mathematical reconciliation proof |
| `executionTimestamp`| `DateTime` | Mandatory | Run timestamp | Completion date and time |

---

## 7. Standardized Error Payload Schema

### `ErrorResponseDto`
- **Status**: Proposed
- **Traces to**: `NFR-001`, `NFR-003`
- **Purpose**: Standardized contract for communicating validation, domain invariant, or external integration errors across all application modules.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `errorCode` | `String` | Mandatory | Machine-readable error code (e.g., `INVALID_RUC_CHECKSUM`, `SCHEMA_VALIDATION_FAILED`) |
| `message` | `String` | Mandatory | Human-readable explanation of failure |
| `target` | `String` | Optional | Property or field that triggered the error |
| `timestamp` | `DateTime` | Mandatory | Error generation timestamp |
| `details` | `List<String>`| Optional | Additional diagnostic traces or XSD schema failure messages |
