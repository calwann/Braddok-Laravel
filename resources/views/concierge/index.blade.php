@extends('layouts.template')
@section('title', 'Dashboard')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')

@section('content')
    <div class="row container">

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('concierge.dash') }}">
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
                    <a href="{{ route('concierge.collaborators') }}">
                        <img src="{{ asset('images/cards/register-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Lançar Militares</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('concierge.visitors') }}">
                        <img src="{{ asset('images/cards/register-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Lançar Visitantes</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('concierge.vehicles') }}">
                        <img src="{{ asset('images/cards/register-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Lançar Viaturas</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('concierge.reports') }}">
                        <img src="{{ asset('images/cards/reports-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Relatórios</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="row container hide-on-med-and-down" style="height: 110px;"></div>
@endsection
