<h1>Inscription pour l'ajout d'un jardin</h1>

<form method="POST" action="accueil_jar.php?page=inscription">
<!--Table JARDIN-->
    <label for="nom_jardin">Nom du jardin</label><br>
    <input type="text" id="nom_jardin" name="nom_jardin" placeholder="Nom du jardin" pattern="[A-Za-z]{1,}"><br><br>
          
    <label for="nom_association">Nom de l'association</label><br>
    <input type="text" id="nom_association" name="nom_association" placeholder="nom de l'association" pattern="[A-Za-z]{1,}"><br><br>

    <label for="amenagement">Amenagements</label><br>
    <input type="text" id="amenagement" name="amenagement" placeholder="potager, mare, jeux, ..." pattern="[A-Za-z]{1,}"><br><br>
  
    <label for="site_internet">Site internet</label><br>
    <input type="text" id="site_internet" name="site_internet" placeholder="Nom du site internet"><br><br>

    <label for="courriel_jardin">Email du jardin</label><br>
    <input type="email" id="courriel_jardin" name="courriel_jardin" placeholder="exemple@gmail.com" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[a-z]{2,}"><br><br>
          
    <label for="date_fermeture_exceptionnelle">Date de fermeture exceptionnelle </label><br>
    <input type="date" id="date_fermeture_exceptionnelle" name="date_fermeture_exceptionnelle" placeholder="01/01/1990"><br><br>

    <label for="heure_ouverture">Heure d'ouverture</label><br>
    <input type='time' id="heure_ouverture" name="heure_ouverture" placeholder="10:30"><br><br>
  
    <label for="heure_fermeture">Heure de fermeture</label><br>
    <input type='time' id="heure_fermeture" name="heure_fermeture" placeholder="20:15"><br><br>

   
         
<!--Table ADRESSE-->
    <label for="adresse">Adresse</label><br>
    <input type="number" id="adresse" name="num_voie" placeholder="N°" pattern='[0-9]{0,}'>
    <input type="text" id="adresse" name="indicateur_eventuel_repetition" placeholder="bis/ter/quater..." pattern="[A-Za-z]{0,}" title="apostrophe non accepté">
    <input type="text" id="adresse" name="type_de_voie" placeholder="rue/avenue/boulevard..." pattern="[A-Za-z]{1,}" title="apostrophe non accepté">
    <input type="text" id="adresse" name="nom_voie" placeholder="Nom de la voie" pattern="[A-Za-z]{1,}" title="apostrophe non accepté">
    <br><br>

    <label for="cp">Code Postal</label> <br>
    <input type="number" id="cp" name="code_postal" placeholder="Code postal" title="5 chiffres requis : 0-9"><br><br>     


<input type="reset" name="reset" value="Annuler" />
<input type="submit" name="submit" value="Valider" />
<?php    //echo $_POST["heure_fermeture"]?>
</form>
 

<?php 
if (isset($_POST['nom_association']) && isset($_POST['nom_jardin']) && isset($_POST['type_de_voie']) && isset($_POST['nom_voie']) && isset($_POST['code_postal']))
{
if (empty($_POST['nom_association']) || empty($_POST['nom_jardin']) || empty($_POST['type_de_voie']) || empty($_POST['nom_voie']) || empty($_POST['code_postal'])) 
{
    echo "<p class=erreur> Saisir au moins un nom de jardin, un nom d'association, type de voie, nom de voie et un code postal ! </p>";
}

else{
    try {
    $db=connectBD();

    foreach ($_POST as $cle => $valeur) {
        $$cle = $valeur;
        }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Remplissage adresse
    $adrr = $db->prepare("INSERT INTO ADRESSE (num_voie, indicateur_eventuel_repetition, type_de_voie, nom_voie, code_postal)
     VALUES (:num_voie, :indicateur_eventuel_repetition , :type_de_voie, :nom_voie, :code_postal)");
    $adrr -> bindParam(':num_voie', $num_voie);
    $adrr -> bindParam(':indicateur_eventuel_repetition', $indicateur_eventuel_repetition);
    $adrr -> bindParam(':type_de_voie', $type_de_voie);
    $adrr -> bindParam(':nom_voie', $nom_voie);
    $adrr -> bindParam(':code_postal', $code_postal);
    // Insertion d'une ligne
    $adrr->execute();
    //récupère le dernier ID entré
    $lastId = $db->lastInsertId();


    //Remplissage jardin      
    $jar = $db->prepare("INSERT INTO JARDIN (nom_jardin, site_internet, nom_association, amenagement, courriel_jardin, date_fermeture_exceptionnelle,heure_ouverture,heure_fermeture, id_adresse) 
    VALUES (:nom_jardin, :site_internet, :nom_association, :amenagement, :courriel_jardin,  :date_fermeture_exceptionnelle, :heure_ouverture, :heure_fermeture, :id_adresse)");

    
    $jar -> bindParam(':nom_jardin', $nom_jardin);
    $jar -> bindParam(':site_internet', $site_internet);
    $jar -> bindParam(':nom_association', $nom_association);
    $jar -> bindParam(':amenagement', $amenagement);
    $jar -> bindParam(':courriel_jardin', $courriel_jardin);
    $jar -> bindParam(':date_fermeture_exceptionnelle', $date_fermeture_exceptionnelle);
    $jar -> bindParam(':heure_ouverture', $heure_ouverture);
    $jar -> bindParam(':heure_fermeture', $heure_fermeture);
    $jar -> bindParam(':id_adresse', $lastId);

    // Insertion d'une ligne
    $jar->execute();
    
        }

    catch (PDOException $e) {
        echo "<div class=erreur> Erreur d'insertion dans la base de données ! Le nom du jardin est peut-être déjà utilisée ! </div>";
        // Ligne suivante à utiliser pour le débogage
        echo  $e->getMessage() . "<br/>";
        die();
        }
    echo "<p> Insertion effectuée avec succès </p>";
    }

}

?>