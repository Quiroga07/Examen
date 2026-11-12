# SUNAT and UBL 2.1 Traceability Matrix (`specs/compliance/sunat-ubl-traceability.md`)

## 1. Document Overview
This document establishes the official regulatory compliance mapping between Peruvian tax regulations established by SUNAT (*Superintendencia Nacional de Aduanas y de Administración Tributaria*), the OASIS Universal Business Language (UBL 2.1) international standard, and the project requirements for ABC Software Corp.

In strict accordance with project governance:
- **No regulatory rules, tax codes, or endpoints are invented**. All references cite published SUNAT Resolutions (*Resoluciones de Superintendencia*), statutory catalogs, and OASIS UBL 2.1 schemas.
- **Active assessed scope**: electronic invoices and Boletas. GRE, DispatchAdvice, and transport are deferred and out of assessed scope; no requirements or operations for them are defined in this matrix.
- Every mapped item records its requirement ID, document type/process, official rule/data element, UBL XPath element, validation rule, source, and verification status.
- **Instructor-feedback note:** This update resolves formats 12.1 and 14.1 to the SUNAT inventory-in-units and sales-and-income registers, records their supported minimum data contracts, and distinguishes SUNAT/service exceptions, taxpayer format exceptions, CDR rejections, and observations.

---

## 2. Official Regulatory Standards & References Registry

| Reference Standard | Governing Body / Issuer | Official Designation / Document | Scope & Applicable Version | Verified Status |
|---|---|---|---|---|
| **UBL 2.1** | OASIS / ISO | ISO/IEC 19845:2015 (Universal Business Language v2.1) | Base XML syntax for Invoice, Credit Note, Debit Note, and Despatch Advice | Verified Official Standard |
| **SUNAT Estructuras.xlsx** | SUNAT | Anexo V, Anexo N.° 8: Catálogo de códigos and “Factura y boleta 2.1” sheet | SUNAT-hosted workbook under `2026-06`; no separate workbook version label found | Verified official source; retrieved structure identifies Catalogs 07/08/16/51/52 |
| **SUNAT validation workbook** | SUNAT | “Reglas de validación – actualizado al 26.08.2026.xlsx” | SUNAT validation rules updated 26 August 2026 | Verified official source for current paths/conditions cited below |
| **SUNAT UBL invoice guide** | SUNAT | Guía de elaboración de documentos electrónicos XML – UBL 2.1, Factura Electrónica, v1.0 | May 2017 | Verified official source; cited with noted discrepancy where current validation differs |
| **SUNAT Manual del Programador** | SUNAT | Manual del Programador | May 2021 | Verified official source for CDR `ResponseCode` semantics and SOAP/service errors |
| **RS 234-2006/SUNAT** | SUNAT | Resolución de Superintendencia Nº 234-2006/SUNAT, Article 13 and Annex 2 | Minimum information and layouts for tax books/registers, including Formats 12.1 and 14.1; as amended | Verified official source for register identity and minimum data fields |
| **RS 097-2012/SUNAT** | SUNAT | Resolución de Superintendencia Nº 097-2012/SUNAT (and amendments) | Creation of the Electronic Emission System (SEE - *Sistema de Emisión Electrónica*) | Verified Official Regulation |
| **RS 117-2017/SUNAT** | SUNAT | Resolución de Superintendencia Nº 117-2017/SUNAT | Adoption of UBL 2.1 as the mandatory XML structure for electronic payment receipts | Verified Official Regulation |
| **RS 193-2020/SUNAT** | SUNAT | Resolución de Superintendencia Nº 193-2020/SUNAT | Mandates payment condition (*Contado* / *Crédito*), installment due dates, and net amount | Verified Official Regulation |
| **RS 123-2022/SUNAT** | SUNAT | Resolución de Superintendencia Nº 123-2022/SUNAT | Regulatory framework for Electronic Remission Guides (GRE Remitente & GRE Transportista) | Verified Official Regulation |
| **TUO Ley del IGV e ISC** | MEF / SUNAT | D.S. Nº 055-99-EF (Texto Único Ordenado de la Ley del IGV e ISC) | Statutory rules for IGV (18%), exemptions (Apéndice I), and ISC tax bases | Verified Statutory Law |
| **XMLDSig** | W3C | XML-Signature Syntax and Processing (W3C Recommendation) | Enveloped digital signature standard for UBL XML payloads | Verified Official Standard |

