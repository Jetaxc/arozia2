<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Connexion';
$reference_page='inscription.php';
include 'block/header.php';
?>
    <body>
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
//Fin paramétrage
?>
<div style="background:#135158; height:15px">    </div>
        <h1>Se connecter</h1>
                <?php
$tab_message_erreur=array();				

        if(isset($_SESSION['pseudo'])){
        $tab_message_erreur[]='Vous êtes déjà connecté, vous pouvez accéder à l\'espace membre en <a href=\'espace-membres.php\'>cliquant ici</a>.';
        } else {
            if(isset($_POST['valider'])){
                if(!isset($_POST['pseudo'],$_POST['mdp'])){
                $tab_message_erreur[]='Un des champs n\'est pas reconnu.';
                }
                if(!$bdd) {
                $tab_message_erreur[]='Erreur connexion base de donnée';
                    } else {
                        $pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
                        $mdp=md5($_POST['mdp']);
						
                        $req=$bdd->query("SELECT * FROM membres WHERE pseudo='$pseudo' AND pass='$mdp'");
						
                        if(!$bdd->query("SELECT * FROM membres WHERE pass='$mdp'")){
                        $tab_message_erreur[]='Pseudo ou mot de passe incorrect.';
                        }
						
						if(empty($tab_message_erreur)){
                        $_SESSION['pseudo']=$pseudo;
                        echo "Vous êtes connecté avec succès $pseudo! Redirection en cours vers le menu.";
						header("Refresh: 5; url=menu.php");
                        $TraitementFini=true;
						} elseif(!empty($tab_message_erreur)) {
						foreach ($tab_message_erreur as $message_erreur){
						echo '<div class="alert warning">'.$message_erreur.'</div>';
						}
					}
                }
            }
            if(!isset($TraitementFini)){
                ?>
                <br>
                <form method="post" action="" style="margin-right:600px">
				 <div class="grid-container">
				   <div class="grid-x grid-padding-x">
					 <div class="medium-6 cell">
					
					<p>Saissisez votre pseudo</p>
                    <input type="text" name="pseudo" required>
					<p>Saissisez votre mot de passe</p>
                    <input type="password" name="mdp" required>
                    <input type="submit" name="valider" value="Connexion!">
				     </div>
				   </div>
				 </div>
                </form>
                <?php
            }
        }
        ?>
				<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
    </body>
</html>