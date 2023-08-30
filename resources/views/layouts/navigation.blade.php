<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            @auth
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('/') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('/')" :active="request()->routeIs('/')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('game')" :active="request()->routeIs('game')">
                            {{ __('Game') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('energy')" :active="request()->routeIs('energy')">
                            {{ __('Energy') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('points')" :active="request()->routeIs('points')">
                            {{ __('Points') }}
                        </x-nav-link>
                    </div>
                    {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('task')" :active="request()->routeIs('task')">
                            {{ __('Task') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('store')" :active="request()->routeIs('store')">
                            {{ __('Store') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('market')" :active="request()->routeIs('market')">
                            {{ __('Market') }}
                        </x-nav-link>
                    </div> --}}
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <p>{{ Auth::user()->name }}</p>
                                    Level:{{ Auth::user()->level }}
                                </div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('leaderboard')">
                                {{ __('Leaderboard') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('referrals')">
                                {{ __('Referrals') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('finance')">
                                {{ __('Finance') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('/')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('/') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </div>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    @auth
        <!-- Responsive Logged Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

            <!-- Responsive Settings Options -->
            <div class="pt-0 pb-4 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ 'Level:' . Auth::user()->level }}</div>
                </div>
            </div>

            <div class="pt-0 pb-0 border-t border-gray-200 dark:border-gray-600">
                
                <div class="mt-0 space-y-1">
                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('/')">
                            {{ __('Home') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('game')">
                            {{ __('Game') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('energy')">
                            {{ __('Energy') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('points')">
                            {{ __('Points') }}
                        </x-responsive-nav-link>
                    </div>

                    {{-- <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('task')">
                            {{ __('Task') }}
                        </x-responsive-nav-link>
                    </div> --}}

                    {{-- <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('store')">
                            {{ __('Store') }}
                        </x-responsive-nav-link>
                    </div> --}}
                    
                    {{-- <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('market')">
                            {{ __('Market') }}
                        </x-responsive-nav-link>
                    </div> --}}

                </div>
            </div>

            <div class="pt-0 pb-0 border-t border-gray-200 dark:border-gray-600">

                <div class="mt-0 space-y-1">
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                </div>

                <div class="mt-0 space-y-1">
                    <x-responsive-nav-link :href="route('leaderboard')">
                        {{ __('Leaderboard') }}
                    </x-responsive-nav-link>
                </div>

                <div class="mt-0 space-y-1">
                    <x-responsive-nav-link :href="route('referrals')">
                        {{ __('Referrals') }}
                    </x-responsive-nav-link>
                </div>

                <div class="mt-0 space-y-1">
                    <x-responsive-nav-link :href="route('finance')">
                        {{ __('Finance') }}
                    </x-responsive-nav-link>
                </div>

                <div class="mt-0 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form></div>
            </div>
        </div>
    @else
        <!-- Responsive loggout Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">


            <div class="pt-0 pb-0 border-t border-gray-200 dark:border-gray-600">
                
                <div class="mt-0 space-y-1">
                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="mt-0 space-y-1">
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    </div>

                </div>
            </div>
        </div>
    @endauth
</nav>
