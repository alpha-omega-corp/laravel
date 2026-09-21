<?php

declare(strict_types=1);

/*
 * The graph page. The node names themselves come from the enums' own
 * translation groups — ui_kit, layout, theme, framework — so only the page's
 * own chrome is here.
 */

return [
    'title' => 'Graph',
    'intro' => 'Was die Anwendung enthält und was woran hängt. Die fünf Layouts sind das Rückgrat: alles andere hängt daran — die Komponenten, die sie tatsächlich auf die Seite setzen, die Projekte, die sie erklären, und die Palette und die Stufe, die ihre eigene Spezifikation am besten bewertet. Keine Kante ist von Hand geschrieben; sie werden aus den Views gelesen. Jeder Knoten öffnet die Seite, die ihn zeigt.',

    'kind' => [
        'component' => 'Komponenten',
        'layout' => 'Layouts',
        'project' => 'Projekte',
        'palette' => 'Paletten',
        'degree' => 'Stufen',
    ],

    'legend' => 'Knoten',
    'note' => 'Eine Palette ohne Kante ist an kein Layout gebunden: sie bleibt überall die Wahl des Lesers.',
];
