# Domain Model Specification (`specs/domain/domain-model.md`)

## 1. Document Overview
This document specifies the core domain model for ABC Software Corp.'s enterprise software modernization. Designed following Domain-Driven Design (DDD) principles, the domain model encapsulates business entities, value objects, domain aggregates, lifecycle state machines, and business invariants.

**Instructor-feedback note:** This revision clarifies the three ISC systems and their UBL data, completes the requested invoice traceability, and records the applicable CDR and format contracts. Business-specific tax applicability remains open.

In accordance with the spec-first methodology:
- Every domain concept is explicitly linked to its governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `UC-xxx`, `AC-xxx`).
- Every concept is classified by certainty status: **Confirmed**, **Proposed**, or **Business-Specific / Pending Confirmation**.
- GRE, DispatchAdvice, transport, and demo-sandbox behavior are deferred and out of the assessed scope for this phase ([Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)). The assessed DEMO user profile remains distinct from sandbox behavior.
- No speculative implementation technology or unverified legacy database structures are assumed.

---

## 2. Domain Concept Classification Legend
- **Confirmed**: Explicitly mandated by the assessment context (e.g., products, warehouse movements, RUC validation, and tax calculations).
- **Proposed**: Architectural structural pattern (e.g., standard DDD Value Objects or Aggregates) designed to satisfy confirmed requirements without violating neutrality.
- **Business-Specific / Pending Confirmation**: Product tax applicability, rates, reference prices, and other rules not stated in the assessment.

---

## 3. Domain Model Architecture Overview

```
+---------------------------------------------------------------------------------------+
|                                    CORE DOMAIN                                        |
|                                                                                       |
|  +--------------------+        +---------------------+        +--------------------+  |
|  | Catalog Aggregate  |        | Inventory Aggregate |        | Billing Aggregate  |  |
|  | - Product (Root)   |        | - Movement (Root)   |        | - Document (Root)  |  |
|  | - TaxCategory (VO) |<-------| - MovementLine      |------->| - DocumentLine     |  |
|  | - Money (VO)       |        | - TrackingNum (VO)  |        | - TaxBreakdown (VO)|  |
|  +--------------------+        +---------------------+        | - RucNumber (VO)   |  |
|                                                               +--------------------+  |
|  +--------------------------------+           +------------------------------------+  |
|  | User Profile                   |           | Supplementary Scope (Deferred)     |  |
|  | - User / DEMO role             |           | - GRE / DispatchAdvice             |  |
|  +--------------------------------+           | - Transport                         |  |
|                                               +------------------------------------+  |
+---------------------------------------------------------------------------------------+
```

---

## 4. Aggregate Specifications

### 4.1 Aggregate 1: Product & Catalog Management

