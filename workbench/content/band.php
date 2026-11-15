<?php

declare(strict_types=1);

/*
 * The demo content of a band: a fictional quintet of gypsy swing and French
 * song from Neuchâtel, twelve winters on the road. `site` is what every page
 * shares, `prefabs` is what the site would bind as `kit.<name>` — the rows the
 * band keeps in the admin, in each component's own prop names — and `pages`
 * holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/band.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Bise Noire',
        'blurb' => 'Quintette de swing manouche et de chanson, à Neuchâtel depuis 2014 : deux guitares, un violon, une contrebasse et une voix.',
        'address' => 'Rue des Moulins 21, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'contact@bise-noire.example',
        'status' => 'Prochain concert : vendredi 20 novembre, Neuchâtel',
        'note' => '© Bise Noire',
        'action' => ['label' => 'Engager le groupe', 'to' => '/booking'],
        'band' => [
            'eyebrow' => 'Engager le groupe',
            'title' => 'Une soirée à faire jouer ?',
            'lead' => 'Dites-nous la date et la salle : nous répondons sous trois jours, avec une formule et un prix ferme.',
            'links' => [['label' => 'Demander une date', 'to' => '/booking'], ['label' => 'Voir les concerts', 'to' => '/shows']],
            'details' => [
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Formules', 'value' => 'Duo, trio ou quintette, dès CHF 900'],
                ['label' => 'Rayon', 'value' => 'Toute la Suisse romande, au-delà sur demande'],
            ],
        ],
    ],

    'prefabs' => [
        'events' => [
            'title' => 'Les prochaines dates',
            'events' => [
                ['date' => 'vendredi 20 novembre', 'time' => '20 h 30', 'datetime' => '2026-11-20T20:30', 'name' => 'Neuchâtel · Cave du Griffon', 'description' => 'L’album Vent debout joué en entier, en deux parties. Entrée 25.–, étudiants 18.–, billets à la porte.'],
                ['date' => 'samedi 28 novembre', 'time' => '21 h', 'datetime' => '2026-11-28T21:00', 'name' => 'La Chaux-de-Fonds · La Remise', 'description' => 'Bal swing sur parquet, initiation à la danse dès 20 h. Entrée 22.–.'],
                ['date' => 'vendredi 4 décembre', 'time' => '20 h', 'datetime' => '2026-12-04T20:00', 'name' => 'Bienne · Cave des Tanneurs', 'description' => 'Concert assis, quatre-vingts places. Réservation auprès de la salle, 28.–.'],
                ['date' => 'samedi 12 décembre', 'time' => '17 h 30', 'datetime' => '2026-12-12T17:30', 'name' => 'Fribourg · Marché de Noël, kiosque de la place', 'description' => 'Une heure en plein air, entrée libre. Le vin chaud est à côté : habillez-vous.'],
                ['date' => 'jeudi 31 décembre', 'time' => '22 h', 'datetime' => '2026-12-31T22:00', 'name' => 'Yverdon-les-Bains · Salle des Rives', 'description' => 'Nuit de la Saint-Sylvestre : repas dès 19 h 30, bal jusqu’à 2 h. Sur réservation auprès de la salle, 95.– repas compris.'],
                ['date' => 'samedi 16 janvier', 'time' => '20 h 30', 'datetime' => '2027-01-16T20:30', 'name' => 'Lausanne · Cave de la Louve', 'description' => 'Avec le clarinettiste Léo Favre en invité. Entrée 30.–, prélocation conseillée.'],
                ['date' => 'vendredi 5 février', 'time' => '20 h', 'datetime' => '2027-02-05T20:00', 'name' => 'Delémont · Cave du Soleil', 'description' => 'Dans la saison de la société de jazz du Jura. Entrée 25.–, membres 15.–.'],
                ['date' => 'samedi 27 février', 'time' => '20 h 30', 'datetime' => '2027-02-27T20:30', 'name' => 'Genève · Salle du Môle', 'description' => 'Dernière date de l’hiver. En première partie, le duo Les Sœurs Chappuis. Entrée 28.–.'],
            ],
        ],
        'catalogue' => [
            'items' => [
                ['id' => 'vent-debout-33t', 'name' => 'Vent debout, 33 tours', 'price' => '32.–', 'description' => '2024. Douze titres enregistrés sur bande à Saint-Imier, pochette sérigraphiée à la main, tirage de 500.'],
                ['id' => 'vent-debout-cd', 'name' => 'Vent debout, CD', 'price' => '20.–', 'description' => 'Le même album en pochette cartonnée, avec un livret de seize pages et tous les textes.'],
                ['id' => 'nuits-de-fevrier-33t', 'name' => 'Les Nuits de février, 33 tours', 'price' => '30.–', 'description' => '2019. Enregistré en public trois soirs de suite à La Chaux-de-Fonds. Second pressage.'],
                ['id' => 'nuits-de-fevrier-cd', 'name' => 'Les Nuits de février, CD', 'price' => '18.–', 'description' => 'Les quatorze titres du concert, plus deux rappels que le vinyle n’a pas pu tenir.'],
                ['id' => 'quai-osterwald-cd', 'name' => 'Quai Osterwald, CD', 'price' => '15.–', 'description' => '2016. Le premier disque, dix titres en quatre jours. Le vinyle est épuisé.'],
                ['id' => 'la-bise-45t', 'name' => 'La Bise, 45 tours', 'price' => '12.–', 'description' => 'Deux inédits pressés pour les dix ans du groupe, 300 exemplaires numérotés.'],
                ['id' => 'carnet-partitions', 'name' => 'Carnet de partitions', 'price' => '28.–', 'description' => 'Douze thèmes du répertoire, grilles et mélodies, reliés à spirale pour tenir sur un pupitre.'],
                ['id' => 'affiche-tournee', 'name' => 'Affiche de la tournée', 'price' => '25.–', 'description' => 'Sérigraphie en deux couleurs, 50 × 70 cm, signée par Camille Borel.'],
                ['id' => 'sac-toile', 'name' => 'Sac en toile', 'price' => '15.–', 'description' => 'Coton épais, la bise imprimée en noir. Il contient six vinyles, pas sept.'],
            ],
        ],
        'team' => [
            'title' => 'Qui joue quoi',
            'members' => [
                ['name' => 'Élise Jeanneret', 'role' => 'Chant et accordéon', 'bio' => 'Institutrice à Peseux. Elle écrit les textes dans le train et tient l’accordéon de son grand-père, des Verrières.'],
                ['name' => 'Mathieu Perrin', 'role' => 'Guitare solo', 'bio' => 'Luthier à Saint-Blaise : il joue depuis 2017 une guitare qu’il a construite lui-même.'],
                ['name' => 'Noé Vuilleumier', 'role' => 'Guitare rythmique', 'bio' => 'Il tient la pompe depuis le premier concert, et le volant de la camionnette.'],
                ['name' => 'Salomé Droz', 'role' => 'Violon', 'bio' => 'Sortie du conservatoire de La Chaux-de-Fonds, passée au swing par les bals du Jura.'],
                ['name' => 'Joaquim Robert', 'role' => 'Contrebasse', 'bio' => 'Comptable le jour. Il écrit les arrangements, et sa contrebasse a cent dix ans.'],
                ['name' => 'Lucie Monnard', 'role' => 'Son et régie', 'bio' => 'À la console depuis 2018 : elle connaît l’acoustique de chaque cave du canton.'],
            ],
        ],
        'gallery' => [
            'title' => 'La scène, la salle, la route',
            'pictures' => [
                ['image' => 'picture:Le quintette sur la scène de la Cave du Griffon', 'alt' => 'Cinq musiciens sur une petite scène voûtée, éclairés de côté', 'caption' => 'Cave du Griffon, Neuchâtel', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La main de Mathieu sur le manche de sa guitare', 'alt' => 'Une main gauche sur le manche d’une guitare manouche', 'caption' => 'La guitare construite par Mathieu', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Élise à l’accordéon, les yeux fermés', 'alt' => 'Une chanteuse joue de l’accordéon devant un micro', 'caption' => 'Élise, pendant Les Nuits de février', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le parquet de La Remise pendant le bal', 'alt' => 'Des couples dansent sur un parquet, le groupe au fond de la salle', 'caption' => 'Bal swing à La Chaux-de-Fonds', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le public debout sous la voûte, vu depuis la scène', 'alt' => 'Une cave pleine, des visages tournés vers la scène', 'caption' => 'Cent vingt personnes, pas une de plus', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Lucie à la console pendant la balance, salle vide', 'alt' => 'Une ingénieure du son à sa console devant une salle vide', 'caption' => 'La balance, à 17 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le kiosque illuminé du marché de Noël de Fribourg', 'alt' => 'Une foule en manteaux devant un kiosque à musique illuminé', 'caption' => 'Fribourg, en plein air par moins deux', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le trio sous une tonnelle pendant un apéritif de mariage', 'alt' => 'Trois musiciens jouent sous une tonnelle, des invités un verre à la main', 'caption' => 'Un mariage à Cressier, en trio', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La table des disques après le concert', 'alt' => 'Des vinyles et des affiches sur une table éclairée par une lampe', 'caption' => 'La table des disques', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La camionnette arrêtée à la Vue-des-Alpes sous la neige', 'alt' => 'Une camionnette blanche au bord d’une route de col enneigée', 'caption' => 'La Vue-des-Alpes, au retour', 'width' => 1200, 'height' => 900],
            ],
        ],
        'booking' => [
            'title' => 'Demander une date',
            'intro' => 'Dites-nous l’occasion, la date, la salle et combien de personnes elle reçoit. Nous répondons sous trois jours ; rien n’est réservé avant notre confirmation.',
            'action' => '#booking',
            'services' => ['Mariage', 'Soirée d’entreprise', 'Festival ou saison culturelle', 'Bal swing', 'Fête privée', 'Vernissage ou apéritif'],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Swing manouche et chanson · Neuchâtel',
                'title' => 'Du swing à cordes, chanté en français',
                'lead' => 'Deux guitares, un violon, une contrebasse et une voix à l’accordéon. Soixante concerts par an, des caves du canton aux mariages au bord du lac.',
                'subject' => 'Le quintette sur la scène d’une cave voûtée, les guitares dans la lumière',
                'note' => 'Prochain concert : vendredi 20 novembre, Cave du Griffon, Neuchâtel',
                'links' => [['label' => 'Engager le groupe', 'to' => '/booking'], ['label' => 'Voir les concerts', 'to' => '/shows']],
                'facts' => [['value' => '60', 'label' => 'Concerts par an'], ['value' => '3', 'label' => 'Albums depuis 2016'], ['value' => '2014', 'label' => 'Premier concert']],
            ],
            'features' => [
                'eyebrow' => 'Bise Noire',
                'title' => 'Nous entendre, nous emporter, nous inviter',
                'lead' => 'Le même répertoire sur scène, sur disque et chez vous : une moitié de thèmes manouches, une moitié de chansons à nous.',
                'items' => [
                    ['title' => 'Sur scène', 'body' => 'Huit dates d’ici la fin février, de Neuchâtel à Genève : des caves, un bal et une nuit de la Saint-Sylvestre.', 'subject' => 'Le public debout dans une cave, le groupe au fond', 'to' => '/shows', 'label' => 'Les prochaines dates'],
                    ['title' => 'Sur disque', 'body' => 'Trois albums et un 45 tours, pressés en petits tirages et sérigraphiés à La Chaux-de-Fonds.', 'subject' => 'Trois pochettes sérigraphiées posées contre un mur', 'to' => '/music', 'label' => 'Les disques'],
                    ['title' => 'Chez vous', 'body' => 'En duo pour un apéritif, à cinq pour un bal : une trentaine de soirées privées par an.', 'subject' => 'Le quintette sous une tonnelle, des invités qui dansent', 'to' => '/booking', 'label' => 'Demander une date'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2014',
                'title' => 'Un groupe né d’une panne de chauffage',
                'lead' => 'Le nom vient du premier soir : la bise noire soufflait sur le lac, et le café n’avait plus de chaudière.',
                'body' => [
                    'Le premier concert a eu lieu en février 2014 dans un café de la rue des Moulins dont le chauffage venait de lâcher. Il y avait vingt personnes en manteau, deux guitares et un accordéon. Le patron a offert le vin chaud et demandé qu’on revienne le mois suivant.',
                    'Le violon est arrivé en 2015, la contrebasse l’année d’après, et depuis 2018 nous sommes les mêmes six, en comptant Lucie à la console. Nous jouons sans batterie : c’est la guitare rythmique qui tient le temps, et c’est ce qui permet de jouer dans une cave comme dans un jardin.',
                    'Aucun de nous ne vit que de la scène. Cela limite les tournées à ce qu’une camionnette fait en une soirée, et cela explique que le groupe tienne depuis douze hivers.',
                ],
            ],
        ],
        '/shows' => [
            'label' => 'Concerts',
            'hero' => [
                'eyebrow' => 'Concerts',
                'title' => 'Huit dates d’ici la fin de l’hiver',
                'lead' => 'Les billets se prennent à la porte ou auprès de la salle : nous n’en vendons pas nous-mêmes. Les portes ouvrent une heure avant la première partie.',
                'subject' => 'La scène avant le concert, les instruments posés sur leurs pieds',
                'links' => [['label' => 'Engager le groupe', 'to' => '/booking'], ['label' => 'Écouter les disques', 'to' => '/music']],
            ],
            'features' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Ce qu’une soirée a de sûr',
                'items' => [
                    ['title' => 'Deux parties', 'body' => 'Deux fois quarante-cinq minutes, et une pause entre les deux pour le bar.', 'icon' => 'clock'],
                    ['title' => 'Les billets', 'body' => 'À la porte, en espèces ou par carte. La plupart des caves ont moins de cent places : venez tôt.', 'icon' => 'ticket'],
                    ['title' => 'La table des disques', 'body' => 'Près de la sortie après le dernier morceau, aux prix du site et sans frais de port.', 'icon' => 'music', 'to' => '/music', 'label' => 'Ce qu’il y a sur la table'],
                ],
            ],
            'story' => [
                'eyebrow' => 'La saison',
                'title' => 'L’hiver dans les caves, l’été dehors',
                'lead' => 'De novembre à mars nous jouons en salle, presque toujours à moins de deux heures de Neuchâtel.',
                'body' => [
                    'L’hiver est la saison des caves : des salles de quatre-vingts à cent vingt places où l’on joue sans retour de scène et où le public est à deux mètres. C’est là que le répertoire se rode, et c’est là qu’il vaut la peine de nous entendre une première fois.',
                    'Dès mai, les dates publiques se font rares : les samedis vont aux mariages et aux fêtes de village. Les concerts d’été sont annoncés ici six semaines avant, et jamais ailleurs plus tôt.',
                    'Une date annulée est retirée de cette page le jour même. Si elle y figure, nous jouons.',
                ],
            ],
        ],
        '/music' => [
            'label' => 'Disques',
            'hero' => [
                'eyebrow' => 'Disques',
                'title' => 'Trois albums, un 45 tours et la table des disques',
                'lead' => 'Tout est pressé en petits tirages et sérigraphié à la main. Envoi en Suisse sous une semaine, port 9.– quel que soit le nombre de disques.',
                'subject' => 'La pochette de Vent debout : une bise noire sérigraphiée sur carton gris',
                'links' => [['label' => 'Commander par e-mail', 'href' => 'mailto:disques@bise-noire.example'], ['label' => 'Les acheter au concert', 'to' => '/shows']],
            ],
            'features' => [
                'eyebrow' => 'Écouter d’abord',
                'title' => 'Où nous entendre avant d’acheter',
                'items' => [
                    ['title' => 'En ligne', 'body' => 'Les trois albums sont en écoute entière sur les plateformes. Le 45 tours n’existe qu’en vinyle.', 'subject' => 'Un casque posé sur une platine'],
                    ['title' => 'Chez les disquaires', 'body' => 'En dépôt chez quatre disquaires, à Neuchâtel, La Chaux-de-Fonds, Bienne et Lausanne.', 'subject' => 'Un bac de vinyles, Vent debout en façade'],
                    ['title' => 'En concert', 'body' => 'Le moyen le plus sûr : tout ce qui est sur un disque a d’abord été joué vingt fois en public.', 'subject' => 'La table des disques au fond d’une cave', 'to' => '/shows', 'label' => 'Les prochaines dates'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les pochettes',
                'title' => 'Chaque disque passe deux fois sous la raclette',
                'lead' => 'Camille Borel dessine nos pochettes depuis le premier album et les imprime elle-même, à La Chaux-de-Fonds.',
                'body' => [
                    'Une pochette de Bise Noire est un carton gris imprimé en deux passages : le noir d’abord, puis une seule couleur, qui change à chaque disque. Aucune n’est tout à fait pareille à sa voisine, et c’est pour cela que les tirages s’arrêtent à cinq cents.',
                    'Vent debout a été enregistré sur bande en cinq jours, tous dans la même pièce, sans casque. Ce qu’on entend est une prise entière : quand quelqu’un se trompe, on recommence le morceau.',
                    'Un disque épuisé n’est pas repressé à l’identique. Les Nuits de février en est à son second pressage, avec une autre couleur ; Quai Osterwald n’existe plus qu’en CD.',
                ],
            ],
        ],
        '/band' => [
            'label' => 'Le groupe',
            'hero' => [
                'eyebrow' => 'Le groupe',
                'title' => 'Cinq musiciens et une ingénieure du son',
                'lead' => 'Les mêmes depuis 2018. Il y a parmi nous un luthier, une institutrice et un comptable, et c’est pour cela que nous jouons encore ensemble.',
                'subject' => 'Les six devant la camionnette, un matin de départ',
                'links' => [['label' => 'Engager le groupe', 'to' => '/booking'], ['label' => 'Voir les concerts', 'to' => '/shows']],
            ],
            'features' => [
                'eyebrow' => 'Le répertoire',
                'title' => 'Ce que nous jouons',
                'items' => [
                    ['title' => 'Les thèmes manouches', 'body' => 'Une vingtaine de standards, de Minor Swing à Nuages, joués comme on les apprend : à l’oreille, autour d’une table.', 'subject' => 'Deux guitares manouches posées sur des chaises de bistrot'],
                    ['title' => 'Nos chansons', 'body' => 'Vingt-six titres écrits par Élise depuis 2014, sur des gens qui attendent le train ou le printemps.', 'subject' => 'Un carnet de textes ouvert sur un pupitre', 'to' => '/music', 'label' => 'Les disques'],
                    ['title' => 'Les reprises', 'body' => 'Brassens, Barbara et quelques airs du Jura, passés au swing pour les bals.', 'subject' => 'Le parquet d’un bal vu depuis la scène', 'to' => '/shows', 'label' => 'Les entendre en concert'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Notre histoire',
                'title' => 'Douze hivers, une camionnette et aucune batterie',
                'lead' => 'Nous nous sommes rencontrés dans les bals du Jura et à la gare de Neuchâtel, pas dans une école.',
                'body' => [
                    'Élise et Noé jouaient en duo dans les cafés quand Mathieu, qui réparait la guitare de Noé, a demandé à venir essayer la sienne un soir. Il n’est pas reparti. Salomé nous a rejoints après un bal aux Breuleux où elle avait joué toute la nuit sans partition.',
                    'Joaquim est arrivé en 2016 avec une contrebasse de 1916 et un tableau des comptes. Le groupe lui doit ses arrangements à cinq voix et le fait d’avoir toujours payé ses disques avant de les presser.',
                    'Lucie fait le son depuis 2018. Elle règle la salle avant nous et la quitte après : sans batterie ni amplificateur de guitare, tout tient à quatre micros et à ses oreilles.',
                ],
            ],
        ],
        '/booking' => [
            'hero' => [
                'eyebrow' => 'Engager le groupe',
                'title' => 'Une date, une salle, et nous venons jouer',
                'lead' => 'Mariages, soirées d’entreprise, festivals et bals : une trentaine de soirées par an, en duo, en trio ou à cinq. Réponse sous trois jours, avec un prix ferme.',
                'subject' => 'Le trio jouant pendant un apéritif de mariage, au bord du lac',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000'], ['label' => 'Nous entendre d’abord', 'to' => '/shows']],
            ],
            'features' => [
                'eyebrow' => 'Les formules',
                'title' => 'Trois façons de nous faire venir',
                'lead' => 'Les prix comprennent le déplacement en Suisse romande et la sonorisation jusqu’à cent cinquante personnes.',
                'items' => [
                    ['title' => 'Le duo, dès CHF 900', 'body' => 'Guitare et voix, pour une cérémonie ou un apéritif. Deux parties de trente minutes, sans sonorisation jusqu’à quarante personnes.', 'subject' => 'Élise et Mathieu jouant dans un jardin'],
                    ['title' => 'Le trio, dès CHF 1 500', 'body' => 'Deux guitares et la contrebasse, sans chant : la musique d’un repas, qu’on entend sans hausser la voix.', 'subject' => 'Le trio dans un coin de salle, des tables dressées'],
                    ['title' => 'Le quintette, dès CHF 2 800', 'body' => 'Le concert entier, deux parties de quarante-cinq minutes, et le bal ensuite si la salle a un parquet.', 'subject' => 'Le quintette sur une scène de fête, des couples qui dansent'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment cela se passe',
                'title' => 'De votre message au dernier morceau',
                'lead' => 'Quatre choses nous suffisent pour donner un prix : l’occasion, la date, la salle et sa taille.',
                'body' => [
                    'Nous répondons sous trois jours, par téléphone si vous en laissez un. La date est tenue dix jours sans engagement ; elle est réservée à la signature d’un contrat d’une page et au versement d’un tiers du prix.',
                    'Le jour même, nous arrivons deux heures avant de jouer. Il nous faut quatre mètres sur trois à l’abri, une prise de courant ordinaire et un endroit où poser les housses. Au-delà de cent cinquante personnes ou en plein air, nous utilisons la sonorisation de la salle ou en louons une, à vos frais et au prix coûtant.',
                    'Une chanson peut être apprise pour l’occasion si elle nous est demandée six semaines avant. Et si vous hésitez entre deux formules, venez nous entendre : la liste des concerts est tenue à jour.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Avant de vous décider',
                'title' => 'Venez d’abord nous entendre',
                'lead' => 'Huit dates publiques d’ici la fin février. Dites-le-nous à la porte : nous prenons dix minutes à la pause pour parler de votre soirée.',
                'links' => [['label' => 'Voir les concerts', 'to' => '/shows'], ['label' => 'Écouter les disques', 'to' => '/music']],
                'details' => [
                    ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                    ['label' => 'E-mail', 'value' => 'contact@bise-noire.example', 'href' => 'mailto:contact@bise-noire.example'],
                    ['label' => 'Réponse', 'value' => 'Sous trois jours, prix ferme'],
                ],
            ],
        ],
    ],
];
