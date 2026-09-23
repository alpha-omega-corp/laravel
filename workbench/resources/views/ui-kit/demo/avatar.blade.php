<div class="flex flex-wrap items-end gap-4">
    @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $size)
        <x-kit.avatar name="Camille" :size="$size" />
    @endforeach

    <x-kit.avatar name="Dominique" square />
    <x-kit.avatar name="Rémy" status="online" />
    <x-kit.avatar name="Sacha" status="busy" />
</div>
