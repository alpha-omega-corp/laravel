<?php

declare(strict_types=1);

/*
 * The demo content of a salon: a fictional six-person hairdresser, barber and
 * nail table near the station in Fribourg. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its owner
 * keeps in the admin, in each component's own prop names — and `pages` holds
 * each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/salon.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Atelier Colette',
        'blurb' => 'Coiffure, barbier et ongles au centre de Fribourg, sur rendez-vous du mardi au samedi.',
        'address' => 'Rue de Romont 17, 1700 Fribourg',
        'phone' => '026 000 00 00',
        'email' => 'bonjour@atelier-colette.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Atelier Colette Sàrl · Prix en francs, TVA comprise',
        'action' => ['label' => 'Prendre rendez-vous', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Rendez-vous',
            'title' => 'Une place cette semaine ?',
            'lead' => 'Du mardi au samedi, et le jeudi jusqu’à 20 h. Dites-nous la prestation et le jour qui vous arrange : nous confirmons dans la journée.',
            'links' => [['label' => 'Prendre rendez-vous', 'to' => '/book'], ['label' => 'Voir les tarifs', 'to' => '/services']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue de Romont 17, Fribourg'],
                ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                ['label' => 'Gare', 'value' => 'Trois minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le dimanche et le lundi. Le dernier rendez-vous couleur se prend deux heures avant la fermeture.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '09:00–18:30'],
                ['day' => 'Mercredi', 'hours' => '09:00–18:30'],
                ['day' => 'Jeudi', 'hours' => '09:00–20:00'],
                ['day' => 'Vendredi', 'hours' => '09:00–18:30'],
                ['day' => 'Samedi', 'hours' => '08:00–16:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'map' => [
            'address' => 'Rue de Romont 17, 1700 Fribourg',
            'title' => 'Atelier Colette, la vitrine de l’ancienne mercerie',
        ],
        'menu' => [
            'title' => 'Prestations et tarifs',
            'sections' => [
                ['title' => 'Coupes', 'items' => [
                    ['name' => 'Coupe, shampoing et brushing', 'price' => '78.–', 'description' => 'Avec un mot sur l’entretien à la maison'],
                    ['name' => 'Coupe des boucles, sur cheveux secs', 'price' => '85.–', 'description' => 'Par Inès ; compter une heure'],
                    ['name' => 'Coupe courte, tondeuse et ciseaux', 'price' => '52.–'],
                    ['name' => 'Coupe enfant, jusqu’à douze ans', 'price' => '28.–'],
                    ['name' => 'Frange, entre deux coupes', 'price' => '10.–', 'description' => 'Sans rendez-vous, cinq minutes'],
                    ['name' => 'Coupe par l’apprenti', 'price' => '38.–', 'description' => 'Le mardi et le mercredi, sous l’œil de Colette'],
                ]],
                ['title' => 'Couleur', 'items' => [
                    ['name' => 'Coloration des racines', 'price' => '85.–'],
                    ['name' => 'Coloration complète', 'price' => '110.–'],
                    ['name' => 'Balayage', 'price' => 'dès 160.–', 'description' => 'Prix ferme donné au fauteuil, avant de commencer'],
                    ['name' => 'Mèches', 'price' => 'dès 130.–'],
                    ['name' => 'Patine', 'price' => '45.–', 'description' => 'Pour raviver un blond ou un cuivré entre deux couleurs'],
                    ['name' => 'Coloration végétale', 'price' => 'dès 120.–', 'description' => 'Henné et plantes, deux heures de pose'],
                ]],
                ['title' => 'Coiffage', 'items' => [
                    ['name' => 'Brushing', 'price' => '42.–'],
                    ['name' => 'Brushing, cheveux longs', 'price' => '52.–'],
                    ['name' => 'Chignon de soirée', 'price' => '95.–'],
                    ['name' => 'Coiffure de mariée', 'price' => '240.–', 'description' => 'Essai compris, six semaines avant'],
                ]],
                ['title' => 'Barbier', 'items' => [
                    ['name' => 'Coupe aux ciseaux', 'price' => '45.–'],
                    ['name' => 'Dégradé à la tondeuse', 'price' => '38.–'],
                    ['name' => 'Taille de barbe', 'price' => '25.–'],
                    ['name' => 'Rasage au coupe-chou', 'price' => '38.–', 'description' => 'Serviette chaude, vingt minutes'],
                    ['name' => 'Coupe et barbe', 'price' => '62.–'],
                ]],
                ['title' => 'Soins', 'items' => [
                    ['name' => 'Soin profond', 'price' => '30.–', 'description' => 'Vingt minutes sous la vapeur'],
                    ['name' => 'Lissage à la kératine', 'price' => 'dès 220.–'],
                    ['name' => 'Massage du cuir chevelu', 'price' => '15.–', 'description' => 'Dix minutes au bac, avec n’importe quelle prestation'],
                ]],
                ['title' => 'Ongles', 'items' => [
                    ['name' => 'Manucure', 'price' => '45.–'],
                    ['name' => 'Vernis semi-permanent', 'price' => '55.–', 'description' => 'Tient trois semaines'],
                    ['name' => 'Dépose', 'price' => '15.–', 'description' => 'Offerte si vous refaites une pose'],
                    ['name' => 'Beauté des pieds', 'price' => '68.–'],
                ]],
            ],
        ],
        'team' => [
            'title' => 'Celles et ceux qui vous coiffent',
            'members' => [
                ['name' => 'Colette Aeby', 'role' => 'Fondatrice, coloriste', 'bio' => 'Vingt-deux ans de métier, dont quinze ici. Elle fait les blonds, les balayages et tous les conseils couleur du jeudi soir.'],
                ['name' => 'Inès Carvalho', 'role' => 'Coiffeuse, coupes et boucles', 'bio' => 'Formée à Lisbonne puis à Genève, elle coupe les boucles à sec, mèche par mèche, et ne sort jamais le lisseur sans le demander.'],
                ['name' => 'Marc Rossier', 'role' => 'Barbier', 'bio' => 'Au fauteuil du fond depuis 2014. Ciseaux, tondeuse, coupe-chou : une demi-heure pour une coupe, trois quarts d’heure avec la barbe.'],
                ['name' => 'Léa Brülhart', 'role' => 'Coiffeuse, chignons et mariages', 'bio' => 'Une trentaine de mariées par an, toujours avec un essai six semaines avant. Le samedi matin, elle se déplace.'],
                ['name' => 'Sandrine Dousse', 'role' => 'Styliste ongulaire', 'bio' => 'Manucure, semi-permanent et beauté des pieds, du mercredi au samedi, à la table près de la vitrine.'],
                ['name' => 'Noé Pittet', 'role' => 'Apprenti, troisième année', 'bio' => 'Il coupe le mardi et le mercredi sous l’œil de Colette, à prix réduit. Examen final en juin.'],
            ],
        ],
        'gallery' => [
            'title' => 'Réalisations',
            'pictures' => [
                ['image' => 'picture:Un balayage miel sur cheveux châtains, vu de dos', 'alt' => 'Balayage miel sur cheveux châtains, vu de dos', 'caption' => 'Balayage miel, deux séances', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un carré court blond polaire, de trois quarts', 'alt' => 'Carré court blond polaire, de trois quarts', 'caption' => 'Carré blond polaire', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un dégradé bas et une barbe taillée, de profil', 'alt' => 'Dégradé bas et barbe taillée, de profil', 'caption' => 'Dégradé bas, barbe au coupe-chou', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des boucles rousses coupées à sec', 'alt' => 'Boucles rousses coupées à sec, tombant sur les épaules', 'caption' => 'Boucles coupées à sec', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un chignon bas de mariée piqué de gypsophile', 'alt' => 'Chignon bas de mariée piqué de gypsophile', 'caption' => 'Chignon bas, mariage à Morat', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une coupe garçonne brune, la nuque dégagée', 'alt' => 'Coupe garçonne brune, la nuque dégagée', 'caption' => 'Coupe courte après dix ans de longueur', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des mains aux ongles courts, vernis rouge brique', 'alt' => 'Mains aux ongles courts, vernis rouge brique', 'caption' => 'Semi-permanent rouge brique', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un cuivré intense sur cheveux longs, à la lumière de la vitrine', 'alt' => 'Cuivré intense sur cheveux longs, à la lumière de la vitrine', 'caption' => 'Cuivré, patine tous les deux mois', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un enfant à la frange droite, sur le rehausseur', 'alt' => 'Enfant à la frange droite, assis sur le rehausseur', 'caption' => 'Première coupe, quatre ans', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un carré dégradé gris naturel', 'alt' => 'Carré dégradé gris naturel, de face', 'caption' => 'Passage au gris naturel, en trois coupes', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une tresse en couronne piquée de fleurs', 'alt' => 'Tresse en couronne piquée de fleurs, vue de dos', 'caption' => 'Tresse couronne, demoiselle d’honneur', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une coupe d’homme aux ciseaux, la raie sur le côté', 'alt' => 'Coupe d’homme aux ciseaux, la raie sur le côté', 'caption' => 'Coupe aux ciseaux, raie classique', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander un rendez-vous',
            'intro' => 'Dites-nous la prestation, le jour qui vous arrange et, si vous en avez une, la personne que vous préférez : nous confirmons par téléphone ou par e-mail dans la journée.',
            'action' => '#booking',
            'services' => [
                'Coupe et brushing',
                'Coupe homme',
                'Coupe enfant',
                'Couleur ou balayage',
                'Conseil couleur, un quart d’heure offert',
                'Brushing ou chignon',
                'Barbe ou rasage',
                'Coiffure de mariée',
                'Ongles',
            ],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Coiffure · Barbier · Ongles · Fribourg',
                'title' => 'On vous écoute d’abord, on coupe ensuite',
                'lead' => 'Six paires de mains, cinq fauteuils et un quart d’heure de conseil avant chaque couleur. À trois minutes de la gare, du mardi au samedi.',
                'subject' => 'Le salon le matin, les cinq fauteuils face aux miroirs dans la lumière de la vitrine',
                'note' => 'Encore trois places ce jeudi, en nocturne',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/book'], ['label' => 'Voir les tarifs', 'to' => '/services']],
                'facts' => [['value' => '6', 'label' => 'Personnes au fauteuil'], ['value' => '2009', 'label' => 'Ouvert rue de Romont'], ['value' => '20 h', 'label' => 'Le jeudi, en nocturne']],
            ],
            'features' => [
                'eyebrow' => 'Le salon',
                'title' => 'Ce pour quoi on pousse la porte',
                'lead' => 'Une couleur qui tient, une barbe nette, et quelqu’un qui se souvient de ce qu’on a fait la dernière fois.',
                'items' => [
                    ['title' => 'La couleur', 'body' => 'Balayages, blonds et patines. Chaque couleur commence par un quart d’heure de conseil, offert, et par un prix ferme.', 'subject' => 'Un balayage miel vu de dos, à la lumière du jour', 'to' => '/portfolio', 'label' => 'Voir les réalisations'],
                    ['title' => 'Le fauteuil du barbier', 'body' => 'Ciseaux, dégradé, coupe-chou et serviette chaude : Marc tient le fauteuil du fond depuis 2014.', 'subject' => 'Le fauteuil de barbier en cuir, le blaireau et le coupe-chou sur la tablette', 'to' => '/services', 'label' => 'Les tarifs du barbier'],
                    ['title' => 'Celles et ceux qui coupent', 'body' => 'Vous choisissez qui vous coiffe, et vous retrouvez la même personne la fois suivante.', 'subject' => 'L’équipe au complet devant la vitrine, en tablier noir', 'to' => '/team', 'label' => 'Rencontrer l’équipe'],
                ],
            ],
        ],
        '/services' => [
            'label' => 'Tarifs',
            'hero' => [
                'eyebrow' => 'Prestations et tarifs',
                'title' => 'Ce que nous faisons, et ce que cela coûte',
                'lead' => 'Les prix sont ceux que vous payez à la caisse, shampoing et coiffage compris. Pour une couleur, le prix ferme se donne au fauteuil, avant de commencer.',
                'subject' => 'Des ciseaux, un peigne et un bol de couleur sur le plan de travail',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Avant de réserver',
                'items' => [
                    ['title' => 'Le conseil couleur', 'body' => 'Un quart d’heure, offert et sans engagement : on regarde vos cheveux, on parle du résultat et on vous donne un prix ferme.', 'icon' => 'message-circle'],
                    ['title' => 'La touche d’essai', 'body' => 'Pour une première coloration chez nous, elle se pose quarante-huit heures avant. Cinq minutes, sans rendez-vous.', 'icon' => 'droplet'],
                    ['title' => 'Cheveux longs ou épais', 'body' => 'Au-delà des épaules, comptez 15.– de plus sur les couleurs : le supplément est annoncé avant, jamais à la caisse.', 'icon' => 'ruler'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment nous comptons',
                'title' => 'Un prix dit avant, tenu après',
                'lead' => 'Personne n’aime découvrir le total à la caisse : ici il est annoncé au fauteuil, avant le premier coup de ciseaux.',
                'body' => [
                    'Les prix de cette page comprennent le shampoing, la coupe ou la couleur, et le coiffage. Ils sont les mêmes quelle que soit la personne qui vous coiffe, sauf pour Noé, notre apprenti, dont les coupes sont à 38.– le mardi et le mercredi.',
                    'Une couleur ne se chiffre pas sur une photo. Avant un balayage ou un changement de teinte, nous prenons un quart d’heure pour regarder vos cheveux, leur longueur et ce qu’ils ont déjà reçu, puis nous vous donnons un prix ferme. Si le travail prend plus de temps que prévu, c’est notre affaire, pas la vôtre.',
                    'Les produits que nous utilisons au bac sont en vente au comptoir, sans obligation : nous vous disons lequel a servi, et vous faites ce que vous voulez de l’information.',
                ],
            ],
        ],
        '/team' => [
            'label' => 'L’équipe',
            'hero' => [
                'eyebrow' => 'L’équipe',
                'title' => 'Six personnes, et chacune sa main',
                'lead' => 'Vous choisissez qui vous coiffe, et vous retrouvez la même personne la fois suivante. Voici qui fait quoi.',
                'subject' => 'Les six de l’équipe devant la vitrine, en tablier noir',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/book']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2009',
                'title' => 'Un salon qui forme les siens',
                'lead' => 'Six personnes, trois métiers et, chaque année, un apprenti ou une apprentie.',
                'body' => [
                    'Colette Aeby a ouvert le salon en 2009 avec deux fauteuils et un bac, dans l’ancienne mercerie de la rue de Romont. Les tiroirs à boutons sont toujours là : ils rangent aujourd’hui les pinceaux et les papiers à mèches.',
                    'Marc est arrivé en 2014 avec son fauteuil de barbier, racheté à un confrère de Bulle qui prenait sa retraite. Inès et Léa ont suivi, puis Sandrine et sa table à ongles en 2021. Le salon forme une personne à la fois, trois ans durant ; Noé est le cinquième.',
                    'Nous fermons deux lundis par an pour nous former ensemble : une journée couleur au printemps, une journée coupe en automne. Le reste du temps, on apprend en se regardant travailler, et c’est pour cela que les fauteuils sont côte à côte.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Au salon',
                'title' => 'Trois coins, trois métiers',
                'items' => [
                    ['title' => 'Les fauteuils de coupe', 'body' => 'Cinq fauteuils face à la vitrine, pour couper à la lumière du jour. Colette, Inès, Léa et Noé s’y relaient.', 'subject' => 'Cinq fauteuils alignés devant les miroirs, la rue dans la vitrine'],
                    ['title' => 'Le fauteuil du barbier', 'body' => 'Au fond, un fauteuil de 1962 en cuir et en chrome, avec son repose-pieds. Marc n’en veut pas d’autre.', 'subject' => 'Un fauteuil de barbier ancien en cuir brun, vu de côté'],
                    ['title' => 'La table à ongles', 'body' => 'Près de la vitrine, parce qu’une teinte se choisit à la lumière du jour. Sandrine y reçoit du mercredi au samedi.', 'subject' => 'Une table de manucure, les flacons de vernis rangés par teinte'],
                ],
            ],
        ],
        '/portfolio' => [
            'label' => 'Réalisations',
            'hero' => [
                'eyebrow' => 'Réalisations',
                'title' => 'Le travail, photographié à la lumière du jour',
                'lead' => 'Ni retouche ni filtre : chaque photo est prise devant la vitrine, le jour même, avec l’accord de la personne.',
                'subject' => 'Un carré blond polaire photographié de trois quarts devant la vitrine',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/book'], ['label' => 'Voir les tarifs', 'to' => '/services']],
            ],
            'story' => [
                'eyebrow' => 'Comment lire ces photos',
                'title' => 'Sans filtre, devant la vitrine',
                'lead' => 'Une photo de coiffure ment facilement. Voici les règles que nous nous donnons pour que celles-ci disent vrai.',
                'body' => [
                    'Toutes les photos sont prises au même endroit, devant la vitrine, le jour même du rendez-vous. Aucune n’est retouchée : un blond photographié sous un spot n’est pas le blond que vous verrez dans la rue.',
                    'Sous chaque image, nous écrivons ce qui a été fait et, quand cela compte, en combien de séances. Passer du brun au miel sans abîmer le cheveu demande deux rendez-vous à six semaines d’intervalle ; mieux vaut le savoir avant.',
                    'Personne n’apparaît ici sans l’avoir accepté, et une photo est retirée le jour où on nous le demande. Si une réalisation vous plaît, montrez-la au conseil : c’est le meilleur point de départ, à condition d’admettre que vos cheveux ne sont pas ceux de la photo.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Avant, après',
                'title' => 'Trois histoires de fauteuil',
                'items' => [
                    ['title' => 'Du brun au miel', 'body' => 'Deux séances à six semaines d’écart, une patine entre les deux. Colette a éclairci par voiles, sans toucher aux racines.', 'subject' => 'Les mêmes cheveux longs avant et après, bruns puis miel', 'to' => '/services', 'label' => 'Le prix d’un balayage'],
                    ['title' => 'Dix ans de longueur en moins', 'body' => 'Quarante centimètres coupés d’un coup et donnés pour une perruque. Inès a mis une heure à trouver la bonne nuque.', 'subject' => 'Une tresse coupée posée sur la tablette, la coupe courte dans le miroir'],
                    ['title' => 'Une barbe remise en ligne', 'body' => 'Trois mois de pousse, puis vingt minutes de coupe-chou. Marc dessine le contour au peigne, et ne rase qu’ensuite.', 'subject' => 'Un profil d’homme, la barbe nette, la serviette chaude sur l’épaule', 'to' => '/team', 'label' => 'Le barbier et les autres'],
                ],
            ],
        ],
        '/book' => [
            'label' => 'Rendez-vous',
            'hero' => [
                'eyebrow' => 'Rendez-vous',
                'title' => 'Dites-nous quand, on s’occupe du reste',
                'lead' => 'Une demande en ligne, confirmée par téléphone ou par e-mail dans la journée. Pour aujourd’hui même, appelez.',
                'subject' => 'Le carnet de rendez-vous ouvert sur le comptoir, un crayon posé dessus',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Voir les tarifs', 'to' => '/services']],
            ],
            'features' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'De la demande au fauteuil',
                'items' => [
                    ['title' => 'Vous demandez', 'body' => 'La prestation, un jour, un moment de la journée. Deux minutes, sans compte à créer.', 'icon' => 'send'],
                    ['title' => 'Nous confirmons', 'body' => 'Par téléphone ou par e-mail, dans la journée, avec l’heure exacte et le nom de la personne qui vous coiffera.', 'icon' => 'phone-call'],
                    ['title' => 'Vous venez', 'body' => 'Cinq minutes avant, les cheveux comme ils sont d’habitude : c’est ainsi qu’on les coupe le mieux.', 'icon' => 'door-open'],
                ],
            ],
            'story' => [
                'eyebrow' => 'À savoir',
                'title' => 'Déplacer, annuler, venir à plusieurs',
                'body' => [
                    'Un empêchement arrive à tout le monde. Prévenez-nous la veille avant 17 h et le rendez-vous se déplace sans frais ; passé ce délai, nous facturons la moitié de la prestation, parce que le fauteuil est resté vide.',
                    'Pour une première couleur chez nous, passez quarante-huit heures avant : la touche d’essai prend cinq minutes et ne demande pas de rendez-vous. Sans elle nous ne colorons pas, même si vous n’avez jamais réagi ailleurs.',
                    'Mariages, témoins et familles : à partir de trois personnes le même jour, écrivez-le dans le message. Léa bloque la matinée et, le samedi, se déplace dans un rayon de vingt kilomètres autour de Fribourg.',
                ],
            ],
        ],
    ],
];
