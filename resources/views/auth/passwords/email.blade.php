<x-app-layout>
    <div class="flex flex-wrap justify-center">
        <div class="md:w-2/3 pr-4 pl-4">
            <x-partials.card>
                <x-slot name="title">{{ __('Reset Password') }}</x-slot>

                <div class="flex-auto p-6">
                    @if (session('status'))
                        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800"
                             role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 flex flex-wrap ">
                            <label for="email"
                                   class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 leading-normal md:text-right">{{ __('E-Mail Address') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <x-inputs.email name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus/>

                                @error('email')
                                <span class="hidden mt-1 text-sm text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-center">
                            <button type="submit" class="button button-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
