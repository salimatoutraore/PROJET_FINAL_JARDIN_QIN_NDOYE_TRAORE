<?php
// require_once('inc/init.inc.php');
// require_once("inc/entete.inc.php");
// require_once('inc/menu_jar.inc.php');
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!jardinEstConnecte()) 
header("location:accueil_jar.php?page=connexion");
//print_r($_SESSION);
//print_r($_SESSION['JARDIN']['nom_association']);
echo '<p class="centre">Bonjour chère association : ' . $_SESSION['JARDIN']['nom_association'] . '</p><br/>';
echo '<div class="cadre"><h2> Voici vos informations </h2>'; ?><br/>

<table>
    <tr>
        <th> E-mail </th>
        <th> Site internet </th>
    </tr>
    
    <?php
    echo '<tr>
        <td> '. $_SESSION['JARDIN']['courriel_jardin'].'</td>
        <td> '. $_SESSION['JARDIN']['site_internet'] .'</td>';
        echo '</td></tr>';

//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>
</table>