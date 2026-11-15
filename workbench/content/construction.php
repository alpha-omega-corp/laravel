<?php

declare(strict_types=1);

/*
 * The demo content of a construction company: a fictional family builder of
 * sixty-four people in Bulle, in the Gruyère, on its third generation. It
 * pours structures, lays pipes and roads, puts up halls and turns old farms
 * into flats. `site` is what every page shares, `prefabs` is what the site
 * would bind as `kit.<name>` (the rows its owner keeps in the admin, in each
 * component's own prop names) and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/construction.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Corthay Construction',
        'blurb' => 'Gros œuvre, génie civil et rénovation en Gruyère et dans le Grand Fribourg, depuis 1958.',
        'address' => 'Route de la Gravière 8, 1630 Bulle',
        'phone' => '026 000 00 00',
        'email' => 'info@corthay-construction.example',
        'status' => 'Bureau ouvert jusqu’à 17 h',
        'note' => '© Corthay Construction SA, Bulle',
        'action' => ['label' => 'Demander un devis', 'to' => '/quote'],
        'band' => [
            'eyebrow' => 'Votre projet',
            'title' => 'Un terrain, un plan ou un mur qui bouge ?',
            'lead' => 'Décrivez-le en cinq minutes. Un conducteur de travaux vous rappelle sous deux jours ouvrables et passe voir sur place avant de chiffrer.',
            'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
            'details' => [
                ['label' => 'Bureau et dépôt', 'value' => 'Route de la Gravière 8, Bulle'],
                ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                ['label' => 'Bureau ouvert', 'value' => 'Lundi au vendredi, 7 h 30–12 h · 13 h 30–17 h'],
            ],
        ],
    ],

    'prefabs' => [
        'services' => [
            'title' => 'Ce que nous construisons nous-mêmes',
            'services' => [
                ['name' => 'Gros œuvre', 'line' => 'Fondations, murs porteurs et dalles en béton armé, de la villa à l’immeuble de six étages.', 'icon' => 'brick-wall', 'price' => 'Sur devis'],
                ['name' => 'Génie civil', 'line' => 'Terrassements, canalisations, routes d’accès et murs de soutènement, avec nos propres machines.', 'icon' => 'shovel', 'price' => 'Sur devis'],
                ['name' => 'Halles et bâtiments industriels', 'line' => 'Radiers, quais et structures préfabriquées pour ateliers, dépôts et bâtiments agricoles.', 'icon' => 'warehouse', 'price' => 'Sur devis'],
                ['name' => 'Villas clés en main', 'line' => 'Un seul contrat et un seul prix, du permis de construire à la remise des clés.', 'icon' => 'house', 'price' => 'Prix forfaitaire'],
                ['name' => 'Rénovation et transformation', 'line' => 'Reprises en sous-œuvre, ouvertures dans les murs porteurs, fermes et bâtiments anciens.', 'icon' => 'hammer', 'price' => 'Sur devis'],
                ['name' => 'Assainissement du béton', 'line' => 'Parkings, balcons et ponts : diagnostic, hydrodémolition et remise en état.', 'icon' => 'shield-check', 'price' => 'Sur devis'],
                ['name' => 'Aménagements extérieurs', 'line' => 'Places, murs en pierre de la région, pavages et enrobés autour de la maison ou de l’atelier.', 'icon' => 'trees', 'price' => 'Dès CHF 4 500'],
                ['name' => 'Petits travaux', 'line' => 'Un mur fissuré, une tranchée, une chape à refaire : une équipe de deux, sous dix jours.', 'icon' => 'wrench', 'price' => 'CHF 96 l’heure par maçon'],
            ],
        ],
        'projects' => [
            'title' => 'Chantiers remis',
            'projects' => [
                [
                    'name' => 'Halle d’affinage du Pré-Vert',
                    'place' => 'Vuadens',
                    'year' => 2025,
                    'kind' => 'Bâtiment industriel',
                    'figure' => '4 200 m²',
                    'figure_label' => 'de radier coulé en trois étapes',
                    'summary' => 'Radier, caves et quais de chargement pour une halle de 12 000 meules, livrée deux semaines avant la désalpe.',
                ],
                [
                    'name' => 'Résidence Les Colombettes',
                    'place' => 'Bulle',
                    'year' => 2024,
                    'kind' => 'Logement',
                    'figure' => '38',
                    'figure_label' => 'appartements sur cinq niveaux',
                    'summary' => 'Gros œuvre complet de deux immeubles et d’un parking souterrain de 52 places, en quatorze mois.',
                ],
                [
                    'name' => 'Passerelle de la Trême',
                    'place' => 'La Tour-de-Trême',
                    'year' => 2023,
                    'kind' => 'Ouvrage d’art',
                    'figure' => '46 m',
                    'figure_label' => 'de portée, en une seule travée',
                    'summary' => 'Culées et tablier mixte pour la passerelle des piétons et des vélos, posée en une nuit de grutage.',
                ],
                [
                    'name' => 'Ferme du Praz',
                    'place' => 'Charmey',
                    'year' => 2024,
                    'kind' => 'Transformation',
                    'figure' => '620 m²',
                    'figure_label' => 'de planchers repris en sous-œuvre',
                    'summary' => 'Une ferme de 1789 devenue trois logements : fondations reprises, dalles mixtes bois et béton, façades conservées.',
                ],
                [
                    'name' => 'Collecteur des Granges',
                    'place' => 'Riaz',
                    'year' => 2022,
                    'kind' => 'Génie civil',
                    'figure' => '1,8 km',
                    'figure_label' => 'de canalisations sous route ouverte',
                    'summary' => 'Séparatif des eaux claires et usées pour la commune, par tronçons de quarante mètres, sans fermer la route cantonale.',
                ],
                [
                    'name' => 'Villa des Hauts de Morlon',
                    'place' => 'Morlon',
                    'year' => 2025,
                    'kind' => 'Villa clés en main',
                    'figure' => '9 mois',
                    'figure_label' => 'du premier coup de pelle aux clés',
                    'summary' => 'Six pièces sur un terrain en pente, un mur de soutènement en pierre de la région, le prix tenu au franc près.',
                ],
            ],
        ],
        'credentials' => [
            'title' => 'Ce qu’un appel d’offres nous demande',
            'credentials' => [
                ['name' => 'ISO 9001:2015', 'detail' => 'Management de la qualité, certifiée depuis 2009'],
                ['name' => 'Société suisse des entrepreneurs', 'detail' => 'Membre de la section Fribourg depuis 1961'],
                ['name' => 'Convention nationale', 'detail' => 'Secteur principal de la construction, entreprise signataire'],
                ['name' => 'Charte de la sécurité', 'detail' => 'Signataire depuis 2012, 1 100 jours sans accident grave'],
                ['name' => 'Minergie', 'detail' => 'Onze bâtiments certifiés remis depuis 2014'],
                ['name' => 'Entreprise formatrice', 'detail' => 'Six apprentis maçons et constructeurs de routes en 2026'],
            ],
        ],
        'process' => [
            'title' => 'Un chantier, en cinq étapes',
            'intro' => 'De la première visite à la remise des clés, vous avez un seul interlocuteur et un planning que vous pouvez lire.',
            'steps' => [
                ['name' => 'Visite sur place', 'line' => 'Un conducteur de travaux vient voir le terrain ou le bâtiment, plans en main, et note ce que le devis doit couvrir.', 'duration' => 'Sous une semaine'],
                ['name' => 'Devis détaillé', 'line' => 'Un prix poste par poste, avec les quantités, ce qui est compris et ce qui ne l’est pas.', 'duration' => 'Dix jours ouvrables'],
                ['name' => 'Contrat et planning', 'line' => 'Les dates d’ouverture et de remise sont écrites au contrat, avec le nom du contremaître.', 'duration' => 'Deux semaines'],
                ['name' => 'Chantier', 'line' => 'Une séance par semaine sur place, le procès-verbal le lendemain, et un contremaître joignable tous les jours.', 'duration' => 'Selon l’ouvrage'],
                ['name' => 'Réception et garantie', 'line' => 'Nous faisons le tour de l’ouvrage avec vous ; chaque réserve est notée, puis levée sous trente jours.', 'duration' => 'Cinq ans de garantie'],
            ],
        ],
        'jobs' => [
            'title' => 'Postes ouverts',
            'intro' => 'Nous engageons pour des chantiers déjà signés. Un appel suffit : on se voit au dépôt, puis vous passez une journée sur un chantier.',
            'jobs' => [
                ['name' => 'Contremaître en bâtiment', 'place' => 'Bulle et Gruyère', 'hours' => '100 % · CDI', 'line' => 'Vous menez une équipe de six sur un chantier de logements, du radier à la dalle de toiture.', 'href' => 'mailto:emploi@corthay-construction.example?subject=Contrema%C3%AEtre%20en%20b%C3%A2timent'],
                ['name' => 'Maçon CFC', 'place' => 'Grand Fribourg', 'hours' => '100 % · CDI', 'line' => 'Coffrage, ferraillage et maçonnerie en équipe de quatre, avec un véhicule d’entreprise depuis le dépôt.', 'href' => 'mailto:emploi@corthay-construction.example?subject=Ma%C3%A7on%20CFC'],
                ['name' => 'Machiniste de chantier', 'place' => 'District de la Gruyère', 'hours' => '80–100 %', 'line' => 'Pelles de 8 à 25 tonnes sur des chantiers de canalisations et de terrassement ; permis M2 demandé.', 'href' => 'mailto:emploi@corthay-construction.example?subject=Machiniste%20de%20chantier'],
                ['name' => 'Dessinatrice ou dessinateur en génie civil', 'place' => 'Bureau de Bulle', 'hours' => '60–100 %', 'line' => 'Plans de coffrage et d’armature, métrés et dossiers d’exécution, à côté des conducteurs de travaux.', 'href' => 'mailto:emploi@corthay-construction.example?subject=Dessin%20en%20g%C3%A9nie%20civil'],
                ['name' => 'Apprentie ou apprenti maçon CFC', 'place' => 'Bulle', 'hours' => 'Rentrée d’août 2027', 'line' => 'Deux places par année ; un stage d’une semaine sur un chantier se fait avant de signer.', 'href' => 'mailto:emploi@corthay-construction.example?subject=Apprentissage%20de%20ma%C3%A7on'],
            ],
        ],
        'quote' => [
            'title' => 'Demander un devis',
            'intro' => 'Dites-nous ce que vous voulez construire et où. Nous passons voir avant de chiffrer : la visite ne coûte rien et n’engage à rien.',
            'note' => 'Un conducteur de travaux vous rappelle sous deux jours ouvrables.',
            'action' => '#quote',
            'scopes' => [
                'Construction neuve',
                'Villa clés en main',
                'Halle ou bâtiment industriel',
                'Génie civil et canalisations',
                'Rénovation ou transformation',
                'Assainissement du béton',
                'Aménagements extérieurs',
                'Petits travaux',
            ],
            'budgets' => [
                'Moins de CHF 50 000',
                'De CHF 50 000 à 250 000',
                'De CHF 250 000 à 1 million',
                'Plus de CHF 1 million',
            ],
        ],
        'map' => [
            'address' => 'Route de la Gravière 8, 1630 Bulle',
            'title' => 'Corthay Construction, bureau et dépôt',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Entreprise de construction · Bulle',
                'title' => 'Nous construisons ce que nous chiffrons',
                'lead' => 'Gros œuvre, génie civil et rénovation en Gruyère depuis 1958. Soixante-quatre personnes, nos propres machines, et un prix écrit poste par poste avant le premier coup de pelle.',
                'subject' => 'Une dalle en cours de coulage, la grue et les Préalpes derrière',
                'note' => 'Prochaine ouverture de chantier possible : mars 2027',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
                'facts' => [['value' => '1958', 'label' => 'Trois générations de Corthay'], ['value' => '64', 'label' => 'Personnes, dont six apprentis'], ['value' => '31', 'label' => 'Chantiers remis en 2025']],
            ],
            'features' => [
                'eyebrow' => 'Avant de nous appeler',
                'title' => 'Des chantiers comme le vôtre, et la façon dont ils se passent',
                'lead' => 'Trois pages suffisent pour savoir si nous sommes la bonne entreprise.',
                'items' => [
                    ['title' => 'Des ouvrages remis', 'body' => 'Halles, immeubles, passerelle et ferme transformée : chaque chantier avec son lieu, son année et le chiffre qui le mesure.', 'subject' => 'La halle d’affinage de Vuadens, façade de béton au soleil du soir', 'to' => '/projects', 'label' => 'Voir les chantiers'],
                    ['title' => 'Un déroulement écrit', 'body' => 'Cinq étapes, de la visite sur place à la réception, avec des délais que nous tenons parce qu’ils sont au contrat.', 'subject' => 'Un contremaître et une cliente devant un plan déplié sur un capot', 'to' => '/how-we-work', 'label' => 'Lire le déroulement'],
                    ['title' => 'Une équipe qui reste', 'body' => 'La moitié de nos maçons ont fait leur apprentissage ici. Cinq postes sont ouverts cette saison.', 'subject' => 'L’équipe du matin au dépôt, casques à la main', 'to' => '/careers', 'label' => 'Voir les postes ouverts'],
                ],
            ],
        ],
        '/projects' => [
            'label' => 'Chantiers',
            'hero' => [
                'eyebrow' => 'Chantiers',
                'title' => 'Ce que nous avons remis depuis 2022',
                'lead' => 'Chaque ouvrage porte son lieu, son année et le chiffre qui le mesure. Tous se visitent, avec le conducteur de travaux qui les a menés.',
                'subject' => 'La passerelle de la Trême vue de la rive, un matin de brume',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Comment se passe un chantier', 'to' => '/how-we-work']],
            ],
            'story' => [
                'eyebrow' => 'Références',
                'title' => 'Un chantier se juge trois ans après',
                'lead' => 'Nous montrons des ouvrages remis et habités, jamais une image de synthèse.',
                'body' => [
                    'Les six chantiers de cette page ont un point commun : le maître d’ouvrage accepte qu’on l’appelle. Demandez le numéro, nous le donnons avec le décompte final : le devis, les avenants et la facture côte à côte, pour comparer ce qui était promis et ce qui a été payé.',
                    'Nous menons une trentaine de chantiers par an, de la tranchée de vingt mètres à l’immeuble de trente-huit appartements. Neuf sur dix se trouvent à moins de quarante minutes du dépôt de Bulle, parce qu’un contremaître qui passe ses journées sur la route ne surveille pas son béton.',
                    'Les ouvrages d’art et les halles se font avec les bureaux d’ingénieurs de la région. Pour une villa ou une transformation, nous travaillons avec votre architecte ou avec le nôtre, selon ce que vous préférez. Et si vous voulez voir avant de croire, nous organisons la visite d’un ouvrage remis ou en cours, un vendredi après-midi, avec celui qui l’a mené.',
                ],
            ],
        ],
        '/how-we-work' => [
            'label' => 'Déroulement',
            'hero' => [
                'eyebrow' => 'Déroulement',
                'title' => 'Cinq étapes, écrites au contrat',
                'lead' => 'Avant de signer, vous savez qui vient, quand, et ce que coûte chaque poste. Le reste est une affaire de béton et de météo, et nous en répondons.',
                'subject' => 'La séance de chantier du mardi, les plans épinglés dans la baraque',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
            ],
            'story' => [
                'eyebrow' => 'Notre façon de faire',
                'title' => 'Un seul interlocuteur, du premier jour au dernier',
                'lead' => 'Le conducteur de travaux qui visite votre terrain est celui qui signe le devis et qui remet les clés.',
                'body' => [
                    'Nous avons quatre conducteurs de travaux et chacun suit six chantiers au plus. C’est peu, et c’est voulu : un chantier se perd quand celui qui a promis une date n’est plus celui qui commande le béton.',
                    'Le devis est écrit poste par poste, avec les quantités. Si le terrain réserve une surprise, une source ou un rocher que le sondage n’a pas vu, l’avenant est chiffré et signé avant que la pelle ne reparte, jamais après.',
                    'Le gros œuvre, le génie civil et la maçonnerie sont faits par nos équipes, avec nos machines. Les autres corps de métier sont des entreprises de la Gruyère avec lesquelles nous travaillons depuis des années, et c’est nous qui répondons de leur travail devant vous.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce qui ne change jamais',
                'title' => 'Trois règles, quel que soit l’ouvrage',
                'items' => [
                    ['title' => 'Un prix poste par poste', 'body' => 'Pas de forfait opaque : chaque mètre cube et chaque heure de machine sont au devis.', 'subject' => 'Un devis ouvert sur une table, les quantités surlignées', 'icon' => 'list-checks'],
                    ['title' => 'Une séance par semaine', 'body' => 'Le même jour, à la même heure, sur le chantier. Le procès-verbal arrive le lendemain.', 'subject' => 'Cinq personnes autour d’un plan dans la baraque de chantier', 'icon' => 'calendar-check'],
                    ['title' => 'Nos propres équipes', 'body' => 'Maçons, machinistes et contremaîtres sont salariés de l’entreprise, pas loués à la semaine.', 'subject' => 'Une équipe de quatre maçons devant son fourgon', 'icon' => 'hard-hat'],
                ],
            ],
        ],
        '/careers' => [
            'label' => 'Emplois',
            'hero' => [
                'eyebrow' => 'Emplois',
                'title' => 'Cinq postes ouverts, sur des chantiers déjà signés',
                'lead' => 'Salaires de la convention nationale, treizième compris, un véhicule depuis le dépôt et une équipe où l’on reste : onze ans d’ancienneté en moyenne.',
                'subject' => 'Deux maçons réglant un coffrage, la vallée derrière eux',
                'links' => [['label' => 'Appeler Julien Corthay', 'href' => 'tel:+41260000000'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
            ],
            'story' => [
                'eyebrow' => 'Travailler ici',
                'title' => 'On apprend le métier sur le chantier',
                'lead' => 'Trente et un de nos soixante-quatre collaborateurs ont commencé chez nous comme apprentis.',
                'body' => [
                    'Julien Corthay, chef d’exploitation, a fait son apprentissage de maçon dans l’entreprise avant d’y devenir contremaître. Il reçoit lui-même chaque candidat, au dépôt, et propose toujours la même chose : une journée payée sur un chantier, pour voir l’équipe avant de s’engager.',
                    'Les équipes partent du dépôt de Bulle à 6 h 45 et y reviennent avant 17 h ; le vendredi, la journée finit à 15 h 30. Le parc de machines a moins de six ans et chaque équipe a son fourgon, son matériel et son contremaître attitré.',
                    'Nous payons les cours de chef d’équipe et de contremaître à ceux qui veulent monter, ainsi que le permis de machiniste. Ceux qui préfèrent rester à la truelle sont tout aussi bienvenus : un bon maçon de cinquante ans vaut de l’or sur un chantier.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce que nous offrons',
                'title' => 'Au-delà du salaire',
                'items' => [
                    ['title' => 'Formation payée', 'body' => 'Cours de chef d’équipe, de contremaître et permis de machiniste, pris sur le temps de travail.', 'subject' => 'Un apprenti et son contremaître traçant un coffrage', 'icon' => 'graduation-cap'],
                    ['title' => 'Vendredi 15 h 30', 'body' => 'Quarante heures et demie par semaine, et le vendredi après-midi pour soi.', 'subject' => 'Le dépôt le vendredi après-midi, les fourgons rentrés', 'icon' => 'clock'],
                    ['title' => 'Matériel récent', 'body' => 'Des machines de moins de six ans et un fourgon équipé par équipe.', 'subject' => 'Une pelle de vingt tonnes neuve dans la cour du dépôt', 'icon' => 'truck'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Candidature spontanée',
                'title' => 'Votre métier n’est pas dans la liste ?',
                'lead' => 'Grutiers, coffreurs, constructeurs de routes : écrivez-nous ou passez au dépôt un matin, Julien Corthay y est dès 6 h 30.',
                'links' => [['label' => 'Écrire à l’exploitation', 'href' => 'mailto:emploi@corthay-construction.example'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
                'details' => [
                    ['label' => 'Chef d’exploitation', 'value' => 'Julien Corthay'],
                    ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                    ['label' => 'Dépôt', 'value' => 'Route de la Gravière 8, Bulle'],
                ],
            ],
        ],
        '/quote' => [
            'label' => 'Devis',
            'hero' => [
                'eyebrow' => 'Devis',
                'title' => 'Un chiffre écrit, sous dix jours',
                'lead' => 'Décrivez l’ouvrage et le lieu. Nous rappelons sous deux jours ouvrables, passons voir sur place, puis envoyons un devis détaillé, poste par poste.',
                'subject' => 'L’entrée du dépôt, route de la Gravière, les camions rangés',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Comment se passe un chantier', 'to' => '/how-we-work']],
            ],
            'features' => [
                'eyebrow' => 'Pour chiffrer juste',
                'title' => 'Ce qui nous aide, si vous l’avez',
                'items' => [
                    ['title' => 'Les plans', 'body' => 'Même une esquisse d’architecte ou un extrait du cadastre : nous demanderons le reste lors de la visite.', 'subject' => 'Un plan d’architecte annoté au crayon rouge', 'icon' => 'pencil-ruler'],
                    ['title' => 'L’accès', 'body' => 'Une route étroite, une pente ou un voisin proche changent le choix des machines, donc le prix.', 'subject' => 'Un chemin étroit qui monte vers une parcelle en pente', 'icon' => 'truck'],
                    ['title' => 'La date', 'body' => 'Dites-nous quand l’ouvrage doit servir : nous répondons franchement si le délai est tenable.', 'subject' => 'Un planning de chantier affiché au mur du bureau', 'icon' => 'calendar-check'],
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Plutôt passer au bureau ?',
                'lead' => 'Élise Corthay et les conducteurs de travaux reçoivent sur rendez-vous, plans sur la table. Le café est offert, le parking est devant le dépôt.',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Voir nos chantiers', 'to' => '/projects']],
                'details' => [
                    ['label' => 'Bureau et dépôt', 'value' => 'Route de la Gravière 8, Bulle'],
                    ['label' => 'Bureau ouvert', 'value' => 'Lundi au vendredi, 7 h 30–12 h · 13 h 30–17 h'],
                    ['label' => 'Accès', 'value' => 'Sortie A12 Bulle, cinq minutes'],
                ],
            ],
        ],
    ],
];
