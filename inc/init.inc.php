<?php
//--------- BDD

/* Création de objet PDO de connexion */
function connectBD()
{
    $user = "root";
    $pass =  "";
   
    $db= new PDO('mysql:host=localhost;dbname=repertoire',$user,$pass);

    //Pour avoir plus de détails sur les exception lors de l'envoi d'une requête
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $db;
}
function internauteEstConnecte()
{ 
    if(!isset($_SESSION['ADHERENT'])) return false;
    else return true;
}
function jardinEstConnecte()
{ 
    if(!isset($_SESSION['JARDIN'])) return false;
    else return true;
}
//--------- SESSION : permet de maintenir les utilisateur connecter
session_start();
 
//--------- CHEMIN : permet de gerer le site en chemin absolu 
define("RACINE_SITE","/site/");

//--------- VARIABLES 
$contenu = ''; //Va nous permettre d'afficher des messages à un endroit unique


//--------- AUTRES INCLUSIONS
//require_once("fonction.inc.php"); //Fait appel au fichier fonction.inc

?>
