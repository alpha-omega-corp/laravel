<?php

declare(strict_types=1);

return [
    'title' => 'Framework',
    'intro' => 'Nove progetti indipendenti, ciascuno l’intero sito di una piccola impresa o di un back-office, percorso dalla sua stessa navigazione. Nessuno è costruito come un altro: ogni progetto dichiara le proprie sezioni, così il ristorante ha un menù e degli orari, la fattoria una bottega, degli eventi e i giorni di mercato, il parrucchiere un catalogo di ciò che ha tagliato. Ogni sezione porta il layout adatto al lavoro che è — un banco è una console, una pagina di brochure no — con la palette e il grado che seguono il layout. Tutti e tre restano modificabili dalle barre laterali, e solo una scelta esplicita finisce nell’URL. Il chiaro e lo scuro restano al selettore nella barra di navigazione.',

    'fitting' => 'Adatta',
    'projects' => 'Progetti',
    'palettes' => 'Palette',
    'layouts' => 'Layout',
    'variations' => 'Gradi',

    'meta' => [
        'layout' => 'Layout',
    ],

    'prompt' => [
        'open' => 'Prompt per deployer',
        'title' => 'Questo design per deployer',
        'intro' => 'Ogni campo del modulo dell\'Hallucinator, come questa vista disegna il design: l\'attività, lo stile, il layout di ogni pagina. Copialo, poi incollalo in «From the framework» dell\'Hallucinator.',
        'copy' => 'Copia',
        'copied' => 'Copiato',
        'close' => 'Chiudi',
        'tab' => 'Prompt',
        'tab_intro' => 'Il prompt che ricrea questo sito in deployer: ogni campo del modulo dell\'Hallucinator, come questa vista disegna il design. Copialo, poi incollalo in «From the framework» dell\'Hallucinator.',
    ],
    // The record of the run that made the business views: what was asked, decided and seen.
    'record' => [
        'title' => 'Diario del lavoro',
        'intro' => 'Come sono nate le viste per tipo di attività di questa pagina: che cosa è stato chiesto, che cosa è stato deciso a ogni passo e perché, le immagini inviate durante il lavoro e ciò che ogni redattore ha riferito alla fine.',
        'asked' => 'Che cosa è stato chiesto',
        'steps' => 'Il lavoro, passo per passo',
        'see' => 'Da vedere oggi',
        'picture' => 'Aprire l’immagine',
        'writers' => 'Che cosa ha riferito ogni redattore',
        'writer' => 'Le note del redattore',
        'writers_intro' => 'Un agente ha scritto ogni attività: il suo contenuto dimostrativo e i suoi design, in un solo passaggio con una verifica. Queste sono le sue note sul kit, come le ha lasciate. Alcune sono state corrette in seguito; il passo qui sopra dice quali.',
        'designs' => 'design',
        'notes' => 'note',
        'directions' => 'Le direzioni',
        'specs' => 'Scritte dal loro CSS',
        'dressed' => 'Le prime quattro, vestite per i nuovi prefabbricati',
        'open' => 'Noto e non corretto',
        'owed' => 'Ancora dovuto',
        'tab' => 'Nella scheda',
        'sheet' => 'Il suo provino',
        'rules' => 'righe di regole',
    ],

    // The business views: every kind of business the skill describes, drawn from its own files.
    'businesses' => [
        'title' => 'Tipi di attività',
        'intro' => 'Ogni tipo di attività che il kit descrive, disegnato dai file dello skill come li legge una build: le pagine e i prefabbricati dal suo file, i suoi aspetti dalle direzioni che elenca, i colori dalle palette che queste accettano, e un design elaborato che ne fissa uno per ciascuno, con il perché. Un design fissa ogni asse; cambiatene uno e l’indirizzo lo dice.',
        'business' => 'Attività',
        'design' => 'Design',
        'page' => 'Pagina',
        'home' => 'Home',
        'direction' => 'Direzione',
        'layout' => 'Layout',
        'palette' => 'Palette',
        'scheme' => 'Chiaro o scuro',
        'system' => 'Sistema',
        'light' => 'Chiaro',
        'dark' => 'Scuro',
        'inputs' => 'Campi',
        'inputs_default' => 'Predefiniti',
        'inputs_floating' => 'Fluttuanti',
        'inputs_icon' => 'Con icona',
        'designs' => 'design',
        'pages' => 'pagine',
        'views' => 'viste',
        'kinds' => 'tipi di attività',
        'sheet' => 'Provino',
        'sheet_intro' => 'Ogni pagina di ogni design di un’attività, poi la sua home in ogni palette che le sue direzioni raccomandano: la pagina stessa, in piccolo, ognuna un link alla vista con i suoi assi.',
        'open' => 'La pagina da sola',
        'why' => 'Perché:',
        'pulls' => 'Cosa ne trae una build',
        'reasons' => 'Le ragioni, nelle parole dello skill',
        'why_direction' => 'Perché questa direzione, per questa attività',
        'why_prefabs' => 'Perché questa pagina porta ogni prefabbricato',
        'how_drawn' => 'Come la direzione disegna ciò che è sulla pagina',
        'behaviour' => 'Che cosa fa ogni componente una volta collocato',
        'costs' => 'Che cosa costa la palette',
        'regions' => 'Cosa contiene ogni regione',
        'arrangements' => 'Disposizioni',
        'own' => 'Quello della direzione',
        'files' => 'Letto dallo skill',
        'files_tab' => 'File',
        'regions_tab' => 'Regioni',
        'empty' => 'niente',
        'by_design' => 'Ogni pagina di ogni design',
        'by_palette' => 'La home in ogni palette raccomandata',
        'by_palette_intro' => 'Ciò che un tiro può disegnare prima che un design lo fissi: ogni direzione che l’attività elenca, in ogni palette che quella direzione giudica la migliore o buona.',
        'all' => 'Tutti',
        'pick' => 'Ogni design di questa attività, disegnato sulla pagina scelta a lato. Sceglietene uno per esaminarlo: ogni pagina, ogni asse e ciò che una build ne ricava.',
        'variants' => 'Tutte le varianti',
    ],

    'project' => [
        'restaurant' => [
            'label' => 'Ristorante',
            'summary' => 'Ventotto coperti in riva al lago: pagina iniziale, menù, orari e modulo di prenotazione.',
        ],
        'haircut' => [
            'label' => 'Parrucchiere',
            'summary' => 'Quattro poltrone e un’agenda: il salone, le prestazioni, un catalogo di ciò che è uscito da qui, la squadra e una schermata di appuntamento.',
        ],
        'farm' => [
            'label' => 'Fattoria',
            'summary' => 'Ceste di verdura e due mercati alla settimana: la bottega, ciò che accade in fattoria, i giorni di mercato e un modulo d’ordine.',
        ],
        'butcher' => [
            'label' => 'Macelleria',
            'summary' => 'La bestia intera, lavorata sul posto: il banco, ciò che è stato lavorato questa settimana, gli orari e un modulo d’ordine.',
        ],
        'cabinet' => [
            'label' => 'Studio legale',
            'summary' => 'Sei avvocati e quattro materie: le materie con i loro onorari, la squadra, una schermata di appuntamento e un modulo di contatto.',
        ],
        'retail' => [
            'label' => 'Commercio',
            'summary' => 'Una gastronomia di quartiere gestita come un back-office: scorte, catalogo, orari e conti clienti.',
        ],
        'health' => [
            'label' => 'Sanità',
            'summary' => 'Uno studio di fisioterapia: l’agenda del giorno, i tariffari, i quattro terapisti, gli appuntamenti e la fatturazione.',
        ],
        'education' => [
            'label' => 'Formazione',
            'summary' => 'Una scuola di lingue: la sessione, dodici corsi con i posti rimasti, gli orari, gli insegnanti e l’iscrizione.',
        ],
        'logistics' => [
            'label' => 'Logistica',
            'summary' => 'Un trasportatore regionale: i giri del giorno, le prestazioni, le due partenze e la richiesta di ritiro.',
        ],
    ],

    'variation' => [
        'plain' => [
            'label' => 'Sobrio',
            'summary' => 'Nessuna immagine, nessun ornamento, ritmo stretto: a cosa serve la sezione, e nient’altro.',
        ],
        'standard' => [
            'label' => 'Standard',
            'summary' => 'L’unica immagine di cui la sezione parla davvero, le pastiglie che dicono qualcosa, un ritmo regolare.',
        ],
        'rich' => [
            'label' => 'Ricco',
            'summary' => 'Tutte le immagini che la sezione può portare, tutti gli ornamenti, e aria fra loro.',
        ],
    ],
];
