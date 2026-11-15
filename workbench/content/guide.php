<?php

declare(strict_types=1);

/*
 * The demo content of a guide: a fictional mountain guides' office in Evolène,
 * in the val d'Hérens, three guides, an aspirant and a hiking leader who take
 * people out from December to August. `site` is what every page shares,
 * `prefabs` is what the site would bind as `kit.<name>` — the rows its owner
 * keeps in the admin, in each component's own prop names — and `pages` holds
 * each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/guide.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Haute Trace',
        'blurb' => 'Bureau de guides de montagne du val d’Hérens : courses, cours et cabanes, de décembre à août.',
        'address' => 'Rue Centrale 21, 1983 Evolène',
        'phone' => '027 000 00 00',
        'email' => 'bureau@haute-trace.example',
        'status' => 'Neige dès 1800 m · premier départ à ski le samedi 12 décembre',
        'note' => '© Haute Trace, guides de montagne à Evolène',
        'action' => ['label' => 'Demander une place', 'to' => '/book'],
        'band' => [
            'eyebrow' => 'Partir',
            'title' => 'Une sortie vous tente ?',
            'lead' => 'Dites-nous laquelle et combien vous serez. Le bureau répond dans la journée, et rien n’est dû avant sa confirmation.',
            'links' => [['label' => 'Demander une place', 'to' => '/book'], ['label' => 'Voir les sorties', 'to' => '/outings']],
            'details' => [
                ['label' => 'Bureau', 'value' => 'Tous les jours, 16 h – 19 h'],
                ['label' => 'Téléphone', 'value' => '027 000 00 00', 'href' => 'tel:+41270000000'],
                ['label' => 'Rendez-vous', 'value' => 'Rue Centrale 21, en face de l’église d’Evolène'],
            ],
        ],
    ],

    'prefabs' => [
        'courses' => [
            'title' => 'Le programme de la saison',
            'courses' => [
                [
                    'name' => 'Initiation au ski de randonnée',
                    'date' => 'samedi 12 décembre',
                    'datetime' => '2026-12-12',
                    'time' => 'Départ 8 h 15',
                    'level' => 'Bons skieurs de piste',
                    'place' => 'Arolla',
                    'price' => 'CHF 190',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20initiation%20ski%20de%20rando%2C%2012%20d%C3%A9cembre',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Cours avalanche, deux jours',
                    'date' => 'les 9 et 10 janvier',
                    'datetime' => '2027-01-09',
                    'level' => 'Tous niveaux, à ski ou en raquettes',
                    'place' => 'La Forclaz',
                    'price' => 'CHF 360',
                    'seats' => '2 places',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20cours%20avalanche%2C%209%20et%2010%20janvier',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Cascade de glace, découverte',
                    'date' => 'samedi 23 janvier',
                    'datetime' => '2027-01-23',
                    'time' => 'Départ 8 h 30',
                    'level' => 'Débutants, dès 16 ans',
                    'place' => 'La Gouille',
                    'price' => 'CHF 220',
                    'full' => true,
                ],
                [
                    'name' => 'Pigne d’Arolla à ski, 3787 m',
                    'date' => 'les 13 et 14 mars',
                    'datetime' => '2027-03-13',
                    'level' => 'Bonne condition, 1300 m de montée',
                    'place' => 'Nuit à la cabane des Vignettes',
                    'price' => 'CHF 560',
                    'seats' => 'Dernière place',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20Pigne%20d%E2%80%99Arolla%2C%2013%20et%2014%20mars',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Haute Route Chamonix–Zermatt',
                    'date' => 'du 12 au 17 avril',
                    'datetime' => '2027-04-12',
                    'level' => 'Skieurs-alpinistes confirmés',
                    'place' => 'Six jours, cinq cabanes',
                    'price' => 'CHF 2150',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20Haute%20Route%2C%2012%20au%2017%20avril',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Semaine d’initiation à l’alpinisme',
                    'date' => 'du 5 au 9 juillet',
                    'datetime' => '2027-07-05',
                    'level' => 'Bons marcheurs, dès 16 ans',
                    'place' => 'Cabane des Dix',
                    'price' => 'CHF 1280',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20semaine%20d%E2%80%99alpinisme%2C%205%20au%209%20juillet',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Dent Blanche par l’arête sud, 4357 m',
                    'date' => 'les 17 et 18 juillet',
                    'datetime' => '2027-07-17',
                    'level' => 'Alpinistes confirmés, un guide pour deux',
                    'place' => 'Cabane de la Dent Blanche',
                    'price' => 'CHF 990',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20Dent%20Blanche%2C%2017%20et%2018%20juillet',
                    'label' => 'Demander une place',
                ],
                [
                    'name' => 'Tour des cabanes du val d’Hérens',
                    'date' => 'du 9 au 13 août',
                    'datetime' => '2027-08-09',
                    'level' => 'Bons marcheurs, sans corde',
                    'place' => 'Avec Nora Gaspoz, accompagnatrice',
                    'price' => 'CHF 890',
                    'href' => 'mailto:bureau@haute-trace.example?subject=Place%20%3A%20tour%20des%20cabanes%2C%209%20au%2013%20ao%C3%BBt',
                    'label' => 'Demander une place',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Les questions qu’on nous pose',
            'entries' => [
                [
                    'question' => 'Quel niveau faut-il pour s’inscrire ?',
                    'answer' => 'Chaque sortie indique son niveau et son dénivelé. En cas de doute, appelez le 027 000 00 00 entre 16 h et 19 h : nous vous dirons franchement si elle est à votre portée, ou laquelle faire d’abord.',
                ],
                [
                    'question' => 'Quel matériel dois-je apporter ?',
                    'answer' => 'Vos chaussures, vos habits chauds et un sac de 30 litres. Baudrier, casque, crampons, piolet, DVA, pelle et sonde sont prêtés sans supplément. Les skis et les peaux se louent à Evolène, à deux portes du bureau ; la liste complète part avec la confirmation.',
                ],
                [
                    'question' => 'Que se passe-t-il si la météo est mauvaise ?',
                    'answer' => 'Le guide décide la veille à 17 h et vous appelle. Il propose une autre course ou un autre jour ; si rien ne vous convient, la sortie est remboursée en entier.',
                ],
                [
                    'question' => 'Peut-on réserver un guide pour soi ?',
                    'answer' => 'Oui : une journée privée coûte CHF 680 pour une ou deux personnes, et CHF 60 par personne en plus. Indiquez la course et la date souhaitées dans la demande de réservation, ou écrivez à bureau@haute-trace.example.',
                ],
                [
                    'question' => 'Et si c’est moi qui annule ?',
                    'answer' => 'Sans frais jusqu’à quatorze jours avant le départ. Ensuite la moitié du prix est due, et la totalité dans les trois derniers jours, sauf si quelqu’un reprend votre place.',
                ],
                [
                    'question' => 'Suis-je assuré pendant la sortie ?',
                    'answer' => 'Votre guide est assuré en responsabilité civile, mais l’assurance accident et les frais de secours en montagne restent à votre charge. Vérifiez votre couverture avant le départ ; une carte de donateur d’un service de sauvetage aérien est vivement conseillée.',
                ],
                [
                    'question' => 'Que comprend le prix ?',
                    'answer' => 'Le guide, le matériel technique prêté et l’organisation. La demi-pension en cabane (environ CHF 85 la nuit), les remontées mécaniques et le car postal se règlent sur place.',
                ],
            ],
        ],
        'team' => [
            'title' => 'Les guides du bureau',
            'members' => [
                [
                    'name' => 'Maurice Follonier',
                    'role' => 'Guide de montagne UIAGM, fondateur',
                    'bio' => 'Trente hivers sur la Haute Route et plus de quarante fois la Dent Blanche. Il mène les grandes courses et forme les aspirants du bureau.',
                ],
                [
                    'name' => 'Élise Pralong',
                    'role' => 'Guide de montagne UIAGM',
                    'bio' => 'Arêtes rocheuses et courses mixtes : l’Aiguille de la Tsa, les Veisivi, le Mont Blanc de Cheilon. Elle encadre la semaine d’initiation à l’alpinisme.',
                ],
                [
                    'name' => 'Joël Métrailler',
                    'role' => 'Guide de montagne UIAGM, formateur avalanche',
                    'bio' => 'Ski de randonnée et cascade de glace. Il relève le manteau neigeux tout l’hiver au-dessus d’Arolla et donne les cours de sécurité.',
                ],
                [
                    'name' => 'Nora Gaspoz',
                    'role' => 'Accompagnatrice en montagne, brevet fédéral',
                    'bio' => 'Randonnée, raquettes et tours de cabanes, là où l’on marche sans corde. Botaniste de formation, elle connaît chaque alpage du val.',
                ],
                [
                    'name' => 'Samuel Rieder',
                    'role' => 'Aspirant guide',
                    'bio' => 'Escalade à Arolla, via ferrata et premières courses de neige, toujours sous la responsabilité d’un guide du bureau. Examen final en 2028.',
                ],
                [
                    'name' => 'Claire Anzévui',
                    'role' => 'Au bureau : réservations et cabanes',
                    'bio' => 'C’est elle qui répond au téléphone, réserve les cabanes et vous dit sans détour quelle sortie vous convient.',
                ],
            ],
        ],
        'gallery' => [
            'title' => 'La saison en douze images',
            'pictures' => [
                ['image' => 'picture:La Dent Blanche au lever du jour, vue de sa cabane', 'alt' => 'La Dent Blanche rose au lever du jour', 'caption' => 'La Dent Blanche, 4357 m, depuis la cabane', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une cordée de deux sur l’arête sud de la Dent Blanche', 'alt' => 'Une cordée sur une arête rocheuse', 'caption' => 'Arête sud, 18 juillet, 7 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La trace de montée à ski vers le Pigne d’Arolla', 'alt' => 'Une trace de ski de randonnée sur un glacier', 'caption' => 'Pigne d’Arolla, la trace du matin', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La cabane des Vignettes accrochée à son rocher', 'alt' => 'Une cabane de pierre au bord du vide', 'caption' => 'Cabane des Vignettes, 3160 m', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Six skieurs encordés sur le glacier d’Otemma', 'alt' => 'Des skieurs encordés sur un glacier plat', 'caption' => 'Haute Route, quatrième jour', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une grimpeuse sur la cascade de glace de la Gouille', 'alt' => 'Une grimpeuse sur une cascade gelée', 'caption' => 'La Gouille, janvier', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Recherche au DVA dans la neige fraîche à La Forclaz', 'alt' => 'Un exercice de recherche de victime d’avalanche', 'caption' => 'Cours avalanche, deuxième jour', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le réfectoire de la cabane des Dix face au Mont Blanc de Cheilon', 'alt' => 'Une table de cabane devant une fenêtre', 'caption' => 'Cabane des Dix, la soupe de 18 h 30', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le sommet du Pigne d’Arolla, le Cervin au fond', 'alt' => 'Des skieurs au sommet, le Cervin à l’horizon', 'caption' => 'Au sommet, le Cervin au fond', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une randonneuse au bord du lac Bleu d’Arolla', 'alt' => 'Un petit lac turquoise entre les mélèzes', 'caption' => 'Lac Bleu, tour des cabanes', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Premiers pas en crampons sur le glacier de Cheilon', 'alt' => 'Des débutants en crampons sur un glacier', 'caption' => 'Semaine d’initiation, premier jour', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le brouillard qui se lève sur le vallon de Ferpècle', 'alt' => 'Un vallon glaciaire sous le brouillard', 'caption' => 'Ferpècle, un jour de demi-tour', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander une place',
            'intro' => 'Dites-nous la sortie, combien vous serez et une date qui vous convient. Claire répond dans la journée : la place est à vous dès sa confirmation écrite.',
            'action' => '#booking',
            'services' => [
                'Initiation au ski de randonnée, 12 décembre',
                'Cours avalanche, 9 et 10 janvier',
                'Pigne d’Arolla à ski, 13 et 14 mars',
                'Haute Route Chamonix–Zermatt, 12 au 17 avril',
                'Semaine d’initiation à l’alpinisme, 5 au 9 juillet',
                'Dent Blanche, 17 et 18 juillet',
                'Tour des cabanes, 9 au 13 août',
                'Journée privée avec un guide',
            ],
        ],
        'map' => [
            'address' => 'Rue Centrale 21, 1983 Evolène',
            'title' => 'Rendez-vous au bureau, en face de l’église',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Guides de montagne · Val d’Hérens',
                'title' => 'Partir là-haut avec un guide du pays',
                'lead' => 'Trois guides, un aspirant et une accompagnatrice, tous de la vallée. Huit sorties datées de décembre à août, de la première journée en peaux de phoque à la Dent Blanche, et des journées privées toute l’année.',
                'subject' => 'La Dent Blanche au lever du jour, une cordée sur l’arête',
                'note' => 'Prochain départ : initiation au ski de randonnée, samedi 12 décembre',
                'links' => [['label' => 'Demander une place', 'to' => '/book'], ['label' => 'Voir les sorties', 'to' => '/outings']],
                'facts' => [['value' => '8', 'label' => 'Sorties datées'], ['value' => '6', 'label' => 'Par guide, au plus'], ['value' => '1996', 'label' => 'Année d’ouverture']],
            ],
            'features' => [
                'eyebrow' => 'Le bureau',
                'title' => 'Les dates, les guides, la montagne',
                'lead' => 'Tout ce qu’il faut savoir avant de demander une place tient en trois pages.',
                'items' => [
                    ['title' => 'Les sorties de la saison', 'body' => 'Huit départs datés, chacun avec son niveau, son prix et les places qui restent.', 'subject' => 'La trace de montée à ski vers le Pigne d’Arolla', 'to' => '/outings', 'label' => 'Le programme'],
                    ['title' => 'Ceux qui vous emmènent', 'body' => 'Trois guides UIAGM, un aspirant et une accompagnatrice, chacun sur le terrain qu’il connaît le mieux.', 'subject' => 'Maurice Follonier lovant une corde devant le bureau', 'to' => '/guides', 'label' => 'Les guides'],
                    ['title' => 'À quoi cela ressemble', 'body' => 'Les arêtes, les cabanes et les glaciers où nous allons, photographiés par les guides pendant la saison.', 'subject' => 'La cabane des Vignettes accrochée à son rocher', 'to' => '/gallery', 'label' => 'Les images'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1996',
                'title' => 'Un bureau, une vallée, trente saisons',
                'lead' => 'Nous ne proposons que des courses que nous faisons nous-mêmes, plusieurs fois par an.',
                'body' => [
                    'Maurice Follonier a ouvert le bureau en 1996 dans l’ancienne forge de la rue Centrale, avec un téléphone, la liste des cabanes et un tableau noir pour la météo. Le tableau est toujours là : chaque soir à 17 h, on y écrit l’isotherme, le vent à 3000 m et les courses du lendemain.',
                    'Le bureau n’a jamais voulu grandir. Trois guides, un aspirant et une accompagnatrice suffisent pour huit sorties au programme et les journées privées ; au-delà, nous ne connaîtrions plus ceux que nous emmenons. Une sortie ne dépasse pas six personnes par guide, et deux sur une arête.',
                    'Tout part d’Evolène. On se retrouve au bureau, on vérifie les sacs, puis le car postal ou le minibus monte vers Arolla, Ferpècle ou La Forclaz. Le soir, ceux qui redescendent passent dire comment c’était : c’est ainsi que s’écrit le programme de l’année suivante.',
                ],
            ],
        ],
        '/outings' => [
            'label' => 'Sorties',
            'hero' => [
                'eyebrow' => 'Programme 2026–2027',
                'title' => 'Les sorties, leurs dates et les places qui restent',
                'lead' => 'Huit départs de décembre à août. Chaque ligne dit pour qui, où et combien ; une sortie part dès trois inscrits et ne dépasse jamais six personnes par guide.',
                'subject' => 'Six skieurs encordés sur le glacier d’Otemma',
                'links' => [['label' => 'Demander une place', 'to' => '/book']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Ce qui vaut pour toutes les sorties',
                'items' => [
                    ['title' => 'Le point météo', 'body' => 'La veille à 17 h, le guide confirme, déplace ou annule. Annulée par nous, la sortie est remboursée en entier.', 'icon' => 'cloud-sun'],
                    ['title' => 'Le matériel', 'body' => 'Baudrier, casque, crampons, piolet et DVA sont prêtés. Vous venez avec vos chaussures et votre sac.', 'icon' => 'backpack'],
                    ['title' => 'Le groupe', 'body' => 'Départ dès trois inscrits, six personnes par guide au plus, deux sur une arête comme celle de la Dent Blanche.', 'icon' => 'users'],
                ],
            ],
        ],
        '/guides' => [
            'label' => 'Les guides',
            'hero' => [
                'eyebrow' => 'Les guides',
                'title' => 'Ceux qui vous emmènent',
                'lead' => 'Trois guides de montagne, un aspirant et une accompagnatrice. Tous vivent entre Evolène et Arolla, et guident là où ils skient et grimpent leurs jours de congé.',
                'subject' => 'Les guides du bureau sur la terrasse de la cabane de Bertol',
                'links' => [['label' => 'Demander une place', 'to' => '/book'], ['label' => 'Voir les sorties', 'to' => '/outings']],
            ],
            'story' => [
                'eyebrow' => 'Le métier',
                'title' => 'Un brevet, et vingt ans sur le même terrain',
                'lead' => 'Le titre dit qu’un guide sait faire. La vallée dit où il le fait le mieux.',
                'body' => [
                    'Guide de montagne est un métier protégé : le brevet fédéral et l’insigne UIAGM se gagnent en trois ans de formation, après des années de courses en tête. Maurice, Élise et Joël le portent ; Samuel, aspirant, travaille sous la responsabilité de l’un d’eux jusqu’à son examen final, en 2028.',
                    'Nora est accompagnatrice en montagne, un autre brevet fédéral : elle mène tout ce qui se marche sans corde ni crampons, été comme hiver. Si une course demande un glacier, elle passe la main à un guide, et le dit dès l’inscription.',
                    'Chacun a son terrain. Dites-nous ce que vous cherchez plutôt qu’un nom : Claire, au bureau, sait qui est libre, qui connaît le mieux la course et qui parle allemand ou anglais.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Leur terrain',
                'title' => 'Trois terrains, une vallée',
                'items' => [
                    ['title' => 'La haute montagne', 'body' => 'Dent Blanche, Pigne d’Arolla, Mont Blanc de Cheilon : les courses de neige et d’arête, de juin à septembre.', 'subject' => 'Une cordée sur l’arête de la Dent Blanche'],
                    ['title' => 'L’hiver à ski', 'body' => 'Ski de randonnée, cours avalanche et cascade de glace entre Arolla et La Forclaz, de décembre à avril.', 'subject' => 'Un guide ouvrant la trace dans la neige fraîche'],
                    ['title' => 'Les sentiers', 'body' => 'Tours de cabanes, raquettes et alpages avec Nora, pour qui veut la montagne sans la corde.', 'subject' => 'Un sentier d’alpage au-dessus des Haudères'],
                ],
            ],
        ],
        '/gallery' => [
            'label' => 'En images',
            'hero' => [
                'eyebrow' => 'En images',
                'title' => 'Ce qu’on voit de là-haut',
                'lead' => 'Douze photographies de la saison, prises par les guides entre deux longueurs. Rien n’est retouché, et le ciel n’est pas toujours bleu.',
                'subject' => 'Le Cervin vu du sommet du Pigne d’Arolla',
                'links' => [['label' => 'Voir les sorties', 'to' => '/outings']],
            ],
            'story' => [
                'eyebrow' => 'Carnet',
                'title' => 'Douze images, pas une de plus',
                'lead' => 'Aucune ne vient d’une banque d’images : elles sortent toutes de la poche d’un guide.',
                'body' => [
                    'Les guides photographient peu, et souvent de travers, parce qu’ils tiennent une corde de l’autre main. Chaque automne nous gardons douze images de la saison, celles qui disent le mieux à quoi ressemble une journée : la trace du matin, la cabane, le sommet, et parfois le brouillard qui fait faire demi-tour.',
                    'Si vous étiez de la sortie et que vous vous reconnaissez, écrivez-nous à bureau@haute-trace.example : nous vous envoyons le fichier, ou nous retirons l’image si vous le préférez.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois lieux',
                'title' => 'Où ces images ont été prises',
                'items' => [
                    ['title' => 'Arolla', 'body' => 'Le fond de la vallée, à 2000 m : le départ du Pigne, des cascades de glace et de notre étape de la Haute Route.', 'subject' => 'Le hameau d’Arolla sous le mont Collon'],
                    ['title' => 'Ferpècle', 'body' => 'Le vallon des glaciers, par où l’on monte en cinq heures à la cabane de la Dent Blanche.', 'subject' => 'La langue du glacier de Ferpècle'],
                    ['title' => 'Les cabanes', 'body' => 'Vignettes, Dix, Bertol, Dent Blanche : presque toutes nos courses commencent par une nuit là-haut.', 'subject' => 'La terrasse de la cabane des Dix au coucher du soleil', 'to' => '/outings', 'label' => 'Les sorties qui y dorment'],
                ],
            ],
        ],
        '/book' => [
            'hero' => [
                'eyebrow' => 'Réserver',
                'title' => 'Demander une place ou une journée privée',
                'lead' => 'Choisissez la sortie, dites combien vous serez et une date qui vous convient. Claire répond dans la journée ; rien n’est dû avant sa confirmation.',
                'subject' => 'La porte du bureau, cordes et piolets pendus à l’entrée',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Voir les sorties', 'to' => '/outings']],
            ],
            'story' => [
                'eyebrow' => 'Comment cela se passe',
                'title' => 'De la demande au départ',
                'lead' => 'Une demande n’est pas encore une réservation : c’est la réponse du bureau qui vous donne la place.',
                'body' => [
                    'Claire lit les demandes chaque soir et répond dans la journée, par e-mail ou par téléphone. Si la sortie est à votre portée et qu’il reste une place, vous recevez la confirmation, la liste du matériel et un bulletin de versement ; la place vous est gardée dix jours.',
                    'La veille à 17 h, le guide fait le point météo et vous appelle si quelque chose change : une autre course, un autre jour ou le remboursement entier. Personne ne part pour tenir un programme.',
                    'Le rendez-vous est au bureau, en face de l’église d’Evolène, à l’heure écrite sur la confirmation. Le car postal de Sion s’arrête à cinquante mètres, et le parking communal est gratuit pour ceux qui dorment en cabane.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Avant d’écrire',
                'title' => 'Trois façons de partir',
                'items' => [
                    ['title' => 'Une place sur une sortie', 'body' => 'Vous rejoignez un groupe de trois à six personnes à la date du programme. Le prix est par personne, guide et matériel technique compris.', 'subject' => 'Un groupe encordé au départ d’Arolla', 'to' => '/outings', 'label' => 'Les dates'],
                    ['title' => 'Une journée privée', 'body' => 'Un guide pour vous seuls, la course et la date de votre choix : CHF 680 la journée pour une ou deux personnes, CHF 60 par personne en plus.', 'subject' => 'Un guide et sa cliente au pied de l’Aiguille de la Tsa'],
                    ['title' => 'Un bon cadeau', 'body' => 'Valable deux ans sur toutes les sorties, au montant que vous fixez. Il se retire au bureau ou arrive par la poste en trois jours.', 'subject' => 'Un bon cadeau glissé dans une carte du val d’Hérens'],
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Une course en tête, mais un doute ?',
                'lead' => 'Appelez le bureau en fin de journée, quand les guides sont redescendus : c’est souvent l’un d’eux qui décroche.',
                'links' => [['label' => 'Appeler le 027 000 00 00', 'href' => 'tel:+41270000000'], ['label' => 'Écrire au bureau', 'href' => 'mailto:bureau@haute-trace.example']],
                'details' => [
                    ['label' => 'Bureau', 'value' => 'Tous les jours, 16 h – 19 h'],
                    ['label' => 'Rendez-vous', 'value' => 'Rue Centrale 21, en face de l’église'],
                    ['label' => 'Car postal', 'value' => 'Arrêt Evolène, poste, à cinquante mètres'],
                ],
            ],
        ],
    ],
];
