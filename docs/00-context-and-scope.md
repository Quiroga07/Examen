# Context and Scope Specification (`docs/00-context-and-scope.md`)

## 1. Document Overview
This document establishes the official context, baseline boundaries, and source provenance for the modernization of ABC Software Corp.'s enterprise systems. Following a strict **spec-first approach**, this document consolidates all factual parameters provided for the assessment, clearly segregating primary assessment directives from the delegate's supplementary narrative, and categorizing every element as a **Fact**, **Inference**, or **Open Question**.

---

## 2. Source-by-Source Requirements Attribution

### 2.1 Context Provided by the Assessment (Primary Source)
The core assessment defines the overarching corporate scenario, legacy constraints, regulatory pain points, architectural trajectory, and deliverable expectations:

1. **Company Profile and Operations**:
   - **Origin**: Assessment Context.
   - **Detail**: ABC Software Corp. is a medium-sized company operating in both wholesale and retail commerce of groceries and general merchandise.

2. **Legacy System Baseline**:
   - **Origin**: Assessment Context.
   - **Detail**: The company relies on a legacy **Visual FoxPro 9** system.
   - **Functional Scope in Legacy**: Records basic warehouse data, specifically:
     - Dates of transactions.
     - Incoming goods (receptions/purchases) and outgoing goods (dispatches/sales).
     - Product catalog entries.
     - Internal document tracking numbers.

3. **Current Deficiencies and Operational Pain Points**:
   - **Origin**: Assessment Context.
   - **Detail**: The legacy system suffers from critical tax compliance and electronic documentation deficiencies:
     - Inability/difficulty in validating RUC numbers (*Registro Único de Contribuyentes*).
     - Calculation errors in applicable taxes, specifically IGV (*Impuesto General a las Ventas*) and ISC (*Impuesto Selectivo al Consumo*).
     - Complete absence of formal, standardized XML generation.
     - Lack of adequate electronic integration with SUNAT (*Superintendencia Nacional de Aduanas y de Administración Tributaria*) or an authorized Electronic Services Provider (*Proveedor de Servicios Electrónicos* - PSE / *Operador de Servicios Electrónicos* - OSE).

4. **Legacy Migration and Data Integrity Directives**:
   - **Origin**: Assessment Context.
   - **Detail**:
     - Historical data and valid existing business logic must be preserved.
     - The existing Visual FoxPro 9 database must **not be damaged, altered, or deleted** under any circumstance (non-destructive, read-only extraction).
     - The migration specification must define how legacy data structures map to the new system.
     - **Constraint**: The exact structure (tables, fields, keys, data types) of the Visual FoxPro database is currently unknown. No schemas, tables, columns, or internal rules may be invented.

5. **Peruvian Regulatory and Tax Framework**:
   - **Origin**: Assessment Context.
   - **Detail**:
     - The system must adhere to Peruvian tax legislation and SUNAT catalogs (including Document Types, Document Statuses, and Currency Codes).
     - The case notes an 18% IGV rate, but tax rates, codes, and calculation rules must be verified against official SUNAT regulations before being treated as definitive.

6. **Target Architecture and Evolution Requirements**:
   - **Origin**: Assessment Context.
   - **Detail**:
     - **Initial Architecture**: Clean or modular monolith implementing the Model-View-Controller (MVC) pattern.
     - **Architectural Evolution**: Designed to evolve toward Hexagonal Architecture (Ports and Adapters) or Clean Architecture.
     - **Future Scalability**: Must be capable of supporting REST services and horizontal scaling.
     - **Deployment and Distribution**:
       - Windows desktop environment distributed via an **MSI installer**.
       - Android mobile environment distributed via an **APK package**.
     - **Users and Use Cases**: Use cases must address electronic invoicing user workflows, with an explicit requirement for a **DEMO user**.
     - **Technology Choice Rule**: Unclear or unstated implementation technologies must not be assumed; they must be formally logged as open questions.

7. **Expected Assessment Deliverables**:
   - **Origin**: Assessment Context.
   - **Detail**:
     1. Domain model, DTOs, and validation schemas.
     2. MVC architecture diagrams and future Hexagonal Architecture roadmap.
     3. API specifications and service contracts.
     4. Traceability matrix between SUNAT regulatory requirements and UBL 2.1 XML paths.

---

### 2.2 Context Provided by the Delegate's Supplementary Case (Secondary Source)
The delegate provides a specific operational narrative illustrating goods transportation and tax dispatch requirements:

1. **Merchandise Transport Scenario**:
   - **Origin**: Delegate's Supplementary Case.
   - **Detail**: Merchandise is transported to customers, introducing logistics and dispatch control into the transaction cycle.

2. **Electronic Remission Guide Mandatory Prerequisite**:
   - **Origin**: Delegate's Supplementary Case.
   - **Detail**: A valid Electronic Remission Guide (*Guía de Remisión Electrónica* - GRE) must be issued and validated before the transport vehicle is authorized to depart.

3. **UBL Dispatch Advice and Schema Validation**:
   - **Origin**: Delegate's Supplementary Case.
   - **Detail**: The GRE must conform to the **UBL Dispatch Advice** standard and undergo formal XML schema validation using **XSD** (*XML Schema Definition*).

4. **Scope Boundary Constraint**:
   - **Origin**: Case Guidance.
   - **Detail**: This dispatch scenario supplements the assessment but must **not** be assumed to constitute the entire system.

---

## 3. Epistemological Classification Matrix (Facts, Inferences, Open Questions)

To preserve analytical rigor and avoid unverified assumptions, every element of the project context is classified below:

