<?php

declare(strict_types=1);

/*
 * The demo content of an architect: a fictional practice of six people in a
 * former printing works in Vevey, which builds houses on slopes, converts
 * farms and wins the odd school. `site` is what every page shares, `prefabs`
 * is what the site would bind as `kit.<name>` — the rows its owner keeps in
 * the admin, in each component's own prop names — and `pages` holds each
 * page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/architect.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Morand Rey architectes',
        'blurb' => 'Un atelier de six personnes à Vevey : maisons, fermes transformées et petits bâtiments publics, dessinés et suivis par les mêmes mains.',
        'address' => 'Rue du Simplon 18, 1800 Vevey',
        'phone' => '021 000 00 00',
        'email' => 'atelier@morand-rey.example',
        'status' => 'Atelier ouvert du lundi au vendredi, 8 h 30 – 18 h',
        'note' => '© Morand Rey architectes Sàrl · SIA · REG A',
        'action' => ['label' => 'Parler de votre projet', 'to' => '/contact'],
        'band' => [
            'eyebrow' => 'Première rencontre',
            'title' => 'Un terrain, une maison, une idée ?',
            'lead' => 'Une heure avec l’un des deux associés, sur place ou à l’atelier, sans frais et sans engagement.',
            'links' => [['label' => 'Parler de votre projet', 'to' => '/contact'], ['label' => 'Voir les réalisations', 'to' => '/projects']],
            'details' => [
                ['label' => 'Atelier', 'value' => 'Rue du Simplon 18, Vevey'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Horaires', 'value' => 'Lundi au vendredi, 8 h 30 – 18 h'],
            ],
        ],
    ],

    'prefabs' => [
        'projects' => [
            'title' => 'Réalisations choisies',
            'projects' => [
                [
                    'name' => 'Maison dans les vignes',
                    'place' => 'Chardonne',
                    'year' => 2023,
                    'kind' => 'Maison individuelle',
                    'figure' => '186 m²',
                    'figure_label' => 'habitables sur trois niveaux',
                    'summary' => 'Ossature bois et bardage de mélèze sur un coteau à 32 %. Chaque niveau sort de plain-pied dans la pente.',
                ],
                [
                    'name' => 'Ferme des Thioleyres',
                    'place' => 'Puidoux',
                    'year' => 2022,
                    'kind' => 'Transformation',
                    'figure' => '4 logements',
                    'figure_label' => 'dans le volume du rural',
                    'summary' => 'Le rural de 1874 gardé sous sa charpente : les logements sont glissés entre les fermes, sans toucher aux murs de molasse.',
                ],
                [
                    'name' => 'École de la Veyre',
                    'place' => 'Saint-Légier',
                    'year' => 2021,
                    'kind' => 'Bâtiment public · concours, 1er prix',
                    'figure' => '12 classes',
                    'figure_label' => 'et une salle de gymnastique',
                    'summary' => 'Concours ouvert gagné en 2018. Structure bois sur socle de béton, préau couvert tourné vers les Pléiades.',
                ],
                [
                    'name' => 'Coopérative des Moulins',
                    'place' => 'Vevey',
                    'year' => 2024,
                    'kind' => 'Logement collectif',
                    'figure' => '14 appartements',
                    'figure_label' => 'à loyer coûtant',
                    'summary' => 'Cinq niveaux sur une parcelle large de onze mètres, les coursives côté cour et les séjours sur la rue.',
                ],
                [
                    'name' => 'Surélévation rue du Château',
                    'place' => 'La Tour-de-Peilz',
                    'year' => 2020,
                    'kind' => 'Surélévation',
                    'figure' => '9 jours',
                    'figure_label' => 'pour poser deux étages en bois',
                    'summary' => 'Deux niveaux préfabriqués sur un immeuble de 1958, habité pendant tout le chantier.',
                ],
                [
                    'name' => 'Cabinet de pédiatrie',
                    'place' => 'Montreux',
                    'year' => 2023,
                    'kind' => 'Aménagement intérieur',
                    'figure' => '240 m²',
                    'figure_label' => 'au premier étage d’un immeuble de 1900',
                    'summary' => 'Six salles de consultation autour d’une salle d’attente en bouleau, livrées en onze semaines.',
                ],
            ],
        ],
        'process' => [
            'title' => 'Un mandat, cinq étapes',
            'intro' => 'Un mandat complet dure de dix-huit mois à deux ans. Voici ce qui s’y passe, dans l’ordre, et ce que vous décidez à chaque étape.',
            'steps' => [
                ['name' => 'Première conversation', 'line' => 'Une heure sur le terrain ou dans la maison : nous disons ce que le règlement permet et ce que cela coûte à peu près.', 'duration' => 'Une heure, sans frais'],
                ['name' => 'Esquisse et avant-projet', 'line' => 'Deux ou trois variantes en plans et en maquette, chacune avec son estimation à quinze pour cent près. Vous en choisissez une.', 'duration' => '6 à 8 semaines'],
                ['name' => 'Permis de construire', 'line' => 'Le dossier d’enquête, les services cantonaux et les voisins : nous le portons jusqu’à la décision de la commune.', 'duration' => '3 à 6 mois'],
                ['name' => 'Soumissions et chantier', 'line' => 'Chaque lot mis en soumission auprès de trois entreprises de la région, puis une séance par semaine sur place et les coûts chaque mois.', 'duration' => '10 à 14 mois'],
                ['name' => 'Remise des clés', 'line' => 'La réception avec vous, pièce par pièce, le dossier complet du bâtiment et deux ans de suivi des garanties.'],
            ],
        ],
        'team' => [
            'title' => 'Celles et ceux qui dessinent',
            'members' => [
                ['name' => 'Claire Morand', 'role' => 'Architecte EPFL SIA, associée', 'bio' => 'Ouvre l’atelier en 2008 après dix ans à Bâle. Dessine les maisons et conduit les concours.'],
                ['name' => 'Julien Rey', 'role' => 'Architecte HES, associé', 'bio' => 'Charpentier avant d’être architecte, associé depuis 2014. Tient les soumissions et les coûts.'],
                ['name' => 'Inès Cavin', 'role' => 'Architecte EPFL, cheffe de projet', 'bio' => 'Mène les transformations de fermes et les dossiers avec les Monuments et sites.'],
                ['name' => 'Léa Favre', 'role' => 'Architecte d’intérieur HES', 'bio' => 'Cuisines, menuiseries sur mesure et lumière, du cabinet médical au galetas.'],
                ['name' => 'Thomas Blanc', 'role' => 'Dessinateur en bâtiment CFC', 'bio' => 'Plans d’exécution et détails au 1:5. Quinze ans de métier, dont neuf à l’atelier.'],
                ['name' => 'Nuno Pereira', 'role' => 'Directeur de travaux', 'bio' => 'Sur les chantiers trois jours par semaine ; le procès-verbal part le soir même.'],
            ],
        ],
        'credentials' => [
            'title' => 'Registres et distinctions',
            'credentials' => [
                ['name' => 'SIA · Société suisse des ingénieurs et des architectes', 'detail' => 'Membre bureau depuis 2010'],
                ['name' => 'REG A · Registre suisse des architectes', 'detail' => 'Claire Morand, inscrite en 2006'],
                ['name' => 'Distinction romande d’architecture', 'detail' => 'Nomination 2022 · École de la Veyre'],
                ['name' => 'Prix Lignum', 'detail' => 'Mention région Ouest 2021 · Surélévation rue du Château'],
                ['name' => 'Minergie', 'detail' => 'Partenaire spécialisé · 5 bâtiments certifiés, dont 2 Minergie-P'],
                ['name' => 'Patrimoine suisse, section vaudoise', 'detail' => 'Membre depuis 2012'],
            ],
        ],
        'quote' => [
            'title' => 'Parler de votre projet',
            'intro' => 'Décrivez le terrain ou la maison en quelques lignes : Claire Morand ou Julien Rey vous rappelle pour fixer une première rencontre.',
            'note' => 'Nous répondons sous trois jours ouvrables. La première rencontre dure une heure et ne coûte rien.',
            'action' => '#quote',
            'scopes' => [
                'Maison individuelle',
                'Transformation ou rénovation',
                'Surélévation ou agrandissement',
                'Logement collectif',
                'Aménagement intérieur',
                'Bâtiment public ou concours',
                'Étude de faisabilité',
            ],
            'budgets' => [
                'Moins de CHF 300 000',
                'CHF 300 000 à 800 000',
                'CHF 800 000 à 2 millions',
                'Plus de CHF 2 millions',
            ],
        ],
        'map' => [
            'address' => 'Rue du Simplon 18, 1800 Vevey',
            'title' => 'Morand Rey architectes · au fond de la cour, sous la verrière',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Architectes · Vevey',
                'title' => 'Des bâtiments dessinés et suivis par les mêmes mains',
                'lead' => 'Un atelier de six personnes, fondé en 2008. Maisons, fermes transformées et petits bâtiments publics entre Lavaux et la Veveyse : la personne qui dessine votre projet est celle que vous retrouvez au chantier.',
                'subject' => 'La maison de Chardonne au-dessus des vignes, façade de mélèze au soleil du soir',
                'note' => 'Deux mandats ouverts pour 2027',
                'links' => [['label' => 'Parler de votre projet', 'to' => '/contact'], ['label' => 'Voir les réalisations', 'to' => '/projects']],
                'facts' => [['value' => '64', 'label' => 'Bâtiments livrés depuis 2008'], ['value' => '6', 'label' => 'Personnes à l’atelier'], ['value' => '3', 'label' => 'Concours gagnés']],
            ],
            'features' => [
                'eyebrow' => 'L’atelier en trois pages',
                'title' => 'Regarder, comprendre, rencontrer',
                'lead' => 'Ce qu’un maître d’ouvrage veut savoir avant d’appeler : ce que nous avons construit, comment un mandat se passe et à qui il parlera.',
                'items' => [
                    ['title' => 'Des réalisations comme la vôtre', 'body' => 'Une maison en pente, une ferme transformée, une école, un immeuble de coopérative : chacune avec son lieu, son année et le chiffre qui la résume.', 'subject' => 'La ferme des Thioleyres après transformation, le rural sous sa charpente d’origine', 'to' => '/projects', 'label' => 'Toutes les réalisations'],
                    ['title' => 'Un mandat, cinq étapes', 'body' => 'De la première conversation à la remise des clés : ce qui se passe, combien de temps cela prend et ce que vous décidez à chaque fois.', 'subject' => 'Deux maquettes en carton gris côte à côte sur la table de l’atelier', 'to' => '/approach', 'label' => 'Le déroulement d’un mandat'],
                    ['title' => 'Six personnes, une table', 'body' => 'Deux associés, deux architectes, un dessinateur et un directeur de travaux. Vous rencontrez dès la première heure celle ou celui qui dessinera.', 'subject' => 'L’équipe autour de la grande table, plans déroulés sous la verrière', 'to' => '/studio', 'label' => 'L’atelier et l’équipe'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2008',
                'title' => 'Peu de projets, tenus jusqu’au dernier joint',
                'lead' => 'Nous prenons quatre à cinq mandats par an. C’est ce qu’une table de six personnes peut suivre sans déléguer le chantier.',
                'body' => [
                    'Claire Morand a ouvert l’atelier en 2008 dans une ancienne imprimerie de la rue du Simplon, avec une première commande : agrandir la maison d’un vigneron de Chardonne sans lui prendre un cep. Julien Rey, charpentier avant d’être architecte, l’a rejointe trois ans plus tard ; il est associé depuis 2014.',
                    'Nous travaillons dans un rayon de quarante minutes autour de Vevey, parce qu’un chantier se suit sur place, chaque semaine. La plupart de nos bâtiments sont en bois, souvent sur des terrains en pente, et un sur trois est une transformation : une ferme, un rural, un immeuble des années cinquante que l’on surélève.',
                    'Chaque projet commence par une maquette en carton et finit par une liste de retouches signée pièce par pièce. Entre les deux, vous recevez les coûts à jour le premier lundi de chaque mois.',
                ],
            ],
        ],
        '/projects' => [
            'label' => 'Réalisations',
            'hero' => [
                'eyebrow' => 'Réalisations',
                'title' => 'Six bâtiments sur soixante-quatre',
                'lead' => 'Un choix de ce que l’atelier a livré depuis 2020 : une maison, une ferme, une école, un immeuble de coopérative, une surélévation et un cabinet. Chacun avec son lieu, son année et le chiffre qui le résume.',
                'subject' => 'L’école de la Veyre vue depuis le préau, bois clair sur socle de béton',
                'links' => [['label' => 'Parler de votre projet', 'to' => '/contact'], ['label' => 'Comment se passe un mandat', 'to' => '/approach']],
            ],
            'features' => [
                'eyebrow' => 'Ce que nous construisons',
                'title' => 'Trois familles de projets',
                'lead' => 'Nous ne faisons ni villas sur catalogue ni centres commerciaux. Le reste se discute.',
                'items' => [
                    ['title' => 'Maisons', 'body' => 'Une à deux par an, presque toujours en bois et presque toujours en pente. De 140 à 260 m², avec ou sans logement indépendant.', 'subject' => 'Une maison à ossature bois en cours de levage sur un coteau'],
                    ['title' => 'Transformations', 'body' => 'Fermes, ruraux et immeubles d’avant 1960 : nous gardons la structure et le caractère, et nous amenons l’isolation, la lumière et les normes.', 'subject' => 'La charpente d’un rural mise à nu, étayée pendant les travaux'],
                    ['title' => 'Écoles et logements', 'body' => 'Écoles, crèches et coopératives d’habitation, le plus souvent gagnées sur concours ou sur appel d’offres communal.', 'subject' => 'Une salle de classe vide, fenêtres en bandeau sur les Préalpes'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Lire cette page',
                'title' => 'Un chiffre par bâtiment, le reste en visite',
                'lead' => 'Une photographie ne dit ni ce qu’un bâtiment a coûté ni comment on y vit.',
                'body' => [
                    'Chaque réalisation porte ici un seul chiffre, celui qui la résume : une surface, un nombre de logements, une durée de chantier. Les coûts au mètre cube, les plans et les consommations mesurées, nous les montrons à l’atelier, dossier ouvert sur la table.',
                    'La plupart de nos anciens clients acceptent de faire visiter. Si une maison ou une transformation ressemble à ce que vous imaginez, dites-le lors de la première rencontre : nous organisons la visite avec celles et ceux qui y habitent.',
                ],
            ],
        ],
        '/approach' => [
            'label' => 'Démarche',
            'hero' => [
                'eyebrow' => 'Démarche',
                'title' => 'De la première esquisse à la remise des clés',
                'lead' => 'Un mandat complet dure entre dix-huit mois et deux ans. Vous savez dès le premier jour ce qui vient ensuite, ce que cela coûte et ce que vous aurez à décider.',
                'subject' => 'Deux maquettes en carton gris côte à côte sur la table de l’atelier',
                'links' => [['label' => 'Parler de votre projet', 'to' => '/contact'], ['label' => 'Voir les réalisations', 'to' => '/projects']],
            ],
            'story' => [
                'eyebrow' => 'Notre manière',
                'title' => 'Dessiner en maquette, décider sur des chiffres',
                'lead' => 'Un bâtiment réussi tient à trois choses que nous ne déléguons pas : le dessin, les coûts et le chantier.',
                'body' => [
                    'Nous ne montrons jamais une seule solution. À la fin de l’esquisse, vous avez devant vous deux ou trois maquettes au 1:100, chacune avec son estimation à quinze pour cent près, et vous choisissez en connaissant le prix de chaque idée.',
                    'Les honoraires suivent le règlement SIA 102 et sont fixés par phase : vous pouvez vous arrêter après l’avant-projet ou après le permis sans rien devoir pour la suite. Les travaux sont mis en soumission lot par lot auprès de trois entreprises de la région, et nous comparons les offres ligne à ligne avec vous.',
                    'Pendant le chantier, Nuno Pereira ou Julien Rey est sur place chaque semaine. Le procès-verbal part le soir même et le décompte des coûts le premier lundi du mois : un dépassement se voit quand il est encore temps de choisir autrement.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Compris dans le mandat',
                'title' => 'Ce que vous recevez en chemin',
                'items' => [
                    ['title' => 'Des maquettes', 'body' => 'Une par variante au 1:100, puis celle du projet retenu au 1:50, que vous gardez.', 'subject' => 'Une maquette au 1:50, toit ôté, vue de dessus', 'icon' => 'box'],
                    ['title' => 'Les coûts chaque mois', 'body' => 'Un décompte par lot, comparé au devis général et envoyé le premier lundi du mois.', 'subject' => 'Un tableau de coûts annoté au crayon rouge', 'icon' => 'calculator'],
                    ['title' => 'Une seule personne', 'body' => 'Celle qui a dessiné votre projet le suit jusqu’à la réception et pendant les deux ans de garantie.', 'subject' => 'Une architecte et un charpentier devant une façade en cours de pose', 'icon' => 'user-round'],
                ],
            ],
        ],
        '/studio' => [
            'label' => 'L’atelier',
            'hero' => [
                'eyebrow' => 'L’atelier',
                'title' => 'Six personnes autour d’une grande table',
                'lead' => 'Deux associés, deux architectes, un dessinateur et un directeur de travaux, dans une ancienne imprimerie de la rue du Simplon. Vous rencontrez dès la première heure celle ou celui qui dessinera votre projet.',
                'subject' => 'La grande table de l’atelier, plans déroulés et maquettes sous la verrière',
                'links' => [['label' => 'Parler de votre projet', 'to' => '/contact'], ['label' => 'Voir les réalisations', 'to' => '/projects']],
            ],
            'story' => [
                'eyebrow' => 'Rue du Simplon 18',
                'title' => 'Une imprimerie devenue atelier',
                'lead' => 'Nous sommes restés petits exprès.',
                'body' => [
                    'L’atelier occupe depuis 2008 le rez et l’entresol d’une ancienne imprimerie, au fond d’une cour, sous une verrière de 1912 que nous avons restaurée nous-mêmes. Il n’y a qu’une table, longue de neuf mètres : les plans d’exécution, les maquettes et les échantillons de bois s’y croisent toute la journée.',
                    'Six personnes, c’est assez pour porter une école de douze classes, et assez peu pour que les deux associés connaissent chaque détail de chaque chantier. Personne ici ne fait que des concours ou que des plans : chacun suit ses projets du premier croquis à la dernière retouche.',
                    'Nous formons un apprenti dessinateur tous les quatre ans et accueillons chaque printemps une ou un stagiaire de la haute école de Fribourg. L’atelier ouvre ses portes au public un week-end de mai, avec les maquettes de l’année sur la table.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Dans l’atelier',
                'title' => 'Ce que vous verrez en venant',
                'items' => [
                    ['title' => 'La table', 'body' => 'Neuf mètres de chêne récupérés de l’imprimerie. Les premières rencontres s’y tiennent, au milieu des projets en cours.', 'subject' => 'La table de neuf mètres vue en enfilade, lampes basses allumées'],
                    ['title' => 'Les maquettes', 'body' => 'Soixante-quatre bâtiments au 1:100 sur une étagère : le moyen le plus rapide de montrer ce qu’un terrain peut porter.', 'subject' => 'Une étagère de maquettes en carton, rangées par année'],
                    ['title' => 'Les échantillons', 'body' => 'Mélèze, épicéa, chaux, terre cuite : on choisit un bardage en le tenant dans la main, pas sur un écran.', 'subject' => 'Des planchettes de bois brut et grisé alignées contre un mur'],
                ],
            ],
        ],
        '/contact' => [
            'hero' => [
                'eyebrow' => 'Première rencontre',
                'title' => 'Parlons de votre terrain ou de votre maison',
                'lead' => 'Une heure avec Claire Morand ou Julien Rey, sur place ou à l’atelier, sans frais. Écrivez quelques lignes ou appelez : nous fixons le rendez-vous dans la semaine.',
                'subject' => 'La porte de l’atelier au fond de la cour, rue du Simplon',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir les réalisations', 'to' => '/projects']],
            ],
            'story' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Ce qu’il est utile d’apporter',
                'lead' => 'Rien n’est obligatoire, mais trois documents font gagner une séance.',
                'body' => [
                    'Pour un terrain : le numéro de la parcelle ou l’extrait du registre foncier, et le règlement communal si vous l’avez. Nous vérifions avant le rendez-vous ce que la zone autorise : la hauteur, les distances aux limites, la surface constructible.',
                    'Pour une maison existante : les plans d’origine s’ils existent, quelques photographies et l’année de construction. Si vous n’avez rien, nous faisons un relevé ; il est compris dans l’esquisse.',
                    'Et dans tous les cas un ordre de grandeur de ce que vous voulez dépenser, même large. C’est la première chose que nous dessinons.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Venir à l’atelier',
                'title' => 'Au fond de la cour, sous la verrière',
                'items' => [
                    ['title' => 'En train', 'body' => 'Gare de Vevey, puis six minutes à pied par la rue du Simplon.', 'subject' => 'La rue du Simplon vue depuis la gare', 'icon' => 'train-front'],
                    ['title' => 'En voiture', 'body' => 'Parking du Panorama à deux cents mètres ; la cour reste libre pour les livraisons.', 'subject' => 'Le porche qui mène à la cour de l’atelier', 'icon' => 'square-parking'],
                    ['title' => 'Sur votre terrain', 'body' => 'La première rencontre se tient volontiers sur place, dans un rayon de quarante minutes autour de Vevey.', 'subject' => 'Deux personnes sur une parcelle en pente, un plan déplié entre elles', 'icon' => 'map-pinned'],
                ],
            ],
        ],
    ],
];
