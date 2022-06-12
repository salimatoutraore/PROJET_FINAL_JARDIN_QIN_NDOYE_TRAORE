<?php
    // //supprimer avoir lieu
    // if (isset($_POST['id_evenement']) || isset($_POST['id_jardin'])) {
    //     try {
    //         $db = connectBD();
    //         $id_el = $_POST['id_evenement'];
    //         $id_el2 = $_POST['id_jardin'];
    //         $resultat = $db -> prepare("DELETE FROM AVOIR_LIEU WHERE id_evenement=$id_el AND id_jardin = $id_el2");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
    //         $resultat -> execute();
    //         echo "Evènement dans un jardin supprimé !";
    //         $db=null;
    //     } 
    //     catch (PDOException $e) {
    //         echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
    //         // Ligne suivante à utiliser pour le débogage
    //         echo  $e->getMessage() . "<br/>";
    //         die();
    //         }
    
    //     }
    //Supprimer adhérent
    if (isset($_POST['id_adherent'])){

    //include('\inc\init.inc.php'); 
    try {
        $db = connectBD();
        $id_el = $_POST['id_adherent'];
        $resultat = $db -> prepare("DELETE FROM ADHERENT WHERE id_adherent=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)

        $resultat -> execute();
        echo "Adhérent supprimé !";
        $db=null;
    } 
    catch (PDOException $e) {
        echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
        // Ligne suivante à utiliser pour le débogage
        echo  $e->getMessage() . "<br/>";
        die();
        }

    }
    //supprimer adhésion
    if (isset($_POST['num_adhesion'])) {
    try {
        $db = connectBD();
        $id_el = $_POST['num_adhesion'];
        $resultat = $db -> prepare("DELETE FROM ADHESION WHERE num_adhesion=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)

        $resultat -> execute();
        echo "Adhésion supprimée !";
        $db=null;
    } 
    catch (PDOException $e) {
        echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
        // Ligne suivante à utiliser pour le débogage
        echo  $e->getMessage() . "<br/>";
        die();
        }

    }
    //supprimer adresse
    if (isset($_POST['id_adresse'])) {
        try {
            $db = connectBD();
            $id_el = $_POST['id_adresse'];
            $resultat = $db -> prepare("DELETE FROM ADRESSE WHERE id_adresse=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
            $resultat -> execute();
            echo "Adresse supprimée !";
            $db=null;
        } 
        catch (PDOException $e) {
            echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
            // Ligne suivante à utiliser pour le débogage
            echo  $e->getMessage() . "<br/>";
            die();
            }
    
        }

    //supprimer evenement
    if (isset($_POST['id_evenement'])) {
        try {
            $db = connectBD();
            $id_el = $_POST['id_evenement'];
            $resultat = $db -> prepare("DELETE FROM EVENEMENT WHERE id_evenement=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
            $resultat -> execute();
            echo "Evènement supprimé !";
            $db=null;
        } 
        catch (PDOException $e) {
            echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
            // Ligne suivante à utiliser pour le débogage
            echo  $e->getMessage() . "<br/>";
            die();
            }
    
        }
    //supprimer jardin
    if (isset($_POST['id_jardin'])) {
        try {
            $db = connectBD();
            $id_el = $_POST['id_jardin'];
            $resultat = $db -> prepare("DELETE FROM JARDIN WHERE id_jardin=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
            $resultat -> execute();
            echo "Jardin supprimé !";
            $db=null;
        } 
        catch (PDOException $e) {
            echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
            // Ligne suivante à utiliser pour le débogage
            echo  $e->getMessage() . "<br/>";
            die();
            }
    
        }
    // //supprimer type d'adhérent
    // if (isset($_POST['id_type_adherent'])) {
    //     try {
    //         $db = connectBD();
    //         $id_el = $_POST['id_type_adherent'];
    //         $resultat = $db -> prepare("DELETE FROM EVENEMENT WHERE id_type_adherent=$id_el LIMIT 1");//limit 1 pour ne pas supprimer plus d'une ligne (sécurité)
    
    //         $resultat -> execute();
    //         echo "Un type d'adhérent supprimé !";
    //         $db=null;
    //     } 
    //     catch (PDOException $e) {
    //         echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
    //         // Ligne suivante à utiliser pour le débogage
    //         echo  $e->getMessage() . "<br/>";
    //         die();
    //         }
    
    //     }
?>

