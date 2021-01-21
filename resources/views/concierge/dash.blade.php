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
                        <p class="{{ $status[0] > 0 ? 'red-text' : '' }}">Dentro do quartel</p>
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
                        <p class="{{ $status[1] > 0 ? 'red-text' : '' }}">Dentro do quartel</p>
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
                        <p class="{{ $status[2] > 0 ? 'red-text' : '' }}">Fora do quartel</p>
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
                                <th>Militar</th>
                                <th>Registro</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obs as $val)
                            <tr>
                                <td>{{ $val['patent'] }} - {{ $val['name'] }} ({{ $val['nickname'] }})</td>
                                <td>{{ $val['table_used'] }}</td>
                                <td>{{ $val['obs'] }} {{ $val['table_id'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form id="responsible-table-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                        <ul class="pagination">
                            <li class="disabled"><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">chevron_left</i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!">2</a></li>
                            <li class="waves-effect"><a href="#!">3</a></li>
                            <li class="waves-effect"><a href="#!">4</a></li>
                            <li class="waves-effect"><a href="#!">5</a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </form>
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
