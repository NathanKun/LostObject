<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="index, objets，perdus, ESIGELEC, login">
    <meta name="description" content="Index du système Objets Perdus">
    <meta name="robots" content="index">
    <meta http-equiv="cache-control" content="no-cache">
    <title>Objets perdus - Index</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <?php include('./includes/header.inc.php');?>
    <?php include('./includes/login.inc.php');?>
    <section>
        <form name="login_input" method="post" action="<?php echo htmlspecialchars($_SERVER[ 'PHP_SELF' ]);?>">
            <h4 id="hint">
                <?php echo $hint; ?>
            </h4>
            <div class="input">
                <label>Identifiant :</label>
                <label>Mots de passe :</label>
            </div>
            <div class="input">
                <input type="text" id="id" name="id" value="<?php echo $id;?>" required />
                <input type="password" id="pw" name="pw" value="<?php echo $pw;?>" required />
            </div>
            <div class="button">
                <input type="submit" value="Se connecter" />
            </div>
            <div class="link">
                <a href="register.php">Créer un compte</a>
            </div>
        </form>
    </section>
    <?php include('/includes/footer.inc.php') ?>

</body>

</html>
