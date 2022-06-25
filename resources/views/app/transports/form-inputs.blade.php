@php $editing = isset($transport) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-9/12">
        <x-inputs.text
            name="name"
            label="Nome"
            value="{{ old('name', ($editing ? $transport->name : '')) }}"
            maxlength="255"
            placeholder="Nome"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-3/12">
        <x-inputs.select name="active" label="Ativo" placeholder="Ativo">
            @php $selected = old('active', ($editing ? $transport->active : '')) @endphp
            <option value="S" {{ $selected == 'S' ? 'selected' : '' }} >SIM</option>
            <option value="N" {{ $selected == 'N' ? 'selected' : '' }} >NÃO</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
