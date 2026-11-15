<?php

declare(strict_types=1);

/*
 * The demo content of a legal office: a fictional étude of three lawyers, a
 * notary and a tax expert on the rue de Lausanne in Fribourg, founded in 1998.
 * `site` is what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/legal.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Étude Morard & Tissot',
        'blurb' => 'Avocats et notaire à Fribourg depuis 1998 : famille, successions, travail, bail, actes notariés, entreprises et impôts.',
        'address' => 'Rue de Lausanne 38, 1700 Fribourg',
        'phone' => '026 000 00 00',
        'email' => 'etude@morard-tissot.example',
        'status' => 'Permanence téléphonique du lundi au vendredi, 8 h à 12 h et 13 h 30 à 17 h 30',
        'note' => '© Étude Morard & Tissot · Avocats inscrits au registre cantonal, notaire patenté du canton de Fribourg',
        'action' => ['label' => 'Demander un entretien', 'to' => '/appointment'],
        'band' => [
            'eyebrow' => 'Premier entretien',
            'title' => 'Parlons de votre affaire',
            'lead' => 'Quarante-cinq minutes pour CHF 150, déduits de la première note si vous nous confiez le dossier. Vous repartez avec un avis, les délais à tenir et un devis écrit.',
            'links' => [['label' => 'Demander un entretien', 'to' => '/appointment'], ['label' => 'Les questions avant de venir', 'to' => '/questions']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue de Lausanne 38, Fribourg, 2e étage'],
                ['label' => 'Téléphone', 'value' => '026 000 00 00', 'href' => 'tel:+41260000000'],
                ['label' => 'Permanence', 'value' => 'Lundi au vendredi, 8 h à 12 h et 13 h 30 à 17 h 30'],
            ],
        ],
    ],

    'prefabs' => [
        'services' => [
            'title' => 'Les domaines de l’étude',
            'services' => [
                ['name' => 'Famille et séparation', 'line' => 'Divorce, garde des enfants, pensions : un accord quand il est possible, un procès quand il le faut.', 'icon' => 'users', 'price' => 'Divorce d’accord dès CHF 1800'],
                ['name' => 'Successions et testaments', 'line' => 'Écrire un testament qui tienne, régler une succession, sortir d’une indivision entre héritiers.', 'icon' => 'scroll-text', 'price' => 'Testament dès CHF 450'],
                ['name' => 'Travail', 'line' => 'Licenciement, certificat de travail, heures impayées : pour l’employé comme pour l’employeur.', 'icon' => 'briefcase', 'price' => 'CHF 280 l’heure'],
                ['name' => 'Bail et immobilier', 'line' => 'Hausse de loyer, congé, défauts du logement, litige avec une régie ou un entrepreneur.', 'icon' => 'key-round', 'price' => 'CHF 220 l’heure'],
                ['name' => 'Actes notariés', 'line' => 'Vente d’un bien, contrat de mariage, pacte successoral : l’acte, sa signature et son inscription au registre.', 'icon' => 'stamp', 'price' => 'Tarif cantonal'],
                ['name' => 'Entreprises et sociétés', 'line' => 'Fonder une Sàrl, écrire des statuts ou un pacte d’associés, transmettre l’entreprise à la génération suivante.', 'icon' => 'building-2', 'price' => 'Fondation dès CHF 1200'],
                ['name' => 'Impôts', 'line' => 'Déclaration, réclamation contre une taxation, impôt sur les gains immobiliers, donation préparée à temps.', 'icon' => 'calculator', 'price' => 'Déclaration dès CHF 180'],
                ['name' => 'Factures impayées et poursuites', 'line' => 'Faire payer ce qui vous est dû, ou répondre à un commandement de payer avant que le délai ne tombe.', 'icon' => 'receipt', 'price' => 'Forfait dès CHF 350'],
            ],
        ],
        'team' => [
            'title' => 'Celles et ceux qui tiennent les dossiers',
            'members' => [
                ['name' => 'Me Hélène Morard', 'role' => 'Avocate associée · famille et successions', 'bio' => 'Brevet d’avocat fribourgeois en 1998, médiatrice FSA depuis 2009. Elle a fondé l’étude et plaide encore chaque semaine devant le tribunal de la Sarine.'],
                ['name' => 'Me Laurent Tissot', 'role' => 'Notaire associé · immobilier et sociétés', 'bio' => 'Notaire patenté du canton de Fribourg depuis 2004. Il instrumente les ventes, les pactes successoraux et les fondations de sociétés, en français et en allemand.'],
                ['name' => 'Me Camille Rey', 'role' => 'Avocate · droit du travail', 'bio' => 'Brevet en 2011, spécialiste FSA en droit du travail depuis 2017. Elle conseille des employés et des PME, ce qui aide à savoir ce que l’autre partie répondra.'],
                ['name' => 'Me Julien Aebischer', 'role' => 'Avocat · bail, construction et poursuites', 'bio' => 'Brevet en 2015. Bilingue, il suit les dossiers devant les autorités de conciliation de la Sarine et de la Singine.'],
                ['name' => 'Sophie Pasquier', 'role' => 'Experte fiscale diplômée · particuliers et PME', 'bio' => 'Diplôme fédéral en 2013, après huit ans au Service cantonal des contributions. Déclarations, réclamations, et le calcul fait avant une vente ou une donation.'],
                ['name' => 'Marianne Dousse', 'role' => 'Secrétaire de l’étude', 'bio' => 'À l’étude depuis 2006. C’est elle qui décroche, qui fixe le premier entretien et qui sait toujours où en est votre dossier.'],
            ],
        ],
        'credentials' => [
            'title' => 'Inscriptions et affiliations',
            'credentials' => [
                ['name' => 'Registre cantonal des avocats', 'detail' => 'Canton de Fribourg : chaque avocat de l’étude y est inscrit'],
                ['name' => 'Ordre des avocats fribourgeois', 'detail' => 'Trois membres, le premier depuis 1998'],
                ['name' => 'Fédération suisse des avocats', 'detail' => 'Une spécialiste FSA en droit du travail (2017), une médiatrice FSA (2009)'],
                ['name' => 'Chambre des notaires fribourgeois', 'detail' => 'Me Laurent Tissot, notaire patenté depuis 2004'],
                ['name' => 'Fédération suisse des notaires', 'detail' => 'Membre depuis 2004'],
                ['name' => 'EXPERTsuisse', 'detail' => 'Sophie Pasquier, experte fiscale diplômée, 2013'],
            ],
        ],
        'faq' => [
            'title' => 'Avant le premier entretien',
            'entries' => [
                ['question' => 'Combien coûte le premier entretien ?', 'answer' => 'CHF 150 pour quarante-cinq minutes, quel que soit le domaine. Si vous nous confiez l’affaire, ce montant est déduit de la première note d’honoraires.'],
                ['question' => 'Comment vos honoraires sont-ils calculés ?', 'answer' => 'Au temps passé : CHF 280 l’heure pour un associé, CHF 220 pour un avocat collaborateur. Les actes notariés suivent le tarif cantonal. Vous recevez un devis écrit avant que nous commencions, puis un décompte chaque trimestre.'],
                ['question' => 'Ce que je vous dis reste-t-il confidentiel ?', 'answer' => 'Oui, dès le premier appel et même si vous ne nous confiez rien ensuite. Le secret professionnel couvre tout ce que vous dites à un avocat ou à un notaire de l’étude, et il ne s’éteint pas.'],
                ['question' => 'Où se trouve l’étude, et où se garer ?', 'answer' => 'Rue de Lausanne 38, au 2e étage, avec ascenseur. La rue est piétonne : le parking des Alpes est à trois minutes à pied, la gare à huit minutes.'],
                ['question' => 'Que dois-je apporter ?', 'answer' => 'Une pièce d’identité et tous les papiers de l’affaire : contrat, bail, lettre de congé, décision, commandement de payer. Apportez aussi les enveloppes, car la date du timbre fait parfois courir le délai.'],
                ['question' => 'J’ai reçu un courrier avec un délai : que faire ?', 'answer' => 'Appelez le 026 000 00 00 le jour même et dites la date inscrite sur le courrier. Certains délais sont de dix jours et ne se rattrapent pas : nous vous recevons avant leur échéance ou nous vous disons quoi envoyer en attendant.'],
                ['question' => 'Combien de temps mon affaire durera-t-elle ?', 'answer' => 'Un acte notarié se signe en deux à six semaines, un divorce d’accord se règle en quatre mois environ, un procès se compte en années. À la fin du premier entretien, vous connaissez les étapes et leur durée probable.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un premier entretien',
            'intro' => 'Dites l’affaire en une ligne et un jour qui vous convient. Marianne Dousse vous rappelle dans la journée ouvrable pour fixer l’heure : rien n’est réservé avant cet appel.',
            'action' => '#booking',
            'services' => [
                'Famille et séparation',
                'Successions et testaments',
                'Travail',
                'Bail et immobilier',
                'Acte notarié',
                'Entreprise ou société',
                'Impôts',
                'Facture impayée ou poursuite',
                'Je ne sais pas encore',
            ],
        ],
        'map' => [
            'address' => 'Rue de Lausanne 38, 1700 Fribourg',
            'title' => 'Étude Morard & Tissot, 2e étage',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Avocats et notaire · Fribourg',
                'title' => 'Une affaire à régler, une personne pour la suivre',
                'lead' => 'Séparation, succession, licenciement, bail, achat d’un logement ou impôts : depuis 1998, l’étude reçoit rue de Lausanne ceux qui ont une affaire qu’ils ne peuvent pas régler seuls. La personne qui vous reçoit est celle qui garde le dossier.',
                'subject' => 'La salle de conférence de l’étude, un dossier ouvert sur la table et les toits de la vieille ville par la fenêtre',
                'note' => 'Premier entretien de 45 minutes : CHF 150, déduits si vous nous confiez l’affaire',
                'links' => [['label' => 'Demander un entretien', 'to' => '/appointment'], ['label' => 'Voir nos domaines', 'to' => '/practice']],
                'facts' => [['value' => '1998', 'label' => 'Fondation de l’étude'], ['value' => '5', 'label' => 'Avocats, notaire et experte fiscale'], ['value' => 'CHF 150', 'label' => 'Le premier entretien']],
            ],
            'features' => [
                'eyebrow' => 'L’étude',
                'title' => 'Ce qu’il faut savoir avant d’appeler',
                'lead' => 'Ce que nous traitons, qui s’en charge et ce que cela coûte : trois réponses, avant la première question.',
                'items' => [
                    ['title' => 'Huit domaines, dits simplement', 'body' => 'Une séparation, un testament, un licenciement, un congé de bail, une vente, une société, une taxation, une facture impayée. Si votre affaire est dans la liste, nous la traitons.', 'subject' => 'Des dossiers suspendus, étiquetés à la main, dans l’armoire de l’étude', 'to' => '/practice', 'label' => 'Les domaines de l’étude'],
                    ['title' => 'Un nom sur chaque dossier', 'body' => 'Trois avocats, un notaire et une experte fiscale. Vous savez dès le premier entretien qui écrira vos courriers et qui vous répondra au téléphone.', 'subject' => 'Me Hélène Morard et Me Laurent Tissot devant la bibliothèque de l’étude', 'to' => '/lawyers', 'label' => 'Qui s’occupe de quoi'],
                    ['title' => 'Les réponses avant de venir', 'body' => 'Les honoraires, le secret professionnel, les papiers à apporter et ce qu’il faut faire quand un délai court déjà.', 'subject' => 'La réception de l’étude, deux fauteuils et la porte capitonnée du bureau', 'to' => '/questions', 'label' => 'Les questions que l’on nous pose'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1998',
                'title' => 'Une étude de la rue de Lausanne',
                'lead' => 'Vingt-huit ans au même étage, et une règle qui n’a pas changé : celui qui vous reçoit est celui qui écrit.',
                'body' => [
                    'Hélène Morard a ouvert l’étude en 1998, seule, dans deux pièces au-dessus d’une librairie. Les premières affaires étaient des divorces et des successions du quartier, et beaucoup de ces familles sont revenues depuis pour un bail, une vente ou une entreprise à transmettre.',
                    'Laurent Tissot l’a rejointe en 2004 comme notaire. Depuis, une succession se règle sous un seul toit : l’avocate pour ce qui se discute, le notaire pour ce qui s’inscrit, et l’experte fiscale pour ce que cela coûtera en impôts avant que personne n’ait signé.',
                    'Nous sommes restés petits exprès. Un dossier ne passe pas de main en main, les courriers partent signés de la personne que vous avez rencontrée, et chaque trimestre vous recevez un décompte même quand il ne s’est rien passé.',
                ],
            ],
        ],
        '/practice' => [
            'label' => 'Domaines',
            'hero' => [
                'eyebrow' => 'Domaines',
                'title' => 'Ce que l’étude traite, dit dans vos mots',
                'lead' => 'Huit domaines et, pour chacun, ce que vous pouvez en attendre. Si votre affaire n’y figure pas, appelez : nous vous disons en deux minutes si elle est pour nous ou pour un confrère.',
                'subject' => 'Un code civil annoté ouvert sur un bureau, un surligneur posé en travers',
                'links' => [['label' => 'Demander un entretien', 'to' => '/appointment']],
            ],
            'features' => [
                'eyebrow' => 'Notre façon de travailler',
                'title' => 'Trois engagements, pris par écrit',
                'items' => [
                    ['title' => 'Un devis avant de commencer', 'body' => 'Après le premier entretien, vous recevez par écrit ce que nous ferons, en combien d’heures et pour quel montant. Rien ne commence sans votre accord.', 'icon' => 'file-text'],
                    ['title' => 'Un seul interlocuteur', 'body' => 'La personne qui vous a reçu garde le dossier jusqu’au bout. Si un confrère de l’étude intervient, vous le savez avant, et pourquoi.', 'icon' => 'user-check', 'to' => '/lawyers', 'label' => 'Voir l’équipe'],
                    ['title' => 'Des nouvelles sans les demander', 'body' => 'Copie de chaque courrier le jour où il part, et un décompte des heures chaque trimestre, même quand le tribunal ne bouge pas.', 'icon' => 'mail-check'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Ce que nous ne faisons pas',
                'title' => 'Savoir dire non, et à qui vous adresser',
                'body' => [
                    'L’étude ne plaide pas au pénal, ne dépose pas de brevets et ne traite pas les dossiers d’asile. Ce sont des métiers à part entière, et un avocat qui les pratique une fois par an vous sert moins bien qu’un confrère qui ne fait que cela.',
                    'Quand une affaire sort de nos domaines, nous vous donnons le nom de deux études de Fribourg ou de Bulle qui la prendront, et l’appel ne vous est pas facturé.',
                ],
            ],
        ],
        '/lawyers' => [
            'label' => 'L’équipe',
            'hero' => [
                'eyebrow' => 'L’équipe',
                'title' => 'Six personnes, et un nom sur chaque dossier',
                'lead' => 'Trois avocats, un notaire, une experte fiscale et celle qui tient l’agenda. Chacun a son domaine, et aucun ne prend une affaire qui est celle d’un autre.',
                'subject' => 'L’équipe de l’étude autour de la table de conférence, un matin de séance',
                'links' => [['label' => 'Demander un entretien', 'to' => '/appointment']],
            ],
            'story' => [
                'eyebrow' => 'Comment nous travaillons',
                'title' => 'Un dossier ne change pas de mains',
                'lead' => 'Chaque lundi à huit heures, l’étude passe tous les dossiers ouverts en revue. C’est la seule réunion de la semaine.',
                'body' => [
                    'Les deux associés reçoivent eux-mêmes les premiers entretiens de leurs domaines. Me Morard prend la famille et les successions, Me Tissot tout ce qui finit par un acte, et ils se passent le dossier à voix haute, devant vous, quand une affaire a besoin des deux.',
                    'Me Rey et Me Aebischer ont chacun leur champ, le travail pour l’une, le bail et les poursuites pour l’autre. Ils signent leurs courriers et plaident leurs audiences : vous n’aurez pas affaire à un associé le premier jour et à un inconnu le second.',
                    'Sophie Pasquier n’est pas avocate, et c’est pour cela qu’elle est ici. Avant une vente, un divorce ou une donation, elle calcule ce que l’opération coûtera en impôts, et il arrive que ce chiffre change la décision.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Trois métiers sous un toit',
                'title' => 'Le barreau, le notariat, la fiscalité',
                'items' => [
                    ['title' => 'Le barreau', 'body' => 'Trois avocats inscrits au registre cantonal, qui conseillent, négocient et plaident devant les tribunaux fribourgeois et le Tribunal fédéral.', 'subject' => 'Une robe d’avocat suspendue derrière la porte d’un bureau'],
                    ['title' => 'Le notariat', 'body' => 'Un notaire patenté, pour les actes que la loi veut authentiques : ventes immobilières, contrats de mariage, pactes successoraux, statuts.', 'subject' => 'Un acte relié, le sceau du notaire et un stylo à plume sur un sous-main'],
                    ['title' => 'La fiscalité', 'body' => 'Une experte fiscale diplômée, pour savoir avant de signer ce qu’un partage, une vente ou une donation coûtera vraiment.', 'subject' => 'Une déclaration d’impôt annotée au crayon, une calculatrice à côté'],
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Ce que l’on nous demande avant le premier entretien',
                'lead' => 'Le prix, le secret, les papiers à apporter et ce qu’il faut faire quand un délai court déjà. Si votre question n’est pas ici, posez-la au 026 000 00 00.',
                'subject' => 'La réception de l’étude, deux fauteuils et une pile de dossiers sur le comptoir',
                'links' => [['label' => 'Demander un entretien', 'to' => '/appointment']],
            ],
            'story' => [
                'eyebrow' => 'Le secret professionnel',
                'title' => 'Ce que vous dites ici ne sort pas d’ici',
                'lead' => 'Beaucoup hésitent à appeler parce qu’ils ne savent pas ce qu’ils peuvent dire. Tout.',
                'body' => [
                    'Le secret commence au premier mot, au téléphone déjà, et il vaut pour tous ceux qui travaillent à l’étude, du notaire à la secrétaire. Il tient même si vous décidez, après l’entretien, de ne rien nous confier.',
                    'Nous ne confirmons à personne que vous êtes notre client : ni à votre employeur, ni à votre conjoint, ni à un autre avocat. Les courriers partent à l’adresse que vous choisissez, et sur demande dans une enveloppe sans en-tête.',
                    'Avant d’ouvrir un dossier, nous vérifions que l’étude ne conseille pas déjà l’autre partie. Si c’est le cas, nous vous le disons le jour même, sans dire qui, et nous vous indiquons un confrère.',
                ],
            ],
        ],
        '/appointment' => [
            'hero' => [
                'eyebrow' => 'Premier entretien',
                'title' => 'Demander un premier entretien',
                'lead' => 'Quarante-cinq minutes à l’étude, pour CHF 150. Écrivez l’affaire en une ligne et un jour qui vous convient : nous vous rappelons dans la journée ouvrable. Si un délai court, téléphonez plutôt.',
                'subject' => 'La porte de l’étude au 2e étage, la plaque de laiton à côté de la sonnette',
                'links' => [['label' => 'Appeler le 026 000 00 00', 'href' => 'tel:+41260000000']],
            ],
            'story' => [
                'eyebrow' => 'Comment cela se passe',
                'title' => 'Du premier appel au premier entretien',
                'lead' => 'Entre votre demande et le rendez-vous, il s’écoule rarement plus de cinq jours ouvrables.',
                'body' => [
                    'Marianne Dousse vous rappelle pour fixer l’heure et vous demande deux choses : le nom de l’autre partie, pour vérifier que l’étude ne la conseille pas, et la date des courriers que vous avez reçus. Elle vous dit ensuite qui vous recevra.',
                    'L’entretien a lieu à l’étude, au 2e étage, ou par téléphone si vous ne pouvez pas vous déplacer. Le jeudi, nous recevons jusqu’à 19 h pour ceux qui travaillent la journée.',
                    'Vous repartez avec un avis sur vos chances, la liste des délais à tenir et un devis écrit. Vous avez ensuite tout le temps de décider : nous n’ouvrons un dossier que lorsque vous nous l’avez demandé par écrit.',
                ],
            ],
        ],
    ],
];
