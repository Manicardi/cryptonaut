<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Points') }}
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
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <form method="POST" action="{{ route('addTravel') }}">
                    @csrf
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white font-big">
                        Assign your points
                    </h2>                    
                    <div class="flex items-center mt-4">
                        <x-primary-button disabled style="opacity: 40%" id="addTravel">
                            {{ __('+') }}
                        </x-primary-button>
                        @if (Route::has('addTravel'))
                            <div class="ml-4 dark:focus:ring-offset-gray-800 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-2 focus:outline-none text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                ({{ str_pad(Auth::user()->travel_point, 2, "0", STR_PAD_LEFT) }}/30) {{ __('-2 seconds travel') }}
                                
                            </div>
                        @endif
                    </div>
                </form>
                <form method="POST" action="{{ route('addEnergy') }}">
                    @csrf
                    <div class="flex items-center mt-4">
                        <x-primary-button disabled style="opacity: 40%" id="addEnergy">
                            {{ __('+') }}
                        </x-primary-button>
                        @if (Route::has('addEnergy'))
                            <div class="ml-4 dark:focus:ring-offset-gray-800 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-2 focus:outline-none text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                ({{ str_pad(Auth::user()->energy_point, 2, "0", STR_PAD_LEFT) }}/30) {{ __('10 more max energy') }}
                                
                            </div>
                        @endif
                    </div>
                    <p class="font-small-small mt-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('You can assign 30 points max for each stats') }}
                    </p>
                </form>
                <input type="hidden" id="points" value="{{ Auth::user()->points }}" />
                <input type="hidden" id="travelPoint" value="{{ Auth::user()->travel_point }}" />
                <input type="hidden" id="energyPoint" value="{{ Auth::user()->energy_point }}" />
            </div>
        </div>
    </div>

</x-app-layout>

<script>

var points = $('#points');

var addTravel = $('#addTravel');
var addEnergy = $('#addEnergy');

var travelPoint = $('#travelPoint');
var energyPoint = $('#energyPoint');

function freeButton(points, atribute, button) {
    setTimeout(function() {
        if(points.val().trim() > 0 && atribute.val().trim() < 30) {
            button.css('opacity', '100');
            button.prop('disabled', false);
        }   
    }, 2000);
}

freeButton(points, travelPoint, addTravel);
freeButton(points, energyPoint, addEnergy);

</script>