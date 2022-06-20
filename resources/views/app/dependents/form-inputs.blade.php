@php $editing = isset($dependent) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="employe_id" label="Colaborador" required>
            @php $selected = old('employe_id', ($editing ? $dependent->employe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o colaborador</option>
            @foreach($employes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-5/12">
        <x-inputs.text
            name="name"
            label="Nome"
            value="{{ old('name', ($editing ? $dependent->name : '')) }}"
            maxlength="255"
            placeholder="Nome"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.date
            name="birth"
            label="Data Nascimento"
            value="{{ old('birth', ($editing ? optional($dependent->birth)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.text
            name="document_cpf"
            label="CPF"
            value="{{ old('document_cpf', ($editing ? $dependent->document_cpf : '')) }}"
            maxlength="255"
            placeholder="CPF"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="kinship"
            label="Parentesco"
            value="{{ old('kinship', ($editing ? $dependent->kinship : '')) }}"
            maxlength="255"
            placeholder="Parentesco"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="dependent_ir" label="Dependente IR">
            @php $selected = old('dependent_ir', ($editing ? $dependent->dependent_ir : 'Dependente IR')) @endphp
            <option value="SIM" {{ $selected == 'SIM' ? 'selected' : '' }} >SIM</option>
            <option value="NAO" {{ $selected == 'NAO' ? 'selected' : '' }} >NÃO</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
