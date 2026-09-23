<x-kit.sign-in :title="__('ui_kit.demo.signin.title')">
    <x-kit.input name="demo-signin-email" type="email" :label="__('ui_kit.demo.form.email')" />
    <x-kit.input name="demo-signin-password" type="password" :label="__('ui_kit.demo.signin.password')" />
    <x-kit.checkbox name="demo-signin-remember" :label="__('ui_kit.demo.signin.remember')" />
    <x-kit.button class="w-full">{{ __('ui_kit.demo.signin.title') }}</x-kit.button>
</x-kit.sign-in>