| # | Item Description | Classification | Source | Rationale / Architectural Impact |
|---|---|---|---|---|
| 1 | ABC Software Corp. is a medium grocery & merchandise distributor (wholesale & retail). | **Fact** | Assessment Context | Defines domain multi-modality (both B2B wholesale and B2C retail operations). |
| 2 | Legacy system is Visual FoxPro 9 recording basic warehouse dates, ins/outs, products, document numbers. | **Fact** | Assessment Context | Identifies legacy technology and minimum known data concepts. |
| 3 | Visual FoxPro database structure (tables, fields, relations) is currently unknown. | **Fact** | Assessment Context | Prohibits inventing DB schemas; mandates schema discovery before migration specification. |
| 4 | Legacy database must not be modified or deleted. | **Fact** | Assessment Context | Requires strictly read-only legacy extraction pipelines (e.g., staging dump or read-only ODBC/OLEDB). |
| 5 | Legacy system fails at RUC validation, IGV/ISC tax math, XML generation, and SUNAT/OSE/PSE integration. | **Fact** | Assessment Context | Outlines key functional domains requiring re-engineering in the new system. |
| 6 | System must support Peruvian tax regulations, SUNAT catalogs, and verified tax rates (IGV 18% pending official verification). | **Fact** | Assessment Context | Prevents hardcoding tax rates; requires externalized, configurable, verified compliance tables. |
| 7 | Initial architecture must be a modular monolith using MVC. | **Fact** | Assessment Context | Establishes Phase 1 structural boundary; forbids microservices as an initial pattern. |
| 8 | Architecture must be prepared to transition to Hexagonal / Clean Architecture and support REST services. | **Fact** | Assessment Context | Requires internal domain logic to remain decoupled from MVC web/desktop controllers and UI layers. |
| 9 | Target distribution requires a Windows MSI installer and an Android APK. | **Fact** | Assessment Context | Dictates multi-client or cross-platform deployment considerations. |
| 10 | Use cases must address electronic invoicing users and provide a DEMO user. | **Fact** | Assessment Context | Mandates role-based workflows and an isolated demonstration profile/sandbox dataset. |
| 11 | Vehicles transporting customer goods require a valid GRE before departure. | **Fact** | Delegate's Case | Introduces GRE generation and validation into the operational shipping workflow. |
| 12 | GRE uses UBL Dispatch Advice and requires XSD validation. | **Fact** | Delegate's Case | Establishes XML validation standards for transport documents. |
| 13 | Specific programming language, runtime, and database engine for the new monolith. | **Open Question** | Assessment Context | Assessment does not name a tech stack (.NET, Java, TypeScript, Python, etc.). Assumptions prohibited. |
| 14 | Whether GRE is a mandatory core deliverable of the graded assessment or an illustrative supplementary case. | **Open Question** | Boundary Analysis | Crucial to determine whether GRE is in primary scope, secondary scope, or an optional module. |
| 15 | Scope of electronic invoice types beyond GRE (Factura 01, Boleta 03, Nota de Crédito 07, Nota de Débito 08). | **Inference** | Regulatory Context | Standard wholesale/retail invoicing in Peru typically requires Facturas and Boletas, but explicit scope must be confirmed. |
| 16 | The exact mechanism of interaction between the Windows desktop client, Android APK, and the modular monolith. | **Open Question** | Architectural Analysis | Whether the monolith is a desktop app (e.g., WPF/.NET MAUI) or a web-hosted server with thin desktop/mobile clients. |
| 17 | SUNAT integration pathway: Direct to SUNAT Beta/SOL, or through an authorized PSE/OSE. | **Open Question** | Compliance Analysis | Integration protocols, authentication endpoints, and certificate requirements depend on this decision. |
| 18 | Availability of digital signature certificate (.pfx/.p12) and SUNAT test credentials. | **Open Question** | Compliance Analysis | Needed for generating valid signed UBL XML payloads. |

---

## 4. System Boundaries

### 4.1 In-Scope (Firmly Established)
1. **Repository Organization & Spec-First Documentation**: Structural groundwork, folder structure, catalog of questions, baseline context.
2. **Domain Modeling**: Specifying core aggregates (Warehouse, Product, Transaction/Movement, Invoice, Tax Breakdown, Party/Taxpayer).
3. **Architectural Specification**: Designing the modular monolith MVC architecture, defining layer boundaries, and drafting the evolution plan toward Hexagonal/Clean Architecture.
4. **Peruvian Compliance & SUNAT Catalogs**: Cataloging official SUNAT codes (document types, currencies, taxes), formalizing tax algorithms, and drafting UBL 2.1 mapping specifications.
5. **Traceability Matrix**: Complete mapping linking Peruvian legal requirements to UBL XML nodes.
6. **Non-Destructive Migration Strategy**: Methodology for extracting legacy data and business logic without modifying or deleting legacy Visual FoxPro files.

### 4.2 Conditional / Supplementary Scope (Subject to Confirmation)
1. **Electronic Remission Guide (GRE - Dispatch Advice)**: Modeling goods transport, carrier/vehicle details, and XSD schema validation for GRE dispatches as introduced by the delegate's case.

### 4.3 Explicitly Out of Scope for Current Phase
1. **Code Implementation**: Writing backend code, frontend UI, database scripts, or packaging scripts.
2. **Database Modifications**: Executing DDL/DML, connecting to databases, or modifying legacy Visual FoxPro files.
3. **Live External Network Calls**: Connecting to SUNAT production or test endpoints, RUC consultation APIs, or external web services.
4. **Speculative Schema Design**: Inventing fields, tables, or legacy schemas without primary source inputs.
