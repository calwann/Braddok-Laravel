@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">
        <div class="card hoverable">
            <div class="card-action teal darken-1 white-text hoverable">
                <h5>Lançamentos</h5>
            </div>
            <div class="card-content hoverable" style="padding: 24px 0 0 0; overflow-x: scroll;">
                <div class="row">
                    <!-- Chart's container -->
                    <div id="chart" style="height: 400px; min-width: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container">
        <div class="card hoverable">
            <div class="card-action teal darken-1 white-text hoverable">
                <h5>Responsáveis</h5>
            </div>
            <div class="card-content hoverable">
                <div class="row">
                    <table class="responsive-table highlight">
                        <thead>
                            <tr style="cursor: pointer">
                                <th>Name</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alvin</td>
                                <td>Eclair</td>
                                <td>$0.87</td>
                            </tr>
                            <tr>
                                <td>Alan</td>
                                <td>Jellybean</td>
                                <td>$3.76</td>
                            </tr>
                            <tr>
                                <td>Jonathan</td>
                                <td>Lollipop</td>
                                <td>$7.00</td>
                            </tr>
                        </tbody>
                    </table>
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
            url: "@chart('concierge_chart')",
            hooks: new ChartisanHooks()
                //.title('FUZ HO DA!')
                .colors(['#8d6e63', '#5c6bc0', '#8bc34a'])
                .legend({
                    position: 'bottom'
                })
                .tooltip()
                .datasets([{
                        type: 'bar',
                        stack: 'one'
                    },
                    {
                        type: 'bar',
                        stack: 'one'
                    },
                    {
                        type: 'bar',
                        stack: 'one'
                    }
                ]),
            loader: {
                color: ' #90a4ae',
                size: [30, 30],
                type: 'bar',
            },
            error: {
                color: '#90a4ae',
                size: [30, 30],
                text: 'Data not found',
                textColor: '#607d8b',
                type: 'general',
                debug: true,
            },
        });

    </script>
@endsection
