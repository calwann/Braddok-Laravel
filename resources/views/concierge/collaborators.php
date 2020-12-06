<form action="" method="POST">
  <div class="row container">
    <div class="card hoverable">
      <div class="card-action teal darken-1 white-text">
        <h5>Lançar Militares</h5>
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
            <select multiple id="usersId" name="usersId[]" required>
              <?php foreach ($rs['data']['users'] as $i => $val) {
                echo $val;
              } ?>
            </select>
            <label for="usersId">Militares</label>
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
        </div>
      </div>
    </div>
  </div>
</form>