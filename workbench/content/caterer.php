<?php

declare(strict_types=1);

/*
 * The demo content of a caterer: a fictional traiteur working out of a former
 * dairy in Rolle, between Geneva and Lausanne, that cooks where its hosts
 * receive — twelve to four hundred guests, priced a head for the date. `site`
 * is what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's own
 * prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/caterer.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'La Tablée',
        'blurb' => 'Traiteur à Rolle : cocktails, buffets et dîners servis, de douze à quatre cents convives, entre Genève et Montreux.',
        'address' => 'Route de l’Étraz 14, 1180 Rolle',
        'phone' => '021 000 00 00',
        'email' => 'bonjour@la-tablee.example',
        'status' => 'Saison 2027 : encore des samedis libres en mai et en septembre',
        'note' => '© La Tablée Traiteur Sàrl',
        'action' => ['label' => 'Demander un devis', 'to' => '/quote'],
        'band' => [
            'eyebrow' => 'Votre date',
            'title' => 'Une date en tête ?',
            'lead' => 'Dites-nous le jour, le lieu et combien vous serez : le devis arrive sous deux jours ouvrables, chiffré par personne.',
            'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir les formules', 'to' => '/menus']],
            'details' => [
                ['label' => 'Réponse', 'value' => 'Sous deux jours ouvrables'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Rayon', 'value' => 'De Genève à Montreux, 60 km sans frais'],
            ],
        ],
    ],

    'prefabs' => [
        'testimonials' => [
            'title' => 'Ce que disent nos hôtes',
            'testimonials' => [
                [
                    'quote' => 'Cent quarante invités, un orage à dix-huit heures et le dîner servi à l’heure sous la grange. Nos parents en parlent encore plus que de la cérémonie.',
                    'name' => 'Élodie et Marc Favre',
                    'role' => 'Mariés à Féchy, septembre 2025',
                ],
                [
                    'quote' => 'Nous commandons le cocktail dînatoire trois fois par an. Le devis arrive en deux jours, le chiffre ne bouge plus, et l’équipe repart en laissant la salle plus propre qu’à son arrivée.',
                    'name' => 'Nathalie Gremaud',
                    'role' => 'Responsable des événements, Fiduciaire Lémanis, Nyon',
                ],
                [
                    'quote' => 'Pour les quatre-vingts ans de ma mère, Claire a refait le vol-au-vent de son enfance d’après une recette manuscrite. Trente-deux convives, et pas une assiette n’est revenue pleine.',
                    'name' => 'Philippe Rochat',
                    'role' => 'Hôte d’une fête de famille, Aubonne',
                ],
            ],
        ],
        'menu' => [
            'title' => 'Les formules, par personne',
            'sections' => [
                ['title' => 'Cocktail', 'items' => [
                    ['name' => 'Apéritif, six pièces', 'price' => '24.–', 'description' => 'Trois froides, trois chaudes : une heure debout avant de passer à table.'],
                    ['name' => 'Cocktail dînatoire, quatorze pièces', 'price' => '52.–', 'description' => 'Remplace un repas : dix salées, deux ateliers cuisinés devant vous, deux sucrées.'],
                    ['name' => 'Cocktail prolongé, vingt pièces', 'price' => '68.–', 'description' => 'Trois heures de service, un atelier de plus et la table des fromages.'],
                ]],
                ['title' => 'Buffet', 'items' => [
                    ['name' => 'Buffet du marché', 'price' => '58.–', 'description' => 'Cinq salades de saison, deux plats chauds, fromages et trois desserts.'],
                    ['name' => 'Buffet du lac', 'price' => '72.–', 'description' => 'Féra fumée, filets de perche meunière à la minute, viande rôtie tranchée devant vous.'],
                    ['name' => 'Brunch du lendemain', 'price' => '38.–', 'description' => 'Tresse, birchermüesli, œufs brouillés, charcuterie du Jura et tartes aux fruits.'],
                ]],
                ['title' => 'Dîner servi à table', 'items' => [
                    ['name' => 'Trois services', 'price' => '94.–', 'description' => 'Entrée, plat et dessert, arrêtés ensemble à la dégustation.'],
                    ['name' => 'Quatre services', 'price' => '116.–', 'description' => 'Avec un poisson du lac entre l’entrée et le plat.'],
                    ['name' => 'Cinq services, accords mets et vins', 'price' => '158.–', 'description' => 'Les vins de La Côte et du Valais servis au verre, plat après plat.'],
                ]],
                ['title' => 'À ajouter', 'items' => [
                    ['name' => 'Vins, eaux et cafés, au forfait', 'price' => '26.–', 'description' => 'Deux vins de La Côte, servis sans compter jusqu’au dessert.'],
                    ['name' => 'Table des fromages d’alpage', 'price' => '12.–'],
                    ['name' => 'Pièce montée ou buffet de desserts', 'price' => '14.–'],
                    ['name' => 'Menu enfant, jusqu’à douze ans', 'price' => '28.–'],
                ]],
            ],
        ],
        'gallery' => [
            'title' => 'Tables et réceptions',
            'pictures' => [
                ['image' => 'picture:Une table de cent quarante couverts dressée à la bougie sous une grange', 'alt' => 'Une longue table dressée à la bougie sous la charpente d’une grange', 'caption' => 'Mariage à Féchy, 140 couverts', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le buffet du lac dressé sur une terrasse, la perche cuite à la minute', 'alt' => 'Un buffet dressé sur une terrasse, un cuisinier à la poêle derrière', 'caption' => 'Buffet du lac, Rolle', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des plateaux de pièces cocktail portés en salle', 'alt' => 'Deux serveurs portant des plateaux de pièces cocktail', 'caption' => 'Cocktail dînatoire, 14 pièces', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La brigade au dressage, soixante assiettes alignées sur le passe', 'alt' => 'Quatre cuisiniers dressant des assiettes alignées', 'caption' => 'Le passe, vingt minutes avant le service', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une assiette de féra fumée, raifort et pomme verte', 'alt' => 'Une assiette de féra fumée au raifort', 'caption' => 'Féra fumée du Léman', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une table ronde de dix couverts, lin blanc et pivoines', 'alt' => 'Une table ronde dressée de lin blanc, des pivoines au centre', 'caption' => 'Dîner servi, quatre services', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un risotto lié dans une meule de gruyère devant les invités', 'alt' => 'Un cuisinier servant un risotto dans une meule de gruyère', 'caption' => 'L’atelier risotto', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un buffet de desserts, tartes aux fruits et verrines', 'alt' => 'Des tartes aux fruits et des verrines sur un buffet', 'caption' => 'Buffet de desserts', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Deux cents couverts dans une halle, les serveurs alignés avant l’ouverture', 'alt' => 'Une halle dressée pour deux cents couverts', 'caption' => 'Soirée d’entreprise à Gland, 200 couverts', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le brunch du lendemain servi au jardin, sous un tilleul', 'alt' => 'Une table de brunch dans un jardin', 'caption' => 'Brunch du lendemain, Aubonne', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les fours de campagne installés derrière une salle communale', 'alt' => 'Des fours mobiles sous un abri, derrière une salle communale', 'caption' => 'Nous arrivons avec la cuisine', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La table des fromages d’alpage sur une ardoise', 'alt' => 'Des fromages d’alpage sur une ardoise, du pain et des noix', 'caption' => 'Fromages d’alpage', 'width' => 1200, 'height' => 900],
            ],
        ],
        'faq' => [
            'title' => 'Les questions qu’on nous pose',
            'entries' => [
                ['question' => 'Peut-on goûter avant de se décider ?', 'answer' => 'Oui. Dès quarante convives, la dégustation pour deux est offerte une fois la date réservée ; avant, elle coûte 60.– par personne, déduits du devis si vous signez. Elle a lieu le mardi ou le jeudi soir à Rolle : réservez-la au 021 000 00 00.'],
                ['question' => 'Comment gérez-vous les allergies et les régimes ?', 'answer' => 'Dites-nous qui ne mange pas quoi dix jours avant : chaque assiette concernée sort de cuisine sous cloche, au nom de la personne. Sans gluten, sans lactose, végétarien et végétalien sont prévus dans toutes les formules, sans supplément.'],
                ['question' => 'Le personnel et la vaisselle sont-ils compris ?', 'answer' => 'Oui, dans le prix par personne : un serveur pour douze convives à table, un pour vingt-cinq au cocktail, la vaisselle, les verres et le linge de table. Les tables, les chaises et la tente se louent à part ; nous vous donnons deux adresses.'],
                ['question' => 'Jusqu’où vous déplacez-vous ?', 'answer' => 'De Genève à Montreux et jusqu’au pied du Jura, sans frais dans un rayon de soixante kilomètres autour de Rolle. Au-delà, comptez 2.– par kilomètre et par véhicule.'],
                ['question' => 'Faut-il une cuisine sur place ?', 'answer' => 'Non. Il nous faut un point d’eau, une prise 400 V et un abri de vingt mètres carrés : nous apportons les fours, le froid et le passe. Nous visitons avant de signer chaque lieu que nous ne connaissons pas.'],
                ['question' => 'Quel acompte, et quand confirmer le nombre ?', 'answer' => 'Trente pour cent à la signature réservent la date. Le nombre de convives se confirme dix jours avant et peut encore monter de dix pour cent jusqu’à l’avant-veille. Le solde est dû dix jours après la réception.'],
                ['question' => 'Peut-on apporter son vin ?', 'answer' => 'Oui, sans droit de bouchon : nous le rafraîchissons et le servons. Sinon, le forfait à 26.– par personne comprend deux vins de La Côte, les eaux et les cafés.'],
            ],
        ],
        'quote' => [
            'title' => 'Demander un devis',
            'intro' => 'Une date, un lieu, un nombre de convives : c’est assez pour un premier chiffre. Le reste se précise à la dégustation.',
            'note' => 'Nous répondons sous deux jours ouvrables, avec un devis chiffré par personne.',
            'action' => '#quote',
            'scopes' => ['Mariage', 'Soirée d’entreprise', 'Cocktail ou vernissage', 'Fête de famille', 'Dîner à domicile', 'Brunch', 'Autre réception'],
            'budgets' => ['Moins de 50.– par personne', 'De 50.– à 80.– par personne', 'De 80.– à 120.– par personne', 'Plus de 120.– par personne'],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Traiteur · Rolle, La Côte',
                'title' => 'Nous cuisinons là où vous recevez',
                'lead' => 'Mariages, soirées d’entreprise et fêtes de famille, de douze à quatre cents convives. Les fours, la brigade et la vaisselle arrivent avec nous ; le prix se donne par personne, pour votre date.',
                'subject' => 'Une longue table dressée à la bougie sous une grange, au crépuscule',
                'note' => 'Dégustation offerte dès quarante convives',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir les formules', 'to' => '/menus']],
                'facts' => [['value' => '12 à 400', 'label' => 'Convives'], ['value' => '60 km', 'label' => 'Sans frais de route'], ['value' => '2009', 'label' => 'Première réception']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Debout, au buffet ou à table',
                'lead' => 'Trois façons de recevoir, chacune avec son prix par personne, service et vaisselle compris.',
                'items' => [
                    ['title' => 'Les formules', 'body' => 'Du cocktail à 24.– au dîner en cinq services : treize lignes, un prix par personne, rien à deviner.', 'subject' => 'Des pièces cocktail alignées sur une ardoise', 'to' => '/menus', 'label' => 'Voir les formules'],
                    ['title' => 'Les réceptions', 'body' => 'Une grange à Féchy, une halle à Gland, un jardin à Aubonne : douze tables que nous avons dressées.', 'subject' => 'Une table ronde de dix couverts, lin blanc et pivoines', 'to' => '/events', 'label' => 'Voir les réceptions'],
                    ['title' => 'Les questions', 'body' => 'Dégustation, allergies, personnel, acompte : ce que nous répondons chaque semaine au téléphone.', 'subject' => 'La cheffe et deux hôtes à la dégustation, autour du passe', 'to' => '/questions', 'label' => 'Lire les réponses'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2009',
                'title' => 'Une ancienne laiterie, neuf cuisiniers, un camion',
                'lead' => 'Nous n’avons pas de salle : notre métier est d’arriver chez vous avec une cuisine entière.',
                'body' => [
                    'Claire Berthet a ouvert La Tablée en 2009 dans l’ancienne laiterie de Rolle, après dix ans dans les brigades d’hôtels de la Riviera. La première réception comptait dix-huit couverts ; la plus grande à ce jour, quatre cents, sous une halle à Gland.',
                    'Tout part de la laiterie le matin même : les fonds, les pâtes et les desserts y sont faits, les cuissons se terminent sur place, dans nos fours. Yann Moret, maître d’hôtel depuis 2012, visite chaque lieu que nous ne connaissons pas et règle le service à la minute.',
                    'Nous achetons à moins de quarante kilomètres : la féra et la perche aux pêcheurs de Rolle, les légumes à Étoy, les fromages à l’alpage du Marchairuz, les vins chez quatre vignerons de Féchy et de Mont-sur-Rolle.',
                ],
            ],
        ],
        '/menus' => [
            'label' => 'Formules',
            'hero' => [
                'eyebrow' => 'Les formules',
                'title' => 'Cocktail, buffet ou dîner servi : le prix par personne',
                'lead' => 'Prix par personne dès quarante convives, service, vaisselle et linge compris. En dessous de quarante, le devis le précise ; les vins se comptent à part.',
                'subject' => 'Le buffet du lac dressé sur une terrasse, face aux vignes',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Lire les réponses', 'to' => '/questions']],
            ],
            'features' => [
                'eyebrow' => 'Compris dans le prix',
                'title' => 'Ce que vous n’aurez pas à louer',
                'items' => [
                    ['title' => 'Le service', 'body' => 'Un serveur pour douze convives à table, un pour vingt-cinq au cocktail, et un maître d’hôtel dès soixante.', 'icon' => 'users'],
                    ['title' => 'La vaisselle', 'body' => 'Assiettes, verres, couverts et linge de table, livrés propres et repris tels quels.', 'icon' => 'utensils'],
                    ['title' => 'Les régimes', 'body' => 'Sans gluten, sans lactose, végétarien, végétalien : prévus dans chaque formule, sans supplément.', 'icon' => 'leaf'],
                ],
            ],
        ],
        '/events' => [
            'label' => 'Réceptions',
            'hero' => [
                'eyebrow' => 'Réceptions',
                'title' => 'Douze tables que nous avons dressées',
                'lead' => 'Des mariages, des soirées d’entreprise et des fêtes de famille de ces deux dernières saisons, photographiés avant que les invités ne s’assoient.',
                'subject' => 'Une halle de deux cents couverts, les serveurs alignés avant l’ouverture des portes',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir les formules', 'to' => '/menus']],
            ],
            'story' => [
                'eyebrow' => 'Sur place',
                'title' => 'Ce qu’on ne voit pas sur les photos',
                'lead' => 'Une réception se joue dans les six heures qui précèdent le premier verre.',
                'body' => [
                    'Le camion quitte Rolle en fin de matinée. À quinze heures les fours tournent derrière la grange ou la salle communale ; à dix-sept, la table est dressée et Yann fait le tour des places avec le plan, les allergies notées au dos de chaque carton.',
                    'Aucun lieu ne se sert comme un autre. Le mariage de Féchy a été servi à l’assiette pour cent quarante sous une grange sans eau courante ; la soirée de Gland, au buffet pour deux cents, en quarante minutes.',
                    'À minuit la vaisselle est chargée, la salle rendue balayée, et les restes vous attendent au frais, emballés et étiquetés.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois occasions',
                'title' => 'Ce que nous servons le plus souvent',
                'items' => [
                    ['title' => 'Mariages', 'body' => 'De l’apéritif dans les vignes au brunch du lendemain : une seule équipe pour les deux jours.', 'subject' => 'Un apéritif servi entre les rangs de vigne, à Mont-sur-Rolle'],
                    ['title' => 'Soirées d’entreprise', 'body' => 'Jusqu’à quatre cents couverts, un devis ferme en deux jours et une facture par centre de coût si vous le demandez.', 'subject' => 'Des tables hautes et des plateaux de pièces cocktail dans un hall'],
                    ['title' => 'Fêtes de famille', 'body' => 'Baptêmes, anniversaires, jubilés : dès douze convives, chez vous ou dans la salle du village.', 'subject' => 'Une grande table de famille dans un jardin, sous un tilleul'],
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions',
                'title' => 'Ce qu’on nous demande avant de signer',
                'lead' => 'Sept réponses que nous donnons chaque semaine au téléphone. Si la vôtre n’y est pas, appelez : Claire ou Yann répondent du mardi au samedi.',
                'subject' => 'La cheffe au téléphone dans la laiterie, le carnet de commandes ouvert',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'Du premier appel au lendemain',
                'title' => 'Comment se passe une commande',
                'lead' => 'Quatre rendez-vous, dont un seul vous demande de vous déplacer.',
                'body' => [
                    'Vous écrivez ou vous appelez avec une date, un lieu et un nombre : le devis part sous deux jours ouvrables, chiffré par personne. Il tient trente jours ; la date n’est réservée qu’à la signature et à l’acompte.',
                    'Vient la dégustation, un mardi ou un jeudi soir à la laiterie : vous goûtez deux entrées, deux plats et deux desserts, et nous arrêtons le menu ensemble. Yann visite ensuite le lieu, mesure, et vous envoie le plan de table et l’horaire du service.',
                    'Dix jours avant, vous confirmez le nombre et les régimes. Le jour même, vous ne nous voyez arriver que si vous le souhaitez ; le lendemain, la facture reprend le devis, ligne pour ligne.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les trois moments',
                'title' => 'Dégustation, visite, service',
                'items' => [
                    ['title' => 'La dégustation', 'body' => 'Pour deux, à la laiterie, le mardi ou le jeudi soir. Offerte dès quarante convives.', 'subject' => 'Six petites assiettes sur le passe, deux verres de chasselas'],
                    ['title' => 'La visite du lieu', 'body' => 'Le point d’eau, le courant, le chemin du camion : nous vérifions tout un mois avant.', 'subject' => 'Le maître d’hôtel mesurant une grange, un plan à la main'],
                    ['title' => 'Le jour même', 'body' => 'Arrivée six heures avant le premier verre, départ la salle rendue propre.', 'subject' => 'Les fours de campagne installés derrière une salle communale'],
                ],
            ],
        ],
        '/quote' => [
            'hero' => [
                'eyebrow' => 'Devis',
                'title' => 'Un chiffre pour votre date',
                'lead' => 'Dites-nous l’occasion, le lieu et combien vous serez. Vous recevez sous deux jours ouvrables un devis par personne, sans engagement.',
                'subject' => 'Un devis posé sur le passe, à côté d’un plan de table',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir les formules', 'to' => '/menus']],
            ],
            'story' => [
                'eyebrow' => 'Ensuite',
                'title' => 'Ce qui se passe après votre demande',
                'lead' => 'Une demande n’est pas une commande : rien n’est dû avant la signature.',
                'body' => [
                    'Claire lit chaque demande elle-même. Si la date est libre, vous recevez sous deux jours ouvrables un devis chiffré par personne, avec ce qu’il comprend et ce qu’il ne comprend pas ; si elle ne l’est pas, nous vous le disons le jour même et vous donnons le nom de deux confrères.',
                    'Le devis tient trente jours. Vous pouvez le faire bouger : une formule pour une autre, vingt convives de plus, un brunch le lendemain. À la signature, trente pour cent d’acompte réservent la date, et la dégustation se fixe dans la foulée.',
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Plutôt par téléphone ?',
                'lead' => 'Claire ou Yann répondent du mardi au samedi, de 9 h à 17 h. Hors de ces heures, laissez un message : nous rappelons le lendemain.',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Lire les réponses', 'to' => '/questions']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                    ['label' => 'E-mail', 'value' => 'bonjour@la-tablee.example', 'href' => 'mailto:bonjour@la-tablee.example'],
                    ['label' => 'Cuisine', 'value' => 'Route de l’Étraz 14, Rolle'],
                ],
            ],
        ],
    ],
];
