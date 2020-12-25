@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')

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
                        <div class="input-field col m4 s12 in-out">
                            <select id="registerType" name="registerType">
                                <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                <option value="1" {{ old('registerType') == '1' ? 'selected' : '' }}>Entrada</option>
                                <option value="2" {{ old('registerType') == '2' ? 'selected' : '' }}>Saída</option>
                            </select>
                            <label for="registerType">Lançamento</label>
                        </div>
                        <div class="input-field col m8 s12">
                            <div class="in hide">
                                <select id="vehicleId" name="vehicleId">
                                    <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                    @foreach ($vehicles_in as $vehicle)
                                        <option value="{{ $vehicle['id'] }}"{{ collect(old('vehicleId'))->contains($vehicle['id']) ? 'selected' : '' }}>{{ $vehicle['brand'] . " - " . $vehicle['model'] }} ({{ $vehicle['license_plate'] }})</option>
                                    @endforeach
                                </select>
                                <label for="vehicleId">Viaturas dentro</label>
                            </div>
                            <div class="in hide">
                                <select id="vehicleId" name="vehicleId">
                                    <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                    @foreach ($vehicles_out as $vehicle)
                                        <option value="{{ $vehicle['id'] }}"{{ collect(old('vehicleId'))->contains($vehicle['id']) ? 'selected' : '' }}>{{ $vehicle['brand'] . " - " . $vehicle['model'] }} ({{ $vehicle['license_plate'] }})</option>
                                    @endforeach
                                </select>
                                <label for="vehicleId">Viaturas fora</label>
                            </div>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="odometerCurrent" type="text" class="validate" name="odometerCurrent" value="{{ old('odometerCurrent') }}">
                            <label for="odometerCurrent">Identidade</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="odometer" type="text" class="validate" name="odometer" value="{{ old('odometer') }}">
                            <label for="odometer">Odômetro</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <select id="usersIdBoss" name="usersIdBoss">
                                <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}"{{ collect(old('usersIdBoss'))->contains($user['id']) ? 'selected' : '' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersIdBoss">Chefe de Viatura</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <select id="usersIdDriver" name="usersIdDriver">
                                <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}"{{ collect(old('usersIdDriver'))->contains($user['id']) ? 'selected' : '' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersIdDriver">Motorista</label>
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
