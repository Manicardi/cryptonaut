<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game') }}
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

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white font-big">
                        Start the travel
                    </h2>   
                    <img src="{{ asset('images/rocket-side.png') }}" alt="Cryptonaut" width="300px">
                    <form method="post" action="{{ route('travel') }}">
                        @csrf
                        @method('post')
                        <div class="dark:focus:ring-offset-gray-800 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-2 focus:outline-none text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Exp:<span style="color: green;">+10</span>
                        </div>
                        <div class="dark:focus:ring-offset-gray-800 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-2 focus:outline-none text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Coin:<span style="color: green;">+{{ Auth::user()->travel_coin }}</span>
                        </div>
                        <div class="dark:focus:ring-offset-gray-800 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-2 focus:outline-none text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Energy:<span style="color: red;">-{{ Auth::user()->travel_energy }}</span>
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button disabled style="opacity: 40%" id="submitButton">{{ __('Travel') }}</x-primary-button>
                        </div>
                        <input type="hidden" id="clock" value="{{ $timeLeft }}" />
                        <input type="hidden" id="energy" value="{{ Auth::user()->energy }}" />
                        <input type="hidden" id="coin" value="{{ Auth::user()->coin }}" />
                        <input type="hidden" id="travelEnergy" value="{{ Auth::user()->travel_energy }}" />
                    </form>

                    <form method="post" action="{{ route('skipTravel') }}">
                        @csrf
                        @method('put')
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button style="opacity: 40%" disabled id="skipButton">{{ __('Skip -20 Coin') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var energy = $('#energy');
    var coin = $('#coin');
    var travelEnergy = $('#travelEnergy');

    function getTimeRemaining(endtime) {
        var date = new Date().toLocaleString("en-US", {timeZone: "UTC"});

        var t = Date.parse(endtime) - Date.parse(date);
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        return {
        'total': t,
        'minutes': minutes,
        'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {

        function updateClock() {
            var t = getTimeRemaining(endtime);
            $('#submitButton').text(('0' + t.minutes).slice(-2) + ':' + ('0' + t.seconds).slice(-2));
            if (t.total <= 0) {
                if(parseInt(energy.val().trim()) >= parseInt(travelEnergy.val().trim())) {
                    $('#submitButton').text('Travel');
                    $('#submitButton').css('opacity', '100');
                    $('#submitButton').prop('disabled', false);
                    clearInterval(timeinterval);
                } else {
                    $('#submitButton').text('Insufficient energy');
                }
            }
        }

        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = $('#clock').val();

    initializeClock('clock', deadline);

    function freeSkipButton() {
        if(parseInt(coin.val().trim()) >= 20) {
            $('#skipButton').css('opacity', '100');
            $('#skipButton').prop('disabled', false);
        }   
    }

    freeSkipButton();
</script>