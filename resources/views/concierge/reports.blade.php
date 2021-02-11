@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')
@section('name', 'concierge.reports')

@section('content')
    <div class="row container">
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalRoadmapGuard">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_array</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Roteiro da Guarda do Quartel
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalRoadmapPatrol">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_carousel</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Roteiro de Ronda
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalBookOfficial">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_stream</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Livro do Oficial de Dia
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('concierge.readReports') }}">
        @csrf
        <div class="row container">
            <div class="col s12">
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
                                    <option value="collaboratorsInWorkReport"
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
                                    value="{{ old('timeStart') == '' ? "08:00" : old('timeStart') }}" placeholder="00:00">
                                <label for="timeStart">Hora que assumiu</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <i class="timepicker material-icons prefix pointer tooltipped" data-position="top"
                                    data-tooltip="Escolher Hora">access_time</i>
                                <input id="timeEnd" type="text" class="validate time-validation" name="timeEnd"
                                    value="{{ old('timeEnd') == '' ? "08:00" : old('timeEnd') }}" placeholder="00:00">
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
        </div>
    </form>

    @include('concierge.modalRoadmapGuard')
    @include('concierge.modalRoadmapPatrol')
    @include('concierge.modalBookOfficial')

@endsection
