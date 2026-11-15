<?php

declare(strict_types=1);

/*
 * The demo content of a practice: a fictional cabinet of four physiotherapists
 * and an osteopath on the second floor of a house in the old town of Neuchâtel.
 * `site` is what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's own
 * prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/practice.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 */
return [
    'site' => [
        'brand' => 'Cabinet des Tilleuls',
        'blurb' => 'Physiothérapie et ostéopathie au cœur de Neuchâtel, à deux minutes de la place Pury.',
        'address' => 'Rue du Seyon 14, 2000 Neuchâtel',
        'phone' => '032 000 00 00',
        'email' => 'accueil@cabinet-tilleuls.example',
        'status' => 'Ouvert aujourd’hui jusqu’à 19 h',
        'note' => '© Cabinet des Tilleuls Sàrl · Physiothérapeutes reconnus par toutes les caisses-maladie',
        'action' => ['label' => 'Prendre rendez-vous', 'to' => '/appointment'],
        'band' => [
            'eyebrow' => 'Rendez-vous',
            'title' => 'Un dos bloqué, un genou opéré ?',
            'lead' => 'Nous recevons dans la semaine, et sous 48 heures quand la douleur est aiguë. Le secrétariat répond du lundi au vendredi dès 8 h.',
            'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Préparer sa première visite', 'to' => '/first-visit']],
            'details' => [
                ['label' => 'Adresse', 'value' => 'Rue du Seyon 14, 2e étage, Neuchâtel'],
                ['label' => 'Téléphone', 'value' => '032 000 00 00', 'href' => 'tel:+41320000000'],
                ['label' => 'Bus', 'value' => 'Arrêt Place Pury, deux minutes à pied'],
            ],
        ],
    ],

    'prefabs' => [
        'team' => [
            'title' => 'L’équipe du cabinet',
            'members' => [
                [
                    'name' => 'Claire Montandon',
                    'role' => 'Physiothérapeute, fondatrice',
                    'bio' => 'Rééducation après une opération de l’épaule, du genou ou de la hanche. Vingt-deux ans de métier, dont six à l’hôpital Pourtalès.',
                ],
                [
                    'name' => 'Julien Rossel',
                    'role' => 'Physiothérapeute du sport',
                    'bio' => 'Tendinites, entorses et reprise de la course. Il suit les coureurs du lundi au jeudi et reçoit dès 7 h 30 avant le travail.',
                ],
                [
                    'name' => 'Sophie Aellen',
                    'role' => 'Ostéopathe diplômée CDS',
                    'bio' => 'Dos, nuque et maux de tête, chez l’adulte comme chez le nourrisson. Elle reçoit aussi les femmes enceintes jusqu’au terme.',
                ],
                [
                    'name' => 'Nadia Benali',
                    'role' => 'Physiothérapeute',
                    'bio' => 'Rééducation du périnée après un accouchement, fuites urinaires et douleurs du bassin. Les séances ont lieu en cabine fermée.',
                ],
                [
                    'name' => 'Thomas Girard',
                    'role' => 'Physiothérapeute',
                    'bio' => 'Mal de dos qui dure, arthrose et équilibre après 70 ans. Le jeudi, il se déplace à domicile en ville et à Peseux.',
                ],
                [
                    'name' => 'Isabelle Droz',
                    'role' => 'Secrétaire médicale',
                    'bio' => 'C’est elle qui répond au téléphone, fixe l’heure et connaît les assurances. Elle vous dira en deux minutes ce qui sera remboursé.',
                ],
            ],
        ],
        'schedule' => [
            'title' => 'Horaires',
            'note' => 'Le secrétariat répond de 8 h à 12 h et de 13 h 30 à 17 h. Fermé les jours fériés neuchâtelois.',
            'days' => [
                ['day' => 'Lundi', 'hours' => '07:30–19:00'],
                ['day' => 'Mardi', 'hours' => '07:30–19:00'],
                ['day' => 'Mercredi', 'hours' => '07:30–20:30'],
                ['day' => 'Jeudi', 'hours' => '07:30–19:00'],
                ['day' => 'Vendredi', 'hours' => '07:30–17:30'],
                ['day' => 'Samedi', 'hours' => '08:00–12:00'],
                ['day' => 'Dimanche', 'hours' => null],
            ],
        ],
        'faq' => [
            'title' => 'Avant la première séance',
            'entries' => [
                [
                    'question' => 'Faut-il une ordonnance de mon médecin ?',
                    'answer' => 'Pour la physiothérapie, oui : c’est l’ordonnance qui ouvre le remboursement par l’assurance de base, pour neuf séances à la fois. Pour l’ostéopathie, non : vous prenez rendez-vous directement avec Sophie Aellen.',
                ],
                [
                    'question' => 'Mon assurance rembourse-t-elle les séances ?',
                    'answer' => 'La physiothérapie prescrite est prise en charge par l’assurance de base, franchise et quote-part de 10 % déduites ; après un accident, par votre assurance-accidents, sans franchise. L’ostéopathie relève de la complémentaire : demandez à votre caisse la part qu’elle rembourse, ou appelez Isabelle au 032 000 00 00.',
                ],
                [
                    'question' => 'Que dois-je apporter ?',
                    'answer' => 'L’ordonnance, votre carte d’assurance, et les radios, IRM ou rapports d’opération que vous avez. Prévoyez un short et un t-shirt : il y a un vestiaire et des serviettes sur place.',
                ],
                [
                    'question' => 'Où se garer, et y a-t-il un ascenseur ?',
                    'answer' => 'Le parking du Seyon est à 150 mètres, la première demi-heure y est gratuite. Le cabinet est au deuxième étage, avec ascenseur : la porte de l’immeuble s’ouvre sans marche, et un fauteuil roulant passe partout.',
                ],
                [
                    'question' => 'Combien de temps dure une séance ?',
                    'answer' => 'La première dure 45 minutes, bilan compris. Les suivantes durent 30 minutes en physiothérapie et 50 minutes en ostéopathie. Arrivez cinq minutes avant : la séance commence à l’heure.',
                ],
                [
                    'question' => 'Combien coûte une séance d’ostéopathie ?',
                    'answer' => 'CHF 130 la séance de 50 minutes, CHF 110 pour un enfant de moins de 12 ans. Vous payez sur place, par carte ou par TWINT, et recevez la facture à envoyer à votre complémentaire.',
                ],
                [
                    'question' => 'Comment déplacer ou annuler un rendez-vous ?',
                    'answer' => 'Par téléphone au 032 000 00 00 ou par e-mail à accueil@cabinet-tilleuls.example, au plus tard 24 heures avant. Passé ce délai, la séance est facturée CHF 60, que l’assurance ne rembourse pas.',
                ],
                [
                    'question' => 'Dans quel délai puis-je être reçu ?',
                    'answer' => 'Dans la semaine en général. Pour un lumbago ou un torticolis aigu, nous gardons chaque jour deux places libres : téléphonez dès 8 h, vous serez vu sous 48 heures.',
                ],
            ],
        ],
        'booking' => [
            'title' => 'Demander un rendez-vous',
            'intro' => 'Indiquez le soin et le jour qui vous arrange. Isabelle vous rappelle dans la demi-journée pour fixer l’heure : la demande n’est confirmée qu’à ce moment-là.',
            'action' => '#booking',
            'services' => [
                'Physiothérapie, sur ordonnance',
                'Physiothérapie du sport',
                'Ostéopathie',
                'Ostéopathie du nourrisson',
                'Rééducation du périnée',
                'Séance à domicile',
                'Je ne sais pas encore : conseillez-moi',
            ],
        ],
        'map' => [
            'address' => 'Rue du Seyon 14, 2000 Neuchâtel',
            'title' => 'Cabinet des Tilleuls, 2e étage, porte de gauche',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'Physiothérapie et ostéopathie · Neuchâtel',
                'title' => 'Cinq thérapeutes, et le temps de vous écouter',
                'lead' => 'Un dos qui coince, un genou opéré, une reprise de la course : vous êtes reçu dans la semaine, et suivi par la même personne du premier bilan à la dernière séance.',
                'subject' => 'La salle de rééducation le matin, la lumière sur les espaliers',
                'note' => 'Premier rendez-vous possible dès jeudi',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Rencontrer l’équipe', 'to' => '/team']],
                'facts' => [
                    ['value' => '5', 'label' => 'Thérapeutes'],
                    ['value' => '45 min', 'label' => 'La première séance'],
                    ['value' => '2004', 'label' => 'Ouverture du cabinet'],
                ],
            ],
            'features' => [
                'eyebrow' => 'Le cabinet',
                'title' => 'Qui vous soigne, comment, et quand',
                'lead' => 'Trois choses que l’on veut savoir avant de pousser la porte.',
                'items' => [
                    [
                        'title' => 'L’équipe',
                        'body' => 'Quatre physiothérapeutes et une ostéopathe, chacun son domaine : l’épaule opérée, le coureur, le nourrisson, le périnée, le dos qui dure. Vous êtes reçu par celle ou celui qui traite votre cas.',
                        'subject' => 'Claire Montandon guidant un exercice d’épaule à l’élastique',
                        'to' => '/team',
                        'label' => 'Qui traite quoi',
                    ],
                    [
                        'title' => 'La première visite',
                        'body' => 'Quarante-cinq minutes : on vous écoute, on examine, on convient d’un plan. Ordonnance, assurance, tenue : tout ce qu’il faut savoir avant de venir tient sur une page.',
                        'subject' => 'Un premier bilan : la thérapeute assise face à la patiente, le dossier ouvert',
                        'to' => '/first-visit',
                        'label' => 'Préparer sa première visite',
                    ],
                    [
                        'title' => 'Le rendez-vous',
                        'body' => 'Vous indiquez le soin et le jour, Isabelle vous rappelle dans la demi-journée. Pour une douleur aiguë, deux places restent libres chaque jour.',
                        'subject' => 'Le secrétariat : Isabelle au téléphone devant l’agenda de la semaine',
                        'to' => '/appointment',
                        'label' => 'Demander un rendez-vous',
                    ],
                ],
            ],
        ],
        '/team' => [
            'label' => 'L’équipe',
            'hero' => [
                'eyebrow' => 'L’équipe',
                'title' => 'Celles et ceux qui vous soignent',
                'lead' => 'Quatre physiothérapeutes, une ostéopathe et Isabelle au secrétariat. Dites-nous ce qui vous amène : nous vous dirons qui vous recevra, et vous garderez la même personne.',
                'subject' => 'L’équipe au complet dans la salle de rééducation, en tenue de travail',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'La première visite', 'to' => '/first-visit']],
            ],
            'story' => [
                'eyebrow' => 'Depuis 2004',
                'title' => 'Un cabinet où l’on garde son thérapeute',
                'lead' => 'Nous sommes restés six pour une raison simple : au-delà, plus personne ne connaît les patients des autres.',
                'body' => [
                    'Claire Montandon a ouvert le cabinet en 2004, seule, dans deux pièces au-dessus de la librairie de la rue du Seyon. Elle sortait de six ans en orthopédie à l’hôpital Pourtalès et voulait suivre ses patients plus loin que la sortie du service : jusqu’au jour où l’épaule remonte au-dessus de la tête.',
                    'Julien Rossel l’a rejointe en 2011 avec les coureurs, Sophie Aellen en 2015 avec l’ostéopathie, puis Nadia Benali et Thomas Girard. Chacun a pris ce que les autres ne faisaient pas, si bien que le cabinet n’adresse presque plus personne ailleurs : quand un cas sort du domaine de l’un, il traverse le couloir.',
                    'Le mardi à midi, la porte reste fermée une heure. Les cinq thérapeutes passent en revue les dossiers qui n’avancent pas, et il arrive qu’un patient change de mains d’un commun accord. C’est la seule réunion de la semaine, et personne ne la manque.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les lieux',
                'title' => 'Trois pièces où l’on travaille',
                'items' => [
                    [
                        'title' => 'La salle de rééducation',
                        'body' => 'Soixante mètres carrés sur la rue : espaliers, vélos, tapis de course et une cage de poulies. On y réapprend à monter un escalier.',
                        'subject' => 'La salle de rééducation, les espaliers le long du mur et deux vélos face à la fenêtre',
                    ],
                    [
                        'title' => 'Les cabines',
                        'body' => 'Quatre cabines fermées par une porte, pas par un rideau. Ce qui s’y dit et ce qui s’y fait n’en sort pas.',
                        'subject' => 'Une cabine de soin : la table, une lampe, la porte fermée',
                    ],
                    [
                        'title' => 'La salle d’attente',
                        'body' => 'Côté cour, sous les tilleuls qui ont donné leur nom au cabinet. De l’eau, des journaux du jour, et rarement plus de cinq minutes.',
                        'subject' => 'La salle d’attente côté cour, les tilleuls derrière la fenêtre',
                    ],
                ],
            ],
        ],
        '/first-visit' => [
            'label' => 'Première visite',
            'hero' => [
                'eyebrow' => 'Première visite',
                'title' => 'Ce qui se passe la première fois',
                'lead' => 'Quarante-cinq minutes pour comprendre ce qui vous amène. Voici ce qu’il faut apporter, ce que l’assurance rembourse et comment déplacer un rendez-vous.',
                'subject' => 'Une cabine prête pour un bilan : la table, une serviette pliée, la fenêtre sur les tilleuls',
                'links' => [['label' => 'Prendre rendez-vous', 'to' => '/appointment'], ['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000']],
            ],
            'features' => [
                'eyebrow' => 'Le déroulement',
                'title' => 'Trois temps, quarante-cinq minutes',
                'items' => [
                    [
                        'title' => 'On vous écoute',
                        'body' => 'Un quart d’heure assis, sans blouse entre nous : depuis quand, à quel moment de la journée, ce que vous ne pouvez plus faire et ce que vous voulez refaire.',
                        'subject' => 'La thérapeute et le patient assis face à face, un carnet sur les genoux',
                    ],
                    [
                        'title' => 'On examine',
                        'body' => 'Vingt minutes de tests : la mobilité, la force, ce qui déclenche la douleur. Rien n’est forcé, et vous pouvez dire stop à tout moment.',
                        'subject' => 'Un test de mobilité de l’épaule, le bras du patient levé contre le mur',
                    ],
                    [
                        'title' => 'On convient d’un plan',
                        'body' => 'Vous repartez avec un nombre de séances, un but daté et deux exercices à faire à la maison, écrits et montrés.',
                        'subject' => 'Une feuille d’exercices annotée à la main, posée sur la table de soin',
                    ],
                ],
            ],
            'story' => [
                'eyebrow' => 'Avant de venir',
                'title' => 'Une première séance sans surprise',
                'lead' => 'La plupart des gens arrivent avec une ordonnance et une seule question : est-ce que ça va passer.',
                'body' => [
                    'Vous sonnez au deuxième étage, Isabelle prend votre ordonnance et votre carte d’assurance, et vous attendez rarement plus de cinq minutes. Votre thérapeute vient vous chercher par votre nom : c’est la personne qui vous suivra jusqu’à la fin du traitement, pas une autre la semaine suivante.',
                    'Le premier quart d’heure se passe assis. On ne vous demande pas de vous déshabiller avant d’avoir compris ce qui vous amène ; pour l’examen, un short et un t-shirt suffisent presque toujours. Si un geste fait mal, on s’arrête : le bilan sert à trouver la limite, pas à la dépasser.',
                    'À la fin, vous savez combien de séances sont prévues, ce qu’on en attend et à quelle date on fera le point. Si votre cas relève d’un médecin plutôt que de nous, une douleur qui réveille la nuit ou une jambe qui lâche, nous vous le disons le jour même et nous écrivons à votre médecin.',
                ],
            ],
        ],
        '/appointment' => [
            'label' => 'Rendez-vous',
            'hero' => [
                'eyebrow' => 'Rendez-vous',
                'title' => 'Un rendez-vous dans la semaine',
                'lead' => 'Indiquez le soin et le jour qui vous arrange : le secrétariat vous rappelle dans la demi-journée pour fixer l’heure. Pour aujourd’hui ou demain, téléphonez.',
                'subject' => 'La porte du cabinet au deuxième étage, la plaque de laiton à côté de la sonnette',
                'links' => [['label' => 'Appeler le 032 000 00 00', 'href' => 'tel:+41320000000'], ['label' => 'Préparer sa première visite', 'to' => '/first-visit']],
            ],
            'features' => [
                'eyebrow' => 'Jusqu’à la porte',
                'title' => 'En bus, en voiture, sans marche',
                'items' => [
                    [
                        'title' => 'En bus',
                        'body' => 'Toutes les lignes de la ville s’arrêtent à la place Pury. De là, deux minutes à pied en remontant la rue du Seyon.',
                        'icon' => 'bus',
                    ],
                    [
                        'title' => 'En voiture',
                        'body' => 'Parking du Seyon, à 150 mètres, première demi-heure gratuite. La rue elle-même est piétonne : on dépose un patient devant le numéro 12.',
                        'icon' => 'square-parking',
                    ],
                    [
                        'title' => 'Sans marche',
                        'body' => 'Entrée de plain-pied, ascenseur jusqu’au deuxième étage, porte de gauche. Les cabines et les toilettes sont accessibles en fauteuil.',
                        'icon' => 'accessibility',
                    ],
                ],
            ],
            'story' => [
                'eyebrow' => 'Cas particuliers',
                'title' => 'En urgence, à domicile, pour un enfant',
                'body' => [
                    'Pour un lumbago ou un torticolis aigu, ne remplissez pas le formulaire : appelez le 032 000 00 00 dès 8 h. Nous gardons deux places libres par jour pour ces cas-là, et vous serez vu sous 48 heures, sans ordonnance s’il le faut pour la première séance.',
                    'Thomas Girard se déplace à domicile le jeudi, en ville et à Peseux, pour les personnes qui ne peuvent pas sortir de chez elles. Il faut que l’ordonnance le précise : demandez à votre médecin d’y écrire « à domicile ».',
                    'Sophie Aellen reçoit les nourrissons le mercredi matin et le samedi. Venez avec le carnet de santé, et prévoyez un biberon ou une tétée : un bébé qui a faim ne se laisse pas examiner.',
                ],
            ],
        ],
    ],
];
