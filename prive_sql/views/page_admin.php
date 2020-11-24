<?php $content; ?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Tableau Administrateur</title>
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

   <div class="hidden cadre_ajouter">
      <div class="cadre_div1">
         <form method="post">
            <div class="bloc4">
               <span>Ajouter un commerçant</span>
               <button class="fermer" onclick="body_mode('');return false">x</button>
            </div>
            <article>
               <label for="formGroupExampleInput2">Nom</label>
               <input type="text" autocomplete="off" name="form_nom" placeholder="Nom du commerçant">
            </article>
            <div class="bloc6">
               <button type="submit" name="action" value="add">Ajouter</button>
               <button class="annuler" onclick="body_mode('');return false">Annuler</button>
            </div>
         </form>
      </div>
   </div>

   <div class="hidden cadre_modifier">
      <div class="cadre_div1">
         <form method="post">
            <div class="bloc4">
               <span>Modifier un commerçant</span>
               <button class="fermer" onclick="body_mode('');return false">x</button>
            </div>
            <article>
               <input type="hidden" name="form_id" value="-1">
               <label for="formGroupExampleInput2">Nom</label>
               <input type="text" autocomplete="off" name="form_nom" placeholder="Nom du commerçant">
            </article>
            <div class="bloc6">
               <button type="submit" name="action" value="update">Modifier</button>
               <button class="annuler" onclick="body_mode('');return false">Annuler</button>
            </div>
         </form>
      </div>
   </div>

   <div class="hidden cadre_supprimer">
      <div class="cadre_div1">
         <form method="post">
            <div class="bloc4">
               <span>Supprimer un commerçant</span>
               <button class="fermer" onclick="body_mode('');return false">x</button>
            </div>
            <article>
               Souhaitez-vous vraiment supprimer ce commerçant ?
               <input type="hidden" name="form_id" value="-1">
            </article>
            <div class="bloc6">
               <button type="submit" name="action" value="delete">Supprimer</button>
               <button class="annuler" onclick="body_mode('');return false">Annuler</button>
            </div>
         </form>
      </div>
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