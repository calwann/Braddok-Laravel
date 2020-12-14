@extends('layouts.template')
@section('title', 'Redefinir senha')
@section('subtitle', 'Braddok')
@section('back', 'login')

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
                <div class="card-action teal darken-1 white-text center-align hoverable">
                    <h4>Braddok</h4>
                </div>
                <div class="card-action teal lighten-2 white-text hoverable">
                    <h5>Redefinir senha</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>
                            <label for="email">{{ __('E-Mail Address') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 hoverable"
                            type="submit">Enviar solicitação</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
