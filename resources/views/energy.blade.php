<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Energy') }}
            @auth
                <div style="font-size: 0.5em;">
                    {{ 'Exp:' . Auth::user()->experience . '/' . (Auth::user()->level * 10) + 100 }}
                    {{ 'Coins:' . Auth::user()->coin }}
                    {{ 'Energy:' . Auth::user()->energy }}
                </div>
            @endauth
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Collect Energy") }} <span id="energy">{{ $energyTime.'/'.Auth::user()->energy_limit }}</span>
                    <img class="mt-6" src="{{ asset('images/energy.png') }}" alt="Cryptonaut" width="500px">
                    <form method="post" action="{{ route('collect') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
            
                        <div class="flex items-center gap-4">
                            <x-primary-button style="opacity: 40%" disabled id="submitButton" class="mt-6">{{ __('Collect') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var energy = $('#energy').text().split('/')[0];

    function freeButton(id, endtime) {
        setTimeout(function() {
            if($('#submitButton').text().trim() == 'Collect' && energy != '0') {
                $('#submitButton').css('opacity', '100');
                $('#submitButton').prop('disabled', false);
            }   
        }, 3000);
    }

    freeButton();
</script>