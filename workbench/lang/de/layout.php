<?php

declare(strict_types=1);

/*
 * The kit’s five layouts, named once for every tab that offers them: the
 * framework tab picks one per project and screen, the Layouts page shows them all.
 */

return [
    'console' => [
        'label' => 'Konsole',
        'summary' => 'Eine feste Seitenleiste, ein Seitenkopf und dichte Daten darunter — Verwaltung, Backoffice und CRUD.',
    ],
    'workspace' => [
        'label' => 'Arbeitsbereich',
        'summary' => 'Eine Listenspalte und daneben eine Detailspalte — Posteingang, Triage und Zusammenarbeit.',
    ],
    'stacked' => [
        'label' => 'Gestapelt',
        'summary' => 'Eine Navigationsleiste oben, ein Kopfband und Kartenraster — Dashboards und Produkt-Apps.',
    ],
    'marketing' => [
        'label' => 'Marketing',
        'summary' => 'Gar keine App-Hülle: eine Navigationsleiste, ein Stapel Abschnitte und eine Fusszeile — öffentliche Seiten und Landingpages.',
    ],
    'focus' => [
        'label' => 'Fokus',
        'summary' => 'Eine schmale Spalte, eine Fortschrittsanzeige und sonst nichts — Onboarding, Kasse und Assistenten.',
    ],
];
