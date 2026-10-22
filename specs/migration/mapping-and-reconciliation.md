# Migration, Mapping, and Reconciliation Specification (`specs/migration/mapping-and-reconciliation.md`)

## 1. Document Overview
This document specifies the end-to-end strategy, mapping framework, validation rules, reconciliation methodology, error handling, and rollback procedures for migrating historical data from ABC Software Corp.'s legacy **Visual FoxPro 9** system to the modernized enterprise relational database.

In strict compliance with project governance:
- **Zero data loss and zero modification of the legacy database**: The original Visual FoxPro files must remain untouched and unaltered.
- **No speculative schema invention**: Field mappings are defined at the conceptual level, identifying target domain models and marking physical legacy columns as **Pending Discovery** until the legacy database is inspected.
- **Spec-First and Zero Execution**: This document defines the migration blueprint; no database operations, modifications, or migrations are executed at this time.

---

## 2. Requirements Traceability
This specification fulfills the following approved requirements:
- `FR-001` through `FR-005`: Continuity of products, dates, movements, and tracking numbers.
- `FR-015`: Non-destructive legacy data extraction.
- `FR-016`: Legacy-to-target mapping and ingestion framework.
- `FR-017`: Preservation of valid legacy business logic.
- `NFR-007`: Absolute preservation and immutability of legacy database files.
- `NFR-008`: Zero historical data loss and reconciliation auditability.
- `UC-008`: Extract and reconcile legacy Visual FoxPro data use case.
- `AC-014`: SHA-256 cryptographic hash invariance of legacy database files.
- `AC-015`: Mathematical reconciliation proof ($N_{\text{source}} = N_{\text{migrated}} + N_{\text{rejected}}$).

---

## 3. Core Safety Principles

```
+----------------------------------------------------------------------------------------------------+
|                                    SAFE MIGRATION PIPELINE                                         |
|                                                                                                    |
|  [Legacy VFP 9]                                                                                    |
|         |                                                                                          |
|         v (Read-Only)                                                                              |
|  [Stage 1: Hashing & Backup] ---> Verification of SHA-256 Checksums                                |
|         |                                                                                          |
|         v                                                                                          |
|  [Stage 2: Schema Discovery] ---> Extraction of VFP Metadata (.DBF / .DBC)                         |
|         |                                                                                          |
|         v                                                                                          |
|  [Stage 3: Staging Area]     ---> Raw JSON Envelopes (LegacyRawRecordEnvelopeDto)                  |
|         |                                                                                          |
|         v                                                                                          |
|  [Stage 4: Sanitization]     ---> Charset (CP1252 -> UTF-8), Trim Spaces, Parse Types              |
|         |                                                                                          |
|         +---------------------------------------+                                                  |
|         |                                       |                                                  |
|   (Valid Records)                         (Invalid / Corrupt)                                      |
|         v                                       v                                                  |
|  [Stage 5: Target Ingestion]             [Stage 7: Rejection Log]                                  |
|   - Product Aggregate                     - ErrorCode & Reason                                     |
|   - Movement Aggregate                    - Raw Payload JSON                                       |
|         |                                       |                                                  |
|         +-------------------+-------------------+                                                  |
|                             |                                                                      |
|                             v                                                                      |
|  [Stage 6: Reconciliation]  ---> Proof: Source = Migrated + Rejected (0.00 discrepancy)           |
+----------------------------------------------------------------------------------------------------+
```

1. **Strict Read-Only Access**: All connections to legacy files use read-only drivers or low-level binary file streams opened in shared read mode (`FileShare.Read` / `O_RDONLY`).
2. **Cryptographic Immutability Proving**: SHA-256 hashes of all source files are computed before and after migration to mathematically prove that no bytes were altered (`AC-014`).
3. **Decoupled Staging Extraction**: Data is first extracted verbatim into an intermediate staging area (`LegacyRawRecordEnvelopeDto`) before any domain transformation is attempted.
4. **Reconciliation Completeness**: Every individual historical source record must be accounted for either as a successfully migrated domain entity or as an explicit entry in the migration rejection log (`AC-015`).

---

## 4. End-to-End Migration Methodology (8 Stages)

