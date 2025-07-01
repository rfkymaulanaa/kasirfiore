<nav x-data="{ open: false }" class="bg-gradient-to-r from-pink-50 to-rose-50 border-b border-pink-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="logo"
                            class="block h-20 w-auto fill-current text-pink-600" />
                    </a>
                    @else
                    <a href="{{ route('pembelian.index') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="logo"
                            class="block h-20 w-auto fill-current text-pink-600" />
                    </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                @if (Auth::check())
                    @php
                        $links = [];
                        if (Auth::user()->role === 'admin') {
                            $links = [
                                ['route' => 'dashboard', 'label' => 'Dashboard'],
                                ['route' => 'user.index', 'label' => 'User'],
                                ['route' => 'produk.index', 'label' => 'Produk'],
                                ['route' => 'stok.index', 'label' => 'Stok'],
                            ];
                        } elseif (Auth::user()->role === 'petugas') {
                            $links = [
                                ['route' => 'produk.index', 'label' => 'Produk'],
                                ['route' => 'stok.index', 'label' => 'Stok'],
                                ['route' => 'pembelian.index', 'label' => 'Pembelian'],
                            ];
                        }
                    @endphp
                    @foreach ($links as $link)
                        <div class="hidden sm:flex sm:items-center sm:ml-10 space-x-1">
                            <x-nav-link 
                            :href="route($link['route'])" 
                            :active="request()->routeIs($link['route'] . '*')"
                            class="relative px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 ease-in-out
                                       {{ request()->routeIs($link['route'] . '*') 
                                          ? 'text-white bg-gradient-to-r from-pink-500 to-rose-500 shadow-md' 
                                          : 'text-pink-700 hover:text-pink-900 hover:bg-pink-100' }}
                                       focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-1">
                                {{ __($link['label']) }}

                                {{-- Active indicator --}}
                                @if(request()->routeIs($link['route'] . '*'))
                                    <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1.5 h-1.5 bg-white rounded-full"></span>
                                @endif
                            </x-nav-link>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-pink-200 text-sm leading-4 font-medium rounded-lg text-pink-700 bg-white hover:bg-pink-50 hover:text-pink-800 hover:border-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-1 transition-all ease-in-out duration-200 shadow-sm">
                            <div class="font-semibold">{{ Auth::user()->username }}</div>
                            

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white border border-pink-200 rounded-lg shadow-lg">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="text-pink-700 hover:bg-pink-50 hover:text-pink-800 transition-colors duration-150">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                         <div class="border-t border-pink-100"></div>

                        <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();"
                                    class="text-pink-700 hover:bg-pink-50 hover:text-pink-800 transition-colors duration-150">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-pink-600 hover:text-pink-800 hover:bg-pink-100 focus:outline-none focus:bg-pink-100 focus:text-pink-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-gradient-to-r from-pink-50 to-rose-50 border-t border-pink-200">
        @if (Auth::check())
            @php
                $links = [];
                if (Auth::user()->role === 'admin') {
                    $links = [
                        ['route' => 'dashboard', 'label' => 'Dashboard'],
                        ['route' => 'user.index', 'label' => 'User'],
                        ['route' => 'produk.index', 'label' => 'Produk'],
                        ['route' => 'stok.index', 'label' => 'Stok'],
                    ];
                } elseif (Auth::user()->role === 'petugas') {
                    $links = [
                        ['route' => 'produk.index', 'label' => 'Produk'],
                        ['route' => 'stok.index', 'label' => 'Stok'],
                        ['route' => 'pembelian.index', 'label' => 'Pembelian'],
                    ];
                }
            @endphp
            <div class="pt-2 pb-3 space-y-1">
                @foreach ($links as $link)
                    <x-responsive-nav-link 
                    :href="route($link['route'])" 
                    :active="request()->routeIs($link['route'] . '*')"
                    class="block px-4 py-2 text-base font-medium rounded-lg mx-2 transition-colors duration-200
                               {{ request()->routeIs($link['route'] . '*') 
                                  ? 'text-white bg-gradient-to-r from-pink-500 to-rose-500 shadow-md' 
                                  : 'text-pink-700 hover:text-pink-900 hover:bg-pink-100' }}">
                        {{ __($link['label']) }}
                    </x-responsive-nav-link>
                @endforeach
            </div>
        @endif


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-pink-200 bg-pink-50">
            <div class="px-4">
                <div class="font-medium text-base text-pink-800">{{ Auth::user()->username }}</div>
                <div class="font-medium text-sm text-pink-600">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        </div>
    </div>
</nav>
