<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="déconnecter,retourner, déconnexion">
    <meta name="description" content="Retourner à la page d'acceuil.">
    <meta name="robots" content="none">
    <meta http-equiv="cache-control" content="no-cache">
    <title>Objets perdus - Page d'acceuil - Administrateur</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/index_admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/javascript/mark_objects.js"></script>
</head>

<body>
    <?php 
    include "./includes/header.inc.php";
    session_start();
    
    if(isset($_SESSION["usr_id"])){
        $_SESSION=array();
        session_destroy();
        echo "<h3>Vous êtes maintenant déconnecté.</h3>";
        echo "<p><a href=\"/index.php\">Retourner à la page d'acceuil</a></p>";
    } else {
        echo "<h3>Ici c'est la page pour déconnecter.</h3>";
        echo "<p><a href=\"/index.php\">Retourner à la page d'acceuil</a></p>";
    }
    
    include "./includes/footer.inc.php" ;
    ?>
</body>

</html>
