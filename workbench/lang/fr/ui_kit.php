<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'Kit UI',
        'intro' => 'Tous les éléments du kit partagé, retravaillés de la palette par défaut de Tailwind vers les jetons de cette application. Un élément par groupe du kit, non par fichier : les six fichiers de boutons sont un seul composant à variante. Changez la palette ou le clair/sombre dans la barre de navigation et toute la page suit.',
    ],

    'group' => [
        'elements' => 'Éléments',
        'feedback' => 'Retours',
        'forms' => 'Formulaires',
        'data_display' => 'Données',
        'lists' => 'Listes',
        'navigation' => 'Navigation',
        'overlays' => 'Surcouches',
        'headings' => 'Titres',
        'layout' => 'Mise en page',
    ],

    'element' => [
        'avatar' => [
            'label' => 'Avatar',
            'summary' => 'Une personne en cinq tailles, ronde ou carrée, avec une pastille d’état facultative. À défaut d’image, une initiale.',
        ],
        'badge' => [
            'label' => 'Étiquette',
            'summary' => 'Un petit libellé qui porte un sens plutôt qu’une teinte : neutre, accent, surlignage ou contour.',
        ],
        'button' => [
            'label' => 'Bouton',
            'summary' => 'Quatre fonds, cinq tailles, avec ou sans icône. Ombre, angle et appui appartiennent à la palette.',
        ],
        'button_group' => [
            'label' => 'Groupe de boutons',
            'summary' => 'Des boutons fondus en une barre. La palette décide de l’angle, donc seuls les deux bouts le portent.',
        ],
        'dropdown' => [
            'label' => 'Menu déroulant',
            'summary' => 'Un menu sur un bouton, ouvert par le navigateur via Tailwind Plus Elements et non par un script à nous.',
        ],
        'alert' => [
            'label' => 'Alerte',
            'summary' => 'Un message sur place, dans l’un de quatre tons, avec des actions en dessous si besoin.',
        ],
        'empty_state' => [
            'label' => 'État vide',
            'summary' => 'Ce que dit une liste qui n’a encore rien. En pointillés quand on pourrait y déposer quelque chose.',
        ],
        'action_panel' => [
            'label' => 'Panneau d’action',
            'summary' => 'Un panneau dont toute la raison d’être est la commande à son extrémité.',
        ],
        'checkbox' => [
            'label' => 'Case à cocher',
            'summary' => 'La case native, peinte par accent-color, avec une étiquette et une aide facultative.',
        ],
        'combobox' => [
            'label' => 'Liste combinée',
            'summary' => 'Un champ texte avec datalist : on tape pour filtrer, ou on ouvre la liste. Sans script, et dégradé en champ simple.',
        ],
        'form_layout' => [
            'label' => 'Mise en page de formulaire',
            'summary' => 'Une ou deux colonnes de champs dans un panneau, les actions sur un filet en pied.',
        ],
        'input' => [
            'label' => 'Champ',
            'summary' => 'Un champ étiqueté, avec aide, erreur et complément en tête ou en queue.',
        ],
        'radio_group' => [
            'label' => 'Groupe de boutons radio',
            'summary' => 'Un choix parmi plusieurs, en liste de pastilles ou en panneau par option.',
        ],
        'select' => [
            'label' => 'Liste déroulante',
            'summary' => 'Un select natif. Le listbox du kit demande un script et un popover pour ce que le navigateur fait déjà.',
        ],
        'sign_in' => [
            'label' => 'Formulaire de connexion',
            'summary' => 'La colonne étroite de champs, dans un panneau ou à même la page.',
        ],
        'textarea' => [
            'label' => 'Zone de texte',
            'summary' => 'Le même appareillage que le champ, avec la place d’un paragraphe.',
        ],
        'toggle' => [
            'label' => 'Interrupteur',
            'summary' => 'Une case qui dessine un rail : il part avec le formulaire et garde le clavier que le navigateur lui donne.',
        ],
        'calendar' => [
            'label' => 'Calendrier',
            'summary' => 'Une grille de mois, calculée et non recopiée, avec un jour choisi et des jours marqués.',
        ],
        'description_list' => [
            'label' => 'Liste de définitions',
            'summary' => 'Des termes et des valeurs en lignes, rayées si on veut.',
        ],
        'stat' => [
            'label' => 'Chiffre',
            'summary' => 'Un chiffre, son libellé et sa variation. Le chiffre prend le pas d’affichage de la palette.',
        ],
        'feed' => [
            'label' => 'Fil d’activité',
            'summary' => 'Une chronologie, le filet passant derrière les marqueurs plutôt qu’entre les lignes.',
        ],
        'grid_list' => [
            'label' => 'Liste en grille',
            'summary' => 'Des cartes sur deux, trois ou quatre colonnes, chacune avec un avatar.',
        ],
        'stacked_list' => [
            'label' => 'Liste empilée',
            'summary' => 'Des lignes dans un panneau, ou un panneau par ligne.',
        ],
        'table' => [
            'label' => 'Tableau',
            'summary' => 'Colonnes et lignes avec bandeau d’en‑tête, titre et action, défilant de côté s’il le faut.',
        ],
        'breadcrumb' => [
            'label' => 'Fil d’Ariane',
            'summary' => 'Le chemin de retour, la dernière entrée étant la page elle‑même.',
        ],
        'command_palette' => [
            'label' => 'Palette de commandes',
            'summary' => 'Le champ de recherche et ses résultats, montrés ouverts — un dialogue fermé ne montre rien.',
        ],
        'navbar' => [
            'label' => 'Barre de navigation',
            'summary' => 'La barre seule, pour une page qui n’est pas la coque de l’application.',
        ],
        'pagination' => [
            'label' => 'Pagination',
            'summary' => 'Précédent et suivant, avec les numéros entre eux ou un simple compte.',
        ],
        'progress' => [
            'label' => 'Progression',
            'summary' => 'Un rail rempli, ou la même valeur en une rangée d’étapes.',
        ],
        'side_nav' => [
            'label' => 'Navigation latérale',
            'summary' => 'La colonne à gauche de cette page. Deux fonds, icônes et compteurs facultatifs, et elle trouve seule la ligne courante.',
        ],
        'tabs' => [
            'label' => 'Onglets',
            'summary' => 'Une rangée de sections, soulignées ou en pastilles.',
        ],
        'vertical_nav' => [
            'label' => 'Navigation verticale',
            'summary' => 'La navigation latérale sans le panneau, pour une colonne qui a déjà une surface.',
        ],
        'drawer' => [
            'label' => 'Tiroir',
            'summary' => 'Le panneau du dialogue épinglé à un bord, sur toute la hauteur. Dialogue natif, montré ici sur place.',
        ],
        'modal' => [
            'label' => 'Dialogue modal',
            'summary' => 'Un dialogue natif : couche supérieure, voile, touche Échap et piège de focus sont au navigateur.',
        ],
        'notification' => [
            'label' => 'Notification',
            'summary' => 'Un panneau soulevé, pour le coin où une région live les empile.',
        ],
        'card_heading' => [
            'label' => 'En‑tête de carte',
            'summary' => 'Le bandeau d’un panneau, avec le filet qui le sépare du corps.',
        ],
        'page_heading' => [
            'label' => 'En‑tête de page',
            'summary' => 'Le titre d’une page, son fil d’Ariane, ses métadonnées et ses actions.',
        ],
        'section_heading' => [
            'label' => 'En‑tête de section',
            'summary' => 'Un filet sous un titre, avec une action ou une rangée d’onglets dessus.',
        ],
    ],

    'demo' => [
        'live' => 'En direct',
        'small' => 'Petite',
        'save' => 'Enregistrer',
        'cancel' => 'Annuler',
        'duplicate' => 'Dupliquer',
        'discard' => 'Abandonner',
        'disabled' => 'Désactivé',
        'add' => 'Ajouter',
        'edit' => 'Modifier',
        'archive' => 'Archiver',
        'options' => 'Options',
        'sort' => 'Trier',
        'newest' => 'Plus récents',
        'oldest' => 'Plus anciens',
        'day' => 'Jour',
        'week' => 'Semaine',
        'month' => 'Mois',
        'review' => 'Examiner',
        'dismiss' => 'Ignorer',
        'confirm' => 'Confirmer',
        'delete' => 'Supprimer',
        'publish' => 'Publier',
        'alert' => [
            'info' => 'Un certificat se renouvelle dans trois jours',
            'success' => 'Le site est en ligne',
            'warning' => 'Deux sites sont sur un vieux PHP',
            'danger' => 'Le dernier déploiement a échoué',
            'body' => 'Rien ne vous est demandé pour l’instant ; voici ce que dirait le panneau.',
        ],
        'empty' => [
            'title' => 'Aucun client pour l’instant',
            'body' => 'Le premier que vous ajoutez apparaîtra ici avec ses sites.',
        ],
        'panel' => [
            'title' => 'Transférer ce projet',
            'body' => 'Il passera à un autre compte avec ses sites et ses certificats.',
            'action' => 'Transférer',
        ],
        'check' => [
            'notify' => 'M’écrire quand un déploiement échoue',
            'digest' => 'Envoyer un résumé hebdomadaire',
            'hint' => 'Seulement pour les projets qui vous appartiennent.',
        ],
        'combo' => [
            'label' => 'Pays',
            'placeholder' => 'Commencez à taper…',
        ],
        'form' => [
            'title' => 'Profil',
            'description' => 'Ce que le reste de l’équipe voit de vous.',
            'first' => 'Prénom',
            'last' => 'Nom',
            'email' => 'Courriel',
            'about' => 'À propos',
        ],
        'input' => [
            'label' => 'Nom du client',
            'placeholder' => 'Atelier Verd',
            'site' => 'Site',
            'price' => 'Mensuel',
            'hint' => 'Facturé le premier du mois.',
            'error' => 'Ce nom est déjà pris.',
        ],
        'radio' => [
            'legend' => 'Forfait',
            'solo' => 'Solo',
            'team' => 'Équipe',
            'solo_hint' => 'Une personne, cinq sites.',
            'team_hint' => 'Jusqu’à dix personnes, sites illimités.',
        ],
        'select' => [
            'label' => 'Langue',
            'hint' => 'Utilisée pour les factures et les courriels.',
        ],
        'signin' => [
            'title' => 'Se connecter',
            'password' => 'Mot de passe',
            'remember' => 'Rester connecté',
        ],
        'textarea' => [
            'label' => 'Note',
            'hint' => 'Visible par toute personne ayant accès au client.',
        ],
        'toggle' => [
            'public' => 'Site public',
            'beta' => 'Rejoindre le canal bêta',
            'hint' => 'Toute personne ayant le lien peut y accéder.',
        ],
        'dl' => [
            'title' => 'Compte',
            'description' => 'Les informations au dossier pour ce client.',
            'name' => 'Nom',
            'role' => 'Rôle',
            'role_value' => 'Propriétaire',
            'email' => 'Courriel',
        ],
        'stat' => [
            'clients' => 'Clients',
            'sites' => 'Sites',
            'uptime' => 'Disponibilité',
        ],
        'feed' => [
            'deployed' => 'Camille a déployé atelier-verd.ch',
            'reviewed' => 'Dominique a examiné la facture',
            'opened' => 'Un renouvellement de certificat a été ouvert',
            'minutes' => 'il y a 20 minutes',
            'hours' => 'il y a 3 heures',
            'yesterday' => 'Hier',
        ],
        'grid' => [
            'design' => 'Design',
            'support' => 'Support',
        ],
        'list' => [
            'monthly' => 'par mois',
        ],
        'table' => [
            'title' => 'Factures',
            'client' => 'Client',
            'site' => 'Site',
            'plan' => 'Forfait',
            'amount' => 'Montant',
            'export' => 'Exporter',
        ],
        'crumb' => [
            'home' => 'Accueil',
            'clients' => 'Clients',
        ],
        'palette' => [
            'placeholder' => 'Chercher ou lancer une commande…',
            'new_client' => 'Nouveau client',
            'new_site' => 'Nouveau site',
            'settings' => 'Paramètres',
        ],
        'progress' => [
            'migration' => 'Migration',
            'setup' => 'Installation',
        ],
        'nav' => [
            'workspace' => 'Espace de travail',
        ],
        'tab' => [
            'overview' => 'Vue d’ensemble',
            'billing' => 'Facturation',
        ],
        'drawer' => [
            'title' => 'Détails du site',
            'body' => 'Tout sur le site, sans quitter la liste derrière lui.',
        ],
        'modal' => [
            'title' => 'Publier ce site ?',
            'body' => 'Il sera joignable à son domaine d’ici une minute.',
            'danger' => 'Supprimer ce client ?',
            'danger_body' => 'Ses sites et ses certificats partent avec lui. C’est irréversible.',
        ],
        'notify' => [
            'saved' => 'Enregistré',
            'expiring' => 'Certificat qui expire',
            'body' => 'Rien d’autre ne vous est demandé.',
        ],
        'heading' => [
            'card' => 'Sites',
            'card_description' => 'Trois sites sur ce compte',
            'card_body' => 'Le corps du panneau se place sous l’en‑tête.',
            'page' => 'Atelier Verd',
            'updated' => 'Mis à jour il y a 2 jours',
            'section' => 'Équipe',
            'section_description' => 'Qui peut atteindre ce client et ce qu’il a le droit de faire.',
        ],
    ],

    'layouts' => [
        'title' => 'Mises en page',
        'intro' => 'Tous les composants de mise en page du kit — cartes, conteneurs, séparateurs, listes et objets média — retravaillés de la palette par défaut de Tailwind vers les jetons de cette application. Changez de thème dans la barre de navigation et toute la page suit.',

        'cards' => [
            'title' => 'Cartes',
            'description' => 'Une surface avec un corps, et éventuellement un en‑tête, un pied ou les deux. L’angle, le bord et l’élévation appartiennent au thème : le balisage ne porte aucun arrondi.',
        ],

        'containers' => [
            'title' => 'Conteneurs',
            'description' => 'Le cadre horizontal d’une page : jusqu’où le contenu peut s’étendre et quelle marge il garde à chaque palier.',
        ],

        'dividers' => [
            'title' => 'Séparateurs',
            'description' => 'Un filet en travers de la page, interrompu par une étiquette, un titre, une icône ou une commande.',
        ],

        'lists' => [
            'title' => 'Conteneurs de liste',
            'description' => 'Les mêmes trois lignes, tenues de sept manières : nues avec des filets, dans une seule carte, ou en cartes séparées.',
        ],

        'media' => [
            'title' => 'Objets média',
            'description' => 'Une figure à côté d’un texte, alignée en haut, au centre ou en bas, empilée sur mobile, ou imbriquée d’un niveau.',
        ],

        'shells' => [
            'title' => 'Coques de page',
            'description' => 'Pas des variantes d’une même boîte : trois familles qui découpent la page autrement. La coque empilée met la navigation au‑dessus du contenu, la coque à barre latérale la met à côté, et la coque multicolonne ajoute une seconde colonne de contenu qui n’est pas de la navigation. Chacune est schématique ici, comme dans le kit : ce qui est réel, c’est la colonne qui prend la largeur restante.',
            'stacked' => 'Empilée',
            'sidebar' => 'Barre latérale',
            'multi_column' => 'Multicolonne',
            'mobile' => 'Navigation mobile',
            'mobile_description' => 'Le kit ne livre aucun composant de navigation mobile, parce que chaque coque porte la sienne et qu’il n’y en a que trois. Une coque empilée déplie un panneau dans le flux sous la barre : le contenu est poussé vers le bas. Une coque à barre latérale ou multicolonne garde une barre épinglée et ouvre la barre latérale elle‑même en dialogue hors‑champ sur un voile, le bouton de fermeture dans la goulotte à côté du panneau.',
            'mobile_columns' => 'Une coque multicolonne reprend la même barre et le même tiroir qu’une coque à barre latérale. Ce qu’elle abandonne, c’est la colonne secondaire : elle est déclarée xl:block, donc sous ce palier elle n’existe pas et la page tient en une seule colonne. Rien ne l’empile sous le contenu principal — si cette colonne compte sur un téléphone, il faut la remettre à la main.',
        ],

        'label' => [
            'header' => 'En‑tête',
            'body' => 'Corps',
            'footer' => 'Pied',
            'continue' => 'Continuer',
            'projects' => 'Projets',
            'action' => 'Ajouter un projet',
            'item' => 'Ligne',
            'media_title' => 'Un objet média',
            'media_text' => 'Une figure d’un côté, un titre et un paragraphe de l’autre. La figure garde sa taille ; le texte prend le reste de la ligne.',
            'edit' => 'Modifier',
            'attach' => 'Joindre un fichier',
            'comment' => 'Commenter',
            'delete' => 'Supprimer',
            'nav' => 'Navigation',
            'page_header' => 'En‑tête de page',
            'main' => 'Contenu principal',
            'sidebar' => 'Barre latérale',
            'rail' => 'Rail',
            'aside' => 'Colonne secondaire',
            'secondary' => 'Colonne secondaire',
            'sticky' => 'Colonne épinglée',
            'menu' => 'Panneau de menu',
            'drawer' => 'Tiroir latéral',
            'scrim' => 'Voile',
            'closed' => 'Fermé',
            'open' => 'Ouvert',
            'constrained' => 'Contenu contraint',
        ],
    ],
];
