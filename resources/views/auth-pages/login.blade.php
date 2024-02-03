<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" key="status"/>

    <h4 class="mb-2" style="text-align:center">مرحبا بكم في {{ config('app.name') }}! 👋</h4>
    <p class="mb-4" style="text-align:center">يرجى تسجيل الدخول </p>

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <x-input-label for="check" :value="__('البريد الالكتروني أو رقم الهاتف')"/>
            <x-text-input id="check" placeholder="أدخل البريد الالكتروني أو رقم الهاتف" type="text" name="check"
                          :value="old('check')" required autofocus autocomplete="email"/>
            <x-input-error key="check"/>
        </div>
        <div class="mb-3">
            <x-input-label for="password" :value="__('الرقم السري')"/>
            <x-text-input id="password" placeholder="ادخل الرقم السري" type="password" name="password"
                          :value="old('password')" required autocomplete="current-password"/>
            <x-input-error key="password"/>
        </div>
        <div class="mb-3">
            <div class="d-flex gap-2">
                <input class="form-check-input" name="remember" type="checkbox" id="remember-me"/>
                <label for="remember-me">تذكرني</label>
            </div>
        </div>
        <x-primary-button>
            {{ __('تسجيل الدخول') }}
        </x-primary-button>
{{--        @if (Route::has('password.request'))--}}
{{--            <a class="d-block mt-3" style="text-align: center" href="{{ route('password.request') }}">--}}
{{--                {{ __('نسيت كلمة المرور؟') }}--}}
{{--            </a>--}}
{{--        @endif--}}
    </form>
</x-guest-layout>
