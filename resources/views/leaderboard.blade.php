<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">

                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Leaderboard') }}
                        </h2>
                    </header>
                    <div class="mt-6">
                        <x-primary-button id="levelButton" class="font-small-small" disabled style="opacity: 40%;">{{ __('Level') }}</x-primary-button>
                        <x-primary-button id="travelButton" class="font-small-small">{{ __('Travel') }}</x-primary-button>
                        <x-primary-button id="referralButton" class="font-small-small">{{ __('Referral') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>

        <div id="levelList" class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1 mt-6">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Level List') }}
                        </h2>
                    </header>
                    <div class="mt-6">
                        <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Nº
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Name
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Level
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Exp
                                </div>
                            </div>
                            @foreach($levelList as $key => $level)
                                <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $key+1 }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $level->name }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $level->level }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $level->experience }}
                                    </div>
                                </div>
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="travelList" class="hidden grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1 mt-6">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Travel List') }}
                        </h2>
                    </header>
                    <div class="mt-6">
                        <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Nº
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    name
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    travels
                                </div>
                            </div>
                            @foreach($travelList as $key => $travel)
                                <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $key + 1 }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $travel->name }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $travel->total_travel }}
                                    </div>
                                </div>
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="referralList" class="hidden grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1 mt-6">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Referral List') }}
                        </h2>
                    </header>
                    <div class="mt-6">
                        <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    Nº
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    name
                                </div>
                                <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    referrals
                                </div>
                            </div>
                            @foreach($referralList as $key => $referral)
                                <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $key+1 }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $referral->referral_name }}
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        {{ $referral->count }}
                                    </div>
                                </div>
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>

<script>
    var levelButton = $('#levelButton');
    var travelButton = $('#travelButton');
    var referralButton = $('#referralButton');

    var levelList = $('#levelList');
    var travelList = $('#travelList');
    var referralList = $('#referralList');

    $(levelButton).on( "click", function() {
        $(levelButton).prop('disabled', true);
        $(travelButton).prop('disabled', false);
        $(referralButton).prop('disabled', false);
        $(levelButton).css('opacity', '40%');
        $(travelButton).css('opacity', '100%');
        $(referralButton).css('opacity', '100%');
        $(levelList).removeClass("hidden");
        $(travelList).addClass("hidden");
        $(referralList).addClass("hidden");
    });

    $(travelButton).on( "click", function() {
        $(levelButton).prop('disabled', false);
        $(travelButton).prop('disabled', true);
        $(referralButton).prop('disabled', false);
        $(levelButton).css('opacity', '100%');
        $(travelButton).css('opacity', '40%');
        $(referralButton).css('opacity', '100%');
        $(levelList).addClass("hidden");
        $(travelList).removeClass("hidden");
        $(referralList).addClass("hidden");
    });

    $(referralButton).on( "click", function() {
        $(levelButton).prop('disabled', false);
        $(travelButton).prop('disabled', false);
        $(referralButton).prop('disabled', true);
        $(levelButton).css('opacity', '100%');
        $(travelButton).css('opacity', '100%');
        $(referralButton).css('opacity', '40%');
        $(levelList).addClass("hidden");
        $(travelList).addClass("hidden");
        $(referralList).removeClass("hidden");
    });
</script>