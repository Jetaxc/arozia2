<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Modification d\'un produit';
include 'block/header.php';
?>
<body>
	<div class="grid-x">
	<div class="cell">
	
	<?php
		include 'block/topbar_admin.php';
	?>
	
	<h1 style="margin-left: 20px">Modifier un produit</h1>
	</div>
	<?php
	
//Paramétrage	
$tab_message_erreur=array();

$tab_formulaires=array();
$tab_formulaires[]=array('name'=>'nom', 'type'=>'text', 'libelle'=>'Nom du produit');
$tab_formulaires[]=array('name'=>'prix', 'type'=>'number', 'libelle'=>'Prix du produit');
$tab_formulaires[]=array('name'=>'description', 'type'=>'text', 'libelle'=>'Description du produit');
$tab_formulaires[]=array('name'=>'disponibilite', 'type'=>'number', 'libelle'=>'Disponibilité');

$id=$_GET['id'];

$req=dbselect('SELECT * FROM produit WHERE id='.$id);
$donnees=$req[0];
//Fin paramétrage

//Test erreurs
if(isset($_POST['valider'])){
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

// Si il y a des erreurs on les affiches
	if(!empty($tab_message_erreur)){
			foreach ($tab_message_erreur as $message_erreur){
			echo '<div class="alert warning">'.$message_erreur.'</div>';
			}
	}
//Si pas d'erreurs update du produit 
	if(empty($tab_message_erreur)){
		$tab_elementreplace=array('nom'=>$_POST['nom'], 'prix'=>$_POST['prix'], 'description'=>$_POST['description'], 'disponibilite'=>$_POST['disponibilite']);
		$tab_where=array('id'=>$id);
		$table= 'produit';
			dbupdate($table, $tab_elementreplace, $tab_where);
		echo 'Modification effectuée';
	}
}
?>

		<div class="cell">
			<div class="callout">
<!-- Formulaire -->			
			<p>Remplissez le formulaire ci-dessous pour modifier un produit</p>
		
			<div class="cell">
				<form action="" method="post" style="margin-right: 1000px">

					<p>
					
					<?php
					foreach($tab_formulaires as $tab_elementform){
						echo '
						<div>
							<div class="libelle">'.$tab_elementform['libelle'].'</div>
							<div class="champ"><input type="'.$tab_elementform['type'].'" name="'.$tab_elementform['name'].'" value="'.$donnees[$tab_elementform['name']].'"/></div>
						
						</div>
						';
					}
					
					?>
	
						<input type="submit" name="valider" value="Valider" class="button validation"/><br />
					</p>
				</form>
		</div>
			</div>
<!-- Fin du formulaire -->		
				
<!-- Tableau des produits disponibles -->		
					<?php 
				include 'block/affichage_produits.php';
				
				?>
				
		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
	
	</div>
	</div>
</body>
</html>