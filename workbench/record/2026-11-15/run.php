<?php

declare(strict_types=1);

/*
 * The record of one run of work on the kit: what was asked, what was decided
 * at each step and why, and the pictures that were sent back while it ran.
 * The framework tab draws it (`/framework/record`). The pictures are in
 * `pictures/` beside this file; what each writer reported is `writers.json`.
 *
 * English, as the skill is: this is an account of work on the kit, not demo
 * content. A step's `see` are views of the framework tab that show today what
 * the step made, by route and query.
 */
return [
    'title' => 'A wider kit, and a view of every kind of business',
    'date' => '2026-11-15',

    'asked' => [
        'The brief asked for more variety in what the website builder can draw: themes, components, prefabs and skills for domains the kit did not reach, and a way to see which of them a build prompt pulls. Its goal was stated in one line: improve the laravel source, which is this kit.',
        'Partway through, the goal was sharpened: a framework view for each business type on this page, several designs for each business, direction and feature, with pictures sent back as the work went, so that the library becomes a knowledge base for every site deployer builds later.',
        'A third instruction changed how the work was run: fewer tests and review rounds, more variants. The agents that were reviewing each other were stopped, and the ones that followed wrote once and checked once.',
        'After the work was committed, two more came. One asked for symmetry in grouped items: components aligned on a row that do not fill it must vary their width, or their spacing, until they do. It was sent while a report was being written and was not seen until the record itself was checked against the conversation; it was done then, and is the eleventh step.',
        'The other asked that all the pictures and the reasoning of this run be visible on this page. This record is the answer to it, and so is the panel of reasons under each page of the business views.',
    ],

    'totals' => [
        ['value' => '40', 'label' => 'kinds of business, from 13'],
        ['value' => '10', 'label' => 'directions, from 4'],
        ['value' => '18', 'label' => 'palettes, from 7 on production and 11 as the checkout was found'],
        ['value' => '20', 'label' => 'prefab components, from 9'],
        ['value' => '480', 'label' => 'worked designs, twelve a business'],
        ['value' => '2 826', 'label' => 'views on this page'],
    ],

    'steps' => [
        [
            'title' => 'Reading before writing',
            'why' => [
                'The kit was read as deployer reads it. Thirteen businesses all drew from the same four directions (counter, studio, market, hearth), so every site was a bright counter, a calm studio, a market stall or a dark dining room; a builder or a law firm had no look of its own. Nine prefabs covered hours, lists, a map, bookings, events, an FAQ, a gallery and a team, and nothing covered work done, a quote, plans, listings or credentials.',
                'The checkout already held uncommitted work from another session: status colours declared once, a danger button, a .control class for form fields, the palette picker redrawn as tiles, and four palettes more (marigold, lagoon, nocturne, ember) with their blocks, their faces, their index files and their rows under the directions, none of which production has. That work was built on rather than disturbed, and later committed unchanged as its own commit so that it stays apart from this run.',
                'The kit is held together by its own tests: a spec per direction and a root block per spec, a rule file per component, every business page drawable in every direction it lists, a band whose text reads at 4.5:1 in every palette. Those tests were taken as the bar. Where a test pins a list (the directions, the business map, the palettes nobody is paired with), the list was extended in the same change, never worked around.',
            ],
        ],
        [
            'title' => 'Three palettes for the domains that had none',
            'why' => [
                'Palettes came first because a direction can only be judged in colours that suit its domain. Construction needed poured grey with one signal colour, a law firm an ink on bone, the outdoors snow and a lake blue.',
                'Each carries one rule about its second colour, written in its index file. In concrete the hazard yellow is a ground and never a text colour, since on the light canvas it is 1.5:1. In quill the brass marks what was earned (an admission, a year), not what is sold. In alpine the orange means urgent and is spent on urgency.',
                'Before they went into themes.css every pair was measured in both schemes: ink and soft ink on the three surfaces, the accent as a link, the text on the accent, and the kit\'s status colours on canvas, canvas-alt and raise. Two second grounds were too dark for the warning colour and were lightened.',
            ],
            'pictures' => [
                ['file' => '01-palettes-concrete-quill-alpine.webp', 'width' => 1500, 'height' => 1330, 'caption' => 'concrete, quill and alpine, light above and dark below.'],
            ],
        ],
        [
            'title' => 'Eleven prefab components',
            'why' => [
                'The new domains were asked what their sites cannot do without. The answers fall in five groups: proof (projects, testimonials, credentials), the offer (services, pricing, listings, courses), the road ahead (process), the ask (quote, donate) and hiring (jobs).',
                'Each component is written to the grammar of the nine that existed: a bare tag fills itself from what the site binds as kit.<name>, props on the tag win, and with no data it renders nothing. Each has its rule file (where it may stand, how much of it a page takes, how it behaves, every rule tied to a law of UX) and one or two arrangements drawn in kit.css. Seven say nothing of their own and print only the owner\'s words; the four that do (the quote\'s form, and the default button of pricing, donate and courses) have their strings in four languages.',
                'Most of the reasoning is in what each one refuses. A testimonial with no name is never printed, because unsigned praise is the business praising itself. A credential is only what can be checked: a licence number invented to fill a card is a false statement under the firm\'s name. Pricing never takes a payment and donate is a way out to the association\'s own giving page, because a checkout is deployer\'s /stripe and a second one would be untested. The quote asks for a budget band the owner wrote, never an amount a visitor has to guess, and it has no photograph field because the kit draws no file field yet.',
            ],
            'pictures' => [
                ['file' => '02-components-projects-services-process.webp', 'width' => 1440, 'height' => 1380, 'caption' => 'projects, services and process, in concrete, before any direction dressed them.'],
                ['file' => '03-components-testimonials-credentials-quote.webp', 'width' => 1440, 'height' => 1080, 'caption' => 'testimonials, credentials and quote, in quill.'],
                ['file' => '04-components-pricing-listings.webp', 'width' => 1440, 'height' => 1290, 'caption' => 'pricing and listings, in alpine.'],
                ['file' => '05-components-courses-jobs-donate.webp', 'width' => 1440, 'height' => 1120, 'caption' => 'courses, jobs and donate, in alpine dark.'],
            ],
        ],
        [
            'title' => 'The business views of this page',
            'why' => [
                'The nine projects next door are sites written by hand. Forty more written by hand would have been forty things to keep in step with the skill, so the business views are read instead: a business is its file in the skill, its looks are the directions that file lists, its pages and their prefabs are its "Pages" lines. What is drawn is what deployer\'s build would be handed for that brief, and the panel under each page names the files it came from.',
                'A page is a document of its own in a frame, not a panel inside the showcase. A direction finds its frames from body and main, so nested in another page it would draw half of itself. The six site layouts are the worker\'s stubs, copied by hand class for class; a test holds each to the regions its layout file in the skill names, and nothing checks the classes against the worker.',
                'A design is new to the skill: one settled roll for one business (a direction, a palette, a layout for every page, the arrangements) under the sentence that says who it is for. It lives in the skill, in designs/<business>.md, so that a session building a site reads it; a test refuses any design the skill itself would refuse. A design fixes every axis of the tab and the viewer may override any one; an override the skill would refuse falls back to the design\'s, and only what was overridden is in the address.',
                'The demo businesses are in French and are not translated, since invented content is not chrome; each has an .example address and a phone number of zeros. There are no photographs: a page says in words what its picture would show and the kit frames that caption, and where a component takes only an image (the gallery) the showcase draws the same frame as one. The shape of a content file is workbench/content/README.md.',
                'The skill was told all of it. SKILL.md names the new prefabs and directions and now tells a session to read its business\'s designs before it rolls and to start from the nearest; the READMEs of businesses, directions, themes and designs say what adding one now takes.',
                'The restaurant was written first, by hand, as the worked example the later writers were given.',
            ],
            'pictures' => [
                ['file' => '06-tab-restaurant.webp', 'width' => 1440, 'height' => 2105, 'caption' => 'The tab on the restaurant: the axes above the page, what a build pulls below it.'],
                ['file' => '07-sheet-restaurant.webp', 'width' => 1440, 'height' => 4257, 'caption' => 'Its contact sheet with three designs: every page of each, then home in every recommended palette.'],
            ],
            'see' => [
                ['label' => 'The restaurant on the tab', 'route' => 'framework.businesses', 'query' => ['business' => 'restaurant']],
                ['label' => 'Its contact sheet', 'route' => 'framework.sheet', 'query' => ['business' => 'restaurant']],
            ],
        ],
        [
            'title' => 'Six directions, each written in a sandbox',
            'why' => [
                'One direction per family of business that had no look: yard for what is built and repaired, ledger for those chosen on standing, atelier for work that is looked at, civic for what is public, launch for what is sold by plan, trail for the outdoors. The contract of each (its layouts, its palettes with their verdicts, whom it suits) was fixed before anyone wrote CSS, so the businesses could be written against it at the same time.',
                'Six agents wrote one direction each, in a private copy of the kit with the kit\'s own direction tests, and photographed specimen pages: every site layout holding every component, in any palette, with photographs or with empty frames. A direction is CSS over one DOM, so their rules could be loaded over the built stylesheet with no build step.',
                'Two things went wrong and were mended. The first screenshot helper photographed a tall window, which stretched every hero sized in viewport units to several screens; it was replaced by a real viewport with a full-page capture. And the three new palettes had their comments before their blocks, which the band-contrast test cannot read past; the comments moved inside, as the older palettes have them.',
                'A third thing was changed to take the pictures at all. The dev server keeps the list of faces it started with, and the new palettes brought fourteen. The workbench\'s provider now serves the built assets when WORKBENCH_BUILT_ASSETS is set, for a second server beside the first; testbench serves from its own public folder, so the build has to be linked into it, a link inside vendor/ that git does not hold.',
            ],
            'pictures' => [
                ['file' => '08-yard-in-progress.webp', 'width' => 1440, 'height' => 1700, 'caption' => 'yard as its author had it mid-way: the hazard strip, the stencilled heads, the figures set big.'],
                ['file' => '09-launch-in-progress.webp', 'width' => 1440, 'height' => 1700, 'caption' => 'launch mid-way: one centred promise over a glow of the accent.'],
                ['file' => '10-direction-yard.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'yard, merged, in concrete.'],
                ['file' => '11-direction-ledger.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'ledger, in quill.'],
                ['file' => '12-direction-atelier.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'atelier, in vellum.'],
                ['file' => '13-direction-civic.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'civic, in harbour.'],
                ['file' => '14-direction-launch.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'launch, in nocturne dark.'],
                ['file' => '15-direction-trail.webp', 'width' => 1440, 'height' => 1650, 'caption' => 'trail, in alpine.'],
            ],
            'see' => [
                ['label' => 'yard, on a garage', 'route' => 'framework.businesses', 'query' => ['business' => 'garage']],
                ['label' => 'ledger, on a law firm', 'route' => 'framework.businesses', 'query' => ['business' => 'legal']],
                ['label' => 'atelier, on an architect', 'route' => 'framework.businesses', 'query' => ['business' => 'architect']],
                ['label' => 'civic, on an association', 'route' => 'framework.businesses', 'query' => ['business' => 'association']],
                ['label' => 'launch, on software', 'route' => 'framework.businesses', 'query' => ['business' => 'software']],
                ['label' => 'trail, on a guide', 'route' => 'framework.businesses', 'query' => ['business' => 'guide']],
            ],
        ],
        [
            'title' => 'The steer: variants, not review rounds',
            'why' => [
                'At this point every item had an author looping through write, test and photograph, followed by a critic. The instruction was to stop testing constantly and spend the agents on variants.',
                'Both fleets were stopped. The six directions were already written, 650 to 913 lines each, so each was checked once against the kit\'s rules (all six passed) and merged. The business writers that followed were given one pass: write the content and the designs, run the kit\'s rules for that business once, look at the contact sheet once.',
                'It had a cost that showed later. Five direction authors were cut short with their spec\'s "Looks" section still a stub, and nobody had inspected every page of every design. The first was mended by a writing-only pass; the second is why the writers\' notes below are kept: they are the only review the designs had.',
            ],
        ],
        [
            'title' => 'Twenty-seven more kinds of business',
            'why' => [
                'Thirteen came from the brief: construction, legal, architect, realestate, garage, school, association, venue, coworking, software, portfolio, guide and band. Fourteen more were added because a knowledge base is only as useful as the kinds it knows: museum, festival, theatre, consultant, agency, caterer, transport, commune, club, spa, rental, artisan, landscaper and recruitment.',
                'Each was chosen to be plainly distinct from its neighbours, and its opening paragraph says so, because deployer matches a brief against that paragraph: a museum is not a venue, which is hired, nor a theatre, which sells an evening; a consultant is not a law firm, whose fields are regulated, nor an agency, which delivers by a team.',
                'Each lists its prefabs in the order a visitor meets them and at most five pages. All but two pair a direction of the new six with one of the first four: a caterer is drawn only in the first four (hearth, studio, market) and a commune only in two of the new (civic, ledger). Every page names at least one layout of every direction the business lists, which was checked by a script before the files went in and by the kit\'s tests after.',
                'The thirteen kinds the kit already had were left as they were written: none was given one of the six new directions or of the eleven new prefabs. They are wider by the palettes now rated under their four directions and by twelve designs each, not by a look of their own; 296 of the 480 designs are drawn in the first four directions.',
            ],
        ],
        [
            'title' => 'Four more palettes',
            'why' => [
                'clay, plum, denim and sorbet were added while the writers worked. A palette rated under a direction widens every business drawn in that direction, so each one added views to the contact sheets with nothing more to write.',
                'They fill what the fourteen before them lacked: an earth palette for makers and gardens, an evening one for baths and theatres, a workwear blue for garages and carriers, and a playful one for clubs and schools. Each was rated under the directions it suits, and the band of every one of those directions reads at 4.5:1 in it, in both schemes.',
                'It also meant the lists changed under the writers. Those who had already read them wrote no design in the four, which are among the least used of the eighteen: sorbet is in 10 designs of 480, denim in 13, plum in 15, clay in 17.',
            ],
            'pictures' => [
                ['file' => '16-palettes-clay-plum-denim-sorbet.webp', 'width' => 1760, 'height' => 1170, 'caption' => 'clay, plum, denim and sorbet, light above and dark below.'],
            ],
        ],
        [
            'title' => 'Forty writers, twelve designs each',
            'why' => [
                'One writer per business invented a Swiss business of that kind (its name, its town, its people, its prices) and wrote its content once, then twelve designs of it: the brief asked for ten to twelve, and every writer delivered twelve.',
                'The brief for the designs asked for three things. Spread: every direction the business lists carries several designs, at least five palettes are used, every page appears in every layout it can take, and every hero, header and footer type and every arrangement of its prefabs is used somewhere it suits. Difference: any two designs differ in at least three visible things. And a reason each: a design is for a recognisable kind of that business (the old house and the newcomer, the one that sells on price and the one that sells on craft), and its layouts follow from that sentence.',
                'Construction was the first to land. Its home page shows what the new prefabs and the yard direction do together: services as a ruled grid, credentials as bars, and after a diagonal break the closing band that asks for a quote.',
            ],
            'pictures' => [
                ['file' => '17-construction-home.webp', 'width' => 1440, 'height' => 4606, 'caption' => 'Construction, first design: yard in concrete.'],
                ['file' => '18-construction-sheet.webp', 'width' => 1440, 'height' => 10631, 'caption' => 'Its contact sheet: twelve designs across yard and counter, five pages each, then home in every recommended palette.'],
                ['file' => '19-index-38.webp', 'width' => 1440, 'height' => 4139, 'caption' => 'The index with 38 of the 40 kinds drawn.'],
                ['file' => '20-legal-home.webp', 'width' => 1440, 'height' => 3004, 'caption' => 'A law firm in ledger and quill.'],
                ['file' => '21-guide-home.webp', 'width' => 1440, 'height' => 2955, 'caption' => 'A mountain guide in trail and alpine.'],
                ['file' => '22-software-home.webp', 'width' => 1440, 'height' => 4161, 'caption' => 'A software product in launch and graphite.'],
                ['file' => '23-association-home.webp', 'width' => 1440, 'height' => 2840, 'caption' => 'An association in civic and fresh, home drawn as a board.'],
                ['file' => '24-architect-projects.webp', 'width' => 1440, 'height' => 3328, 'caption' => 'An architect\'s projects in atelier and vellum.'],
            ],
            'see' => [
                ['label' => 'Every kind of business', 'route' => 'framework.sheet', 'query' => []],
                ['label' => 'Construction\'s contact sheet', 'route' => 'framework.sheet', 'query' => ['business' => 'construction']],
            ],
        ],
        [
            'title' => 'What the writers noticed, and what was mended',
            'why' => [
                'The writers were told not to work around the kit and not to fix it, but to say what was wrong. They left 158 notes, kept below under each business. Several said the same thing, and those were mended in the page composer and the kit.',
                'A side column was only ever given the hours and the map, so for a business with neither (software, an agency, a carrier) a split or a poster lost its second half. The composer now places a page\'s prefabs by each component\'s own placement rules, and credentials may stand in a side column: a business with no hours to give puts who vouches for it beside its promise. On a board, any page but home now leads with what the page is for instead of its features. Carte now draws a page\'s prose. A row of a prefab can name a page of the business, so a plan\'s button leads to the page that takes the request. On the contact sheet, a page the business gives no label was captioned with its role in English beside French labels; it is now named by the words of its own opening.',
                'Two of these mends are narrower than they read. Only credentials may stand in a side column besides the hours and the map, so a split or a poster page that holds none of the three still opens on the hero alone. And no demo content uses the new links inside a prefab\'s rows yet.',
                'In the kit, a fact\'s value in the hero no longer breaks across two lines, and a hero drawn as a cover with no photograph no longer puts the empty frame\'s glyph on its words. The five direction specs whose "Looks" were stubs were finished from the CSS that draws them, and atelier\'s, which its author had written, was completed by the same pass. And counter, studio, market and hearth, which drew the eleven new prefabs in the kit\'s plain default look, were each given rules for them in their own hand, 1 088 lines in all.',
            ],
            'pictures' => [
                ['file' => '25-index-40.webp', 'width' => 1440, 'height' => 4437, 'caption' => 'The index, complete: 40 kinds, 480 designs (twelve each), 2 826 views.'],
                ['file' => '26-tab-garage.webp', 'width' => 1440, 'height' => 2405, 'caption' => 'The tab on a garage: forty businesses, twelve designs, and the axes.'],
                ['file' => '27-construction-counter.webp', 'width' => 1440, 'height' => 2524, 'caption' => 'Construction in counter, whose new prefabs are now dressed in counter\'s own hand.'],
                ['file' => '28-software-pricing.webp', 'width' => 1440, 'height' => 4489, 'caption' => 'Software pricing in launch.'],
                ['file' => '29-guide-outings.webp', 'width' => 1440, 'height' => 4011, 'caption' => 'The guide\'s outings in trail.'],
                ['file' => '30-legal-studio.webp', 'width' => 1440, 'height' => 4163, 'caption' => 'A law firm\'s practice areas in studio.'],
            ],
            'see' => [
                ['label' => 'Software in split, credentials beside the promise', 'route' => 'framework.businesses', 'query' => ['business' => 'software', 'layout' => 'split']],
            ],
        ],
        [
            'title' => 'Symmetry for grouped items',
            'why' => [
                'The instruction was that components aligned on a row must not sit unevenly: their width must vary, or their spacing, until the row is filled. In the kit a row of cards was a grid that kept an empty column wherever fewer cards came than would fit, and left a last short row at the left with a hole beside it.',
                'The rule is now written once, in kit.css: a row of grouped items is always full, or stands centred. The lists of a catalogue, a gallery, a team, projects, services, a process, testimonials, pricing, listings and credentials are flex rows that wrap. The list says the least width one item takes; the items of a row grow from it until the row is filled, so three cards where four would fit are three wider cards. A last row that is short grows too, by three quarters at most, and what is left over is shared between its two sides, so the odd one out stands in the middle at a size that is still a card\'s.',
                'A script rewrote the kit\'s own rules to it rather than a person: thirteen grids that directions had given those lists became the least width of a row, and twenty-one layouts that are deliberately something else (a rail that scrolls, one column, a mosaic) were kept exactly as they were, each preceded by a rule that hands its items back their own widths. The hero\'s facts no longer keep a third column for a fact that is not there, and the contact sheets\' own thumbnails are centred.',
                'Each of the ten directions was then given one pass by an agent of its own, on a page where every list has a count that does not fill its last row, to fill or centre the rows that direction lays out itself: the hero\'s facts, the closing band\'s details, a footer with two columns where the grid kept a third, a week of hours given as three lines, feature blocks. Between them they wrote 541 lines.',
                'One of those passes caught a fault in the general rule itself. Centring a row that overflows, counter\'s rail of products, cut its first card off at the left. The centring is now `safe` and is the kit\'s own rule rather than a class on each list, so a rail starts on its first item; a webview that does not know the word draws the row from the left as before. The passes also found three rules that had given several lists one grid at once and lost their "three across at most" when those lists became rows; each was given the width back.',
                'The whole suite was run after the last of these changes: 1 215 tests pass.',
            ],
            'pictures' => [
                ['file' => '32-symmetry-rows.webp', 'width' => 1440, 'height' => 3485, 'caption' => 'Odd counts with no direction: three projects where four would fit are three wider cards, a seventh mark stands centred under six, two facts share their row.'],
                ['file' => '33-symmetry-yard.webp', 'width' => 1440, 'height' => 4747, 'caption' => 'The same page in yard: seven marks as five and two, centred.'],
                ['file' => '34-symmetry-market.webp', 'width' => 1440, 'height' => 6539, 'caption' => 'The whole odd-count page in market after its pass: five products and five services as three and two, the two centred; three feature blocks as one large and two; two facts sharing their row.'],
            ],
            'see' => [
                ['label' => 'A festival in market', 'route' => 'framework.businesses', 'query' => ['business' => 'festival', 'design' => 'marche-de-jour']],
            ],
        ],
        [
            'title' => 'The record, and the reasons under each view',
            'why' => [
                'The reasons for all of this were in a conversation and would have gone with it, so they were written down where the views are: this page, read from workbench/record/<date> (what was asked, each step and why, the pictures as they were sent, what each writer reported), with a test that holds every picture it names to being there and every step to saying why.',
                'The tab itself was given a panel of reasons under each page, with nothing written for it. For the page being looked at it prints why the business takes that direction and holds each prefab, how the direction draws what is on the page, what each component does once it is placed and what the palette costs, each line read from the skill file named beside it. A business\'s tab also links to its own writer\'s notes here.',
                'The record was then read by two agents that had not written it, one against the files for every figure and name, one against the work for anything left out. They found a wrong total (482 designs where the files hold 480: the count had taken in two headings of a README), a wrong caption, three sentences that claimed more than was true, and the instruction about symmetry that had never been seen. What they found is corrected above, and the rest of what they listed is under "Known and not mended".',
            ],
            'pictures' => [
                ['file' => '31-tab-reasons.webp', 'width' => 1440, 'height' => 1560, 'caption' => 'The tab on a law firm in ledger and quill: what a build pulls, then the reasons in the skill\'s own words.'],
            ],
            'see' => [
                ['label' => 'The reasons under a law firm\'s practice areas', 'route' => 'framework.businesses', 'query' => ['business' => 'legal', 'page' => '/practice']],
            ],
        ],
    ],

    'open' => [
        'Nobody inspected every page of every design: each was checked once against the kit\'s rules and its contact sheet was looked at once, at thumbnail size. Eight writers changed their files after that look, some to get round a fault they had just reported, and what stands now was not looked at again.',
        'A hero drawn as a cover with no photograph is a tall band of the ground with its caption small in the top corner. Under launch and market, and on a dark ground, the frame cannot be told from the page, so the first screen reads as empty.',
        'Hero facts are cramped when the hero is split, since three figures share half the opening.',
        'With no photographs, studio\'s own hero and its centred and statement types look alike: the direction\'s full-height photograph is never drawn here. A statement hero on a poster page crowds out the foot of its first screen.',
        'A features item with an icon and no subject still draws an empty frame beside its icon. The content rules now ask for a subject on every item.',
        'Nothing refuses a wide map in a side column, which the map\'s own rules forbid. Two festival designs drew one and were changed by hand.',
        'Seven of the first thirteen kinds give one of their directions a single set of page layouts, so its designs differ by colour and arrangement only; a florist and a restaurant list market, which is named for its board, and give no page a board.',
        'counter, studio, market and hearth were given rules for the eleven new prefabs in their default drawing only. Under an arrangement those rules step aside, so an index of projects or rows of services lose the lines that ruled them in studio and hearth, and a featured plan with no flag and no link is not marked.',
        'counter, studio, market and hearth still do not say in their specs how they draw events, booking, the questions, the gallery and the team, and their own lists of whom they suit do not name the new kinds that list them.',
        'Some arrangement words change nothing under a given direction, and nothing says which. A plain schedule in counter\'s side column still breaks a day\'s hours in two.',
        'The booking form has one date, and a rental needs a return date; pricing holds one price per plan, and a rental\'s rates are a grid of object by duration.',
        'The contact sheet shows the first screen of each page, so arrangements below the fold cannot be compared on it.',
        'A demo address is invented, so the map\'s pin is arbitrary.',
        'The symmetry rule was looked at with no direction and on one page of odd counts in each direction; the 2 826 pages of the business views were not looked at again after it. Rows the passes left as they were: buttons that wrap under left-aligned text stay with the text; a card\'s own facts in a very narrow card can still break three and one; a listing\'s facts, the band\'s details and the donate details are the kit\'s own grids and keep a short last row where no direction took them over.',
    ],

    'owed' => [
        'The domain skills the brief asked for (one consolekit skill per new family of business, site-domain-<family>, saying what such a site\'s pages say and what must never be invented) are not written.',
        'The template (worker): an entry in resources/components.php for each of the eleven new components, in the change that moves its kit dependency to this commit.',
        'The base (site): a prefab for each of the eleven (model, migration, presenter, admin). Until then a bare tag of one renders nothing on a built site, since nothing binds its data.',
        'Deployer: it does not read designs/ yet, its mockup draws the eleven new components as grey boxes, its preview has a fixture for each of the first four directions and none for the six new, and the trials that run build prompts through its decision code are not started.',
        'The commits are on kit-domains, cut from production when the work was committed: first the work that was found, then this run. production is as it was cloned and the checkout now stands on kit-domains, so the session whose work was found will find it committed here and not in its working tree.',
        'kit-domains is not pushed. A site built on this computer installs the kit at the branch\'s last commit and deploys only once the branch is pushed, which is the owner\'s decision.',
    ],
];
