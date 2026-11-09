# Regulatory Open Questions & Compliance Ambiguities (`specs/compliance/regulatory-open-questions.md`)

## 1. Document Overview
This document compiles all regulatory, tax compliance, and external integration ambiguities that must be formally clarified before software implementation begins. In accordance with the spec-first approach, **no regulatory assumptions or invented rules are permitted**.

Every item in this register identifies the ambiguous statutory requirement, the affected document type or process, the regulatory reference, the architectural impact, and the cross-reference to [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Regulatory Ambiguities Register

### Item REG-01: GRE / DispatchAdvice Scope — Resolved for This Phase
- **Document Type Affected**: Guía de Remisión Electrónica (`09` Remitente / `31` Transportista); deferred.
- **Regulatory Reference**: Resolución de Superintendencia Nº 123-2022/SUNAT; not applied to the active assessed deliverables in this phase.
- **Resolution**: GRE, DispatchAdvice, and transport are out of the assessed scope. No active requirement, API operation, or compliance mapping is defined for them; retained identifiers are deferred only.
- **Cross-Reference**: [Q-01 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### Item REG-02: Mandatory Range of Electronic Payment Receipts (CPE)
- **Document Type Affected**: SUNAT Catálogo No. 01 (`01` Factura, `03` Boleta de Venta, `07` Nota de Crédito, `08` Nota de Débito).
- **Regulatory Reference**: Resolución de Superintendencia Nº 097-2012/SUNAT.
- **Resolution from Instructor Grading Feedback**: Credit-note and debit-note issuance are in the assessed scope. Requirements `FR-021`/`UC-011`, DTOs, and an application API operation are defined. This does not add GRE or transport.
- **Remaining business details**: Applicable reason codes, mandatory note-specific data, eligibility, and adjustment semantics remain open under `Q-02`; no values or rules are inferred.
- **Cross-Reference**: [Q-02 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### Item REG-03: Product-Specific ISC Applicability and Inputs
- **Document Type Affected**: Commercial sales and billing documents.
- **Regulatory Reference**: TUO Ley del IGV e ISC, D.S. Nº 055-99-EF, Apéndices III y IV.
- **Confirmed from SUNAT Catalog 08**:
  The ISC systems are `01` *Sistema al Valor*, `02` *Sistema Específico*, and `03` *Sistema al Precio de Venta al Público*. Their existence is no longer an open question.
- **Unresolved business-specific facts**:
  The assessment does not identify which products incur ISC, which applicable effective schedule/rate or specific unit amount applies, or the product-specific inputs and `TierRange` needed by a selected schedule. No product applicability or rate is inferred.
- **Specification Impact**: Requires product- and line-level data contracts for the selected Catalog 08 system and its applicable inputs. A complete algorithm cannot be instantiated without the unresolved business-specific data.
- **Cross-Reference**: [Q-11 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-04: Scope of Tax Exemption Regimes (Exonerado vs. Inafecto)
- **Document Type Affected**: Product catalog and line-item tax affectation (`Catálogo No. 07`).
- **Regulatory Reference**: TUO Ley del IGV, Apéndice I (*Bienes Exonerados del IGV*).
- **Ambiguity**:
  As a grocery distributor, ABC Software Corp. likely handles basic agricultural products (fruits, vegetables, unprocessed grains) that are legally exempt (*Exonerados*) under Apéndice I of the Ley del IGV. The assessment mentions an 18% IGV rate but notes that tax rules must be verified. We need official confirmation on whether multi-tax invoices (containing both 18% Gravado and 0% Exonerado lines) must be supported.
- **Architectural Impact**: Shapes the multi-line tax aggregation logic in `TaxBreakdown` value objects.
- **Cross-Reference**: [Q-11 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-05: Plastic Bag Tax Applicability (ICBPER)
- **Document Type Affected**: Retail sales checkout (`03` Boleta de Venta).
- **Regulatory Reference**: Ley Nº 30884 and SUNAT Catálogo No. 05 Código `7152`.
- **Ambiguity**:
  Peruvian retail grocery operations are legally subject to the Single-Use Plastic Bag Consumption Tax (*ICBPER*). The assessment does not state whether ABC Software Corp.'s retail operations require ICBPER computation.
- **Architectural Impact**: Determines whether an additional tax scheme subtotal must be maintained in the `TaxBreakdown` DTO.
- **Cross-Reference**: [Q-11 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-06: Authorized Testing Environment and Credentials
- **Document Type Affected**: Document transmission interface (`FR-010`, `UC-006`).
- **Regulatory Reference**: SUNAT Electronic Invoicing Web Service Standards.
- **Ambiguity**:
  How will the electronic transmission interface be evaluated?
  1. Direct connection to SUNAT Beta web services (requires test RUC, secondary SOL user, and test certificate).
  2. Integration via an authorized OSE (*Operador de Servicios Electrónicos*).
  3. A completely offline local stub/simulator returning mock CDR payloads.
- **Architectural Impact**: Dictates whether external SOAP/REST network clients and PKI keystores must be implemented or if a mock simulator suffices.
- **Cross-Reference**: [Q-12 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-07: RUC Validation Scope (Offline vs. Online Padrón)
- **Document Type Affected**: Customer tax identity verification (`FR-007`, `UC-003`).
- **Regulatory Reference**: SUNAT RUC Verification Guidelines.
- **Ambiguity**:
  The assessment notes "difficulty validating RUC numbers". In accordance with project directives, no external SUNAT endpoints, web-scraping routines, or integration methods are invented. It must be clarified whether:
  - An offline statutory Modulo 11 check digit validator is sufficient, or
  - An online API consultation against SUNAT's taxpayer registry (*Padrón Reducido RUC*) to verify *Estado del Contribuyente* (Activo) and *Condición de Domicilio* (Habido) is required, along with the authorized endpoint and credentials.
- **Architectural Impact**: Offline validation is an internal domain value object calculation; online validation requires an external network adapter and authentication credentials.
- **Cross-Reference**: [Q-13 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-08: Payment Policy and Credit Installment Use
- **Document Type Affected**: Facturas (`01`).
- **Regulatory Reference**: Resolución de Superintendencia Nº 193-2020/SUNAT.
- **Confirmed normative contract**:
  The invoice model includes the applicable payment condition in UBL `cac:PaymentTerms`; credit terms carry the net pending amount and installment details required by the applicable profile.
- **Unresolved business-specific policy**:
  The assessment does not state whether credit sales occur, which installment policies apply, or whether evaluation examples should exercise credit schedules.
- **Specification Impact**: The conditional payment-term data contract is defined; the business policy and test cases remain open.
- **Cross-Reference**: Newly recorded as [Q-19 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-09: Invoice Operation Type Selection (Catalog 51)
- **Document Type Affected**: Electronic invoices (`01` and `03`) where the applicable profile uses Catalog 51.
- **Regulatory Reference**: SUNAT Catalog 51 and UBL 2.1 `cbc:ProfileID`.
- **Ambiguity**:
  The operation type is distinct from document type: SUNAT identifies `InvoiceTypeCode` as Catalog 01, while Catalog 51 identifies `tipOperacion` and is represented in the invoice profile (`cbc:ProfileID`) by the cited SUNAT guide/structure. Wholesale/retail labels alone do not identify the applicable value. The older guide's ProfileID scheme URI is inconsistent with its Catalog 51 label; follow the current profile requirements when identified.
- **Specification Impact**: The Catalog 51 field and UBL path are documented; the applicable code selection and profile scheme URI remain to be confirmed.
- **Cross-Reference**: [Q-22 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

### Item REG-10: CDR and SUNAT Error-Code Categories — Resolved for This Specification
- **Document Type Affected**: Electronic invoice submission and CDR processing (`FR-010`, `FR-012`).
- **Regulatory Reference**: SUNAT *Manual del Programador*, May 2021, Annex 1.
- **Resolution**:
  - `0100–0999`: SUNAT exceptions.
  - `1000–1999`: taxpayer format/structure exceptions.
  - `2000–3999`: document rejection errors.
  - `4000+`: observations.
  - A CDR `ResponseCode` of `0` means accepted; a CDR rejection code means rejected. Observation codes do not, on their own, change an accepted result into a rejection. SUNAT and taxpayer format/structure exceptions are service/submission exceptions, not evidence of an accepted or rejected CDR; interpret the actual service response separately from any CDR. Service `StatusResponse` values are distinct from CDR outcome codes.
- **Specification Impact**: Preserve the raw response code/message and distinguish a service exception from a received CDR. The API contract is unchanged in this phase.
- **Cross-Reference**: [FR-012 in the compliance matrix](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/compliance/sunat-ubl-traceability.md#4-traceability-matrix-electronic-invoices-cpe---facturas--boletas).

### Item REG-11: SUNAT Register Formats 12.1 and 14.1 — Resolved for This Specification
- **Document Type Affected**: Physical warehouse inventory movements and sales/income records.
- **Regulatory Reference**: RS 234-2006/SUNAT, Article 13 and Annex 2, Formats 12.1 and 14.1.
- **Resolution**: Format 12.1 is the *Registro del Inventario Permanente en Unidades Físicas*; Format 14.1 is the *Registro de Ventas e Ingresos*. The minimum fields supported by the assessed processes are mapped in Section 6 of the compliance matrix. These register formats do not define invoice XML formats or add GRE/transport operations.
- **Specification Impact**: Map inventory movement and sales data to the official register fields without inventing legacy table/column names. Conditional fields, including ISC and credit/debit-note references, apply only where relevant; product-specific ISC inputs remain open under REG-03.
- **Cross-Reference**: [Resolved Q-23 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

## 3. Governance Summary
Until official clarification is issued for the remaining business-specific items:
1. The domain model and DTOs represent the Catalog 08 ISC systems without hardcoding product applicability, rates, units, or `TierRange` values.
2. GRE, DispatchAdvice, and transport remain deferred and outside the assessed scope.
3. RUC-validation and payment-policy questions remain tracked separately; no external endpoint or payment practice is assumed.
