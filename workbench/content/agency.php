<?php

declare(strict_types=1);

/*
 * The demo content of an agency: a fictional design and web agency of eight
 * people in an old printing shop in Neuchâtel. `site` is what every page
 * shares, `prefabs` is what the site would bind as `kit.<name>` — the rows its
 * owner keeps in the admin, in each component's own prop names — and `pages`
 * holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/agency.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Trame',
        'blurb' => 'Agence de design et de web à Neuchâtel : huit personnes, des marques et des sites faits sous un seul toit.',
        'address' => 'Rue des Moulins 21, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'bonjour@trame.example',
        'status' => 'Prochain créneau libre : février 2027',
        'note' => '© Trame Sàrl',
        'action' => ['label' => 'Envoyer un brief', 'to' => '/brief'],
        'band' => [
            'eyebrow' => 'Travailler ensemble',
            'title' => 'Un projet en tête ?',
            'lead' => 'Décrivez-le en cinq minutes. Nous rappelons sous deux jours ouvrables, avec des questions plutôt qu’un argumentaire.',
            'links' => [['label' => 'Envoyer un brief', 'to' => '/brief'], ['label' => 'Voir les réalisations', 'to' => '/work']],
            'details' => [
                ['label' => 'Atelier', 'value' => 'Rue des Moulins 21, Neuchâtel'],
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Prochain créneau', 'value' => 'Février 2027'],
            ],
        ],
    ],

    'prefabs' => [
        'credentials' => [
            'title' => 'Ils nous confient leur marque',
            'credentials' => [
                ['name' => 'Manufacture Calame', 'detail' => 'Horlogerie, Le Locle · depuis 2019'],
                ['name' => 'Transports du Littoral', 'detail' => 'Transports publics, Neuchâtel · depuis 2021'],
                ['name' => 'Festival Les Rives', 'detail' => 'Musique, Yverdon-les-Bains · quatre éditions'],
                ['name' => 'Clinique du Vallon', 'detail' => 'Santé, Fribourg · depuis 2022'],
                ['name' => 'Fromagerie des Ponts', 'detail' => 'Alimentation, Les Ponts-de-Martel · depuis 2023'],
                ['name' => 'Menuiserie Aubert', 'detail' => 'Artisanat, Couvet · depuis 2020'],
            ],
        ],
        'testimonials' => [
            'title' => 'Ce qu’en disent nos clients',
            'testimonials' => [
                ['quote' => 'Trame nous a dit non deux fois pendant le projet, et les deux fois ils avaient raison. La boutique a remboursé son coût en sept mois.', 'name' => 'Isabelle Calame', 'role' => 'Directrice, Manufacture Calame'],
                ['quote' => 'Nous avions peur d’un site d’agence, beau et inutilisable. Les voyageurs trouvent leur horaire en deux gestes, et le guichet respire.', 'name' => 'Daniel Rossier', 'role' => 'Responsable clientèle, Transports du Littoral'],
                ['quote' => 'Complet dix jours avant l’ouverture, pour la première fois en onze éditions. L’affiche est encore sur les murs de la ville.', 'name' => 'Yann Borel', 'role' => 'Directeur, Festival Les Rives'],
                ['quote' => 'Trois ans après la mise en ligne, c’est encore Léa qui décroche quand nous avons une question. Elle connaît notre atelier mieux que notre fiduciaire.', 'name' => 'Catherine Aubert', 'role' => 'Menuiserie Aubert, Couvet'],
            ],
        ],
        'projects' => [
            'title' => 'Réalisations récentes',
            'projects' => [
                ['name' => 'Manufacture Calame', 'place' => 'Le Locle', 'year' => 2025, 'kind' => 'Identité et boutique en ligne', 'figure' => '+ 41 %', 'figure_label' => 'de ventes directes la première année', 'summary' => 'Une maison horlogère de 1924 qui ne vendait que par ses détaillants. Une identité redessinée d’après ses cadrans et une boutique en trois langues.'],
                ['name' => 'Transports du Littoral', 'place' => 'Neuchâtel', 'year' => 2024, 'kind' => 'Site et horaires en temps réel', 'figure' => '− 38 %', 'figure_label' => 'd’appels au guichet en un an', 'summary' => 'Trouver son prochain bus en deux gestes, d’une main, à l’arrêt. Le site remplace quatre anciens et se lit sans peine avec un lecteur d’écran.'],
                ['name' => 'Festival Les Rives', 'place' => 'Yverdon-les-Bains', 'year' => 2025, 'kind' => 'Campagne et billetterie', 'figure' => '18 400', 'figure_label' => 'billets vendus, complet dix jours avant', 'summary' => 'Une affiche, quarante déclinaisons et une billetterie qui a tenu le matin de l’ouverture des ventes : 6 000 billets en une heure.'],
                ['name' => 'Fromagerie des Ponts', 'place' => 'Les Ponts-de-Martel', 'year' => 2024, 'kind' => 'Marque et emballages', 'figure' => '14', 'figure_label' => 'points de vente gagnés outre-Sarine', 'summary' => 'Une coopérative de neuf producteurs sous un seul nom. L’étiquette se lit à trois mètres, en français et en allemand.'],
                ['name' => 'Clinique du Vallon', 'place' => 'Fribourg', 'year' => 2023, 'kind' => 'Site et prise de rendez-vous', 'figure' => '3 min', 'figure_label' => 'pour prendre rendez-vous, sans appeler', 'summary' => 'Soixante médecins, douze spécialités et une seule question à l’accueil du site : de quoi avez-vous besoin ?'],
                ['name' => 'Menuiserie Aubert', 'place' => 'Couvet', 'year' => 2023, 'kind' => 'Site et film d’atelier', 'figure' => '× 3', 'figure_label' => 'demandes de devis en un an', 'summary' => 'Un film de deux minutes tourné à l’établi et un site de huit pages. Les demandes viennent désormais de tout le canton.'],
            ],
        ],
        'services' => [
            'title' => 'Nos services',
            'services' => [
                ['name' => 'Stratégie de marque', 'line' => 'Ce que vous êtes, pour qui et contre qui, écrit sur une page en deux ateliers.', 'icon' => 'compass', 'price' => 'dès CHF 4 800'],
                ['name' => 'Identité visuelle', 'line' => 'Un logo, des caractères, des couleurs et la charte qui permet de s’en servir sans nous.', 'icon' => 'pen-tool', 'price' => 'dès CHF 9 500'],
                ['name' => 'Site web', 'line' => 'Conçu, écrit et développé ici, puis remis à une équipe qui sait le tenir à jour.', 'icon' => 'monitor-smartphone', 'price' => 'dès CHF 18 000'],
                ['name' => 'Boutique en ligne', 'line' => 'Un catalogue, un paiement et une logistique qui tiennent le jour des soldes.', 'icon' => 'shopping-bag', 'price' => 'dès CHF 28 000'],
                ['name' => 'Rédaction', 'line' => 'Vos pages, vos rapports et vos lettres, écrits en français et en allemand.', 'icon' => 'file-text', 'price' => 'CHF 160 l’heure'],
                ['name' => 'Film et animation', 'line' => 'Un film d’atelier, un portrait ou trente secondes animées pour les réseaux.', 'icon' => 'clapperboard', 'price' => 'dès CHF 6 500'],
                ['name' => 'Campagnes', 'line' => 'Affichage, presse et réseaux : une idée, déclinée partout où vos clients regardent.', 'icon' => 'megaphone', 'price' => 'sur devis'],
                ['name' => 'Suivi et maintenance', 'line' => 'Mises à jour, sauvegardes et une personne qui répond dans la journée.', 'icon' => 'life-buoy', 'price' => 'dès CHF 380 par mois'],
            ],
        ],
        'process' => [
            'title' => 'Comment se déroule un projet',
            'intro' => 'Cinq étapes, toujours les mêmes : vous savez à tout moment où nous en sommes et ce qui vient ensuite.',
            'steps' => [
                ['name' => 'Le brief', 'line' => 'Vous décrivez le projet en quelques lignes. Nous rappelons avec nos questions.', 'duration' => 'Réponse sous deux jours'],
                ['name' => 'L’atelier de cadrage', 'line' => 'Une demi-journée ensemble, puis une offre : un périmètre, un calendrier, un prix ferme.', 'duration' => 'Une semaine'],
                ['name' => 'Le dessin', 'line' => 'Deux pistes montrées sur de vraies pages, puis une seule, poussée jusqu’au bout.', 'duration' => 'Trois à cinq semaines'],
                ['name' => 'La fabrication', 'line' => 'Développement, rédaction et essais, avec une démonstration tous les quinze jours.', 'duration' => 'Six à dix semaines'],
                ['name' => 'La mise en ligne', 'line' => 'Le site ouvert, votre équipe formée et trois mois de suivi compris.', 'duration' => 'À la date écrite dans l’offre'],
            ],
        ],
        'team' => [
            'title' => 'Celles et ceux qui feront votre projet',
            'members' => [
                ['name' => 'Élise Perrenoud', 'role' => 'Associée, stratégie', 'bio' => 'Mène les ateliers de cadrage et reste votre interlocutrice jusqu’à la mise en ligne.'],
                ['name' => 'Marc Jeanneret', 'role' => 'Associé, direction artistique', 'bio' => 'Typographe de formation. Dessine les identités de la maison depuis 2012.'],
                ['name' => 'Léa Schwab', 'role' => 'Cheffe de projet', 'bio' => 'Tient les calendriers et décroche le téléphone. Aucun projet en retard depuis 2022.'],
                ['name' => 'Sofia Brunner', 'role' => 'Designer d’interface', 'bio' => 'Dessine les pages sur un téléphone d’abord, et les essaie avec vos clients.'],
                ['name' => 'Julien Favre', 'role' => 'Développeur principal', 'bio' => 'Écrit les sites et les boutiques, et les garde rapides trois ans plus tard.'],
                ['name' => 'Thibault Monod', 'role' => 'Développeur, accessibilité', 'bio' => 'Veille à ce que chaque page se lise au clavier et avec un lecteur d’écran.'],
                ['name' => 'Nadia Kessler', 'role' => 'Rédactrice', 'bio' => 'Écrit en français et en allemand, et récrit ce que nous avons mal dit.'],
                ['name' => 'Hugo Rochat', 'role' => 'Film et animation', 'bio' => 'Tourne, monte et anime. Arrive avec une caméra et repart avec un film.'],
            ],
        ],
        'quote' => [
            'title' => 'Votre projet en quelques lignes',
            'intro' => 'Le genre de projet, une fourchette de budget, une échéance. Le reste, nous le demanderons de vive voix.',
            'note' => 'Élise ou Léa vous rappelle sous deux jours ouvrables. Un brief n’engage à rien.',
            'action' => '#quote',
            'scopes' => ['Identité de marque', 'Site web', 'Boutique en ligne', 'Campagne', 'Film ou animation', 'Rédaction', 'Je ne sais pas encore'],
            'budgets' => ['Moins de CHF 10 000', 'De CHF 10 000 à 30 000', 'De CHF 30 000 à 80 000', 'Plus de CHF 80 000'],
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Agence de design et de web · Neuchâtel',
                'title' => 'Votre marque et votre site, faits sous un seul toit',
                'lead' => 'Huit personnes qui dessinent, écrivent et développent elles-mêmes ce qu’elles vendent. Depuis 2012, pour des entreprises de l’Arc jurassien et d’un peu plus loin.',
                'subject' => 'L’atelier de la rue des Moulins, des épreuves d’affiches épinglées au mur',
                'note' => 'Prochain créneau libre : février 2027',
                'links' => [['label' => 'Envoyer un brief', 'to' => '/brief'], ['label' => 'Voir les réalisations', 'to' => '/work']],
                'facts' => [['value' => '140', 'label' => 'Projets livrés depuis 2012'], ['value' => '8', 'label' => 'Personnes, rien de sous-traité'], ['value' => '9 sur 10', 'label' => 'Livrés à la date de l’offre']],
            ],
            'features' => [
                'eyebrow' => 'Par où commencer',
                'title' => 'Le travail, l’offre, les gens',
                'lead' => 'Trois pages suffisent pour savoir si nous sommes l’agence qu’il vous faut.',
                'items' => [
                    ['title' => 'Les réalisations', 'body' => 'Six projets récents, chacun signé du chiffre que le client a mesuré lui-même.', 'subject' => 'La boutique de la Manufacture Calame sur un écran de l’atelier', 'to' => '/work', 'label' => 'Voir les réalisations'],
                    ['title' => 'Les services', 'body' => 'Stratégie, identité, site, rédaction, film : huit métiers, avec leur prix de départ.', 'subject' => 'Des planches d’identité étalées sur la grande table', 'to' => '/services', 'label' => 'Voir les services et les prix'],
                    ['title' => 'L’équipe', 'body' => 'Les huit personnes que vous aurez au téléphone, du brief à la mise en ligne.', 'subject' => 'L’équipe autour de la table, un lundi matin', 'to' => '/team', 'label' => 'Rencontrer l’équipe'],
                ],
            ],
        ],
        '/work' => [
            'label' => 'Réalisations',
            'hero' => [
                'eyebrow' => 'Réalisations',
                'title' => 'Six projets, et ce qu’ils ont changé',
                'lead' => 'Chaque projet porte un chiffre que le client a mesuré lui-même. Les études complètes s’envoient sur demande.',
                'subject' => 'Les emballages de la Fromagerie des Ponts alignés sur un établi',
                'links' => [['label' => 'Envoyer un brief', 'to' => '/brief'], ['label' => 'Voir les services', 'to' => '/services']],
            ],
            'features' => [
                'eyebrow' => 'Par métier',
                'title' => 'Ce que nous savons de votre secteur',
                'lead' => 'Douze ans dans la même région : certains métiers, nous les connaissons de l’intérieur.',
                'items' => [
                    ['title' => 'Industrie et horlogerie', 'body' => 'Des maisons qui vendent par leurs revendeurs et veulent aussi parler à leurs clients. Trois langues, souvent quatre.', 'subject' => 'Un cadran sous la loupe d’un horloger, au Locle'],
                    ['title' => 'Culture et événements', 'body' => 'Une affiche qui tient dans la rue, et une billetterie qui tient le matin de l’ouverture des ventes.', 'subject' => 'Les affiches du Festival Les Rives collées sur une palissade'],
                    ['title' => 'Services publics et santé', 'body' => 'Des sites que tout le monde doit pouvoir utiliser : d’une main, à l’arrêt de bus, sous la pluie.', 'subject' => 'Une voyageuse consultant son horaire à l’arrêt de bus'],
                ],
            ],
        ],
        '/services' => [
            'label' => 'Services',
            'hero' => [
                'eyebrow' => 'Services',
                'title' => 'Ce que nous faisons nous-mêmes',
                'lead' => 'Huit métiers sous un toit, aucun sous-traité. Les prix de départ sont affichés ; le prix ferme vient après l’atelier de cadrage.',
                'subject' => 'Un écran de maquettes et un carnet de croquis, côte à côte',
                'links' => [['label' => 'Envoyer un brief', 'to' => '/brief'], ['label' => 'Voir les réalisations', 'to' => '/work']],
            ],
            'story' => [
                'eyebrow' => 'Notre façon de faire',
                'title' => 'Un prix ferme, une seule équipe',
                'lead' => 'Nous ne vendons pas des heures. Nous vendons un résultat, à une date, pour un prix écrit avant de commencer.',
                'body' => [
                    'Trame a commencé en 2012 par des identités visuelles. Les clients revenaient six mois plus tard avec la même question : et le site, qui le fait ? Nous avons engagé un développeur en 2014 plutôt que de recommander quelqu’un, et nous n’avons plus rien sous-traité depuis.',
                    'Tout faire sous un toit a une conséquence simple. La personne qui dessine votre page d’accueil est assise à deux mètres de celle qui la programme et de celle qui l’écrit : les allers-retours se règlent à la table, et rien ne se perd entre deux prestataires.',
                    'Le prix est fixé après l’atelier de cadrage et ne bouge plus, sauf si vous changez le périmètre. En douze ans, neuf projets sur dix ont été livrés à la date écrite dans l’offre. Pour le dixième, nous avons prévenu un mois avant.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois façons de commencer',
                'title' => 'Selon où vous en êtes',
                'items' => [
                    ['title' => 'Le sprint de marque', 'body' => 'Deux semaines, deux ateliers, un positionnement et une première identité. Pour une entreprise qui se lance ou change de nom. CHF 12 000.', 'subject' => 'Un mur de notes après un atelier de positionnement'],
                    ['title' => 'Le site en dix semaines', 'body' => 'Vingt pages au plus, écrites, dessinées et développées à date fixe. Dès CHF 18 000.', 'subject' => 'Des maquettes de pages imprimées et annotées au feutre'],
                    ['title' => 'L’année ensemble', 'body' => 'Un jour par mois réservé pour vous : campagnes, nouvelles pages, mises à jour. Dès CHF 1 400 par mois.', 'subject' => 'Un calendrier mural couvert de jalons de projets'],
                ],
            ],
        ],
        '/team' => [
            'label' => 'Équipe',
            'hero' => [
                'eyebrow' => 'Équipe',
                'title' => 'Huit personnes, que vous aurez au téléphone',
                'lead' => 'Pas de commerciaux, pas de stagiaires cachés : celles et ceux qui signent l’offre sont ceux qui font le travail.',
                'subject' => 'L’équipe devant la porte de l’atelier, rue des Moulins',
                'links' => [['label' => 'Envoyer un brief', 'to' => '/brief'], ['label' => 'Voir les réalisations', 'to' => '/work']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2012',
                'title' => 'Une ancienne imprimerie, rue des Moulins',
                'lead' => 'Nous sommes restés huit exprès : assez pour tout faire nous-mêmes, pas assez pour qu’un client devienne un numéro de dossier.',
                'body' => [
                    'Élise Perrenoud et Marc Jeanneret se sont rencontrés dans une grande agence où les projets passaient de main en main sans que personne en réponde. En 2012, ils ont loué le rez d’une ancienne imprimerie de la rue des Moulins, avec une table, deux écrans et la presse à épreuves que le propriétaire avait laissée.',
                    'La presse sert encore : chaque identité y est tirée une fois sur papier avant d’être montrée. L’équipe a grandi d’une personne tous les deux ans environ, chaque fois pour un métier que nous étions fatigués de confier ailleurs : le développement en 2014, la rédaction en 2017, le film en 2021.',
                    'Celle qui vous rappelle après votre brief est Élise ou Léa, et c’est avec elle que vous parlerez jusqu’à la mise en ligne. Cinq d’entre nous sont là depuis plus de six ans.',
                ],
            ],
            'features' => [
                'eyebrow' => 'La vie de l’atelier',
                'title' => 'Trois habitudes de la maison',
                'items' => [
                    ['title' => 'Le lundi à neuf heures', 'body' => 'Tous les projets en cours passent sur la table, vingt minutes chacun. Les clients qui le souhaitent y assistent.', 'subject' => 'La table du lundi, couverte d’épreuves et de tasses'],
                    ['title' => 'La presse à épreuves', 'body' => 'Une presse de 1958 laissée par l’imprimeur. Chaque logo y est tiré avant d’être présenté.', 'subject' => 'La presse à épreuves, un tirage encore frais sur le marbre'],
                    ['title' => 'Le premier vendredi du mois', 'body' => 'L’atelier est ouvert de 17 h à 19 h : on passe voir, on pose une question, on repart avec une affiche.', 'subject' => 'La porte de l’atelier ouverte sur la rue, un soir d’été'],
                ],
            ],
        ],
        '/brief' => [
            'hero' => [
                'eyebrow' => 'Le brief',
                'title' => 'Parlez-nous de votre projet',
                'lead' => 'Cinq minutes suffisent. Dites-nous ce que vous voulez changer : nous rappelons sous deux jours ouvrables.',
                'subject' => 'La grande table de l’atelier, un carnet ouvert et deux cafés',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000'], ['label' => 'Écrire à bonjour@trame.example', 'href' => 'mailto:bonjour@trame.example']],
            ],
            'story' => [
                'eyebrow' => 'Ce qui se passe ensuite',
                'title' => 'Du brief à l’offre, en dix jours',
                'lead' => 'Un brief n’est pas une commande. C’est le début d’une conversation, et elle ne vous coûte rien.',
                'body' => [
                    'Votre message arrive chez Élise et chez Léa. L’une des deux vous rappelle sous deux jours ouvrables, avec des questions : à qui parlez-vous, qu’est-ce qui doit changer, qui décide chez vous. Si le projet n’est pas pour nous, nous le disons à ce moment-là et nous indiquons volontiers un confrère.',
                    'Vient ensuite l’atelier de cadrage, une demi-journée chez vous ou rue des Moulins. Il est facturé CHF 900, déduits de l’offre si nous travaillons ensemble. Vous en repartez avec un document de quatre pages qui vous appartient, que vous signiez ou non.',
                    'L’offre suit dans la semaine : un périmètre, un calendrier et un prix ferme. Comptez dix jours entre votre brief et ce document.',
                ],
            ],
            'band' => [
                'eyebrow' => 'Plutôt de vive voix ?',
                'title' => 'Passez rue des Moulins',
                'lead' => 'L’atelier est ouvert du lundi au vendredi, de 8 h 30 à 18 h. Le café est bon et la presse à épreuves se visite.',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000'], ['label' => 'Voir les réalisations', 'to' => '/work']],
                'details' => [
                    ['label' => 'Atelier', 'value' => 'Rue des Moulins 21, Neuchâtel'],
                    ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                    ['label' => 'E-mail', 'value' => 'bonjour@trame.example', 'href' => 'mailto:bonjour@trame.example'],
                ],
            ],
        ],
    ],
];
