<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Ajout d\'un produit';
$reference_page='ajout.php';
include 'block/header.php';
?>
    <body>
		<div class="grid-x">
		<div class="cell">

	<?php
		include 'block/topbar.php';
	$tupeuxpasser=$_SERVER['PHP_AUTH_PW'];
	if($tupeuxpasser == "mini_1SNA"){
	?>

	<h1 style="margin-left: 20px">Ajouter un produit</h1>
<?php
//Paramétrage
$table= 'produit';
$tab_message_erreur=array();
	
$tab_formulaires=array();
$tab_formulaires[]=array('name'=>'nom', 'type'=>'text', 'libelle'=>'Nom du produit');
$tab_formulaires[]=array('name'=>'prix', 'type'=>'number', 'libelle'=>'Prix du produit');
$tab_formulaires[]=array('name'=>'description', 'type'=>'text', 'libelle'=>'Description du produit');
$tab_formulaires[]=array('name'=>'disponibilite', 'type'=>'number', 'libelle'=>'Disponibilité');
//Fin paramétrage

if(isset($_POST['valider'])){

//Test erreurs
	if($_POST['disponibilite'] < 0){
		$tab_message_erreur[]='Veuillez renseigner un nombre supérieur ou égal à zéro.';
	}
	if(empty($_POST['nom'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné le nom du produit.';
	}	
	if(empty($_POST['prix'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné le prix.';
	}	
	if(empty($_POST['description'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné la description.';
	}
	if(empty($_POST['disponibilite'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné la disponibilité.';
	}
	
// Si il y a des erreurs on les affiche
	if(!empty($tab_message_erreur)){
		foreach ($tab_message_erreur as $message_erreur){
		echo '<div class="alert warning">'.$message_erreur.'</div>';
	}}
//Si pas d'erreur ajout du produit
	if(empty($tab_message_erreur)){
	include 'forms/produit-v.php';
	}

}	
?>
	
<!-- Formulaire -->	
				<div class="callout">
				<p>Remplissez le formulaire ci-dessous pour ajouter un produit</p>
				
				
				<form action="" method="post" style="margin-right: 1000px">

					<p>
					
					<?php
					foreach($tab_formulaires as $tab_elementform){
						echo '
						<div>
							<div class="libelle">'.$tab_elementform['libelle'].'</div>
							<div class="champ"><input type="'.$tab_elementform['type'].'" name="'.$tab_elementform['name'].'" /></div>
						
						</div>
						';
					}
					
					?>
	
						<input type="submit" name="valider" value="Valider" class="button validation"/><br />
					</p>
				</form>
</div>
<!-- Fin du formulaire -->

<!-- Tableau des produits disponibles -->	
		<?php 
		include 'block/affichage_produits.php';
}else{
	include 'block/denied_access.php';
}
		?>
							
		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
				
    </body>
</html>