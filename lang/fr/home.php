<?php

declare(strict_types=1);

/*
 * The home page says what the site holds, in four lines and four links. It is
 * the only page that describes the others, so each line summarises a tab
 * rather than restating its own intro word for word.
 */

return [
    'title' => 'Accueil',
    'intro' => 'Trois galeries et un graphe. Le kit montre chaque élément, les mises en page montrent les structures de page, le framework monte les deux en sites entiers, et le graphe dit ce qui tient à quoi. Rien de tout cela n’est un produit : c’est le modèle dont partent les autres projets.',

    'tab' => [
        'ui_kit' => 'Chaque élément du kit partagé, un par groupe et non un par fichier, retracé sur les jetons de cette application.',
        'layouts' => 'Les composants de structure — cartes, conteneurs, séparateurs, listes et objets média — et les trois familles de coquilles de page.',
        'framework' => 'Neuf entreprises fictives, chacune bâtie de ses propres sections, à parcourir dans cinq mises en page, sept palettes et trois degrés.',
        'graph' => 'Tout cela en un seul graphe : quel composant sert à quelle mise en page, et laquelle habille quel projet. Chaque nœud ouvre la page qui le montre.',
    ],

    'open' => 'Ouvrir',
    'picker' => 'La palette, le clair et le sombre se choisissent dans la barre de navigation, et toute page suit.',
];
