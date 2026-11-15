<?php

declare(strict_types=1);

/*
 * The demo content of a sports club: a fictional village football club in the
 * vallon du Nozon, at the foot of the Jura. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its
 * committee keeps in the admin, in each component's own prop names — and
 * `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/club.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 * One club throughout: 240 members, fourteen teams, founded in 1947, the
 * ground at the Vernes, the secretariat on Monday and Thursday evenings.
 */
return [
    'site' => [
        'brand' => 'FC Vallon du Nozon',
        'blurb' => 'Le club de football de Croy, de Romainmôtier et du vallon : quatorze équipes, de l’école de foot aux seniors.',
        'address' => 'Chemin des Vernes 4, 1322 Croy',
        'phone' => '024 000 00 00',
        'email' => 'info@fc-vallon-nozon.example',
        'status' => 'Prochain match aux Vernes : samedi 20 mars, 17 h 30',
        'note' => '© FC Vallon du Nozon, association fondée en 1947',
        'action' => ['label' => 'Séance d’essai', 'to' => '/join'],
        'band' => [
            'eyebrow' => 'Rejoindre le club',
            'title' => 'Une séance d’essai, sans engagement ?',
            'lead' => 'Deux entraînements pour voir, avec le groupe de son âge. Le club prête le ballon et la chasuble ; il suffit de venir en baskets.',
            'links' => [['label' => 'Demander une séance d’essai', 'to' => '/join'], ['label' => 'Voir les entraînements', 'to' => '/trainings']],
            'details' => [
                ['label' => 'Terrain', 'value' => 'Chemin des Vernes 4, Croy'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Secrétariat', 'value' => 'Lundi et jeudi, 18 h – 20 h'],
            ],
        ],
    ],

    'prefabs' => [
        'credentials' => [
            'title' => 'Affiliations et partenaires',
            'credentials' => [
                ['name' => 'Association suisse de football', 'detail' => 'Club membre depuis 1947'],
                ['name' => 'Association cantonale vaudoise de football', 'detail' => 'Championnats de 3e et de 4e ligue, juniors F à B'],
                ['name' => 'Jeunesse+Sport', 'detail' => 'Onze entraîneurs reconnus, football enfants et jeunes'],
                ['name' => 'Garage du Nozon', 'detail' => 'Partenaire principal depuis 2014, maillots de la 1re équipe'],
                ['name' => 'Laiterie de Croy', 'detail' => 'Partenaire de l’école de foot et du tournoi de l’Ascension'],
                ['name' => 'Menuiserie Besson & fils', 'detail' => 'Partenaire des juniors, a charpenté la buvette en 2009'],
            ],
        ],
        'courses' => [
            'title' => 'Les groupes de la saison 2026–27',
            'courses' => [
                ['name' => 'École de foot', 'date' => 'Mercredi', 'time' => '14:00–15:15', 'level' => '5 à 6 ans, filles et garçons', 'place' => 'Terrain B', 'price' => 'CHF 120', 'seats' => '4 places', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Juniors F', 'date' => 'Mercredi', 'time' => '15:30–16:45', 'level' => '7 à 8 ans', 'place' => 'Terrain B', 'price' => 'CHF 160', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Juniors E', 'date' => 'Lundi et mercredi', 'time' => '17:30–18:45', 'level' => '9 à 10 ans', 'place' => 'Terrain B', 'price' => 'CHF 200', 'seats' => '3 places', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Juniors D', 'date' => 'Mardi et jeudi', 'time' => '17:30–19:00', 'level' => '11 à 12 ans', 'place' => 'Terrain A', 'price' => 'CHF 220', 'full' => true],
                ['name' => 'Juniors C et B', 'date' => 'Mardi et jeudi', 'time' => '18:00–19:30', 'level' => '13 à 16 ans', 'place' => 'Terrain B', 'price' => 'CHF 240', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Féminines', 'date' => 'Lundi et jeudi', 'time' => '19:30–21:00', 'level' => 'Dès 15 ans, tous niveaux', 'place' => 'Terrain B', 'price' => 'CHF 260', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Actifs, 1re et 2e équipes', 'date' => 'Mardi et vendredi', 'time' => '19:45–21:15', 'level' => 'Dès 17 ans, 3e et 4e ligue', 'place' => 'Terrain A', 'price' => 'CHF 320', 'href' => '#booking', 'label' => 'Essayer'],
                ['name' => 'Seniors 30+', 'date' => 'Vendredi', 'time' => '19:30–21:00', 'level' => 'Dès 30 ans, sans championnat', 'place' => 'Terrain B', 'price' => 'CHF 180', 'href' => '#booking', 'label' => 'Essayer'],
            ],
        ],
        'events' => [
            'title' => 'Le calendrier du printemps',
            'events' => [
                ['date' => 'Samedi 16 janvier', 'time' => '9:00–17:00', 'datetime' => '2027-01-16', 'name' => 'Tournoi en salle des juniors E et D', 'description' => 'Seize équipes de la région à la salle polyvalente de Croy. Crêpes et buvette tenues par les parents.'],
                ['date' => 'Vendredi 12 février', 'time' => '20:00', 'datetime' => '2027-02-12', 'name' => 'Loto du club', 'description' => 'Grande salle de Romainmôtier, vingt-quatre séries, abonnement à CHF 12. Portes ouvertes dès 19 h.'],
                ['date' => 'Samedi 20 mars', 'time' => '17:30', 'datetime' => '2027-03-20', 'name' => '1re équipe – FC Jorat-Nord', 'description' => 'Reprise du championnat de 3e ligue aux Vernes. Entrée libre, buvette ouverte dès 16 h 30.'],
                ['date' => 'Dimanche 21 mars', 'time' => '10:30', 'datetime' => '2027-03-21', 'name' => 'Féminines – FC La Dôle', 'description' => 'Premier match à domicile du second tour, sur le terrain synthétique.'],
                ['date' => 'Samedi 24 avril', 'time' => '17:30', 'datetime' => '2027-04-24', 'name' => '1re équipe – FC Mormont', 'description' => 'Le derby du vallon. Les juniors E accompagnent les joueurs à l’entrée sur le terrain.'],
                ['date' => 'Jeudi 6 mai', 'time' => '8:30–17:30', 'datetime' => '2027-05-06', 'name' => 'Tournoi de l’Ascension', 'description' => 'Quarante équipes de juniors F à D sur les deux terrains. Grillades, tombola et remise des coupes.'],
                ['date' => 'Vendredi 4 juin', 'time' => '20:00', 'datetime' => '2027-06-04', 'name' => 'Assemblée générale', 'description' => 'À la buvette. Comptes, élection du comité et calendrier 2027–28 ; ouverte aux membres et aux parents.'],
                ['date' => 'Samedi 26 juin', 'time' => 'Dès 11:00', 'datetime' => '2027-06-26', 'name' => 'Les 80 ans du club', 'description' => 'Match des anciens à 14 h, repas sous la cantine et bal. Inscription au repas jusqu’au 12 juin.'],
            ],
        ],
        'team' => [
            'title' => 'Entraîneurs et comité',
            'members' => [
                ['name' => 'Marc Rochat', 'role' => 'Président', 'bio' => 'Ancien gardien de la 1re équipe, au comité depuis 2011. C’est lui qui répond aux communes et aux partenaires.'],
                ['name' => 'Sylvie Besson', 'role' => 'Responsable des juniors', 'bio' => 'Diplôme C de l’ASF et experte Jeunesse+Sport. Elle répartit les 110 juniors dans les groupes et tient la liste d’attente.'],
                ['name' => 'Nuno Ferreira', 'role' => 'Entraîneur de la 1re équipe', 'bio' => 'Diplôme B, arrivé en 2021 : promotion en 3e ligue dès sa première saison.'],
                ['name' => 'Céline Jaquier', 'role' => 'Entraîneuse des féminines', 'bio' => 'A fondé l’équipe en 2018 avec neuf joueuses ; elles sont vingt-deux aujourd’hui.'],
                ['name' => 'Loïc Pittet', 'role' => 'École de foot et juniors F', 'bio' => 'Enseignant à Romainmôtier la semaine, sur le terrain B le mercredi avec les plus petits.'],
                ['name' => 'Thierry Golay', 'role' => 'Entraîneur des gardiens', 'bio' => 'Vingt saisons dans les buts du club. Il suit les gardiens, des juniors E à la 1re équipe.'],
                ['name' => 'Anne-Lise Martin', 'role' => 'Caissière et secrétariat', 'bio' => 'Cotisations, licences et inscriptions : au local le lundi et le jeudi, de 18 h à 20 h.'],
                ['name' => 'Jean-Daniel Favre', 'role' => 'Terrains et buvette', 'bio' => 'Il tond, trace et ouvre la buvette, et organise le tournus des parents derrière le comptoir.'],
            ],
        ],
        'gallery' => [
            'title' => 'La saison en images',
            'pictures' => [
                ['image' => 'picture:Le terrain des Vernes au lever du jour, la forêt derrière la tribune', 'alt' => 'Le terrain en herbe des Vernes au lever du jour', 'caption' => 'Les Vernes, un matin de match', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La 1re équipe alignée avant le coup d’envoi du derby', 'alt' => 'La 1re équipe alignée avant le coup d’envoi', 'caption' => 'La 1re équipe avant le derby contre le FC Mormont', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’école de foot en cercle autour de son entraîneur', 'alt' => 'Des enfants de cinq et six ans en cercle autour de leur entraîneur', 'caption' => 'L’école de foot, le mercredi', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les féminines à l’échauffement sous les projecteurs', 'alt' => 'L’équipe féminine à l’échauffement sur le terrain synthétique éclairé', 'caption' => 'Les féminines, un jeudi soir', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Quarante équipes de juniors sur deux terrains', 'alt' => 'Des équipes de juniors en maillots de toutes les couleurs sur deux terrains', 'caption' => 'Le tournoi de l’Ascension', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La buvette un soir de match, le gril allumé', 'alt' => 'La buvette en bois un soir de match, le gril allumé devant', 'caption' => 'La buvette, ouverte une heure avant chaque match', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les juniors D soulevant la coupe du tournoi en salle', 'alt' => 'Les juniors D soulevant une coupe dans la salle polyvalente', 'caption' => 'Les juniors D, vainqueurs du tournoi en salle', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les panneaux des partenaires le long de la main courante', 'alt' => 'Les panneaux des partenaires fixés le long de la main courante', 'caption' => 'Les partenaires du club, au bord du terrain A', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La grande salle pleine un soir de loto', 'alt' => 'La grande salle de Romainmôtier pleine un soir de loto', 'caption' => 'Le loto de février', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les seniors attablés après l’entraînement du vendredi', 'alt' => 'Les seniors attablés à la buvette après l’entraînement', 'caption' => 'Les seniors, le vendredi soir', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander une séance d’essai',
            'intro' => 'Donnez le nom du joueur, son année de naissance dans le message et la section qui l’intéresse : nous confirmons le jour par téléphone ou par e-mail.',
            'action' => '#booking',
            'services' => [
                'École de foot, 5 à 6 ans',
                'Juniors F, 7 à 8 ans',
                'Juniors E, 9 à 10 ans',
                'Juniors C et B, 13 à 16 ans',
                'Féminines, dès 15 ans',
                'Actifs, dès 17 ans',
                'Seniors 30+',
            ],
        ],
        'map' => [
            'address' => 'Chemin des Vernes 4, 1322 Croy',
            'title' => 'Terrain des Vernes, entrée par la buvette',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Football · Croy, vallon du Nozon',
                'title' => 'Le foot du vallon, de l’école de foot aux seniors',
                'lead' => 'Quatorze équipes, deux terrains et une buvette au bord de la forêt. On joue ici depuis 1947, et il reste de la place dans presque tous les groupes.',
                'subject' => 'Le terrain des Vernes un samedi de match, la forêt derrière la main courante',
                'note' => 'Juniors E : encore trois places ce printemps',
                'links' => [['label' => 'Demander une séance d’essai', 'to' => '/join'], ['label' => 'Voir les entraînements', 'to' => '/trainings']],
                'facts' => [['value' => '240', 'label' => 'Membres'], ['value' => '14', 'label' => 'Équipes'], ['value' => '1947', 'label' => 'Année de fondation']],
            ],
            'features' => [
                'eyebrow' => 'Le club',
                'title' => 'S’entraîner, jouer, se retrouver',
                'lead' => 'Trois raisons de pousser le portail des Vernes, que l’on ait six ans ou soixante.',
                'items' => [
                    ['title' => 'Les entraînements', 'body' => 'Huit groupes par âge, de l’école de foot aux seniors, encadrés par onze entraîneurs reconnus Jeunesse+Sport.', 'subject' => 'Des juniors E en exercice de passes sur le terrain synthétique', 'to' => '/trainings', 'label' => 'Les groupes et les places libres'],
                    ['title' => 'Les matchs', 'body' => 'La 1re équipe en 3e ligue le samedi à 17 h 30, les féminines le dimanche matin, et le tournoi de l’Ascension pour les juniors.', 'subject' => 'La 1re équipe à l’attaque devant la tribune', 'to' => '/fixtures', 'label' => 'Le calendrier du printemps'],
                    ['title' => 'La vie du club', 'body' => 'Une buvette tenue par les parents, un loto en février et quatre-vingts ans à fêter en juin 2027.', 'subject' => 'La buvette un soir de match, le gril allumé', 'to' => '/club', 'label' => 'Le comité et les entraîneurs'],
                ],
            ],
        ],
        '/trainings' => [
            'label' => 'Entraînements',
            'hero' => [
                'eyebrow' => 'Entraînements · saison 2026–27',
                'title' => 'Un groupe pour chaque âge, dès cinq ans',
                'lead' => 'Aux Vernes de mars à octobre, en salle à Croy le reste de l’hiver. Les prix sont ceux d’une saison entière : licence, assurance du club et maillot de match compris.',
                'subject' => 'L’école de foot en cercle autour de son entraîneur, un mercredi après-midi',
                'links' => [['label' => 'Demander une séance d’essai', 'to' => '/join']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Avant le premier entraînement',
                'items' => [
                    ['title' => 'Deux essais gratuits', 'body' => 'On vient deux fois avec le groupe de son âge avant de signer quoi que ce soit.', 'icon' => 'calendar-check'],
                    ['title' => 'L’équipement', 'body' => 'Des chaussures à crampons moulés et des protège-tibias. Le club prête ballons et chasubles, et fournit le maillot de match.', 'icon' => 'shirt'],
                    ['title' => 'La cotisation', 'body' => 'Payable en deux fois. Dès le deuxième enfant d’une même famille, elle est réduite de moitié.', 'icon' => 'wallet'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Une saison aux Vernes',
                'title' => 'Comment se passe une année au club',
                'lead' => 'La saison suit l’année scolaire, et le terrain suit la météo.',
                'body' => [
                    'On commence à la mi-août, on s’arrête deux semaines à Noël et on reprend en salle jusqu’à ce que le terrain soit sec, en général à la mi-mars. Les juniors F et E jouent des tournois le samedi matin ; dès les juniors D, c’est un championnat, avec un match par week-end.',
                    'Chaque groupe a deux entraîneurs, dont un au moins est reconnu Jeunesse+Sport. Chez les petits, on ne dépasse pas seize joueurs par groupe : c’est pour cela que certains affichent complet, et que Sylvie Besson tient une liste d’attente.',
                    'Le camp de Pâques, du 6 au 9 avril, est ouvert aux enfants de 7 à 13 ans, membres ou non : quatre jours de foot, repas de midi compris, pour CHF 160.',
                ],
            ],
        ],
        '/fixtures' => [
            'label' => 'Calendrier',
            'hero' => [
                'eyebrow' => 'Calendrier · printemps 2027',
                'title' => 'Les matchs, les tournois et les soirées du club',
                'lead' => 'La 1re équipe joue à domicile le samedi à 17 h 30, les féminines le dimanche à 10 h 30. L’entrée est libre et la buvette ouvre une heure avant le coup d’envoi.',
                'subject' => 'Le coup d’envoi d’un match de 3e ligue, vu depuis la tribune',
                'links' => [['label' => 'Demander une séance d’essai', 'to' => '/join'], ['label' => 'Le terrain et le club', 'to' => '/club']],
            ],
            'story' => [
                'eyebrow' => 'Le second tour',
                'title' => 'Un printemps qui finit par une fête',
                'lead' => 'Onze matchs à domicile, deux tournois, un loto et un anniversaire : le calendrier tient sur une page, mais il occupe tout le village.',
                'body' => [
                    'L’hiver se joue en salle. Le tournoi des juniors E et D, le 16 janvier, réunit seize équipes de la région à la salle polyvalente de Croy ; les parents tiennent le stand de crêpes, et la recette paie les ballons de la saison.',
                    'Le championnat reprend le 20 mars contre le FC Jorat-Nord. La 1re équipe a fini le premier tour à la quatrième place de son groupe de 3e ligue, à cinq points du premier : le derby du 24 avril contre le FC Mormont dira si la promotion reste possible.',
                    'Le jeudi de l’Ascension, quarante équipes de juniors occupent les deux terrains du matin au soir. Et le samedi 26 juin, le club fête ses quatre-vingts ans : match des anciens, repas sous la cantine et bal, comme en 1947.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les grands rendez-vous',
                'title' => 'Trois dates à ne pas manquer',
                'items' => [
                    ['title' => 'Le loto', 'body' => 'Vendredi 12 février à la grande salle de Romainmôtier : vingt-quatre séries, abonnement à CHF 12.', 'subject' => 'La grande salle pleine un soir de loto, les cartons sur les tables'],
                    ['title' => 'Le tournoi de l’Ascension', 'body' => 'Jeudi 6 mai : quarante équipes de juniors F à D, grillades et remise des coupes à 17 h 30.', 'subject' => 'Des juniors en maillots de toutes les couleurs sur deux terrains'],
                    ['title' => 'Les 80 ans', 'body' => 'Samedi 26 juin dès 11 h : match des anciens, repas sous la cantine et bal.', 'subject' => 'La cantine dressée au bord du terrain, guirlandes allumées'],
                ],
            ],
        ],
        '/club' => [
            'label' => 'Le club',
            'hero' => [
                'eyebrow' => 'Le club · depuis 1947',
                'title' => 'Un club de village, tenu par ceux qui y jouent',
                'lead' => 'Onze entraîneurs, un comité de sept bénévoles et une centaine de parents qui tiennent la buvette à tour de rôle. Personne n’est salarié, et cela se voit au prix des cotisations.',
                'subject' => 'Le comité et les entraîneurs devant la buvette des Vernes',
                'links' => [['label' => 'Demander une séance d’essai', 'to' => '/join'], ['label' => 'Voir le calendrier', 'to' => '/fixtures']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1947',
                'title' => 'Un pré, deux buts et quatre-vingts ans',
                'lead' => 'Le club est né d’un pré prêté par la commune et d’un jeu de maillots racheté à un club voisin.',
                'body' => [
                    'En 1947, onze jeunes de Croy et de Romainmôtier fondent le club sur un pré que la commune leur laisse aux Vernes, au bord du Nozon. Les premiers vestiaires sont un wagon désaffecté ; la buvette actuelle, en bois du vallon, date de 2009 et a été montée par les membres en six week-ends.',
                    'Le club compte aujourd’hui 240 membres, dont 110 juniors et une équipe féminine créée en 2018. La 1re équipe joue en 3e ligue depuis sa promotion de 2022, la deuxième en 4e ligue, et les seniors se retrouvent le vendredi sans autre enjeu que la soirée.',
                    'Tout repose sur des bénévoles : les entraîneurs sont défrayés pour leurs cours Jeunesse+Sport, pas davantage. Le terrain synthétique, posé en 2019, a été payé pour moitié par le loto, le tournoi de l’Ascension et les panneaux des partenaires.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les Vernes',
                'title' => 'Le terrain, côté pratique',
                'items' => [
                    ['title' => 'Deux terrains', 'body' => 'Un terrain en herbe homologué pour la 3e ligue et un synthétique éclairé, praticable par tous les temps.', 'subject' => 'Le terrain synthétique sous les projecteurs, un soir d’octobre'],
                    ['title' => 'La buvette', 'body' => 'Ouverte les soirs d’entraînement dès 18 h et une heure avant chaque match. Saucisse du vallon, et thé chaud en hiver.', 'subject' => 'Le comptoir en bois de la buvette, les fanions au mur'],
                    ['title' => 'Les vestiaires', 'body' => 'Quatre vestiaires refaits en 2021, dont un réservé aux féminines et un aux arbitres.', 'subject' => 'Un vestiaire, les maillots suspendus avant le match'],
                ],
            ],
        ],
        '/join' => [
            'hero' => [
                'eyebrow' => 'Séance d’essai',
                'title' => 'Venir essayer, deux fois, sans rien signer',
                'lead' => 'Dites-nous qui vient jouer et quel jour vous arrange. La responsable des juniors ou l’entraîneur du groupe vous rappelle dans les trois jours pour fixer le premier entraînement.',
                'subject' => 'Un entraîneur accueillant un nouveau junior au bord du terrain',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Voir les entraînements', 'to' => '/trainings']],
            ],
            'features' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'De la demande au premier match',
                'items' => [
                    ['title' => 'Vous écrivez', 'body' => 'Le nom du joueur, son année de naissance et un jour qui convient. Rien d’autre n’est demandé.', 'icon' => 'pencil'],
                    ['title' => 'On vous rappelle', 'body' => 'Sous trois jours, pour dire quel groupe, quel terrain et à quelle heure.', 'icon' => 'phone'],
                    ['title' => 'Deux essais, puis la licence', 'body' => 'Après deux entraînements, on décide ensemble. Le club s’occupe de la licence auprès de l’association cantonale.', 'icon' => 'badge-check'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Le premier soir aux Vernes',
                'lead' => 'Rien à acheter, rien à signer : on vient, on joue, et on en reparle après.',
                'body' => [
                    'Arrivez un quart d’heure avant l’heure du groupe et présentez-vous à la buvette : quelqu’un du comité y est tous les soirs d’entraînement. Des baskets suffisent pour un essai ; le club prête le reste.',
                    'Les deux séances d’essai sont gratuites et couvertes par l’assurance du club. Pour les enfants, un parent reste au bord du terrain la première fois.',
                    'Si le groupe affiche complet, la demande part en liste d’attente et vous êtes prévenus dès qu’une place se libère, le plus souvent au changement de saison, en août et en mars.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Une question',
                'title' => 'Plutôt de vive voix ?',
                'lead' => 'Le secrétariat répond le lundi et le jeudi de 18 h à 20 h, et il y a toujours quelqu’un à la buvette les soirs d’entraînement.',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Voir le calendrier', 'to' => '/fixtures']],
                'details' => [
                    ['label' => 'Secrétariat', 'value' => 'Lundi et jeudi, 18 h – 20 h'],
                    ['label' => 'E-mail', 'value' => 'info@fc-vallon-nozon.example', 'href' => 'mailto:info@fc-vallon-nozon.example'],
                    ['label' => 'Terrain', 'value' => 'Chemin des Vernes 4, Croy'],
                ],
            ],
        ],
    ],
];
