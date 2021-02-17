@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')
@section('name', 'concierge.scripts')

@section('content')
    <div class="row container">
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalRoadmapGuard">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_array</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Roteiro da Guarda do Quartel
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalRoadmapPatrol">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_carousel</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Roteiro de Ronda
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l4">
            <a class="modal-trigger" href="#modalBookOfficial">
                <div class="card-panel grey lighten-5 z-depth-1 hoverable">
                    <div class="row valign-wrapper">
                        <div class="col s4" style="padding: 0">
                            <i class="large material-icons cyan-text text-darken-4">view_stream</i>
                        </div>
                        <div class="col s8">
                            <h5 class="black-text" style="margin: 0">
                                Preencher Livro do Oficial de Dia
                            </h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @include('concierge.modalRoadmapGuard')
    @include('concierge.modalRoadmapPatrol')
    @include('concierge.modalBookOfficial')

@endsection
