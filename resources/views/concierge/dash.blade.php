@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'home.index')

@section('content')
    <form method="POST" action="{{ route('concierge.createCollaborators') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Dashboard</h5>
                </div>
                <div class="card-content hoverable">
                    <div class="row">
                    </div>
                    <div class="row">
                        <button class="waves-effect waves-light btn teal darken-1 left-align hoverable" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
