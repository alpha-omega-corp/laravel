<?php

declare(strict_types=1);

/*
 * The demo content of a venue: a fictional wine estate above the lake at
 * Féchy, on La Côte, whose barn, orangery, press room and garden are hired for
 * weddings, seminars and family parties — one reception a day. `site` is what
 * every page shares, `prefabs` is what the site would bind as `kit.<name>` —
 * the rows its owner keeps in the admin, in each component's own prop names —
 * and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/venue.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Domaine des Aulnes',
        'blurb' => 'Un domaine viticole de La Côte qui se loue pour un mariage, un séminaire ou une fête : quatre salles, un jardin et une seule réception par jour.',
        'address' => 'Chemin des Aulnes 3, 1173 Féchy',
        'phone' => '021 000 00 00',
        'email' => 'reception@domaine-des-aulnes.example',
        'status' => 'Saison 2027 : sept samedis encore libres',
        'note' => '© Domaine des Aulnes · Famille Rochat',
        'action' => ['label' => 'Demander une date', 'to' => '/enquiry'],
        'band' => [
            'eyebrow' => 'Votre date',
            'title' => 'Une date en tête ?',
            'lead' => 'Dites-nous l’occasion et le nombre d’invités : Camille répond sous deux jours ouvrables, avec les disponibilités et un prix complet.',
            'links' => [['label' => 'Demander une date', 'to' => '/enquiry'], ['label' => 'Voir les salles', 'to' => '/spaces']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Chemin des Aulnes 3, Féchy'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Visites', 'value' => 'Du mardi au samedi, sur rendez-vous'],
            ],
        ],
    ],

    'prefabs' => [
        'listings' => [
            'title' => 'Les salles du domaine',
            'listings' => [
                [
                    'name' => 'La Grange',
                    'place' => 'De plain-pied sur la cour',
                    'price' => 'CHF 4 800.– la journée',
                    'status' => 'La plus demandée',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '180'],
                        ['label' => 'Debout', 'value' => '250'],
                        ['label' => 'Surface', 'value' => '320 m²'],
                        ['label' => 'Pour', 'value' => 'Mariages, banquets'],
                    ],
                ],
                [
                    'name' => 'L’Orangerie',
                    'place' => 'Côté jardin, sous verrière',
                    'price' => 'CHF 2 600.– la journée',
                    'status' => 'Rénovée en 2025',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '80'],
                        ['label' => 'Debout', 'value' => '120'],
                        ['label' => 'Surface', 'value' => '140 m²'],
                        ['label' => 'Pour', 'value' => 'Cérémonies, dîners'],
                    ],
                ],
                [
                    'name' => 'Le Pressoir',
                    'place' => 'Cave voûtée, sous la maison',
                    'price' => 'CHF 1 400.– la soirée',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '40'],
                        ['label' => 'Debout', 'value' => '60'],
                        ['label' => 'Surface', 'value' => '75 m²'],
                        ['label' => 'Pour', 'value' => 'Dîners, dégustations'],
                    ],
                ],
                [
                    'name' => 'Le Salon des Vignes',
                    'place' => 'Premier étage de la maison',
                    'price' => 'CHF 950.– la journée',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '24 en U'],
                        ['label' => 'Debout', 'value' => '40'],
                        ['label' => 'Surface', 'value' => '60 m²'],
                        ['label' => 'Pour', 'value' => 'Séminaires, comités'],
                    ],
                ],
                [
                    'name' => 'Le Jardin',
                    'place' => 'Entre la Grange et les vignes',
                    'price' => 'CHF 900.– la demi-journée',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '200'],
                        ['label' => 'Debout', 'value' => '300'],
                        ['label' => 'Surface', 'value' => '1 200 m²'],
                        ['label' => 'Pour', 'value' => 'Cérémonies, apéritifs'],
                    ],
                ],
                [
                    'name' => 'Le domaine entier',
                    'place' => 'Les quatre salles, le jardin et la maison',
                    'price' => 'CHF 9 500.– le week-end',
                    'facts' => [
                        ['label' => 'Assis', 'value' => '180'],
                        ['label' => 'Debout', 'value' => '300'],
                        ['label' => 'Surface', 'value' => '600 m² couverts'],
                        ['label' => 'Pour', 'value' => 'Mariages sur deux jours'],
                    ],
                ],
            ],
        ],
        'gallery' => [
            'title' => 'Le domaine en douze images',
            'pictures' => [
                ['image' => 'picture:La Grange dressée pour cent soixante couverts', 'alt' => 'La Grange dressée pour un mariage, tables rondes sous la charpente', 'caption' => 'La Grange, 160 couverts, juin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La charpente de 1894, guirlandes allumées', 'alt' => 'La charpente de la Grange éclairée par des guirlandes', 'caption' => 'La charpente de 1894', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une cérémonie sous les aulnes, face aux vignes', 'alt' => 'Des invités assis au jardin pendant une cérémonie, les vignes derrière', 'caption' => 'Cérémonie au jardin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’apéritif sur la terrasse, le lac au loin', 'alt' => 'Des invités debout sur la terrasse, un verre à la main, le Léman au fond', 'caption' => 'L’apéritif, côté lac', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’Orangerie au matin, la verrière ouverte sur le jardin', 'alt' => 'L’Orangerie dressée de tables rondes sous la verrière', 'caption' => 'L’Orangerie, 80 couverts', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une seule table de quarante sous la voûte du Pressoir', 'alt' => 'Une longue table éclairée aux chandelles dans une cave voûtée', 'caption' => 'Le Pressoir aux chandelles', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le Salon des Vignes en U, l’écran déroulé', 'alt' => 'Une salle de séminaire avec une table en U et un écran', 'caption' => 'Le Salon des Vignes, 24 places en U', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La pause café d’un séminaire dans l’Orangerie', 'alt' => 'Des participants autour d’un buffet de café sous la verrière', 'caption' => 'Pause d’un séminaire, octobre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La table d’honneur fleurie de pivoines', 'alt' => 'Une table dressée de lin blanc et de pivoines', 'caption' => 'Table d’honneur, pivoines de juin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La piste de danse à minuit sous la charpente', 'alt' => 'Des invités dansant dans la Grange, lumières basses', 'caption' => 'Minuit dans la Grange', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La cour pavée à l’arrivée des invités', 'alt' => 'La cour pavée du domaine, le portail ouvert, des invités qui arrivent', 'caption' => 'La cour, à 17 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les vignes rousses d’octobre vues du jardin', 'alt' => 'Des rangs de vigne aux feuilles rousses descendant vers le lac', 'caption' => 'Octobre, vu du jardin', 'width' => 1200, 'height' => 900],
            ],
        ],
        'testimonials' => [
            'title' => 'Ils ont reçu aux Aulnes',
            'testimonials' => [
                [
                    'quote' => 'Nous avons visité onze lieux avant les Aulnes. C’est le seul où l’on nous a donné le prix complet à la première visite, et c’est le prix que nous avons payé.',
                    'name' => 'Léa et Julien Favre',
                    'role' => 'Mariés à la Grange, juin 2026',
                ],
                [
                    'quote' => 'Les quatre-vingts ans de ma mère dans le Pressoir : le traiteur de notre choix et la cave pour nous seuls jusqu’à minuit. Elle en parle encore.',
                    'name' => 'Antoine Rey',
                    'role' => 'Fête de famille, Morges',
                ],
                [
                    'quote' => 'Vingt-quatre cadres en séminaire deux jours, sans un souci de salle ni d’horaire. Camille avait réglé le beamer, les pauses et la navette avant notre arrivée ; nous revenons en mars.',
                    'name' => 'Sophie Berthoud',
                    'role' => 'Responsable RH, Vauthier Horlogerie SA',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Questions fréquentes',
            'entries' => [
                [
                    'question' => 'Pouvons-nous venir avec notre traiteur ?',
                    'answer' => 'Oui. Quatre traiteurs de la région connaissent déjà la cuisine, mais vous êtes libres d’en choisir un autre : il vient reconnaître les lieux avec Camille avant le jour J. Seuls les vins sont ceux du domaine, à leur prix de cave et sans droit de bouchon.',
                ],
                [
                    'question' => 'Jusqu’à quelle heure peut-on faire de la musique ?',
                    'answer' => 'Jusqu’à 2 h dans la Grange, portes fermées dès 22 h. Au jardin, la musique s’arrête à 22 h : c’est la règle de la commune. Les derniers invités quittent le domaine à 3 h.',
                ],
                [
                    'question' => 'Où se garent les invités ?',
                    'answer' => 'Dans le pré éclairé à cent mètres de la cour : 70 places, gratuites. Les cars déposent dans la cour. La gare d’Allaman est à 2,5 km et la navette du domaine se réserve avec la salle, CHF 180.– la soirée.',
                ],
                [
                    'question' => 'Quel acompte, et quand ?',
                    'answer' => '30 % à la signature du contrat, le solde trente jours avant la réception. Jusqu’à six mois avant la date, une annulation reporte l’acompte sur une autre date de la même année.',
                ],
                [
                    'question' => 'Qu’est-ce qui est compris dans le prix ?',
                    'answer' => 'Les tables, les chaises, la cuisine traiteur, la sonorisation d’ambiance, le chauffage, le nettoyage final et une personne du domaine sur place toute la journée. Le linge, les fleurs, le traiteur et la musique sont à vous.',
                ],
                [
                    'question' => 'Peut-on dormir sur place ?',
                    'answer' => 'La maison du vigneron compte six chambres et quatorze lits : CHF 1 800.– la nuit pour la maison entière, petit-déjeuner compris. Pour les autres invités, Camille envoie la liste des hôtels de Rolle et d’Aubonne, à dix minutes.',
                ],
                [
                    'question' => 'Et s’il pleut ?',
                    'answer' => 'L’Orangerie est réservée d’office avec le jardin, sans supplément. La décision se prend avec vous le matin même, à 9 h, et la cérémonie s’y installe en une heure.',
                ],
            ],
        ],
        'quote' => [
            'title' => 'Demander une date',
            'intro' => 'Dites-nous l’occasion, la date et combien vous serez : nous vous disons si le domaine est libre et ce que la journée coûterait.',
            'note' => 'Camille répond sous deux jours ouvrables, avec les disponibilités et un chiffre.',
            'action' => '#quote',
            'scopes' => ['Mariage', 'Séminaire ou journée d’entreprise', 'Anniversaire ou fête de famille', 'Dîner privé', 'Autre occasion'],
            'budgets' => ['Moins de CHF 3 000', 'De CHF 3 000 à 6 000', 'De CHF 6 000 à 10 000', 'Plus de CHF 10 000'],
        ],
        'map' => [
            'address' => 'Chemin des Aulnes 3, 1173 Féchy',
            'title' => 'Domaine des Aulnes · entrée par le portail de la cour',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Lieu de réception · La Côte',
                'title' => 'Une grange, une orangerie et les vignes pour votre jour',
                'lead' => 'Un domaine viticole de Féchy, entre Lausanne et Genève : quatre salles de 24 à 180 convives, un jardin face au lac et une seule réception par jour.',
                'subject' => 'La Grange dressée pour un mariage, les portes ouvertes sur les vignes',
                'note' => 'Saison 2027 : sept samedis encore libres',
                'links' => [['label' => 'Demander une date', 'to' => '/enquiry'], ['label' => 'Voir les salles', 'to' => '/spaces']],
                'facts' => [['value' => '180', 'label' => 'Convives assis dans la Grange'], ['value' => '4', 'label' => 'Salles, de 24 à 180 personnes'], ['value' => '1', 'label' => 'Réception par jour']],
            ],
            'features' => [
                'eyebrow' => 'Le domaine',
                'title' => 'Ce que vous louez, et ce qui vient avec',
                'lead' => 'Les salles, le lieu tel que vos invités le verront et les réponses à ce que tout hôte demande avant de signer.',
                'items' => [
                    ['title' => 'Les salles', 'body' => 'La Grange pour 180 convives, l’Orangerie pour 80, le Pressoir pour 40 et un salon de séminaire : chacune avec sa capacité, sa surface et son prix.', 'subject' => 'La charpente de la Grange au-dessus des tables rondes', 'to' => '/spaces', 'label' => 'Voir les quatre salles'],
                    ['title' => 'Le lieu en images', 'body' => 'Un mariage en juin, un dîner dans la cave, un comité de direction en U : le domaine photographié pendant de vraies réceptions.', 'subject' => 'Le jardin au crépuscule, des guirlandes entre les aulnes', 'to' => '/gallery', 'label' => 'Ouvrir la galerie'],
                    ['title' => 'Avant de signer', 'body' => 'Traiteur libre, musique jusqu’à 2 h, 70 places de parc, 30 % d’acompte : ce que tous les hôtes veulent savoir.', 'subject' => 'La cour pavée et le pré où se garent les invités', 'to' => '/questions', 'label' => 'Lire les questions'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1894',
                'title' => 'Un domaine de vignerons, ouvert aux fêtes depuis 2009',
                'lead' => 'Quatre générations de Rochat ont fait du vin ici. La cinquième y reçoit aussi les jours qui comptent.',
                'body' => [
                    'La Grange a été bâtie en 1894 pour le foin et les chars. Elle a servi jusqu’en 2006, puis elle est restée vide trois ans, jusqu’au mariage d’Hélène Rochat : cent vingt invités sous la charpente, et dès le lendemain des amis qui demandaient s’ils pouvaient la louer.',
                    'Depuis, le domaine accueille une quarantaine de réceptions par an et jamais deux le même jour : la cour, le jardin et le pré sont à vous de l’arrivée du traiteur au départ du dernier invité. Marc Rochat cultive toujours les six hectares de chasselas et de pinot noir qui entourent les salles, et ce sont ses vins que l’on sert à table.',
                    'Camille Dufour coordonne chaque réception depuis 2016. C’est elle qui fait visiter, qui répond aux demandes et qui est sur place le jour même, de la première livraison à la fermeture du portail.',
                ],
            ],
        ],
        '/spaces' => [
            'label' => 'Les salles',
            'hero' => [
                'eyebrow' => 'Les salles',
                'title' => 'Quatre salles et un jardin, de 24 à 180 convives',
                'lead' => 'Chacune se loue seule ou avec le jardin. Les prix sont ceux d’une journée, mobilier, cuisine traiteur et nettoyage compris.',
                'subject' => 'L’Orangerie vue du jardin, la verrière ouverte',
                'links' => [['label' => 'Demander une date', 'to' => '/enquiry'], ['label' => 'Voir la galerie', 'to' => '/gallery']],
            ],
            'features' => [
                'eyebrow' => 'Compris dans chaque location',
                'title' => 'Ce que le prix comprend',
                'lead' => 'Le même forfait pour toutes les salles : vous n’apportez que le traiteur, les fleurs et la musique.',
                'items' => [
                    ['title' => 'Le mobilier', 'body' => 'Tables rondes de dix et tables de ferme, deux cents chaises en bois, vestiaire et pupitre : installés selon votre plan la veille.', 'subject' => 'Les tables rondes et les chaises en bois alignées dans la Grange'],
                    ['title' => 'La cuisine traiteur', 'body' => 'Vingt-cinq mètres carrés de plain-pied avec la Grange : fours, chambre froide, lave-vaisselle et un accès direct pour le camion.', 'subject' => 'La cuisine traiteur, ses plans inox et sa chambre froide'],
                    ['title' => 'Quelqu’un sur place', 'body' => 'Camille ou un membre de l’équipe est là de la première livraison au dernier invité, pour la lumière, le chauffage et les imprévus.', 'subject' => 'Camille Dufour accueillant un traiteur dans la cour'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Choisir',
                'title' => 'Quelle salle pour quelle occasion',
                'lead' => 'On hésite rarement longtemps : le nombre d’invités décide presque toujours.',
                'body' => [
                    'Un mariage prend le plus souvent la Grange et le jardin : la cérémonie sous les aulnes, l’apéritif sur la terrasse, le dîner et la danse sous la charpente. L’Orangerie est alors réservée d’office, pour la pluie ou pour la table des enfants.',
                    'Un séminaire tient dans le Salon des Vignes jusqu’à vingt-quatre personnes autour d’une table en U, et passe à l’Orangerie au-delà. Le Pressoir se loue seul pour un dîner de quarante couverts, ou en fin de journée pour une dégustation des vins du domaine.',
                ],
            ],
        ],
        '/gallery' => [
            'label' => 'Galerie',
            'hero' => [
                'eyebrow' => 'Galerie',
                'title' => 'Le domaine, dressé pour vos invités',
                'lead' => 'Douze photographies prises pendant de vraies réceptions, de juin à décembre : rien n’a été loué ni fleuri pour la photo.',
                'subject' => 'La Grange à la tombée du jour, les guirlandes allumées',
                'links' => [['label' => 'Demander une date', 'to' => '/enquiry'], ['label' => 'Voir les salles', 'to' => '/spaces']],
            ],
            'features' => [
                'eyebrow' => 'Trois occasions',
                'title' => 'Le même lieu, trois façons de le dresser',
                'items' => [
                    ['title' => 'Un mariage en juin', 'body' => 'Cent soixante couverts dans la Grange, la cérémonie au jardin et la danse jusqu’à 2 h.', 'subject' => 'Les mariés sortant de la Grange sous une pluie de pétales', 'to' => '/spaces', 'label' => 'La Grange et le jardin'],
                    ['title' => 'Un dîner dans la cave', 'body' => 'Quarante convives à une seule table sous la voûte du Pressoir, aux chandelles.', 'subject' => 'Une longue table aux chandelles sous la voûte', 'to' => '/spaces', 'label' => 'Le Pressoir'],
                    ['title' => 'Un séminaire de deux jours', 'body' => 'Vingt-quatre personnes en U le matin, les ateliers au jardin l’après-midi.', 'subject' => 'Une table en U face aux vignes, l’écran déroulé', 'to' => '/enquiry', 'label' => 'Demander une date'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Une saison',
                'title' => 'Ce que les photographies ne disent pas',
                'lead' => 'Le lieu est livré tel que vous le voyez ici ; la lumière, elle, dépend du mois.',
                'body' => [
                    'Les images de cette page viennent de six réceptions de 2025 et 2026, publiées avec l’accord des hôtes. Les tables, les chaises et les guirlandes de la Grange sont celles du domaine ; les fleurs et le linge sont ceux que chaque hôte a choisis.',
                    'La lumière change beaucoup d’un mois à l’autre. En juin le soleil passe derrière le Jura vers 21 h 30 et l’apéritif se prend dehors ; en octobre les vignes sont rousses et l’on allume le poêle de la Grange dès 17 h. Venez voir le lieu à l’heure de votre réception : Camille fait visiter jusqu’à 20 h.',
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions',
                'title' => 'Ce que tous les hôtes nous demandent',
                'lead' => 'Traiteur, musique, parking, acompte : les réponses valent pour toutes les salles. Pour le reste, Camille répond au 021 000 00 00.',
                'subject' => 'La cour pavée du domaine, le portail ouvert',
                'links' => [['label' => 'Demander une date', 'to' => '/enquiry'], ['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'La règle de la maison',
                'title' => 'Une seule réception par jour',
                'lead' => 'Presque toutes les réponses de cette page découlent de là.',
                'body' => [
                    'Le domaine ne reçoit qu’une réception par jour. C’est pour cela que le traiteur est libre, que la cour est à vous dès 9 h et que personne ne vous demande de rendre la salle pour le groupe suivant.',
                    'Les deux limites viennent de la commune et du voisinage : la musique s’arrête à 22 h au jardin et à 2 h dans la Grange, et les feux d’artifice ne sont pas autorisés au milieu des vignes. Nous préférons le dire avant la visite plutôt qu’à la signature.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Avant de décider',
                'title' => 'Trois façons d’en savoir plus',
                'items' => [
                    ['title' => 'Les salles et leurs prix', 'body' => 'Capacité assise et debout, surface et prix de la journée, salle par salle.', 'subject' => 'Le plan de table de la Grange déplié sur une table', 'to' => '/spaces', 'label' => 'Voir les salles'],
                    ['title' => 'Le lieu en images', 'body' => 'Douze photographies de réceptions de 2025 et 2026.', 'subject' => 'L’Orangerie dressée, vue depuis le jardin', 'to' => '/gallery', 'label' => 'Ouvrir la galerie'],
                    ['title' => 'Une visite', 'body' => 'Une heure sur place avec Camille, du mardi au samedi, jusqu’à 20 h.', 'subject' => 'Camille Dufour faisant visiter la cour à un couple', 'to' => '/enquiry', 'label' => 'Demander une date'],
                ],
            ],
        ],
        '/enquiry' => [
            'hero' => [
                'eyebrow' => 'Demander une date',
                'title' => 'Votre date est-elle libre ?',
                'lead' => 'Décrivez l’occasion en quelques lignes : nous répondons sous deux jours ouvrables, avec les disponibilités et un prix complet.',
                'subject' => 'Le portail du domaine au bout de l’allée d’aulnes',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Lire les questions', 'to' => '/questions']],
            ],
            'story' => [
                'eyebrow' => 'Ensuite',
                'title' => 'De la demande à la signature',
                'lead' => 'Trois étapes, et aucune ne vous engage avant la dernière.',
                'body' => [
                    'Camille lit chaque demande elle-même et répond sous deux jours ouvrables : elle vous dit si la date est libre, quelles salles conviennent à votre nombre d’invités et ce que la journée coûterait, tout compris.',
                    'Si le chiffre vous convient, vous venez voir le domaine. La visite dure une heure, du mardi au samedi, et la date est retenue pour vous sans frais pendant dix jours à partir de ce moment-là.',
                    'La réservation est ferme à la signature du contrat et au versement de 30 % d’acompte. Trois mois avant la réception, un second rendez-vous règle le plan de table, les horaires du traiteur et la musique.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Venir',
                'title' => 'Arriver au domaine',
                'lead' => 'Féchy est à vingt-cinq minutes de Lausanne et à trente-cinq de Genève.',
                'items' => [
                    ['title' => 'En voiture', 'body' => 'Sortie Aubonne de l’A1, puis six minutes à travers les vignes. 70 places dans le pré, éclairé le soir.', 'subject' => 'Le pré de stationnement éclairé à la nuit tombée'],
                    ['title' => 'En train', 'body' => 'Gare d’Allaman à 2,5 km, un train toutes les demi-heures. La navette du domaine se réserve avec la salle.', 'subject' => 'La navette du domaine devant la gare d’Allaman'],
                    ['title' => 'En car', 'body' => 'Les cars de cinquante places entrent par le portail et déposent dans la cour, à dix mètres de la Grange.', 'subject' => 'Un car arrêté dans la cour pavée'],
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Plutôt par téléphone ?',
                'lead' => 'Camille répond du mardi au samedi, de 9 h à 18 h. En dehors de ces heures, laissez un message : elle rappelle le lendemain.',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Écrire au domaine', 'href' => 'mailto:reception@domaine-des-aulnes.example']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                    ['label' => 'Visites', 'value' => 'Du mardi au samedi, jusqu’à 20 h'],
                    ['label' => 'Réponse', 'value' => 'Sous deux jours ouvrables'],
                ],
            ],
        ],
    ],
];
