<form method="POST" action="{{ route('concierge.createVehicle') }}">
    @csrf
    <div id="modalCreateVehicle" class="modal hoverable">
        <div class="modal-content">
            <div class="row">
                <h5 class="teal-text bold-text">Cadastrar Viatura</h5>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <select id="type" name="type">
                        <option value="" disabled="disabled" {{ old('type') == '' ? 'selected' : '' }}></option>
                        <option value="carro" {{ old('type') == 'carro' ? 'selected' : '' }}>Carro</option>
                        <option value="caminhão" {{ old('type') == 'caminhao' ? 'selected' : '' }}>Caminhão</option>
                        <option value="van" {{ old('type') == 'van' ? 'selected' : '' }}>Van</option>
                        <option value="ônibus" {{ old('type') == 'onibus' ? 'selected' : '' }}>Ônibus</option>
                        <option value="trator" {{ old('type') == 'trator' ? 'selected' : '' }}>Trator</option>
                    </select>
                    <label for="type">Tipo</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="brand" name="brand">
                        @include('layouts.selectVehicleBrand')
                    </select>
                    <label for="brand">Marca</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="model" type="text" class="validate text-upper" name="model" value="{{ old('model') }}">
                    <label for="model">Modelo</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="licensePlate" type="text" class="validate text-upper"
                        name="licensePlate" value="{{ old('licensePlate') }}">
                    <label for="licensePlate">Placa</label>
                </div>
            </div>
        </div>
        <div class="modal-footer z-depth-3">
            <button class="waves-effect waves-light btn teal darken-1 left-align hoverable"
                type="submit">Enviar</button>
            <a class="waves-effect waves-light btn-floating indigo darken-1 modal-close hoverable tooltipped"
                data-position="top" data-tooltip="Voltar" href="#!"><i class="material-icons">arrow_back</i></a>
        </div>
    </div>
</form>