#### Concept: `Product` (Aggregate Root Entity)
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-006`, `UC-001`, `UC-002`, `AC-001`
- **Description**: Represents a commercial grocery or merchandise item sold at wholesale or retail.
- **Attributes**:
  - `ProductId`: Unique immutable domain identifier (UUID / alphanumeric identifier).
  - `ProductCode`: Commercial SKU / internal product code (*Proposed*, `FR-001`).
  - `Description`: Official commercial name/description of the item (*Confirmed*, `FR-001`).
  - `UnitOfMeasure`: Standard measurement unit (e.g., NIU for goods, KGM for weight) (*Proposed / SUNAT Cat. 03*, `FR-011`).
  - `UnitPrice`: Base commercial sales value expressed as `Money` (*Confirmed*, `FR-006`, `FR-008`).
  - `TaxCategory`: IGV affectation classification from SUNAT Catalog 07 (*Confirmed*, `FR-008`, `FR-011`).
  - `IscTaxConfiguration`: Optional effective-dated system code and the legally applicable calculation parameters; populated only when product applicability and the applicable official schedule are established (*Proposed*, `FR-008`, `REG-03`).
  - `IsActive`: Operational availability status (*Proposed*).
- **Domain Invariants**:
  - `UnitPrice` must be non-negative ($\ge 0.00$).
  - `Description` must not be blank or null.

#### Concept: `Money` (Value Object)
- **Status**: Confirmed
- **Traces to**: `FR-008`, `NFR-009`, `AC-008`
- **Description**: Encapsulates an arbitrary-precision monetary amount and its associated currency code, preventing floating-point rounding errors.
- **Attributes**:
  - `Amount`: Arbitrary-precision numeric value with 2-decimal scale.
  - `Currency`: ISO currency code (`CurrencyCode` Enum: `PEN`, `USD`) (*Confirmed*, `FR-011`).
- **Domain Invariants**:
  - Currency operations (addition/subtraction) are only valid between identical currencies.
  - Monetary multiplication and division must use standard half-up rounding to 2 decimal places.

#### Concept: `TaxCategory` (Value Object / Catalog Enum)
- **Status**: Confirmed
- **Traces to**: `FR-008`, `FR-011`, `UC-004`, `AC-011`
- **Description**: Classifies goods under Peruvian tax law into specific taxation categories based on SUNAT Catalogo No. 07.
- **Enumerations**:
  - `GRAVADO_OPERACION_ONEROSA`: Standard commercial sale subject to IGV (18%).
  - `EXONERADO`: Goods legally exempt from IGV (e.g., certain agricultural/basic groceries under Ley del IGV Apéndice I).
  - `INAFECTO`: Transactions outside the legal scope of IGV.
  - Catalog 07 affectation code (exact code selected per transaction and applicable SUNAT catalog rules).
- ISC is a separate tax, not a Catalog 07 IGV affectation category. Its system is represented by `IscTaxSystemCode` (Catalog 08: `01`, `02`, `03`).
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (product applicability, rates, units, and reference-price inputs).

#### Concept: `IscTaxSystemCode` and `IscCalculation` (Value Objects)
- **Status**: Catalog 08 systems confirmed; product-specific configuration business-specific.
- **Traces to**: `FR-008`, `UC-004`, `AC-008`, `REG-03`
- **Enumerations**: `01` Sistema al Valor; `02` Sistema Específico; `03` Sistema al Precio de Venta al Público (Catalog 08).
- **Calculation data**: Carry the system code, line taxable base or quantity and unit as appropriate, the effective rate or amount from the applicable official schedule, computed ISC amount, and `TierRange`. Current SUNAT validation requires `TierRange` when the line has ISC scheme `2000` and a positive base, and disallows it for non-ISC lines. System 03 additionally requires the legally defined public-sale-price basis. These are inputs/data contracts, not defaults; rates, product assignments, units, and exact calculation parameters remain unresolved under `REG-03`.
- **Invariant**: Never infer a product's ISC system, rate, or `TierRange` from its description alone.

---

### 4.2 Aggregate 2: Inventory & Warehouse Movements

#### Concept: `WarehouseMovement` (Aggregate Root Entity)
- **Status**: Confirmed
- **Traces to**: `FR-002`, `FR-003`, `FR-004`, `FR-005`, `UC-001`, `UC-002`, `AC-002`, `AC-003`, `AC-004`
- **Description**: Represents an immutable warehouse transaction recording the arrival, departure, or internal transfer of merchandise.
- **Attributes**:
  - `MovementId`: Unique immutable movement identifier.
  - `TransactionTimestamp`: Exact date and time when the movement physically occurred (*Confirmed*, `FR-002`, `AC-002`).
  - `MovementType`: Type of movement (`INBOUND_PURCHASE`, `OUTBOUND_SALE`, `INVENTORY_ADJUSTMENT`) (*Confirmed*, `FR-003`, `FR-004`).
  - `InternalTrackingNumber`: Sequential internal document voucher number (*Confirmed*, `FR-005`, `Q-14`).
  - `Lines`: Collection of `MovementLineItem` entities (*Confirmed*, `FR-003`, `FR-004`).
  - `ReferenceDocumentNumber`: Optional external supplier invoice number or sales invoice reference (*Proposed*).
- **Domain Invariants**:
  - A `WarehouseMovement` must contain at least one valid `MovementLineItem`.
  - Once posted, a `WarehouseMovement` is completely immutable. No modification of timestamp, quantities, or tracking numbers is allowed.
  - `TransactionTimestamp` cannot be in the future.

#### Concept: `MovementLineItem` (Entity)
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-003`, `FR-004`, `AC-003`, `AC-004`
- **Description**: Represents a specific quantity of a product being moved into or out of the warehouse.
- **Attributes**:
  - `LineNumber`: Positive integer sequence (1, 2, 3...).
  - `ProductId`: Reference to the `Product` entity.
  - `Quantity`: Decimal measurement quantity moved (*Confirmed*, `FR-003`, `FR-004`).
- **Domain Invariants**:
  - `Quantity` must be strictly greater than zero ($> 0$).
  - For `OUTBOUND_SALE` movements, `Quantity` cannot exceed current available stock unless verified legacy negative stock override rules are confirmed (`AC-004`, [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)).

#### Concept: `InternalTrackingNumber` (Value Object)
- **Status**: Confirmed
- **Traces to**: `FR-005`, `AC-005`, `Q-14`
- **Description**: Encapsulates legacy-compatible internal voucher numbering used to track warehouse ins/outs.
- **Attributes**:
  - `Series`: Internal series identifier (e.g., `INT-01`, `ING-01`).
  - `Correlative`: Strictly sequential positive integer.
