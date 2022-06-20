<x-app-layout>
    <div class="mx-auto px-4 md:px-8">
        <div class="flex flex-wrap justify-center">
            <div class="md:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded-lg break-words bg-white shadow-xl">
                    <div class="py-3 px-6 mb-0 border-b-1 text-gray-900 font-bold">{{ __('Dashboard') }}</div>

                    <div class="flex-auto p-6">
                        @if (session('status'))
                            <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Olá seja bem-vindo(a) ao sistema da RHPI, nosso sistema foi desenvolvido através de um projeto de faculdade
                        com objetivo de ajustar empresas e escritórios de contabilidade com o uso da técnologia.
                        <br>
                            Começe pelo menu acima na opção <b>"Sistema"</b>, e tenha um excelente uso.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
