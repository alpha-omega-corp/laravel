<?php

declare(strict_types=1);

/*
 * The demo content of a garage: a fictional all-makes workshop at the edge of
 * Romont, opened in 1974 and run by the founder's daughter, with four lifts,
 * a tyre hotel and nine used cars on its forecourt. `site` is what every page
 * shares, `prefabs` is what the site would bind as `kit.<name>` — the rows its
 * owner keeps in the admin, in each component's own prop names — and `pages`
 * holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/garage.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Garage Pittet',
        'blurb' => 'Atelier toutes marques, pneus et occasions expertisées, à l’entrée de Romont depuis 1974.',
        'address' => 'Route de Fribourg 48, 1680 Romont',
        'phone' => '026 000 00 00',
        'email' => 'atelier@garage-pittet.example',
        'status' => 'Atelier ouvert aujourd’hui jusqu’à 18 h',
        'note' => '© Garage Pittet SA',
        'action' => ['label' => 'Prendre rendez-vous', 'to' => '/appointment'],
        'band' => [
            'eyebrow' => 'Rendez-vous',
            'title' => 'Un créneau cette semaine ?',
            'lead' => 'Dites-nous la voiture et le travail : nous rappelons dans la journée avec un jour et un prix. Pour une panne, appelez directement, nous faisons de la place.',
            'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Services et tarifs', 'to' => '/services']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Route de Fribourg 48, Romont'],
                ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                ['label' => 'Voiture de remplacement', 'value' => 'Prêtée pendant un service, sur réservation'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires de l’atelier',
            'note' => 'Le samedi, pneus et vente uniquement. Les clés se déposent à toute heure dans la boîte à gauche du portail.',
            'days' => [
                ['day' => 'Lundi', 'hours' => '7:30–12:00 · 13:15–18:00'],
                ['day' => 'Mardi', 'hours' => '7:30–12:00 · 13:15–18:00'],
                ['day' => 'Mercredi', 'hours' => '7:30–12:00 · 13:15–18:00'],
                ['day' => 'Jeudi', 'hours' => '7:30–12:00 · 13:15–18:00'],
                ['day' => 'Vendredi', 'hours' => '7:30–12:00 · 13:15–18:00'],
                ['day' => 'Samedi', 'hours' => '8:00–12:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'menu' => [
            'title' => 'Services et tarifs',
            'sections' => [
                ['title' => 'Entretien et contrôles', 'items' => [
                    ['name' => 'Petit service', 'price' => 'dès 240.–', 'description' => 'Huile, filtre à huile, niveaux et contrôle en 28 points'],
                    ['name' => 'Grand service', 'price' => 'dès 480.–', 'description' => 'Huile, tous les filtres, bougies, liquide de frein'],
                    ['name' => 'Préparation à l’expertise', 'price' => '180.–', 'description' => 'Contrôle complet et présentation à l’OCN de Fribourg, émolument en sus'],
                    ['name' => 'Diagnostic électronique', 'price' => '90.–', 'description' => 'Lecture des défauts et rapport écrit, déduit de la réparation'],
                    ['name' => 'Climatisation', 'price' => '149.–', 'description' => 'Contrôle d’étanchéité, recharge et désinfection'],
                    ['name' => 'Heure d’atelier', 'price' => '138.–', 'description' => 'Pour tout travail hors forfait, au quart d’heure'],
                ]],
                ['title' => 'Pneus et géométrie', 'items' => [
                    ['name' => 'Changement de roues', 'price' => '60.–', 'description' => 'Les quatre roues, pression et serrage au couple'],
                    ['name' => 'Montage de pneus neufs', 'price' => '28.–', 'description' => 'Par pneu : montage, valve et équilibrage'],
                    ['name' => 'Hôtel à pneus', 'price' => '70.–', 'description' => 'La saison : quatre roues lavées, contrôlées et étiquetées'],
                    ['name' => 'Géométrie', 'price' => '160.–', 'description' => 'Mesure et réglage des deux trains, protocole imprimé'],
                    ['name' => 'Réparation d’une crevaison', 'price' => '35.–', 'description' => 'Sans rendez-vous, si le flanc est intact'],
                ]],
                ['title' => 'Freins, embrayage et moteur', 'items' => [
                    ['name' => 'Plaquettes avant', 'price' => 'dès 220.–', 'description' => 'Pièces et pose, témoin d’usure compris'],
                    ['name' => 'Disques et plaquettes avant', 'price' => 'dès 480.–', 'description' => 'Pièces et pose, essai sur route'],
                    ['name' => 'Courroie de distribution', 'price' => 'dès 890.–', 'description' => 'Kit complet avec pompe à eau'],
                    ['name' => 'Embrayage', 'price' => 'dès 1 250.–', 'description' => 'Disque, mécanisme et butée ; volant moteur sur devis'],
                    ['name' => 'Batterie', 'price' => 'dès 190.–', 'description' => 'Test gratuit, pose et reprise de l’ancienne'],
                ]],
                ['title' => 'Carrosserie et vitrage', 'items' => [
                    ['name' => 'Débosselage sans peinture', 'price' => 'dès 120.–', 'description' => 'Par impact : grêle, portière, caddie'],
                    ['name' => 'Peinture d’un élément', 'price' => 'dès 650.–', 'description' => 'Aile, porte ou pare-chocs, teinte relevée au spectromètre'],
                    ['name' => 'Impact sur le pare-brise', 'price' => '95.–', 'description' => 'En vingt minutes, le plus souvent pris en charge par l’assurance'],
                    ['name' => 'Remplacement du pare-brise', 'price' => 'dès 540.–', 'description' => 'Pose et calibrage des caméras d’aide à la conduite'],
                    ['name' => 'Rénovation des phares', 'price' => '110.–', 'description' => 'La paire, polie et vernie'],
                ]],
            ],
        ],
        'listings' => [
            'title' => 'Véhicules d’occasion',
            'listings' => [
                ['name' => 'Škoda Octavia Combi 2.0 TDI 4x4', 'price' => 'CHF 21 900.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2019'], ['label' => 'Kilomètres', 'value' => '84 000 km'], ['label' => 'Boîte', 'value' => 'Automatique'], ['label' => 'Carburant', 'value' => 'Diesel'],
                ]],
                ['name' => 'Volkswagen Golf 1.5 TSI Life', 'price' => 'CHF 22 400.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2021'], ['label' => 'Kilomètres', 'value' => '46 500 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Essence'],
                ]],
                ['name' => 'Subaru Forester 2.0i e-Boxer', 'price' => 'CHF 26 800.–', 'status' => 'Réservé', 'facts' => [
                    ['label' => 'Année', 'value' => '2020'], ['label' => 'Kilomètres', 'value' => '71 000 km'], ['label' => 'Boîte', 'value' => 'Automatique'], ['label' => 'Carburant', 'value' => 'Hybride'],
                ]],
                ['name' => 'Toyota Yaris 1.5 Hybrid', 'price' => 'CHF 19 700.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2022'], ['label' => 'Kilomètres', 'value' => '31 000 km'], ['label' => 'Boîte', 'value' => 'Automatique'], ['label' => 'Carburant', 'value' => 'Hybride'],
                ]],
                ['name' => 'Dacia Duster 1.3 TCe 4x4', 'price' => 'CHF 18 200.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2021'], ['label' => 'Kilomètres', 'value' => '58 000 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Essence'],
                ]],
                ['name' => 'Suzuki Swift 1.2 Hybrid AllGrip', 'price' => 'CHF 13 900.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2020'], ['label' => 'Kilomètres', 'value' => '64 000 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Hybride'],
                ]],
                ['name' => 'Fiat Panda 4x4 0.9 TwinAir', 'price' => 'CHF 10 900.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2017'], ['label' => 'Kilomètres', 'value' => '98 000 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Essence'],
                ]],
                ['name' => 'Renault Kangoo Express 1.5 dCi', 'price' => 'CHF 11 500.–', 'facts' => [
                    ['label' => 'Année', 'value' => '2018'], ['label' => 'Kilomètres', 'value' => '112 000 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Diesel'],
                ]],
                ['name' => 'Opel Corsa 1.2 Enjoy', 'price' => 'CHF 6 900.–', 'status' => 'Vendu', 'facts' => [
                    ['label' => 'Année', 'value' => '2016'], ['label' => 'Kilomètres', 'value' => '121 000 km'], ['label' => 'Boîte', 'value' => 'Manuelle'], ['label' => 'Carburant', 'value' => 'Essence'],
                ]],
            ],
        ],
        'testimonials' => [
            'title' => 'Ce que disent nos clients',
            'testimonials' => [
                ['quote' => 'Embrayage lâché un vendredi à 16 h, voiture de remplacement à 17 h, la mienne rendue le mardi au prix du devis, à dix francs près. Je n’en demande pas plus à un garage.', 'name' => 'Nadia Morel', 'role' => 'Cliente depuis 2015, Billens'],
                ['quote' => 'Ils m’ont déconseillé une réparation à 1 800 francs sur une voiture qui n’en valait plus 2 000, et m’ont montré pourquoi, sur le pont. J’ai acheté la suivante chez eux.', 'name' => 'Jean-Luc Oberson', 'role' => 'Agriculteur, Mézières'],
                ['quote' => 'Nos six fourgons passent à l’atelier à tour de rôle, le soir, et repartent le lendemain à 7 h 30. En quatre ans, aucun chantier n’a attendu un véhicule.', 'name' => 'Sandrine Ayer', 'role' => 'Ayer Sanitaire SA, Romont'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un rendez-vous',
            'intro' => 'Indiquez la voiture, le travail et un jour qui vous arrange : nous rappelons dans la journée pour confirmer l’heure et annoncer le prix.',
            'action' => '#booking',
            'services' => [
                'Petit service',
                'Grand service',
                'Changement de roues',
                'Pneus neufs',
                'Freins',
                'Préparation à l’expertise',
                'Diagnostic d’une panne',
                'Carrosserie ou pare-brise',
                'Essai d’un véhicule d’occasion',
            ],
        ],
        'map' => [
            'address' => 'Route de Fribourg 48, 1680 Romont',
            'title' => 'Route de Fribourg 48 · entrée après le lavage',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Garage toutes marques · Romont',
                'title' => 'Votre voiture rendue le jour dit, au prix annoncé',
                'lead' => 'Entretien, pneus, freins et carrosserie pour toutes les marques, et neuf occasions expertisées sur le parc. Trois mécaniciens, un carrossier, et un devis écrit avant de toucher à la voiture.',
                'subject' => 'Une voiture sur le pont élévateur, capot ouvert, dans l’atelier',
                'note' => 'Roues d’hiver : il reste des créneaux cette semaine',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Services et tarifs', 'to' => '/services']],
                'facts' => [['value' => '1974', 'label' => 'Année d’ouverture'], ['value' => '4', 'label' => 'Ponts élévateurs'], ['value' => '12 mois', 'label' => 'De garantie sur chaque occasion']],
            ],
            'features' => [
                'eyebrow' => 'L’atelier',
                'title' => 'Trois raisons de passer le portail',
                'lead' => 'Un atelier, un parc d’occasions et une réception où quelqu’un répond : tout se passe à la même adresse.',
                'items' => [
                    ['title' => 'Entretien et réparations', 'body' => 'Services, freins, embrayages et diagnostics sur toutes les marques, au tarif affiché. Le devis est écrit, et rien ne s’y ajoute sans votre accord.', 'subject' => 'Un mécanicien changeant des plaquettes de frein, la roue déposée', 'to' => '/services', 'label' => 'Services et tarifs'],
                    ['title' => 'Occasions expertisées', 'body' => 'Neuf véhicules sur le parc, repris à nos clients, révisés et expertisés ici, vendus avec douze mois de garantie.', 'subject' => 'Une rangée de voitures d’occasion sur le parc, le prix au pare-brise', 'to' => '/vehicles', 'label' => 'Les véhicules en vente'],
                    ['title' => 'Un créneau cette semaine', 'body' => 'Un service se cale en général sous cinq jours ouvrables, et une panne passe devant. Voiture de remplacement sur réservation.', 'subject' => 'Le comptoir de la réception, le planning de la semaine au mur', 'to' => '/appointment', 'label' => 'Prendre rendez-vous'],
                ],
            ],
        ],
        '/services' => [
            'label' => 'Services et tarifs',
            'hero' => [
                'eyebrow' => 'Services et tarifs',
                'title' => 'Ce que coûte un passage à l’atelier',
                'lead' => 'Prix TVA comprise, pièces d’origine ou de qualité équivalente. Un forfait vaut pour la plupart des voitures ; un « dès » dépend du modèle, et le devis écrit le précise avant les travaux.',
                'subject' => 'Le tableau des tarifs affiché au mur de la réception',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Avant de laisser les clés',
                'items' => [
                    ['title' => 'Devis écrit', 'body' => 'Chaque travail est chiffré avant de commencer. Si le démontage révèle autre chose, nous appelons : rien ne s’ajoute sans votre accord.', 'icon' => 'file-text'],
                    ['title' => 'Voiture de remplacement', 'body' => 'Trois voitures de prêt, gratuites pendant un service et à CHF 35 par jour pour une réparation plus longue. À réserver avec le rendez-vous.', 'icon' => 'car'],
                    ['title' => 'Garantie', 'body' => 'Deux ans sur les pièces et la main-d’œuvre. Celle du constructeur reste valable : l’entretien suit son plan et le carnet est tamponné.', 'icon' => 'shield-check'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment nous travaillons',
                'title' => 'Du dépôt des clés à la facture',
                'lead' => 'Une voiture déposée à 7 h 30 pour un service est prête à 17 h. Voici ce qui se passe entre les deux.',
                'body' => [
                    'À la réception, nous notons avec vous ce qu’il y a à faire et ce que vous avez remarqué : un bruit, un voyant, une vibration au freinage. La voiture passe ensuite sur le pont pour le contrôle en 28 points, et tout ce qui sort du forfait fait l’objet d’un appel avant d’être touché.',
                    'Les pièces courantes sont en stock ; les autres arrivent deux fois par jour, à 10 h et à 15 h, du dépôt de Fribourg. C’est ce qui permet de rendre le jour même la plupart des voitures, et le lendemain celles qui attendent une pièce.',
                    'Les pièces remplacées vous sont montrées, ou laissées dans le coffre si vous le demandez. La facture reprend le devis ligne par ligne, et la date du prochain service est notée sur l’étiquette collée dans la portière.',
                ],
            ],
        ],
        '/vehicles' => [
            'label' => 'Occasions',
            'hero' => [
                'eyebrow' => 'Véhicules d’occasion',
                'title' => 'Neuf occasions, révisées et expertisées ici',
                'lead' => 'Des voitures que nous connaissons : la plupart ont été entretenues à l’atelier depuis leur première immatriculation. Chacune part avec un grand service fait, l’expertise du mois et douze mois de garantie.',
                'subject' => 'Le parc des occasions devant le garage, un matin clair',
                'links' => [['label' => 'Demander un essai', 'to' => '/appointment'], ['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000']],
            ],
            'features' => [
                'eyebrow' => 'Acheter chez nous',
                'title' => 'Ce que le prix comprend',
                'items' => [
                    ['title' => 'Révisée et expertisée', 'body' => 'Grand service, freins et pneus contrôlés, expertise passée dans le mois. Le rapport de contrôle est dans la boîte à gants.', 'icon' => 'clipboard-check'],
                    ['title' => 'Douze mois de garantie', 'body' => 'Moteur, boîte et électronique : pièces et main-d’œuvre, sans franchise, dans notre atelier.', 'icon' => 'shield-check'],
                    ['title' => 'Reprise de votre voiture', 'body' => 'Nous l’estimons sur place en vingt minutes, et l’offre écrite vaut dix jours.', 'icon' => 'repeat'],
                ],
            ],
            'story' => [
                'eyebrow' => 'D’où viennent nos voitures',
                'title' => 'Des occasions dont nous connaissons l’histoire',
                'lead' => 'Nous n’achetons pas de lots aux enchères. Ce qui est sur le parc vient de nos clients.',
                'body' => [
                    'Sept des neuf voitures en vente ont été entretenues ici, souvent depuis leur premier service. Le carnet est complet, les factures sont dans le dossier, et le mécanicien qui a fait le dernier service peut vous dire ce qui a été changé et ce qui le sera dans deux ans.',
                    'Avant la mise en vente, chaque voiture passe une journée à l’atelier : grand service, géométrie, freins et pneus remplacés s’ils sont usés à plus de la moitié. Elle est ensuite présentée à l’expertise à Fribourg, et n’arrive sur le parc qu’avec son rapport.',
                    'L’essai se fait sur rendez-vous : une demi-heure, par la route de Billens et un bout d’autoroute. Une voiture marquée « Réservé » attend une réponse sous cinq jours ; si la vente ne se fait pas, elle revient sur le parc au même prix.',
                ],
            ],
        ],
        '/appointment' => [
            'label' => 'Rendez-vous',
            'hero' => [
                'eyebrow' => 'Rendez-vous',
                'title' => 'Un jour qui vous arrange, une réponse dans la journée',
                'lead' => 'Remplissez la demande ou appelez : nous confirmons l’heure et le prix par téléphone. En cas de panne, appelez tout de suite, nous faisons de la place.',
                'subject' => 'La réception du garage, une cliente remettant ses clés',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Services et tarifs', 'to' => '/services']],
            ],
            'features' => [
                'eyebrow' => 'Le jour du rendez-vous',
                'title' => 'Déposer la voiture, repartir tranquille',
                'items' => [
                    ['title' => 'Déposer les clés', 'body' => 'Dès 7 h 30 à la réception, ou la veille au soir : la boîte à clés est à gauche du portail.', 'icon' => 'key-round'],
                    ['title' => 'Voiture de remplacement', 'body' => 'Trois voitures de prêt. Dites-le dans la demande, nous en gardons une à votre nom.', 'icon' => 'car'],
                    ['title' => 'Navette pour la gare', 'body' => 'À 8 h et à 17 h 15, nous vous conduisons à la gare de Romont, à quatre minutes.', 'icon' => 'train-front'],
                ],
            ],
        ],
    ],
];
