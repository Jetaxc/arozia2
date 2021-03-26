<!DOCTYPE HTML>
<html>
<?php
$title='Menu admin d\'Arozia';
include 'block/header.php';
include 'block/authentification.php';
?>
<body>

<?php
if($users[$_SERVER["PHP_AUTH_USER"]] == "mini_1SNA"){
include 'C:/xampp/htdocs/site-arozia/block/topbar_admin.php';
}else{
include 'C:/xampp/htdocs/site-arozia/block/topbar_client.php';
}

?>
</body>