# Legacy Data Inventory Specification (`specs/migration/legacy-data-inventory.md`)

## 1. Document Overview
This document inventories the known information, structural boundaries, and technical unknowns concerning the legacy **Visual FoxPro 9** system of ABC Software Corp.

In strict compliance with project governance:
- **No tables, columns, indexes, data types, or business rules are invented**.
- Every statement is grounded exclusively in the approved context from [docs/00-context-and-scope.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/00-context-and-scope.md).
- Elements requiring discovery upon receiving physical database access are cataloged in an **Inspection Checklist**.
- Unresolved questions are linked directly to [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Inventory of Known Legacy Information

The following items are confirmed facts explicitly stated in the assessment baseline:

| # | Known Concept | Evidence from Context | Governing Requirement |
|---|---|---|---|
| 1 | **Legacy Platform** | System is built and operating on **Visual FoxPro 9**. | `docs/00-context-and-scope.md` Section 2.1 |
| 2 | **Business Domain** | Wholesale and retail sales of groceries and general merchandise. | `FR-006`, `docs/00-context-and-scope.md` Section 2.1 |
| 3 | **Transaction Dates** | Records the calendar dates/timestamps of operations. | `FR-002`, `UC-001`, `UC-002` |
| 4 | **Incoming Goods** | Records inbound warehouse receipts (supplier purchases, inventory arrivals). | `FR-003`, `UC-001`, `AC-003` |
| 5 | **Outgoing Goods** | Records outbound warehouse departures (wholesale deliveries, retail sales dispatches). | `FR-004`, `UC-002`, `AC-004` |
| 6 | **Product Catalog Entries** | Maintains records of products, descriptions, and basic merchandise data. | `FR-001`, `AC-001` |
| 7 | **Internal Tracking Numbers** | Assigns internal tracking numbers to vouchers and warehouse movements. | `FR-005`, `AC-005`, `Q-14` |
| 8 | **RUC Handling Deficiencies**| Legacy system exhibits difficulty validating customer RUC numbers. | `FR-007`, `AC-007` |
| 9 | **Tax Calculation Errors** | Generates calculation errors in applicable taxes, specifically IGV and ISC. | `FR-008`, `NFR-009`, `AC-008` |
| 10| **Absence of XML Generation**| Completely lacks formal, standardized UBL/XML document generation. | `FR-009`, `NFR-010`, `AC-009` |
| 11| **Lack of Electronic Integration**| Possesses no electronic integration with SUNAT or an authorized PSE/OSE. | `FR-010`, `AC-010` |
| 12| **Data Immutability Mandate** | The existing Visual FoxPro database must **not be damaged, modified, or deleted**. | `NFR-007`, `AC-014` |

---

## 3. Inventory of Unknown Legacy Details (Pending Inspection)

To prevent speculative architecture, the following technical and architectural parameters are formally marked as **UNKNOWN** and must be resolved through physical source inspection rather than assumption:

### 3.1 Physical Storage and File Architecture
- **Unknown 1: Database Container vs. Free Tables**:
  - *Status*: Unknown.
  - *Inspection Need*: Determine whether the database is structured within a Visual FoxPro Database Container (`.DBC`, `.DCT` memo, `.DCX` index) or consists of standalone free `.DBF` table files.
  - *Reference*: [Q-04](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

- **Unknown 2: Associated File Extensions**:
  - *Status*: Unknown.
  - *Inspection Need*: Identify associated variable-length memo files (`.FPT`) and index files (structural compound `.CDX` or independent `.IDX`). Missing `.FPT` files cause corruption errors when opening Visual FoxPro tables.

- **Unknown 3: Code Page and Character Encoding**:
  - *Status*: Unknown.
  - *Inspection Need*: Determine the code page byte written to the DBF header (byte offset 29). Common legacy encodings in Peru include Windows-1252 (`0x03` / `0x58`) and MS-DOS CP850 (`0x02`). Incorrect code page translation will corrupt Spanish characters (`ñ`, `á`, `é`, `í`, `ó`, `ú`).

---

### 3.2 Logical Schema and Relational Structure
- **Unknown 4: Exact Table and Column Names**:
  - *Status*: Unknown.
  - *Inspection Need*: Enumerate all `.DBF` filenames, field names (limited to 10 characters in free DBFs), data types (`Character`, `Numeric`, `Float`, `Currency`, `Date`, `DateTime`, `Logical`, `Memo`, `Integer`), field lengths, and decimal precisions.
  - *Constraint*: **Do not invent table names** such as `ARTICULOS`, `KARDEX`, or `MOVIMIENTOS` until verified against the legacy files.

- **Unknown 5: Primary Keys and Relationships**:
  - *Status*: Unknown.
  - *Inspection Need*: Identify primary keys, candidate keys, and foreign key relationships. Visual FoxPro free tables do not enforce foreign key referential integrity at the engine level, meaning orphan records may exist in historical data.

---

### 3.3 Data Quality and Legacy Idiosyncrasies
- **Unknown 6: Visual FoxPro Soft-Delete Records (`SET DELETED`)**:
  - *Status*: Unknown.
  - *Inspection Need*: Visual FoxPro flags deleted records with an asterisk (`0x2A` / `*`) in the first byte of each record without physically removing the data until a `PACK` command is issued. The migration team must determine whether soft-deleted records should be ignored (`SET DELETED ON` equivalent) or recovered into an audit archive.
  - *Reference*: [Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

- **Unknown 7: Null Values and Blank Padding**:
  - *Status*: Unknown.
  - *Inspection Need*: Legacy VFP tables often substitute null values with spaces in character fields or zeros in numeric fields, or use a hidden `_NullFlags` byte. Sanitization routines must inspect these patterns.

- **Unknown 8: Numbering Format and Series Structure**:
  - *Status*: Unknown.
  - *Inspection Need*: Inspect how internal document numbers (`FR-005`) are formatted (e.g., numeric integer vs. prefixed string `ING-001245`) and identify whether collisions or duplicate numbers exist in historical data.

---

### 3.4 Business Logic Location
- **Unknown 9: Location of Valid Legacy Business Rules**:
  - *Status*: Unknown.
  - *Inspection Need*: Determine where existing warehouse validation rules, stock balance update routines, and document numbering logic reside:
    - In `.DBC` stored procedures and table validation rules?
    - In procedural program files (`.PRG`)?
    - In user interface form methods (`.SCX`, `.SCT`)?
    - In visual class libraries (`.VCX`, `.VCT`)?
  - *Reference*: [Q-05](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration).

---

## 4. Legacy Inspection Protocol Checklist

Prior to authoring the detailed field-by-field mapping manifesto, the engineering team must execute the following non-destructive inspection checklist upon receiving access to the legacy files:

```
[ ] STEP 1: Verify file delivery package (.DBF, .DBC, .FPT, .CDX, .PRG, .SCX).
[ ] STEP 2: Compute and record initial SHA-256 cryptographic hashes for every file.
[ ] STEP 3: Place physical files in a strictly READ-ONLY directory with locked file permissions.
[ ] STEP 4: Inspect DBF headers (32-byte header inspection) to extract:
            - Table record count (bytes 4-7).
            - Header length and record length (bytes 8-11).
            - Code page marker byte (byte 29).
[ ] STEP 5: Run metadata extraction utility (e.g., using Python struct/dbfread or ODBC) to dump:
            - Table name, field names, field types, field lengths, decimals.
[ ] STEP 6: Execute scan for soft-deleted records (evaluating deletion flag byte).
[ ] STEP 7: Check referential integrity across extracted foreign keys to detect orphan records.
[ ] STEP 8: Inspect source code files (.PRG, .SCX) for inventory calculation formulas.
[ ] STEP 9: Re-compute SHA-256 hashes of all source files to verify ZERO modification.
[ ] STEP 10: Complete the formal Field-to-Domain Mapping Manifesto based on verified schema.
```

---

## 5. Artifact Request List (To Legacy System Custodians)
To unblock the inspection checklist, the migration team officially requests the following artifacts from ABC Software Corp.'s legacy custodians:
1. Complete read-only snapshot of all `.DBF`, `.FPT`, `.CDX`, and `.DBC` files from the production warehouse system.
2. Legacy data dictionary or Entity-Relationship documentation (if any exists).
3. Legacy source code files (`.PRG`, `.SCX`, `.VCX`) containing warehouse calculation logic.
4. Identification of active vs. decommissioned historical tables.
