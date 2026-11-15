<?php

declare(strict_types=1);

/*
 * The demo content of a trade: a fictional sanitary and heating firm in
 * Payerne, two generations old, that mends a leak within the hour and redoes a
 * bathroom in three weeks. `site` is what every page shares, `prefabs` is what
 * the site would bind as `kit.<name>` — the rows its owner keeps in the admin,
 * in each component's own prop names — and `pages` holds each page's words,
 * keyed by its path in `.claude/skills/ui-kit/businesses/trades.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Rapin & Fils',
        'blurb' => 'Sanitaire et chauffage à Payerne et vingt kilomètres autour, depuis 1987.',
        'address' => 'Route de Grandcour 12, 1530 Payerne',
        'phone' => '026 000 00 00',
        'email' => 'atelier@rapin-fils.example',
        'status' => 'Permanence tous les jours, de 7 h à 22 h',
        'note' => '© Rapin & Fils Sàrl · Maîtrise fédérale d’installateur sanitaire',
        'action' => ['label' => 'Demander un devis', 'to' => '/quote'],
        'band' => [
            'eyebrow' => 'Un chantier, une panne',
            'title' => 'Dites-nous ce qu’il faut faire',
            'lead' => 'Pour un chantier, un devis écrit sous trois jours ouvrables. Pour une fuite, un coup de fil : dans la zone, nous sommes chez vous dans l’heure.',
            'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir nos chantiers', 'to' => '/our-work']],
            'details' => [
                ['label' => 'Atelier', 'value' => 'Route de Grandcour 12, Payerne'],
                ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                ['label' => 'Zone', 'value' => 'Vingt kilomètres autour de Payerne'],
            ],
        ],
    ],

    'prefabs' => [
        'gallery' => [
            'title' => 'Chantiers récents',
            'pictures' => [
                ['image' => 'picture:Salle de bain terminée à Estavayer-le-Lac : douche à l’italienne, grès gris clair et meuble en chêne', 'alt' => 'Salle de bain rénovée avec une douche à l’italienne', 'caption' => 'Estavayer-le-Lac · Après : une douche à l’italienne à la place de la baignoire, trois semaines de chantier', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La même salle de bain avant travaux : baignoire en fonte et carrelage brun des années 70', 'alt' => 'La salle de bain avant travaux, baignoire en fonte et carrelage brun', 'caption' => 'Estavayer-le-Lac · Avant : la baignoire de 1974 et ses joints noircis', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Chaufferie neuve à Avenches : pompe à chaleur et ballon de 300 litres', 'alt' => 'Chaufferie avec une pompe à chaleur et un ballon d’eau chaude', 'caption' => 'Avenches · Après : pompe à chaleur air-eau, posée en quatre jours', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La même chaufferie avant travaux : chaudière à mazout de 1991 et sa citerne', 'alt' => 'L’ancienne chaudière à mazout et sa citerne', 'caption' => 'Avenches · Avant : la chaudière à mazout de 1991', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Cuisine à Payerne : évier en grès sous la fenêtre, robinetterie en laiton brossé', 'alt' => 'Évier en grès et robinetterie en laiton dans une cuisine neuve', 'caption' => 'Payerne · Raccordement d’une cuisine neuve, évier et lave-vaisselle', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Salle d’eau sous les combles à Moudon, double vasque sur un meuble en chêne', 'alt' => 'Salle d’eau sous les combles avec une double vasque', 'caption' => 'Moudon · Une salle d’eau créée sous les combles, là où il n’y avait pas d’arrivée d’eau', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Douche de plain-pied avec siège rabattable et barre d’appui', 'alt' => 'Douche de plain-pied avec un siège et une barre d’appui', 'caption' => 'Lucens · Une douche de plain-pied, pour rester chez soi à 84 ans', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Colonne de chute neuve dans la cage d’escalier d’un immeuble de quatre étages', 'alt' => 'Colonne de chute remplacée dans un immeuble', 'caption' => 'Payerne, Grand-Rue · Colonne de chute en fonte remplacée sur quatre étages, l’eau coupée une seule journée', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Chauffe-eau thermodynamique dans une buanderie', 'alt' => 'Chauffe-eau neuf dans une buanderie', 'caption' => 'Granges-près-Marnand · Chauffe-eau remplacé le jour même de la panne', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Adoucisseur et filtre posés à l’arrivée d’eau d’une villa', 'alt' => 'Adoucisseur d’eau posé dans un local technique', 'caption' => 'Corcelles-près-Payerne · Adoucisseur à l’arrivée d’eau : 34 °f ramenés à 12', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Radiateurs en fonte remis en service dans le salon d’une maison de 1920', 'alt' => 'Radiateur en fonte ancien dans un salon', 'caption' => 'Cugy · Radiateurs en fonte de 1920, désembués et remis en service', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Robinet extérieur antigel contre un mur de ferme, départ d’arrosage', 'alt' => 'Robinet extérieur antigel sur un mur de ferme', 'caption' => 'Grandcour · Robinet extérieur antigel et départ d’arrosage', 'width' => 1200, 'height' => 900],
            ],
        ],
        'faq' => [
            'title' => 'Ce qu’on nous demande d’abord',
            'entries' => [
                ['question' => 'Jusqu’où vous déplacez-vous ?', 'answer' => 'Vingt kilomètres autour de l’atelier : Payerne, Estavayer-le-Lac, Avenches, Lucens, Moudon et les villages entre deux. Au-delà, nous venons pour un chantier, pas pour un dépannage.'],
                ['question' => 'Combien coûte un déplacement ?', 'answer' => 'Un forfait de 60.– dans la zone, puis 115.– l’heure d’installateur, comptée au quart d’heure. Les pièces sont facturées au prix du catalogue, et le montant vous est dit avant de commencer.'],
                ['question' => 'Venez-vous le soir et le week-end ?', 'answer' => 'Oui : la permanence répond tous les jours de 7 h à 22 h au 026 000 00 00. Après 18 h, le samedi et le dimanche, l’heure est majorée de moitié. La nuit, fermez le robinet d’arrêt : nous sommes chez vous à 7 h.'],
                ['question' => 'Le devis est-il gratuit ?', 'answer' => 'Pour un chantier, oui : la visite et le devis écrit ne coûtent rien et n’engagent à rien. Vous le recevez sous trois jours ouvrables, et son prix tient soixante jours.'],
                ['question' => 'Quelle garantie donnez-vous ?', 'answer' => 'Deux ans sur notre pose et cinq ans sur les défauts cachés, selon la norme SIA 118. Les appareils gardent la garantie de leur fabricant, que nous faisons valoir à votre place.'],
                ['question' => 'Combien de temps dure une salle de bain ?', 'answer' => 'Trois semaines pour une rénovation complète, dont cinq jours sans eau dans la pièce. Quand la maison n’a qu’un WC, nous en posons un provisoire le premier jour.'],
                ['question' => 'Aidez-vous pour les subventions du chauffage ?', 'answer' => 'Oui. La Broye est à cheval sur deux cantons, et nous remplissons avec vous la demande au Programme Bâtiments, vaudois ou fribourgeois. Elle doit partir avant la commande : appelez-nous avant de signer quoi que ce soit.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un devis ou un passage',
            'intro' => 'Décrivez le travail et donnez le jour qui vous arrange : Nadia rappelle dans la journée pour fixer l’heure. Pour une fuite, téléphonez plutôt.',
            'action' => '#booking',
            'services' => [
                'Dépannage : fuite, écoulement bouché, chauffe-eau',
                'Salle de bain : rénovation ou création',
                'Chauffage : chaudière, pompe à chaleur, radiateurs',
                'Cuisine et buanderie : raccordements',
                'Entretien annuel : chaudière, adoucisseur',
                'Autre chose : dites-le dans le message',
            ],
        ],
        'map' => [
            'address' => 'Route de Grandcour 12, 1530 Payerne',
            'title' => 'L’atelier, au milieu de la zone desservie',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Sanitaire et chauffage · Payerne',
                'title' => 'On répare ce qui fuit, on refait ce qui a vieilli',
                'lead' => 'Un atelier à Payerne, cinq installateurs et vingt kilomètres de Broye autour. Chez vous dans l’heure pour une fuite, un devis écrit sous trois jours pour un chantier.',
                'subject' => 'Une salle de bain terminée à Estavayer-le-Lac : douche à l’italienne et meuble en chêne',
                'note' => 'Prochaine visite de devis possible : jeudi matin',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Voir nos chantiers', 'to' => '/our-work']],
                'facts' => [['value' => '1987', 'label' => 'L’atelier ouvre'], ['value' => '20 km', 'label' => 'Autour de Payerne'], ['value' => '60.–', 'label' => 'Le déplacement, dans la zone']],
            ],
            'features' => [
                'eyebrow' => 'Avant d’appeler',
                'title' => 'Ce que vous voulez savoir d’abord',
                'lead' => 'Le travail déjà fait, ce qu’un passage coûte et comment demander : tout est écrit ici.',
                'items' => [
                    ['title' => 'Des chantiers comme le vôtre', 'body' => 'Des salles de bain refaites en trois semaines, des chaudières remplacées en quatre jours : douze chantiers récents, photographiés avant et après.', 'subject' => 'Une douche à l’italienne posée dans une ancienne salle d’eau', 'to' => '/our-work', 'label' => 'Voir les chantiers'],
                    ['title' => 'Les prix, dits avant', 'body' => 'Le déplacement est à 60.– dans la zone, l’heure à 115.–, et le devis d’un chantier est gratuit. Ce qu’on nous demande au téléphone est écrit, question par question.', 'subject' => 'Un installateur relisant un devis avec une cliente dans sa cuisine', 'to' => '/questions', 'label' => 'Lire les réponses'],
                    ['title' => 'Un devis sans téléphoner', 'body' => 'Décrivez le travail et le jour qui vous arrange : Nadia rappelle dans la journée, et le devis écrit suit sous trois jours ouvrables.', 'subject' => 'La camionnette de l’atelier devant une maison de village', 'to' => '/quote', 'label' => 'Demander un devis'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1987',
                'title' => 'Un atelier, deux générations',
                'lead' => 'Jean-Claude Rapin a ouvert l’atelier avec une camionnette ; son fils Marc le dirige depuis 2014.',
                'body' => [
                    'Jean-Claude Rapin s’est mis à son compte en 1987, après quinze ans chez un installateur de Fribourg. Les premières années, il dépannait surtout des fermes de la Broye : des abreuvoirs gelés, des chaudières à bois, des conduites que personne n’avait jamais dessinées.',
                    'Marc a fait son apprentissage ailleurs, puis sa maîtrise fédérale, avant de revenir en 2009. Il a repris l’atelier en 2014 et y a ajouté ce que les clients demandaient de plus en plus : des salles de bain refaites de bout en bout, carrelage et électricité compris, avec un seul interlocuteur.',
                    'Nous sommes sept aujourd’hui : Marc et quatre installateurs, un apprenti, et Nadia qui tient le téléphone et le planning. Jean-Claude passe encore le mardi, pour les chaudières qu’il a posées lui-même.',
                ],
            ],
        ],
        '/our-work' => [
            'label' => 'Chantiers',
            'hero' => [
                'eyebrow' => 'Chantiers',
                'title' => 'Douze chantiers récents, avant et après',
                'lead' => 'Des salles de bain, des chaufferies et quelques dépannages dont nous sommes fiers. Tous sont dans la Broye, et leurs propriétaires acceptent qu’on vous donne leur numéro.',
                'subject' => 'Une chaufferie neuve à Avenches, la pompe à chaleur et son ballon',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote']],
            ],
            'features' => [
                'eyebrow' => 'Par métier',
                'title' => 'Ce qu’on nous confie le plus souvent',
                'lead' => 'Trois sortes de travaux font les neuf dixièmes de notre année.',
                'items' => [
                    ['title' => 'Salles de bain', 'body' => 'De la dépose de la baignoire au dernier joint : sanitaire, carrelage et électricité, menés par un seul chef de chantier. Trois semaines en moyenne.', 'subject' => 'Un carreleur posant du grès dans une douche à l’italienne'],
                    ['title' => 'Chauffage', 'body' => 'Une pompe à chaleur ou des pellets à la place du mazout, des radiateurs, un chauffage au sol. Quatre jours sans chauffage au plus, et jamais en janvier.', 'subject' => 'Deux installateurs descendant une pompe à chaleur dans une cave'],
                    ['title' => 'Dépannages', 'body' => 'Fuites, écoulements bouchés, chauffe-eau en panne : un tiers de nos journées. Chaque camionnette porte les pièces des dix pannes les plus courantes.', 'subject' => 'L’intérieur d’une camionnette d’atelier, les pièces rangées par casiers'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment se passe un chantier',
                'title' => 'Trois semaines pour une salle de bain',
                'lead' => 'Le même déroulement à chaque fois, écrit dans le devis jour par jour.',
                'body' => [
                    'La première semaine est celle qu’on ne photographie pas : la dépose, les gravats, les conduites neuves dans les murs. Marc ou Stéphane, le chef de chantier, passe chaque soir et vous dit où nous en sommes.',
                    'La deuxième semaine, le carreleur prend la pièce. Nous travaillons depuis vingt ans avec le même, Carrelages Bersier à Cugy, et avec le même électricien : vous n’avez personne à appeler ni à faire attendre.',
                    'La troisième semaine, nous posons les appareils, la robinetterie et les meubles, puis nous faisons couler l’eau une heure avant de vous rendre la pièce. Le prix du devis est celui de la facture : un imprévu derrière un mur vous est montré et chiffré avant d’être réparé.',
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions',
                'title' => 'Ce qu’on nous demande d’abord au téléphone',
                'lead' => 'La zone, le prix d’un déplacement, les urgences et la garantie : les réponses de Nadia, écrites une fois pour toutes.',
                'subject' => 'Nadia au téléphone dans le bureau de l’atelier, le planning de la semaine au mur',
                'links' => [['label' => 'Demander un devis', 'to' => '/quote'], ['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000']],
            ],
            'features' => [
                'eyebrow' => 'En bref',
                'title' => 'Trois choses à savoir avant d’appeler',
                'items' => [
                    ['title' => 'La zone', 'body' => 'Vingt kilomètres autour de Payerne, d’Estavayer-le-Lac à Moudon et d’Avenches à Lucens. Pour un chantier, nous allons plus loin.', 'subject' => 'Une carte de la Broye punaisée au mur, un cercle tracé autour de Payerne'],
                    ['title' => 'L’urgence', 'body' => 'La permanence répond de 7 h à 22 h, tous les jours. Dans la zone, quelqu’un est chez vous dans l’heure.', 'subject' => 'La camionnette de l’atelier garée de nuit devant une maison éclairée'],
                    ['title' => 'La garantie', 'body' => 'Deux ans sur la pose, cinq ans sur les défauts cachés. Si la même fuite revient, nous aussi, sans compter le déplacement.', 'subject' => 'Un raccord en laiton neuf sous un lavabo'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Ce qu’un prix contient',
                'title' => 'Comment nous comptons',
                'lead' => 'Un dépannage se paie au temps passé, un chantier au prix du devis. Il n’y a pas de troisième manière.',
                'body' => [
                    'Pour un dépannage, vous payez le forfait de déplacement de 60.–, le temps passé sur place au quart d’heure et les pièces posées. L’installateur vous dit le montant avant de commencer et vous signez le bon sur sa tablette : la facture reprend ce bon, ligne pour ligne.',
                    'Pour un chantier, le devis est gratuit et détaillé par poste : dépose, conduites, appareils, carrelage, électricité. Son total tient soixante jours. Un tiers est demandé à la commande, un tiers à mi-chantier, le solde à la remise de la pièce.',
                    'Après 18 h, le samedi et le dimanche, l’heure passe de 115.– à 172.50. C’est écrit ici pour que personne ne le découvre sur une facture : si la fuite peut attendre le matin, le robinet d’arrêt fermé, nous vous le dirons au téléphone.',
                ],
            ],
        ],
        '/quote' => [
            'label' => 'Devis',
            'hero' => [
                'eyebrow' => 'Devis',
                'title' => 'Demandez un devis, ou un passage',
                'lead' => 'Trois lignes suffisent : ce qu’il faut faire, où, et le jour qui vous arrange. Nadia rappelle dans la journée ; le devis écrit suit sous trois jours ouvrables.',
                'subject' => 'Marc Rapin prenant des mesures dans une salle de bain à refaire',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Lire les tarifs', 'to' => '/questions']],
            ],
            'features' => [
                'eyebrow' => 'Ensuite',
                'title' => 'Ce qui se passe après l’envoi',
                'items' => [
                    ['title' => 'Nous rappelons', 'body' => 'Dans la journée, entre 7 h et 17 h 30, pour comprendre le travail et fixer une heure de passage.', 'icon' => 'phone'],
                    ['title' => 'Nous passons voir', 'body' => 'Vingt minutes sur place pour une réparation, une heure pour une salle de bain : les mesures, des photos, l’état des conduites.', 'icon' => 'ruler'],
                    ['title' => 'Vous recevez le devis', 'body' => 'Par e-mail sous trois jours ouvrables, poste par poste. Il est gratuit, il tient soixante jours et il ne vous engage à rien.', 'icon' => 'file-text'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Pour un devis juste',
                'title' => 'Ce qui nous aide à chiffrer',
                'body' => [
                    'Dites l’année de la maison si vous la connaissez, et depuis quand la pièce n’a pas été refaite : une conduite de 1960 et une de 1995 ne se reprennent pas de la même façon.',
                    'Pour une salle de bain, donnez les dimensions de la pièce, même approximatives, et ce que vous voulez garder. Pour un chauffage, la dernière facture de mazout ou de gaz suffit à dimensionner la suite.',
                    'Si vous êtes locataire, demandez d’abord l’accord de votre régie : nous pouvons lui adresser le devis directement.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Urgence',
                'title' => 'Une fuite n’attend pas un formulaire',
                'lead' => 'Fermez le robinet d’arrêt et appelez : la permanence répond tous les jours, de 7 h à 22 h.',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000'], ['label' => 'Lire les tarifs', 'to' => '/questions']],
                'details' => [
                    ['label' => 'Permanence', 'value' => 'Tous les jours, 7 h – 22 h'],
                    ['label' => 'Déplacement', 'value' => '60.– dans la zone'],
                    ['label' => 'Sur place', 'value' => 'Dans l’heure, vingt kilomètres autour de Payerne'],
                ],
            ],
        ],
    ],
];
