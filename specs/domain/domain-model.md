# Domain Model Specification (`specs/domain/domain-model.md`)

## 1. Document Overview
This document specifies the core domain model for ABC Software Corp.'s enterprise software modernization. Designed following Domain-Driven Design (DDD) principles, the domain model encapsulates business entities, value objects, domain aggregates, lifecycle state machines, and business invariants.

In accordance with the spec-first methodology:
- Every domain concept is explicitly linked to its governing **Requirement IDs** (`FR-xxx`, `NFR-xxx`, `UC-xxx`, `AC-xxx`).
- Every concept is classified by certainty status: **Confirmed**, **Proposed**, or **Conditional / Pending Confirmation**.
- Concepts related to the **Electronic Remission Guide (GRE - Guía de Remisión Electrónica)** derive from the delegate's supplementary case and remain strictly **Conditional** pending formal confirmation of the core assessment scope.
- No speculative implementation technology or unverified legacy database structures are assumed.

---

## 2. Domain Concept Classification Legend
- **Confirmed**: Explicitly mandated by the assessment context (e.g., products, warehouse movements, RUC validation, tax calculations, DEMO mode).
- **Proposed**: Architectural structural pattern (e.g., standard DDD Value Objects or Aggregates) designed to satisfy confirmed requirements without violating neutrality.
- **Conditional / Pending Confirmation**: Concepts originating exclusively from the Delegate's Supplementary Case (GRE, vehicles, drivers, transport dispatches).

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
|  | User & Sandbox Aggregate       |           | Transport Aggregate (CONDITIONAL)  |  |
|  | - User (Root)                  |           | - RemissionGuide / GRE (Root)      |  |
|  | - DemoSandboxSession (Entity)  |           | - Vehicle & Driver (Entities)      |  |
|  +--------------------------------+           | - DispatchAdviceXml (VO)           |  |
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
  - `TaxCategory`: Applicable tax regime classification (`TaxCategory` Enum) (*Confirmed*, `FR-008`, `FR-011`).
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
  - `SUJETO_A_ISC`: Items incurring Selective Consumption Tax (e.g., alcoholic beverages, tobacco, sugary drinks).
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Complete list of applicable tax rates and exemptions for ABC Software Corp.).

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
  - `Customer`: Legal recipient entity (`Customer` Entity with `RucNumber` or identity document) (*Confirmed*, `FR-006`, `FR-007`).
  - `Currency`: Document currency (`PEN` or `USD`) (*Confirmed*, `FR-011`).
  - `Lines`: Ordered collection of `DocumentLineItem` entities (*Confirmed*, `FR-008`).
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
  - Checksum validation: The 11th digit must equal the Modulo 11 check digit calculated across the first 10 digits using factors `[5, 4, 3, 2, 7, 6, 5, 4, 3, 2]`.

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
  - `ACCEPTED`: Successfully accepted by tax authority with valid CDR (status code 0).
  - `REJECTED`: Rejected by tax authority (contains specific SUNAT error code).
  - `CANCELLED`: Legally cancelled via official communication (*Comunicación de Baja*).

---

### 4.4 Aggregate 4: System User & Evaluation Sandbox

#### Concept: `User` (Aggregate Root Entity)
- **Status**: Confirmed
- **Traces to**: `FR-013`, `FR-014`, `UC-007`, `AC-012`
- **Description**: Represents an authenticated human operator interacting with the modular monolith.
- **Attributes**:
  - `UserId`: Unique user identifier.
  - `Username`: Login name.
  - `Role`: Operating role (`BILLING_CLERK`, `WAREHOUSE_OPERATOR`, `ADMINISTRATOR`, `DEMO_USER`).
  - `IsActive`: Account status.

#### Concept: `DemoSandboxSession` (Entity / Execution Context)
- **Status**: Confirmed
- **Traces to**: `FR-014`, `NFR-011`, `UC-007`, `AC-013`, `Q-03`
- **Description**: Enforces isolation guarantees when an operator interacts as `DEMO_USER`.
- **Domain Invariants**:
  - Any transaction executed in this session must route persistence to an isolated sandbox data store (or in-memory mock).
  - Live external HTTP/SOAP dispatches to production SUNAT endpoints are structurally forbidden.
  - All generated documents and reports must bear the immutable attribute `IsDemo = true`.

