<?php
$prix=$_POST['prix'];
$description=$_POST['description'];
$disponibilite=$_POST['disponibilite'];
$nom=$_POST['nom'];


if(empty($_POST['nom'] OR $_POST['prix'] OR $_POST['description'] OR $_POST['disponibilite'])){
	echo '<div class="alert">Un des champs n\'est pas rempli.</div>';
	} else {	
		if($bdd->query ("INSERT INTO produit SET nom='$nom', prix='$prix', description='$description', disponibilite='$disponibilite'")){
			echo '<div "class=add">Produit ajouté !</div>';
		} else {
			echo '<div class="error_add">Erreur lors de l\'ajout du produit.</div>';
		}
	}

?>