<header>
            <div class="conteneur">
                <div>
                    <a href="../index.php">Les jardins partagés</a>
                </div>
                <nav>
                    
                    <a href="../accueil_adh.php?page=inscription">Inscription</a>
                    <a href="../accueil_adh.php?page=connexion">Connexion</a>
                    <a href="../accueil_adh.php?page=liste">Accès à la liste des jardins</a>
                    <a href="../accueil_adh.php?page=profil">Voir profil</a>
                    <!--<a href="accueil_adh.php?page=afficher">Afficher le répertoire </a>-->
                    <!--<a href="<?php echo RACINE_SITE; ?>connexion_adh.php"> Déconnexion </a>-->
                    
                </nav>
            </div>
        </header>
        <section>
            <div class="conteneur">
<?php
require_once('../inc/init.inc.php');
require_once("../inc/entete.inc.php");
/*Fonction permettant de générer les formulaires de suppression
pour chaque ligne du tableau des personnes */
function formSuppression($login,$login2){
return '<form method="POST" action="../accueil_adh.php?page=supprimer">
    <input type=hidden name="id_evenement" value="'.$login.'">
    <input type=hidden name="id_jardin" value="'.$login2.'">
    <input type="submit" name="submit" value="S" />
    </form>';
}

?>


<h1>Liste des liens entre JARDIN et EVENEMENT </h1>
<table>
    <tr>
        <th>id_jardin</th>
        <th>id_evenement</th>

    </tr>
    <?php //include('..\inc\init.inc.php'); //avec include on a WARNING et arrête pas script alors que require si
    try {
        $db = connectBD();

        foreach ($db->query('SELECT * from AVOIR_LIEU') as $ligne) {
            //Affichage du tableau HTML des personnes
            echo '<tr> 
                <td>' . $ligne['id_jardin'] . '</td>
                <td>' . $ligne['id_evenement'] . '</td>';
                //echo formSuppression($ligne['id_evenement'],$ligne['id_jardin']);
                //echo '</td></tr>';
        }
    $db=null;
    } catch (PDOException $e) {
        echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
        // Ligne suivante à utiliser pour le débogage
        echo  $e->getMessage() . "<br/>";
        die();
    }

    ?>

</table>
<?php require_once('../inc/bas.inc.php'); ?>