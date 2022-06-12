<?php 
require_once('inc/init.inc.php'); 
require_once("inc/entete.inc.php");
require_once('inc/menu_jar.inc.php');
?>

    <!--<a href="<?php echo RACINE_SITE; ?>liste_jardins.php">
        <img src = 'https://cdn.paris.fr/paris/2020/10/07/huge-11d25e2ac0b73d811cb5286440dce53b.jpg' alt = 'Une image de jardin partagé' title = 'Un jardin partagé'>
    </a>-->
<?php   

if(isset($_GET['page'])){
    $page=$_GET['page'];

    switch($page){
        case 'inscription': require_once('inscription_jar.php');break;
        case 'connexion': require_once('connexion_jar.php');break;
        case 'liste': require_once('liste_jardins.php');break;
        case 'profil': require_once('profil_jar.php');break;
        case 'afficher': require_once('choix_table.php');break;
        case 'supprimer':require_once('suppression.php'); break;
        case 'modifier':require_once('modification.php'); break;
        default: echo '<p class=erreur> Problème ! Vous avez entré une valeur inconnue dans ?page= .</p>';
    }
}
else{
    //echo '<p class=erreur> Page inexistante !</p>';
    ?>
    <!--<a href="<?php echo RACINE_SITE; ?>liste_jardins.php">-->
        <img src = "https://cdn.paris.fr/paris/2020/10/07/huge-11d25e2ac0b73d811cb5286440dce53b.jpg" alt = "Une image de jardin partagé" title = "Un jardin partagé">
    <!--</a>-->
    <?php
}

require_once('inc/bas.inc.php'); 

?>