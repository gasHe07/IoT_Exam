# CtrlHome - Laboratorio di Sviluppo di Applicazioni per IoT

![IoT](https://img.shields.io/badge/Project-IoT-blue)
![Academic Year](https://img.shields.io/badge/A.A.-2022--2023-green)
![University](https://img.shields.io/badge/University-Luigi%20Vanvitelli-orange)

## 👤 Autori
* [cite_start]**Alfredo Buonanno** (A13002237) [cite: 361]
* [cite_start]**Elio Fava** (A13002167) [cite: 361]

[cite_start]**Docente:** Prof. Antonio Guerriero [cite: 361]  
[cite_start]**Corso:** Laboratorio di Sviluppo di Applicazioni per IoT [cite: 358]  
[cite_start]**Università degli Studi della Campania "Luigi Vanvitelli"** [cite: 358]  
[cite_start]**Anno Accademico:** 2022-2023 [cite: 359]

---

## 📝 Idea di Progetto
[cite_start]**CtrlHome** è un’applicazione IoT focalizzata sul controllo domotico di un'abitazione[cite: 363]. [cite_start]Il sistema offre all'utente la possibilità di gestire diversi componenti della casa attraverso una **dashboard** centralizzata[cite: 364].

[cite_start]L'accesso alle funzionalità è protetto da un sistema di autenticazione tramite credenziali[cite: 365].

---

## 🚀 Funzionalità Principali
L'applicazione permette di interagire con i seguenti sottosistemi:

* [cite_start]**Illuminazione:** Controllo manuale (accensione/spegnimento) o programmazione automatica basata su specifiche fasce orarie[cite: 366].
* [cite_start]**Sicurezza:** Attivazione e disattivazione dell’allarme mediante codice numerico[cite: 367]. [cite_start]In caso di rilevamento, il sistema emette un segnale acustico[cite: 367].
* [cite_start]**Sveglia:** Possibilità di impostare e configurare una sveglia[cite: 368].

---

## 📊 Modellazione UML
[cite_start]Il progetto include la definizione dei requisiti funzionali attraverso i **Diagrammi dei Casi d'Uso**[cite: 369]:

### 1. Casi d'Uso del Sistema (CtrlHome)
[cite_start]Questo diagramma definisce le interazioni tra l'**Utente** e la dashboard, includendo[cite: 369]:
* Visualizzazione della Dashboard.
* Programmazione delle luci.
* Gestione della sveglia e dell'allarme (con dipendenza `<<include>>` sulla funzione di inserimento codice).

### 2. Casi d'Uso del Dispositivo (IoTDevice)
[cite_start]Descrive le operazioni interne ai dispositivi IoT, come[cite: 369]:
* L'attivazione della suoneria per sveglia e allarme.
* Lo spegnimento automatico (relazione `<<extend>>`).
* L'esecuzione dei comandi di accensione/spegnimento luce.

---

## 🛠️ Tecnologie utilizzate
* **Linguaggi e Tool:** Specificati nella documentazione tecnica completa.
* **Paradigma:** Internet of Things (IoT).
* **Modellazione:** UML 2.0.
