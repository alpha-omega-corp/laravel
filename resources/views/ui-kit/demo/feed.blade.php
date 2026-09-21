<div class="max-w-lg">
    <x-kit.feed :items="[
        ['text' => __('ui_kit.demo.feed.deployed'), 'time' => __('ui_kit.demo.feed.minutes'), 'tone' => 'accent'],
        ['text' => __('ui_kit.demo.feed.reviewed'), 'time' => __('ui_kit.demo.feed.hours')],
        ['text' => __('ui_kit.demo.feed.opened'), 'time' => __('ui_kit.demo.feed.yesterday'), 'tone' => 'highlight'],
    ]" />
</div>
