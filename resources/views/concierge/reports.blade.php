@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')
@section('name', 'concierge.reports')

@section('content')
    <form method="POST" action="{{ route('concierge.readReports') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Imprimir Relatórios</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <select id="generateReport" name="reportType">
                                <option value="" disabled="disabled" {{ old('generateReport') == '' ? 'selected' : '' }}>
                                </option>
                                <option value="collaboratorsReport"
                                    {{ old('reportType') == 'collaboratorsReport' ? 'selected' : '' }}>Entrada e Saída de Militares</option>
                                <option value="visitorReport"
                                    {{ old('reportType') == 'visitorReport' ? 'selected' : '' }}>Entrada e Saída de Visitantes e Veículos</option>
                                <option value="vehicleReport"
                                    {{ old('reportType') == 'vehicleReport' ? 'selected' : '' }}>Entrada e Saída de Viaturas</option>
                            </select>
                            <label for="generateReport">Relatórios</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="datepicker material-icons prefix pointer tooltipped" data-position="top"
                                data-tooltip="Escolher Data">date_range</i>
                            <input id="date" type="text" class="validate date-validation" name="date"
                                value="{{ old('date') }}" placeholder="00/00/0000">
                            <label for="date">Data que assumiu</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="timepicker material-icons prefix pointer tooltipped" data-position="top"
                                data-tooltip="Escolher Hora">access_time</i>
                            <input id="timeStart" type="text" class="validate time-validation" name="timeStart"
                                value="{{ old('timeStart') == '' ? '08:00' : old('timeStart') }}" placeholder="00:00">
                            <label for="timeStart">Hora que assumiu</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="timepicker material-icons prefix pointer tooltipped" data-position="top"
                                data-tooltip="Escolher Hora">access_time</i>
                            <input id="timeEnd" type="text" class="validate time-validation" name="timeEnd"
                                value="{{ old('timeEnd') == '' ? '08:00' : old('timeEnd') }}" placeholder="00:00">
                            <label for="timeEnd">Hora que passou</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align hoverable"
                            type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('concierge.modalRoadmapGuard')
    @include('concierge.modalRoadmapPatrol')
    @include('concierge.modalBookOfficial')

@endsection
