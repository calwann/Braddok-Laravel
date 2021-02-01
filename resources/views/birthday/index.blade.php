@extends('layouts.template')
@section('title', 'Aniversariantes')
@section('subtitle', 'Aniversariantes')
@section('index', 'birthday.index')
@section('back', 'home.index')
@section('name', 'birthday.index')

@section('content')
    <div class="row container">

        <div class="col m12">
            <div class="card hoverable">
                <div class="card-image">
                    <a href="#">
                        <img src="{{ asset('images/cards/birthday.webp') }}">
                        <span class="card-title">
                            <h5 class="text-shadow">Aniversariantes</h5>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
