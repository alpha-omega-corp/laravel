<?php

declare(strict_types=1);

/*
 * The demo content of a café: a fictional thirty-eight seat neighbourhood café
 * in a former chemist's shop in the old town of Neuchâtel, open from the first
 * coffee to the last song three nights a week. `site` is what every page
 * shares, `prefabs` is what the site would bind as `kit.<name>` — the rows its
 * owner keeps in the admin, in each component's own prop names — and `pages`
 * holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/cafe.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Café Loupiote',
        'blurb' => 'Un café de quartier dans une ancienne droguerie : petit-déjeuner, plat du jour, gâteaux maison, et trois soirs par semaine la salle reste allumée.',
        'address' => 'Rue des Moulins 14, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'bonjour@cafe-loupiote.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Café Loupiote',
        'action' => ['label' => 'Voir la carte', 'to' => '/menu'],
        'band' => [
            'eyebrow' => 'Passer',
            'title' => 'Un café, une soupe, un concert : poussez la porte',
            'lead' => 'Du mardi au dimanche, sans réservation. Les soirs de concert, la salle compte trente-huit places : les premiers arrivés s’assoient.',
            'links' => [['label' => 'Voir la carte', 'to' => '/menu'], ['label' => 'Les soirées', 'to' => '/whats-on']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue des Moulins 14, Neuchâtel'],
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'À pied', 'value' => 'Trois minutes depuis la place Pury'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Cuisine de 11:30 à 14:00. Fermé le lundi, et du 24 décembre au 4 janvier.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '7:30–18:30'],
                ['day' => 'Mercredi', 'hours' => '7:30–18:30'],
                ['day' => 'Jeudi', 'hours' => '7:30–23:00'],
                ['day' => 'Vendredi', 'hours' => '7:30–23:00'],
                ['day' => 'Samedi', 'hours' => '8:30–23:00'],
                ['day' => 'Dimanche', 'hours' => '9:00–17:00'],
            ],
        ],
        'menu' => [
            'title' => 'La carte',
            'sections' => [
                ['title' => 'Cafés et boissons chaudes', 'items' => [
                    ['name' => 'Espresso', 'price' => '3.80', 'description' => 'Le mélange maison, Brésil et Éthiopie, torréfié au Seyon'],
                    ['name' => 'Café crème', 'price' => '4.50'],
                    ['name' => 'Renversé', 'price' => '5.–', 'description' => 'Moitié café, moitié lait chaud, servi au bol'],
                    ['name' => 'Cappuccino', 'price' => '5.50', 'description' => 'Lait entier du Val-de-Ruz ou boisson d’avoine, au même prix'],
                    ['name' => 'Café filtre du moment', 'price' => '5.–', 'description' => 'Une origine par quinzaine, infusée à la tasse'],
                    ['name' => 'Chocolat chaud maison', 'price' => '5.50', 'description' => 'Chocolat noir à 70 % fondu dans le lait'],
                    ['name' => 'Thé ou tisane, la théière', 'price' => '5.–', 'description' => 'Douze sortes, dont la verveine du jardin en été'],
                ]],
                ['title' => 'Le matin, jusqu’à 11 h', 'items' => [
                    ['name' => 'Croissant au beurre', 'price' => '2.20'],
                    ['name' => 'Tartines, beurre et confiture maison', 'price' => '6.50', 'description' => 'Pain au levain, confiture de la saison'],
                    ['name' => 'Birchermüesli', 'price' => '8.50', 'description' => 'Flocons d’avoine, pomme râpée, noisettes, yogourt de la ferme'],
                    ['name' => 'Œuf à la coque et mouillettes', 'price' => '7.–'],
                    ['name' => 'Petit-déjeuner Loupiote', 'price' => '16.–', 'description' => 'Une boisson chaude, un jus pressé, un croissant, des tartines et un petit bircher'],
                ]],
                ['title' => 'À midi, de 11 h 30 à 14 h', 'items' => [
                    ['name' => 'Soupe du jour, pain au levain', 'price' => '9.50', 'description' => 'Toujours végétarienne'],
                    ['name' => 'Plat du jour', 'price' => '19.50', 'description' => 'Écrit à l’ardoise chaque matin, servi avec la soupe ou une salade'],
                    ['name' => 'Quiche aux poireaux, salade verte', 'price' => '16.–', 'description' => 'Végétarien'],
                    ['name' => 'Croque au gruyère d’alpage et jambon à l’os', 'price' => '14.50'],
                    ['name' => 'Salade de lentilles, courge rôtie et feta', 'price' => '17.–', 'description' => 'Végétarien'],
                    ['name' => 'Assiette enfant', 'price' => '9.–', 'description' => 'Un demi-plat du jour ou des pâtes au beurre, avec un sirop'],
                ]],
                ['title' => 'Gâteaux et goûter', 'items' => [
                    ['name' => 'Gâteau du jour, la part', 'price' => '6.–', 'description' => 'Sorti du four à 10 h, annoncé à l’ardoise'],
                    ['name' => 'Tarte aux noix', 'price' => '6.50'],
                    ['name' => 'Taillaule neuchâteloise toastée, beurre', 'price' => '4.80', 'description' => 'La brioche du canton, en deux tranches épaisses'],
                    ['name' => 'Cake au citron', 'price' => '4.50'],
                    ['name' => 'Carac', 'price' => '4.80', 'description' => 'Ganache au chocolat noir sous son glaçage vert'],
                ]],
                ['title' => 'Le soir, dès 18 h', 'items' => [
                    ['name' => 'Planchette du Jura, pour deux', 'price' => '24.–', 'description' => 'Saucisson neuchâtelois, tête-de-moine, gruyère, cornichons'],
                    ['name' => 'Tartine chaude au fromage', 'price' => '14.–', 'description' => 'Pain au levain, gruyère et vin blanc, passée au four'],
                    ['name' => 'Œil-de-perdrix de Neuchâtel, le verre', 'price' => '7.–', 'description' => 'Un rosé de pinot noir, domaine d’Auvernier'],
                    ['name' => 'Bière artisanale du Vallon, 33 cl', 'price' => '6.50'],
                    ['name' => 'Sirop maison, 3 dl', 'price' => '4.–', 'description' => 'Sureau, menthe ou coing'],
                    ['name' => 'Jus de pomme du Val-de-Ruz, 3 dl', 'price' => '5.–'],
                ]],
            ],
        ],
        'events' => [
            'title' => 'Les prochaines soirées',
            'events' => [
                ['date' => 'jeudi 19 novembre', 'time' => '20 h 30', 'datetime' => '2026-11-19T20:30', 'name' => 'Concert : Trio Nardin, jazz manouche', 'description' => 'Deux guitares et une contrebasse, deux sets de quarante minutes. Entrée libre, chapeau à la sortie.'],
                ['date' => 'samedi 21 novembre', 'time' => '10 h', 'datetime' => '2026-11-21T10:00', 'name' => 'Atelier : trois cafés filtre à comparer', 'description' => 'Maëlle fait goûter trois origines et montre comment régler sa mouture à la maison. Douze places, 25.– par personne, inscription au comptoir.'],
                ['date' => 'jeudi 26 novembre', 'time' => '20 h', 'datetime' => '2026-11-26T20:00', 'name' => 'Le quiz du dernier jeudi', 'description' => 'Six manches, quarante questions, des équipes de quatre au plus. La table gagnante repart avec un kilo de café.'],
                ['date' => 'vendredi 4 décembre', 'time' => '19 h 30', 'datetime' => '2026-12-04T19:30', 'name' => 'Lecture : Colette Jeanrenaud, « L’Hiver au bord »', 'description' => 'Une heure de lecture puis les questions de la salle. La librairie d’en face tient la table des livres.'],
                ['date' => 'dimanche 6 décembre', 'time' => '15 h', 'datetime' => '2026-12-06T15:00', 'name' => 'Goûter de la Saint-Nicolas', 'description' => 'Bonshommes de pâte, chocolat chaud et contes pour les enfants dès quatre ans. 8.– par enfant, les parents boivent le café.'],
                ['date' => 'jeudi 10 décembre', 'time' => '20 h 30', 'datetime' => '2026-12-10T20:30', 'name' => 'Concert : Léa Borel, chansons au piano', 'description' => 'Ses propres textes et quelques reprises de Barbara, sur le piano droit de la salle. Entrée libre, chapeau à la sortie.'],
                ['date' => 'samedi 19 décembre', 'time' => '17 h', 'datetime' => '2026-12-19T17:00', 'name' => 'Vin chaud et chants de l’Avent', 'description' => 'Le Chœur des Moulins chante devant la porte, puis à l’intérieur s’il gèle. Vin chaud et jus de pomme chaud à 4.–.'],
                ['date' => 'jeudi 14 janvier', 'time' => '20 h', 'datetime' => '2027-01-14T20:00', 'name' => 'Scène ouverte', 'description' => 'Dix minutes par passage : une chanson, un texte, un tour de cartes. On s’inscrit sur la feuille du comptoir dès 19 h.'],
            ],
        ],
        'map' => [
            'address' => 'Rue des Moulins 14, 2000 Neuchâtel',
            'title' => 'Café Loupiote',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Café de quartier · Neuchâtel',
                'title' => 'Le café du matin, la soupe de midi, le concert du jeudi',
                'lead' => 'Une ancienne droguerie de 1924, trente-huit places et un comptoir en noyer. Tout est fait sur place, du bircher au gâteau du jour, et trois soirs par semaine la salle reste allumée jusqu’à 23 h.',
                'subject' => 'Le comptoir en noyer le matin, le mur de tiroirs de l’ancienne droguerie derrière',
                'note' => 'Ce jeudi 19 novembre : Trio Nardin, jazz manouche, à 20 h 30',
                'links' => [['label' => 'Voir la carte', 'to' => '/menu'], ['label' => 'Les soirées', 'to' => '/whats-on']],
                'facts' => [
                    ['value' => '7 h 30', 'label' => 'Le premier café, en semaine'],
                    ['value' => '19.50', 'label' => 'Le plat du jour'],
                    ['value' => '3 soirs', 'label' => 'Concert, quiz ou lecture'],
                ],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Trois raisons de pousser la porte',
                'lead' => 'Ce qu’on boit et ce qu’on mange, ce qui se joue le soir, et le lieu lui-même.',
                'items' => [
                    ['title' => 'La carte', 'body' => 'Le café vient de la Torréfaction du Seyon, à six cents mètres. La soupe est toujours végétarienne et le plat du jour est à 19.50.', 'subject' => 'Un renversé au bol et une part de tarte aux noix sur le comptoir', 'to' => '/menu', 'label' => 'Toute la carte et ses prix'],
                    ['title' => 'Les soirées', 'body' => 'Jeudi, vendredi et samedi, la salle reste ouverte jusqu’à 23 h : un concert, un quiz, une lecture. L’entrée est libre.', 'subject' => 'Un trio de guitares sous les lampes, la salle pleine', 'to' => '/whats-on', 'label' => 'Le programme des soirées'],
                    ['title' => 'La droguerie', 'body' => 'Cent quarante-quatre tiroirs de chêne, un carrelage de ciment et la lampe d’enseigne qui a donné son nom au café.', 'subject' => 'Le mur de tiroirs en chêne, chacun sous son étiquette d’émail', 'to' => '/about', 'label' => 'L’histoire de la maison'],
                ],
            ],
        ],
        '/menu' => [
            'label' => 'La carte',
            'hero' => [
                'eyebrow' => 'La carte',
                'title' => 'Ce qu’on sert, et ce que ça coûte',
                'lead' => 'Le petit-déjeuner jusqu’à 11 h, la cuisine de 11 h 30 à 14 h, les gâteaux toute la journée et une planchette le soir. Prix en francs, service compris.',
                'subject' => 'L’ardoise du jour posée contre la machine à café',
                'links' => [['label' => 'Commander un gâteau entier', 'href' => 'tel:+41320000000'], ['label' => 'Les soirées', 'to' => '/whats-on']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Allergies, à l’emporter et gâteaux entiers',
                'items' => [
                    ['title' => 'Allergies et régimes', 'body' => 'Chaque plat de l’ardoise porte ses allergènes. La soupe est végétarienne, et le plus souvent sans gluten ni lactose : demandez au comptoir.', 'icon' => 'wheat-off'],
                    ['title' => 'À l’emporter', 'body' => 'Tous les cafés, la soupe et les gâteaux partent avec vous. Vingt centimes de moins sur la boisson si vous apportez votre tasse.', 'icon' => 'shopping-bag'],
                    ['title' => 'Gâteaux entiers', 'body' => 'Tarte aux noix, cake au citron ou gâteau du jour pour huit à dix personnes, dès 42.–. À commander deux jours avant, par téléphone.', 'icon' => 'cake-slice'],
                ],
            ],
        ],
        '/whats-on' => [
            'label' => 'Les soirées',
            'hero' => [
                'eyebrow' => 'Les soirées',
                'title' => 'Trois soirs par semaine, la salle reste allumée',
                'lead' => 'Un concert le jeudi, un quiz le dernier jeudi du mois, une lecture un vendredi sur deux. L’entrée est libre et le chapeau passe à la fin ; on ne réserve pas, les premiers arrivés s’assoient.',
                'subject' => 'La salle un soir de concert, les lampes basses et les tables serrées',
                'links' => [['label' => 'La carte du soir', 'to' => '/menu']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2018',
                'title' => 'Le premier concert devait être le seul',
                'lead' => 'Il y a eu du monde jusque sur le trottoir, et nous avons recommencé le jeudi suivant.',
                'body' => [
                    'En novembre 2018, un client contrebassiste a demandé s’il pouvait jouer un soir avec deux amis guitaristes. Nous avons poussé les tables contre le mur de tiroirs, sorti les trente-huit chaises et laissé la porte ouverte. Depuis, le jeudi est le soir du concert : du jazz, de la chanson, parfois un quatuor d’élèves du Conservatoire, toujours sans amplification.',
                    'Le quiz est venu d’une habituée, Sylvie Matthey, qui écrit encore chaque manche à la main : six manches, quarante questions, dont toujours une sur Neuchâtel. Les lectures se tiennent un vendredi sur deux avec la librairie d’en face, qui choisit les invités, apporte les livres et tient la caisse.',
                    'L’entrée est libre et le restera. Un chapeau passe à la fin et tout ce qu’il contient va aux artistes ; le café vit de ce qui se boit et se mange pendant la soirée. La cuisine du soir s’arrête à 21 h 30, le bar à 22 h 45, et à 23 h la lampe d’enseigne s’éteint.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois rendez-vous',
                'title' => 'Le programme change, les jours restent',
                'items' => [
                    ['title' => 'Le jeudi, un concert', 'body' => 'À 20 h 30, deux sets de quarante minutes : jazz, chanson ou musique de chambre. Sauf le dernier jeudi du mois.', 'subject' => 'Une contrebasse et deux guitares entre les tables, sous les lampes'],
                    ['title' => 'Le dernier jeudi, le quiz', 'body' => 'Six manches, des équipes de quatre au plus, et un kilo de café pour la table gagnante.', 'subject' => 'Des équipes penchées sur leurs feuilles de réponses'],
                    ['title' => 'Un vendredi sur deux, une lecture', 'body' => 'Une heure de lecture, puis l’autrice ou l’auteur répond à la salle. Les livres sont en vente sur place.', 'subject' => 'Une autrice lisant sous la lampe, un verre d’eau sur le tabouret'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Jouer, lire, proposer',
                'title' => 'Vous avez une soirée à nous proposer ?',
                'lead' => 'Un trio, un texte, un jeu : écrivez-nous ou passez au comptoir un matin de semaine. Le programme se décide six semaines à l’avance.',
                'links' => [['label' => 'Écrire au café', 'href' => 'mailto:bonjour@cafe-loupiote.example'], ['label' => 'La carte du soir', 'to' => '/menu']],
                'details' => [
                    ['label' => 'La salle', 'value' => 'Trente-huit places assises, un piano droit'],
                    ['label' => 'Les soirs', 'value' => 'Jeudi, vendredi et samedi jusqu’à 23 h'],
                    ['label' => 'L’entrée', 'value' => 'Libre, chapeau pour les artistes'],
                ],
            ],
        ],
        '/about' => [
            'label' => 'La maison',
            'hero' => [
                'eyebrow' => 'La maison',
                'title' => 'Une droguerie de 1924, un café depuis 2017',
                'lead' => 'Maëlle Favre et Jonas Perret ont repris la droguerie Borel avec ses tiroirs, son carrelage et sa lampe d’enseigne. C’est elle, la loupiote.',
                'subject' => 'La devanture de l’ancienne droguerie, la lampe d’enseigne allumée au-dessus de la porte',
                'links' => [['label' => 'Voir la carte', 'to' => '/menu'], ['label' => 'Les soirées', 'to' => '/whats-on']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2017',
                'title' => 'Les tiroirs sont restés, les habitués aussi',
                'lead' => 'La droguerie Borel a fermé en 2015, après quatre-vingt-onze ans. Nous avons gardé tout ce qui tenait encore au mur.',
                'body' => [
                    'Quand Maëlle Favre et Jonas Perret ont repris le bail, le local n’avait pas bougé depuis la fermeture : cent quarante-quatre tiroirs de chêne à étiquettes d’émail, un carrelage de ciment et, au-dessus de la porte, la lampe que le droguiste allumait les soirs d’hiver pour dire qu’il était encore là.',
                    'Maëlle tenait la machine à café d’un torréfacteur bernois ; Jonas sortait de sept ans de pâtisserie à La Chaux-de-Fonds. Ils ont posé un comptoir en noyer devant les tiroirs, une cuisine de neuf mètres carrés derrière, et ouvert le 2 mai 2017 avec une soupe, trois gâteaux et une seule sorte de café.',
                    'Nous sommes sept aujourd’hui, dont quatre depuis la première année. Le lait, le pain et le café viennent de moins de vingt kilomètres, et les tiroirs servent toujours : le sucre, les thés et les jeux de cartes y sont rangés, sous les étiquettes d’origine.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ceux qui nous fournissent',
                'title' => 'À moins de vingt kilomètres',
                'items' => [
                    ['title' => 'Torréfaction du Seyon', 'body' => 'Le mélange maison et un café filtre différent chaque quinzaine, torréfiés le mardi et livrés à vélo.', 'subject' => 'Un torréfacteur vidant le tambour dans le bac de refroidissement'],
                    ['title' => 'Ferme Jeanneret, Val-de-Ruz', 'body' => 'Le lait entier, le yogourt, les œufs et le beurre : deux livraisons par semaine, dans des bidons que nous rendons.', 'subject' => 'Des bidons de lait devant une ferme du Val-de-Ruz'],
                    ['title' => 'Boulangerie Schaller', 'body' => 'Le pain au levain, les croissants et la taillaule du dimanche, cuits à cent mètres du comptoir.', 'subject' => 'Des taillaules tressées à la sortie du four'],
                ],
            ],
        ],
    ],
];
