# Deployment and Distribution Specifications (`specs/architecture/deployment-options.md`)

## 1. Document Overview
This document specifies the deployment topologies, packaging strategies, client distribution mechanisms, and scalability blueprints for ABC Software Corp.'s modernized enterprise system.

In strict accordance with the assessment constraints:
- **Windows distribution via MSI installer** (`NFR-004`, `AC-017`) and **Android distribution via APK package** (`NFR-005`, `AC-018`) are mandatory distribution requirements.
- The system is architected as an initial **modular monolith** prepared for future horizontal scaling and REST services (`NFR-001`, `NFR-003`).
- To avoid speculative implementation, unspecified technologies (client programming frameworks, packaging compilers, database vendors) are formally categorized as **Proposed Options** with unresolved questions referenced in [docs/01-open-questions.md](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md).

---

## 2. Candidate Deployment Topologies

```
TOPOLOGY A: Centralized Modular Monolith with Dual Clients (RECOMMENDED BLUEPRINT)

   [Windows Desktop Client]                       [Android Mobile Device]
    (Packaged via MSI)                             (Packaged via APK)
             |                                              |
             | (HTTPS / In-Process / Service Contract)      | (HTTPS / Wi-Fi)
             +----------------------+-----------------------+
                                    |
                                    v
                     [Centralized Modular Monolith Node]
                     (MVC / Application Core / Stateless)
                                    |
                    +---------------+---------------+
                    |                               |
                    v                               v
         [Enterprise RDBMS]           [SUNAT / PSE / Simulator]
         (Central Database)            (External Tax Gateway)
```

### 2.1 Topology Option A: Centralized Modular Monolith Server with Dual Clients (Recommended Blueprint)
- **Description**:
  The modular monolith application is deployed to a centralized host (or local company server) connected to a centralized enterprise relational database.
  - **Windows Desktop Client**: Distributed via an **MSI installer**, providing high-density transactional screens for billing clerks and accountants.
  - **Android Mobile Client**: Distributed via an **APK package**, providing touch-optimized handheld screens for warehouse receiving, stock taking, and loading dock dispatches.
- **Architectural Rationale**:
  - Maintains a **single source of truth** for real-time inventory balances, eliminating complex multi-master synchronization conflicts.
  - Centralizes digital signature certificates and SUNAT communication credentials on the secure server tier.
  - Provides a direct evolution path toward horizontal scaling and REST APIs (`NFR-003`).
- **Open Questions**: [Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### 2.2 Topology Option B: Standalone Desktop Monolith (MSI) with Mobile Companion Sync
- **Description**:
  The entire modular monolith application, including its database engine (e.g., embedded SQLite or local SQL instance), is installed directly onto a primary Windows desktop workstation via an MSI package. The Android APK operates as a secondary peripheral client connecting to the desktop via local Wi-Fi.
- **Evaluation**:
  - *Advantages*: Eliminates the need for a dedicated server machine; simple single-user setup.
  - *Trade-offs / Risks*: High concurrency friction when multiple sales counters operate simultaneously; requires distributing digital certificates to individual desktop machines; fragile if the primary workstation is powered down or disconnected.

---

### 2.3 Topology Option C: Cross-Platform Unified Client Packaging
- **Description**:
  A single cross-platform application framework (e.g., .NET MAUI, Flutter, or an Electron/Capacitor web wrapper) is used to compile identical UI components and business rules directly into both a Windows MSI package and an Android APK.
- **Evaluation**:
  - *Advantages*: High UI code sharing; consistent user experience across platforms.
  - *Trade-offs / Risks*: Dependent on evaluation committee approval of cross-platform runtimes ([Q-07](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints), [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints)).

---

## 3. Packaging and Distribution Specifications

### 3.1 Windows MSI Distribution (`NFR-004`, `AC-017`)
- **Format**: Microsoft Standard Installer (`.msi`).
- **Target OS**: Windows 10 / Windows 11 (64-bit).
- **Packaging Responsibilities**:
  1. **Installation Lifecycle**:
     - System dependency verification (verifying runtime requirements prior to installation).
     - Standard directory installation (e.g., `C:\Program Files\ABCSoftware\InvoicingMonolith`).
     - Registry registration for clean Windows "Add/Remove Programs" integration.
     - Start Menu and Desktop shortcut creation.
  2. **Uninstallation & Rollback**:
     - Complete, clean removal of application binaries and shortcuts (`AC-017`).
     - Configuration and local database files preserved or backed up upon prompt.
  3. **Candidate Packaging Tooling** *(Pending Tech Selection)*:
     - WiX Toolset (Windows Installer XML).
     - Microsoft Visual Studio Installer Projects extension.
     - Advanced Installer / Inno Setup (wrapped to MSI).
- **Open Questions**: [Q-09](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints).

---

### 3.2 Android APK Distribution (`NFR-005`, `AC-018`)
- **Format**: Android Package Kit (`.apk`).
- **Target OS**: Android 8.0 (API Level 26) through Android 14+ (API Level 34).
- **Packaging Responsibilities**:
  1. **Deployment Mechanism**:
     - Enterprise sideloading / internal file distribution (downloadable APK from company intranet or manual transfer).
  2. **Permissions Profile**:
     - `android.permission.INTERNET`: Required to communicate with the central modular monolith server.
     - `android.permission.ACCESS_NETWORK_STATE`: Required to monitor Wi-Fi connectivity status.
     - `android.permission.CAMERA` *(Optional / Proposed)*: For barcode / QR code scanning of products and remission guides.
  3. **Application Signing**:
     - Signed with an official corporate release keystore (v2/v3 signature scheme).
- **Open Questions**: [Q-15](file:///c:/Users/LOQ/Documents/GitHub/Examen/docs/01-open-questions.md#category-c-technology-stack-and-architectural-constraints) (Offline local database vs. continuous online connectivity).

---

## 4. Horizontal Scalability Blueprint (Future Scale)

In accordance with `NFR-003`, the modular monolith is structured to scale horizontally when wholesale or retail transaction volumes expand:

```
                                  [Client Requests]
                                          |
                                          v
                               [Layer 4/7 Load Balancer]
                               (HAProxy / NGINX / Cloud LB)
                                          |
                      +-------------------+-------------------+
                      |                                       |
                      v                                       v
         [Monolith Instance #1]                  [Monolith Instance #2]
         (Stateless Node - MVC/REST)             (Stateless Node - MVC/REST)
                      |                                       |
                      +-------------------+-------------------+
                                          |
                                          v
                          [Centralized Enterprise RDBMS]
                          (PostgreSQL / SQL Server)
                          - Connection Pooling
                          - Primary (Writes) + Read Replicas
```

### Scalability Tenets:
1. **Stateless Nodes**:
   - Monolith backend instances maintain no conversational state in RAM, allowing any incoming request to be serviced by any healthy node.
2. **Centralized Enterprise Persistence**:
   - Modern RDBMS handles data integrity, isolation levels, and ACID compliance (`Q-08`).
3. **External Integration Connection Pooling**:
   - Outbound connections to SUNAT Beta or PSE/OSE endpoints use non-blocking HTTP clients with connection pooling to absorb billing spikes.
