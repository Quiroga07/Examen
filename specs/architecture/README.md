# Architecture Specifications Directory (`specs/architecture/`)

## Purpose
This directory outlines the architectural design for ABC Software Corp.'s enterprise software modernization. It documents the initial modular monolith using the Model-View-Controller (MVC) pattern, its progressive evolution toward Hexagonal (Ports and Adapters), the selected PHP/Laravel and Docker stack for Partial Exam 2, and remaining deployment/client details. GRE, transport, and sandbox behavior are deferred and out of the assessed scope.

## Documents
- [architecture-decisions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md): Formal Architecture Decision Records (`ADR-001` through `ADR-008`), including the initial MVC pattern, PHP/Laravel and Docker stack, UBL XML output port, and deferred supplementary scope.
- [mvc-current.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md): Initial modular monolith MVC architecture, including the `IUblGeneratorPort` boundary and infrastructure XML adapter.
- [future-hexagonal.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md): Evolution path from initial MVC toward Hexagonal Architecture with replaceable ports/adapters, REST readiness, and horizontal scaling; no microservices are introduced now.
- [deployment-options.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/deployment-options.md): Evaluates deployment topologies, Windows MSI installer packaging, Android APK packaging, and future load-balanced horizontal scaling.
