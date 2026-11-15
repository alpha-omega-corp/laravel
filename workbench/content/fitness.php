<?php

declare(strict_types=1);

/*
 * The demo content of a fitness studio: a fictional yoga, pilates and
 * strength studio in a former printing works in the old town of Carouge, with
 * a large room of twenty-four mats under a glass roof and a small one of eight
 * reformers. `site` is what every page shares, `prefabs` is what the site would
 * bind as `kit.<name>` — the rows its owner keeps in the admin, in each
 * component's own prop names — and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/fitness.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'La Verrière',
        'blurb' => 'Yoga, pilates et renforcement sous la verrière d’une ancienne imprimerie, au fond d’une cour du Vieux-Carouge.',
        'address' => 'Rue Ancienne 42, 1227 Carouge',
        'phone' => '022 000 00 00',
        'email' => 'bonjour@la-verriere.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 21 h',
        'note' => '© La Verrière Sàrl',
        'action' => ['label' => 'Essayer un cours', 'to' => '/try-a-class'],
        'band' => [
            'eyebrow' => 'Essayer',
            'title' => 'Un premier cours cette semaine ?',
            'lead' => 'Le cours d’essai coûte 10.– et se réserve jusqu’à deux heures avant. Tapis, briques et sangles sont sur place : venez en tenue, dix minutes avant l’heure.',
            'links' => [['label' => 'Essayer un cours', 'to' => '/try-a-class'], ['label' => 'Voir les tarifs', 'to' => '/prices']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue Ancienne 42, Carouge'],
                ['label' => 'Téléphone', 'value' => '022 000 00 00', 'href' => 'tel:+41220000000'],
                ['label' => 'Tram', 'value' => 'Lignes 12 et 18, arrêt Marché, trois minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Premier cours à 6 h 45, dernier à 19 h 45. Un dimanche par mois, atelier de trois heures : les dates sont à l’accueil. Fermé du 24 décembre au 2 janvier.',
            'days' => [
                ['day' => 'Lundi', 'hours' => '06:45–13:30 · 16:30–21:00'],
                ['day' => 'Mardi', 'hours' => '06:45–13:30 · 16:30–21:00'],
                ['day' => 'Mercredi', 'hours' => '06:45–13:30 · 16:30–21:00'],
                ['day' => 'Jeudi', 'hours' => '06:45–13:30 · 16:30–21:00'],
                ['day' => 'Vendredi', 'hours' => '06:45–13:30 · 16:30–19:30'],
                ['day' => 'Samedi', 'hours' => '08:30–13:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'menu' => [
            'title' => 'Les tarifs',
            'sections' => [
                ['title' => 'Pour commencer', 'items' => [
                    ['name' => 'Cours d’essai', 'price' => '10.–', 'description' => 'Une fois, dans presque tous les cours. Tapis prêté ; déduit si vous revenez dans les sept jours.'],
                    ['name' => 'Semaine découverte', 'price' => '45.–', 'description' => 'Sept jours, tous les cours collectifs, autant de fois que vous voulez.'],
                    ['name' => 'Mois d’introduction', 'price' => '95.–', 'description' => 'Trente jours illimités, une seule fois, réservé aux nouveaux élèves.'],
                ]],
                ['title' => 'À la carte', 'items' => [
                    ['name' => 'Cours à l’unité', 'price' => '28.–', 'description' => 'Yoga, pilates sur tapis ou renforcement, 60 ou 75 minutes.'],
                    ['name' => 'Carte de 10 cours', 'price' => '240.–', 'description' => 'Valable six mois. Elle se partage à deux.'],
                    ['name' => 'Carte de 20 cours', 'price' => '440.–', 'description' => 'Valable douze mois.'],
                    ['name' => 'Cours sur machines, à l’unité', 'price' => '42.–', 'description' => 'Pilates sur reformer, huit places par cours.'],
                    ['name' => 'Carte de 10 cours sur machines', 'price' => '380.–', 'description' => 'Valable six mois, pour les cours de la petite salle.'],
                ]],
                ['title' => 'Abonnements', 'items' => [
                    ['name' => 'Illimité, au mois', 'price' => '149.–', 'description' => 'Tous les cours collectifs sur tapis. Sans engagement, résiliable d’un mois à l’autre.'],
                    ['name' => 'Illimité, à l’année', 'price' => '1’490.–', 'description' => 'Dix mois payés pour douze. Suspension possible jusqu’à huit semaines.'],
                    ['name' => 'Matin seulement, au mois', 'price' => '99.–', 'description' => 'Tous les cours qui commencent avant 9 h, du lundi au vendredi.'],
                    ['name' => 'Étudiants, apprentis, AVS et AI, au mois', 'price' => '119.–', 'description' => 'L’illimité, sur présentation d’une carte.'],
                    ['name' => 'Supplément machines, au mois', 'price' => '60.–', 'description' => 'Ajoute à l’illimité un cours sur reformer par semaine.'],
                ]],
                ['title' => 'Cours privés et salle', 'items' => [
                    ['name' => 'Cours privé · 60 min', 'price' => '110.–', 'description' => 'Sur tapis ou sur machine, avec l’enseignant de votre choix.'],
                    ['name' => 'Cours privé à deux · 60 min', 'price' => '140.–'],
                    ['name' => 'Cinq cours privés', 'price' => '500.–', 'description' => 'À prendre dans les quatre mois.'],
                    ['name' => 'Yoga prénatal, cycle de six samedis', 'price' => '150.–', 'description' => 'Dès le quatrième mois de grossesse, dix places.'],
                    ['name' => 'Location de la grande salle, l’heure', 'price' => '80.–', 'description' => 'Le samedi après 13 h 30 et le dimanche, tapis compris.'],
                ]],
            ],
        ],
        'team' => [
            'title' => 'Les enseignants',
            'members' => [
                ['name' => 'Maëlle Jeanneret', 'role' => 'Fondatrice · vinyasa et yin', 'bio' => 'Elle a ouvert le studio en 2016, après dix ans à enseigner dans des salles louées à l’heure. Elle donne le vinyasa du soir et le yin du jeudi, à la lumière des lampes.'],
                ['name' => 'Thomas Aebischer', 'role' => 'Pilates sur tapis et sur machines', 'bio' => 'Physiothérapeute pendant douze ans, il a installé les huit reformers de la petite salle. Son cours du dos, le mardi à 12 h 15, est le premier à afficher complet.'],
                ['name' => 'Inês Carvalho', 'role' => 'Hatha doux · yoga prénatal', 'bio' => 'Sage-femme de formation. Elle donne le hatha de 9 h 30, où l’on vient à tout âge, et le cours prénatal du samedi, dès le quatrième mois.'],
                ['name' => 'Loïc Burnier', 'role' => 'Renforcement et mobilité', 'bio' => 'Ancien gymnaste, il enseigne au poids du corps, aux anneaux et avec quelques kettlebells. Six cours par semaine, dont celui de 7 h pour qui travaille à 8 h 30.'],
                ['name' => 'Sandrine Matthey', 'role' => 'Pilates sur machines', 'bio' => 'Danseuse, puis formée au pilates à Londres. Elle prend les débutants sur reformer le lundi et le mercredi soir, huit personnes au plus.'],
                ['name' => 'Yuki Tanaka', 'role' => 'Ashtanga, le matin', 'bio' => 'Elle ouvre le studio à 6 h 45, du lundi au vendredi, pour une pratique que chacun mène à son rythme pendant qu’elle passe de tapis en tapis.'],
                ['name' => 'Noé Perrin', 'role' => 'Vinyasa · yoga des ados', 'bio' => 'Le plus jeune de l’équipe. Il donne le vinyasa de midi et, le mercredi à 17 h, le cours des douze à seize ans.'],
                ['name' => 'Camille Droz', 'role' => 'Accueil et planning', 'bio' => 'C’est elle qui répond au téléphone, confirme les cours d’essai et montre le vestiaire le premier jour. À l’accueil du lundi au vendredi, de 16 h 30 à 19 h.'],
            ],
        ],
        'booking' => [
            'title' => 'Réserver un cours d’essai',
            'intro' => 'Choisissez un cours et un jour : Camille confirme la place par e-mail ou par téléphone dans la journée. Le cours d’essai coûte 10.–, à régler sur place.',
            'action' => '#booking',
            'services' => [
                'Vinyasa · tous niveaux',
                'Hatha doux',
                'Yin · le soir',
                'Pilates sur tapis',
                'Pilates sur machines · débutants',
                'Renforcement et mobilité',
                'Yoga prénatal',
                'Yoga des ados · mercredi 17 h',
                'Je ne sais pas encore : conseillez-moi',
            ],
        ],
        'map' => [
            'address' => 'Rue Ancienne 42, 1227 Carouge',
            'title' => 'La Verrière, au fond de la cour, porte vitrée',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Studio de mouvement · Carouge',
                'title' => 'Yoga, pilates et renforcement sous une verrière',
                'lead' => 'Deux salles dans une ancienne imprimerie du Vieux-Carouge : vingt-quatre tapis sous le verre, huit machines à côté. Quarante-deux cours par semaine, de 6 h 45 à 21 h, et le premier à 10.–.',
                'subject' => 'La grande salle sous la verrière, les tapis déroulés avant le cours de 7 h',
                'note' => 'Encore six places au vinyasa de jeudi, 18 h 15',
                'links' => [['label' => 'Essayer un cours', 'to' => '/try-a-class'], ['label' => 'Voir les tarifs', 'to' => '/prices']],
                'facts' => [['value' => '42', 'label' => 'Cours par semaine'], ['value' => '8', 'label' => 'Enseignants'], ['value' => '10.–', 'label' => 'Le cours d’essai']],
            ],
            'features' => [
                'eyebrow' => 'Le studio',
                'title' => 'Avant le premier cours',
                'lead' => 'Ce que l’on nous demande au téléphone, dans l’ordre : combien, avec qui, et comment essayer.',
                'items' => [
                    ['title' => 'À l’unité ou à l’abonnement', 'body' => 'Un cours coûte 28.–, la carte de dix 240.–, l’illimité 149.– par mois, sans engagement.', 'subject' => 'Une carte de dix cours tamponnée sur le comptoir de l’accueil', 'to' => '/prices', 'label' => 'Tous les tarifs'],
                    ['title' => 'Huit enseignants', 'body' => 'Chacun donne ses cours toute l’année, à heure fixe : on choisit un horaire, et quelqu’un.', 'subject' => 'Thomas règle les ressorts d’un reformer avant le cours du dos', 'to' => '/teachers', 'label' => 'Qui enseigne quoi'],
                    ['title' => 'Un premier cours à 10.–', 'body' => 'Dans le cours de votre choix, tapis prêté. On vous attend dix minutes avant pour vous montrer la salle.', 'subject' => 'Une élève déroule un tapis prêté, son premier soir', 'to' => '/try-a-class', 'label' => 'Réserver un essai'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Le lieu',
                'title' => 'Deux salles et un vestiaire',
                'lead' => 'Une cour pavée, une porte vitrée, et derrière elle ce qui fut l’atelier des presses.',
                'body' => [
                    'La grande salle fait cent vingt mètres carrés sous une verrière de 1923 : on y pratique à la lumière du jour jusqu’au soir, et le plancher de chêne est chauffé de novembre à mars. Vingt-quatre tapis, jamais un de plus.',
                    'La petite salle tient huit reformers et un mur d’espaliers. Les cours sur machines s’y donnent par groupes de huit, ce qui laisse à l’enseignant le temps de régler chaque ressort.',
                    'Entre les deux, un vestiaire avec quatre douches, des casiers à code et une tisanerie où l’on reste volontiers un quart d’heure après le cours.',
                ],
            ],
        ],
        '/prices' => [
            'label' => 'Tarifs',
            'hero' => [
                'eyebrow' => 'Tarifs',
                'title' => 'Un cours, une carte ou un mois',
                'lead' => 'Yoga, pilates sur tapis et renforcement sont au même prix ; les cours sur machines ont leur propre carte. Prix en francs, TVA comprise, tapis et accessoires prêtés.',
                'subject' => 'L’accueil du studio, les cartes de dix cours rangées dans leur boîte en bois',
                'links' => [['label' => 'Essayer un cours', 'to' => '/try-a-class']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Annuler, suspendre, se faire rembourser',
                'items' => [
                    ['title' => 'Annuler un cours', 'body' => 'Sans frais jusqu’à quatre heures avant. Passé ce délai, le cours est décompté de la carte : la place aurait servi à quelqu’un.', 'icon' => 'calendar-x'],
                    ['title' => 'Suspendre un abonnement', 'body' => 'Maladie, grossesse ou voyage : l’abonnement s’arrête de deux à huit semaines par an, sur un simple e-mail.', 'icon' => 'repeat'],
                    ['title' => 'Caisse maladie', 'body' => 'Plusieurs assurances complémentaires remboursent une part du yoga et du pilates. Nous fournissons l’attestation en fin d’année.', 'icon' => 'receipt'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment choisir',
                'title' => 'La carte ou l’abonnement ?',
                'lead' => 'La plupart des élèves commencent par une carte de dix et passent à l’illimité au bout de trois mois.',
                'body' => [
                    'À un cours par semaine, la carte de dix est le bon choix : le cours revient à 24.– et la carte reste valable six mois, vacances comprises. Elle se partage à deux, ce que font beaucoup de couples.',
                    'Dès deux cours par semaine, l’illimité à 149.– revient moins cher, et l’on cesse de compter. Il se résilie d’un mois à l’autre, par écrit, sans motif à donner.',
                    'Si vous hésitez, prenez le mois d’introduction : trente jours pour essayer tous les cours et tous les enseignants, à 95.–. Ce que vous aurez pris l’habitude de faire vous dira quoi choisir.',
                ],
            ],
        ],
        '/teachers' => [
            'label' => 'Enseignants',
            'hero' => [
                'eyebrow' => 'Les enseignants',
                'title' => 'Huit personnes, chacune ses cours',
                'lead' => 'Personne ne remplace personne au pied levé : chaque cours a son enseignant, à heure fixe, toute l’année. On choisit un horaire, et quelqu’un.',
                'subject' => 'Les enseignants assis au bord de l’estrade, sous la verrière, un matin de septembre',
                'links' => [['label' => 'Essayer un cours', 'to' => '/try-a-class']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2016',
                'title' => 'Une imprimerie, puis un studio',
                'lead' => 'Les presses sont parties en 2014. Le plancher, la verrière et le monte-charge sont restés.',
                'body' => [
                    'Maëlle Jeanneret enseignait depuis dix ans dans des salles louées à l’heure, une paroisse le lundi, un dojo le jeudi, quand l’imprimerie Roch a fermé au fond de la cour. Elle a signé le bail sans avoir vu la verrière, alors couverte de bâches.',
                    'Il a fallu un été pour poncer le chêne et remplacer quarante-deux vitres. Thomas Aebischer est arrivé l’année suivante avec deux reformers d’occasion ; il y en a huit aujourd’hui, dans l’ancien atelier de composition.',
                    'Nous sommes huit, et six d’entre nous enseignent ici depuis plus de cinq ans. Les élèves le savent : au cours du mardi midi, c’est Thomas, et il se souvient de votre épaule.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce qui s’enseigne',
                'title' => 'Trois pratiques, deux salles',
                'items' => [
                    ['title' => 'Yoga', 'body' => 'Vinyasa, hatha, yin et ashtanga : vingt-quatre cours par semaine dans la grande salle, de 6 h 45 au dernier yin de 19 h 45.', 'subject' => 'Une salutation au soleil, vue du fond de la grande salle'],
                    ['title' => 'Pilates', 'body' => 'Douze cours, sur tapis ou sur machines. Sur reformer, huit personnes au plus, et un cours pour débutants deux fois par semaine.', 'subject' => 'Les huit reformers alignés dans la petite salle'],
                    ['title' => 'Renforcement et mobilité', 'body' => 'Six cours au poids du corps, aux anneaux et aux kettlebells, pour tenir debout longtemps plutôt que pour soulever lourd.', 'subject' => 'Des anneaux de gymnastique suspendus à la charpente'],
                ],
            ],
        ],
        '/try-a-class' => [
            'label' => 'Cours d’essai',
            'hero' => [
                'eyebrow' => 'Cours d’essai',
                'title' => 'Un premier cours pour 10.–',
                'lead' => 'Dans le cours de votre choix, tapis et accessoires prêtés. On réserve en ligne jusqu’à deux heures avant ; pour le jour même, appelez.',
                'subject' => 'La porte vitrée du studio au fond de la cour, ouverte un soir d’été',
                'links' => [['label' => 'Appeler le 022 000 00 00', 'href' => 'tel:+41220000000'], ['label' => 'Voir les tarifs', 'to' => '/prices']],
            ],
            'features' => [
                'eyebrow' => 'Le premier jour',
                'title' => 'Ce qu’il faut savoir avant de venir',
                'items' => [
                    ['title' => 'Dix minutes avant', 'body' => 'Camille vous montre le vestiaire et la salle, et vous présente à l’enseignant. La porte ferme à l’heure du cours.', 'icon' => 'clock'],
                    ['title' => 'En tenue, sans rien d’autre', 'body' => 'Tapis, briques, sangles et couvertures sont sur place. Un linge se loue 2.– ; l’eau et la tisane sont offertes.', 'icon' => 'shirt'],
                    ['title' => 'Une blessure, une grossesse', 'body' => 'Écrivez-le dans le message : l’enseignant adaptera les postures, ou nous vous proposerons un cours qui convient mieux.', 'icon' => 'heart-pulse'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Lequel choisir',
                'title' => 'Par quel cours commencer ?',
                'lead' => 'Si vous n’avez jamais pratiqué, trois cours conviennent mieux que les autres.',
                'body' => [
                    'Le hatha doux d’Inês, à 9 h 30, est le plus lent : on y tient les postures, on a le temps de regarder son voisin, et personne n’y fait le poirier. Le pilates sur tapis du lundi soir demande plus d’attention que de souplesse.',
                    'Pour qui vient d’un autre sport, le renforcement de Loïc est le plus familier. Seul l’ashtanga du matin ne se prête pas à un premier essai : commencez ailleurs, nous vous y amènerons.',
                    'Après le cours, rien à signer. Si vous revenez dans les sept jours, les 10.– sont déduits de votre première carte ou de votre premier mois.',
                ],
            ],
        ],
    ],
];
