@extends('layouts.template')
@section('title', 'Segurança')
@section('subtitle', 'Segurança')
@section('index', 'concierge.index')
@section('back', 'home.index')

@section('content')
    <div class="row container">
        <div class="col s12 l4">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Visitantes</h5>
                </div>
                <div class="card-content hoverable" style="padding: 6px 0 6px 0">
                    <div class="row center-align">
                        <h4 class="white-text text-shadow-s" style="font-weight: bold">{{ $status[0] }}</h4>
                        <p>Dentro do quartel</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 l4">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Veículos</h5>
                </div>
                <div class="card-content hoverable" style="padding: 6px 0 6px 0">
                    <div class="row center-align">
                        <h4 class="white-text text-shadow-s" style="font-weight: bold">{{ $status[1] }}</h4>
                        <p>Dentro do quartel</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 l4">
            <div class="card hoverable">
                <div class="card-action teal darken-1 white-text hoverable">
                    <h5>Viaturas</h5>
                </div>
                <div class="card-content hoverable" style="padding: 6px 0 6px 0">
                    <div class="row center-align">
                        <h4 class="white-text text-shadow-s" style="font-weight: bold">{{ $status[2] }}</h4>
                        <p>Fora do quartel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row container">
        <div class="card hoverable ">
            <div class="card-action teal darken-1 white-text hoverable">
                <h5>Lançamentos</h5>
            </div>
            <div class="card-content hoverable charts">
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
                .colors(['#8bc34a', '#ff7043', '#5c6bc0'])
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
