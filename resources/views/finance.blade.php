<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Finance') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1">
            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class=" text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('requestWithdraw') }}">
                        @csrf
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Finance Information') }}
                            </h2>
                        </header>
                        <div class="mt-6">
                            <x-input-label for="withdraw" value="{{ __('Minimum withdrawal: 50000 Coins') }}" />
                        </div>
                        <div class="mt-6">
                            <div>
                                <x-input-label for="withdraw" :value="__('Withdraw amount')" />
                                <x-text-input disabled id="coin" name="withdraw" type="text" class="mt-1 block w-full" value="{{ Auth::user()->coin }}" />
                                
                                <x-input-label style="color: red;" id="walletError" class="hidden mt-2" for="withdraw" value="{{ __('Add withdraw wallet in profile') }}" />

                                <x-text-input id="wallet" name="wallet" type="hidden" value="{{ Auth::user()->wallet }}" />
                            </div>
                            <x-primary-button style="opacity: 40%" disabled id="withdraw" class="font-small-small mt-2">{{ __('Request') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($withdrawRequests->count() >= 1)
            <div class="grid grid-cols-1 md:grid-cols-1 gap-1 lg:gap-1 mt-6">
                <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div class=" text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Transactions List') }}
                            </h2>
                        </header>
                        <div class="mt-6">
                            <h2 class="text-lg font-small-small text-gray-900 dark:text-gray-100">
                                <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        Desc.
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        Amount
                                    </div>
                                    <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        Status
                                    </div>
                                </div>
                                @foreach ($withdrawRequests as $withdrawRequest)
                                    <div class="flex justify-center mt-0 px-0 sm:items-center sm:justify-between">
                                        <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            {{ __('Withdraw') }}
                                        </div>
                                        <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            {{ $withdrawRequest->amount }}
                                        </div>
                                        <div class="margin-auto scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-inset dark:ring-white/5 rounded-lg shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            @if ($withdrawRequest->processed)
                                                <span style="color: green;">{{ __('Processed') }}</span>
                                            @else
                                                <span style="color: rgb(138, 138, 5);">{{ __('Pending') }}</span>
                                            @endif
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
    var wallet = $('#wallet');
    var coin = $('#coin');
    var withdraw = $('#withdraw');
    var walletError = $('#walletError')

    if(!wallet.val().trim()) {
        walletError.removeClass('hidden');
    }

    function freeButton() {
        setTimeout(function() {
            if(parseInt(coin.val().trim()) >= 50000 && wallet.val().trim()) {
                withdraw.css('opacity', '100');
                withdraw.prop('disabled', false);
            }   
        }, 2000);
    }

    freeButton();
</script>