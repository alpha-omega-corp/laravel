<?php

declare(strict_types=1);

/*
 * The demo content of a small hotel: a fictional nine-room house in the old
 * village of Evolène, in the val d'Hérens, a climbers' pension of 1904 taken
 * up again by the same family. `site` is what every page shares, `prefabs` is
 * what the site would bind as `kit.<name>` — the rows its owners keep in the
 * admin, in each component's own prop names — and `pages` holds each page's
 * words, keyed by its path in `.claude/skills/ui-kit/businesses/hotel.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Hôtel de la Lanterne',
        'blurb' => 'Neuf chambres dans une maison de mélèze de 1904, au cœur du vieux village d’Evolène.',
        'address' => 'Ruelle de la Forge 6, 1983 Evolène',
        'phone' => '027 000 00 00',
        'email' => 'sejour@hotel-lanterne.example',
        'status' => 'Réception de 15 h à 19 h · arrivée tardive sur demande',
        'note' => '© Hôtel de la Lanterne Sàrl · Prix par chambre et par nuit, petit-déjeuner compris',
        'action' => ['label' => 'Demander un séjour', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Séjourner',
            'title' => 'Une nuit, ou une semaine ?',
            'lead' => 'Donnez-nous vos dates et le nombre de personnes : nous répondons dans la journée avec les chambres libres. Pour ce soir même, un coup de fil.',
            'links' => [['label' => 'Demander un séjour', 'to' => '/book'], ['label' => 'Voir les chambres', 'to' => '/rooms']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Ruelle de la Forge 6, Evolène'],
                ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                ['label' => 'Réception', 'value' => 'De 15 h à 19 h, plus tard sur demande'],
            ],
        ],
    ],

    'prefabs' => [
        'gallery' => [
            'title' => 'La maison, les chambres, la vallée',
            'pictures' => [
                ['image' => 'picture:La façade de mélèze à la tombée du jour, la lanterne allumée', 'alt' => 'La façade de l’hôtel à la tombée du jour, la lanterne de cuivre allumée au-dessus de la porte', 'caption' => 'La maison, côté ruelle', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une chambre côté vallée, la porte-fenêtre ouverte sur la Dent Blanche', 'alt' => 'Une chambre double côté vallée, le lit fait, la porte-fenêtre ouverte sur la Dent Blanche', 'caption' => 'Chambre La Dent Blanche', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La table du petit-déjeuner, pain de seigle et fromages d’alpage', 'alt' => 'La table du petit-déjeuner : pain de seigle, fromages d’alpage et confitures', 'caption' => 'Le petit-déjeuner, de 7 h 30 à 10 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le fourneau en pierre ollaire de la salle à manger, daté 1904', 'alt' => 'Le fourneau en pierre ollaire de la salle à manger, la date 1904 gravée sur la pierre', 'caption' => 'Le fourneau de 1904', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une chambre côté village, parois d’arolle et duvet blanc', 'alt' => 'Une chambre double côté village, les parois d’arolle et le duvet blanc', 'caption' => 'Chambre Les Mayens', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La Suite du Fourneau, la baignoire sous la fenêtre', 'alt' => 'La salle de bain de la suite, la baignoire sous la fenêtre', 'caption' => 'La Suite du Fourneau', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le balcon du deuxième étage, deux chaises face à la vallée', 'alt' => 'Deux chaises sur le balcon du deuxième étage, face à la vallée', 'caption' => 'Le balcon, côté vallée', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le Grenier, la chambre sous le toit et sa lucarne', 'alt' => 'La chambre pour une personne sous le toit, le lit sous la lucarne', 'caption' => 'Le Grenier, pour une personne', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le salon, la bibliothèque et le thé de quatre heures', 'alt' => 'Le salon : deux fauteuils, la bibliothèque et le thé servi', 'caption' => 'Le salon, à quatre heures', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La ruelle de la Forge sous la neige, la nuit, les fenêtres éclairées', 'alt' => 'La ruelle de la Forge sous la neige, de nuit, les fenêtres de l’hôtel éclairées', 'caption' => 'La ruelle en février', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La Forge, la chambre familiale et ses lits superposés en mélèze', 'alt' => 'La chambre familiale : un grand lit et deux lits superposés en mélèze', 'caption' => 'La Forge, pour quatre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La Dent Blanche au lever du jour, vue du jardin', 'alt' => 'La Dent Blanche au lever du jour, vue du jardin de l’hôtel', 'caption' => 'Le matin, du jardin', 'width' => 1200, 'height' => 900],
            ],
        ],
        'menu' => [
            'title' => 'Les chambres et le prix d’une nuit',
            'sections' => [
                ['title' => 'Chambres pour deux', 'items' => [
                    ['name' => 'Les Mayens, côté village', 'price' => '168.–', 'description' => 'Trois chambres · lit de 160 · douche · vue sur la ruelle et les toits de pierre'],
                    ['name' => 'La Dent Blanche, côté vallée', 'price' => '198.–', 'description' => 'Trois chambres avec balcon · lit de 180 ou deux lits · douche'],
                    ['name' => 'La Suite du Fourneau', 'price' => '285.–', 'description' => 'Un salon avec son fourneau, une baignoire sous la fenêtre · 38 m² · balcon côté vallée'],
                ]],
                ['title' => 'Seul ou en famille', 'items' => [
                    ['name' => 'Le Grenier, pour une personne', 'price' => '112.–', 'description' => 'Sous le toit · lit de 120 · douche · une lucarne sur la vallée'],
                    ['name' => 'La Forge, chambre familiale', 'price' => '264.–', 'description' => 'Jusqu’à quatre personnes · un lit de 180 et deux lits superposés · baignoire · au rez-de-chaussée'],
                    ['name' => 'Lit d’appoint, enfant jusqu’à douze ans', 'price' => '30.–', 'description' => 'Dans les chambres côté vallée et dans la suite'],
                    ['name' => 'Lit de bébé', 'price' => 'offert', 'description' => 'À demander avec la réservation : la maison en a deux'],
                ]],
                ['title' => 'Compris dans la nuit', 'items' => [
                    ['name' => 'Le petit-déjeuner, de 7 h 30 à 10 h', 'price' => 'compris', 'description' => 'Pain de seigle du village, fromages d’alpage, confitures de la maison, œufs à la demande'],
                    ['name' => 'Le thé de quatre heures, au salon', 'price' => 'compris', 'description' => 'Avec le gâteau du jour, jusqu’à 18 h'],
                    ['name' => 'Une place de parc, à 150 mètres', 'price' => 'comprise', 'description' => 'Au parking communal, sous l’église'],
                    ['name' => 'Le local à skis chauffé', 'price' => 'compris', 'description' => 'Sèche-chaussures, établi de fartage, rangement fermé pour les vélos'],
                ]],
                ['title' => 'En plus', 'items' => [
                    ['name' => 'La table du soir, vendredi et samedi', 'price' => '46.–', 'description' => 'Un menu unique en trois plats, à réserver la veille avant 18 h'],
                    ['name' => 'Le pique-nique de course', 'price' => '18.–', 'description' => 'Avec un thermos, prêt dès 5 h ; à commander la veille'],
                    ['name' => 'Un chien', 'price' => '15.–', 'description' => 'Par nuit, dans les trois chambres côté village'],
                    ['name' => 'Départ tardif, jusqu’à 14 h', 'price' => '30.–', 'description' => 'Selon les arrivées du jour : demandez au petit-déjeuner'],
                    ['name' => 'Taxe de séjour', 'price' => '4.–', 'description' => 'Par adulte et par nuit, perçue pour la commune'],
                ]],
                ['title' => 'Selon la saison', 'items' => [
                    ['name' => 'Trois nuits et plus', 'price' => '−10 %', 'description' => 'Toute l’année, hors fêtes'],
                    ['name' => 'Basse saison', 'price' => '−15 %', 'description' => 'De mi-mai à mi-juin et d’octobre à mi-décembre'],
                    ['name' => 'Fêtes de fin d’année et semaines de février', 'price' => '+25.–', 'description' => 'Par chambre et par nuit ; trois nuits au minimum'],
                ]],
            ],
        ],
        'faq' => [
            'title' => 'Bon à savoir avant d’arriver',
            'entries' => [
                ['question' => 'À quelle heure peut-on arriver, et repartir ?', 'answer' => 'La réception est ouverte de 15 h à 19 h, et les chambres se libèrent à 11 h. Si vous arrivez plus tard, dites-le-nous : votre clé vous attend dans le boîtier à code, à gauche de la porte, et nous vous envoyons le code par SMS le jour même.'],
                ['question' => 'Où laisse-t-on la voiture ?', 'answer' => 'Au parking communal, sous l’église, à 150 mètres : une place par chambre est comprise, marquée d’une lanterne peinte. La ruelle est trop étroite pour une voiture, mais vous pouvez décharger devant la fontaine, à cinquante mètres de la porte.'],
                ['question' => 'Le petit-déjeuner est-il compris ?', 'answer' => 'Oui, pour toutes les chambres, de 7 h 30 à 10 h dans la salle du fourneau. Pour une course en montagne, demandez la veille : un thermos et un pique-nique vous attendent dès 5 h.'],
                ['question' => 'Peut-on dîner à l’hôtel ?', 'answer' => 'Le vendredi et le samedi, nous dressons une table du soir : un menu unique à 46.–, à réserver la veille avant 18 h. Les autres soirs, trois restaurants du village sont à moins de cinq minutes à pied, et nous réservons pour vous.'],
                ['question' => 'Les chiens sont-ils acceptés ?', 'answer' => 'Oui, dans les trois chambres côté village, pour 15.– par nuit. Ils ne viennent pas dans la salle du petit-déjeuner ; le salon leur est ouvert.'],
                ['question' => 'Comment annuler ou déplacer un séjour ?', 'answer' => 'Sans frais jusqu’à sept jours avant l’arrivée, par e-mail ou au 027 000 00 00. Passé ce délai, la première nuit est due ; si nous relouons la chambre, nous ne facturons rien.'],
                ['question' => 'La maison a-t-elle un ascenseur ?', 'answer' => 'Non : c’est une maison de 1904, sur quatre niveaux. La Forge, au rez-de-chaussée, se rejoint par deux marches depuis la ruelle ; pour les autres chambres, nous montons les bagages.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un séjour',
            'intro' => 'Indiquez le jour d’arrivée, le nombre de personnes et, dans le message, le nombre de nuits. Nous répondons dans la journée ; rien n’est réservé avant notre confirmation.',
            'action' => '#booking',
            'services' => [
                'Chambre pour deux, côté village',
                'Chambre pour deux avec balcon, côté vallée',
                'La Suite du Fourneau',
                'Le Grenier, pour une personne',
                'La Forge, chambre familiale',
                'Peu importe : la première chambre libre',
            ],
        ],
        'map' => [
            'address' => 'Ruelle de la Forge 6, 1983 Evolène',
            'title' => 'La porte sous la lanterne, en haut de la ruelle',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Hôtel · Evolène, val d’Hérens',
                'title' => 'Neuf chambres dans une maison de mélèze',
                'lead' => 'Une pension d’alpinistes ouverte en 1904, reprise par la même famille. Le petit-déjeuner est compris, la Dent Blanche est dans la fenêtre, et la lanterne reste allumée pour ceux qui arrivent tard.',
                'subject' => 'La façade de mélèze noirci à la tombée du jour, la lanterne allumée au-dessus de la porte',
                'note' => 'Deux chambres encore libres pour le week-end du 5 décembre',
                'links' => [['label' => 'Demander un séjour', 'to' => '/book'], ['label' => 'Voir les chambres', 'to' => '/rooms']],
                'facts' => [['value' => '9', 'label' => 'Chambres'], ['value' => 'dès 168.–', 'label' => 'La nuit pour deux'], ['value' => '1904', 'label' => 'La maison']],
            ],
            'features' => [
                'eyebrow' => 'La maison',
                'title' => 'Dormir, regarder, arriver',
                'lead' => 'Les trois choses qu’on nous demande avant de réserver.',
                'items' => [
                    ['title' => 'Les chambres', 'body' => 'Neuf chambres de mélèze et d’arolle, côté village ou côté vallée, de 112.– à 285.– la nuit, petit-déjeuner compris.', 'subject' => 'Une chambre côté vallée, le lit fait, la porte-fenêtre ouverte sur la Dent Blanche', 'to' => '/rooms', 'label' => 'Les chambres et les prix'],
                    ['title' => 'La maison en images', 'body' => 'Le fourneau de 1904, la table du matin, la ruelle sous la neige : la maison telle qu’elle est, photographiée par nous.', 'subject' => 'La salle à manger le matin, le fourneau en pierre ollaire au fond', 'to' => '/photos', 'label' => 'Toutes les photos'],
                    ['title' => 'Arriver, même tard', 'body' => 'La ruelle est piétonne et le dernier car arrive à la nuit. Où laisser la voiture, comment trouver la porte : tout est dit.', 'subject' => 'La ruelle de la Forge de nuit, la lanterne au bout', 'to' => '/good-to-know', 'label' => 'Bon à savoir avant d’arriver'],
                ],
            ],
        ],
        '/rooms' => [
            'label' => 'Chambres',
            'hero' => [
                'eyebrow' => 'Les chambres',
                'title' => 'Neuf chambres, et ce que coûte une nuit',
                'lead' => 'Les prix s’entendent par chambre et par nuit, petit-déjeuner compris. Dès trois nuits, dix pour cent de moins.',
                'subject' => 'Une chambre côté vallée au petit matin, le duvet défait, la Dent Blanche dans la fenêtre',
                'links' => [['label' => 'Demander un séjour', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Dans chaque chambre',
                'title' => 'Ce que toutes ont en commun',
                'items' => [
                    ['title' => 'Le bois d’origine', 'body' => 'Les parois de mélèze et d’arolle sont celles de 1904, poncées et cirées. Elles sentent encore la résine quand le fourneau chauffe.', 'subject' => 'Une paroi d’arolle, les nœuds du bois dans la lumière du soir'],
                    ['title' => 'Un vrai lit', 'body' => 'Matelas fait à Sion, duvet en plume, draps de lin lavé. Pas de télévision : une liseuse de chaque côté et une radio.', 'subject' => 'Un lit fait, le duvet blanc replié, deux liseuses allumées'],
                    ['title' => 'Une salle de bain à soi', 'body' => 'Douche à l’italienne ou baignoire, sol chauffé, savon au génépi fait dans la vallée.', 'subject' => 'Une salle de bain en pierre grise, la serviette sur le radiateur'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment elles ont été refaites',
                'title' => 'Deux hivers de travaux, rien de caché',
                'lead' => 'En 1904, la pension comptait quatorze chambres et une seule salle d’eau. Il en reste neuf, chacune avec la sienne.',
                'body' => [
                    'Quand Mathilde et Joël Fauchère ont repris la maison en 2014, les chambres étaient celles de l’arrière-grand-mère : un lit de fer, un broc, une cuvette. Il a fallu deux hivers pour réunir les petites chambres deux par deux, passer l’eau dans les murs et isoler le toit sans toucher aux façades.',
                    'Le menuisier du village a démonté chaque paroi, numéroté les planches et les a reposées sur l’isolation. Les lits, les tables de nuit et les lits superposés de la Forge sortent de son atelier, dans le mélèze d’une même coupe.',
                    'Côté village, les chambres donnent sur la ruelle et les toits de pierre : on y entend la fontaine. Côté vallée, elles ont un balcon et la Dent Blanche en face ; ce sont les premières réservées en février et en août.',
                ],
            ],
        ],
        '/photos' => [
            'label' => 'Photos',
            'hero' => [
                'eyebrow' => 'Photos',
                'title' => 'La maison, telle qu’elle est',
                'lead' => 'Douze photographies prises par nous au fil d’une année. Aucune n’est retouchée : la chambre que vous voyez est celle où vous dormirez.',
                'subject' => 'Le salon en fin d’après-midi, le thé servi, la neige derrière la vitre',
                'links' => [['label' => 'Voir les chambres', 'to' => '/rooms'], ['label' => 'Demander un séjour', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Au fil de l’année',
                'title' => 'Trois saisons, une même fenêtre',
                'items' => [
                    ['title' => 'En hiver', 'body' => 'Les pistes de fond passent au bas du village. Le soir, la ruelle est blanche et la maison sent le feu de bois.', 'subject' => 'Le balcon sous la neige, la vallée dans le brouillard'],
                    ['title' => 'En été', 'body' => 'On part à pied de la porte vers les mayens et les alpages ; le petit-déjeuner se prend au jardin dès que le soleil passe la crête.', 'subject' => 'La table du jardin dressée pour le petit-déjeuner, les géraniums aux fenêtres'],
                    ['title' => 'En automne', 'body' => 'Les mélèzes tournent à l’or à la mi-octobre. La maison est calme, et les prix sont ceux de la basse saison.', 'subject' => 'Les mélèzes dorés au-dessus du village, la Dent Blanche poudrée'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Qui a pris ces photos',
                'title' => 'Une année, un seul appareil',
                'lead' => 'Nous montrons la maison comme on la trouve en poussant la porte, pas comme un catalogue la rêverait.',
                'body' => [
                    'Joël a photographié la maison de janvier à décembre, toujours à la lumière qu’il y avait : aucune lampe ajoutée, aucun meuble déplacé pour l’image. Si un lit paraît étroit, c’est qu’il mesure un mètre vingt, et la liste des chambres le dit.',
                    'Nous avons écarté les images prises au grand-angle, qui agrandissent les pièces. La Suite du Fourneau fait trente-huit mètres carrés et le Grenier quatorze : les photos gardent cette différence.',
                    'Les vues de la vallée sont prises des balcons du deuxième étage. Les chambres côté village ne voient pas la Dent Blanche ; elles voient les toits de pierre, la fontaine et, la nuit, notre lanterne.',
                ],
            ],
        ],
        '/good-to-know' => [
            'label' => 'Bon à savoir',
            'hero' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Arriver, déjeuner, repartir',
                'lead' => 'Arrivée de 15 h à 19 h, départ jusqu’à 11 h, petit-déjeuner de 7 h 30 à 10 h. Pour le reste, voici ce qu’on nous demande le plus souvent au téléphone.',
                'subject' => 'La porte de l’hôtel la nuit, la lanterne allumée, le boîtier à clés sur le montant',
                'links' => [['label' => 'Demander un séjour', 'to' => '/book'], ['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000']],
            ],
            'features' => [
                'eyebrow' => 'Les trois heures à retenir',
                'title' => 'Une journée à la Lanterne',
                'items' => [
                    ['title' => 'Arrivée de 15 h à 19 h', 'body' => 'Quelqu’un vous attend à la réception et porte les bagages depuis la fontaine. Plus tard, la clé est dans le boîtier à code.', 'subject' => 'Le boîtier à clés à gauche de la porte, éclairé par la lanterne'],
                    ['title' => 'Petit-déjeuner de 7 h 30 à 10 h', 'body' => 'Dans la salle du fourneau. Pour une course en montagne, un thermos et un pique-nique vous attendent dès 5 h.', 'subject' => 'La table du petit-déjeuner, le pain de seigle entamé'],
                    ['title' => 'Départ jusqu’à 11 h', 'body' => 'Les bagages peuvent rester au local à skis jusqu’au soir, et la douche du rez-de-chaussée reste ouverte à ceux qui rentrent de course.', 'subject' => 'Des sacs à dos alignés dans le local à skis'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Trouver la porte',
                'title' => 'De la fontaine à la lanterne, de nuit',
                'lead' => 'La ruelle de la Forge n’a ni trottoir ni réverbère. C’est pour cela que la lanterne reste allumée.',
                'body' => [
                    'En voiture, suivez la route du village jusqu’au parking communal, sous l’église : une place par chambre vous y est réservée, marquée d’une lanterne peinte. La ruelle est trop étroite pour une voiture, mais vous pouvez décharger devant la fontaine, à cinquante mètres de la porte.',
                    'De la fontaine, prenez la ruelle qui monte entre les deux raccards. La maison est la troisième à droite : quatre niveaux de mélèze noirci, et la lanterne de cuivre au-dessus de la porte, allumée du coucher du soleil au matin.',
                    'Le dernier car postal de Sion arrive vers 19 h 45. Dites-nous que vous le prenez : nous descendons à l’arrêt avec la charrette à bagages, et en hiver avec une lampe.',
                ],
            ],
        ],
        '/book' => [
            'label' => 'Réserver',
            'hero' => [
                'eyebrow' => 'Réserver',
                'title' => 'Dites-nous vos dates',
                'lead' => 'Nous répondons dans la journée, avec les chambres libres et le prix du séjour. Rien n’est réservé avant notre confirmation, et aucun acompte n’est demandé hors fêtes.',
                'subject' => 'La réception : le registre ouvert, les neuf clés au tableau',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Voir les chambres', 'to' => '/rooms']],
            ],
            'features' => [
                'eyebrow' => 'Venir',
                'title' => 'En car postal, en voiture, à pied',
                'items' => [
                    ['title' => 'En train et en car postal', 'body' => 'Le train jusqu’à Sion, puis le car postal du val d’Hérens : quarante-cinq minutes jusqu’au centre du village, à quatre minutes à pied de la porte.', 'icon' => 'bus'],
                    ['title' => 'En voiture', 'body' => 'Trente minutes depuis la sortie d’autoroute de Sion-Est. Parking communal sous l’église, une place comprise par chambre.', 'icon' => 'square-parking'],
                    ['title' => 'Les derniers mètres', 'body' => 'La ruelle est piétonne : nous portons les bagages depuis la fontaine. De nuit, suivez la lanterne.', 'icon' => 'footprints'],
                ],
            ],
            'story' => [
                'eyebrow' => 'À plusieurs',
                'title' => 'La maison entière, pour dix-neuf',
                'body' => [
                    'Hors saison, la maison se loue en entier : neuf chambres, dix-neuf lits, la salle du fourneau et le salon. Un anniversaire, une cordée, une famille qui se retrouve : comptez 1 650.– la nuit, petit-déjeuner compris, deux nuits au minimum.',
                    'La table du soir peut alors être dressée tous les jours, à 46.– par personne. Écrivez-nous les dates et le nombre : Mathilde rappelle elle-même, et vous envoie le plan des chambres pour répartir tout le monde.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Ce soir même',
                'title' => 'Une chambre pour cette nuit ?',
                'lead' => 'Le formulaire est lu dans la journée. Pour une arrivée aujourd’hui, appelez : nous savons tout de suite ce qui est libre.',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Bon à savoir avant d’arriver', 'to' => '/good-to-know']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                    ['label' => 'Réception', 'value' => 'De 15 h à 19 h'],
                    ['label' => 'Dernier car postal', 'value' => 'Arrivée vers 19 h 45'],
                ],
            ],
        ],
    ],
];
