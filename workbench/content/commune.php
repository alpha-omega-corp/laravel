<?php

declare(strict_types=1);

/*
 * The demo content of a commune: a fictional Vaud municipality of 2 840
 * residents at the foot of the Jorat, with one counter in the old school on the
 * village square. `site` is what every page shares, `prefabs` is what the site
 * would bind as `kit.<name>` — the rows the greffe keeps in the admin, in each
 * component's own prop names — and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/commune.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Commune de Soleymont',
        'blurb' => 'L’administration communale de Soleymont, 2 840 habitants au pied du Jorat.',
        'address' => 'Place du Village 2, 1099 Soleymont',
        'phone' => '021 000 00 00',
        'email' => 'greffe@soleymont.example',
        'status' => 'Guichet ouvert le lundi jusqu’à 18 h 30',
        'note' => '© Commune de Soleymont',
        'action' => ['label' => 'Trouver une démarche', 'to' => '/services'],
        'band' => [
            'eyebrow' => 'Nous joindre',
            'title' => 'Une question pour l’administration ?',
            'lead' => 'Le greffe répond au guichet chaque matin, au téléphone aux mêmes heures et par e-mail sous deux jours ouvrables.',
            'links' => [['label' => 'Trouver une démarche', 'to' => '/services'], ['label' => 'Appeler le greffe', 'href' => 'tel:+41210000000']],
            'details' => [
                ['label' => 'Guichet', 'value' => 'Place du Village 2, Soleymont'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Bus', 'value' => 'Ligne 435, arrêt Soleymont-Village, devant la porte'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires du guichet',
            'note' => 'Greffe, contrôle des habitants et bourse. Service technique sur rendez-vous. Fermé du 24 décembre au 2 janvier.',
            'days' => [
                ['day' => 'Lundi', 'hours' => '08:00–11:30 · 14:00–18:30'],
                ['day' => 'Mardi', 'hours' => '08:00–11:30'],
                ['day' => 'Mercredi', 'hours' => '08:00–11:30 · 14:00–16:30'],
                ['day' => 'Jeudi', 'hours' => '08:00–11:30'],
                ['day' => 'Vendredi', 'hours' => '08:00–11:30'],
                ['day' => 'Samedi', 'hours' => null],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'services' => [
            'title' => 'Démarches et prestations',
            'services' => [
                ['name' => 'Arrivée, départ, déménagement', 'line' => 'Annoncer votre arrivée, un changement d’adresse dans la commune ou votre départ, dans les huit jours.', 'icon' => 'house', 'price' => 'Arrivée CHF 30'],
                ['name' => 'Carte d’identité et attestations', 'line' => 'Commander une carte d’identité, obtenir une attestation de domicile ou un certificat de vie.', 'icon' => 'id-card', 'price' => 'dès CHF 15'],
                ['name' => 'Permis de construire', 'line' => 'Déposer un dossier, consulter une mise à l’enquête, poser une question avant de dessiner.', 'icon' => 'hammer', 'price' => 'Émolument selon tarif'],
                ['name' => 'Déchets et déchetterie', 'line' => 'Sacs taxés, ramassages porte à porte, encombrants et accès à la déchetterie des Planches.', 'icon' => 'recycle', 'price' => 'CHF 1.95 le sac de 35 l'],
                ['name' => 'École et accueil de jour', 'line' => 'Inscrire un enfant à l’école, à la cantine ou à l’accueil parascolaire Les Moineaux.', 'icon' => 'school', 'price' => 'Cantine CHF 9.50 le repas'],
                ['name' => 'Eau et énergie', 'line' => 'Demander un raccordement, annoncer un relevé de compteur, obtenir la subvention solaire communale.', 'icon' => 'droplets'],
                ['name' => 'Location de salles', 'line' => 'Réserver la grande salle, le refuge du Bois-Clos ou la buvette du terrain pour une fête ou une assemblée.', 'icon' => 'key-round', 'price' => 'dès CHF 120'],
                ['name' => 'Chiens, macarons, manifestations', 'line' => 'Inscrire un chien, demander un macaron de stationnement ou l’autorisation d’organiser une manifestation.', 'icon' => 'dog', 'price' => 'Chien CHF 100 par an'],
            ],
        ],
        'faq' => [
            'title' => 'Questions fréquentes',
            'entries' => [
                ['question' => 'Que dois-je apporter pour annoncer mon arrivée ?', 'answer' => 'Une pièce d’identité pour chaque membre du ménage, votre bail ou l’acte d’achat, votre carte d’assurance-maladie et, si vous venez d’une autre commune suisse, votre acte d’origine. Comptez dix minutes au guichet et CHF 30 par adulte.'],
                ['question' => 'Puis-je venir sans rendez-vous ?', 'answer' => 'Oui, pour le greffe, le contrôle des habitants et la bourse, aux heures du guichet. Le service technique reçoit sur rendez-vous : appelez le 021 000 00 00 le matin.'],
                ['question' => 'Combien coûte une carte d’identité, et quand la reçoit-on ?', 'answer' => 'CHF 70 pour un adulte, CHF 35 pour un enfant, payables au guichet. Apportez une photo récente et l’ancienne carte ; la nouvelle arrive par courrier recommandé en dix jours ouvrables.'],
                ['question' => 'Où se parquer pour venir au guichet ?', 'answer' => 'Sur la place du Village, devant la maison de commune : douze places en zone bleue, deux heures avec le disque. Le bus 435 s’arrête devant la porte.'],
                ['question' => 'Où acheter les sacs taxés, et quand passe le camion ?', 'answer' => 'Les sacs officiels se vendent à l’épicerie du village, à la boulangerie et au guichet. Les ordures sont ramassées le mardi matin, le papier le premier mercredi du mois : sortez-les avant 7 h.'],
                ['question' => 'Comment réserver la grande salle ?', 'answer' => 'Par téléphone au 021 000 00 00 ou au guichet, trois semaines à l’avance au moins. La journée coûte CHF 380 aux habitants, cuisine comprise ; une caution de CHF 200 est demandée à la remise des clés.'],
                ['question' => 'Comment consulter un dossier mis à l’enquête ?', 'answer' => 'Les dossiers sont affichés au pilier public et consultables au greffe pendant trente jours, aux heures du guichet. Une opposition se dépose par écrit, signée, avant la fin du délai.'],
            ],
        ],
        'events' => [
            'title' => 'Les prochaines dates',
            'events' => [
                ['date' => 'lundi 23 novembre', 'time' => '20:00', 'datetime' => '2026-11-23T20:00', 'name' => 'Conseil communal : budget 2027', 'description' => 'Séance publique à la grande salle. À l’ordre du jour, le budget 2027 et le crédit pour la réfection du chemin des Planches.'],
                ['date' => 'samedi 28 novembre', 'time' => '09:00–13:00', 'datetime' => '2026-11-28T09:00', 'name' => 'Marché de l’Avent', 'description' => 'Vingt-deux stands sur la place du Village, soupe de la Jeunesse et vin chaud des pompiers.'],
                ['date' => 'mercredi 2 décembre', 'time' => '07:00', 'datetime' => '2026-12-02T07:00', 'name' => 'Ramassage du papier et du carton', 'description' => 'Paquets ficelés au bord de la route avant 7 h. Les élèves de 8e passent avec le camion.'],
                ['date' => 'samedi 5 décembre', 'time' => '17:30', 'datetime' => '2026-12-05T17:30', 'name' => 'Saint-Nicolas sur la place', 'description' => 'Cortège aux lanternes depuis l’école, puis cornets offerts aux enfants par la Municipalité.'],
                ['date' => 'lundi 14 décembre', 'time' => '20:00', 'datetime' => '2026-12-14T20:00', 'name' => 'Conseil communal : dernière séance de l’année', 'description' => 'Plan des investissements 2027–2031 et élection du bureau. Verrée ouverte à tous après la séance.'],
                ['date' => 'samedi 9 janvier', 'time' => '08:00', 'datetime' => '2027-01-09T08:00', 'name' => 'Ramassage des sapins', 'description' => 'Sapins sans décoration devant la maison dès 8 h : la voirie les broie pour les massifs communaux.'],
                ['date' => 'vendredi 15 janvier', 'time' => '18:30', 'datetime' => '2027-01-15T18:30', 'name' => 'Accueil des nouveaux habitants', 'description' => 'La Municipalité reçoit à la grande salle celles et ceux arrivés en 2026, avec les sociétés locales.'],
                ['date' => 'samedi 20 mars', 'time' => '08:00–12:00', 'datetime' => '2027-03-20T08:00', 'name' => 'Coup de balai de printemps', 'description' => 'Nettoyage des chemins et des rives du ruisseau. Gants et sacs fournis, repas offert à midi au refuge.'],
            ],
        ],
        'team' => [
            'title' => 'La Municipalité et l’administration',
            'members' => [
                ['name' => 'Hélène Corthésy', 'role' => 'Syndique · administration générale et finances', 'bio' => 'À la Municipalité depuis 2016, syndique depuis 2021. Reçoit sur rendez-vous le lundi en fin de journée.'],
                ['name' => 'Marc Jeanneret', 'role' => 'Vice-syndic · routes, forêts et voirie', 'bio' => 'Agriculteur au hameau des Planches. Suit les chantiers communaux et le triage forestier.'],
                ['name' => 'Aline Rochat', 'role' => 'Municipale · écoles, jeunesse et accueil de jour', 'bio' => 'Représente la commune au conseil d’établissement et préside le comité des Moineaux.'],
                ['name' => 'Daniel Favez', 'role' => 'Municipal · eau, énergie et déchets', 'bio' => 'Ingénieur. Conduit le remplacement de la conduite du Bois-Clos et le plan solaire communal.'],
                ['name' => 'Sophie Bugnon', 'role' => 'Municipale · urbanisme et police des constructions', 'bio' => 'Architecte de formation. Répond aux questions sur un permis avant le dépôt du dossier.'],
                ['name' => 'Laurent Pidoux', 'role' => 'Secrétaire municipal', 'bio' => 'Dirige le greffe depuis 2012 : séances, mises à l’enquête, votations et archives.'],
                ['name' => 'Nadia Berisha', 'role' => 'Boursière communale', 'bio' => 'Tient les comptes de la commune et répond à vos questions sur une facture ou une taxe.'],
                ['name' => 'Yves Monnard', 'role' => 'Chef du service technique', 'bio' => 'Voirie, réseau d’eau et déchetterie : quatre collaborateurs et un piquet toute l’année.'],
            ],
        ],
        'jobs' => [
            'title' => 'Postes ouverts',
            'intro' => 'Trois postes sont à repourvoir. Les dossiers s’envoient par e-mail au greffe ; chaque annonce dit jusqu’à quand.',
            'jobs' => [
                ['name' => 'Employé·e d’administration au contrôle des habitants', 'place' => 'Maison de commune', 'hours' => '60 % · CDI', 'line' => 'Accueillir au guichet, tenir le registre des habitants et préparer les scrutins. Entrée le 1er février, dossiers jusqu’au 11 décembre.', 'href' => 'mailto:greffe@soleymont.example'],
                ['name' => 'Agent·e d’exploitation à la voirie', 'place' => 'Service technique', 'hours' => '100 % · CDI', 'line' => 'Entretien des routes, déneigement et piquet du réseau d’eau, permis B exigé. Entrée le 1er mars, dossiers jusqu’au 8 janvier.', 'href' => 'mailto:greffe@soleymont.example'],
                ['name' => 'Apprenti·e employé·e de commerce CFC', 'place' => 'Greffe et bourse', 'hours' => 'Dès août 2027 · 3 ans', 'line' => 'Trois ans entre le greffe, la bourse et le contrôle des habitants, avec un formateur attitré. Un jour de stage est possible sur demande.', 'href' => 'mailto:greffe@soleymont.example'],
            ],
        ],
        'map' => [
            'address' => 'Place du Village 2, 1099 Soleymont',
            'title' => 'Maison de commune',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Commune de Soleymont · Vaud',
                'title' => 'Guichet ouvert chaque matin, et le lundi soir',
                'lead' => 'Le greffe, le contrôle des habitants et la bourse vous reçoivent sans rendez-vous à la maison de commune. Chaque démarche dit ce qu’il faut apporter et ce qu’elle coûte.',
                'subject' => 'La maison de commune et la fontaine, sur la place du Village',
                'note' => 'Guichets fermés du 24 décembre au 2 janvier',
                'links' => [['label' => 'Trouver une démarche', 'to' => '/services'], ['label' => 'Voir l’agenda', 'to' => '/agenda']],
                'facts' => [['value' => '2 840', 'label' => 'Habitants'], ['value' => '5', 'label' => 'Matins de guichet'], ['value' => '2 j', 'label' => 'Réponse aux e-mails']],
            ],
            'features' => [
                'eyebrow' => 'En deux clics',
                'title' => 'Ce que l’on vient chercher ici',
                'lead' => 'Une démarche, une date ou un nom : les trois questions que le greffe entend chaque jour.',
                'items' => [
                    ['title' => 'Démarches', 'body' => 'Arrivée, carte d’identité, permis de construire, sacs taxés : quel guichet, quoi apporter, combien cela coûte.', 'subject' => 'Une habitante au guichet du contrôle des habitants', 'to' => '/services', 'label' => 'Toutes les démarches'],
                    ['title' => 'Agenda', 'body' => 'Séances du Conseil communal, marchés, ramassages du papier et fêtes du village, dans l’ordre du calendrier.', 'subject' => 'Le marché de l’Avent sur la place du Village', 'to' => '/agenda', 'label' => 'Les prochaines dates'],
                    ['title' => 'Autorités', 'body' => 'Cinq municipaux, un secrétaire, une boursière et un service technique : qui s’occupe de quoi, et comment les joindre.', 'subject' => 'La Municipalité réunie dans la salle du Conseil', 'to' => '/council', 'label' => 'La Municipalité'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Soleymont',
                'title' => 'Un village, trois hameaux, une maison de commune',
                'lead' => 'Entre le Jorat et la plaine, 2 840 habitants et une administration de neuf personnes.',
                'body' => [
                    'Soleymont réunit le village et les hameaux des Planches, du Bois-Clos et de Champ-Rond. La maison de commune occupe l’ancienne école de 1874, sur la place du Village : le guichet est au rez-de-chaussée, la salle du Conseil sous les combles.',
                    'La commune gère elle-même son eau, ses chemins, ses forêts et sa déchetterie. L’école primaire accueille 310 élèves jusqu’à la 8e année ; les plus grands prennent le bus pour l’établissement secondaire voisin.',
                    'Le Conseil communal compte quarante-cinq membres et siège cinq fois par an à la grande salle. Ses séances sont publiques, et l’ordre du jour est affiché au pilier public dix jours avant.',
                ],
            ],
        ],
        '/services' => [
            'label' => 'Démarches',
            'hero' => [
                'eyebrow' => 'Démarches',
                'title' => 'Quelle démarche, à quel guichet, avec quels papiers',
                'lead' => 'Tout se fait à la maison de commune, sans rendez-vous aux heures du guichet. Les émoluments se paient sur place, par carte ou en espèces.',
                'subject' => 'Le guichet du contrôle des habitants, au rez-de-chaussée',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'features' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Trois choses à savoir',
                'items' => [
                    ['title' => 'Sans rendez-vous', 'body' => 'Le greffe, le contrôle des habitants et la bourse reçoivent aux heures du guichet, le lundi jusqu’à 18 h 30.', 'icon' => 'clock'],
                    ['title' => 'Paiement sur place', 'body' => 'Par carte, TWINT ou en espèces. Une quittance est remise pour chaque émolument.', 'icon' => 'credit-card'],
                    ['title' => 'Par courrier ou e-mail', 'body' => 'Attestations et formulaires se demandent à greffe@soleymont.example et partent sous deux jours ouvrables.', 'icon' => 'mail'],
                ],
            ],
        ],
        '/agenda' => [
            'label' => 'Agenda',
            'hero' => [
                'eyebrow' => 'Agenda',
                'title' => 'Ce qui se passe à Soleymont cet hiver',
                'lead' => 'Séances du Conseil communal, marchés, ramassages et fêtes. Les séances sont publiques ; les sociétés locales annoncent leurs dates au greffe.',
                'subject' => 'La place du Village un soir de marché de l’Avent',
                'links' => [['label' => 'Annoncer une date au greffe', 'href' => 'mailto:greffe@soleymont.example']],
            ],
            'story' => [
                'eyebrow' => 'L’année communale',
                'title' => 'Cinq séances, douze ramassages, une fête par saison',
                'lead' => 'L’agenda réunit ce que la commune organise et ce que ses sociétés lui annoncent.',
                'body' => [
                    'Le Conseil communal siège cinq fois par an, le lundi à 20 h, à la grande salle. Chacun peut y assister ; l’ordre du jour et les préavis de la Municipalité sont affichés au pilier public et déposés au greffe dix jours avant.',
                    'Le papier est ramassé le premier mercredi du mois par les élèves de 8e, qui financent ainsi leur course d’école. Les encombrants passent en avril et en octobre, les sapins le deuxième samedi de janvier.',
                    'Le reste appartient aux sociétés : la Jeunesse tient le marché de l’Avent et la fête du 1er Août, les pompiers leur loto en février, la fanfare son concert en mai. Une date manque ? Le greffe l’ajoute dans la journée.',
                ],
            ],
            'features' => [
                'eyebrow' => 'À Soleymont',
                'title' => 'Trois rendez-vous de l’année',
                'items' => [
                    ['title' => 'Séances du Conseil', 'body' => 'Publiques, cinq lundis par an à 20 h. La verrée qui suit est ouverte à tous.', 'subject' => 'La grande salle pendant une séance du Conseil communal'],
                    ['title' => 'Marché de l’Avent', 'body' => 'Le dernier samedi de novembre, vingt-deux stands tenus par les sociétés et les artisans du village.', 'subject' => 'Des stands éclairés sous les tilleuls de la place'],
                    ['title' => 'Fête du 1er Août', 'body' => 'Feu, cortège aux lampions et soupe de la Jeunesse au terrain des Planches.', 'subject' => 'Le feu du 1er Août au-dessus du village'],
                ],
            ],
        ],
        '/council' => [
            'label' => 'Autorités',
            'hero' => [
                'eyebrow' => 'Autorités',
                'title' => 'La Municipalité, et celles et ceux qui vous répondent',
                'lead' => 'Cinq municipaux élus pour la législature 2026–2031 et trois chefs de service à l’administration. Chacun reçoit sur rendez-vous pris au greffe.',
                'subject' => 'Les cinq municipaux devant la maison de commune',
                'links' => [['label' => 'Prendre rendez-vous au 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'Comment la commune décide',
                'title' => 'Un exécutif de cinq, un Conseil de quarante-cinq',
                'lead' => 'La Municipalité propose et exécute ; le Conseil communal vote le budget, les règlements et les crédits.',
                'body' => [
                    'La Municipalité se réunit chaque lundi après-midi. Chacun de ses cinq membres conduit un dicastère et répond de ses dossiers devant le Conseil communal ; la syndique préside et représente la commune.',
                    'Le Conseil communal réunit quarante-cinq habitantes et habitants élus pour cinq ans. Il siège en public, vote le budget en novembre et les comptes en juin, et ses commissions examinent chaque préavis avant le vote.',
                    'L’administration compte neuf personnes. Le secrétaire municipal, la boursière et le chef du service technique sont vos interlocuteurs de tous les jours : ils préparent les décisions, puis les appliquent.',
                ],
            ],
            'features' => [
                'eyebrow' => 'À consulter',
                'title' => 'Les décisions, noir sur blanc',
                'items' => [
                    ['title' => 'Procès-verbaux', 'body' => 'Les décisions du Conseil communal se consultent au greffe dès leur adoption, à la séance suivante.', 'icon' => 'scroll-text'],
                    ['title' => 'Préavis municipaux', 'body' => 'Chaque objet soumis au Conseil est déposé au greffe et affiché au pilier public dix jours avant la séance.', 'icon' => 'file-text'],
                    ['title' => 'Commissions', 'body' => 'Gestion, finances et urbanisme : trois commissions permanentes de cinq membres.', 'icon' => 'users'],
                ],
            ],
        ],
        '/jobs' => [
            'label' => 'Emplois',
            'hero' => [
                'eyebrow' => 'Emplois',
                'title' => 'Travailler pour la commune',
                'lead' => 'Neuf personnes font tourner l’administration, la voirie et le réseau d’eau. Trois postes sont ouverts cet hiver.',
                'subject' => 'L’équipe de la voirie devant le dépôt communal',
                'links' => [['label' => 'Écrire au greffe', 'href' => 'mailto:greffe@soleymont.example']],
            ],
            'story' => [
                'eyebrow' => 'La commune employeur',
                'title' => 'Une petite équipe, un travail qui se voit',
                'lead' => 'Ici, celui qui répond au guichet connaît celle qui répare la conduite.',
                'body' => [
                    'La commune emploie neuf personnes à l’année et forme un apprenti. Les horaires sont ceux du guichet et du terrain : pas de travail le week-end hors piquet de la voirie, et le vendredi après-midi libre à l’administration.',
                    'Les salaires suivent l’échelle communale, publiée dans le statut du personnel que le greffe remet sur demande. Cinq semaines de vacances, six dès cinquante ans, et la formation continue prise sur le temps de travail.',
                    'Une candidature spontanée est lue comme les autres : adressez-la au secrétaire municipal, qui répond dans les deux semaines.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Conditions',
                'title' => 'Ce que la commune offre',
                'items' => [
                    ['title' => 'Horaires', 'body' => 'Quarante et une heures par semaine à plein temps, le vendredi après-midi libre à l’administration.', 'icon' => 'clock'],
                    ['title' => 'Formation', 'body' => 'Cours payés et pris sur le temps de travail ; une place d’apprentissage ouverte tous les trois ans.', 'icon' => 'graduation-cap'],
                    ['title' => 'Vacances', 'body' => 'Cinq semaines par an, six dès cinquante ans.', 'icon' => 'calendar-check'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Postuler',
                'title' => 'Votre dossier, par e-mail au greffe',
                'lead' => 'Lettre, CV et certificats en un seul PDF. Le secrétaire municipal accuse réception dans la semaine.',
                'links' => [['label' => 'Écrire au greffe', 'href' => 'mailto:greffe@soleymont.example'], ['label' => 'Voir qui vous lira', 'to' => '/council']],
                'details' => [
                    ['label' => 'E-mail', 'value' => 'greffe@soleymont.example', 'href' => 'mailto:greffe@soleymont.example'],
                    ['label' => 'Renseignements', 'value' => 'Laurent Pidoux, 021 000 00 00', 'href' => 'tel:+41210000000'],
                ],
            ],
        ],
    ],
];
