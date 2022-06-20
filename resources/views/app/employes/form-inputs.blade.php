@php $editing = isset($employe) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="company_id" label="Empresa" required>
            @php $selected = old('company_id', ($editing ? $employe->company_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione a Empresa do Colaborador</option>
            @foreach($companies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="name"
            label="Nome Colaborador"
            value="{{ old('name', ($editing ? $employe->name : '')) }}"
            maxlength="255"
            placeholder="Nome Colaborador"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="telephone_emergency"
            label="Telefone de Emergência"
            value="{{ old('telephone_emergency', ($editing ? $employe->telephone_emergency : '')) }}"
            maxlength="255"
            placeholder="Telefone de Emergência"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="telephone"
            label="Telefone"
            value="{{ old('telephone', ($editing ? $employe->telephone : '')) }}"
            maxlength="255"
            placeholder="Telefone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="cell_phone"
            label="Celular"
            value="{{ old('cell_phone', ($editing ? $employe->cell_phone : '')) }}"
            maxlength="255"
            placeholder="Celular"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.date
            name="birth"
            label="Data Nascimento"
            value="{{ old('birth', ($editing ? optional($employe->birth)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="nationality"
            label="Nascionalidade"
            value="{{ old('nationality', ($editing ? $employe->nationality : '')) }}"
            maxlength="255"
            placeholder="Nascionalidade"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.select name="gender" label="Sexo">
            @php $selected = old('gender', ($editing ? $employe->gender : '')) @endphp
            <option value="M" {{ $selected == 'M' ? 'selected' : '' }} >Masculino</option>
            <option value="F" {{ $selected == 'F' ? 'selected' : '' }} >Feminino</option>
            <option value="O" {{ $selected == 'O' ? 'selected' : '' }} >Outro</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.text
            name="color"
            label="Cor"
            value="{{ old('color', ($editing ? $employe->color : '')) }}"
            maxlength="9"
            placeholder="Cor"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.select name="civil_status" label="Estado Civil">
            @php $selected = old('civil_status', ($editing ? $employe->civil_status : '')) @endphp
            <option value="SOLTEIRO" {{ $selected == 'SOLTEIRO' ? 'selected' : '' }} >Solteiro(a)</option>
            <option value="UNIAO_ESTAVEL" {{ $selected == 'UNIAO_ESTAVEL' ? 'selected' : '' }} >União Estável</option>
            <option value="DIVORCIADO" {{ $selected == 'DIVORCIADO' ? 'selected' : '' }} >Divorciado(a)</option>
            <option value="CASADO" {{ $selected == 'CASADO' ? 'selected' : '' }} >Casado(a)</option>
            <option value="VIUVO" {{ $selected == 'VIUVO' ? 'selected' : '' }} >Viuvo(a)</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="scholarity"
            label="Escolaridade"
            value="{{ old('scholarity', ($editing ? $employe->scholarity : '')) }}"
            maxlength="255"
            placeholder="Escolaridade"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-2/12">
        <x-inputs.text
            name="sons"
            label="Nº Filhos"
            value="{{ old('sons', ($editing ? $employe->sons : '')) }}"
            maxlength="255"
            placeholder="Nº Filhos"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-5/12">
        <x-inputs.text
            name="name_dad"
            label="Nome do Pai"
            value="{{ old('name_dad', ($editing ? $employe->name_dad : '')) }}"
            maxlength="255"
            placeholder="Nome do Pai"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-5/12">
        <x-inputs.text
            name="name_mother"
            label="Nome Mae"
            value="{{ old('name_mother', ($editing ? $employe->name_mother : '')) }}"
            maxlength="255"
            placeholder="Nome Mae"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="zip_code"
            label="CEP"
            value="{{ old('zip_code', ($editing ? $employe->zip_code : '')) }}"
            maxlength="255"
            placeholder="CEP"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="andress"
            label="Endereço"
            value="{{ old('andress', ($editing ? $employe->andress : '')) }}"
            maxlength="255"
            placeholder="Endereço"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="number"
            label="Número"
            value="{{ old('number', ($editing ? $employe->number : '')) }}"
            maxlength="255"
            placeholder="Número"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="district"
            label="Bairro"
            value="{{ old('district', ($editing ? $employe->district : '')) }}"
            maxlength="255"
            placeholder="Bairro"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="complement"
            label="Complemento"
            value="{{ old('complement', ($editing ? $employe->complement : '')) }}"
            maxlength="255"
            placeholder="Complemento"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="city"
            label="Cidade"
            value="{{ old('city', ($editing ? $employe->city : '')) }}"
            maxlength="255"
            placeholder="Cidade"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.select name="state" label="Estado">
            @php $selected = old('state', ($editing ? $employe->state : '')) @endphp
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

    <x-inputs.group class="w-full lg:w-5/12">
        <x-inputs.text
            name="document_rg"
            label="RG"
            value="{{ old('document_rg', ($editing ? $employe->document_rg : '')) }}"
            maxlength="255"
            placeholder="RG"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="organization_exp"
            label="Orgão Expedidor"
            value="{{ old('organization_exp', ($editing ? $employe->organization_exp : '')) }}"
            maxlength="255"
            placeholder="Orgão Expedidor"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.date
            name="date_emission_rg"
            label="Data Emissão RG"
            value="{{ old('date_emission_rg', ($editing ? optional($employe->date_emission_rg)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="document_cpf"
            label="CPF"
            value="{{ old('document_cpf', ($editing ? $employe->document_cpf : '')) }}"
            maxlength="255"
            placeholder="CPF"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="document_pis"
            label="PIS"
            value="{{ old('document_pis', ($editing ? $employe->document_pis : '')) }}"
            maxlength="255"
            placeholder="PIS"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-5/12">
        <x-inputs.text
            name="document_ctps"
            label="Nº CTPS"
            value="{{ old('document_ctps', ($editing ? $employe->document_ctps : '')) }}"
            maxlength="255"
            placeholder="Nº CTPS"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="document_ctps_serie"
            label="Série CTPS"
            value="{{ old('document_ctps_serie', ($editing ? $employe->document_ctps_serie : '')) }}"
            maxlength="255"
            placeholder="Série CTPS"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.date
            name="date_emission_ctps"
            label="Data Emissão CTPS"
            value="{{ old('date_emission_ctps', ($editing ? optional($employe->date_emission_ctps)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.text
            name="document_title"
            label="Titulo Eleitoral"
            value="{{ old('document_title', ($editing ? $employe->document_title : '')) }}"
            maxlength="255"
            placeholder="Titulo Eleitoral"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-2/12">
        <x-inputs.text
            name="document_title_zone"
            label="Zona Titulo"
            value="{{ old('document_title_zone', ($editing ? $employe->document_title_zone : '')) }}"
            maxlength="255"
            placeholder="Zona Titulo"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="document_title_session"
            label="Sessão Titulo"
            value="{{ old('document_title_session', ($editing ? $employe->document_title_session : '')) }}"
            maxlength="255"
            placeholder="Sessão Titulo"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.date
            name="date_emission_title"
            label="Data Emissão Titulo"
            value="{{ old('date_emission_title', ($editing ? optional($employe->date_emission_title)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="document_reservist"
            label="Reservista"
            value="{{ old('document_reservist', ($editing ? $employe->document_reservist : '')) }}"
            maxlength="255"
            placeholder="Reservista"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="document_cnh"
            label="CNH"
            value="{{ old('document_cnh', ($editing ? $employe->document_cnh : '')) }}"
            maxlength="255"
            placeholder="CNH"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.text
            name="document_cnh_category"
            label="Categoria CNH"
            value="{{ old('document_cnh_category', ($editing ? $employe->document_cnh_category : '')) }}"
            maxlength="255"
            placeholder="Categoria CNH"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.email
            name="email"
            label="E-mail"
            value="{{ old('email', ($editing ? $employe->email : '')) }}"
            maxlength="255"
            placeholder="E-mail"
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.select name="job_functions_id" label="Função" required>
            @php $selected = old('job_functions_id', ($editing ? $employe->job_functions_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione a Função do Colaborador</option>
            @foreach($allJobFunctions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.date
            name="date_admission"
            label="Data Admissão"
            value="{{ old('date_admission', ($editing ? optional($employe->date_admission)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.partials.label
            name="document"
            label="Anexo de Documento"
        ></x-inputs.partials.label
        ><br />

        <input
            type="file"
            name="document"
            id="document"
            class="form-control-file"
        />

        @if($editing && $employe->document)
        <div class="mt-2">
            <a href="{{ \Storage::url($employe->document) }}" target="_blank"
                ><i class="icon ion-md-download"></i>&nbsp;Download</a
            >
        </div>
        @endif @error('document') @include('components.inputs.partials.error')
        @enderror
    </x-inputs.group>
</div>
