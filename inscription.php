<?php
session_start();
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
<div style="background:#135158; height:15px">    </div>
        <h1>S'inscrire</h1>
        <?php
//Paramétrage
		try
{
	$bdd = new PDO('mysql:host=localhost;dbname=arozia;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//Fin paramètrage

$tab_message_erreur=array();

        if(isset($_POST['valider'])){
            if(!isset($_POST['pseudo'],$_POST['mdp1'],$_POST['email'])){
			$tab_message_erreur[]='Un des champs n\'est pas reconnu.';
			}
			if ($_POST['mdp1'] != $_POST['mdp2']){
    		$tab_message_erreur[]='Veuillez saisir deux mots de passe identique';
			}
            if(!preg_match("#^[a-zA-Z0-9-_]{1,15}$#",$_POST['pseudo'])){
            $tab_message_erreur[]='Le pseudo est incorrect, doit contenir seulement des lettres minuscules et/ou majuscules et/ou des chiffres, d\'une longueur minimum de 1 caractère et de 15 maximum.';
			}
            if(strlen($_POST['mdp1'])<5 or strlen($_POST['mdp1'])>15 AND  strlen($_POST['mdp2'])<5 or strlen($_POST['mdp2'])>15){
			$tab_message_erreur[]='Le mot de passe doit être d\une longueur minimum de 5 caractères et de 15 maximum.';
			}
                    
            if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['email'])){
            $tab_message_erreur[]='L\'adresse mail est incorrecte.';
            }
            if(strlen($_POST['email'])<7 or strlen($_POST['email'])>50){
            echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
            }	
            if(!$bdd) {
            $tab_message_erreur[]='Erreur connexion base de donnée.';
            }

			$pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
			$pass_hache=md5($_POST['mdp1']);
			$email=htmlentities($_POST['email'],ENT_QUOTES,"UTF-8");

            if(!$bdd->query ("SELECT * FROM membres WHERE pseudo='$pseudo'")){
            $tab_message_erreur[]='Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre.';
            }		
			
			if(empty($tab_message_erreur)){
            if($bdd->query ("INSERT INTO membres SET pseudo='$pseudo', pass='$pass_hache', email='$email'")){
            echo "Inscrit avec succès! Vous pouvez vous connecter : <a href='connexion.php'>cliquez ici</a>.";
            $TraitementFini=true;
            }else{
            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
			}
			} elseif(!empty($tab_message_erreur)) {
				foreach ($tab_message_erreur as $message_erreur){
				echo '<div class="alert warning">'.$message_erreur.'</div>';
				}
			}
			
		}
 
	
if(!isset($TraitementFini)){
            ?>
				<br />
				<p>Remplissez le formulaire ci-dessous pour vous inscrire:</p>
				<form action="" method="post" style="margin-rigth:600px">

					<p>
						<em>Veuillez saisir votre pseudo :</em>
						<input type="text" name="pseudo" class="pseudo" /><br />
						<em>Veuillez saisir votre mot de passe :</em>
						<input type="password" name="mdp1" class="mot_de_passe" /><br />
						<em>Veuillez resaisir votre mot de passe :</em>
						<input type="password" name="mdp2" class="mot_de_passe" /><br />
						<em>Veuillez saisir votre email :</em>
						<input type="email" name="email" class="mail" /><br />
						<input type="submit" name="valider" value="Valider" class="valider" /><br />
					</p>
				</form>
            <?php
        }
        ?>
				<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
</body>
</html>