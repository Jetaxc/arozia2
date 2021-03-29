<?php
include 'block/session.php';
?>
<!DOCTYPE HTML>
<html>
<?php
$title='AROZIA';
include 'block/header.php';
include 'block/authentification.php';
?>
    <body>
	
			<div class="grid-x">
		<div class="cell">

<div style="background:#135158; height:15px"></div>

    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text" style="font-size: 60px;">Bienvenue sur Arozia</li>
      </div>
    </div>

	<div style="margin-left: 40px; font-weight: bold; font-size: 23px">
	      <li><a href="inscription.php" class="menu-list">Inscription</a></li>
		  <li><a href="connexion.php" class="menu-list">Connexion</a></li>
	</div>
	

			<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
	</body>
</html>