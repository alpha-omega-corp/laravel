<?php

declare(strict_types=1);

/*
 * The demo content of a transport firm: a fictional family carrier and removal
 * company with fourteen vehicles and a depot in Yverdon-les-Bains. `site` is
 * what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/transport.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Girod Transports',
        'blurb' => 'Déménagements, palettes et courses express depuis le dépôt d’Yverdon-les-Bains, dans toute la Suisse romande.',
        'address' => 'Rue de l’Industrie 18, 1400 Yverdon-les-Bains',
        'phone' => '024 000 00 00',
        'email' => 'devis@girod-transports.example',
        'status' => 'Exploitation ouverte jusqu’à 18 h',
        'note' => '© Girod Transports SA',
        'action' => ['label' => 'Demander un devis', 'to' => '/quote'],
        'band' => [
            'eyebrow' => 'Votre transport',
            'title' => 'Un volume, deux adresses, une date',
            'lead' => 'Décrivez-nous ce qu’il faut déplacer : le chiffre arrive sous un jour ouvrable, et le forfait signé après la visite ne bouge plus.',
            'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
            'details' => [
                ['label' => 'Dépôt', 'value' => 'Rue de l’Industrie 18, Yverdon-les-Bains'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Exploitation', 'value' => 'Lundi–vendredi 7 h–18 h, samedi 8 h–12 h'],
            ],
        ],
    ],

    'prefabs' => [
        'services' => [
            'title' => 'Ce que nous transportons',
            'services' => [
                ['name' => 'Déménagement de particuliers', 'line' => 'Du studio à la maison de sept pièces : nous emballons, portons et remontons les meubles à l’arrivée.', 'icon' => 'house', 'price' => 'Dès CHF 160 l’heure'],
                ['name' => 'Déménagement d’entreprises', 'line' => 'Bureaux, archives et informatique déplacés le week-end, pour que vous rouvriez le lundi matin.', 'icon' => 'building-2', 'price' => 'Sur devis'],
                ['name' => 'Palettes et groupage', 'line' => 'Vos palettes prises à quai avant 16 h et livrées le lendemain partout en Suisse romande.', 'icon' => 'forklift', 'price' => 'Dès CHF 68 la palette'],
                ['name' => 'Courses express', 'line' => 'Un pli, un colis ou une pièce urgente : un fourgon part dans l’heure, de Genève à Berne.', 'icon' => 'zap', 'price' => 'CHF 1.90 le kilomètre'],
                ['name' => 'Garde-meubles', 'line' => 'Des boxes fermés, chauffés et assurés au dépôt d’Yverdon, loués au mois, sans durée minimale.', 'icon' => 'warehouse', 'price' => 'CHF 14 le m³ par mois'],
                ['name' => 'Pianos et objets lourds', 'line' => 'Pianos droits et à queue, coffres-forts, machines d’atelier : une équipe de trois et le matériel qu’il faut.', 'icon' => 'piano', 'price' => 'Dès CHF 380'],
            ],
        ],
        'credentials' => [
            'title' => 'Licences, assurances et réseaux',
            'credentials' => [
                ['name' => 'ASTAG', 'detail' => 'Association suisse des transports routiers, section Vaud, membre depuis 1964'],
                ['name' => 'Licence de transport de marchandises', 'detail' => 'Office fédéral des transports, renouvelée en 2023 pour cinq ans'],
                ['name' => 'Swiss Movers Association', 'detail' => 'Membre depuis 2009, conditions générales de la branche'],
                ['name' => 'Responsabilité civile transporteur', 'detail' => 'Marchandises couvertes jusqu’à CHF 500 000 par chargement'],
                ['name' => 'ISO 9001:2015', 'detail' => 'Management de la qualité, certifiée depuis 2016'],
                ['name' => 'Entreprise formatrice', 'detail' => 'Trois apprentis conducteurs de véhicules lourds CFC en 2026'],
            ],
        ],
        'pricing' => [
            'title' => 'Trois façons de compter',
            'intro' => 'À l’heure pour un petit volume, au mètre cube pour un logement entier, au kilomètre pour une course ou une palette isolée.',
            'note' => 'Prix hors TVA de 8,1 %. Le trajet depuis le dépôt et la RPLP sont compris ; le monte-meubles avec son opérateur est facturé CHF 140 l’heure.',
            'plans' => [
                [
                    'name' => 'À l’heure',
                    'price' => 'CHF 160',
                    'period' => 'par heure',
                    'line' => 'Pour un studio ou un deux-pièces, quand les cartons sont faits et que l’accès est simple.',
                    'includes' => ['Camion de 20 m³ et deux déménageurs', 'Couvertures, sangles et chariots', 'Assurance jusqu’à CHF 50 000', 'Compté au quart d’heure, trajet compris'],
                    'href' => 'tel:+41240000000',
                    'label' => 'Réserver par téléphone',
                ],
                [
                    'name' => 'Au mètre cube',
                    'price' => 'CHF 95',
                    'period' => 'par m³',
                    'line' => 'Pour un logement entier : nous passons voir, comptons le volume, et le prix ne bouge plus.',
                    'includes' => ['Camion de 40 m³ et trois déménageurs', 'Couvertures, sangles et chariots', 'Assurance jusqu’à CHF 100 000', 'Forfait signé après la visite'],
                    'href' => 'mailto:devis@girod-transports.example?subject=Visite%20avant%20d%C3%A9m%C3%A9nagement',
                    'label' => 'Demander une visite',
                    'featured' => true,
                    'flag' => 'Prix fixe après visite',
                ],
                [
                    'name' => 'Au kilomètre',
                    'price' => 'CHF 1.90',
                    'period' => 'par kilomètre',
                    'line' => 'Pour une course express ou une palette isolée, de quai à quai, sans portage à l’étage.',
                    'includes' => ['Fourgon de 12 m³ et un chauffeur', 'Sangles, transpalette et hayon', 'Assurance jusqu’à CHF 20 000', 'Départ dans l’heure, minimum CHF 45'],
                    'href' => 'tel:+41240000000',
                    'label' => 'Appeler l’exploitation',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Ce qu’on nous demande au téléphone',
            'entries' => [
                ['question' => 'Mes meubles sont-ils assurés pendant le transport ?', 'answer' => 'Oui, sans franchise : jusqu’à CHF 50 000 à l’heure et CHF 100 000 au forfait. Pour un tableau, un piano ou une cave à vin, annoncez la valeur à la visite et nous étendons la couverture pour le jour du transport.'],
                ['question' => 'Combien de temps à l’avance faut-il réserver ?', 'answer' => 'Dix jours suffisent en milieu de mois. Autour du 1er avril, du 1er juillet et du 1er octobre, les dates de fin de bail du canton, comptez six semaines.'],
                ['question' => 'Qui demande l’autorisation de stationner ?', 'answer' => 'Nous. La demande de places réservées est déposée à la commune dix jours avant et les panneaux sont posés la veille. L’émolument communal, de CHF 40 à 120 selon la ville, est refacturé tel quel.'],
                ['question' => 'Dois-je tout emballer moi-même ?', 'answer' => 'Comme vous voulez. Nous livrons les cartons deux semaines avant, à CHF 3.50 pièce, ou une équipe emballe la veille à CHF 65 l’heure par personne. Les penderies et les housses de matelas sont prêtées.'],
                ['question' => 'Et si le déménagement dure plus longtemps que prévu ?', 'answer' => 'Au forfait, rien ne change : le prix signé après la visite est celui de la facture. À l’heure, nous comptons au quart d’heure et le chef d’équipe vous annonce le dépassement avant de continuer.'],
                ['question' => 'Comment se règle la facture ?', 'answer' => 'Par carte ou TWINT au chef d’équipe le jour même pour les particuliers, sur facture à trente jours pour les entreprises. Aucun acompte n’est demandé en dessous de CHF 5 000.'],
                ['question' => 'Livrez-vous hors de Suisse romande ?', 'answer' => 'Oui : Zurich, Bâle et le Tessin chaque semaine, la France voisine et l’Italie du Nord sur demande, formalités de douane comprises. Appelez l’exploitation au 024 000 00 00 pour connaître le prochain départ.'],
            ],
        ],
        'jobs' => [
            'title' => 'Postes ouverts',
            'intro' => 'Quatre postes à repourvoir au dépôt d’Yverdon. Une journée d’essai, payée, se fait avant de signer.',
            'jobs' => [
                ['name' => 'Chauffeuse ou chauffeur poids lourd C/CE', 'place' => 'Yverdon-les-Bains', 'hours' => '100 % · CDI', 'line' => 'Tournées de palettes en Suisse romande au volant d’un 26 tonnes à hayon : départ du dépôt à 6 h, retour avant 16 h 30.', 'href' => 'mailto:emploi@girod-transports.example?subject=Chauffeur%20poids%20lourd'],
                ['name' => 'Déménageuse ou déménageur', 'place' => 'Nord vaudois', 'hours' => '80–100 %', 'line' => 'En équipe de trois chez des particuliers : démontage, portage et remontage. Permis B demandé, permis C1 payé après un an.', 'href' => 'mailto:emploi@girod-transports.example?subject=D%C3%A9m%C3%A9nageur'],
                ['name' => 'Disponente ou disponent', 'place' => 'Dépôt d’Yverdon', 'hours' => '60–100 %', 'line' => 'Vous composez les tournées de quatorze véhicules, répondez aux clients et suivez les chauffeurs, à deux au bureau d’exploitation.', 'href' => 'mailto:emploi@girod-transports.example?subject=Disponent'],
                ['name' => 'Apprentie ou apprenti conducteur de véhicules lourds CFC', 'place' => 'Yverdon-les-Bains', 'hours' => 'Rentrée d’août 2027', 'line' => 'Trois ans entre la route, l’atelier et l’école professionnelle ; un stage d’une semaine se fait avant de signer.', 'href' => 'mailto:emploi@girod-transports.example?subject=Apprentissage'],
            ],
        ],
        'quote' => [
            'title' => 'Demander un devis',
            'intro' => 'Dites-nous quoi, d’où à où et pour quand. Au-delà d’un trois-pièces, nous passons voir avant de chiffrer : la visite est gratuite.',
            'note' => 'L’exploitation vous répond avec un chiffre sous un jour ouvrable.',
            'action' => '#quote',
            'scopes' => [
                'Déménagement d’appartement',
                'Déménagement de maison',
                'Déménagement d’entreprise',
                'Palettes et groupage',
                'Course express',
                'Garde-meubles',
                'Piano ou objet lourd',
            ],
            'budgets' => [
                'Moins de CHF 500',
                'De CHF 500 à 1 500',
                'De CHF 1 500 à 4 000',
                'Plus de CHF 4 000',
            ],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Déménagements et transports · Yverdon-les-Bains',
                'title' => 'Ce que vous nous confiez arrive entier, à l’heure dite',
                'lead' => 'Quatorze véhicules et trente-deux personnes au dépôt d’Yverdon : déménagements, palettes et courses express dans toute la Suisse romande, depuis 1958.',
                'subject' => 'Un camion de déménagement à quai devant le dépôt, hayon ouvert',
                'note' => 'Prochaine date de déménagement libre : jeudi 26 novembre',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
                'facts' => [['value' => '14', 'label' => 'Véhicules au dépôt'], ['value' => '1958', 'label' => 'Trois générations'], ['value' => '24 h', 'label' => 'Pour votre devis']],
            ],
            'features' => [
                'eyebrow' => 'Le dépôt',
                'title' => 'Un prix, une équipe, un camion',
                'lead' => 'Trois raisons pour lesquelles on nous rappelle au déménagement suivant.',
                'items' => [
                    ['title' => 'Des tarifs affichés', 'body' => 'À l’heure, au mètre cube ou au kilomètre : les prix sont publiés, et le forfait signé après la visite est celui de la facture.', 'subject' => 'Un chef d’équipe mesurant un salon, bloc-notes à la main', 'to' => '/rates', 'label' => 'Tous les tarifs'],
                    ['title' => 'Nos propres équipes', 'body' => 'Chauffeurs et déménageurs sont salariés de la maison, formés chez nous, et l’équipe qui charge est celle qui décharge.', 'subject' => 'Trois déménageurs portant un buffet dans un escalier', 'to' => '/careers', 'label' => 'Travailler chez Girod'],
                    ['title' => 'Un devis sous un jour', 'body' => 'Décrivez le volume, les deux adresses et la date : l’exploitation répond avec un chiffre le jour ouvrable suivant.', 'subject' => 'Le bureau d’exploitation, le planning des tournées au mur', 'to' => '/quote', 'label' => 'Demander un devis'],
                ],
            ],
        ],
        '/rates' => [
            'label' => 'Tarifs',
            'hero' => [
                'eyebrow' => 'Tarifs 2026',
                'title' => 'Ce que coûte un transport, avant de nous appeler',
                'lead' => 'À l’heure pour un petit volume, au mètre cube pour un logement entier, au kilomètre pour une course. Prix hors TVA, trajet depuis le dépôt compris.',
                'subject' => 'Un camion de 20 m³ chargé, les meubles sous leurs couvertures',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000']],
            ],
            'features' => [
                'eyebrow' => 'Ce qui fait le prix',
                'title' => 'Trois choses changent la facture',
                'items' => [
                    ['title' => 'Le volume', 'body' => 'Un trois-pièces fait 30 à 35 m³, une maison de cinq pièces 60 à 70. Nous le comptons pièce par pièce à la visite.', 'icon' => 'ruler'],
                    ['title' => 'L’accès', 'body' => 'Un quatrième étage sans ascenseur ou cinquante mètres de portage ajoutent une heure ; un monte-meubles en retire deux.', 'icon' => 'arrow-up-from-line'],
                    ['title' => 'La date', 'body' => 'Du 10 au 20 du mois, les équipes sont libres et le forfait baisse de dix pour cent. Les fins de mois se réservent tôt.', 'icon' => 'calendar-days'],
                ],
            ],
        ],
        '/careers' => [
            'label' => 'Emplois',
            'hero' => [
                'eyebrow' => 'Emplois',
                'title' => 'Conduire, porter, organiser : quatre postes ouverts',
                'lead' => 'Trente-deux personnes, dont onze depuis plus de dix ans. Nous engageons des gens qui aiment le travail bien sanglé, et nous payons les permis.',
                'subject' => 'Une chauffeuse au volant d’un 26 tonnes, à l’aube devant le dépôt',
                'links' => [['label' => 'Écrire à l’exploitation', 'href' => 'mailto:emploi@girod-transports.example'], ['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000']],
            ],
            'story' => [
                'eyebrow' => 'Travailler ici',
                'title' => 'L’équipe qui charge est celle qui décharge',
                'lead' => 'Chez nous, personne ne découvre à l’arrivée le camion qu’un autre a rempli.',
                'body' => [
                    'Marcel Girod a commencé en 1958 avec un Saurer et deux cousins. Sa petite-fille Céline dirige aujourd’hui trente-deux personnes, et le principe n’a pas changé : ceux qui ont emballé le matin sont ceux qui remontent l’armoire le soir.',
                    'Les tournées de palettes partent à 6 h et rentrent avant 16 h 30. Un déménagement finit quand le dernier carton est posé, et les heures en plus sont reprises en congé le mois suivant, jamais perdues.',
                    'Nous payons le permis C1 aux déménageurs après un an, le C et le CE à ceux qui veulent passer à la route, et les cinq jours de formation continue OACP se prennent sur le temps de travail.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce que nous offrons',
                'title' => 'Au-delà du salaire',
                'items' => [
                    ['title' => 'Permis payés', 'body' => 'Le C1 après un an, le C et le CE pour qui veut conduire, la formation OACP sur le temps de travail.', 'icon' => 'graduation-cap'],
                    ['title' => 'Des horaires connus', 'body' => 'Le planning de la semaine est affiché le jeudi d’avant, et un samedi sur trois seulement est travaillé.', 'icon' => 'calendar-check'],
                    ['title' => 'Du matériel entretenu', 'body' => 'Des camions de moins de sept ans, un atelier sur place et un monte-meubles pour épargner les dos.', 'icon' => 'truck'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Candidature spontanée',
                'title' => 'Aucun poste ne vous ressemble ?',
                'lead' => 'Écrivez quand même : chaque lettre est lue par Céline Girod, et un chauffeur sur trois est entré chez nous ainsi.',
                'links' => [['label' => 'Écrire à emploi@girod-transports.example', 'href' => 'mailto:emploi@girod-transports.example'], ['label' => 'Voir ce que nous transportons', 'to' => '/']],
                'details' => [
                    ['label' => 'Dépôt', 'value' => 'Rue de l’Industrie 18, Yverdon-les-Bains'],
                    ['label' => 'Exploitation', 'value' => 'Paulo Ferreira, 024 000 00 00', 'href' => 'tel:+41240000000'],
                ],
            ],
        ],
        '/quote' => [
            'hero' => [
                'eyebrow' => 'Devis',
                'title' => 'Un chiffre pour votre transport, sous un jour ouvrable',
                'lead' => 'Quoi, d’où à où, pour quand : quatre réponses suffisent pour un premier prix. Au-delà d’un trois-pièces, Paulo Ferreira passe voir et le forfait est signé sur place.',
                'subject' => 'Un chef d’équipe faisant le tour d’un appartement avec la cliente',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
            ],
            'story' => [
                'eyebrow' => 'Après votre demande',
                'title' => 'Ce qui se passe ensuite',
                'lead' => 'Une demande n’est pas une commande : rien n’est réservé avant votre signature.',
                'body' => [
                    'Le jour ouvrable suivant, l’exploitation vous écrit avec un prix : ferme pour une course ou des palettes, indicatif pour un déménagement. Si le volume dépasse un trois-pièces, nous proposons deux dates de visite dans la semaine.',
                    'La visite dure vingt minutes. Paulo Ferreira compte le volume pièce par pièce, regarde l’escalier, l’ascenseur et la rue, et laisse un forfait écrit avant de repartir. Ce prix est valable soixante jours.',
                    'Une fois le devis signé, la date est bloquée, les places de stationnement sont demandées à la commune et les cartons sont livrés deux semaines avant le jour dit.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Pour un chiffre juste',
                'title' => 'Ce qu’il nous faut savoir',
                'items' => [
                    ['title' => 'Le volume', 'body' => 'Le nombre de pièces suffit ; ajoutez la cave, le galetas et le garage s’ils sont pleins.', 'icon' => 'boxes'],
                    ['title' => 'Les deux adresses', 'body' => 'L’étage, l’ascenseur et la distance entre la porte et l’endroit où un camion peut s’arrêter.', 'icon' => 'map-pin'],
                    ['title' => 'La date', 'body' => 'Un jour précis ou une semaine possible : plus la fenêtre est large, plus le prix est bas.', 'icon' => 'calendar-days'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Plus vite',
                'title' => 'Un transport pour demain ?',
                'lead' => 'Pour une course express ou une palette à livrer sous vingt-quatre heures, le téléphone va plus vite que le formulaire.',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Voir les tarifs', 'to' => '/rates']],
                'details' => [
                    ['label' => 'En semaine', 'value' => 'Lundi–vendredi, 7 h–18 h'],
                    ['label' => 'Le samedi', 'value' => '8 h–12 h'],
                    ['label' => 'Dépôt', 'value' => 'Rue de l’Industrie 18, Yverdon-les-Bains'],
                ],
            ],
        ],
    ],
];
