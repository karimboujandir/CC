
<!DOCTYPE html>
<html>

<head>
  <title>Connexion</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="./css/globale.css">
  <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>
<header> <img src="./image/logoCC.png" class="logo"></header>

  <!-- connexion/inscription-->
  <div class="conteneur">
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="traitement_inscription.php" method="post">
          <h2 class="pink">Inscription</h2>
          <input type="text" placeholder="pseudo" name="pseudo" />
          <input type="email" placeholder="Mail" name="email" />
          <input type="password" placeholder="Mot de passe" name="password" />
          <button type="submit" name="inscription">Inscription</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="traitement_login.php" method="post">
          <h2 class="pink">Se Connecter</h2>
          <input type="text" placeholder="pseudo" name="pseudo" />
          <input type="password" placeholder="Mot de passe" name="password" />
          <a href="#">Mot de passe oublié?</a>
          <button type="submit" name="connexion">Connexion</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h2>Se connecter</h2>
            <p>Vous avez déjà un compte, connectez-vous !</p>
            <button class="ghost" id="signIn">Connexion</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h2>Créer un compte</h2>
            <p>Vous êtes nouveaux ? Inscrivez-vous !</p>
            <button class="ghost" id="signUp">Créer un compte</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <script src="./javascript/connexion.js"></script>
</body>

</html>