### Stage 1: Pre-Migration Backup and Cryptographic Hashing
- **Action**: Prior to any software interaction, a byte-level physical copy of the entire Visual FoxPro directory structure (`.DBF`, `.DBC`, `.FPT`, `.CDX`, `.DCT`, `.DCX`) is created and stored in a secure Write-Once-Read-Many (WORM) archive.
- **Verification**:
  - Compute SHA-256 checksums for every legacy file.
  - Generate a signed manifest file: `legacy_source_manifest.sha256`.
  - Apply operating system read-only permissions (`attrib +R *.*` on Windows).

### Stage 2: Legacy Source Inspection and Field Discovery
- **Action**: Execute the discovery protocol cataloged in [specs/migration/legacy-data-inventory.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/migration/legacy-data-inventory.md).
- **Outputs**:
  - Identify whether tables are free or containerized (`.DBC`).
  - Read code page marker byte from DBF header (byte 29) to confirm source encoding (e.g., Windows-1252 vs. CP850).
  - Extract physical field names, types, widths, and nullability flags.
  - Finalize the concrete Field-to-Domain Mapping Manifesto without guessing.

### Stage 3: Read-Only Extraction to Staging Area
- **Action**: An isolated extraction worker scans legacy tables sequentially, reading each active and soft-deleted record without writing temporary index tags to the source directory.
- **Data Packaging**:
  - Each extracted record is wrapped in a `LegacyRawRecordEnvelopeDto` containing `sourceTable`, `sourceRecordNumber`, `rawPayloadJson`, `extractedAt`, and `sourceFileSha256`.
  - The envelopes are persisted in an intermediate staging store (isolated staging schema).
- **Safety Gate**: Re-compute SHA-256 checksums of source legacy files. If any hash differs from `legacy_source_manifest.sha256`, the migration aborts immediately with an alert.

### Stage 4: Data Transformation, Normalization, and Sanitization
- **Transformations**:
  1. **Character Encoding Conversion**: Convert extracted strings from legacy source encoding (e.g., CP1252) to standard UTF-8, preserving accented characters and `ñ`.
  2. **Space Stripping**: Visual FoxPro stores character fields with fixed-width space padding; strip all trailing spaces (`RTRIM`).
  3. **Null Representation Normalization**: Convert Visual FoxPro space strings in numeric fields and `_NullFlags` to strict SQL `NULL` or default zeros where mandated by domain invariants.
  4. **Date Parsing**: Convert Visual FoxPro `Date` (`YYYYMMDD`) and `DateTime` (Julian day + milliseconds) to standard ISO-8601 UTC timestamps.
  5. **Soft-Delete Handling**: Records flagged with the VFP delete byte (`0x2A` / `*`) are segregated based on stakeholder decision ([Q-06](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-b-legacy-visual-foxpro-9-database--migration)).

### Stage 5: Target Ingestion into Modern Domain Aggregates
- **Ingestion Order**:
  1. **Product Catalog**: Ingest products and unit prices (`FR-001`, `FR-006`).
  2. **Warehouse Movements (Header)**: Ingest movement metadata, transaction timestamps, and internal tracking numbers (`FR-002`, `FR-005`).
  3. **Movement Line Items**: Ingest quantities and product references, validating referential integrity against the product catalog (`FR-003`, `FR-004`).
- **Domain Invariant Enforcement**:
  - Ingestion occurs through domain factories enforcing invariants (`INV-001`, `INV-002`, `INV-003`).
  - If a record violates an invariant (e.g., non-existent product reference or negative quantity without legacy override), it is routed to the Rejection Log.

### Stage 6: Mathematical Reconciliation and Audit Proof
- **Reconciliation Formula**:
  $$\text{Total Legacy Records} = \text{Successfully Migrated Records} + \text{Rejected Records in Log}$$
- **Verification Audits**:
  - **Count Audit**: Compare raw count in DBF header (bytes 4-7) against total staging records.
  - **Quantity Balance Audit**: $\sum \text{Quantity}_{\text{source}} = \sum \text{Quantity}_{\text{target}} + \sum \text{Quantity}_{\text{rejected}}$.
  - **Chronological Boundary Audit**: Minimum and maximum transaction dates in the new database match legacy extremes.
  - **Integrity Sign-Off**: Emit a signed `reconciliation_certificate.json` detailing run statistics.

