<?php
if(!isset($_SESSION['ADHERENT'])){?>
    
<form method="post" action="">
    <label for="courriel_adherent">Adresse mail</label><br>
    <input type="email" id="courriel_adherent" name="courriel_adherent" placeholder="exemple@gmail.com"><br> <br>
         
    <label for="telephone">Téléphone</label><br>
    <input type="number" id="telephone" name="telephone_adherent" placeholder = "0123456789" ><br><br>
 
     <input type="submit" value="Se connecter">
</form>





<?php 
//--------------------------------- TRAITEMENTS PHP ---------------------------------//





if (!empty($_POST['courriel_adherent']) && !empty($_POST['telephone_adherent'])) 
{
    $db = connectBD();
    $resultat = $db -> prepare("SELECT * FROM ADHERENT WHERE courriel_adherent='$_POST[courriel_adherent]' AND telephone_adherent = '$_POST[telephone_adherent]'");
    $resultat -> execute();

    if($membre = $resultat ->fetch())//setFetchMode(PDO::FETCH_ASSOC))
    {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        try{
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach($membre as $indice => $element)
            {
                if($indice != 'telephone_adherent')
                {
                    $_SESSION['ADHERENT'][$indice] = $element;
                    //print_r($_SESSION); //pour récupérer toutes les données de la personne pour réutiliser plus tard
                }
            }
            echo "connecté !";
            

            }catch (PDOException $e) {
                echo "<div class='erreur'> Erreur d'insertion dans la base de données ! </div>";
                // Ligne suivante à utiliser pour le débogage
                echo  $e->getMessage() . "<br/>";
                die();
                }
      
    }

    else
    {
        echo  "Erreur d'ID";
    }

}

else {
    echo "Merci de remplir tous les champs !";
}}
else{echo'Vous êtes connecté !';
    require_once('deconnexion.php');}
// if(isset($_SESSION['ADHERENT']))
// {


// }
?>
