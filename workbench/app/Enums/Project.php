<?php

declare(strict_types=1);

namespace Workbench\App\Enums;

/**
 * The nine businesses the framework tab is built for.
 *
 * A project is one whole site, and no two are built the same way. There is no
 * common set of pages and no shape every project has to fill: a project
 * declares its own sections, in its own order, each with its own body and its
 * own data. The restaurant has a menu and opening hours; the farm has a shop,
 * events and market days; the salon has a description, a price list and a
 * catalogue of pictures. That the sets differ is the point of the tab — nine
 * businesses in one set of clothes would be one business.
 *
 * What a section *is* comes from {@see sections()}: a label for the site's own
 * navigation, the {@see KitLayout} the work wants, the view that draws it, and
 * the data that view reads. Section bodies live under
 * resources/views/framework/sections and are shared by whoever needs them — a
 * price list is a price list — but nothing forces a project to have one.
 *
 * {@see site()} is the little that genuinely is common: every business has a
 * name, an address and one thing it wants you to do. The layouts draw that
 * chrome; the sections never touch it.
 *
 * The content is demo data for fictional Swiss businesses and is written in
 * French only. It is not chrome: translating an invented price list into four
 * languages would be four copies of a thing nobody reads. The labels around it
 * — the ones in the `framework` translation files — do follow the locale.
 *
 * @phpstan-type Site array{
 *         brand: string,
 *         address: string,
 *         phone: string,
 *         email: string,
 *         transport: string,
 *         status: string,
 *         meta: array<int, string>,
 *         cta: array{primary: array{label: string, to: string}, secondary: array{label: string, to: string}}
 *     }
 * @phpstan-type Section array{label: string, layout: KitLayout, view: string, data: array<string, mixed>}
 */
enum Project: string
{
    case Restaurant = 'restaurant';
    case Haircut = 'haircut';
    case Farm = 'farm';
    case Butcher = 'butcher';
    case Cabinet = 'cabinet';
    case Retail = 'retail';
    case Health = 'health';
    case Education = 'education';
    case Logistics = 'logistics';

    public static function default(): self
    {
        return self::Restaurant;
    }

    public function label(): string
    {
        return __('framework.project.'.$this->value.'.label');
    }

    /**
     * The one-line description shown beside the project's name.
     */
    public function summary(): string
    {
        return __('framework.project.'.$this->value.'.summary');
    }

    /**
     * The chrome every site has whatever it sells: who it is, where it is, and
     * the two things it asks of a visitor. The `to` of a call to action is a
     * key of {@see sections()}, so a button lands somewhere this project has.
     *
     * @return Site
     */
    public function site(): array
    {
        return match ($this) {
            self::Restaurant => [
                'brand' => 'Osteria Verd',
                'address' => 'Rue du Port 12, 1006 Lausanne',
                'phone' => '021 000 00 00',
                'email' => 'table@osteria-verd.example',
                'transport' => 'M2 Ouchy, puis quatre minutes à pied',
                'status' => 'Ouvert',
                'meta' => ['28 couverts', 'Mise à jour il y a 4 min'],
                'cta' => [
                    'primary' => ['label' => 'Réserver une table', 'to' => 'reserver'],
                    'secondary' => ['label' => 'Voir la carte', 'to' => 'carte'],
                ],
            ],
            self::Haircut => [
                'brand' => 'Atelier Nord',
                'address' => 'Rue des Moulins 8, 2000 Neuchâtel',
                'phone' => '032 000 00 00',
                'email' => 'salon@atelier-nord.example',
                'transport' => 'Trois minutes à pied de la place Pury',
                'status' => 'Ouvert',
                'meta' => ['4 fauteuils', 'Mise à jour il y a 9 min'],
                'cta' => [
                    'primary' => ['label' => 'Prendre rendez-vous', 'to' => 'rendez-vous'],
                    'secondary' => ['label' => 'Voir les prestations', 'to' => 'prestations'],
                ],
            ],
            self::Farm => [
                'brand' => 'Ferme des Combes',
                'address' => 'Route des Combes 4, 1630 Bulle',
                'phone' => '026 000 00 00',
                'email' => 'panier@ferme-des-combes.example',
                'transport' => 'Bus 3 jusqu’à Prayoud, puis dix minutes à pied',
                'status' => 'Ouvert',
                'meta' => ['18 hectares', 'Mise à jour il y a 25 min'],
                'cta' => [
                    'primary' => ['label' => 'Commander un panier', 'to' => 'commande'],
                    'secondary' => ['label' => 'Voir la boutique', 'to' => 'boutique'],
                ],
            ],
            self::Butcher => [
                'brand' => 'Boucherie Perret',
                'address' => 'Grand-Pont 21, 1950 Sion',
                'phone' => '027 000 00 00',
                'email' => 'commande@boucherie-perret.example',
                'transport' => 'Cinq minutes à pied de la gare',
                'status' => 'Ouvert',
                'meta' => ['3 bouchers', 'Mise à jour il y a 12 min'],
                'cta' => [
                    'primary' => ['label' => 'Passer commande', 'to' => 'commande'],
                    'secondary' => ['label' => 'Voir l’étal', 'to' => 'etal'],
                ],
            ],
            self::Cabinet => [
                'brand' => 'Vigne & Roux',
                'address' => 'Rue du Rhône 62, 1204 Genève',
                'phone' => '022 000 00 00',
                'email' => 'etude@vigne-roux.example',
                'transport' => 'Arrêt Bel-Air, puis trois minutes à pied',
                'status' => 'Ouvert',
                'meta' => ['6 avocats', 'Mise à jour il y a 2 min'],
                'cta' => [
                    'primary' => ['label' => 'Demander un rendez-vous', 'to' => 'rendez-vous'],
                    'secondary' => ['label' => 'Nos domaines', 'to' => 'domaines'],
                ],
            ],
            self::Retail => [
                'brand' => 'Boutique Ravel',
                'address' => 'Rue de Bourg 18, 1003 Lausanne',
                'phone' => '021 000 00 00',
                'email' => 'compte@boutique-ravel.example',
                'transport' => 'M2 Bessières, puis deux minutes à pied',
                'status' => 'Ouvert',
                'meta' => ['42 références', 'Mise à jour il y a 10 min'],
                'cta' => [
                    'primary' => ['label' => 'Ouvrir un compte', 'to' => 'compte'],
                    'secondary' => ['label' => 'Voir le catalogue', 'to' => 'catalogue'],
                ],
            ],
            self::Health => [
                'brand' => 'Cabinet Lémanique',
                'address' => 'Avenue de Cour 40, 1007 Lausanne',
                'phone' => '021 000 00 00',
                'email' => 'agenda@cabinet-lemanique.example',
                'transport' => 'Bus 1 jusqu’à Cour, puis une minute à pied',
                'status' => 'Ouvert',
                'meta' => ['Quatre thérapeutes', 'Mise à jour il y a 3 min'],
                'cta' => [
                    'primary' => ['label' => 'Prendre rendez-vous', 'to' => 'rendez-vous'],
                    'secondary' => ['label' => 'Voir les prestations', 'to' => 'prestations'],
                ],
            ],
            self::Education => [
                'brand' => 'Institut Riva',
                'address' => 'Rue Centrale 7, 1003 Lausanne',
                'phone' => '021 000 00 00',
                'email' => 'inscription@institut-riva.example',
                'transport' => 'M2 Riponne, puis cinq minutes à pied',
                'status' => 'Session ouverte',
                'meta' => ['Douze cours', 'Mise à jour hier'],
                'cta' => [
                    'primary' => ['label' => 'S’inscrire à un cours', 'to' => 'inscription'],
                    'secondary' => ['label' => 'Voir les cours', 'to' => 'cours'],
                ],
            ],
            self::Logistics => [
                'brand' => 'Transports Gavillet',
                'address' => 'Chemin du Dépôt 9, 1030 Bussigny',
                'phone' => '021 000 00 00',
                'email' => 'expedition@gavillet.example',
                'transport' => 'Sortie Crissier, puis deux kilomètres',
                'status' => 'En service',
                'meta' => ['Onze véhicules', 'Mise à jour il y a 2 min'],
                'cta' => [
                    'primary' => ['label' => 'Demander un enlèvement', 'to' => 'enlevement'],
                    'secondary' => ['label' => 'Voir les prestations', 'to' => 'prestations'],
                ],
            ],
        };
    }

    /**
     * What this project is made of, keyed by the slug the URL carries, in the
     * order the site's own navigation reads. The first is what it opens on.
     *
     * @return array<string, Section>
     */
    public function sections(): array
    {
        return match ($this) {
            self::Restaurant => self::restaurant(),
            self::Haircut => self::haircut(),
            self::Farm => self::farm(),
            self::Butcher => self::butcher(),
            self::Cabinet => self::cabinet(),
            self::Retail => self::retail(),
            self::Health => self::health(),
            self::Education => self::education(),
            self::Logistics => self::logistics(),
        };
    }

    /**
     * The slugs this project is built from, which is also its navigation.
     *
     * @return array<int, string>
     */
    public function keys(): array
    {
        return array_keys($this->sections());
    }

    /**
     * Whether this project has the named section. The query string is a
     * viewer's to type, and a salon has no opening-hours page.
     */
    public function has(?string $key): bool
    {
        return $key !== null && array_key_exists($key, $this->sections());
    }

    /**
     * The section a query string resolves to, falling back to the project's
     * first when it names one this project does not have.
     */
    public function key(?string $value): string
    {
        return $this->has($value) ? (string) $value : $this->keys()[0];
    }

    /**
     * @return Section
     */
    public function section(?string $value): array
    {
        return $this->sections()[$this->key($value)];
    }

