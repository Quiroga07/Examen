# Legacy Migration Specifications Directory (`specs/migration/`)

## Purpose
This directory specifies the migration strategy, data preservation protocols, extraction/transformation plans, and legacy-to-target mapping frameworks for the existing Visual FoxPro 9 system.

## Planned Documents
- `migration-strategy.md`: End-to-end migration methodology emphasizing data preservation, read-only extraction, zero data loss, and zero modification/deletion of the legacy Visual FoxPro database.
- `legacy-mapping-manifesto.md`: Field-level and table-level data mapping specification from Visual FoxPro structures (to be documented once the actual schema is provided) to modern domain schemas.
- `business-logic-preservation.md`: Identification, extraction, and validation strategy for valid legacy business rules (e.g., warehouse movements, stock balances, internal document numbering).
- `data-verification-and-reconciliation.md`: Reconciliation routines, checksums, and audit procedures to verify historical data consistency after migration.
