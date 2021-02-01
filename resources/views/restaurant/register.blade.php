@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'restaurant.index')
@section('back', 'restaurant.index')
@section('name', 'restaurant.register')

@section('content')
    <form method="POST" action="{{ route('concierge.createCollaborators') }}">
        @csrf
        <div class="row container">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Arranchamento</h5>
                </div>
                <div class="card-content hoverable">
                    <table class="centered">
                        <thead>
                            <tr>
                                <th style="width: 40%">Dia</th>
                                <th>Café</th>
                                <th>Almoço</th>
                                <th>Janta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($days as $val)    
                            <tr>
                                <td>{{ $val }}</td>
                                <td>
                                    <label><input type="checkbox" /><span style="margin-left: 15px;"></span></label>
                                </td>
                                <td>
                                    <label><input type="checkbox" /><span style="margin-left: 15px;"></span></label>
                                </td>
                                <td>
                                    <label><input type="checkbox" /><span style="margin-left: 15px;"></span></label>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection
