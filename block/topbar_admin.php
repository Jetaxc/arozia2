	<div style="background:#135158; height:15px"></div>
	
					<?php
					//Paramétrage
				
					$tab_reference=array();
					$tab_reference[]=array('reference'=>'info.php', 'libelle'=>'Info');
					$tab_reference[]=array('reference'=>'contact.php', 'libelle'=>'Contact');
					$tab_reference[]=array('reference'=>'commande.php', 'libelle'=>'Commande');
					$tab_reference[]=array('reference'=>'ajout.php', 'libelle'=>'Ajout');
					$tab_reference[]=array('reference'=>'modification.php', 'libelle'=>'Modification');
					$tab_reference[]=array('reference'=>'affichage_commande.php', 'libelle'=>'Affichage commande');
					
					//Fin paramétrage
					?>
					

	
				    <!-- Start Top Bar -->
		<div class="top-bar">
			<div class="top-bar-left">
				<ul class="menu">
				<li class="menu-text" style="font-size: 20px;">Menu</li>
				
			<?php foreach ($tab_reference as $donnees){?>
				<li><?php
					if ($reference_page==$donnees['reference']){
						echo '<span class="button bouton" style="pointer-events: none; background: #78c404">'.$donnees['libelle'].'</span>';
						} else {
						echo '<a href="'.$donnees['reference'].'" class="button bouton">'.$donnees['libelle'].'</a>';
						}
				?></li>
					<?php } ?>
				<li><a href="menu_admin.php"  class="button">Admin menu</a></li>
				<li><a href="index.php" target="_blank" class="button">Client menu</a></li>
				<li><a href="#" style="pointer-events: none" class="button">...</a></li>
				</ul>
			</div>
		</div>
					<!-- End Top Bar -->

	<div style="background:#135158; height:15px"></div>