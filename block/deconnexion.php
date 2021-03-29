<?php
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Inscription';
$reference_page='inscription.php';
include 'block/header.php';
?>
<body>

<?php

	if(isset($_POST['deconnexion'])){
		unset($_SESSION['pseudo']);
		header("Refresh: 5; url=index.php");
		echo "Vous avez été correctement déconnecté du site.<br><br><i>Redirection en cours, vers la page d'accueil...</i>";
}

?>

	<form method="post" action="" style="">
	<div>
	<input type="submit" name="deconnexion" value="Déconnexion" class="button">
	</div>
	</form>
	
</body>