@php $editing = isset($exam) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="company_id" label="Empresa" required>
            @php $selected = old('company_id', ($editing ? $exam->company_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione a empresa</option>
            @foreach($companies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="employe_id" label="Colaborador" required>
            @php $selected = old('employe_id', ($editing ? $exam->employe_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o Colaborador</option>
            @foreach($employes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="units" label="Unidades">
            @php $selected = old('units', ($editing ? $exam->units : '')) @endphp
            <option value="UC" {{ $selected == 'UC' ? 'selected' : '' }} >Unidade Centro</option>
            <option value="US" {{ $selected == 'US' ? 'selected' : '' }} >Unidade Sede</option>
            <option value="UF" {{ $selected == 'UF' ? 'selected' : '' }} >Unidade Filial</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="type_exam" label="Tipo Exame">
            @php $selected = old('type_exam', ($editing ? $exam->type_exam : '')) @endphp
            <option value="ADMISSIONAL" {{ $selected == 'ADMISSIONAL' ? 'selected' : '' }} >ADMISSIONAL</option>
            <option value="DEMISSIONAL" {{ $selected == 'DEMISSIONAL' ? 'selected' : '' }} >DEMISSIONAL</option>
            <option value="PERIODICO" {{ $selected == 'PERIODICO' ? 'selected' : '' }} >PERIODICO</option>
            <option value="MUDANCA_FUNCAO" {{ $selected == 'MUDANCA_FUNCAO' ? 'selected' : '' }} >MUDANÇA DE FUNCAO</option>
            <option value="RETORNO_TRABALHO" {{ $selected == 'RETORNO_TRABALHO' ? 'selected' : '' }} >RETORNO AO TRABALHO</option>
            <option value="AVALIACAO_MEDICA_AT" {{ $selected == 'AVALIACAO_MEDICA_AT' ? 'selected' : '' }} >AVALIACAO MEDICA /AT</option>
            <option value="AVALIACAO_PCD" {{ $selected == 'AVALIACAO_PCD' ? 'selected' : '' }} >AVALIACAO PCD</option>
            <option value="EXAME_COMPLEMENTARES" {{ $selected == 'EXAME_COMPLEMENTARES' ? 'selected' : '' }} >EXAMES COMPLEMENTARES</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="done" label="Exame Feito?">
            @php $selected = old('done', ($editing ? $exam->done : 'N')) @endphp
            <option value="N" {{ $selected == 'N' ? 'selected' : '' }} >Não</option>
            <option value="S" {{ $selected == 'S' ? 'selected' : '' }} >Sim</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
