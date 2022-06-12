<?php
function executeRequete($req)
{
    // Permet d'exécuter les requête sql, prend en argument la requete, 
    // teste la requete si erreur = message 
    // sinon retourne resultat (pour SELECT) ou retourne booléen (pour INSERT/UPDATE/DELETE)
    
    global $db;
    $resultat = $db->execute($req);
    if(!$resultat) // 
    {
        die("Erreur sur la requete sql.<br>Message : " . $db->error . "<br>Code: " . $req);
    }
    return $resultat; // 
}


function debug($var, $mode = 1)
{
    // Prend 2 arguments : 1-variable,array,object 2-mode d'affichage var_dump (par défaut) ou print_r

    //echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
    $trace = debug_backtrace(); // retourne tableau avec ligne et fichier où est excécuté la fonction
    $trace = array_shift($trace); // permet de retirer une dimension de trace
    //echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
    
    if($mode == 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
    echo '</div>';
}


function internauteEstConnecte()
{ 
    // Permet de savoir si un adherent est connecté ou pas
    if(!isset($_SESSION['ADHERENT'])) return false;
    else return true;
}

//------------------------------------
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['ADHERENT']['prenom'] == "") return true;
    else return false;
}