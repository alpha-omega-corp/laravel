<?php

declare(strict_types=1);

return [
    'title' => 'Framework',
    'intro' => 'Douze projets indépendants, chacun le site entier d’une petite entreprise ou d’un back-office, parcouru depuis sa propre navigation. Aucun n’est bâti comme un autre : chaque projet déclare ses propres sections, si bien que le restaurant a une carte et des horaires, la ferme une boutique, des événements et des jours de marché, et le salon un catalogue de ce qu’il a coupé. Chaque section porte la mise en page qui convient au travail qu’elle est — un comptoir est une console, une page de brochure ne l’est pas — la palette et le degré suivant la mise en page. Les trois restent à la main du lecteur depuis les rails, et un choix est ce qui les inscrit dans l’URL. Le clair et le sombre restent au sélecteur de la barre de navigation.',

    'fitting' => 'Adaptée',
    'view' => 'Vue',
    'projects' => 'Projets',
    'palettes' => 'Palettes',
    'layouts' => 'Mises en page',
    'variations' => 'Degrés',

    'meta' => [
        'layout' => 'Mise en page',
    ],

    'prompt' => [
        'open' => 'Prompt pour deployer',
        'title' => 'Ce design pour deployer',
        'intro' => 'Chaque champ du formulaire de l\'Hallucinator, tel que cette vue dessine le design : le métier, le style, la mise en page de chaque page. Copiez-le, puis collez-le dans « From the framework » de l\'Hallucinator.',
        'copy' => 'Copier',
        'copied' => 'Copié',
        'close' => 'Fermer',
        'tab' => 'Prompt',
        'tab_intro' => 'Le prompt qui recrée ce site dans deployer : chaque champ du formulaire de l\'Hallucinator, tel que cette vue dessine le design. Copiez-le, puis collez-le dans « From the framework » de l\'Hallucinator.',
    ],
    // Claude's shots: the pictures deployer keeps of this project.
    'shots' => [
        'title' => 'Claude\'s shots',
        'intro' => 'Les images que Claude a prises de ce travail et rangées dans deployer, comme sa console les montre sous le même nom : chacune avec la note qui l’accompagne et la page qu’elle montre, les plus récentes d’abord.',
        'empty' => 'Aucune image pour l’instant. Une image prise ou enregistrée pour ce projet avec les outils de deployer (take_progress_picture, save_progress_picture) apparaît ici dès qu’elle est rangée.',
        'count' => 'images',
        'open' => 'Ouvrir la page montrée',
        'example' => 'Un exemple suivi',
    ],
    // The record of the run that made the business views: what was asked, decided and seen.
    'record' => [
        'title' => 'Journal du travail',
        'intro' => 'Comment les vues par type d’entreprise de cette page ont vu le jour : ce qui a été demandé, ce qui a été décidé à chaque étape et pourquoi, les images envoyées pendant le travail, et ce que chaque rédacteur a rapporté en terminant.',
        'asked' => 'Ce qui a été demandé',
        'steps' => 'Le travail, étape par étape',
        'see' => 'À voir aujourd’hui',
        'picture' => 'Ouvrir l’image',
        'writers' => 'Ce que chaque rédacteur a rapporté',
        'writer' => 'Les notes de son rédacteur',
        'writers_intro' => 'Un agent a écrit chaque entreprise : son contenu de démonstration et ses designs, en une passe et une vérification. Voici ses notes sur le kit, telles qu’il les a laissées. Certaines ont été corrigées ensuite ; l’étape ci-dessus dit lesquelles.',
        'designs' => 'designs',
        'notes' => 'notes',
        'directions' => 'Les directions',
        'specs' => 'Écrites à partir de leur CSS',
        'dressed' => 'Les quatre premières, habillées pour les nouveaux préfabriqués',
        'open' => 'Connu et non corrigé',
        'owed' => 'Reste dû',
        'tab' => 'Dans l’onglet',
        'sheet' => 'Sa planche-contact',
        'rules' => 'lignes de règles',
    ],

    // The business views: every kind of business the skill describes, drawn from its own files.
    'businesses' => [
        'title' => 'Types d’entreprise',
        'intro' => 'Chaque type d’entreprise que le kit décrit, dessiné à partir des fichiers du skill comme un build les lit : ses pages et ses préfabriqués depuis son fichier, ses allures depuis les directions qu’il cite, ses couleurs depuis les palettes qu’elles acceptent, et un design travaillé qui en fixe une de chaque, avec sa raison. Un design fixe chaque axe ; modifiez-en un et l’adresse le dit.',
        'business' => 'Entreprise',
        'design' => 'Design',
        'page' => 'Page',
        'home' => 'Accueil',
        'direction' => 'Direction',
        'layout' => 'Mise en page',
        'palette' => 'Palette',
        'scheme' => 'Clair ou sombre',
        'system' => 'Système',
        'light' => 'Clair',
        'dark' => 'Sombre',
        'inputs' => 'Champs',
        'inputs_default' => 'Par défaut',
        'inputs_floating' => 'Flottants',
        'inputs_icon' => 'Avec icône',
        'designs' => 'designs',
        'pages' => 'pages',
        'views' => 'vues',
        'kinds' => 'types d’entreprise',
        'in_all' => 'en tout',
        'sheet' => 'Planche-contact',
        'sheet_intro' => 'Chaque page de chaque design d’une entreprise, puis sa page d’accueil dans chaque palette que ses directions recommandent : la page elle-même, en petit, chacune un lien vers la vue et ses axes.',
        'open' => 'La page seule',
        'why' => 'Pourquoi :',
        'pulls' => 'Ce qu’un build en tire',
        'reasons' => 'Les raisons, dans les mots du skill',
        'why_direction' => 'Pourquoi cette direction, pour cette entreprise',
        'why_prefabs' => 'Pourquoi cette page porte chaque préfabriqué',
        'how_drawn' => 'Comment la direction dessine ce qui est sur la page',
        'behaviour' => 'Ce que fait chaque composant une fois placé',
        'costs' => 'Ce que coûte la palette',
        'regions' => 'Ce que contient chaque région',
        'arrangements' => 'Arrangements',
        'own' => 'Celui de la direction',
        'files' => 'Lu dans le skill',
        'files_tab' => 'Fichiers',
        'regions_tab' => 'Régions',
        'empty' => 'rien',
        'by_design' => 'Chaque page de chaque design',
        'by_palette' => 'La page d’accueil dans chaque palette recommandée',
        'by_palette_intro' => 'Ce qu’un tirage peut dessiner avant qu’un design ne le fixe : chaque direction que l’entreprise cite, dans chaque palette que cette direction juge la meilleure ou bonne.',
        'all' => 'Tous',
        'pick' => 'Chaque design de ce métier, dessiné sur la page choisie à côté. Choisissez-en un pour l’inspecter : chaque page, chaque axe, et ce qu’un build en tire.',
        'variants' => 'Toutes les variantes',
    ],

    'project' => [
        'restaurant' => [
            'label' => 'Restaurant',
            'summary' => 'Vingt-huit couverts au bord du lac : page d’accueil, carte, horaires et formulaire de réservation.',
        ],
        'haircut' => [
            'label' => 'Salon de coiffure',
            'summary' => 'Quatre fauteuils et un agenda : le salon, les prestations, un catalogue de ce qui est sorti d’ici, l’équipe et un écran de rendez-vous.',
        ],
        'farm' => [
            'label' => 'Ferme',
            'summary' => 'Des paniers de légumes et deux marchés par semaine : la boutique, ce qui se passe à la ferme, les jours de marché et un bon de commande.',
        ],
        'butcher' => [
            'label' => 'Boucherie',
            'summary' => 'La bête entière, travaillée sur place : l’étal, ce qui a été travaillé cette semaine, les horaires et un bon de commande.',
        ],
        'cabinet' => [
            'label' => 'Cabinet d’avocats',
            'summary' => 'Six avocats et quatre domaines : les domaines et leurs honoraires, l’équipe, un écran de rendez-vous et un formulaire de contact.',
        ],
        'retail' => [
            'label' => 'Commerce',
            'summary' => 'Une épicerie fine de quartier tenue comme un back-office : le stock, le catalogue, les heures d’ouverture et les comptes clients.',
        ],
        'health' => [
            'label' => 'Santé',
            'summary' => 'Un cabinet de physiothérapie : l’agenda du jour, les tarifs, les quatre thérapeutes, les rendez-vous et la facturation.',
        ],
        'education' => [
            'label' => 'Formation',
            'summary' => 'Une école de langues : la session, douze cours et les places qui restent, les horaires, les enseignants et l’inscription.',
        ],
        'logistics' => [
            'label' => 'Logistique',
            'summary' => 'Un transporteur régional : les tournées du jour, les prestations, les deux départs et la demande d’enlèvement.',
        ],
        'hotel' => [
            'label' => 'Hôtellerie',
            'summary' => 'Une pension de montagne : la maison, les chambres, les tarifs de saison, les sorties depuis la porte, la réservation et le tableau des chambres du soir.',
        ],
        'garage' => [
            'label' => 'Garage',
            'summary' => 'Un garage automobile : l’atelier, ses prix fixes, les occasions, le tableau de ce qui est sur chaque pont et un écran de rendez-vous.',
        ],
        'theatre' => [
            'label' => 'Théâtre',
            'summary' => 'Un petit théâtre : la saison, la billetterie, les abonnements, les artistes, le décompte de la caisse et les réservations de groupe.',
        ],
    ],

    'variation' => [
        'plain' => [
            'label' => 'Sobre',
            'summary' => 'Aucune image, aucun ornement, un rythme serré : ce à quoi sert la section, et rien autour.',
        ],
        'standard' => [
            'label' => 'Standard',
            'summary' => 'La seule image dont la section parle vraiment, les pastilles qui disent quelque chose, un rythme régulier.',
        ],
        'rich' => [
            'label' => 'Riche',
            'summary' => 'Toutes les images que la section peut porter, tous les ornements, et de l’air entre eux.',
        ],
    ],
];
