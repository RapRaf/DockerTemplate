# Dockerized Nuxt.js 3 and Laravel Application

Questo progetto è una repository Docker preconfigurata per eseguire una applicazione web completa basata su Nuxt.js 3 e Laravel, con supporto per sviluppo e produzione. Utilizza Nginx come server proxy per gestire le richieste, PHP per l'elaborazione delle risorse Laravel, MySQL per il database di Laravel e Node.js per servire l'applicazione Nuxt.js 3 con SSR (Server Side Rendering).

## Scopo del Progetto

Il progetto ha l'obiettivo di semplificare la configurazione e l'uso di un ambiente di sviluppo e produzione per applicazioni web basate su Nuxt.js 3 e Laravel. I principali obiettivi del progetto includono:

- Fornire un'infrastruttura Docker semplice per eseguire l'applicazione in ambienti di sviluppo e produzione.
- Garantire la compatibilità tra Nuxt.js 3, Laravel, e i servizi necessari come Nginx, PHP e MySQL.
- Abilitare il supporto per Server Side Rendering (SSR) nell'applicazione Nuxt.js 3.
- Integrare Vue.js e Vuex per gestire lo stato globale dell'applicazione.
- Fornire un'app di esempio "counter" per dimostrare i concetti di base.

## Requisiti

Prima di iniziare, assicurati di soddisfare i seguenti requisiti:

- **Composer**: Questo progetto utilizza Laravel per il backend. Assicurati di avere Composer installato sul tuo sistema. Puoi scaricarlo da [getcomposer.org](https://getcomposer.org/).

- **Node.js e npm**: L'applicazione Nuxt.js 3 richiede Node.js e npm. Puoi scaricarli da [nodejs.org](https://nodejs.org/).

- **Docker e Docker Compose**: Per l'ambiente di sviluppo e produzione, è necessario avere Docker e Docker Compose installati sul tuo sistema. Puoi scaricarli da [docker.com](https://www.docker.com/) e [docker-compose.com](https://docs.docker.com/compose/).

## Installazione

Segue una guida passo-passo per l'installazione dell'ambiente di sviluppo:

1. Clona questa repository sul tuo computer.

    ```bash
    git clone https://github.com/RapRaf/DockerTemplate.git
    ```

2. Naviga nella directory del progetto e installa le dipendenze dei vari progetti.
    ```bash
    cd DockerTemplate/laravel

    composer install

    cp .env.example .env

    cd ../nuxt_app

    npm install
    ```
3. Torna nella root del progetto ed esegui i contenitori Docker con Docker Compose.
    ```bash
    cd ..

    docker-compose up -d
    ```

# Configurazioni dei Servizi

Le configurazioni per i servizi principali utilizzati in questo progetto sono mantenute in cartelle separate all'interno della root del progetto. Ecco dove puoi trovare le configurazioni per Nginx, MySQL e PHP:

## Configurazione Nginx

La configurazione di Nginx è mantenuta nella cartella `nginx`. Puoi personalizzare le impostazioni del server Nginx modificando il file `nginx/conf.d/app.conf`.

### Gestione delle Richieste

Questo progetto è configurato per gestire le richieste in due modi distinti:

1. #### /api => { Laravel }

    Tutte le richieste con il prefisso "/api" vengono instradate da Nginx all'applicazione Laravel. Questo è utile per gestire tutte le API del backend basate su Laravel. Ad esempio, una richiesta a `http://localhost/api/endpoint` verrà gestita dalle API di Laravel.

2. #### / => { Nuxt.js }

    Tutte le altre richieste, cioè quelle senza il prefisso "/api", vengono instardate da Nginx all'applicazione Nuxt.js. Questo significa che tutte le pagine e le route dell'applicazione Nuxt.js sono accessibili direttamente. Ad esempio, una richiesta a `http://localhost/` verrà instradata all'applicazione Nuxt.js.


Questa configurazione offre una separazione chiara tra le API del backend e l'applicazione frontend Nuxt.js, consentendo un'organizzazione pulita del codice e una gestione efficiente delle richieste.

Per configurare nuove API o aggiungere nuove route Nuxt.js, consulta la documentazione di Laravel e Nuxt.js per ulteriori dettagli.


## Configurazione MySQL

La configurazione di MySQL è mantenuta nella cartella `mysql`. Puoi personalizzare le impostazioni del database MySQL modificando il file `mysql/my.cnf`.

## Configurazione PHP

La configurazione di PHP è mantenuta nella cartella `php`. Puoi personalizzare le impostazioni PHP modificando il file `php/local.ini`.

Assicurati di effettuare le modifiche necessarie in queste configurazioni solo se hai conoscenze avanzate di Nginx, MySQL e PHP, in quanto modifiche errate potrebbero compromettere il funzionamento del tuo ambiente.

Se apporti modifiche a queste configurazioni, potresti dover riavviare i rispettivi servizi Docker per renderle effettive. Per farlo, puoi utilizzare il comando `docker-compose restart nome-servizio`, ad esempio `docker-compose restart nginx`.

Tieni presente che la configurazione di base fornita dovrebbe essere sufficiente per la maggior parte dei casi, e le personalizzazioni sono generalmente necessarie solo per requisiti specifici del progetto.

### Servizio Node.js

Il servizio Node.js è configurato per l'ambiente di sviluppo e di produzione.

Per avviare il servizio Node.js in modalità di **SVILUPPO**, vai al file docker-compose.yaml nella root directory e sul servizio node:

```yaml
node:
    build:
      context: ./nuxt_app
      target: dev
    ...
    command: npm run dev
    ...
```

Per avviare il servizio Node.js in modalità di **PRODUZIONE**, vai al file docker-compose.yaml nella root directory e sul servizio node:

```yaml
node:
    build:
      context: ./nuxt_app
      target: production
    ...
    command: npm run pm2
    ...
```

## Contributi e Segnalazione di Errori

Sono entusiasta di ricevere contributi dalla community e di migliorare continuamente questo progetto. Se desideri contribuire, hai idee per nuove funzionalità o desideri correggere bug, sei il benvenuto!

### Come Contribuire

Per contribuire al progetto, segui questi passaggi:

1. Fai una copia (fork) di questa repository sul tuo account GitHub.

2. Crea un branch per le tue modifiche:

3. Esegui le tue modifiche e assicurati di testarle.

4. Fai il commit delle modifiche.

5. Pusha il tuo branch sulla tua repository GitHub.

6. Crea una Pull Request (PR) sulla repository originale e spiega le modifiche apportate.

7. Le tue modifiche saranno esaminate e, se tutto è a posto, verranno fusionate nel progetto principale.

### Segnalazione di Errori

Se incontri problemi o errori in questo progetto, ti preghiamo di segnalarli aprendo una nuova issue nella sezione "Issues" di questa repository. Assicurati di includere tutti i dettagli pertinenti, come il sistema operativo, il browser (se applicabile) e una descrizione dettagliata del problema. Sarà un piacere cercare di risolvere i problemi insieme.

Grazie per il tuo interesse e il tuo contributo a questo progetto! La tua partecipazione rende questo progetto migliore per tutti.