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
                    <th style="font-size: 16px" colspan="6">Relatório de Viaturas</th>
                </tr>
                <tr>
                    <th>Data - Hora</th>
                    <th>Registro</th>
                    <th>Viatura</th>
                    <th>Odômetro</th>
                    <th>Chefe Vtr</th>
                    <th>Motorista</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehiclesReport as $val)
                    <tr>
                        <td>{{ $val['date'] }}</td>
                        <td>{{ $val['register_type'] }}</td>
                        <td>{{ $val['brand'] }} - {{ $val['model'] }} ({{ $val['license_plate'] }})</td>
                        <td>{{ $val['odometer'] }} Km</td>
                        <td>{{ $val['boss_patent'] }} - {{ $val['boss_name'] }} ({{ $val['boss_nickname'] }})</td>
                        <td>{{ $val['driver_patent'] }} - {{ $val['driver_name'] }} ({{ $val['driver_nickname'] }})</td>
                    </tr>
                @empty
                    <tr style="font-style: italic;">
                        <td>(Sem registro)</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforelse
                <tr>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
