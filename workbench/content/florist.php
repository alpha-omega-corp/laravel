<?php

declare(strict_types=1);

/*
 * The demo content of a florist: a fictional shop in Carouge, open since 1987,
 * with an atelier behind the counter and half a hectare of cutting flowers at
 * Bardonnex. `site` is what every page shares, `prefabs` is what the site would
 * bind as `kit.<name>` — the rows its owner keeps in the admin, in each
 * component's own prop names — and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/florist.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Maison Églantine',
        'blurb' => 'Fleuriste à Carouge depuis 1987 : bouquets de saison, mariages, deuils et plantes qui durent.',
        'address' => 'Rue Saint-Joseph 22, 1227 Carouge',
        'phone' => '022 000 00 00',
        'email' => 'bonjour@maison-eglantine.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Maison Églantine, Corbaz Fleurs Sàrl',
        'action' => ['label' => 'Demander des fleurs', 'to' => '/occasions'],
        'band' => [
            'eyebrow' => 'Une date à fleurir',
            'title' => 'Des fleurs pour un jour qui compte ?',
            'lead' => 'Mariage, deuil, naissance ou table de fête : dites-nous la date, nous vous rappelons sous vingt-quatre heures avec une proposition et un prix.',
            'links' => [['label' => 'Demander des fleurs', 'to' => '/occasions'], ['label' => 'Voir les bouquets', 'to' => '/bouquets']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue Saint-Joseph 22, Carouge'],
                ['label' => 'Téléphone', 'value' => '022 000 00 00', 'href' => 'tel:+41220000000'],
                ['label' => 'Tram', 'value' => 'Lignes 12 et 18, arrêt Marché, deux minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'bouquet-du-jour', 'name' => 'Le bouquet du jour', 'price' => '48.–', 'description' => 'Composé le matin avec ce qui est arrivé du champ et des serres. Une quinzaine de tiges, jamais deux fois le même.'],
                ['id' => 'grand-bouquet-de-saison', 'name' => 'Le grand bouquet de saison', 'price' => '85.–', 'description' => 'Une trentaine de tiges liées en spirale, pour un vase de trente centimètres. Tient huit à dix jours.'],
                ['id' => 'botte-du-marche', 'name' => 'La botte du marché', 'price' => '18.–', 'description' => 'Une seule fleur, dix tiges, dans son papier kraft : tulipes, renoncules, pivoines ou dahlias selon le mois.'],
                ['id' => 'bouquet-champetre', 'name' => 'Bouquet champêtre', 'price' => '62.–', 'description' => 'Cosmos, scabieuses, zinnias et graminées de notre champ de Bardonnex. De juin à octobre seulement.'],
                ['id' => 'roses-de-jardin', 'name' => 'Roses de jardin, la douzaine', 'price' => '72.–', 'description' => 'Roses parfumées à grosses fleurs, cultivées sous serre froide à Troinex. De juin à septembre.'],
                ['id' => 'bouquet-seche', 'name' => 'Bouquet de fleurs séchées', 'price' => '54.–', 'description' => 'Séché tête en bas dans la cour de l’atelier, tout l’été. Tient deux ans sans une goutte d’eau.'],
                ['id' => 'couronne-de-porte', 'name' => 'Couronne de porte', 'price' => '58.–', 'description' => 'Feuillage, baies et fleurs séchées sur une base de saule tressé. Sur commande, trois jours.'],
                ['id' => 'abonnement', 'name' => 'L’abonnement, quatre bouquets', 'price' => '180.–', 'description' => 'Un bouquet livré chaque semaine ou tous les quinze jours, à Carouge et à Genève. Le vase est prêté.'],
                ['id' => 'orchidee-papillon', 'name' => 'Orchidée papillon, pot de grès', 'price' => '65.–', 'description' => 'Deux hampes, dans un pot tourné à Carouge. Un verre d’eau par semaine, et elle refleurit.'],
                ['id' => 'monstera', 'name' => 'Monstera deliciosa, 80 cm', 'price' => '89.–', 'description' => 'Élevée en Suisse, rempotée chez nous. Lumière douce, un arrosage tous les dix jours.'],
            ],
        ],
        'gallery' => [
            'title' => 'Quelques journées fleuries',
            'pictures' => [
                ['image' => 'picture:Une arche de pivoines et de feuillage dans la cour d’un domaine viticole', 'alt' => 'Arche de pivoines roses et de feuillage dressée dans une cour pavée', 'caption' => 'Mariage à Dardagny, juin : l’arche de la cérémonie', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un bouquet de mariée de renoncules et de pois de senteur, noué de lin', 'alt' => 'Bouquet de mariée rond, dans des tons pêche et crème', 'caption' => 'Bouquet de mariée, renoncules et pois de senteur', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une table de vingt couverts fleurie de dahlias dans des vases bas', 'alt' => 'Longue table dressée, des vases bas de dahlias sur toute sa longueur', 'caption' => 'Table de vingt couverts, dahlias du champ', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La vitrine de la boutique à l’Avent, des couronnes suspendues à des rubans', 'alt' => 'Vitrine éclairée le soir, couronnes de sapin et de baies suspendues', 'caption' => 'La vitrine de l’Avent', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une gerbe blanche de lys, de roses et d’eucalyptus sur un banc de pierre', 'alt' => 'Gerbe de deuil blanche et verte, un ruban crème', 'caption' => 'Gerbe blanche, ruban écrit à la main', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des boutonnières alignées sur un linge, une épingle à chacune', 'alt' => 'Six boutonnières de fleurs séchées et de feuillage', 'caption' => 'Boutonnières, faites le matin du mariage', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un grand vase de branches de cerisier en fleurs dans le hall d’un hôtel', 'alt' => 'Branches de cerisier en fleurs dans un vase de grès haut d’un mètre', 'caption' => 'Hall d’hôtel à Genève, changé chaque mardi', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un temple décoré pour un mariage, un bouquet au bout de chaque banc', 'alt' => 'Allée centrale d’un temple, un petit bouquet attaché à chaque banc', 'caption' => 'Temple de Carouge, mariage de septembre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une couronne de fleurs fraîches posée sur les cheveux d’une enfant', 'alt' => 'Couronne de gypsophile et de petites roses', 'caption' => 'Couronne de fleurs pour un baptême', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La vitrine de printemps, des tulipes perroquet dans des cruches émaillées', 'alt' => 'Vitrine de mars, tulipes perroquet orange et violettes', 'caption' => 'La vitrine des tulipes, en mars', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des petits vases de cosmos et de scabieuses sur le comptoir d’un restaurant', 'alt' => 'Six petits vases de fleurs des champs sur un comptoir en zinc', 'caption' => 'Un restaurant de la rue Ancienne, fleurs de la semaine', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’atelier un vendredi, les seaux de fleurs prêts pour un mariage', 'alt' => 'Des seaux de roses et de feuillage alignés sur le sol de l’atelier', 'caption' => 'L’atelier, la veille d’un mariage', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander des fleurs pour une date',
            'intro' => 'Donnez-nous la date et le genre de jour, avec un mot sur ce que vous imaginez. Ce n’est pas encore une commande : Élise vous rappelle sous vingt-quatre heures avec une proposition et un prix.',
            'action' => '#booking',
            'services' => ['Mariage', 'Deuil', 'Naissance ou baptême', 'Anniversaire', 'Repas ou réception', 'Entreprise, hôtel ou restaurant', 'Autre occasion'],
        ],
        'schedule' => [
            'title' => 'Horaires de la boutique',
            'note' => 'Fermé le lundi. Le mercredi et le samedi matin, notre étal est aussi sur la place du Marché.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '08:30–18:30'],
                ['day' => 'Mercredi', 'hours' => '08:30–18:30'],
                ['day' => 'Jeudi', 'hours' => '08:30–18:30'],
                ['day' => 'Vendredi', 'hours' => '08:30–18:30'],
                ['day' => 'Samedi', 'hours' => '08:00–17:00'],
                ['day' => 'Dimanche', 'hours' => '09:00–12:30'],
            ],
        ],
        'map' => [
            'address' => 'Rue Saint-Joseph 22, 1227 Carouge',
            'title' => 'Maison Églantine',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Fleuriste · Carouge',
                'title' => 'Des fleurs de saison, liées chaque matin',
                'lead' => 'Bouquets du jour, fleurs de mariage et de deuil, plantes qui durent. De mai à octobre, la moitié de nos fleurs pousse à moins de dix kilomètres.',
                'subject' => 'Un grand bouquet de dahlias et de cosmos sur l’établi de l’atelier',
                'note' => 'Livré le jour même pour toute commande passée avant 14 h',
                'links' => [['label' => 'Demander des fleurs', 'to' => '/occasions'], ['label' => 'Voir les bouquets', 'to' => '/bouquets']],
                'facts' => [['value' => '48.–', 'label' => 'Le bouquet du jour'], ['value' => '14 h', 'label' => 'Commandé, livré le jour même'], ['value' => '1987', 'label' => 'La boutique ouvre']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Trois raisons de pousser la porte',
                'lead' => 'Une boutique, un atelier derrière le comptoir et un champ de coupe à Bardonnex : tout ce que nous vendons passe par nos mains.',
                'items' => [
                    ['title' => 'Les bouquets et les plantes', 'body' => 'Le bouquet du jour à 48.–, la botte du marché à 18.–, et des plantes rempotées chez nous dans des pots tournés à Carouge.', 'subject' => 'Des seaux de renoncules et de tulipes devant le comptoir en chêne', 'to' => '/bouquets', 'label' => 'Les bouquets et leurs prix'],
                    ['title' => 'Le travail de l’atelier', 'body' => 'Une quarantaine de mariages par an, les tables de trois restaurants et une vitrine que le quartier attend à chaque saison.', 'subject' => 'Une arche de pivoines dressée dans la cour d’un domaine', 'to' => '/our-work', 'label' => 'Voir nos réalisations'],
                    ['title' => 'Les fleurs d’un jour qui compte', 'body' => 'Un mariage se prépare trois mois avant, une gerbe de deuil le matin même. Dans les deux cas, cela commence par une date.', 'subject' => 'Un bouquet de mariée noué d’un ruban de lin', 'to' => '/occasions', 'label' => 'Demander des fleurs'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1987',
                'title' => 'Une boutique, un atelier et un champ',
                'lead' => 'Jeanne Corbaz a ouvert la boutique en 1987. Sa fille Élise la tient depuis 2014, et Jeanne cultive le champ.',
                'body' => [
                    'La boutique de la rue Saint-Joseph n’a jamais déménagé : le comptoir en chêne est celui de 1987, et l’atelier, derrière le rideau, donne sur la cour où sèchent les fleurs de l’été.',
                    'Depuis 2016, nous cultivons à Bardonnex un demi-hectare de fleurs à couper : dahlias, cosmos, zinnias, scabieuses et graminées. De mai à octobre, elles sont coupées le matin et dans vos bouquets l’après-midi. L’hiver, les roses et les tulipes viennent des serres Duvillard, à Troinex.',
                    'Nous sommes quatre : Élise et Noé à l’atelier, Lina, apprentie de deuxième année, au comptoir, et Jeanne au champ, qui ne dit plus qu’elle est à la retraite.',
                ],
            ],
        ],
        '/bouquets' => [
            'label' => 'Bouquets',
            'hero' => [
                'eyebrow' => 'Bouquets et plantes',
                'title' => 'Dans les seaux cette semaine',
                'lead' => 'Les prix sont ceux du comptoir. Chaque bouquet est lié à la commande : comptez vingt minutes en boutique, ou téléphonez avant de passer.',
                'subject' => 'Des bouquets liés, debout dans des seaux en zinc devant le comptoir',
                'links' => [['label' => 'Demander des fleurs pour une date', 'to' => '/occasions'], ['label' => 'Commander au 022 000 00 00', 'href' => 'tel:+41220000000']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Livraison, abonnement, entretien',
                'items' => [
                    ['title' => 'Livraison', 'body' => 'À Carouge et en ville de Genève, 12.– la course, offerte dès 90.– d’achat. Le jour même pour une commande passée avant 14 h.', 'icon' => 'truck'],
                    ['title' => 'Abonnement', 'body' => 'Un bouquet chaque semaine ou tous les quinze jours, pour une table ou un accueil. Quatre livraisons : 180.–, le vase est prêté.', 'icon' => 'repeat'],
                    ['title' => 'Entretien', 'body' => 'Chaque bouquet part avec sa fiche : recouper les tiges, changer l’eau tous les deux jours. Bien soigné, il tient huit à dix jours.', 'icon' => 'droplets'],
                ],
            ],
            'story' => [
                'eyebrow' => 'D’où viennent les fleurs',
                'title' => 'La saison décide, pas le catalogue',
                'lead' => 'Il n’y a pas de pivoines en novembre, et nous ne faisons pas semblant.',
                'body' => [
                    'La liste change avec les mois. En mars, les renoncules et les tulipes de Troinex ; en juin, les pivoines et les roses de jardin ; de juillet à octobre, les dahlias, les cosmos et les zinnias de notre champ de Bardonnex ; en hiver, les amaryllis, les hellébores et les branches.',
                    'Le bouquet du jour est composé le matin avec ce qui est arrivé : c’est le moins cher, et celui que nous préférons faire. Si vous tenez à une fleur ou à une couleur, dites-le la veille : nous vous dirons franchement si elle est de saison.',
                    'Les plantes viennent de deux horticulteurs genevois et sont rempotées chez nous. Nous reprenons aussi les vôtres quand elles fatiguent : 15.– le rempotage, terreau compris.',
                ],
            ],
        ],
        '/our-work' => [
            'label' => 'Réalisations',
            'hero' => [
                'eyebrow' => 'Réalisations',
                'title' => 'Des mariages, des tables, une vitrine',
                'lead' => 'Une quarantaine de mariages par an, des tables fleuries chaque semaine et une vitrine qui change avec la saison. Voici ce que nous en avons gardé.',
                'subject' => 'Une longue table sous une tonnelle, fleurie d’un bout à l’autre',
                'links' => [['label' => 'Demander des fleurs', 'to' => '/occasions']],
            ],
            'story' => [
                'eyebrow' => 'L’atelier',
                'title' => 'Tout se fait la veille et le matin même',
                'lead' => 'Un décor de mariage tient dans une camionnette et dans dix-huit heures de travail à trois.',
                'body' => [
                    'Un mariage commence trois mois avant, par une heure à l’atelier : la robe, la salle, les fleurs que vous aimez et celles que vous ne voulez pas voir. Élise dessine ensuite le décor sur une page, avec les fleurs qui seront de saison ce jour-là, et rien n’est commandé avant que vous l’ayez signée.',
                    'Le jeudi, les fleurs arrivent et boivent une nuit entière. Le vendredi, nous lions les centres de table et montons les structures. Le bouquet de la mariée et les boutonnières sont faits le samedi à l’aube, pour qu’ils aient moins de quatre heures quand vous les prenez en main.',
                    'Les photographies de cette page sont celles des mariés, des restaurateurs et de nos clients, publiées avec leur accord. Aucune n’est une image de catalogue : si un décor vous plaît, nous pouvons vous dire ce qu’il a coûté.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois métiers',
                'title' => 'Un jour, une table, une saison',
                'items' => [
                    ['title' => 'Mariages', 'body' => 'Bouquet, boutonnières, cérémonie et tables. Nous livrons, nous installons et nous revenons démonter le lendemain.', 'subject' => 'Une arche de feuillage et de roses de jardin devant un pressoir', 'to' => '/occasions', 'label' => 'Parler de votre mariage'],
                    ['title' => 'Tables et réceptions', 'body' => 'Trois restaurants de Carouge et deux hôtels de Genève reçoivent nos fleurs chaque mardi, changées chaque semaine.', 'subject' => 'Des petits vases de fleurs des champs alignés sur un comptoir en zinc'],
                    ['title' => 'La vitrine', 'body' => 'Elle change quatre fois par an et les passants s’en souviennent : l’Avent, les tulipes, les pivoines, les dahlias.', 'subject' => 'La vitrine de la boutique à l’Avent, des couronnes suspendues', 'to' => '/bouquets', 'label' => 'Ce qui est en boutique'],
                ],
            ],
        ],
        '/occasions' => [
            'label' => 'Occasions',
            'hero' => [
                'eyebrow' => 'Occasions',
                'title' => 'Des fleurs pour un jour qui compte',
                'lead' => 'Un mariage, un deuil, une naissance, une table de vingt couverts : donnez-nous la date et le genre de jour. Élise vous rappelle sous vingt-quatre heures.',
                'subject' => 'Élise liant un bouquet de mariée à l’établi de l’atelier',
                'links' => [['label' => 'Appeler le 022 000 00 00', 'href' => 'tel:+41220000000'], ['label' => 'Voir nos réalisations', 'to' => '/our-work']],
            ],
            'story' => [
                'eyebrow' => 'Comment cela se passe',
                'title' => 'Une demande, un rappel, un prix écrit',
                'lead' => 'Écrire ne vous engage à rien : la demande ne devient une commande qu’une fois le devis signé.',
                'body' => [
                    'Pour un mariage, comptez trois mois : un rendez-vous d’une heure à l’atelier, un devis détaillé dans la semaine, un acompte de trente pour cent à la signature. Les prix commencent à CHF 950 pour le bouquet de la mariée, quatre boutonnières et six centres de table.',
                    'Pour un deuil, tout se fait dans la journée. Appelez plutôt que d’écrire : une gerbe commandée avant 11 h est livrée l’après-midi même à la chapelle, au centre funéraire ou au domicile. Nous écrivons le ruban à la main et nous réglons l’heure avec les pompes funèbres.',
                    'Pour une naissance, un anniversaire ou un repas, deux jours suffisent. Dites-nous une couleur, un budget et l’adresse : nous composons avec ce que la saison donne, et vous recevez une photographie du bouquet avant qu’il parte.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Selon le jour',
                'title' => 'Trois demandes de chaque semaine',
                'items' => [
                    ['title' => 'Mariage', 'body' => 'Dès CHF 950 : le bouquet de la mariée, quatre boutonnières et six centres de table. Rendez-vous à l’atelier trois mois avant.', 'subject' => 'Un bouquet de mariée de renoncules et de pois de senteur, noué de lin'],
                    ['title' => 'Deuil', 'body' => 'Gerbes dès 120.–, couronnes dès 240.–, ruban écrit à la main. Livrées le jour même pour une commande passée avant 11 h.', 'subject' => 'Une gerbe blanche de lys et de roses posée sur un banc de pierre'],
                    ['title' => 'Réception ou entreprise', 'body' => 'Tables, accueils et vitrines : un devis sous quarante-huit heures, et l’abonnement à la semaine dès 60.– le bouquet.', 'subject' => 'Un grand vase de branches fleuries dans le hall d’un hôtel'],
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Plus simple par téléphone ?',
                'lead' => 'Pour un deuil ou une date très proche, appelez l’atelier : nous répondons du mardi au samedi dès 8 h 30.',
                'links' => [['label' => 'Appeler le 022 000 00 00', 'href' => 'tel:+41220000000'], ['label' => 'Voir les bouquets', 'to' => '/bouquets']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '022 000 00 00', 'href' => 'tel:+41220000000'],
                    ['label' => 'Atelier', 'value' => 'Rue Saint-Joseph 22, Carouge'],
                    ['label' => 'Réponse', 'value' => 'Sous vingt-quatre heures, sauf le lundi'],
                ],
            ],
        ],
    ],
];
