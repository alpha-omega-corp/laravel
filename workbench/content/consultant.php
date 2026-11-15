<?php

declare(strict_types=1);

/*
 * The demo content of a consultant: a fictional two-person organisation
 * consultancy in Neuchâtel, hired by the small industrial firms of the Jura
 * arc. `site` is what every page shares, `prefabs` is what the site would bind
 * as `kit.<name>` — the rows its owners keep in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/consultant.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Cabinet Berthoud',
        'blurb' => 'Conseil en organisation pour les PME de l’Arc jurassien : un diagnostic en dix jours, puis un accompagnement qui s’arrête quand vos cadres tiennent sans nous.',
        'address' => 'Rue du Seyon 18, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'bonjour@cabinet-berthoud.example',
        'status' => 'Prochain mandat possible dès la mi-janvier',
        'note' => '© Cabinet Berthoud Sàrl',
        'action' => ['label' => 'Premier entretien', 'to' => '/contact'],
        'band' => [
            'eyebrow' => 'Commencer',
            'title' => 'Quarante-cinq minutes pour y voir clair',
            'lead' => 'Le premier entretien est gratuit et n’engage à rien. Vous décrivez la situation ; nous disons franchement si c’est un travail pour nous.',
            'links' => [['label' => 'Demander un premier entretien', 'to' => '/contact'], ['label' => 'Voir les prestations', 'to' => '/services']],
            'details' => [
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Bureau', 'value' => 'Rue du Seyon 18, Neuchâtel'],
                ['label' => 'Réponse', 'value' => 'Sous deux jours ouvrables'],
            ],
        ],
    ],

    'prefabs' => [
        'credentials' => [
            'title' => 'Références et affiliations',
            'credentials' => [
                ['name' => 'Décolletage Vuilleumier SA', 'detail' => 'Tramelan, 140 personnes : diagnostic puis accompagnement, de 2019 à 2021'],
                ['name' => 'Fondation Les Cèdres', 'detail' => 'Yverdon-les-Bains, 85 collaborateurs : réorganisation des équipes de soins, 2023'],
                ['name' => 'Mécatis Précision SA', 'detail' => 'La Chaux-de-Fonds, 60 personnes : direction des opérations ad interim, 2022'],
                ['name' => 'ASCO', 'detail' => 'Membre de l’Association suisse des conseils en organisation et gestion depuis 2016'],
                ['name' => 'ICF, niveau PCC', 'detail' => 'Luc Aellen, coach certifié, certification renouvelée en 2024'],
                ['name' => 'EPFL', 'detail' => 'Hélène Berthoud, ingénieure diplômée en génie mécanique, 2003'],
            ],
        ],
        'testimonials' => [
            'title' => 'Ce qu’en disent nos clients',
            'testimonials' => [
                [
                    'quote' => 'En dix jours, Hélène Berthoud a compris pourquoi nos délais glissaient depuis trois ans. Ce n’était pas l’atelier, c’était la façon dont le bureau lançait les ordres. Nous livrons à l’heure neuf commandes sur dix, contre six avant.',
                    'name' => 'Pierre Vuilleumier',
                    'role' => 'Directeur, Décolletage Vuilleumier SA, Tramelan',
                ],
                [
                    'quote' => 'Je venais de reprendre l’entreprise de mon père et je faisais encore son travail en plus du mien. Six séances avec Luc Aellen, et j’ai enfin confié les achats à quelqu’un.',
                    'name' => 'Nadia Rossetti',
                    'role' => 'Directrice, Rossetti Sanitaire Sàrl, Marin',
                ],
                [
                    'quote' => 'Le rapport tenait en douze pages et disait trois choses à faire, dans l’ordre. Il disait aussi ce qu’il ne fallait pas toucher, et c’est ce qui a convaincu les équipes.',
                    'name' => 'Anne Chapuis',
                    'role' => 'Directrice des soins, Fondation Les Cèdres, Yverdon-les-Bains',
                ],
            ],
        ],
        'services' => [
            'title' => 'Nos prestations',
            'services' => [
                ['name' => 'Diagnostic d’organisation', 'line' => 'Dix jours dans vos murs, puis douze pages : où le temps se perd, et par quoi commencer.', 'price' => 'CHF 9800, forfait', 'icon' => 'scan-search'],
                ['name' => 'Accompagnement de direction', 'line' => 'Un jour par semaine à vos côtés, de trois à six mois, pour mener ce que le diagnostic a nommé.', 'price' => 'CHF 1900 par jour', 'icon' => 'compass'],
                ['name' => 'Direction ad interim', 'line' => 'Nous tenons le poste de responsable des opérations entre deux titulaires, de trois à neuf mois.', 'price' => 'sur devis', 'icon' => 'briefcase'],
                ['name' => 'Coaching de dirigeant', 'line' => 'Six séances d’une heure et demie pour qui prend un poste plus grand que le précédent.', 'price' => 'CHF 2400 les six séances', 'icon' => 'messages-square'],
                ['name' => 'Formation des chefs d’équipe', 'line' => 'Deux jours chez vous pour ceux qui dirigent pour la première fois : déléguer, recadrer, dire non.', 'price' => 'CHF 4200 par groupe de huit', 'icon' => 'graduation-cap'],
                ['name' => 'Préparation d’une transmission', 'line' => 'Mettre l’entreprise en état d’être reprise : qui décide quoi, et ce qui n’est écrit nulle part.', 'price' => 'sur devis', 'icon' => 'handshake'],
                ['name' => 'Journée de direction', 'line' => 'Une journée hors les murs avec votre comité : trois décisions prises et écrites avant 17 h.', 'price' => 'CHF 3600 la journée', 'icon' => 'presentation'],
                ['name' => 'Deuxième avis', 'line' => 'Deux heures sur un projet de réorganisation déjà écrit, et une note franche sur ce qui tiendra.', 'price' => 'CHF 480', 'icon' => 'file-check'],
            ],
        ],
        'process' => [
            'title' => 'Un mandat, étape par étape',
            'intro' => 'Du premier appel à la passation, cinq étapes dans le même ordre pour chaque client. Le prix et la date de fin sont écrits dès la deuxième.',
            'steps' => [
                ['name' => 'Premier entretien', 'line' => 'Vous décrivez la situation, au téléphone ou chez vous ; nous disons si nous pouvons aider. Gratuit et sans engagement.', 'duration' => '45 minutes'],
                ['name' => 'Lettre de mission', 'line' => 'Deux pages : la question posée, ce que vous recevrez, le prix fixe et la date de fin.', 'duration' => 'sous cinq jours'],
                ['name' => 'Dix jours dans vos murs', 'line' => 'Quinze à vingt entretiens en tête à tête, une semaine entre l’atelier et le bureau, trois ans de chiffres relus.', 'duration' => 'sur trois semaines'],
                ['name' => 'Restitution', 'line' => 'Le rapport lu avec la direction : trois priorités chiffrées, dans l’ordre, et ce que nous laisserions tel quel.', 'duration' => 'une demi-journée'],
                ['name' => 'Accompagnement et passation', 'line' => 'Un jour par semaine à vos côtés, un point écrit chaque mois, et nous partons quand vos cadres tiennent sans nous.', 'duration' => 'trois à six mois'],
            ],
        ],
        'faq' => [
            'title' => 'Questions fréquentes',
            'entries' => [
                ['question' => 'Combien coûte un mandat ?', 'answer' => 'Le diagnostic est un forfait de CHF 9800, déplacements compris dans les cantons de Neuchâtel, Vaud, Fribourg, Berne et Jura. L’accompagnement se facture CHF 1900 par jour. Le prix total est écrit dans la lettre de mission avant le premier jour, et il ne change pas sans votre signature.'],
                ['question' => 'Le premier entretien est-il payant ?', 'answer' => 'Non. Il dure quarante-cinq minutes, au 032 000 00 00, en visioconférence ou chez vous, et il n’engage à rien. Vous repartez avec un avis, même si nous ne travaillons pas ensemble.'],
                ['question' => 'Quand pouvez-vous commencer ?', 'answer' => 'Comptez trois à cinq semaines entre le premier entretien et le premier jour chez vous. Nous ne menons que quatre mandats à la fois ; la prochaine date possible est indiquée en haut de chaque page.'],
                ['question' => 'Ce que vous voyez chez nous reste-t-il confidentiel ?', 'answer' => 'Oui. Nous signons un accord de confidentialité avant le premier entretien si vous le souhaitez, et nous ne citons un client qu’avec son accord écrit. Ce que vos collaborateurs disent en entretien n’est jamais rapporté sous leur nom.'],
                ['question' => 'Travaillez-vous à distance ?', 'answer' => 'Le diagnostic se fait sur place : on ne comprend pas un atelier en visioconférence. Les points d’étape et le coaching peuvent se tenir à distance, à votre convenance.'],
                ['question' => 'Quelle taille d’entreprise accompagnez-vous ?', 'answer' => 'De vingt à deux cent cinquante personnes, le plus souvent dans l’industrie, la sous-traitance horlogère et médicale et les institutions de soins. En dessous de vingt personnes, le deuxième avis à CHF 480 suffit souvent.'],
                ['question' => 'Et si le diagnostic conclut qu’il ne faut rien changer ?', 'answer' => 'Cela arrive, une fois sur dix environ. Vous payez le forfait, vous gardez le rapport, et nous ne proposons aucune suite.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un premier entretien',
            'intro' => 'Décrivez votre besoin en une ligne et proposez un jour : Hélène Berthoud ou Luc Aellen vous rappelle sous deux jours ouvrables pour fixer l’heure.',
            'action' => '#booking',
            'services' => [
                'Diagnostic d’organisation',
                'Accompagnement de direction',
                'Direction ad interim',
                'Coaching de dirigeant',
                'Formation des chefs d’équipe',
                'Transmission d’entreprise',
                'Je ne sais pas encore',
            ],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Conseil en organisation · Neuchâtel',
                'title' => 'Remettre de l’ordre dans une PME qui a grandi',
                'lead' => 'Dix jours dans vos murs, douze pages de rapport, trois priorités chiffrées. Puis un jour par semaine à vos côtés, tant que vos cadres en ont besoin.',
                'subject' => 'Hélène Berthoud et un chef d’atelier devant un tableau de planification, dans une usine de décolletage',
                'note' => 'Premier entretien gratuit, réponse sous deux jours ouvrables',
                'links' => [['label' => 'Demander un premier entretien', 'to' => '/contact'], ['label' => 'Voir les prestations', 'to' => '/services']],
                'facts' => [['value' => '64', 'label' => 'Entreprises accompagnées depuis 2014'], ['value' => '10 jours', 'label' => 'Pour un diagnostic'], ['value' => '4', 'label' => 'Mandats à la fois, jamais plus']],
            ],
            'features' => [
                'eyebrow' => 'Le cabinet',
                'title' => 'Trois questions avant de nous appeler',
                'lead' => 'Ce que nous faisons, comment nous le faisons et par où commencer : chaque réponse tient sur une page.',
                'items' => [
                    ['title' => 'Ce que nous faisons', 'body' => 'Du diagnostic de dix jours à la direction ad interim : huit prestations, chacune avec son périmètre et son prix.', 'subject' => 'Un rapport de douze pages ouvert sur une table de réunion, annoté au crayon', 'to' => '/services', 'label' => 'Les prestations et leurs prix'],
                    ['title' => 'Comment nous travaillons', 'body' => 'Cinq étapes, de l’entretien gratuit à la passation. Vous savez à chaque moment où nous en sommes et ce qui reste à payer.', 'subject' => 'Un tableau blanc où cinq étapes sont tracées à la main', 'to' => '/method', 'label' => 'La méthode, étape par étape'],
                    ['title' => 'Par où commencer', 'body' => 'Quarante-cinq minutes au téléphone ou chez vous. Vous repartez avec un avis, même si nous ne travaillons pas ensemble.', 'subject' => 'Deux tasses de café et un carnet ouvert sur la table du cabinet, rue du Seyon', 'to' => '/contact', 'label' => 'Demander un premier entretien'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2014',
                'title' => 'Une ingénieure, un coach, douze ans d’ateliers',
                'lead' => 'Nous ne vendons ni logiciel ni méthode brevetée : nous regardons comment le travail circule, et nous le disons simplement.',
                'body' => [
                    'Hélène Berthoud a dirigé pendant onze ans les opérations d’une manufacture horlogère du Val-de-Travers, passée de quarante à deux cent vingt personnes. Elle y a appris qu’une entreprise qui double de taille garde longtemps l’organisation de ses débuts : le patron signe encore tout, les chefs d’équipe sont les meilleurs ouvriers d’hier, et personne n’a jamais écrit qui décide quoi.',
                    'Elle a ouvert le cabinet en 2014, rue du Seyon. Luc Aellen, coach certifié et ancien responsable des ressources humaines d’un groupe médical biennois, l’a rejointe en 2017 : il mène les entretiens en français et en allemand, et accompagne les cadres que le changement met en première ligne.',
                    'Nous sommes deux, et nous le restons. Quatre mandats à la fois, pas un de plus : celui qui signe la lettre de mission est celui qui vient chez vous. Soixante-quatre entreprises nous ont ouvert leurs portes depuis 2014, de la sous-traitance horlogère aux fondations de soins, et une sur trois nous a rappelés pour un deuxième mandat.',
                ],
            ],
        ],
        '/services' => [
            'label' => 'Prestations',
            'hero' => [
                'eyebrow' => 'Prestations',
                'title' => 'Huit façons de nous confier un problème',
                'lead' => 'Chaque prestation a un périmètre, une durée et un prix écrits avant de commencer. Les déplacements sont compris dans cinq cantons.',
                'subject' => 'Une lettre de mission de deux pages, signée, posée sur un bureau',
                'links' => [['label' => 'Demander un premier entretien', 'to' => '/contact'], ['label' => 'Comment se déroule un mandat', 'to' => '/method']],
            ],
            'features' => [
                'eyebrow' => 'Toujours compris',
                'title' => 'Ce que chaque mandat comprend',
                'items' => [
                    ['title' => 'Un prix écrit d’avance', 'body' => 'Forfait ou nombre de jours plafonné : la lettre de mission donne le total, et il ne bouge pas sans votre signature.', 'subject' => 'La dernière ligne d’une lettre de mission : le prix total, souligné', 'icon' => 'receipt'],
                    ['title' => 'Celui qui signe vient chez vous', 'body' => 'Pas de consultant débutant envoyé à notre place : Hélène Berthoud ou Luc Aellen mène le mandat du premier au dernier jour.', 'subject' => 'Hélène Berthoud en blouse de visite, dans l’allée d’un atelier de décolletage', 'icon' => 'user-check'],
                    ['title' => 'Un rapport qui vous reste', 'body' => 'Douze pages au plus, écrites pour être lues par vos cadres, et que vous pouvez appliquer sans nous.', 'subject' => 'Un rapport de douze pages annoté dans la marge par un chef d’atelier', 'icon' => 'file-text'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment choisir',
                'title' => 'Par quoi commencer quand on ne sait pas',
                'lead' => 'La plupart de nos clients arrivent avec un symptôme, pas avec une commande.',
                'body' => [
                    'Des délais qui glissent, un cadre qui part, un patron qui ne prend plus de vacances : le symptôme est rarement le problème. C’est pourquoi huit mandats sur dix commencent par le diagnostic. Il coûte CHF 9800, il dure dix jours, et il se suffit : une entreprise sur trois applique le rapport seule.',
                    'Si la question est déjà posée, on peut entrer ailleurs. Un chef d’atelier promu la semaine dernière a besoin de la formation, pas d’un rapport. Un poste de direction vacant demande un intérim dès lundi. Un projet de réorganisation déjà écrit mérite un deuxième avis à CHF 480 avant d’être annoncé.',
                    'Et si vous hésitez, le premier entretien sert à cela. En quarante-cinq minutes, nous savons en général laquelle des huit prestations répond à votre situation, et nous vous disons aussi quand aucune ne convient.',
                ],
            ],
        ],
        '/method' => [
            'label' => 'Méthode',
            'hero' => [
                'eyebrow' => 'Méthode',
                'title' => 'Cinq étapes, et vous savez où nous en sommes',
                'lead' => 'Le même chemin pour chaque client, du premier appel à la passation. Le prix, la durée et ce que vous recevez sont écrits avant le premier jour.',
                'subject' => 'Luc Aellen en entretien avec une cheffe d’équipe, dans un bureau vitré qui donne sur l’atelier',
                'links' => [['label' => 'Demander un premier entretien', 'to' => '/contact']],
            ],
            'story' => [
                'eyebrow' => 'Pourquoi dix jours',
                'title' => 'Comprendre sans s’installer',
                'lead' => 'Un diagnostic qui dure trois mois devient un poste. Le nôtre a une date de fin, et c’est ce qui le rend utile.',
                'body' => [
                    'Dix jours, c’est le temps qu’il faut pour parler à quinze ou vingt personnes, passer une semaine entière entre l’atelier et le bureau, et relire trois ans de chiffres. C’est aussi trop court pour prendre des habitudes : nous arrivons avec un regard neuf et nous repartons avant de l’avoir perdu.',
                    'Chaque entretien dure une heure, en tête à tête, et rien n’est rapporté sous un nom. Nous demandons à chacun la même chose : ce qui lui fait perdre du temps, ce qu’il déciderait s’il en avait le droit, et ce qu’il ne faudrait surtout pas changer. La troisième réponse est souvent la plus utile.',
                    'Le rapport tient en douze pages parce qu’un rapport de quatre-vingts pages n’est lu par personne. Il nomme trois priorités, dans l’ordre, avec ce que chacune coûte et ce qu’elle rapporte. Ce que nous laisserions tel quel y figure aussi : une réorganisation qui touche à tout ne tient pas six mois.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce que vous recevez',
                'title' => 'Trois documents, et rien d’autre',
                'items' => [
                    ['title' => 'La lettre de mission', 'body' => 'Deux pages : la question posée, le calendrier, le prix fixe. Vous la signez avant que nous passions votre porte.', 'subject' => 'Une lettre de mission de deux pages, un stylo posé dessus'],
                    ['title' => 'Le rapport de diagnostic', 'body' => 'Douze pages, trois priorités chiffrées et la liste de ce qu’il ne faut pas toucher. Remis en français ou en allemand.', 'subject' => 'Un rapport relié, ouvert à la page des trois priorités'],
                    ['title' => 'Le point d’étape mensuel', 'body' => 'Une page par mois pendant l’accompagnement : ce qui est fait, ce qui coince, ce qui reste à payer.', 'subject' => 'Une feuille de suivi punaisée dans la salle de réunion d’une usine'],
                ],
            ],
        ],
        '/contact' => [
            'label' => 'Contact',
            'hero' => [
                'eyebrow' => 'Premier entretien',
                'title' => 'Parlons de votre entreprise, 45 minutes',
                'lead' => 'Au téléphone, en visioconférence ou chez vous. Gratuit, confidentiel, et sans suite si ce n’est pas un travail pour nous.',
                'subject' => 'La porte du cabinet, rue du Seyon, une plaque en laiton à côté de la sonnette',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000']],
            ],
            'features' => [
                'eyebrow' => 'Où se parler',
                'title' => 'Trois façons de mener cet entretien',
                'items' => [
                    ['title' => 'Au téléphone', 'body' => 'Du lundi au vendredi, de 8 h à 18 h, au 032 000 00 00. Si nous sommes chez un client, nous rappelons le jour même.', 'subject' => 'Luc Aellen au téléphone, debout près de la fenêtre du cabinet', 'icon' => 'phone'],
                    ['title' => 'Chez vous', 'body' => 'Nous venons volontiers voir l’entreprise : le déplacement est offert dans les cantons de Neuchâtel, Vaud, Fribourg, Berne et Jura.', 'subject' => 'Une voiture garée devant une usine du Val-de-Travers, tôt le matin', 'icon' => 'factory'],
                    ['title' => 'Au cabinet', 'body' => 'Rue du Seyon 18, deuxième étage, à dix minutes à pied de la gare de Neuchâtel. Sur rendez-vous, le mardi et le jeudi.', 'subject' => 'La salle de réunion du cabinet : une table ronde, quatre chaises, la rue du Seyon par la fenêtre', 'icon' => 'door-open'],
                ],
            ],
            'story' => [
                'eyebrow' => 'À quoi s’attendre',
                'title' => 'Ce qui se passe pendant ces 45 minutes',
                'lead' => 'Ce n’est pas un rendez-vous commercial : vous repartez avec un avis, que nous travaillions ensemble ou non.',
                'body' => [
                    'Vous racontez la situation comme vous la raconteriez à un confrère : ce qui a changé depuis deux ans, ce qui vous inquiète, ce que vous avez déjà essayé. Nous posons des questions, beaucoup, et nous ne présentons rien.',
                    'À la fin, nous disons l’une de trois choses. Soit c’est un travail pour nous, et vous recevez une lettre de mission sous cinq jours. Soit c’en est un pour quelqu’un d’autre, une fiduciaire, un avocat, un informaticien, et nous vous donnons un nom. Soit il n’y a rien d’autre à faire qu’attendre, et nous vous le disons aussi.',
                    'Rien de ce qui est dit pendant l’entretien ne sort du cabinet. Si vous le souhaitez, nous signons un accord de confidentialité avant de commencer : il suffit de le demander dans le formulaire.',
                ],
            ],
        ],
    ],
];
