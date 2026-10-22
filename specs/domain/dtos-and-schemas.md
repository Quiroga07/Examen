# DTOs and Validation Schemas Specification (`specs/domain/dtos-and-schemas.md`)

## 1. Document Overview
This document specifies the Data Transfer Objects (DTOs) and formal contract schemas for ABC Software Corp.'s enterprise system modernization. These DTOs define the input, output, and inter-module communication payloads across warehouse operations, tax calculation, electronic invoicing, demonstration sandbox, migration staging, and conditional merchandise transport.

In accordance with the spec-first methodology:
- Every DTO and schema field is tied directly to its governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `UC-xxx`, `AC-xxx`).
- DTOs are classified as **Confirmed**, **Proposed**, or **Conditional / Pending Confirmation** (for GRE transport).
- Specifications are technology-agnostic (using language-neutral types: `String`, `Integer`, `Decimal`, `Boolean`, `DateTime`, `Enum`).
- No arbitrary external endpoints, uninspected Visual FoxPro tables, or speculative frameworks are assumed.

---

## 2. Classification Legend
- **Confirmed**: Payload structures mandated by core assessment requirements.
- **Proposed**: Clean architectural contracts designed to support confirmed requirements without coupling to concrete frameworks.
- **Conditional / Pending Confirmation**: Payload structures originating exclusively from the Delegate's Supplementary Case (GRE).

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
| `isActive` | `Boolean` | Mandatory | Default `true` | Operational availability |

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
| `customer` | `CustomerIdentityDto`| Mandatory | Requires valid RUC if `documentType = 01` | Customer tax identification |
| `lines` | `List<InvoiceLineItemDto>`| Mandatory | At least 1 line item required | Billed merchandise lines |

#### Sub-DTO: `CustomerIdentityDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `identityType` | `String` | Mandatory | SUNAT Cat. 06 (`6` RUC, `1` DNI, etc.) | Identity document type code |
| `identityNumber` | `String` | Mandatory | Validated format (11 digits for RUC) | Legal document number (`FR-007`) |
| `legalName` | `String` | Mandatory | Non-blank, max 200 chars | Registered commercial name |
| `fiscalAddress` | `String` | Optional | Mandatory for wholesale Facturas | Legal tax address |

#### Sub-DTO: `InvoiceLineItemDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `lineNumber` | `Integer` | Mandatory | 1-based sequential integer | Item line number |
| `productId` | `String` | Mandatory | Valid catalog item | Product identifier |
| `description` | `String` | Mandatory | Non-blank | Line item commercial description |
| `quantity` | `Decimal` | Mandatory | Strictly $> 0.00$; scale 2 | Billed quantity |
| `unitPrice` | `Decimal` | Mandatory | $\ge 0.00$; scale 2 | Base price per unit (excluding or including tax per mode) |
| `taxCategory` | `String` | Mandatory | SUNAT Cat. 07 code | Tax affectation code (`FR-008`, `FR-011`) |

---

### 4.3 `ElectronicInvoiceResponseDto`
- **Status**: Confirmed
- **Traces to**: `FR-008`, `FR-009`, `FR-011`, `FR-012`, `AC-008`, `AC-009`
- **Purpose**: Output payload returning computed tax amounts, total payable, document status, and generated UBL XML metadata.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `documentId` | `String` | Mandatory | System unique identifier |
| `legalNumber` | `String` | Mandatory | Formatted series and correlative (e.g., `F001-00000042`) |
| `documentType` | `String` | Mandatory | SUNAT Cat. 01 code (`01`, `03`) |
| `taxSummary` | `TaxBreakdownDto` | Mandatory | Comprehensive tax breakdown (`FR-008`, `AC-008`) |
| `totalPayable` | `Decimal` | Mandatory | Final grand total payable; scale 2 (`FR-008`) |
| `currency` | `String` | Mandatory | Currency code (`PEN`, `USD`) |
| `lifecycleStatus` | `Enum` | Mandatory | `DRAFT`, `GENERATED`, `SIGNED`, `ACCEPTED`, `REJECTED` |
| `xmlDigest` | `String` | Optional | SHA-256 hash / signature digest of generated UBL XML |
| `cdrDetails` | `CdrResultDto` | Optional | Populated once transmitted to SUNAT/PSE/OSE |

#### Sub-DTO: `TaxBreakdownDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `taxableAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Total base subject to IGV (`FR-008`) |
| `igvAmount` | `Decimal` | Mandatory | Scale 2; exactly 18% of taxable base | Value Added Tax calculated amount |
| `iscAmount` | `Decimal` | Mandatory | Scale 2; $\ge 0.00$ | Selective Consumption Tax calculated amount |
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
| `cdrCode` | `String` | Mandatory | Response code (`0` = Accepted; `2000-3999` = Rejection error) |
| `cdrDescription` | `String` | Mandatory | Official response description from authority |
| `receivedTimestamp` | `DateTime` | Mandatory | Date and time the CDR was returned and registered |
| `cdrFileHash` | `String` | Optional | SHA-256 hash of the received CDR ZIP/XML file |
| `notes` | `List<String>` | Optional | Informational observations returned by SUNAT |

---

## 5. Demonstration Mode DTOs

