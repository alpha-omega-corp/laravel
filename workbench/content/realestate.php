<?php

declare(strict_types=1);

/*
 * The demo content of an estate agency: a fictional family régie in Vevey,
 * three generations at one address, selling and letting between the old town
 * and the vineyards of Lavaux and managing thirty-eight buildings. `site` is
 * what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/realestate.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Régie Vernay',
        'blurb' => 'Vente, location et gérance entre Vevey et Lavaux, depuis 1964.',
        'address' => 'Rue du Simplon 18, 1800 Vevey',
        'phone' => '021 000 00 00',
        'email' => 'contact@regie-vernay.example',
        'status' => 'Trois nouveaux objets cette semaine',
        'note' => '© Régie Vernay SA',
        'action' => ['label' => 'Estimer mon bien', 'to' => '/valuation'],
        'band' => [
            'eyebrow' => 'Vendre ou louer',
            'title' => 'Que vaut votre bien aujourd’hui ?',
            'lead' => 'Une visite d’une heure, puis une valeur argumentée par écrit sous cinq jours. L’estimation est offerte et ne vous engage à rien.',
            'links' => [['label' => 'Demander une estimation', 'to' => '/valuation'], ['label' => 'Voir les objets', 'to' => '/properties']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue du Simplon 18, Vevey'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Horaires', 'value' => 'Lundi–vendredi, 8 h 30–12 h et 13 h 30–18 h'],
            ],
        ],
    ],

    'prefabs' => [
        'listings' => [
            'title' => 'Sur le marché',
            'listings' => [
                [
                    'name' => 'Maison vigneronne rénovée',
                    'place' => 'Chardonne',
                    'price' => 'CHF 1 780 000.–',
                    'status' => 'Nouveau',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '6,5'],
                        ['label' => 'Surface', 'value' => '210 m²'],
                        ['label' => 'Étage', 'value' => 'Trois niveaux'],
                        ['label' => 'Disponible', 'value' => 'À convenir'],
                    ],
                ],
                [
                    'name' => 'Appartement 3,5 pièces avec balcon',
                    'place' => 'Rue du Simplon, Vevey',
                    'price' => 'CHF 1 890.–/mois',
                    'status' => 'Nouveau',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '3,5'],
                        ['label' => 'Surface', 'value' => '82 m²'],
                        ['label' => 'Étage', 'value' => '3e, ascenseur'],
                        ['label' => 'Disponible', 'value' => '1er janvier'],
                    ],
                ],
                [
                    'name' => 'Studio sous les toits',
                    'place' => 'Rue du Lac, Vevey',
                    'price' => 'CHF 1 150.–/mois',
                    'status' => 'Nouveau',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '1'],
                        ['label' => 'Surface', 'value' => '34 m²'],
                        ['label' => 'Étage', 'value' => '5e, sans ascenseur'],
                        ['label' => 'Disponible', 'value' => 'De suite'],
                    ],
                ],
                [
                    'name' => 'Appartement 4,5 pièces, vue sur le lac',
                    'place' => 'La Tour-de-Peilz',
                    'price' => 'CHF 1 240 000.–',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '4,5'],
                        ['label' => 'Surface', 'value' => '118 m²'],
                        ['label' => 'Étage', 'value' => '2e, ascenseur'],
                        ['label' => 'Disponible', 'value' => 'Printemps 2027'],
                    ],
                ],
                [
                    'name' => 'Duplex en attique',
                    'place' => 'Corseaux',
                    'price' => 'CHF 3 450.–/mois',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '5,5'],
                        ['label' => 'Surface', 'value' => '146 m²'],
                        ['label' => 'Étage', 'value' => '4e et 5e'],
                        ['label' => 'Disponible', 'value' => '1er février'],
                    ],
                ],
                [
                    'name' => 'Villa mitoyenne avec jardin',
                    'place' => 'Blonay',
                    'price' => 'CHF 1 395 000.–',
                    'status' => 'Réservé',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '5,5'],
                        ['label' => 'Surface', 'value' => '165 m²'],
                        ['label' => 'Étage', 'value' => 'Deux niveaux'],
                        ['label' => 'Disponible', 'value' => 'À convenir'],
                    ],
                ],
                [
                    'name' => 'Appartement 2,5 pièces près de la gare',
                    'place' => 'Avenue de la Gare, Vevey',
                    'price' => 'CHF 1 480.–/mois',
                    'status' => 'Réservé',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '2,5'],
                        ['label' => 'Surface', 'value' => '58 m²'],
                        ['label' => 'Étage', 'value' => '1er'],
                        ['label' => 'Disponible', 'value' => '15 décembre'],
                    ],
                ],
                [
                    'name' => 'Arcade avec vitrine',
                    'place' => 'Rue des Deux-Marchés, Vevey',
                    'price' => 'CHF 2 600.–/mois',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => 'Arcade et dépôt'],
                        ['label' => 'Surface', 'value' => '74 m²'],
                        ['label' => 'Étage', 'value' => 'Rez-de-chaussée'],
                        ['label' => 'Disponible', 'value' => '1er mars'],
                    ],
                ],
                [
                    'name' => 'Appartement 3,5 pièces, immeuble 1900',
                    'place' => 'Quai Perdonnet, Vevey',
                    'price' => 'Prix sur demande',
                    'status' => 'Vendu',
                    'facts' => [
                        ['label' => 'Pièces', 'value' => '3,5'],
                        ['label' => 'Surface', 'value' => '96 m²'],
                        ['label' => 'Étage', 'value' => '1er, sans ascenseur'],
                        ['label' => 'Disponible', 'value' => 'Vendu en octobre'],
                    ],
                ],
            ],
        ],
        'services' => [
            'title' => 'Ce que la régie fait pour un propriétaire',
            'services' => [
                ['name' => 'Vente', 'line' => 'Estimation, photographies, visites et négociation, jusque chez le notaire.', 'icon' => 'house', 'price' => '3 % du prix de vente'],
                ['name' => 'Mise en location', 'line' => 'Annonce, visites, dossiers vérifiés et bail signé : vous choisissez le locataire, nous faisons le reste.', 'icon' => 'key-round', 'price' => 'un loyer mensuel'],
                ['name' => 'Gérance d’immeubles', 'line' => 'Loyers encaissés, charges décomptées, travaux suivis : un seul interlocuteur pour votre immeuble.', 'icon' => 'building-2', 'price' => 'dès 4 % des loyers'],
                ['name' => 'Estimation', 'line' => 'Une visite d’une heure, puis une valeur argumentée par écrit sous cinq jours.', 'icon' => 'calculator', 'price' => 'offerte'],
                ['name' => 'Administration de PPE', 'line' => 'Assemblées, comptes et fonds de rénovation : la copropriété tenue à jour, année après année.', 'icon' => 'users', 'price' => 'sur devis'],
                ['name' => 'Expertise pour succession', 'line' => 'Un rapport signé qu’un notaire, une banque ou un tribunal accepte tel quel.', 'icon' => 'file-text', 'price' => 'dès CHF 480'],
            ],
        ],
        'testimonials' => [
            'title' => 'Ils nous ont confié leur bien',
            'testimonials' => [
                ['quote' => 'Nous avions peur de vendre trop bas la maison de nos parents. Mme Vernay a posé un prix, expliqué pourquoi, et l’a tenu : signé en sept semaines, sans rabais.', 'name' => 'Anne et Pierre Golay', 'role' => 'Vendeurs, Corsier-sur-Vevey'],
                ['quote' => 'Je vis à Zurich et je possède un immeuble de huit appartements à Vevey. Je reçois un décompte clair chaque trimestre et je n’ai pas eu un logement vide depuis 2019.', 'name' => 'Thomas Keller', 'role' => 'Propriétaire, immeuble en gérance'],
                ['quote' => 'Le courtier nous a dit ce qui n’allait pas avant que nous posions la question : une toiture à refaire dans cinq ans, chiffrée. Nous avons acheté en connaissance de cause.', 'name' => 'Laure Monney', 'role' => 'Acheteuse, La Tour-de-Peilz'],
            ],
        ],
        'team' => [
            'title' => 'Vos interlocuteurs',
            'members' => [
                ['name' => 'Claire Vernay', 'role' => 'Directrice, courtière brevetée', 'bio' => 'Petite-fille du fondateur. Vend la vieille ville de Vevey et La Tour-de-Peilz depuis 2008.'],
                ['name' => 'Marc Aubert', 'role' => 'Courtier, ventes en Lavaux', 'bio' => 'Chardonne, Corseaux, Saint-Saphorin : il connaît les maisons vigneronnes par le nom de leurs propriétaires.'],
                ['name' => 'Sophie Nicolet', 'role' => 'Courtière, locations', 'bio' => 'Une centaine de baux signés par an à Vevey et à Corsier. Répond à chaque dossier en 48 heures.'],
                ['name' => 'Julien Rochat', 'role' => 'Gérant d’immeubles', 'bio' => 'Trente-huit immeubles, 412 logements, et un seul numéro pour les propriétaires comme pour les locataires.'],
                ['name' => 'Nadia Ferreira', 'role' => 'Experte en estimations', 'bio' => 'Montreux, Clarens, Blonay. Cent quarante estimations par an, chacune après une visite sur place.'],
                ['name' => 'Luc Bovay', 'role' => 'Comptable des gérances et des PPE', 'bio' => 'Tient les comptes de quatorze copropriétés et les décomptes de charges, au franc près.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander une visite ou une estimation',
            'intro' => 'Indiquez l’objet à visiter ou l’adresse du bien à estimer, et un jour qui vous convient : nous confirmons par téléphone ou par e-mail dans la journée.',
            'action' => '#booking',
            'services' => ['Visite d’un objet', 'Estimation de mon bien', 'Mise en location', 'Gérance d’un immeuble'],
        ],
        'map' => [
            'address' => 'Rue du Simplon 18, 1800 Vevey',
            'title' => 'Régie Vernay',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Régie immobilière · Vevey et Lavaux',
                'title' => 'Vendre, louer, gérer entre Vevey et Lavaux, depuis 1964',
                'lead' => 'Une régie de famille au 18 de la rue du Simplon. Neuf objets sur le marché cette semaine, trente-huit immeubles en gérance, et six personnes qui connaissent chaque rue par ses prix.',
                'subject' => 'Les toits de la vieille ville de Vevey vus du lac, les vignes de Lavaux au-dessus',
                'note' => 'Nouveau cette semaine : une maison vigneronne à Chardonne',
                'links' => [['label' => 'Voir les objets', 'to' => '/properties'], ['label' => 'Faire estimer mon bien', 'to' => '/valuation']],
                'facts' => [['value' => '61', 'label' => 'Ventes signées en 2025'], ['value' => '38', 'label' => 'Immeubles en gérance'], ['value' => '74 j', 'label' => 'Délai moyen de vente']],
            ],
            'features' => [
                'eyebrow' => 'La régie',
                'title' => 'Trois métiers sous un même toit',
                'lead' => 'Vendre, louer, gérer : le même bureau, les mêmes personnes, et un dossier qui ne change pas de mains.',
                'items' => [
                    ['title' => 'Sur le marché', 'body' => 'Neuf objets à vendre et à louer entre Vevey, La Tour-de-Peilz et Lavaux, mis à jour chaque matin.', 'subject' => 'Un séjour traversant, parquet ancien et fenêtres sur le lac', 'to' => '/properties', 'label' => 'Tous les objets'],
                    ['title' => 'Vendre avec nous', 'body' => 'Une estimation argumentée, un prix tenu et une vente signée en 74 jours en moyenne.', 'subject' => 'Une courtière remettant des clés à un couple sur un pas de porte', 'to' => '/selling', 'label' => 'Notre façon de vendre'],
                    ['title' => 'Six personnes, un secteur chacune', 'body' => 'De la vieille ville aux hauts de Blonay, chaque courtier a ses rues et y vend depuis des années.', 'subject' => 'L’équipe devant la vitrine de la régie, rue du Simplon', 'to' => '/agency', 'label' => 'Rencontrer l’équipe'],
                ],
            ],
        ],
        '/properties' => [
            'label' => 'Objets',
            'hero' => [
                'eyebrow' => 'Sur le marché',
                'title' => 'Neuf objets à vendre et à louer',
                'lead' => 'La liste est tenue à jour chaque matin. Ce qui est réservé ou vendu le dit et reste affiché quelques semaines : c’est aussi la preuve de ce que nous vendons, et à quel rythme.',
                'subject' => 'La façade d’une maison vigneronne à Chardonne, volets verts et treille',
                'links' => [['label' => 'Demander une visite', 'to' => '/valuation']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Visiter, louer, acheter',
                'items' => [
                    ['title' => 'Les visites', 'body' => 'Du lundi au samedi, sur rendez-vous, avec le courtier qui connaît l’objet. Jamais de visites groupées.', 'subject' => 'Un courtier ouvrant la porte d’un appartement à deux visiteurs', 'to' => '/valuation', 'label' => 'Demander une visite'],
                    ['title' => 'Le dossier de location', 'body' => 'Pièce d’identité, trois dernières fiches de salaire, extrait des poursuites de moins de trois mois. Déposé avant la visite, il reçoit une réponse en 48 heures.', 'subject' => 'Un dossier de candidature posé sur le comptoir de la régie'],
                    ['title' => 'Le financement', 'body' => 'Pour un achat, comptez 20 % de fonds propres. Nous vous présentons deux banques de la place, sans commission.', 'subject' => 'Un plan de financement annoté, une calculatrice à côté'],
                ],
            ],
        ],
        '/selling' => [
            'label' => 'Vendre',
            'hero' => [
                'eyebrow' => 'Vendre avec nous',
                'title' => 'Un prix juste dès le premier jour, tenu jusqu’à la signature',
                'lead' => 'Nous estimons, photographions, faisons visiter et négocions jusque chez le notaire. En 2025, nos ventes se sont signées à 97 % du prix affiché, en 74 jours en moyenne.',
                'subject' => 'Une courtière remettant des clés à un couple sur un pas de porte',
                'links' => [['label' => 'Faire estimer mon bien', 'to' => '/valuation'], ['label' => 'Voir ce que nous vendons', 'to' => '/properties']],
            ],
            'story' => [
                'eyebrow' => 'Notre façon de faire',
                'title' => 'Pourquoi nous refusons de surestimer',
                'lead' => 'Un bien affiché trop haut se vend plus tard et moins cher : nous préférons perdre un mandat que le promettre.',
                'body' => [
                    'La tentation, pour décrocher un mandat, est d’annoncer au propriétaire le chiffre qu’il espère. Le marché corrige en trois mois : l’annonce vieillit, les acheteurs la reconnaissent, et la baisse de prix devient l’argument de leur offre. Nous avons vu des maisons perdre ainsi un dixième de ce qu’elles valaient.',
                    'Notre estimation s’appuie sur les ventes réellement signées dans votre rue, pas sur les prix affichés. Nous en tenons le registre depuis 1964, et nous vous montrons les trois transactions comparables qui fondent notre chiffre. Si vous n’êtes pas d’accord, nous en discutons pièce par pièce.',
                    'Ensuite, chaque acheteur est reçu seul, par le courtier qui a estimé le bien et qui en connaît les défauts. Vous recevez un compte rendu après chaque visite, et aucune offre ne vous est transmise sans une attestation de financement.',
                ],
            ],
            'features' => [
                'eyebrow' => 'De l’estimation à l’acte',
                'title' => 'Une vente, en trois temps',
                'items' => [
                    ['title' => 'L’estimation', 'body' => 'Une visite d’une heure, puis une valeur argumentée par écrit sous cinq jours, avec les ventes comparables de votre rue.', 'subject' => 'Une experte mesurant un séjour, plan à la main', 'to' => '/valuation', 'label' => 'Demander une estimation'],
                    ['title' => 'La mise en valeur', 'body' => 'Photographies par un professionnel, plans redessinés, dossier complet : l’annonce paraît quand tout est prêt, pas avant.', 'subject' => 'Un photographe cadrant une cuisine baignée de lumière'],
                    ['title' => 'La signature', 'body' => 'Nous préparons l’acte avec le notaire de votre choix et restons à vos côtés jusqu’à la remise des clés.', 'subject' => 'Deux mains signant un acte sur le bureau d’un notaire'],
                ],
            ],
        ],
        '/agency' => [
            'label' => 'La régie',
            'hero' => [
                'eyebrow' => 'La régie',
                'title' => 'Trois générations au 18 de la rue du Simplon',
                'lead' => 'Henri Vernay a ouvert la régie en 1964 avec quatre immeubles en gérance. Sa petite-fille Claire la dirige aujourd’hui, avec cinq collègues et le même registre des ventes.',
                'subject' => 'La vitrine de la régie, rue du Simplon, les annonces affichées',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/valuation']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1964',
                'title' => 'Une régie qui n’a jamais quitté sa rue',
                'lead' => 'Soixante-deux ans d’adresses, de prix et de propriétaires : c’est ce registre qui fait notre métier.',
                'body' => [
                    'En 1964, Henri Vernay quitte une banque de la place pour gérer les quatre immeubles d’un oncle. Il loue une arcade au 18 de la rue du Simplon, y installe un bureau et un classeur, et note chaque bail et chaque vente du quartier. Le classeur compte aujourd’hui plus de six mille fiches.',
                    'Son fils Bernard développe la vente dans les années 1980, quand les vignerons de Lavaux commencent à céder des maisons que leurs enfants ne reprennent pas. La régie apprend alors à vendre des biens qui ne ressemblent à aucun autre : caves voûtées, pressoirs, parcelles en terrasses.',
                    'Claire Vernay reprend la direction en 2016. Nous sommes six, chacun avec son secteur, et la moitié de nos mandats nous viennent d’un ancien client. Nous n’avons pas de succursale et n’en voulons pas : au-delà de Montreux et de Saint-Saphorin, nous vous adressons à un confrère.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Nos secteurs',
                'title' => 'Les rues que nous connaissons',
                'items' => [
                    ['title' => 'Vevey et La Tour-de-Peilz', 'body' => 'Immeubles 1900 du quai, vieille ville, quartier de la gare : l’essentiel de nos locations et de nos appartements à vendre.', 'subject' => 'Le quai Perdonnet et ses façades 1900 au petit matin'],
                    ['title' => 'Lavaux', 'body' => 'Chardonne, Corseaux, Saint-Saphorin : maisons vigneronnes et villas en terrasses, souvent vendues avant d’être annoncées.', 'subject' => 'Des vignes en terrasses au-dessus de Saint-Saphorin'],
                    ['title' => 'Les hauts', 'body' => 'Blonay, Saint-Légier, Corsier : villas familiales avec jardin, à vingt minutes du lac par le train des Pléiades.', 'subject' => 'Une villa et son jardin à Blonay, les Préalpes derrière'],
                ],
            ],
        ],
        '/valuation' => [
            'hero' => [
                'eyebrow' => 'Visite ou estimation',
                'title' => 'Dites-nous quel bien, et quel jour vous convient',
                'lead' => 'Pour une visite, nommez l’objet. Pour une estimation, l’adresse suffit : un courtier passe une heure sur place et vous recevez une valeur argumentée par écrit sous cinq jours. C’est offert, et cela ne vous engage à rien.',
                'subject' => 'Une experte mesurant un séjour, plan à la main',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            ],
            'story' => [
                'eyebrow' => 'L’estimation',
                'title' => 'Ce que vous recevez, et ce que nous regardons',
                'lead' => 'Pas un chiffre lancé au téléphone : un rapport de six pages que vous pouvez montrer à votre banque.',
                'body' => [
                    'Nous commençons par visiter. L’état de la toiture, l’orientation, le bruit de la rue à dix-sept heures : rien de cela ne figure dans un formulaire en ligne, et c’est pourtant ce qui fait le prix. Comptez une heure pour un appartement, deux pour une maison.',
                    'Le rapport donne une fourchette, le prix que nous afficherions et les trois ventes comparables qui le fondent, tirées de notre registre et non des annonces. Il indique aussi, chiffrés, les travaux qu’un acheteur déduira.',
                    'L’estimation en vue d’une vente est offerte. Pour une succession, un divorce ou une banque, nous établissons une expertise signée dès CHF 480. Dans les deux cas, vous restez libre de vendre seul, plus tard ou jamais.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Pour préparer la visite',
                'title' => 'Trois choses à avoir sous la main',
                'items' => [
                    ['title' => 'L’extrait du registre foncier', 'body' => 'Il dit ce que vous possédez exactement : la parcelle, les servitudes, les parts de copropriété.', 'subject' => 'Un extrait du registre foncier posé sur une table'],
                    ['title' => 'Les plans', 'body' => 'Même anciens, même à la main : ils nous évitent de remesurer chaque pièce.', 'subject' => 'Des plans d’architecte déroulés sur un parquet'],
                    ['title' => 'Les travaux récents', 'body' => 'Factures de toiture, de chauffage ou de cuisine : ce qui est fait n’est plus à déduire du prix.', 'subject' => 'Une chaudière neuve dans une cave voûtée'],
                ],
            ],
        ],
    ],
];