- **Domain Invariants**:
  - The combination of `Series` + `Correlative` must be globally unique across all recorded movements.

---

### 4.3 Aggregate 3: Commercial Sales & Electronic Billing

#### Concept: `ElectronicDocument` (Aggregate Root Entity)
- **Status**: Confirmed
- **Traces to**: `FR-006`, `FR-008`, `FR-009`, `FR-010`, `FR-011`, `FR-012`, `UC-004`, `UC-005`, `UC-006`, `AC-008`, `AC-009`, `AC-010`
- **Description**: Represents a legal commercial and tax document issued for a wholesale or retail sale.
- **Attributes**:
  - `DocumentId`: Unique system identifier.
  - `DocumentType`: Legal document type (`SunatDocumentType` Enum: 01 Factura, 03 Boleta, etc.) (*Confirmed*, `FR-011`, `Q-02`).
  - `SeriesNumber`: Legal series and sequential correlative (`DocumentSeriesNumber` Value Object) (*Confirmed*, `FR-011`, `Q-14`).
  - `IssueDate`: Date of tax document emission (*Confirmed*, `FR-002`).
  - `Issuer`: Legal entity details of ABC Software Corp. (RUC, Business Name, Fiscal Address) (*Confirmed*, `FR-007`).
  - `Customer`: Legal recipient entity (`Customer` Entity with `RucNumber` or identity document); the identity maps to buyer `PartyIdentification/ID`, and the legal name maps to `PartyLegalEntity/RegistrationName` (*Confirmed*, `FR-006`, `FR-007`, `FR-009`).
  - `OperationTypeCode`: SUNAT Catalog 51 type of operation, mapped to UBL `cbc:ProfileID` where the applicable invoice profile requires it (`FR-009`, `Q-22`). Catalog 51 is not mapped to `InvoiceTypeCode/@listID`.
  - `PaymentTerms`: Payment condition and, for credit, the applicable due-date/installment data (`FR-009`, `REG-08`).
  - `Legend1000`: Amount-in-words legend from Catalog 52 code `1000`, mapped to `cbc:Note/@languageLocaleID="1000"` where required by the SUNAT invoice profile (`FR-009`).
  - `Currency`: Document currency (`PEN` or `USD`) (*Confirmed*, `FR-011`).
  - `Lines`: Ordered collection of `DocumentLineItem` entities (*Confirmed*, `FR-008`); each retains Catalog 07 tax affectation, applicable ISC details, pricing reference, and unit price for UBL traceability.
  - `TaxSummary`: Aggregated tax bases and amounts (`TaxBreakdown` Value Object) (*Confirmed*, `FR-008`, `NFR-009`).
  - `TotalPayable`: Final payable monetary amount (`Money`) (*Confirmed*, `FR-008`).
  - `LifecycleStatus`: Current electronic billing state (`DocumentLifecycleStatus` Enum) (*Confirmed / Inferred*, `FR-012`).
  - `XmlPayload`: Raw or digested UBL 2.1 XML string (*Confirmed*, `FR-009`).
  - `DigitalSignature`: XMLDSig signature digest and timestamp (*Confirmed*, `FR-009`, `NFR-012`).
  - `Cdr`: Optional SUNAT Constancia de Recepción details (`CdrResponse` Value Object) (*Confirmed*, `FR-010`, `AC-010`).
- **Domain Invariants**:
  - Total payable must equal: $\text{Taxable Base} + \text{IGV} + \text{ISC} + \text{Exempted} - \text{Discounts}$ with 0.00 discrepancy.
  - For `DocumentType = 01 (Factura)`, `Customer` must possess a valid, checksum-verified `RucNumber`.
  - Once `LifecycleStatus` is `SIGNED` or `ACCEPTED`, the entity is strictly immutable. No amendments, line additions, or recomputations are permitted.

#### Concept: `DocumentLineItem` (Entity)
- **Status**: Confirmed
- **Traces to**: `FR-008`, `FR-009`, `UC-004`, `AC-008`, `REG-03`, `REG-09`
- **Attributes**:
  - `ProductId`, `Quantity`, `UnitOfMeasure`, `UnitPrice`, and the line extension amount.
  - `TaxExemptionReasonCode`: SUNAT Catalog 07 affectation code mapped to UBL `ClassifiedTaxCategory/cbc:TaxExemptionReasonCode`.
  - `PricingReference`: optional alternative price and Catalog 16 price type code, included only where required by the applicable profile.
  - `IscCalculation`: optional Catalog 08 system, system-appropriate calculation inputs, effective scheduled rate/amount, required applicable `TierRange` for positive-base ISC lines, and resulting ISC amount.
- **Invariant**: Tax category, price reference, and ISC data are distinct; an ISC system code must not be used as a Catalog 07 affectation code.