### 5.1 `DemoSessionInitDto` and `DemoSimulationResultDto`
- **Status**: Confirmed
- **Traces to**: `FR-014`, `NFR-011`, `UC-007`, `AC-013`, `Q-03`
- **Purpose**: Payloads managing isolated evaluation sandbox sessions for the DEMO user.
- **Specification Constraint**: In accordance with the teacher's assessment, no credentials, roles, permissions, personal data, or specific demonstration workflows are invented. All operational parameters are subject to confirmation under [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

#### `DemoSessionInitDto`
| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `requestedBy` | `String` | Mandatory | Name/identifier of evaluator |
| `seedCatalogType` | `String` | Optional | Preset dataset to load (`GROCERY_DEFAULT`) |

#### `DemoSimulationResultDto`
| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `sessionId` | `String` | Mandatory | Unique sandbox session token |
| `isDemo` | `Boolean` | Mandatory | Permanently `true` |
| `watermarkText` | `String` | Mandatory | Fixed text: `"DEMO / NOT VALID FOR TAX"` |
| `simulatedXml` | `String` | Mandatory | Mock UBL 2.1 XML generated for inspection |
| `simulatedCdr` | `CdrResultDto` | Mandatory | Mock accepted CDR with simulated acceptance code `0` |
| `productionEmissionsBlocked` | `Boolean` | Mandatory | Fixed `true`; confirms live network calls were blocked |

---

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

## 7. Goods Transport and Electronic Remission Guide (GRE) DTOs

> **Important Scope Notice**: The following DTOs originate exclusively from the **Delegate's Supplementary Case**. They remain **Conditional / Pending Confirmation** regarding whether they form part of the evaluated core assessment ([Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)).

### 7.1 `CreateGreRequestDto` (CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Traces to**: `FR-018`, `FR-019`, `UC-009`, `AC-020`
- **Purpose**: Input payload for generating an Electronic Remission Guide (*Guía de Remisión Electrónica - GRE*) for customer transport.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transferReason` | `String` | Mandatory | SUNAT Cat. 20 code (e.g., `01` Sale) | Reason for merchandise transfer |
| `transportMode` | `String` | Mandatory | SUNAT Cat. 18 (`01` Public, `02` Private) | Transport modality (`FR-018`) |
| `totalGrossWeight` | `Decimal` | Mandatory | Strictly $> 0.00$; scale 3 | Total shipment weight in Kilograms |
| `weightUnit` | `String` | Mandatory | Default `KGM` (SUNAT Cat. 03) | Weight unit code |
| `origin` | `AddressDto` | Mandatory | Origin address and Peruvian UBIGEO code | Warehouse departure location |
| `destination` | `AddressDto` | Mandatory | Destination address and UBIGEO code | Customer delivery location |
| `carrier` | `GreCarrierDto` | Conditional | Mandatory if `transportMode = 01` | Commercial transport company details |
| `vehicleAndDriver` | `GreVehicleDto` | Conditional | Mandatory if `transportMode = 02` | Private fleet vehicle and driver details |
| `items` | `List<GreItemDto>`| Mandatory | At least 1 item required | Merchandise items transported |

#### Sub-DTO: `GreVehicleDto` (CONDITIONAL)
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `vehicleLicensePlate`| `String` | Mandatory | Alphanumeric, valid Peruvian plate format | Transport vehicle license plate |
| `driverIdentityType` | `String` | Mandatory | SUNAT Cat. 06 (`1` DNI, `4` Carnet) | Driver identity document type |
| `driverIdentityNumber`| `String` | Mandatory | Validated format (8 digits for DNI) | Driver identification number |
| `driverLicenseNumber`| `String` | Mandatory | Valid Peruvian driver license format | Driver official license number |

---

### 7.2 `GreValidationResultDto` (CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Traces to**: `FR-020`, `UC-010`, `AC-021`
- **Purpose**: Output payload returning the results of local XSD schema verification for GRE UBL Dispatch Advice XML.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `greId` | `String` | Mandatory | Remission guide identifier |
| `isXsdValid` | `Boolean` | Mandatory | `true` if local XSD schema validation passed without errors |
| `xmlPayloadHash` | `String` | Mandatory | SHA-256 hash of verified XML payload |
| `validationTimestamp`| `DateTime` | Mandatory | Exact timestamp of schema verification |
| `schemaErrors` | `List<String>`| Mandatory | Empty if valid; contains line numbers and violation details if invalid |

---

### 7.3 `GreDepartureClearanceDto` (CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Traces to**: `FR-018`, `UC-009`, `AC-019`
- **Purpose**: Output payload verifying whether the transport vehicle is legally cleared to exit the warehouse facility.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transportOrderId` | `String` | Mandatory | Dispatch order reference | Warehouse dispatch order ID |
| `greNumber` | `String` | Mandatory | Legal series and correlative (e.g., `T001-00000012`) | Assigned GRE legal number |
| `departureCleared` | `Boolean` | Mandatory | `true` ONLY if GRE is XSD-valid and accepted by tax authority | Physical departure release flag |
| `clearanceTimestamp`| `DateTime` | Optional | Null if not cleared | Timestamp clearance was granted |
| `gateMessage` | `String` | Mandatory | Authorization message or blocking rationale | Message displayed to gate operator |

---

## 8. Standardized Error Payload Schema

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
