# Architecture Decision Records (`specs/architecture/architecture-decisions.md`)

## 1. Document Overview
This document records the fundamental Architectural Decision Records (ADRs) governing the enterprise software modernization of ABC Software Corp. Each record outlines the architectural context, decision drivers, chosen pattern, positive and negative consequences, requirement traceability (`FR-xxx`, `NFR-xxx`, `AC-xxx`), and links to unresolved questions in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. ADR Summary Index

| ADR ID | Decision Title | Status | Primary Driver |
|---|---|---|---|
| `ADR-001` | Modular Monolith using Model-View-Controller (MVC) Pattern | **Accepted** | `NFR-001`, Assessment Mandate |
| `ADR-002` | Domain Decoupling for Future Hexagonal / Clean Architecture Evolution | **Accepted** | `NFR-002`, `NFR-003`, Assessment Mandate |
| `ADR-003` | Dual Client Distribution via Windows MSI and Android APK | **Accepted** (Tech Pending) | `NFR-004`, `NFR-005`, [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) |
| `ADR-004` | Non-Destructive, Read-Only Legacy Extraction and Staging Pipeline | **Accepted** | `NFR-007`, `NFR-008`, `FR-015`, `AC-014` |
| `ADR-005` | DEMO Sandbox Isolation | **Deferred / Out of Scope** | Prior supplementary scope; no active behavior |
| `ADR-006` | GRE / Transport Module | **Deferred / Out of Scope** | `FR-018` - `FR-020` retained as deferred identifiers |
| `ADR-007` | UBL Invoice XML Generation Behind an Output Port | **Accepted for scoped unsigned XML generation** | `FR-009`, `AC-009`, `NFR-002`, `NFR-010` |
| `ADR-008` | PHP / Laravel and Docker for Partial Exam 2 | **Selected; Versions Unspecified** | `NFR-001`, `NFR-002` |

---

## 3. Architectural Decision Records

### `ADR-001`: Adopt a Modular Monolith with MVC Pattern for Initial Release
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-001`, `FR-001` through `FR-017`, `AC-016`
- **Context**:
  ABC Software Corp. is modernizing from a legacy Visual FoxPro 9 system. The immediate business necessity is tax compliance, reliable inventory tracking, and electronic document generation. The assessment explicitly requires an initial architecture based on a clean or modular monolith using the Model-View-Controller (MVC) pattern.
- **Decision**:
  The system will be architected as a single deployable **Modular Monolith** organized into cohesive assessed modules (`WarehouseModule`, `BillingModule`, `TaxComplianceModule`, and `MigrationModule`). The initial presentation tier will implement **Model-View-Controller (MVC)**. GRE, transport, and sandbox behavior are deferred and are not active modules. PHP with Laravel and Docker are the selected implementation stack for Partial Exam 2; exact versions are not specified.
- **Consequences**:
  - *Positive*: Minimal operational overhead; avoids distributed transaction complexities; supports clear module boundaries; enables straightforward local debugging and unified packaging.
  - *Negative*: Shared in-process memory requires disciplined module interface adherence to avoid tight coupling.
- **Related Open Questions**: Exact PHP/Laravel/Docker versions, client packaging technology, and deployment topology remain unspecified; see [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) and [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-002`: Decouple Domain Logic for Evolution toward Hexagonal / Clean Architecture
- **Status**: Accepted (Assessment Mandate)
- **Traces to**: `NFR-002`, `NFR-003`, `AC-016`
- **Context**:
  The assessment mandates that the initial modular monolith must be prepared to evolve toward Hexagonal Architecture (Ports and Adapters) or Clean Architecture and, in the future, support REST services and horizontal scaling without requiring a complete rewrite.
- **Decision**:
  All core domain models, aggregates, business invariants, and calculation algorithms will be implemented in a framework-independent domain layer. The initial MVC controllers delegate to application use cases/services. External interactions, including invoice XML generation, database access, SUNAT web services, and legacy file reading, are accessed through output-port interfaces. This creates a staged evolution path toward Hexagonal Architecture without replacing MVC as the initial architecture.