Official source links used for the SUNAT catalog, invoice, and CDR mappings:
- [SUNAT Guías y Manuales](https://cpe.sunat.gob.pe/guias-y-manuales)
- [SUNAT Estructuras.xlsx (Anexo V, Anexo N.° 8; hosted under 2026-06)](https://cpe.sunat.gob.pe/sites/default/files/2026-06/Estructuras.xlsx)
- [SUNAT validation rules updated 26 August 2026](https://cpe.sunat.gob.pe/sites/default/files/2026-08/Reglas%20de%20validaci%C3%B3n%20-%20actualizado%20al%2026.08.2026.xlsx)
- [SUNAT UBL 2.1 Factura guide, v1.0, May 2017](https://cpe.sunat.gob.pe/sites/default/files/inline-files/guia%2Bxml%2Bfactura%2Bversion%202-1%2B1%2B0%20%282%29_0%20%282%29.pdf)
- [SUNAT Manual del Programador, May 2021](https://cpe.sunat.gob.pe/sites/default/files/inline-files/manual_programador%20%281%29.pdf)
- [SUNAT RS 234-2006/SUNAT, Article 13 and Annex 2](https://www.sunat.gob.pe/legislacion/superin/2006/234.htm)
- [SUNAT RS 193-2020/SUNAT (5 November 2020)](https://www.sunat.gob.pe/legislacion/superin/2020/193-2020.pdf)
- [OASIS UBL 2.1 Standard, 4 November 2013](https://docs.oasis-open.org/ubl/os-UBL-2.1/UBL-2.1.html)
- [OASIS UBL 2.1 Common Aggregate Components schema](https://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/common/UBL-CommonAggregateComponents-2.1.xsd)

---

## 3. Official SUNAT Catalogs Referenced

The following standard SUNAT catalogs are officially incorporated into the system specifications:
- **Catálogo No. 01**: Código de Tipo de Documento (`01` Factura, `03` Boleta de Venta, `07` Nota de Crédito, `08` Nota de Débito, `09` Guía de Remisión Remitente, `31` Guía de Remisión Transportista).
- **Catálogo No. 02**: Código de Tipo de Moneda (ISO 4217: `PEN` Soles, `USD` Dólares Americanos).
- **Catálogo No. 03**: Código de Tipo de Unidad de Medida Comercial (UN/ECE rec 20: `NIU` Unidades, `KGM` Kilogramos).
- **Catálogo No. 05**: Código de Tipos de Tributos (`1000` IGV - Impuesto General a las Ventas, `2000` ISC - Impuesto Selectivo al Consumo, `9999` Otros Tributos).
- **Catálogo No. 06**: Código de Tipo de Documento de Identidad (`1` DNI, `4` Carnet de Extranjería, `6` RUC, `7` Pasaporte).
- **Catálogo No. 07**: Código de Tipo de Afectación al IGV (`10`–`17` gravado, `20`–`21` exonerado, `30`–`37` inafecto, `40` exportación); the exact selected code is transaction/profile-specific.
- **Catálogo No. 08**: Sistema de cálculo del ISC (`01` Sistema al valor, `02` Aplicación del monto fijo / sistema específico, `03` Sistema de precios de venta al público).
- **Catálogo No. 16**: Tipo de precio (`01` unit price including IGV, `02` referential unit value for non-onerous/free operations, `03` regulated tariffs).
- **Catálogo No. 51**: Tipo de operación (`tipOperacion` / UBL `cbc:ProfileID` where the applicable profile requires it); not an `InvoiceTypeCode` `listID`.
- **Catálogo No. 52**: Tipo de leyenda; code `1000` is “Monto en Letras.”
- **Catálogo No. 18**: Código de Modalidad de Traslado (`01` Transporte Público, `02` Transporte Privado) — *Applicable exclusively to GRE*.
- **Catálogo No. 20**: Código de Motivo de Traslado (`01` Venta, `02` Compra, `04` Traslado entre establecimientos) — *Applicable exclusively to GRE*.

---

## 4. Traceability Matrix: Electronic Invoices (CPE - Facturas & Boletas)

> **Generator-input cross-reference (not a SUNAT rule)**: The internal `UblInvoiceGenerationData` contract in [the DTO specification, section 4.2.1](../domain/dtos-and-schemas.md#421-internal-ublinvoicegenerationdata-approved-input-contract) supplies issuer party data, per-line and document tax totals, and legal monetary totals to the serializer. The approved internal mapping conventions are project decisions only; the contract distinguishes UBL XSD cardinality from business requirements and does not define taxpayer data sources, tax policy, or profile compliance. See [Q-26](../../docs/01-open-questions.md#q-26-what-remains-to-establish-the-ubl-invoice-21-xml-generator-input-contract-and-conformance-oracle) for unresolved choices.

> **Scope Note**: This section covers standard Electronic Payment Receipts issued for wholesale and retail operations pursuant to the **Teacher Assessment**.

| Req ID | Document / Process | SUNAT Rule / Field Definition | UBL 2.1 XML Element Path (XPath) | Validation & Compliance Rule | API Operation (Contract) | Source Origin | Verification Status |
|---|---|---|---|---|---|---|---|
| `FR-007` | RUC Validation | Taxpayer legal identifier verification (Cat. 06 Code 6) | `/Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID` | Must be an 11-digit numeric string with valid legal prefix (10, 15, 17, 20). Exact verification mechanism (offline Modulo 11 vs. online consultation) is subject to Q-13 without assuming unverified external endpoints. | [`POST /api/v1/tax/ruc/validate`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 097-2012) |
| `FR-008` | Tax Math (IGV) | 18% IGV calculation on taxable base (Cat. 05 Code 1000, Cat. 07 Code 10) | `/Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount` | $\text{TaxAmount} = \text{TaxableAmount} \times 0.18$. Arbitrary-precision math with half-up rounding to 2 decimals. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Ley IGV, Art. 17) |
| `FR-008` | Tax Math (ISC) | Selective Consumption Tax (Cat. 05 Code 2000), using one applicable Catalog 08 system: `01` al valor, `02` específico, or `03` al precio de venta al público | `/Invoice/cac:TaxTotal/cac:TaxSubtotal[cac:TaxCategory/cac:TaxScheme/cbc:ID='2000']/cbc:TaxAmount` | Use the official schedule and system-specific inputs applicable to the product. Product applicability, effective rates/amounts, units, and public-sale-price basis remain open; no formula or rate is inferred from Catalog 08 alone. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Systems confirmed; business-specific inputs open** (Catalog 08, SUNAT Estructuras.xlsx, 2026-06; TUO Ley del IGV e ISC) |
| `FR-008` | ISC system and line inputs | Cat. 08 codes `01`/`02`/`03`; ISC tax amount, base, scheme, and percentage are grouped as mandatory when applicable (SUNAT workbook) | `/Invoice/cac:InvoiceLine/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount`<br>`/cac:TaxAmount`<br>`/cac:TaxCategory/cbc:TierRange`<br>`/cac:TaxCategory/cac:TaxScheme/cbc:ID`<br>`/cac:TaxCategory/cbc:Percent` | Catalog 08 identifies the system; selected ISC lines use their applicable inputs. Current SUNAT validation requires `cbc:TierRange` when ISC scheme `2000` has a positive base, and disallows it for non-ISC lines. No per-system base formula/rate is inferred from the Catalog 08 `Tasa` column. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified structure; business-specific product and rate inputs open** (SUNAT Estructuras.xlsx, 2026-06; validation workbook 2026-08-26; UBL 2.1) |
| `FR-008` | IGV affectation | Catalog 07 `tipAfeIGV`; taxable, exempt, unaffected, and export groupings | `/Invoice/cac:InvoiceLine/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:TaxExemptionReasonCode` | Catalog 07 identifies IGV affectation, not merely exempt status; select a value consistent with the line's affectation. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified** (SUNAT Estructuras.xlsx, 2026-06; SUNAT UBL 2.1 invoice guide, v1.0, May 2017) |
| `FR-009` | UBL Standard Header | Official document type and numbering series | `/Invoice/cbc:UBLVersionID`<br>`/Invoice/cbc:CustomizationID`<br>`/Invoice/cbc:ID`<br>`/Invoice/cbc:InvoiceTypeCode` | UBLVersionID = `2.1`; CustomizationID = `2.0`; InvoiceTypeCode from Cat. 01 (`01` or `03`). ID format: `[F|B]###-########`. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`GET /api/v1/invoices/{id}/xml`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 117-2017) |
| `FR-009` | Invoice type and operation type | `InvoiceTypeCode` is document type, Catalog 01; Catalog 51 denotes operation type, represented by UBL `ProfileID` in the SUNAT invoice guide/current structure | `/Invoice/cbc:InvoiceTypeCode`<br>`/Invoice/cbc:ProfileID` | Do not put Catalog 51 into `InvoiceTypeCode/@listID`. The current SUNAT workbook identifies Catalog 01 for InvoiceTypeCode; Catalog 51 is `tipOperacion`. Applicable Catalog 51 value remains a business/profile choice (Q-22). | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified mapping; code selection open** (SUNAT UBL invoice guide, v1.0, May 2017; Estructuras.xlsx, 2026-06; validation workbook 2026-08-26) |
| `FR-009` | Alternative price reference | Catalog 16 price type code and alternative-condition price | `/Invoice/cac:InvoiceLine/cac:PricingReference/cac:AlternativeConditionPrice/cbc:PriceAmount`<br>`.../cbc:PriceTypeCode` | Catalog 16 code belongs to `AlternativeConditionPrice`; it is not the actual unit price. Codes: `01` unit price including IGV, `02` referential unit value for free/non-onerous operation, `03` regulated tariff. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified** (SUNAT UBL invoice guide, v1.0, May 2017; Estructuras.xlsx, 2026-06; OASIS UBL 2.1) |
| `FR-009` | Payment condition and installments | RS 193-2020/SUNAT, Article 2.1 | `/Invoice/cac:PaymentTerms/cbc:ID`<br>`/cac:PaymentTerms/cbc:Amount`<br>`/cac:PaymentTerms/cbc:PaymentDueDate` | State Contado or Crédito as applicable. Credit requires net pending amount and due date(s)/amount(s) for one payment or installments; Q-19 asks which business policy/examples apply. Effective 1 April 2021. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Normative fields verified; business policy open** (RS 193-2020/SUNAT, dated 5 Nov 2020, Art. 2.1) |
| `FR-009` | Legend “Monto en Letras” | Catalog 52 code `1000` | `/Invoice/cbc:Note[@languageLocaleID='1000']` | Amount in words; this Catalog 52 legend code is distinct from tax-scheme code `1000` for IGV. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified** (SUNAT Estructuras.xlsx, 2026-06; SUNAT UBL invoice guide, v1.0, May 2017) |
| `FR-007` | Buyer legal entity name | Buyer legal registered name | `/Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName` | Current SUNAT validation workbook requires buyer RegistrationName here. Buyer identity remains under `PartyIdentification`; do not move it to CompanyID based on the older guide. | [`POST /api/v1/invoices`](../api/openapi.yaml) | Assessment | **Verified current mapping** (SUNAT validation workbook, updated 26 Aug 2026; OASIS UBL 2.1) |
| `FR-009` | Digital Signature | Enveloped digital signature using authorized X.509 certificate | `/Invoice/cac:Signature`<br>`/Invoice/ext:UBLExtensions/.../ds:Signature` | Signature generation and validation are separate from the unsigned XML-generation port; certificate/profile specifics remain subject to the authorized test pathway. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Requirement confirmed; implementation details pending** (RS 097-2012; XMLDSig) |
| `FR-010` | SUNAT Delivery | Transmission of compressed XML payload to SUNAT / PSE endpoint | SOAP / REST Service Request (`sendBill` / API SEE) | Payload compressed as ZIP (`[RUC]-[TIPO]-[SERIE]-[CORRELATIVO].zip`). Receives and parses CDR response. | [`POST /api/v1/invoices/{id}/transmit`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Manual SEE SUNAT) |
| `FR-011` | Currency Code | Mandatory transaction currency declaration (Cat. 02) | `/Invoice/cbc:DocumentCurrencyCode` | Must match ISO 4217 currency (`PEN` or `USD`). All line items and totals must share identical currency. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Catálogo No. 02) |
| `FR-011` | Unit of Measure | Standard commercial unit classification (Cat. 03) | `/Invoice/cac:InvoiceLine/cbc:InvoicedQuantity/@unitCode` | Must match valid UN/ECE Rec 20 code (e.g., `NIU` for unit packages, `KGM` for bulk groceries). | [`POST /api/v1/products`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Catálogo No. 03) |
| `FR-012` | CDR status and error interpretation | SUNAT CDR `cbc:ResponseCode`, observation codes, and service/format exceptions | `/ApplicationResponse/cac:DocumentResponse/cac:Response/cbc:ResponseCode`<br>`.../cac:Status/cbc:StatusReasonCode` | `ResponseCode` `0` means accepted; `2000–3999` means rejected. `4000+` codes identify observations, which do not by themselves mean rejection; use the CDR acceptance result and retain observation details. `0100–0999` are SUNAT exceptions and `1000–1999` are taxpayer format/structure exceptions: these are service/submission exceptions, not evidence that a CDR accepted or rejected the document. Distinguish such exception responses (including SOAP faults) from a CDR, preserve the raw code/message, and do not confuse service `StatusResponse` values `0`, `98`, `99` with CDR outcome codes. | [`GET /api/v1/invoices/{documentId}`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`POST /api/v1/invoices/{documentId}/transmit`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`GET /api/v1/invoices/{documentId}/cdr`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Verified** (SUNAT Manual del Programador, May 2021, Annex 1 pp. 20–22, 44, 47, 49, 51) |
| `FR-014` | DEMO User Profile | The assessment mentions a DEMO profile; no sandbox behavior is implied | User/profile concept only; no SUNAT UBL element | Credentials and access rights remain open under Q-03. Sandbox isolation, simulated XML/CDR, and live-emission blocking are deferred. | No active sandbox operation specified here | Assessment | **Profile in scope; sandbox behavior deferred** |
| `NFR-009` | Monetary Totals | Document payable total reconciliation | `/Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount` | $\text{PayableAmount} = \text{LineExtensionAmount} + \sum \text{Taxes} - \text{Discounts}$. 0.00 discrepancy allowed. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 117-2017) |

---

## 5. Deferred Supplementary Scope

GRE, DispatchAdvice, and transport are out of the assessed scope. Legacy requirement identifiers remain deferred only; no compliance requirements or API operations for them are defined here.

---

## 6. SUNAT Electronic Book Formats 12.1 and 14.1

SUNAT RS 234-2006/SUNAT, Article 13 and Annex 2, identifies Format 12.1 as **Registro del Inventario Permanente en Unidades Físicas — Detalle del Inventario Permanente en Unidades Físicas** and Format 14.1 as **Registro de Ventas e Ingresos**. The resolution's minimum information is mapped below only to the assessed warehouse and sales/invoicing processes. These are tax-register contracts, not invoice XML formats or new API operations.

| Format | Assessed process | Supported minimum data contract from RS 234-2006/SUNAT, Annex 2 | Traceability |
|---|---|---|---|
| 12.1 | Physical inventory movements by establishment and item | Header: establishment, stock/item code and type, description, and unit of measure. Movement detail: document date, document type, series and number, operation type, incoming quantity (including opening balance), outgoing quantity, ending balance, and totals. This is a units-based register, not the valued-inventory register. | `FR-001`, `FR-003`, `FR-004`; formats the movements already represented by `UC-001`/`UC-002`. |
| 14.1 | Sales and income records for assessed CPE | Correlative record/unique operation code, issue date, document type, series and number, buyer identity type/number/name, export value where applicable, taxable base (excluding ISC), exempt/unaffected amount, ISC where applicable, IGV/IPM where applicable, other taxes/charges, total, exchange rate, and the original document reference fields when recording a credit/debit note. Credit/debit-note fields do not add those document types to assessed scope. | `FR-006`, `FR-009`; records sales already represented by `UC-002`/`UC-005`. |

This mapping specifies the register fields and meaning; it does not assert that every conditional field applies to every transaction or that the case requires additional CPE types. Product-specific ISC applicability, rates, units, and calculation inputs remain open under Q-11/REG-03. Q-23 is resolved in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration).

---

## 7. Mathematical & Algorithm Validation Specifications

### 7.1 Taxpayer RUC Checksum Algorithm (Modulo 11 - Subject to Verification)
> **Regulatory Notice on RUC Verification**:
> The mathematical Modulo 11 check digit algorithm detailed below represents the established Peruvian statutory verification algorithm for RUC numbers. However, in accordance with assessment rules, the system does not invent whether this offline algorithm or an online SUNAT padrón consultation service is required; this is formally recorded as an Open Question ([Q-13](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-d-peruvian-tax-compliance--sunat-integration)). No external SUNAT endpoints or unverified integration methods are assumed.

- **Input**: 11-digit string $d_1 d_2 d_3 d_4 d_5 d_6 d_7 d_8 d_9 d_{10} d_{11}$.
- **Weights Vector**: $W = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2]$.
- **Formula**:
  $$\text{Sum} = \sum_{i=1}^{10} d_i \times W_i$$
  $$\text{Remainder} = \text{Sum} \pmod{11}$$
  $$\text{CalculatedCheckDigit} = 11 - \text{Remainder}$$
  - If $\text{CalculatedCheckDigit} == 10$, then $\text{CheckDigit} = 0$.
  - If $\text{CalculatedCheckDigit} == 11$, then $\text{CheckDigit} = 1$.
  - Else $\text{CheckDigit} = \text{CalculatedCheckDigit}$.
- **Validation**: $d_{11} == \text{CheckDigit}$.

### 7.2 Invoice Tax Calculation & Rounding Rule
- All currency arithmetic uses arbitrary-precision decimals (`scale = 2`).
- **Rounding Mode**: `ROUND_HALF_UP` (standard financial rounding: $\ge 0.005$ rounds up, $< 0.005$ rounds down).
- **Line Subtotal**: $\text{LineBase} = \text{Quantity} \times \text{UnitPrice}$ (excluding tax).
- **Line IGV**: $\text{LineIgv} = \text{RoundHalfUp}(\text{LineBase} \times 0.18)$.
- **Document Total Verification Invariant**:
  $$\text{PayableAmount} = \sum \text{LineBase} + \sum \text{LineIgv} + \sum \text{LineIsc} - \text{TotalDiscounts}$$
  Discrepancy must be exactly `0.00`.
