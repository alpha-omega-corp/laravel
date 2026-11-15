<?php

declare(strict_types=1);

/*
 * The demo content of a restaurant: a fictional twenty-eight cover place by
 * the lake in Lausanne. `site` is what every page shares, `prefabs` is what the
 * site would bind as `kit.<name>` — the rows its owner keeps in the admin, in
 * each component's own prop names — and `pages` holds each page's words, keyed
 * by its path in `.claude/skills/ui-kit/businesses/restaurant.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Osteria Verd',
        'blurb' => 'Une cuisine du lac, servie sans cérémonie, à deux pas du port d’Ouchy.',
        'address' => 'Rue du Port 12, 1006 Lausanne',
        'phone' => '021 000 00 00',
        'email' => 'table@osteria-verd.example',
        'status' => 'Ouvert ce soir jusqu’à 22 h',
        'note' => '© Osteria Verd Sàrl · Prix nets, service compris',
        'action' => ['label' => 'Réserver une table', 'to' => '/contact'],
        'band' => [
            'eyebrow' => 'Venir',
            'title' => 'Une table ce soir ?',
            'lead' => 'Du mardi au dimanche. On réserve en ligne jusqu’à la veille à 18 h ; pour le soir même, un coup de fil.',
            'links' => [['label' => 'Réserver une table', 'to' => '/contact'], ['label' => 'Voir la carte', 'to' => '/menu']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue du Port 12, Lausanne'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Métro', 'value' => 'M2 Ouchy, quatre minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le lundi, toute l’année. La cuisine prend la dernière commande une demi-heure avant la fermeture.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '11:30–14:00 · 18:00–22:00'],
                ['day' => 'Mercredi', 'hours' => '11:30–14:00 · 18:00–22:00'],
                ['day' => 'Jeudi', 'hours' => '11:30–14:00 · 18:00–22:00'],
                ['day' => 'Vendredi', 'hours' => '11:30–14:00 · 18:00–23:00'],
                ['day' => 'Samedi', 'hours' => '11:30–14:00 · 18:00–23:00'],
                ['day' => 'Dimanche', 'hours' => '11:30–15:00'],
            ],
        ],
        'map' => [
            'address' => 'Rue du Port 12, 1006 Lausanne',
            'title' => 'Osteria Verd, la remise côté quai',
        ],
        'menu' => [
            'title' => 'La carte',
            'sections' => [
                ['title' => 'Entrées', 'items' => [
                    ['name' => 'Velouté de courge, noisettes torréfiées', 'price' => '14.–', 'description' => 'Végétarien'],
                    ['name' => 'Tartare de truite du lac, aneth et citron', 'price' => '19.–'],
                    ['name' => 'Salade d’automne, chèvre frais des Préalpes', 'price' => '16.–', 'description' => 'Végétarien'],
                    ['name' => 'Terrine de campagne, pickles de la maison', 'price' => '17.–'],
                ]],
                ['title' => 'Du lac', 'items' => [
                    ['name' => 'Filets de perche, beurre citronné, pommes vapeur', 'price' => '34.–', 'description' => 'Pêche du lac, livrée le matin'],
                    ['name' => 'Féra fumée au four, poireaux et crème d’aneth', 'price' => '32.–'],
                    ['name' => 'Omble chevalier meunière, épinards', 'price' => '38.–', 'description' => 'Selon la pêche : demandez en salle'],
                ]],
                ['title' => 'Du four à bois', 'items' => [
                    ['name' => 'Côte de veau, jus au thym', 'price' => '42.–', 'description' => 'Par personne, servie pour deux ; compter vingt-cinq minutes'],
                    ['name' => 'Saucisson vaudois en brioche, lentilles vertes', 'price' => '29.–'],
                    ['name' => 'Risotto aux champignons des bois', 'price' => '28.–', 'description' => 'Végétarien'],
                    ['name' => 'Courge rôtie entière, sauge et sérac', 'price' => '26.–', 'description' => 'Végétarien'],
                ]],
                ['title' => 'Fromages et desserts', 'items' => [
                    ['name' => 'Trois fromages d’alpage, pain aux noix', 'price' => '15.–'],
                    ['name' => 'Tarte aux coings, crème double', 'price' => '12.–'],
                    ['name' => 'Glace au miel de sapin', 'price' => '10.–'],
                    ['name' => 'Moelleux au chocolat, sorbet cassis', 'price' => '13.–', 'description' => 'Compter quinze minutes'],
                ]],
                ['title' => 'Le midi, du mardi au vendredi', 'items' => [
                    ['name' => 'Le plat du jour', 'price' => '21.–', 'description' => 'Écrit à l’ardoise à 11 h'],
                    ['name' => 'Entrée et plat', 'price' => '26.–'],
                    ['name' => 'Entrée, plat et dessert', 'price' => '32.–'],
                ]],
                ['title' => 'Vins au verre', 'items' => [
                    ['name' => 'Chasselas, Domaine Blondel, Lavaux', 'price' => '7.–', 'description' => 'Le décilitre'],
                    ['name' => 'Pinot noir, Domaine Blondel, Lavaux', 'price' => '8.–'],
                    ['name' => 'Petite arvine, Fully', 'price' => '9.–'],
                    ['name' => 'Humagne rouge, Leytron', 'price' => '9.–'],
                ]],
            ],
        ],
        'booking' => [
            'title' => 'Réserver une table',
            'intro' => 'Dites-nous le soir et combien vous serez : nous confirmons par téléphone ou par e-mail dans la journée.',
            'action' => '#booking',
            'services' => [
                'En salle',
                'Au comptoir, face au four',
                'La grande table, de huit à douze personnes',
            ],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Cuisine du lac · Lausanne',
                'title' => 'Une cuisine du lac, servie sans cérémonie',
                'lead' => 'Vingt-huit couverts, une carte courte et un four à bois. On cuisine ce que le lac et les maraîchers donnent la semaine même.',
                'subject' => 'La salle le soir, le four à bois au fond',
                'note' => 'Douze couverts encore libres ce vendredi',
                'links' => [['label' => 'Réserver une table', 'to' => '/contact'], ['label' => 'Voir la carte', 'to' => '/menu']],
                'facts' => [['value' => '28', 'label' => 'Couverts'], ['value' => '40', 'label' => 'Vins vaudois et valaisans'], ['value' => '15 j', 'label' => 'La carte change']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Trois choses, bien faites',
                'lead' => 'Un lac, un four et une grande table : rien ici que nous ne fassions nous-mêmes.',
                'items' => [
                    ['title' => 'Le lac', 'body' => 'Perche, féra et omble, livrés le matin par la pêcherie de Rivaz. Quand le lac ne donne pas, la ligne sort de la carte.', 'subject' => 'Des filets de perche sur la glace', 'to' => '/menu', 'label' => 'La carte de la quinzaine'],
                    ['title' => 'Le four à bois', 'body' => 'Remonté pierre à pierre en 2011, il cuit la côte de veau, la féra fumée et le pain du soir.', 'subject' => 'La gueule du four à bois, les braises rouges', 'to' => '/the-house', 'label' => 'L’histoire de la maison'],
                    ['title' => 'La grande table', 'body' => 'Une table de chêne pour huit à douze, face au four : un anniversaire, une équipe, une famille entière.', 'subject' => 'La grande table dressée pour dix, face au four', 'to' => '/contact', 'label' => 'Réserver la grande table'],
                ],
            ],
        ],
        '/menu' => [
            'label' => 'La carte',
            'hero' => [
                'eyebrow' => 'La carte',
                'title' => 'Ce que nous servons cette quinzaine',
                'lead' => 'Elle change tous les quinze jours. Le menu du midi est à 26.–, entrée et plat. Prix nets, service compris.',
                'subject' => 'Une assiette de perche, beurre citronné',
                'links' => [['label' => 'Réserver une table', 'to' => '/contact']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Allergies, régimes et enfants',
                'items' => [
                    ['title' => 'Allergies', 'body' => 'Dites-le à la réservation : la cuisine adapte la plupart des plats, et la salle connaît les quatorze allergènes ligne par ligne.', 'subject' => 'Le cahier des allergènes ouvert sur le passe', 'icon' => 'wheat-off'],
                    ['title' => 'Végétarien', 'body' => 'La carte compte toujours deux entrées et deux plats sans viande ni poisson.', 'subject' => 'Un risotto aux champignons dans une assiette creuse', 'icon' => 'leaf'],
                    ['title' => 'Enfants', 'body' => 'Demi-portions sur tous les plats, et des pâtes au beurre sans discuter.', 'subject' => 'Une chaise haute au bout d’une table', 'icon' => 'baby'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment elle se fait',
                'title' => 'Une carte qui tient sur une page',
                'lead' => 'Vingt-deux lignes, pas une de plus : c’est ce qu’une cuisine de douze mètres carrés fait bien.',
                'body' => [
                    'La carte se décide le lundi, jour de fermeture. Anna appelle la pêcherie et les Jardins du Flon, note ce qui sera là pour quinze jours, et écrit les plats à partir de cette liste, jamais l’inverse.',
                    'Quand le lac ne donne pas, la ligne disparaît : nous ne servons ni perche d’élevage ni poisson venu d’ailleurs. En salle, on vous dira ce qui la remplace ce soir-là.',
                    'À midi, du mardi au vendredi, le plat du jour est écrit à l’ardoise à 11 h. Il part vite : passé 13 h, il arrive qu’il n’y en ait plus.',
                ],
            ],
        ],
        '/the-house' => [
            'label' => 'La maison',
            'hero' => [
                'eyebrow' => 'La maison',
                'title' => 'Une ancienne remise à bateaux, depuis 2011',
                'lead' => 'Anna Verdi a repris la remise du port avec un four à bois et une idée simple : cuisiner ce qui arrive le matin.',
                'subject' => 'La façade de la remise, côté quai',
                'links' => [['label' => 'Réserver une table', 'to' => '/contact']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2011',
                'title' => 'Un four, un lac, quatre maraîchers',
                'lead' => 'La carte tient sur une page parce que la cuisine tient dans douze mètres carrés.',
                'body' => [
                    'Quand Anna Verdi a repris la remise, il n’y avait qu’un mur de pierre et une cheminée. Le four à bois est venu de Naples en pièces, et il a fallu un hiver pour le remonter.',
                    'La pêcherie de Rivaz livre le matin ce qu’elle a sorti la nuit. Certains jours il n’y a pas de perche, et la carte le dit plutôt que d’en faire venir d’ailleurs.',
                    'Nous sommes six : deux en salle, trois en cuisine et Anna partout. La moitié de l’équipe est là depuis l’ouverture, et la grande table de chêne aussi : elle servait d’établi au charpentier de marine.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ceux qui nous fournissent',
                'title' => 'À moins de trente kilomètres',
                'items' => [
                    ['title' => 'Pêcherie de Rivaz', 'body' => 'Perche, féra et omble, tous les matins sauf le lundi.', 'subject' => 'Un pêcheur relevant ses filets à l’aube'],
                    ['title' => 'Les Jardins du Flon', 'body' => 'Légumes de saison et herbes, deux livraisons par semaine.', 'subject' => 'Des rangs de légumes sous serre'],
                    ['title' => 'Domaine Blondel', 'body' => 'Chasselas et pinot noir de Lavaux, en bouteille et au verre.', 'subject' => 'Des vignes en terrasses au-dessus du lac'],
                ],
            ],
        ],
        '/contact' => [
            'label' => 'Venir',
            'hero' => [
                'eyebrow' => 'Venir',
                'title' => 'Réserver, nous trouver',
                'lead' => 'À quatre minutes du métro Ouchy. On réserve en ligne jusqu’à la veille à 18 h ; pour le soir même, appelez.',
                'subject' => 'La porte de l’osteria, côté quai',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'features' => [
                'eyebrow' => 'Jusqu’à la porte',
                'title' => 'En métro, en voiture, en bateau',
                'items' => [
                    ['title' => 'En métro', 'body' => 'M2 jusqu’à Ouchy-Olympique, puis quatre minutes à pied le long du quai.', 'subject' => 'La sortie du métro Ouchy, le quai derrière', 'icon' => 'tram-front'],
                    ['title' => 'En voiture', 'body' => 'Parking de la Navigation, à deux cents mètres. Le quai lui-même est piéton.', 'subject' => 'L’entrée du parking de la Navigation', 'icon' => 'square-parking'],
                    ['title' => 'En bateau', 'body' => 'Le débarcadère de la CGN est en face : on voit notre porte depuis le pont.', 'subject' => 'Un bateau de la CGN à quai, vu de la porte', 'icon' => 'ship'],
                ],
            ],
            'story' => [
                'eyebrow' => 'À plusieurs',
                'title' => 'La grande table, de huit à douze',
                'body' => [
                    'Face au four, une seule table de chêne prend huit à douze personnes. Elle se réserve une semaine à l’avance, avec un menu unique à 68.– convenu au téléphone : trois plats, le pain du four et le café.',
                    'Au-delà de douze, nous fermons la salle pour vous le dimanche soir, jusqu’à vingt-huit couverts. Écrivez-nous la date et le nombre : Anna rappelle elle-même.',
                ],
            ],
        ],
    ],
];
