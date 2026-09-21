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
