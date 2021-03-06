<x-app-layout>
    <div class="flex flex-wrap justify-center">
        <div class="md:w-2/3 pr-4 pl-4">
            <x-partials.card>
                <x-slot name="title">{{ __('Verify Your Email Address') }}</x-slot>

                <div class="flex-auto p-6">
                    @if (session('resent'))
                        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800"
                             role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                                class="button button-primary">{{ __('click here to request another') }}</button>
                        .
                    </form>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