#### Concept: `RucNumber` (Value Object)
- **Status**: Confirmed
- **Traces to**: `FR-007`, `UC-003`, `AC-007`, `Q-13`
- **Description**: Represents a verified Peruvian single taxpayer registration number (*Registro Único de Contribuyentes*).
- **Attributes**:
  - `Value`: 11-digit numeric string.
- **Domain Invariants**:
  - Length must be exactly 11 digits.
  - Must consist solely of numeric characters `0-9`.
  - Prefix (first 2 digits) must match legal person/natural person codes: `10`, `15`, `17`, or `20`.
  - Checksum validation: Evaluated in accordance with statutory validation logic (e.g., Modulo 11 check digit). Whether validation is performed purely via this offline checksum algorithm or supplemented/replaced by online SUNAT consultation is an open question ([Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration)); no external endpoints or unconfirmed methods are assumed.

#### Concept: `TaxBreakdown` (Value Object)
- **Status**: Confirmed
- **Traces to**: `FR-008`, `NFR-009`, `UC-004`, `AC-008`
- **Description**: Captures the comprehensive tax calculation results across all statutory tax bases.
- **Attributes**:
  - `TaxableOperations`: Monetary sum of goods subject to standard IGV.
  - `ExoneratedOperations`: Monetary sum of goods exempt from IGV.
  - `InafectOperations`: Monetary sum of goods not subject to IGV.
  - `IgvAmount`: Total calculated IGV (standard rate verified against official sources, baseline 18%).
  - `IscAmount`: Total calculated Selective Consumption Tax.
  - `IscLines`: Per-line ISC calculation results keyed by Catalog 08 system where applicable.
  - `TotalDiscounts`: Optional commercial discounts applied before tax.
- **Domain Invariants**:
  - All amounts must share the same currency.
  - Line-item tax sums must reconcile exactly with the document-level `TaxBreakdown`.

#### Concept: `DocumentLifecycleStatus` (Enum)
- **Status**: Confirmed / Inferred
- **Traces to**: `FR-012`, `AC-010`
- **Allowed States**:
  - `DRAFT`: Order being edited; tax math computed, but XML not yet generated.
  - `GENERATED`: UBL 2.1 XML generated, awaiting digital signing.
  - `SIGNED`: Digital signature (XMLDSig) applied; ready for dispatch.
  - `TRANSMITTED`: Sent to SUNAT/PSE/OSE, awaiting response.
  - `ACCEPTED`: Successfully accepted by tax authority with CDR `cbc:ResponseCode` `0`.
  - `REJECTED`: Rejected by tax authority with a nonzero response code identifying the rejection; no numeric range is assumed.
  - `CANCELLED`: Legally cancelled via official communication (*Comunicación de Baja*).

---

### 4.4 Aggregate 4: User Profiles

#### Concept: `UserProfile` (Entity)
- **Status**: Confirmed
- **Traces to**: `FR-013`, `FR-014`, `Q-03`
- **Description**: Represents an operator profile, including the requested DEMO profile. Credentials, assigned access rights, and the formal role matrix remain open.
- **Scope boundary**: A DEMO profile does not imply isolated storage, simulated billing, mock CDRs, or blocking live emissions. Those sandbox behaviors are deferred.

### 4.5 Deferred Concepts

GRE, DispatchAdvice, and transport aggregates are outside the active assessed scope. No domain requirements, operations, or data contracts for them are defined here.

---

## 5. Domain Invariants Summary Table

| Domain Invariant ID | Target Aggregate | Rule Statement | Enforcing Requirement |
|---|---|---|---|
| `INV-001` | Product | Unit price must be non-negative; description cannot be empty | `FR-001`, `FR-006` |
| `INV-002` | Inventory | Stock movements are immutable once posted; timestamp cannot be future | `FR-002`, `AC-002` |
| `INV-003` | Inventory | Outbound sales cannot result in negative stock unless authorized | `FR-004`, `AC-004` |
| `INV-004` | Billing | Customer RUC must satisfy validated statutory criteria without unverified endpoints (per Q-13) | `FR-007`, `AC-007` |
| `INV-005` | Billing | Total payable must equal sum of line taxable bases + taxes with 0.00 drift | `FR-008`, `NFR-009`, `AC-008` |
| `INV-006` | Billing | Signed or accepted electronic invoices are permanently immutable | `FR-012`, `NFR-012` |
| `INV-007` | Sandbox *(Deferred)* | Demo-sandbox isolation is outside the active assessed scope | `FR-014`, `NFR-011`, `AC-013` (deferred behavior) |
| `INV-008` | Transport *(Deferred)* | GRE departure gate is outside the active assessed scope | `FR-018`, `FR-020`, `AC-019` (deferred requirements) |
