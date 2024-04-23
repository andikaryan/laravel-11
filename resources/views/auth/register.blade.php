<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Custom SubDomain -->
        <div class="mt-4">
            <x-input-label for="domain" :value="__('Custom Subdomain')" />
            <select id="domain" name="domain" class="block mt-1 w-full bg-gray-900 text-white" required onchange="toggleForm()">
                <option value="0" disabled selected>--- SELECT OPTION ---</option>
                <option value="yes">{{ __('Yes') }}</option>
                <option value="no">{{ __('No') }}</option>
            </select>

            <div id="formContainer" style="display: none;">
                <x-input-label for="domain_name" :value="__('Subdomain Name')" />
                <x-text-input id="domain_name" class="block mt-1 w-full" type="text" name="domain_name" :value="old('domain_name')" autocomplete="domain_name" />
            </div>

            <x-input-error :messages="$errors->get('domain')" class="mt-2" />
        </div>

        <script>
            function toggleForm() {
                var selectedOption = document.getElementById("domain").value;
                var formContainer = document.getElementById("formContainer");
                if (selectedOption === "yes") {
                    formContainer.style.display = "block";
                } else {
                    formContainer.style.display = "none";
                }
            }
        </script>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
