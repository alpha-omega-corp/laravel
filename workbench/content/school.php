<?php

declare(strict_types=1);

/*
 * The demo content of a school: a fictional music school of seven teachers
 * and 240 pupils, in the old infants' school of a street in Yverdon-les-Bains.
 * `site` is what every page shares, `prefabs` is what the site would bind as
 * `kit.<name>` — the rows its owner keeps in the admin, in each component's
 * own prop names — and `pages` holds each page's words, keyed by its path in
 * `.claude/skills/ui-kit/businesses/school.md`.
 *
 * French, as every demo business here is: invented content is not chrome.
 * The dates are those of the spring semester of 2027, which runs from Monday
 * 11 January to Saturday 19 June.
 */
return [
    'site' => [
        'brand' => 'La Portée',
        'blurb' => 'École de musique pour enfants et adultes, à Yverdon-les-Bains depuis 1998.',
        'address' => 'Rue du Collège 9, 1400 Yverdon-les-Bains',
        'phone' => '024 000 00 00',
        'email' => 'secretariat@la-portee.example',
        'status' => 'Inscriptions de printemps jusqu’au 8 janvier',
        'note' => '© École de musique La Portée',
        'action' => ['label' => 'Cours d’essai gratuit', 'to' => '/enrol'],
        'band' => [
            'eyebrow' => 'Essayer',
            'title' => 'La première leçon est offerte',
            'lead' => 'Trente minutes avec le professeur, dans la salle où le cours aurait lieu. Vous décidez ensuite.',
            'links' => [['label' => 'Demander un cours d’essai', 'to' => '/enrol'], ['label' => 'Voir les cours', 'to' => '/courses']],
            'details' => [
                ['label' => 'Secrétariat', 'value' => 'Lundi à vendredi, 9 h–12 h'],
                ['label' => 'Téléphone', 'value' => '024 000 00 00', 'href' => 'tel:+41240000000'],
                ['label' => 'Adresse', 'value' => 'Rue du Collège 9, Yverdon-les-Bains'],
            ],
        ],
    ],

    'prefabs' => [
        'courses' => [
            'title' => 'Les cours du printemps',
            'courses' => [
                ['name' => 'Matinée découverte : quatre instruments à essayer', 'date' => 'Samedi 12 décembre', 'datetime' => '2026-12-12', 'time' => '10:00–12:00', 'level' => 'Dès 6 ans, avec un parent', 'place' => 'Grande salle', 'price' => 'Gratuit', 'seats' => '5 places', 'href' => '#booking', 'label' => 'Réserver'],
                ['name' => 'Éveil musical', 'date' => 'Dès le 11 janvier', 'datetime' => '2027-01-11', 'time' => 'Lundi 16:30–17:15', 'level' => '4 à 6 ans', 'place' => 'Salle du rez', 'price' => 'CHF 390', 'seats' => '3 places', 'href' => '#booking', 'label' => 'S’inscrire'],
                ['name' => 'Guitare en groupe, débutants', 'date' => 'Dès le 12 janvier', 'datetime' => '2027-01-12', 'time' => 'Mardi 18:30–19:30', 'level' => 'Adultes, sans prérequis', 'place' => 'Salle 3', 'price' => 'CHF 540', 'href' => '#booking', 'label' => 'S’inscrire'],
                ['name' => 'Solfège, première année', 'date' => 'Dès le 13 janvier', 'datetime' => '2027-01-13', 'time' => 'Mercredi 14:00–14:50', 'level' => 'Dès 7 ans', 'place' => 'Salle 2', 'price' => 'CHF 320', 'href' => '#booking', 'label' => 'S’inscrire'],
                ['name' => 'Chœur d’adultes', 'date' => 'Dès le 14 janvier', 'datetime' => '2027-01-14', 'time' => 'Jeudi 19:00–20:30', 'level' => 'Tous niveaux, sans audition', 'place' => 'Grande salle', 'price' => 'CHF 280', 'href' => '#booking', 'label' => 'S’inscrire'],
                ['name' => 'Atelier jazz', 'date' => 'Dès le 16 janvier', 'datetime' => '2027-01-16', 'time' => 'Samedi 9:30–11:00', 'level' => 'Trois ans de pratique, tous instruments', 'place' => 'Cave', 'price' => 'CHF 620', 'seats' => 'Dernière place', 'href' => '#booking', 'label' => 'S’inscrire'],
                ['name' => 'Piano, cours individuel de 30 minutes', 'date' => 'Dès le 1er février', 'datetime' => '2027-02-01', 'time' => 'Horaire à convenir', 'level' => 'Enfants et adultes, tous niveaux', 'place' => 'Salles de piano', 'price' => 'CHF 1’140', 'full' => true],
                ['name' => 'Stage des relâches : orchestre junior', 'date' => 'Du 15 au 19 février', 'datetime' => '2027-02-15', 'time' => '9:00–12:00', 'level' => '8 à 14 ans, un an de pratique', 'place' => 'Grande salle', 'price' => 'CHF 240', 'href' => '#booking', 'label' => 'S’inscrire'],
            ],
        ],
        'team' => [
            'title' => 'Les professeurs',
            'members' => [
                ['name' => 'Hélène Rochat', 'role' => 'Directrice · piano', 'bio' => 'Elle a ouvert l’école en 1998 avec deux pianos droits. Elle enseigne encore trois jours par semaine, aux débutants comme aux élèves du certificat.'],
                ['name' => 'Marc Aubert', 'role' => 'Guitare classique et électrique', 'bio' => 'Vingt ans de scène dans les groupes de la région. Avec lui, on joue un morceau entier dès la troisième leçon.'],
                ['name' => 'Sofia Marques', 'role' => 'Violon et alto · orchestre junior', 'bio' => 'Violoniste d’orchestre, elle dirige l’orchestre junior du mercredi et le stage des relâches.'],
                ['name' => 'Julien Favre', 'role' => 'Batterie et percussions', 'bio' => 'Il enseigne à la cave, sur deux batteries qui se font face : l’élève joue, il répond.'],
                ['name' => 'Claire Bonvin', 'role' => 'Chant · chœur d’adultes', 'bio' => 'Mezzo-soprano. Elle dirige le chœur du jeudi, où l’on entre sans audition et sans savoir lire une partition.'],
                ['name' => 'Antoine Dubuis', 'role' => 'Saxophone et clarinette · atelier jazz', 'bio' => 'Il mène l’atelier jazz du samedi et accompagne au piano les élèves qui jouent à l’audition de juin.'],
                ['name' => 'Nadia Keller', 'role' => 'Éveil musical · solfège · flûte à bec', 'bio' => 'Formée à la rythmique, elle donne les cours des 4 à 6 ans et le solfège des premières années.'],
                ['name' => 'Lucie Perret', 'role' => 'Secrétariat', 'bio' => 'C’est elle qui répond au téléphone le matin, organise les cours d’essai et trouve un horaire à chacun.'],
            ],
        ],
        'faq' => [
            'title' => 'Avant de s’inscrire',
            'entries' => [
                ['question' => 'Peut-on essayer avant de s’inscrire ?', 'answer' => 'Oui : la première leçon est un cours d’essai gratuit de trente minutes, avec le professeur qui donnerait le cours. Demandez-le par le formulaire d’inscription ou au 024 000 00 00, du lundi au vendredi de 9 h à 12 h.'],
                ['question' => 'Comment savoir quel niveau choisir ?', 'answer' => 'Chaque cours en groupe dit pour qui il est fait. En cas de doute, le professeur vous écoute dix minutes pendant le cours d’essai et vous dit dans quel groupe vous serez à l’aise. Un cours individuel part de là où vous en êtes.'],
                ['question' => 'Où se garer, et comment venir sans voiture ?', 'answer' => 'Le parking de la place d’Armes est à cinq minutes à pied ; la rue du Collège est en zone bleue. La gare d’Yverdon-les-Bains est à huit minutes à pied. L’entrée se fait par la cour, à gauche du numéro 9.'],
                ['question' => 'Faut-il avoir son instrument ?', 'answer' => 'Pas pour commencer. L’école loue violons, guitares et clarinettes pour CHF 25 par mois, et un piano numérique pour CHF 45. Les batteurs s’exercent à la cave sur réservation, sans supplément.'],
                ['question' => 'Que se passe-t-il en cas d’absence ?', 'answer' => 'Une leçon individuelle annulée la veille avant 18 h est rattrapée dans le semestre. Une leçon manquée sans prévenir est perdue. Quand c’est le professeur qui est absent, la leçon est toujours remplacée.'],
                ['question' => 'Comment se paie l’écolage ?', 'answer' => 'Sur facture au début du semestre, ou en trois mensualités sans frais. Le deuxième inscrit d’une même famille paie 10 % de moins. On arrête à la fin d’un semestre, en l’annonçant un mois avant.'],
                ['question' => 'Y a-t-il un examen ou un certificat ?', 'answer' => 'Rien d’obligatoire. Chaque élève joue à l’audition de juin et reçoit une attestation de niveau signée par son professeur. Ceux qui le souhaitent préparent le certificat de fin d’études non professionnelles, en quatre à six ans.'],
            ],
        ],
        'booking' => [
            'title' => 'Dites-nous qui veut jouer',
            'intro' => 'Un nom, un instrument et un jour qui convient : Lucie, au secrétariat, vous rappelle dans les deux jours ouvrables pour fixer l’heure du cours d’essai ou confirmer l’inscription.',
            'action' => '#booking',
            'services' => [
                'Cours d’essai gratuit',
                'Éveil musical (4 à 6 ans)',
                'Piano',
                'Guitare',
                'Violon ou alto',
                'Batterie et percussions',
                'Chant',
                'Saxophone ou clarinette',
                'Chœur d’adultes',
                'Atelier jazz',
                'Stage des relâches',
            ],
        ],
        'map' => [
            'address' => 'Rue du Collège 9, 1400 Yverdon-les-Bains',
            'title' => 'La Portée, entrée par la cour',
        ],
    ],

    'pages' => [
        '/' => [
            'hero' => [
                'eyebrow' => 'École de musique · Yverdon-les-Bains',
                'title' => 'Apprendre la musique, de 4 à 78 ans',
                'lead' => 'Sept professeurs, onze instruments et des cours en groupe dès 4 ans, dans l’ancienne école de la rue du Collège. Le semestre de printemps commence le 11 janvier.',
                'subject' => 'Une élève de dix ans au piano, sa professeure assise à sa gauche',
                'note' => 'Inscriptions de printemps jusqu’au vendredi 8 janvier',
                'links' => [['label' => 'Demander un cours d’essai', 'to' => '/enrol'], ['label' => 'Voir les cours et les dates', 'to' => '/courses']],
                'facts' => [['value' => '240', 'label' => 'Élèves cette année'], ['value' => '11', 'label' => 'Instruments enseignés'], ['value' => '1998', 'label' => 'Année d’ouverture']],
            ],
            'features' => [
                'eyebrow' => 'L’école',
                'title' => 'Des cours, des professeurs, des réponses',
                'lead' => 'Ce que l’on regarde avant de choisir une école de musique, dans l’ordre où on nous le demande.',
                'items' => [
                    ['title' => 'Huit cours ce printemps', 'body' => 'Éveil musical, guitare en groupe, chœur, atelier jazz et stage des relâches, chacun avec ses dates, son prix et les places qui restent.', 'subject' => 'Six enfants assis en cercle autour de xylophones', 'to' => '/courses', 'label' => 'Les cours et les dates'],
                    ['title' => 'Sept professeurs', 'body' => 'Tous diplômés d’une haute école de musique, tous sur scène le reste de la semaine. Chaque élève garde le sien d’une année à l’autre.', 'subject' => 'Un professeur de guitare accordant l’instrument d’un élève', 'to' => '/teachers', 'label' => 'Rencontrer les professeurs'],
                    ['title' => 'Avant de s’inscrire', 'body' => 'Le niveau, l’instrument à louer, les absences, l’écolage : les réponses du secrétariat aux sept questions que tout le monde pose.', 'subject' => 'Des violons d’étude de quatre tailles suspendus à un râtelier', 'to' => '/questions', 'label' => 'Lire les réponses'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Depuis 1998',
                'title' => 'Une école de quartier, sept salles et une estrade',
                'lead' => 'La Portée occupe l’ancienne école enfantine de la rue du Collège, à huit minutes de la gare.',
                'body' => [
                    'Hélène Rochat a ouvert l’école en 1998 avec deux pianos droits et quatorze élèves. Les salles de classe sont devenues des salles de musique, le préau couvert une grande salle de soixante places, et la cave un local où deux batteries se font face.',
                    'Aujourd’hui, 240 élèves de 4 à 78 ans y passent chaque semaine. Un tiers sont des adultes : certains reprennent l’instrument de leur enfance, d’autres commencent à la retraite.',
                    'L’école est une association sans but lucratif. L’écolage paie les professeurs ; le reste, des pupitres au piano à queue, vient des dons et du concert de juin.',
                ],
            ],
        ],
        '/courses' => [
            'label' => 'Cours',
            'hero' => [
                'eyebrow' => 'Semestre de printemps',
                'title' => 'Les cours et leurs dates',
                'lead' => 'Du 11 janvier au 19 juin. Les prix sont ceux du semestre de dix-huit leçons, partitions comprises ; la matinée découverte et le stage se paient à l’unité.',
                'subject' => 'La grande salle, des pupitres et des chaises en demi-cercle',
                'links' => [['label' => 'S’inscrire ou essayer', 'to' => '/enrol'], ['label' => 'Vos questions', 'to' => '/questions']],
            ],
            'features' => [
                'eyebrow' => 'Compris dans le prix',
                'title' => 'Ce que l’écolage comprend',
                'items' => [
                    ['title' => 'Les partitions', 'body' => 'Les méthodes et les partitions sont fournies, et restent à l’élève à la fin du semestre.', 'subject' => 'Une pile de méthodes de piano annotées au crayon', 'icon' => 'book-open'],
                    ['title' => 'Une salle pour s’exercer', 'body' => 'Les salles libres se réservent au secrétariat, sans supplément, du lundi au samedi.', 'subject' => 'Une salle de piano vide, la fenêtre ouverte sur la cour', 'icon' => 'door-open'],
                    ['title' => 'L’audition de juin', 'body' => 'Chaque élève y joue un morceau de son choix, seul ou avec son groupe, le samedi 19 juin.', 'subject' => 'L’estrade de la grande salle, un pupitre devant le piano à queue', 'icon' => 'music'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Comment se passe un semestre',
                'title' => 'Dix-huit leçons, une audition',
                'body' => [
                    'Le semestre de printemps va du lundi 11 janvier au samedi 19 juin. Il compte dix-huit leçons : l’école suit les vacances scolaires vaudoises et ferme pendant les relâches, à Pâques et à l’Ascension.',
                    'Les cours en groupe ont un nombre de places fixe, de six à douze selon la salle. Un groupe complet reste affiché : écrivez-nous, nous tenons une liste d’attente et ouvrons un second groupe dès six demandes.',
                    'L’audition n’est pas un examen. Elle a lieu dans la grande salle, devant les familles, et se termine par un morceau que tous les élèves jouent ensemble.',
                ],
            ],
        ],
        '/teachers' => [
            'label' => 'Professeurs',
            'hero' => [
                'eyebrow' => 'Les professeurs',
                'title' => 'Sept professeurs, sept musiciens de scène',
                'lead' => 'Ils enseignent l’instrument qu’ils jouent en concert, et gardent leurs élèves d’une année à l’autre.',
                'subject' => 'Les sept professeurs sur l’estrade de la grande salle, leurs instruments à la main',
                'links' => [['label' => 'Demander un cours d’essai', 'to' => '/enrol'], ['label' => 'Voir les cours', 'to' => '/courses']],
            ],
            'story' => [
                'eyebrow' => 'Notre manière d’enseigner',
                'title' => 'Jouer d’abord, lire ensuite',
                'lead' => 'Un élève qui a joué un morceau entier revient la semaine suivante.',
                'body' => [
                    'Nos sept professeurs sont diplômés d’une haute école de musique et jouent tous en concert le reste de la semaine. Ils enseignent ce qu’ils pratiquent : Antoine le jazz, Sofia l’orchestre, Claire le chant choral.',
                    'La première année, on joue avant de lire. Le solfège arrive quand l’élève en a besoin pour le morceau qu’il veut apprendre, et pas avant ; les enfants de moins de dix ans le suivent en groupe, une fois par semaine.',
                    'Chaque élève garde le même professeur d’un semestre à l’autre. Les parents assistent à la dernière leçon avant chaque période de vacances, et le professeur leur dit en deux phrases où en est l’enfant.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Les salles',
                'title' => 'Là où ils enseignent',
                'items' => [
                    ['title' => 'La grande salle', 'body' => 'L’ancien préau : un piano à queue, soixante chaises, l’orchestre junior le mercredi et le chœur le jeudi.', 'subject' => 'La grande salle vide, le piano à queue ouvert sur l’estrade'],
                    ['title' => 'Les salles de piano', 'body' => 'Trois salles au premier étage, deux pianos dans chacune : un pour l’élève, un pour le professeur.', 'subject' => 'Deux pianos droits côte à côte devant une fenêtre'],
                    ['title' => 'La cave', 'body' => 'Voûtée, insonorisée en 2015 : deux batteries, les amplis des guitaristes et l’atelier jazz du samedi.', 'subject' => 'Deux batteries face à face sous une voûte de pierre'],
                ],
            ],
        ],
        '/questions' => [
            'label' => 'Questions',
            'hero' => [
                'eyebrow' => 'Questions fréquentes',
                'title' => 'Les questions que l’on nous pose avant de s’inscrire',
                'lead' => 'Niveau, instrument, absences, écolage : les réponses du secrétariat, telles qu’il les donne au téléphone.',
                'subject' => 'Un parent et sa fille au guichet du secrétariat',
                'links' => [['label' => 'Demander un cours d’essai', 'to' => '/enrol'], ['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000']],
            ],
            'story' => [
                'eyebrow' => 'Le règlement en clair',
                'title' => 'Ce à quoi une inscription engage',
                'lead' => 'Un semestre, jamais plus.',
                'body' => [
                    'On s’inscrit pour un semestre de dix-huit leçons. L’inscription se renouvelle d’elle-même, et s’arrête par un simple e-mail au secrétariat un mois avant la fin du semestre.',
                    'Le cours d’essai n’engage à rien. Si l’instrument ne convient pas après quatre leçons, l’élève peut en changer sans frais dans le même semestre, tant qu’il reste une place chez le professeur.',
                    'Les élèves mineurs sont sous la responsabilité de l’école pendant la leçon seulement. La salle d’attente du rez-de-chaussée ouvre à 13 h 30 pour ceux qui arrivent en avance.',
                ],
            ],
            'features' => [
                'eyebrow' => 'Sur place',
                'title' => 'Ce que vous trouverez à l’école',
                'items' => [
                    ['title' => 'Le secrétariat', 'body' => 'Au rez-de-chaussée, ouvert du lundi au vendredi de 9 h à 12 h. Lucie Perret y répond aussi au téléphone.', 'subject' => 'Le guichet du secrétariat, un panneau d’affichage couvert d’horaires'],
                    ['title' => 'Les instruments à louer', 'body' => 'Des violons de quatre tailles, des guitares et des clarinettes, révisés chaque été par un luthier de la région.', 'subject' => 'Des étuis à violon ouverts sur une table, du plus petit au plus grand'],
                    ['title' => 'La salle d’attente', 'body' => 'Des bancs, une bibliothèque de partitions et une fontaine à eau, pour les parents et les élèves en avance.', 'subject' => 'Un banc sous un porte-manteaux, des étuis posés au sol'],
                ],
            ],
        ],
        '/enrol' => [
            'hero' => [
                'eyebrow' => 'Inscription',
                'title' => 'S’inscrire ou demander un cours d’essai',
                'lead' => 'Le cours d’essai est gratuit et n’engage à rien. Laissez-nous un nom, un instrument et un jour : nous vous rappelons pour fixer l’heure.',
                'subject' => 'La porte de l’école côté cour, un étui à violon posé sur le banc',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Revoir les cours', 'to' => '/courses']],
            ],
            'features' => [
                'eyebrow' => 'Et ensuite',
                'title' => 'Ce qui se passe après votre demande',
                'items' => [
                    ['title' => 'Nous vous rappelons', 'body' => 'Dans les deux jours ouvrables, pour trouver un horaire avec le professeur.', 'subject' => 'Un agenda ouvert à côté du téléphone du secrétariat', 'icon' => 'phone'],
                    ['title' => 'Vous essayez', 'body' => 'Trente minutes de leçon, gratuites, dans la salle où le cours aurait lieu.', 'subject' => 'Une enfant essayant un violon, la professeure réglant sa tenue', 'icon' => 'music'],
                    ['title' => 'Vous décidez', 'body' => 'Si le cours vous convient, l’inscription se signe sur place ; sinon, rien n’est dû.', 'subject' => 'Un formulaire d’inscription posé sur le couvercle d’un piano', 'icon' => 'pen-line'],
                ],
            ],
            'story' => [
                'eyebrow' => 'Les délais',
                'title' => 'Jusqu’à quand s’inscrire',
                'body' => [
                    'Pour le semestre de printemps, les inscriptions sont ouvertes jusqu’au vendredi 8 janvier. Les cours en groupe se remplissent dans l’ordre des demandes ; les places qui restent sont indiquées sur la page des cours.',
                    'Un cours individuel peut aussi commencer en cours de semestre, s’il reste une plage chez le professeur : l’écolage est alors compté au nombre de leçons restantes.',
                ],
            ],
            'band' => [
                'eyebrow' => 'De vive voix',
                'title' => 'Plus simple par téléphone ?',
                'lead' => 'Le secrétariat répond du lundi au vendredi, de 9 h à 12 h. En dehors de ces heures, laissez un message : nous rappelons le lendemain matin.',
                'links' => [['label' => 'Appeler le 024 000 00 00', 'href' => 'tel:+41240000000'], ['label' => 'Lire les questions fréquentes', 'to' => '/questions']],
                'details' => [
                    ['label' => 'Secrétariat', 'value' => 'Lundi à vendredi, 9 h–12 h'],
                    ['label' => 'E-mail', 'value' => 'secretariat@la-portee.example', 'href' => 'mailto:secretariat@la-portee.example'],
                    ['label' => 'Adresse', 'value' => 'Rue du Collège 9, Yverdon-les-Bains'],
                ],
            ],
        ],
    ],
];
