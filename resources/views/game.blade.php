<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Game') }}
            @auth
                <div style="font-size: 0.5em;">
                    {{ 'Exp:' . Auth::user()->experience . '/' . (Auth::user()->level * 10) + 100 }}
                    {{ 'Coins:' . Auth::user()->coin }}
                    {{ 'Energy:' . Auth::user()->energy }}
                </div>
            @endauth
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Start the travel") }}
                    <img src="{{ asset('images/rocket-side.png') }}" alt="Cryptonaut" width="300px">
                    <form method="post" action="{{ route('travel') }}" class="space-y-6">
                        @csrf
                        @method('post')
                            Energy:<span style="color: red;">-{{ $energy }}</span><br />
                            Reward:<span style="color: green;">+{{ $reward }}</span>
                        <div class="flex items-center gap-4">
                            <x-primary-button disabled style="opacity: 40%" id="submitButton">{{ __('Travel') }}</x-primary-button>
                        </div>
                        <input type="hidden" id="clock" value="{{ $timeLeft }}" />
                        <input type="hidden" id="energy" value="{{ Auth::user()->energy }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var energy = $('#energy');

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
                if(parseInt(energy.val().trim()) >= 10) {
                    $('#submitButton').text('Travel');
                    clearInterval(timeinterval);
                } else {
                    $('#submitButton').text('Insufficient energy');
                }
            }
        }

        var timeinterval = setInterval(updateClock, 1000);
    }

    // var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    var deadline = $('#clock').val();

    initializeClock('clock', deadline);

    
    
    

    function freeButton(id, endtime) {
        setTimeout(function() {
            if($('#submitButton').text().trim() == 'Travel') {
                $('#submitButton').css('opacity', '100');
                $('#submitButton').prop('disabled', false);
            }   
        }, 3000);
    }

    freeButton();
</script>