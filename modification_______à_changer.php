<h1>ADHERENT à modifier</h1><!--LA MODIFIE****************************-->
<table>
    <tr><!--LA MODIFIE****************************-->
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>ID_Type Adhérent</th>
    </tr>
<?php

    if (isset($_POST['id_adherent'])){//LA MODIFIE**********

        try {
            $db = connectBD();
            $id_el = $_POST['id_adherent'];
            
            echo '<tr> 
            <td> <form action="modification.php" method="POST"><input type="text" name="nom" /></form> </td>
            <td> <form action="modification.php" method="POST"><input type="text" name="prenom" /></form> </td>
            <td> <form action="modification.php" method="POST"><input type="text" name="telephone_adherent" /></form> </td>
            <td> <form action="modification.php" method="POST"><input type="text" name="courriel_adherent" /></form> </td>
            <td> <form action="modification.php" method="POST"><input type="text" name="type_adherent" /></form> </td>
            <td> <form action="modification.php" method="POST"><input type="submit" name="Modifier" /></form> </td>'
            echo '</td></tr>';

            $resultat = $db -> prepare("UPDATE ADHERENT SET ... WHERE id_adherent=$id_el");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
            $resultat -> execute();
            echo "Adhérent modifié !";
            $db=null;
        } 
        catch (PDOException $e) {
            echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
            // Ligne suivante à utiliser pour le débogage
            echo  $e->getMessage() . "<br/>";
            die();
            }
    
        }

?>