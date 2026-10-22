# SUNAT and UBL 2.1 Traceability Matrix (`specs/compliance/sunat-ubl-traceability.md`)

## 1. Document Overview
This document establishes the official regulatory compliance mapping between Peruvian tax regulations established by SUNAT (*Superintendencia Nacional de Aduanas y de Administración Tributaria*), the OASIS Universal Business Language (UBL 2.1) international standard, and the project requirements for ABC Software Corp.

In strict accordance with project governance:
- **No regulatory rules, tax codes, or endpoints are invented**. All references cite published SUNAT Resolutions (*Resoluciones de Superintendencia*), statutory catalogs, and OASIS UBL 2.1 schemas.
- **Electronic Invoices (CPE) and Electronic Remission Guides (GRE) are kept strictly distinct**. Requirements for invoices do not automatically apply to remission guides.
- **The Electronic Remission Guide (GRE / UBL Dispatch Advice) remains Conditional**, originating exclusively from the Delegate's Supplementary Case.
- Every mapped item records its requirement ID, document type/process, official rule/data element, UBL XPath element, validation rule, source, and verification status.

---

## 2. Official Regulatory Standards & References Registry

| Reference Standard | Governing Body / Issuer | Official Designation / Document | Scope & Applicable Version | Verified Status |
|---|---|---|---|---|
| **UBL 2.1** | OASIS / ISO | ISO/IEC 19845:2015 (Universal Business Language v2.1) | Base XML syntax for Invoice, Credit Note, Debit Note, and Despatch Advice | Verified Official Standard |
| **RS 097-2012/SUNAT** | SUNAT | Resolución de Superintendencia Nº 097-2012/SUNAT (and amendments) | Creation of the Electronic Emission System (SEE - *Sistema de Emisión Electrónica*) | Verified Official Regulation |
| **RS 117-2017/SUNAT** | SUNAT | Resolución de Superintendencia Nº 117-2017/SUNAT | Adoption of UBL 2.1 as the mandatory XML structure for electronic payment receipts | Verified Official Regulation |
| **RS 193-2020/SUNAT** | SUNAT | Resolución de Superintendencia Nº 193-2020/SUNAT | Mandates payment condition (*Contado* / *Crédito*), installment due dates, and net amount | Verified Official Regulation |
| **RS 123-2022/SUNAT** | SUNAT | Resolución de Superintendencia Nº 123-2022/SUNAT | Regulatory framework for Electronic Remission Guides (GRE Remitente & GRE Transportista) | Verified Official Regulation |
| **TUO Ley del IGV e ISC** | MEF / SUNAT | D.S. Nº 055-99-EF (Texto Único Ordenado de la Ley del IGV e ISC) | Statutory rules for IGV (18%), exemptions (Apéndice I), and ISC tax bases | Verified Statutory Law |
| **XMLDSig** | W3C | XML-Signature Syntax and Processing (W3C Recommendation) | Enveloped digital signature standard for UBL XML payloads | Verified Official Standard |

---

## 3. Official SUNAT Catalogs Referenced

The following standard SUNAT catalogs are officially incorporated into the system specifications:
- **Catálogo No. 01**: Código de Tipo de Documento (`01` Factura, `03` Boleta de Venta, `07` Nota de Crédito, `08` Nota de Débito, `09` Guía de Remisión Remitente, `31` Guía de Remisión Transportista).
- **Catálogo No. 02**: Código de Tipo de Moneda (ISO 4217: `PEN` Soles, `USD` Dólares Americanos).
- **Catálogo No. 03**: Código de Tipo de Unidad de Medida Comercial (UN/ECE rec 20: `NIU` Unidades, `KGM` Kilogramos).
- **Catálogo No. 05**: Código de Tipos de Tributos (`1000` IGV - Impuesto General a las Ventas, `2000` ISC - Impuesto Selectivo al Consumo, `9999` Otros Tributos).
- **Catálogo No. 06**: Código de Tipo de Documento de Identidad (`1` DNI, `4` Carnet de Extranjería, `6` RUC, `7` Pasaporte).
- **Catálogo No. 07**: Código de Tipo de Afectación al IGV (`10` Gravado - Operación Onerosa, `20` Exonerado - Operación Onerosa, `30` Inafecto - Operación Onerosa).
- **Catálogo No. 18**: Código de Modalidad de Traslado (`01` Transporte Público, `02` Transporte Privado) — *Applicable exclusively to GRE*.
- **Catálogo No. 20**: Código de Motivo de Traslado (`01` Venta, `02` Compra, `04` Traslado entre establecimientos) — *Applicable exclusively to GRE*.

