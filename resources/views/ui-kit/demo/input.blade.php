<div class="grid gap-4 sm:grid-cols-2">
    <x-kit.input name="demo-name" :label="__('ui_kit.demo.input.label')" :placeholder="__('ui_kit.demo.input.placeholder')" />
    <x-kit.input name="demo-site" :label="__('ui_kit.demo.input.site')" leading="https://" />
    <x-kit.input name="demo-price" :label="__('ui_kit.demo.input.price')" trailing="CHF" :hint="__('ui_kit.demo.input.hint')" />
    <x-kit.input name="demo-bad" :label="__('ui_kit.demo.input.label')" value="nope" :error="__('ui_kit.demo.input.error')" />
</div>
