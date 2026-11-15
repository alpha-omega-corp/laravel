<?php

declare(strict_types=1);

/*
 * The demo content of a butcher: a fictional family boucherie-charcuterie on
 * the Grand-Rue of Échallens, in the Gros-de-Vaud, whose beef comes from the
 * family's own farm four kilometres away. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its owner
 * keeps in the admin, in each component's own prop names — and `pages` holds
 * each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/butcher.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Boucherie Jaquier',
        'blurb' => 'Boucherie-charcuterie de famille depuis 1954 : le bœuf de notre ferme, coupé à la demande au comptoir de la Grand-Rue.',
        'address' => 'Grand-Rue 18, 1040 Échallens',
        'phone' => '021 000 00 00',
        'email' => 'commande@boucherie-jaquier.example',
        'status' => 'Commandes du week-end jusqu’au jeudi 18 h',
        'note' => '© Boucherie Jaquier Sàrl',
        'action' => ['label' => 'Commander pour samedi', 'to' => '/our-meat'],
        'band' => [
            'eyebrow' => 'Commander',
            'title' => 'Un rôti pour dimanche ?',
            'lead' => 'Commandez jusqu’au jeudi 18 h, au comptoir ou par téléphone : votre paquet vous attend samedi dès 6 h 30, à votre nom, sans faire la file.',
            'links' => [['label' => 'Voir l’étal de la semaine', 'to' => '/our-meat'], ['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Grand-Rue 18, Échallens'],
                ['label' => 'Téléphone', 'value' => '021 000 00 00', 'href' => 'tel:+41210000000'],
                ['label' => 'Parking', 'value' => 'Place du Château, à cinquante mètres'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'entrecote-rassie', 'name' => 'Entrecôte de bœuf rassie sur os', 'price' => '79.– le kg', 'description' => 'Bœuf de la ferme Jaquier, rassis quatre semaines. Tranchée à l’épaisseur que vous dites.'],
                ['id' => 'roti-porc-cou', 'name' => 'Rôti de porc dans le cou', 'price' => '19.80 le kg', 'description' => 'L’action de la semaine, jusqu’à samedi 13 h. Porc de la ferme Savary, ficelé, prêt à rôtir.'],
                ['id' => 'roti-boeuf-larde', 'name' => 'Rôti de bœuf lardé', 'price' => '46.– le kg', 'description' => 'Dans la cuisse, lardé et ficelé à la main. Compter 220 g cru par personne.'],
                ['id' => 'emince-veau', 'name' => 'Émincé de veau', 'price' => '68.– le kg', 'description' => 'Veau de la ferme, coupé au couteau le matin même. Pour l’émincé à la crème.'],
                ['id' => 'saucisse-aux-choux', 'name' => 'Saucisse aux choux vaudoise IGP', 'price' => '26.– le kg', 'description' => 'Fumée au bois de hêtre dans le fumoir de la cour. Pour le papet : quarante minutes à l’eau frémissante.'],
                ['id' => 'saucisson-vaudois', 'name' => 'Saucisson vaudois IGP', 'price' => '29.– le kg', 'description' => 'La recette de Louis Jaquier, inchangée depuis 1954. Environ 400 g la pièce.'],
                ['id' => 'jambon-a-l-os', 'name' => 'Jambon à l’os', 'price' => '5.40 les 100 g', 'description' => 'Saumuré trois semaines, cuit au bouillon. Tranché devant vous, ou entier sur commande.'],
                ['id' => 'poulet-fermier', 'name' => 'Poulet fermier de Bottens', 'price' => '19.50 le kg', 'description' => 'Élevé en plein air quatre-vingt-dix jours. Entier, ou découpé sans supplément.'],
                ['id' => 'fondue-chinoise', 'name' => 'Fondue chinoise sur plat', 'price' => '64.– le kg', 'description' => 'Bœuf, veau et cheval tranchés fin, dressés sur plat. À commander la veille avant midi.'],
                ['id' => 'colis-de-la-ferme', 'name' => 'Colis de la ferme, 5 kg', 'price' => 'CHF 185', 'description' => 'Rôti, ragoût, haché, émincé et saucisses, sous vide. Vingt colis par mois, à réserver.'],
            ],
        ],
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Fermé le dimanche et le lundi. Le samedi, les commandes se retirent dès 6 h 30.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => '07:00–12:15 · 14:00–18:30'],
                ['day' => 'Mercredi', 'hours' => '07:00–12:15'],
                ['day' => 'Jeudi', 'hours' => '07:00–12:15 · 14:00–18:30'],
                ['day' => 'Vendredi', 'hours' => '07:00–12:15 · 14:00–18:30'],
                ['day' => 'Samedi', 'hours' => '06:30–13:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'faq' => [
            'title' => 'Les questions du comptoir',
            'entries' => [
                ['question' => 'D’où vient votre viande ?', 'answer' => 'Le bœuf et le veau viennent de la ferme Jaquier, à Villars-le-Terroir, à quatre kilomètres. Le porc vient de la ferme Savary, à Fey, et la volaille de la famille Bovey, à Bottens. L’origine de chaque pièce est écrite sur son étiquette, à l’étal.'],
                ['question' => 'Jusqu’à quand commander pour le week-end ?', 'answer' => 'Jusqu’au jeudi 18 h, au comptoir ou au 021 000 00 00. Votre paquet vous attend le samedi dès 6 h 30, à votre nom, au guichet de gauche.'],
                ['question' => 'Où se parquer ?', 'answer' => 'Place du Château, à cinquante mètres : trente minutes gratuites avec le disque. Pour charger une grosse commande, deux places de livraison sont devant la boucherie, Grand-Rue 18.'],
                ['question' => 'Combien de viande compter par personne pour une grillade ?', 'answer' => 'Deux cents grammes par adulte et cent par enfant, saucisses comprises. Pour une fondue chinoise ou une charbonnade, 200 à 250 g. Pour un rôti, 220 g cru par personne.'],
                ['question' => 'Préparez-vous la fondue chinoise et la charbonnade ?', 'answer' => 'Oui, tranchées et dressées sur plat, dès deux personnes. Commandez la veille avant midi au 021 000 00 00 ; en décembre, une semaine avant les Fêtes.'],
                ['question' => 'Peut-on faire mettre la viande sous vide ?', 'answer' => 'Oui, sans supplément dès 500 g : demandez-le à la commande. Sous vide, elle se garde dix jours au réfrigérateur et six mois au congélateur.'],
                ['question' => 'Quels moyens de paiement acceptez-vous ?', 'answer' => 'Les espèces, toutes les cartes et Twint. Une commande de plus de CHF 300 se règle à l’enlèvement, sans acompte.'],
            ],
        ],
        'map' => [
            'address' => 'Grand-Rue 18, 1040 Échallens',
            'title' => 'Boucherie Jaquier',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Boucherie-charcuterie · Échallens',
                'title' => 'Le bœuf de notre ferme, coupé devant vous',
                'lead' => 'Trois générations au même comptoir de la Grand-Rue. Les bêtes viennent de la ferme familiale de Villars-le-Terroir, à quatre kilomètres ; le reste se décide avec vous, au couteau.',
                'subject' => 'Jean-Marc Jaquier au comptoir, une côte de bœuf sur le billot',
                'note' => 'Cette semaine : rôti de porc dans le cou à 19.80 le kilo',
                'links' => [['label' => 'Commander pour samedi', 'to' => '/our-meat'], ['label' => 'Appeler le comptoir', 'href' => 'tel:+41210000000']],
                'facts' => [['value' => '1954', 'label' => 'Au même comptoir'], ['value' => '4 km', 'label' => 'De la ferme à l’étal'], ['value' => '28 j', 'label' => 'Le bœuf rassis sur os']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Une ferme, un laboratoire, un fumoir',
                'lead' => 'Nous faisons nous-mêmes ce que nous vendons, et nous savons de quel pré vient chaque pièce.',
                'items' => [
                    ['title' => 'L’étal de la semaine', 'body' => 'Dix pièces affichées avec leur prix, de l’entrecôte rassie au saucisson vaudois, et une action qui change chaque mardi.', 'subject' => 'L’étal réfrigéré, les pièces de bœuf étiquetées à la craie', 'to' => '/our-meat', 'label' => 'Nos viandes et leurs prix'],
                    ['title' => 'Les questions du comptoir', 'body' => 'Jusqu’à quand commander, combien compter par personne, où laisser la voiture : ce qu’on nous demande chaque jour, répondu une fois pour toutes.', 'subject' => 'Une cliente au comptoir, son paquet ficelé posé sur la balance', 'to' => '/questions', 'label' => 'Les réponses'],
                    ['title' => 'La ferme et la maison', 'body' => 'Daniel élève les bêtes à Villars-le-Terroir, Jean-Marc et Élodie les découpent à Échallens. L’histoire tient en quatre kilomètres.', 'subject' => 'Des vaches Simmental au pré, le Jura au fond', 'to' => '/our-story', 'label' => 'Notre histoire'],
                ],
            ],
        ],
        '/our-meat' => [
            'label' => 'Nos viandes',
            'hero' => [
                'eyebrow' => 'Nos viandes',
                'title' => 'L’étal de cette semaine',
                'lead' => 'Les prix sont ceux du comptoir, au kilo sauf mention. Tout se coupe à la demande : dites l’épaisseur, le poids ou le nombre de convives.',
                'subject' => 'Une entrecôte rassie tranchée sur le billot',
                'links' => [['label' => 'Commander au 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Jusqu’à quand commander ?', 'to' => '/questions']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Commander, emporter, cuire',
                'items' => [
                    ['title' => 'Commander', 'body' => 'Au comptoir ou par téléphone jusqu’au jeudi 18 h pour le samedi. Votre paquet est prêt dès 6 h 30, à votre nom.', 'icon' => 'phone'],
                    ['title' => 'Sous vide', 'body' => 'Sans supplément dès 500 g. La viande se garde dix jours au réfrigérateur, six mois au congélateur.', 'icon' => 'package'],
                    ['title' => 'Cuisson', 'body' => 'Chaque rôti part avec son temps de cuisson écrit sur le papier. Pour le reste, demandez : nous cuisinons ce que nous vendons.', 'icon' => 'thermometer'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Au laboratoire',
                'title' => 'Rassie sur os, coupée à la demande',
                'lead' => 'Rien n’est emballé d’avance : ce qui est sur l’étal le matin a été préparé la veille ou le jour même.',
                'body' => [
                    'Le bœuf arrive en demi-carcasses le lundi. Il reste quatre semaines en chambre froide, sur os, avant que la première entrecôte soit levée : c’est le temps qu’il lui faut pour être tendre sans marinade.',
                    'La charcuterie se fait le mardi et le vendredi. Saucisses aux choux, saucissons et lard passent au fumoir de la cour, au bois de hêtre, comme en 1954 ; les atriaux et les terrines sont faits pour deux jours, pas plus.',
                    'Si une pièce manque à l’étal, c’est qu’elle est vendue. Nous n’abattons pas une bête de plus pour un filet : commandez-le, il sera là la semaine suivante.',
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions',
                'title' => 'Ce qu’on nous demande au comptoir',
                'lead' => 'Sept questions reviennent tous les jours. Si la vôtre n’y est pas, appelez le 021 000 00 00 : c’est Élodie ou Jean-Marc qui décroche.',
                'subject' => 'Élodie Jaquier au téléphone, le carnet de commandes ouvert',
                'links' => [['label' => 'Appeler le 021 000 00 00', 'href' => 'tel:+41210000000'], ['label' => 'Voir nos viandes', 'to' => '/our-meat']],
            ],
            'story' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Le samedi, mieux vaut commander',
                'lead' => 'La file commence à 7 h et finit à midi. Une commande passée le jeudi se retire en deux minutes.',
                'body' => [
                    'Le samedi matin, nous servons près de trois cents clients en six heures et demie. Ceux qui ont commandé passent par le guichet de gauche : leur paquet est déjà pesé et étiqueté, il ne reste qu’à payer.',
                    'Pour une grande tablée, une broche ou un demi-porc, passez plutôt en semaine. Jean-Marc prend dix minutes pour calculer les quantités avec vous, et ces dix minutes-là n’existent pas le samedi.',
                ],
            ],
        ],
        '/our-story' => [
            'label' => 'Notre histoire',
            'hero' => [
                'eyebrow' => 'Notre histoire',
                'title' => 'Trois générations, une ferme et un comptoir',
                'lead' => 'Louis Jaquier a ouvert la boucherie en 1954. Son fils Jean-Marc la tient aujourd’hui avec sa fille Élodie ; Daniel, le cadet, élève les bêtes.',
                'subject' => 'La devanture de la boucherie, l’enseigne émaillée de 1954',
                'links' => [['label' => 'Voir nos viandes', 'to' => '/our-meat']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1954',
                'title' => 'Une ferme à Villars-le-Terroir, un comptoir à Échallens',
                'lead' => 'La boucherie n’a jamais acheté une bête à plus de douze kilomètres.',
                'body' => [
                    'Louis Jaquier, fils de paysan, ouvre la boucherie en 1954 et continue d’acheter ses bêtes à la ferme de son père. Aujourd’hui la ferme est celle de Daniel, son fils cadet, et le comptoir celui de Jean-Marc, l’aîné.',
                    'Jean-Marc a repris la boucherie en 1989. Il a gardé le fumoir de la cour et le billot de son père, et ajouté la chambre de rassissement en 2008, quand il a fallu choisir entre vendre plus et vendre mieux.',
                    'Élodie, sa fille, a passé sa maîtrise fédérale en 2019. C’est elle qui tient le laboratoire le mardi et le vendredi, et qui a lancé le colis de la ferme. Nous sommes sept, dont deux apprentis.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ceux qui élèvent',
                'title' => 'Trois fermes, à moins de douze kilomètres',
                'items' => [
                    ['title' => 'Ferme Jaquier, Villars-le-Terroir', 'body' => 'Quarante bovins Simmental et Limousin, à l’herbe de mai à octobre, au foin de la ferme l’hiver.', 'subject' => 'Le troupeau au pré, la ferme au bout du chemin'],
                    ['title' => 'Ferme Savary, Fey', 'body' => 'Des porcs élevés sur paille et engraissés au petit-lait de la fromagerie du village.', 'subject' => 'Des porcs sur la paille d’une porcherie ouverte'],
                    ['title' => 'Famille Bovey, Bottens', 'body' => 'Des poulets en plein air, sous les pommiers, livrés chaque jeudi matin.', 'subject' => 'Des poulets sous les pommiers d’un verger'],
                ],
            ],
        ],
    ],
];
