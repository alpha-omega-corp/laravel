<?php

declare(strict_types=1);

return [
    'title' => 'Framework',
    'intro' => 'Neun unabhängige Projekte, jedes die ganze Website eines Kleinbetriebs oder Backoffice, durchlaufen über ihre eigene Navigation. Keines ist gebaut wie das andere: Jedes Projekt erklärt seine eigenen Abschnitte, und so hat das Restaurant eine Speisekarte und Öffnungszeiten, der Hof einen Laden, Anlässe und Markttage, der Salon einen Katalog dessen, was er geschnitten hat. Jeder Abschnitt trägt das Layout, das zu seiner Arbeit passt — eine Theke ist eine Konsole, eine Prospektseite nicht —, wobei Palette und Stufe dem Layout folgen. Alle drei bleiben über die Leisten überschreibbar, und erst eine solche Wahl steht in der URL. Hell und Dunkel bleiben beim Umschalter in der Navigationsleiste.',

    'fitting' => 'Passend',
    'projects' => 'Projekte',
    'palettes' => 'Paletten',
    'layouts' => 'Layouts',
    'variations' => 'Stufen',

    'meta' => [
        'layout' => 'Layout',
    ],

    'project' => [
        'restaurant' => [
            'label' => 'Restaurant',
            'summary' => 'Achtundzwanzig Gedecke am See: Startseite, Speisekarte, Öffnungszeiten und ein Reservationsformular.',
        ],
        'haircut' => [
            'label' => 'Coiffeursalon',
            'summary' => 'Vier Stühle und ein Terminbuch: der Salon, die Leistungen, ein Katalog dessen, was hier geschnitten wurde, das Team und ein Terminbildschirm.',
        ],
        'farm' => [
            'label' => 'Bauernhof',
            'summary' => 'Gemüsekörbe und zwei Märkte pro Woche: der Laden, was auf dem Hof geschieht, die Markttage und ein Bestellformular.',
        ],
        'butcher' => [
            'label' => 'Metzgerei',
            'summary' => 'Das ganze Tier, im Haus verarbeitet: die Theke, was diese Woche verarbeitet wurde, die Öffnungszeiten und ein Bestellformular.',
        ],
        'cabinet' => [
            'label' => 'Anwaltskanzlei',
            'summary' => 'Sechs Anwältinnen und Anwälte, vier Gebiete: die Gebiete mit ihren Honoraren, das Team, ein Terminbildschirm und ein Kontaktformular.',
        ],
        'retail' => [
            'label' => 'Detailhandel',
            'summary' => 'Ein Feinkostladen im Quartier, als Backoffice geführt: Lager, Katalog, Öffnungszeiten und Kundenkonten.',
        ],
        'health' => [
            'label' => 'Gesundheit',
            'summary' => 'Eine Physiotherapiepraxis: die Agenda des Tages, die Tarife, vier Therapeutinnen und Therapeuten, Termine und Abrechnung.',
        ],
        'education' => [
            'label' => 'Bildung',
            'summary' => 'Eine Sprachschule: die Session, zwölf Kurse mit ihren freien Plätzen, der Stundenplan, die Lehrpersonen und die Anmeldung.',
        ],
        'logistics' => [
            'label' => 'Logistik',
            'summary' => 'Ein regionaler Transporteur: die Touren des Tages, die Leistungen, die zwei Abfahrten und die Abholung.',
        ],
    ],

    'variation' => [
        'plain' => [
            'label' => 'Schlicht',
            'summary' => 'Keine Bilder, kein Zierrat, enger Rhythmus: wofür der Abschnitt da ist, und sonst nichts.',
        ],
        'standard' => [
            'label' => 'Standard',
            'summary' => 'Das eine Bild, um das es wirklich geht, die Marken, die etwas sagen, ein gleichmässiger Rhythmus.',
        ],
        'rich' => [
            'label' => 'Üppig',
            'summary' => 'Jedes Bild, das der Abschnitt tragen kann, jeder Zierrat, und Luft dazwischen.',
        ],
    ],
];
