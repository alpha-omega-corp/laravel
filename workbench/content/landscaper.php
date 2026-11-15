<?php

declare(strict_types=1);

/*
 * The demo content of a landscaper: a fictional family firm of eighteen in
 * Aubonne, on La Côte, on its second generation. It draws gardens, plants what
 * its own nursery grows, lays terraces and dry-stone walls, digs natural
 * swimming ponds, prunes large trees and keeps a hundred and forty gardens
 * under contract. `site` is what every page shares, `prefabs` is what the site
 * would bind as `kit.<name>` (the rows its owner keeps in the admin, in each
 * component's own prop names) and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/landscaper.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Bovard Jardins',
        'blurb' => 'Création, plantation et entretien de jardins sur La Côte, de la première esquisse à la taille d’hiver, depuis 1974.',
        'address' => 'Chemin de la Pépinière 6, 1170 Aubonne',
        'phone' => '021 000 00 00',
        'email' => 'jardins@bovard-jardins.example',
        'status' => 'Plantations d’automne jusqu’à fin novembre',
        'note' => '© Bovard Jardins Sàrl, Aubonne',
        'action' => ['label' => 'Demander une visite', 'to' => '/quote'],
        'band' => [
            'eyebrow' => 'Votre jardin',
            'title' => 'Un jardin à créer, à reprendre ou à tenir ?',
            'lead' => 'Décrivez-le en quelques lignes. Claire Bovard ou un chef d’équipe passe le voir sous dix jours, et le devis suit la visite dans la semaine.',
            'links' => [['label' => 'Demander une visite', 'to' => '/quote'], ['label' => 'Voir nos jardins', 'to' => '/gardens']],
            'details' => [
                ['label' => 'Dépôt et pépinière', 'value' => 'Chemin de la Pépinière 6, Aubonne'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Pépinière ouverte', 'value' => 'Lundi au vendredi 7 h 30–17 h · samedi 8 h–12 h'],
            ],
        ],
    ],

    'prefabs' => [
        'services' => [
            'title' => 'Ce que nous faisons nous-mêmes',
            'services' => [
                ['name' => 'Conception et plans', 'line' => 'Un relevé, deux esquisses et un plan de plantation chiffré, avant le premier coup de bêche.', 'icon' => 'pencil-ruler', 'price' => 'Dès CHF 1 200'],
                ['name' => 'Plantations', 'line' => 'Arbres, haies, vivaces et rosiers élevés dans notre pépinière, plantés d’octobre à avril et garantis à la reprise.', 'icon' => 'sprout', 'price' => 'Sur devis'],
                ['name' => 'Terrasses et dallages', 'line' => 'Pierre naturelle, pavés ou bois sur une fondation drainante, posés par nos propres paveurs.', 'icon' => 'layout-grid', 'price' => 'Dès CHF 280 le m²'],
                ['name' => 'Murs et escaliers', 'line' => 'Pierre sèche, murs de soutènement et marches en pierre du Jura, sans béton apparent.', 'icon' => 'brick-wall', 'price' => 'Sur devis'],
                ['name' => 'Bassins et baignades naturelles', 'line' => 'Un plan d’eau filtré par les plantes, du miroir de trois mètres à la baignade de soixante mètres carrés.', 'icon' => 'waves', 'price' => 'Dès CHF 18 000'],
                ['name' => 'Taille et soins aux arbres', 'line' => 'Taille douce, haubanage et abattage par démontage, par deux arboristes-grimpeurs diplômés.', 'icon' => 'tree-deciduous', 'price' => 'CHF 110 l’heure par grimpeur'],
                ['name' => 'Entretien à l’année', 'line' => 'Un contrat, un jardinier attitré et un passage toutes les deux semaines de mars à novembre.', 'icon' => 'calendar-check', 'price' => 'Dès CHF 2 400 par an'],
                ['name' => 'Arrosage et éclairage', 'line' => 'Goutte-à-goutte piloté par sonde et éclairage basse tension, posés sans rouvrir le gazon.', 'icon' => 'droplets', 'price' => 'Sur devis'],
            ],
        ],
        'testimonials' => [
            'title' => 'Deux étés plus tard',
            'testimonials' => [
                [
                    'quote' => 'Deux étés plus tard, pas un arbre n’a été remplacé et la prairie a pris toute seule. Nous avions demandé un jardin qui se passe de nous en août : c’est exactement ce que nous avons.',
                    'name' => 'Isabelle et Marc Dufour',
                    'role' => 'Jardin de 900 m², Féchy',
                ],
                [
                    'quote' => 'Depuis 2019, la même équipe passe un jeudi sur deux. Les copropriétaires ne m’appellent plus pour les haies, et le budget n’a pas bougé en trois ans.',
                    'name' => 'Sandrine Rey',
                    'role' => 'Administratrice de la PPE Les Tilleuls, Rolle',
                ],
                [
                    'quote' => 'Le devis faisait quatre pages et la facture finale était au franc près. Les 84 mètres de mur en pierre sèche ont passé deux hivers sans bouger d’un centimètre.',
                    'name' => 'Jean-Pierre Monod',
                    'role' => 'Propriétaire, Bougy-Villars',
                ],
            ],
        ],
        'projects' => [
            'title' => 'Jardins réalisés',
            'projects' => [
                [
                    'name' => 'Jardin du Clos des Vignes',
                    'place' => 'Féchy',
                    'year' => 2024,
                    'kind' => 'Création',
                    'figure' => '900 m²',
                    'figure_label' => 'de jardin sans pelouse à tondre',
                    'summary' => 'Une prairie fauchée deux fois l’an, un verger de huit hautes-tiges et une terrasse en pierre de Hauterive, à la place d’un gazon en pente.',
                ],
                [
                    'name' => 'Baignade de la Gordanne',
                    'place' => 'Perroy',
                    'year' => 2023,
                    'kind' => 'Baignade naturelle',
                    'figure' => '62 m²',
                    'figure_label' => 'de plan d’eau filtré par les plantes',
                    'summary' => 'Un bassin de nage de douze mètres et sa zone de régénération, sans chlore ni local technique, avec un ponton en mélèze.',
                ],
                [
                    'name' => 'Terrasses du Signal',
                    'place' => 'Bougy-Villars',
                    'year' => 2025,
                    'kind' => 'Murs et terrasses',
                    'figure' => '84 m',
                    'figure_label' => 'de murs en pierre sèche remontés',
                    'summary' => 'Trois terrasses de vigne devenues jardin : murs repris à la main, escalier de vingt-six marches et plantations de garrigue.',
                ],
                [
                    'name' => 'Cour de la Grand-Rue',
                    'place' => 'Rolle',
                    'year' => 2025,
                    'kind' => 'Jardin de ville',
                    'figure' => '48 m²',
                    'figure_label' => 'de cour dépavée et replantée',
                    'summary' => 'Une cour de maison de ville drainée, pavée de grès et plantée de fougères, d’un érable du Japon et de grimpantes sur trois murs.',
                ],
                [
                    'name' => 'Parc de la PPE Les Tilleuls',
                    'place' => 'Rolle',
                    'year' => 'Depuis 2019',
                    'kind' => 'Entretien à l’année',
                    'figure' => '6 400 m²',
                    'figure_label' => 'tenus par la même équipe',
                    'summary' => 'Haies, pelouses, massifs et quatorze grands arbres suivis pour trente-six copropriétaires, un jeudi sur deux de mars à novembre.',
                ],
                [
                    'name' => 'Tilleul de la cure',
                    'place' => 'Montherod',
                    'year' => 2024,
                    'kind' => 'Soins aux arbres',
                    'figure' => '24 m',
                    'figure_label' => 'de hauteur, conservé et haubané',
                    'summary' => 'Un tilleul planté vers 1890, allégé de deux tonnes de bois mort, haubané en trois points et contrôlé chaque hiver depuis.',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Ce qu’on nous demande au téléphone',
            'entries' => [
                [
                    'question' => 'Quelle est la bonne saison pour planter ?',
                    'answer' => 'D’octobre à mi-avril pour les arbres, les haies et les rosiers à racines nues ; toute l’année, hors gel et hors canicule, pour les plantes en pot. Nous plantons le gros des jardins en octobre et en novembre : la terre est encore chaude et l’arrosage du premier été est divisé par deux.',
                ],
                [
                    'question' => 'La première visite est-elle payante ?',
                    'answer' => 'Non. La visite et le devis sont gratuits dans un rayon de 25 km autour d’Aubonne. Un plan dessiné est facturé dès CHF 1 200 et déduit du chantier si nous le réalisons. Pour fixer une visite : 021 000 00 00, ou le formulaire de demande de visite.',
                ],
                [
                    'question' => 'Faut-il une autorisation pour abattre un arbre ?',
                    'answer' => 'Souvent, oui. Dans la plupart des communes de La Côte, un arbre de plus de 30 cm de diamètre mesuré à 1,30 m du sol est protégé : il faut l’accord de la commune, qui demande en général une replantation. Nous préparons la demande avec vous et n’abattons rien avant la réponse, qui prend trois à six semaines.',
                ],
                [
                    'question' => 'Les plantes sont-elles garanties ?',
                    'answer' => 'Oui. Toute plante sortie de notre pépinière et plantée par nous est remplacée une fois, sans frais, si elle ne repart pas au printemps suivant. La garantie vaut si l’arrosage du premier été a suivi le calendrier que nous vous laissons, ou si nous l’assurons nous-mêmes.',
                ],
                [
                    'question' => 'Que comprend un contrat d’entretien ?',
                    'answer' => 'Un jardinier attitré, un passage toutes les deux semaines de mars à novembre, la taille d’hiver et l’évacuation des déchets verts. Le prix est fixé pour l’année, dès CHF 2 400 pour un jardin de 500 m², et le contrat se résilie chaque 31 décembre.',
                ],
                [
                    'question' => 'Combien de temps dure un chantier ?',
                    'answer' => 'Une terrasse se pose en une à deux semaines, un jardin complet en quatre à huit, une baignade naturelle en dix. Les dates d’ouverture et de fin sont écrites au devis, avec le nom du chef d’équipe.',
                ],
                [
                    'question' => 'Peut-on acheter des plantes à la pépinière sans chantier ?',
                    'answer' => 'Oui. La pépinière vend aux particuliers du lundi au vendredi de 7 h 30 à 17 h et le samedi de 8 h à 12 h, au Chemin de la Pépinière 6 à Aubonne. Un jardinier vous conseille sur place, et nous livrons sur La Côte dès CHF 60.',
                ],
            ],
        ],
        'quote' => [
            'title' => 'Demander une visite et un devis',
            'intro' => 'Dites-nous où est le jardin et ce que vous en attendez. Nous passons le voir avant de chiffrer : la visite est gratuite et n’engage à rien.',
            'note' => 'Nous vous rappelons sous trois jours ouvrables pour fixer la visite.',
            'action' => '#quote',
            'scopes' => [
                'Création d’un jardin',
                'Plantations et haies',
                'Terrasse, dallage ou allée',
                'Murs et escaliers',
                'Bassin ou baignade naturelle',
                'Taille, soins ou abattage d’arbres',
                'Contrat d’entretien',
                'Arrosage ou éclairage',
            ],
            'budgets' => [
                'Moins de CHF 5 000',
                'De CHF 5 000 à 20 000',
                'De CHF 20 000 à 60 000',
                'Plus de CHF 60 000',
            ],
        ],
        'map' => [
            'address' => 'Chemin de la Pépinière 6, 1170 Aubonne',
            'title' => 'Bovard Jardins, dépôt et pépinière',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Paysagistes à Aubonne · saison des plantations',
                'title' => 'Des jardins faits pour durer, et tenus toute l’année',
                'lead' => 'Dix-huit jardiniers, paveurs et arboristes, et une pépinière de deux hectares. Nous dessinons, plantons, pavons et entretenons nous-mêmes, de Nyon à Morges et jusqu’au pied du Jura.',
                'subject' => 'Un jardin en terrasses au-dessus du Léman, un matin d’octobre',
                'note' => 'Plantations d’automne : encore six créneaux avant fin novembre',
                'links' => [['label' => 'Demander une visite', 'to' => '/quote'], ['label' => 'Voir nos jardins', 'to' => '/gardens']],
                'facts' => [['value' => '18', 'label' => 'Jardiniers, paveurs et arboristes'], ['value' => '2 ha', 'label' => 'De pépinière à Aubonne'], ['value' => '140', 'label' => 'Jardins sous contrat d’entretien']],
            ],
            'features' => [
                'eyebrow' => 'De l’esquisse à la taille d’hiver',
                'title' => 'Ceux qui plantent sont ceux qui reviennent',
                'lead' => 'Nous ne sous-traitons ni le pavage ni la taille : l’équipe qui fait votre jardin est celle qui l’entretient ensuite.',
                'items' => [
                    ['title' => 'Des jardins à voir', 'body' => 'Six jardins récents, chacun avec son lieu, son année et sa surface : une baignade à Perroy, des murs de vigne à Bougy, une cour à Rolle.', 'subject' => 'Une baignade naturelle bordée d’iris, un ponton en mélèze', 'to' => '/gardens', 'label' => 'Nos jardins'],
                    ['title' => 'La bonne saison', 'body' => 'Quand planter, faut-il un permis pour abattre, que couvre la garantie : les sept questions qu’on nous pose au téléphone.', 'subject' => 'Des arbres en motte alignés dans la pépinière, en novembre', 'to' => '/questions', 'label' => 'Les réponses'],
                    ['title' => 'Une visite, puis un chiffre', 'body' => 'Nous passons voir le terrain avant de chiffrer. Le devis détaille chaque poste et arrive dans la semaine qui suit.', 'subject' => 'Claire Bovard, plan en main, dans un jardin à reprendre', 'to' => '/quote', 'label' => 'Demander une visite'],
                ],
            ],
        ],
        '/gardens' => [
            'label' => 'Jardins',
            'hero' => [
                'eyebrow' => 'Jardins réalisés',
                'title' => 'Six jardins, de la cour de ville à la terrasse de vigne',
                'lead' => 'Chacun avec son lieu, son année et sa surface. Tous se visitent sur demande, avec l’accord de leurs propriétaires.',
                'subject' => 'Trois terrasses en pierre sèche plantées de lavandes, à Bougy-Villars',
                'links' => [['label' => 'Demander une visite', 'to' => '/quote']],
            ],
            'story' => [
                'eyebrow' => 'Deux étés plus tard',
                'title' => 'Un jardin se juge à son troisième été',
                'lead' => 'Le jour de la remise, tout jardin est beau. Nous retournons voir les nôtres après deux hivers.',
                'body' => [
                    'En 1974, Henri Bovard plantait des haies de thuyas et semait du gazon, comme tout le monde. Sa fille Claire a repris l’entreprise en 2009 avec une autre idée : planter ce qui pousse ici sans arrosage, et dessiner chaque jardin pour celui qui l’entretiendra.',
                    'Au Clos des Vignes, à Féchy, la pelouse en pente demandait une tonte par semaine et brûlait chaque mois d’août. Nous l’avons remplacée par une prairie fauchée deux fois l’an, un verger de huit hautes-tiges et une terrasse en pierre de Hauterive. Deux étés plus tard, aucun arbre n’a été remplacé.',
                    'Chaque jardin de cette page a été planté avec des végétaux de notre pépinière, élevés en pleine terre à 480 mètres d’altitude. Ils ont connu le gel et la bise d’Aubonne avant d’arriver chez vous : c’est pour cela que nous pouvons les garantir.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Au fil des saisons',
                'title' => 'Le même jardin, trois fois l’an',
                'items' => [
                    ['title' => 'Octobre : on plante', 'body' => 'Arbres et haies à racines nues, tant que la terre est encore chaude.', 'subject' => 'Deux jardiniers plantant un pommier haute-tige dans la brume'],
                    ['title' => 'Février : on taille', 'body' => 'Fruitiers, rosiers et grands arbres, hors sève et avant les nids.', 'subject' => 'Un arboriste encordé dans un tilleul sans feuilles'],
                    ['title' => 'Juin : on regarde', 'body' => 'La prairie est en fleurs et la terrasse sert tous les soirs : c’est là que nous refaisons le tour avec vous.', 'subject' => 'Une prairie fleurie devant une terrasse en pierre, en juin'],
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions',
                'title' => 'La saison, les permis, la garantie',
                'lead' => 'Ce qu’on nous demande le plus souvent avant une première visite. Pour le reste, appelez le 021 000 00 00 : c’est un jardinier qui répond.',
                'subject' => 'Un carnet de plantation ouvert sur l’établi de la pépinière',
                'links' => [['label' => 'Demander une visite', 'to' => '/quote'], ['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'Le calendrier du jardin',
                'title' => 'Un jardin se commande une saison à l’avance',
                'lead' => 'La plupart des déceptions viennent d’un mauvais mois, pas d’une mauvaise plante.',
                'body' => [
                    'Un jardin planté en octobre a six mois d’avance sur un jardin planté en mai. Les racines s’installent tout l’hiver dans une terre encore tiède, et l’arbre repart au printemps sans avoir connu la soif. C’est pourquoi nous dessinons en été, terrassons en septembre et plantons d’octobre à fin novembre.',
                    'Les pierres, elles, se posent par temps sec : terrasses, murs et escaliers se font de mars à octobre. Une baignade naturelle se creuse au printemps pour être plantée en mai et claire en juillet. Les grands arbres se taillent en hiver, hors sève et hors nidification, de novembre à fin février.',
                    'Si vous lisez ceci en avril avec l’envie d’un jardin pour l’été, nous vous le dirons franchement : la terrasse peut être posée tout de suite, et le reste sera planté à l’automne. Le devis sépare toujours les deux, chacun avec ses dates.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Trois choses que le devis dit toujours',
                'items' => [
                    ['title' => 'Les dates', 'body' => 'Le jour d’ouverture, le jour de fin et le nom du chef d’équipe.', 'subject' => 'Un planning de chantier épinglé au mur du dépôt'],
                    ['title' => 'Les plantes, une à une', 'body' => 'Chaque espèce avec sa taille à la plantation et son prix.', 'subject' => 'Des étiquettes de pépinière sur de jeunes charmes'],
                    ['title' => 'L’arrosage du premier été', 'body' => 'Un calendrier semaine par semaine, que vous suivez ou que nous assurons.', 'subject' => 'Un goutte-à-goutte au pied d’une haie fraîchement plantée'],
                ],
            ],
        ],
        '/quote' => [
            'hero' => [
                'eyebrow' => 'Visite et devis',
                'title' => 'Une visite, puis un chiffre',
                'lead' => 'Nous passons voir le jardin avant de chiffrer. La visite est gratuite dans un rayon de 25 km autour d’Aubonne, et le devis arrive dans la semaine qui suit.',
                'subject' => 'Un mètre ruban et un carnet de croquis posés sur un muret',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'Après votre demande',
                'title' => 'Ce qui se passe ensuite',
                'lead' => 'Trois jours pour vous rappeler, une heure sur place, une semaine pour le devis.',
                'body' => [
                    'Nous vous rappelons sous trois jours ouvrables pour fixer la visite. Claire Bovard ou un chef d’équipe vient sur place, une heure environ : on fait le tour du terrain, on regarde la terre, l’exposition, les accès pour les machines et ce que vous voulez garder.',
                    'Le devis arrive dans la semaine. Il détaille chaque poste, chaque plante avec sa taille et son prix, et les dates d’ouverture et de fin. Pour une création, il est accompagné d’une esquisse ; le plan complet, facturé dès CHF 1 200, est déduit du chantier si nous le réalisons.',
                    'Rien n’est commandé avant votre signature, et le prix signé est le prix facturé : un imprévu sous terre vous est montré sur place avant d’être chiffré.',
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Vous préférez en parler ?',
                'lead' => 'Un jardinier répond du lundi au vendredi de 7 h 30 à 17 h. Le samedi matin, passez à la pépinière : il y a toujours quelqu’un pour regarder un plan ou une photo.',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir nos jardins', 'to' => '/gardens']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                    ['label' => 'Pépinière', 'value' => 'Chemin de la Pépinière 6, Aubonne · samedi 8 h–12 h'],
                    ['label' => 'Visites gratuites', 'value' => 'Dans un rayon de 25 km autour d’Aubonne'],
                ],
            ],
        ],
    ],
];
