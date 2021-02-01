@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')
@section('name', 'concierge.vehicles')

@section('content')
    <form method="POST" action="{{ route('concierge.createVehicles') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Lançar Viaturas</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="row" style="margin-bottom: 0px">
                            <div class="input-field col m4 s12 in-out">
                                <select id="registerType" name="registerType">
                                    <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                    <option value="1" {{ old('registerType') == '1' ? 'selected' : '' }}>Entrada</option>
                                    <option value="2" {{ old('registerType') == '2' ? 'selected' : '' }}>Saída</option>
                                </select>
                                <label for="registerType">Lançamento</label>
                            </div>
                            <div class="input-field col m8 s12">
                                <div class="in hide odometerIn">
                                    <select id="vehiclesInId" name="vehiclesInId">
                                        <option value="" {{ old('vehiclesInId') == '' ? 'selected' : '' }}></option>
                                        @foreach ($vehicles_in as $vehicle)
                                            <option value="{{ $vehicle['id'] }}"{{ collect(old('vehiclesInId'))->contains($vehicle['id']) ? 'selected' : '' }}>{{ $vehicle['brand'] . " - " . $vehicle['model'] }} ({{ $vehicle['license_plate'] }}) ({{ $vehicle['odometer'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="vehiclesInId">Viaturas dentro</label>
                                </div>
                                <div class="out hide odometerOut">
                                    <select id="vehiclesOutId" name="vehiclesOutId">
                                        <option value="" {{ old('vehiclesOutId') == '' ? 'selected' : '' }}></option>
                                        @foreach ($vehicles_out as $vehicle)
                                            <option value="{{ $vehicle['id'] }}"{{ collect(old('vehiclesOutId'))->contains($vehicle['id']) ? 'selected' : '' }}>{{ $vehicle['brand'] . " - " . $vehicle['model'] }} ({{ $vehicle['license_plate'] }}) ({{ $vehicle['odometer'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="vehiclesOutId">Viaturas fora</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-field col m4 s12">
                            <input disabled id="last_odometer" type="text" class="validate number-validation difference-default" name="last_odometer" value="0">
                            <label for="last_odometer" class="active">Ultimo odômetro</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input id="odometer" type="text" class="validate counter number-validation difference-set" name="odometer" value="{{ old('odometer') }}" data-length="9">
                            <label for="odometer">Odômetro</label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input disabled id="difference_value" type="text" class="validate difference-result" name="difference_value" value="0 Km">
                            <label for="difference_value" class="active">Diferença</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <select id="usersId_boss" name="usersId_boss">
                                <option value="" disabled="disabled" {{ old('usersId_boss') == '' ? 'selected' : '' }}></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}"{{ collect(old('usersId_boss'))->contains($user['id']) ? 'selected' : '' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersId_boss">Chefe de Viatura</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <select id="usersId_driver" name="usersId_driver">
                                <option value="" disabled="disabled" {{ old('usersId_driver') == '' ? 'selected' : '' }}></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}"{{ collect(old('usersId_driver'))->contains($user['id']) ? 'selected' : '' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersId_driver">Motorista</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="datepicker material-icons prefix pointer tooltipped" data-position="top"
                                data-tooltip="Escolher Data">date_range</i>
                            <input id="date" type="text" class="datepicker-control validate date-validation" name="date"
                                value="{{ old('date') }}" placeholder="00/00/0000">
                            <label for="date">Data</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="timepicker material-icons prefix pointer tooltipped" data-position="top"
                                data-tooltip="Escolher Hora">access_time</i>
                            <input id="time" type="text" class="timepicker-control validate time-validation" name="time"
                                value="{{ old('time') }}" placeholder="00:00">
                            <label for="time">Hora</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align hoverable" type="submit">Enviar</button>
                        <a class="waves-effect waves-light btn teal darken-1 modal-trigger hoverable" href="#modalCreateVehicle">Cadastrar Viatura</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('concierge.modalCreateVehicle')

@endsection
