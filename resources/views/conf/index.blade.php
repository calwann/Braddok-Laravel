@extends('layouts.template')
@section('title', 'Configuração')
@section('subtitle', 'Configuração')
@section('index', 'conf.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">

        <div class="col m12">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="">
                        <img src="{{ asset('images/background.webp') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Painel</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
