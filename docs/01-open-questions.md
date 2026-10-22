# Register of Open Questions (`docs/01-open-questions.md`)

## 1. Overview
This register catalogs all critical questions and technical ambiguities that must be formally clarified by the course instructor, evaluation committee, or product owner before proceeding with detailed system specifications, architectural decisions, and software implementation.

To maintain architectural integrity, **no assumptions** will be made on any of these points.

---

## 2. Categorized Open Questions

### Category A: Scope and Functional Boundaries

- **Q-01: Is the Electronic Remission Guide (GRE) part of the mandatory evaluated scope?**
  - *Context*: The primary assessment specifies wholesale and retail grocery sales and warehouse ins/outs, while the delegate's supplementary narrative introduces customer transport and a mandatory Electronic Remission Guide (*Guía de Remisión Electrónica* - GRE) using UBL Dispatch Advice and XSD validation.
  - *Question*: Is the GRE module a required deliverable for the core assessment evaluation, a supplementary/bonus module, or merely an illustrative scenario?
  - *Impact*: Affects domain aggregates, UBL document schemas, XSD validations, and workflow state machines.

- **Q-02: Which specific Electronic Payment Receipts (CPE) must be supported?**
  - *Context*: The assessment cites errors in IGV and ISC calculation and lack of formal XML generation for wholesale and retail operations.
  - *Question*: What is the exhaustive list of required electronic document types (SUNAT Catalogo No. 01)? Specifically:
    - *Factura Electrónica* (Code 01) - mandatory for B2B wholesale?
    - *Boleta de Venta Electrónica* (Code 03) - mandatory for B2C retail?
    - *Nota de Crédito Electrónica* (Code 07) and *Nota de Débito Electrónica* (Code 08)?
    - *Guía de Remisión Remitente* (Code 09) and/or *Guía de Remisión Transportista* (Code 31)?
  - *Impact*: Governs document entity schemas, UBL 2.1 templates, and tax catalog mappings.

- **Q-03: What are the exact credentials, roles, permissions, and test workflows for the DEMO user?**
  - *Context*: The assessment explicitly requests use cases based on the needs of electronic invoicing users and specifically mentions a DEMO user. However, the assessment specifies zero credentials, roles, permissions, personal data, or test workflows.
  - *Question*:
    - What credentials (e.g., username, password, or direct login bypass) should be assigned to the DEMO user?
    - What specific role(s) and permission set should the DEMO user possess (e.g., read-only inspection, mock warehouse movements, or simulated invoice generation)?
    - What test data or personal data (if any) should be associated with the DEMO user, or should generic mock data be preloaded?
    - What exact demonstration workflows (e.g., end-to-end invoice simulation, warehouse dispatch simulation) are expected during evaluation?
    - Should the DEMO user operate in a completely isolated sandbox database with external dispatches mocked/blocked to prevent any live tax emission?
  - *Impact*: Determines authentication design, permission matrix, sandbox data segregation, and demonstration state management.

---

### Category B: Legacy Visual FoxPro 9 Database & Migration

- **Q-04: What is the physical and logical structure of the legacy Visual FoxPro 9 database?**
  - *Context*: The existing database contains warehouse movements, products, dates, and internal document numbers, but the database structure is undisclosed. Schemas cannot be invented.
  - *Question*:
    - Is the legacy data stored in a Visual FoxPro Database Container (`.DBC`) or as free table files (`.DBF` / `.FPT` memo / `.CDX` index)?
    - What are the exact table names, column names, data types, primary/foreign keys, and character encodings (e.g., Windows-1252, CP850)?
    - Will an export file, a DDL schema dump, or sample anonymized `.DBF` files be provided for mapping analysis?
  - *Impact*: Blocks the creation of the legacy-to-target field mapping manifesto (`specs/migration/legacy-mapping-manifesto.md`).