---

### 4.5 Aggregate 5: Goods Transport & Electronic Remission Guide (GRE)

> **Important Scope Notice**: This aggregate originates exclusively from the **Delegate's Supplementary Case**. It remains **Conditional / Pending Confirmation** regarding whether it forms part of the evaluated core assessment ([Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)).

#### Concept: `ElectronicRemissionGuide` (Aggregate Root Entity - CONDITIONAL)
- **Status**: Conditional / Pending Confirmation
- **Traces to**: `FR-018`, `FR-019`, `FR-020`, `UC-009`, `UC-010`, `AC-019`, `AC-020`, `AC-021`
- **Description**: Represents an Electronic Remission Guide (*Guía de Remisión Electrónica - GRE*) legally required before transport vehicles leave with merchandise.
- **Attributes**:
  - `GreId`: Unique remission guide identifier.
  - `SeriesNumber`: Legal GRE series (e.g., `T001-00000001` under SUNAT Cat. 01 Code 09) (*Proposed*, `FR-018`).
  - `TransferReason`: Code defining reason for transport (e.g., Sale, Transfer between warehouses) (*Proposed / SUNAT Cat. 20*, `FR-018`).
  - `TransportMode`: Mode of transport (`PUBLIC` via commercial carrier or `PRIVATE` via ABC Software Corp. fleet) (*Proposed / SUNAT Cat. 18*, `FR-018`).
  - `OriginAddress`: Physical address of warehouse departure (*Conditional*, `FR-018`).
  - `DeliveryAddress`: Physical destination address of the customer (*Conditional*, `FR-018`).
  - `Carrier`: Transport company details (if `PUBLIC`) or driver/vehicle details (if `PRIVATE`) (*Conditional*, `FR-018`).
  - `ShippedItems`: Collection of merchandise items, gross weight, and quantities (*Conditional*, `FR-018`).
  - `XmlPayload`: UBL 2.1 Dispatch Advice XML payload (`<DespatchAdvice>`) (*Conditional*, `FR-019`).
  - `XsdValidationStatus`: Result of local XSD schema verification (`VALID`, `INVALID`) (*Conditional*, `FR-020`, `AC-021`).
  - `DepartureCleared`: Boolean authorization gate allowing vehicle physical exit (*Conditional*, `FR-018`, `AC-019`).
- **Domain Invariants**:
  - A transport vehicle cannot be cleared for physical departure (`DepartureCleared = true`) unless the associated GRE has achieved verified XSD validity and approved tax status (`AC-019`).
  - Gross weight must be strictly positive ($> 0.00$).

---

## 5. Domain Invariants Summary Table

| Domain Invariant ID | Target Aggregate | Rule Statement | Enforcing Requirement |
|---|---|---|---|
| `INV-001` | Product | Unit price must be non-negative; description cannot be empty | `FR-001`, `FR-006` |
| `INV-002` | Inventory | Stock movements are immutable once posted; timestamp cannot be future | `FR-002`, `AC-002` |
| `INV-003` | Inventory | Outbound sales cannot result in negative stock unless authorized | `FR-004`, `AC-004` |
| `INV-004` | Billing | Customer RUC must satisfy 11-digit Modulo 11 checksum algorithm | `FR-007`, `AC-007` |
| `INV-005` | Billing | Total payable must equal sum of line taxable bases + taxes with 0.00 drift | `FR-008`, `NFR-009`, `AC-008` |
| `INV-006` | Billing | Signed or accepted electronic invoices are permanently immutable | `FR-012`, `NFR-012` |
| `INV-007` | Sandbox | DEMO user actions must execute in isolation without live tax emissions | `FR-014`, `NFR-011`, `AC-013` |
| `INV-008` | Transport *(Conditional)* | Vehicle departure requires valid, XSD-verified GRE document | `FR-018`, `FR-020`, `AC-019` |
