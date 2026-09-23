<?php

declare(strict_types=1);

/*
 * The kit’s five layouts, named once for every tab that offers them: the
 * framework tab picks one per project and screen, the Layouts page shows them all.
 */

return [
    'console' => [
        'label' => 'Console',
        'summary' => 'A persistent sidebar, a page header and dense data under it — admin screens, back offices and CRUD.',
    ],
    'workspace' => [
        'label' => 'Workspace',
        'summary' => 'A list column and a detail column beside it — inboxes, triage and collaboration.',
    ],
    'stacked' => [
        'label' => 'Stacked',
        'summary' => 'A top navbar, a page header band and grids of cards — dashboards and product apps.',
    ],
    'marketing' => [
        'label' => 'Marketing',
        'summary' => 'No app shell at all: a navbar, a stack of sections and a footer — public sites and landing pages.',
    ],
    'focus' => [
        'label' => 'Focus',
        'summary' => 'One narrow column, a progress indicator and nothing else — onboarding, checkout and wizards.',
    ],
];
