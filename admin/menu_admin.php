<!DOCTYPE HTML>
<html>
<?php
$title='Menu admin d\'Arozia';
include 'block/header.php';
?>
    <body>
		<div class="grid-x">
		<div class="cell">

<div style="background:#135158; height:15px"></div>

    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text" style="font-size: 60px;">Admin menu</li>
        </ul>
      </div>
    </div>

	<div class="menu_admin" style="margin-left: 40px; font-weight: bold; font-size: 23px;">
		  <li><a href="info.php" target="_blank" class="menu-list">Infos</a></li>
		  <li><a href="contact.php" target="_blank" class="menu-list">Contacts</a></li>
          <li><a href="commande.php" target="_blank" class="menu-list">Commander</a></li>
          <li><a href="ajout.php" class="menu-list">Ajouter</a></li>
          <li><a href="modification.php?id=27" class="menu-list">Modifier</a></li>
          <li><a href="affichage_commande.php" class="menu-list">Commandes</a></li>
          <li><a href="index.php" target="_blank" class="menu-list">Client menu</a></li>
	</div>

		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>

</body>
</html>