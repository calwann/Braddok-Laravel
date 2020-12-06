@extends('layouts.template')
@section('title', 'Alterar senha')
@section('subtitle', 'Braddok')

@section('content')

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row container">
            <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
                <div class="card-action teal darken-1 white-text center-align">
                    <h4>Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text">
                    <h5>Alterar senha</h5>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" required autocomplete="email"
                                autofocus>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required
                                autocomplete="new-password">
                            <label for="password">{{ __('Password') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation"
                                required autocomplete="new-password">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 hoverable"
                            type="submit">{{ __('Reset Password') }}</button>
                        <a href="{{ route('login') }}"
                            class="waves-effect waves-light btn teal darken-1 hoverable">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
