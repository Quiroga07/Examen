# Regulatory Open Questions & Compliance Ambiguities (`specs/compliance/regulatory-open-questions.md`)

## 1. Document Overview
This document compiles all regulatory, tax compliance, and external integration ambiguities that must be formally clarified before software implementation begins. In accordance with the spec-first approach, **no regulatory assumptions or invented rules are permitted**.

Every item in this register identifies the ambiguous statutory requirement, the affected document type or process, the regulatory reference, the architectural impact, and the cross-reference to [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Regulatory Ambiguities Register

### Item REG-01: Scope Inclusion of Electronic Remission Guide (GRE)
- **Document Type Affected**: Guía de Remisión Electrónica (`09` Remitente / `31` Transportista).
- **Regulatory Reference**: Resolución de Superintendencia Nº 123-2022/SUNAT.
- **Ambiguity**:
  The core assessment focuses on wholesale/retail sales, warehouse ins/outs, product catalog, and internal tracking numbers. The delegate's supplementary narrative introduces merchandise transport and mandatory GRE issuance with UBL Dispatch Advice and XSD validation. It is not clear whether GRE is a required deliverable for the core evaluation or an illustrative supplementary case.
- **Architectural Impact**: Governs whether the `TransportModule`, UBL Despatch Advice XML generators, and XSD validation pipelines must be built as core components or optional extensions.
- **Cross-Reference**: [Q-01 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### Item REG-02: Mandatory Range of Electronic Payment Receipts (CPE)
- **Document Type Affected**: SUNAT Catálogo No. 01 (`01` Factura, `03` Boleta de Venta, `07` Nota de Crédito, `08` Nota de Débito).
- **Regulatory Reference**: Resolución de Superintendencia Nº 097-2012/SUNAT.
- **Ambiguity**:
  While wholesale (B2B) mandates *Facturas* and retail (B2C) mandates *Boletas de Venta*, the assessment does not explicitly declare whether corrective documents (*Notas de Crédito* and *Notas de Débito*) are part of the evaluated scope.
- **Architectural Impact**: Affects the document type enumeration in `ElectronicDocument` and the number of UBL 2.1 templates required.
- **Cross-Reference**: [Q-02 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-a-scope-and-functional-boundaries).

---

### Item REG-03: Specific Products Incurring Selective Consumption Tax (ISC)
- **Document Type Affected**: Commercial sales and billing documents.
- **Regulatory Reference**: TUO Ley del IGV e ISC, D.S. Nº 055-99-EF, Apéndices III y IV.
- **Ambiguity**:
  The assessment cites "errors calculating taxes such as IGV and ISC," but does not list which specific grocery or merchandise items handled by ABC Software Corp. are subject to ISC. Furthermore, Peruvian law provides three distinct calculation systems for ISC:
  1. *Sistema Al Valor* (percentage applied to the sales value).
  2. *Sistema Específico* (fixed monetary amount per physical volume/unit).
  3. *Sistema al Precio de Venta al Público* (percentage applied to suggested retail price).
  The assessment does not specify which ISC system applies to the company's product catalog.
- **Architectural Impact**: Blocks finalization of the mathematical algorithm in `TaxCalculationService` (`FR-008`).
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

### Item REG-08: Payment Terms & Net Amount Requirements (RS 193-2020)
- **Document Type Affected**: Facturas (`01`).
- **Regulatory Reference**: Resolución de Superintendencia Nº 193-2020/SUNAT.
- **Ambiguity**:
  RS 193-2020/SUNAT mandates that invoices state the payment condition (*Contado* or *Crédito*). For *Crédito*, invoices must declare the net pending amount, number of installments, due dates, and installment amounts. Does the assessment evaluation require modeling credit installment schedules, or is single-payment *Contado* sufficient?
- **Architectural Impact**: Affects whether `PaymentSchedule` entities and UBL `<cac:PaymentTerms>` nodes must be incorporated into the domain model.
- **Cross-Reference**: Newly recorded as [Q-19 in docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

## 3. Governance Summary
Until official clarifications are issued for items `REG-01` through `REG-08`:
1. The domain model and DTOs will support standard baseline tax calculations (IGV 18% Gravado and Exonerado) without hardcoding unverified ISC rates.
2. The GRE Remission Guide module will remain strictly **Conditional** and encapsulated in `specs/compliance/sunat-ubl-traceability.md`.
3. The system will prioritize local Modulo 11 RUC validation with readiness for external API pluggability.
