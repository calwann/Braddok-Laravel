@extends('layouts.template')
@section('title', 'Aplicativos')
@section('subtitle', 'Braddok')

@section('content')
<div class="row container">
    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/concierge/index">
                    <img src="{{ asset('images/cards/concierge.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Segurança</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/restaurant/index">
                    <img src="{{ asset('images/cards/restaurant.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Arranchamento</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/performance/index">
                    <img src="{{ asset('images/cards/performance.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Caverinha</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/register/index">
                    <img src="{{ asset('images/cards/register.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Plano de Chamada</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/helpdesk/index">
                    <img src="{{ asset('images/cards/helpdesk.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Help Desk</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
                <a href="/birthday/index">
                    <img src="{{ asset('images/cards/birthday.webp') }}">
                    <span class="card-title">
                        <h5 class="text-shadow">Aniversariantes</h5>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row container hide-on-med-and-down" style="height: 30px;"></div>
@endsection