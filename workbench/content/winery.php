<?php

declare(strict_types=1);

/*
 * The demo content of a winery: a fictional family estate of six and a half
 * hectares of terraces above Chamoson, in the Valais, selling nine wines at
 * its own cellar door. `site` is what every page shares, `prefabs` is what the
 * site would bind as `kit.<name>` — the rows its owner keeps in the admin, in
 * each component's own prop names — and `pages` holds each page's words, keyed
 * by its path in `.claude/skills/ui-kit/businesses/winery.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Les Trois Murets',
        'blurb' => 'Vignerons-encaveurs à Chamoson depuis 1962 : six hectares et demi de terrasses, vendangés à la main.',
        'address' => 'Chemin des Murets 6, 1955 Chamoson',
        'phone' => '027 000 00 00',
        'email' => 'caveau@trois-murets.example',
        'status' => 'Caveau ouvert ce samedi de 10 h à 17 h',
        'note' => '© Domaine des Trois Murets, famille Vaudan · Prix par bouteille de 75 cl, TVA comprise',
        'action' => ['label' => 'Commander du vin', 'to' => '/wines'],
        'band' => [
            'eyebrow' => 'Au caveau',
            'title' => 'Goûter avant de choisir',
            'lead' => 'Le caveau est ouvert du mercredi au samedi, sans rendez-vous. Pour un carton livré chez vous, un coup de fil ou un e-mail suffit.',
            'links' => [['label' => 'Voir les vins et les prix', 'to' => '/wines'], ['label' => 'Les prochaines dégustations', 'to' => '/events']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Chemin des Murets 6, Chamoson'],
                ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                ['label' => 'Livraison', 'value' => 'Franco dès 12 bouteilles, en Suisse'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'fendant', 'name' => 'Fendant « Les Murets » 2025', 'price' => '16.–', 'description' => 'Chasselas des terrasses du bas, sur éboulis calcaires. Sec et léger, une pointe de perlant : pour l’apéritif et la raclette.'],
                ['id' => 'johannisberg', 'name' => 'Johannisberg de Chamoson 2025', 'price' => '19.–', 'description' => 'Sylvaner de vignes de cinquante ans, le cépage de la commune. Ample, une amande amère en finale ; avec les asperges et le fromage d’alpage.'],
                ['id' => 'petite-arvine', 'name' => 'Petite arvine 2025', 'price' => '26.–', 'description' => 'Pamplemousse, glycine et la finale saline qui la signe. Élevée en cuve, sans bois.'],
                ['id' => 'dole-blanche', 'name' => 'Dôle blanche 2025', 'price' => '17.–', 'description' => 'Pinot noir et gamay pressés sans macération, rose pâle. Le vin de la terrasse, de mai à septembre.'],
                ['id' => 'pinot-noir', 'name' => 'Pinot noir « Les Crêtes » 2024', 'price' => '22.–', 'description' => 'La parcelle la plus haute, à 720 mètres. Griotte et poivre blanc ; dix mois en foudre de chêne.'],
                ['id' => 'humagne-rouge', 'name' => 'Humagne rouge 2023', 'price' => '27.–', 'description' => 'Rustique et fine à la fois : écorce, violette, tanins souples. Le vin de la chasse.'],
                ['id' => 'cornalin', 'name' => 'Cornalin 2023', 'price' => '32.–', 'description' => 'Le vieux rouge du Valais : cerise noire et girofle. 1 400 bouteilles seulement, six par client.'],
                ['id' => 'syrah', 'name' => 'Syrah « Le Grand Mur » 2022', 'price' => '38.–', 'description' => 'Les ceps plantés au pied du mur de six mètres, qui rend la nuit la chaleur du jour. Dix-huit mois en fût, à garder dix ans.'],
                ['id' => 'arvine-fletrie', 'name' => 'Petite arvine flétrie 2022, 37,5 cl', 'price' => '34.–', 'description' => 'Raisins laissés sur souche jusqu’en décembre. Coing, miel et une acidité qui tient le sucre ; avec un bleu ou une tarte aux abricots.'],
                ['id' => 'carton-decouverte', 'name' => 'Carton découverte, six bouteilles', 'price' => 'CHF 125', 'description' => 'Fendant, johannisberg, petite arvine, dôle blanche, pinot noir et humagne. Livré franco de port en Suisse.'],
            ],
        ],
        'events' => [
            'title' => 'Dégustations et rendez-vous',
            'events' => [
                ['date' => 'samedi 21 novembre', 'time' => '10 h–17 h', 'datetime' => '2026-11-21T10:00', 'name' => 'Le millésime 2025 au caveau', 'description' => 'Fendant, johannisberg, petite arvine et dôle blanche de l’année, goûtés avec Élise. Entrée libre, sans inscription.'],
                ['date' => 'vendredi 27 novembre', 'time' => '18 h 30', 'datetime' => '2026-11-27T18:30', 'name' => 'Brisolée dans la cour', 'description' => 'Châtaignes grillées au feu de sarments, fromage d’alpage, viande séchée et le rouge nouveau. CHF 38 par personne, sur inscription jusqu’au mardi 24.'],
                ['date' => 'samedi 5 décembre', 'time' => '10 h–17 h', 'datetime' => '2026-12-05T10:00', 'name' => 'Samedi de l’Avent', 'description' => 'Cartons de fête composés sur place, magnums de syrah 2021 et vin chaud au johannisberg près du pressoir.'],
                ['date' => 'samedi 12 décembre', 'time' => '17 h', 'datetime' => '2026-12-12T17:00', 'name' => 'Verticale de syrah, 2015 à 2022', 'description' => 'Huit millésimes du Grand Mur, commentés par Marc. Douze places autour de la table du chai, CHF 60.'],
                ['date' => 'samedi 23 janvier', 'time' => '9 h–12 h', 'datetime' => '2027-01-23T09:00', 'name' => 'Matinée de taille', 'description' => 'Sécateur en main dans les terrasses du bas, puis soupe et fendant au caveau. Prévoir des gants et de bonnes chaussures.'],
                ['date' => 'du jeudi 6 au samedi 8 mai', 'time' => '10 h–18 h', 'datetime' => '2027-05-06T10:00', 'name' => 'Caves ouvertes du Valais', 'description' => 'Trois jours de portes ouvertes à l’Ascension : tous les vins à goûter, visite du chai à 11 h et à 15 h, raclette à midi.'],
                ['date' => 'samedi 19 juin', 'time' => '11 h', 'datetime' => '2027-06-19T11:00', 'name' => 'Balade des trois murets', 'description' => 'Deux heures de marche d’une terrasse à l’autre, un vin par mur, puis le repas sous la treille. CHF 75, trente places.'],
                ['date' => 'samedi 25 septembre', 'time' => '8 h–16 h', 'datetime' => '2027-09-25T08:00', 'name' => 'Journée de vendange', 'description' => 'Une caissette et un sécateur chacun dans le pinot des Crêtes, le casse-croûte de neuf heures et le repas des vendangeurs. Vingt places, sans frais.'],
            ],
        ],
        'gallery' => [
            'title' => 'Le domaine au fil de l’année',
            'pictures' => [
                ['image' => 'picture:Les terrasses du bas sous la neige, les ceps taillés court', 'alt' => 'Des terrasses de vigne sous la neige, les ceps taillés court', 'caption' => 'Janvier : la taille, terrasse après terrasse', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Marc remontant un mur de pierre sèche, sans mortier', 'alt' => 'Un vigneron pose une pierre sur un mur de pierre sèche', 'caption' => 'Février : trente mètres de mur remontés chaque hiver', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les jeunes pousses de petite arvine aux Crêtes', 'alt' => 'De jeunes pousses de vigne vert tendre au soleil du matin', 'caption' => 'Mai : la petite arvine débourre aux Crêtes', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La terrasse du caveau sous la treille, à l’heure de l’apéritif', 'alt' => 'Une terrasse sous une treille, des verres de vin blanc sur une table de bois', 'caption' => 'Juin : la terrasse du caveau', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le Grand Mur, six mètres de pierre sèche plein sud', 'alt' => 'Un haut mur de pierre sèche, des ceps de syrah à son pied', 'caption' => 'Août : la syrah au pied du Grand Mur', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les vendangeurs dans le pinot, caissettes à la main', 'alt' => 'Des vendangeurs entre les rangs, des caissettes rouges pleines de raisin', 'caption' => 'Septembre : la vendange, toute à la main', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Élise au pressoir, le moût qui coule', 'alt' => 'Une vigneronne surveille le moût qui coule d’un pressoir', 'caption' => 'Octobre : Élise au pressoir', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le chai, quatre foudres de chêne sous la voûte', 'alt' => 'Quatre grands foudres de chêne alignés sous une voûte de pierre', 'caption' => 'Le chai de 1988, creusé dans la pente', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le comptoir du caveau, neuf bouteilles et des verres', 'alt' => 'Un comptoir de mélèze, neuf bouteilles et une rangée de verres', 'caption' => 'Le caveau : tout se goûte avant de choisir', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des grappes d’arvine flétries sous le givre', 'alt' => 'Des grappes de raisin doré et ridé, couvertes de givre', 'caption' => 'Décembre : l’arvine flétrie attend sur souche', 'width' => 1200, 'height' => 900],
            ],
        ],
        'schedule' => [
            'title' => 'Heures du caveau',
            'note' => 'Les autres jours sur rendez-vous : un coup de fil la veille suffit. Pendant les vendanges, de mi-septembre à mi-octobre, le caveau n’ouvre que le samedi.',
            'days' => [
                ['day' => 'Lundi', 'hours' => null],
                ['day' => 'Mardi', 'hours' => null],
                ['day' => 'Mercredi', 'hours' => '16:00–18:30'],
                ['day' => 'Jeudi', 'hours' => '16:00–18:30'],
                ['day' => 'Vendredi', 'hours' => '14:00–19:00'],
                ['day' => 'Samedi', 'hours' => '10:00–17:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'map' => [
            'address' => 'Chemin des Murets 6, 1955 Chamoson',
            'title' => 'Portail vert, 300 m après la chapelle',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Vignerons-encaveurs · Chamoson, Valais',
                'title' => 'Neuf vins de terrasses, vendangés à la main',
                'lead' => 'Six hectares et demi de vignes tenues par trois murs de pierre sèche, au-dessus de Chamoson. Tout se goûte au caveau, du mercredi au samedi, avant de choisir.',
                'subject' => 'Les terrasses du domaine au soleil couchant, le caveau au pied du Grand Mur',
                'note' => 'Le millésime 2025 se goûte dès le samedi 21 novembre',
                'links' => [['label' => 'Voir les vins et les prix', 'to' => '/wines'], ['label' => 'Les prochaines dégustations', 'to' => '/events']],
                'facts' => [['value' => '6,5 ha', 'label' => 'De vignes en terrasses'], ['value' => '9', 'label' => 'Vins, tous à goûter'], ['value' => '1962', 'label' => 'Première vendange']],
            ],
            'features' => [
                'eyebrow' => 'Au domaine',
                'title' => 'Les vins, les rendez-vous, les terrasses',
                'lead' => 'Trois raisons de monter jusqu’au portail vert.',
                'items' => [
                    ['title' => 'Les vins', 'body' => 'Fendant, johannisberg et petite arvine en blanc ; pinot noir, humagne, cornalin et syrah en rouge. De 16.– à 38.– la bouteille, et un carton découverte à CHF 125.', 'subject' => 'Neuf bouteilles alignées sur le comptoir du caveau', 'to' => '/wines', 'label' => 'Tous les vins et leurs prix'],
                    ['title' => 'Les rendez-vous', 'body' => 'Le millésime 2025 le 21 novembre, la brisolée le 27, les caves ouvertes à l’Ascension et une journée de vendange en septembre.', 'subject' => 'Des verres levés autour d’un tonneau, dans la cour du caveau', 'to' => '/events', 'label' => 'L’agenda du caveau'],
                    ['title' => 'Le domaine', 'body' => 'Trois murs de pierre sèche, trois terroirs et trois générations de Vaudan. La vigne est certifiée bio depuis 2019.', 'subject' => 'Un mur de pierre sèche de six mètres, des ceps de syrah à son pied', 'to' => '/the-estate', 'label' => 'Le domaine en images'],
                ],
            ],
        ],
        '/wines' => [
            'label' => 'Les vins',
            'hero' => [
                'eyebrow' => 'Les vins',
                'title' => 'Neuf vins, du fendant à la syrah',
                'lead' => 'Tous viennent de nos vignes et tous se goûtent au caveau. Prix par bouteille de 75 cl ; dès douze bouteilles, la livraison en Suisse est offerte.',
                'subject' => 'Les neuf bouteilles du domaine sur le comptoir de mélèze',
                'links' => [['label' => 'Commander au 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Venir goûter d’abord', 'to' => '/events']],
            ],
            'features' => [
                'eyebrow' => 'Acheter',
                'title' => 'Au caveau, par carton ou à l’année',
                'lead' => 'Nous ne vendons ni en grande surface ni par un négociant : chaque bouteille part d’ici.',
                'items' => [
                    ['title' => 'Au caveau', 'body' => 'Du mercredi au samedi, on goûte avant de choisir. À la bouteille ou au carton, par carte ou par Twint.', 'subject' => 'Six verres alignés sur le comptoir du caveau'],
                    ['title' => 'Livré chez vous', 'body' => 'Par cartons de six, panachés à votre idée. Franco de port en Suisse dès douze bouteilles, CHF 15 en dessous ; compter trois jours ouvrables.', 'subject' => 'Des cartons de six bouteilles prêts à partir, dans la cour'],
                    ['title' => 'Le carton des saisons', 'body' => 'Six bouteilles en avril, six en novembre, choisies par Élise et livrées avant la mise en vente. CHF 260 par an.', 'subject' => 'Un carton ouvert, six bouteilles et la lettre de la vigneronne'],
                ],
            ],
            'story' => [
                'eyebrow' => 'À la cave',
                'title' => 'Peu de gestes, et le temps qu’il faut',
                'lead' => 'Neuf vins pour onze parcelles : chacun vient d’un lieu que nous savons montrer du doigt.',
                'body' => [
                    'Tout est vendangé à la main, en caissettes de douze kilos, parce que les terrasses ne laissent passer aucune machine. Le raisin descend au pressoir dans l’heure ; les blancs sont pressés entiers, les rouges égrappés et cuvés deux à trois semaines.',
                    'Les fermentations partent seules, avec les levures de la vigne. Fendant, johannisberg et petite arvine restent en cuve pour garder leur fruit ; le pinot et l’humagne passent en foudre de chêne, le cornalin et la syrah en fûts de 400 litres dont un quart seulement est neuf.',
                    'Nous mettons en bouteille au domaine, sans collage et avec une filtration légère. Les blancs de l’année sortent en novembre, les rouges après un ou deux hivers en cave : quand un vin n’est pas prêt, il n’est pas sur la liste.',
                ],
            ],
        ],
        '/events' => [
            'label' => 'Agenda',
            'hero' => [
                'eyebrow' => 'Agenda',
                'title' => 'Dégustations, caves ouvertes et vendanges',
                'lead' => 'Le caveau reçoit toute l’année, et huit rendez-vous marquent les saisons de la vigne. Certains sont libres, d’autres se réservent : c’est écrit sous chaque date.',
                'subject' => 'La cour du caveau un soir de brisolée, le feu de sarments allumé',
                'links' => [['label' => 'S’inscrire au 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Voir les vins', 'to' => '/wines']],
            ],
            'features' => [
                'eyebrow' => 'Sur rendez-vous',
                'title' => 'Pour un groupe, à la date qui vous convient',
                'lead' => 'Une famille, une équipe ou une classe : dites-nous combien vous serez, nous proposons une date dans la semaine.',
                'items' => [
                    ['title' => 'Dégustation commentée', 'body' => 'De six à vingt personnes autour de la table du chai : six vins, une planche de fromages et de viande séchée, une heure et demie. CHF 28 par personne.', 'subject' => 'La table du chai dressée pour douze, entre les foudres'],
                    ['title' => 'Repas sous la treille', 'body' => 'De juin à septembre, raclette ou grillade au feu de sarments sur la terrasse du caveau, avec les vins du domaine. Dès douze convives, CHF 65.', 'subject' => 'Une longue table sous la treille, la vallée du Rhône derrière'],
                    ['title' => 'Une demi-journée dans la vigne', 'body' => 'Effeuilles en juin, vendange en septembre : une équipe travaille une terrasse avec Marc, puis goûte le vin qui en vient.', 'subject' => 'Un groupe en bottes entre deux rangs de vigne, caissettes à la main'],
                ],
            ],
            'story' => [
                'eyebrow' => 'L’année du caveau',
                'title' => 'Un agenda qui suit celui de la vigne',
                'lead' => 'Les dates changent peu d’une année à l’autre, parce que la vigne ne change pas son calendrier.',
                'body' => [
                    'Tout commence en novembre, quand les blancs de l’année sont en bouteille : le samedi du millésime, on goûte pour la première fois ce que l’été a donné. Une semaine plus tard, la brisolée réunit dans la cour ceux qui ont vendangé avec nous.',
                    'L’hiver est le temps de la cave et de la taille. La verticale de décembre ouvre de vieilles bouteilles que nous ne vendons plus, et la matinée de janvier met un sécateur dans les mains de qui veut comprendre pourquoi un cep ne porte que six grappes.',
                    'Aux caves ouvertes de l’Ascension, le domaine reçoit en trois jours autant de monde qu’en trois mois. Puis viennent la balade de juin et la journée de vendange : les places sont comptées, et les habitués s’inscrivent d’une année à l’autre.',
                ],
            ],
        ],
        '/the-estate' => [
            'label' => 'Le domaine',
            'hero' => [
                'eyebrow' => 'Le domaine',
                'title' => 'Trois murs de pierre sèche, trois générations',
                'lead' => 'Armand Vaudan a repris en 1962 trois terrasses que personne ne voulait plus cultiver. Sa petite-fille Élise et son petit-fils Marc y font aujourd’hui neuf vins.',
                'subject' => 'Élise et Marc Vaudan devant le Grand Mur, un soir de vendange',
                'links' => [['label' => 'Venir goûter au caveau', 'to' => '/events'], ['label' => 'Voir les vins', 'to' => '/wines']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1962',
                'title' => 'La vigne tient au mur, et le mur à ceux qui le remontent',
                'lead' => 'Six hectares et demi, onze parcelles, quatre kilomètres de murs : le domaine se mesure d’abord en pierres.',
                'body' => [
                    'En 1962, Armand Vaudan, maçon à Chamoson, reprend trois terrasses en friche au-dessus du village. Il passe deux hivers à en remonter les murs avant de planter : du fendant en bas, du johannisberg au milieu et, sous le plus haut, contre l’avis de tous, quelques ceps de syrah.',
                    'Son fils René construit le chai en 1988 et cesse de livrer le raisin à la coopérative : le domaine met depuis en bouteille tout ce qu’il récolte. Élise, œnologue formée à Changins, a repris la cave en 2014 ; Marc, son frère, mène la vigne et les murs.',
                    'La vigne est cultivée en bio depuis 2016 et certifiée depuis 2019. L’herbe pousse entre les rangs, les moutons d’un voisin la tondent de novembre à mars, et chaque hiver nous remontons une trentaine de mètres de mur, pierre sur pierre, sans mortier.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois terroirs',
                'title' => 'Un mur, un sol, une famille de vins',
                'lead' => 'Deux cents mètres de dénivelé séparent le premier cep du dernier, et les vins ne se ressemblent pas.',
                'items' => [
                    ['title' => 'Le muret du bas', 'body' => 'Éboulis calcaires à 520 mètres, les premières terrasses au-dessus du village. Fendant, johannisberg et dôle blanche.', 'subject' => 'Des terrasses étroites au-dessus des toits de Chamoson'],
                    ['title' => 'Les Crêtes', 'body' => 'Schistes et vent du soir à 720 mètres, la parcelle la plus haute. Petite arvine et pinot noir y mûrissent lentement.', 'subject' => 'Une vigne en haut de coteau, la vallée du Rhône en contrebas'],
                    ['title' => 'Le Grand Mur', 'body' => 'Six mètres de pierre sèche plein sud, qui rendent la nuit la chaleur du jour. Humagne, cornalin et syrah.', 'subject' => 'Un mur de pierre sèche de six mètres, des ceps de syrah à son pied'],
                ],
            ],
        ],
    ],
];
