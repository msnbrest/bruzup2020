<?php $content; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title>BruzUp - Accueil</title>
   <script type="text/javascript" src="script.js"></script>
   <link rel="stylesheet" href="style.css">
</head>

<body class="accueil">
	<header>
       <div class="titre_logo">
			Association de commerçants
       </div>

       <nav class="navbar">
           <ul>
               <li><a href="#">Accueil</a></li>
               <li><a href="#">L'asso</a></li>
               <li><a href="#">Les commerces</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Connexion</a></li>
           </ul>
       </nav>
   </header>

   <main>
<?php if(isset($datas) && isset($datas["error"]) && $datas["error"]=="zero_commercant_found"){ ?>
      <div class="cadre_w100p_error">
         Désolé, le document n'a pas été trouvé, vous voici à l'accueil
      </div>
<?php } ?>
      <div class="pres_1">
         Présentation de l'asso & news caroussel?
      </div>
      <div class="pres_2">
         Texte ici : Recusandae blanditiis ea numquam voluptatibus perspiciatis voluptate quibusdam atque dolor placeat vel quae illum repellat cumque, magnam iure
         nisi mollitia obcaecati totam!
      </div>
   </main>

   <section>
      <p>Liste des commerces</p>
      <div class="flex_beetw">

<?php
foreach ($datas as $seller) {
?>

         <article style="height:600px">
            <h3><?php echo $seller["nom"]; ?> (<?php echo $seller["id"]; ?> - <?php echo $seller["categorie"]; ?>)</h3>
            <p><?php echo $seller["description"]; ?></p>
         </article>

<?php
}
?>

      </div>
   </section>

   <footer>
      les liens asso
   </footer>

<div class="bouton_remonter" onclick="window.scroll(0,0)"></div>

</body>
</html>