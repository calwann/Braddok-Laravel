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
                        <div class="input-field col m4 s12">
                            <select id="registerType" name="registerType">
                                <option value="" disabled="disabled" {{ old('registerType') == '' ? 'selected' : '' }}>
                                </option>
                                <option value="1" {{ old('registerType') == '1' ? 'selected' : '' }}>Entrou</option>
                                <option value="2" {{ old('registerType') == '2' ? 'selected' : '' }}>Saiu</option>
                            </select>
                            <label for="registerType">Lançamento</label>
                        </div>
                        <div class="input-field col m8 s12">
                            <select multiple id="visitorsId" name="visitorsId[]" required>
                                @foreach ($visitors as $visitor)
                                    <option value="{{ $visitor['id'] }}"{{ collect(old('visitorsId'))->contains($visitor['id']) ? 'selected' : '' }}>{{ $visitor['name'] }} ({{ $visitor['identity'] }})</option>
                                @endforeach
                            </select>
                            <label for="visitorsId">Visitantes</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="datepicker material-icons prefix pointer tooltipped" data-position="right"
                                data-tooltip="Escolher Data">date_range</i>
                            <input id="date" type="text" class="datepicker-control validate date-validation" name="date"
                                value="{{ old('date') }}" placeholder="00/00/0000">
                            <label for="date">Data</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <i class="timepicker material-icons prefix pointer tooltipped" data-position="right"
                                data-tooltip="Escolher Hora">access_time</i>
                            <input id="time" type="text" class="timepicker-control validate time-validation" name="time"
                                value="{{ old('time') }}" placeholder="00:00">
                            <label for="time">Hora</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align hoverable" type="submit">Enviar</button>
                        <a class="waves-effect waves-light btn teal darken-1 modal-trigger hoverable" href="#modal1">Cadastrar
                            Visitante</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('concierge.createVisitor') }}">
        @csrf
        <div id="modal1" class="modal hoverable">
            <div class="modal-content hoverable">
                <div class="row">
                    <h5>Cadastrar Visitante</h5>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate text-upper" name="name" autocomplete="name"
                            value="{{ old('name') }}" autofocus>
                        <label for="name">Nome completo</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="identity" type="text" class="validate" name="identity" value="{{ old('identity') }}">
                        <label for="identity">Identidade</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="phone" type="text" class="validate phone-validation" name="phone"
                            value="{{ old('phone') }}" placeholder="(00) 0000-0000">
                        <label for="phone">Telefone</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="datepicker material-icons prefix pointer tooltipped" data-position="right"
                            data-tooltip="Escolher Data">date_range</i>
                        <input id="birth" type="text" class="datepicker-control validate date-validation" name="birth"
                            value="{{ old('birth') }}" placeholder="00/00/0000">
                        <label for="birth">Data de Nascimento</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer hoverable">
                <button class="waves-effect waves-light btn teal darken-1 left-align hoverable" name="submit"
                    type="submit">Enviar</button>
                <a class="waves-effect waves-light btn-floating indigo darken-1 modal-close hoverable tooltipped"
                    data-position="top" data-tooltip="Voltar" href="#!"><i class="material-icons">arrow_back</i></a>
            </div>
        </div>
    </form>
@endsection
