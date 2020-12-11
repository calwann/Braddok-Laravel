@extends('layouts.template')
@section('title', 'Registrar')
@section('subtitle', 'Braddok')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text center-align">
                    <h4>Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text">
                    <h5>{{ __('Register') }}</h5>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" class="validate" name="name"  autocomplete="name" value="{{ old('name') }}"
                                autofocus>
                            <label for="name">Nome completo</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" 
                                autocomplete="email">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" 
                                autocomplete="new-password">
                            <label for="password">{{ __('Password') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation"
                                 autocomplete="new-password">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="identity" type="text" class="validate" name="identity" value="{{ old('identity') }}" >
                            <label for="identity">Identidade</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <select id="patent" class="patent" name="patent" >
                            </select>
                            <label for="patent">Posto/ Graduação</label>
                        </div>
                        <div class="input-field col s12 m8">
                            <input id="nickname" type="text" class="validate" name="nickname" value="{{ old('nickname') }}" >
                            <label for="nickname">Nome de Guerra</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="address" type="text" class="validate" name="address" value="{{ old('address') }}">
                            <label for="address">Endereço</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="district" type="text" class="validate" name="district" value="{{ old('district') }}">
                            <label for="district">Bairro</label>
                        </div>
                        <div class="input-field col s12 m8">
                            <input id="city" type="text" class="validate" name="city" value="Três Lagoas">
                            <label for="city">Cidade</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <select id="state" class="state-selected" name="state">
                            </select>
                            <label for="state">Estado</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="phone" type="text" class="validate" name="phone" value="{{ old('phone') }}" >
                            <label for="phone">Telefone celular</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="phone_2" type="text" class="validate" name="phone_2" value="{{ old('phone_2') }}" >
                            <label for="phone_2">Telefone fixo</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align hoverable"
                            type="submit">Registrar</button>
                        <a href="{{ route('login') }}" class="waves-effect waves-light btn teal darken-1 hoverable">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
