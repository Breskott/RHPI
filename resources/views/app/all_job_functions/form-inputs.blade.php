@php $editing = isset($jobFunctions) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="name"
            label="Nome da Função"
            value="{{ old('name', ($editing ? $jobFunctions->name : '')) }}"
            maxlength="255"
            placeholder="Nome da Função"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.number
            name="salary"
            label="Salario"
            value="{{ old('salary', ($editing ? $jobFunctions->salary : '')) }}"
            max="255"
            step="0.01"
            placeholder="Salario"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="start_time"
            label="Horario de Inicio"
            value="{{ old('start_time', ($editing ? $jobFunctions->start_time : '')) }}"
            maxlength="255"
            placeholder="Start Time"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="end_time"
            label="Horario Fim "
            value="{{ old('end_time', ($editing ? $jobFunctions->end_time : '')) }}"
            maxlength="255"
            placeholder="End Time"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="time_output_interval"
            label="Saida Intervalo"
            value="{{ old('time_output_interval', ($editing ? $jobFunctions->time_output_interval : '')) }}"
            maxlength="255"
            placeholder="Time Output Interval"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="time_entry_interval"
            label="Entrada Intervalo"
            value="{{ old('time_entry_interval', ($editing ? $jobFunctions->time_entry_interval : '')) }}"
            maxlength="255"
            placeholder="Time Entry Interval"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
