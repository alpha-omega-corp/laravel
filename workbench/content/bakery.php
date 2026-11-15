<?php

declare(strict_types=1);

/*
 * The demo content of a bakery: a fictional boulangerie-pâtisserie in the old
 * town of Morges, with a wood-fired oven of 1962 and a counter that opens at
 * six. `site` is what every page shares, `prefabs` is what the site would bind
 * as `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/bakery.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Fournil des Fossés',
        'blurb' => 'Pain au levain et pâtisserie maison, pétris et cuits chaque nuit au four à bois, dans la vieille ville de Morges.',
        'address' => 'Rue des Fossés 14, 1110 Morges',
        'phone' => '021 000 00 00',
        'email' => 'bonjour@fournil-des-fosses.example',
        'status' => 'Ouvert aujourd’hui de 6 h à 18 h 30',
        'note' => '© Fournil des Fossés',
        'action' => ['label' => 'Réserver un pain', 'to' => '/bread'],
        'band' => [
            'eyebrow' => 'Passer',
            'title' => 'Un pain mis de côté pour demain ?',
            'lead' => 'Appelez avant 17 h : il vous attend au comptoir dès l’ouverture, à votre nom. Un gâteau entier se commande deux jours avant.',
            'links' => [['label' => 'Réserver un pain', 'to' => '/bread'], ['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue des Fossés 14, Morges'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Se garer', 'value' => 'Deux places 15 minutes devant la porte'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'pain-des-fosses', 'name' => 'Pain des Fossés', 'price' => '7.80', 'description' => 'Mi-blanc au levain, 24 heures de fermentation. Le kilo, ou à la coupe.'],
                ['id' => 'seigle-aux-noix', 'name' => 'Seigle aux noix', 'price' => '6.40', 'description' => 'Seigle et levain, noix du pied du Jura. La miche de 500 g.'],
                ['id' => 'baguette-paysanne', 'name' => 'Baguette paysanne', 'price' => '3.20', 'description' => 'Croûte épaisse, mie crème. Deuxième fournée à 11 h.'],
                ['id' => 'tresse-au-beurre', 'name' => 'Tresse au beurre', 'price' => '6.50', 'description' => 'Tressée à la main, 500 g. Le samedi et le dimanche seulement.'],
                ['id' => 'croissant', 'name' => 'Croissant au beurre', 'price' => '1.90', 'description' => 'Feuilleté au beurre de laiterie, tourné la veille, cuit juste avant l’ouverture.'],
                ['id' => 'taille-aux-greubons', 'name' => 'Taillé aux greubons', 'price' => '3.40', 'description' => 'La spécialité vaudoise, salée et feuilletée. Tous les matins.'],
                ['id' => 'sandwich-du-fournil', 'name' => 'Sandwich du fournil', 'price' => '8.50', 'description' => 'Baguette paysanne, jambon à l’os ou gruyère d’alpage, beurre de Lully. Dès 11 h.'],
                ['id' => 'carac', 'name' => 'Carac', 'price' => '4.20', 'description' => 'Pâte sablée, ganache noire, glaçage vert : le classique romand.'],
                ['id' => 'mille-feuille', 'name' => 'Mille-feuille vanille', 'price' => '5.40', 'description' => 'Monté chaque matin dès 8 h, à la vanille en gousse.'],
                ['id' => 'tarte-raisinee', 'name' => 'Tarte à la raisinée', 'price' => '32.–', 'description' => 'Entière, huit parts, à commander deux jours avant. La part : 4.80.'],
            ],
        ],
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le lundi. Le pain sort du four à 5 h 45 ; le dimanche, tresses et croissants jusqu’à épuisement.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '6:00–18:30'],
                ['day' => 'Mercredi', 'hours' => '6:00–18:30'],
                ['day' => 'Jeudi', 'hours' => '6:00–18:30'],
                ['day' => 'Vendredi', 'hours' => '6:00–18:30'],
                ['day' => 'Samedi', 'hours' => '6:00–16:00'],
                ['day' => 'Dimanche', 'hours' => '7:00–12:30'],
            ],
        ],
        'map' => [
            'address' => 'Rue des Fossés 14, 1110 Morges',
            'title' => 'Rue des Fossés 14 · deux places 15 min devant',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Boulangerie-pâtisserie · Morges',
                'title' => "Le pain sort du four à 5\u{00A0}h\u{00A0}45",
                'lead' => 'Pains au levain, tresses et pâtisseries, pétris et cuits sur place chaque nuit. Le comptoir ouvre à 6 h du mardi au samedi, à 7 h le dimanche.',
                'subject' => 'Les miches au levain alignées sur la planche, à la sortie du four',
                'note' => 'Ce dimanche : tresses au beurre dès 7 h',
                'links' => [['label' => 'Réserver un pain', 'to' => '/bread'], ['label' => 'L’histoire du fournil', 'to' => '/our-story']],
                'facts' => [['value' => "6\u{00A0}h", 'label' => 'Le comptoir ouvre'], ['value' => "24\u{00A0}h", 'label' => 'De fermentation au levain'], ['value' => '1962', 'label' => 'L’année du four à bois']],
            ],
            'features' => [
                'eyebrow' => 'Au comptoir',
                'title' => 'Du four au comptoir, chaque matin',
                'lead' => 'Tout est pétri, façonné et cuit ici, derrière la vitre du magasin.',
                'items' => [
                    ['title' => 'Les pains', 'body' => 'Huit pains au levain, dont le pain des Fossés, vendu au kilo et à la coupe. Les premiers sortent à 5 h 45.', 'subject' => 'Des miches au levain sur la planche à défourner', 'to' => '/bread', 'label' => 'Les pains et leurs prix'],
                    ['title' => 'Les gâteaux', 'body' => 'Caracs, mille-feuilles et tartes de saison, montés le matin même. Les pièces entières se commandent deux jours avant.', 'subject' => 'Une rangée de caracs sous la vitrine', 'to' => '/bread', 'label' => 'Les gâteaux de la semaine'],
                    ['title' => 'Le fournil', 'body' => 'Un four à bois de 1962 et un levain nourri deux fois par jour depuis 2014.', 'subject' => 'La gueule du four à bois, les braises au fond', 'to' => '/our-story', 'label' => 'L’histoire du fournil'],
                ],
            ],
        ],
        '/bread' => [
            'label' => 'Pains et gâteaux',
            'hero' => [
                'eyebrow' => 'Pains et gâteaux',
                'title' => 'Les pains et les gâteaux de la semaine',
                'lead' => 'Le pain dès 6 h, la pâtisserie dès 8 h. Pour être sûr du vôtre, réservez par téléphone jusqu’à 17 h la veille.',
                'subject' => 'Le comptoir garni : miches, tresses et tartes',
                'links' => [['label' => 'Réserver au 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'features' => [
                'eyebrow' => 'Au fil de la journée',
                'title' => 'Ce qui sort du four, et quand',
                'lead' => 'Trois fournées par jour : venez à l’heure de ce que vous cherchez.',
                'items' => [
                    ['title' => '5 h 45 · Les pains', 'body' => 'Pain des Fossés, seigle aux noix et baguettes paysannes sont au comptoir à l’ouverture, encore tièdes jusqu’à 7 h.', 'subject' => 'Des miches fumantes glissées sur la planche à défourner'],
                    ['title' => '8 h · La pâtisserie', 'body' => 'Caracs, mille-feuilles et tartes du jour sortent du laboratoire dès 8 h. Le samedi, il n’en reste guère après 14 h.', 'subject' => 'Mathieu Gendre glaçant une plaque de caracs'],
                    ['title' => '11 h · La deuxième fournée', 'body' => 'Baguettes et petits pains pour midi, sandwichs du fournil et taillés aux greubons encore chauds.', 'subject' => 'Des baguettes debout dans un panier d’osier'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Réserver, commander',
                'title' => 'Comment mettre un pain de côté',
                'lead' => 'Par téléphone ou au comptoir : nous n’expédions rien, tout se retire au magasin.',
                'body' => [
                    'Un pain se réserve jusqu’à 17 h la veille, au 021 000 00 00 ou en passant. Il est mis de côté à votre nom et vous attend jusqu’à la fermeture ; on le paie en le retirant.',
                    'Une tarte ou un gâteau entier se commande deux jours avant, le jeudi au plus tard pour le week-end. Pour plus de vingt personnes, comptez une semaine et passez nous voir : on choisit mieux devant la vitrine.',
                    'Tous nos pains contiennent du gluten, et le fournil travaille les noix, le lait et les œufs. La liste des allergènes de chaque produit est au comptoir ; demandez-la, nous la tenons à jour.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Réserver',
                'title' => 'Votre pain, à votre nom, dès 6 h',
                'lead' => 'Un appel avant 17 h suffit. Les gâteaux entiers, deux jours avant.',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'L’histoire du fournil', 'to' => '/our-story']],
                'details' => [
                    ['label' => 'Adresse', 'value' => 'Rue des Fossés 14, Morges'],
                    ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                    ['label' => 'Se garer', 'value' => 'Deux places 15 minutes devant la porte'],
                ],
            ],
        ],
        '/our-story' => [
            'label' => 'Notre histoire',
            'hero' => [
                'eyebrow' => 'Notre histoire',
                'title' => 'Un four de 1962, rallumé chaque nuit',
                'lead' => 'Lucie Perrochon a repris la boulangerie de la rue des Fossés en 2014. Elle en a gardé le four, la pelle et l’horaire.',
                'subject' => 'Lucie Perrochon enfournant à la pelle, à 4 h du matin',
                'links' => [['label' => 'Réserver un pain', 'to' => '/bread']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2014',
                'title' => 'Une nuit au fournil',
                'lead' => 'On pétrit à minuit, on enfourne à 4 h, on ouvre à 6 h. Le reste de la journée appartient au levain.',
                'body' => [
                    'Le four date de 1962 et chauffait encore quand Lucie Perrochon a repris la maison, après dix ans passés dans des fournils de Lausanne et de Berne. Il se charge au hêtre vers 2 h ; à 4 h la sole est à bonne température et les premières miches entrent à la pelle, quarante à la fois.',
                    'Le levain a l’âge de la reprise. Il est nourri deux fois par jour à la farine mi-blanche, et c’est lui qui décide de l’horaire : une pâte attend vingt-quatre heures avant de cuire, si bien que le pain de mardi est pétri le lundi, jour de fermeture du magasin.',
                    'Mathieu Gendre a rejoint le fournil en 2017 pour la pâtisserie. Il arrive à 5 h, quand la première fournée finit de cuire, et monte les caracs, les mille-feuilles et les tartes pour le jour même. Nous sommes cinq aujourd’hui : deux au four, un au tour, deux au comptoir.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ceux qui nous fournissent',
                'title' => 'À moins de vingt kilomètres',
                'lead' => 'Trois maisons dont nous connaissons les gens, les champs et les horaires.',
                'items' => [
                    ['title' => 'Moulin Bovey, Apples', 'body' => 'Farines mi-blanche, bise et de seigle, moulues chaque semaine à partir de blés du pied du Jura.', 'subject' => 'Des sacs de farine empilés devant la meule'],
                    ['title' => 'Laiterie de Lully', 'body' => 'Le beurre des croissants et la crème double des tartes, livrés le mardi et le vendredi.', 'subject' => 'Des plaques de beurre sur le marbre du tour'],
                    ['title' => 'Vergers Cuendet, Vufflens', 'body' => 'Pruneaux, pommes et poires pour les tartes. La raisinée y cuit deux jours, chaque automne.', 'subject' => 'Un chaudron de raisinée sur le feu'],
                ],
            ],
        ],
    ],
];
