<?php

declare(strict_types=1);

/*
 * The demo content of a theatre: a fictional house of 212 seats in a former
 * tannery on the river at Morges, with a season of twenty-two evenings from
 * September to May. `site` is what every page shares, `prefabs` is what the
 * site would bind as `kit.<name>` — the rows its owner keeps in the admin, in
 * each component's own prop names — and `pages` holds each page's words, keyed
 * by its path in `.claude/skills/ui-kit/businesses/theatre.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Théâtre de la Tannerie',
        'blurb' => 'Une salle de 212 places dans l’ancienne tannerie de Morges : théâtre, musique, danse et jeune public, de septembre à mai.',
        'address' => 'Quai des Tanneurs 4, 1110 Morges',
        'phone' => '021 000 00 00',
        'email' => 'billetterie@theatre-tannerie.example',
        'status' => 'Ce jeudi à 20 h : Les Vagues',
        'note' => '© Théâtre de la Tannerie · Association des Amis de la Tannerie',
        'action' => ['label' => 'Réserver des places', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Venir',
            'title' => 'Une place pour un de ces soirs ?',
            'lead' => 'La caisse du soir ouvre une heure avant le rideau. Les places réservées se retirent jusqu’à un quart d’heure avant ; passé ce délai, elles sont remises en vente.',
            'links' => [['label' => 'Réserver des places', 'to' => '/book'], ['label' => 'Voir la saison', 'to' => '/season']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Quai des Tanneurs 4, Morges'],
                ['label' => 'Billetterie', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Gare', 'value' => 'Morges CFF, six minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'La billetterie',
            'note' => 'Les soirs de spectacle, la caisse rouvre une heure avant le lever de rideau.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '14:00–18:00'],
                ['day' => 'Mercredi', 'hours' => '14:00–18:00'],
                ['day' => 'Jeudi', 'hours' => '14:00–18:00'],
                ['day' => 'Vendredi', 'hours' => '14:00–18:00'],
                ['day' => 'Samedi', 'hours' => '10:00–13:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'events' => [
            'title' => 'Les prochains soirs',
            'events' => [
                ['date' => 'Jeudi 19 novembre', 'time' => '20 h', 'datetime' => '2026-11-19T20:00', 'name' => 'Les Vagues', 'description' => 'D’après Virginia Woolf · Compagnie du Phare, Lausanne. Six voix et une seule journée au bord de la mer. Théâtre, 1 h 40. Aussi vendredi 20 à 20 h.'],
                ['date' => 'Samedi 28 novembre', 'time' => '19 h', 'datetime' => '2026-11-28T19:00', 'name' => 'La Jeune Fille et la Mort', 'description' => 'Quatuor Ardève · Schubert et Chostakovitch. Musique de chambre, 1 h 15 avec entracte.'],
                ['date' => 'Mercredi 2 décembre', 'time' => '15 h', 'datetime' => '2026-12-02T15:00', 'name' => 'Le Loup qui avait peur du noir', 'description' => 'Compagnie Fil d’Ariane, Fribourg. Marionnettes à fils, dès 4 ans, 45 minutes. Goûter au foyer après la représentation.'],
                ['date' => 'Vendredi 11 décembre', 'time' => '20 h', 'datetime' => '2026-12-11T20:00', 'name' => 'Oncle Vania', 'description' => 'Anton Tchekhov · création de la Tannerie, mise en scène d’Hélène Rochat. Théâtre, 2 h 10 avec entracte. Aussi samedi 12 à 19 h.'],
                ['date' => 'Jeudi 31 décembre', 'time' => '21 h', 'datetime' => '2026-12-31T21:00', 'name' => 'Un fil à la patte', 'description' => 'Georges Feydeau · Les Tréteaux du Léman. La soirée du Réveillon : une comédie en trois actes, puis une coupe au foyer à minuit.'],
                ['date' => 'Vendredi 15 janvier', 'time' => '20 h', 'datetime' => '2027-01-15T20:00', 'name' => 'Terre battue', 'description' => 'Compagnie Nadir, Genève. Danse : cinq interprètes sur un sol d’argile, 55 minutes. Bord de scène après le spectacle.'],
                ['date' => 'Jeudi 28 janvier', 'time' => '20 h', 'datetime' => '2027-01-28T20:00', 'name' => 'Tout va bien se passer', 'description' => 'Sarah Mercier, seule en scène. Humour, 1 h 20. Complet le 28 : supplémentaire vendredi 29 à 20 h.'],
                ['date' => 'Samedi 6 février', 'time' => '20 h 30', 'datetime' => '2027-02-06T20:30', 'name' => 'Lacustre', 'description' => 'Trio Favre, Monod et Keller. Jazz : piano, contrebasse et batterie, le nouvel album joué en entier. Au Séchoir, 60 places.'],
            ],
        ],
        'gallery' => [
            'title' => 'La salle, la scène, le foyer',
            'pictures' => [
                ['image' => 'picture:La grande salle vue de la scène, les fauteuils rouges en gradin', 'alt' => 'La grande salle vue de la scène', 'caption' => 'La grande salle : 212 places, aucune à plus de quatorze mètres du plateau', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le plateau nu, le mur de brique du fond', 'alt' => 'Le plateau nu devant le mur de brique', 'caption' => 'Le plateau, dix mètres d’ouverture sur huit de profondeur', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le foyer sous la charpente, le bar allumé avant le spectacle', 'alt' => 'Le foyer et son bar', 'caption' => 'Le foyer et son bar, ouverts une heure avant le rideau', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La façade en brique de la tannerie, côté rivière, à la tombée du jour', 'alt' => 'La façade de la tannerie côté rivière', 'caption' => 'La façade de 1894, côté Morges', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le Séchoir, soixante chaises autour d’un piano droit sous le toit', 'alt' => 'La petite salle sous le toit', 'caption' => 'Le Séchoir : soixante places sous la charpente', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La régie lumière, un pupitre éclairé dans le noir', 'alt' => 'La régie lumière', 'caption' => 'La régie, au dernier rang', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les loges, des miroirs encadrés d’ampoules', 'alt' => 'Les loges des artistes', 'caption' => 'Les loges, dans l’ancien atelier de corroyage', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’escalier de fonte qui monte du foyer au Séchoir', 'alt' => 'L’escalier de fonte', 'caption' => 'L’escalier de fonte, d’origine', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La caisse du soir, deux billets sur le comptoir de chêne', 'alt' => 'La caisse du théâtre', 'caption' => 'La caisse, à droite en entrant', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les cintres vus du plateau, les perches et les projecteurs', 'alt' => 'Les cintres au-dessus du plateau', 'caption' => 'Les cintres : vingt-quatre perches à sept mètres', 'width' => 1200, 'height' => 900],
            ],
        ],
        'pricing' => [
            'title' => 'Places et abonnements',
            'intro' => 'Un seul prix par place, quel que soit le rang. L’abonnement se compose librement parmi les vingt-deux spectacles de la saison.',
            'note' => 'Prix par place, taxes comprises, sans frais de réservation. Le Séchoir est en placement libre, au tarif unique de 25.–.',
            'plans' => [
                [
                    'name' => 'Plein tarif',
                    'price' => '38.–',
                    'period' => 'la place',
                    'line' => 'Pour tous les spectacles en grande salle.',
                    'includes' => ['Fauteuil numéroté', 'Vestiaire gardé', 'Échange sans frais jusqu’à 48 h avant'],
                ],
                [
                    'name' => 'Tarif réduit',
                    'price' => '24.–',
                    'period' => 'la place',
                    'line' => 'AVS, AI, étudiants, apprentis et demandeurs d’emploi, sur présentation d’une carte.',
                    'includes' => ['Fauteuil numéroté', 'Vestiaire gardé', 'Échange sans frais jusqu’à 48 h avant'],
                ],
                [
                    'name' => 'Jeune public',
                    'price' => '15.–',
                    'period' => 'la place',
                    'line' => 'Moins de seize ans, et tout le monde aux spectacles du mercredi après-midi.',
                    'includes' => ['Goûter au foyer le mercredi', 'Rehausseurs prêtés à la caisse'],
                ],
                [
                    'name' => 'Abonnement six soirs',
                    'price' => 'CHF 180',
                    'period' => 'la saison',
                    'line' => 'Six spectacles au choix, soit 30.– la place.',
                    'includes' => ['Les mêmes fauteuils toute la saison', 'Échange sans frais jusqu’à la veille', 'Une invitation à la présentation de saison'],
                    'featured' => true,
                    'flag' => '30.– la place',
                    'href' => 'tel:+41210000000',
                    'label' => 'S’abonner au 021 000 00 00',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Avant de venir',
            'entries' => [
                ['question' => 'J’arrive en retard, puis-je encore entrer ?', 'answer' => 'Les portes ferment au lever de rideau. Les retardataires sont placés au dernier rang à la première pause que le spectacle permet ; quand il n’y en a pas, l’entrée n’est plus possible et la place n’est pas remboursée.'],
                ['question' => 'À partir de quel âge peut-on venir ?', 'answer' => 'Chaque spectacle indique un âge conseillé. Les soirées en grande salle conviennent en général dès 12 ans ; les mercredis après-midi sont faits pour les enfants dès 4 ans. Des rehausseurs sont prêtés à la caisse.'],
                ['question' => 'La salle est-elle accessible en fauteuil roulant ?', 'answer' => 'Oui. L’entrée du quai est de plain-pied et quatre emplacements sont réservés au premier rang, avec une place pour la personne qui accompagne. Annoncez-vous à la réservation ou au 021 000 00 00, pour que nous gardions l’emplacement. La salle est équipée d’une boucle magnétique.'],
                ['question' => 'Y a-t-il un vestiaire ?', 'answer' => 'Oui, gardé et gratuit, à gauche du foyer. Les grands sacs, les parapluies et les poussettes y restent pendant la représentation.'],
                ['question' => 'Puis-je échanger un billet ou me le faire rembourser ?', 'answer' => 'Un billet s’échange sans frais pour un autre soir de la saison jusqu’à 48 heures avant la représentation, à la caisse ou par e-mail à billetterie@theatre-tannerie.example. Il n’est remboursé que si nous annulons la représentation.'],
                ['question' => 'Où se garer ?', 'answer' => 'Le parking du Parc des Sports est à cinq minutes à pied, gratuit dès 19 h. Deux places pour personnes à mobilité réduite se trouvent devant l’entrée, quai des Tanneurs. La gare de Morges est à six minutes à pied.'],
                ['question' => 'Peut-on boire un verre sur place ?', 'answer' => 'Le bar du foyer ouvre une heure avant le rideau et ferme une heure après. On y sert des vins de La Côte, des sirops et une planche de fromages ; les verres ne montent pas en salle.'],
            ],
        ],
        'booking' => [
            'title' => 'Réserver des places',
            'intro' => 'Indiquez le soir, le nombre de places et, si besoin, un mot : fauteuil roulant, tarif réduit, places côte à côte. La billetterie confirme par e-mail dans la journée.',
            'action' => '#booking',
            'services' => [
                'Les Vagues · jeudi 19 novembre, 20 h',
                'Les Vagues · vendredi 20 novembre, 20 h',
                'La Jeune Fille et la Mort · samedi 28 novembre, 19 h',
                'Le Loup qui avait peur du noir · mercredi 2 décembre, 15 h',
                'Oncle Vania · vendredi 11 décembre, 20 h',
                'Oncle Vania · samedi 12 décembre, 19 h',
                'Un fil à la patte · jeudi 31 décembre, 21 h',
                'Terre battue · vendredi 15 janvier, 20 h',
                'Tout va bien se passer · vendredi 29 janvier, 20 h',
                'Lacustre · samedi 6 février, 20 h 30',
                'Abonnement six soirs',
            ],
        ],
        'map' => [
            'address' => 'Quai des Tanneurs 4, 1110 Morges',
            'title' => 'Théâtre de la Tannerie · entrée côté quai',
            'zoom' => 16,
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Théâtre · Morges',
                'title' => 'Une tannerie devenue théâtre, au bord de la Morges',
                'lead' => 'Deux cent douze places en gradin et vingt-deux spectacles de septembre à mai : du théâtre surtout, de la musique, de la danse et quatre après-midi pour les enfants.',
                'subject' => 'La grande salle depuis le dernier rang, le rideau rouge éclairé',
                'note' => 'Jeudi 19 novembre à 20 h : Les Vagues. Il reste 41 places.',
                'links' => [['label' => 'Réserver des places', 'to' => '/book'], ['label' => 'Voir la saison', 'to' => '/season']],
                'facts' => [['value' => '212', 'label' => 'Places en gradin'], ['value' => '22', 'label' => 'Spectacles cette saison'], ['value' => '1987', 'label' => 'Première saison']],
            ],
            'features' => [
                'eyebrow' => 'Cette saison',
                'title' => 'Vingt-deux soirs dans une ancienne tannerie',
                'lead' => 'Une salle, un foyer et une petite scène sous le toit : la maison se visite un soir de spectacle.',
                'items' => [
                    ['title' => 'La saison', 'body' => 'Dix soirées de théâtre, cinq de musique, trois de danse et quatre mercredis pour les enfants.', 'subject' => 'L’affiche des Vagues sur la porte de la tannerie', 'to' => '/season', 'label' => 'Voir les prochains soirs'],
                    ['title' => 'La maison', 'body' => 'Une halle de brique de 1894, un gradin de 212 places et un foyer sous la charpente.', 'subject' => 'Le foyer sous la charpente, le bar allumé', 'to' => '/house', 'label' => 'Visiter la maison'],
                    ['title' => 'Les billets', 'body' => '38.– la place, 24.– au tarif réduit, et six soirs pour CHF 180.', 'subject' => 'Deux billets posés sur le comptoir de la caisse', 'to' => '/tickets', 'label' => 'Voir les tarifs'],
                ],
            ],
            'story' => [
                'eyebrow' => 'La Tannerie',
                'title' => 'Un théâtre d’accueil et de création',
                'lead' => 'Trois spectacles naissent ici chaque saison ; les dix-neuf autres viennent de Suisse romande et d’un peu plus loin.',
                'body' => [
                    'La Tannerie n’a pas de troupe permanente. Elle a un plateau, un atelier de décors et une équipe de sept personnes, qu’elle prête chaque automne à des compagnies : elles répètent ici six semaines avant de jouer devant vous.',
                    'Le reste de la saison se choisit en allant voir. Hélène Rochat, qui dirige la maison depuis 2019, assiste à une centaine de spectacles par an pour en inviter dix-neuf. Sa règle tient en une ligne : elle n’invite que ce qu’elle reverrait.',
                ],
            ],
        ],
        '/season' => [
            'label' => 'La saison',
            'hero' => [
                'eyebrow' => 'Saison 2026–2027',
                'title' => 'Vingt-deux soirs, de septembre à mai',
                'lead' => 'Voici les huit prochains. Les portes ouvrent une demi-heure avant le rideau, le bar du foyer une heure avant.',
                'subject' => 'Une comédienne seule en scène dans Les Vagues, un projecteur de face',
                'links' => [['label' => 'Réserver des places', 'to' => '/book'], ['label' => 'Tarifs et abonnements', 'to' => '/tickets']],
            ],
            'features' => [
                'eyebrow' => 'Dans la saison',
                'title' => 'Trois rendez-vous qui reviennent',
                'items' => [
                    ['title' => 'Les créations', 'body' => 'Trois spectacles répétés dans la maison, dont Oncle Vania les 11 et 12 décembre.', 'subject' => 'Une répétition d’Oncle Vania, la table et le samovar sur le plateau', 'to' => '/book', 'label' => 'Réserver pour Oncle Vania'],
                    ['title' => 'Les mercredis', 'body' => 'Quatre après-midi pour les enfants dès 4 ans, à 15 h, goûter compris.', 'subject' => 'Des enfants assis au premier rang devant un castelet', 'to' => '/tickets', 'label' => 'Le tarif jeune public'],
                    ['title' => 'Au Séchoir', 'body' => 'Jazz, lectures et petites formes dans la salle de soixante places, sous le toit.', 'subject' => 'Un trio de jazz sous la charpente du Séchoir', 'to' => '/house', 'label' => 'Voir la petite salle'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment se fait une saison',
                'title' => 'Une centaine de soirs vus pour vingt-deux invités',
                'lead' => 'La saison se décide au printemps et s’annonce le premier samedi de juin, sur le quai.',
                'body' => [
                    'Chaque saison garde à peu près la même proportion : dix soirées de théâtre, cinq de musique, trois de danse et quatre spectacles pour les enfants. Trois sont des créations répétées dans la maison ; cette année, Oncle Vania en décembre, puis deux textes d’aujourd’hui au printemps.',
                    'Les compagnies invitées jouent une ou deux fois, rarement plus : la salle a 212 places et Morges seize mille habitants. Quand un spectacle affiche complet, nous cherchons une supplémentaire le lendemain plutôt que de tenir une liste d’attente.',
                    'Après chaque première, l’équipe artistique reste un quart d’heure au bord de la scène pour répondre aux questions. Les mercredis après-midi, cela se passe au foyer, autour du goûter.',
                ],
            ],
        ],
        '/house' => [
            'label' => 'La maison',
            'hero' => [
                'eyebrow' => 'La maison',
                'title' => 'Une tannerie de 1894, un théâtre depuis 1987',
                'lead' => 'On y a tanné le cuir pendant quatre-vingts ans, puis la ville a failli la démolir. Une association l’a rachetée pour un franc et y a monté un gradin.',
                'subject' => 'La façade en brique de la tannerie, côté rivière, à la tombée du jour',
                'links' => [['label' => 'Voir la saison', 'to' => '/season'], ['label' => 'Réserver des places', 'to' => '/book']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1987',
                'title' => 'Le cuir, puis le rideau',
                'lead' => 'La salle occupe l’ancienne halle des cuves ; le foyer, l’atelier où l’on séchait les peaux.',
                'body' => [
                    'La tannerie Dufour a fermé en 1974. Le bâtiment est resté vide treize ans, promis à un parking, jusqu’à ce qu’une poignée d’habitants fondent l’Association des Amis de la Tannerie et le rachètent à la commune pour un franc symbolique.',
                    'Le premier gradin était en bois de coffrage et les fauteuils venaient d’un cinéma de Lausanne qui fermait. La salle a été refaite en 2008 : 212 places, un plateau de dix mètres sur huit et des cintres à sept mètres, sans toucher aux murs de brique ni à l’escalier de fonte.',
                    'Nous sommes sept à l’année : la direction, l’administration, la billetterie, deux techniciens, une médiatrice et le bar. Une quarantaine de bénévoles placent le public, tiennent le vestiaire et collent les affiches.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les lieux',
                'title' => 'Trois pièces sous un même toit',
                'items' => [
                    ['title' => 'La grande salle', 'body' => '212 places en gradin, aucune à plus de quatorze mètres du plateau.', 'subject' => 'La grande salle vide, les fauteuils rouges sous la lumière de service'],
                    ['title' => 'Le Séchoir', 'body' => 'Soixante places sous la charpente, pour le jazz, les lectures et les petites formes.', 'subject' => 'Le Séchoir, des chaises en demi-cercle autour d’un piano droit'],
                    ['title' => 'Le foyer', 'body' => 'Le bar ouvre une heure avant le rideau et ferme une heure après.', 'subject' => 'Le foyer, le bar et les affiches des saisons passées'],
                ],
            ],
        ],
        '/tickets' => [
            'label' => 'Billets',
            'hero' => [
                'eyebrow' => 'Billets et abonnements',
                'title' => 'Ce que coûte une place',
                'lead' => '38.– au plein tarif, 24.– au tarif réduit, 15.– pour les moins de seize ans. Avec l’abonnement de six soirs, la place revient à 30.–.',
                'subject' => 'La caisse du théâtre un soir de première, une file dans le foyer',
                'links' => [['label' => 'Réserver des places', 'to' => '/book'], ['label' => 'Appeler la billetterie', 'href' => 'tel:+41210000000']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Offrir, venir à plusieurs, laisser une place',
                'items' => [
                    ['title' => 'Bons cadeaux', 'body' => 'Du montant de votre choix, valables deux saisons, à la caisse ou par e-mail.', 'subject' => 'Un bon cadeau glissé dans le programme de la saison', 'icon' => 'gift'],
                    ['title' => 'Groupes et classes', 'body' => 'Dès dix personnes, 28.– la place ; 12.– pour les classes, dossier pédagogique compris.', 'subject' => 'Une classe assise sur le gradin avant une représentation scolaire', 'icon' => 'users'],
                    ['title' => 'Billet suspendu', 'body' => 'Ajoutez 15.– à votre réservation : une place est offerte par les services sociaux de la commune.', 'subject' => 'Des billets épinglés sur un tableau de liège près de la caisse', 'icon' => 'ticket'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Pourquoi ces prix',
                'title' => 'Un seul prix, quel que soit le rang',
                'lead' => 'La salle n’a pas de catégories : qui réserve tôt choisit sa place.',
                'body' => [
                    'Une place vendue 38.– en coûte à peu près 95 à produire. La différence vient de la commune de Morges, du canton de Vaud et des 430 membres de l’Association des Amis de la Tannerie ; c’est ce qui nous permet de ne pas faire payer plus cher le milieu du gradin.',
                    'Les prix n’ont pas bougé depuis la saison 2022–2023 et nous ne prenons aucuns frais de réservation, en ligne comme au guichet. Le tarif réduit s’applique sur simple présentation d’une carte, sans justificatif à envoyer.',
                    'L’abonnement de six soirs reste la manière la plus simple de venir souvent : vous choisissez vos spectacles en juin ou en cours de saison, et vous gardez les mêmes fauteuils.',
                ],
            ],
        ],
        '/book' => [
            'hero' => [
                'eyebrow' => 'Réserver',
                'title' => 'Réserver des places',
                'lead' => 'Choisissez le soir et le nombre de places : la billetterie confirme par e-mail dans la journée, et vos billets vous attendent à la caisse.',
                'subject' => 'Deux billets posés sur le comptoir de chêne de la caisse',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir la saison', 'to' => '/season']],
            ],
            'features' => [
                'eyebrow' => 'Trois façons de réserver',
                'title' => 'En ligne, par téléphone ou à la caisse',
                'items' => [
                    ['title' => 'En ligne', 'body' => 'Le formulaire de cette page, à toute heure ; réponse dans la journée, du mardi au samedi.', 'subject' => 'Un téléphone posé sur le programme de la saison ouvert'],
                    ['title' => 'Par téléphone', 'body' => 'Au 021 000 00 00, du mardi au vendredi de 14 h à 18 h et le samedi de 10 h à 13 h.', 'subject' => 'La billettiste au téléphone derrière le comptoir'],
                    ['title' => 'À la caisse', 'body' => 'Quai des Tanneurs 4, aux mêmes heures et une heure avant chaque représentation.', 'subject' => 'La caisse du soir, la lampe allumée sur le comptoir'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'De la demande au fauteuil',
                'lead' => 'Une demande n’est pas encore un billet : c’est notre réponse qui vous garde les places.',
                'body' => [
                    'La billetterie lit chaque demande et répond par e-mail dans la journée, du mardi au samedi, avec les fauteuils qu’elle vous a gardés : les meilleurs encore libres, côte à côte, sauf indication contraire.',
                    'Vous réglez par TWINT ou par carte en suivant le lien de la confirmation, ou à la caisse en venant chercher vos billets. Les places réservées et non payées sont gardées jusqu’à un quart d’heure avant le rideau, puis remises en vente.',
                    'Pour un abonnement, choisissez « Abonnement six soirs » dans la liste et écrivez vos six spectacles dans le message : nous vous rappelons pour choisir vos fauteuils de la saison.',
                ],
            ],
        ],
    ],
];
