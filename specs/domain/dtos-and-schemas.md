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
- **Purpose**: Input payload for recording an inbound warehouse movement. The case does not establish its business cause.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transactionDate` | `Date` | Mandatory | No time or timezone is inferred | Date of receipt (`FR-002`) |
| `internalDocumentNumber` | `String` | Conditional | Preserve the supplied value; do not infer a format or generation rule (`Q-14`) | Internal document number, distinct from SUNAT numbering |
| `lines` | `List<MovementLineDto>`| Mandatory | At least 1 item required | Line items received |

#### Sub-DTO: `MovementLineDto`
| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `productId` | `String` | Mandatory | Must match active `Product` | Product identifier |
| `quantity` | `Decimal` | Mandatory | Strictly $> 0.00$; scale 2 | Physical quantity received |
| `unitCost` | `Decimal` | Pending / optional | $\ge 0.00$; scale 2, only if the costing policy is confirmed (`Q-18`) | Proposed acquisition cost per unit; not a known legacy fact |

---

### 3.2 `CreateOutboundMovementRequestDto`
- **Status**: Confirmed
- **Traces to**: `FR-002`, `FR-004`, `FR-005`, `UC-002`, `AC-004`
- **Purpose**: Input payload for recording an outbound warehouse movement. The case does not establish its business cause.

| Field Name | Type | Multiplicity | Constraints / Rules | Description |
|---|---|---|---|---|
| `transactionDate` | `Date` | Mandatory | No time or timezone is inferred | Date of dispatch (`FR-002`) |
| `internalDocumentNumber` | `String` | Conditional | Preserve the supplied value; do not infer a format or generation rule (`Q-14`) | Internal document number, distinct from SUNAT numbering |
| `lines` | `List<MovementLineDto>`| Mandatory | At least 1 item required | Line items dispatched |

---

### 3.3 `WarehouseMovementResponseDto`
- **Status**: Confirmed
- **Traces to**: `FR-002`, `FR-003`, `FR-004`, `FR-005`, `AC-002`, `AC-005`
- **Purpose**: Output payload returned after recording any warehouse movement.

| Field Name | Type | Multiplicity | Description |
|---|---|---|---|
| `movementId` | `String` | Mandatory | Immutable unique movement identifier |
| `internalDocumentNumber` | `String` | Conditional | Preserve the known internal number; generation policy remains open (`FR-005`, `Q-14`) |
| `movementType` | `Enum` | Mandatory | `INBOUND` or `OUTBOUND`; no specific cause is inferred |
| `transactionDate` | `Date` | Mandatory | Immutable recorded date; no time or timezone is inferred (`FR-002`, `AC-002`) |
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
| `issueDate` | `Date` | Mandatory | UBL `IssueDate` is a calendar date; applicable profile validation remains subject to `Q-10` | Date of tax emission (`FR-009`) |
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
| `taxExemptionReasonCode` | `String` | Mandatory | SUNAT Catalog 07 value applicable to the line | UBL `TaxCategory/cbc:TaxExemptionReasonCode` (`FR-008`, `FR-011`) |
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

### 4.2.1 Internal `UblInvoiceGenerationData` (Proposed)

This is an internal input to `IUblGeneratorPort`, separate from `IssueElectronicInvoiceRequestDto` and from the public API schema. The port receives the approved request DTO plus this data. It carries caller-resolved values that the request does not contain; the adapter serializes supplied values and does not source, calculate, round, or default them.

The cardinality and requiredness below distinguish the local official UBL 2.1 Invoice XSD from this generator-input contract and existing business requirements. “Required by input contract” does not assert a SUNAT profile rule. XSD cardinalities refer to the official Invoice and Common Aggregate Components schemas in `tools/ubl-xsd-poc/schema-bundle`.

| Field | Type | Cardinality / requiredness | UBL mapping | Basis / notes |
|---|---|---|---|---|
| `legalDocumentId` | `String` | Exactly 1; required by XSD and input contract | `/Invoice/cbc:ID` | The request's `series` is not a complete issued document identifier. Its production source and formatting remain open in Q-26. |
| `issuer` | `IssuerLegalPartyData` | Exactly 1; required by input contract | `/Invoice/cac:AccountingSupplierParty/cac:Party` | `AccountingSupplierParty` is required by the Invoice XSD, but its `Party` child is optional there. Existing business specifications require issuer legal-party data without defining its source or full field policy. |
| `lineData` | `List<InvoiceLineGenerationData>` | Exactly 1 entry per request line, matched by `lineNumber` | `/Invoice/cac:InvoiceLine` | The Invoice XSD requires at least one invoice line; this data supplements, and does not replace, each request line. |
| `documentTaxTotals` | `List<UblTaxTotalInput>` | `0..n` in XSD; business-required emission/cardinality is unresolved | `/Invoice/cac:TaxTotal` | Invoice-level `TaxTotal` is optional/repeatable in the XSD. The business DTO requires a tax summary, but does not define its exact serialized `TaxTotal`/`TaxSubtotal` grouping. Keep this policy open in Q-26. |
| `legalMonetaryTotals` | `UblLegalMonetaryTotals` | Exactly 1; required by XSD and input contract | `/Invoice/cac:LegalMonetaryTotal` | The `PayableAmount` member is required by the XSD and by the existing business contract. |

#### `IssuerLegalPartyData`

| Field | Type | Cardinality / requiredness | UBL mapping | Basis / notes |
|---|---|---|---|---|
| `partyIdentifications` | `List<PartyIdentificationInput>` | `0..n` per XSD; optional unless an identity is supplied | `cac:Party/cac:PartyIdentification` | XSD permits zero or more. Which issuer identity and whether one is required by the applicable profile remain open in Q-26. |
| `partyIdentifications[].id` | `String` | Exactly 1 for each identification entry; required by XSD | `cac:PartyIdentification/cbc:ID` | The production identifier, its issuing source, and its business type are not specified here. |
| `partyIdentifications[].schemeId` | `String` | `0..1`; optional by XSD | `cac:PartyIdentification/cbc:ID/@schemeID` | No identity scheme value or default is selected. |
| `registrationName` | `String` | Exactly 1; required by this input contract, optional by XSD | `cac:Party/cac:PartyLegalEntity/cbc:RegistrationName` | Supplies the minimum issuer legal name for this generator input. The approved production source and profile-specific requirements remain open. |

#### `InvoiceLineGenerationData`

| Field | Type | Cardinality / requiredness | UBL mapping | Basis / notes |
|---|---|---|---|---|
| `lineNumber` | `Integer` | Exactly 1; must match exactly one request line | `/Invoice/cac:InvoiceLine/cbc:ID` | Correlation key; the request remains the source of the line number and other already-specified line values. |
| `unitCode` | `String` | Exactly 1; required by this input contract, optional by XSD | `/Invoice/cac:InvoiceLine/cbc:InvoicedQuantity/@unitCode` | ADR-007 requires a resolved unit code. Its production source and selection policy remain open in Q-26; no unit is inferred. |
| `lineExtensionAmount` | `Decimal` | Exactly 1; required by XSD and input contract | `/Invoice/cac:InvoiceLine/cbc:LineExtensionAmount` | Supplied by the caller; the adapter does not calculate it from quantity and unit price. |
| `taxTotals` | `List<UblTaxTotalInput>` | `0..n` per XSD; tax applicability/cardinality remains conditional | `/Invoice/cac:InvoiceLine/cac:TaxTotal` | Each supplied total follows the `UblTaxTotalInput` fields below. Do not infer a tax entry for a line. |

#### `UblTaxTotalInput` and tax subtotal

The same structure is used for a supplied line-level or document-level `TaxTotal`.

| Field | Type | Cardinality / requiredness | UBL mapping | Basis / notes |
|---|---|---|---|---|
| `taxAmount` | `Decimal` | Exactly 1 when a `TaxTotal` is present; required by XSD | `cac:TaxTotal/cbc:TaxAmount` | Caller-provided tax amount; not calculated or rounded by the adapter. |
| `taxSubtotals` | `List<UblTaxSubtotalInput>` | `0..n` per XSD | `cac:TaxTotal/cac:TaxSubtotal` | The XSD permits no subtotals. Any requirement for them in a specific tax/profile case remains open in Q-26. |
| `taxSubtotals[].taxableAmount` | `Decimal` | `0..1`; optional by XSD | `cac:TaxSubtotal/cbc:TaxableAmount` | Caller supplies it when required by the applicable, approved business rule; the adapter does not derive a tax base. |
| `taxSubtotals[].taxAmount` | `Decimal` | Exactly 1 for each subtotal; required by XSD | `cac:TaxSubtotal/cbc:TaxAmount` | Caller-provided amount. |
| `taxSubtotals[].taxSchemeId` | `String` | Exactly 1 for each subtotal by this input contract; the UBL `TaxScheme/cbc:ID` element is optional by XSD | `cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID` | ADR-007 requires scheme identifiers as explicit inputs. No identifier value, catalog interpretation, rate, or calculation is selected here. |

`cac:TaxSubtotal/cac:TaxCategory` is required by the XSD. For line subtotals, the existing request line's `taxExemptionReasonCode` maps to `cbc:TaxExemptionReasonCode`; the applicable document-level category aggregation is not defined. Neither mapping supplies a tax calculation or SUNAT profile rule.

Each `UblTaxTotalInput` represents one taxation scheme as described by the UBL `TaxTotal` definition. All `taxSchemeId` values in its subtotals must therefore agree; separate totals represent separate schemes. A total with no subtotals serializes no scheme identifier, and whether that is allowed for a given business/profile case remains open in Q-26.

#### `UblLegalMonetaryTotals`

Each amount is a `Decimal` in the request DTO's `currency`; the adapter maps that currency to the UBL amount's `@currencyID`, which is required by the UBL amount type. No second currency input is introduced. Amounts are caller-supplied; the adapter does not derive, reconcile, or default optional totals.

| Field | Type | Cardinality / requiredness | UBL mapping | Basis / notes |
|---|---|---|---|---|
| `lineExtensionAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:LineExtensionAmount` | Caller supplies if included. |
| `taxExclusiveAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount` | Caller supplies if included. |
| `taxInclusiveAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount` | Caller supplies if included. |
| `allowanceTotalAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount` | Caller supplies if included. |
| `chargeTotalAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:ChargeTotalAmount` | Caller supplies if included. |
| `prepaidAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:PrepaidAmount` | Caller supplies if included. |
| `payableRoundingAmount` | `Decimal` | `0..1`; optional by XSD | `cac:LegalMonetaryTotal/cbc:PayableRoundingAmount` | Caller supplies if included; no rounding policy is inferred here. |
| `payableAmount` | `Decimal` | Exactly 1; required by XSD and business contract | `cac:LegalMonetaryTotal/cbc:PayableAmount` | Required business total (`ElectronicInvoiceResponseDto.totalPayable`); source and approved calculation remain governed by existing tax/business specifications. |

This contract defines a minimum serialization input shape, not the production source or business policy for its values. Q-26 retains unresolved sources, applicability, calculation/rounding, tax grouping, and SUNAT-profile requirements. XSD validity alone is not SUNAT-profile compliance.

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
| `lifecycleStatus` | `Enum` | Mandatory | `DRAFT`, `GENERATED`, `SIGNED`, `TRANSMITTED`, `ACCEPTED`, `REJECTED`, `CANCELLED` |
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
| `cdrCode` | `String` | Mandatory | Preserve raw response code. CDR `0` indicates acceptance; `2000–3999` indicates rejection; `4000+` are observations. `0100–0999` SUNAT exceptions and `1000–1999` taxpayer format/structure exceptions are service/submission exceptions, not CDR outcomes. |
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
