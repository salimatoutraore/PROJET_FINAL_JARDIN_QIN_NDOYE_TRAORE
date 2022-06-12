<?php require_once('inc/init.inc.php'); ?>

    <h1> Bienvenue sur Les Jardins Partagés</h1>

    <?php require_once('inc/entete.inc.php'); ?>

    

    <!--<p>Voulez-vous accéder à l'espace adhérent ou ajouter un jardin partagé (pour les associations uniquement)</p>

    <form action='accueil_adh.php'>
        <input type='submit' value='Adhérent'/>
    </form>
    <form action='accueil_jar.php'>
        <input type='submit' value='Ajouter un jardin'/>
    </form>-->

    <div class="m_boutons">

        <a href="<?php echo RACINE_SITE; ?>accueil_adh.php"> 
            <button type="button" class = "bouton_accueil" id="button1" >Accès adhérent</button>
        </a>

        <a href="<?php echo RACINE_SITE; ?>accueil_jar.php">
            <button type="button" class = "bouton_accueil" id="button2">Accès association</button>
        </a>
        
        <a href="code_admin.php">
        <button type="button" class = "bouton_accueil" id="button3">Accès administrateur</button>
        </a>
    </div>

    <?php require_once('inc/bas.inc.php'); ?>
