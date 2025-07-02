<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent">
            {{ __('Selamat datang') }}
        </h2>
        <p class="text-gray-600 text-sm mt-1">{{ __('Masukan Email dan Password anda') }}</p>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"  class="text-gray-"
                class="w-full px-4 py-3 rounded-lg border {{ $errors->has('email') ? 'border-red-300 focus:border-red-500 focus:ring-red-200' : 'border-pink-200 focus:border-pink-500 focus:ring-pink-200' }} focus:ring-2 outline-none transition-all duration-300 bg-white/70 hover:shadow-md placeholder:text-gray-600" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus
                placeholder="masukan email"/>

            <!-- Custom error display untuk email -->
            @error('email')
                <div class="mt-2 flex items-center text-red-600 text-sm">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" 
                class="w-full px-4 py-3 rounded-lg border {{ $errors->has('password') ? 'border-red-300 focus:border-red-500 focus:ring-red-200' : 'border-pink-200 focus:border-pink-500 focus:ring-pink-200' }} focus:ring-2 outline-none transition-all duration-300 bg-white/70 hover:shadow-md placeholder:text-gray-600"
                type="password"
                name="password"
                required 
                autocomplete="current-password"
                placeholder="masukan password"/>

            <!-- Custom error display untuk password -->
            @error('password')
                <div class="mt-2 flex items-center text-red-600 text-sm">
                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
