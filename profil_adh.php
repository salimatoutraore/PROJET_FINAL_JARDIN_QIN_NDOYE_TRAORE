<?php
//require_once('inc/init.inc.php');
//require_once("inc/entete.inc.php");
//require_once('inc/menu_jar.inc.php');
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) 
header("location:accueil_adh.php?page=connexion");
// debug($_SESSION);
echo '<p class="centre">Bonjour <strong>' . $_SESSION['ADHERENT']['nom'] . '</strong></p>';
echo '<div class="cadre"><h2> Voici vos informations </h2>';
//print_r($_SESSION)
?>


<table>
    <tr>
        <th> E-mail </th>
        <th> Numéro de téléphone </th>
    </tr>
    
    <?php
    echo '<tr>

        <td> '. $_SESSION['ADHERENT']['courriel_adherent'].'</td>
        <td> '. $_SESSION['ADHERENT']['3'] .'</td>';//num tel
        echo '</td></tr>';
        echo '<br/>';

//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>

</table>
<br/><div class="cadre"><h2> Voici les jardins auquel vous êtes inscrit </h2><br/>

<table>
    <tr>
        <th> Nom du jardin </th>
    </tr>

    <?php
    try{
        $db = connectBD();
        $courriel_adherent=$_SESSION['ADHERENT']['courriel_adherent'];
        $telephone_adherent=$_SESSION['ADHERENT']['3'];
    foreach ($_SESSION as $cle => $valeur) {
        $$cle = $valeur;
    }

    $sql = $db -> prepare("SELECT nom_jardin FROM JARDIN WHERE id_jardin IN (SELECT id_jardin FROM ADHERENT A, ADHESION AD WHERE A.courriel_adherent = '$courriel_adherent' AND A.telephone_adherent = '$telephone_adherent' AND AD.id_adherent = A.id_adherent)");
    //$sql -> bindParam(':courriel_adherent', $courriel_adherent);
    //$sql -> bindParam(':telephone_adherent', $telephone_adherent);
    $sql -> execute();

    while($ligne=$sql->fetch()){
        echo '<tr>
        <td>' . $ligne['nom_jardin'].'</td>';
    }


    $db=null;

    } 
    
    catch (PDOException $e) 
    {
        echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
        // Ligne suivante à utiliser pour le débogage
        echo  $e->getMessage() . "<br/>";
        die();
    }
  
    ?>

</table>
<?php// require_once('inc/bas.inc.php'); ?>