<?php
    session_start();
    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){
        
    } else {
        session_destroy();
        echo "<p><a href=\"/index.php\">Retourner à la page d'acceuil</a></p>";
        /* echo "<p>" . $_SESSION['loggedIn'] . "</p>";
        echo "<p>" . $_SESSION['usr_id'] . "</p>";
        echo "<p>" . $_SESSION['usr_name'] . "</p>";
        */
        die("Vous ne vous êtes pas encore identifié.");
    }
?>
