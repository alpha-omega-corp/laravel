<?php

declare(strict_types=1);

/*
 * The graph page. The node names themselves come from the enums' own
 * translation groups — ui_kit, layout, theme, framework — so only the page's
 * own chrome is here.
 */

return [
    'title' => 'Graph',
    'intro' => 'What the application holds, and what hangs on what. The five layouts are the spine: everything else hangs off them — the components they actually put on the page, the projects that declare them, and the palette and degree their own spec rates best. No edge is written by hand; they are read out of the views. Every node opens the page that shows it.',

    'kind' => [
        'component' => 'Components',
        'layout' => 'Layouts',
        'project' => 'Projects',
        'palette' => 'Palettes',
        'degree' => 'Degrees',
    ],

    'exposes' => 'exposes',
    'exposure' => 'The dashed lines run from a degree to the components it brings out. Plain is not merely the absence of the other two: with no pictures, the salon’s catalogue falls back to a list nothing else draws.',

    'legend' => 'Nodes',
    'note' => 'A palette with no edge is pinned to no layout: it stays the reader’s to choose, everywhere.',
];
