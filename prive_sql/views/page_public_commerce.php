<?php $content; ?>
<!DOCTYPE HTML>

<html>

<head>
    <title>BruzUp - commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style_page_admin.css">
    <script src="script_page_admin.js"></script>
</head>

<body>

   <header>
      <h1>Gestion des exposants</h1>
   </header>

   <main>
      <div class="wm1200">
         <button class="vert" onclick="body_mode('cadre_ajouter')">Ajouter</button>
      </div>

      <table class="striped pa_20_0_0_0">
         <thead>
            <tr>
               <th>Identifiant</th>
               <th>Nom</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>

<?php foreach ($datas as $seller) { ?>

            <tr>
               <td><?php echo $seller["id"]; ?></td>
               <td><?php echo $seller["nom"]; ?></td>
               <td>
                  <button onclick="body_mode('cadre_modifier',<?php echo $seller["id"]; ?>)">Modifier</button>
                  <button onclick="body_mode('cadre_supprimer',<?php echo $seller["id"]; ?>)">Supprimer</button>
               </td>
            </tr>

<?php } ?>

         </tbody>
      </table>
   </main>
</body>
</html>