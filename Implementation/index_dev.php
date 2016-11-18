<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="gestionnaire,statistique, developer, abandonner,stat, objets">
    <meta name="description" content="Index pour gestionnaire">
    <meta name="robots" content="none">
    <title>Système Objets perdus - Page d'acceuil - Gestionnaire</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/index_dev.css">
    <link rel="stylesheet" href="./css/header_footer.css">
    <link rel="stylesheet" href="./css/disconnect.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./javascript/mark_objects.js"></script>
</head>

<body>
    <?php include "./includes/header.inc.php";
          include "./includes/verifySession.inc.php"; ?>

    <div id="buttons">
        <a id="statLink" href="statistic.php">
            <img src="./src/statistic.png" alt="Statistique" />
        </a>
        <a id="disconnectLink" href="disconnect.php">
            <img src="./src/disconnect.png" alt="Déconnecter" />
        </a>
    </div>
    <div>
        <?php include "./includes/found_object_table.inc.php" ?>
    </div>

    <p id="result"> </p>

    <?php include "./includes/footer.inc.php" ?>
</body>

</html>
