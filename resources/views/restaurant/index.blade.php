@extends('layouts.template')
@section('title', 'Arranchamento')
@section('subtitle', 'Arranchamento')
@section('index', 'restaurant.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('restaurant.dash') }}">
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
                    <a href="{{ route('restaurant.register') }}">
                        <img src="{{ asset('images/cards/register-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Arranchar</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="{{ route('restaurant.reports') }}">
                        <img src="{{ asset('images/cards/reports-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Relatórios</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
