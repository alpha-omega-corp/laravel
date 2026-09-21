<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'UI kit',
        'intro' => 'Every element of the shared kit, re-themed from Tailwind’s default palette to this application’s tokens. One element per group in the kit, not one per file: the six button files are one component with a variant. Switch the palette or the light and dark in the navigation bar and the whole page follows.',
    ],

    'group' => [
        'elements' => 'Elements',
        'feedback' => 'Feedback',
        'forms' => 'Forms',
        'data_display' => 'Data display',
        'lists' => 'Lists',
        'navigation' => 'Navigation',
        'overlays' => 'Overlays',
        'headings' => 'Headings',
        'layout' => 'Layout',
    ],

    'element' => [
        'avatar' => [
            'label' => 'Avatar',
            'summary' => 'A person at five sizes, round or square, with an optional status dot. Falls back to an initial when there is no picture.',
        ],
        'badge' => [
            'label' => 'Badge',
            'summary' => 'A small label with a meaning rather than a hue: neutral, accent, highlight or outline.',
        ],
        'button' => [
            'label' => 'Button',
            'summary' => 'Four fills, five sizes, with or without an icon. Every shadow, corner and press belongs to the palette.',
        ],
        'button_group' => [
            'label' => 'Button group',
            'summary' => 'Buttons fused into one bar. The palette owns the corner, so only the two ends carry it.',
        ],
        'dropdown' => [
            'label' => 'Dropdown',
            'summary' => 'A menu on a button, opened by the browser through Tailwind Plus Elements rather than by a script of ours.',
        ],
        'alert' => [
            'label' => 'Alert',
            'summary' => 'A message in place, in one of four tones, optionally with actions under it.',
        ],
        'empty_state' => [
            'label' => 'Empty state',
            'summary' => 'What a list says when it has nothing yet. Dashed when something could be dropped there instead.',
        ],
        'action_panel' => [
            'label' => 'Action panel',
            'summary' => 'A panel whose whole purpose is the one control at the end of it.',
        ],
        'checkbox' => [
            'label' => 'Checkbox',
            'summary' => 'The native box, painted by accent-color, with a label and an optional hint.',
        ],
        'combobox' => [
            'label' => 'Combobox',
            'summary' => 'A text field with a datalist: type to filter, or open the list. No script, and it degrades to a plain field.',
        ],
        'form_layout' => [
            'label' => 'Form layout',
            'summary' => 'One or two columns of fields in a panel, with the actions on a rule at the foot.',
        ],
        'input' => [
            'label' => 'Input',
            'summary' => 'A labelled field with an optional hint, error, and a leading or trailing add-on.',
        ],
        'radio_group' => [
            'label' => 'Radio group',
            'summary' => 'One choice from several, as a list of dots or as a panel per option.',
        ],
        'select' => [
            'label' => 'Select',
            'summary' => 'A native select. The kit’s listbox needs a script and a popover to do what the browser already does.',
        ],
        'sign_in' => [
            'label' => 'Sign-in form',
            'summary' => 'The narrow column of fields, in a panel or straight on the page.',
        ],
        'textarea' => [
            'label' => 'Textarea',
            'summary' => 'The same field furniture as the input, with room for a paragraph.',
        ],
        'toggle' => [
            'label' => 'Toggle',
            'summary' => 'A checkbox drawing a track, so it submits with a form and keeps the keyboard behaviour the browser gives it.',
        ],
        'calendar' => [
            'label' => 'Calendar',
            'summary' => 'A month grid, computed rather than written out, with a selected day and marked ones.',
        ],
        'description_list' => [
            'label' => 'Description list',
            'summary' => 'Terms and values in rows, optionally striped.',
        ],
        'stat' => [
            'label' => 'Stat',
            'summary' => 'A figure, its label and its change. The figure takes the palette’s own display step.',
        ],
        'feed' => [
            'label' => 'Feed',
            'summary' => 'A timeline, with the rule running behind the markers rather than between the rows.',
        ],
        'grid_list' => [
            'label' => 'Grid list',
            'summary' => 'Cards in two, three or four columns, each with an avatar.',
        ],
        'stacked_list' => [
            'label' => 'Stacked list',
            'summary' => 'Rows in one panel, or one panel per row.',
        ],
        'table' => [
            'label' => 'Table',
            'summary' => 'Columns and rows with a header band, a title and an action, scrolling sideways when it must.',
        ],
        'breadcrumb' => [
            'label' => 'Breadcrumb',
            'summary' => 'The trail back up, the last entry being the page itself.',
        ],
        'command_palette' => [
            'label' => 'Command palette',
            'summary' => 'The search field and its results, shown open — a dialog on a documentation page is a picture of nothing.',
        ],
        'navbar' => [
            'label' => 'Navbar',
            'summary' => 'The bar on its own, for a page that is not the application shell.',
        ],
        'pagination' => [
            'previous' => 'Previous',
            'next' => 'Next',
            'label' => 'Pagination',
            'summary' => 'Previous and next, with the numbers between them or just a count.',
        ],
        'progress' => [
            'label' => 'Progress',
            'summary' => 'One filled track, or the same value as a row of steps.',
        ],
        'side_nav' => [
            'label' => 'Side navigation',
            'summary' => 'The column at the left of this page. Two fills, optional icons and counts, and it finds the current row itself.',
        ],
        'tabs' => [
            'label' => 'Tabs',
            'summary' => 'A row of sections, underlined or as pills.',
        ],
        'vertical_nav' => [
            'label' => 'Vertical navigation',
            'summary' => 'The side navigation without the panel, for a column that already has a surface.',
        ],
        'drawer' => [
            'close' => 'Close',
            'label' => 'Drawer',
            'summary' => 'The modal’s panel pinned to one edge, full height. A native dialog, shown in place here.',
        ],
        'modal' => [
            'label' => 'Modal',
            'summary' => 'A native dialog: the top layer, the backdrop, the escape key and the focus trap are the browser’s.',
        ],
        'notification' => [
            'dismiss' => 'Dismiss',
            'label' => 'Notification',
            'summary' => 'A raised panel for the corner a live region stacks them in.',
        ],
        'card_heading' => [
            'label' => 'Card heading',
            'summary' => 'The header band of a panel, with the rule that divides it from the body.',
        ],
        'page_heading' => [
            'label' => 'Page heading',
            'summary' => 'The title of a page, its breadcrumb, its meta and its actions.',
        ],
        'section_heading' => [
            'label' => 'Section heading',
            'summary' => 'A rule under a title, with an action or a row of tabs on it.',
        ],
    ],

    'demo' => [
        'live' => 'Live',
        'small' => 'Small',
        'save' => 'Save',
        'cancel' => 'Cancel',
        'duplicate' => 'Duplicate',
        'discard' => 'Discard',
        'disabled' => 'Disabled',
        'add' => 'Add',
        'edit' => 'Edit',
        'archive' => 'Archive',
        'options' => 'Options',
        'sort' => 'Sort',
        'newest' => 'Newest first',
        'oldest' => 'Oldest first',
        'day' => 'Day',
        'week' => 'Week',
        'month' => 'Month',
        'review' => 'Review',
        'dismiss' => 'Dismiss',
        'confirm' => 'Confirm',
        'delete' => 'Delete',
        'publish' => 'Publish',
        'alert' => [
            'info' => 'A certificate renews in three days',
            'success' => 'The site is live',
            'warning' => 'Two sites are on an old PHP',
            'danger' => 'The last rollout failed',
            'body' => 'Nothing is required of you right now; this is what the panel would say.',
        ],
        'empty' => [
            'title' => 'No clients yet',
            'body' => 'The first one you add will show up here with its sites.',
        ],
        'panel' => [
            'title' => 'Transfer this project',
            'body' => 'It will move to another account with its sites and its certificates.',
            'action' => 'Transfer',
        ],
        'check' => [
            'notify' => 'Email me when a deploy fails',
            'digest' => 'Send a weekly digest',
            'hint' => 'Only for the projects you own.',
        ],
        'combo' => [
            'label' => 'Country',
            'placeholder' => 'Start typing…',
        ],
        'form' => [
            'title' => 'Profile',
            'description' => 'How you appear to the rest of the team.',
            'first' => 'First name',
            'last' => 'Last name',
            'email' => 'Email',
            'about' => 'About',
        ],
        'input' => [
            'label' => 'Client name',
            'placeholder' => 'Atelier Verd',
            'site' => 'Site',
            'price' => 'Monthly',
            'hint' => 'Invoiced on the first of the month.',
            'error' => 'This name is already taken.',
        ],
        'radio' => [
            'legend' => 'Plan',
            'solo' => 'Solo',
            'team' => 'Team',
            'solo_hint' => 'One person, five sites.',
            'team_hint' => 'Up to ten people, unlimited sites.',
        ],
        'select' => [
            'label' => 'Language',
            'hint' => 'Used for invoices and email.',
        ],
        'signin' => [
            'title' => 'Sign in',
            'password' => 'Password',
            'remember' => 'Keep me signed in',
        ],
        'textarea' => [
            'label' => 'Note',
            'hint' => 'Visible to anyone with access to the client.',
        ],
        'toggle' => [
            'public' => 'Public site',
            'beta' => 'Join the beta channel',
            'hint' => 'Anyone with the link can reach it.',
        ],
        'dl' => [
            'title' => 'Account',
            'description' => 'The details on file for this client.',
            'name' => 'Name',
            'role' => 'Role',
            'role_value' => 'Owner',
            'email' => 'Email',
        ],
        'stat' => [
            'clients' => 'Clients',
            'sites' => 'Sites',
            'uptime' => 'Uptime',
        ],
        'feed' => [
            'deployed' => 'Camille deployed atelier-verd.ch',
            'reviewed' => 'Dominique reviewed the invoice',
            'opened' => 'A certificate renewal was opened',
            'minutes' => '20 minutes ago',
            'hours' => '3 hours ago',
            'yesterday' => 'Yesterday',
        ],
        'grid' => [
            'design' => 'Design',
            'support' => 'Support',
        ],
        'list' => [
            'monthly' => 'per month',
        ],
        'table' => [
            'title' => 'Invoices',
            'client' => 'Client',
            'site' => 'Site',
            'plan' => 'Plan',
            'amount' => 'Amount',
            'export' => 'Export',
        ],
        'crumb' => [
            'home' => 'Home',
            'clients' => 'Clients',
        ],
        'palette' => [
            'placeholder' => 'Search or run a command…',
            'new_client' => 'New client',
            'new_site' => 'New site',
            'settings' => 'Settings',
        ],
        'progress' => [
            'migration' => 'Migration',
            'setup' => 'Setup',
        ],
        'nav' => [
            'workspace' => 'Workspace',
        ],
        'tab' => [
            'overview' => 'Overview',
            'billing' => 'Billing',
        ],
        'drawer' => [
            'title' => 'Site details',
            'body' => 'Everything about the site, without leaving the list behind it.',
        ],
        'modal' => [
            'title' => 'Publish this site?',
            'body' => 'It will be reachable at its domain within a minute.',
            'danger' => 'Delete this client?',
            'danger_body' => 'Their sites and certificates go with them. This cannot be undone.',
        ],
        'notify' => [
            'saved' => 'Saved',
            'expiring' => 'Certificate expiring',
            'body' => 'Nothing else is needed from you.',
        ],
        'heading' => [
            'card' => 'Sites',
            'card_description' => 'Three sites on this account',
            'card_body' => 'The body of the panel goes under the heading.',
            'page' => 'Atelier Verd',
            'updated' => 'Updated 2 days ago',
            'section' => 'Team',
            'section_description' => 'Who can reach this client and what they may do.',
        ],
    ],

    'layouts' => [
        'title' => 'Layouts',
        'intro' => 'Every layout component the kit ships — cards, containers, dividers, list containers and media objects — re-themed from Tailwind’s default palette to this application’s tokens. Switch the theme in the navigation bar and the whole page follows.',

        'cards' => [
            'title' => 'Cards',
            'description' => 'A surface with a body, and optionally a header, a footer or both. The corner, the edge and the elevation belong to the theme, so the markup carries no rounding of its own.',
        ],

        'containers' => [
            'title' => 'Containers',
            'description' => 'The horizontal frame of a page: how wide the content may grow, and how much padding it keeps at each breakpoint.',
        ],

        'dividers' => [
            'title' => 'Dividers',
            'description' => 'A rule across the page, interrupted by a label, a title, an icon or a control.',
        ],

        'lists' => [
            'title' => 'List containers',
            'description' => 'The same three rows, held seven ways: bare with dividers, inside one card, or as separate cards.',
        ],

        'media' => [
            'title' => 'Media objects',
            'description' => 'A figure beside text, aligned to the top, the centre or the bottom, stacked on mobile, or nested one level deep.',
        ],

        'shells' => [
            'title' => 'Page shells',
            'description' => 'Not variants of one box: three families that divide the page differently. Stacked puts the navigation above the content, sidebar puts it beside it, and multi-column adds a second content column that is not navigation at all. Each is schematic here, the way the kit ships them — what is real is which column takes the remaining width.',
            'stacked' => 'Stacked',
            'sidebar' => 'Sidebar',
            'multi_column' => 'Multi-column',
            'mobile' => 'Mobile navigation',
            'mobile_description' => 'The kit ships no mobile navigation component, because every shell carries its own and there are only three. A stacked shell expands a disclosure panel in flow below the bar, so the content is pushed down. A sidebar or multi-column shell keeps a sticky bar and opens the sidebar itself as an off-canvas dialog over a scrim, with the close button in the gutter beside the panel.',
            'mobile_columns' => 'A multi-column shell takes the same bar and the same drawer as a sidebar shell. What it drops is the secondary column: it is declared xl:block, so below that breakpoint it is not there at all and the page is a single column. Nothing stacks it under the main content — if that column matters on a phone, it has to be put back by hand.',
        ],

        'label' => [
            'header' => 'Header',
            'body' => 'Body',
            'footer' => 'Footer',
            'continue' => 'Continue',
            'projects' => 'Projects',
            'action' => 'Add project',
            'item' => 'Row',
            'media_title' => 'A media object',
            'media_text' => 'A figure on one side, a heading and a paragraph on the other. The figure keeps its size; the text takes the rest of the line.',
            'edit' => 'Edit',
            'attach' => 'Attach a file',
            'comment' => 'Comment',
            'delete' => 'Delete',
            'nav' => 'Navigation',
            'page_header' => 'Page header',
            'main' => 'Main content',
            'sidebar' => 'Sidebar',
            'rail' => 'Rail',
            'aside' => 'Secondary column',
            'secondary' => 'Secondary column',
            'sticky' => 'Sticky column',
            'menu' => 'Menu panel',
            'drawer' => 'Sidebar drawer',
            'scrim' => 'Scrim',
            'closed' => 'Closed',
            'open' => 'Open',
            'constrained' => 'Constrained content',
        ],
    ],
];
