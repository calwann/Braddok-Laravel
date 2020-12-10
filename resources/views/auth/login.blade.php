@extends('layouts.template')
@section('title', 'Entrar')
@section('subtitle', 'Braddok')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
                <div class="card-action teal darken-1 white-text center-align">
                    <h4>Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text">
                    <h5>{{ __('Login') }}</h5>
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
                        <button class="waves-effect waves-light btn teal darken-1 hoverable" type="submit">{{ __('Login') }}</button>
                        <a href="{{ route('register') }}"
                            class="waves-effect waves-light btn teal darken-1 hoverable">{{ __('Register') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
