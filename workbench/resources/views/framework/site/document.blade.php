@php
    use Workbench\App\Framework\Kit;
    use Workbench\App\Framework\Site;

    /*
     * One page of one business, as a document of its own: `<html>` carries the
     * palette and the direction the way a built site's does, `<body>` holds the
     * layout's frames, and the frames are the worker's stubs class for class.
     * That is the whole reason this is a document and not a panel inside the
     * showcase's shell: a direction finds its frames from `body` and `main`,
     * and nested in another page it would draw half of itself.
     *
     * The framework tab shows it in a frame; on its own it is the page a
     * screenshot is taken of. Embedded, its links lead back to the tab, so the
     * controls there follow the page a visitor walks to.
     */
    $choice = Site::choose(request()->query());

    abort_if($choice === null, 404);

    $embedded = request()->boolean('embed');
    $url = fn (string $path): string => route($embedded ? 'framework.businesses' : 'framework.site', Site::query($choice, ['page' => $path]));
    $regions = Site::regions($choice, $url);

    $page = $choice['page'];
    $title = trim(($choice['content']['site']['brand'] ?? $choice['business']['name']).' · '.($page['label'] ?? $page['role']));
@endphp
<!DOCTYPE html>
<html lang="fr" data-palette="{{ $choice['palette'] }}" data-direction="{{ $choice['direction'] }}" @if ($choice['scheme']) data-theme="{{ $choice['scheme'] }}" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>{{ $title }}</title>

    @if ($embedded)
        <base target="_top">
    @endif

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    {{-- The stylesheet alone: the kit's site components work with no script, and the showcase's own would bring its remembered palette with it. --}}
    @fonts
    @vite(['workbench/resources/css/app.css'])
</head>
<body class="min-h-screen bg-canvas font-body text-ink" data-framework-site="{{ $choice['business']['name'] }}" data-framework-layout="{{ $choice['layout'] }}">
    @include('framework.site.layouts.'.$choice['layout'], ['regions' => $regions])
</body>
</html>
