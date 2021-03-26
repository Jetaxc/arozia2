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
                    <td><?php echo $donnees['id'];?></td>
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
