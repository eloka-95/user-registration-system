<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" onsubmit="process(event)">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input placeholder="Name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  required autofocus />
            </div>

            <!-- PHONE NUMBER-->
            <div>
                <x-label for="phone" :value="__('Phone Number')" />

                <x-input placeholder="Phone Number" id="phone" class=" number block mt-1 w-full" type="tel" name="phone" :value="old('phone')"  required autofocus />
                <div class="alert alert-error" style="display: none; color:red"></div>
            </div>


            <div>
                <x-label for="role" :value="__('Select Role')" />
                <x-select id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required autofocus>
                    <option value="none" selected>--Whats Your Role--</option>
                    <option value="vendor">vendor</option>
                    <option value="user">user</option>
                </x-select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                placeholder="Password"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                 />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input  id="password_confirmation" class="block mt-1 w-full"
                                placeholder="Confrim Password"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        {{-- <div class="alert alert-info" style="display: none;"></div> --}}
    </x-auth-card>
</x-guest-layout>
