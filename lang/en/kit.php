<?php

/*
 * The strings the kit's components say themselves: navigation labels and the
 * controls they draw. Everything else on a page is the application's to word.
 */
return [
    'breadcrumb' => 'Breadcrumb',
    'pagination' => 'Pagination',
    'previous' => 'Previous',
    'next' => 'Next',
    'close' => 'Close',
    'dismiss' => 'Dismiss',

    // The prefabs: opening hours, a map, a catalogue.
    'closed' => 'Closed',
    'map' => 'Map of :address',
    'directions' => 'Directions',
    'buy' => 'Buy',
    'view' => 'View',

    // The booking prefab: its form's labels, the link to an outside system, the thanks.
    'booking' => [
        'book' => 'Book',
        'sent' => 'Thank you: your request has arrived. It is confirmed once we answer.',
        'name' => 'Name',
        'contact' => 'Email or phone',
        'date' => 'Date',
        'time' => 'Time',
        'party' => 'People',
        'service' => 'Service',
        'choose' => 'Choose…',
        'message' => 'Message',
        'send' => 'Send the request',
    ],

    // The quote prefab: its form's labels and the thanks. What happens next is the owner's `note`.
    'quote' => [
        'sent' => 'Thank you: your request has arrived. We read every one and answer with a figure.',
        'name' => 'Name',
        'contact' => 'Email or phone',
        'scope' => 'Kind of work',
        'place' => 'Where',
        'budget' => 'Budget',
        'deadline' => 'Wanted by',
        'choose' => 'Choose…',
        'message' => 'Describe the work',
        'send' => 'Ask for a quote',
    ],

    // What a plan's, a gift's and a course's button says when the owner gave it no words, and a course with no room left.
    'pricing' => ['choose' => 'Choose'],
    'donate' => ['give' => 'Donate'],
    'courses' => ['full' => 'Full', 'enrol' => 'Sign up'],

    // The footer's line for who made the site: "Made by apdigital.ch".
    'credit' => 'Made by',

    // The header's row of language codes, as a screen reader names the group.
    'language' => 'Language',

    // The header's menu button on a phone, as a screen reader says it.
    'menu' => 'Menu',

    // The footer's column headings: the site's pages, and how to reach the business.
    'footer' => [
        'pages' => 'The site',
        'contact' => 'Get in touch',
    ],

    // The theme menu: its button as a screen reader says it ("Theme: Dark"), and its three choices.
    'theme' => [
        'label' => 'Theme',
        'light' => 'Light',
        'dark' => 'Dark',
        'auto' => 'Automatic',
    ],

    // A site layout's first link, shown only to the keyboard: past the header to the page.
    'skip' => 'Skip to content',
];
