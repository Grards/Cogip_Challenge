<!DOCTYPE html>
<html>
<head>
  <script src="../../public/assets/js/formsLog.js"></script>
  <title>Formulaire de connexion</title>
  <link href="<?php echo BASE_URL.'assets/css/style.css'?>" rel="stylesheet" type="text/css">
    <script src="<?php echo BASE_URL.'assets/js/script.js'?>" type="module"></script>
</head>
<body>
  <div class="container">
    <form id="loginForm">
      <h2>Connexion</h2>
      <input type="text" placeholder="Nom d'utilisateur" id="username" required>
      <input type="password" placeholder="Mot de passe" id="password" required>
      <button type="submit">Se connecter</button>
    </form>
    <p id="message"></p>
  </div>

  
</body>
</html>
