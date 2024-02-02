<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h4 class="mb-2" style="text-align:center">مرحبا بكم في  {{ config('app.name') }}! 👋</h4>
    <p class="mb-4" style="text-align:center">يرجى تسجيل الدخول </p>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <x-input-label for="email" :value="__('البريد الالكتروني')" />
            <x-text-input id="email" placeholder="ادخل البريد الالكتروني" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error key="email"/>
        </div>
        <div class="mb-3">
            <x-input-label for="password" :value="__('الرقم السري')" />
            <x-text-input id="password" placeholder="ادخل الرقم السري" type="password" name="password" :value="old('password')" required autofocus autocomplete="current-password" />
            <x-input-error key="password"/>
        </div>
        <div class="mb-3">
            <div class="d-flex gap-2">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <span>تذكرني</span>
            </div>
        </div>
        <x-primary-button>
            {{ __('دخول') }}
        </x-primary-button>
        @if (Route::has('password.request'))
            <a class="d-block mt-3" style="text-align: center" href="{{ route('password.request') }}">
                {{ __('نسيت كلمة المرور؟') }}
            </a>
        @endif
    </form>
</x-guest-layout>
