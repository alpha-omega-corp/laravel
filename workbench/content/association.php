<?php

declare(strict_types=1);

/*
 * The demo content of an association: a fictional neighbourhood association
 * in Yverdon-les-Bains, two hundred and forty households round a square and a
 * borrowed hall. `site` is what every page shares, `prefabs` is what the site
 * would bind as `kit.<name>` — the rows its committee keeps in the admin, in
 * each component's own prop names — and `pages` holds each page's words, keyed
 * by its path in `.claude/skills/ui-kit/businesses/association.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Association du Pré-Fleuri',
        'blurb' => 'L’association des habitants du Pré-Fleuri, à Yverdon-les-Bains : des fêtes, des ateliers et des coups de main entre voisins depuis 1987.',
        'address' => 'Rue du Pré-Fleuri 8, 1400 Yverdon-les-Bains',
        'phone' => '024 000 00 00',
        'email' => 'bonjour@pre-fleuri.example',
        'status' => 'Permanence le mardi de 17 h à 19 h',
        'note' => '© Association du Pré-Fleuri, fondée en 1987',
        'action' => ['label' => 'Devenir membre', 'to' => '/get-involved'],
        'band' => [
            'eyebrow' => 'Participer',
            'title' => 'Le quartier se fait à plusieurs',
            'lead' => 'La cotisation est de 30 francs par foyer et par an. Elle paie la salle, le journal et le matériel des fêtes ; le reste, ce sont des bras.',
            'links' => [['label' => 'Devenir membre', 'to' => '/get-involved'], ['label' => 'Faire un don', 'to' => '/donate']],
            'details' => [
                ['label' => 'Permanence', 'value' => 'Mardi, 17 h–19 h, Maison de quartier'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Cotisation', 'value' => 'CHF 30 par foyer et par an'],
            ],
        ],
    ],

    'prefabs' => [
        'events' => [
            'title' => 'Les prochains rendez-vous',
            'events' => [
                ['date' => 'samedi 21 novembre', 'time' => '9 h–12 h', 'datetime' => '2026-11-21T09:00', 'name' => 'Atelier vélo : prêt pour l’hiver', 'description' => 'Freins, éclairage, pneus. Apportez votre vélo : les outils, les rustines et le café sont sur place.'],
                ['date' => 'jeudi 26 novembre', 'time' => '19 h 30', 'datetime' => '2026-11-26T19:30', 'name' => 'Café-récits : le quartier avant les immeubles', 'description' => 'Odette Chappuis raconte les vergers et la tannerie des années 1960, photographies à l’appui. Entrée libre.'],
                ['date' => 'dimanche 6 décembre', 'time' => '17 h', 'datetime' => '2026-12-06T17:00', 'name' => 'Soupe de la Saint-Nicolas', 'description' => 'Soupe à la courge et thé chaud sur la place, puis cortège aux lanternes pour les enfants à 17 h 30.'],
                ['date' => 'samedi 12 décembre', 'time' => '10 h–16 h', 'datetime' => '2026-12-12T10:00', 'name' => 'Marché de Noël des voisins', 'description' => 'Vingt-deux stands tenus par des habitants : biscuits, tricots, jouets d’occasion. Le stand est à 10.–, inscription jusqu’au 5 décembre.'],
                ['date' => 'mercredi 13 janvier', 'time' => '14 h', 'datetime' => '2027-01-13T14:00', 'name' => 'Goûter des aînés et loto', 'description' => 'Galette des rois et six tours de loto. Le minibus passe prendre ceux qui le demandent à la permanence.'],
                ['date' => 'samedi 30 janvier', 'time' => '8 h 30', 'datetime' => '2027-01-30T08:30', 'name' => 'Sortie raquettes aux Rasses', 'description' => 'Trois heures de marche facile, fondue au chalet. Départ en covoiturage de la Maison de quartier ; 25.– par adulte, raquettes comprises.'],
                ['date' => 'jeudi 11 février', 'time' => '20 h', 'datetime' => '2027-02-11T20:00', 'name' => 'Assemblée générale', 'description' => 'Comptes 2026, élection du comité et vote du programme. Chaque foyer membre a une voix ; la verrée est offerte.'],
                ['date' => 'samedi 20 mars', 'time' => '9 h–13 h', 'datetime' => '2027-03-20T09:00', 'name' => 'Troc de plantes et de graines', 'description' => 'Boutures, semis et graines s’échangent sans argent au jardin des Tilleuls. C’est aussi l’ouverture de la saison du jardin partagé.'],
            ],
        ],
        'team' => [
            'title' => 'Le comité',
            'members' => [
                ['name' => 'Maria Fonseca', 'role' => 'Présidente', 'bio' => 'Habite l’avenue des Sports depuis 1998. Tient la permanence du mardi et répond à la commune comme aux voisins.'],
                ['name' => 'Jean-Luc Perrin', 'role' => 'Vice-président, jardin partagé', 'bio' => 'Jardinier à la retraite. Répartit les trente-quatre parcelles et organise le troc de plantes.'],
                ['name' => 'Aïcha Benali', 'role' => 'Trésorière', 'bio' => 'Comptable de métier. Présente les comptes à l’assemblée et envoie les reçus de dons en janvier.'],
                ['name' => 'Thomas Rochat', 'role' => 'Secrétaire', 'bio' => 'Rédige les procès-verbaux et le journal du quartier, quatre numéros par an.'],
                ['name' => 'Lucie Favre', 'role' => 'Fêtes et agenda', 'bio' => 'Coordonne le repas des voisins et le cinéma en plein air. C’est à elle qu’on propose une activité.'],
                ['name' => 'Driton Krasniqi', 'role' => 'Atelier vélo', 'bio' => 'Mécanicien. Ouvre l’atelier un samedi par mois et forme les bénévoles qui veulent apprendre.'],
                ['name' => 'Odette Chappuis', 'role' => 'Aînés, membre fondatrice', 'bio' => 'Au comité depuis 1987. Organise le goûter du mercredi et les trajets en minibus.'],
                ['name' => 'Noé Martin', 'role' => 'Jeunes', 'bio' => 'Étudiant. Tient l’aide aux devoirs du jeudi et le tournoi de foot du repas des voisins.'],
            ],
        ],
        'gallery' => [
            'title' => 'Une année au Pré-Fleuri',
            'pictures' => [
                ['image' => 'picture:La tablée du repas des voisins sous les tilleuls de la place', 'alt' => 'Une longue table dressée sur la place, une centaine de voisins assis sous les tilleuls', 'caption' => 'Repas des voisins, juin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Driton et deux enfants penchés sur une roue de vélo', 'alt' => 'Un mécanicien et deux enfants règlent une roue de vélo dans le garage', 'caption' => 'Atelier vélo, un samedi sur quatre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’écran du cinéma en plein air à la nuit tombée', 'alt' => 'Un écran tendu entre deux tilleuls, des chaises longues tournées vers lui', 'caption' => 'Cinéma en plein air, août', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les parcelles du jardin des Tilleuls en juillet', 'alt' => 'Des parcelles de tomates et de tournesols le long de la voie ferrée', 'caption' => 'Jardin partagé, juillet', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des caisses de boutures étiquetées à la main', 'alt' => 'Des caisses de boutures et de semis posées sur une table de jardin', 'caption' => 'Troc de plantes, mars', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les enfants et leurs lanternes autour de la marmite de soupe', 'alt' => 'Des enfants tenant des lanternes devant une grande marmite fumante', 'caption' => 'Soupe de la Saint-Nicolas', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des couvertures chargées de jouets et de livres le long de la rue', 'alt' => 'Des stands de marché aux puces posés à même le trottoir', 'caption' => 'Marché aux puces, septembre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une file de marcheurs en raquettes au-dessus des Rasses', 'alt' => 'Une quinzaine de marcheurs en raquettes sur une crête enneigée', 'caption' => 'Sortie raquettes, janvier', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Deux écoliers et une bénévole autour d’un cahier', 'alt' => 'Une bénévole aide deux écoliers à faire leurs devoirs à une table', 'caption' => 'Aide aux devoirs, le jeudi', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La salle de la Maison de quartier, mains levées pour un vote', 'alt' => 'Une soixantaine de membres assis lèvent la main lors de l’assemblée', 'caption' => 'Assemblée générale, février', 'width' => 1200, 'height' => 900],
            ],
        ],
        'jobs' => [
            'title' => 'Coups de main recherchés',
            'intro' => 'Aucune expérience n’est demandée et personne ne s’engage pour l’année : on dit ce qu’on peut donner, deux heures ou une saison.',
            'jobs' => [
                ['name' => 'Accompagner l’aide aux devoirs', 'place' => 'Maison de quartier', 'hours' => 'Mardi ou jeudi, 16 h–17 h 30', 'line' => 'Aider deux ou trois écoliers de 7 à 12 ans à faire leurs devoirs. Le goûter est fourni.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Aide%20aux%20devoirs'],
                ['name' => 'Tenir le bar du repas des voisins', 'place' => 'Place du Pré-Fleuri', 'hours' => 'Samedi 12 juin, par tranches de deux heures', 'line' => 'Servir sirops, bières et cafés aux côtés d’un bénévole qui connaît déjà la caisse.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Bar%20du%20repas%20des%20voisins'],
                ['name' => 'Arroser le jardin partagé en été', 'place' => 'Jardin des Tilleuls', 'hours' => 'Une semaine en juillet ou en août', 'line' => 'Arroser les parcelles communes le soir, vingt minutes, la semaine que vous choisissez.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Arrosage%20du%20jardin'],
                ['name' => 'Distribuer le journal du quartier', 'place' => 'Dans votre rue', 'hours' => 'Quatre fois par an, une heure', 'line' => 'Glisser le journal dans les boîtes aux lettres de votre rue, une soixantaine de foyers.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Journal%20du%20quartier'],
                ['name' => 'Conduire le minibus des aînés', 'place' => 'Départ de la Maison de quartier', 'hours' => 'Un mercredi par mois, 13 h 30–17 h', 'line' => 'Aller chercher et ramener six personnes pour le goûter. Permis B ; le minibus est prêté par la commune.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Minibus%20des%20a%C3%AEn%C3%A9s'],
                ['name' => 'Mettre en page le journal', 'place' => 'Chez vous', 'hours' => 'Quatre soirées par an', 'line' => 'Monter huit pages à partir des textes de Thomas Rochat. Le modèle existe, il reste à le remplir.', 'href' => 'mailto:benevoles@pre-fleuri.example?subject=Mise%20en%20page%20du%20journal'],
            ],
        ],
        'donate' => [
            'title' => 'Soutenir l’association',
            'intro' => 'Avec 50 francs, l’atelier vélo remplace les câbles et les chambres à air d’une saison. Avec 200, le cinéma en plein air loue son écran pour une soirée.',
            'url' => 'https://dons.pre-fleuri.example',
            'label' => 'Donner par Twint',
            'details' => [
                ['label' => 'Titulaire', 'value' => 'Association du Pré-Fleuri, 1400 Yverdon-les-Bains'],
                ['label' => 'IBAN', 'value' => 'CH00 0000 0000 0000 0000 0'],
                ['label' => 'Banque', 'value' => 'Caisse d’épargne du Nord vaudois'],
                ['label' => 'Mention', 'value' => 'Don 2026'],
            ],
            'note' => 'Les comptes sont présentés chaque année à l’assemblée générale et affichés à la Maison de quartier.',
        ],
        'map' => [
            'address' => 'Rue du Pré-Fleuri 8, 1400 Yverdon-les-Bains',
            'title' => 'Maison de quartier du Pré-Fleuri',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Association de quartier · Yverdon-les-Bains',
                'title' => 'Le Pré-Fleuri, entre voisins depuis 1987',
                'lead' => 'Deux cent quarante foyers, une Maison de quartier et trente-deux rendez-vous par an : des fêtes, des ateliers et des coups de main, ouverts à tous.',
                'subject' => 'La tablée du repas des voisins sous les tilleuls de la place',
                'note' => 'Prochain rendez-vous : atelier vélo, samedi 21 novembre à 9 h',
                'links' => [['label' => 'Voir l’agenda', 'to' => '/agenda'], ['label' => 'Devenir membre', 'to' => '/get-involved']],
                'facts' => [['value' => '240', 'label' => 'Foyers membres'], ['value' => '32', 'label' => 'Rendez-vous par an'], ['value' => '1987', 'label' => 'Année de fondation']],
            ],
            'features' => [
                'eyebrow' => 'L’association',
                'title' => 'Venir, participer, connaître',
                'lead' => 'Tout part de la Maison de quartier : on y passe un mardi soir, et le reste suit.',
                'items' => [
                    ['title' => 'Ce qui se passe', 'body' => 'Atelier vélo, café-récits, soupe de la Saint-Nicolas : huit rendez-vous d’ici au printemps, ouverts aux membres comme aux autres.', 'subject' => 'Des enfants et leurs lanternes autour de la marmite de soupe', 'to' => '/agenda', 'label' => 'L’agenda du quartier'],
                    ['title' => 'Donner un coup de main', 'body' => 'Deux heures au bar de la fête, une semaine d’arrosage au jardin, un trajet en minibus : six rôles cherchent preneur.', 'subject' => 'Deux bénévoles en tablier derrière le bar de la fête', 'to' => '/get-involved', 'label' => 'Les coups de main recherchés'],
                    ['title' => 'Ceux qui s’en occupent', 'body' => 'Huit habitants élus chaque février, tous bénévoles : leurs noms, ce qu’ils font et à qui écrire.', 'subject' => 'Le comité réuni autour d’une table à la Maison de quartier', 'to' => '/about', 'label' => 'Le comité et son histoire'],
                ],
            ],
            'story' => [
                'eyebrow' => 'La Maison de quartier',
                'title' => 'Une porte ouverte le mardi soir',
                'lead' => 'Rue du Pré-Fleuri 8, à huit minutes à pied de la gare, entre l’école et la place.',
                'body' => [
                    'La Maison de quartier est un ancien pavillon scolaire que la commune prête à l’association depuis 1994. Le comité y tient sa permanence chaque mardi de 17 h à 19 h : on y paie sa cotisation, on y réserve une parcelle du jardin, on y propose une idée.',
                    'La salle du bas accueille soixante personnes et se loue aux membres pour un anniversaire ou une réunion, CHF 80 la journée. L’aide aux devoirs l’occupe le mardi et le jeudi après l’école, le goûter des aînés un mercredi par mois.',
                ],
            ],
        ],
        '/agenda' => [
            'label' => 'Agenda',
            'hero' => [
                'eyebrow' => 'Agenda',
                'title' => 'Ce qui se passe au Pré-Fleuri',
                'lead' => 'Tout est ouvert aux habitants, membres ou non. La plupart des rendez-vous sont gratuits ; quand il faut s’inscrire, c’est écrit.',
                'subject' => 'L’écran du cinéma en plein air tendu entre deux tilleuls',
                'links' => [['label' => 'Proposer une activité', 'to' => '/get-involved']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Avant de venir',
                'items' => [
                    ['title' => 'Inscriptions', 'body' => 'À la permanence du mardi ou par e-mail à bonjour@pre-fleuri.example, jusqu’à trois jours avant.', 'icon' => 'calendar-check'],
                    ['title' => 'Prix', 'body' => 'Presque tout est gratuit. Les sorties sont au prix coûtant, et personne ne reste à la maison pour une question d’argent.', 'icon' => 'coins'],
                    ['title' => 'Mauvais temps', 'body' => 'Ce qui est prévu dehors se replie dans la salle de la Maison de quartier. L’affiche sur la porte le dit le matin même.', 'icon' => 'cloud-rain'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Chaque semaine',
                'title' => 'Les rendez-vous qui reviennent',
                'lead' => 'Ils ne figurent pas dans la liste : ils ont lieu toute l’année, hors vacances scolaires.',
                'body' => [
                    'La permanence du comité se tient le mardi de 17 h à 19 h. L’aide aux devoirs accueille les écoliers le mardi et le jeudi de 16 h à 17 h 30, et le jardin partagé ouvre son cabanon le samedi matin d’avril à octobre.',
                    'L’atelier vélo a lieu le troisième samedi du mois, de 9 h à midi, dans le garage de la Maison de quartier. Le goûter des aînés tombe le deuxième mercredi, à 14 h.',
                    'Les grandes dates ne changent guère : le troc de plantes en mars, le repas des voisins en juin, le cinéma en plein air en août, le marché aux puces en septembre et la soupe de la Saint-Nicolas en décembre.',
                ],
            ],
        ],
        '/about' => [
            'label' => 'L’association',
            'hero' => [
                'eyebrow' => 'L’association',
                'title' => 'Née en 1987 autour d’une place',
                'lead' => 'Quand la commune a voulu faire un parking de la place du Pré-Fleuri, soixante habitants ont signé. La place est restée, l’association aussi.',
                'subject' => 'La place du Pré-Fleuri et ses tilleuls, un matin de marché aux puces',
                'links' => [['label' => 'Devenir membre', 'to' => '/get-involved']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1987',
                'title' => 'Une pétition, puis trente-neuf ans',
                'lead' => 'L’association n’a ni local à elle ni salarié : une salle prêtée, un comité élu, des voisins.',
                'body' => [
                    'En 1987, la commune projetait quarante places de parc à l’endroit des tilleuls. Odette Chappuis et quelques voisins ont fait le tour des immeubles avec une pétition ; l’association est née le soir où elle a été déposée, pour que la place serve à quelque chose.',
                    'Le premier repas des voisins a eu lieu l’été suivant, avec douze tables prêtées par la paroisse. Le jardin partagé est venu en 2009 sur un terrain que les CFF n’utilisaient plus, l’atelier vélo en 2016, l’aide aux devoirs en 2019.',
                    'Aujourd’hui, 240 foyers paient la cotisation et une soixantaine de bénévoles donnent un coup de main dans l’année. Le budget, 16’000 francs, est voté à l’assemblée générale de février.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Toute l’année',
                'title' => 'Ce que l’association fait tourner',
                'items' => [
                    ['title' => 'Le jardin des Tilleuls', 'body' => 'Trente-quatre parcelles et un verger commun, le long de la voie ferrée. La liste d’attente se tient à la permanence.', 'subject' => 'Les parcelles du jardin partagé et leur cabanon peint en vert'],
                    ['title' => 'L’atelier vélo', 'body' => 'Un garage, deux pieds d’atelier et des caisses de pièces récupérées : on y répare soi-même, avec de l’aide.', 'subject' => 'Un vélo retourné sur un pied d’atelier, des outils accrochés au mur'],
                    ['title' => 'Le journal du quartier', 'body' => 'Huit pages, quatre fois par an, dans les 610 boîtes aux lettres du Pré-Fleuri.', 'subject' => 'Une pile de journaux du quartier prêts à être distribués'],
                ],
            ],
        ],
        '/get-involved' => [
            'label' => 'Participer',
            'hero' => [
                'eyebrow' => 'Participer',
                'title' => 'Devenir membre, donner un coup de main',
                'lead' => 'L’adhésion coûte 30 francs par foyer et par an. Un coup de main ne coûte rien et ne vous engage que pour ce que vous avez dit.',
                'subject' => 'Des bénévoles montent les tables de la fête sur la place',
                'links' => [['label' => 'Écrire au comité', 'href' => 'mailto:bonjour@pre-fleuri.example'], ['label' => 'Faire un don', 'to' => '/donate']],
            ],
            'features' => [
                'eyebrow' => 'Trois façons',
                'title' => 'Choisir sa manière d’en être',
                'items' => [
                    ['title' => 'Adhérer', 'body' => 'CHF 30 par foyer et par an, à la permanence ou par virement : une voix à l’assemblée, le journal dans la boîte, la salle à CHF 80.', 'icon' => 'users'],
                    ['title' => 'Donner deux heures', 'body' => 'Un rôle précis, une date, quelqu’un qui vous montre. La liste des rôles change avant chaque fête.', 'icon' => 'clock'],
                    ['title' => 'Proposer une idée', 'body' => 'Un tournoi, un cours, une sortie : venez en parler un mardi. Le comité prête la salle et le matériel, vous amenez l’envie.', 'icon' => 'lightbulb'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'On commence par un café',
                'lead' => 'Personne ne signe rien. Vous dites ce qui vous tente, on vous présente la personne qui s’en occupe.',
                'body' => [
                    'Écrivez à benevoles@pre-fleuri.example ou passez à la permanence du mardi. Lucie Favre ou Maria Fonseca vous rappelle dans la semaine pour savoir ce que vous aimeriez faire et quand vous êtes libre.',
                    'La première fois, vous êtes toujours à deux avec quelqu’un qui connaît le rôle. L’association assure ses bénévoles pendant les activités et rembourse les frais sur présentation d’un ticket.',
                    'En novembre, tous ceux qui ont aidé dans l’année sont invités au souper des bénévoles. Nous étions soixante-trois l’an dernier.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Une question ?',
                'title' => 'Passez un mardi, on en parle',
                'lead' => 'Le comité tient sa permanence chaque mardi de 17 h à 19 h à la Maison de quartier. Le café est prêt.',
                'links' => [['label' => 'Écrire au comité', 'href' => 'mailto:bonjour@pre-fleuri.example'], ['label' => 'Voir l’agenda', 'to' => '/agenda']],
                'details' => [
                    ['label' => 'Adresse', 'value' => 'Rue du Pré-Fleuri 8, Yverdon-les-Bains'],
                    ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                    ['label' => 'Bénévolat', 'value' => 'benevoles@pre-fleuri.example', 'href' => 'mailto:benevoles@pre-fleuri.example'],
                ],
            ],
        ],
        '/donate' => [
            'hero' => [
                'eyebrow' => 'Soutenir',
                'title' => 'Un don, et ce qu’il devient',
                'lead' => 'L’association vit de cotisations, d’une subvention communale et de dons. Ce sont les dons qui paient ce qui n’était pas prévu.',
                'subject' => 'Le cabanon du jardin partagé repeint par les enfants du quartier',
                'links' => [['label' => 'Écrire à la trésorière', 'href' => 'mailto:tresorerie@pre-fleuri.example']],
            ],
            'features' => [
                'eyebrow' => 'En 2026',
                'title' => 'Ce que les dons ont payé cette année',
                'items' => [
                    ['title' => 'Trois soirées de cinéma', 'body' => 'CHF 600 pour louer l’écran et le projecteur des trois soirées d’août : 420 spectateurs en tout, entrée libre.', 'subject' => 'L’écran dressé sur la place à la tombée du jour'],
                    ['title' => 'Douze vélos d’enfants', 'body' => 'Récupérés, remis en état à l’atelier avec CHF 480 de pièces, et donnés à la rentrée aux familles qui en avaient besoin.', 'subject' => 'Une rangée de petits vélos remis à neuf devant le garage'],
                    ['title' => 'Le cabanon du jardin', 'body' => 'Un toit neuf et une citerne de 1000 litres pour récupérer l’eau de pluie : CHF 1300.', 'subject' => 'Le cabanon du jardin et sa citerne d’eau de pluie'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les comptes',
                'title' => 'Où va l’argent',
                'lead' => 'Un budget de 16’000 francs, tenu par une trésorière bénévole et vérifié par deux membres.',
                'body' => [
                    'Les cotisations couvrent un peu moins de la moitié du budget, la subvention de la commune un tiers. Le reste vient des dons et de ce que rapportent le bar et les stands des fêtes.',
                    'Rien ne part en salaires : l’association n’emploie personne. Les trois plus grosses dépenses sont le matériel des fêtes, l’impression du journal et l’assurance.',
                    'Un don dès 50 francs reçoit un reçu en janvier, signé par Aïcha Benali. Pour un legs ou un don de matériel, écrivez-lui à tresorerie@pre-fleuri.example.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Autrement',
                'title' => 'Donner du temps plutôt que de l’argent',
                'lead' => 'Deux heures au bar, une semaine d’arrosage, un trajet en minibus : six rôles cherchent preneur.',
                'links' => [['label' => 'Voir les coups de main', 'to' => '/get-involved'], ['label' => 'Voir l’agenda', 'to' => '/agenda']],
                'details' => [
                    ['label' => 'Trésorière', 'value' => 'Aïcha Benali'],
                    ['label' => 'E-mail', 'value' => 'tresorerie@pre-fleuri.example', 'href' => 'mailto:tresorerie@pre-fleuri.example'],
                    ['label' => 'Permanence', 'value' => 'Mardi, 17 h–19 h'],
                ],
            ],
        ],
    ],
];
