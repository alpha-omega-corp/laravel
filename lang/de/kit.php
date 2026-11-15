<?php

/*
 * The strings the kit's components say themselves: navigation labels and the
 * controls they draw. Everything else on a page is the application's to word.
 */
return [
    'breadcrumb' => 'Brotkrumen',
    'pagination' => 'Seitennummerierung',
    'previous' => 'Zurück',
    'next' => 'Weiter',
    'close' => 'Schließen',
    'dismiss' => 'Schließen',

    // The prefabs: opening hours, a map, a catalogue.
    'closed' => 'Geschlossen',
    'map' => 'Karte von :address',
    'directions' => 'Route',
    'buy' => 'Kaufen',
    'view' => 'Ansehen',

    // The booking prefab: its form's labels, the link to an outside system, the thanks.
    'booking' => [
        'book' => 'Reservieren',
        'sent' => 'Danke: Ihre Anfrage ist angekommen. Sie ist bestätigt, sobald wir antworten.',
        'name' => 'Name',
        'contact' => 'E-Mail oder Telefon',
        'date' => 'Datum',
        'time' => 'Uhrzeit',
        'party' => 'Personen',
        'service' => 'Leistung',
        'choose' => 'Auswählen…',
        'message' => 'Nachricht',
        'send' => 'Anfrage senden',
    ],

    // The quote prefab: its form's labels and the thanks. What happens next is the owner's `note`.
    'quote' => [
        'sent' => 'Danke: Ihre Anfrage ist angekommen. Wir lesen jede und antworten mit einer Zahl.',
        'name' => 'Name',
        'contact' => 'E-Mail oder Telefon',
        'scope' => 'Art der Arbeit',
        'place' => 'Ort',
        'budget' => 'Budget',
        'deadline' => 'Gewünscht bis',
        'choose' => 'Auswählen…',
        'message' => 'Beschreiben Sie die Arbeit',
        'send' => 'Offerte anfragen',
    ],

    // What a plan's, a gift's and a course's button says when the owner gave it no words, and a course with no room left.
    'pricing' => ['choose' => 'Wählen'],
    'donate' => ['give' => 'Spenden'],
    'courses' => ['full' => 'Ausgebucht', 'enrol' => 'Anmelden'],

    // The footer's line for who made the site: "Erstellt von apdigital.ch".
    'credit' => 'Erstellt von',

    // The header's row of language codes, as a screen reader names the group.
    'language' => 'Sprache',

    // The header's menu button on a phone, as a screen reader says it.
    'menu' => 'Menü',

    // The footer's column headings: the site's pages, and how to reach the business.
    'footer' => [
        'pages' => 'Die Website',
        'contact' => 'Kontakt',
    ],

    // The theme menu: its button as a screen reader says it ("Theme: Dark"), and its three choices.
    'theme' => [
        'label' => 'Design',
        'light' => 'Hell',
        'dark' => 'Dunkel',
        'auto' => 'Automatisch',
    ],

    // A site layout's first link, shown only to the keyboard: past the header to the page.
    'skip' => 'Zum Inhalt springen',
];
