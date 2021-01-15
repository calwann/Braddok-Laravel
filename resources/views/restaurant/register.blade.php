@extends('layouts.template')
@section('title', 'Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.index')

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
                                <th>Dia</th>
                                <th>Café</th>
                                <th>Almoço</th>
                                <th>Janta</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Alvin</td>
                                <td>
                                    <label>
                                        <input type="checkbox" /> <span></span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" /> <span></span>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="checkbox" /> <span></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>Alvin</td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                            </tr>
                            <tr>
                                <td>Alvin</td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                                <td><label>
                                        <input type="checkbox" /> <span></span>
                                    </label></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>
@endsection
