<?php

declare(strict_types=1);

/*
 * The demo content of a software product: Ardoise, a fictional planning,
 * site-report and invoicing tool for finishing trades (electricians, plumbers,
 * joiners), made by fourteen people in Yverdon-les-Bains and sold by monthly
 * plan. `site` is what every page shares, `prefabs` is what the site would
 * bind as `kit.<name>` — the rows its owner keeps in the admin, in each
 * component's own prop names — and `pages` holds each page's words, keyed by
 * its path in `.claude/skills/ui-kit/businesses/software.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Ardoise',
        'blurb' => 'Le planning, le rapport de chantier et la facture des entreprises du second œuvre, conçu et hébergé en Suisse.',
        'address' => 'Rue Galilée 7, 1400 Yverdon-les-Bains',
        'phone' => '024 000 00 00',
        'email' => 'bonjour@ardoise.example',
        'status' => 'Assistance ouverte du lundi au vendredi, de 7 h à 18 h',
        'note' => '© Ardoise Logiciels SA',
        'action' => ['label' => 'Demander une démo', 'to' => '/demo'],
        'band' => [
            'eyebrow' => 'Essayer',
            'title' => 'Voir votre semaine dans Ardoise',
            'lead' => 'Une démo de trente minutes sur vos propres chantiers, puis un mois d’essai sans carte de crédit ni engagement.',
            'links' => [['label' => 'Demander une démo', 'to' => '/demo'], ['label' => 'Voir les tarifs', 'to' => '/pricing']],
            'details' => [
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Assistance', 'value' => 'Lundi au vendredi, 7 h à 18 h'],
                ['label' => 'Hébergement', 'value' => 'En Suisse, à Lausanne et à Zurich'],
            ],
        ],
    ],

    'prefabs' => [
        'credentials' => [
            'title' => 'Ils planifient avec Ardoise',
            'credentials' => [
                ['name' => 'Électricité Brandt SA', 'detail' => 'Yverdon-les-Bains · 34 collaborateurs · depuis 2018'],
                ['name' => 'Sanitaire Favre & Fils', 'detail' => 'Bulle · 12 collaborateurs · depuis 2019'],
                ['name' => 'Menuiserie du Jorat', 'detail' => 'Mézières · 21 collaborateurs · depuis 2020'],
                ['name' => 'Groupe Thermalp', 'detail' => 'Sion · 4 succursales, 140 collaborateurs · depuis 2022'],
                ['name' => 'ISO/IEC 27001:2022', 'detail' => 'Certificat n° CH-27-04418 · développement et hébergement · renouvelé en 2025'],
                ['name' => 'Hébergement en Suisse', 'detail' => 'Centres de données de Lausanne et de Zurich · traitement conforme à la nLPD'],
            ],
        ],
        'testimonials' => [
            'title' => 'Ce qu’en disent les entreprises',
            'testimonials' => [
                [
                    'quote' => 'Le vendredi, je passais quatre heures à déchiffrer des rapports écrits dans la camionnette. Aujourd’hui les heures arrivent signées par le client, et les factures partent le lundi matin au lieu de la fin du mois.',
                    'name' => 'Pascal Brandt',
                    'role' => 'Directeur, Électricité Brandt SA, Yverdon-les-Bains',
                ],
                [
                    'quote' => 'Mes monteurs n’aiment pas les logiciels. Celui-ci, ils l’ont pris en main en vingt minutes, parce qu’il ressemble au tableau qu’on avait au dépôt.',
                    'name' => 'Nadia Favre',
                    'role' => 'Cogérante, Sanitaire Favre & Fils, Bulle',
                ],
                [
                    'quote' => 'Nous avions quatre succursales et autant de façons de planifier. La mise en place a pris trois semaines, et je vois enfin la charge de la semaine suivante sur un seul écran. Le décompte des heures supplémentaires, qui nous prenait deux jours par mois, sort maintenant tout seul.',
                    'name' => 'Jean-Marc Tornay',
                    'role' => 'Responsable d’exploitation, Groupe Thermalp, Sion',
                ],
            ],
        ],
        'process' => [
            'title' => 'De la démo à la première semaine',
            'intro' => 'Cinq étapes, les mêmes pour un atelier de trois personnes et pour un groupe de cent quarante : seule la durée change.',
            'steps' => [
                ['name' => 'La démo', 'line' => 'Trente minutes sur votre propre semaine, en visio ou dans vos bureaux, avec l’un des deux fondateurs.', 'duration' => '30 minutes'],
                ['name' => 'L’essai avec vos données', 'line' => 'Nous importons vos clients, vos collaborateurs et vos chantiers en cours depuis vos fichiers Excel.', 'duration' => '1 mois, offert'],
                ['name' => 'Les réglages', 'line' => 'Vos modèles de rapport par métier, vos tarifs horaires et l’en-tête de vos factures, réglés avec votre bureau.', 'duration' => '2 à 5 jours'],
                ['name' => 'La formation', 'line' => 'Une demi-journée pour le bureau et les chefs d’équipe ; vingt minutes au dépôt pour les monteurs, téléphone en main.', 'duration' => 'Une demi-journée'],
                ['name' => 'La première semaine', 'line' => 'Nous restons joignables de 7 h à 18 h et repassons le vendredi revoir avec vous les premières factures.', 'duration' => '5 jours ouvrables'],
            ],
        ],
        'pricing' => [
            'title' => 'Trois plans, selon la taille de l’équipe',
            'intro' => 'Le prix suit le nombre de collaborateurs, pas le nombre d’écrans : chacun a son accès, au bureau comme sur le chantier.',
            'note' => 'Prix hors TVA (8,1 %), facturés au mois. Sans durée minimale : vous arrêtez pour la fin du mois en cours, et vos données vous sont remises en Excel et en PDF.',
            'plans' => [
                [
                    'name' => 'Atelier',
                    'price' => 'CHF 59',
                    'period' => 'par mois',
                    'line' => 'Jusqu’à 5 collaborateurs : le patron, ses ouvriers et un apprenti.',
                    'includes' => [
                        'Planning de la semaine',
                        'Rapports signés sur téléphone',
                        'Factures avec QR-facture',
                        'Assistance par e-mail, réponse dans la journée',
                    ],
                    'href' => '#booking',
                    'label' => 'Essayer un mois',
                ],
                [
                    'name' => 'Entreprise',
                    'price' => 'CHF 149',
                    'period' => 'par mois',
                    'line' => 'De 6 à 25 collaborateurs, plusieurs équipes et un bureau.',
                    'includes' => [
                        'Planning de la semaine',
                        'Rapports signés sur téléphone',
                        'Factures avec QR-facture',
                        'Décompte des heures et des vacances',
                        'Export vers votre comptabilité',
                        'Assistance par téléphone, de 7 h à 18 h',
                    ],
                    'href' => '#booking',
                    'label' => 'Demander une démo',
                    'featured' => true,
                    'flag' => 'Sept clients sur dix',
                ],
                [
                    'name' => 'Groupe',
                    'price' => 'Sur devis',
                    'period' => 'dès 26 collaborateurs',
                    'line' => 'Plusieurs succursales, un planning par site et une vue d’ensemble.',
                    'includes' => [
                        'Planning de la semaine',
                        'Rapports signés sur téléphone',
                        'Factures avec QR-facture',
                        'Décompte des heures et des vacances',
                        'Export vers votre comptabilité',
                        'Assistance par téléphone, de 7 h à 18 h',
                        'Reprise de vos données par nos soins',
                        'Un interlocuteur attitré à Yverdon',
                    ],
                    'href' => 'tel:+41240000000',
                    'label' => 'Appeler le 024 000 00 00',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Ce qu’on nous demande avant de signer',
            'entries' => [
                ['question' => 'Où sont hébergées nos données ?', 'answer' => 'Dans deux centres de données en Suisse, à Lausanne et à Zurich, avec une sauvegarde chaque nuit. Rien ne quitte le pays, et le traitement suit la nLPD. Le contrat de sous-traitance est envoyé sur demande à bonjour@ardoise.example.'],
                ['question' => 'Et si nous arrêtons ?', 'answer' => 'Vous résiliez par e-mail pour la fin du mois en cours. Nous vous remettons vos clients, vos rapports et vos factures en Excel et en PDF dans les cinq jours, puis nous effaçons tout au bout de trente jours.'],
                ['question' => 'Faut-il du réseau sur le chantier ?', 'answer' => 'Non. Le rapport se remplit et se signe hors ligne, dans un sous-sol ou une cage d’ascenseur, et part tout seul dès que le téléphone retrouve du réseau.'],
                ['question' => 'Peut-on garder notre comptabilité actuelle ?', 'answer' => 'Oui. Ardoise s’arrête à la facture : les écritures du mois sont exportées dans un fichier que votre fiduciaire ou votre logiciel comptable reprend tel quel.'],
                ['question' => 'Combien de temps prend la mise en place ?', 'answer' => 'Une semaine pour un atelier, trois pour une entreprise à plusieurs équipes. Nous importons nous-mêmes vos clients et vos collaborateurs depuis vos fichiers Excel.'],
                ['question' => 'Sur quels téléphones cela fonctionne-t-il ?', 'answer' => 'Sur tout iPhone ou Android de moins de six ans, et dans le navigateur au bureau. Il n’y a rien à installer sur un serveur.'],
                ['question' => 'Qui répond quand quelque chose bloque ?', 'answer' => 'L’équipe d’Yverdon, en français, du lundi au vendredi de 7 h à 18 h : 024 000 00 00 ou aide@ardoise.example. Il n’y a pas de centre d’appels.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander une démo',
            'intro' => 'Indiquez la taille de l’équipe et un jour qui vous arrange : Léa ou Marc vous rappelle dans la journée pour fixer l’heure.',
            'action' => '#booking',
            'services' => [
                'Planning des équipes',
                'Rapports de chantier sur téléphone',
                'Factures et QR-facture',
                'Décompte des heures et des vacances',
                'Reprise depuis un autre logiciel',
            ],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Logiciel pour le second œuvre · Yverdon-les-Bains',
                'title' => 'Du planning à la facture, sans rien ressaisir',
                'lead' => 'Ardoise remplace le tableau blanc, les rapports papier et l’Excel du vendredi : les heures notées sur le chantier deviennent la facture du soir.',
                'subject' => 'Le planning de la semaine sur un grand écran, au bureau d’une entreprise d’électricité',
                'note' => 'Un mois d’essai, sans carte de crédit',
                'links' => [['label' => 'Demander une démo', 'to' => '/demo'], ['label' => 'Voir les tarifs', 'to' => '/pricing']],
                'facts' => [
                    ['value' => '412', 'label' => 'Entreprises équipées en Suisse romande'],
                    ['value' => '20 min', 'label' => 'Pour former un monteur'],
                    ['value' => '4 h', 'label' => 'De bureau gagnées par semaine'],
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce que fait Ardoise',
                'title' => 'Trois gestes, une seule saisie',
                'lead' => 'Ce que le chef d’équipe planifie le lundi, le monteur le rapporte le mardi et le bureau le facture le soir même.',
                'items' => [
                    ['title' => 'Planifier la semaine', 'body' => 'Glissez un chantier sur une équipe : chacun reçoit sa journée sur son téléphone, avec l’adresse, le contact et le matériel à charger.', 'subject' => 'Le planning hebdomadaire, une ligne par équipe et une couleur par chantier', 'to' => '/how-it-works', 'label' => 'Comment ça marche'],
                    ['title' => 'Rapporter depuis le chantier', 'body' => 'Les heures, le matériel posé, trois photos et la signature du client, même sans réseau au sous-sol.', 'subject' => 'Un monteur faisant signer son rapport sur un téléphone, dans une chaufferie', 'to' => '/demo', 'label' => 'Le voir en démo'],
                    ['title' => 'Facturer le soir même', 'body' => 'Le rapport signé devient une facture avec QR-facture, et les heures alimentent le décompte du mois.', 'subject' => 'Une facture avec QR-facture affichée à côté du rapport dont elle est tirée', 'to' => '/pricing', 'label' => 'Les plans et les prix'],
                ],
            ],
        ],
        '/how-it-works' => [
            'label' => 'Comment ça marche',
            'hero' => [
                'eyebrow' => 'Comment ça marche',
                'title' => 'En service en une semaine, pas en un trimestre',
                'lead' => 'Pas de projet informatique : une démo, un mois d’essai sur vos données, une demi-journée de formation. Voici le chemin, étape par étape.',
                'subject' => 'Léa Monod devant le tableau blanc d’un dépôt, un téléphone à la main',
                'links' => [['label' => 'Demander une démo', 'to' => '/demo']],
            ],
            'features' => [
                'eyebrow' => 'Une fois en service',
                'title' => 'Une journée avec Ardoise',
                'lead' => 'Trois moments, trois personnes, un seul dossier qui passe de main en main.',
                'items' => [
                    ['title' => '6 h 45, au dépôt', 'body' => 'Chaque monteur ouvre sa journée : deux chantiers, les adresses, le matériel à charger dans la camionnette.', 'subject' => 'Un monteur regardant son téléphone devant une camionnette ouverte, au petit matin'],
                    ['title' => '16 h 10, chez le client', 'body' => 'Le rapport est rempli sur place. Le client relit les heures et signe du doigt.', 'subject' => 'Une cliente signant sur un téléphone, dans une cuisine en travaux'],
                    ['title' => '17 h 30, au bureau', 'body' => 'Les rapports du jour sont contrôlés d’un coup d’œil, et les factures partent avant de fermer.', 'subject' => 'Une secrétaire validant une liste de rapports sur un grand écran'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Pourquoi cet ordre',
                'title' => 'D’abord vos chantiers, ensuite nos réglages',
                'lead' => 'Un logiciel de planning échoue rarement par ses fonctions. Il échoue le lundi où les équipes retournent au tableau blanc.',
                'body' => [
                    'Léa Monod a tenu pendant six ans le planning de l’entreprise sanitaire de son père, à Grandson : un tableau blanc, des aimants et un classeur de rapports que personne ne relisait avant la fin du mois. Ardoise est né en 2017 de ce tableau-là, et il en a gardé la règle : une ligne par équipe, une couleur par chantier, rien d’autre à apprendre.',
                    'C’est pour cela que la démo se fait sur votre semaine et non sur un exemple. Quand un chef d’équipe reconnaît ses chantiers et ses hommes à l’écran, il sait en dix minutes si l’outil lui fera gagner du temps ; s’il doit d’abord imaginer, il a déjà décroché.',
                    'La première semaine, nous ne changeons rien à votre façon de travailler. Les réglages plus fins, les modèles de rapport par métier ou le décompte des heures supplémentaires, viennent quand les équipes ont pris l’habitude, en général au bout d’un mois.',
                ],
            ],
        ],
        '/pricing' => [
            'label' => 'Tarifs',
            'hero' => [
                'eyebrow' => 'Tarifs',
                'title' => 'Un prix par entreprise, tous les accès compris',
                'lead' => 'Trois plans selon la taille de l’équipe. Le premier mois est offert, et l’on arrête pour la fin du mois en cours, sans frais.',
                'subject' => 'Trois téléphones et un écran de bureau affichant le même planning',
                'links' => [['label' => 'Demander une démo', 'to' => '/demo']],
            ],
            'features' => [
                'eyebrow' => 'Dans chaque plan',
                'title' => 'Ce que le prix comprend toujours',
                'items' => [
                    ['title' => 'Hébergement en Suisse', 'body' => 'Deux centres de données, à Lausanne et à Zurich, et une sauvegarde chaque nuit.', 'icon' => 'server'],
                    ['title' => 'Mises à jour', 'body' => 'Une par mois, installée dans la nuit du premier dimanche, sans rien à faire de votre côté.', 'icon' => 'refresh-cw'],
                    ['title' => 'Vos données restent les vôtres', 'body' => 'Un export complet en Excel et en PDF à tout moment, y compris après la résiliation.', 'icon' => 'download'],
                ],
            ],
        ],
        '/demo' => [
            'hero' => [
                'eyebrow' => 'Démo',
                'title' => 'Voyez votre propre semaine dans Ardoise',
                'lead' => 'Trente minutes, en visio ou dans vos bureaux. Envoyez-nous une semaine ordinaire : nous la montons avant le rendez-vous.',
                'subject' => 'Un planning partagé en visioconférence, deux personnes à la table d’un atelier',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000']],
            ],
            'features' => [
                'eyebrow' => 'Pendant la démo',
                'title' => 'Ce que vous verrez en trente minutes',
                'items' => [
                    ['title' => 'Votre semaine, déjà saisie', 'body' => 'Nous reprenons le planning que vous nous envoyez, avec vos équipes et vos chantiers.', 'subject' => 'Un planning hebdomadaire rempli, les noms des équipes en marge'],
                    ['title' => 'Un rapport de bout en bout', 'body' => 'Du téléphone du monteur à la signature du client, puis à la facture.', 'subject' => 'Un téléphone affichant un rapport de chantier signé'],
                    ['title' => 'Vos questions, sans vendeur', 'body' => 'Ce sont Léa et Marc, les deux fondateurs, qui tiennent la démo et qui répondent.', 'subject' => 'Léa Monod et Marc Dufaux à leur bureau d’Yverdon'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Avant de réserver',
                'title' => 'Une démo qui n’engage à rien',
                'lead' => 'Ni contrat à signer en sortant, ni relance tous les trois jours : vous repartez avec un accès d’essai et notre numéro direct.',
                'body' => [
                    'Avant le rendez-vous, envoyez-nous le planning d’une semaine ordinaire, une photo du tableau blanc suffit, et un rapport de chantier tel que vos équipes le remplissent aujourd’hui. Nous montons les deux dans Ardoise, pour que la démo commence sur vos chantiers et vos noms.',
                    'La démo est tenue par Léa Monod ou Marc Dufaux, les deux fondateurs. Elle dure trente minutes, en visioconférence ou dans vos bureaux si vous êtes entre Genève et Fribourg ; comptez un quart d’heure de plus si un chef d’équipe veut essayer le rapport sur son propre téléphone.',
                    'Vous repartez avec un accès d’essai d’un mois, déjà rempli. Si Ardoise ne vous convient pas, dites-le-nous simplement : nous effaçons vos données dans la semaine, et nous ne rappelons pas.',
                ],
            ],
        ],
    ],
];
