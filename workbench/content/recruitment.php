<?php

declare(strict_types=1);

/*
 * The demo content of a recruitment firm: a fictional office of six
 * consultants in Neuchâtel that places people in permanent and temporary jobs
 * across the Arc jurassien, and searches for executives on mandate. `site` is
 * what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/recruitment.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Jalon Recrutement',
        'blurb' => 'Placement fixe, travail temporaire et recherche de cadres dans l’Arc jurassien, depuis 2009.',
        'address' => 'Rue du Seyon 18, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'bonjour@jalon-recrutement.example',
        'status' => 'Bureau ouvert sans rendez-vous jusqu’à 17 h 30',
        'note' => '© Jalon Recrutement SA · Placement privé et location de services autorisés par le canton de Neuchâtel et le SECO',
        'action' => ['label' => 'Demander un entretien', 'to' => '/contact'],
        'band' => [
            'eyebrow' => 'Un entretien',
            'title' => 'Un poste à trouver, ou à pourvoir ?',
            'lead' => 'Laissez-nous une ligne : le consultant de votre secteur vous rappelle dans la journée. Pour un renfort temporaire, le téléphone répond dès 7 h.',
            'links' => [['label' => 'Demander un entretien', 'to' => '/contact'], ['label' => 'Voir les postes ouverts', 'to' => '/jobs']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue du Seyon 18, Neuchâtel'],
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Horaires', 'value' => 'Lundi–vendredi, 8 h–12 h · 13 h 30–17 h 30'],
            ],
        ],
    ],

    'prefabs' => [
        'testimonials' => [
            'title' => 'Candidats et employeurs, en leurs mots',
            'testimonials' => [
                ['quote' => 'J’avais envoyé quarante dossiers sans une réponse. Sandra Kohler a relu mon CV avec moi un mardi ; le jeudi suivant, j’étais en essai dans un atelier du Locle. J’y travaille toujours.', 'name' => 'Mehdi Benali', 'role' => 'Polymécanicien, engagé en fixe au Locle'],
                ['quote' => 'Il nous fallait quatre opératrices pour trois mois. Elles étaient à l’établi le lundi, déjà formées au binoculaire, et deux sont restées en fixe.', 'name' => 'Nathalie Dubois', 'role' => 'Responsable RH, manufacture horlogère, La Chaux-de-Fonds'],
                ['quote' => 'On m’a présenté trois personnes, pas trente. La deuxième dirige aujourd’hui notre production.', 'name' => 'Laurent Perrin', 'role' => 'Directeur, entreprise de décolletage, Val-de-Travers'],
            ],
        ],
        'jobs' => [
            'title' => 'Les postes de la semaine',
            'intro' => 'Chaque annonce est un mandat réel, visité par le consultant qui le suit et retiré le jour où le poste est pourvu.',
            'jobs' => [
                ['name' => 'Polymécanicienne ou polymécanicien CFC', 'place' => 'Le Locle', 'hours' => '100 % · fixe', 'line' => 'Usinage CNC cinq axes de composants horlogers en petites séries, en horaire de jour.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Polym%C3%A9canicien%20CFC'],
                ['name' => 'Horlogère ou horloger rhabilleur', 'place' => 'La Chaux-de-Fonds', 'hours' => '80–100 % · fixe', 'line' => 'Service après-vente d’une manufacture indépendante : mouvements mécaniques, du diagnostic au contrôle final.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Horloger%20rhabilleur'],
                ['name' => 'Opératrice ou opérateur en salle blanche', 'place' => 'Marin-Épagnier', 'hours' => '100 % · temporaire, 6 mois', 'line' => 'Assemblage de dispositifs médicaux sous binoculaire, en deux équipes ; trois jours de formation à l’entrée.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Op%C3%A9rateur%20en%20salle%20blanche'],
                ['name' => 'Infirmière ou infirmier diplômé', 'place' => 'Val-de-Ruz', 'hours' => '60–100 % · fixe', 'line' => 'Soins de longue durée dans un EMS de soixante lits, sans nuits, avec un week-end sur trois.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Infirmier%20dipl%C3%B4m%C3%A9'],
                ['name' => 'Électricienne ou électricien de montage CFC', 'place' => 'Littoral neuchâtelois', 'hours' => '100 % · temporaire, dès lundi', 'line' => 'Chantiers de logements et de rénovation ; permis de conduire demandé, outillage fourni par l’entreprise.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=%C3%89lectricien%20de%20montage'],
                ['name' => 'Comptable avec brevet fédéral', 'place' => 'Neuchâtel', 'hours' => '80–100 % · fixe', 'line' => 'Comptabilité complète d’un groupe de trois sociétés, bouclements annuels et décomptes TVA compris.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Comptable'],
                ['name' => 'Responsable de production', 'place' => 'Val-de-Travers', 'hours' => '100 % · fixe', 'line' => 'Quarante personnes en décolletage et en polissage, à diriger aux côtés du propriétaire ; mandat confidentiel.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Responsable%20de%20production'],
                ['name' => 'Assistante ou assistant administratif', 'place' => 'Bienne', 'hours' => '50–70 % · fixe', 'line' => 'Commandes, facturation et téléphone chez un fabricant d’outillage ; l’allemand se parle tous les jours.', 'href' => 'mailto:postes@jalon-recrutement.example?subject=Assistant%20administratif'],
            ],
        ],
        'services' => [
            'title' => 'Ce que nous faisons pour un employeur',
            'services' => [
                ['name' => 'Placement fixe', 'line' => 'Nous cherchons, recevons et vous présentons trois candidats au plus ; rien n’est dû tant que personne n’est engagé.', 'icon' => 'user-check', 'price' => '18 % du salaire annuel'],
                ['name' => 'Travail temporaire', 'line' => 'Du renfort pour une semaine ou pour six mois : contrat, salaire et assurances sont à notre charge.', 'icon' => 'clock', 'price' => 'dès CHF 42 l’heure'],
                ['name' => 'Temporaire puis fixe', 'line' => 'Trois mois de mission pour se connaître, puis l’engagement chez vous sans honoraires de placement.', 'icon' => 'repeat', 'price' => 'sans frais après 3 mois'],
                ['name' => 'Recherche de cadres', 'line' => 'Une approche directe et discrète pour une direction ou un profil rare, sur mandat exclusif.', 'icon' => 'search', 'price' => '25 % en trois tiers'],
                ['name' => 'Gestion des salaires', 'line' => 'Vous avez trouvé la personne : nous l’engageons et la payons pour vous, le temps d’un projet.', 'icon' => 'wallet', 'price' => '9 % de la masse salariale'],
            ],
        ],
        'process' => [
            'title' => 'Un recrutement, du brief au premier jour',
            'intro' => 'Un seul consultant suit votre poste du début à la fin, et vous savez à chaque étape où il en est.',
            'steps' => [
                ['name' => 'Le brief', 'line' => 'Une heure dans vos murs : le poste, l’équipe, le salaire, et ce qui a fait partir la dernière personne.', 'duration' => 'Sous 48 heures'],
                ['name' => 'La recherche', 'line' => 'Notre fichier, l’annonce et l’approche directe. Chaque candidat retenu est reçu au bureau, ses références appelées.', 'duration' => 'Deux à trois semaines'],
                ['name' => 'La présentation', 'line' => 'Trois dossiers au plus, chacun avec notre avis écrit, puis les entretiens chez vous.', 'duration' => 'Une semaine'],
                ['name' => 'Le premier jour', 'line' => 'Le contrat signé, nous appelons les deux parties après une semaine, un mois et trois mois.', 'duration' => 'Garantie de trois mois'],
            ],
        ],
        'team' => [
            'title' => 'Vos consultants',
            'members' => [
                ['name' => 'Claire Jeanneret', 'role' => 'Fondatrice · recherche de cadres', 'bio' => 'Quinze ans de direction RH dans une manufacture avant d’ouvrir le bureau en 2009. Elle mène elle-même chaque mandat de direction.'],
                ['name' => 'Sandra Kohler', 'role' => 'Industrie et horlogerie', 'bio' => 'Polymécanicienne de formation, elle lit un plan et sait ce qu’un atelier attend d’un régleur. Au bureau depuis 2012.'],
                ['name' => 'Yann Robert', 'role' => 'Bâtiment et technique', 'bio' => 'Ancien chef de chantier. Il place électriciens, installateurs sanitaires et monteurs, et passe sur les chantiers le vendredi.'],
                ['name' => 'Inês Carvalho', 'role' => 'Santé et social', 'bio' => 'Infirmière pendant dix ans dans un hôpital du canton ; elle connaît les horaires de chaque EMS de la région.'],
                ['name' => 'Marc Aubert', 'role' => 'Commerce et administration', 'bio' => 'Comptables, assistantes de direction, logisticiens : il reçoit en français, en allemand et en anglais.'],
                ['name' => 'Léa Guyot', 'role' => 'Missions temporaires', 'bio' => 'Elle tient le planning des missions et le téléphone dès 7 h : un remplacement demandé le matin part souvent l’après-midi.'],
            ],
        ],
        'booking' => [
            'title' => 'Demander un entretien',
            'intro' => 'Candidat ou employeur, dites-nous en une ligne ce que vous cherchez et proposez un jour : le consultant du secteur vous rappelle dans la journée pour fixer l’heure.',
            'action' => '#booking',
            'services' => [
                'Je cherche un emploi fixe',
                'Je cherche des missions temporaires',
                'J’ai un poste fixe à pourvoir',
                'J’ai besoin de renfort temporaire',
                'Je cherche un cadre, en toute discrétion',
            ],
        ],
        'map' => [
            'address' => 'Rue du Seyon 18, 2000 Neuchâtel',
            'title' => 'Jalon Recrutement',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Recrutement · Neuchâtel et Arc jurassien',
                'title' => 'Un emploi qui vous va, une personne qui reste',
                'lead' => 'Six consultants, chacun dans le métier qu’il a exercé, placent en fixe et en temporaire de Bienne au Val-de-Travers. Les candidats sont reçus en personne ; les employeurs ne paient qu’à l’engagement.',
                'subject' => 'Une consultante et un candidat à la table du bureau, un CV entre eux',
                'note' => 'Huit postes ouverts cette semaine, dont deux en mission temporaire',
                'links' => [['label' => 'Voir les postes ouverts', 'to' => '/jobs'], ['label' => 'Confier un recrutement', 'to' => '/employers']],
                'facts' => [['value' => '412', 'label' => 'Placements en 2025'], ['value' => '3', 'label' => 'Dossiers par poste, au plus'], ['value' => '48 h', 'label' => 'Pour un renfort temporaire']],
            ],
            'features' => [
                'eyebrow' => 'Deux portes, un bureau',
                'title' => 'Pour qui cherche, et pour qui engage',
                'lead' => 'Le même consultant connaît l’atelier qui recrute et la personne qui postule : c’est tout le métier.',
                'items' => [
                    ['title' => 'Vous cherchez un emploi', 'body' => 'Les postes ouverts, mis à jour chaque matin, et un entretien au bureau avant tout envoi de dossier. Nos honoraires sont ceux de l’employeur, jamais les vôtres.', 'subject' => 'Une candidate relisant son CV avec une consultante', 'to' => '/jobs', 'label' => 'Les postes ouverts'],
                    ['title' => 'Vous engagez', 'body' => 'Fixe, temporaire ou recherche de cadres : ce que nous faisons, comment un mandat se déroule et ce qu’il coûte, écrit noir sur blanc.', 'subject' => 'Un chef d’atelier faisant visiter son usine à un consultant', 'to' => '/employers', 'label' => 'Prestations et tarifs'],
                    ['title' => 'Un consultant par métier', 'body' => 'Horlogerie, bâtiment, santé, administration : vous parlez à quelqu’un qui a fait votre travail avant de recruter pour lui.', 'subject' => 'Les six consultants devant la vitrine du bureau, rue du Seyon', 'to' => '/consultants', 'label' => 'Les consultants'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2009',
                'title' => 'Un bureau, pas une plateforme',
                'lead' => 'Nous recevons chaque candidat avant de parler de lui, et nous visitons chaque entreprise avant de parler d’elle.',
                'body' => [
                    'Claire Jeanneret a ouvert Jalon en 2009, rue du Seyon, après quinze ans aux ressources humaines d’une manufacture horlogère. Elle y avait reçu trop de dossiers envoyés au hasard par des agences qui n’avaient jamais vu l’atelier.',
                    'La règle n’a pas changé depuis : un consultant ne place que dans le secteur où il a travaillé, il visite le poste avant de l’annoncer et ne présente jamais plus de trois personnes. En 2025, cela a donné 412 placements, dont 146 en fixe, et neuf personnes sur dix encore en poste après le temps d’essai.',
                    'Le bureau est resté au même endroit, à trois minutes de la place Pury. On y entre sans rendez-vous, avec ou sans CV.',
                ],
            ],
        ],
        '/jobs' => [
            'label' => 'Emplois',
            'hero' => [
                'eyebrow' => 'Emplois',
                'title' => 'Les postes ouverts cette semaine',
                'lead' => 'Fixe ou temporaire, de Bienne au Val-de-Travers. Chaque poste a été visité par le consultant qui le suit, et l’annonce disparaît le jour où il est pourvu.',
                'subject' => 'Un atelier de mécanique vu depuis la porte, un établi au premier plan',
                'links' => [['label' => 'Envoyer un dossier spontané', 'to' => '/contact']],
            ],
            'features' => [
                'eyebrow' => 'Avant de postuler',
                'title' => 'Ce que vous pouvez attendre de nous',
                'items' => [
                    ['title' => 'Rien à payer', 'body' => 'Nos honoraires sont payés par l’employeur. On ne vous demandera ni inscription ni commission, en fixe comme en temporaire.', 'icon' => 'badge-check'],
                    ['title' => 'Un entretien d’abord', 'body' => 'Nous vous recevons une demi-heure avant d’envoyer votre dossier où que ce soit, et jamais sans votre accord.', 'icon' => 'messages-square'],
                    ['title' => 'Payé chaque vendredi', 'body' => 'En mission temporaire, le salaire de la semaine est versé le vendredi, vacances et treizième détaillés sur le décompte.', 'icon' => 'banknote'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Aucun poste pour vous ?',
                'title' => 'La moitié des engagements ne passent jamais par une annonce',
                'body' => [
                    'Un chef d’atelier nous appelle souvent avant d’avoir écrit quoi que ce soit. Si votre dossier est déjà chez nous, vous êtes la première personne à qui nous pensons.',
                    'Passez au bureau avec votre CV et vos certificats, ou écrivez-nous en une ligne : le consultant de votre métier vous reçoit dans la semaine et vous dit franchement ce que le marché offre.',
                ],
            ],
        ],
        '/employers' => [
            'label' => 'Employeurs',
            'hero' => [
                'eyebrow' => 'Employeurs',
                'title' => 'Un recrutement mené par quelqu’un qui connaît votre métier',
                'lead' => 'Placement fixe, renfort temporaire ou recherche de cadres : un prix écrit avant de commencer, trois dossiers au plus, et rien à payer si personne n’est engagé.',
                'subject' => 'Un consultant et une directrice d’atelier devant une ligne d’assemblage',
                'links' => [['label' => 'Confier un poste', 'to' => '/contact'], ['label' => 'Rencontrer les consultants', 'to' => '/consultants']],
            ],
            'features' => [
                'eyebrow' => 'Compris dans chaque mandat',
                'title' => 'Ce que vous n’aurez pas à demander',
                'items' => [
                    ['title' => 'Garantie de trois mois', 'body' => 'Si la personne engagée part pendant le temps d’essai, nous reprenons la recherche sans frais ou remboursons au prorata.', 'subject' => 'Une poignée de main à la porte d’un atelier'],
                    ['title' => 'Frontaliers et permis', 'body' => 'Annonce du poste à l’office régional de placement, permis G, impôt à la source : nous tenons le dossier jusqu’au bout.', 'subject' => 'Un dossier de permis de travail ouvert sur un bureau'],
                    ['title' => 'Une facture lisible', 'body' => 'Le tarif horaire d’une mission comprend salaire, charges sociales, vacances et treizième. Aucun supplément n’apparaît après coup.', 'subject' => 'Un rapport d’heures signé, posé à côté d’une facture'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Notre façon de faire',
                'title' => 'Trois dossiers, et notre avis sur chacun',
                'lead' => 'Un employeur n’a pas le temps de lire trente CV ; c’est pour cela qu’il nous appelle.',
                'body' => [
                    'Avant d’écrire une ligne d’annonce, le consultant passe une heure dans vos murs. Il voit le poste de travail, rencontre le responsable direct et demande ce qui a fait partir la dernière personne : la réponse en dit plus que le cahier des charges.',
                    'Chaque candidat retenu a été reçu au bureau, ses certificats lus et deux références appelées. Vous recevez trois dossiers au plus, chacun avec une page de notre main : ce que la personne sait faire, ce qu’elle demande, et ce qui nous fait hésiter.',
                    'Pour un placement fixe, les honoraires sont dus à la signature du contrat et remboursés au prorata si la personne part pendant les trois premiers mois. Pour une mission temporaire, vous recevez une facture par semaine sur la base des heures signées, et rien d’autre.',
                ],
            ],
        ],
        '/consultants' => [
            'label' => 'Consultants',
            'hero' => [
                'eyebrow' => 'Consultants',
                'title' => 'Six consultants, six métiers d’origine',
                'lead' => 'Chacun recrute pour le secteur où il a travaillé. Vous parlez à la même personne du premier appel au premier jour.',
                'subject' => 'L’équipe autour de la grande table du bureau, un lundi matin',
                'links' => [['label' => 'Demander un entretien', 'to' => '/contact']],
            ],
            'features' => [
                'eyebrow' => 'Nos secteurs',
                'title' => 'Là où nous plaçons le plus',
                'items' => [
                    ['title' => 'Industrie et horlogerie', 'body' => 'Régleurs, polymécaniciens, horlogers, opératrices : 190 placements en 2025, du Locle à Bienne.', 'subject' => 'Un établi d’horloger sous la lampe'],
                    ['title' => 'Santé et social', 'body' => 'Infirmières, assistantes en soins et aides-soignantes pour les EMS, les soins à domicile et les cabinets.', 'subject' => 'Une infirmière dans le couloir d’un EMS'],
                    ['title' => 'Bâtiment et technique', 'body' => 'Électriciens, installateurs sanitaires et monteurs en chauffage, en mission ou en fixe.', 'subject' => 'Un électricien tirant des câbles sur un chantier de rénovation'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Le bureau',
                'title' => 'On ne place bien que dans un métier qu’on a fait',
                'lead' => 'C’est la seule condition d’engagement que Claire Jeanneret n’a jamais assouplie.',
                'body' => [
                    'Sandra Kohler a réglé des tours avant de recruter des régleurs. Yann Robert a tenu des chantiers, Inês Carvalho des gardes de nuit. Quand un chef d’atelier décrit le poste, ils n’ont pas besoin qu’on leur traduise.',
                    'Le lundi matin, les six se retrouvent autour de la table pour passer en revue chaque mandat ouvert et chaque personne reçue la semaine d’avant. Un candidat venu pour l’horlogerie repart parfois avec une piste dans le médical : les secteurs se parlent.',
                    'Chacun suit une quarantaine de mandats fixes par année, pas davantage. C’est ce qui laisse le temps de visiter les entreprises et de rappeler tout le monde, y compris ceux à qui la réponse est non.',
                ],
            ],
        ],
        '/contact' => [
            'hero' => [
                'eyebrow' => 'Contact',
                'title' => 'Parlons de votre poste, ou du prochain',
                'lead' => 'Le bureau est ouvert sans rendez-vous du lundi au vendredi. Pour un entretien à une heure précise, laissez-nous une ligne : nous rappelons dans la journée.',
                'subject' => 'La vitrine du bureau, rue du Seyon, la porte ouverte',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000']],
            ],
            'features' => [
                'eyebrow' => 'Venir au bureau',
                'title' => 'Ce qu’il est utile d’apporter',
                'items' => [
                    ['title' => 'Candidats', 'body' => 'Un CV, vos certificats de travail et, si vous en avez un, votre permis de séjour. Le reste se dit de vive voix.', 'icon' => 'file-text'],
                    ['title' => 'Employeurs', 'body' => 'Le cahier des charges s’il existe, la fourchette de salaire et la date d’entrée souhaitée. Nous venons aussi chez vous.', 'icon' => 'building-2'],
                    ['title' => 'Horaires', 'body' => 'Du lundi au vendredi, 8 h–12 h et 13 h 30–17 h 30. Le téléphone des missions temporaires répond dès 7 h.', 'icon' => 'clock'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Après votre message',
                'title' => 'Ce qui se passe ensuite',
                'lead' => 'Aucune demande ne reste sans réponse plus d’un jour ouvrable.',
                'body' => [
                    'Votre demande arrive chez le consultant du secteur concerné, pas dans une boîte commune. Il vous rappelle dans la journée pour fixer un entretien d’une demi-heure, au bureau ou par téléphone.',
                    'Si vous êtes candidat, rien ne part chez un employeur sans votre accord, poste par poste. Si vous êtes employeur, la première visite et l’offre écrite ne vous engagent à rien.',
                ],
            ],
        ],
    ],
];