- **Q-05: Where is the valid legacy business logic located and how will it be accessed?**
  - *Context*: The assessment mandates preserving historical data and existing valid business logic without damaging the database.
  - *Question*:
    - Is legacy logic implemented in database stored procedures inside the `.DBC`, in procedural code files (`.PRG`), in screen forms (`.SCX`), or in visual class libraries (`.VCX`)?
    - Will legacy source code access be provided for extraction, or should the business rules be reverse-engineered from user interviews and functional behavior?
  - *Impact*: Dictates whether migration requires source code decompilation/inspection or black-box requirement elicitation.

- **Q-06: What data sanitization and historical volume constraints exist?**
  - *Context*: Visual FoxPro databases often lack relational integrity constraints, allowing orphan records, null substitutes (e.g., spaces or zeros), and duplicate internal document numbers.
  - *Question*: What are the expected business rules for handling corrupted, incomplete, or non-compliant historical records during migration?
  - *Impact*: Governs validation scripts, migration staging pipelines, and error rejection logs.

---

### Category C: Technology Stack and Architectural Constraints

- **Q-07: What programming languages, frameworks, and runtimes are required or permitted?**
  - *Context*: The assessment specifies an initial clean/modular monolith using MVC, preparing for Hexagonal Architecture, Windows MSI, and Android APK, but does not state the technology platform.
  - *Question*: Which technological ecosystem is required or preferred for the course?
    - .NET ecosystem (C#, ASP.NET Core MVC / .NET MAUI)?
    - Java ecosystem (Java, Spring Boot MVC, Android SDK)?
    - TypeScript/Node.js ecosystem (NestJS / Express MVC, Electron, React Native / Capacitor)?
    - Python ecosystem (Django MVC, Kivy/BeeWare)?
  - *Impact*: Fundamental prerequisite before any project scaffolding, solution setup, or implementation can occur.

- **Q-08: What target Database Management System (RDBMS) is mandated?**
  - *Context*: The new system must store modernized domain entities and migrated historical data in a robust relational database.
  - *Question*: Which target database is authorized (e.g., PostgreSQL, Microsoft SQL Server, MySQL, SQLite)?
  - *Impact*: Influences data types, migration scripts, ORM selection, and deployment topology.

- **Q-09: What is the architectural model uniting the MVC Monolith, the Windows MSI, and the Android APK?**
  - *Context*: The assessment requests an MVC modular monolith, an MSI installer for Windows, and an APK for Android.
  - *Question*: How are these three deployment artifacts intended to interact?
    - *Scenario 1*: The modular monolith is a backend web application providing MVC server-rendered views for desktop browsers, while a lightweight native Android APK and Windows desktop wrapper consume shared REST services.
    - *Scenario 2*: The modular monolith is a desktop client application packaged via MSI, and the Android APK is a separate mobile warehouse client connecting to a central synchronization API.
    - *Scenario 3*: A single cross-platform framework (e.g., .NET MAUI, Flutter) compiles the application into both an MSI and an APK.
  - *Impact*: Directly determines system boundaries, packaging pipelines, offline data synchronization, and client-server topology.

---

### Category D: Peruvian Tax Compliance & SUNAT Integration

- **Q-10: Which official SUNAT regulatory resolutions and UBL specifications apply?**
  - *Context*: Peruvian electronic invoicing has evolved across multiple resolutions (e.g., RS 097-2012, RS 117-2017, RS 193-2020, and recent GRE resolutions RS 123-2022/SUNAT).
  - *Question*: Is the system expected to comply strictly with **UBL 2.1** under current SUNAT Annexes (e.g., Resolucion de Superintendencia 193-2020 and 123-2022 for GRE), or is an earlier standard acceptable for evaluation?
  - *Impact*: Dictates UBL namespace definitions, XML node structures, and mandatory XSD schemas.

- **Q-11: What are the verified tax rates, algorithms, and exemptions for ABC Software Corp.?**
  - *Context*: The assessment mentions an 18% IGV rate, but cautions that tax rates, codes, and rules must be verified against official sources. Grocery distribution often involves exempt agricultural goods (*Bienes Exonerados* - Apéndice I Ley del IGV), ISC on alcoholic/sugary beverages, and ICBPER for plastic bags.
  - *Question*:
    - Must the system support multiple tax regimes (Gravado, Exonerado, Inafecto, Exportación)?
    - Which specific products incur ISC, and what calculation method applies (Sistema Al Valor, Sistema Específico, or Precio de Venta al Público)?
    - Is the ICBPER tax (*Impuesto al Consumo de Bolsas de Plástico*) required for retail grocery sales?
  - *Impact*: Shapes the tax calculation engine, rounding algorithms (half-up to 2 decimals), and line-item tax breakdown structures.

- **Q-12: Which external integration pathway is authorized and required for testing?**
  - *Context*: The legacy system has no adequate electronic integration with SUNAT or a PSE/OSE.
  - *Question*:
    - How will integration be tested and evaluated?
      - Direct connection to SUNAT Beta / Testing Web Services (SOAP / REST)?
      - Connection via an authorized third-party PSE (*Proveedor de Servicios Electrónicos*) or OSE (*Operador de Servicios Electrónicos*) API?
      - A fully hermetic local mock / simulator (stubs simulating CDR acceptance/rejection)?
    - Will official SUNAT test SOL credentials (RUC 20xxxxxxxx, Usuario SOL, Clave SOL) and test digital certificates (`.pfx` / `.p12`) be supplied by the course?
  - *Impact*: Determines whether digital signing libraries (XMLDSig) and secure keystores must be implemented locally or delegated to a service adapter.

- **Q-13: What specific RUC validation mechanism, external service, or integration method is authorized?**
  - *Context*: The assessment identifies "difficulty validating RUC numbers" as a critical legacy deficiency, making RUC validation a confirmed functional requirement (`FR-007`). However, the assessment does not define the exact validation rules, whether an external SUNAT service must be queried, or the authorized integration method. In accordance with project rules, no external SUNAT endpoints, web-scraping routines, or unverified protocols may be invented.
  - *Question*:
    - Is statutory offline mathematical validation (11-digit numeric format, valid prefixes 10/15/17/20, and Modulo 11 check digit verification) sufficient for evaluation?
    - Is an online verification query required against an official SUNAT service (such as SUNAT's *Padrón Reducido RUC* dataset or SUNAT REST API) to verify contributor state (*Activo*) and condition (*Habido*)?
    - If an external SUNAT endpoint or integration method is required, what is the official URL, protocol, and required authentication token/credentials provided for evaluation?
    - How should validation handle offline network conditions or temporary SUNAT service unavailability?
  - *Impact*: Governs whether RUC validation is encapsulated as an offline domain Value Object rule or implemented via an asynchronous external network adapter.

- **Q-14: How should legacy internal document numbers relate to legal SUNAT series numbering?**
  - *Context*: The legacy system tracks "internal document numbers", while SUNAT electronic invoicing requires standardized series (e.g., F### for Facturas, B### for Boletas, T### for Remission Guides) with an 8-digit sequential correlative.
  - *Question*: Should the modernized system maintain a dual numbering scheme (preserving legacy internal voucher numbers alongside legal SUNAT series/correlatives), or will the SUNAT series completely replace internal numbers?
  - *Impact*: Affects document aggregate identifiers, invoice headers, and audit cross-referencing.

- **Q-15: Does the Android APK require offline operational capabilities?**
  - *Context*: The system requires an Android APK distribution, which may be operated in warehouse environments or during customer delivery dispatches.
  - *Question*: Must the Android application support offline operation with local database synchronization (e.g., SQLite/Room), or is constant real-time network connectivity to the central backend assumed?
  - *Impact*: Governs mobile client architecture, local data caching, conflict resolution, and offline transaction queues.

- **Q-16: How should Visual FoxPro soft-deleted records (`SET DELETED`) be handled during migration?**
  - *Context*: Visual FoxPro marks deleted records with an asterisk (`0x2A` / `*`) in the record header byte without physically purging them until a `PACK` command is issued.
  - *Question*: Should soft-deleted historical records be filtered out and ignored during extraction (equivalent to `SET DELETED ON`), or should they be extracted into a separate historical audit archive?
  - *Impact*: Affects staging extraction queries, historical record counts, and reconciliation formulas (`AC-015`).

- **Q-17: What code page / character encoding is used in the legacy DBF files?**
  - *Context*: Peruvian legacy systems commonly use Windows-1252 (ANSI Latin 1) or MS-DOS CP850. Opening files with the wrong encoding corrupts accented Spanish characters (`á`, `é`, `í`, `ó`, `ú`) and `ñ`.
  - *Question*: What is the official code page recorded in byte 29 of the legacy `.DBF` files, and are there known encoding mismatches in historical text fields?
  - *Impact*: Governs charset transcoding algorithms in the migration sanitization pipeline.

- **Q-18: Does the inventory domain require automated inventory valuation (costing)?**
  - *Context*: Legacy warehouse tracking records incoming goods, outgoing goods, and dates, but the assessment does not state whether unit costs and inventory valuation methods (e.g., Weighted Average / *Promedio Ponderado* or FIFO / *PEPS*) are maintained.
  - *Question*: Is inventory tracking limited strictly to physical quantities, or must the system maintain inventory cost accounting and valuation?
  - *Impact*: Influences warehouse movement line attributes, stock balance aggregates, and accounting integration models.

- **Q-19: Are commercial payment terms (Contado vs. Crédito under RS 193-2020) required?**
  - *Context*: SUNAT Resolution RS 193-2020/SUNAT mandates that invoices declare payment terms (*Contado* or *Crédito*). For credit sales, installment amounts, due dates, and net pending amounts must be reported.
  - *Question*: Does the evaluated scope require installment schedule management for credit sales, or is single-payment *Contado* sufficient for evaluation?
  - *Impact*: Governs invoice header attributes, payment term DTOs, and UBL `<cac:PaymentTerms>` nodes.

- **Q-20: Is the Plastic Bag Consumption Tax (ICBPER) required for retail operations?**
  - *Context*: Peruvian retail merchandise sales commonly incur the Single-Use Plastic Bag Tax (*ICBPER* under Ley 30884 and SUNAT Cat. 05 Code 7152).
  - *Question*: Must the retail module and tax calculation engine support ICBPER line items and tax subtotals?
  - *Impact*: Adds an additional tax category and calculation rule to the billing engine.

- **Q-21: What authentication and authorization scheme is required for the REST API?**
  - *Context*: The system specification introduces an OpenAPI 3.0.3 contract for future desktop/mobile client integration and modular monolith evolution. However, the assessment does not state the authentication standard. In accordance with project rules, no security schemes or credentials may be invented.
  - *Question*: What authentication and authorization standard is required for REST endpoints?
    - Bearer JWT tokens with stateless validation?
    - Cookie-based session authentication for web clients with API keys for external/mobile services?
    - Basic authentication with TLS for evaluation?
  - *Impact*: Dictates the `components.securitySchemes` configuration in `specs/api/openapi.yaml` and client authorization headers.

---

## 3. Summary of Blocking Items
Before initiating technical implementation or detailed code architecture, resolutions are strictly required for:
1. **Core Scope Boundaries**: Clarification of Q-01 (GRE requirement) and Q-02 (CPE document types).
2. **Legacy Inputs**: Provision of the VFP 9 schema (Q-04), legacy business rules (Q-05), soft-delete policy (Q-06, Q-16), and encoding (Q-17).
3. **Target Technology Stack**: Confirmation of the programming language, runtime, and RDBMS (Q-07, Q-08).
4. **Distribution Architecture**: Clarification of the MSI/APK architectural topology, mobile connectivity, and API authentication (Q-09, Q-15, Q-21).
5. **Evaluation Environment**: Testing credentials, digital certificates, and simulation mode authorization (Q-03, Q-12).
6. **Regulatory Clarifications**: Confirmation of ISC calculation modes (Q-11), payment terms (Q-19), and ICBPER applicability (Q-20).



