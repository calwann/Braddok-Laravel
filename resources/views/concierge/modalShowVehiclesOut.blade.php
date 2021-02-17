<div id="modalShowVehiclesOut" class="modal hoverable">
    <div class="modal-content">
        <div class="row">
            <h5 class="teal-text">Viaturas fora do quartel</h5>
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
                    @forelse (array_slice($vehicles_out, 0, 10) as $val)
                        <tr>
                            <td>{{ $val['brand'] }}</td>
                            <td>{{ $val['model'] }}</td>
                            <td>{{ $val['type'] }}</td>
                            <td>{{ $val['license_plate'] }}</td>
                            <td>{{ $val['date'] }}</td>
                        </tr>
                    @empty
                        <tr style="font-style: italic;">
                            <td>(Sem registro)</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
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
