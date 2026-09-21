@props(['reference'])

{{--
    One frame around one kit component: its reference, then the component itself on a
    plain canvas so a panel, a well and a divider each read against the same surface.
--}}
<figure {{ $attributes->class('space-y-2') }}>
    <figcaption class="font-mono text-xs text-ink-soft">{{ $reference }}</figcaption>

    <div data-ref="::{{ $reference }}" class="rounded-panel border border-dashed border-rule bg-canvas p-4">
        {{ $slot }}
    </div>
</figure>
