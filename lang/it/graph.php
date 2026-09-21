<?php

declare(strict_types=1);

/*
 * The graph page. The node names themselves come from the enums' own
 * translation groups — ui_kit, layout, theme, framework — so only the page's
 * own chrome is here.
 */

return [
    'title' => 'Grafo',
    'intro' => 'Che cosa contiene l’applicazione e che cosa dipende da che cosa. I cinque layout sono la spina dorsale: tutto il resto vi si appende — i componenti che mettono davvero in pagina, i progetti che li dichiarano e la palette e il grado che la loro stessa scheda giudica migliori. Nessun arco è scritto a mano: sono letti dalle viste. Ogni nodo apre la pagina che lo mostra.',

    'kind' => [
        'component' => 'Componenti',
        'layout' => 'Layout',
        'project' => 'Progetti',
        'palette' => 'Palette',
        'degree' => 'Gradi',
    ],

    'exposes' => 'espone',
    'exposure' => 'Le linee tratteggiate vanno da un grado ai componenti che fa comparire. Sobrio non è soltanto l’assenza degli altri due: senza immagini il catalogo del salone ripiega su un elenco che nessun altro disegna.',

    'legend' => 'Nodi',
    'note' => 'Una palette senza archi non è vincolata ad alcun layout: resta ovunque la scelta del lettore.',
];
