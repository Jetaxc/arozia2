<div style="background:#135158; height:15px">    </div>

					<?php
					//Paramétrage
				
					$tab_reference=array();
					$tab_reference[]=array('reference'=>'info.php', 'libelle'=>'Info');
					$tab_reference[]=array('reference'=>'contact.php', 'libelle'=>'Contact');
					$tab_reference[]=array('reference'=>'commande.php', 'libelle'=>'Commande');
					
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

		  <li><a href="index.php" class="button bouton">Menu</a></li>
          <li><a href="#" style="pointer-events: none" class="button bouton">...</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

<div style="background:#135158; height:15px">    </div>