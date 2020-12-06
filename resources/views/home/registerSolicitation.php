<form action="" method="POST">
  <div class="row container">
    <div class="card hoverable">
      <div class="card-action teal darken-1 white-text">
        <h4>Solicitar Cadastro</h4>
      </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field">
            <input id="fullName" type="text" class="validate" name="fullName" required>
            <label for="fullName">Nome Completo</label>
          </div>
          <div class="input-field">
            <input id="email" type="email" class="validate" name="email" required>
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input id="identity" type="text" class="validate" name="identity" required>
            <label for="identity">Identidade</label>
          </div>
          <div class="row">
            <div class="input-field col s12 m4">
              <select id="patent" class="patent" name="patent" required>
              </select>
              <label for="patent">Posto/ Graduação</label>
            </div>
            <div class="input-field col s12 m8">
              <input id="nickname" type="text" class="validate" name="nickname" required>
              <label for="nickname">Nome de Guerra</label>
            </div>
          </div>
        </div>
        <div class="row">
          <button class="waves-effect waves-light btn teal darken-1 left-align" name="login" type="submit">Enviar</button>
          <a id="register" href="<?php echo URL_BASE ?>home/index" class="waves-effect waves-light btn teal darken-1 right-align" name="login">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="row container hide-on-med-and-down" style="height: 125px;"></div>