<!DOCTYPE HTML>
<html>

<head>
   <title>Tableau Administrateur</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="style_page_admin.css">
</head>

<body class="body_login" onload="document.getElementById('exampleInputEmail1').focus()">
   <form method='post' action='/admin_bdd/index.php'>
      <div><label for="exampleInputEmail1">Login</label></div>
      <div><input type="text" name="login" id="exampleInputEmail1"></div>

      <div><label for="exampleInputPassword1">Mot de passe</label></div>
      <div><input type="password" name="password" id="exampleInputPassword1"></div>

      <div><button type="submit" name="action" value="connect">Connexion</button></div>
   </form>
</body>
</html>