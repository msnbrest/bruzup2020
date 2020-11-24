<?php
	$servname = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
	
	try{
		 $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
		 $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 
		 /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
		  *users pour chaque entrée de la table*/
		 $sth = $dbco->prepare("SELECT prenom, mail FROM users");
		 $sth->execute();
		 
		 /*Retourne un tableau associatif pour chaque entrée de notre table
		  *avec le nom des colonnes sélectionnées en clefs*/
		 $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
		 
		 /*print_r permet un affichage lisible des résultats,
		  *<pre> rend le tout un peu plus lisible*/
		 echo '<pre>';
		 print_r($resultat);
		 echo '</pre>';
	}
			
	catch(PDOException $e){
		 echo "Erreur : " . $e->getMessage();
	}

/*
// créer table
$query="CREATE TABLE lfpf_noleltltlt ( id INT not null, nom VARCHAR(50) null )";
...
$res = $this->connection->prepare($query);
return $res->execute();
*/
?>