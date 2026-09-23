<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'Kit UI',
        'intro' => 'Tutti gli elementi del kit condiviso, riportati dalla tavolozza predefinita di Tailwind ai token di questa applicazione. Un elemento per gruppo del kit, non per file: i sei file dei pulsanti sono un solo componente con variante. Cambia tavolozza o chiaro/scuro nella barra di navigazione e l’intera pagina lo segue.',
    ],

    'group' => [
        'elements' => 'Elementi',
        'feedback' => 'Riscontri',
        'forms' => 'Moduli',
        'data_display' => 'Dati',
        'lists' => 'Elenchi',
        'navigation' => 'Navigazione',
        'overlays' => 'Sovrapposizioni',
        'headings' => 'Intestazioni',
        'layout' => 'Layout',
    ],

    'element' => [
        'avatar' => [
            'label' => 'Avatar',
            'summary' => 'Una persona in cinque misure, tonda o quadra, con pallino di stato facoltativo. Senza immagine resta l’iniziale.',
        ],
        'badge' => [
            'label' => 'Etichetta',
            'summary' => 'Una piccola dicitura che porta un significato invece di una tinta: neutra, accento, evidenza o contorno.',
        ],
        'button' => [
            'label' => 'Pulsante',
            'summary' => 'Quattro riempimenti, cinque misure, con o senza icona. Ombra, angolo e pressione appartengono alla tavolozza.',
        ],
        'button_group' => [
            'label' => 'Gruppo di pulsanti',
            'summary' => 'Pulsanti fusi in una barra. L’angolo è della tavolozza, quindi lo portano solo le due estremità.',
        ],
        'dropdown' => [
            'label' => 'Menu a discesa',
            'summary' => 'Un menu su un pulsante, aperto dal browser tramite Tailwind Plus Elements e non da un nostro script.',
        ],
        'alert' => [
            'label' => 'Avviso',
            'summary' => 'Un messaggio sul posto, in uno di quattro toni, con azioni sotto se servono.',
        ],
        'empty_state' => [
            'label' => 'Stato vuoto',
            'summary' => 'Ciò che dice un elenco che non ha ancora nulla. Tratteggiato quando qualcosa potrebbe esservi posato.',
        ],
        'action_panel' => [
            'label' => 'Pannello d’azione',
            'summary' => 'Un pannello la cui unica ragione è il comando alla sua estremità.',
        ],
        'checkbox' => [
            'label' => 'Casella di spunta',
            'summary' => 'La casella nativa, dipinta da accent-color, con etichetta e suggerimento facoltativo.',
        ],
        'combobox' => [
            'label' => 'Casella combinata',
            'summary' => 'Un campo di testo con datalist: si digita per filtrare, o si apre l’elenco. Senza script, e degrada a campo semplice.',
        ],
        'form_layout' => [
            'label' => 'Layout di modulo',
            'summary' => 'Una o due colonne di campi in un pannello, con le azioni su un filetto in fondo.',
        ],
        'input' => [
            'label' => 'Campo',
            'summary' => 'Un campo con etichetta, suggerimento, errore e aggiunta in testa o in coda.',
        ],
        'radio_group' => [
            'label' => 'Gruppo di opzioni',
            'summary' => 'Una scelta fra più, come elenco di pallini o come pannello per opzione.',
        ],
        'select' => [
            'label' => 'Menu di selezione',
            'summary' => 'Un select nativo. La listbox del kit chiede script e popover per ciò che il browser già fa.',
        ],
        'sign_in' => [
            'label' => 'Modulo di accesso',
            'summary' => 'La colonna stretta di campi, in un pannello o direttamente sulla pagina.',
        ],
        'textarea' => [
            'label' => 'Area di testo',
            'summary' => 'Lo stesso corredo del campo, con spazio per un paragrafo.',
        ],
        'toggle' => [
            'label' => 'Interruttore',
            'summary' => 'Una casella che disegna una pista: parte con il modulo e mantiene la tastiera che il browser le dà.',
        ],
        'calendar' => [
            'label' => 'Calendario',
            'summary' => 'Una griglia di mese, calcolata e non ricopiata, con un giorno scelto e giorni segnati.',
        ],
        'description_list' => [
            'label' => 'Elenco di descrizioni',
            'summary' => 'Termini e valori in righe, a righe alterne se si vuole.',
        ],
        'stat' => [
            'label' => 'Dato',
            'summary' => 'Una cifra, la sua etichetta e la sua variazione. La cifra prende il passo display della tavolozza.',
        ],
        'feed' => [
            'label' => 'Flusso',
            'summary' => 'Una linea del tempo, con il filetto che passa dietro i segni invece che fra le righe.',
        ],
        'grid_list' => [
            'label' => 'Elenco a griglia',
            'summary' => 'Schede su due, tre o quattro colonne, ciascuna con un avatar.',
        ],
        'stacked_list' => [
            'label' => 'Elenco impilato',
            'summary' => 'Righe in un pannello, o un pannello per riga.',
        ],
        'table' => [
            'label' => 'Tabella',
            'summary' => 'Colonne e righe con fascia d’intestazione, titolo e azione, che scorre di lato se deve.',
        ],
        'breadcrumb' => [
            'label' => 'Briciole di pane',
            'summary' => 'La via del ritorno, l’ultima voce è la pagina stessa.',
        ],
        'command_palette' => [
            'label' => 'Tavolozza dei comandi',
            'summary' => 'Il campo di ricerca e i suoi risultati, mostrati aperti — un dialogo chiuso non mostra nulla.',
        ],
        'navbar' => [
            'label' => 'Barra di navigazione',
            'summary' => 'La barra da sola, per una pagina che non è il guscio applicativo.',
        ],
        'pagination' => [
            'label' => 'Paginazione',
            'summary' => 'Precedente e successivo, con i numeri in mezzo o solo un conteggio.',
        ],
        'progress' => [
            'label' => 'Avanzamento',
            'summary' => 'Una pista riempita, o lo stesso valore come fila di passi.',
        ],
        'side_nav' => [
            'label' => 'Navigazione laterale',
            'summary' => 'La colonna a sinistra di questa pagina. Due riempimenti, icone e contatori facoltativi, e trova da sé la riga corrente.',
        ],
        'tabs' => [
            'label' => 'Schede',
            'summary' => 'Una fila di sezioni, sottolineate o a pastiglie.',
        ],
        'vertical_nav' => [
            'label' => 'Navigazione verticale',
            'summary' => 'La navigazione laterale senza pannello, per una colonna che ne ha già uno.',
        ],
        'drawer' => [
            'label' => 'Cassetto',
            'summary' => 'Il pannello del dialogo fissato a un bordo, a tutta altezza. Dialogo nativo, qui mostrato sul posto.',
        ],
        'modal' => [
            'label' => 'Dialogo modale',
            'summary' => 'Un dialogo nativo: livello superiore, velo, tasto Esc e trappola del fuoco sono del browser.',
        ],
        'notification' => [
            'label' => 'Notifica',
            'summary' => 'Un pannello sollevato, per l’angolo in cui una regione live le impila.',
        ],
        'card_heading' => [
            'label' => 'Intestazione di scheda',
            'summary' => 'La fascia di un pannello, con il filetto che la separa dal corpo.',
        ],
        'page_heading' => [
            'label' => 'Intestazione di pagina',
            'summary' => 'Il titolo di una pagina, le sue briciole, i suoi dati e le sue azioni.',
        ],
        'section_heading' => [
            'label' => 'Intestazione di sezione',
            'summary' => 'Un filetto sotto un titolo, con un’azione o una fila di schede sopra.',
        ],
    ],

    'demo' => [
        'live' => 'In diretta',
        'small' => 'Piccola',
        'save' => 'Salva',
        'cancel' => 'Annulla',
        'duplicate' => 'Duplica',
        'discard' => 'Scarta',
        'disabled' => 'Disattivato',
        'add' => 'Aggiungi',
        'edit' => 'Modifica',
        'archive' => 'Archivia',
        'options' => 'Opzioni',
        'sort' => 'Ordina',
        'newest' => 'Più recenti',
        'oldest' => 'Meno recenti',
        'day' => 'Giorno',
        'week' => 'Settimana',
        'month' => 'Mese',
        'review' => 'Esamina',
        'dismiss' => 'Ignora',
        'confirm' => 'Conferma',
        'delete' => 'Elimina',
        'publish' => 'Pubblica',
        'alert' => [
            'info' => 'Un certificato si rinnova fra tre giorni',
            'success' => 'Il sito è online',
            'warning' => 'Due siti sono su un PHP vecchio',
            'danger' => 'L’ultimo rilascio è fallito',
            'body' => 'Per ora non ti è chiesto nulla; ecco come parlerebbe il pannello.',
        ],
        'empty' => [
            'title' => 'Ancora nessun cliente',
            'body' => 'Il primo che aggiungi comparirà qui con i suoi siti.',
        ],
        'panel' => [
            'title' => 'Trasferire questo progetto',
            'body' => 'Passerà a un altro account con i suoi siti e i suoi certificati.',
            'action' => 'Trasferisci',
        ],
        'check' => [
            'notify' => 'Scrivimi quando un rilascio fallisce',
            'digest' => 'Inviare un riepilogo settimanale',
            'hint' => 'Solo per i progetti che ti appartengono.',
        ],
        'combo' => [
            'label' => 'Paese',
            'placeholder' => 'Inizia a digitare…',
        ],
        'form' => [
            'title' => 'Profilo',
            'description' => 'Come appari al resto della squadra.',
            'first' => 'Nome',
            'last' => 'Cognome',
            'email' => 'Email',
            'about' => 'Note',
        ],
        'input' => [
            'label' => 'Nome del cliente',
            'placeholder' => 'Atelier Verd',
            'site' => 'Sito',
            'price' => 'Mensile',
            'hint' => 'Fatturato il primo del mese.',
            'error' => 'Questo nome è già preso.',
        ],
        'radio' => [
            'legend' => 'Piano',
            'solo' => 'Solo',
            'team' => 'Squadra',
            'solo_hint' => 'Una persona, cinque siti.',
            'team_hint' => 'Fino a dieci persone, siti illimitati.',
        ],
        'select' => [
            'label' => 'Lingua',
            'hint' => 'Usata per fatture ed email.',
        ],
        'signin' => [
            'title' => 'Accedi',
            'password' => 'Password',
            'remember' => 'Resta connesso',
        ],
        'textarea' => [
            'label' => 'Nota',
            'hint' => 'Visibile a chiunque abbia accesso al cliente.',
        ],
        'toggle' => [
            'public' => 'Sito pubblico',
            'beta' => 'Entrare nel canale beta',
            'hint' => 'Chiunque abbia il collegamento può arrivarci.',
        ],
        'dl' => [
            'title' => 'Account',
            'description' => 'I dati a fascicolo per questo cliente.',
            'name' => 'Nome',
            'role' => 'Ruolo',
            'role_value' => 'Proprietario',
            'email' => 'Email',
        ],
        'stat' => [
            'clients' => 'Clienti',
            'sites' => 'Siti',
            'uptime' => 'Disponibilità',
        ],
        'feed' => [
            'deployed' => 'Camille ha rilasciato atelier-verd.ch',
            'reviewed' => 'Dominique ha esaminato la fattura',
            'opened' => 'È stato aperto un rinnovo di certificato',
            'minutes' => '20 minuti fa',
            'hours' => '3 ore fa',
            'yesterday' => 'Ieri',
        ],
        'grid' => [
            'design' => 'Design',
            'support' => 'Assistenza',
        ],
        'list' => [
            'monthly' => 'al mese',
        ],
        'table' => [
            'title' => 'Fatture',
            'client' => 'Cliente',
            'site' => 'Sito',
            'plan' => 'Piano',
            'amount' => 'Importo',
            'export' => 'Esporta',
        ],
        'crumb' => [
            'home' => 'Inizio',
            'clients' => 'Clienti',
        ],
        'palette' => [
            'placeholder' => 'Cerca o esegui un comando…',
            'new_client' => 'Nuovo cliente',
            'new_site' => 'Nuovo sito',
            'settings' => 'Impostazioni',
        ],
        'progress' => [
            'migration' => 'Migrazione',
            'setup' => 'Configurazione',
        ],
        'nav' => [
            'workspace' => 'Spazio di lavoro',
        ],
        'tab' => [
            'overview' => 'Panoramica',
            'billing' => 'Fatturazione',
        ],
        'drawer' => [
            'title' => 'Dettagli del sito',
            'body' => 'Tutto sul sito, senza lasciare l’elenco dietro di esso.',
        ],
        'modal' => [
            'title' => 'Pubblicare questo sito?',
            'body' => 'Sarà raggiungibile al suo dominio entro un minuto.',
            'danger' => 'Eliminare questo cliente?',
            'danger_body' => 'Siti e certificati se ne vanno con lui. Non si torna indietro.',
        ],
        'notify' => [
            'saved' => 'Salvato',
            'expiring' => 'Certificato in scadenza',
            'body' => 'Non serve altro da te.',
        ],
        'heading' => [
            'card' => 'Siti',
            'card_description' => 'Tre siti su questo account',
            'card_body' => 'Il corpo del pannello sta sotto l’intestazione.',
            'page' => 'Atelier Verd',
            'updated' => 'Aggiornato 2 giorni fa',
            'section' => 'Squadra',
            'section_description' => 'Chi può raggiungere questo cliente e cosa gli è permesso.',
        ],
    ],

    'layouts' => [
        'title' => 'Layout',
        'intro' => 'Tutti i componenti di layout del kit — schede, contenitori, separatori, contenitori di elenco e oggetti multimediali — riportati dalla tavolozza predefinita di Tailwind ai token di questa applicazione. Cambia tema nella barra di navigazione e l’intera pagina lo segue.',

        'cards' => [
            'title' => 'Schede',
            'description' => 'Una superficie con un corpo e, se serve, un’intestazione, un piè di pagina o entrambi. L’angolo, il bordo e l’elevazione appartengono al tema: il markup non porta alcun arrotondamento proprio.',
        ],

        'containers' => [
            'title' => 'Contenitori',
            'description' => 'La cornice orizzontale di una pagina: quanto può crescere il contenuto e quanto margine conserva a ogni soglia.',
        ],

        'dividers' => [
            'title' => 'Separatori',
            'description' => 'Una linea attraverso la pagina, interrotta da un’etichetta, un titolo, un’icona o un comando.',
        ],

        'lists' => [
            'title' => 'Contenitori di elenco',
            'description' => 'Le stesse tre righe, tenute in sette modi: nude con linee di separazione, dentro una sola scheda o come schede separate.',
        ],

        'media' => [
            'title' => 'Oggetti multimediali',
            'description' => 'Una figura accanto al testo, allineata in alto, al centro o in basso, impilata su mobile oppure annidata di un livello.',
        ],

        'shells' => [
            'title' => 'Gusci di pagina',
            'description' => 'Non varianti di una stessa scatola: tre famiglie che dividono la pagina in modo diverso. Impilato mette la navigazione sopra il contenuto, la barra laterale la mette accanto, e il multicolonna aggiunge una seconda colonna di contenuto che non è affatto navigazione. Qui ognuno è schematico, come li spedisce il kit: reale è quale colonna prende la larghezza restante.',
            'stacked' => 'Impilato',
            'sidebar' => 'Barra laterale',
            'multi_column' => 'Multicolonna',
            'mobile' => 'Navigazione mobile',
            'mobile_description' => 'Il kit non spedisce alcun componente di navigazione mobile, perché ogni guscio porta il suo e sono soltanto tre. Un guscio impilato apre un pannello nel flusso sotto la barra e il contenuto scende. Un guscio a barra laterale o multicolonna tiene una barra fissa e apre la barra laterale stessa come dialogo fuori campo sopra un velo, con il pulsante di chiusura nella gola accanto al pannello.',
            'mobile_columns' => 'Un guscio multicolonna prende la stessa barra e lo stesso cassetto di un guscio a barra laterale. Quello che perde è la colonna secondaria: è dichiarata xl:block, quindi sotto quella soglia non c’è affatto e la pagina resta a una colonna. Nulla la impila sotto il contenuto principale — se quella colonna conta su un telefono, va rimessa a mano.',
        ],

        'label' => [
            'header' => 'Intestazione',
            'body' => 'Corpo',
            'footer' => 'Piè di pagina',
            'continue' => 'Continua',
            'projects' => 'Progetti',
            'action' => 'Aggiungi progetto',
            'item' => 'Riga',
            'media_title' => 'Un oggetto multimediale',
            'media_text' => 'Una figura da un lato, un titolo e un paragrafo dall’altro. La figura mantiene la sua dimensione; il testo prende il resto della riga.',
            'edit' => 'Modifica',
            'attach' => 'Allega un file',
            'comment' => 'Commenta',
            'delete' => 'Elimina',
            'nav' => 'Navigazione',
            'page_header' => 'Intestazione di pagina',
            'main' => 'Contenuto principale',
            'sidebar' => 'Barra laterale',
            'rail' => 'Binario',
            'aside' => 'Colonna secondaria',
            'secondary' => 'Colonna secondaria',
            'sticky' => 'Colonna fissa',
            'menu' => 'Pannello del menu',
            'drawer' => 'Cassetto laterale',
            'scrim' => 'Velo',
            'closed' => 'Chiuso',
            'open' => 'Aperto',
            'constrained' => 'Contenuto vincolato',
        ],
    ],
];
