<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Id -->
            <div>
                <x-label for="id" :value="__('職員番号')" />

                <x-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id')" required autofocus />
            </div>
            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('氏名')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Kana -->
            <div class="mt-4">
                <x-label for="kana" :value="__('ﾌﾘｶﾞﾅ')" />

                <x-input id="kana" class="block mt-1 w-full" type="text" name="kana" :value="old('kana')" required />
            </div>

            <!-- department -->
            <div class="mt-4">
                <x-label for="department" :value="__('部署')" />

                <x-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" required />
            </div>
            
            <!-- employment_date -->
            <div class="mt-4">
                <x-label for="employment_date" :value="__('入職日')" />

                <x-input id="employment_date" class="block mt-1 w-full" type="date" name="employment_date" :value="old('employment_date')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('確認用パスワード')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('登録する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