- **Consequences**:
  - *Positive*: Domain logic remains 100% testable in isolation; transitioning controllers to future REST APIs or transitioning data access from local repositories to remote adapters requires zero alterations to business rules.
  - *Negative*: Introduces interface abstraction layers and DTO translation overhead between presentation, application, and persistence boundaries.
- **Related Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-08](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-003`: Dual Client Distribution via Windows MSI and Android APK
- **Status**: Accepted (Packaging Targets Mandated; Client Technology Pending)
- **Traces to**: `NFR-004`, `NFR-005`, `AC-017`, `AC-018`, [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-15](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints)
- **Context**:
  The assessment specifies distribution targets including a Windows desktop environment distributed via an **MSI installer** and an Android mobile environment distributed via an **APK package**. The concrete client-server communication topology and front-end technologies are not stated.
- **Decision**:
  1. The system architecture will support dual distribution targets: a Windows desktop MSI package and an Android APK package.
  2. To avoid speculative implementation, the architecture defines contract-driven DTO boundaries (`specs/domain/dtos-and-schemas.md`) allowing the clients to communicate with the modular monolith via server-rendered views or future API endpoints.
  3. PHP/Laravel and Docker are the selected implementation stack for the Partial Exam 2 application; this does not select the desktop/mobile client technology or packaging mechanism. Those details and deployment topology remain open.
- **Consequences**:
  - *Positive*: Satisfies deployment requirements while insulating core domain specifications from client framework churn.
  - *Negative*: Requires designing mobile-responsive view models and contracts suitable for both desktop screen real estate and mobile handheld devices.
- **Related Open Questions**: [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-15](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### `ADR-004`: Non-Destructive, Read-Only Legacy Extraction and Staging Pipeline
- **Status**: Accepted
- **Traces to**: `FR-015`, `FR-016`, `NFR-007`, `NFR-008`, `AC-014`, `AC-015`
- **Context**:
  The assessment mandates that the existing Visual FoxPro 9 database must not be damaged, altered, or deleted under any circumstance. Historical data must be preserved with 100% mathematical reconciliation.
- **Decision**:
  The migration architecture will employ an isolated extraction worker operating strictly with read-only file streams. Legacy data is extracted into an intermediate staging schema (`LegacyRawRecordEnvelopeDto`) and validated before loading into modern domain entities. Cryptographic SHA-256 hashes of all source files will be checked before and after extraction to certify immutability.
- **Consequences**:
  - *Positive*: Eliminates risk of legacy file corruption; provides mathematical audit proof of data completeness; separates extraction from domain normalization.
  - *Negative*: Requires intermediate storage capacity for the raw staging envelopes.
- **Related Open Questions**: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration), [Q-16](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

### `ADR-005`: DEMO Sandbox Isolation — Deferred
- **Status**: Deferred / Out of Assessed Scope
- **Traces to**: Deferred identifiers only (`NFR-011`, `AC-013`); `FR-014` concerns the DEMO profile and does not establish sandbox behavior.
- **Decision**: No sandbox module, isolated data store, simulated CDR behavior, or live-emission interception is specified for the assessed solution.

---

### `ADR-006`: GRE / Transport Module — Deferred
- **Status**: Deferred / Out of Assessed Scope
- **Traces to**: `FR-018`, `FR-019`, `FR-020`, `UC-009`, `UC-010`, `AC-019` - `AC-021`, [Q-01](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries)
- **Context**:
  Prior supplementary material described merchandise transport dispatches, GRE, UBL Dispatch Advice, and XSD validation. Those features are not part of the assessed scope.
- **Decision**: No GRE, DispatchAdvice, transport, or transport-specific XSD components are included in the assessed architecture. Existing `FR-018` through `FR-020` references remain deferred only; no active transport module or API operation is specified.

---

### `ADR-007`: UBL Invoice XML Generation Behind an Output Port
- **Status**: Accepted for the scoped unsigned XML path; production data sources and SUNAT-profile conformance remain open
- **Traces to**: `FR-009`, `UC-005`, `AC-009`, `NFR-002`, `NFR-010`
- **Context**: UBL Invoice 2.1 XML must meet the assessed schema-conformance requirement, while application use cases must not depend on a specific XML library or generated class model.
- **Decision**: `GenerateInvoiceXmlUseCase` depends on `IUblGeneratorPort`; infrastructure implements it as `UblInvoiceXmlAdapter`. The adapter accepts the existing `IssueElectronicInvoiceRequestDto` plus explicit, resolved generation data where that DTO does not carry an XSD-required value. It returns **unsigned** UBL Invoice 2.1 XML only. Signing, transmission, API endpoints, and SUNAT-profile decisions are outside this adapter. The boundary and field contract are defined below and in [Q-26](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-26-what-remains-to-establish-the-ubl-invoice-21-xml-generator-input-contract-and-conformance-oracle).
- **Tool evaluation and isolated proof of concept**:
  - The [`goetas/xsd2php` README](https://github.com/goetas-webservices/xsd2php) documents conversion of XSD definitions into PHP classes and JMS Serializer metadata, a CLI that accepts XSD inputs, namespace/destination configuration, and serialization of generated instances through JMS Serializer.
  - The isolated project in `tools/ubl-xsd-poc/` uses `goetas-webservices/xsd2php` 0.4.14, `goetas-webservices/xsd2php-runtime` 0.2.18, and `jms/serializer` 3.32.9. It generated classes and metadata from the complete local official OASIS UBL 2.1 schema bundle, serialized a synthetic invoice, and validated it against the local Invoice XSD; its focused tests passed (4 tests, 22 assertions). The application reuses the generated model and metadata in place; only the two runtime packages are root dependencies, not the CLI.
  - A root-project Composer dry run and subsequent install for the two runtime packages at those exact versions, as normal dependencies, resolved with five installs and no upgrades or removals. The xsd2php CLI is not a root dependency.
  - The schema bundle retains the OASIS relative import hierarchy. Generation and tests use local schemas; they do not depend on network schema resolution. The app now integrates the tested serializer path; XSD validity does not establish SUNAT-profile conformance.
- **Generator input and result contract**:
  - The port accepts a typed request-data projection and the separate internal `UblInvoiceGenerationData` specified in [the DTO contract](../domain/dtos-and-schemas.md#421-internal-ublinvoicegenerationdata-approved-input-contract); this is not a change to the API DTO or OpenAPI contract. The input contract enumerates types, cardinalities, UBL paths, and whether each field is XSD-required, business-required, or required only by the input contract. It does not define production sources, tax policy, or profile rules.
  - The scoped implementation maps document type to `cbc:InvoiceTypeCode`, issue date to `cbc:IssueDate`, currency to `cbc:DocumentCurrencyCode`, buyer identity/legal name, issuer legal name and optional identifiers, line number, quantity/unit code, supplied line extension, description, product ID, unchanged unit price, supplied line/document tax totals, and supplied legal monetary totals. It does not calculate or default values. Optional operation type, payment terms, legend, ISC, and pricing-reference mappings are not included in this minimal path; integration for those fields remains open and must follow their documented presence rules.
  - **Approved internal project conventions:** map `productId` to `cac:Item/cac:SellersItemIdentification/cbc:ID` as an inference from “internal identifier,” not as a confirmed legacy/business fact or a SUNAT rule; map `unitPrice` unchanged to `cac:Price/cbc:PriceAmount` without specifying tax inclusion; omit Invoice `cac:TaxTotal` when `documentTaxTotals` is empty; and require at least one supplied subtotal with caller-provided `TaxCategory` data and explicit `TaxScheme/cbc:ID` per supplied total. These conventions do not alter XSD cardinalities. The XSD permits zero subtotals and makes `TaxScheme/cbc:ID` optional. Do not calculate, aggregate, or default tax data. Production sources, tax applicability/grouping, and profile emission rules remain open in Q-26.
  - Missing required input, invalid DTO data, or serialization failure must produce an explicit error; no fake production defaults or partially valid success result. Unit tests must fail if official-XSD validation rejects output. Runtime validation on every generated document is not required by this contract. The port returns serialized unsigned XML and does not sign it.
- **XSD validation contract**: Unit tests validate the serialized document locally against the official UBL 2.1 Invoice XSD and its complete local import/include closure. PHP's [`DOMDocument::schemaValidate`](https://www.php.net/manual/en/domdocument.schemavalidate.php) uses XML Schema 1.0 validation. Keep local schema resolution offline; an XSD pass establishes UBL 2.1 structural/type validity only, not SUNAT-profile or business-rule conformance. The schema bundle's source/version and integrity metadata must be recorded with the implementation.
- **Synthetic test fixture**: Use fixture-only values such as issuer/customer names `SYNTHETIC ... (NOT REAL)`, IDs `SYNTHETIC-ISSUER-001` and `SYNTHETIC-CUSTOMER-001`, buyer identity type `6` without RUC/check-digit validation, document type `01`, legal document ID `TEST-INV-0001`, date `2026-01-15`, currency `PEN`, and one line with product `TEST-PRODUCT-001`, unit `NIU`, quantity `2`, unit price `12.50`, and a description containing `&` and `< >`. Supply line extension `25.00`, an explicit fixture tax subtotal/base and amount (e.g. `25.00` / `4.50`), a fixture-only tax-scheme identifier such as `TEST-TAX-SCHEME`, and payable total `29.50` as inputs; these values only populate schema-shaped test data and assert no production tax rule, scheme, or product applicability. Any Catalog 07 value is likewise fixture-only. Do not transmit or checksum-validate the synthetic identities. Focused tests cover Invoice root/namespaces and mapped nodes, escaping/round-trip text, local official-XSD validity, missing/invalid required input, and detection of a deliberately schema-invalid XML document by the test validator.
- **Consequences**:
  - *Positive*: Isolates schema/tool-specific code in infrastructure and permits alternate generators or serializers.
  - *Negative*: The minimal adapter does not establish production data sources, optional profile mappings, or SUNAT-profile acceptance.
- **Implementation Boundary**: The MVC controller invokes the use case; the use case depends on `IUblGeneratorPort`; only the infrastructure adapter depends on generated classes and the selected tool.
- **Related Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-10](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [Q-11](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration), [Q-19](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-19-which-payment-policies-and-credit-examples-apply), [Q-22](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-22-which-catalog-51-invoice-operation-type-and-profile-scheme-apply), [Q-26](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#q-26-what-remains-to-establish-the-ubl-invoice-21-xml-generator-input-contract-and-conformance-oracle).

---

### `ADR-008`: PHP / Laravel and Docker for Partial Exam 2
- **Status**: Selected (Exact Versions Unspecified)
- **Traces to**: `NFR-001`, `NFR-002`
- **Decision**: Use PHP with Laravel and Docker as the implementation stack for Partial Exam 2. Retain the modular monolith and MVC as the initial architecture. Do not infer exact language, framework, or container versions.
- **Open Details**: Exact versions, verification of the `goetas/xsd2php` candidate against the selected Laravel dependency set and full UBL schema import graph, target RDBMS, and any desktop/mobile client technology or packaging topology remain unconfirmed. With no local PHP/Composer, use the official Laravel Sail Docker bootstrap from WSL2 after Docker Desktop is running. This selection does not imply Docker produces MSI or APK packages.
