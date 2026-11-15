<?php

declare(strict_types=1);

/*
 * The demo content of a festival: a fictional open-air weekend on a pasture of
 * the Jura vaudois, above Sainte-Croix — three nights of music and cooking on
 * embers, run by an association of volunteers since 2014. `site` is what every
 * page shares, `prefabs` is what the site would bind as `kit.<name>` — the rows
 * its organisers keep in the admin, in each component's own prop names — and
 * `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/festival.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Les Feux de la Combe',
        'blurb' => 'Trois nuits de musique et de cuisine au feu sur un pâturage du Jura vaudois, au-dessus de Sainte-Croix.',
        'address' => 'Pâturage de la Combe, 1450 Sainte-Croix',
        'phone' => '024 000 00 00',
        'email' => 'bonjour@feux-de-la-combe.example',
        'status' => '13–15 août 2027 · prévente ouverte jusqu’au 31 mars',
        'note' => '© Association Les Feux de la Combe',
        'action' => ['label' => 'Prendre un pass', 'to' => '/tickets'],
        'band' => [
            'eyebrow' => 'Du 13 au 15 août 2027',
            'title' => 'On se retrouve là-haut ?',
            'lead' => 'Jusqu’au 31 mars, le pass trois jours est à CHF 99, camping compris. Il passe ensuite à CHF 119, et le samedi affiche complet chaque année depuis 2022.',
            'links' => [['label' => 'Prendre un pass', 'to' => '/tickets'], ['label' => 'Voir le programme', 'to' => '/programme']],
            'details' => [
                ['label' => 'Dates', 'value' => 'Du vendredi 13 au dimanche 15 août 2027'],
                ['label' => 'Lieu', 'value' => 'Pâturage de la Combe, Sainte-Croix'],
                ['label' => 'Navette', 'value' => 'Depuis la gare, toutes les 20 minutes'],
            ],
        ],
    ],

    'prefabs' => [
        'events' => [
            'title' => 'Les temps forts',
            'events' => [
                ['date' => 'vendredi 13 août', 'time' => '17:00', 'datetime' => '2027-08-13T17:00', 'name' => 'Ouverture des portes et du camping', 'description' => 'Les grils s’allument à 18 h et le marché des artisans tient jusqu’à 22 h.'],
                ['date' => 'vendredi 13 août', 'time' => '19:30', 'datetime' => '2027-08-13T19:30', 'name' => 'Maëlle Rochat · La Clairière', 'description' => 'Une voix et une guitare sous les sapins, pour ouvrir la première nuit.'],
                ['date' => 'vendredi 13 août', 'time' => '22:00', 'datetime' => '2027-08-13T22:00', 'name' => 'Fanfare du Chasseron · Grande scène', 'description' => 'Onze cuivres et deux tambours : le bal du vendredi, jusqu’à minuit et demi.'],
                ['date' => 'samedi 14 août', 'time' => '10:30', 'datetime' => '2027-08-14T10:30', 'name' => 'Balade contée avec Lucie Jaccard', 'description' => 'Une heure et demie à pied autour du pâturage, dès 6 ans. Départ du grand feu.'],
                ['date' => 'samedi 14 août', 'time' => '16:00', 'datetime' => '2027-08-14T16:00', 'name' => 'Les Sœurs Perrin · La Clairière', 'description' => 'Chanson à deux voix et un accordéon, à l’heure du goûter.'],
                ['date' => 'samedi 14 août', 'time' => '19:00', 'datetime' => '2027-08-14T19:00', 'name' => 'Banquet au feu d’Antoine Mermod', 'description' => 'Cent vingt couverts à la grande table : agneau du Jura et légumes sous la cendre. Sur réservation, CHF 45.'],
                ['date' => 'samedi 14 août', 'time' => '22:30', 'datetime' => '2027-08-14T22:30', 'name' => 'Kora Jura · Grande scène', 'description' => 'La kora de Sékou Diabaté sur les machines de Noé Favre : la tête d’affiche du samedi.'],
                ['date' => 'dimanche 15 août', 'time' => '11:00', 'datetime' => '2027-08-15T11:00', 'name' => 'Brunch des alpages et bal de clôture', 'description' => 'Tresse, fromages de la fruitière et le bal folk de Tilleul jusqu’à 16 h.'],
            ],
        ],
        'team' => [
            'title' => 'À l’affiche en 2027',
            'members' => [
                ['name' => 'Kora Jura', 'role' => 'Kora et machines · samedi, Grande scène', 'bio' => 'Sékou Diabaté et Noé Favre jouent ensemble depuis 2021 : une kora mandingue sur des boucles enregistrées dans les forêts du Jura.'],
                ['name' => 'Fanfare du Chasseron', 'role' => 'Fanfare de bal · vendredi, Grande scène', 'bio' => 'Onze cuivres de Sainte-Croix et des villages voisins, qui ferment le vendredi depuis la première édition.'],
                ['name' => 'Maëlle Rochat', 'role' => 'Folk · vendredi, La Clairière', 'bio' => 'Une voix, une guitare et des chansons écrites à Yverdon. Son deuxième album sort au printemps.'],
                ['name' => 'Les Sœurs Perrin', 'role' => 'Chanson · samedi, La Clairière', 'bio' => 'Jeanne et Louise Perrin chantent à deux voix les chansons de leur grand-mère, et les leurs.'],
                ['name' => 'Tilleul', 'role' => 'Bal folk · dimanche, Grande scène', 'bio' => 'Quatre Lausannois, violon, vielle, contrebasse et cajón, qui font danser le brunch jusqu’à la dernière navette.'],
                ['name' => 'Collectif Braise', 'role' => 'Vinyles · vendredi et samedi, après minuit', 'bio' => 'Trois DJ du Nord vaudois aux platines près du grand feu, jusqu’à 2 h.'],
                ['name' => 'Antoine Mermod', 'role' => 'Cuisinier au feu · banquet du samedi', 'bio' => 'Il cuisine sur braise toute l’année à L’Auberson et monte ses grils au milieu du pré pour cent vingt couverts.'],
                ['name' => 'Lucie Jaccard', 'role' => 'Conteuse · balade du samedi matin', 'bio' => 'Elle raconte le Jura à pied, le long des murs de pierres sèches, aux enfants dès 6 ans et à leurs parents.'],
            ],
        ],
        'gallery' => [
            'title' => 'L’édition 2026',
            'pictures' => [
                ['image' => 'picture:La grande scène au crépuscule, le public assis dans la pente du pâturage', 'alt' => 'La grande scène au crépuscule, le public assis dans la pente du pâturage', 'caption' => 'La grande scène, samedi à 21 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Les grils du banquet, la braise rouge et un cuisinier en tablier de cuir', 'alt' => 'Les grils du banquet, la braise rouge et un cuisinier en tablier de cuir', 'caption' => 'Le banquet au feu', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Une chanteuse et sa guitare sous les sapins, des guirlandes dans les branches', 'alt' => 'Une chanteuse et sa guitare sous les sapins, des guirlandes dans les branches', 'caption' => 'La Clairière, vendredi soir', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des tentes dans la brume du petit matin, au bord du pré', 'alt' => 'Des tentes dans la brume du petit matin, au bord du pré', 'caption' => 'Le camping, dimanche à 7 h', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La fanfare descendue de scène, jouant au milieu du public', 'alt' => 'La fanfare descendue de scène, jouant au milieu du public', 'caption' => 'La Fanfare du Chasseron dans la foule', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des enfants assis sur un mur de pierres sèches, écoutant la conteuse', 'alt' => 'Des enfants assis sur un mur de pierres sèches, écoutant la conteuse', 'caption' => 'La balade contée', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Des lanternes le long du chemin qui descend du col, à la nuit tombée', 'alt' => 'Des lanternes le long du chemin qui descend du col, à la nuit tombée', 'caption' => 'Le chemin des lanternes', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Quatre bénévoles derrière le grand bar, les gobelets alignés', 'alt' => 'Quatre bénévoles derrière le grand bar, les gobelets alignés', 'caption' => 'Le grand bar, tenu par les bénévoles', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:Le grand feu au milieu du pré, des silhouettes en cercle', 'alt' => 'Le grand feu au milieu du pré, des silhouettes en cercle', 'caption' => 'Le grand feu, à minuit', 'width' => 1200, 'height' => 900],
                ['image' => 'picture:La grande table du brunch sous la tente, tresses et fromages', 'alt' => 'La grande table du brunch sous la tente, tresses et fromages', 'caption' => 'Le brunch du dimanche', 'width' => 1200, 'height' => 900],
            ],
        ],
        'pricing' => [
            'title' => 'Les pass',
            'intro' => 'Trois pass, et rien à ajouter pour monter : la navette et les deux scènes sont comprises dans chacun.',
            'note' => 'Gratuit jusqu’à 11 ans avec un adulte, demi-tarif de 12 à 15 ans. Le banquet du samedi (CHF 45) se réserve à part. Remboursement sans condition jusqu’au 30 juin.',
            'plans' => [
                [
                    'name' => 'Un soir',
                    'price' => 'CHF 48',
                    'period' => 'par soir',
                    'line' => 'Le vendredi ou le samedi, dès 17 h.',
                    'includes' => ['Les deux scènes, un soir', 'Navette depuis la gare de Sainte-Croix'],
                    'href' => 'mailto:billets@feux-de-la-combe.example?subject=Pass%20un%20soir',
                    'label' => 'Demander un pass d’un soir',
                ],
                [
                    'name' => 'Trois jours',
                    'price' => 'CHF 99',
                    'period' => 'en prévente',
                    'line' => 'Du vendredi 17 h au dimanche 18 h. CHF 119 dès le 1er avril.',
                    'includes' => ['Les deux scènes, les trois jours', 'Navette depuis la gare de Sainte-Croix', 'Camping du vendredi au dimanche', 'Brunch du dimanche'],
                    'href' => 'mailto:billets@feux-de-la-combe.example?subject=Pass%20trois%20jours',
                    'label' => 'Demander un pass trois jours',
                    'featured' => true,
                    'flag' => 'Prévente jusqu’au 31 mars',
                ],
                [
                    'name' => 'Famille',
                    'price' => 'CHF 235',
                    'period' => 'les trois jours',
                    'line' => 'Deux adultes et leurs enfants jusqu’à 15 ans.',
                    'includes' => ['Les deux scènes, les trois jours', 'Navette depuis la gare de Sainte-Croix', 'Camping du vendredi au dimanche', 'Brunch du dimanche', 'Emplacement au camping des familles'],
                    'href' => 'mailto:billets@feux-de-la-combe.example?subject=Pass%20famille',
                    'label' => 'Demander un pass famille',
                ],
            ],
        ],
        'faq' => [
            'title' => 'Avant de monter',
            'entries' => [
                ['question' => 'Comment monte-t-on à la Combe ?', 'answer' => 'En train jusqu’à Sainte-Croix, puis par la navette du festival : toutes les 20 minutes de 16 h 30 à 2 h 30, comprise dans tous les pass. En voiture, le parking du col des Étroits coûte CHF 10 par jour et se trouve à dix minutes à pied, par le chemin des lanternes.'],
                ['question' => 'Peut-on camper sur place ?', 'answer' => 'Oui, au bord du pâturage, du vendredi 15 h au dimanche 18 h. Le camping est compris dans le pass trois jours et le pass famille ; avec un pass d’un soir, il coûte CHF 15 la nuit, à régler à l’accueil.'],
                ['question' => 'Les enfants sont-ils les bienvenus ?', 'answer' => 'Oui. L’entrée est gratuite jusqu’à 11 ans avec un adulte, la balade contée du samedi matin est faite pour eux et l’accueil prête des casques antibruit contre une pièce d’identité.'],
                ['question' => 'Que faut-il laisser à la maison ?', 'answer' => 'Le verre, les réchauds et les barbecues, les enceintes et les drones. Les chiens restent en bas, à cause du bétail des pâturages voisins. Une gourde vide passe : l’eau de la fontaine est gratuite.'],
                ['question' => 'Et s’il pleut ?', 'answer' => 'Le festival a lieu par tous les temps : la Clairière est sous les arbres et la grande table sous tente. À 1 150 mètres, les nuits sont fraîches même en août ; prenez une veste et de bonnes chaussures.'],
                ['question' => 'Puis-je me faire rembourser ?', 'answer' => 'Jusqu’au 30 juin, sans donner de raison, en écrivant à billets@feux-de-la-combe.example. Ensuite, un pass se revend sur notre bourse aux billets, au prix payé et pas un franc de plus.'],
                ['question' => 'Paie-t-on en espèces ?', 'answer' => 'Aux bars et aux stands : carte, Twint ou espèces. Il n’y a pas de distributeur au pâturage ; le plus proche est à la gare de Sainte-Croix.'],
            ],
        ],
        'jobs' => [
            'title' => 'Les postes ouverts',
            'intro' => 'Deux tranches donnent droit au pass trois jours, à un repas chaud par tranche et au camping de l’équipe.',
            'jobs' => [
                ['name' => 'Bar', 'place' => 'Grand bar et bar de la Clairière', 'hours' => 'Deux tranches de 5 h', 'line' => 'Servir les bières de la brasserie de Sainte-Croix et les sirops, à quatre par bar, avec un responsable qui a déjà fait une édition.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Bar'],
                ['name' => 'Accueil et billetterie', 'place' => 'Entrée du pâturage', 'hours' => 'Deux tranches de 5 h', 'line' => 'Scanner les pass, poser les bracelets et répondre aux questions : le premier visage du festival.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Accueil'],
                ['name' => 'Montage', 'place' => 'Pâturage de la Combe', 'hours' => 'Du lundi 9 au jeudi 12 août, à la journée', 'line' => 'Monter les deux scènes, les tentes et quatre cents mètres de guirlandes avec l’équipe technique. Repas de midi et du soir sur place.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Montage'],
                ['name' => 'Cuisine des bénévoles', 'place' => 'Tente de l’équipe', 'hours' => 'Deux tranches de 5 h, matin ou soir', 'line' => 'Préparer deux cents repas par jour avec Josiane, qui tient cette cuisine depuis 2014.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Cuisine'],
                ['name' => 'Navettes', 'place' => 'De la gare de Sainte-Croix au col des Étroits', 'hours' => 'Tranches de 4 h, permis B depuis trois ans', 'line' => 'Conduire un minibus de quatorze places entre la gare et le pâturage. La dernière course part à 2 h 30.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Navettes'],
                ['name' => 'Tri et propreté', 'place' => 'Tout le site', 'hours' => 'Deux tranches de 4 h, de jour', 'line' => 'Vider les points de tri, ramasser les gobelets consignés et rendre le pré tel que les vaches le retrouveront.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=Tri'],
                ['name' => 'Démontage', 'place' => 'Pâturage de la Combe', 'hours' => 'Lundi 16 et mardi 17 août', 'line' => 'Tout redescendre en deux jours, puis la raclette de l’équipe le mardi soir.', 'href' => 'mailto:benevoles@feux-de-la-combe.example?subject=D%C3%A9montage'],
            ],
        ],
        'map' => [
            'address' => 'Pâturage de la Combe, 1450 Sainte-Croix',
            'title' => 'Le pâturage, à dix minutes à pied du col',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => '13–15 août 2027 · Sainte-Croix',
                'title' => 'Trois nuits de musique et de feu sur le pâturage',
                'lead' => 'Deux scènes, dix-huit concerts et un banquet cuit sur la braise, à 1 150 mètres dans le Jura vaudois. On monte en navette, on dort sous tente, on redescend le dimanche.',
                'subject' => 'La grande scène à la tombée du jour, les feux allumés sur le pâturage',
                'note' => 'Prévente : le pass trois jours à CHF 99 jusqu’au 31 mars',
                'links' => [['label' => 'Prendre un pass', 'to' => '/tickets'], ['label' => 'Voir le programme', 'to' => '/programme']],
                'facts' => [['value' => '3', 'label' => 'Nuits, du vendredi au dimanche'], ['value' => '18', 'label' => 'Concerts sur deux scènes'], ['value' => '1 150 m', 'label' => 'D’altitude : prenez une veste']],
            ],
            'features' => [
                'eyebrow' => 'Treizième édition',
                'title' => 'Ce qui vous attend là-haut',
                'lead' => 'Un pré, deux scènes et une grande table : tout le festival se traverse à pied en cinq minutes.',
                'items' => [
                    ['title' => 'Le programme', 'body' => 'Du folk sous les sapins à 16 h à la fanfare de minuit : les trois jours, scène par scène.', 'subject' => 'La Clairière éclairée de guirlandes, un concert sous les sapins', 'to' => '/programme', 'label' => 'Le programme jour par jour'],
                    ['title' => 'À l’affiche', 'body' => 'Kora Jura, la Fanfare du Chasseron, Maëlle Rochat et les grils d’Antoine Mermod.', 'subject' => 'Un joueur de kora sur la grande scène, éclairé de côté', 'to' => '/line-up', 'label' => 'Les invités de 2027'],
                    ['title' => 'Bénévoles', 'body' => 'Cent quatre-vingts personnes montent le festival. Deux tranches derrière le bar, et le pass est offert.', 'subject' => 'Des bénévoles en tablier derrière le grand bar', 'to' => '/volunteer', 'label' => 'Les postes ouverts'],
                ],
            ],
        ],
        '/programme' => [
            'label' => 'Programme',
            'hero' => [
                'eyebrow' => 'Programme',
                'title' => 'Trois jours, deux scènes, un grand feu',
                'lead' => 'Les temps forts de l’édition 2027. La grille complète, heure par heure, paraît le 1er juin ; les portes ouvrent le vendredi à 17 h.',
                'subject' => 'La Fanfare du Chasseron sur la grande scène, vue du fond du pré',
                'links' => [['label' => 'Prendre un pass', 'to' => '/tickets'], ['label' => 'Voir qui joue', 'to' => '/line-up']],
            ],
            'story' => [
                'eyebrow' => 'Trois jours là-haut',
                'title' => 'Du premier feu au dernier bal',
                'lead' => 'Le festival suit le soleil : on mange quand il descend, on danse quand il a disparu.',
                'body' => [
                    'Le vendredi, les portes ouvrent à 17 h et personne ne joue avant 19 h 30 : le temps de planter sa tente, de faire le tour des artisans et de regarder Antoine Mermod allumer ses grils. La Clairière ouvre la soirée à voix basse, la grande scène la finit en fanfare.',
                    'Le samedi est la longue journée. La balade contée part du grand feu à 10 h 30, la Clairière joue tout l’après-midi et le banquet s’assied à 19 h. À 22 h 30 la tête d’affiche monte sur la grande scène, puis le collectif Braise tient les platines près du feu jusqu’à 2 h.',
                    'Le dimanche appartient aux familles et à ceux qui ont dormi là : brunch des alpages à 11 h, bal folk jusqu’à 16 h, et la dernière navette redescend à 18 h.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les lieux',
                'title' => 'Deux scènes et une table',
                'items' => [
                    ['title' => 'La grande scène', 'body' => 'Au bas du pré, face à la pente : on voit de partout, assis dans l’herbe ou debout devant.', 'subject' => 'La grande scène vue du haut du pâturage, de nuit'],
                    ['title' => 'La Clairière', 'body' => 'Deux cents places sous les sapins, presque sans sonorisation, pour les concerts de l’après-midi.', 'subject' => 'Un plateau de bois entre les troncs, des guirlandes dans les branches'],
                    ['title' => 'La grande table', 'body' => 'Cent vingt couverts sous tente, pour le banquet du samedi et le brunch du dimanche.', 'subject' => 'Une longue table dressée sous la tente, les grils derrière', 'to' => '/tickets', 'label' => 'Les pass et le banquet'],
                ],
            ],
        ],
        '/line-up' => [
            'label' => 'À l’affiche',
            'hero' => [
                'eyebrow' => 'À l’affiche',
                'title' => 'Ceux qui jouent, cuisinent et racontent',
                'lead' => 'Huit invités pour l’édition 2027, de la kora de Sékou Diabaté aux grils d’Antoine Mermod. Plus bas, ce à quoi ressemblait l’an dernier.',
                'subject' => 'Sékou Diabaté à la kora, éclairé de côté sur la grande scène',
                'links' => [['label' => 'Voir le programme', 'to' => '/programme'], ['label' => 'Prendre un pass', 'to' => '/tickets']],
            ],
            'story' => [
                'eyebrow' => 'Comment on choisit',
                'title' => 'Une affiche faite à la main',
                'lead' => 'Nous invitons des gens que nous avons vus jouer, pas des noms qui remplissent une affiche.',
                'body' => [
                    'La programmation tient à trois personnes, qui passent l’hiver dans les caves et les petites salles de la région. Chaque invité a été vu sur scène par l’une d’elles au moins : c’est la seule règle, et elle date de 2014.',
                    'La moitié de l’affiche vient de moins de cinquante kilomètres. La Fanfare du Chasseron ferme le vendredi depuis la première édition ; Maëlle Rochat a joué à la Clairière en 2019 devant quarante personnes, et revient cette année avec un deuxième album.',
                    'Le feu fait partie de l’affiche. Antoine Mermod cuisine sur braise toute l’année à L’Auberson ; le samedi, il monte ses grils au milieu du pré et sert cent vingt couverts à la grande table.',
                ],
            ],
        ],
        '/tickets' => [
            'label' => 'Billets',
            'hero' => [
                'eyebrow' => 'Billets',
                'title' => 'Un pass, la navette et les deux scènes',
                'lead' => 'Jusqu’au 31 mars, le pass trois jours est à CHF 99, camping compris. Le samedi affiche complet chaque année depuis 2022 : les pass d’un soir partent les premiers.',
                'subject' => 'Des bracelets de tissu aux couleurs du festival, sur le comptoir de l’accueil',
                'links' => [['label' => 'Écrire à la billetterie', 'href' => 'mailto:billets@feux-de-la-combe.example'], ['label' => 'Voir le programme', 'to' => '/programme']],
            ],
            'features' => [
                'eyebrow' => 'Avec chaque pass',
                'title' => 'Ce que vous n’avez pas à prévoir',
                'items' => [
                    ['title' => 'La navette', 'body' => 'Depuis la gare de Sainte-Croix, toutes les 20 minutes de 16 h 30 à 2 h 30.', 'icon' => 'bus'],
                    ['title' => 'Le gobelet', 'body' => 'Consigné à CHF 2, rendu au bar ou gardé en souvenir : rien ne traîne dans le pré.', 'icon' => 'cup-soda'],
                    ['title' => 'L’eau', 'body' => 'La fontaine du pâturage coule pour tout le monde. Apportez une gourde vide.', 'icon' => 'droplets'],
                ],
            ],
        ],
        '/volunteer' => [
            'label' => 'Bénévoles',
            'hero' => [
                'eyebrow' => 'Bénévoles',
                'title' => 'Le festival tient debout grâce à 180 bénévoles',
                'lead' => 'Deux tranches de cinq heures, et le reste du week-end est à vous : pass trois jours, repas et camping de l’équipe compris. Inscriptions jusqu’au 30 juin.',
                'subject' => 'L’équipe des bénévoles réunie devant la grande scène, avant l’ouverture',
                'links' => [['label' => 'Écrire à l’équipe des bénévoles', 'href' => 'mailto:benevoles@feux-de-la-combe.example'], ['label' => 'Voir le programme', 'to' => '/programme']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2014',
                'title' => 'Une association, pas une entreprise',
                'lead' => 'Personne n’est payé pour faire Les Feux de la Combe, et c’est pour cela qu’ils existent encore.',
                'body' => [
                    'En 2014, douze amis de Sainte-Croix ont monté une scène de palettes sur le pâturage de la famille Bornand pour fêter la fin des foins. Trois cents personnes sont venues. L’année suivante il a fallu un bar, puis une navette, puis une deuxième scène.',
                    'Nous sommes aujourd’hui cent quatre-vingts, de 16 à 74 ans. Certains prennent une semaine de vacances pour le montage, d’autres font deux tranches au bar et dansent le reste du temps. Chaque équipe a un responsable qui a déjà fait une édition : personne n’est lâché seul derrière une tireuse.',
                    'Ce que le festival gagne retourne au festival : le cachet des artistes, la location des tentes et la remise en état du pré, que les vaches retrouvent dix jours après la dernière note.',
                ],
            ],
            'features' => [
                'eyebrow' => 'En échange',
                'title' => 'Ce que le festival vous doit',
                'items' => [
                    ['title' => 'Le pass trois jours', 'body' => 'Offert dès deux tranches, avec le bracelet de l’équipe.', 'icon' => 'ticket'],
                    ['title' => 'Les repas', 'body' => 'Un repas chaud par tranche à la cuisine des bénévoles, et le café à toute heure.', 'icon' => 'soup'],
                    ['title' => 'Le camping de l’équipe', 'body' => 'Un coin à part, au calme, avec ses propres douches.', 'icon' => 'tent'],
                ],
            ],
            'band' => [
                'eyebrow' => 'Inscriptions jusqu’au 30 juin',
                'title' => 'Vous montez avec nous ?',
                'lead' => 'Écrivez-nous le poste qui vous tente et vos disponibilités : Camille, qui coordonne les équipes, répond dans la semaine.',
                'links' => [['label' => 'Écrire à Camille', 'href' => 'mailto:benevoles@feux-de-la-combe.example'], ['label' => 'Voir le programme', 'to' => '/programme']],
                'details' => [
                    ['label' => 'Coordination', 'value' => 'Camille Bornand'],
                    ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                    ['label' => 'Séance d’information', 'value' => 'Jeudi 3 juin, 19 h, salle communale de Sainte-Croix'],
                ],
            ],
        ],
    ],
];
