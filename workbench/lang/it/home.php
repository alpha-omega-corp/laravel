<?php

declare(strict_types=1);

/*
 * The home page says what the site holds, in four lines and four links. It is
 * the only page that describes the others, so each line summarises a tab
 * rather than restating its own intro word for word.
 */

return [
    'title' => 'Pagina iniziale',
    'intro' => 'Tre gallerie e un grafo. Il set mostra ogni elemento, i layout mostrano le strutture di pagina, il framework monta entrambi in siti interi e il grafo dice che cosa dipende da che cosa. Nulla di tutto ciò è un prodotto: questo è il modello da cui partono gli altri progetti.',

    'tab' => [
        'ui_kit' => 'Ogni elemento del set condiviso, uno per gruppo e non uno per file, riportato sui token di questa applicazione.',
        'layouts' => 'I componenti di struttura — schede, contenitori, separatori, contenitori di liste e oggetti multimediali — e le tre famiglie di guscio di pagina.',
        'framework' => 'Nove imprese immaginarie, ciascuna costruita con le proprie sezioni, da percorrere in cinque layout, sette palette e tre gradi.',
        'graph' => 'Tutto questo in un solo grafo: quale componente serve a quale layout e quale layout veste quale progetto. Ogni nodo apre la pagina che lo mostra.',
    ],

    'open' => 'Apri',
    'picker' => 'La palette e il chiaro o lo scuro si scelgono nella barra di navigazione, e ogni pagina segue.',
];
