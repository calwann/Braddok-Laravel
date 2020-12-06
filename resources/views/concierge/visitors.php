<form action="" method="POST">
  <div class="row container">
    <div class="card hoverable">
      <div class="card-action teal darken-1 white-text">
        <h5>Lançar Visitantes</h5>
      </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field col m4 s12">
            <select id="registerType" name="registerType" required>
              <option value="" disabled="disabled" selected="selected"></option>
              <option value="1">Entrou</option>
              <option value="2">Saiu</option>
            </select>
            <label for="registerType">Lançamento</label>
          </div>
          <div class="input-field col m8 s12">
            <select id="visitorsId" name="visitorsId" required>
              <?php foreach ($rs['data']['collaborators'] as $i => $val) {
                echo $val;
              } ?>
            </select>
            <label for="visitorsId">Visitantes</label>
          </div>
          <div class="input-field col m6 s12">
            <input id="date" type="text" class="datepicker validate" name="date" required>
            <label for="date">Data</label>
          </div>
          <div class="input-field col m6 s12">
            <input id="time" type="text" class="timepicker validate" name="time" required>
            <label for="time">Hora</label>
          </div>
        </div>
        <div class="row">
          <button class="waves-effect waves-light btn teal darken-1 left-align" name="submit" type="submit">Enviar</button>
          <a class="waves-effect waves-light btn teal darken-1 modal-trigger" href="#modal1">Cadastrar Visitante</a>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="" method="POST">
  <div id="modal1" class="modal">
    <div class="modal-content">
      <div class="row">
        <h5>Cadastrar Visitante</h5>
      </div>
      <div class="row">
        <div class="input-field">
          <input id="fullName" type="text" class="validate" name="fullName" maxlength="200" required>
          <label for="fullName">Nome Completo</label>
        </div>
        <div class="input-field">
          <input id="identity" type="text" class="validate counter" name="identity" pattern="[0-9]+$" data-length="20" maxlength="20" required>
          <label for="identity">Identidade</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="phone" type="text" class="validate phone" name="phone" required>
          <label for="phone">Telefone</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="dateType" type="text" class="validate date" name="birth" required>
          <label for="dateType">Data de Nascimento</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="dateType" type="text" class="validate date" name="birth" required>
          <label for="dateType">Data de Nascimento</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn teal darken-1 left-align" name="submit" type="submit">Enviar</button>
      <a class="waves-effect waves-light btn teal darken-1 modal-close" href="#!">Voltar</a>
    </div>
  </div>
</form>