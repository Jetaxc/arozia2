<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Commander';
$reference_page='commande.php';
include 'block/header.php';
?>
    <body>
	
		<div class="grid-x">
		<div class="cell">
		
	<?php
		include 'block/topbar_client.php';
	?>

		<h1 style='margin-left: 13px'>Commander un produit</h1>
<?php
// Parametrage
$tab_default=array();
$tab_message_erreur=array();
	
$tab_formulaires=array();

$tab_formulaires[]=array('name'=>'prenom', 'type'=>'text', 'libelle'=>'Votre prénom');
$tab_formulaires[]=array('name'=>'nom', 'type'=>'text', 'libelle'=>'Votre nom');
$tab_formulaires[]=array('name'=>'mail', 'type'=>'text', 'libelle'=>'Votre mail');
$tab_formulaires[]=array('name'=>'adresse', 'type'=>'text', 'libelle'=>'Votre adresse');

foreach($tab_formulaires as $tab_elementform) $tab_default[$tab_elementform['name']]='';


if (isset($_POST['valider'])){
	foreach($tab_formulaires as $tab_elementform) $tab_default[$tab_elementform['name']]=$_POST[$tab_elementform['name']];
	}

$tab_disponibilite=array();
$tab_disponibilite[]=array('name'=>'disponibilite', 'type'=>'number', 'libelle'=>'Quantité');
foreach($tab_disponibilite as $tab_elementform) $tab_default[$tab_elementform['name']]='';


if (isset($_POST['valider'])){
	foreach($tab_disponibilite as $tab_elementform) $tab_default[$tab_elementform['name']]=$_POST[$tab_elementform['name']];
	}
//Fin parametrage

	
	
	
	
// Validation du formulaire	
if (isset($_POST['valider'])){
	
	
	// Test des erreurs
	if(empty($_POST['prenom'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné votre prénom.';
		
	}
	if(empty($_POST['nom'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné votre nom de famille.';
		
	}
	if(empty($_POST['mail'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné votre adresse email.';
		
	}
	
	if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail'])){
		$tab_message_erreur[]='L\'adresse mail n\'est pas valide/renseignée.';
	}
	
	if(empty($_POST['adresse'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné votre adresse.';
		
	}	
	if(empty($_POST['disponibilite'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné la quantité voulue.';
		
	}		
	if(empty($_POST['id_produit'])){
		$tab_message_erreur[]='Vous n\'avez pas renseigné le produit voulu.';
		
	}	
	if($_POST['disponibilite'] < 0){
		$tab_message_erreur[]='Veuillez indiquer un nombre positif.';
	}
	
	if (!empty($tab_message_erreur)){
			foreach ($tab_message_erreur as $message_erreur){
			echo '<div class="alert warning">'.$message_erreur.'</div>';
			}
	}	

// Si pas derreurs on insere la commande dans la table commande
if(empty($tab_message_erreur)){
		

	$tab_valeur['prenom']=ucfirst($_POST['prenom']);
	$tab_valeur['nom']=ucfirst($_POST['nom']);
	$tab_valeur['mail']=$_POST['mail'];
	$tab_valeur['adresse']=$_POST['adresse'];
	$tab_valeur['id_produit']=$_POST['id_produit'];
	$tab_valeur['quantite']=$_POST['disponibilite'];

		$lastid=dbinsert('commandes', $tab_valeur);
		if ($lastid > 0){
			echo '<div "class=add" style="font-size: 40px">Commande validé !</div>';
		} else {
			echo '<div class="error_add">Erreur lors de la commande.</div>';
		}
}
}

//Formulaire
		if ( (isset($_POST['valider']) AND (!empty($tab_message_erreur)))  OR   (!isset($_POST['valider'])) ){
			
?>
		<p style='margin-left: 15px'>Remplissez le formulaire ci-dessous pour commander un produit</p>
				
			
				<form action="" method="post" style="margin-right: 600px">
				  <div class="grid-container">
					<div class="grid-x grid-padding-x">
					  <div class="medium-6 cell">
					<p>
					
					<?php
					foreach($tab_formulaires as $tab_elementform){
						echo '
						<div>
							<div class="libelle">'.$tab_elementform['libelle'].'</div>
							<div class="champ"><input type="'.$tab_elementform['type'].'" name="'.$tab_elementform['name'].'" value="'.$tab_default[$tab_elementform['name']].'" /></div>
							
						</div>
						';
						
					}
						echo 'Le produit';
						echo '<select name="id_produit">';
						$reponse=dbselect('SELECT * FROM produit WHERE 0=0');
						foreach($reponse as $donnees){
							if ($_POST['id_produit']==$donnees['id']) $is_selected="selected"; else $is_selected='';						
							echo '<option '.$is_selected.' value="'.$donnees['id'].'"> '.$donnees['nom'].'</option>';
						}
							echo '</select>';
					
					foreach($tab_disponibilite as $tab_elementform){
						
					echo '
					<div>
					<div class="libelle">'.$tab_elementform['libelle'].'</div>
					<div class="champ"><input type="'.$tab_elementform['type'].'" name="'.$tab_elementform['name'].'" value="'.$tab_default[$tab_elementform['name']].'"/></div>
					</div>
					';
					}
					?>

						<input type="submit" name="valider" value="Valider" class="button validation"/><br />
					</p>
				</form>
				  </div>
				  </div>
				  </div>
<?php
	}
?>	

<!-- Fin du formulaire -->	

		</div>
	</div>
			
		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>

</body>
</html>