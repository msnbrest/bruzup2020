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
      Association de commerçants
   </header>

   <main>
<?php if(isset($datas) && isset($datas["error"]) && $datas["error"]=="zero_commercant_found"){ ?>
      <div class="cadre_w100p_error">
         Désolé, le document n'a pas été trouvé, vous voici à l'accueil
      </div>
<? } ?>
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
if (isset( $seller["id"] )) {
?>

         <article>
            <h3><?php echo $seller["nom"]; ?> (<?php echo $seller["id"]; ?>)</h3>
            <p>Ce magasin vous accueille sur une surface vraiment grande et vous propose plusieurs gammes de produits.</p>
         </article>

<?php
}
}
?>

      </div>
   </section>

   <footer>
      les liens asso
   </footer>
</body>
</html>