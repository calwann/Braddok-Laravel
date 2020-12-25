@extends('layouts.template')
@section('title', 'Confirmar senha')
@section('subtitle', 'Braddok')
@section('back', 'login')

@section('content')
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
                <div class="card-action teal darken-1 white-text center-align hoverable">
                    <h4 class="text-shadow-s">Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text hoverable">
                    <h5>{{ __('Confirm Password') }}</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <span>{{ __('Please confirm your password before continuing.') }}</span>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required
                                autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>
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
                            type="submit">{{ __('Confirm Password') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
