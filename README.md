# CtrlHome - Laboratorio di Sviluppo di Applicazioni per IoT

![IoT](https://img.shields.io/badge/Project-IoT-blue)
![Academic Year](https://img.shields.io/badge/A.A.-2022--2023-green)
![University](https://img.shields.io/badge/University-Luigi%20Vanvitelli-orange)

## 👤 Autori
* **Alfredo Buonanno** (A13002237)
* **Elio Fava** (A13002167)

**Docente:** Prof. Antonio Guerriero  
**Corso:** Laboratorio di Sviluppo di Applicazioni per IoT  
**Università degli Studi della Campania "Luigi Vanvitelli"** | **Anno Accademico:** 2022-2023

---

## 📝 Idea di Progetto
**CtrlHome** è un’applicazione IoT dedicata al controllo domotico di un'abitazione. Il sistema permette all'utente di gestire vari componenti domestici tramite una **dashboard** interattiva. 

L'accesso alle funzionalità è garantito previa autenticazione con credenziali personali.

---

## 🚀 Funzionalità Principali
L'applicazione integra i seguenti servizi di controllo:

* **Illuminazione:** Gestione manuale di accensione/spegnimento e programmazione oraria automatica.
* **Sicurezza:** Attivazione/disattivazione allarme tramite codice con segnalazione acustica in caso di rilevamento.
* **Sveglia:** Configurazione e gestione di sveglie personalizzate.

---

## 📊 Modellazione UML
Il sistema è stato progettato utilizzando i diagrammi dei casi d'uso per mappare le interazioni tra utenti e dispositivi:

* **Dashboard Utente (CtrlHome):** Gestione delle interazioni dirette dell'utente (visualizzazione dashboard, luci, sveglia e allarme).
* **Logica Dispositivo (IoTDevice):** Definizione delle operazioni eseguite dai dispositivi, inclusi lo spegnimento automatico e l'attivazione della suoneria.

---

## 📂 Struttura del Repository
All'interno del repository sono presenti le seguenti cartelle:

* **`pagina web/`**: Contiene lo sviluppo del **Front-end** (HTML) e del **Back-end** (PHP) per la gestione della dashboard e del server.
* **`esameIoT/`**: Contiene il codice sorgente sviluppato in **C++** per la programmazione del modulo **ESP32 Wrover** e la gestione di sensori/attuatori.
* **`UML/`**: Contiene i file dei diagrammi dei casi d'uso prodotti durante la fase di analisi.
* **`Video/`**: Demo dimostrativa del funzionamento del progetto.

---

## 🛠️ Tecnologie utilizzate
* **Hardware:** Microcontrollore **ESP32 Wrover module**.
* **Linguaggi:** **PHP** (Back-end), **HTML** (Front-end), **C++** (Firmware ESP32).
* **Paradigma:** Internet of Things (IoT).
* **Modellazione:** UML (Unified Modeling Language).
