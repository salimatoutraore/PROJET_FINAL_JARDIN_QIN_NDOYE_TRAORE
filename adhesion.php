<?php
require_once('inc/init.inc.php');
require_once("inc/entete.inc.php");
require_once('inc/menu_adh.inc.php');
    //Supprimer adhérent
    if (isset($_POST['id_jardin']))
    { 
        $id_jardin=$_POST["id_jardin"];

        //echo 'PAGE EN COURS DE CONSTRUCTION<br>';
        if(isset($_SESSION['ADHERENT']))
        {
            $id_adherent=$_SESSION['ADHERENT']['id_adherent'];
            //print_r ($id_adherent);
            try
            {
                $db = connectBD();
                $resultat = $db -> prepare("SELECT num_adhesion FROM ADHESION WHERE id_jardin='$id_jardin' AND id_adherent='$id_adherent'");
               // $resultat -> bindParam(':id_jardin', $id_jardin);
               // $resultat -> bindParam(':id_adherent', $id_adherent);
               // $resultat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $resultat -> execute();
                $row=$resultat->rowCount();
                $membre=$resultat ->fetch();

                //print_r($resultat);
                //print_r($membre);
                if($row>0){
                foreach($membre as $indice => $element)
                {
                    if($indice=='num_adhesion')
                    {
                        if(!empty($element))
                        {
                        echo 'Votre numéro adhésion est : '.$element;
                        //print_r($membre);
                        echo '<br>Vous avez déjà adhéré au jardin !';
                        break;
                        }

                    }
                }
                }

                else
                {
                    //echo 'PAGE EN COURS DE CONSTRUCTION UN<br>';
                    $resultat2 = $db -> prepare("INSERT INTO ADHESION(date_adhesion, id_jardin, id_adherent) VALUES(:date_adhesion, :id_jardin, :id_adherent)");
                    $date_adhesion=date('Y-m-d');
                    $resultat2->bindParam(':date_adhesion', $date_adhesion);
                    $resultat2->bindParam(':id_jardin', $id_jardin);
                    $resultat2->bindParam(':id_adherent', $id_adherent);
                    $resultat2 -> execute();

                    //echo 'PAGE EN COURS DE CONSTRUCTION DEUX<br>';
                    $resultat3 = $db -> prepare("SELECT nom_jardin FROM JARDIN WHERE id_jardin='$id_jardin'");
                    //$resultat -> bindParam(':id_jardin', $id_jardin);
                    $resultat3 -> execute();
                    //echo 'PAGE EN COURS DE CONSTRUCTION TROIS<br>';
                    $membre2=$resultat3->fetch();
                    foreach($membre2 as $indice2 => $element2)
                    {
                        if($indice2=='nom_jardin'){$jar=$element2; break;}
                    }
                    echo 'Vous avez bien adhérer au jardin : '.$jar;
                }
 
                //}

            $db=null;

            //try }        
            }

            catch (PDOException $e) 
            {
                echo '<div class=erreur> Erreur de connexion à la base de données ! </div>';
                // Ligne suivante à utiliser pour le débogage
                echo  $e->getMessage() . "<br/>";
                die();
            }

//if isset session }
        }

        else
        {
            echo 'Veuillez vous connecter sur votre compte adhérent !';
            
        }
//if isset id jardin }
    ;}



    

require_once('inc/bas.inc.php');
?>