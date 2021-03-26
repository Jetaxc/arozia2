<?php
include 'block/session.php';
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Produits';
$reference_page='produits.php';
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


<?php
$reponse=dbselect('SELECT * FROM produit WHERE 0=0');
?>

<div class="grid-x">
<div class="cell-auto">
<table class="stack">
<thead>
	<tr>
	<th>id</th>
	<th>nom</th>
	<th>prix</th>
	<th>description</th>
	<th>disponibilite</th>
	</tr>
</thead>

<tbody>
            <?php 
            foreach($reponse AS $donnees){ 
			?>
                <tr>
                    <td><?php echo '<a href="modification.php?id='.$donnees['id'].'"> '.$donnees['id'].'</a>';?></td>
                    <td><?php echo $donnees['nom'];?></td>
                    <td><?php echo $donnees['prix'];?></td>
                    <td><?php echo $donnees['description'];?></td>
                    <td><?php echo $donnees['disponibilite'];?></td>
                </tr>
            <?php
            }
            ?>
	</tbody>
			</table>
			</div>
			</div>
	
	<?php
	}else{
	include 'block/denied_access.php';
	}
	?>
	
	</div>
	</div>
	
</body>
</html>