    /**
     * A twenty-eight cover place by the lake. A menu and opening hours is the
     * whole of what it needs on the web, plus the form that books a table.
     *
     * @return array<string, Section>
     */
    private static function restaurant(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.story',
                'data' => [
                    'badge' => 'Cuisine du lac · Lausanne',
                    'title' => 'Une cuisine du lac, servie sans cérémonie',
                    'body' => 'Vingt-huit couverts, une carte courte et un four à bois. On cuisine ce que le lac et les maraîchers donnent la semaine même, et rien d’autre.',
                    'cards' => [
                        ['title' => 'Le lac', 'body' => 'Perche, féra et truite, livrées le matin par la pêcherie de Rivaz.'],
                        ['title' => 'Le marché', 'body' => 'Une carte courte qui change tous les quinze jours, selon ce que les maraîchers ont.'],
                        ['title' => 'La cave', 'body' => 'Quarante vins vaudois et valaisans, dont douze au verre.'],
                    ],
                    'listTitle' => 'Cette semaine',
                    'listBody' => 'La carte du moment, en trois lignes.',
                    'list' => [
                        ['title' => 'Velouté de courge, noisettes torréfiées', 'subtitle' => 'Entrée', 'meta' => '14.—'],
                        ['title' => 'Filet de perche, beurre citronné', 'subtitle' => 'Plat', 'meta' => '34.—'],
                        ['title' => 'Tarte aux coings', 'subtitle' => 'Dessert', 'meta' => '12.—'],
                    ],
                    'asideTitle' => 'Horaires',
                    'asideBody' => 'Fermé le lundi, toute l’année.',
                    'aside' => [
                        ['term' => 'Mardi – jeudi', 'value' => '11h30 – 14h00 · 18h00 – 22h00'],
                        ['term' => 'Vendredi – samedi', 'value' => '11h30 – 14h00 · 18h00 – 23h00'],
                        ['term' => 'Dimanche', 'value' => '11h30 – 15h00'],
                    ],
                    'panelTitle' => 'Douze couverts encore libres ce vendredi',
                    'panelBody' => 'Les réservations se font jusqu’à la veille à 18h. Au-delà, appelez-nous.',
                    'stats' => [
                        ['label' => 'Couverts ce soir', 'value' => '28', 'change' => '4', 'direction' => 'up'],
                        ['label' => 'Réservations', 'value' => '19', 'change' => '2', 'direction' => 'up'],
                        ['label' => 'Tables libres', 'value' => '3'],
                    ],
                ],
            ],
            'carte' => [
                'label' => 'La carte',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.menu',
                'data' => [
                    'title' => 'La carte',
                    'body' => 'Elle change tous les quinze jours. Le menu du midi est à 26.— , entrée et plat.',
                    'note' => 'Prix nets, service compris.',
                    'groups' => [
                        'Entrées' => [
                            ['title' => 'Velouté de courge, noisettes torréfiées', 'subtitle' => 'Végétarien', 'meta' => '14.—'],
                            ['title' => 'Tartare de truite du lac, aneth et citron', 'subtitle' => 'Cru', 'meta' => '19.—'],
                            ['title' => 'Salade d’automne, chèvre frais des Préalpes', 'subtitle' => 'Végétarien', 'meta' => '16.—'],
                        ],
                        'Plats' => [
                            ['title' => 'Filet de perche, beurre citronné, pommes vapeur', 'subtitle' => 'Pêche du lac', 'meta' => '34.—'],
                            ['title' => 'Risotto aux champignons des bois', 'subtitle' => 'Végétarien', 'meta' => '28.—'],
                            ['title' => 'Côte de veau au four à bois, jus au thym', 'subtitle' => 'Pour deux', 'meta' => '42.—'],
                        ],
                        'Desserts' => [
                            ['title' => 'Tarte aux coings, crème double', 'subtitle' => 'Maison', 'meta' => '12.—'],
                            ['title' => 'Glace au miel de sapin', 'subtitle' => 'Maison', 'meta' => '10.—'],
                            ['title' => 'Moelleux au chocolat, sorbet cassis', 'subtitle' => 'Compter 15 min', 'meta' => '13.—'],
                        ],
                    ],
                    'columns' => ['Service', 'Plat', 'Prix'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Allergies et régimes',
                        'body' => 'Dites-le à la réservation : la cuisine adapte la plupart des plats, et la carte du soir compte toujours une entrée et un plat végétariens.',
                    ],
                ],
            ],
            'horaires' => [
                'label' => 'Horaires',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Horaires',
                    'body' => 'Service continu le dimanche. Dernière commande une demi-heure avant la fermeture.',
                    'notice' => [
                        'tone' => 'warning',
                        'title' => 'Fermeture annuelle',
                        'body' => 'La maison est fermée du 24 décembre au 7 janvier. Les réservations rouvrent le 8.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => 'Fermé'],
                        ['term' => 'Mardi', 'value' => '11h30 – 14h00 · 18h00 – 22h00'],
                        ['term' => 'Mercredi', 'value' => '11h30 – 14h00 · 18h00 – 22h00'],
                        ['term' => 'Jeudi', 'value' => '11h30 – 14h00 · 18h00 – 22h00'],
                        ['term' => 'Vendredi', 'value' => '11h30 – 14h00 · 18h00 – 23h00'],
                        ['term' => 'Samedi', 'value' => '11h30 – 14h00 · 18h00 – 23h00'],
                        ['term' => 'Dimanche', 'value' => '11h30 – 15h00'],
                    ],
                    'marked' => [1],
                    'legend' => 'Jours marqués : fermeture hebdomadaire.',
                    'panelTitle' => 'Groupes de plus de huit',
                    'panelBody' => 'La salle du fond se réserve entière, midi ou soir, avec un menu fixe convenu à l’avance.',
                ],
            ],
            'reserver' => [
                'label' => 'Réserver',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Réserver une table',
                    'body' => 'Jusqu’à la veille à 18h. Passé ce délai, appelez le 021 000 00 00.',
                    'formTitle' => 'Votre demande',
                    'formBody' => 'Nous confirmons par courriel dans la journée.',
                    'choiceLabel' => 'Couverts',
                    'choices' => [
                        '1' => '1 personne',
                        '2' => '2 personnes',
                        '4' => '4 personnes',
                        '6' => '6 personnes',
                        '8' => '8 personnes et plus',
                    ],
                    'choice' => '2',
                    'legend' => 'Service',
                    'options' => [
                        ['value' => 'midi', 'label' => 'Midi', 'hint' => 'De 11h30 à 14h00.'],
                        ['value' => 'soir', 'label' => 'Soir', 'hint' => 'De 18h00 à la fermeture.'],
                    ],
                    'selected' => 'soir',
                    'placeholder' => 'Allergies, chaise haute, table près de la fenêtre…',
                    'consent' => [
                        'label' => 'Recevoir la carte du mois',
                        'hint' => 'Un courriel tous les quinze jours, jamais davantage.',
                    ],
                    'submit' => 'Envoyer la demande',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Annulation',
                        'body' => 'Sans frais jusqu’à quatre heures avant le service. Un mot suffit.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Four chairs and an appointment book. No contact form: the booking screen
     * is how this one is reached, and a catalogue of what has been cut is what
     * a salon is judged on.
     *
     * @return array<string, Section>
     */
    private static function haircut(): array
    {
        return [
            'salon' => [
                'label' => 'Le salon',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.story',
                'data' => [
                    'badge' => 'Coiffure · Neuchâtel',
                    'title' => 'Une coupe qui tient trois mois, pas trois jours',
                    'body' => 'Quatre fauteuils, une heure par personne et pas de musique forte. On coupe sec, on explique ce qu’on fait, et on montre comment le refaire chez soi.',
                    'cards' => [
                        ['title' => 'La coupe', 'body' => 'Une heure, lavage compris, sur cheveux secs d’abord : c’est là que la forme se voit.'],
                        ['title' => 'La couleur', 'body' => 'Balayages et couleurs végétales, avec un devis avant de commencer.'],
                        ['title' => 'Le conseil', 'body' => 'Deux produits au maximum. Si vos cheveux n’en ont pas besoin, on le dit.'],
                    ],
                    'listTitle' => 'Les plus demandées',
                    'listBody' => 'Trois prestations, trois durées réelles.',
                    'list' => [
                        ['title' => 'Coupe femme, brushing compris', 'subtitle' => '1 h', 'meta' => '75.—'],
                        ['title' => 'Coupe homme et contours', 'subtitle' => '40 min', 'meta' => '55.—'],
                        ['title' => 'Balayage et soin', 'subtitle' => '2 h 30', 'meta' => '180.—'],
                    ],
                    'asideTitle' => 'Le salon',
                    'asideBody' => 'Sans rendez-vous le mercredi matin.',
                    'aside' => [
                        ['term' => 'Mardi – vendredi', 'value' => '09h00 – 18h30'],
                        ['term' => 'Samedi', 'value' => '08h30 – 16h00'],
                        ['term' => 'Paiement', 'value' => 'Carte, Twint ou espèces'],
                    ],
                    'panelTitle' => 'Deux places libres jeudi après-midi',
                    'panelBody' => 'Le planning s’ouvre six semaines à l’avance, et une annulation repart en ligne dans la minute.',
                    'stats' => [
                        ['label' => 'Rendez-vous aujourd’hui', 'value' => '23', 'change' => '3', 'direction' => 'up'],
                        ['label' => 'Fauteuils occupés', 'value' => '4 sur 4'],
                        ['label' => 'Places libres cette semaine', 'value' => '11', 'change' => '5', 'direction' => 'down'],
                    ],
                ],
            ],
            'prestations' => [
                'label' => 'Prestations',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.pricelist',
                'data' => [
                    'title' => 'Les prestations',
                    'body' => 'Les durées sont réelles : un rendez-vous d’une heure dure une heure.',
                    'tabs' => ['Tout', 'Femmes', 'Hommes'],
                    'groups' => [
                        'Coupes' => [
                            ['title' => 'Coupe femme, brushing compris', 'subtitle' => '1 h', 'meta' => '75.—'],
                            ['title' => 'Coupe homme et contours', 'subtitle' => '40 min', 'meta' => '55.—'],
                            ['title' => 'Coupe enfant, jusqu’à 12 ans', 'subtitle' => '30 min', 'meta' => '35.—'],
                        ],
                        'Couleurs' => [
                            ['title' => 'Balayage et soin', 'subtitle' => '2 h 30', 'meta' => '180.—'],
                            ['title' => 'Couleur végétale, racines', 'subtitle' => '1 h 30', 'meta' => '110.—'],
                            ['title' => 'Patine et brillance', 'subtitle' => '45 min', 'meta' => '65.—'],
                        ],
                        'Soins' => [
                            ['title' => 'Soin profond, cheveux colorés', 'subtitle' => '30 min', 'meta' => '40.—'],
                            ['title' => 'Taille de barbe et serviette chaude', 'subtitle' => '30 min', 'meta' => '38.—'],
                            ['title' => 'Chignon, sur devis', 'subtitle' => 'Dès 1 h', 'meta' => 'dès 90.—'],
                        ],
                    ],
                    'columns' => ['Famille', 'Prestation', 'Prix'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Cheveux longs ou très épais',
                        'body' => 'Comptez une demi-heure de plus et un supplément de 15.—, annoncé avant la coupe et jamais après.',
                    ],
                ],
            ],
            'galerie' => [
                'label' => 'Galerie',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.gallery',
                'data' => [
                    'title' => 'Ce qui sort d’ici',
                    'body' => 'Des coupes faites au salon, photographiées le jour même et jamais retouchées. Montrez-en une : c’est la façon la plus rapide de se comprendre.',
                    'items' => [
                        ['title' => 'Carré long, frange rideau', 'subtitle' => 'Coupe · 1 h · Salomé'],
                        ['title' => 'Dégradé court, nuque nette', 'subtitle' => 'Coupe homme · 40 min · Ivan'],
                        ['title' => 'Balayage miel sur base châtain', 'subtitle' => 'Couleur · 2 h 30 · Nadia'],
                        ['title' => 'Boucles remises en forme', 'subtitle' => 'Coupe sèche · 1 h · Léo'],
                        ['title' => 'Couleur végétale, reflets cuivrés', 'subtitle' => 'Couleur · 1 h 30 · Nadia'],
                        ['title' => 'Chignon bas, mariage', 'subtitle' => 'Coiffage · 1 h 15 · Salomé'],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Une photo vaut un long message',
                        'body' => 'Apportez-en une, même prise de dos, même mal éclairée. On dira franchement si la longueur actuelle permet d’y arriver en une séance.',
                    ],
                ],
            ],
            'equipe' => [
                'label' => 'L’équipe',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.people',
                'data' => [
                    'title' => 'L’équipe',
                    'body' => 'Quatre personnes, chacune avec ses jours. Le planning en ligne ne propose que celles qui travaillent.',
                    'people' => [
                        ['title' => 'Salomé Prêtre', 'subtitle' => 'Coupe et couleur · mardi à samedi'],
                        ['title' => 'Ivan Muller', 'subtitle' => 'Coupe homme et barbe · mercredi à samedi'],
                        ['title' => 'Nadia Berset', 'subtitle' => 'Balayage et couleur végétale · mardi, jeudi, vendredi'],
                        ['title' => 'Léo Chappuis', 'subtitle' => 'Coupe · jeudi à samedi'],
                    ],
                    'factsTitle' => 'En pratique',
                    'facts' => [
                        ['term' => 'Formation', 'value' => 'Deux jours par an, salon fermé'],
                        ['term' => 'Produits', 'value' => 'Deux marques, sans sulfates'],
                        ['term' => 'Apprentissage', 'value' => 'Une place chaque année, dès août'],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Choisir sa coiffeuse',
                        'body' => 'Le choix est libre et sans supplément. Sans préférence, le premier créneau disponible est proposé.',
                    ],
                ],
            ],
            'rendez-vous' => [
                'label' => 'Rendez-vous',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.booking',
                'data' => [
                    'title' => 'Prendre rendez-vous',
                    'body' => 'Le jour, la prestation, l’heure. La confirmation part par SMS dans la minute.',
                    'slotLabel' => 'Heure',
                    'slots' => [
                        '09:00' => '09h00',
                        '10:30' => '10h30',
                        '13:00' => '13h00',
                        '14:30' => '14h30',
                        '16:00' => '16h00',
                        '17:30' => '17h30',
                    ],
                    'slot' => '14:30',
                    'legend' => 'Prestation',
                    'options' => [
                        ['value' => 'coupe', 'label' => 'Coupe', 'hint' => 'Une heure, lavage compris.'],
                        ['value' => 'couleur', 'label' => 'Couleur ou balayage', 'hint' => 'Deux heures et demie, devis d’abord.'],
                        ['value' => 'barbe', 'label' => 'Barbe', 'hint' => 'Trente minutes.'],
                    ],
                    'selected' => 'coupe',
                    'placeholder' => 'Longueur actuelle, dernière couleur, ce que vous aimeriez…',
                    'summaryTitle' => 'Votre rendez-vous',
                    'summary' => [
                        ['term' => 'Durée', 'value' => '1 h, fauteuil réservé pour vous seul'],
                        ['term' => 'Coiffeuse', 'value' => 'Au choix, sans supplément'],
                        ['term' => 'Annulation', 'value' => 'Libre jusqu’à 24 h avant'],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Retard de plus de dix minutes',
                        'body' => 'Le rendez-vous suivant ne peut pas décaler : au-delà de dix minutes, la prestation est raccourcie ou reportée.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Eighteen hectares and two markets a week. A shop, a diary of what happens
     * on the farm and the market days are three different things, and the farm
     * is the one project that needs all three.
     *
     * @return array<string, Section>
     */
    private static function farm(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.story',
                'data' => [
                    'badge' => 'Maraîchage · Gruyère',
                    'title' => 'Dix-huit hectares, quarante légumes, aucune serre chauffée',
                    'body' => 'On cultive ce que la saison permet et on le vend à trente kilomètres à la ronde. Ce qui est récolté le mardi est dans un panier le mercredi.',
                    'cards' => [
                        ['title' => 'Le champ', 'body' => 'Quarante variétés en rotation sur six parcelles, en bio depuis 2011.'],
                        ['title' => 'Le panier', 'body' => 'Sept à neuf légumes, composés le matin même selon ce qui est prêt.'],
                        ['title' => 'Le marché', 'body' => 'Bulle le mercredi, Fribourg le samedi, de sept heures à midi.'],
                    ],
                    'listTitle' => 'Le panier de la semaine',
                    'listBody' => 'Ce qui sort du champ en ce moment.',
                    'list' => [
                        ['title' => 'Courge musquée', 'subtitle' => 'Parcelle du haut', 'meta' => '1 pièce'],
                        ['title' => 'Poireaux d’automne', 'subtitle' => 'Récolte du mardi', 'meta' => '600 g'],
                        ['title' => 'Pommes Boskoop', 'subtitle' => 'Verger de la ferme', 'meta' => '1 kg'],
                    ],
                    'asideTitle' => 'Les marchés',
                    'asideBody' => 'Deux marchés par semaine, toute l’année.',
                    'aside' => [
                        ['term' => 'Mercredi', 'value' => 'Bulle, place du Marché · 07h00 – 12h00'],
                        ['term' => 'Samedi', 'value' => 'Fribourg, Grand-Places · 07h00 – 12h30'],
                        ['term' => 'À la ferme', 'value' => 'Jeudi et vendredi · 16h00 – 19h00'],
                    ],
                    'panelTitle' => 'Huit parts libres pour l’abonnement d’hiver',
                    'panelBody' => 'Seize paniers de novembre à mars, payables en deux fois, retirés au marché ou à la ferme.',
                    'stats' => [
                        ['label' => 'Paniers cette semaine', 'value' => '142', 'change' => '12', 'direction' => 'up'],
                        ['label' => 'Abonnés', 'value' => '96', 'change' => '4', 'direction' => 'up'],
                        ['label' => 'Parts libres', 'value' => '8'],
                    ],
                ],
            ],
            'boutique' => [
                'label' => 'La boutique',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.catalogue',
                'data' => [
                    'title' => 'La boutique',
                    'body' => 'Trois tailles de panier, la même provenance, et ce qui se vend à l’unité au marché. On s’adapte au foyer, pas l’inverse.',
                    'items' => [
                        ['title' => 'Panier simple', 'subtitle' => 'Une à deux personnes · 5 légumes', 'meta' => '19.—', 'tag' => 'Hebdomadaire'],
                        ['title' => 'Panier familial', 'subtitle' => 'Trois à quatre personnes · 8 légumes', 'meta' => '29.—', 'tag' => 'Le plus pris'],
                        ['title' => 'Panier double', 'subtitle' => 'Cinq personnes et plus · 12 légumes', 'meta' => '42.—', 'tag' => 'Hebdomadaire'],
                        ['title' => 'Abonnement d’été', 'subtitle' => '20 paniers · avril à septembre', 'meta' => '520.—', 'tag' => 'Abonnement'],
                        ['title' => 'Abonnement d’hiver', 'subtitle' => '16 paniers · novembre à mars', 'meta' => '420.—', 'tag' => '8 parts libres'],
                        ['title' => 'Pommes de terre, sac de 5 kg', 'subtitle' => 'Charlotte ou Agria', 'meta' => '12.—', 'tag' => 'À l’unité'],
                        ['title' => 'Œufs de la ferme, six', 'subtitle' => 'Poules en plein air', 'meta' => '4.80', 'tag' => 'À l’unité'],
                        ['title' => 'Jus de pomme, 1 litre', 'subtitle' => 'Verger de la ferme', 'meta' => '3.50', 'tag' => 'À l’unité'],
                    ],
                    'columns' => ['Formule', 'Contenu', 'Quand', 'Prix'],
                    'action' => 'Ajouter',
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Ce qu’il y a dedans',
                        'body' => 'Le contenu n’est pas choisi : il suit la récolte. La liste de la semaine part par courriel le mardi soir.',
                    ],
                ],
            ],
            'evenements' => [
                'label' => 'Événements',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.agenda',
                'data' => [
                    'title' => 'Ce qui se passe à la ferme',
                    'body' => 'Le champ ne se visite pas librement, mais il s’ouvre quatre fois l’an. Les dates sont fermes ; la météo ne les déplace pas.',
                    'columns' => ['Quand', 'Quoi'],
                    'groups' => [
                        'Ce mois-ci' => [
                            ['text' => 'Porte ouverte d’automne · visite des six parcelles et pressoir en marche', 'time' => 'Samedi 12, 10h – 16h', 'tone' => 'accent'],
                            ['text' => 'Atelier conserves · douze places, sur inscription', 'time' => 'Jeudi 17, 18h30'],
                            ['text' => 'Dernier marché de Bulle avant la pause de février', 'time' => 'Mercredi 23, 07h – 12h'],
                        ],
                        'Plus tard dans la saison' => [
                            ['text' => 'Marché de Noël de Fribourg · stand double, avec le verger', 'time' => '13 et 14 décembre', 'tone' => 'highlight'],
                            ['text' => 'Taille du verger · pas de marché pendant quinze jours', 'time' => 'Du 5 au 19 février'],
                            ['text' => 'Distribution des parts d’été · signature des abonnements', 'time' => 'Samedi 28 mars, à la ferme'],
                        ],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Écoles et groupes',
                        'body' => 'Une classe se reçoit sur rendez-vous, hors périodes de récolte. Comptez deux heures et des bottes.',
                    ],
                ],
            ],
            'marches' => [
                'label' => 'Marchés',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Marchés et retraits',
                    'body' => 'Le champ ne se visite pas librement ; les paniers se retirent au marché ou à la ferme.',
                    'notice' => [
                        'tone' => 'info',
                        'title' => 'Pause de février',
                        'body' => 'Pas de marché du 5 au 19 février : c’est la taille du verger. Les abonnements sont prolongés d’autant.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => 'Fermé'],
                        ['term' => 'Mardi', 'value' => 'Récolte, pas de vente'],
                        ['term' => 'Mercredi', 'value' => 'Marché de Bulle · 07h00 – 12h00'],
                        ['term' => 'Jeudi', 'value' => 'Retrait à la ferme · 16h00 – 19h00'],
                        ['term' => 'Vendredi', 'value' => 'Retrait à la ferme · 16h00 – 19h00'],
                        ['term' => 'Samedi', 'value' => 'Marché de Fribourg · 07h00 – 12h30'],
                        ['term' => 'Dimanche', 'value' => 'Fermé'],
                    ],
                    'marked' => [3, 6],
                    'legend' => 'Jours marqués : jours de marché.',
                    'panelTitle' => 'Retrait à la ferme',
                    'panelBody' => 'Le hangar reste ouvert jusqu’à 19h le jeudi et le vendredi. Les paniers non retirés partent au marché suivant.',
                ],
            ],
            'commande' => [
                'label' => 'Commander',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Commander un panier',
                    'body' => 'La commande se fait jusqu’au mardi midi pour la semaine en cours.',
                    'formTitle' => 'Votre commande',
                    'formBody' => 'Nous confirmons par courriel le mardi soir, avec la liste de la semaine.',
                    'choiceLabel' => 'Taille du panier',
                    'choices' => [
                        'simple' => 'Panier simple · 19.—',
                        'familial' => 'Panier familial · 29.—',
                        'double' => 'Panier double · 42.—',
                        'abonnement' => 'Abonnement, à convenir',
                    ],
                    'choice' => 'familial',
                    'legend' => 'Retrait',
                    'options' => [
                        ['value' => 'marche', 'label' => 'Au marché', 'hint' => 'Bulle le mercredi, Fribourg le samedi.'],
                        ['value' => 'ferme', 'label' => 'À la ferme', 'hint' => 'Jeudi et vendredi, de 16h à 19h.'],
                    ],
                    'selected' => 'marche',
                    'placeholder' => 'Ce que vous ne mangez pas, une allergie, un panier à décaler…',
                    'consent' => [
                        'label' => 'Recevoir la liste de la semaine',
                        'hint' => 'Un courriel le mardi soir, rien d’autre.',
                    ],
                    'submit' => 'Envoyer la commande',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Semaine sautée',
                        'body' => 'Un abonnement se met en pause deux fois par saison, annoncé avant le mardi midi.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Whole animals, cut on site. The counter is a stock list before it is a
     * price list, so it opens in a console, and what was worked this week is
     * the thing regulars actually come to read.
     *
     * @return array<string, Section>
     */
    private static function butcher(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.story',
                'data' => [
                    'badge' => 'Boucherie-charcuterie · Sion',
                    'title' => 'Quatre éleveurs, trois bouchers, aucune viande d’ailleurs',
                    'body' => 'On achète la bête entière et on la travaille sur place. Ce qui ne passe pas en vitrine part au séchoir, et rien ne se perd.',
                    'cards' => [
                        ['title' => 'L’élevage', 'body' => 'Quatre fermes valaisannes, toutes à moins d’une heure, toutes visitées.'],
                        ['title' => 'Le séchoir', 'body' => 'Viande séchée et lard, six à douze semaines, sans accélérateur.'],
                        ['title' => 'Le comptoir', 'body' => 'La découpe se fait devant vous, à l’épaisseur que vous voulez.'],
                    ],
                    'listTitle' => 'En vitrine aujourd’hui',
                    'listBody' => 'Ce que les bouchers ont sorti ce matin.',
                    'list' => [
                        ['title' => 'Entrecôte de bœuf, maturée 4 semaines', 'subtitle' => 'Race d’Hérens', 'meta' => '62.—/kg'],
                        ['title' => 'Saucisse à rôtir de veau', 'subtitle' => 'Faite mardi', 'meta' => '28.—/kg'],
                        ['title' => 'Viande séchée du Valais AOP', 'subtitle' => 'Séchage 12 semaines', 'meta' => '98.—/kg'],
                    ],
                    'asideTitle' => 'Horaires',
                    'asideBody' => 'Fermé le dimanche et le lundi matin.',
                    'aside' => [
                        ['term' => 'Mardi – vendredi', 'value' => '07h00 – 12h30 · 14h30 – 18h30'],
                        ['term' => 'Samedi', 'value' => '07h00 – 16h00, sans interruption'],
                        ['term' => 'Lundi', 'value' => '14h30 – 18h30'],
                    ],
                    'panelTitle' => 'Commandes de fête jusqu’au 18 décembre',
                    'panelBody' => 'Passé cette date, il reste ce qu’il y a en vitrine. Les rôtis et les chapons se réservent dès novembre.',
                    'stats' => [
                        ['label' => 'Commandes du jour', 'value' => '47', 'change' => '6', 'direction' => 'up'],
                        ['label' => 'Pièces en vitrine', 'value' => '62'],
                        ['label' => 'Bêtes cette semaine', 'value' => '4', 'change' => '1', 'direction' => 'down'],
                    ],
                ],
            ],
            'etal' => [
                'label' => 'L’étal',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.pricelist',
                'data' => [
                    'title' => 'L’étal',
                    'body' => 'Les prix sont au kilo, sauf mention. La découpe et la ficelle sont comprises.',
                    'tabs' => ['Tout', 'Boucherie', 'Charcuterie'],
                    'groups' => [
                        'Bœuf' => [
                            ['title' => 'Entrecôte maturée 4 semaines', 'subtitle' => 'Race d’Hérens', 'meta' => '62.—/kg'],
                            ['title' => 'Bourguignon, épaule', 'subtitle' => 'Coupé à la demande', 'meta' => '32.—/kg'],
                            ['title' => 'Tartare, coupé au couteau', 'subtitle' => 'Le jour même', 'meta' => '54.—/kg'],
                        ],
                        'Veau et porc' => [
                            ['title' => 'Côtelettes de veau', 'subtitle' => 'Deux à trois par kilo', 'meta' => '48.—/kg'],
                            ['title' => 'Rôti de porc dans le filet', 'subtitle' => 'Ficelé, prêt au four', 'meta' => '29.—/kg'],
                            ['title' => 'Saucisse à rôtir de veau', 'subtitle' => 'Faite le mardi', 'meta' => '28.—/kg'],
                        ],
                        'Charcuterie' => [
                            ['title' => 'Viande séchée du Valais AOP', 'subtitle' => 'Séchage 12 semaines', 'meta' => '98.—/kg'],
                            ['title' => 'Lard sec, tranché fin', 'subtitle' => 'Séchage 8 semaines', 'meta' => '46.—/kg'],
                            ['title' => 'Terrine maison, la part', 'subtitle' => '180 g', 'meta' => '7.50'],
                        ],
                    ],
                    'columns' => ['Rayon', 'Pièce', 'Prix'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Commande à l’avance',
                        'body' => 'Une pièce particulière, une épaisseur précise, une quantité pour dix : deux jours suffisent, et c’est prêt à l’heure dite.',
                    ],
                ],
            ],
            'arrivages' => [
                'label' => 'Arrivages',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.agenda',
                'data' => [
                    'title' => 'Ce qui a été travaillé',
                    'body' => 'Une bête entière tient huit à dix jours au comptoir. Savoir laquelle est en cours dit ce qu’il y aura en vitrine, et quand.',
                    'columns' => ['Quand', 'Quoi'],
                    'groups' => [
                        'Cette semaine' => [
                            ['text' => 'Génisse d’Hérens · ferme de Nax · entrecôtes en maturation jusqu’au 14', 'time' => 'Lundi, abattage', 'tone' => 'accent'],
                            ['text' => 'Deux porcs · ferme des Mayens · saucisse à rôtir et rôtis dans le filet', 'time' => 'Mardi, découpe'],
                            ['text' => 'Agneau du val d’Anniviers · gigots réservés, épaules au comptoir', 'time' => 'Jeudi, découpe'],
                        ],
                        'Au séchoir' => [
                            ['text' => 'Viande séchée AOP · lot de septembre · sortie prévue le 2 décembre', 'time' => 'Semaine 9 sur 12', 'tone' => 'highlight'],
                            ['text' => 'Lard sec · lot d’octobre · sortie prévue le 18 décembre', 'time' => 'Semaine 5 sur 8'],
                            ['text' => 'Jambon cru · lot de juin · sortie prévue en mars', 'time' => 'Semaine 19 sur 40'],
                        ],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Une pièce, une bête',
                        'body' => 'Quand une bête est finie, la suivante n’a pas la même taille de côte. Pour une pièce précise, réservez pendant que le lot est au comptoir.',
                    ],
                ],
            ],
            'horaires' => [
                'label' => 'Horaires',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Horaires',
                    'body' => 'Le samedi est sans interruption. Le lundi matin, l’équipe est au séchoir.',
                    'notice' => [
                        'tone' => 'warning',
                        'title' => 'Fermeture d’été',
                        'body' => 'La boucherie ferme du 20 juillet au 10 août. Les commandes reprennent le 11.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => '14h30 – 18h30'],
                        ['term' => 'Mardi', 'value' => '07h00 – 12h30 · 14h30 – 18h30'],
                        ['term' => 'Mercredi', 'value' => '07h00 – 12h30 · 14h30 – 18h30'],
                        ['term' => 'Jeudi', 'value' => '07h00 – 12h30 · 14h30 – 18h30'],
                        ['term' => 'Vendredi', 'value' => '07h00 – 12h30 · 14h30 – 19h00'],
                        ['term' => 'Samedi', 'value' => '07h00 – 16h00, sans interruption'],
                        ['term' => 'Dimanche', 'value' => 'Fermé'],
                    ],
                    'marked' => [7],
                    'legend' => 'Jours marqués : fermeture hebdomadaire.',
                    'panelTitle' => 'Commandes de groupe',
                    'panelBody' => 'Grillades d’entreprise, chasse, banquets : un devis part dans la journée, avec les quantités par personne.',
                ],
            ],
            'commande' => [
                'label' => 'Commande',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Passer commande',
                    'body' => 'Deux jours ouvrables suffisent. Pour les fêtes, comptez trois semaines.',
                    'formTitle' => 'Votre commande',
                    'formBody' => 'Nous rappelons pour confirmer les quantités et l’heure du retrait.',
                    'choiceLabel' => 'Nombre de personnes',
                    'choices' => [
                        '2' => '2 personnes',
                        '4' => '4 personnes',
                        '6' => '6 personnes',
                        '10' => '10 personnes',
                        '20' => '20 personnes et plus',
                    ],
                    'choice' => '4',
                    'legend' => 'Retrait',
                    'options' => [
                        ['value' => 'boutique', 'label' => 'En boutique', 'hint' => 'Prêt à l’heure convenue, au comptoir.'],
                        ['value' => 'livraison', 'label' => 'Livraison', 'hint' => 'Sion et Sierre, le vendredi matin.'],
                    ],
                    'selected' => 'boutique',
                    'placeholder' => 'Pièces, épaisseur, cuisson prévue, heure du retrait…',
                    'consent' => [
                        'label' => 'Recevoir les arrivages',
                        'hint' => 'Un message quand une bête est travaillée, deux fois par mois.',
                    ],
                    'submit' => 'Envoyer la commande',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Annulation',
                        'body' => 'Sans frais jusqu’à 48 h avant le retrait, sauf pour les pièces déjà découpées.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Six lawyers and four fields. Fees before people, people before the
     * appointment: the order is the argument this site makes.
     *
     * @return array<string, Section>
     */
    private static function cabinet(): array
    {
        return [
            'accueil' => [
                'label' => 'Accueil',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.story',
                'data' => [
                    'badge' => 'Étude d’avocats · Genève',
                    'title' => 'Un premier avis en trente minutes, sans engagement',
                    'body' => 'Six avocats, quatre domaines et une règle : on dit tout de suite si le dossier tient, et ce qu’il coûtera. Si ce n’est pas notre domaine, on donne un nom.',
                    'cards' => [
                        ['title' => 'Le premier entretien', 'body' => 'Trente minutes, 90.—, déduits si le dossier est ouvert.'],
                        ['title' => 'Les honoraires', 'body' => 'Un tarif horaire annoncé par écrit, et un plafond convenu à l’avance.'],
                        ['title' => 'Le suivi', 'body' => 'Un interlocuteur unique et une note d’étape à chaque pièce déposée.'],
                    ],
                    'listTitle' => 'Ce que nous traitons le plus',
                    'listBody' => 'Trois situations sur quatre entrent dans ces cases.',
                    'list' => [
                        ['title' => 'Licenciement et certificat de travail', 'subtitle' => 'Droit du travail', 'meta' => '38%'],
                        ['title' => 'Divorce et garde', 'subtitle' => 'Droit de la famille', 'meta' => '27%'],
                        ['title' => 'Bail et résiliation', 'subtitle' => 'Droit du bail', 'meta' => '19%'],
                    ],
                    'asideTitle' => 'L’étude',
                    'asideBody' => 'Inscrite au barreau de Genève depuis 1998.',
                    'aside' => [
                        ['term' => 'Langues', 'value' => 'Français, allemand, anglais'],
                        ['term' => 'Entretiens', 'value' => 'Du lundi au vendredi, 08h30 – 18h00'],
                        ['term' => 'Urgences', 'value' => 'Une permanence le samedi matin'],
                    ],
                    'panelTitle' => 'Consultation de première heure',
                    'panelBody' => 'Trente minutes pour savoir si une action a du sens, avec un avis écrit en deux pages.',
                    'stats' => [
                        ['label' => 'Dossiers ouverts', 'value' => '214', 'change' => '8', 'direction' => 'up'],
                        ['label' => 'Première consultation', 'value' => '30 min'],
                        ['label' => 'Délai de réponse', 'value' => '48 h', 'change' => '6', 'direction' => 'down'],
                    ],
                ],
            ],
            'domaines' => [
                'label' => 'Domaines',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.pricelist',
                'data' => [
                    'title' => 'Nos domaines',
                    'body' => 'Quatre domaines, et des honoraires annoncés avant l’ouverture du dossier.',
                    'tabs' => ['Domaines', 'Honoraires', 'Procédures'],
                    'groups' => [
                        'Droit du travail' => [
                            ['title' => 'Contestation de licenciement', 'subtitle' => 'Délai de 30 jours', 'meta' => 'dès 1 200.—'],
                            ['title' => 'Certificat de travail', 'subtitle' => 'Rectification', 'meta' => 'dès 600.—'],
                            ['title' => 'Heures supplémentaires', 'subtitle' => 'Calcul et réclamation', 'meta' => 'dès 900.—'],
                        ],
                        'Droit de la famille' => [
                            ['title' => 'Divorce sur requête commune', 'subtitle' => 'Convention comprise', 'meta' => 'dès 3 500.—'],
                            ['title' => 'Garde et droit de visite', 'subtitle' => 'Modification', 'meta' => 'dès 2 200.—'],
                            ['title' => 'Contribution d’entretien', 'subtitle' => 'Calcul et adaptation', 'meta' => 'dès 1 400.—'],
                        ],
                        'Droit des contrats' => [
                            ['title' => 'Relecture de contrat', 'subtitle' => 'Jusqu’à 20 pages', 'meta' => 'dès 800.—'],
                            ['title' => 'Résiliation de bail', 'subtitle' => 'Contestation', 'meta' => 'dès 950.—'],
                            ['title' => 'Recouvrement', 'subtitle' => 'Poursuite et mainlevée', 'meta' => 'dès 700.—'],
                        ],
                    ],
                    'columns' => ['Domaine', 'Prestation', 'Honoraires'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Assurance de protection juridique',
                        'body' => 'Apportez le numéro de police au premier entretien : dans la moitié des dossiers, elle prend les honoraires en charge.',
                    ],
                ],
            ],
            'equipe' => [
                'label' => 'L’équipe',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.people',
                'data' => [
                    'title' => 'L’équipe',
                    'body' => 'Six avocats et deux assistantes. Chaque dossier a un nom, pas un service.',
                    'people' => [
                        ['title' => 'Me Claire Vigne', 'subtitle' => 'Associée · droit du travail'],
                        ['title' => 'Me Pascal Roux', 'subtitle' => 'Associé · droit des contrats'],
                        ['title' => 'Me Sarah Bonnard', 'subtitle' => 'Droit de la famille'],
                        ['title' => 'Me David Steiner', 'subtitle' => 'Droit du bail'],
                        ['title' => 'Me Lina Haddad', 'subtitle' => 'Droit du travail · collaboratrice'],
                        ['title' => 'Me Yann Progin', 'subtitle' => 'Contentieux · collaborateur'],
                    ],
                    'factsTitle' => 'L’étude',
                    'facts' => [
                        ['term' => 'Fondée', 'value' => '1998, barreau de Genève'],
                        ['term' => 'Interlocuteur', 'value' => 'Un seul avocat par dossier'],
                        ['term' => 'Note d’étape', 'value' => 'À chaque pièce déposée'],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Conflit d’intérêts',
                        'body' => 'Le contrôle se fait avant le premier entretien. S’il y a conflit, nous le disons et donnons deux autres noms.',
                    ],
                ],
            ],
            'rendez-vous' => [
                'label' => 'Rendez-vous',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.booking',
                'data' => [
                    'title' => 'Demander un rendez-vous',
                    'body' => 'Trente minutes pour poser le problème et savoir ce qui est possible.',
                    'slotLabel' => 'Heure',
                    'slots' => [
                        '08:30' => '08h30',
                        '10:00' => '10h00',
                        '11:30' => '11h30',
                        '14:00' => '14h00',
                        '15:30' => '15h30',
                        '17:00' => '17h00',
                    ],
                    'slot' => '10:00',
                    'legend' => 'Domaine',
                    'options' => [
                        ['value' => 'travail', 'label' => 'Droit du travail', 'hint' => 'Licenciement, salaire, certificat.'],
                        ['value' => 'famille', 'label' => 'Droit de la famille', 'hint' => 'Divorce, garde, entretien.'],
                        ['value' => 'contrats', 'label' => 'Contrats et bail', 'hint' => 'Relecture, résiliation, recouvrement.'],
                    ],
                    'selected' => 'travail',
                    'placeholder' => 'Les faits, les dates, et le délai reçu s’il y en a un…',
                    'summaryTitle' => 'Le premier entretien',
                    'summary' => [
                        ['term' => 'Durée', 'value' => '30 min, sur place ou en visioconférence'],
                        ['term' => 'Coût', 'value' => '90.—, déduits si le dossier est ouvert'],
                        ['term' => 'À apporter', 'value' => 'Contrat, courriers, délais reçus'],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Délais de procédure',
                        'body' => 'Un licenciement se conteste dans les 30 jours. Si un délai court, dites-le : le rendez-vous passe devant.',
                    ],
                ],
            ],
            'contact' => [
                'label' => 'Contact',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Nous écrire',
                    'body' => 'Décrivez la situation en quelques lignes. Nous répondons sous 48 heures ouvrables.',
                    'formTitle' => 'Votre demande',
                    'formBody' => 'Le message est couvert par le secret professionnel dès sa réception.',
                    'choiceLabel' => 'Urgence',
                    'choices' => [
                        'aucune' => 'Pas de délai en cours',
                        'semaine' => 'Un délai dans la semaine',
                        'jours' => 'Un délai dans les jours',
                        'aujourdhui' => 'Un délai aujourd’hui',
                    ],
                    'choice' => 'aucune',
                    'legend' => 'Domaine',
                    'options' => [
                        ['value' => 'travail', 'label' => 'Droit du travail', 'hint' => 'Licenciement, salaire, certificat.'],
                        ['value' => 'famille', 'label' => 'Droit de la famille', 'hint' => 'Divorce, garde, entretien.'],
                        ['value' => 'contrats', 'label' => 'Contrats et bail', 'hint' => 'Relecture, résiliation, recouvrement.'],
                    ],
                    'selected' => 'travail',
                    'placeholder' => 'Les faits, les dates, et le délai reçu s’il y en a un…',
                    'consent' => [
                        'label' => 'Recevoir la note de jurisprudence',
                        'hint' => 'Deux pages par trimestre, sur le droit du travail.',
                    ],
                    'submit' => 'Envoyer la demande',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Assistance judiciaire',
                        'body' => 'Sous condition de revenu, l’État prend les honoraires en charge. Nous montons le dossier avec vous.',
                    ],
                ],
            ],
        ];
    }

    /**
     * A fine-food shop run from the back office out. It opens on the counter's
     * own screen rather than on a banner, and the customer-facing part of it is
     * one account form.
     *
     * @return array<string, Section>
     */
    private static function retail(): array
    {
        return [
            'tableau' => [
                'label' => 'Tableau',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.dashboard',
                'data' => [
                    'title' => 'Le mois en cours',
                    'body' => 'Ce qui se vend le samedi décide de ce qui est commandé le lundi. La réserve tient trois semaines.',
                    'stats' => [
                        ['label' => 'Chiffre du mois (CHF)', 'value' => '48 200', 'change' => '9', 'direction' => 'up'],
                        ['label' => 'Commandes', 'value' => '316', 'change' => '4', 'direction' => 'up'],
                        ['label' => 'Ruptures', 'value' => '3'],
                    ],
                    'tableTitle' => 'Ce qui bouge',
                    'tableBody' => 'Les dix références suivies de près, avec ce qu’il en reste.',
                    'columns' => ['Référence', 'Rayon', 'Stock', 'État'],
                    'rows' => [
                        ['Huile d’olive Nocellara', 'Épicerie', '42', 'En stock'],
                        ['Café de spécialité, Guji', 'Torréfaction', '8', 'À recommander'],
                        ['Miel de sapin des Préalpes', 'Épicerie', '0', 'Rupture'],
                        ['Chasselas de Villette', 'Cave', '96', 'En stock'],
                        ['Vinaigre de Barolo', 'Épicerie', '2', 'Rupture'],
                        ['Vermouth artisanal', 'Cave', '0', 'Rupture'],
                        ['Thé vert sencha', 'Torréfaction', '31', 'En stock'],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Trois références en rupture',
                        'body' => 'Le réassort est annoncé pour jeudi. Les commandes concernées sont en attente et rien n’est facturé avant le départ.',
                    ],
                    'panelTitle' => 'Le panier du mois',
                    'panelBody' => 'Six produits choisis selon la saison, livrés le premier jeudi. Quatre-vingt-seize abonnés, huit places libres.',
                ],
            ],
            'catalogue' => [
                'label' => 'Catalogue',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.catalogue',
                'data' => [
                    'title' => 'Le catalogue',
                    'body' => 'Quarante-deux références, renouvelées au fil des saisons. Quarante producteurs, tous à moins de deux heures de route.',
                    'items' => [
                        ['title' => 'Huile d’olive Nocellara', 'subtitle' => '50 cl · Sicile', 'meta' => '24.—', 'tag' => 'Épicerie'],
                        ['title' => 'Vinaigre de Barolo', 'subtitle' => '25 cl · Piémont', 'meta' => '29.—', 'tag' => 'Rupture'],
                        ['title' => 'Miel de sapin des Préalpes', 'subtitle' => '500 g', 'meta' => '21.—', 'tag' => 'Rupture'],
                        ['title' => 'Café de spécialité, Guji', 'subtitle' => '250 g · Éthiopie', 'meta' => '18.—', 'tag' => 'Torréfaction'],
                        ['title' => 'Café de spécialité, Huila', 'subtitle' => '250 g · Colombie', 'meta' => '17.—', 'tag' => 'Torréfaction'],
                        ['title' => 'Thé vert sencha', 'subtitle' => '100 g · Uji', 'meta' => '23.—', 'tag' => 'Torréfaction'],
                        ['title' => 'Chasselas de Villette', 'subtitle' => '75 cl · Lavaux', 'meta' => '19.—', 'tag' => 'Cave'],
                        ['title' => 'Cornalin du Valais', 'subtitle' => '75 cl · Sierre', 'meta' => '28.—', 'tag' => 'Cave'],
                        ['title' => 'Vermouth artisanal', 'subtitle' => '50 cl · Turin', 'meta' => '32.—', 'tag' => 'Rupture'],
                    ],
                    'columns' => ['Référence', 'Format', 'Rayon', 'Prix'],
                    'action' => 'Commander',
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Trois références en rupture',
                        'body' => 'Le réassort est annoncé pour jeudi. Les commandes concernées sont en attente et rien n’est facturé avant le départ.',
                    ],
                ],
            ],
            'ouverture' => [
                'label' => 'Ouverture',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Ouverture',
                    'body' => 'Fermé le lundi, jour de réassort. Le samedi ne ferme pas à midi.',
                    'notice' => [
                        'tone' => 'info',
                        'title' => 'Livraison du jeudi',
                        'body' => 'Les commandes pour la tournée du jeudi se passent jusqu’au mercredi 17h, Lausanne et Pully.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => 'Fermé'],
                        ['term' => 'Mardi', 'value' => '09h00 – 13h00 · 14h00 – 18h30'],
                        ['term' => 'Mercredi', 'value' => '09h00 – 13h00 · 14h00 – 18h30'],
                        ['term' => 'Jeudi', 'value' => '09h00 – 13h00 · 14h00 – 18h30'],
                        ['term' => 'Vendredi', 'value' => '09h00 – 13h00 · 14h00 – 19h00'],
                        ['term' => 'Samedi', 'value' => '09h00 – 17h00, sans interruption'],
                        ['term' => 'Dimanche', 'value' => 'Fermé'],
                    ],
                    'marked' => [1, 7],
                    'legend' => 'Jours marqués : boutique fermée.',
                    'panelTitle' => 'Commandes d’entreprise',
                    'panelBody' => 'Paniers de fin d’année, corbeilles et cartons de vin : un devis part dans la journée.',
                ],
            ],
            'compte' => [
                'label' => 'Compte client',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Ouvrir un compte client',
                    'body' => 'Pour la facturation mensuelle et le retrait en boutique.',
                    'formTitle' => 'Ouvrir un compte client',
                    'formBody' => 'Nous confirmons par courriel dans la journée.',
                    'choiceLabel' => 'Fréquence',
                    'choices' => [
                        'hebdo' => 'Chaque semaine',
                        'quinzaine' => 'Tous les quinze jours',
                        'mois' => 'Chaque mois',
                    ],
                    'choice' => 'quinzaine',
                    'legend' => 'Réception',
                    'options' => [
                        ['value' => 'boutique', 'label' => 'Retrait en boutique', 'hint' => 'Du mardi au samedi, aux heures d’ouverture.'],
                        ['value' => 'livraison', 'label' => 'Livraison', 'hint' => 'Lausanne et Pully, le jeudi après-midi.'],
                    ],
                    'selected' => 'boutique',
                    'placeholder' => 'Raison sociale, adresse de facturation, références suivies…',
                    'consent' => [
                        'label' => 'Recevoir les arrivages',
                        'hint' => 'Un courriel par quinzaine, jamais davantage.',
                    ],
                    'submit' => 'Créer le compte',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Facturation mensuelle',
                        'body' => 'Une facture le dernier jour du mois, payable à trente jours. Le compte s’ouvre dès la première commande.',
                    ],
                ],
            ],
        ];
    }

    /**
     * A physiotherapy practice. What it opens on is the day's diary, because
     * that is the screen the people who work here have open all day.
     *
     * @return array<string, Section>
     */
    private static function health(): array
    {
        return [
            'agenda' => [
                'label' => 'Agenda',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.agenda',
                'data' => [
                    'title' => 'La journée',
                    'body' => 'Un dossier par patient, partagé entre les quatre thérapeutes. Deux créneaux restent gardés chaque matin pour les cas aigus.',
                    'columns' => ['Heure', 'Séance'],
                    'groups' => [
                        'Ce matin' => [
                            ['text' => 'Camille Rey · rééducation du genou · 6e séance · salle 2', 'time' => '08:30', 'tone' => 'accent'],
                            ['text' => 'Dominique Roch · lombalgie · 2e séance · salle 1', 'time' => '09:15'],
                            ['text' => 'Créneau gardé · libéré à 8h s’il n’est pas pris', 'time' => '09:45'],
                            ['text' => 'Sacha Meyer · suivi post-opératoire · 11e séance · salle 3', 'time' => '10:00'],
                        ],
                        'Cet après-midi' => [
                            ['text' => 'Salle d’appareils · programme libre, six patients', 'time' => '14:00', 'tone' => 'highlight'],
                            ['text' => 'Noa Perrin · première évaluation · 45 min · salle 2', 'time' => '15:30'],
                            ['text' => 'Ondes de choc · tendinopathie d’Achille · salle 1', 'time' => '16:45'],
                        ],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Créneaux d’urgence',
                        'body' => 'Deux créneaux sont gardés chaque matin pour les cas aigus. Ils se libèrent à 8h s’ils n’ont pas été pris.',
                    ],
                ],
            ],
            'prestations' => [
                'label' => 'Prestations',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.pricelist',
                'data' => [
                    'title' => 'Les prestations',
                    'body' => 'Les séances durent trente ou quarante-cinq minutes. Le tiers payant est adressé directement à la caisse.',
                    'tabs' => ['Tout', 'Séances', 'Appareils'],
                    'groups' => [
                        'Séances' => [
                            ['title' => 'Physiothérapie générale', 'subtitle' => '30 min', 'meta' => '52.—'],
                            ['title' => 'Première évaluation', 'subtitle' => '45 min', 'meta' => '78.—'],
                            ['title' => 'Thérapie manuelle', 'subtitle' => '30 min · sur ordonnance', 'meta' => '58.—'],
                        ],
                        'Rééducation' => [
                            ['title' => 'Suivi post-opératoire', 'subtitle' => '45 min · série de 9', 'meta' => '78.—'],
                            ['title' => 'Traumatologie du sport', 'subtitle' => '45 min', 'meta' => '78.—'],
                            ['title' => 'Rééducation respiratoire', 'subtitle' => '30 min', 'meta' => '52.—'],
                        ],
                        'Appareils' => [
                            ['title' => 'Salle d’appareils, la séance', 'subtitle' => 'Sur programme', 'meta' => '28.—'],
                            ['title' => 'Salle d’appareils, dix séances', 'subtitle' => 'Valable six mois', 'meta' => '240.—'],
                            ['title' => 'Ondes de choc', 'subtitle' => '20 min', 'meta' => '65.—'],
                        ],
                    ],
                    'columns' => ['Famille', 'Prestation', 'Tarif'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Tiers payant',
                        'body' => 'La facture part directement à la caisse. Vous ne recevez que la part qui reste à votre charge.',
                    ],
                ],
            ],
            'equipe' => [
                'label' => 'L’équipe',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.people',
                'data' => [
                    'title' => 'L’équipe',
                    'body' => 'Quatre thérapeutes, une secrétaire, et la salle d’appareils.',
                    'people' => [
                        ['title' => 'Anne Girardin', 'subtitle' => 'Thérapie manuelle · lundi à jeudi'],
                        ['title' => 'Marc Délèze', 'subtitle' => 'Traumatologie du sport · lundi à vendredi'],
                        ['title' => 'Sofia Renaud', 'subtitle' => 'Rééducation post-opératoire · mardi à vendredi'],
                        ['title' => 'Karim Benali', 'subtitle' => 'Respiratoire et gériatrie · lundi, mercredi, vendredi'],
                    ],
                    'factsTitle' => 'En pratique',
                    'facts' => [
                        ['term' => 'Salles', 'value' => 'Trois, plus la salle d’appareils'],
                        ['term' => 'Dossier', 'value' => 'Un par patient, partagé entre les quatre'],
                        ['term' => 'Facturation', 'value' => 'Tiers payant, directement à la caisse'],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Changer de thérapeute',
                        'body' => 'Le dossier suit le patient, pas le thérapeute. Un changement en cours de série ne recommence rien.',
                    ],
                ],
            ],
            'rendez-vous' => [
                'label' => 'Rendez-vous',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.booking',
                'data' => [
                    'title' => 'Prendre rendez-vous',
                    'body' => 'Le jour, le motif et le moment. La confirmation part par SMS.',
                    'slotLabel' => 'Heure',
                    'slots' => [
                        '07:30' => '07h30',
                        '09:15' => '09h15',
                        '11:00' => '11h00',
                        '14:00' => '14h00',
                        '16:30' => '16h30',
                        '18:15' => '18h15',
                    ],
                    'slot' => '09:15',
                    'legend' => 'Motif',
                    'options' => [
                        ['value' => 'dos', 'label' => 'Dos et nuque', 'hint' => 'Lombalgie, cervicalgie, sciatique.'],
                        ['value' => 'sport', 'label' => 'Traumatologie du sport', 'hint' => 'Entorse, tendinopathie, reprise.'],
                        ['value' => 'post', 'label' => 'Suivi post-opératoire', 'hint' => 'Sur ordonnance, en série de neuf.'],
                    ],
                    'selected' => 'dos',
                    'placeholder' => 'Le motif, la date de l’ordonnance, le nom du médecin…',
                    'summaryTitle' => 'La séance',
                    'summary' => [
                        ['term' => 'Durée', 'value' => '30 min, 45 min pour une première'],
                        ['term' => 'Ordonnance', 'value' => 'Utile, pas indispensable'],
                        ['term' => 'Annulation', 'value' => 'Libre jusqu’à 24 h avant'],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Séance non décommandée',
                        'body' => 'Une séance annulée moins de 24 h à l’avance est facturée au patient : la caisse ne la prend pas en charge.',
                    ],
                ],
            ],
            'contact' => [
                'label' => 'Contact',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Nous écrire',
                    'body' => 'Pour une ordonnance, une question de facturation ou un dossier à transmettre.',
                    'formTitle' => 'Votre demande',
                    'formBody' => 'Nous répondons par courriel dans la demi-journée.',
                    'choiceLabel' => 'Assurance',
                    'choices' => [
                        'base' => 'Assurance de base',
                        'complementaire' => 'Complémentaire',
                        'accident' => 'Accident (LAA)',
                        'prive' => 'À ma charge',
                    ],
                    'choice' => 'base',
                    'legend' => 'Moment',
                    'options' => [
                        ['value' => 'matin', 'label' => 'Le matin', 'hint' => 'Entre 7h30 et 12h00.'],
                        ['value' => 'apres-midi', 'label' => 'L’après-midi', 'hint' => 'Entre 13h30 et 19h00.'],
                    ],
                    'selected' => 'matin',
                    'placeholder' => 'Le motif, la date de l’ordonnance, le nom du médecin…',
                    'consent' => [
                        'label' => 'Rappel par SMS la veille',
                        'hint' => 'Un seul message, envoyé à 18h.',
                    ],
                    'submit' => 'Envoyer la demande',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Tiers payant',
                        'body' => 'La facture part directement à la caisse. Vous ne recevez que la part qui reste à votre charge.',
                    ],
                ],
            ],
        ];
    }

    /**
     * A language school. Its catalogue is the only one with a capacity on every
     * item, because a course that nobody can still join is not for sale.
     *
     * @return array<string, Section>
     */
    private static function education(): array
    {
        return [
            'tableau' => [
                'label' => 'Tableau',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.dashboard',
                'data' => [
                    'title' => 'La session',
                    'body' => 'Quatre langues et douze semaines par session. Un cours qui ne réunit pas quatre inscrits est reporté.',
                    'stats' => [
                        ['label' => 'Étudiants inscrits', 'value' => '428', 'change' => '11', 'direction' => 'up'],
                        ['label' => 'Cours ouverts', 'value' => '12', 'change' => '2', 'direction' => 'up'],
                        ['label' => 'Places libres', 'value' => '36', 'change' => '5', 'direction' => 'down'],
                    ],
                    'tableTitle' => 'Les cours ouverts',
                    'tableBody' => 'Douze cours, quatre langues, du niveau A1 au C1.',
                    'columns' => ['Cours', 'Niveau', 'Salle', 'Places'],
                    'rows' => [
                        ['Français intensif', 'B1', 'Salle 4', '4 libres'],
                        ['Allemand du soir', 'A2', 'Salle 2', '9 libres'],
                        ['Italien conversation', 'B2', 'Salle 1', '2 libres'],
                        ['Anglais des affaires', 'C1', 'Salle 3', 'Complet'],
                        ['Allemand intensif', 'A2', 'Salle 3', '6 libres'],
                        ['Préparation DELF B2', 'B2', 'Salle 2', '3 libres'],
                    ],
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Session remplie à 92%',
                        'body' => 'Les deux dernières places d’italien partent vite. Les inscriptions ferment le 28.',
                    ],
                    'panelTitle' => 'Test de niveau',
                    'panelBody' => 'Vingt minutes en ligne, gratuit, avant de choisir un cours. C’est le test qui décide du groupe, jamais la déclaration.',
                ],
            ],
            'cours' => [
                'label' => 'Les cours',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.catalogue',
                'data' => [
                    'title' => 'Les cours',
                    'body' => 'Huit étudiants par groupe au maximum. Le tarif est celui de la session entière, douze semaines.',
                    'items' => [
                        ['title' => 'Français intensif', 'subtitle' => 'B1 · lu – je, 09:00 · salle 4', 'meta' => '890.—', 'tag' => '4 places', 'capacity' => 50],
                        ['title' => 'Allemand intensif', 'subtitle' => 'A2 · lu – je, 09:00 · salle 3', 'meta' => '890.—', 'tag' => '6 places', 'capacity' => 25],
                        ['title' => 'Anglais intensif', 'subtitle' => 'B2 · lu – je, 09:00 · salle 1', 'meta' => '890.—', 'tag' => '1 place', 'capacity' => 88],
                        ['title' => 'Allemand du soir', 'subtitle' => 'A2 · ma et je, 18:30 · salle 2', 'meta' => '620.—', 'tag' => '9 places', 'capacity' => 12],
                        ['title' => 'Français du soir', 'subtitle' => 'A1 · lu et me, 18:30 · salle 4', 'meta' => '620.—', 'tag' => '5 places', 'capacity' => 38],
                        ['title' => 'Italien du soir', 'subtitle' => 'B1 · ma et je, 18:30 · salle 1', 'meta' => '620.—', 'tag' => '3 places', 'capacity' => 63],
                        ['title' => 'Italien conversation', 'subtitle' => 'B2 · me, 12:15 · salle 1', 'meta' => '380.—', 'tag' => '2 places', 'capacity' => 75],
                        ['title' => 'Anglais des affaires', 'subtitle' => 'C1 · ve, 08:00 · salle 3', 'meta' => '480.—', 'tag' => 'Complet', 'capacity' => 100],
                        ['title' => 'Préparation DELF B2', 'subtitle' => 'Huit semaines · salle 2', 'meta' => '540.—', 'tag' => '3 places', 'capacity' => 63],
                    ],
                    'columns' => ['Cours', 'Horaire', 'Places', 'Tarif'],
                    'action' => 'S’inscrire',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Session remplie à 92%',
                        'body' => 'Les deux dernières places d’italien partent vite. Les inscriptions ferment le 28.',
                    ],
                ],
            ],
            'horaires' => [
                'label' => 'Horaires',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Horaires',
                    'body' => 'Les cours intensifs occupent les matinées, les cours du soir deux soirs par semaine.',
                    'notice' => [
                        'tone' => 'info',
                        'title' => 'Semaine d’examens',
                        'body' => 'La dernière semaine de session est réservée aux examens : la salle 4 ne se réserve pas.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => '09h00 – 12h00 · 18h30 – 20h00'],
                        ['term' => 'Mardi', 'value' => '09h00 – 12h00 · 18h30 – 20h00'],
                        ['term' => 'Mercredi', 'value' => '09h00 – 12h00 · 12h15 – 13h15'],
                        ['term' => 'Jeudi', 'value' => '09h00 – 12h00 · 18h30 – 20h00'],
                        ['term' => 'Vendredi', 'value' => '08h00 – 09h30 · 09h00 – 12h00'],
                        ['term' => 'Samedi', 'value' => 'Examens, sur convocation'],
                        ['term' => 'Dimanche', 'value' => 'Fermé'],
                    ],
                    'marked' => [6, 7],
                    'legend' => 'Jours marqués : pas de cours ordinaire.',
                    'panelTitle' => 'Cours en entreprise',
                    'panelBody' => 'Sur site, à l’heure qui vous arrange, dès quatre participants. Un devis part dans la semaine.',
                ],
            ],
            'enseignants' => [
                'label' => 'Enseignants',
                'layout' => KitLayout::Marketing,
                'view' => 'framework.sections.people',
                'data' => [
                    'title' => 'Les enseignants',
                    'body' => 'Neuf enseignants, tous de langue maternelle, tous formés à l’enseignement aux adultes.',
                    'people' => [
                        ['title' => 'Élodie Charrière', 'subtitle' => 'Français · A1 à C1'],
                        ['title' => 'Stefan Wyss', 'subtitle' => 'Allemand · A1 à B2'],
                        ['title' => 'Giulia Moretti', 'subtitle' => 'Italien · A1 à C1'],
                        ['title' => 'Owen Blake', 'subtitle' => 'Anglais · B1 à C1, affaires'],
                    ],
                    'factsTitle' => 'L’institut',
                    'facts' => [
                        ['term' => 'Groupes', 'value' => 'Huit étudiants au maximum'],
                        ['term' => 'Niveau', 'value' => 'Décidé par le test, pas par la déclaration'],
                        ['term' => 'Examens', 'value' => 'DELF, Goethe et Cambridge'],
                    ],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Changer de groupe',
                        'body' => 'Un changement de niveau reste possible les deux premières semaines, sans frais et sans refaire le test.',
                    ],
                ],
            ],
            'inscription' => [
                'label' => 'Inscription',
                'layout' => KitLayout::Focus,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'S’inscrire à un cours',
                    'body' => 'Le test de niveau se passe en ligne en vingt minutes, avant de choisir.',
                    'formTitle' => 'S’inscrire à un cours',
                    'formBody' => 'Nous répondons sous deux jours ouvrables.',
                    'choiceLabel' => 'Langue',
                    'choices' => [
                        'fr' => 'Français',
                        'de' => 'Allemand',
                        'it' => 'Italien',
                        'en' => 'Anglais',
                    ],
                    'choice' => 'fr',
                    'legend' => 'Rythme',
                    'options' => [
                        ['value' => 'intensif', 'label' => 'Intensif', 'hint' => 'Du lundi au jeudi, de 9h à 12h.'],
                        ['value' => 'soir', 'label' => 'Du soir', 'hint' => 'Deux soirs par semaine, de 18h30 à 20h.'],
                    ],
                    'selected' => 'intensif',
                    'placeholder' => 'Votre niveau estimé, la session visée, un objectif d’examen…',
                    'consent' => [
                        'label' => 'Être averti des prochaines sessions',
                        'hint' => 'Un courriel par session, quatre fois l’an.',
                    ],
                    'submit' => 'Envoyer l’inscription',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Cours reporté',
                        'body' => 'Un cours qui ne réunit pas quatre inscrits est reporté à la session suivante, et l’acompte est rendu.',
                    ],
                ],
            ],
        ];
    }

    /**
     * A regional carrier. No home page and no story: the rounds are the front
     * page, because everyone who opens this site wants to know where a parcel
     * is or when the next van leaves.
     *
     * @return array<string, Section>
     */
    private static function logistics(): array
    {
        return [
            'tournees' => [
                'label' => 'Tournées',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.dashboard',
                'data' => [
                    'title' => 'Les tournées du jour',
                    'body' => 'Quatre secteurs, deux départs par jour, onze véhicules. Chaque colis est scanné au chargement et à la remise.',
                    'stats' => [
                        ['label' => 'Livraisons du jour', 'value' => '214', 'change' => '7', 'direction' => 'up'],
                        ['label' => 'En retard', 'value' => '6', 'change' => '2', 'direction' => 'down'],
                        ['label' => 'Taux de remplissage', 'value' => '88%'],
                    ],
                    'tableTitle' => 'En route',
                    'tableBody' => 'L’état de chaque tournée, rafraîchi au scan.',
                    'columns' => ['Tournée', 'Chauffeur', 'Arrêts', 'État'],
                    'rows' => [
                        ['T-14 · Lavaux', 'Camille Rey', '18', 'En route'],
                        ['T-15 · Gros-de-Vaud', 'Dominique Roch', '22', '+40 min'],
                        ['T-16 · Chablais', 'Sacha Meyer', '14', 'Terminée'],
                        ['T-17 · Lausanne nord', 'Noa Perrin', '26', 'En route'],
                        ['T-18 · Lausanne sud', 'Yann Progin', '21', 'Au quai'],
                    ],
                    'alert' => [
                        'tone' => 'warning',
                        'title' => 'Route de Berne fermée',
                        'body' => 'La déviation ajoute vingt minutes aux tournées du Gros-de-Vaud jusqu’à vendredi.',
                    ],
                    'panelTitle' => 'Tournée dédiée',
                    'panelBody' => 'Un véhicule et un chauffeur sur vos horaires, du lundi au vendredi. Un devis part dans la journée.',
                ],
            ],
            'prestations' => [
                'label' => 'Prestations',
                'layout' => KitLayout::Workspace,
                'view' => 'framework.sections.pricelist',
                'data' => [
                    'title' => 'Les prestations',
                    'body' => 'Les tarifs sont par envoi, hors suppléments de secteur. Le suivi est compris partout.',
                    'tabs' => ['Tout', 'Envois', 'Contrats'],
                    'groups' => [
                        'Envois' => [
                            ['title' => 'Colis jusqu’à 10 kg', 'subtitle' => 'Lendemain avant midi', 'meta' => '12.—'],
                            ['title' => 'Colis jusqu’à 30 kg', 'subtitle' => 'Lendemain avant midi', 'meta' => '22.—'],
                            ['title' => 'Palette, jusqu’à 400 kg', 'subtitle' => 'Hayon compris', 'meta' => '84.—'],
                        ],
                        'Express' => [
                            ['title' => 'Course directe', 'subtitle' => 'Dans les trois heures', 'meta' => 'dès 95.—'],
                            ['title' => 'Départ du jour même', 'subtitle' => 'Enlèvement avant 11h', 'meta' => '+18.—'],
                            ['title' => 'Livraison sur rendez-vous', 'subtitle' => 'Créneau de deux heures', 'meta' => '+14.—'],
                        ],
                        'Contrats' => [
                            ['title' => 'Tournée dédiée, au mois', 'subtitle' => 'Cinq jours par semaine', 'meta' => 'dès 2 400.—'],
                            ['title' => 'Stockage au dépôt, la palette', 'subtitle' => 'Au mois', 'meta' => '38.—'],
                            ['title' => 'Préparation de commande', 'subtitle' => 'À la ligne', 'meta' => '1.20'],
                        ],
                    ],
                    'columns' => ['Famille', 'Prestation', 'Tarif'],
                    'alert' => [
                        'tone' => 'info',
                        'title' => 'Suppléments de secteur',
                        'body' => 'Le Chablais et les vallées latérales ajoutent 8.— par envoi. Le supplément est sur le devis, jamais sur la facture seule.',
                    ],
                ],
            ],
            'departs' => [
                'label' => 'Départs',
                'layout' => KitLayout::Console,
                'view' => 'framework.sections.hours',
                'data' => [
                    'title' => 'Les départs',
                    'body' => 'Deux départs par jour. Ce qui entre après le second part le lendemain matin.',
                    'notice' => [
                        'tone' => 'info',
                        'title' => 'Enlèvement le jour même',
                        'body' => 'Demandé avant 11h, il part au départ de 13h. Au-delà, il est repris au départ de 6h le lendemain.',
                    ],
                    'week' => [
                        ['term' => 'Lundi', 'value' => 'Départs 06h00 et 13h00'],
                        ['term' => 'Mardi', 'value' => 'Départs 06h00 et 13h00'],
                        ['term' => 'Mercredi', 'value' => 'Départs 06h00 et 13h00'],
                        ['term' => 'Jeudi', 'value' => 'Départs 06h00 et 13h00'],
                        ['term' => 'Vendredi', 'value' => 'Départs 06h00 et 13h00'],
                        ['term' => 'Samedi', 'value' => 'Départ 06h00, dépôt fermé l’après-midi'],
                        ['term' => 'Dimanche', 'value' => 'Fermé'],
                    ],
                    'marked' => [7],
                    'legend' => 'Jours marqués : pas de départ.',
                    'panelTitle' => 'Stockage au dépôt',
                    'panelBody' => 'Six cents emplacements palette, facturés au mois, avec préparation de commande à la ligne.',
                ],
            ],
            'enlevement' => [
                'label' => 'Enlèvement',
                'layout' => KitLayout::Stacked,
                'view' => 'framework.sections.enquiry',
                'data' => [
                    'title' => 'Planifier un enlèvement',
                    'body' => 'Avant 11h pour un départ le jour même. Nous confirmons le créneau par courriel.',
                    'formTitle' => 'Planifier un enlèvement',
                    'formBody' => 'Nous confirmons le créneau par courriel.',
                    'choiceLabel' => 'Secteur',
                    'choices' => [
                        'lausanne' => 'Lausanne',
                        'lavaux' => 'Lavaux',
                        'gros-de-vaud' => 'Gros-de-Vaud',
                        'chablais' => 'Chablais',
                    ],
                    'choice' => 'lausanne',
                    'legend' => 'Départ',
                    'options' => [
                        ['value' => 'matin', 'label' => 'Départ de 6h', 'hint' => 'Enlèvement la veille, avant 17h.'],
                        ['value' => 'apres-midi', 'label' => 'Départ de 13h', 'hint' => 'Enlèvement le matin même, avant 11h.'],
                    ],
                    'selected' => 'apres-midi',
                    'placeholder' => 'Nombre de colis, poids, hayon nécessaire, horaire du quai…',
                    'consent' => [
                        'label' => 'Avis de livraison par courriel',
                        'hint' => 'Un message à la remise, avec la signature.',
                    ],
                    'submit' => 'Planifier l’enlèvement',
                    'alert' => [
                        'tone' => 'success',
                        'title' => 'Suivi',
                        'body' => 'Chaque colis est scanné au chargement et à la remise. Les deux scans sont sur l’avis de livraison.',
                    ],
                ],
            ],
        ];
    }
}
