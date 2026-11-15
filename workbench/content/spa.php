<?php

declare(strict_types=1);

/*
 * The demo content of a spa: fictional baths in a former sawmill at Les
 * Diablerets, on the Grande Eau, with a pool under the old roof, a bath
 * outdoors facing the massif, two saunas, a hammam and five treatment cabins.
 * `site` is what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's own
 * prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/spa.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Bains de l’Arolle',
        'blurb' => 'Des bains chauds dans une ancienne scierie, au bord de la Grande Eau, face au massif des Diablerets.',
        'address' => 'Chemin de la Scie 6, 1865 Les Diablerets',
        'phone' => '024 000 00 00',
        'email' => 'bonjour@bains-arolle.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 21 h',
        'note' => '© Bains de l’Arolle Sàrl',
        'action' => ['label' => 'Réserver un soin', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Venir',
            'title' => 'Un créneau samedi ?',
            'lead' => 'L’entrée aux bains se prend sur place, sans réserver. Les soins se réservent jusqu’à la veille ; le jour même, appelez.',
            'links' => [['label' => 'Réserver un soin', 'to' => '/book'], ['label' => 'Voir les entrées', 'to' => '/passes']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Chemin de la Scie 6, Les Diablerets'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Train', 'value' => 'Gare des Diablerets, huit minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Heures calmes, sans enfants : mardi et jeudi jusqu’à 13 h. Sauna et hammam réservés aux femmes le mercredi dès 18 h, mixtes le reste de la semaine.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '10:00–21:00'],
                ['day' => 'Mercredi', 'hours' => '10:00–21:00'],
                ['day' => 'Jeudi', 'hours' => '10:00–21:00'],
                ['day' => 'Vendredi', 'hours' => '10:00–22:30'],
                ['day' => 'Samedi', 'hours' => '09:00–22:30'],
                ['day' => 'Dimanche', 'hours' => '09:00–19:00'],
            ],
        ],
        'menu' => [
            'title' => 'Les soins',
            'sections' => [
                ['title' => 'Massages', 'items' => [
                    ['name' => 'Massage de l’Arolle, huile tiède · 50 min', 'price' => '125.–', 'description' => 'Le massage de la maison : lent, appuyé, tout le corps.'],
                    ['name' => 'Massage profond du dos et de la nuque · 25 min', 'price' => '70.–', 'description' => 'Pour qui descend des pistes ou d’un bureau.'],
                    ['name' => 'Pierres chaudes de la Grande Eau · 75 min', 'price' => '165.–', 'description' => 'Des galets du torrent chauffés à 50°, posés puis massés.'],
                    ['name' => 'Massage sportif des jambes · 40 min', 'price' => '98.–', 'description' => 'Après la marche ou le ski, avec un baume à l’arnica.'],
                    ['name' => 'Massage prénatal, sur le côté · 50 min', 'price' => '125.–', 'description' => 'Dès le quatrième mois de grossesse.'],
                ]],
                ['title' => 'Soins du visage', 'items' => [
                    ['name' => 'Soin aux plantes d’alpage · 50 min', 'price' => '115.–', 'description' => 'Nettoyage, gommage doux, masque à l’edelweiss.'],
                    ['name' => 'Soin éclat · 25 min', 'price' => '65.–', 'description' => 'Avant une soirée, ou entre deux bains.'],
                    ['name' => 'Visage et cuir chevelu · 75 min', 'price' => '155.–'],
                ]],
                ['title' => 'Hammam et gommages', 'items' => [
                    ['name' => 'Gommage au savon noir, sur la pierre chaude · 25 min', 'price' => '68.–', 'description' => 'Après un quart d’heure de hammam, au gant de kessa.'],
                    ['name' => 'Enveloppement au foin des Ormonts · 40 min', 'price' => '95.–', 'description' => 'Du foin de montagne tiède, sous une couverture de laine.'],
                    ['name' => 'Rituel du hammam · 90 min', 'price' => '195.–', 'description' => 'Gommage, enveloppement, puis massage à l’huile.'],
                ]],
                ['title' => 'À deux', 'items' => [
                    ['name' => 'Massage en duo, cabine double · 50 min', 'price' => '250.–', 'description' => 'Prix pour deux personnes, côte à côte.'],
                    ['name' => 'Bain nordique privatif au feu de bois · 60 min', 'price' => '120.–', 'description' => 'Jusqu’à quatre personnes, tisane et linges compris.'],
                    ['name' => 'Soirée à deux · 2 h', 'price' => '340.–', 'description' => 'Bain nordique privatif, puis massage en duo. Le vendredi et le samedi dès 18 h.'],
                ]],
            ],
        ],
        'pricing' => [
            'title' => 'Les entrées',
            'intro' => 'Bassins, bains nordiques, saunas, hammam et salle de repos : tout est compris dans l’entrée, quelle que soit sa durée.',
            'note' => 'De 6 à 15 ans, demi-tarif. Les soins se paient en plus ; un soin de 50 minutes ou plus donne droit à deux heures de bains.',
            'plans' => [
                [
                    'name' => 'Deux heures',
                    'price' => 'CHF 29',
                    'period' => 'par personne',
                    'line' => 'Un bain après le ski ou la marche.',
                    'includes' => ['Tous les bassins, les saunas et le hammam', 'Linge de bain et casier', 'Tisane à la salle de repos'],
                    'href' => 'mailto:bonjour@bains-arolle.example',
                    'label' => 'Offrir en bon cadeau',
                ],
                [
                    'name' => 'La journée',
                    'price' => 'CHF 44',
                    'period' => 'par personne',
                    'line' => 'De l’ouverture à la fermeture, avec une sortie à midi.',
                    'includes' => ['Tous les bassins, les saunas et le hammam', 'Linge de bain et casier', 'Tisane à la salle de repos', 'Peignoir prêté pour la journée'],
                    'href' => 'mailto:bonjour@bains-arolle.example',
                    'label' => 'Offrir en bon cadeau',
                    'featured' => true,
                ],
                [
                    'name' => 'Le soir',
                    'price' => 'CHF 24',
                    'period' => 'dès 18 h',
                    'line' => 'Les bains éclairés, jusqu’à la fermeture.',
                    'includes' => ['Tous les bassins, les saunas et le hammam', 'Linge de bain et casier', 'Tisane à la salle de repos'],
                    'href' => 'mailto:bonjour@bains-arolle.example',
                    'label' => 'Offrir en bon cadeau',
                ],
                [
                    'name' => 'Dix entrées',
                    'price' => 'CHF 250',
                    'period' => 'dix fois deux heures',
                    'line' => 'Valable deux ans, à partager dans la famille.',
                    'includes' => ['Tous les bassins, les saunas et le hammam', 'Linge de bain et casier', 'Tisane à la salle de repos', 'Carte sans nom, qui se prête'],
                    'href' => 'mailto:bonjour@bains-arolle.example',
                    'label' => 'Offrir en bon cadeau',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Avant de venir',
            'entries' => [
                ['question' => 'Que faut-il apporter ?', 'answer' => 'Un maillot de bain, et c’est tout. Le linge et le casier sont compris dans l’entrée ; le peignoir se loue 6.– à la caisse et les sandales s’y vendent 5.–.'],
                ['question' => 'Faut-il réserver pour les bains ?', 'answer' => 'Non : l’entrée se prend à la caisse. Nous ne laissons pas entrer plus de 90 personnes à la fois, et il arrive que l’on attende un quart d’heure le samedi entre 15 h et 18 h. Les soins, eux, se réservent.'],
                ['question' => 'Maillot ou linge, mixte ou non ?', 'answer' => 'Le maillot est de rigueur dans tous les bassins. Au sauna et au hammam, un linge suffit. Ils sont mixtes toute la semaine, sauf le mercredi dès 18 h, réservé aux femmes.'],
                ['question' => 'Les enfants sont-ils admis ?', 'answer' => 'Dès 6 ans, accompagnés d’un adulte, jusqu’à 18 h. Le sauna et le hammam sont ouverts dès 16 ans. Le mardi et le jeudi matin, les bains sont réservés aux adultes.'],
                ['question' => 'Où se garer ?', 'answer' => 'Trente places derrière la scierie, gratuites le temps de votre entrée. En saison de ski elles sont prises dès 16 h : la gare des Diablerets est à huit minutes à pied.'],
                ['question' => 'Peut-on offrir un bon cadeau ?', 'answer' => 'Oui, pour une entrée, un soin ou un montant libre. Il s’achète à la caisse ou par e-mail à bonjour@bains-arolle.example, et reste valable deux ans.'],
                ['question' => 'Puis-je venir enceinte ?', 'answer' => 'Oui pour les bassins à 34° et pour le massage prénatal dès le quatrième mois. Le sauna, le hammam et les bains nordiques à 38° sont déconseillés ; en cas de doute, appelez le 024 000 00 00.'],
            ],
        ],
        'gallery' => [
            'title' => 'Les bains, les cabines, le jardin',
            'pictures' => [
                ['image' => 'picture:Le bassin intérieur sous la charpente de la scierie', 'alt' => 'Le bassin intérieur sous la charpente de la scierie', 'caption' => 'Le bassin intérieur, 34°', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le bain extérieur fumant sous la neige, face au massif', 'alt' => 'Le bain extérieur fumant sous la neige, face au massif des Diablerets', 'caption' => 'Le bain extérieur, 36°', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Deux bains nordiques en mélèze, le feu allumé', 'alt' => 'Deux bains nordiques en mélèze dans le jardin, le feu allumé', 'caption' => 'Les bains nordiques, dès 16 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le sauna en arolle, ses bancs sur trois niveaux', 'alt' => 'Le sauna en arolle, ses bancs sur trois niveaux', 'caption' => 'Le sauna en arolle, 85°', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le hammam en pierre grise, la vapeur sous la voûte', 'alt' => 'Le hammam en pierre grise, la vapeur sous la voûte', 'caption' => 'Le hammam', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le bassin froid que remplit le bief', 'alt' => 'Le bassin froid que remplit le bief de la scierie', 'caption' => 'Le bassin froid, 12°', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La salle de repos, la cheminée et les chaises longues', 'alt' => 'La salle de repos, sa cheminée et ses chaises longues', 'caption' => 'La salle de repos', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une cabine de soins en mélèze, la table dressée', 'alt' => 'Une cabine de soins en mélèze, la table dressée', 'caption' => 'Une des cinq cabines', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La cabine double, deux tables côte à côte', 'alt' => 'La cabine double, deux tables de massage côte à côte', 'caption' => 'La cabine double', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La tisanerie et ses bocaux d’herbes séchées', 'alt' => 'La tisanerie et ses bocaux d’herbes séchées', 'caption' => 'La tisanerie', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le jardin en été, les chaises longues sous les bouleaux', 'alt' => 'Le jardin en été, les chaises longues sous les bouleaux', 'caption' => 'Le jardin, côté torrent', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La façade de l’ancienne scierie à la tombée du jour', 'alt' => 'La façade de l’ancienne scierie à la tombée du jour', 'caption' => 'La scierie, le soir', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander un créneau',
            'intro' => 'Dites-nous le soin, le jour et combien vous serez : nous confirmons l’heure par téléphone ou par e-mail dans la journée.',
            'action' => '#booking',
            'services' => [
                'Massage de l’Arolle · 50 min',
                'Massage profond du dos · 25 min',
                'Pierres chaudes · 75 min',
                'Massage sportif des jambes · 40 min',
                'Massage prénatal · 50 min',
                'Soin aux plantes d’alpage · 50 min',
                'Gommage au savon noir · 25 min',
                'Rituel du hammam · 90 min',
                'Massage en duo · 50 min',
                'Bain nordique privatif · 60 min',
                'Soirée à deux · 2 h',
            ],
        ],
        'map' => [
            'address' => 'Chemin de la Scie 6, 1865 Les Diablerets',
            'title' => 'Bains de l’Arolle, parking derrière la scierie',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Bains et soins · Les Diablerets',
                'title' => 'Des bains chauds dans une ancienne scierie',
                'lead' => 'Un bassin sous la charpente, un bain dehors face au massif, deux saunas, un hammam et cinq cabines de soins, au bord de la Grande Eau.',
                'subject' => 'Le bain extérieur fumant dans la neige, le massif des Diablerets derrière',
                'note' => 'Samedi : encore quatre créneaux de massage l’après-midi',
                'links' => [['label' => 'Réserver un soin', 'to' => '/book'], ['label' => 'Voir les entrées', 'to' => '/passes']],
                'facts' => [['value' => '36°', 'label' => 'Le bain extérieur, toute l’année'], ['value' => '5', 'label' => 'Cabines de soins'], ['value' => '90', 'label' => 'Personnes au plus dans les bains']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'L’eau, les mains, le lieu',
                'lead' => 'On vient pour deux heures ou pour la journée, avec ou sans soin.',
                'items' => [
                    ['title' => 'Les soins', 'body' => 'Massages, soins du visage et gommages au hammam, de 25 à 90 minutes, par les cinq thérapeutes de la maison.', 'subject' => 'Des mains posant des galets chauds le long d’un dos', 'to' => '/treatments', 'label' => 'La carte des soins'],
                    ['title' => 'Les entrées', 'body' => 'Deux heures, la journée ou le soir dès 18 h : le linge, le casier et la tisane sont compris.', 'subject' => 'Des linges pliés et des bracelets de casier sur le comptoir', 'to' => '/passes', 'label' => 'Les entrées et leurs prix'],
                    ['title' => 'Le lieu', 'body' => 'Une scierie de 1894, sa charpente, son bief, et un jardin qui descend jusqu’au torrent.', 'subject' => 'La charpente de la scierie au-dessus du bassin', 'to' => '/place', 'label' => 'Visiter les bains'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2015',
                'title' => 'Une scierie, un torrent, de l’eau à 36°',
                'lead' => 'Les Favrod ont mis trois hivers à faire d’un atelier à l’abandon des bains où l’on parle bas.',
                'body' => [
                    'La scie du Plan a débité le mélèze et l’arolle de la vallée des Ormonts de 1894 à 1987. Quand Line et Mathieu Favrod l’ont rachetée en 2012, il en restait la charpente, le bief et une roue qui ne tournait plus.',
                    'Mathieu est charpentier : il a gardé chaque poutre et construit le sauna avec l’arolle qui donne son nom à la maison. Line est masseuse : elle a dessiné les cabines pour que l’on y entende le torrent, et rien d’autre.',
                    'Nous sommes onze aujourd’hui. L’eau est chauffée au bois de la vallée, les bains n’accueillent jamais plus de quatre-vingt-dix personnes, et le lundi nous vidons, brossons et remplissons.',
                ],
            ],
        ],
        '/treatments' => [
            'label' => 'Soins',
            'hero' => [
                'eyebrow' => 'Les soins',
                'title' => 'Massages, visage, hammam : la carte des soins',
                'lead' => 'Quatorze soins de 25 à 90 minutes. Un soin de 50 minutes ou plus donne droit à deux heures de bains, avant ou après.',
                'subject' => 'Une cabine de soins, la table dressée, la fenêtre sur le torrent',
                'links' => [['label' => 'Réserver un soin', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Avant un soin',
                'items' => [
                    ['title' => 'Un quart d’heure avant', 'body' => 'Venez quinze minutes plus tôt, le temps de vous changer et de boire une tisane. Un soin commencé en retard finit à l’heure.', 'icon' => 'clock'],
                    ['title' => 'Annuler', 'body' => 'Sans frais jusqu’à la veille à midi. Passé ce délai le soin est dû, sauf si nous replaçons le créneau.', 'icon' => 'calendar-x'],
                    ['title' => 'Santé', 'body' => 'Grossesse, opération récente, traitement en cours : dites-le à la réservation, la thérapeute adapte le soin ou en conseille un autre.', 'icon' => 'heart-pulse'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les thérapeutes',
                'title' => 'Cinq paires de mains, une seule manière',
                'lead' => 'Chaque soin est donné par une thérapeute diplômée, la même du début à la fin.',
                'body' => [
                    'Line Favrod a formé toute l’équipe au massage de la maison : lent, appuyé, sans un mot de trop. Les cinq thérapeutes sont diplômées, et plusieurs assurances complémentaires remboursent une part de leurs massages.',
                    'Les huiles viennent d’une distillerie de Bex, le foin des prés des Ormonts, fauché en juillet et séché à l’ombre. Les galets des pierres chaudes ont été ramassés dans la Grande Eau, à cent mètres des cabines.',
                    'Nous ne vendons ni cure ni abonnement. Vous réservez un soin, vous dites la pression que vous aimez, et si vous vous endormez, on vous laisse dormir dix minutes de plus.',
                ],
            ],
        ],
        '/passes' => [
            'label' => 'Entrées',
            'hero' => [
                'eyebrow' => 'Les entrées',
                'title' => 'Deux heures, la journée ou le soir',
                'lead' => 'L’entrée ouvre tous les bassins, les saunas, le hammam et la salle de repos. Elle se prend à la caisse, sans réserver.',
                'subject' => 'La caisse en mélèze, les linges pliés et les bracelets de casier',
                'links' => [['label' => 'Réserver un soin', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Compris dans l’entrée',
                'title' => 'Ce que vous trouvez sur place',
                'items' => [
                    ['title' => 'Le linge et le casier', 'body' => 'Un grand linge de bain par personne et un casier à bracelet. Vous n’apportez que votre maillot.', 'subject' => 'Une pile de linges de bain en lin sur un banc de mélèze'],
                    ['title' => 'La tisane', 'body' => 'Serpolet, mélisse et menthe du jardin, à volonté à la salle de repos.', 'subject' => 'Une théière en fonte et des tasses devant la cheminée'],
                    ['title' => 'Le silence', 'body' => 'On parle bas partout, et pas du tout au sauna. Les téléphones restent au casier.', 'subject' => 'Le sauna vide, la porte entrouverte sur le jardin'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Quand venir',
                'title' => 'Les heures où l’on a les bains pour soi',
                'lead' => 'Nous ne laissons jamais entrer plus de quatre-vingt-dix personnes à la fois.',
                'body' => [
                    'Le plus calme : le mardi et le jeudi matin, réservés aux adultes, et tous les soirs après 19 h. Le plus plein : le samedi de 15 h à 18 h en saison de ski, quand les pistes ferment.',
                    'L’entrée du soir, dès 18 h, est celle que préfèrent les gens de la vallée. Les bassins sont éclairés par le fond, les bains nordiques sont à température, et le massif vire au rose puis au noir.',
                    'La carte de dix entrées ne porte pas de nom : elle passe de main en main dans une famille ou un chalet, et reste valable deux ans.',
                ],
            ],
        ],
        '/place' => [
            'label' => 'Le lieu',
            'hero' => [
                'eyebrow' => 'Le lieu',
                'title' => 'Sous la charpente, dehors, au bord du torrent',
                'lead' => 'Trois bassins, deux bains nordiques, deux saunas, un hammam, une salle de repos et un jardin : la visite, pièce par pièce.',
                'subject' => 'Le bassin intérieur sous la charpente, la lumière du matin par les baies',
                'links' => [['label' => 'Réserver un soin', 'to' => '/book'], ['label' => 'Voir les entrées', 'to' => '/passes']],
            ],
            'features' => [
                'eyebrow' => 'Trois manières d’y être',
                'title' => 'Dans l’eau, en cabine, au jardin',
                'items' => [
                    ['title' => 'Les bains', 'body' => 'Le bassin intérieur à 34°, le bain extérieur à 36°, ouvert sous la neige, et deux bains nordiques chauffés au bois dès 16 h.', 'subject' => 'Le bain extérieur à la tombée du jour, la vapeur dans le froid', 'to' => '/passes', 'label' => 'Les entrées'],
                    ['title' => 'Les cabines', 'body' => 'Cinq cabines en mélèze, dont une double. Chacune a sa fenêtre sur la Grande Eau et son poêle.', 'subject' => 'Une cabine en mélèze, la table de massage devant la fenêtre', 'to' => '/treatments', 'label' => 'La carte des soins'],
                    ['title' => 'Le jardin', 'body' => 'Des chaises longues sous les bouleaux, un chemin de galets jusqu’au torrent et, pour qui ose, le bassin froid.', 'subject' => 'Des chaises longues sous les bouleaux, le torrent en contrebas'],
                ],
            ],
            'story' => [
                'eyebrow' => 'La visite',
                'title' => 'De la porte au torrent',
                'lead' => 'On entre par l’ancien atelier de sciage et l’on finit, si l’on veut, les pieds dans la Grande Eau.',
                'body' => [
                    'La caisse est là où l’on chargeait les planches. Derrière viennent les vestiaires, puis le bassin intérieur : quinze mètres d’eau à 34° sous la charpente de 1894, que Mathieu Favrod a laissée nue.',
                    'Une porte d’eau mène au bain extérieur, tourné vers le massif. À gauche, le sauna en arolle, à 85°, et le sauna doux, à 60°, où infusent les herbes d’alpage ; à droite, le hammam en pierre grise et le bassin froid, que le bief remplit à 12°.',
                    'L’étage est au silence : la salle de repos et sa cheminée, la tisanerie, le couloir des cinq cabines. Le jardin descend en trois terrasses jusqu’au torrent ; c’est là que fument les deux bains nordiques.',
                ],
            ],
        ],
        '/book' => [
            'hero' => [
                'eyebrow' => 'Réserver',
                'title' => 'Demander un créneau pour un soin',
                'lead' => 'Choisissez le soin et le jour : nous confirmons l’heure dans la journée. Pour les bains seuls, inutile de réserver.',
                'subject' => 'Le carnet de rendez-vous ouvert sur le comptoir en mélèze',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000']],
            ],
            'features' => [
                'eyebrow' => 'À savoir',
                'title' => 'Ce que la réservation comprend',
                'items' => [
                    ['title' => 'Les bains avec le soin', 'body' => 'Un soin de 50 minutes ou plus donne droit à deux heures de bains le même jour, avant ou après.', 'icon' => 'waves'],
                    ['title' => 'À deux', 'body' => 'La cabine double se réserve pour un massage en duo ; dites-nous si vous préférez deux cabines voisines.', 'icon' => 'users'],
                    ['title' => 'En groupe', 'body' => 'Dès six personnes, écrivez-nous une semaine avant : nous répartissons les soins sur l’après-midi.', 'icon' => 'calendar-days'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment ça se passe',
                'title' => 'Une demande, puis notre réponse',
                'lead' => 'Votre demande n’est pas encore une réservation : c’est notre réponse qui la confirme.',
                'body' => [
                    'Nous répondons dans la journée, du mardi au dimanche, par téléphone ou par e-mail selon ce que vous nous laissez. Si l’heure demandée est prise, nous en proposons deux autres le même jour.',
                    'En hiver, le samedi se remplit dix jours à l’avance. En semaine, on trouve presque toujours un créneau pour le lendemain ; pour le jour même, appelez le 024 000 00 00.',
                    'Rien n’est à payer d’avance. Vous réglez à la caisse en arrivant, par carte, en espèces ou avec un bon cadeau, et vous pouvez annuler sans frais jusqu’à la veille à midi.',
                ],
            ],
        ],
    ],
];
