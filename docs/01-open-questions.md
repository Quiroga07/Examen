# Register of Open Questions (`docs/01-open-questions.md`)

## 1. Overview
This register catalogs all critical questions and technical ambiguities that must be formally clarified by the course instructor, evaluation committee, or product owner before proceeding with detailed system specifications, architectural decisions, and software implementation.

To maintain architectural integrity, **no assumptions** will be made on any of these points.

---

## 2. Categorized Open Questions

### Category A: Scope and Functional Boundaries

- **Q-01: GRE scope — resolved for this phase (deferred/out of assessed scope).**
  - *Decision*: Goods transport, GRE, UBL Dispatch Advice, and GRE-specific XSD validation from the delegate's supplementary narrative are not part of the active assessed scope. No active requirement or API operation is in scope for them.

- **Q-02: Which specific Electronic Payment Receipts (CPE) must be supported?**
  - *Context*: The assessment cites errors in IGV and ISC calculation and lack of formal XML generation for wholesale and retail operations.
  - *Resolution*: Instructor grading feedback confirms credit-note and debit-note issuance as assessed API capabilities; the API distinguishes Catalog 01 note types `07`/`08` and associates each note with an original Factura or Boleta.
  - *Remaining question*: Which reason codes, note-specific required data, eligibility rules, and adjustment semantics apply? Do not infer these from the minimum API contract.
  - *Scope*: GRE document types are excluded from this CPE scope question; see the Q-01 scope decision.
  - *Impact*: Governs note validation and detailed UBL note content. The minimum request reuses the established invoice-line contract.

- **Q-03: What profile and permissions should be assigned to the DEMO user?**
  - *Context*: The assessment explicitly requests a DEMO user but specifies no credentials, role, or permissions.
  - *Question*:
    - What credentials and role/permission set should be assigned to the DEMO user?
  - *Impact*: Determines only the DEMO user's profile and access rights. Demo sandbox, isolation, and simulation behavior are deferred and are not open design requirements in this phase.

---

### Category B: Legacy Visual FoxPro 9 Database & Migration

- **Q-04: What is the physical and logical structure of the legacy Visual FoxPro 9 database?**
  - *Context*: The case establishes five legacy facts—date, incoming movement, outgoing movement, product, and internal document number—but does not disclose their physical representation. Schemas cannot be invented.
  - *Question*:
    - Is the legacy data stored in a Visual FoxPro Database Container (`.DBC`) or as free table files (`.DBF` / `.FPT` memo / `.CDX` index)?
    - What are the exact table names, column names, data types, primary/foreign keys, and character encodings (e.g., Windows-1252, CP850)?
    - Will an export file, a DDL schema dump, or sample anonymized `.DBF` files be provided for mapping analysis?
  - *Impact*: Blocks finalizing the physical source-to-target mapping in [specs/migration/mapping-and-reconciliation.md](../specs/migration/mapping-and-reconciliation.md); the five known conceptual mappings can be stated now.

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

- **Q-10: Are additional current SUNAT technical requirements applicable beyond the verified invoice baseline?**
  - *Context*: The specification uses UBL 2.1 for assessed invoices, with RS 097-2012/SUNAT, RS 117-2017/SUNAT, and RS 193-2020/SUNAT as relevant references. Catalog and format mappings are cited separately in the compliance matrix.
  - *Question*: Does the instructor or the currently applicable SUNAT technical profile require any additional amendment, annex version, or invoice-specific validation beyond the sources cited in the matrix?
  - *Impact*: Could alter the assessed invoice profile or validations; does not make the already-verified UBL 2.1 baseline unknown. GRE-specific rules remain deferred under Q-01.

- **Q-11: Which assessed products and effective tax schedules apply?**
  - *Context*: The applicable SUNAT Catalog 07 affectation values and the three SUNAT Catalog 08 ISC systems are documented. Catalog 08 identifies `01` Sistema al Valor, `02` Sistema Específico, and `03` Sistema al Precio de Venta al Público; it does not identify ABC Software Corp.'s product applicability or rate inputs.
  - *Question*:
    - Which assessed products use each applicable Catalog 07 affectation code or incur ISC?
    - For applicable ISC products, which effective official schedule, rate or specific amount, measurement unit, public-sale-price basis, and any `TierRange` apply?
    - Is ICBPER support required for the assessed retail operations?
  - *Impact*: Determines business-specific product configuration and representative tax cases; the system must not infer applicability or rates from product descriptions.

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

