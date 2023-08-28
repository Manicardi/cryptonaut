<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Referrals') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">

                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Referrals Information') }}
                        </h2>
                    </header>
                    <div class="mt-6">
                        <x-input-label for="name" :value="__('Referral Link')"/>
                        <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100" id="copy">
                            cryptonaut.cc/referral/{{ str_pad(Auth::user()->id, 6, "0", STR_PAD_LEFT)  }}
                        </h2>
                        <x-primary-button id="copy" onclick="copy('copy')" class="font-small-small">{{ __('copy') }}</x-primary-button>
                    </div>
                    <div class="mt-6">
                        <x-input-label for="email" value="Total Referrals: {{ $referrals->count() }}" />
                    </div>
            
                </div>
            </div>
        </div>

        @if ($referrals->count() >= 1)
            <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1 mt-6">
                <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class=" text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Referrals List') }}
                            </h2>
                        </header>
                        <div class="mt-6">
                            <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100">
                                <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        name
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        date
                                    </div>
                                </div>
                                @foreach ($referrals as $key => $referral)
                                    <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                        <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            {{ $referral->name }}
                                        </div>
                                        <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            {{ date("d/m/Y", strtotime($referral->created_at)) }}
                                        </div>
                                    </div>
                                @endforeach
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    
</x-app-layout>

<script>

    function copy(id) {
        navigator.clipboard.writeText($('#' + id).text().trim());
    }

</script>