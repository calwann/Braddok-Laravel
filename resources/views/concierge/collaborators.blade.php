@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')

@section('content')
    <form method="POST" action="{{ route('concierge.createCollaborators') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Lançar Militares</h5>
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
                            <select multiple id="usersId" name="usersId[]">
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}"{{ collect(old('usersId'))->contains($user['id']) ? 'selected' : '' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersId">Militares</label>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
