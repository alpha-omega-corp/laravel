<?php

declare(strict_types=1);

/*
 * The demo content of a portfolio: a fictional photographer working alone from
 * a second-floor studio in Vevey, who takes weddings, portraits and workshop
 * reportage between Lavaux and the Chablais. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its owner
 * keeps in the admin, in each component's own prop names — and `pages` holds
 * each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/portfolio.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Line Bovard',
        'blurb' => 'Portraits, mariages et reportages d’atelier, entre Lavaux et le Chablais.',
        'address' => 'Rue du Simplon 18, 1800 Vevey',
        'phone' => '021 000 00 00',
        'email' => 'bonjour@line-bovard.example',
        'status' => 'Agenda 2027 : six samedis encore libres',
        'note' => '© Line Bovard, photographe',
        'action' => ['label' => 'Demander une date', 'to' => '/contact'],
        'band' => [
            'eyebrow' => 'Écrire',
            'title' => 'Une date en tête ?',
            'lead' => 'Douze mariages par an et pas un de plus : pour l’été, on s’y prend à l’automne. Un portrait ou un reportage se fixe en deux à trois semaines.',
            'links' => [['label' => 'Demander une date', 'to' => '/contact'], ['label' => 'Voir les tarifs', 'to' => '/commissions']],
            'details' => [
                ['label' => 'Atelier', 'value' => 'Rue du Simplon 18, Vevey'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Réponse', 'value' => 'Sous deux jours ouvrables'],
            ],
        ],
    ],

    'prefabs' => [
        'gallery' => [
            'title' => 'Douze images, dans l’ordre',
            'pictures' => [
                ['image' => 'picture:Un pêcheur de Rivaz relevant ses filets dans la brume', 'alt' => 'Un pêcheur debout dans sa barque relève un filet dans la brume du matin', 'caption' => 'Rivaz, 5 h 40 · Les mains du lac', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une mariée riant sous la pluie, le parapluie tenu par son père', 'alt' => 'Une mariée rit sous un parapluie noir que tient son père', 'caption' => 'Clara, Saint-Saphorin, juin 2025', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les mains d’un luthier collant une table d’harmonie', 'alt' => 'Deux mains posent des serre-joints sur une table d’harmonie en épicéa', 'caption' => 'Atelier Mottier, Montreux', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une vendangeuse entre les rangs, une caissette sur l’épaule', 'alt' => 'Une vendangeuse porte une caissette de raisin entre deux rangs de vigne', 'caption' => 'Vendanges aux Rueyres, Chardonne', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une horlogère à son établi, la loupe relevée sur le front', 'alt' => 'Portrait d’une horlogère assise à son établi, la loupe relevée sur le front', 'caption' => 'Manufacture Rochat, Corsier-sur-Vevey', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le quai de Vevey après minuit, deux pêcheurs à la ligne sous un réverbère', 'alt' => 'Deux pêcheurs à la ligne sous un réverbère, le lac noir derrière eux', 'caption' => 'Les nuits du quai, août 2023', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Deux enfants courant dans un verger en fleurs', 'alt' => 'Deux enfants courent entre les pommiers en fleurs', 'caption' => 'Famille Aubert, Blonay', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un couple de dos face au lac, les Dents du Midi au fond', 'alt' => 'Un couple vu de dos regarde le lac, les montagnes au fond', 'caption' => 'Clara et Yann, une heure avant la cérémonie', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Portrait serré d’un vigneron, la casquette sur les yeux', 'alt' => 'Portrait serré d’un vigneron en casquette qui regarde l’objectif', 'caption' => 'Marc Chollet, vigneron à Chardonne', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une table de noces dressée sous une treille', 'alt' => 'Une longue table dressée sous une treille, les verres pris dans la lumière du soir', 'caption' => 'Repas de noces, Saint-Saphorin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des barques retournées sur la grève, sous la neige', 'alt' => 'Trois barques retournées sur les galets, couvertes d’une fine neige', 'caption' => 'Grève de Cully, janvier', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un tirage noir et blanc sortant du bain, tenu par deux pinces', 'alt' => 'Un tirage noir et blanc tenu par deux pinces au-dessus d’une cuvette', 'caption' => 'Au labo, rue du Simplon', 'width' => 1200, 'height' => 900],
            ],
        ],
        'projects' => [
            'title' => 'Les séries',
            'projects' => [
                ['name' => 'Les mains du lac', 'place' => 'Rivaz et Cully', 'year' => 2025, 'kind' => 'Série personnelle', 'figure' => '38', 'figure_label' => 'portraits de pêcheurs', 'summary' => 'Deux hivers sur les barques des derniers pêcheurs professionnels de Lavaux, à l’heure où ils relèvent les filets.'],
                ['name' => 'Vendanges aux Rueyres', 'place' => 'Chardonne', 'year' => 2024, 'kind' => 'Commande · Domaine des Rueyres', 'figure' => '9 jours', 'figure_label' => 'dans les vignes', 'summary' => 'Toute une récolte suivie du premier sécateur au pressoir, pour les étiquettes et le livre du domaine.'],
                ['name' => 'Atelier Mottier, luthiers', 'place' => 'Montreux', 'year' => 2025, 'kind' => 'Commande · reportage d’atelier', 'figure' => '64', 'figure_label' => 'images livrées', 'summary' => 'La naissance d’un violoncelle, de la table d’harmonie au vernis, en six visites sur quatre mois.'],
                ['name' => 'Clara et Yann', 'place' => 'Saint-Saphorin', 'year' => 2025, 'kind' => 'Mariage', 'figure' => '412', 'figure_label' => 'images remises', 'summary' => 'Une noce sous l’orage de juin : la cérémonie au temple, le repas sous la treille, jusqu’à la dernière danse.'],
                ['name' => 'Les nuits du quai', 'place' => 'Vevey', 'year' => 2023, 'kind' => 'Série personnelle', 'figure' => '3 étés', 'figure_label' => 'au bord de l’eau', 'summary' => 'Ceux qui restent sur le quai après minuit : pêcheurs à la ligne, baigneurs, musiciens, veilleurs.'],
                ['name' => 'Les visages de la Manufacture', 'place' => 'Corsier-sur-Vevey', 'year' => 2026, 'kind' => 'Commande · Manufacture Rochat', 'figure' => '52', 'figure_label' => 'portraits d’équipe', 'summary' => 'Chaque horlogère et chaque horloger à son établi, pour le rapport annuel et le hall d’entrée.'],
            ],
        ],
        'services' => [
            'title' => 'Ce qui se commande',
            'services' => [
                ['name' => 'Mariage', 'line' => 'La journée entière, des préparatifs à la première danse, et 400 images développées sous six semaines.', 'icon' => 'heart', 'price' => 'dès CHF 3 400'],
                ['name' => 'Portrait', 'line' => 'Seul, à deux ou en famille : une heure à l’atelier ou dehors, sans pose imposée, et douze images choisies ensemble.', 'icon' => 'users', 'price' => 'dès CHF 380'],
                ['name' => 'Reportage d’atelier', 'line' => 'Une journée dans vos murs : les gestes, les lieux, les visages, avec les droits pour vos propres supports.', 'icon' => 'building-2', 'price' => 'dès CHF 1 900 la journée'],
                ['name' => 'Portraits d’équipe', 'line' => 'Un fond, une lumière, un quart d’heure par personne, livrés sous huit jours.', 'icon' => 'contact', 'price' => 'CHF 90 par personne'],
                ['name' => 'Tirage d’art', 'line' => 'Une image de l’atelier ou la vôtre, tirée sur papier baryté, signée, encadrée sur demande.', 'icon' => 'frame', 'price' => 'dès CHF 240'],
            ],
        ],
        'testimonials' => [
            'title' => 'Ceux qui étaient devant l’objectif',
            'testimonials' => [
                ['quote' => 'Nous avions peur de poser. Line a passé la journée à nos côtés sans que nous y pensions, et nous avons reconnu chaque invité dans les images, jusqu’à la tante qui ne sourit jamais.', 'name' => 'Clara et Yann Perret', 'role' => 'Mariés à Saint-Saphorin, juin 2025'],
                ['quote' => 'Elle est restée neuf jours dans nos vignes, levée avant nous. Ses photographies sont sur nos étiquettes, et dans la cuisine de ma mère.', 'name' => 'Marc Chollet', 'role' => 'Vigneron, Domaine des Rueyres, Chardonne'],
                ['quote' => 'Cinquante-deux portraits en deux jours, livrés la semaine suivante, et personne n’a demandé à refaire le sien. Pour une manufacture, c’est une première.', 'name' => 'Hélène Rochat', 'role' => 'Directrice, Manufacture Rochat'],
            ],
        ],
        'booking' => [
            'title' => 'Demander une date',
            'intro' => 'Dites-moi l’occasion, le jour et un mot sur ce que vous imaginez. Je réponds moi-même sous deux jours ouvrables ; rien n’est réservé avant ma confirmation.',
            'action' => '#booking',
            'services' => ['Mariage', 'Portrait', 'Reportage d’atelier', 'Portraits d’équipe', 'Tirage d’art'],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Photographe · Vevey',
                'title' => 'Photographier les gens comme ils sont',
                'lead' => 'Des mariages, des portraits et des ateliers au travail, entre Lavaux et le Chablais. À la lumière qu’il y a, sans mise en scène, depuis 2012.',
                'subject' => 'Un pêcheur de Rivaz relevant ses filets dans la brume du matin',
                'note' => 'Agenda 2027 : six samedis encore libres',
                'links' => [['label' => 'Demander une date', 'to' => '/contact'], ['label' => 'Voir les images', 'to' => '/work']],
                'facts' => [['value' => '14 ans', 'label' => 'De commandes, depuis 2012'], ['value' => '12', 'label' => 'Mariages par an, pas un de plus'], ['value' => '6 sem.', 'label' => 'Du jour dit aux images']],
            ],
            'features' => [
                'eyebrow' => 'Par où commencer',
                'title' => 'Regarder d’abord, écrire ensuite',
                'lead' => 'Les images une à une, les séries entières, puis ce qui peut se commander.',
                'items' => [
                    ['title' => 'Les images', 'body' => 'Douze photographies tirées de quatorze ans de travail, dans l’ordre où je les poserais sur une table.', 'subject' => 'Une horlogère à son établi, la loupe relevée sur le front', 'to' => '/work', 'label' => 'Voir les douze images'],
                    ['title' => 'Les séries', 'body' => 'Six ensembles montrés en entier : pour qui, où, quand, et combien d’images en sont restées.', 'subject' => 'Des barques retournées sur la grève de Cully, sous la neige', 'to' => '/series', 'label' => 'Parcourir les séries'],
                    ['title' => 'Les commandes', 'body' => 'Un mariage, un portrait, une journée dans votre atelier : ce qui se commande et ce que cela coûte.', 'subject' => 'Une table de noces dressée sous une treille', 'to' => '/commissions', 'label' => 'Lire les tarifs'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2012',
                'title' => 'Un boîtier, deux objectifs, la lumière qu’il y a',
                'lead' => 'Je ne déplace pas les meubles et je n’apporte pas de flash : ce que vous voyez sur les images était là.',
                'body' => [
                    'J’ai appris le métier à Vevey, puis passé quatre ans comme assistante dans un studio de mode à Zurich, où j’ai surtout compris ce que je ne voulais pas faire. En 2012, j’ai repris le deuxième étage de l’ancienne imprimerie de la rue du Simplon, et j’y suis encore.',
                    'Je photographie des gens qui font quelque chose : se marier, vendanger, coller une table d’harmonie, relever des filets. J’arrive tôt, je reste longtemps, et je parle assez pour qu’on finisse par m’oublier.',
                    'Tout ce qui sort de l’atelier passe entre mes mains : le choix, le développement, les tirages sur papier baryté. Je travaille seule, ce qui limite le nombre de commandes et garantit qui sera là le jour dit.',
                ],
            ],
        ],
        '/work' => [
            'label' => 'Images',
            'hero' => [
                'eyebrow' => 'Images',
                'title' => 'Douze photographies, et pas une de plus',
                'lead' => 'Un choix refait chaque hiver. Aucune n’est recadrée, ni retouchée au-delà de ce qu’un tirage demande.',
                'subject' => 'Une vendangeuse entre les rangs, une caissette sur l’épaule',
                'links' => [['label' => 'Parcourir les séries', 'to' => '/series'], ['label' => 'Demander une date', 'to' => '/contact']],
            ],
            'story' => [
                'eyebrow' => 'Le choix',
                'title' => 'Pourquoi douze, et pourquoi celles-là',
                'lead' => 'Un mur trop plein ne montre rien. Chaque hiver j’en décroche trois ou quatre et j’en accroche autant.',
                'body' => [
                    'Ces douze images viennent de quatorze ans de commandes et de travaux personnels. Elles ne sont pas classées par genre : une mariée côtoie un pêcheur parce que c’est, pour moi, le même travail, attendre que quelqu’un oublie l’appareil.',
                    'Aucune n’est recadrée, et la retouche s’arrête à ce qu’un tireur ferait sous l’agrandisseur : la densité, le contraste, une poussière ôtée. Si une image vous arrête, la série dont elle vient est à la page suivante.',
                    'Les tirages accrochés à l’atelier sont les mêmes, en 40 × 50 sur papier baryté. On vient les voir sur rendez-vous, du mardi au vendredi.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Hors de l’écran',
                'title' => 'Ce qu’une image devient',
                'lead' => 'Une photographie n’est finie que sur le papier.',
                'items' => [
                    ['title' => 'Le tirage', 'body' => 'Papier baryté, tiré à l’atelier, signé et numéroté au dos. Du 24 × 30 au 60 × 80.', 'subject' => 'Un tirage noir et blanc sortant du bain, tenu par deux pinces', 'to' => '/commissions', 'label' => 'Commander un tirage'],
                    ['title' => 'La planche-contact', 'body' => 'Après chaque commande vous recevez la planche entière : le choix se fait avec vous, pas dans votre dos.', 'subject' => 'Des planches-contact annotées au crayon rouge sur une table lumineuse'],
                    ['title' => 'Le livre', 'body' => 'Une série peut finir en livre relié à la main, à partir de vingt exemplaires.', 'subject' => 'Un livre de photographies ouvert, relié en toile grise', 'to' => '/series', 'label' => 'Voir les séries'],
                ],
            ],
        ],
        '/series' => [
            'label' => 'Séries',
            'hero' => [
                'eyebrow' => 'Séries',
                'title' => 'Six ensembles, montrés en entier',
                'lead' => 'Trois commandes, un mariage et deux travaux personnels, chacun avec pour qui, où, quand, et ce qu’il en reste.',
                'subject' => 'Trente-huit portraits de pêcheurs accrochés en ligne sur un mur blanc',
                'links' => [['label' => 'Voir les images', 'to' => '/work'], ['label' => 'Commander une série', 'to' => '/commissions']],
            ],
            'story' => [
                'eyebrow' => 'Travailler en série',
                'title' => 'Une image seule ne dit pas tout',
                'lead' => 'Une commande se juge sur l’ensemble : la vingtième image doit tenir à côté de la première.',
                'body' => [
                    'Chaque série est montrée avec ce qui permet de la situer : pour qui elle a été faite, où, en quelle année, et combien d’images en sont restées. Les commandes sont publiées avec l’accord de ceux qui y figurent.',
                    'Deux d’entre elles sont des travaux personnels, faits sans client et sans délai. Ce sont souvent eux qui amènent les commandes : le Domaine des Rueyres m’a écrit après avoir vu les pêcheurs de Rivaz.',
                ],
            ],
            'features' => [
                'eyebrow' => 'En ce moment',
                'title' => 'Ce qui s’accroche et ce qui se prépare',
                'items' => [
                    ['title' => 'L’exposition', 'body' => '« Les mains du lac », trente-huit tirages à la Galerie du Rivage, à Vevey, du 6 mars au 18 avril 2027.', 'subject' => 'Des tirages encadrés alignés sur le mur blanc d’une galerie'],
                    ['title' => 'Le livre', 'body' => '96 pages, 400 exemplaires, à paraître en mars 2027. En souscription à CHF 48 jusqu’à la fin janvier.', 'subject' => 'Une maquette de livre et des épreuves étalées sur une table', 'to' => '/contact', 'label' => 'Souscrire au livre'],
                    ['title' => 'En cours', 'body' => 'Les serres de l’hiver : un maraîcher de Noville, d’octobre à mars. À voir ici à l’automne prochain.', 'subject' => 'Une serre embuée au petit matin, des rangs de salades'],
                ],
            ],
        ],
        '/commissions' => [
            'label' => 'Commandes',
            'hero' => [
                'eyebrow' => 'Commandes',
                'title' => 'Ce qui se commande, et à quel prix',
                'lead' => 'Cinq prestations et des prix écrits. Les droits d’usage sur vos propres supports sont compris ; le reste se dit autour d’un café.',
                'subject' => 'Un boîtier et deux objectifs posés sur la grande table de l’atelier',
                'links' => [['label' => 'Demander une date', 'to' => '/contact'], ['label' => 'Voir les séries', 'to' => '/series']],
            ],
            'story' => [
                'eyebrow' => 'Comment je travaille',
                'title' => 'Un café d’abord, les images six semaines après',
                'lead' => 'Les prix sont écrits pour que personne n’ait à les demander. Voici ce qu’ils comprennent.',
                'body' => [
                    'Toute commande commence par une rencontre, à l’atelier ou sur les lieux, sans engagement. J’y apprends ce que vous attendez des images et vous y apprenez comment je travaille ; il arrive que nous en restions là, et c’est très bien ainsi.',
                    'Le prix comprend la prise de vue, le choix, le développement de chaque image et une galerie privée en ligne. Pour une entreprise, les droits d’usage sur vos propres supports sont compris pour cinq ans ; l’affichage et la publicité se chiffrent à part, par écrit, avant le jour dit.',
                    'Un acompte de 30 % réserve la date. Les images arrivent sous six semaines pour un mariage, sous dix jours pour un portrait ou un reportage, et les fichiers restent archivés dix ans à l’atelier.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Une commande, pas à pas',
                'title' => 'Avant, pendant, après',
                'lead' => 'Trois moments, les mêmes pour un portrait d’une heure et pour une noce de quinze.',
                'items' => [
                    ['title' => 'Avant', 'body' => 'Une heure autour d’un café pour parler du jour, des lieux et des gens. Vous repartez avec un devis écrit.', 'subject' => 'Deux tasses et un carnet ouvert sur la grande table de l’atelier'],
                    ['title' => 'Le jour dit', 'body' => 'J’arrive avant tout le monde et je repars après. Un seul boîtier, pas de flash, pas de liste de poses.', 'subject' => 'La photographe de dos, un boîtier à la main, dans une cour de ferme'],
                    ['title' => 'Après', 'body' => 'Une galerie privée, les fichiers en haute définition, et les tirages que vous aurez choisis sur la planche.', 'subject' => 'Une boîte de tirages ouverte, nouée d’un ruban de lin', 'to' => '/contact', 'label' => 'Demander une date'],
                ],
            ],
        ],
        '/contact' => [
            'hero' => [
                'eyebrow' => 'Écrire',
                'title' => 'Une date, une occasion, un mot',
                'lead' => 'Dites-moi le jour et ce que vous imaginez. Je réponds moi-même, sous deux jours ouvrables, avec ce qui est libre et ce que cela coûterait.',
                'subject' => 'La porte vitrée de l’atelier, au fond du couloir de l’ancienne imprimerie',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir les tarifs', 'to' => '/commissions']],
            ],
            'story' => [
                'eyebrow' => 'L’atelier',
                'title' => 'Au deuxième, dans l’ancienne imprimerie',
                'lead' => 'On sonne à « Bovard », on monte, la porte vitrée est au fond du couloir.',
                'body' => [
                    'L’atelier est à six minutes à pied de la gare de Vevey, dans la rue qui longe les voies. Il n’a pas de vitrine : je reçois sur rendez-vous, du mardi au vendredi, et le samedi quand je ne suis pas à un mariage.',
                    'Le formulaire arrive directement chez moi. Je réponds sous deux jours ouvrables, plus lentement en juin et en septembre, qui sont les mois des noces ; pour une urgence, le téléphone reste le plus sûr.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Se rencontrer',
                'title' => 'Trois endroits pour un premier café',
                'items' => [
                    ['title' => 'À l’atelier', 'body' => 'Les tirages sont au mur et les livres sur la table : le plus simple pour voir ce qu’une commande devient.', 'subject' => 'La grande table de l’atelier sous la verrière, des tirages au mur'],
                    ['title' => 'Chez vous', 'body' => 'Pour un portrait ou une famille, je viens voir la lumière de votre salon avant de fixer l’heure.', 'subject' => 'Un salon traversé par la lumière du matin, un fauteuil près de la fenêtre'],
                    ['title' => 'Sur les lieux', 'body' => 'Pour une noce ou un reportage, nous faisons le tour ensemble une fois, quelques semaines avant.', 'subject' => 'Une cour de domaine viticole vide, des tables pliées contre un mur'],
                ],
            ],
        ],
    ],
];
