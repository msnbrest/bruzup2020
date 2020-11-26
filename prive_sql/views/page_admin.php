<?php $content; ?>
<!DOCTYPE HTML>

<html>

<head>
    <title>Administration BruzUp</title>
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
			<input type="search" class="input_solo" value="" placeholder="ecrivez quelque chose puis appuyez sur entrée" onkeydown="if(event.keyCode==13){rechercher(this.value);this.style.background='#fff'}else{this.style.background='#cfc'}">
      </div>

   <div class="hidden cadre_ajouter">
      <div class="cadre_div1">
         <form method="post">
            <div class="bloc4">
               <span>Ajouter un commerçant</span>
               <button class="fermer" onclick="body_mode('');return false">x</button>
            </div>
            <article>
					<label>Nom</label>
					<input type="text" class="input_admin_first_cadre_ajouter" autocomplete="off" name="form_nom" placeholder="La Boutique de Bruz">
					<label>Catégorie</label>
					<input type="text" autocomplete="off" name="form_categorie" placeholder="progra futur select">
					<label>Mot de passe compte</label>
					<input type="password" autocomplete="off" name="form_mdp" placeholder="ABCZabcz@-0129">
					<label>Liens</label>
					<input type="text" autocomplete="off" name="form_liens" placeholder="https://sous.domaine.extention/;http://www.exemple.com/">
					<label>Description</label>
					<input type="text" autocomplete="off" name="form_description" placeholder="Ce commerçant propose ceci cela Progra dire char restant">
					<label>E-mail</label>
					<input type="email" autocomplete="off" name="form_email" placeholder="email@extention">
					<label>Téléphone(s)</label>
					<input type="text" autocomplete="off" name="form_tels" placeholder="0601020304;01.02.03.04.05">
					<label>Adresse postale</label>
					<input type="text" autocomplete="off" name="form_adresse" placeholder="74 impasse des poules, batiment B">
					<label>Code postale</label>
					<input type="text" autocomplete="off" name="form_codepostal" placeholder="12345" value="35170">
					<label>Ville</label>
					<input type="text" autocomplete="off" name="form_ville" placeholder="Paris" value="Bruz">
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
               <input type="hidden" class="input_admin_id_cadre_modifier" name="form_id" value="-1">
					<label>Nom</label>
					<input type="text" class="input_admin_first_cadre_modifier" autocomplete="off" name="form_nom" placeholder="La Boutique de Bruz">
					<label>Catégorie</label>
					<input type="text" autocomplete="off" class="input_admin_categorie_cadre_modifier" name="form_categorie" placeholder="progra futur select">
					<label>Mot de passe compte</label>
					<input type="password" autocomplete="off" class="input_admin_mdp_cadre_modifier" name="form_mdp" placeholder="ABCZabcz@-0129">
					<label>Liens</label>
					<input type="text" autocomplete="off" class="input_admin_liens_cadre_modifier" name="form_liens" placeholder="https://sous.domaine.extention/;http://www.exemple.com/">
					<label>Description</label>
					<input type="text" autocomplete="off" class="input_admin_description_cadre_modifier" name="form_description" placeholder="Ce commerçant propose ceci cela Progra dire char restant">
					<label>E-mail</label>
					<input type="email" autocomplete="off" class="input_admin_email_cadre_modifier" name="form_email" placeholder="email@extention">
					<label>Téléphone(s)</label>
					<input type="text" autocomplete="off" class="input_admin_tels_cadre_modifier" name="form_tels" placeholder="0601020304;01.02.03.04.05">
					<label>Adresse postale</label>
					<input type="text" autocomplete="off" class="input_admin_adresse_cadre_modifier" name="form_adresse" placeholder="74 impasse des poules, batiment B">
					<label>Code postale</label>
					<input type="text" autocomplete="off" class="input_admin_codepostal_cadre_modifier" name="form_codepostal" placeholder="12345" value="35170">
					<label>Ville</label>
					<input type="text" autocomplete="off" class="input_admin_ville_cadre_modifier" name="form_ville" placeholder="Paris" value="Bruz">
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
               <input type="hidden" class="input_admin_id_cadre_supprimer" name="form_id" value="-1">
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
               <th>Identi.</th>
               <th>Cat.</th>
               <th>Nom</th>
               <th>Liens</th>
               <th style="width:400px">Description</th>
               <th>E-mail</th>
               <th>Telephone</th>
               <th>Adresse</th>
               <th>CP</th>
               <th>Ville</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>

<?php foreach ($datas as $seller) { ?>

            <tr class="search_result_wait searched">
					<td class="searchable"><?php echo $seller["id"]; ?></td>
					<td class="searchable"><?php if(isset($seller["categorie"])){echo $seller["categorie"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["nom"])){echo $seller["nom"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["liens"])){echo $seller["liens"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["description"])){echo $seller["description"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["email"])){echo $seller["email"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["tels"])){echo $seller["tels"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["adresse"])){echo $seller["adresse"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["codepostal"])){echo $seller["codepostal"];}else{echo "\"\"";} ?></td>
					<td class="searchable"><?php if(isset($seller["ville"])){echo $seller["ville"];}else{echo "\"\"";} ?></td>
               <td>
                  <button onclick="body_mode('cadre_modifier',{id:<?php
echo $seller["id"]; ?>,categorie:<?php
if(isset($seller["categorie"])){echo "'".$seller["categorie"]."'";}else{echo "''";} ?>,nom:<?php
if(isset($seller["nom"])){echo "'".$seller["nom"]."'";}else{echo "''";} ?>,liens:<?php
if(isset($seller["liens"])){echo "'".$seller["liens"]."'";}else{echo "''";} ?>,description:<?php
if(isset($seller["description"])){echo "'".$seller["description"]."'";}else{echo "''";} ?>,email:<?php
if(isset($seller["email"])){echo "'".$seller["email"]."'";}else{echo "''";} ?>,tels:<?php
if(isset($seller["tels"])){echo "'".$seller["tels"]."'";}else{echo "''";} ?>,adresse:<?php
if(isset($seller["adresse"])){echo "'".$seller["adresse"]."'";}else{echo "''";} ?>,codepostal:<?php
if(isset($seller["codepostal"])){echo "'".$seller["codepostal"]."'";}else{echo "''";} ?>,ville:<?php
if(isset($seller["ville"])){echo "'".$seller["ville"]."'";}else{echo "''";} ?>})">Modifier</button>

                  <button onclick="body_mode('cadre_supprimer',{id:<?php echo $seller["id"]; ?>})">Supprimer</button>
               </td>
            </tr>

<?php } ?>

         </tbody>
      </table>
   </main>
</body>
</html>