### Stage 7: Error Logging and Rejection Management
- **Schema of Migration Exception Log**:
  - `ExceptionId`: Unique UUID.
  - `MigrationRunId`: Migration execution identifier.
  - `SourceTable`: Legacy table name.
  - `SourceRecordNumber`: Physical record number in legacy table.
  - `RawRecordPayload`: Original extracted JSON payload.
  - `ErrorCode`: Categorized machine-readable code (e.g., `ORPHAN_PRODUCT_REFERENCE`, `INVALID_TIMESTAMP`, `NEGATIVE_STOCK_VIOLATION`).
  - `ReasonMessage`: Human-readable technical failure description.
  - `LoggedAt`: Timestamp of rejection.

### Stage 8: Rollback and Recovery Planning
- **Rollback on Legacy System**:
  - **Risk**: Zero. Because legacy extraction is strictly read-only and physical files are write-locked, no rollback or recovery is ever needed on the legacy Visual FoxPro database.
- **Rollback on Modern Target System**:
  - Migration runs within transactional batches or against a fresh migration staging schema.
  - If the mathematical reconciliation proof fails ($\text{Source} \ne \text{Migrated} + \text{Rejected}$) or an unhandled system failure occurs:
    1. A database rollback (`ROLLBACK TRANSACTION`) is triggered.
    2. The migration run status is marked `FAILED_ROLLED_BACK`.
    3. Target tables are restored to their pre-migration snapshot state.
    4. Diagnostic error logs are retained for post-mortem analysis.

---

## 5. Conceptual Mapping Blueprint

The following blueprint maps known functional concepts from the legacy system to target domain entities. Physical Visual FoxPro column and table names will be populated once physical database inspection is authorized:

| Functional Concept | Legacy Source Concept | Pending Physical VFP Column | Target Domain Aggregate | Target Entity / Value Object | Mapping & Transformation Rule |
|---|---|---|---|---|---|
| **Product Item** | Product catalog record (`FR-001`) | *[To be inspected]* | Product Aggregate | `Product.ProductId` / `Product.ProductCode` | Map SKU/code; trim whitespace; assign unique UUID |
| **Product Name** | Product description (`FR-001`) | *[To be inspected]* | Product Aggregate | `Product.Description` | Convert charset to UTF-8; trim trailing spaces |
| **Product Price** | Commercial sales price (`FR-006`) | *[To be inspected]* | Product Aggregate | `Product.UnitPrice` (`Money`) | Convert VFP numeric to arbitrary-precision `Decimal(12,2)` |
| **Movement Date** | Transaction date (`FR-002`) | *[To be inspected]* | Inventory Aggregate | `WarehouseMovement.TransactionTimestamp` | Parse VFP Date (`YYYYMMDD`) to ISO-8601 UTC DateTime |
| **Movement Type** | Inbound vs. Outbound (`FR-003`, `FR-004`) | *[To be inspected]* | Inventory Aggregate | `WarehouseMovement.MovementType` | Map legacy movement code to `INBOUND_PURCHASE` or `OUTBOUND_SALE` |
| **Voucher Number**| Internal document number (`FR-005`) | *[To be inspected]* | Inventory Aggregate | `InternalTrackingNumber` (`Series` + `Correlative`) | Parse legacy internal series and sequence number (`Q-14`) |
| **Movement Line** | Movement detail / item row | *[To be inspected]* | Inventory Aggregate | `MovementLineItem.Quantity` | Validate quantity $> 0.00$; verify product exists in catalog |

---

## 6. Migration Governance and Open Questions
The execution of the migration blueprint is contingent upon resolving the following open questions from [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md):
- **Q-04**: Physical and logical structure of the legacy database (.DBC vs. free .DBF tables, exact schema).
- **Q-05**: Location and access to valid legacy business logic (.PRG code, screen forms, or database procedures).
- **Q-06**: Business rules for sanitizing orphan records, soft-deleted rows, and duplicate document numbers.
- **Q-08**: Confirmation of target modern RDBMS (PostgreSQL, SQL Server, MySQL).
