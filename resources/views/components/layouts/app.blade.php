@props(['site', 'c'])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fcfcfa">

    <title>{{ $c['seo']['title'] }}</title>
    <meta name="description" content="{{ $c['seo']['description'] }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    @fonts(['space-grotesk', 'ibm-plex-sans'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-canvas pb-24 font-body text-ink">
    <a class="skip" href="#content">{{ $site['skip_to'] }}</a>

    {{ $slot }}
</body>
</html>
