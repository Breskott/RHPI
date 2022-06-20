<x-app-layout>
    <div class="flex flex-wrap justify-center">
        <div class="md:w-2/3 pr-4 pl-4">
            <x-partials.card>
                <x-slot name="title">{{ __('Login') }}</x-slot>

                <div class="flex-auto p-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 flex flex-wrap">
                            <label for="email" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 leading-normal md:text-right">{{ __('E-Mail Address') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <x-inputs.email name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>

                                @error('email')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <label for="password" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 leading-normal md:text-right">{{ __('Password') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <x-inputs.password name="password" required autocomplete="current-password"/>

                                @error('password')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-center">
                            <div class="relative block mb-2">
                                <x-inputs.checkbox name="remember" label="{{ __('Remember Me') }}"  :checked="old('remember') ? true : false" />
                            </div>
                        </div>

                        <div class="flex flex-wrap pr-4 pl-4 justify-center">
                                <button type="submit" class="button button-primary mx-px pr-4 pl-4">
                                    {{ __('Login') }}
                                </button>&ensp;

                                @if (Route::has('register'))
                                    <a class="button button-danger mx-px pr-4 pl-4" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                    &ensp;
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="button mx-px" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    &ensp;
                                @endif

                        </div>
                    </form>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
