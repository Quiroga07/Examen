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

The assessment establishes exactly five legacy business facts. They are known at the conceptual level and are not unknown; their physical tables, columns, data types, and relationships remain unknown until the schema is available.

| # | Known Legacy Fact | Conceptual Mapping | Governing Requirement |
|---|---|---|---|
| 1 | **Date** | Map the known date concept to the target movement date; do not infer a time or timezone. | `FR-002`, `UC-001`, `UC-002` |
| 2 | **Incoming movement** | Map the known incoming-movement concept to the target inbound movement concept. | `FR-003`, `UC-001`, `AC-003` |
| 3 | **Outgoing movement** | Map the known outgoing-movement concept to the target outbound movement concept. | `FR-004`, `UC-002`, `AC-004` |
| 4 | **Product** | Map the known product concept to the target product concept; specific attributes are not established by this fact. | `FR-001`, `AC-001` |
| 5 | **Internal document number** | Preserve as an internal document identifier; do not map it to a SUNAT series or correlative. | `FR-005`, `AC-005`, `Q-14` |

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
  - *Inspection Need*: Enumerate verified `.DBF` filenames, field names, data types, field lengths, and decimal precisions when the legacy schema is available.
  - *Constraint*: Actual legacy table and column names are unknown. Do not assign or imply names before inspecting the schema.

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

- **Unknown 8: Internal Document Number Format and Uniqueness**:
  - *Status*: Unknown.
  - *Inspection Need*: Inspect the actual format and uniqueness of internal document numbers (`FR-005`) after the schema and records are available. Do not infer a SUNAT series or correlative.

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
