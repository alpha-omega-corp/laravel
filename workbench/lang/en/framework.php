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

    // The record of the run that made the business views: what was asked, decided and seen.
    'record' => [
        'title' => 'Record of the run',
        'intro' => 'How the business views of this page came to be: what was asked, what was decided at each step and why, the pictures sent back while the work ran, and what each writer reported when it finished.',
        'asked' => 'What was asked',
        'steps' => 'The run, step by step',
        'see' => 'See it today',
        'picture' => 'Open the picture',
        'writers' => 'What each writer reported',
        'writer' => 'Its writer’s notes',
        'writers_intro' => 'One agent wrote each business: its demo content and its designs, in one pass with one check. These are its notes on the kit, as it left them. Some were mended afterwards; the step above says which.',
        'designs' => 'designs',
        'notes' => 'notes',
        'directions' => 'The directions',
        'specs' => 'Written from their CSS',
        'dressed' => 'The first four, dressed for the new prefabs',
        'open' => 'Known and not mended',
        'owed' => 'Still owed',
        'tab' => 'On the tab',
        'sheet' => 'Its contact sheet',
        'rules' => 'lines of rules',
    ],

    // The business views: every kind of business the skill describes, drawn from its own files.
    'businesses' => [
        'title' => 'Business types',
        'intro' => 'Every kind of business the kit describes, drawn from the skill’s own files the way a build reads them: its pages and prefabs from its business file, its looks from the directions it lists, its colours from the palettes those take, and a worked design settling one of each with the reason why. A design fixes every axis; override any one of them and the address says so.',
        'business' => 'Business',
        'design' => 'Design',
        'page' => 'Page',
        'home' => 'Home',
        'direction' => 'Direction',
        'layout' => 'Layout',
        'palette' => 'Palette',
        'scheme' => 'Light or dark',
        'system' => 'System',
        'light' => 'Light',
        'dark' => 'Dark',
        'designs' => 'designs',
        'pages' => 'pages',
        'views' => 'views',
        'kinds' => 'kinds of business',
        'sheet' => 'Contact sheet',
        'sheet_intro' => 'Every page of every design of a business, then its home page in each palette its directions recommend: the page itself, small, each one a link to the view with its axes.',
        'open' => 'The page alone',
        'why' => 'Why:',
        'pulls' => 'What a build pulls',
        'reasons' => 'The reasons, in the skill’s own words',
        'why_direction' => 'Why this direction, for this business',
        'why_prefabs' => 'Why this page holds each prefab',
        'how_drawn' => 'How the direction draws what is on the page',
        'behaviour' => 'What each component does once it is placed',
        'costs' => 'What the palette costs',
        'regions' => 'What each region holds',
        'arrangements' => 'Arrangements',
        'own' => 'The direction’s own',
        'files' => 'Read from the skill',
        'empty' => 'nothing',
        'by_design' => 'Every page of every design',
        'by_palette' => 'The home page in every recommended palette',
        'by_palette_intro' => 'What a roll may draw before a design settles it: each direction the business lists, in each palette that direction rates best or good.',
        'all' => 'All',
        'pick' => 'Every design of this business, drawn on the page chosen at the side. Pick one to inspect it: every page, every axis, and what a build pulls.',
        'variants' => 'All variants',
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
