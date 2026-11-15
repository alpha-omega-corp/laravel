<?php

declare(strict_types=1);

/*
 * The demo content of an artisan: a fictional potter's workshop in a courtyard
 * of Carouge, two people and one gas kiln fired twelve times a year. `site` is
 * what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/artisan.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Atelier Jaccoud',
        'blurb' => 'Grès tourné, émaillé et cuit à Carouge, pièce par pièce, depuis 2013.',
        'address' => 'Rue Ancienne 27, 1227 Carouge',
        'phone' => '022 000 00 00',
        'email' => 'atelier@atelier-jaccoud.example',
        'status' => 'Atelier ouvert du jeudi au samedi',
        'note' => '© Atelier Jaccoud · Maude Jaccoud, céramiste',
        'action' => ['label' => 'Commander une pièce', 'to' => '/commission'],
        'band' => [
            'eyebrow' => 'Sur mesure',
            'title' => 'Une pièce faite pour votre table ?',
            'lead' => 'Un service, soixante assiettes pour un restaurant ou une seule jarre : décrivez-la, nous répondons sous une semaine avec un croquis coté et un prix.',
            'links' => [['label' => 'Commander une pièce', 'to' => '/commission'], ['label' => 'Voir les pièces', 'to' => '/pieces']],
            'details' => [
                ['label' => 'Atelier', 'value' => 'Rue Ancienne 27, Carouge'],
                ['label' => 'Téléphone', 'value' => '022 000 00 00', 'href' => 'tel:+41220000000'],
                ['label' => 'Ouvert', 'value' => 'Jeudi et vendredi 14 h – 18 h 30, samedi 13 h 30 – 17 h'],
            ],
        ],
    ],

    'prefabs' => [
        'catalogue' => [
            'items' => [
                ['id' => 'bol-cendre', 'name' => 'Bol à thé « Cendre »', 'price' => '38.–', 'description' => 'La pièce par laquelle tout a commencé : 2,5 dl, émail à la cendre de sarment, jamais deux fois le même.'],
                ['id' => 'tasse-espresso', 'name' => 'Tasse à espresso', 'price' => '24.–', 'description' => 'Sans anse, 0,8 dl, le pied laissé brut. Les six : 132.–.'],
                ['id' => 'mug', 'name' => 'Mug à anse tirée', 'price' => '42.–', 'description' => '3 dl, l’anse tirée à la main. Blanc d’os, céladon ou tenmoku.'],
                ['id' => 'assiette-plate', 'name' => 'Assiette plate, 27 cm', 'price' => '48.–', 'description' => 'Aile étroite, fond plat. Va au lave-vaisselle, comme tout le reste.'],
                ['id' => 'assiette-creuse', 'name' => 'Assiette creuse, 22 cm', 'price' => '44.–', 'description' => 'Pour la soupe comme pour les pâtes ; s’empile par huit.'],
                ['id' => 'saladier', 'name' => 'Saladier, 28 cm', 'price' => '120.–', 'description' => 'Tourné d’une seule motte de 2,8 kg, céladon à l’intérieur, terre nue dehors.'],
                ['id' => 'pichet', 'name' => 'Pichet, 1 litre', 'price' => '95.–', 'description' => 'Un bec pincé qui ne goutte pas, une anse large. Cendre ou blanc d’os.'],
                ['id' => 'theiere', 'name' => 'Théière, 8 dl', 'price' => '220.–', 'description' => 'Filtre percé dans la masse, anse en rotin tressée à l’atelier. Quatre par fournée.'],
                ['id' => 'vase-bouteille', 'name' => 'Vase bouteille, 30 cm', 'price' => '160.–', 'description' => 'Un col étroit pour trois branches. Émail shino, différent à chaque cuisson.'],
                ['id' => 'jarre-lune', 'name' => 'Jarre lune, 40 cm', 'price' => '780.–', 'description' => 'Pièce unique, tournée en deux moitiés puis jointe. Deux par an, signées et datées.'],
            ],
        ],
        'process' => [
            'title' => 'De la motte à votre table',
            'intro' => 'Quatre à six semaines séparent la motte de terre de la pièce finie, pour un bol du rayon comme pour une commande. Voici ce qui s’y passe.',
            'steps' => [
                ['name' => 'Le croquis', 'line' => 'Vous choisissez une forme et un émail à l’atelier, ou vous décrivez la vôtre : nous répondons avec un dessin coté et un prix.', 'duration' => 'Une semaine'],
                ['name' => 'Le tournage', 'line' => 'La terre est pesée, 450 g pour un bol, puis montée au tour. Le lendemain, à la consistance du cuir, le pied est creusé et l’anse posée.', 'duration' => 'Deux jours'],
                ['name' => 'Le séchage et le biscuit', 'line' => 'Dix jours à l’abri des courants d’air, puis une première cuisson à 980 °C qui rend la pièce assez solide pour être émaillée.', 'duration' => 'Deux semaines'],
                ['name' => 'L’émail et le grand feu', 'line' => 'Trempée dans un émail fait ici, la pièce monte à 1280 °C en quatorze heures. Le four refroidit deux jours, porte fermée.', 'duration' => 'Quatre jours'],
                ['name' => 'Le défournement', 'line' => 'Chaque pièce est poncée sous le pied, sonnée, signée. Vous venez la chercher à l’atelier, ou elle part emballée dans de la laine de bois.'],
            ],
        ],
        'gallery' => [
            'title' => 'L’atelier, les outils, la table',
            'pictures' => [
                ['image' => 'picture:La cour pavée de l’atelier, des planches de bols crus qui sèchent au soleil', 'alt' => 'Des planches de bols crus alignées dans une cour pavée', 'caption' => 'La cour, un matin de séchage', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Maude Jaccoud au tour, les mains couvertes de barbotine', 'alt' => 'Une potière au tour, les mains couvertes de barbotine', 'caption' => 'Le tour, près de la fenêtre', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le four à gaz ouvert, les étagères chargées de pièces émaillées', 'alt' => 'Un four à gaz ouvert, chargé de pièces émaillées encore crues', 'caption' => 'Le four de 400 litres, juste avant la cuisson', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des seaux d’émail et un tamis sur l’établi', 'alt' => 'Des seaux d’émail et un tamis posés sur un établi', 'caption' => 'Sept émaux, pesés et tamisés ici', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une table de restaurant dressée avec des assiettes céladon', 'alt' => 'Une table de restaurant dressée avec des assiettes en grès céladon', 'caption' => 'Soixante assiettes pour l’Auberge de la Drize', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des mirettes, des estèques et un fil à couper accrochés au mur', 'alt' => 'Des outils de potier accrochés à un mur blanchi', 'caption' => 'Les outils : du buis, de l’acier et un fil de pêche', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Un sac de cendre de sarment à côté d’un tamis fin', 'alt' => 'Un sac de cendre grise à côté d’un tamis fin', 'caption' => 'La cendre des vignes de Satigny, avant lavage', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Salomé Vuagnat tirant une anse au-dessus d’un seau', 'alt' => 'Une apprentie tirant une anse de grès au-dessus d’un seau', 'caption' => 'Salomé tire une anse, un geste par mug', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une théière versant du thé dans un bol émaillé à la cendre', 'alt' => 'Une théière en grès versant du thé dans un bol', 'caption' => 'La théière de 8 dl, chez une cliente', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le stand du samedi sous les platanes de la place du Marché', 'alt' => 'Un stand de poterie sous des platanes, sur une place de marché', 'caption' => 'Le samedi matin, place du Marché', 'width' => 1200, 'height' => 900],
            ],
        ],
        'events' => [
            'title' => 'Marchés et portes ouvertes',
            'events' => [
                ['date' => 'Samedi 21 novembre', 'time' => '8:00–13:00', 'datetime' => '2026-11-21', 'name' => 'Marché de Carouge', 'description' => 'Place du Marché, côté fontaine, comme chaque samedi. Bols, tasses et quelques pièces de second choix à moitié prix.'],
                ['date' => 'Samedi 28 novembre', 'time' => '10:00–17:00', 'datetime' => '2026-11-28', 'name' => 'Défournement public', 'description' => 'Nous ouvrons le four à 10 h devant qui veut : cent quatre-vingts pièces sortent encore tièdes et se réservent sur place.'],
                ['date' => 'Du 4 au 6 décembre', 'time' => 'Vendredi dès 16:00, week-end 10:00–19:00', 'datetime' => '2026-12-04', 'name' => 'Marché de Noël de Carouge', 'description' => 'Trois jours sous les platanes. Tasses par six, bols emballés et bons cadeaux pour une commande.'],
                ['date' => 'Samedi 12 et dimanche 13 décembre', 'time' => '10:00–18:00', 'datetime' => '2026-12-12', 'name' => 'Portes ouvertes d’hiver', 'description' => 'L’atelier ouvert deux jours : tournage devant vous à 11 h et à 15 h, thé servi dans les bols, toute la fournée de novembre en rayon.'],
                ['date' => 'Samedi 19 décembre', 'time' => '8:00–13:00', 'datetime' => '2026-12-19', 'name' => 'Dernier marché avant Noël', 'description' => 'Les commandes passées avant le 1er novembre se retirent au stand, puis à l’atelier jusqu’à 17 h.'],
                ['date' => 'Samedi 16 janvier', 'time' => '10:00–16:00', 'datetime' => '2027-01-16', 'name' => 'Vente du second choix', 'description' => 'Une goutte d’émail, un pied voilé : les pièces écartées de l’année, dès 10.–, dans la cour de l’atelier.'],
                ['date' => 'Du 19 au 21 mars', 'time' => '10:00–18:00', 'datetime' => '2027-03-19', 'name' => 'Journées des métiers d’art', 'description' => 'Trois jours de démonstrations avec neuf ateliers de Carouge. Chez nous : le tournage d’une jarre lune, en deux moitiés.'],
                ['date' => 'Samedi 24 et dimanche 25 avril', 'time' => '9:00–18:00', 'datetime' => '2027-04-24', 'name' => 'Marché des potiers de Bonfol', 'description' => 'Quarante potiers dans le village jurassien de la terre. Nous y apportons la fournée d’avril et les grandes pièces.'],
            ],
        ],
        'quote' => [
            'title' => 'Commander une pièce sur mesure',
            'intro' => 'Dites-nous la pièce, sa taille et pour quand : Maude Jaccoud répond avec un croquis coté et un prix ferme.',
            'note' => 'Réponse sous une semaine. Rien n’est tourné avant votre accord sur le croquis et le prix.',
            'action' => '#quote',
            'scopes' => [
                'Service de table',
                'Vaisselle pour un restaurant',
                'Pièce unique : vase, jarre, vasque',
                'Une forme du rayon dans un autre émail',
                'Liste de mariage',
                'Cadeaux d’entreprise',
                'Urne ou pièce commémorative',
            ],
            'budgets' => [
                'Moins de CHF 300',
                'CHF 300 à 1 000',
                'CHF 1 000 à 3 000',
                'Plus de CHF 3 000',
            ],
        ],
        'map' => [
            'address' => 'Rue Ancienne 27, 1227 Carouge',
            'title' => 'Atelier Jaccoud · au fond de la cour',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Céramique · Carouge',
                'title' => 'Du grès tourné à la main, pour la table de tous les jours',
                'lead' => 'Maude Jaccoud tourne, émaille et cuit chaque pièce dans une cour de la rue Ancienne. Douze fournées par an, sept émaux faits ici, et des pièces faites pour servir : tout passe au lave-vaisselle.',
                'subject' => 'Une pile de bols émaillés à la cendre sur l’établi, la fenêtre de la cour derrière',
                'note' => 'Prochain défournement public : samedi 28 novembre à 10 h',
                'links' => [['label' => 'Commander une pièce', 'to' => '/commission'], ['label' => 'Voir les pièces', 'to' => '/pieces']],
                'facts' => [['value' => '12', 'label' => 'Fournées par an'], ['value' => '7', 'label' => 'Émaux faits à l’atelier'], ['value' => '1280 °C', 'label' => 'Le grand feu du grès']],
            ],
            'features' => [
                'eyebrow' => 'Ce que nous faisons',
                'title' => 'Peu de pièces, toutes faites ici',
                'lead' => 'Une potière, une apprentie et un four de 400 litres : tout ce que nous vendons est tourné, émaillé et cuit dans la cour.',
                'items' => [
                    ['title' => 'Les pièces', 'body' => 'Bols, assiettes, pichets et deux grandes jarres par an. Chaque pièce a son prix, et ce qui est en rayon part le jour même.', 'subject' => 'Des assiettes céladon empilées sur une étagère de sapin', 'to' => '/pieces', 'label' => 'Les pièces et leurs prix'],
                    ['title' => 'L’atelier', 'body' => 'Quatre à six semaines de la motte à la table : le tour, le séchage, deux cuissons. La porte est ouverte du jeudi au samedi.', 'subject' => 'Maude Jaccoud au tour, les mains dans la barbotine', 'to' => '/workshop', 'label' => 'Comment une pièce est faite'],
                    ['title' => 'Les marchés', 'body' => 'Le samedi matin sur la place du Marché de Carouge, et une dizaine de foires et de portes ouvertes dans l’année.', 'subject' => 'Le stand du samedi sous les platanes de la place du Marché', 'to' => '/markets', 'label' => 'Les prochaines dates'],
                ],
            ],
        ],
        '/pieces' => [
            'label' => 'Les pièces',
            'hero' => [
                'eyebrow' => 'Les pièces',
                'title' => 'Ce qui est sorti du four cet automne',
                'lead' => 'Dix formes tournées en petites séries et sept émaux. Les prix sont les mêmes à l’atelier, au marché et par colis ; l’envoi en Suisse coûte 12.–.',
                'subject' => 'Un bol à thé émaillé à la cendre, posé sur une planche de tournage',
                'links' => [['label' => 'Commander une pièce', 'to' => '/commission'], ['label' => 'Où nous trouver', 'to' => '/markets']],
            ],
            'features' => [
                'eyebrow' => 'Bon à savoir',
                'title' => 'Usage, second choix et envoi',
                'items' => [
                    ['title' => 'Au quotidien', 'body' => 'Le grès cuit à 1280 °C ne boit pas l’eau : tout va au lave-vaisselle et au micro-ondes, les plats au four jusqu’à 250 °C.', 'icon' => 'droplets'],
                    ['title' => 'Second choix', 'body' => 'Une goutte d’émail ou un pied voilé : ces pièces partent à moitié prix au marché et à l’atelier, jamais par colis.', 'icon' => 'tag'],
                    ['title' => 'Envoi', 'body' => 'Emballé dans de la laine de bois, expédié le lundi. Une pièce cassée en route est remplacée à la fournée suivante.', 'icon' => 'package'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les émaux',
                'title' => 'Sept émaux, une seule terre',
                'lead' => 'Toutes les pièces sont du même grès ; c’est l’émail, et sa place dans le four, qui les distingue.',
                'body' => [
                    'Le « Cendre » est fait des sarments que deux vignerons de Satigny brûlent en mars : la cendre est lavée, tamisée, puis mêlée de feldspath. Il sort vert pâle là où la flamme passe, miel là où elle manque, et aucun bol ne ressemble au suivant.',
                    'Le céladon, le blanc d’os et le tenmoku sont plus réguliers : ce sont eux que nous proposons pour un service, parce qu’une assiette rachetée dans trois ans ira avec les autres. Le shino, le kaki et le noir mat sont réservés aux vases et aux jarres.',
                ],
            ],
        ],
        '/workshop' => [
            'label' => 'L’atelier',
            'hero' => [
                'eyebrow' => 'L’atelier',
                'title' => 'Une cour de Carouge, un tour et un four à gaz',
                'lead' => 'Deux personnes, quarante mètres carrés et un four de 400 litres. Une pièce met quatre à six semaines à passer de la motte à la table, et la porte est ouverte du jeudi au samedi.',
                'subject' => 'La cour pavée de l’atelier, des planches de bols crus au soleil',
                'links' => [['label' => 'Commander une pièce', 'to' => '/commission'], ['label' => 'Venir aux portes ouvertes', 'to' => '/markets']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2013',
                'title' => 'Douze fournées par an, pas une de plus',
                'lead' => 'Le four décide du rythme : il faut un mois pour le remplir, et il ne s’allume que plein.',
                'body' => [
                    'Maude Jaccoud a appris le tour à l’école de céramique de Vevey, puis deux ans chez un potier de La Borne, dans le Berry, où l’on cuit encore au bois. En 2013, elle a repris l’ancienne remise d’un ferblantier, au fond d’une cour de la rue Ancienne, et y a monté un four à gaz de 400 litres.',
                    'Une fournée, c’est environ cent quatre-vingts pièces et quatorze heures de feu. La dernière heure se fait en réduction, la flamme privée d’air : c’est elle qui donne au céladon son vert et à la cendre ses coulures. Puis le four refroidit deux jours, et personne n’ouvre la porte avant.',
                    'Salomé Vuagnat a rejoint l’atelier en 2024 pour son apprentissage. Elle tourne les tasses et les bols, Maude les grandes pièces et les commandes ; l’émaillage et l’enfournement se font à quatre mains, un vendredi par mois.',
                ],
            ],
            'features' => [
                'eyebrow' => 'La matière',
                'title' => 'Trois choses que nous ne déléguons pas',
                'items' => [
                    ['title' => 'La terre', 'body' => 'Un grès de Saint-Amand livré par tonne, pétri à la main la veille du tournage. Les chutes sont recyclées : rien ne part à la benne.', 'subject' => 'Des pains de grès empilés sous une bâche humide'],
                    ['title' => 'Les émaux', 'body' => 'Sept recettes pesées au gramme, dont une à la cendre des vignes de Satigny. Aucun émail acheté tout fait, et pas de plomb.', 'subject' => 'Des seaux d’émail et un tamis sur l’établi'],
                    ['title' => 'Le feu', 'body' => 'Quatorze heures jusqu’à 1280 °C, la dernière en réduction. Chaque cuisson est notée dans un cahier depuis la première.', 'subject' => 'Le four ouvert, les étagères chargées de pièces encore tièdes'],
                ],
            ],
        ],
        '/markets' => [
            'label' => 'Marchés',
            'hero' => [
                'eyebrow' => 'Marchés et portes ouvertes',
                'title' => 'Où nous trouver cet hiver',
                'lead' => 'Chaque samedi matin sur la place du Marché de Carouge, deux week-ends par an à l’atelier pour les portes ouvertes, et quelques foires de potiers au printemps.',
                'subject' => 'Le stand du samedi sous les platanes, des bols alignés sur une nappe de lin',
                'links' => [['label' => 'Commander une pièce', 'to' => '/commission'], ['label' => 'Voir les pièces', 'to' => '/pieces']],
            ],
            'story' => [
                'eyebrow' => 'Le samedi',
                'title' => 'Une pièce se choisit dans la main',
                'lead' => 'Nous vendons aussi par colis, mais la moitié de ce qui sort du four part au marché.',
                'body' => [
                    'Un bol ne se juge pas en photo : il faut le soulever, sentir le pied sous les doigts, regarder comment l’émail a coulé. C’est pour cela que nous tenons le stand nous-mêmes, chaque samedi de 8 h à 13 h, côté fontaine, qu’il pleuve ou qu’il gèle.',
                    'On y trouve la fournée du mois, les pièces de second choix à moitié prix et un carnet où noter une commande. On y paie en espèces, par carte ou par Twint ; une pièce réservée par téléphone la veille vous attend sous la table.',
                    'Les portes ouvertes de décembre et de juin sont l’autre moment : l’atelier est rangé, le tour tourne à 11 h et à 15 h, et toute la fournée est en rayon avant de partir en colis.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois rendez-vous',
                'title' => 'Le stand, la cour et la route',
                'items' => [
                    ['title' => 'Le marché de Carouge', 'body' => 'Chaque samedi de 8 h à 13 h, place du Marché, côté fontaine. L’atelier ouvre ensuite dès 13 h 30.', 'subject' => 'Le stand sous les platanes, un samedi de novembre'],
                    ['title' => 'Les portes ouvertes', 'body' => 'Un week-end en décembre et un en juin : le tournage devant vous, et le four ouvert aux curieux.', 'subject' => 'Des visiteurs autour du tour dans l’atelier', 'to' => '/workshop', 'label' => 'Voir l’atelier'],
                    ['title' => 'Les foires de potiers', 'body' => 'Bonfol au printemps, deux ou trois autres selon les années. Nous y apportons les grandes pièces.', 'subject' => 'Des jarres calées dans des caisses à l’arrière d’une camionnette'],
                ],
            ],
        ],
        '/commission' => [
            'hero' => [
                'eyebrow' => 'Sur mesure',
                'title' => 'Commander une pièce, ou tout un service',
                'lead' => 'Une forme du rayon dans un autre émail, la vaisselle d’un restaurant, une jarre pour une entrée : nous dessinons, vous approuvez, et la pièce sort du four quatre à six semaines plus tard.',
                'subject' => 'Le croquis coté d’un pichet, posé à côté de la pièce finie',
                'links' => [['label' => 'Appeler le 022 000 00 00', 'href' => 'tel:+41220000000'], ['label' => 'Voir les pièces', 'to' => '/pieces']],
            ],
            'story' => [
                'eyebrow' => 'Comment cela se passe',
                'title' => 'Un croquis, un prix, puis le four',
                'lead' => 'Rien n’est tourné avant que vous ayez vu le dessin et le prix.',
                'body' => [
                    'Dites-nous la pièce, sa taille et pour quand. Maude Jaccoud répond dans la semaine avec un croquis coté, un ou deux émaux possibles et un prix ferme. Pour un service ou une série, un échantillon est tourné et cuit d’abord : vous le gardez, qu’il y ait commande ou non.',
                    'Un tiers est versé à la commande, le solde au retrait. Le délai tient au four, qui ne s’allume qu’une fois par mois : comptez quatre à six semaines pour une pièce, dix pour la vaisselle d’un restaurant.',
                    'Le grès rétrécit de douze pour cent entre le tour et la table, et l’émail ne sort jamais deux fois pareil. Nous tournons donc toujours quelques pièces de plus, et vous choisissez les vôtres au défournement.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Ce qui se commande',
                'title' => 'Du bol gravé à la salle entière',
                'items' => [
                    ['title' => 'Un service de table', 'body' => 'Six couverts en dix-huit pièces dès 760.–, dans l’un des trois émaux que nous refaisons à l’identique.', 'subject' => 'Un service céladon dressé pour six sur une table de chêne'],
                    ['title' => 'La vaisselle d’un restaurant', 'body' => 'Soixante assiettes pour l’Auberge de la Drize en 2025 : un grès plus épais, des bords qui tiennent au passe.', 'subject' => 'Une pile d’assiettes en grès sur le passe d’une cuisine'],
                    ['title' => 'Une pièce unique', 'body' => 'Jarre, vase de sol, vasque ou urne. Dès 480.–, signée et datée sous le pied.', 'subject' => 'Une jarre lune sur un coffre, dans une entrée'],
                ],
            ],
        ],
    ],
];
