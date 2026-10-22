# Use Case Specifications (`specs/requirements/use-cases.md`)

## 1. Document Overview
This document specifies the primary use cases for ABC Software Corp.'s enterprise software modernization. The use cases reflect the operational needs of electronic invoicing users, warehouse staff, the evaluation DEMO user, legacy migration administrators, and the specific merchandise transport dispatch scenario.

Every use case links to its functional (`FR-xxx`) and non-functional (`NFR-xxx`) requirements, specifies its source attribution, identifies its certainty status, and references open questions in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Actor Catalog
- **Billing Clerk / Invoicing Operator**: Issues sales documents, inputs customer tax data, initiates document signing and external transmission.
- **Warehouse Operator / Dispatcher**: Records inbound merchandise receipts, oversees stock movements, prepares outbound goods, and initiates dispatch documentation.
- **DEMO User**: Evaluator, instructor, or trainee testing system capabilities within an isolated sandbox environment.
- **Migration Specialist / System Administrator**: Executes non-destructive data extraction from Visual FoxPro 9 and reviews reconciliation audits.
- **Tax Authority / Service Provider (External System)**: SUNAT or an authorized PSE/OSE receiving XML documents and returning CDR responses.

---

## 3. Use Cases Catalog

### 3.1 Legacy Warehouse & Commercial Operations

#### `UC-001`: Record Goods Inbound / Warehouse Reception
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-002`, `FR-003`, `FR-005`, `NFR-001`
- **Primary Actor**: Warehouse Operator
- **Preconditions**:
  - The operator is authenticated with warehouse permissions.
  - The products being received exist in the product catalog.
- **Trigger**: Physical goods arrive at the warehouse from a supplier or transfer.
- **Main Success Scenario**:
  1. The operator initiates a new Inbound Warehouse Receipt.
  2. The system auto-generates a unique, sequential internal tracking number and sets the current timestamp.
  3. The operator enters line items specifying product identifier, batch/description (if available), and received quantity.
  4. The operator confirms the receipt.
  5. The system validates quantities, increments stock balances, and records an immutable inventory movement.
  6. The system displays a confirmation with the internal document number.
- **Alternative / Exception Flows**:
  - *3a. Product does not exist*: The operator is prompted to create the product entry (`FR-001`) before proceeding.
  - *5a. Invalid quantity (zero or negative)*: The system rejects the entry with a validation error.
- **Postconditions**: Product stock is incremented, and the inbound transaction is auditable.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

#### `UC-002`: Record Wholesale or Retail Goods Outbound / Sale
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-001`, `FR-002`, `FR-004`, `FR-005`, `FR-006`, `NFR-001`
- **Primary Actor**: Billing Clerk / Warehouse Dispatcher
- **Preconditions**:
  - Requested products exist in catalog with sufficient stock.
- **Trigger**: A wholesale sales order or retail counter purchase is initiated.
- **Main Success Scenario**:
  1. The actor selects the transaction mode (Wholesale or Retail).
  2. The actor adds product items and requested quantities.
  3. The system checks available inventory for each line item.
  4. The actor confirms the outbound order.
  5. The system decrements stock balances, generates an internal document tracking number, and transitions the order to billing/dispatch readiness.
- **Alternative / Exception Flows**:
  - *3a. Insufficient stock*: The system blocks the line item and displays available quantity, preventing negative inventory.
- **Postconditions**: Stock balances are decremented, and an outbound transaction record is logged.
- **Open Questions**: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

### 3.2 Tax Compliance & Electronic Invoicing

#### `UC-003`: Validate Taxpayer Identity (RUC Check)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-007`, `NFR-009`
- **Primary Actor**: Billing Clerk / System
- **Preconditions**: Customer requests an official tax invoice requiring a legal business identity.
- **Trigger**: User inputs a RUC number during invoice preparation.
- **Main Success Scenario**:
  1. The actor enters the 11-digit RUC number.
  2. The system executes structural validation (11 digits, numeric-only, valid legal prefix: 10, 15, 17, 20).
  3. The system computes the Modulo 11 verification check digit.
  4. The calculated check digit matches the 11th digit.
  5. The system accepts the RUC and allows invoice creation to proceed.
- **Alternative / Exception Flows**:
  - *2a/3a/4a. Validation fails*: The system rejects the input, flags the specific invalid condition (e.g., invalid prefix, bad checksum), and blocks tax invoice generation.
