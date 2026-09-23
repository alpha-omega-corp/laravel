<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'UI-Kit',
        'intro' => 'Alle Elemente des gemeinsamen Kits, von Tailwinds Standardpalette auf die Tokens dieser Anwendung umgestellt. Ein Element je Gruppe im Kit, nicht je Datei: die sechs Schaltflächendateien sind eine Komponente mit Variante. Wechseln Sie Palette oder Hell/Dunkel in der Navigationsleiste, und die ganze Seite zieht mit.',
    ],

    'group' => [
        'elements' => 'Elemente',
        'feedback' => 'Rückmeldung',
        'forms' => 'Formulare',
        'data_display' => 'Daten',
        'lists' => 'Listen',
        'navigation' => 'Navigation',
        'overlays' => 'Überlagerungen',
        'headings' => 'Überschriften',
        'layout' => 'Layout',
    ],

    'element' => [
        'avatar' => [
            'label' => 'Avatar',
            'summary' => 'Eine Person in fünf Größen, rund oder eckig, mit optionalem Statuspunkt. Ohne Bild bleibt die Initiale.',
        ],
        'badge' => [
            'label' => 'Abzeichen',
            'summary' => 'Ein kleines Etikett mit Bedeutung statt Farbton: neutral, Akzent, Hervorhebung oder Kontur.',
        ],
        'button' => [
            'label' => 'Schaltfläche',
            'summary' => 'Vier Füllungen, fünf Größen, mit oder ohne Symbol. Schatten, Ecke und Druck gehören der Palette.',
        ],
        'button_group' => [
            'label' => 'Schaltflächengruppe',
            'summary' => 'Zu einer Leiste verschmolzene Schaltflächen. Die Ecke gehört der Palette, also tragen sie nur die beiden Enden.',
        ],
        'dropdown' => [
            'label' => 'Aufklappmenü',
            'summary' => 'Ein Menü an einer Schaltfläche, vom Browser über Tailwind Plus Elements geöffnet, nicht von unserem Skript.',
        ],
        'alert' => [
            'label' => 'Hinweis',
            'summary' => 'Eine Meldung an Ort und Stelle, in einem von vier Tönen, bei Bedarf mit Aktionen darunter.',
        ],
        'empty_state' => [
            'label' => 'Leerzustand',
            'summary' => 'Was eine Liste sagt, die noch nichts hat. Gestrichelt, wenn man etwas hineinlegen könnte.',
        ],
        'action_panel' => [
            'label' => 'Aktionsfläche',
            'summary' => 'Eine Fläche, deren ganzer Zweck das eine Bedienelement an ihrem Ende ist.',
        ],
        'checkbox' => [
            'label' => 'Kontrollkästchen',
            'summary' => 'Das native Kästchen, von accent-color gefärbt, mit Beschriftung und optionalem Hinweis.',
        ],
        'combobox' => [
            'label' => 'Kombinationsfeld',
            'summary' => 'Ein Textfeld mit datalist: tippen zum Filtern oder die Liste öffnen. Ohne Skript, fällt auf ein einfaches Feld zurück.',
        ],
        'form_layout' => [
            'label' => 'Formularlayout',
            'summary' => 'Ein oder zwei Spalten Felder in einer Fläche, die Aktionen auf einer Linie am Fuß.',
        ],
        'input' => [
            'label' => 'Eingabefeld',
            'summary' => 'Ein beschriftetes Feld mit Hinweis, Fehler und Zusatz vorn oder hinten.',
        ],
        'radio_group' => [
            'label' => 'Optionsfeldgruppe',
            'summary' => 'Eine Wahl aus mehreren, als Liste von Punkten oder als Fläche je Option.',
        ],
        'select' => [
            'label' => 'Auswahlfeld',
            'summary' => 'Ein natives select. Die Listbox des Kits braucht Skript und Popover für das, was der Browser schon kann.',
        ],
        'sign_in' => [
            'label' => 'Anmeldeformular',
            'summary' => 'Die schmale Feldspalte, in einer Fläche oder direkt auf der Seite.',
        ],
        'textarea' => [
            'label' => 'Textbereich',
            'summary' => 'Dasselbe Feldwerk wie die Eingabe, mit Platz für einen Absatz.',
        ],
        'toggle' => [
            'label' => 'Schalter',
            'summary' => 'Ein Kästchen, das eine Schiene zeichnet: geht mit dem Formular mit und behält die Tastatur des Browsers.',
        ],
        'calendar' => [
            'label' => 'Kalender',
            'summary' => 'Ein Monatsraster, berechnet statt abgeschrieben, mit gewähltem und markierten Tagen.',
        ],
        'description_list' => [
            'label' => 'Beschreibungsliste',
            'summary' => 'Begriffe und Werte in Zeilen, auf Wunsch gestreift.',
        ],
        'stat' => [
            'label' => 'Kennzahl',
            'summary' => 'Eine Zahl, ihre Beschriftung und ihre Veränderung. Die Zahl nimmt die Anzeigestufe der Palette.',
        ],
        'feed' => [
            'label' => 'Aktivitätsstrom',
            'summary' => 'Eine Zeitleiste, deren Linie hinter den Marken läuft statt zwischen den Zeilen.',
        ],
        'grid_list' => [
            'label' => 'Rasterliste',
            'summary' => 'Karten in zwei, drei oder vier Spalten, jede mit einem Avatar.',
        ],
        'stacked_list' => [
            'label' => 'Gestapelte Liste',
            'summary' => 'Zeilen in einer Fläche, oder eine Fläche je Zeile.',
        ],
        'table' => [
            'label' => 'Tabelle',
            'summary' => 'Spalten und Zeilen mit Kopfband, Titel und Aktion, die notfalls seitlich scrollt.',
        ],
        'breadcrumb' => [
            'label' => 'Brotkrumen',
            'summary' => 'Der Weg zurück nach oben, der letzte Eintrag ist die Seite selbst.',
        ],
        'command_palette' => [
            'label' => 'Befehlspalette',
            'summary' => 'Das Suchfeld und seine Treffer, offen gezeigt — ein geschlossener Dialog zeigt nichts.',
        ],
        'navbar' => [
            'label' => 'Navigationsleiste',
            'summary' => 'Die Leiste für sich, für eine Seite, die nicht das Anwendungsgerüst ist.',
        ],
        'pagination' => [
            'label' => 'Seitennummerierung',
            'summary' => 'Zurück und weiter, mit den Nummern dazwischen oder nur einer Zählung.',
        ],
        'progress' => [
            'label' => 'Fortschritt',
            'summary' => 'Eine gefüllte Schiene, oder derselbe Wert als Reihe von Schritten.',
        ],
        'side_nav' => [
            'label' => 'Seitennavigation',
            'summary' => 'Die Spalte links auf dieser Seite. Zwei Füllungen, Symbole und Zähler nach Wunsch, und sie findet die aktuelle Zeile selbst.',
        ],
        'tabs' => [
            'label' => 'Reiter',
            'summary' => 'Eine Reihe von Abschnitten, unterstrichen oder als Pillen.',
        ],
        'vertical_nav' => [
            'label' => 'Vertikale Navigation',
            'summary' => 'Die Seitennavigation ohne Fläche, für eine Spalte, die schon eine hat.',
        ],
        'drawer' => [
            'label' => 'Schublade',
            'summary' => 'Die Dialogfläche an eine Kante geheftet, über die volle Höhe. Nativer Dialog, hier an Ort gezeigt.',
        ],
        'modal' => [
            'label' => 'Modaler Dialog',
            'summary' => 'Ein nativer Dialog: oberste Ebene, Schleier, Escape und Fokusfalle gehören dem Browser.',
        ],
        'notification' => [
            'label' => 'Benachrichtigung',
            'summary' => 'Eine erhobene Fläche für die Ecke, in der eine Live-Region sie stapelt.',
        ],
        'card_heading' => [
            'label' => 'Kartenkopf',
            'summary' => 'Das Kopfband einer Fläche, mit der Linie, die es vom Rumpf trennt.',
        ],
        'page_heading' => [
            'label' => 'Seitenkopf',
            'summary' => 'Der Titel einer Seite, ihre Brotkrumen, ihre Angaben und ihre Aktionen.',
        ],
        'section_heading' => [
            'label' => 'Abschnittskopf',
            'summary' => 'Eine Linie unter einem Titel, mit einer Aktion oder einer Reihe Reiter darauf.',
        ],
    ],

    'demo' => [
        'live' => 'Live',
        'small' => 'Klein',
        'save' => 'Speichern',
        'cancel' => 'Abbrechen',
        'duplicate' => 'Duplizieren',
        'discard' => 'Verwerfen',
        'disabled' => 'Deaktiviert',
        'add' => 'Hinzufügen',
        'edit' => 'Bearbeiten',
        'archive' => 'Archivieren',
        'options' => 'Optionen',
        'sort' => 'Sortieren',
        'newest' => 'Neueste zuerst',
        'oldest' => 'Älteste zuerst',
        'day' => 'Tag',
        'week' => 'Woche',
        'month' => 'Monat',
        'review' => 'Prüfen',
        'dismiss' => 'Schließen',
        'confirm' => 'Bestätigen',
        'delete' => 'Löschen',
        'publish' => 'Veröffentlichen',
        'alert' => [
            'info' => 'Ein Zertifikat erneuert sich in drei Tagen',
            'success' => 'Die Website ist online',
            'warning' => 'Zwei Websites laufen auf altem PHP',
            'danger' => 'Der letzte Rollout ist fehlgeschlagen',
            'body' => 'Von Ihnen wird gerade nichts verlangt; so würde die Fläche es sagen.',
        ],
        'empty' => [
            'title' => 'Noch keine Kunden',
            'body' => 'Der erste, den Sie anlegen, erscheint hier mit seinen Websites.',
        ],
        'panel' => [
            'title' => 'Dieses Projekt übertragen',
            'body' => 'Es wechselt mit Websites und Zertifikaten auf ein anderes Konto.',
            'action' => 'Übertragen',
        ],
        'check' => [
            'notify' => 'Mailen, wenn ein Deploy fehlschlägt',
            'digest' => 'Wöchentliche Zusammenfassung senden',
            'hint' => 'Nur für Projekte, die Ihnen gehören.',
        ],
        'combo' => [
            'label' => 'Land',
            'placeholder' => 'Tippen Sie los…',
        ],
        'form' => [
            'title' => 'Profil',
            'description' => 'Wie Sie dem Rest des Teams erscheinen.',
            'first' => 'Vorname',
            'last' => 'Nachname',
            'email' => 'E-Mail',
            'about' => 'Über',
        ],
        'input' => [
            'label' => 'Kundenname',
            'placeholder' => 'Atelier Verd',
            'site' => 'Website',
            'price' => 'Monatlich',
            'hint' => 'Abgerechnet am Ersten des Monats.',
            'error' => 'Dieser Name ist schon vergeben.',
        ],
        'radio' => [
            'legend' => 'Tarif',
            'solo' => 'Solo',
            'team' => 'Team',
            'solo_hint' => 'Eine Person, fünf Websites.',
            'team_hint' => 'Bis zehn Personen, unbegrenzt Websites.',
        ],
        'select' => [
            'label' => 'Sprache',
            'hint' => 'Für Rechnungen und E-Mail.',
        ],
        'signin' => [
            'title' => 'Anmelden',
            'password' => 'Passwort',
            'remember' => 'Angemeldet bleiben',
        ],
        'textarea' => [
            'label' => 'Notiz',
            'hint' => 'Sichtbar für alle mit Zugriff auf den Kunden.',
        ],
        'toggle' => [
            'public' => 'Öffentliche Website',
            'beta' => 'Dem Beta-Kanal beitreten',
            'hint' => 'Wer den Link hat, kommt hin.',
        ],
        'dl' => [
            'title' => 'Konto',
            'description' => 'Die hinterlegten Angaben zu diesem Kunden.',
            'name' => 'Name',
            'role' => 'Rolle',
            'role_value' => 'Inhaber',
            'email' => 'E-Mail',
        ],
        'stat' => [
            'clients' => 'Kunden',
            'sites' => 'Websites',
            'uptime' => 'Verfügbarkeit',
        ],
        'feed' => [
            'deployed' => 'Camille hat atelier-verd.ch ausgerollt',
            'reviewed' => 'Dominique hat die Rechnung geprüft',
            'opened' => 'Eine Zertifikatserneuerung wurde eröffnet',
            'minutes' => 'vor 20 Minuten',
            'hours' => 'vor 3 Stunden',
            'yesterday' => 'Gestern',
        ],
        'grid' => [
            'design' => 'Design',
            'support' => 'Support',
        ],
        'list' => [
            'monthly' => 'pro Monat',
        ],
        'table' => [
            'title' => 'Rechnungen',
            'client' => 'Kunde',
            'site' => 'Website',
            'plan' => 'Tarif',
            'amount' => 'Betrag',
            'export' => 'Export',
        ],
        'crumb' => [
            'home' => 'Start',
            'clients' => 'Kunden',
        ],
        'palette' => [
            'placeholder' => 'Suchen oder Befehl ausführen…',
            'new_client' => 'Neuer Kunde',
            'new_site' => 'Neue Website',
            'settings' => 'Einstellungen',
        ],
        'progress' => [
            'migration' => 'Migration',
            'setup' => 'Einrichtung',
        ],
        'nav' => [
            'workspace' => 'Arbeitsbereich',
        ],
        'tab' => [
            'overview' => 'Übersicht',
            'billing' => 'Abrechnung',
        ],
        'drawer' => [
            'title' => 'Website-Details',
            'body' => 'Alles zur Website, ohne die Liste dahinter zu verlassen.',
        ],
        'modal' => [
            'title' => 'Diese Website veröffentlichen?',
            'body' => 'Sie ist binnen einer Minute unter ihrer Domain erreichbar.',
            'danger' => 'Diesen Kunden löschen?',
            'danger_body' => 'Websites und Zertifikate gehen mit. Das lässt sich nicht rückgängig machen.',
        ],
        'notify' => [
            'saved' => 'Gespeichert',
            'expiring' => 'Zertifikat läuft ab',
            'body' => 'Mehr wird von Ihnen nicht gebraucht.',
        ],
        'heading' => [
            'card' => 'Websites',
            'card_description' => 'Drei Websites auf diesem Konto',
            'card_body' => 'Der Rumpf der Fläche steht unter dem Kopf.',
            'page' => 'Atelier Verd',
            'updated' => 'Vor 2 Tagen aktualisiert',
            'section' => 'Team',
            'section_description' => 'Wer diesen Kunden erreicht und was er dort darf.',
        ],
    ],

    'layouts' => [
        'title' => 'Layouts',
        'intro' => 'Alle Layout‑Komponenten des Kits — Karten, Container, Trenner, Listencontainer und Medienobjekte — von Tailwinds Standardpalette auf die Tokens dieser Anwendung umgestellt. Wechseln Sie das Thema in der Navigationsleiste, und die ganze Seite zieht mit.',

        'cards' => [
            'title' => 'Karten',
            'description' => 'Eine Fläche mit einem Rumpf und wahlweise einem Kopf, einem Fuß oder beidem. Ecke, Kante und Erhebung gehören dem Thema, das Markup bringt keine eigene Rundung mit.',
        ],

        'containers' => [
            'title' => 'Container',
            'description' => 'Der waagerechte Rahmen einer Seite: wie breit der Inhalt werden darf und wie viel Abstand er auf jeder Stufe behält.',
        ],

        'dividers' => [
            'title' => 'Trenner',
            'description' => 'Eine Linie quer über die Seite, unterbrochen von einer Beschriftung, einem Titel, einem Symbol oder einem Bedienelement.',
        ],

        'lists' => [
            'title' => 'Listencontainer',
            'description' => 'Dieselben drei Zeilen, auf sieben Arten gehalten: blank mit Trennlinien, in einer Karte oder als einzelne Karten.',
        ],

        'media' => [
            'title' => 'Medienobjekte',
            'description' => 'Eine Abbildung neben Text, oben, mittig oder unten ausgerichtet, auf dem Mobilgerät gestapelt oder eine Ebene tief verschachtelt.',
        ],

        'shells' => [
            'title' => 'Seitengerüste',
            'description' => 'Keine Varianten einer Box: drei Familien, die die Seite unterschiedlich teilen. Gestapelt setzt die Navigation über den Inhalt, die Seitenleiste daneben, und das Mehrspaltige fügt eine zweite Inhaltsspalte hinzu, die gar keine Navigation ist. Jedes ist hier schematisch, so wie das Kit sie ausliefert — echt ist, welche Spalte die restliche Breite nimmt.',
            'stacked' => 'Gestapelt',
            'sidebar' => 'Seitenleiste',
            'multi_column' => 'Mehrspaltig',
            'mobile' => 'Mobile Navigation',
            'mobile_description' => 'Das Kit liefert keine eigene mobile Navigation, denn jedes Gerüst bringt seine mit, und es sind nur drei. Ein gestapeltes Gerüst klappt ein Panel im Fluss unter der Leiste auf, der Inhalt rückt nach unten. Ein Seitenleisten‑ oder mehrspaltiges Gerüst behält eine angeheftete Leiste und öffnet die Seitenleiste selbst als Dialog über einem Schleier, mit dem Schließen‑Knopf in der Rinne daneben.',
            'mobile_columns' => 'Ein mehrspaltiges Gerüst nimmt dieselbe Leiste und dieselbe Schublade wie ein Seitenleisten‑Gerüst. Weg fällt die zweite Spalte: sie ist als xl:block deklariert, unterhalb dieser Stufe ist sie gar nicht da, und die Seite ist einspaltig. Nichts stapelt sie unter den Hauptinhalt — wenn diese Spalte auf dem Telefon zählt, muss sie von Hand zurück.',
        ],

        'label' => [
            'header' => 'Kopf',
            'body' => 'Rumpf',
            'footer' => 'Fuß',
            'continue' => 'Weiter',
            'projects' => 'Projekte',
            'action' => 'Projekt hinzufügen',
            'item' => 'Zeile',
            'media_title' => 'Ein Medienobjekt',
            'media_text' => 'Eine Abbildung auf der einen Seite, eine Überschrift und ein Absatz auf der anderen. Die Abbildung behält ihre Größe, der Text nimmt den Rest der Zeile.',
            'edit' => 'Bearbeiten',
            'attach' => 'Datei anhängen',
            'comment' => 'Kommentieren',
            'delete' => 'Löschen',
            'nav' => 'Navigation',
            'page_header' => 'Seitenkopf',
            'main' => 'Hauptinhalt',
            'sidebar' => 'Seitenleiste',
            'rail' => 'Schiene',
            'aside' => 'Zweite Spalte',
            'secondary' => 'Zweite Spalte',
            'sticky' => 'Angeheftete Spalte',
            'menu' => 'Menüpanel',
            'drawer' => 'Seitenschublade',
            'scrim' => 'Schleier',
            'closed' => 'Geschlossen',
            'open' => 'Offen',
            'constrained' => 'Begrenzter Inhalt',
        ],
    ],
];
