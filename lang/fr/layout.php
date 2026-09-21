<?php

declare(strict_types=1);

/*
 * The kit’s five layouts, named once for every tab that offers them: the
 * framework tab picks one per project and screen, the Layouts page shows them all.
 */

return [
    'console' => [
        'label' => 'Console',
        'summary' => 'Une barre latérale permanente, un en-tête de page et des données denses en dessous — administration, back-office et CRUD.',
    ],
    'workspace' => [
        'label' => 'Espace de travail',
        'summary' => 'Une colonne de liste et une colonne de détail à côté — boîtes de réception, tri et collaboration.',
    ],
    'stacked' => [
        'label' => 'Empilée',
        'summary' => 'Une barre de navigation en haut, un bandeau d’en-tête et des grilles de cartes — tableaux de bord et applications produit.',
    ],
    'marketing' => [
        'label' => 'Marketing',
        'summary' => 'Aucune coque applicative : une barre de navigation, une suite de sections et un pied de page — sites publics et pages d’atterrissage.',
    ],
    'focus' => [
        'label' => 'Focus',
        'summary' => 'Une seule colonne étroite, un indicateur de progression et rien d’autre — accueil, paiement et assistants.',
    ],
];