- **Postconditions**: Only structurally valid RUC numbers are linked to issued electronic invoices.
- **Open Questions**: [Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration) (Need for online SUNAT API check).

---

#### `UC-004`: Compute Transaction Taxes (IGV and ISC)
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-008`, `FR-011`, `NFR-009`
- **Primary Actor**: System (Tax Engine)
- **Preconditions**: Line items, quantities, and unit values have been specified.
- **Trigger**: The actor requests subtotal/total calculation for a sale.
- **Main Success Scenario**:
  1. For each line item, the system determines applicable tax classification codes from SUNAT catalogs.
  2. If applicable, the system calculates ISC according to the verified rate and tax base.
  3. The system calculates IGV on the taxable base (including ISC if prescribed by law) using arbitrary-precision math.
  4. The system rounds line amounts using standard half-up rounding to 2 decimal places.
  5. The system sums taxable bases, tax amounts, and payable totals, ensuring the sum of line amounts equals the document total.
- **Alternative / Exception Flows**:
  - *1a. Tax category missing/unverified*: The system halts calculation and raises a configuration alert.
- **Postconditions**: Accurate, mathematically consistent tax totals are established for the document.
- **Open Questions**: [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

#### `UC-005`: Generate and Sign Electronic Document XML
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-009`, `FR-011`, `FR-012`, `NFR-010`
- **Primary Actor**: System (Electronic Invoicing Module)
- **Preconditions**:
  - Outbound order is confirmed and tax calculations are complete.
  - SUNAT catalog codes (document type, currency) are assigned.
- **Trigger**: Billing Clerk clicks "Generate Electronic Invoice".
- **Main Success Scenario**:
  1. The system retrieves document metadata, party tax identities, line items, and tax breakdowns.
  2. The system formats the payload into an official UBL 2.1 XML document.
  3. The system applies the digital signature (XMLDSig) using the authorized certificate.
  4. The system stores the signed XML document and updates document status to `SIGNED`.
- **Alternative / Exception Flows**:
  - *3a. Certificate missing or expired*: The system logs a critical signing error and retains document in `DRAFT` status.
