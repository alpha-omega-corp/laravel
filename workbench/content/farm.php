<?php

declare(strict_types=1);

/*
 * The demo content of a farm: a fictional eighteen-hectare family farm at
 * Gollion, above Morges, that sells what it grows at its own shop, at the
 * Saturday market and by the box. `site` is what every page shares, `prefabs`
 * is what the site would bind as `kit.<name>` — the rows its owner keeps in
 * the admin, in each component's own prop names — and `pages` holds each
 * page's words, keyed by its path in `.claude/skills/ui-kit/businesses/farm.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Ferme des Trois Noyers',
        'blurb' => 'Légumes, pommes, œufs, farine et viande de la ferme, vendus dans la cour et au marché de Morges.',
        'address' => 'Chemin des Noyers, 1124 Gollion',
        'phone' => '021 000 00 00',
        'email' => 'bonjour@trois-noyers.example',
        'status' => 'Magasin ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Ferme des Trois Noyers · Famille Jaquier',
        'action' => ['label' => 'Voir les produits', 'to' => '/products'],
        'band' => [
            'eyebrow' => 'Venir',
            'title' => 'On vous attend dans la cour',
            'lead' => 'Le magasin est ouvert du mercredi au samedi. Le samedi matin, on nous trouve aussi au marché de Morges, devant la fontaine de la Grand-Rue.',
            'links' => [['label' => 'Voir les produits', 'to' => '/products'], ['label' => 'Marchés et dates', 'to' => '/markets']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Chemin des Noyers, Gollion'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Accès', 'value' => 'Après le lavoir, le chemin de terre à gauche'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'panier-de-saison', 'name' => 'Panier de saison', 'price' => 'CHF 32', 'description' => 'Sept à neuf légumes de la semaine, pour deux ou trois personnes. À retirer le vendredi au magasin ou le samedi à Morges.'],
                ['id' => 'pommes-boskoop', 'name' => 'Pommes Boskoop, le kilo', 'price' => '3.80', 'description' => 'Du verger haute-tige, cueillies en octobre. Acidulées, pour la tarte et la compote.'],
                ['id' => 'jus-de-pomme', 'name' => 'Jus de pomme, 5 litres', 'price' => '16.–', 'description' => 'Pressé à la ferme, pasteurisé, en cubi. Se garde trois mois une fois ouvert.'],
                ['id' => 'oeufs', 'name' => 'Œufs de plein air, les six', 'price' => '4.80', 'description' => 'Ramassés chaque matin. Les poules sortent sous les noyers toute l’année.'],
                ['id' => 'pommes-de-terre', 'name' => 'Pommes de terre Agria, 5 kg', 'price' => '9.–', 'description' => 'Chair farineuse : pour la purée, les röstis et le four.'],
                ['id' => 'courge-musquee', 'name' => 'Courge musquée, le kilo', 'price' => '3.50', 'description' => 'Vendue entière ou à la tranche. Se garde jusqu’en février au frais.'],
                ['id' => 'farine-mi-blanche', 'name' => 'Farine mi-blanche, 1 kg', 'price' => '4.20', 'description' => 'Notre blé, moulu sur meule au moulin du village voisin.'],
                ['id' => 'caissette-de-boeuf', 'name' => 'Caissette de bœuf, 5 kg', 'price' => 'CHF 165', 'description' => 'Rôti, émincé, haché et ragoût, sous vide. Sur réservation ; la prochaine est prête le 5 décembre.'],
                ['id' => 'miel-de-fleurs', 'name' => 'Miel de fleurs, 500 g', 'price' => '14.–', 'description' => 'Les ruches de notre voisin sont au bord du verger. Récolte de juillet.'],
            ],
        ],
        'schedule' => [
            'title' => 'Magasin de la ferme',
            'note' => 'Le samedi matin, nous sommes aussi au marché de Morges. Fermé du 24 décembre au 6 janvier.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => null],
                ['day' => 'Mercredi', 'hours' => '14:00–18:30'],
                ['day' => 'Jeudi', 'hours' => '14:00–18:30'],
                ['day' => 'Vendredi', 'hours' => '9:00–12:00 · 14:00–18:30'],
                ['day' => 'Samedi', 'hours' => '8:30–16:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'events' => [
            'title' => 'Marchés et rendez-vous',
            'events' => [
                ['date' => 'samedi 21 novembre', 'time' => '8 h–12 h 30', 'datetime' => '2026-11-21T08:00', 'name' => 'Marché de Morges', 'description' => 'Grand-Rue, devant la fontaine. Courges, Boskoop, jus frais et les derniers poireaux de plein champ.'],
                ['date' => 'mercredi 25 novembre', 'time' => '16 h–19 h', 'datetime' => '2026-11-25T16:00', 'name' => 'Marché du soir à Cossonay', 'description' => 'Place du Temple, sous les lampions. Soupe à la courge à 4.– le bol, servie au stand.'],
                ['date' => 'samedi 28 novembre', 'time' => '8 h–12 h 30', 'datetime' => '2026-11-28T08:00', 'name' => 'Marché de Morges', 'description' => 'Dernier samedi pour réserver la caissette de bœuf du 5 décembre.'],
                ['date' => 'samedi 5 décembre', 'time' => '9 h–16 h', 'datetime' => '2026-12-05T09:00', 'name' => 'Vente de viande à la ferme', 'description' => 'Retrait des caissettes réservées, et quelques pièces au détail pour ceux qui passent.'],
                ['date' => 'samedi 12 décembre', 'time' => '10 h–17 h', 'datetime' => '2026-12-12T10:00', 'name' => 'Marché de Noël dans la grange', 'description' => 'Huit producteurs voisins, jus de pomme chaud à la cannelle et sapins de la forêt communale.'],
                ['date' => 'samedi 19 décembre', 'time' => '8 h–12 h 30', 'datetime' => '2026-12-19T08:00', 'name' => 'Dernier marché de l’année', 'description' => 'À Morges. Paniers de fête sur commande jusqu’au mercredi 16 décembre.'],
                ['date' => 'samedi 9 janvier', 'time' => '8 h–12 h 30', 'datetime' => '2027-01-09T08:00', 'name' => 'Reprise au marché de Morges', 'description' => 'Légumes de garde, pommes du cellier et la farine de la nouvelle récolte.'],
                ['date' => 'samedi 13 mars', 'time' => '10 h–16 h', 'datetime' => '2027-03-13T10:00', 'name' => 'Taille du verger, ferme ouverte', 'description' => 'Benoît montre la taille des pommiers à 10 h et à 14 h. Soupe et pain au feu de bois à midi.'],
            ],
        ],
        'map' => [
            'address' => 'Chemin des Noyers, 1124 Gollion',
            'title' => 'La cour aux trois noyers, après le lavoir',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Ferme et magasin · Gollion',
                'title' => 'Ce qui pousse ici se vend ici',
                'lead' => 'Légumes, pommes, œufs, farine et viande de nos dix-huit hectares, à vingt minutes de Lausanne. Le magasin est dans la cour ; le samedi matin, l’étal est à Morges.',
                'subject' => 'La cour de la ferme, des cagettes de courges sous les trois noyers',
                'note' => 'Cette semaine : courges, Boskoop et jus de pomme frais',
                'links' => [['label' => 'Voir les produits', 'to' => '/products'], ['label' => 'Marchés et dates', 'to' => '/markets']],
                'facts' => [['value' => '18 ha', 'label' => 'Cultures, prés et verger'], ['value' => '40', 'label' => 'Légumes dans l’année'], ['value' => '1958', 'label' => 'Les Jaquier à Gollion']],
            ],
            'features' => [
                'eyebrow' => 'À la ferme',
                'title' => 'De saison, d’ici, sans intermédiaire',
                'lead' => 'Trois façons de remplir son panier, et une famille derrière chacune.',
                'items' => [
                    ['title' => 'L’étal de la semaine', 'body' => 'Courges, poireaux, Boskoop et pommes de terre Agria. La liste change chaque mercredi, avec les prix du magasin.', 'subject' => 'Des cagettes de légumes d’automne sur l’étal du magasin', 'to' => '/products', 'label' => 'Les produits et leurs prix'],
                    ['title' => 'Les marchés', 'body' => 'Morges tous les samedis matin, Cossonay un mercredi soir par mois, et la grange à Noël.', 'subject' => 'Le stand de la ferme sous son parasol vert, à Morges', 'to' => '/markets', 'label' => 'Les prochaines dates'],
                    ['title' => 'La famille', 'body' => 'Trois générations de Jaquier dans la même cour, en bio depuis 2004.', 'subject' => 'Claire, Benoît et Élise Jaquier devant la grange', 'to' => '/our-story', 'label' => 'L’histoire de la ferme'],
                ],
            ],
        ],
        '/products' => [
            'label' => 'Produits',
            'hero' => [
                'eyebrow' => 'Produits',
                'title' => 'L’étal de cette semaine',
                'lead' => 'Ce que nous récoltons et transformons nous-mêmes, au prix du magasin. La liste change chaque mercredi ; ce qui manque est écrit à la craie sur la porte.',
                'subject' => 'L’étal du magasin, les prix à la craie sur l’ardoise',
                'links' => [['label' => 'Réserver au 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Nous trouver au marché', 'to' => '/markets']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Payer, réserver, rapporter',
                'items' => [
                    ['title' => 'Paiement', 'body' => 'Espèces, Twint et carte au magasin. Au marché, espèces et Twint seulement.', 'icon' => 'wallet'],
                    ['title' => 'Réservation', 'body' => 'Le panier et la caissette de bœuf se réservent par téléphone jusqu’au mercredi soir.', 'icon' => 'phone'],
                    ['title' => 'Consigne', 'body' => 'Cubis de jus et boîtes d’œufs sont repris : rapportez-les, nous les remplissons.', 'icon' => 'recycle'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment nous cultivons',
                'title' => 'En bio, en plein champ, sans serre chauffée',
                'body' => [
                    'Tout ce qui est sur l’étal vient de nos dix-huit hectares, à l’exception du miel, que notre voisin apiculteur récolte au bord du verger. Nous cultivons en bio depuis 2004 et sans serre chauffée : il n’y a pas de tomates en mars, et l’étal le dit.',
                    'Les prix sont les mêmes au magasin et au marché. Quand une récolte est abondante, ils baissent ; quand le gel passe sur le verger, il y a moins de pommes et nous l’écrivons ici plutôt que d’en acheter ailleurs.',
                ],
            ],
        ],
        '/markets' => [
            'label' => 'Marchés',
            'hero' => [
                'eyebrow' => 'Marchés et rendez-vous',
                'title' => 'Où nous trouver cet hiver',
                'lead' => 'À Morges tous les samedis matin, à Cossonay un mercredi soir par mois, et à la ferme pour la viande, Noël et la taille du verger.',
                'subject' => 'Le stand de la ferme sous son parasol vert, Grand-Rue à Morges',
                'links' => [['label' => 'Voir les produits', 'to' => '/products']],
            ],
            'features' => [
                'eyebrow' => 'Trois rendez-vous',
                'title' => 'Le samedi, le soir, et dans la cour',
                'items' => [
                    ['title' => 'Morges, le samedi', 'body' => 'De 8 h à 12 h 30, Grand-Rue, devant la fontaine. Toute l’année, sauf entre Noël et le 6 janvier.', 'subject' => 'Le stand à Morges un samedi matin, la file devant les cagettes'],
                    ['title' => 'Cossonay, le soir', 'body' => 'Le dernier mercredi du mois, de 16 h à 19 h, place du Temple. On y retire aussi les paniers.', 'subject' => 'Le marché du soir sous les lampions, place du Temple'],
                    ['title' => 'À la ferme', 'body' => 'La vente de viande en décembre, le marché de Noël dans la grange et la journée de taille en mars.', 'subject' => 'La grange décorée pour le marché de Noël'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Au marché',
                'title' => 'Le même emplacement depuis 1987',
                'body' => [
                    'Claire tient le stand de Morges depuis 1987, au même emplacement devant la fontaine de la Grand-Rue. On y trouve ce qu’il y a au magasin, récolté la veille, et l’on peut y retirer un panier réservé.',
                    'Par gros temps le marché a lieu quand même ; seule la bise noire nous fait replier le parasol avant midi. Une date qui change est annoncée ici et sur l’ardoise du magasin.',
                ],
            ],
        ],
        '/our-story' => [
            'label' => 'Notre histoire',
            'hero' => [
                'eyebrow' => 'Notre histoire',
                'title' => 'Trois noyers, trois générations',
                'lead' => 'Marcel Jaquier a planté les noyers en 1958, un par enfant. Sa petite-fille Élise cultive aujourd’hui le jardin qu’ils abritent de la bise.',
                'subject' => 'Les trois noyers devant la ferme, un matin d’automne',
                'links' => [['label' => 'Voir les produits', 'to' => '/products'], ['label' => 'Nous trouver au marché', 'to' => '/markets']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1958',
                'title' => 'Du lait au verger, du verger au jardin',
                'lead' => 'La ferme a changé de métier deux fois sans changer de famille.',
                'body' => [
                    'En 1958, Marcel Jaquier reprend la ferme avec douze vaches et plante trois noyers dans la cour. Pendant trente ans, le lait part chaque matin à la laiterie du village.',
                    'En 1987, son fils Benoît et Claire arrêtent le lait, gardent un troupeau de vaches allaitantes et plantent le verger : deux cents pommiers haute-tige, des Boskoop surtout. Claire ouvre le stand de Morges la même année. La ferme passe en bio en 2004.',
                    'Élise est revenue en 2019, après son école d’agriculture, avec l’idée du jardin : un hectare de légumes de plein champ, quarante espèces dans l’année, et les paniers du vendredi. Nous sommes cinq à y travailler aujourd’hui, dont deux apprentis.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce que la ferme fait vivre',
                'title' => 'Trois métiers dans une cour',
                'items' => [
                    ['title' => 'Le jardin', 'body' => 'Élise et deux apprentis cultivent un hectare de légumes de plein champ, sans serre chauffée.', 'subject' => 'Élise Jaquier au milieu des rangs de poireaux'],
                    ['title' => 'Le verger', 'body' => 'Deux cents pommiers haute-tige, que Benoît taille en mars et presse en octobre.', 'subject' => 'Benoît Jaquier sur l’échelle, dans le verger'],
                    ['title' => 'Le troupeau', 'body' => 'Vingt vaches allaitantes, l’été au pré derrière la ferme, l’hiver au foin de la maison.', 'subject' => 'Des vaches au pré derrière la ferme'],
                ],
            ],
        ],
    ],
];
