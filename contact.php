<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Contact';
$reference_page='contact.php';
include 'block/header.php';
?>
<body>
	
		<div class="grid-x">
		<div class="cell">

	<?php
		include 'block/topbar.php';
	?>

	<h1 style="margin-top: 20px; margin-left: 20px; font-size: 40px">
	Pour nous contacter :
	</h1>

	<div style="margin-left: 40px; font-weight: bold; font-size: 20px">
	      <li><a href="https://twitter.com/contact_arozia" target="_blank" class="lien_reseaux">Twitter</a></li>
		  <li><a href="https://www.instagram.com/contact.arozia/" target="_blank" class="lien_reseaux">Intagram</a></li>
		  <li><a href="https://www.facebook.com/Contact-Arozia-103151618352052" target="_blank" class="lien_reseaux">Facebook</a></li><br />
		  <li><span target="_blank" class="lien_reseaux">contact.arozia@gmail.com</li>
	</div>

		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
	
</body>
</html>