@extends('layouts.template')
@section('title', 'Relatório de Visitantes e Veículos')
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
        <table class="report hoverable ">
            <thead>
                <tr>
                    <th style="font-size: 16px" colspan="3">Relatório de Visitantes</th>
                </tr>
                <tr>
                    <th>Data - Hora</th>
                    <th>Registro</th>
                    <th>Visitante</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($visitorsReport as $val)
                    <tr>
                        <td>{{ $val['date'] }}</td>
                        <td>{{ $val['register_type'] }}</td>
                        <td>{{ $val['name'] }} ({{ $val['identity'] }})</td>
                    </tr>
                @empty
                    <tr style="font-style: italic;">
                        <td>(Sem registro)</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="3"><br></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th style="font-size: 16px" colspan="3">Relatório de Veículos</th>
                </tr>
                <tr>
                    <th>Data - Hora</th>
                    <th>Registro</th>
                    <th>Veículo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicleVisitorsReport as $val)
                    <tr>
                        <td>{{ $val['date'] }}</td>
                        <td>{{ $val['register_type'] }}</td>
                        <td>{{ $val['brand'] }} - {{ $val['model'] }} ({{ $val['license_plate'] }})</td>
                    </tr>
                @empty
                    <tr style="font-style: italic;">
                        <td>(Sem registro)</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
