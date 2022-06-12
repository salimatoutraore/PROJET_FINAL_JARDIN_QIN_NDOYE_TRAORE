<?php 
require_once('inc/init.inc.php'); 
require_once("inc/entete.inc.php");
//require_once('inc/menu_adh.inc.php');?>

<header>
    <div class="conteneur">
                    <div>
                        <a href="index.php">Les jardins partagés</a>
                    </div>


    <form method='POST' action='code_admin.php'>
    <label>Veuillez entrer le code admin.</label>
    <input type="text" name='code'>
    <input type="submit" name='submit' value='Entrer'/>
    </div>
</header>

</form>

<?php 
if(isset($_POST['code'])){
    $code=$_POST['code'];
    if($code=='4235786'){//{'<a href="accueil_adh.php?page=afficher">
        // <button type="button" id="button4">Accès à la base</button>
        // </a>';}
        {require_once('choix_table.php');}
    
    }
    else{
        echo '<p class=erreur> Page pour les admins uniquement !</p>';
    }
}

require_once('inc/bas.inc.php'); 
?>