<div id="modalShowVehiclesVisitorsIn" class="modal hoverable">
    <div class="modal-content">
        <div class="row">
            <h5 class="teal-text">Veículo de visitantes dentro do quartel</h5>
        </div>
        <div class="divider"></div>
        <div class="row">
            <table class="responsive-table highlight">
                <thead>
                    <tr style="cursor: pointer">
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (array_slice($vehicle_visitors_in, 0, 10) as $val)
                        <tr>
                            <td>{{ $val['brand'] }}</td>
                            <td>{{ $val['model'] }}</td>
                            <td>{{ $val['type'] }}</td>
                            <td>{{ $val['license_plate'] }}</td>
                            <td>{{ $val['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer z-depth-3">
        <a class="waves-effect waves-light btn teal darken-1 left-align hoverable"
            href="{{ route('concierge.visitors') }}">Lançar Visitantes</a>
        <a class="waves-effect waves-light btn-floating indigo darken-1 modal-close hoverable tooltipped"
            data-position="top" data-tooltip="Voltar" href="#!"><i class="material-icons">arrow_back</i></a>
    </div>
</div>
