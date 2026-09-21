<?php

declare(strict_types=1);

/*
 * The graph page. The node names themselves come from the enums' own
 * translation groups — ui_kit, layout, theme, framework — so only the page's
 * own chrome is here.
 */

return [
    'title' => 'Graphe',
    'intro' => 'Ce que l’application contient, et ce qui tient à quoi. Les cinq mises en page sont l’épine dorsale : tout le reste y pend — les composants qu’elles posent réellement sur la page, les projets qui les déclarent, et la palette et le degré que leur propre fiche juge les meilleurs. Aucun lien n’est écrit à la main : ils sont lus dans les vues. Chaque nœud ouvre la page qui le montre.',

    'kind' => [
        'component' => 'Composants',
        'layout' => 'Mises en page',
        'project' => 'Projets',
        'palette' => 'Palettes',
        'degree' => 'Degrés',
    ],

    'legend' => 'Nœuds',
    'note' => 'Une palette sans lien n’est épinglée à aucune mise en page : elle reste au choix du lecteur, partout.',
];
