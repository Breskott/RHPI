<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.employee.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('employes.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                    @lang('crud.employee.show_title')
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.company_id')
                        </h5>
                        <span
                            >{{ optional($employe->company)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.name')
                        </h5>
                        <span>{{ $employe->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.telephone_emergency')
                        </h5>
                        <span>{{ $employe->telephone_emergency ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.telephone')
                        </h5>
                        <span>{{ $employe->telephone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.cell_phone')
                        </h5>
                        <span>{{ $employe->cell_phone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.birth')
                        </h5>
                        <span>{{ $employe->birth ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.nationality')
                        </h5>
                        <span>{{ $employe->nationality ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.gender')
                        </h5>
                        <span>{{ $employe->gender ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.color')
                        </h5>
                        <span>{{ $employe->color ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.civil_status')
                        </h5>
                        <span>{{ $employe->civil_status ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.scholarity')
                        </h5>
                        <span>{{ $employe->scholarity ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.sons')
                        </h5>
                        <span>{{ $employe->sons ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.name_dad')
                        </h5>
                        <span>{{ $employe->name_dad ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.name_mother')
                        </h5>
                        <span>{{ $employe->name_mother ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.zip_code')
                        </h5>
                        <span>{{ $employe->zip_code ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.andress')
                        </h5>
                        <span>{{ $employe->andress ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.number')
                        </h5>
                        <span>{{ $employe->number ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.district')
                        </h5>
                        <span>{{ $employe->district ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.complement')
                        </h5>
                        <span>{{ $employe->complement ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.city')
                        </h5>
                        <span>{{ $employe->city ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.state')
                        </h5>
                        <span>{{ $employe->state ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_rg')
                        </h5>
                        <span>{{ $employe->document_rg ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.organization_exp')
                        </h5>
                        <span>{{ $employe->organization_exp ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.date_emission_rg')
                        </h5>
                        <span>{{ $employe->date_emission_rg ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_cpf')
                        </h5>
                        <span>{{ $employe->document_cpf ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_pis')
                        </h5>
                        <span>{{ $employe->document_pis ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_ctps')
                        </h5>
                        <span>{{ $employe->document_ctps ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_ctps_serie')
                        </h5>
                        <span>{{ $employe->document_ctps_serie ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.date_emission_ctps')
                        </h5>
                        <span>{{ $employe->date_emission_ctps ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_title')
                        </h5>
                        <span>{{ $employe->document_title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_title_zone')
                        </h5>
                        <span>{{ $employe->document_title_zone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_title_session')
                        </h5>
                        <span
                            >{{ $employe->document_title_session ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.date_emission_title')
                        </h5>
                        <span>{{ $employe->date_emission_title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_reservist')
                        </h5>
                        <span>{{ $employe->document_reservist ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_cnh')
                        </h5>
                        <span>{{ $employe->document_cnh ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document_cnh_category')
                        </h5>
                        <span
                            >{{ $employe->document_cnh_category ?? '-' }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.email')
                        </h5>
                        <span>{{ $employe->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.job_functions_id')
                        </h5>
                        <span
                            >{{ optional($employe->jobFunctions)->name ?? '-'
                            }}</span
                        >
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.date_admission')
                        </h5>
                        <span>{{ $employe->date_admission ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.employee.inputs.document')
                        </h5>
                        @if($employe->document)
                        <a
                            href="{{ \Storage::url($employe->document) }}"
                            target="blank"
                            ><i class="mr-1 icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('employes.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Employe::class)
                    <a href="{{ route('employes.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
