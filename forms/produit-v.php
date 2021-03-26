<?php
$tab_POST=array();

$tab_POST['nom']=$_POST['nom'];
$tab_POST['prix']=$_POST['prix'];
$tab_POST['description']=$_POST['description'];
$tab_POST['disponibilite']=$_POST['disponibilite'];


if(empty($_POST['nom'] OR $_POST['prix'] OR $_POST['description'] OR $_POST['disponibilite'])){
	echo '<div class="alert">Un des champs n\'est pas rempli.</div>';
	} else {   
		$lastid=dbinsert('produit', $tab_POST);
		if ($lastid > 0){
			echo '<div "class=add">Produit ajouté !</div>';
		} else {
			echo '<div class="error_add">Erreur lors de l\'ajout du produit.</div>';
		}
	}
?>