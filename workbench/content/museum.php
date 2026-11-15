<?php

declare(strict_types=1);

/*
 * The demo content of a museum: a fictional museum of art in the old grain
 * hall of Orbe, born of a painter's bequest, with one temporary exhibition at
 * a time and a permanent collection in six rooms. `site` is what every page
 * shares, `prefabs` is what the site would bind as `kit.<name>` — the rows its
 * owner keeps in the admin, in each component's own prop names — and `pages`
 * holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/museum.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Musée Paccaud',
        'blurb' => 'Peintres du pied du Jura, estampes et mécaniques à musique, dans l’ancienne halle aux grains d’Orbe.',
        'address' => 'Place du Marché 3, 1350 Orbe',
        'phone' => '024 000 00 00',
        'email' => 'accueil@musee-paccaud.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 17 h',
        'note' => '© Fondation du Musée Paccaud',
        'action' => ['label' => 'Préparer sa visite', 'to' => '/visit'],
        'band' => [
            'eyebrow' => 'Venir',
            'title' => 'Une heure devant les tableaux ?',
            'lead' => 'Du mardi au dimanche de 10 h à 17 h, le jeudi jusqu’à 20 h. Sans réservation : le billet se prend à l’accueil.',
            'links' => [['label' => 'Préparer sa visite', 'to' => '/visit'], ['label' => 'Voir les expositions', 'to' => '/exhibitions']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Place du Marché 3, Orbe'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Gare', 'value' => 'Orbe, six minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le lundi, le 25 décembre et le 1er janvier. Dernière entrée 45 minutes avant la fermeture.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '10:00–17:00'],
                ['day' => 'Mercredi', 'hours' => '10:00–17:00'],
                ['day' => 'Jeudi', 'hours' => '10:00–20:00'],
                ['day' => 'Vendredi', 'hours' => '10:00–17:00'],
                ['day' => 'Samedi', 'hours' => '10:00–17:00'],
                ['day' => 'Dimanche', 'hours' => '10:00–17:00'],
            ],
        ],
        'events' => [
            'title' => 'Expositions et rendez-vous',
            'events' => [
                [
                    'date' => 'Jusqu’au 28 février',
                    'time' => 'Du mardi au dimanche',
                    'datetime' => '2027-02-28',
                    'name' => 'Lumières du Jura. Paysages peints, 1880–1930',
                    'description' => 'Soixante-quatre toiles et carnets de sept peintres du pied du Jura, dont vingt prêtés par des familles de la région et jamais montrés.',
                ],
                [
                    'date' => 'Jeudi 19 novembre',
                    'time' => '18:30',
                    'datetime' => '2026-11-19T18:30',
                    'name' => 'Visite commentée en nocturne',
                    'description' => 'Une heure dans l’exposition avec Hélène Rochat, conservatrice. Comprise dans le billet, sans inscription.',
                ],
                [
                    'date' => 'Samedi 28 novembre',
                    'time' => '14:00–16:00',
                    'datetime' => '2026-11-28T14:00',
                    'name' => 'Atelier en famille : peindre la neige',
                    'description' => 'Dès 6 ans, avec un adulte. Gouache et papier fournis, 5.– par enfant en plus du billet. Douze places, sur inscription au 024 000 00 00.',
                ],
                [
                    'date' => 'Dimanche 6 décembre',
                    'time' => '10:00–17:00',
                    'datetime' => '2026-12-06T10:00',
                    'name' => 'Premier dimanche du mois : entrée libre',
                    'description' => 'Le musée est gratuit pour tous. Visite commentée de la collection à 11 h et à 15 h.',
                ],
                [
                    'date' => 'Jeudi 10 décembre',
                    'time' => '18:30',
                    'datetime' => '2026-12-10T18:30',
                    'name' => 'Conférence : peindre dehors en 1900',
                    'description' => 'Chevalets pliants, tubes de couleur et trains régionaux : comment les peintres sont sortis de l’atelier. Par Luc Develey, historien de l’art. Entrée libre.',
                ],
                [
                    'date' => 'Samedi 16 janvier',
                    'time' => '10:00–16:00',
                    'datetime' => '2027-01-16T10:00',
                    'name' => 'Atelier pour adultes : la pointe sèche',
                    'description' => 'Une journée pour graver une plaque et la tirer sur la presse du musée, avec la graveuse Anne Jaccard. 80.–, matériel et repas compris. Huit places.',
                ],
                [
                    'date' => 'Jeudi 11 mars',
                    'time' => '18:30',
                    'datetime' => '2027-03-11T18:30',
                    'name' => 'Vernissage : Mécaniques à musique',
                    'description' => 'Boîtes à musique et automates de Sainte-Croix, 1860–1960 : quatre-vingts pièces, dont trente remises en état de jouer. Exposition jusqu’au 29 août.',
                ],
                [
                    'date' => 'Samedi 20 mars',
                    'time' => '14:00',
                    'datetime' => '2027-03-20T14:00',
                    'name' => 'Démonstration : les automates en marche',
                    'description' => 'Le restaurateur Pierre Golay remonte et fait jouer six pièces de l’exposition. Comprise dans le billet.',
                ],
            ],
        ],
        'gallery' => [
            'title' => 'La collection, salle après salle',
            'pictures' => [
                ['image' => 'picture:La halle aux grains et ses piliers de chêne, au rez-de-chaussée', 'alt' => 'La halle aux grains et ses piliers de chêne', 'caption' => 'Rez-de-chaussée · La halle aux grains, 1786', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Émilie Paccaud, Le Suchet sous la neige, huile sur toile', 'alt' => 'Un sommet du Jura sous la neige, peint à l’huile', 'caption' => 'Salle 1 · Émilie Paccaud, Le Suchet sous la neige, 1908', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Louis Jaquier, La plaine de l’Orbe en juin, huile sur toile', 'alt' => 'La plaine de l’Orbe en été, des peupliers au bord de l’eau', 'caption' => 'Salle 1 · Louis Jaquier, La plaine de l’Orbe en juin, 1894', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Henri Golay, Le lac de Joux gelé, huile sur carton', 'alt' => 'Le lac de Joux pris par la glace, deux patineurs au loin', 'caption' => 'Salle 1 · Henri Golay, Le lac de Joux gelé, 1911', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Émilie Paccaud, Autoportrait à la fenêtre, huile sur toile', 'alt' => 'La peintre à sa fenêtre, la palette à la main', 'caption' => 'Salle 2 · Émilie Paccaud, Autoportrait à la fenêtre, 1902', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’atelier d’Émilie Paccaud remonté avec son chevalet et sa boîte de couleurs', 'alt' => 'Un chevalet, une boîte de couleurs et un tabouret devant une verrière', 'caption' => 'Salle 2 · L’atelier de la peintre, tel qu’elle l’a laissé en 1949', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Marguerite Besson, Les gorges de l’Orbe, eau-forte', 'alt' => 'Une eau-forte des gorges de l’Orbe', 'caption' => 'Salle 3 · Marguerite Besson, Les gorges de l’Orbe, eau-forte, 1923', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un carnet de croquis de Louis Jaquier ouvert sous vitrine', 'alt' => 'Un carnet ouvert sur une aquarelle de montagne', 'caption' => 'Salle 3 · Carnet de Louis Jaquier, crayon et aquarelle, 1887', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une boîte à musique à cylindre, le couvercle ouvert', 'alt' => 'Une boîte à musique à cylindre en noyer', 'caption' => 'Salle 4 · Boîte à musique à cylindre, Sainte-Croix, vers 1880', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:L’automate de l’oiseau chanteur dans sa cage dorée', 'alt' => 'Un oiseau mécanique dans une cage dorée', 'caption' => 'Salle 4 · Automate « L’oiseau chanteur », Sainte-Croix, 1895', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des poteries vernissées du Nord vaudois sur une étagère', 'alt' => 'Des pots et des plats vernissés bruns et verts', 'caption' => 'Salle 5 · Poteries d’usage du Nord vaudois, XIXe siècle', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La charpente de 1786 au-dessus de la dernière salle', 'alt' => 'Une charpente en chêne au-dessus d’une salle d’exposition', 'caption' => 'Salle 6 · Sous la charpente de 1786, les grands formats', 'width' => 1200, 'height' => 900],
            ],
        ],
        'pricing' => [
            'title' => 'Tarifs',
            'intro' => 'Le billet donne accès à l’exposition temporaire et à la collection, pour la journée entière.',
            'note' => 'Billets à l’accueil, sans réservation. Entrée libre jusqu’à 6 ans, et pour tous le premier dimanche du mois. Carte, TWINT ou espèces.',
            'plans' => [
                [
                    'name' => 'Plein tarif',
                    'price' => '12.–',
                    'period' => 'par personne',
                    'line' => 'Adultes dès 17 ans',
                    'includes' => ['Exposition temporaire', 'Collection permanente', 'Audioguide sur votre téléphone'],
                ],
                [
                    'name' => 'Tarif réduit',
                    'price' => '8.–',
                    'period' => 'par personne',
                    'line' => 'AVS, AI, étudiants, apprentis, jeunes de 6 à 16 ans',
                    'includes' => ['Exposition temporaire', 'Collection permanente', 'Audioguide sur votre téléphone'],
                ],
                [
                    'name' => 'Familles',
                    'price' => '28.–',
                    'period' => 'par famille',
                    'line' => 'Deux adultes et jusqu’à trois enfants de 6 à 16 ans',
                    'includes' => ['Exposition temporaire', 'Collection permanente', 'Audioguide sur votre téléphone', 'Carnet de visite pour les enfants'],
                ],
                [
                    'name' => 'Pass annuel',
                    'price' => '40.–',
                    'period' => 'par an',
                    'line' => 'Toutes les expositions pendant douze mois',
                    'includes' => ['Exposition temporaire', 'Collection permanente', 'Audioguide sur votre téléphone', 'Invitation aux vernissages'],
                    'featured' => true,
                    'flag' => 'Amorti dès la quatrième visite',
                    'href' => 'mailto:accueil@musee-paccaud.example',
                    'label' => 'Commander le pass par e-mail',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Avant de venir',
            'entries' => [
                [
                    'question' => 'Le musée est-il accessible en fauteuil roulant et avec une poussette ?',
                    'answer' => 'Oui. L’entrée sous les arcades est de plain-pied et un ascenseur dessert les deux étages. Deux fauteuils roulants et des sièges pliants se prêtent à l’accueil.',
                ],
                [
                    'question' => 'Où se garer, et comment venir en train ?',
                    'answer' => 'Le parking de la Grande-Rue est à deux minutes à pied, gratuit la première heure. La gare d’Orbe est à six minutes : le train régional de Chavornay arrive toutes les demi-heures.',
                ],
                [
                    'question' => 'Peut-on prendre des photographies ?',
                    'answer' => 'Oui, sans flash ni trépied, pour votre usage personnel. Quelques œuvres prêtées portent un pictogramme : celles-là ne se photographient pas.',
                ],
                [
                    'question' => 'Où laisser les sacs et les manteaux ?',
                    'answer' => 'Le vestiaire à côté de l’accueil est gratuit, avec des casiers à clé pour les sacs à dos et les casques. Les parapluies et les sacs de plus de 40 cm y restent pendant la visite.',
                ],
                [
                    'question' => 'Comment venir avec une classe ?',
                    'answer' => 'Les classes entrent gratuitement du mardi au vendredi dès 9 h, sur réservation deux semaines à l’avance au 024 000 00 00. Une visite avec un médiateur dure une heure et coûte 60.– par classe, vingt-quatre élèves au plus.',
                ],
                [
                    'question' => 'Proposez-vous des visites pour les groupes ?',
                    'answer' => 'Oui, pour dix à vingt personnes, en français, en allemand ou en anglais : 90.– en plus des billets au tarif réduit. Écrivez à accueil@musee-paccaud.example trois semaines avant.',
                ],
                [
                    'question' => 'Peut-on boire ou manger sur place ?',
                    'answer' => 'Le café du musée, au rez-de-chaussée, sert boissons, soupes et tartes de 10 h à 16 h 30, sans billet d’entrée. On ne mange ni ne boit dans les salles.',
                ],
            ],
        ],
        'map' => [
            'address' => 'Place du Marché 3, 1350 Orbe',
            'title' => 'Musée Paccaud, entrée sous les arcades',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Musée d’art · Orbe',
                'title' => 'Les peintres du Jura, dans la halle aux grains',
                'lead' => 'Mille deux cents œuvres léguées, données ou achetées depuis 1952 : les paysages du pied du Jura, des estampes et un cabinet de mécaniques à musique. En ce moment, « Lumières du Jura ».',
                'subject' => 'Émilie Paccaud, Le Suchet sous la neige, 1908, seul sur un mur de la salle 1',
                'note' => '« Lumières du Jura », jusqu’au dimanche 28 février',
                'links' => [['label' => 'Préparer sa visite', 'to' => '/visit'], ['label' => 'L’exposition en cours', 'to' => '/exhibitions']],
                'facts' => [['value' => '1 200', 'label' => 'Œuvres dans la collection'], ['value' => '6', 'label' => 'Salles sur deux étages'], ['value' => '1786', 'label' => 'La halle aux grains']],
            ],
            'features' => [
                'eyebrow' => 'Au musée',
                'title' => 'Trois raisons de pousser la porte',
                'lead' => 'Une exposition qui change deux fois par an, une collection qui reste, et une maison où l’on entre sans réserver.',
                'items' => [
                    ['title' => 'L’exposition', 'body' => 'Jusqu’au 28 février, soixante-quatre paysages peints entre 1880 et 1930, dont vingt jamais sortis des familles.', 'subject' => 'Une salle de l’exposition, les toiles sur un mur gris clair', 'to' => '/exhibitions', 'label' => 'Expositions et rendez-vous'],
                    ['title' => 'La collection', 'body' => 'Six salles : les toiles d’Émilie Paccaud, le cabinet des estampes et les boîtes à musique de Sainte-Croix.', 'subject' => 'Une boîte à musique à cylindre ouverte sous sa vitrine', 'to' => '/collection', 'label' => 'La collection, salle après salle'],
                    ['title' => 'La visite', 'body' => 'Du mardi au dimanche, le jeudi jusqu’à 20 h. De plain-pied, avec ascenseur, à six minutes de la gare.', 'subject' => 'L’entrée du musée sous les arcades de la Place du Marché', 'to' => '/visit', 'label' => 'Horaires, tarifs et accès'],
                ],
            ],
        ],
        '/exhibitions' => [
            'label' => 'Expositions',
            'hero' => [
                'eyebrow' => 'Expositions et rendez-vous',
                'title' => 'Lumières du Jura, jusqu’au 28 février',
                'lead' => 'Soixante-quatre paysages peints entre 1880 et 1930 par sept peintres du pied du Jura. Autour d’eux, des visites commentées, des ateliers et une conférence.',
                'subject' => 'Henri Golay, Le lac de Joux gelé, 1911, dans la première salle de l’exposition',
                'links' => [['label' => 'Préparer sa visite', 'to' => '/visit'], ['label' => 'Voir la collection', 'to' => '/collection']],
            ],
            'story' => [
                'eyebrow' => 'L’exposition en cours',
                'title' => 'Sept peintres, une ligne de crêtes',
                'lead' => 'Entre 1880 et 1930, on a beaucoup peint le Jura depuis la plaine, et presque jamais depuis les sommets.',
                'body' => [
                    'L’exposition part d’une remarque de la conservatrice, Hélène Rochat : presque toutes les toiles de la collection regardent le Jura d’en bas. Le Suchet, le Chasseron et la dent de Vaulion y ferment l’horizon comme un mur, et c’est la lumière sur ce mur que les peintres sont allés chercher, à toutes les heures et en toute saison.',
                    'Sept d’entre eux sont réunis ici, d’Émilie Paccaud à Henri Golay. Quarante-quatre œuvres viennent des réserves du musée ; vingt ont été prêtées par des familles d’Orbe, de Vallorbe et du Sentier, qui les avaient au salon depuis trois générations et ne les avaient jamais montrées.',
                    'L’accrochage suit une journée plutôt qu’une chronologie : les matins de brouillard dans la première salle, les neiges de midi dans la deuxième, les soirs d’été dans la dernière. Les carnets de croquis sont ouverts sous vitrine, à la page du tableau qu’ils préparent.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Autour de l’exposition',
                'title' => 'Trois façons de la voir',
                'items' => [
                    ['title' => 'Avec la conservatrice', 'body' => 'Le troisième jeudi du mois à 18 h 30, Hélène Rochat commente l’accrochage pendant une heure. Compris dans le billet.', 'subject' => 'Un groupe de visiteurs devant une toile, la conservatrice de dos'],
                    ['title' => 'En famille', 'body' => 'Un carnet de visite gratuit pour les 6 à 12 ans, et un atelier de peinture un samedi par mois.', 'subject' => 'Des enfants peignant à la gouache sur une grande table'],
                    ['title' => 'À son rythme', 'body' => 'L’audioguide s’écoute sur votre téléphone, en français, en allemand et en anglais : vingt œuvres, quarante minutes.', 'subject' => 'Une visiteuse, écouteurs aux oreilles, devant un paysage d’hiver'],
                ],
            ],
        ],
        '/collection' => [
            'label' => 'Collection',
            'hero' => [
                'eyebrow' => 'La collection',
                'title' => 'Mille deux cents œuvres, six salles',
                'lead' => 'Le legs d’Émilie Paccaud en 1949, puis soixante-dix ans de dons et d’achats : la peinture du pied du Jura, les estampes et les mécaniques à musique de Sainte-Croix.',
                'subject' => 'La salle 1, les paysages accrochés sur deux rangs',
                'links' => [['label' => 'Préparer sa visite', 'to' => '/visit'], ['label' => 'L’exposition en cours', 'to' => '/exhibitions']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1952',
                'title' => 'Un legs, puis une ville qui a continué',
                'lead' => 'Le musée est né de cent quarante toiles et d’une phrase dans un testament.',
                'body' => [
                    'Émilie Paccaud a peint Orbe et ses environs pendant cinquante ans, sans presque jamais vendre. À sa mort, en 1949, elle laisse à la commune son atelier, cent quarante toiles et une condition : qu’elles soient montrées « là où les gens passent ». La commune choisit l’ancienne halle aux grains, vide depuis la guerre, et le musée ouvre en 1952.',
                    'La collection a grandi autour de ce noyau. Les familles ont donné ce qu’elles avaient des autres peintres de la région ; la fondation achète chaque année une ou deux œuvres, toujours liées au pied du Jura. Les mécaniques à musique sont arrivées en 1987, quand un atelier de Sainte-Croix a fermé et confié ses pièces au musée plutôt que de les disperser.',
                    'Tout n’est pas accroché : un cinquième de la collection est montré à la fois, et les salles changent. Les estampes tournent tous les quatre mois, parce que le papier craint la lumière ; les toiles reviennent des réserves au gré des expositions. Si vous cherchez une œuvre précise, écrivez-nous avant de venir.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois ensembles',
                'title' => 'Ce que la collection réunit',
                'items' => [
                    ['title' => 'Peinture, 1850–1950', 'body' => 'Quatre cent vingt toiles et panneaux : Paccaud, Jaquier, Golay et ceux qui ont travaillé entre Orbe et la vallée de Joux.', 'subject' => 'Louis Jaquier, La plaine de l’Orbe en juin, 1894'],
                    ['title' => 'Estampes et dessins', 'body' => 'Sept cents feuilles gardées à l’abri de la lumière ; une quarantaine sont montrées par roulement, changées tous les quatre mois.', 'subject' => 'Un tiroir du cabinet des estampes ouvert sur une eau-forte'],
                    ['title' => 'Mécaniques à musique', 'body' => 'Soixante boîtes à musique et automates fabriqués à Sainte-Croix entre 1860 et 1960, dont trente jouent encore.', 'subject' => 'Le mécanisme d’un automate vu de près, le cylindre et son peigne'],
                ],
            ],
        ],
        '/visit' => [
            'label' => 'Visite',
            'hero' => [
                'eyebrow' => 'Préparer sa visite',
                'title' => 'Horaires, tarifs et accès',
                'lead' => 'Ouvert du mardi au dimanche de 10 h à 17 h, le jeudi jusqu’à 20 h. Le billet se prend à l’accueil, sans réservation ; les classes et les groupes s’annoncent.',
                'subject' => 'L’accueil du musée, le comptoir en chêne et le vestiaire',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Écrire à l’accueil', 'href' => 'mailto:accueil@musee-paccaud.example']],
            ],
            'story' => [
                'eyebrow' => 'Sur place',
                'title' => 'Une halle de 1786, de plain-pied',
                'lead' => 'On entre sous les arcades de la Place du Marché, là où l’on pesait le grain.',
                'body' => [
                    'La grenette a été bâtie en 1786 pour abriter le marché aux grains : une halle ouverte au rez-de-chaussée, deux étages de greniers au-dessus. Les piliers de chêne et la charpente sont d’origine. La rénovation de 2014 a ajouté un ascenseur et supprimé les seuils, si bien que l’on circule partout en fauteuil roulant ou avec une poussette.',
                    'Comptez une heure pour l’exposition, au rez-de-chaussée, et une heure pour la collection, dans les étages. Le billet vaut pour la journée : on peut sortir déjeuner en ville et revenir. Le jeudi soir, le musée reste ouvert jusqu’à 20 h et les salles sont plus calmes qu’un dimanche après-midi.',
                    'Le café et la boutique sont au rez-de-chaussée, en accès libre. Les classes sont reçues du mardi au vendredi dès 9 h, avant l’ouverture au public ; les groupes de plus de dix personnes s’annoncent trois semaines à l’avance.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Trois services au rez-de-chaussée',
                'items' => [
                    ['title' => 'Vestiaire', 'body' => 'Gratuit, avec des casiers à clé pour les sacs à dos et les casques.', 'subject' => 'Les casiers en bois du vestiaire, à côté de l’accueil'],
                    ['title' => 'Café du musée', 'body' => 'Boissons, soupes et tartes de 10 h à 16 h 30, sans billet d’entrée.', 'subject' => 'Trois tables du café entre les piliers de la halle'],
                    ['title' => 'Boutique', 'body' => 'Catalogues des expositions, cartes postales et affiches tirées de la collection.', 'subject' => 'La table de la boutique, catalogues et cartes postales'],
                ],
            ],
        ],
    ],
];
