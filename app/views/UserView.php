<?php include 'layout/Header.php'; ?>
<main>
<div class="registration">
        <h2>Inscription</h2>

        <form method="POST" id="register-user" action="?action=signin">
          <div class="input-area">

            <div class="form-group">
              <label for="input-handle">Nouveau Pseudo :</label>
              <input type="text" id="handle" class="form-control" name="handle"
                value="<?php if (isset($_POST['handle'])) {
                  echo htmlspecialchars($_POST['handle']);
                } ?>"
                placeholder="Modifier votre pseudo" required>
            </div>

            <div class="form-group">
              <label for="input-mail">Nouveau Mail :</label>
              <input type="email" class="form-control" id="mail" name="mail"
                value="<?php if (isset($_POST['mail'])) {
                  echo htmlspecialchars($_POST['mail']);
                } ?>"
                placeholder="Modifier votre mail" required>
            </div>

            <div class="form-group">
              <label for="">Nouveau Mot de passe :</label>
              <input type="password" class="form-control" id="signpassword" name="signpassword"
                placeholder="Modifier votre mot de passe" required>
            </div>

            <div class="form-group">
              <label for="">Confirmez votre nouveau Mot de passe :</label>
              <input type="password" class="form-control" id="confirmpw" name="confirmpw"
                placeholder="Confirmer votre mot de passe" required>
            </div>


            <div class="input-box-button">
              <button type="submit" class="button">Modifier le compte</button>
            </div>

          </div>
        </form>
      </div>
    <form method="POST" id="logout-form" action="?action=logout">
    <div class="input-box-button">
        <button type="submit" class="button">Déconnexion</button>
    </div>
</form>

</main>
<?php include 'layout/Footer.php'; ?>