- **Postconditions**: A well-formed, digitally signed UBL XML file is stored and ready for dispatch.
- **Open Questions**: [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [Q-12](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

#### `UC-006`: Transmit Document to SUNAT / PSE / OSE and Process CDR
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-010`, `FR-012`, `NFR-012`
- **Primary Actor**: Invoicing Operator / Integration Service
- **Preconditions**: Document status is `SIGNED`.
- **Trigger**: Scheduled background worker or operator manually initiates transmission.
- **Main Success Scenario**:
  1. The system packages the signed XML (e.g., into a ZIP container as specified by SUNAT protocols).
  2. The system connects to the authorized external service endpoint (SUNAT or PSE/OSE).
  3. The system transmits the document payload.
  4. The external service returns a response containing the CDR (*Constancia de Recepción*).
  5. The system parses the CDR, extracts the SUNAT response code, and updates document status to `ACCEPTED`.
  6. The system archives the CDR and logs the audit event.
- **Alternative / Exception Flows**:
  - *4a. External service returns rejection (error code)*: The system transitions status to `REJECTED`, records the rejection code/reason, and alerts the billing clerk.
  - *4b. Network timeout / unavailable endpoint*: The system transitions status to `PENDING_RETRY` and queues the document for retry without altering business data.
- **Postconditions**: Document has an updated status and archived CDR response.
- **Open Questions**: [Q-12](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### 3.3 Evaluation & Demonstration

#### `UC-007`: Perform Invoicing and Warehouse Simulation as DEMO User
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-013`, `FR-014`, `NFR-011`
- **Primary Actor**: DEMO User (Evaluator / Trainee)
- **Preconditions**: The application is started with the DEMO user account selected.
- **Trigger**: Evaluator logs in as DEMO.
- **Main Success Scenario**:
  1. The system initializes an isolated sandbox session (or in-memory mock store) containing sample grocery products and mock customers.
  2. The system displays a persistent visual indicator: "DEMO MODE - NON-TAX SANDBOX".
  3. The DEMO user executes warehouse receipts, sales, tax calculations, and XML generation.
  4. External transmission attempts are intercepted and resolved locally with simulated successful CDR responses.
  5. The DEMO user inspects generated XML, calculation outputs, and document states.
- **Alternative / Exception Flows**:
  - *3a. DEMO user attempts to access production database*: The system explicitly blocks access and enforces sandbox boundaries.
- **Postconditions**: Production records, legacy databases, and live tax authority endpoints remain completely untouched.
- **Open Questions**: [Q-03](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### 3.4 Legacy Data Migration

#### `UC-008`: Extract and Reconcile Legacy Visual FoxPro Data
- **Source**: Teacher Assessment
- **Status**: Confirmed
- **Traces to**: `FR-015`, `FR-016`, `FR-017`, `NFR-007`, `NFR-008`
- **Primary Actor**: Migration Specialist / System Administrator
- **Preconditions**:
  - Read-only access to legacy Visual FoxPro files.
  - Visual FoxPro schema mapping approved.
- **Trigger**: Administrator launches the migration pipeline.
- **Main Success Scenario**:
  1. The migration utility computes SHA-256 hashes of all source legacy files.
  2. The utility reads legacy tables in read-only mode and copies raw records to a staging area.
  3. The utility verifies source file hashes have not changed.
  4. The utility executes data transformation and validation rules against domain invariants.
  5. Valid records are ingested into target relational database tables.
  6. Invalid or orphaned records are routed to an exception log with reason codes.
  7. The utility generates a reconciliation report matching source rows to (ingested rows + rejected rows).
- **Alternative / Exception Flows**:
  - *1a. Source files locked or corrupted*: Migration halts immediately with an audit alert.
- **Postconditions**: Legacy data is migrated without modifying or damaging original VFP files.
- **Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

### 3.5 Supplementary Case: Merchandise Transport & GRE

> **Scope Note**: Use cases in this section derive exclusively from the **Delegate's Supplementary Case** and are **Pending Confirmation** regarding whether they are part of the evaluated core assessment.

#### `UC-009`: Issue and Validate Electronic Remission Guide (GRE) for Transport
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Traces to**: `FR-018`, `FR-019`, `NFR-010`
- **Primary Actor**: Warehouse Dispatcher
- **Preconditions**:
  - A customer transport order exists with prepared merchandise.
  - Transport vehicle and driver/carrier details are registered.
- **Trigger**: Merchandise is loaded and vehicle is scheduled for departure.
- **Main Success Scenario**:
  1. The dispatcher initiates GRE generation for the transport order.
  2. The dispatcher enters/confirms transfer reason, transport mode (Private or Public), carrier/vehicle data, and destination address.
  3. The system generates the UBL Dispatch Advice XML payload (`FR-019`).
  4. The system invokes XSD validation (`UC-010`).
  5. Upon successful validation and signing, the GRE receives `VALID` status.
  6. The system clears the vehicle for physical departure and prints/displays the official dispatch QR/representation.
- **Alternative / Exception Flows**:
  - *4a. XSD validation fails*: System blocks vehicle departure, displays schema errors, and flags GRE as `VALIDATION_FAILED`.
  - *6a. Vehicle attempts departure without valid GRE*: Gate workflow prevents dispatch release.
- **Postconditions**: Vehicle departs legally with an authenticated Electronic Remission Guide.
- **Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

#### `UC-010`: Validate GRE XML against Official XSD Schema
- **Source**: Delegate's Supplementary Case
- **Status**: Pending Confirmation (Conditional on evaluated scope)
- **Traces to**: `FR-020`, `NFR-010`
- **Primary Actor**: System (Validation Component)
- **Preconditions**: GRE UBL Dispatch Advice XML has been generated.
- **Trigger**: Automatic validation triggered before document signing and vehicle clearance.
- **Main Success Scenario**:
  1. The validation component loads the generated GRE XML.
  2. The component parses the XML against the official SUNAT UBL Dispatch Advice XSD schema files.
  3. The document satisfies all schema constraints (element hierarchy, mandatory fields, code list enumerations).
  4. The component returns a `SCHEMA_VALID` confirmation.
- **Alternative / Exception Flows**:
  - *3a. Schema error detected*: The component halts execution, logs exact line number, invalid element name, and schema violation rule, and returns a `SCHEMA_INVALID` status.
- **Postconditions**: Only 100% XSD-compliant XMLs proceed to external transmission.
- **Open Questions**: [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries), [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).
