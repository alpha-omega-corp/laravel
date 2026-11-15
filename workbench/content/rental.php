<?php

declare(strict_types=1);

/*
 * The demo content of a rental business: a fictional family rental house in
 * Martigny that lends vans, a mini-digger, e-bikes and, in winter, skis and
 * snowshoes from one counter. `site` is what every page shares, `prefabs` is
 * what the site would bind as `kit.<name>` — the rows its owner keeps in the
 * admin, in each component's own prop names — and `pages` holds each page's
 * words, keyed by its path in `.claude/skills/ui-kit/businesses/rental.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Dubuis Location',
        'blurb' => 'Fourgons, machines, vélos et skis à louer à Martigny, de la demi-journée à la semaine.',
        'address' => 'Rue du Simplon 28, 1920 Martigny',
        'phone' => '027 000 00 00',
        'email' => 'comptoir@dubuis-location.example',
        'status' => 'Comptoir ouvert aujourd’hui jusqu’à 18 h 30',
        'note' => '© Dubuis Location Sàrl',
        'action' => ['label' => 'Demander des dates', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Réserver',
            'title' => 'Vos dates sont-elles libres ?',
            'lead' => 'Dites-nous l’objet et les dates : nous vérifions et nous répondons dans la demi-journée, du lundi au samedi.',
            'links' => [['label' => 'Demander des dates', 'to' => '/book'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
            'details' => [
                ['label' => 'Comptoir', 'value' => 'Rue du Simplon 28, Martigny'],
                ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                ['label' => 'Retrait', 'value' => 'Dès 7 h en semaine, 7 h 30 le samedi'],
            ],
        ],
    ],

    'prefabs' => [
        'schedule' => [
            'title' => 'Horaires du comptoir',
            'note' => 'Le dimanche, retours uniquement. Fermé le 25 décembre et le 1er janvier.',
            'days' => [
                ['day' => 'Lundi', 'hours' => '07:00–12:00 · 13:30–18:30'],
                ['day' => 'Mardi', 'hours' => '07:00–12:00 · 13:30–18:30'],
                ['day' => 'Mercredi', 'hours' => '07:00–12:00 · 13:30–18:30'],
                ['day' => 'Jeudi', 'hours' => '07:00–12:00 · 13:30–18:30'],
                ['day' => 'Vendredi', 'hours' => '07:00–12:00 · 13:30–18:30'],
                ['day' => 'Samedi', 'hours' => '07:30–17:00'],
                ['day' => 'Dimanche', 'hours' => '17:00–19:00'],
            ],
        ],
        'listings' => [
            'title' => 'À louer cette saison',
            'listings' => [
                ['name' => 'Fourgon Renault Master L2H2', 'place' => 'Dans la cour', 'price' => 'CHF 140.–/jour', 'facts' => [
                    ['label' => 'Taille', 'value' => '11 m³, 1 200 kg'], ['label' => 'Permis', 'value' => 'B'], ['label' => 'Caution', 'value' => 'CHF 1 000'], ['label' => 'Compris', 'value' => '200 km par jour'],
                ]],
                ['name' => 'Minibus Mercedes Vito Tourer', 'place' => 'Dans la cour', 'price' => 'CHF 190.–/jour', 'facts' => [
                    ['label' => 'Taille', 'value' => '9 places et les bagages'], ['label' => 'Permis', 'value' => 'B'], ['label' => 'Caution', 'value' => 'CHF 1 500'], ['label' => 'Compris', 'value' => '250 km par jour'],
                ]],
                ['name' => 'Van aménagé VW California Ocean', 'place' => 'Dans la cour', 'price' => 'CHF 220.–/jour', 'status' => 'Réservé jusqu’au 3 janvier', 'facts' => [
                    ['label' => 'Taille', 'value' => '4 couchages'], ['label' => 'Permis', 'value' => 'B, dès 23 ans'], ['label' => 'Caution', 'value' => 'CHF 2 000'], ['label' => 'Compris', 'value' => '200 km par jour, literie, vaisselle'],
                ]],
                ['name' => 'Remorque basculante Humbaur', 'place' => 'Dans la cour', 'price' => 'CHF 60.–/jour', 'facts' => [
                    ['label' => 'Taille', 'value' => '750 kg, 2,5 m sur 1,3 m'], ['label' => 'Permis', 'value' => 'B'], ['label' => 'Caution', 'value' => 'CHF 300'], ['label' => 'Compris', 'value' => 'Sangles, bâche, prise 13 pôles'],
                ]],
                ['name' => 'Mini-pelle Kubota U17', 'place' => 'Halle des machines', 'price' => 'CHF 260.–/jour', 'status' => 'Nouveau', 'facts' => [
                    ['label' => 'Taille', 'value' => '1,7 t, creuse à 2,3 m'], ['label' => 'Permis', 'value' => 'Aucun, mise en main de 20 min'], ['label' => 'Caution', 'value' => 'CHF 1 500'], ['label' => 'Compris', 'value' => 'Trois godets, plein de diesel'],
                ]],
                ['name' => 'VTT électrique Scott Patron eRIDE', 'place' => 'Atelier vélos', 'price' => 'CHF 80.–/jour', 'facts' => [
                    ['label' => 'Taille', 'value' => 'Cadres S à XL'], ['label' => 'Permis', 'value' => 'Aucun, dès 14 ans'], ['label' => 'Caution', 'value' => 'CHF 200'], ['label' => 'Compris', 'value' => 'Casque, antivol, chargeur'],
                ]],
                ['name' => 'Vélo cargo électrique Load 75', 'place' => 'Atelier vélos', 'price' => 'CHF 70.–/jour', 'facts' => [
                    ['label' => 'Taille', 'value' => 'Deux enfants ou 100 kg'], ['label' => 'Permis', 'value' => 'Aucun, dès 18 ans'], ['label' => 'Caution', 'value' => 'CHF 200'], ['label' => 'Compris', 'value' => 'Casques, ceintures, bâche de pluie'],
                ]],
                ['name' => 'Skis de piste Stöckli et chaussures', 'place' => 'Au comptoir', 'price' => 'CHF 48.–/jour', 'status' => 'Dès le 21 novembre', 'facts' => [
                    ['label' => 'Taille', 'value' => 'Skis de 150 à 185 cm'], ['label' => 'Permis', 'value' => 'Aucun'], ['label' => 'Caution', 'value' => 'CHF 100'], ['label' => 'Compris', 'value' => 'Bâtons, réglage des fixations'],
                ]],
                ['name' => 'Raquettes à neige TSL', 'place' => 'Au comptoir', 'price' => 'CHF 18.–/jour', 'status' => 'Dès le 21 novembre', 'facts' => [
                    ['label' => 'Taille', 'value' => 'Pointures 35 à 47'], ['label' => 'Permis', 'value' => 'Aucun'], ['label' => 'Caution', 'value' => 'CHF 100'], ['label' => 'Compris', 'value' => 'Bâtons télescopiques'],
                ]],
            ],
        ],
        'pricing' => [
            'title' => 'Quatre durées, un tarif par objet',
            'intro' => 'Les cinq objets les plus demandés, aux quatre durées. Le tarif des autres est sur leur fiche, au comptoir ou au 027 000 00 00.',
            'note' => 'Prix TTC, assurance casco comprise. Non compris : la caution (CHF 100 à 2 000 selon l’objet, bloquée sur carte, jamais débitée), le carburant et les kilomètres au-delà du forfait (–.60 le km).',
            'plans' => [
                [
                    'name' => 'La demi-journée',
                    'price' => 'dès 12.–',
                    'period' => 'les quatre heures',
                    'line' => 'Le matin dès 7 h ou l’après-midi dès 13 h 30, rendu avant la fermeture.',
                    'includes' => [
                        'Fourgon 11 m³ : 90.–',
                        'Minibus 9 places : 125.–',
                        'Mini-pelle 1,7 t : 170.–',
                        'VTT électrique : 50.–',
                        'Skis et chaussures : 30.–',
                    ],
                    'href' => 'mailto:comptoir@dubuis-location.example?subject=Demi-journ%C3%A9e',
                    'label' => 'Demander une demi-journée',
                ],
                [
                    'name' => 'La journée',
                    'price' => 'dès 18.–',
                    'period' => 'de l’ouverture à la fermeture',
                    'line' => 'Retiré à l’ouverture, rendu le soir même ou le lendemain avant 8 h.',
                    'includes' => [
                        'Fourgon 11 m³ : 140.–',
                        'Minibus 9 places : 190.–',
                        'Mini-pelle 1,7 t : 260.–',
                        'VTT électrique : 80.–',
                        'Skis et chaussures : 48.–',
                    ],
                    'href' => 'mailto:comptoir@dubuis-location.example?subject=Journ%C3%A9e',
                    'label' => 'Demander une journée',
                ],
                [
                    'name' => 'Le week-end',
                    'price' => 'dès 27.–',
                    'period' => 'du samedi au lundi',
                    'line' => 'Retiré le samedi dès 7 h 30, rendu le lundi avant 8 h : le dimanche compte pour moitié.',
                    'includes' => [
                        'Fourgon 11 m³ : 210.–',
                        'Minibus 9 places : 285.–',
                        'Mini-pelle 1,7 t : 390.–',
                        'VTT électrique : 120.–',
                        'Skis et chaussures : 72.–',
                    ],
                    'href' => 'mailto:comptoir@dubuis-location.example?subject=Week-end',
                    'label' => 'Demander un week-end',
                    'featured' => true,
                    'flag' => 'Le dimanche à moitié prix',
                ],
                [
                    'name' => 'La semaine',
                    'price' => 'dès 81.–',
                    'period' => 'les sept jours',
                    'line' => 'Sept jours pleins, comptés quatre et demi. Kilomètres : cinq fois le forfait du jour.',
                    'includes' => [
                        'Fourgon 11 m³ : 630.–',
                        'Minibus 9 places : 855.–',
                        'Mini-pelle 1,7 t : 1 170.–',
                        'VTT électrique : 360.–',
                        'Skis et chaussures : 216.–',
                    ],
                    'href' => 'mailto:comptoir@dubuis-location.example?subject=Semaine',
                    'label' => 'Demander une semaine',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Caution, permis, assurance, retards',
            'entries' => [
                ['question' => 'Quelle caution demandez-vous ?', 'answer' => 'De CHF 100 pour des skis à CHF 2 000 pour le van aménagé : le montant figure sur chaque objet. Elle est bloquée sur une carte de crédit ou de débit au retrait, jamais débitée, et libérée au retour une fois l’objet contrôlé. Sans carte, nous prenons le montant en espèces contre reçu.'],
                ['question' => 'Quel permis faut-il ?', 'answer' => 'Le permis B suffit pour le fourgon, le minibus de 9 places, le van et la remorque de 750 kg. Il faut l’avoir depuis un an, et avoir 23 ans pour le van aménagé. La mini-pelle se conduit sans permis sur terrain privé : nous vous la mettons en main en vingt minutes dans la cour.'],
                ['question' => 'Que faut-il apporter au comptoir ?', 'answer' => 'Une pièce d’identité, le permis pour un véhicule et la carte qui portera la caution. Pour les skis, vos chaussettes de ski et votre poids si vous le connaissez : il sert à régler les fixations.'],
                ['question' => 'Suis-je assuré en cas de dégât ?', 'answer' => 'Oui : la casco est comprise dans le prix, avec une franchise de CHF 1 000 pour un véhicule, 500 pour une machine et 200 pour un vélo. Pour CHF 15 par jour, la franchise est supprimée. Le vol d’un vélo laissé sans antivol et une erreur de carburant restent à votre charge.'],
                ['question' => 'Et si je rends en retard ?', 'answer' => 'Une heure de battement est offerte. Au-delà, chaque heure entamée coûte un dixième du prix du jour, et la journée entière après quatre heures. Si vous sentez le retard venir, appelez le 027 000 00 00 : tant que personne n’attend l’objet, nous prolongeons au tarif normal.'],
                ['question' => 'Puis-je annuler ou déplacer mes dates ?', 'answer' => 'Sans frais jusqu’à 48 heures avant le retrait, par téléphone ou par e-mail à comptoir@dubuis-location.example. Plus tard, nous facturons une journée, sauf si l’objet repart avec quelqu’un d’autre. Par mauvais temps, vélos, skis et raquettes se déplacent sans frais jusqu’au matin même.'],
                ['question' => 'Livrez-vous sur un chantier ou à un hôtel ?', 'answer' => 'Oui, dans un rayon de 25 km autour de Martigny : CHF 60 l’aller pour une machine ou une remorque, CHF 30 pour des vélos ou des skis, déposés à l’hôtel la veille. La reprise est au même prix. À demander à la réservation.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander des dates',
            'intro' => 'Choisissez l’objet et le jour du retrait, puis dites dans le message le jour du retour et combien il en faut. Nous vérifions qu’il est libre et nous confirmons dans la demi-journée.',
            'action' => '#booking',
            'services' => [
                'Fourgon 11 m³',
                'Minibus 9 places',
                'Van aménagé',
                'Remorque basculante',
                'Mini-pelle 1,7 t',
                'VTT électrique',
                'Vélo cargo électrique',
                'Skis et chaussures',
                'Raquettes à neige',
            ],
        ],
        'map' => [
            'address' => 'Rue du Simplon 28, 1920 Martigny',
            'title' => 'Entrée par la cour, derrière le lavage',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Location · Martigny',
                'title' => 'Ce qu’il vous faut, le temps qu’il faut',
                'lead' => 'Fourgons, minibus, remorques et mini-pelle pour le chantier du samedi ; vélos électriques, skis et raquettes pour la sortie du dimanche. À la demi-journée, à la journée, au week-end ou à la semaine.',
                'subject' => 'La cour au petit matin : deux fourgons, la mini-pelle sur sa remorque et une rangée de vélos devant le comptoir',
                'note' => 'Skis et raquettes prêts au comptoir dès le samedi 21 novembre',
                'links' => [['label' => 'Demander des dates', 'to' => '/book'], ['label' => 'Voir ce qui se loue', 'to' => '/fleet']],
                'facts' => [['value' => '64', 'label' => 'Objets à louer'], ['value' => '4', 'label' => 'Durées au choix'], ['value' => '1987', 'label' => 'Au même comptoir depuis']],
            ],
            'features' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Choisir, connaître le prix, bloquer ses dates',
                'lead' => 'Trois pages, et rien d’autre à lire avant de passer au comptoir.',
                'items' => [
                    ['title' => 'Ce qui se loue', 'body' => 'Du fourgon de 11 m³ à la paire de raquettes, chaque objet avec sa taille, le permis qu’il demande, sa caution et ce qui est compris.', 'subject' => 'Un fourgon hayon ouvert à côté d’un VTT électrique, dans la cour', 'to' => '/fleet', 'label' => 'Voir ce qui se loue'],
                    ['title' => 'Ce que ça coûte', 'body' => 'Quatre durées et un tarif par objet, assurance comprise. La caution est bloquée sur carte, jamais débitée.', 'subject' => 'La grille des tarifs écrite à la craie derrière le comptoir', 'to' => '/rates', 'label' => 'Les tarifs et les conditions'],
                    ['title' => 'Vos dates', 'body' => 'Dites quoi, de quand à quand et combien : nous confirmons dans la demi-journée, du lundi au samedi.', 'subject' => 'Le carnet de réservations ouvert sur le comptoir, à côté du tableau des clés', 'to' => '/book', 'label' => 'Demander des dates'],
                ],
            ],
        ],
        '/fleet' => [
            'label' => 'À louer',
            'hero' => [
                'eyebrow' => 'À louer',
                'title' => 'Du fourgon de 11 m³ à la paire de raquettes',
                'lead' => 'Chaque objet avec ce qui le fait choisir : sa taille, le permis qu’il demande, la caution et ce qui est compris dans le prix du jour.',
                'subject' => 'Les fourgons alignés dans la cour, hayons ouverts, la halle des machines derrière',
                'links' => [['label' => 'Demander des dates', 'to' => '/book'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
            ],
            'features' => [
                'eyebrow' => 'Entre deux locations',
                'title' => 'Rien ne repart sans être passé à l’atelier',
                'items' => [
                    ['title' => 'Révisé', 'body' => 'Loïc contrôle freins, pneus, niveaux et batteries à chaque retour. Un objet qui n’est pas en ordre sort de la liste jusqu’à ce qu’il le soit.', 'subject' => 'Loïc à l’atelier, un VTT électrique sur le pied de réglage'],
                    ['title' => 'Mis en main', 'body' => 'Dix minutes au comptoir pour un vélo, vingt dans la cour pour la mini-pelle : vous repartez en sachant vous en servir.', 'subject' => 'Une mise en main de la mini-pelle dans la cour, le client aux commandes'],
                    ['title' => 'Complet', 'body' => 'Sangles, casques, chargeurs, godets : ce qui va avec l’objet est dans le prix, et dans le coffre.', 'subject' => 'Des sangles, un casque et un chargeur posés sur le comptoir'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Notre parc',
                'title' => 'Soixante-quatre objets, chacun avec son carnet',
                'lead' => 'Nous achetons peu et nous entretenons beaucoup : c’est ce qui tient les prix.',
                'body' => [
                    'Le parc tient dans une cour et deux halles : douze véhicules et remorques, six machines, vingt-deux vélos et, l’hiver, vingt-quatre paires de skis et de raquettes. Chaque objet porte un numéro, et son carnet dit qui l’a eu, combien d’heures il a tourné et ce que l’atelier lui a fait.',
                    'Un véhicule reste chez nous quatre ans, un vélo électrique trois saisons, une paire de skis deux hivers. Passé ce terme, il est vendu avec son carnet, et celui qui le remplace entre dans la liste avec la mention « Nouveau ».',
                    'Ce qui est réservé reste affiché avec sa date de retour : si le van est pris jusqu’au 3 janvier, mieux vaut le savoir avant de téléphoner. Pour un objet qui n’est pas dans la liste, appelez le 027 000 00 00 : nous savons en général qui le loue dans la vallée.',
                ],
            ],
        ],
        '/rates' => [
            'label' => 'Tarifs',
            'hero' => [
                'eyebrow' => 'Tarifs et conditions',
                'title' => 'Le prix du jour, et ce qu’il y a derrière',
                'lead' => 'Quatre durées, assurance comprise. La caution, le permis et les retards sont dits ici, pas en petits caractères au dos du contrat.',
                'subject' => 'La grille des tarifs écrite à la craie derrière le comptoir',
                'links' => [['label' => 'Demander des dates', 'to' => '/book'], ['label' => 'Voir ce qui se loue', 'to' => '/fleet']],
            ],
            'story' => [
                'eyebrow' => 'Nos conditions',
                'title' => 'Pourquoi le week-end coûte moins que deux jours',
                'lead' => 'Un tarif n’est juste que si l’on comprend comment il est fait.',
                'body' => [
                    'Un objet retiré le samedi matin ne ressortirait de toute façon pas avant le lundi : le dimanche ne nous coûte presque rien, et nous ne le comptons qu’à moitié. La semaine suit la même idée, sept jours comptés quatre et demi, parce qu’un fourgon qui roule cinq jours de suite passe une seule fois à l’atelier au lieu de cinq.',
                    'La caution n’est pas un acompte. Elle est bloquée sur votre carte au retrait et libérée au retour, le temps de faire ensemble le tour de l’objet. Depuis 1987, nous en avons retenu une part moins d’une fois sur cent, presque toujours pour un plein oublié.',
                    'L’assurance casco est dans le prix, avec une franchise qui dépend de l’objet. Pour CHF 15 par jour, elle tombe à zéro : Sarah le propose au comptoir, une fois, et n’insiste pas. Jean-Marc Dubuis a toujours tenu à ce que le prix affiché soit le prix payé.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Le jour du retrait',
                'title' => 'Trois choses à avoir sur soi',
                'items' => [
                    ['title' => 'Une pièce d’identité', 'body' => 'Carte d’identité ou passeport, et le permis pour tout ce qui prend la route.', 'subject' => 'Un permis de conduire et une carte d’identité posés sur le comptoir'],
                    ['title' => 'Une carte pour la caution', 'body' => 'De crédit ou de débit. Le montant est bloqué, jamais débité, et libéré au retour.', 'subject' => 'Un terminal de paiement à côté d’un trousseau de clés numéroté'],
                    ['title' => 'Dix minutes', 'body' => 'Le temps de faire le tour de l’objet ensemble et de noter son état sur le contrat.', 'subject' => 'Sarah et un client faisant le tour d’un fourgon, le contrat à la main'],
                ],
            ],
        ],
        '/book' => [
            'hero' => [
                'eyebrow' => 'Réserver',
                'title' => 'Dites quoi, et de quand à quand',
                'lead' => 'Une demande n’est pas encore une réservation : nous vérifions que l’objet est libre et nous confirmons par téléphone ou par e-mail dans la demi-journée, du lundi au samedi.',
                'subject' => 'Le comptoir, le carnet de réservations ouvert et le tableau des clés derrière',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
            ],
            'features' => [
                'eyebrow' => 'Retirer, rendre',
                'title' => 'Le jour venu',
                'items' => [
                    ['title' => 'Au retrait', 'body' => 'Dès 7 h en semaine, 7 h 30 le samedi, avec une pièce d’identité, le permis et la carte qui portera la caution.', 'icon' => 'key'],
                    ['title' => 'Hors horaires', 'body' => 'Pour un véhicule, la boîte à clés de la cour s’ouvre avec un code envoyé la veille. À demander à la réservation.', 'icon' => 'lock'],
                    ['title' => 'Au retour', 'body' => 'Le plein fait, l’objet vidé. Le dimanche, le comptoir ouvre de 17 h à 19 h pour les retours seulement.', 'icon' => 'calendar-check'],
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Un départ demain matin ? Appelez',
                'lead' => 'Pour le jour même, le lendemain ou un objet qui n’est pas dans la liste, le téléphone va plus vite que le formulaire.',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Voir ce qui se loue', 'to' => '/fleet']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                    ['label' => 'E-mail', 'value' => 'comptoir@dubuis-location.example', 'href' => 'mailto:comptoir@dubuis-location.example'],
                    ['label' => 'Réponse', 'value' => 'Dans la demi-journée, du lundi au samedi'],
                ],
            ],
        ],
    ],
];
