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

    'prompt' => [
        'open' => 'Prompt für deployer',
        'title' => 'Dieses Design für deployer',
        'intro' => 'Jedes Feld des Hallucinator-Formulars, so wie diese Ansicht das Design zeichnet: das Geschäft, der Stil, das Layout jeder Seite. Kopieren und im Hallucinator unter „From the framework“ einfügen.',
        'copy' => 'Kopieren',
        'copied' => 'Kopiert',
        'close' => 'Schließen',
        'tab' => 'Prompt',
        'tab_intro' => 'Der Prompt, der diese Site in deployer neu erstellt: jedes Feld des Hallucinator-Formulars, so wie diese Ansicht das Design zeichnet. Kopieren und im Hallucinator unter „From the framework“ einfügen.',
    ],
    // The record of the run that made the business views: what was asked, decided and seen.
    'record' => [
        'title' => 'Protokoll des Laufs',
        'intro' => 'Wie die Geschäftsansichten dieser Seite entstanden sind: was verlangt wurde, was bei jedem Schritt entschieden wurde und warum, die Bilder, die während der Arbeit gesendet wurden, und was jeder Schreiber am Ende berichtet hat.',
        'asked' => 'Was verlangt wurde',
        'steps' => 'Der Lauf, Schritt für Schritt',
        'see' => 'Heute ansehen',
        'picture' => 'Bild öffnen',
        'writers' => 'Was jeder Schreiber berichtet hat',
        'writer' => 'Notizen des Schreibers',
        'writers_intro' => 'Ein Agent hat jedes Geschäft geschrieben: seinen Demo-Inhalt und seine Designs, in einem Durchgang mit einer Prüfung. Dies sind seine Notizen zum Kit, so wie er sie hinterlassen hat. Einige wurden danach behoben; der Schritt oben sagt, welche.',
        'designs' => 'Designs',
        'notes' => 'Notizen',
        'directions' => 'Die Richtungen',
        'specs' => 'Aus ihrem CSS geschrieben',
        'dressed' => 'Die ersten vier, für die neuen Fertigteile eingekleidet',
        'open' => 'Bekannt und nicht behoben',
        'owed' => 'Noch offen',
        'tab' => 'Im Tab',
        'sheet' => 'Sein Kontaktbogen',
        'rules' => 'Zeilen Regeln',
    ],

    // The business views: every kind of business the skill describes, drawn from its own files.
    'businesses' => [
        'title' => 'Geschäftsarten',
        'intro' => 'Jede Geschäftsart, die das Kit beschreibt, gezeichnet aus den Dateien des Skills, so wie ein Build sie liest: Seiten und Fertigteile aus ihrer Datei, ihr Aussehen aus den aufgeführten Richtungen, ihre Farben aus den Paletten, die diese annehmen, und ein ausgearbeitetes Design, das je eines davon festlegt und sagt, warum. Ein Design legt jede Achse fest; ändern Sie eine, und die Adresse sagt es.',
        'business' => 'Geschäft',
        'design' => 'Design',
        'page' => 'Seite',
        'home' => 'Startseite',
        'direction' => 'Richtung',
        'layout' => 'Layout',
        'palette' => 'Palette',
        'scheme' => 'Hell oder dunkel',
        'system' => 'System',
        'light' => 'Hell',
        'dark' => 'Dunkel',
        'inputs' => 'Eingabefelder',
        'inputs_default' => 'Standard',
        'inputs_floating' => 'Schwebend',
        'inputs_icon' => 'Mit Symbol',
        'designs' => 'Designs',
        'pages' => 'Seiten',
        'views' => 'Ansichten',
        'kinds' => 'Geschäftsarten',
        'sheet' => 'Kontaktbogen',
        'sheet_intro' => 'Jede Seite jedes Designs eines Geschäfts, dann seine Startseite in jeder Palette, die seine Richtungen empfehlen: die Seite selbst, klein, jede ein Link zur Ansicht mit ihren Achsen.',
        'open' => 'Die Seite allein',
        'why' => 'Warum:',
        'pulls' => 'Was ein Build daraus zieht',
        'reasons' => 'Die Gründe, in den Worten des Skills',
        'why_direction' => 'Warum diese Richtung für dieses Geschäft',
        'why_prefabs' => 'Warum diese Seite jedes Fertigteil trägt',
        'how_drawn' => 'Wie die Richtung zeichnet, was auf der Seite steht',
        'behaviour' => 'Was jede Komponente tut, sobald sie platziert ist',
        'costs' => 'Was die Palette kostet',
        'regions' => 'Was jede Region enthält',
        'arrangements' => 'Anordnungen',
        'own' => 'Wie die Richtung',
        'files' => 'Aus dem Skill gelesen',
        'files_tab' => 'Dateien',
        'regions_tab' => 'Regionen',
        'empty' => 'nichts',
        'by_design' => 'Jede Seite jedes Designs',
        'by_palette' => 'Die Startseite in jeder empfohlenen Palette',
        'by_palette_intro' => 'Was ein Wurf zeichnen kann, bevor ein Design es festlegt: jede Richtung, die das Geschäft aufführt, in jeder Palette, die diese Richtung als beste oder gut einstuft.',
        'all' => 'Alle',
        'pick' => 'Jedes Design dieses Betriebs, auf der seitlich gewählten Seite gezeichnet. Wählen Sie eines, um es zu prüfen: jede Seite, jede Achse und was ein Build übernimmt.',
        'variants' => 'Alle Varianten',
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
