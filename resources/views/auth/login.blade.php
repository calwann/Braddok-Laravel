@extends('layouts.template')
@section('title', 'Entrar')
@section('subtitle', 'Braddok')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
                <div class="card-action teal darken-1 white-text center-align hoverable">
                    <h4>Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text hoverable">
                    <h5>{{ __('Login') }}</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" autocomplete="email"
                                value="{{ old('email') }}" autofocus>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password"
                                autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>
                        </div>
                        <div class="form-field col s12">
                            <label>
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="row">
                            <a href="{{ route('password.request') }}" class="">
                                <span>{{ __('Forgot Your Password?') }}</span>
                            </a>
                        </div>
                    @endif
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 hoverable"
                            type="submit">{{ __('Login') }}</button>
                        <a href="{{ route('register') }}"
                            class="waves-effect waves-light btn teal darken-1 hoverable">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="fixed-action-btn direction-top active" style="bottom: 30px; right: 30px;">
        <a id="menu" class="waves-effect waves-light btn btn-floating btn-large deep-purple hoverable tooltipped"
            data-position="left" data-tooltip="Informações" onclick="$('.tap-target').tapTarget('open')">
            <i class="material-icons">menu</i>
        </a>
    </div>

    <div class="tap-target deep-purple" data-target="menu">
        <div class="tap-target-content white-text"
            style="width: 456px; height: 400px; inset: 0px; padding: 56px; vertical-align: bottom;">
            <h5>Braddok System</h5>
            <p class="white-text">Este sistema está sendo desenvoldido e mantido por dois programadores apaixonados pelo que
                fazem.</p>
        </div>
    </div>


@endsection
