# Examen: ABC Software Corp. - Enterprise Modernization & Electronic Invoicing

## 1. Project Overview
This repository contains the architecture, specification, and migration planning for modernizing the enterprise software of **ABC Software Corp.**, a medium-sized distributor of wholesale and retail groceries and general merchandise.

The initiative migrates legacy warehouse management and sales operations from a **Visual FoxPro 9** system to a modern, scalable, and tax-compliant software solution adhering to Peruvian regulations established by SUNAT (*Superintendencia Nacional de Aduanas y de Administración Tributaria*).

---

## 2. Methodology: Spec-First Approach
This project strictly follows a **spec-first methodology**:
- **Phase 1: Problem Definition & Governance (Current Stage)**: Structuring repository governance, cataloging facts vs. inferences, registering open questions, and defining architectural boundaries.
- **Phase 2: Formal Specification (Next Stage)**: Eliciting detailed requirements, modeling the business domain, drafting the modular monolith MVC architecture and its Hexagonal evolution path, formalizing SUNAT/UBL compliance schemas, and drafting non-destructive migration protocols.
- **Phase 3: Implementation & Validation (Future Stage)**: Technical scaffolding, automated testing, and development following approved specifications.

> **Important**: No business code, database alterations, live external service connections, or unverified architectural assumptions are permitted during the specification phase.

---

## 3. Repository Structure

```
├── .gitattributes
├── README.md                               # Root project overview and governance
├── docs/                                   # High-level context and scope records
│   ├── README.md
│   ├── 00-context-and-scope.md             # Baseline context, facts, inferences, and scope boundaries
│   └── 01-open-questions.md                # Comprehensive register of blocking open questions
├── specs/                                  # System specifications
│   ├── requirements/                       # Requirements, use cases (electronic invoicing & DEMO user)
│   │   └── README.md
│   ├── domain/                             # Domain model, entities, value objects, and DTOs
│   │   └── README.md
│   ├── architecture/                       # MVC modular monolith, Hexagonal roadmap, packaging (MSI, APK)
│   │   └── README.md
│   ├── compliance/                         # Peruvian tax rules, SUNAT catalogs, UBL 2.1, XSD, traceability
│   │   └── README.md
│   ├── api/                                # Service contracts, future REST APIs, and error models
│   │   └── README.md
│   ├── migration/                          # Legacy Visual FoxPro 9 non-destructive migration strategy
│   │   └── README.md
│   └── review/                             # Quality gates, architectural audits, and sign-off checklists
│       └── README.md
└── diagrams/                               # Visual architectural, domain, and flow models (C4, UML, Mermaid)
    └── README.md
```

---

## 4. Key References and Entry Points
- **Context and Case Scope**: See [00-context-and-scope.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/00-context-and-scope.md) for complete details on the assessment baseline and the delegate's supplementary transport scenario.
- **Open Questions Register**: See [01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md) for unresolved technical and regulatory questions requiring stakeholder decisions.
- **Folder Navigation**: Each subdirectory contains an individual `README.md` defining its specific scope, target documents, and architectural deliverables.
