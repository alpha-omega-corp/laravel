<?php

declare(strict_types=1);

/*
 * The demo content of a shop: a fictional épicerie fine in Nyon, kept in the
 * old droguerie of the rue de Rive. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its owner
 * keeps in the admin, in each component's own prop names — and `pages` holds
 * each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/shop.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Le Bocal',
        'blurb' => 'Épicerie fine du pied du Jura et de La Côte, dans l’ancienne droguerie de la rue de Rive.',
        'address' => 'Rue de Rive 22, 1260 Nyon',
        'phone' => '022 000 00 00',
        'email' => 'bonjour@le-bocal.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Le Bocal Sàrl · Prix en francs suisses, TVA comprise',
        'action' => ['label' => 'Commander', 'to' => '/order'],
        'band' => [
            'eyebrow' => 'Commander',
            'title' => 'Un coffret pour samedi ?',
            'lead' => 'Commandez par téléphone ou par e-mail avant 16 h : tout est prêt au comptoir le lendemain, ou livré à vélo dans Nyon.',
            'links' => [['label' => 'Commander', 'to' => '/order'], ['label' => 'Voir les produits', 'to' => '/products']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue de Rive 22, Nyon'],
                ['label' => 'Téléphone', 'value' => '022 000 00 00', 'href' => 'tel:+41220000000'],
                ['label' => 'Gare', 'value' => 'Nyon, huit minutes à pied en descendant'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'bocal-du-mois', 'name' => 'Le Bocal du mois', 'price' => 'CHF 48', 'description' => 'Six produits choisis chaque mois, dans leur caisse de bois consignée. En novembre : vacherin, noix, miel de forêt, pain d’épices, moût de raisin et saucisson.'],
                ['id' => 'gruyere-alpage', 'name' => 'Gruyère d’alpage AOP, 24 mois', 'price' => '9.50', 'description' => 'Les 250 g, coupés à la demande. Fabriqué au feu de bois à l’alpage de la Bassine, affiné deux hivers.'],
                ['id' => 'vacherin-mont-dor', 'name' => 'Vacherin Mont-d’Or AOP', 'price' => '14.–', 'description' => 'La boîte de 400 g, cerclée d’épicéa à la vallée de Joux. De la mi-septembre à la fin mars, pas un jour de plus.'],
                ['id' => 'saucisson-vaudois', 'name' => 'Saucisson vaudois IGP', 'price' => '12.–', 'description' => 'La pièce de 350 g environ, fumée au bois de hêtre à Gimel. À pocher quarante minutes, sans la piquer.'],
                ['id' => 'huile-de-noix', 'name' => 'Huile de noix, 25 cl', 'price' => '16.–', 'description' => 'Pressée à froid à l’huilerie de la Promenthouse avec les noix de La Côte. Pour la salade, jamais pour la poêle.'],
                ['id' => 'confiture-pruneaux', 'name' => 'Confiture de pruneaux, 240 g', 'price' => '8.50', 'description' => 'Cuite ici, dans l’arrière-boutique, en chaudron de cuivre : 65 % de fruits et une pointe de cannelle.'],
                ['id' => 'miel-de-foret', 'name' => 'Miel de forêt, 500 g', 'price' => '14.–', 'description' => 'Du rucher de Genolier, récolté en août. Sombre, peu sucré, il ne cristallise pas avant le printemps.'],
                ['id' => 'cafe-du-quai', 'name' => 'Café « Le Quai », 250 g', 'price' => '11.–', 'description' => 'Un mélange Brésil et Éthiopie torréfié chaque mardi à Nyon. En grains, ou moulu devant vous.'],
                ['id' => 'chocolat-noisettes', 'name' => 'Chocolat noir aux noisettes, 100 g', 'price' => '8.–', 'description' => 'Une tablette à 70 % de cacao, noisettes entières du Piémont, cassée à la main par un chocolatier de Rolle.'],
                ['id' => 'chasselas-la-cote', 'name' => 'Chasselas de La Côte, 75 cl', 'price' => '17.–', 'description' => 'Un Luins grand cru du domaine de la Combaz, millésime 2025. Le vin de l’apéritif et de la fondue.'],
            ],
        ],
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le dimanche et le lundi. Le vendredi et le samedi, jour de marché, nous ne fermons pas à midi.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '9:00–12:30 · 14:00–18:30'],
                ['day' => 'Mercredi', 'hours' => '9:00–12:30 · 14:00–18:30'],
                ['day' => 'Jeudi', 'hours' => '9:00–12:30 · 14:00–18:30'],
                ['day' => 'Vendredi', 'hours' => '9:00–18:30'],
                ['day' => 'Samedi', 'hours' => '8:00–17:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'map' => [
            'address' => 'Rue de Rive 22, 1260 Nyon',
            'title' => 'Le Bocal, l’ancienne droguerie côté lac',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Épicerie fine · Nyon',
                'title' => 'Le pied du Jura et La Côte, sur un seul comptoir',
                'lead' => 'Cent quarante produits, trente et un producteurs que nous appelons par leur prénom, et un comptoir où l’on goûte avant d’acheter.',
                'subject' => 'Le comptoir de noyer, les tiroirs de l’ancienne droguerie derrière',
                'note' => 'Le vacherin Mont-d’Or est arrivé mardi',
                'links' => [['label' => 'Commander', 'to' => '/order'], ['label' => 'Voir les produits', 'to' => '/products']],
                'facts' => [['value' => '140', 'label' => 'Produits en rayon'], ['value' => '31', 'label' => 'Producteurs, tous visités'], ['value' => '2014', 'label' => 'Ouvert rue de Rive']],
            ],
            'features' => [
                'eyebrow' => 'Cette semaine',
                'title' => 'Trois raisons de pousser la porte',
                'lead' => 'Ce qui vient d’arriver, ceux qui le font, et le coffret qui vous attend au comptoir.',
                'items' => [
                    ['title' => 'Les arrivages', 'body' => 'Le vacherin Mont-d’Or, les noix de La Côte et le moût de raisin sont là depuis mardi. L’ardoise derrière le comptoir change chaque semaine.', 'subject' => 'Une boîte de vacherin ouverte sur le comptoir, une cuillère dedans', 'to' => '/products', 'label' => 'Tous les produits'],
                    ['title' => 'Les producteurs', 'body' => 'Trente et un, de l’alpage à l’huilerie : nous sommes allés chez chacun avant de mettre un seul de ses bocaux en rayon.', 'subject' => 'Un fromager retournant une meule dans sa cave', 'to' => '/our-story', 'label' => 'Notre histoire'],
                    ['title' => 'Le coffret', 'body' => 'Six produits dans une caisse de bois, composés pour vous ou choisis par vos soins. Commandé avant 16 h, prêt le lendemain.', 'subject' => 'Une caisse de bois garnie, nouée d’une ficelle', 'to' => '/order', 'label' => 'Commander un coffret'],
                ],
            ],
        ],
        '/products' => [
            'label' => 'Produits',
            'hero' => [
                'eyebrow' => 'Les produits',
                'title' => 'Ce qu’il y a sur le comptoir cette semaine',
                'lead' => 'Dix produits que l’on vient chercher de loin, parmi les cent quarante du magasin. Le reste se découvre sur place : on goûte avant d’acheter.',
                'subject' => 'Les rayonnages de bocaux, du sol au plafond',
                'links' => [['label' => 'Commander', 'to' => '/order']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'À la coupe, en consigne, en cadeau',
                'items' => [
                    ['title' => 'À la coupe', 'body' => 'Fromages et charcuteries sont coupés devant vous, au poids que vous dites : cent grammes de gruyère ne nous font pas peur.', 'icon' => 'scale'],
                    ['title' => 'Bocaux consignés', 'body' => 'Chaque bocal de la maison est consigné 2.– : rapportez-le rincé, nous le déduisons de votre prochain achat.', 'icon' => 'recycle'],
                    ['title' => 'Emballage cadeau', 'body' => 'Papier kraft, ficelle et carte écrite à la main : c’est offert, et prêt en cinq minutes.', 'icon' => 'gift'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment nous choisissons',
                'title' => 'Un rayon tient à trois règles',
                'lead' => 'Nous refusons plus de produits que nous n’en prenons.',
                'body' => [
                    'Un produit entre au Bocal quand nous avons vu où il est fait. Hélène passe ses lundis sur la route : une fromagerie d’alpage, un rucher, une huilerie. Si la porte reste fermée aux visiteurs, le bocal reste chez son producteur.',
                    'Il doit ensuite se vendre sans discours. Nous le goûtons à trois, à l’aveugle, à côté de ce que nous avons déjà : s’il ne fait ni mieux ni autrement, il n’a pas sa place sur des étagères qui ne s’allongent pas.',
                    'Enfin il suit sa saison. Le vacherin part à la fin mars, les asperges en bocal arrivent en mai, le moût en octobre. Quand un producteur n’en a plus, l’étiquette « de retour en… » le dit, et nous ne le remplaçons pas par un autre.',
                ],
            ],
        ],
        '/our-story' => [
            'label' => 'Notre histoire',
            'hero' => [
                'eyebrow' => 'Notre histoire',
                'title' => 'Une droguerie de 1924, une épicerie depuis 2014',
                'lead' => 'Hélène Marguerat a gardé les quatre-vingts tiroirs de la droguerie Perrin et les a remplis de ce que la région fait de meilleur.',
                'subject' => 'La devanture de l’ancienne droguerie, l’enseigne peinte au-dessus de la porte',
                'links' => [['label' => 'Voir les produits', 'to' => '/products']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2014',
                'title' => 'Quatre-vingts tiroirs et une balance',
                'lead' => 'Le magasin n’a presque pas changé ; ce qu’il y a dedans, entièrement.',
                'body' => [
                    'La droguerie Perrin a vendu pendant quatre-vingt-dix ans de la cire, des couleurs et des graines aux gens de Rive. Quand le dernier Perrin a pris sa retraite, Hélène Marguerat, qui tenait le rayon fromages d’un grand magasin de Genève, a repris le bail, le comptoir de noyer et la balance à plateaux.',
                    'Elle a ouvert en mars 2014 avec quarante produits et une règle : n’acheter qu’à des gens chez qui elle était allée. Ils sont trente et un aujourd’hui, presque tous entre le lac et la crête du Jura. Le café, le chocolat et les épices viennent de plus loin, par des artisans d’ici qui les torréfient, les travaillent ou les mélangent.',
                    'Nous sommes trois : Hélène au comptoir et sur la route, Samuel Aebi à la coupe et aux confitures, qu’il cuit le mercredi dans l’arrière-boutique, et Inès le samedi, quand le marché remplit la rue. Les tiroirs portent encore leurs étiquettes d’émail ; « Graines potagères » contient désormais les lentilles.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ceux qui nous fournissent',
                'title' => 'Trois des trente et un',
                'items' => [
                    ['title' => 'L’alpage de la Bassine', 'body' => 'Un gruyère d’alpage fabriqué au feu de bois de mai à octobre. Nous montons chercher nos meules en septembre.', 'subject' => 'Un chalet d’alpage sous la crête du Jura, les vaches devant'],
                    ['title' => 'Le rucher de Genolier', 'body' => 'Soixante ruches en lisière de forêt, un miel de printemps et un miel de forêt, rien d’autre.', 'subject' => 'Un apiculteur soulevant un cadre couvert d’abeilles'],
                    ['title' => 'L’huilerie de la Promenthouse', 'body' => 'Les noix et les noisettes de La Côte, pressées à froid sur une meule de 1890, à la demande.', 'subject' => 'Une meule de pierre écrasant des noix'],
                ],
            ],
        ],
        '/order' => [
            'label' => 'Commander',
            'hero' => [
                'eyebrow' => 'Commander',
                'title' => 'Commandez aujourd’hui, passez demain',
                'lead' => 'Par téléphone ou par e-mail avant 16 h : votre commande vous attend au comptoir le lendemain dès l’ouverture, et se règle sur place.',
                'subject' => 'Des caisses de bois prêtes sur le comptoir, un nom sur chaque étiquette',
                'links' => [['label' => 'Appeler le 022 000 00 00', 'href' => 'tel:+41220000000'], ['label' => 'Voir les produits', 'to' => '/products']],
            ],
            'features' => [
                'eyebrow' => 'Trois façons',
                'title' => 'Au comptoir, à vélo, par la poste',
                'items' => [
                    ['title' => 'Au comptoir', 'body' => 'Commandé avant 16 h, prêt le lendemain à l’ouverture. Nous gardons votre commande trois jours, au frais s’il le faut.', 'icon' => 'store'],
                    ['title' => 'À vélo dans Nyon', 'body' => 'Le mardi et le vendredi après-midi, de Rive à la gare et jusqu’à Prangins : 6.– la course, offerte dès 80.– d’achat.', 'icon' => 'bike'],
                    ['title' => 'Par la poste', 'body' => 'Partout en Suisse, sauf les fromages à pâte molle et tout ce qui craint la chaleur : 9.– le colis, expédié le mardi.', 'icon' => 'package'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les coffrets',
                'title' => 'Un coffret composé pour vous',
                'lead' => 'Trois tailles, une caisse de bois, et quelqu’un qui connaît chaque bocal pour le remplir.',
                'body' => [
                    'Dites-nous pour qui, pour quelle occasion et pour quel montant : nous composons le coffret et vous le décrivons au téléphone avant de le fermer. Il existe en trois tailles, à CHF 48, CHF 85 et CHF 140, dans une caisse de bois consignée 5.–.',
                    'Pour les entreprises, nous préparons les coffrets de fin d’année dès dix pièces, avec votre carte glissée sous la ficelle. Commandez avant le 1er décembre : passé cette date, nous faisons ce que les stocks permettent.',
                    'Rien ne se paie en ligne pour l’instant. Vous réglez au comptoir, à la livraison ou sur facture pour les entreprises ; la carte, Twint et les espèces sont acceptés.',
                ],
            ],
        ],
    ],
];
