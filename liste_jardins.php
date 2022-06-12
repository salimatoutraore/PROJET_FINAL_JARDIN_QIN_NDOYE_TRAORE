<?php
/*Fonction permettant de générer les formulaires d'adhésion'
pour chaque ligne du tableau des jardins */
function formAdhesion($login){
return '<form method="POST" action="adhesion.php">
    <input type=hidden name="id_jardin" value="'.$login.'">
    <input type="submit" name="submit" value="Adhérer" />
    </form>';
}?>
<h1>Liste des JARDINS </h1>
<table>
    <tr>
        <th>Nom des jardins</th>
        <th>Le site internet</th>
        <th>Nom de l'association s'en occupant</th>
        <th>Aménagements</th>
        <th>Adresse @mail jardin</th>
        <th>Date de fermeture exceptionnelle</th>
        <th>Heure d'ouverture</th>
        <th>Heure de fermeture</th>
        <th>Adhérer à un jardin</th>
    </tr>
    <?php //include('..\inc\init.inc.php'); //avec include on a WARNING et arrête pas script alors que require si
    try {
        $db = connectBD();

        foreach ($db->query('SELECT * from JARDIN') as $ligne) {
            //Affichage du tableau HTML des personnes
            echo '<tr> 

                <td>' . $ligne['nom_jardin'] . '</td>
                <td>' . $ligne['site_internet'] . '</td>
                <td>' . $ligne['nom_association'] . '</td>
                <td>' . $ligne['amenagement'] . '</td>
                <td>' . $ligne['courriel_jardin'] . '</td>
                <td>' . $ligne['date_fermeture_exceptionnelle'] . '</td>
                <td>' . $ligne['heure_ouverture'] . '</td>
                <td>' . $ligne['heure_fermeture'] . '</td><td>';
                echo formAdhesion($ligne['id_jardin']);
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