---

## 4. Traceability Matrix: Electronic Invoices (CPE - Facturas & Boletas)

> **Scope Note**: This section covers standard Electronic Payment Receipts issued for wholesale and retail operations pursuant to the **Teacher Assessment**.

| Req ID | Document / Process | SUNAT Rule / Field Definition | UBL 2.1 XML Element Path (XPath) | Validation & Compliance Rule | API Operation (Contract) | Source Origin | Verification Status |
|---|---|---|---|---|---|---|---|
| `FR-007` | RUC Validation | Taxpayer legal identifier verification (Cat. 06 Code 6) | `/Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID` | Must be an 11-digit numeric string with valid legal prefix (10, 15, 17, 20). Exact verification mechanism (offline Modulo 11 vs. online consultation) is subject to Q-13 without assuming unverified external endpoints. | [`POST /api/v1/tax/ruc/validate`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 097-2012) |
| `FR-008` | Tax Math (IGV) | 18% IGV calculation on taxable base (Cat. 05 Code 1000, Cat. 07 Code 10) | `/Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount` | $\text{TaxAmount} = \text{TaxableAmount} \times 0.18$. Arbitrary-precision math with half-up rounding to 2 decimals. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Ley IGV, Art. 17) |
| `FR-008` | Tax Math (ISC) | Selective Consumption Tax calculation (Cat. 05 Code 2000) | `/Invoice/cac:TaxTotal/cac:TaxSubtotal[cac:TaxCategory/cac:TaxScheme/cbc:ID='2000']/cbc:TaxAmount` | Calculated per official ISC schedule (Sistema Al Valor or Específico). Incurred prior to IGV if applicable. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Ley ISC) |
| `FR-009` | UBL Standard Header | Official document type and numbering series | `/Invoice/cbc:UBLVersionID`<br>`/Invoice/cbc:CustomizationID`<br>`/Invoice/cbc:ID`<br>`/Invoice/cbc:InvoiceTypeCode` | UBLVersionID = `2.1`; CustomizationID = `2.0`; InvoiceTypeCode from Cat. 01 (`01` or `03`). ID format: `[F|B]###-########`. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`GET /api/v1/invoices/{id}/xml`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 117-2017) |
| `FR-009` | Digital Signature | Enveloped digital signature using authorized X.509 certificate | `/Invoice/cac:Signature`<br>`/Invoice/ext:UBLExtensions/.../ds:Signature` | Digital signature created with SHA-256 and RSA (XMLDSig). Must validate against official SUNAT XSD signature structure. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 097-2012) |
| `FR-010` | SUNAT Delivery | Transmission of compressed XML payload to SUNAT / PSE endpoint | SOAP / REST Service Request (`sendBill` / API SEE) | Payload compressed as ZIP (`[RUC]-[TIPO]-[SERIE]-[CORRELATIVO].zip`). Receives and parses CDR response. | [`POST /api/v1/invoices/{id}/transmit`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Manual SEE SUNAT) |
| `FR-011` | Currency Code | Mandatory transaction currency declaration (Cat. 02) | `/Invoice/cbc:DocumentCurrencyCode` | Must match ISO 4217 currency (`PEN` or `USD`). All line items and totals must share identical currency. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Catálogo No. 02) |
| `FR-011` | Unit of Measure | Standard commercial unit classification (Cat. 03) | `/Invoice/cac:InvoiceLine/cbc:InvoicedQuantity/@unitCode` | Must match valid UN/ECE Rec 20 code (e.g., `NIU` for unit packages, `KGM` for bulk groceries). | [`POST /api/v1/products`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Catálogo No. 03) |
| `FR-012` | Document Status | State machine tracking acceptance, rejection, or cancellation | Internal Entity State / CDR `cbc:ResponseCode` | Code `0` = Accepted; Code `2000-3999` = Rejected with error. Cannot modify signed/accepted documents. | [`GET /api/v1/invoices/{id}`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml)<br>[`POST /api/v1/invoices/{id}/transmit`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (Manual SEE SUNAT) |
| `FR-014` | DEMO User Sandbox | Safe simulation of invoicing without live SUNAT emission | Local Mock UBL XML and simulated CDR generation | Executes isolated workflows, generates mock XML and CDR, blocks live tax calls (`AC-013`, `Q-03`). | [`POST /api/v1/demo/sessions`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** |
| `NFR-009` | Monetary Totals | Document payable total reconciliation | `/Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount` | $\text{PayableAmount} = \text{LineExtensionAmount} + \sum \text{Taxes} - \text{Discounts}$. 0.00 discrepancy allowed. | [`POST /api/v1/invoices`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/openapi.yaml) | Assessment | **Confirmed** (RS 117-2017) |

---

## 5. Traceability Matrix: Electronic Remission Guide (GRE - Guía de Remisión)

> **Important Scope Notice**: This section applies exclusively to the **Delegate's Supplementary Case** (customer transport dispatch). Requirements in this table remain **Conditional / Pending Confirmation** regarding their inclusion in the core evaluation scope.

| Req ID | Document / Process | SUNAT Rule / Field Definition | UBL 2.1 XML Element Path (XPath) | Validation & Compliance Rule | Proposed API Operation (Conditional) | Source Origin | Verification Status |
|---|---|---|---|---|---|---|---|
| `FR-018` | GRE Departure Gate | Mandatory GRE issuance prior to vehicle departure | Dispatch Gate State Machine | Vehicle departure is physically and logically blocked unless GRE status is `ACCEPTED` by SUNAT. | [`GET /api/v1/transport/gre/{id}/departure-clearance`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#62-proposed-operation-get-apiv1transportgregreiddeparture-clearance-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-018` | Transport Mode | Modality of merchandise transport (Cat. 18) | `/DespatchAdvice/cac:Shipment/cac:ShipmentStage/cbc:TransportModeCode` | Must be `01` (Transporte Público) or `02` (Transporte Privado). Determines required carrier vs. vehicle fields. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-018` | Transfer Reason | Statutory reason for merchandise transfer (Cat. 20) | `/DespatchAdvice/cac:Shipment/cbc:HandlingCode` | Must match Cat. 20 (e.g., `01` Venta, `04` Traslado entre establecimientos). Mandatory field in GRE. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (Catálogo No. 20) |
| `FR-018` | Vehicle & Driver | Vehicle license plate and driver identity (Cat. 06) | `/DespatchAdvice/cac:Shipment/cac:ShipmentStage/cac:TransportMeans/cac:RoadTransport/cbc:LicensePlateID`<br>`/cac:ShipmentStage/cac:DriverPerson/cbc:ID` | Mandatory when `TransportModeCode = 02`. License plate must match Peruvian format; driver DNI/license must be valid. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-018` | Gross Weight | Total weight of transported merchandise (Cat. 03) | `/DespatchAdvice/cac:Shipment/cbc:GrossWeightMeasure` | Measured in Kilograms (`@unitCode='KGM'`). Value must be strictly greater than zero ($> 0.00$). | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-018` | Origin & Delivery | Physical departure and arrival locations with UBIGEO | `/DespatchAdvice/cac:Shipment/cac:DeliveryAddress/cbc:ID`<br>`/DespatchAdvice/cac:Shipment/cac:OriginAddress/cbc:ID` | `cbc:ID` must be a valid 6-digit INEI UBIGEO district code; street address must be non-blank. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-019` | UBL Dispatch Root | Official UBL 2.1 Despatch Advice root element | `/DespatchAdvice` | Root element must declare OASIS UBL DespatchAdvice-2 namespaces and SUNAT extension points. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |
| `FR-020` | Local XSD Schema | Verification against SUNAT UBL DespatchAdvice XSD | Parser execution against `UBL-DespatchAdvice-2.1.xsd` | Document must pass 100% schema validation without warnings prior to digital signing or external transmission. | [`POST /api/v1/transport/gre`](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/api/api-design.md#61-proposed-operation-post-apiv1transportgre-conditional) *(Conditional)* | Delegate Case | **Pending Scope Confirmation** (RS 123-2022) |

---

## 6. Mathematical & Algorithm Validation Specifications

### 6.1 Taxpayer RUC Checksum Algorithm (Modulo 11 - Subject to Verification)
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

### 6.2 Invoice Tax Calculation & Rounding Rule
- All currency arithmetic uses arbitrary-precision decimals (`scale = 2`).
- **Rounding Mode**: `ROUND_HALF_UP` (standard financial rounding: $\ge 0.005$ rounds up, $< 0.005$ rounds down).
- **Line Subtotal**: $\text{LineBase} = \text{Quantity} \times \text{UnitPrice}$ (excluding tax).
- **Line IGV**: $\text{LineIgv} = \text{RoundHalfUp}(\text{LineBase} \times 0.18)$.
- **Document Total Verification Invariant**:
  $$\text{PayableAmount} = \sum \text{LineBase} + \sum \text{LineIgv} + \sum \text{LineIsc} - \text{TotalDiscounts}$$
  Discrepancy must be exactly `0.00`.
