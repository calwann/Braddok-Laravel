<form method="POST" action="{{ route('concierge.createVisitor') }}">
    @csrf
    <div id="modalCreateVisitor" class="modal hoverable">
        <div class="modal-content">
            <div class="row">
                <h5 class="teal-text bold-text">Cadastrar Visitante</h5>
            </div>
            <div class="divider"></div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate text-upper" name="name" autocomplete="name"
                        value="{{ old('name') }}" autofocus>
                    <label for="name">Nome completo</label>
                </div>
                <div class="input-field col s12">
                    <input id="identity" type="text" class="validate" name="identity" value="{{ old('identity') }}">
                    <label for="identity">Identidade</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="phone" type="text" class="validate phone-validation" name="phone"
                        value="{{ old('phone') }}" placeholder="(00) 0000-0000">
                    <label for="phone">Telefone</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="datepicker material-icons prefix pointer tooltipped" data-position="top"
                        data-tooltip="Escolher Data">date_range</i>
                    <input id="birth" type="text" class="datepicker-control validate date-validation" name="birth"
                        value="{{ old('birth') }}" placeholder="00/00/0000">
                    <label for="birth">Data de Nascimento</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="waves-effect waves-light btn teal darken-1 left-align hoverable" type="submit">Enviar</button>
            <a class="waves-effect waves-light btn-floating indigo darken-1 modal-close hoverable tooltipped"
                data-position="top" data-tooltip="Voltar" href="#!"><i class="material-icons">arrow_back</i></a>
        </div>
    </div>
</form>
