
<?php
// require_once('inc/init.inc.php');
// require_once("inc/entete.inc.php");
// require_once('inc/menu_jar.inc.php');
?>
<form method="POST" action="deconnexion.php">
    <input type="submit" name="submit" value="Se déconnecter"/>
</form>
<?php 
if(isset($_POST['submit'])){
session_start();
session_destroy();
// unset($_SESSION['username']);
// header('location:index.php');
//echo 'Vous avez été déconnecté !';
header('location: index.php');
Exit();
//echo 'Vous avez été déconnecté !';
//else{echo 'Cliquez pour vous déconnecter !';}
}
// require_once('inc/bas.inc.php');
?>