<?php
session_start();
include 'bdd.php';
include 'fonction.php';
?>

<!DOCTYPE HTML>
<html>
<?php
$title='Infos';
$reference_page='info.php';
include 'block/header.php';
?>
<body>
	
		<div class="grid-x">
		<div class="cell">

	<?php
		include 'block/topbar.php';
	?>

	<h1 style="margin-top: 20px; margin-left: 20px; font-size: 40px">
	Qu'est ce qu'Arozia ?
	</h1>

	<p style="margin-left: 20px; margin-right: 300px">
	Nous sommes des élèves de 1ère bac pro Systèmes Numériques au sein du
	Lycée Jacques Prévert de Combs-la-Ville. <br /><br />

	Nous avons créé la mini-entreprise Arozia lors de notre Assemblée Générale du 11 décembre 2020. <br /><br />

	Notre projet est de conceptualiser un système d'arrosage automatique connecté pour
	plantes d'intérieur. <br />

	Notre système vous permet d'arroser les plantes sans que vous ayez à intervenir. Il vous suffira juste de remplir le réservoir quand le système vous le dira. Vous pourrez choisir le type d'arrosage adapté à votre plante grâce à votre smartphone. <br />

	Plus techniquement, une pompe s'occupera de transvaser l'eau du réservoir à votre plante via un système de relais. Un capteur d'humidité définit quand votre plante aura besoin d'être arrosée et lancera le programme d'arrosage automatique. Et quand le réservoir est vide, une led rouge vous le signalera en la faisant clignoter. <br /><br />

	Afin de promouvoir notre projet, nous comptons participer à des salons départementaux et régionaux organisés par l’association Entreprendre Pour Apprendre (EPA). <br />

	Notre produit sera vendu principalement grâce au bouche à oreille. Mais aussi par l’intermédiaire de Carrefour Carré Sénart et du marché de Noël de Combs-la-Ville en décembre 2021. Nous aurons aussi la possibilité de faire de la vente en ligne via un site que nous créerons. <br />

	Notre partenaire financier est la banque CIC de Moissy-Cramayel. Nos autres partenaires sont le MacDonald de Combs-la-Ville et IDEM imprimerie à Mormant. <br /><br />

	Nous sommes présents sur les réseaux sociaux suivants : <br />
	- Facebook : Contact Arozia <br />
	- Instagram : contact.arozia <br />
	- Twitter : contact_arozia <br /> <br />

	Contactez nous sur les réseaux sociaux ou notre mail : contact.arozia@gmail.com
	</p>



		<div class="logo_arozia"><p><img src="images/logo_arozia.png" alt="Logo arozia" /></p></div>
	<style>
	.logo_arozia{width: 110px; position: fixed; float: right; bottom: 0px; right: 0px; z-index:1;}
	</style>
	
</body>
</html>