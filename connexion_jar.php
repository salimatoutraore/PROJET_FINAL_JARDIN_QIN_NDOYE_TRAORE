<?php
if(!isset($_SESSION['JARDIN'])){
//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>
 
<form method="post" action="">
    <label for="courriel_jardin">Adresse mail</label><br>
    <input type="email" id="courriel_jardin" name="courriel_jardin" placeholder="exemple@gmail.com"><br> <br>
         
    <label for="nom_jardin">Nom du jardin</label><br>
    <input type="text" id="nom_jardin" name="nom_jardin" placeholder="Nom du jardin"><br><br>
 
     <input type="submit" value="Se connecter">
</form>





<?php
//--------------------------------- TRAITEMENTS PHP ---------------------------------//



//if($_POST){

if (!empty($_POST['courriel_jardin']) && !empty($_POST['nom_jardin'])) 
{
    $db = connectBD();
    $resultat = $db -> prepare("SELECT * FROM JARDIN WHERE courriel_jardin='$_POST[courriel_jardin]' AND nom_jardin = '$_POST[nom_jardin]'");
    $resultat -> execute();

    if($membre = $resultat ->fetch())
    {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        try{
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach($membre as $indice => $element)
            {
                if($indice != 'nom_jardin')
                {
                    $_SESSION['JARDIN'][$indice] = $element;
                }
            }
            //header("location:profil_jar.php");
            echo "connecté !";
            
            }
            catch (PDOException $e) 
            {
                echo "<div class='erreur'> Erreur d'insertion dans la base de données ! </div>";
                // Ligne suivante à utiliser pour le débogage
                echo  $e->getMessage() . "<br/>";
                die();
            }
      
    }

    else
    {
        echo  "Erreur d'identifiant";
    }

}

else {
    echo "Merci de remplir tous les champs !";
}
}
else{echo'Vous êtes connecté !';
require_once('deconnexion.php');}
// if(isset($_SESSION['JARDIN']))
// {   

// }
?>
