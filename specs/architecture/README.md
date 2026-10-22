# Architecture Specifications Directory (`specs/architecture/`)

## Purpose
This directory outlines the architectural design of the application. It documents the initial clean/modular monolith using the Model-View-Controller (MVC) pattern, the progressive evolution roadmap toward Hexagonal (Ports and Adapters) or Clean Architecture, future horizontal scaling, and distribution strategies (Windows MSI installer and Android APK packaging).

## Planned Documents
- `modular-monolith-mvc.md`: Baseline structural design of the modular monolith following MVC conventions with decoupled domain logic.
- `hexagonal-evolution.md`: Target transition blueprint specifying ports (interfaces), driving/driven adapters, and migration steps from MVC controllers to hexagonal boundaries.
- `distribution-and-packaging.md`: Specifications for packaging the application as a Windows MSI installer and an Android APK package.
- `architectural-decision-records/`: Architecture Decision Records (ADRs) tracking design choices, trade-offs, and technology evaluations.
