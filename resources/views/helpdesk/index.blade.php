@extends('layouts.template')
@section('title', 'Helpdesk')
@section('subtitle', 'Helpdesk')
@section('index', 'helpdesk.index')
@section('back', 'home.index')
@section('name', 'helpdesk.index')

@section('content')
    <div class="row container">

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('helpdesk.dash') }}">
                        <img src="{{ asset('images/cards/dashboard-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Dashboard</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('helpdesk.request') }}">
                        <img src="{{ asset('images/cards/register-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Chamados</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('helpdesk.support') }}">
                        <img src="{{ asset('images/cards/reports-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Suporte</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
