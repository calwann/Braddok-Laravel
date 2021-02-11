@extends('layouts.template')
@section('title', 'Relatório de Militares')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'concierge.reports')
@section('name', 'concierge.reports')

@section('content')
    <div class="row container print">
        <div class="card" style="margin: 0">
            <div class="card-action hoverable">
                <button class="waves-effect waves-light btn teal darken-1 left-align hoverable"
                    onclick="window.print()">Imprimir</button>
            </div>
        </div>
    </div>
    <div class="row container">
        <table class="report hoverable">
            <thead>
                <tr>
                    <th style="font-size: 16px" colspan="3">Relatório de Militares</th>
                </tr>
                <tr>
                    <th>Data Hora</th>
                    <th>Registro</th>
                    <th>Militar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collaboratorsReport as $val)
                    <tr>
                        <td>{{ $val['date'] }}</td>
                        <td>{{ $val['register_type'] }}</td>
                        <td>{{ $val['patent'] }} - {{ $val['name'] }} ({{ $val['nickname'] }})</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
