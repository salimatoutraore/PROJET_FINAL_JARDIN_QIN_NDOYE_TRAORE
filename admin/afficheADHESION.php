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
function formSuppression($login){
return '<form method="POST" action="../accueil_adh.php?page=supprimer">
    <input type=hidden name="num_adhesion" value="'.$login.'">
    <input type="submit" name="submit" value="S" />
    </form>';
}

?>


<h1>Liste des ADHESIONS </h1>
<table>
    <tr>
        <th>Num_Adhésion</th>
        <th>Date_adhésion</th>
        <th>ID_jardin</th>
        <th>ID_adhérent</th>
        <th>Supprimer</th>
    </tr>
    <?php //include('..\inc\init.inc.php'); //avec include on a WARNING et arrête pas script alors que require si
    try {
        $db = connectBD();

        foreach ($db->query('SELECT * from ADHESION') as $ligne) {
            //Affichage du tableau HTML des personnes
            echo '<tr> 
                <td>' . $ligne['num_adhesion'] . '</td>
                <td>' . $ligne['date_adhesion'] . '</td>
                <td>' . $ligne['id_jardin'] . '</td>
                <td>' . $ligne['id_adherent'] . '</td><td>';
                echo formSuppression($ligne['num_adhesion']);
                echo '</td></tr>';
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