@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')

@section('content')
    <form method="POST" action="{{ route('concierge.createCollaborators') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text">
                    <h5>Lançar Militares</h5>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <select id="registerType" name="registerType" >
                                <option value="" disabled="disabled" {{ old('registerType') == "" ? "selected" : "" }}></option>
                                <option value="1" {{ old('registerType') == "1" ? "selected" : "" }}>Entrou</option>
                                <option value="2" {{ old('registerType') == "2" ? "selected" : "" }}>Saiu</option>
                            </select>
                            <label for="registerType">Lançamento</label>
                        </div>
                        <div class="input-field col m8 s12">
                            <select multiple id="usersId" name="usersId[]" >
                                @foreach ($users as $user)
                                    <option value="{{ $user['id'] }}" {{ (collect(old('usersId'))->contains($user['id'])) ? 'selected':'' }}>{{ $user['patent'] }} - {{ $user['name'] }} ({{ $user['nickname'] }})</option>
                                @endforeach
                            </select>
                            <label for="usersId">Militares</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="date" type="text" class="datepicker validate" name="date" value="{{ old('date') }}" >
                            <label for="date">Data</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="time" type="text" class="timepicker validate" name="time" value="{{ old('time') }}" >
                            <label for="time">Hora</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
