<?php

declare(strict_types=1);

/*
 * The demo content of a coworking space: a fictional thirty-eight desk room on
 * the second floor of a 1908 dial factory in La Chaux-de-Fonds, six minutes
 * from the station. `site` is what every page shares, `prefabs` is what the
 * site would bind as `kit.<name>` — the rows its owners keep in the admin, in
 * each component's own prop names — and `pages` holds each page's words, keyed
 * by its path in `.claude/skills/ui-kit/businesses/coworking.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'L’Établi',
        'blurb' => 'Un espace de travail partagé dans une ancienne fabrique de cadrans, à six minutes à pied de la gare.',
        'address' => 'Rue du Parc 41, 2300 La Chaux-de-Fonds',
        'phone' => '032 000 00 00',
        'email' => 'bonjour@letabli.example',
        'status' => 'Première journée d’essai offerte',
        'note' => '© L’Établi Sàrl',
        'action' => ['label' => 'Réserver une visite', 'to' => '/visit'],
        'band' => [
            'eyebrow' => 'Essayer',
            'title' => 'Venez travailler une journée, pour voir',
            'lead' => 'La première journée est offerte. Dites-nous quel jour : un poste vous attend près des fenêtres, et le café est fait.',
            'links' => [['label' => 'Réserver une visite', 'to' => '/visit'], ['label' => 'Comparer les formules', 'to' => '/plans']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue du Parc 41, La Chaux-de-Fonds'],
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Gare', 'value' => 'Six minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'services' => [
            'title' => 'Ce que chaque membre trouve en arrivant',
            'services' => [
                ['name' => 'Un poste de travail', 'line' => 'Un bureau de 160 cm, un fauteuil réglable et une lampe : vous n’apportez que votre ordinateur.', 'icon' => 'lamp-desk'],
                ['name' => 'Trois salles de réunion', 'line' => 'Pour 4, 8 et 14 personnes, avec écran et tableau blanc, réservées depuis votre téléphone.', 'icon' => 'presentation', 'price' => 'dès 25.– l’heure'],
                ['name' => 'Deux cabines téléphoniques', 'line' => 'Insonorisées, libres sans réservation, pour un appel ou une visio sans déranger la salle.', 'icon' => 'phone'],
                ['name' => 'La fibre', 'line' => '1 Gbit/s dans les deux sens, un réseau pour les membres et un second pour vos invités.', 'icon' => 'wifi'],
                ['name' => 'Le café', 'line' => 'Café en grains torréfié en ville, thé et eau gazeuse à volonté, cuisine équipée pour midi.', 'icon' => 'coffee'],
                ['name' => 'L’impression', 'line' => 'Imprimante et scanner A3 couleur, cent pages comprises par mois et par membre.', 'icon' => 'printer'],
                ['name' => 'L’adresse postale', 'line' => 'Votre courrier reçu et trié chaque matin dans votre casier, votre raison sociale à l’entrée.', 'icon' => 'mailbox'],
                ['name' => 'La terrasse', 'line' => 'Quarante mètres carrés sur le toit, des tables à l’ombre et une prise par table.', 'icon' => 'sun'],
            ],
        ],
        'pricing' => [
            'title' => 'Quatre formules, tout compris',
            'intro' => 'Le poste, la fibre, le café et l’impression sont dans le prix. On change de formule d’un mois à l’autre.',
            'note' => 'Prix hors TVA (8,1 %). Préavis d’un mois pour la fin d’un mois. Un mois de dépôt pour le poste fixe et le bureau, aucun pour la journée et le flex.',
            'plans' => [
                [
                    'name' => 'Journée',
                    'price' => 'CHF 35',
                    'period' => 'par jour',
                    'line' => 'Pour le jour où la maison ne suffit pas : un poste dans la grande salle, sans engagement.',
                    'includes' => [
                        'Un poste libre dans la grande salle',
                        'Accès du lundi au vendredi, 8 h–18 h',
                        'Fibre, café et impression compris',
                        'Salles de réunion à 25.– l’heure',
                    ],
                    'href' => 'mailto:bonjour@letabli.example?subject=Une%20journ%C3%A9e',
                    'label' => 'Réserver une journée',
                ],
                [
                    'name' => 'Poste flex',
                    'price' => 'CHF 290',
                    'period' => 'par mois',
                    'line' => 'Pour venir quand vous voulez : le premier poste libre est le vôtre, de jour comme de nuit.',
                    'includes' => [
                        'Un poste libre dans la grande salle',
                        'Accès 24 h sur 24 par badge',
                        'Fibre, café et impression compris',
                        '4 heures de salle de réunion par mois',
                    ],
                    'href' => 'mailto:bonjour@letabli.example?subject=Poste%20flex',
                    'label' => 'Demander un poste flex',
                ],
                [
                    'name' => 'Poste fixe',
                    'price' => 'CHF 450',
                    'period' => 'par mois',
                    'line' => 'Pour s’installer : votre bureau, votre écran qui reste branché, votre nom sur la boîte aux lettres.',
                    'includes' => [
                        'Un poste à votre nom, avec casier',
                        'Accès 24 h sur 24 par badge',
                        'Fibre, café et impression compris',
                        '8 heures de salle de réunion par mois',
                        'Adresse postale et courrier trié',
                    ],
                    'href' => 'mailto:bonjour@letabli.example?subject=Poste%20fixe',
                    'label' => 'Demander un poste fixe',
                    'featured' => true,
                    'flag' => 'Avec l’adresse postale',
                ],
                [
                    'name' => 'Bureau fermé',
                    'price' => 'dès CHF 1 150',
                    'period' => 'par mois',
                    'line' => 'Pour une équipe de deux à quatre : une porte qui ferme, et vos meubles si vous y tenez.',
                    'includes' => [
                        'Un bureau fermé de 14 à 24 m²',
                        'Accès 24 h sur 24 par badge',
                        'Fibre, café et impression compris',
                        '16 heures de salle de réunion par mois',
                        'Adresse postale et courrier trié',
                        'Votre plaque à l’entrée de l’immeuble',
                    ],
                    'href' => 'mailto:bonjour@letabli.example?subject=Bureau%20ferm%C3%A9',
                    'label' => 'Demander un bureau',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Ce qu’on nous demande avant de s’inscrire',
            'entries' => [
                ['question' => 'Peut-on essayer avant de s’engager ?', 'answer' => 'Oui : la première journée est offerte. Réservez-la sur la page Visiter ou au 032 000 00 00, nous vous gardons un poste près des fenêtres.'],
                ['question' => 'À quelles heures peut-on venir ?', 'answer' => 'L’accueil est ouvert du lundi au vendredi, de 8 h à 18 h. Dès le poste flex, votre badge ouvre la porte 24 h sur 24, week-end et jours fériés compris.'],
                ['question' => 'Quel est le préavis ?', 'answer' => 'Un mois pour la fin d’un mois, par simple e-mail à bonjour@letabli.example. La journée et le carnet de dix journées n’engagent à rien.'],
                ['question' => 'Où se garer, où laisser son vélo ?', 'answer' => 'Le local à vélos de la cour est fermé à clé et compte douze places. Il n’y a pas de parking privé : celui de la gare est à six minutes à pied, 2.– l’heure.'],
                ['question' => 'Peut-on recevoir des clients ?', 'answer' => 'Oui, dans les salles de réunion et à la cuisine : annoncez-les à l’accueil. Dans la grande salle, un invité peut s’asseoir à côté de vous deux heures ; au-delà, c’est une journée à 35.–.'],
                ['question' => 'Peut-on domicilier son entreprise ici ?', 'answer' => 'Oui, avec le poste fixe et le bureau fermé : Rue du Parc 41 devient votre adresse, le courrier est trié chaque matin dans votre casier, et nous fournissons l’attestation pour le registre du commerce.'],
                ['question' => 'Peut-on téléphoner dans la grande salle ?', 'answer' => 'Les appels courts, à voix basse. Pour le reste, les deux cabines insonorisées sont libres sans réservation, et les salles de réunion se réservent à l’heure.'],
            ],
        ],
        'gallery' => [
            'title' => 'L’Établi en douze images',
            'pictures' => [
                ['image' => 'picture:La grande salle le matin, les postes alignés sous les fenêtres d’atelier', 'alt' => 'Une longue salle au parquet de chêne, des bureaux alignés sous de hautes fenêtres', 'caption' => 'La grande salle, trente-huit postes', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les fenêtres d’atelier, quatre mètres de haut, côté nord', 'alt' => 'De hautes fenêtres à petits carreaux vues de l’intérieur, un matin d’hiver', 'caption' => 'Les fenêtres de 1908', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un poste fixe : un écran, une lampe, un casier à clé', 'alt' => 'Un bureau avec un écran, une lampe allumée et un casier en bois', 'caption' => 'Un poste fixe', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La salle Cadran, huit places autour d’une table en chêne', 'alt' => 'Une salle de réunion vitrée, huit chaises autour d’une table en chêne, un écran au mur', 'caption' => 'Salle Cadran, 8 places', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La terrasse sur le toit, les toits de la ville et la crête du Jura', 'alt' => 'Une terrasse en bois sur un toit, des tables sous des parasols, la ville derrière', 'caption' => 'La terrasse, 40 m² sur le toit', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La salle Spiral, quatre places, pour un entretien', 'alt' => 'Une petite salle vitrée avec une table ronde et quatre fauteuils', 'caption' => 'Salle Spiral, 4 places', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La salle Balancier dressée pour une formation de quatorze personnes', 'alt' => 'Une grande salle de réunion, des tables en U face à un écran', 'caption' => 'Salle Balancier, 14 places', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une cabine téléphonique insonorisée, porte ouverte', 'alt' => 'Une cabine en feutre gris avec une tablette et un tabouret haut', 'caption' => 'Une des deux cabines', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un bureau fermé pour trois, la cloison vitrée jusqu’au plafond', 'alt' => 'Un bureau fermé avec trois postes, derrière une cloison de verre', 'caption' => 'Un bureau fermé, 18 m²', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La cuisine à midi, la grande table et ses douze chaises', 'alt' => 'Une cuisine ouverte, des membres attablés autour d’une longue table', 'caption' => 'La cuisine, à midi', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’escalier d’origine et sa rampe en fonte', 'alt' => 'Un escalier de pierre à rampe de fonte, éclairé par une verrière', 'caption' => 'L’escalier de la fabrique', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le petit-déjeuner des membres, un jeudi à huit heures', 'alt' => 'Une quinzaine de personnes debout dans la cuisine, tasses et croissants à la main', 'caption' => 'Le petit-déjeuner du jeudi', 'width' => 1200, 'height' => 900],
            ],
        ],
        'events' => [
            'title' => 'Cet hiver à L’Établi',
            'events' => [
                ['date' => 'jeudi 19 novembre', 'time' => '8 h 00', 'datetime' => '2026-11-19T08:00', 'name' => 'Petit-déjeuner des membres', 'description' => 'Croissants de la boulangerie d’en face et tour de table : qui cherche quoi, qui propose quoi. Pour les membres et leurs invités.'],
                ['date' => 'mardi 24 novembre', 'time' => '18 h 30', 'datetime' => '2026-11-24T18:30', 'name' => 'Causerie : facturer juste quand on travaille seul', 'description' => 'Avec Sandrine Voirol, fiduciaire et membre depuis 2019. Tarif horaire, forfait, acompte : une heure, puis les questions. Ouvert à tous.'],
                ['date' => 'samedi 28 novembre', 'time' => '10 h 00–16 h 00', 'datetime' => '2026-11-28T10:00', 'name' => 'Portes ouvertes', 'description' => 'Visite guidée toutes les heures, postes libres à l’essai et soupe à midi. Sans inscription.'],
                ['date' => 'jeudi 3 décembre', 'time' => '12 h 15', 'datetime' => '2026-12-03T12:15', 'name' => 'Midi-démo', 'description' => 'Un membre montre ce sur quoi il travaille, vingt minutes, pendant qu’on mange. Ce mois-ci : un atlas des fermes du Jura neuchâtelois.'],
                ['date' => 'jeudi 10 décembre', 'time' => '18 h 00', 'datetime' => '2026-12-10T18:00', 'name' => 'Atelier : AVS, LPP et 3e pilier des indépendants', 'description' => 'Ce qu’il faut avoir réglé avant la fin de l’année. Douze places, sur inscription à l’accueil.'],
                ['date' => 'vendredi 18 décembre', 'time' => '19 h 00', 'datetime' => '2026-12-18T19:00', 'name' => 'Fondue de fin d’année', 'description' => 'Dans la cuisine, et sur la terrasse pour les courageux. Membres, anciens membres et leurs proches.'],
                ['date' => 'jeudi 14 janvier', 'time' => '8 h 00', 'datetime' => '2027-01-14T08:00', 'name' => 'Petit-déjeuner des membres', 'description' => 'Le premier de l’année : les nouveaux arrivés de janvier se présentent en une phrase.'],
                ['date' => 'mardi 26 janvier', 'time' => '18 h 30', 'datetime' => '2027-01-26T18:30', 'name' => 'Causerie : trouver ses premiers clients dans les Montagnes', 'description' => 'Trois membres racontent leur première année à leur compte. Ouvert à tous, entrée libre.'],
            ],
        ],
        'booking' => [
            'title' => 'Une visite ou une journée d’essai',
            'intro' => 'Dites-nous le jour qui vous convient et ce que vous cherchez : Inès vous confirme l’heure avant le soir, par e-mail ou par téléphone.',
            'action' => '#booking',
            'services' => [
                'Une visite des lieux, vingt minutes',
                'Une journée d’essai offerte',
                'Un poste fixe à voir',
                'Un bureau fermé à voir',
                'Une salle de réunion à louer',
            ],
        ],
        'map' => [
            'address' => 'Rue du Parc 41, 2300 La Chaux-de-Fonds',
            'title' => 'L’Établi, à six minutes à pied de la gare',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Coworking · La Chaux-de-Fonds',
                'title' => 'Votre bureau, dans la lumière d’une fabrique de 1908',
                'lead' => 'Trente-huit postes, quatre bureaux fermés et trois salles de réunion au deuxième étage d’une ancienne fabrique de cadrans. À la journée ou au mois, sans bail.',
                'subject' => 'La grande salle le matin, les postes alignés sous les fenêtres d’atelier',
                'note' => 'Trois postes fixes libres dès le 1er décembre',
                'links' => [['label' => 'Réserver une visite', 'to' => '/visit'], ['label' => 'Comparer les formules', 'to' => '/plans']],
                'facts' => [['value' => '38', 'label' => 'Postes de travail'], ['value' => '6 min', 'label' => 'À pied de la gare'], ['value' => '24 h/24', 'label' => 'Accès par badge']],
            ],
            'features' => [
                'eyebrow' => 'L’Établi',
                'title' => 'Ce qu’on vient y chercher',
                'lead' => 'Un prix clair, une salle où l’on voit clair, et des voisins de bureau qu’on a envie de revoir.',
                'items' => [
                    ['title' => 'Les formules', 'body' => 'De la journée à 35.– au bureau fermé : quatre formules, tout compris, un mois de préavis.', 'subject' => 'Un badge de membre posé sur un bureau, à côté d’un ordinateur ouvert', 'to' => '/plans', 'label' => 'Comparer les formules'],
                    ['title' => 'Les lieux', 'body' => 'Des fenêtres de quatre mètres orientées au nord, la lumière égale que voulaient les cadraniers, et une terrasse sur le toit.', 'subject' => 'Les fenêtres d’atelier vues de l’intérieur, un matin d’hiver', 'to' => '/space', 'label' => 'Voir l’espace'],
                    ['title' => 'Les rendez-vous', 'body' => 'Un petit-déjeuner par mois, des causeries le soir, un midi-démo : on y trouve des clients, parfois un associé.', 'subject' => 'Une douzaine de membres autour de la grande table, tasses à la main', 'to' => '/events', 'label' => 'Voir l’agenda'],
                ],
            ],
        ],
        '/plans' => [
            'label' => 'Formules',
            'hero' => [
                'eyebrow' => 'Formules',
                'title' => 'Quatre formules, du jour au mois',
                'lead' => 'Tout est dans le prix : le poste, la fibre, le café, l’impression. On passe d’une formule à l’autre d’un mois sur l’autre, et on part avec un mois de préavis.',
                'subject' => 'Un poste fixe près de la fenêtre, un écran et une lampe allumée',
                'links' => [['label' => 'Essayer une journée', 'to' => '/visit'], ['label' => 'Voir l’espace', 'to' => '/space']],
            ],
            'features' => [
                'eyebrow' => 'À la carte',
                'title' => 'Ce qui se loue à l’heure, ou à part',
                'items' => [
                    ['title' => 'Salles de réunion', 'body' => 'Au-delà des heures comprises, 15.– l’heure pour les membres. Sans formule : 25.– l’heure la salle Spiral, 35.– la salle Cadran, 45.– la salle Balancier.', 'icon' => 'presentation'],
                    ['title' => 'Carnet de dix journées', 'body' => 'CHF 300, valable un an, à partager entre collègues d’une même entreprise.', 'icon' => 'ticket'],
                    ['title' => 'Casier seul', 'body' => 'CHF 20 par mois, pour laisser écran et clavier sur place quand on vient en flex.', 'icon' => 'lock'],
                ],
            ],
        ],
        '/space' => [
            'label' => 'L’espace',
            'hero' => [
                'eyebrow' => 'L’espace',
                'title' => '620 m² sous les fenêtres d’une fabrique de cadrans',
                'lead' => 'Une grande salle, quatre bureaux fermés, trois salles de réunion, deux cabines et une terrasse sur le toit. Le mieux est de venir voir ; en attendant, voici.',
                'subject' => 'La grande salle vue depuis l’entrée, les fenêtres d’atelier sur toute la longueur',
                'links' => [['label' => 'Réserver une visite', 'to' => '/visit']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1908',
                'title' => 'Une salle faite pour voir clair',
                'lead' => 'Les cadraniers voulaient une lumière qui ne bouge pas de la journée. Elle convient aussi aux écrans.',
                'body' => [
                    'La fabrique a été bâtie en 1908 pour un atelier de cadrans émaillés. D’où les fenêtres : quatre mètres de haut, orientées au nord, pour que les ouvrières voient la même couleur à huit heures et à seize heures. Les établis couraient le long de la façade ; nos bureaux sont à la même place.',
                    'Quand Maude Jeanneret et Loïc Perrenoud ont repris l’étage en 2017, il servait de dépôt depuis trente ans. Ils ont gardé le parquet de chêne, les radiateurs en fonte et l’escalier, refait l’électricité et tiré la fibre. Les cloisons des bureaux fermés et des salles de réunion sont vitrées jusqu’au plafond : la lumière traverse l’étage d’un bout à l’autre.',
                    'La grande salle compte trente-huit postes, jamais plus : chacun a 160 centimètres de bureau, et personne ne tourne le dos à une fenêtre. Sur le toit, l’ancienne plate-forme de séchage est devenue une terrasse de quarante mètres carrés, où l’on travaille de mai à septembre et où l’on mange le reste de l’année dès qu’il y a du soleil.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les salles de réunion',
                'title' => 'Trois salles, trois tailles',
                'lead' => 'Vitrées, avec écran, tableau blanc et visioconférence. Elles se louent aussi sans être membre.',
                'items' => [
                    ['title' => 'Spiral', 'body' => 'Quatre places autour d’une table ronde : un entretien, un rendez-vous client, une visio à deux.', 'subject' => 'Une petite salle vitrée, une table ronde et quatre fauteuils'],
                    ['title' => 'Cadran', 'body' => 'Huit places et un écran de 65 pouces : la séance de comité, la présentation à un client.', 'subject' => 'Huit chaises autour d’une table en chêne, un écran au mur'],
                    ['title' => 'Balancier', 'body' => 'Quatorze places en U ou vingt-quatre en rangées, un projecteur : une formation, une assemblée.', 'subject' => 'Une grande salle, des tables en U face à un écran de projection'],
                ],
            ],
        ],
        '/events' => [
            'label' => 'Agenda',
            'hero' => [
                'eyebrow' => 'Agenda',
                'title' => 'Ce qui se passe à L’Établi cet hiver',
                'lead' => 'Un petit-déjeuner par mois pour les membres, des causeries ouvertes à tous, et une journée portes ouvertes le samedi 28 novembre.',
                'subject' => 'Une causerie le soir dans la cuisine, une trentaine de personnes assises',
                'links' => [['label' => 'Réserver une visite', 'to' => '/visit'], ['label' => 'Voir l’espace', 'to' => '/space']],
            ],
            'story' => [
                'eyebrow' => 'Pourquoi un agenda',
                'title' => 'On ne vient pas que pour le bureau',
                'lead' => 'La moitié de nos membres travaillent seuls. Ce qui se passe ici le jeudi matin compte autant que la fibre.',
                'body' => [
                    'Le petit-déjeuner des membres a lieu un jeudi par mois, à huit heures, dans la cuisine. Chacun dit en une phrase ce qu’il cherche et ce qu’il peut offrir. C’est là qu’une traductrice a trouvé son comptable, et qu’un bureau d’ingénieurs a trouvé sa graphiste.',
                    'Les causeries et les ateliers du soir sont ouverts à tous, membres ou non : l’entrée est libre, on s’inscrit seulement pour que nous sachions combien de chaises sortir. Les portes ouvertes, deux fois par an, sont le bon jour pour venir voir sans rendez-vous.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois formats',
                'title' => 'Le matin, à midi, le soir',
                'items' => [
                    ['title' => 'Petit-déjeuner', 'body' => 'Un jeudi par mois à 8 h, pour les membres et leurs invités. Une heure, pas plus.', 'icon' => 'croissant'],
                    ['title' => 'Midi-démo', 'body' => 'Vingt minutes pendant le repas : un membre montre son travail en cours, les autres posent des questions.', 'icon' => 'utensils'],
                    ['title' => 'Causerie', 'body' => 'Le soir à 18 h 30, une heure avec quelqu’un du métier, puis un verre. Ouverte à tous, entrée libre.', 'icon' => 'mic'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Portes ouvertes',
                'title' => 'Samedi 28 novembre, de 10 h à 16 h',
                'lead' => 'Visite guidée toutes les heures, postes libres à l’essai, soupe à midi. Sans inscription : montez au deuxième étage.',
                'links' => [['label' => 'Venir un autre jour', 'to' => '/visit'], ['label' => 'Voir l’espace', 'to' => '/space']],
                'details' => [
                    ['label' => 'Adresse', 'value' => 'Rue du Parc 41, La Chaux-de-Fonds'],
                    ['label' => 'Entrée', 'value' => 'Libre, sans inscription'],
                    ['label' => 'Gare', 'value' => 'Six minutes à pied'],
                ],
            ],
        ],
        '/visit' => [
            'hero' => [
                'eyebrow' => 'Visiter',
                'title' => 'Venez voir, ou venez travailler une journée',
                'lead' => 'La visite dure vingt minutes, la journée d’essai est offerte. Choisissez un jour : Inès vous confirme l’heure avant le soir.',
                'subject' => 'La porte de la fabrique côté cour, la plaque de L’Établi à l’entrée',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000'], ['label' => 'Comparer les formules', 'to' => '/plans']],
            ],
            'story' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'Vingt minutes pour voir, une journée pour savoir',
                'lead' => 'On ne choisit pas un bureau sur des photos. Venez vous asseoir.',
                'body' => [
                    'La visite dure vingt minutes. Inès Calame vous attend à l’accueil du deuxième étage, vous montre la grande salle, les salles de réunion, les cabines et la terrasse, et répond aux questions de préavis et de courrier. Elle a lieu du lundi au vendredi entre 8 h et 18 h, et le samedi matin sur demande.',
                    'La journée d’essai est offerte, une fois. Vous arrivez quand vous voulez dès 8 h, un poste vous est gardé près des fenêtres, le code du réseau est sur la table. À midi, la plupart des membres mangent à la grande table de la cuisine : c’est le meilleur moment pour leur demander ce qu’ils en pensent.',
                    'De la gare, comptez six minutes à pied : traversez l’avenue Léopold-Robert et montez deux rues, la Rue du Parc est la deuxième parallèle. L’entrée est dans la cour, porte de gauche ; deuxième étage par l’escalier ou par l’ascenseur.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Pour venir',
                'title' => 'À pied, à vélo, en voiture',
                'items' => [
                    ['title' => 'En train', 'body' => 'Six minutes à pied de la gare de La Chaux-de-Fonds, sans une marche à monter jusqu’à la cour.', 'icon' => 'train-front'],
                    ['title' => 'À vélo', 'body' => 'Local fermé à clé dans la cour, douze places, une prise pour les vélos électriques.', 'icon' => 'bike'],
                    ['title' => 'En voiture', 'body' => 'Pas de parking privé : celui de la gare est à six minutes à pied, 2.– l’heure.', 'icon' => 'car'],
                ],
            ],
        ],
    ],
];
