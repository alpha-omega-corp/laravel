<?php

declare(strict_types=1);

/*
 * The home page says what the site holds, in four lines and four links. It is
 * the only page that describes the others, so each line summarises a tab
 * rather than restating its own intro word for word.
 */

return [
    'title' => 'Home',
    'intro' => 'Three galleries and a graph. The kit shows every element, the layouts show the page structures, the framework assembles both into whole sites, and the graph says what hangs on what. None of it is a product: this is the template the other projects start from.',

    'tab' => [
        'ui_kit' => 'Every element of the shared kit, one per group rather than one per file, retraced onto this application’s tokens.',
        'layouts' => 'The structural components — cards, containers, dividers, list containers and media objects — and the three families of page shell.',
        'framework' => 'Nine fictional businesses, each built from its own sections, walked through five layouts, seven palettes and three degrees.',
        'graph' => 'All of it as one graph: which component serves which layout, and which layout dresses which project. Every node opens the page that shows it.',
    ],

    'open' => 'Open',
    'picker' => 'The palette, and light or dark, are chosen in the navigation bar, and every page follows.',
];
