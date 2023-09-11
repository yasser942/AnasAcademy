<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('هل نسيت كلمة المرور؟ ليس هناك مشكلة. فقط أخبرنا بعنوان البريد الإلكتروني الخاص بك وسنرسل لك رابط إعادة تعيين كلمة المرور عبر البريد الإلكتروني الذي سيسمح لك باختيار كلمة مرور جديدة.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('البريد الإلكتروني') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('إرسال رابط إعادة تعيين كلمة المرور عبر البريد الإلكتروني') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
