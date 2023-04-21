<?php include 'layout/Header.php'; ?>
<main id="login">

  
    
      <div class="connection">
        <h2>Connexion</h2>
        <form action="#" method="POST">
          <div class="input-area">

            <label for="pseudo">Pseudo :
              <input type="text" id="handle" name="handle" placeholder="Entrer votre pseudo" required></label>
            <label for="">Mot de passe :
              <input type="password" placeholder="Entrer votre mot de passe" required></label>
            <div class="input-box-button">
              <input type="Submit" value="Connectez-vous">
            </div>
            <div class="already">
              <h2>Vous n'avez pas de compte? <a href="?action=signin">Inscrivez-vous</a></h2>
            </div>
          </div>
        </form>
      </div>
    

  
</main>
<?php include 'layout/Footer.php'; ?>