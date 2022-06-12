<h1>Inscription adhérent</h1>

<form method="POST" action="accueil_adh.php?page=inscription">

<!--Table ADHERENT-->
    <label>Type adhérent :</label><br><br> 

    <input type="radio" id="PP" name="id_type_adherent" value=1>
    <label for="PP">Personne physique</label><br>
    <input type="radio" id="HO" name="id_type_adherent" value=2>
    <label for="HO">Hôpital</label><br>
    <input type="radio" id="MR" name="id_type_adherent" value=3>
    <label for="MR">Maison de retraite</label><br>
    <input type="radio" id="EC" name="id_type_adherent" value=4>
    <label for="EC">École</label><br><br>

<!--Table ADHERENT-->
    <label for="nom">Nom (ou nom de l'organisation)</label><br>
    <input type="text" id="nom" name="nom" placeholder="Votre nom" pattern="[A-Za-z]{1,}"><br><br>
    <label for="prenom">Prénom (Facultative) </label><br>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" pattern="[A-Za-z]{1,}"><br><br>
    <label for="telephone">Téléphone</label><br>
    <input type="text" id="telephone" name="telephone_adherent" placeholder="0123456789" pattern="[0-9]{10}"> <br><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" name="courriel_adherent" placeholder="exemple@gmail.com" pattern="[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[a-z]{2,}"><br><br>

<!--Table ADRESSE-->
<label for="adresse">Adresse</label><br>
    <input type="number" id="adresse" name="num_voie" placeholder="N°"  pattern='[0-9]'>
    <input type="text" id="adresse" name="indicateur_eventuel_repetition" placeholder="bis/ter/quater..." pattern="[A-Za-z]{0,}" title="apostrophe non accepté">
    <input type="text" id="adresse" name="type_de_voie" placeholder="rue/avenue/boulevard..." pattern="[A-Za-z]{1,}" title="apostrophe non accepté">
    <input type="text" id="adresse" name="nom_voie" placeholder="Nom de la voie" pattern="[A-Za-z]{1,}" title="apostrophe non accepté">
    <br><br>

    <label for="cp">Code Postal</label> <br>
    <input type="number" id="cp" name="code_postal" placeholder="Code postal" title="5 chiffres requis : 0-9"><br><br>     

<br />
<input type="reset" name="reset" value="Annuler" />
<input type="submit" name="submit" value="Valider" />

</form>

<?php
if (isset($_POST['nom']) && isset($_POST['telephone_adherent']) && isset($_POST['courriel_adherent']) && isset($_POST['type_de_voie']) && isset($_POST['nom_voie']) && isset($_POST['code_postal']))
{
if (empty($_POST['nom']) || empty($_POST['telephone_adherent']) || empty($_POST['courriel_adherent']) || empty($_POST['type_de_voie']) || empty($_POST['nom_voie']) || empty($_POST['code_postal'])) 
{
    echo "<p class=erreur> Saisir au moins un nom, un type d'adhérent, un n°tel, email, type de voie, nom de voie et un code postal ! </p>";
}
/*elseif(len($_POST[telephone_adherent])!=10 || len($_POST[code_postal])!=5 ){
    echo "<p class=erreur> Veuillez saisir 10 chiffres pour le n°tel et 5 chiffres pour le code postal ! </p>";
}*/
/*else{
    $db=connectBD();
    $membre -> query("SELECT * FROM ADHERENT WHERE courriel_adherent='$_POST[courriel_adherent]'");
    $membre2 -> query("SELECT * FROM ADHERENT WHERE telephone_adherent='$_POST[telephone_adherent]'");
    if($membre->num_rows > 0 ||$membre2->num_rows > 0)
        {
            $contenu .= "<div class=erreur>Email ou N°tel déjà existant. Veuillez vous connecter.</div>";
        }*/
    else{
		try {
        $db=connectBD();
        
        /*Parcours de la variable $_POST pour affecter à chaque variable liée
			l'un des champs du formulaire.

			La notation $$ permet de déclarer un nom de variable à l'aide du contenu d'une
			chaîne de caractères: 
			$chaine = "truc";
			$$chaine = 3;
			echo $truc; //Contient la valeur 3
			*/
        foreach ($_POST as $cle => $valeur) {
            $$cle = $valeur;
            }
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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


        //Remplissage adhérent        
        $ad = $db->prepare("INSERT INTO ADHERENT (nom, prenom, telephone_adherent, courriel_adherent, id_type_adherent, id_adresse) 
        VALUES (:nom, :prenom, :telephone_adherent, :courriel_adherent, :id_type_adherent, :id_adresse)");
        $ad -> bindParam(':nom', $nom);
        $ad -> bindParam(':prenom', $prenom);
        $ad -> bindParam(':telephone_adherent', $telephone_adherent);
        $ad -> bindParam(':courriel_adherent', $courriel_adherent);

        $id_type = htmlspecialchars($_POST['id_type_adherent']) ;

        $ad -> bindParam(':id_type_adherent', $id_type);
        $ad -> bindParam(':id_adresse', $lastId);
        


        
        // Insertion d'une ligne
        $ad->execute();
		
		    } 
        catch (PDOException $e) {
			echo "<div class=erreur> Erreur d'insertion dans la base de données ! Votre n°tel ou adresse email sont peut-être déjà utilisés ! </div>";
			// Ligne suivante à utiliser pour le débogage
			echo  $e->getMessage() . "<br/>";
			die();
		    }
		echo "<p> Insertion effectuée avec succès </p>";
        }

    }
/*}*/

?>