<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="student, étudiant, déclarer, perdu, trouvé, objets">
    <meta name="description" content="Index pour étudiant">
    <meta name="robots" content="none">
    <title>Système Objets perdus - Page d'acceuil - Etudiant</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/index_student.css">
    <link rel="stylesheet" href="./css/header_footer.css">
    <link rel="stylesheet" href="./css/disconnect.css">
</head>

<body>
    <?php include "./includes/header.inc.php";
          include "./includes/verifySession.inc.php"; ?>
    <?php $_SESSION["title"] = "Déclarer un objet Perdu"; $_SESSION["uploadList"] = "ojd"; ?>
    <div id="buttons">
        <a id="declareLink" href="uploadObject.php">
            <img src="./src/declareObjLost.png" alt="Déclarer un objet perdu" />
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
