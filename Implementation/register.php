<!DOCTYPE html>
<html>

<head>
    <title>Page d'Inscription</title>
    <meta charset="utf-8">
    <meta name="keywords" content="register, créer, compte" />
    <meta name="description" content="Page d'Inscription d'Esigelec" />
    <meta name="robots" content="none">
    <link rel="stylesheet" href="/css/index.css" />
</head>

<body>
    <?php include "/includes/header.inc.php"; ?>

    <h2>Page d'Inscription</h2>

    <section>
        <?php include "./includes/register.inc.php"?>
        <form id="reg_input" method="post" action="<?php echo htmlspecialchars($_SERVER[ 'PHP_SELF' ]);?>">
            <h4 id="hint">
                <?php echo $hint; ?>
            </h4>
            <div class="input">
                <label for="id">Identifiant :</label>
                <label for="username">Nom d'utilisateur :</label>
                <label for="pw">Mots de passe :</label>
                <label for="pw2">Confirmation de mot de passe:</label>
            </div>
            <div class="input">
                <input type="text" id="id" name="id" value="<?php echo $id;?>" required />
                <input type="text" id="username" name="name" value="<?php echo $name;?>" required />
                <input type="password" id="pw" name="pw" value="<?php echo $pw;?>" required />
                <input type="password" id="pw2" name="pw2" type="password" value="<?php echo $pw2;?>" required />
            </div>
            <div class="button">
                <input type="submit" value="S'inscrire" />
            </div>
        </form>
    </section>
    <?php include "./includes/footer.inc.php"?>
</body>

</html>
