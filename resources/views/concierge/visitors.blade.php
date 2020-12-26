@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')

@section('content')
    <form method="POST" action="{{ route('concierge.createVisitors') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Lançar Visitantes</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="row" style="margin-bottom: 0px">
                            <div class="input-field col m4 s12 in-out">
                                <select id="registerType" name="registerType">
                                    <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}>
                                    </option>
                                    <option value="1" {{ old('registerType') == '1' ? 'selected' : '' }}>Entrada</option>
                                    <option value="2" {{ old('registerType') == '2' ? 'selected' : '' }}>Saída</option>
                                </select>
                                <label for="registerType">Lançamento</label>
                            </div>
                            <div class="input-field col m8 s12">
                                <div class="in hide">
                                    <select multiple id="visitorsInId" name="visitorsInId[]">
                                        @foreach ($visitors_in as $visitor)
                                            <option value="{{ $visitor['id'] }}"{{ collect(old('visitorsInId'))->contains($visitor['id']) ? 'selected' : '' }}>{{ $visitor['name'] }} ({{ $visitor['identity'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="visitorsInId">Visitantes dentro</label>
                                </div>
                                <div class="out hide">
                                    <select multiple id="visitorsOutId" name="visitorsOutId[]">
                                        @foreach ($visitors_out as $visitor)
                                            <option value="{{ $visitor['id'] }}"{{ collect(old('visitorsOutId'))->contains($visitor['id']) ? 'selected' : '' }}>{{ $visitor['name'] }} ({{ $visitor['identity'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="visitorsOutId">Visitantes fora</label>
                                </div>
                            </div>
                            <div class="input-field col s12">
                                <div class="in hide">
                                    <select multiple id="vehicleVisitorsInId" name="vehicleVisitorsInId[]">
                                        @foreach ($vehicle_visitors_in as $vehicle_visitor)
                                            <option value="{{ $vehicle_visitor['id'] }}"{{ collect(old('visitorsId'))->contains($vehicle_visitor['id']) ? 'selected' : '' }}>{{ $vehicle_visitor['brand'] . " - " . $vehicle_visitor['model'] }} ({{ $vehicle_visitor['license_plate'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="vehicleVisitorsInId">Veículos dentro</label>
                                </div>
                                <div class="out hide">
                                    <select multiple id="vehicleVisitorsOutId" name="vehicleVisitorsOutId[]">
                                        @foreach ($vehicle_visitors_out as $vehicle_visitor)
                                            <option value="{{ $vehicle_visitor['id'] }}"{{ collect(old('visitorsId'))->contains($vehicle_visitor['id']) ? 'selected' : '' }}>{{ $vehicle_visitor['brand'] . " - " . $vehicle_visitor['model'] }} ({{ $vehicle_visitor['license_plate'] }})</option>
                                        @endforeach
                                    </select>
                                    <label for="vehicleVisitorsOutId">Veículos fora</label>
                                </div>
                            </div>
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
                        <a class="waves-effect waves-light btn teal darken-1 modal-trigger hoverable" href="#modalCreateVisitor">Cadastrar Visitante</a>
                        <a class="waves-effect waves-light btn teal darken-1 modal-trigger hoverable" href="#modalCreateVisitorVehicle">Cadastrar Veículo</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('concierge.modalCreateVisitor')

    @include('concierge.modalCreateVisitorVehicle')

@endsection
