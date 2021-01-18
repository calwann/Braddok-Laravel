@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">
        <div class="card hoverable">
            <div class="card-action teal darken-1 white-text hoverable">
                <h5>Dashboard</h5>
            </div>
            <div class="card-content hoverable" style="padding: 24px 0; overflow-x: scroll;">
                <div class="row">
                    <!-- Chart's container -->
                    <div id="chart" style="height: 400px; min-width: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('sample_chart')",
            hooks: new ChartisanHooks()
                //.title('FUZ HO DA!')
                .colors(['#ECC94B', '#4299E1'])
                .legend({
                    position: 'bottom'
                })
                .tooltip()
                .datasets(['bar']),
            //.datasets([{ type: 'line', fill: false }, 'bar']),
            //.datasets('doughnut')
            //.pieColors(),
            loader: {
                color: '#ff00ff',
                size: [30, 30],
                type: 'bar',
                textColor: '#ffff00',
                text: 'Loading some chart data...',
            },
            error: {
                color: '#ff00ff',
                size: [30, 30],
                text: 'Yarr! There was an error...',
                textColor: '#ffff00',
                type: 'general',
                debug: true,
            },
        });

    </script>
@endsection
