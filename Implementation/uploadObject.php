<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="ajouter, perdu, trouvé, objets">
    <meta name="description" content="Ajouter un objet trouvé">
    <meta name="robots" content="none">
    <title>Ajouter un objet trouvé</title>
    <link rel="stylesheet" href="./css/upload.css" />
    <link rel="stylesheet" href="./css/header_footer.css">
</head>

<body>
    <?php include "./includes/header.inc.php";
          require_once "./includes/verifySession.inc.php";?>

    <h2>
        <?php include "./includes/upload.inc.php"?>
        <?php echo $_SESSION["title"] ?>
    </h2>
    <section>
        <form id="inputForm" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER[ 'PHP_SELF' ]);?>">
            <h4 id="hint">
                <?php echo $hint; ?>
            </h4>
            <label for="obj_name">Nom de l'objet :</label>
            <input type="text" id="obj_name" name="obj_name" value="<?php echo $obj_name;?>" required />
            <label for="obj_description">Description :</label>
            <textarea id="obj_description" name="obj_description" value="<?php echo $obj_description;?>" required></textarea>
            <label for="file">Ajouter un photo de l'objet :</label>
            <input type="file" id="file" name="file" />
            <input type="submit" value="Enregistrer" />
        </form>
    </section>
    <?php include "./includes/footer.inc.php"?>
</body>

</html>
