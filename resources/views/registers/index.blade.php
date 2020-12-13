@extends('layouts.template')
@section('title', 'Plano de Chamada')
@section('subtitle', 'Plano de Chamada')
@section('index', 'registers.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">

        <div class="col s12 m6 l6">
            <div class="card hoverable">
                <div class="card-image">
                       <a href="{{ route('registers.dash') }}">
                        <img src="{{ asset('images/cards/dashboard-modules.jpg') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Dashboard</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l6">
            <div class="card hoverable">
                <div class="card-image">
                        <a href="{{ route('registers.reports') }}">
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
