<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
	<?php
	$title='Commandes';
	$reference_page='affichage_commandes';
	include 'block/header.php';
	?>
	<body>

	<?php
		include 'block/topbar_admin.php';
	?>
	
	<h1 style="margin-left: 20px">Commandes</h1>

	<?php
		$commande=dbselect('SELECT * FROM commandes WHERE 0=0');
	?>
	<div class="grid-x" >
<div class="cell-auto" style="margin-left: 15px; color: #135158;">
<table class="stack">
<thead class="form_affichage">
	<tr>
	<th>Prénom</th>
	<th>Nom</th>
	<th>Mail</th>
	<th>Adresse</th>
	<th>ID produit</th>
	<th>Quantité</th>
	</tr>
</thead>

<tbody style="color: #135158; border: 2px solid">
            <?php 
            foreach($commande AS $donnees){ 
			?>
                <tr class="form_affichage">
                    <td><?php echo $donnees['prenom'];?></td>
                    <td><?php echo $donnees['nom'];?></td>
                    <td><?php echo $donnees['mail'];?></td>
                    <td><?php echo $donnees['adresse'];?></td>
                    <td><?php echo $donnees['id_produit'];?></td>
                    <td><?php echo $donnees['quantite'];?></td>
                </tr>
            <?php
            }
            ?>
	</tbody>
			</table>
			</div>
			</div>
		
	<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
		<style>
		.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
		</style>
	
	</body>
</html>