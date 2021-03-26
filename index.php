<?php
include 'block/session.php';
?>
<!DOCTYPE HTML>
<html>
<?php
$title='Menu d\'Arozia';
include 'block/header.php';
include 'block/authentification.php';
?>
    <body>
<?php
if($users[$_SERVER["PHP_AUTH_USER"]] == "mini_1SNA"){
include 'C:/xampp/htdocs/site-arozia/menu_admin.php';
}else{
?>
		<div class="grid-x">
		<div class="cell">

<div style="background:#135158; height:15px">    </div>

    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text" style="font-size: 60px;">Menu</li>
      </div>
    </div>

	<div style="margin-left: 40px; font-weight: bold; font-size: 23px">
	      <li><a href="commande.php" class="menu-list">Commander</a></li>
		  <li><a href="info.php" class="menu-list">Infos</a></li>
		  <li><a href="contact.php" class="menu-list"	>Contacts</a></li>
	</div>

		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
<?php 
}

include 'block/deconnexion.php';
?>
</body>
</html>