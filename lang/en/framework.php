<?php

declare(strict_types=1);

return [
    'title' => 'Framework',
    'intro' => 'Nine independent projects, each a whole small-business or back-office site, walked through from its own navigation. No two are built the same way: a project declares its own sections, so the restaurant has a menu and opening hours, the farm has a shop, events and market days, and the salon has a catalogue of what it has cut. Every section carries the layout that fits the work it is — a counter is a console, a brochure page is not — with the palette and the degree following the layout. All three stay overridable from the rails, and an override is what puts them in the URL. Light and dark stay with the picker in the navigation bar.',

    'fitting' => 'Fitting',
    'projects' => 'Projects',
    'palettes' => 'Palettes',
    'layouts' => 'Layouts',
    'variations' => 'Degrees',

    'meta' => [
        'layout' => 'Layout',
    ],

    'project' => [
        'restaurant' => [
            'label' => 'Restaurant',
            'summary' => 'A twenty-eight cover place by the lake: home page, menu, opening hours and a booking form.',
        ],
        'haircut' => [
            'label' => 'Hair salon',
            'summary' => 'Four chairs and an appointment book: the salon, the price list, a catalogue of what it has cut, the people who cut and a booking screen.',
        ],
        'farm' => [
            'label' => 'Farm',
            'summary' => 'Vegetable baskets and two markets a week: the shop, what happens on the farm, the market days and an order form.',
        ],
        'butcher' => [
            'label' => 'Butcher',
            'summary' => 'Whole animals, cut on site: the counter, what was worked this week, the opening hours and an order form.',
        ],
        'cabinet' => [
            'label' => 'Law practice',
            'summary' => 'Six lawyers and four fields: the fields with their fees, the people, an appointment screen and a contact form.',
        ],
        'retail' => [
            'label' => 'Retail',
            'summary' => 'A neighbourhood fine-food shop run as a back office: stock, the catalogue, opening hours and account customers.',
        ],
        'health' => [
            'label' => 'Health',
            'summary' => 'A physiotherapy practice: the day’s diary, the price list, the four therapists, appointments and billing.',
        ],
        'education' => [
            'label' => 'Education',
            'summary' => 'A language school: the session, twelve courses with the places left in each, the timetable, the teachers and enrolment.',
        ],
        'logistics' => [
            'label' => 'Logistics',
            'summary' => 'A regional carrier: the day’s rounds, the services, the two departures and a pickup request.',
        ],
    ],

    'variation' => [
        'plain' => [
            'label' => 'Plain',
            'summary' => 'No images, no ornaments, tight spacing: what the section is for and nothing around it.',
        ],
        'standard' => [
            'label' => 'Standard',
            'summary' => 'The one image the section is actually about, the badges that carry meaning, an even rhythm.',
        ],
        'rich' => [
            'label' => 'Rich',
            'summary' => 'Every image the section can take, every ornament, and room to breathe between them.',
        ],
    ],
];
