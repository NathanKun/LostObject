<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="admin,ajouter, perdu, trouvé, objets">
    <meta name="description" content="Index pour l'administrateur">
    <meta name="robots" content="none">
    <meta http-equiv="cache-control" content="no-cache">
    <title>Objets perdus - Page d'acceuil - Administrateur</title>
    <link rel="stylesheet" href="./css/table.css">
    <link rel="stylesheet" href="./css/index_admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/javascript/mark_objects.js"></script>
</head>

<body>
    <?php include "./includes/header.inc.php";
          include "./includes/verifySession.inc.php"; ?>

    <div>
        <a href="disconnect.php">
            <img class="btnImg" src="/src/disconnect.png" alt="Déconnecter" />
        </a>
        <a href="addObject.php">
            <img class="btnImg" src="/src/addObjFound.png" alt="Ajouter un objet trouvé" />
        </a>

    </div>
    <div>
        <?php include "./includes/found_object_table.inc.php" ?>
    </div>

    <div>
        <?php include "./includes/declared_object_table.inc.php" ?>
    </div>

    <p id="result"> </p>

    <?php include "./includes/footer.inc.php" ?>
</body>

</html>
