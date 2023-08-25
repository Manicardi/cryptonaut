<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
            @auth
                <div style="font-size: 0.5em;">
                    {{ 'Exp:' . Auth::user()->experience . '/' . (Auth::user()->level * 10) + 100 }}
                    {{ 'Coins:' . Auth::user()->coin }}
                    {{ 'Energy:' . Auth::user()->energy }}
                    {{ 'Points:' . Auth::user()->points }}
                </div>
            @endauth
        </h2>
    </x-slot>
    @auth
        <!-- Page Login Content -->
        {{-- <main>
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16 main">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white font-big">
                                    Geral Stats 
                                </h2>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Level: {{ Auth::user()->level }}
                                </div>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Experience: {{ Auth::user()->experience . '/' . (Auth::user()->level * 10) + 100 }}
                                </div>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Coin: {{ Auth::user()->coin }}
                                </div>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Energy: {{ Auth::user()->energy }}
                                </div>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Points: {{ Auth::user()->points }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main> --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white font-big">
                            Geral Stats 
                        </h2>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Level: {{ Auth::user()->level }}
                        </div>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Experience: {{ Auth::user()->experience . '/' . (Auth::user()->level * 10) + 100 }}
                        </div>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Coin: {{ Auth::user()->coin }}
                        </div>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Energy: {{ Auth::user()->energy }}
                        </div>
                        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Points: {{ Auth::user()->points }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    @else
        <!-- Page Logout Content -->
        <main>
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16 main">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white font-big">PLAY TO EARN</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed align-center">
                                    Cryptonaut is a simple PLAY TO EARN game giving real crypto rewards while having fun developing your rocket. 
                                    The higher level you reach, the higher income you will receive.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <img src="{{ url(URL::asset('images/cryptonaut-thinking.png')) }}" alt="description of myimage" height="150x" width="150px">

                <div class="mt-16 main">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="{{ route('register') }}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Start Now To Make Instant Gain</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Join the revolution in gaming and experience the thrill of the game like never before, with our advanced technology and dynamic gameplay.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="{{ route('register') }}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Invite friends, earn more!</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    We have referral program to help you earn more while playing online with your friends, you will gain 50% coin income for each travel.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </main>
    @endauth
    
    
</x-app-layout>
