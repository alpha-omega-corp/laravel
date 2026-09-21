<?php

declare(strict_types=1);

return [
    'title' => 'Framework',
    'intro' => 'Neuf projets indépendants, chacun le site entier d’une petite entreprise ou d’un back-office, parcouru depuis sa propre navigation. Aucun n’est bâti comme un autre : chaque projet déclare ses propres sections, si bien que le restaurant a une carte et des horaires, la ferme une boutique, des événements et des jours de marché, et le salon un catalogue de ce qu’il a coupé. Chaque section porte la mise en page qui convient au travail qu’elle est — un comptoir est une console, une page de brochure ne l’est pas — la palette et le degré suivant la mise en page. Les trois restent à la main du lecteur depuis les rails, et un choix est ce qui les inscrit dans l’URL. Le clair et le sombre restent au sélecteur de la barre de navigation.',

    'fitting' => 'Adaptée',
    'projects' => 'Projets',
    'palettes' => 'Palettes',
    'layouts' => 'Mises en page',
    'variations' => 'Degrés',

    'meta' => [
        'layout' => 'Mise en page',
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