- **Q-14: What is the format and business meaning of legacy internal document numbers?**
  - *Context*: The case confirms internal document numbers exist but provides no format or numbering rules.
  - *Question*: What are the verified format, scope, and preservation rules for these internal numbers once the legacy schema and business logic are available?
  - *Impact*: Affects faithful migration and internal audit cross-referencing. These numbers are not assumed to be, or mapped to, SUNAT series or correlatives.

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

- **Q-19: Which payment policies and credit examples apply?**
  - *Context*: The invoice specification carries the payment condition and the applicable credit amount/installment details in UBL `cac:PaymentTerms` as required by RS 193-2020/SUNAT.
  - *Question*: Does the assessed business issue credit invoices, and what installment policy or representative credit cases should be specified?
  - *Impact*: Determines business defaults and validation/test cases; it does not leave the normative payment-term data contract unknown.

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

- **Q-22: Which Catalog 51 invoice operation type and profile scheme apply?**
  - *Context*: Catalog 51 is for type of operation (`tipOperacion`) and is distinct from Catalog 01 `InvoiceTypeCode`; the cited SUNAT guide/structure maps operation type to UBL `cbc:ProfileID`. The 2017 guide's scheme URI conflicts with its Catalog 51 label.
  - *Question*: Which Catalog 51 operation type applies to assessed transactions, and which current SUNAT profile scheme URI should be used? Do not infer either from the sales channel alone.
  - *Impact*: Determines the business-selected `cbc:ProfileID` content and scheme metadata; `InvoiceTypeCode` remains Catalog 01.

- **Q-23: Formats 12.1 and 14.1 — Resolved**
  - *Resolution*: SUNAT RS 234-2006/SUNAT, Article 13 and Annex 2, identifies Format 12.1 as the *Registro del Inventario Permanente en Unidades Físicas* and Format 14.1 as the *Registro de Ventas e Ingresos*. The minimum data fields supported by assessed inventory and sales processes are mapped in `specs/compliance/sunat-ubl-traceability.md`, Section 6.
  - *Scope*: These are tax-register formats, not invoice XML formats. Their mapping does not add GRE or transport operations.
  - *Remaining limitation*: The case still does not provide the legacy database schema, so physical source table/column mappings remain unknown.

- **Q-24: What are the baja eligibility and provider-response details?**
  - *Context*: Instructor grading feedback requires an application API to request baja for an identified electronic document. The application contract must not invent a SUNAT/provider URL, ticket format, or response lifecycle.
  - *Question*: Which document states are eligible; what pending, accepted, and rejected outcomes does the authorized provider return; and does the application need to expose a provider reference?
  - *Impact*: Refines validation and lifecycle details for `FR-022`/`UC-012`; the API currently accepts the request and identifies the existing document resource for status retrieval.

- **Q-25: Which SUNAT catalogs and catalog versions are queryable?**
  - *Context*: Instructor grading feedback requires a catalog-query operation. The minimum response exposes only catalog entry code and description.
  - *Question*: Which catalog numbers are supported, which official versions/effective dates apply, and are filters or historical versions required?
  - *Impact*: Refines the supported catalog set and query behavior for `FR-023`/`UC-013`; no catalog-specific payload metadata is assumed.

---

## 3. Summary of Blocking Items
Before initiating technical implementation or detailed code architecture, resolutions are strictly required for:
1. **Core Scope Boundaries**: Q-01 is resolved (GRE deferred); instructor feedback confirms credit/debit note support under Q-02, with note-specific rules remaining open.
2. **Legacy Inputs**: Provision of the VFP 9 schema (Q-04), legacy business rules (Q-05), soft-delete policy (Q-06, Q-16), and encoding (Q-17).
3. **Target Technology Stack**: Confirmation of the programming language, runtime, and RDBMS (Q-07, Q-08).
4. **Distribution Architecture**: Clarification of the MSI/APK architectural topology, mobile connectivity, and API authentication (Q-09, Q-15, Q-21).
5. **Evaluation Environment**: DEMO user profile details, digital certificates, and authorized integration test pathway (Q-03, Q-12).
6. **Regulatory Clarifications**: Product-specific ISC applicability and inputs (Q-11), payment policy (Q-19), ICBPER applicability (Q-20), Catalog 51 operation type/profile (Q-22), baja provider semantics (Q-24), and catalog coverage/versioning (Q-25). CDR/error categories are documented in REG-10; Formats 12.1/14.1 are identified and mapped under resolved Q-23/REG-11.
