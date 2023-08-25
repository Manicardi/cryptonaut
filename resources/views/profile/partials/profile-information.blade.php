<section>

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <div class="mt-6">
        <x-input-label for="name" :value="__('Name')" />
        <h2 class="text-lg font-small text-gray-900 dark:text-gray-100 uppercase">
            {{ Auth::user()->name }}
        </h2>
    </div>

    <div class="mt-6">
        <x-input-label for="email" :value="__('Email')" />
        <h2 class="text-lg font-small text-gray-900 dark:text-gray-100 uppercase">
            {{ Auth::user()->email }}
        </h2>
    </div>

    <form method="post" action="{{ route('wallet.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="wallet" :value="__('Wallet')" />
            <x-text-input id="wallet" name="wallet" type="text" class="mt-1 block w-full font-small" autocomplete="wallet" value="{{ Auth::user()->wallet }}" />
            <x-input-error :messages="$errors->updatePassword->get('wallet')" class="mt-2" />
        </div>
        
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'wallet-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    {{-- <div class="mt-6">
        <x-input-label for="wallet" :value="__('Wallet')" />
        <h2 class="text-lg font-small text-gray-900 dark:text-gray-100">
            {{ Auth::user()->wallet }}
        </h2>
    </div> --}}

</section>
