
  <?php include 'layout/Header.php'; ?>

  <main id="signin">
    
      <div class="registration">
        <h2>Inscription</h2>

        <form method="POST" id="register-user" action="?action=signin">
          <div class="input-area">

            <div class="form-group">
              <label for="input-handle">Pseudo :</label>
              <input type="text" id="handle" class="form-control" name="handle"
                value="<?php if (isset($_POST['handle'])) {
                  echo htmlspecialchars($_POST['handle']);
                } ?>"
                placeholder="Entrer votre pseudo" required>
            </div>

            <div class="form-group">
              <label for="input-mail">Mail :</label>
              <input type="email" class="form-control" id="mail" name="mail"
                value="<?php if (isset($_POST['mail'])) {
                  echo htmlspecialchars($_POST['mail']);
                } ?>"
                placeholder="Entrer votre mail" required>
            </div>

            <div class="form-group">
              <label for="">Mot de passe :</label>
              <input type="password" class="form-control" id="password" name="password"
              value="<?php if (isset($_POST['mail'])) {
                  echo htmlspecialchars($_POST['password']);
                } ?>"
                placeholder="Créer votre mot de passe" required>
            </div>

            <div class="form-group">
              <label for="">Confirmez votre Mot de passe :</label>
              <input type="password" class="form-control" id="confirmpw" name="confirmpw"
                placeholder="Confirmer votre mot de passe" required>
            </div>

            <div class="policy">
              <h2>J'ai lu et j'accepte les conditions générales d'utilisation</h2>
              <input type="checkbox" required>
            </div>
            <div class="input-box-button">
              <button type="submit" class="button">Créer le compte</button>
            </div>
            <div class="already">
              <h2>Vous avez déjà un compte? <a href="?action=login">Connectez-vous</a></h2>
            </div>
          </div>
        </form>
      </div>
    
  </main>
<?php include 'layout/Footer.php'; ?>
