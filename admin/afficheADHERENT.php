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
    <input type=hidden name="id_adherent" value="'.$login.'">
    <input type="submit" name="submit" value="S" />
    </form>';
}


function formModification($login){
    return '<form method="POST" action="../accueil_adh.php?page=modifier">
        <input type=hidden name="id_adherent" value="'.$login.'">
        <input type="submit" name="submit" value="M" />
        </form>';
    
    }
?><!--LA MODIFIE*********************************-->


<h1>Liste des ADHERENTS </h1>
<table>
    <tr>
        <th>ID_adhérent</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>ID_Type Adhérent</th>
        <th>ID_Adresse</th>
        <th>Supprimer</th>
    </tr>
    <?php //include('..\inc\init.inc.php');
    try {
        $db = connectBD();

        foreach ($db->query('SELECT * from ADHERENT') as $ligne) {
            //Affichage du tableau HTML des personnes
            echo '<tr> 
                <td>' . $ligne['id_adherent'] . '</td>
                <td>' . $ligne['nom'] . '</td>
                <td>' . $ligne['prenom'] . '</td>
                <td>' . $ligne['telephone_adherent'] . '</td>
                <td>' . $ligne['courriel_adherent'] . '</td>
                <td>' . $ligne['id_type_adherent'] . '</td>
                <td>' . $ligne['id_adresse'] . '</td><td>';
                echo formSuppression($ligne['id_adherent']);
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