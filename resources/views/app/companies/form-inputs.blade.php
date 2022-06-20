@php $editing = isset($company) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="name"
            label="Nome Empresa"
            value="{{ old('name', ($editing ? $company->name : '')) }}"
            maxlength="255"
            placeholder="Nome Empresa"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="fantasy_name"
            label="Nome Fantasia"
            value="{{ old('fantasy_name', ($editing ? $company->fantasy_name : '')) }}"
            maxlength="255"
            placeholder="Nome Fantasia"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="document_cnpj"
            label="CNPJ"
            value="{{ old('document_cnpj', ($editing ? $company->document_cnpj : '')) }}"
            maxlength="255"
            placeholder="CNPJ"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="zip_code"
            label="CEP"
            value="{{ old('zip_code', ($editing ? $company->zip_code : '')) }}"
            maxlength="255"
            placeholder="CEP"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="address"
            label="Endereço"
            value="{{ old('address', ($editing ? $company->address : '')) }}"
            maxlength="255"
            placeholder="Endereço"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="number"
            label="Número"
            value="{{ old('number', ($editing ? $company->number : '')) }}"
            maxlength="255"
            placeholder="Número"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="district"
            label="Bairro"
            value="{{ old('district', ($editing ? $company->district : '')) }}"
            maxlength="2"
            placeholder="Bairro"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="complement"
            label="Complemento"
            value="{{ old('complement', ($editing ? $company->complement : '')) }}"
            maxlength="255"
            placeholder="Complemento"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="city"
            label="Cidade"
            value="{{ old('city', ($editing ? $company->city : '')) }}"
            maxlength="255"
            placeholder="Cidade"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.select name="state" label="Estado">
            @php $selected = old('state', ($editing ? $company->state : '')) @endphp
            <option value="AC" {{ $selected == 'AC' ? 'selected' : '' }} >AC</option>
            <option value="AL" {{ $selected == 'AL' ? 'selected' : '' }} >AL</option>
            <option value="AP" {{ $selected == 'AP' ? 'selected' : '' }} >AP</option>
            <option value="AM" {{ $selected == 'AM' ? 'selected' : '' }} >AM</option>
            <option value="BA" {{ $selected == 'BA' ? 'selected' : '' }} >BA</option>
            <option value="CE" {{ $selected == 'CE' ? 'selected' : '' }} >CE</option>
            <option value="DF" {{ $selected == 'DF' ? 'selected' : '' }} >DF</option>
            <option value="ES" {{ $selected == 'ES' ? 'selected' : '' }} >ES</option>
            <option value="GO" {{ $selected == 'GO' ? 'selected' : '' }} >GO</option>
            <option value="MA" {{ $selected == 'MA' ? 'selected' : '' }} >MA</option>
            <option value="MT" {{ $selected == 'MT' ? 'selected' : '' }} >MT</option>
            <option value="MS" {{ $selected == 'MS' ? 'selected' : '' }} >MS</option>
            <option value="MG" {{ $selected == 'MG' ? 'selected' : '' }} >MG</option>
            <option value="PA" {{ $selected == 'PA' ? 'selected' : '' }} >PA</option>
            <option value="PB" {{ $selected == 'PB' ? 'selected' : '' }} >PB</option>
            <option value="PR" {{ $selected == 'PR' ? 'selected' : '' }} >PR</option>
            <option value="PE" {{ $selected == 'PE' ? 'selected' : '' }} >PE</option>
            <option value="PI" {{ $selected == 'PI' ? 'selected' : '' }} >PI</option>
            <option value="RJ" {{ $selected == 'RJ' ? 'selected' : '' }} >RJ</option>
            <option value="RN" {{ $selected == 'RN' ? 'selected' : '' }} >RN</option>
            <option value="RS" {{ $selected == 'RS' ? 'selected' : '' }} >RS</option>
            <option value="RO" {{ $selected == 'RO' ? 'selected' : '' }} >RO</option>
            <option value="RR" {{ $selected == 'RR' ? 'selected' : '' }} >RR</option>
            <option value="SC" {{ $selected == 'SC' ? 'selected' : '' }} >SC</option>
            <option value="SP" {{ $selected == 'SP' ? 'selected' : '' }} >SP</option>
            <option value="SE" {{ $selected == 'SE' ? 'selected' : '' }} >SE</option>
            <option value="TO" {{ $selected == 'TO' ? 'selected' : '' }} >TO</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="telephone"
            label="Telefone"
            value="{{ old('telephone', ($editing ? $company->telephone : '')) }}"
            maxlength="255"
            placeholder="Telefone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="cell_phone"
            label="Celular"
            value="{{ old('cell_phone', ($editing ? $company->cell_phone : '')) }}"
            maxlength="255"
            placeholder="Celular"
        ></x-inputs.text>
    </x-inputs.group>
</div>
