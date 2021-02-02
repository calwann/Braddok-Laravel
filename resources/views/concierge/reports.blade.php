@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')
@section('name', 'concierge.collaborators')

@section('content')
    <form method="POST" action="{{ route('concierge.createCollaborators') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Relatórios</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="generateReport" name="registerType">
                                <option value="" disabled="disabled" {{ old('generateReport') == '' ? 'selected' : '' }}>
                                </option>
                                <option value="collaboratorsReport" {{ old('registerType') == 'collaboratorsReport' ? 'selected' : '' }}>Relatório de Militares</option>
                                <option value="visitorReport" {{ old('registerType') == 'visitorReport' ? 'selected' : '' }}>Relatório de Visitantes</option>
                                <option value="vehicleReport" {{ old('registerType') == 'vehicleReport' ? 'selected' : '' }}>Relatório de Viaturas</option>
                            </select>
                            <label for="generateReport">Gerar relatório</label>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
