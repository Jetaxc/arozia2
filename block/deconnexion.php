<!DOCTYPE HTML>
<html>
<?php
$title='Deconnexion';
include 'header.php';
include 'authentification.php';
?>
<body>
<?php	
var_dump($_SESSION['statut']);
if(isset($_POST['deconnexion'])){	
$_SESSION['statut']='';

	}
?>
			
				<form action="" method="post" style="">
					<p>
						<input type="submit" name="deconnexion" value="Déconnexion" class="button"/>
					</p>
				</form>

<?php 
	var_dump($_SESSION['statut']); 
				
				
	if($_SESSION['statut']!=='connecte'){
	
	}
?>
</body>