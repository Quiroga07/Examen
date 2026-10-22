# Architecture Specifications Directory (`specs/architecture/`)

## Purpose
This directory outlines the architectural design for ABC Software Corp.'s enterprise software modernization. It documents the initial modular monolith using the Model-View-Controller (MVC) pattern, the progressive evolution roadmap toward Hexagonal (Ports and Adapters) or Clean Architecture, future horizontal scaling, and client distribution strategies (Windows MSI and Android APK).

## Documents
- [architecture-decisions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/architecture-decisions.md): Formal Architecture Decision Records (`ADR-001` through `ADR-006`) establishing modular monolith structure, domain decoupling, client distribution, read-only legacy extraction, and DEMO sandbox isolation.
- [mvc-current.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/mvc-current.md): Detailed specifications for the initial modular monolith MVC architecture, defining layer responsibilities, module boundaries, and cross-cutting concerns.
- [future-hexagonal.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/future-hexagonal.md): Future architectural roadmap illustrating how MVC evolves into Hexagonal Architecture (driving/driven ports and adapters) with REST readiness and horizontal scalability without building microservices now.
- [deployment-options.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/specs/architecture/deployment-options.md): Evaluates deployment topologies, Windows MSI installer packaging, Android APK packaging, and future load-balanced horizontal scaling.
