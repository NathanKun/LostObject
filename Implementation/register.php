<!DOCTYPE html>
<html>
	<head>
		<title>Page d'Inscription</title>
		<meta name="keywords" content="Page d'Inscription"/>
		<meta name="description" content="Page d'Inscription d'Esigelec"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="./css/register.css"/>
	</head>
	<body>
		<header class="register_img">
			<a id="logo" href="index.php">
				<img src="./src/logo.jpg" height="60" alt="Logo Esigelec">
			</a>
			<h2>Page d'Inscription<h2>
		</header>
		
		<section>
		<?php include "./includes/register.inc.php"?>
			<form id="reg_input" method="post" action="<?php echo htmlspecialchars($_SERVER[ 'PHP_SELF' ]);?>">
				<h4 id="hint">
					<?php echo $hint; ?>
				</h4>
				<div class="input">
					<label>Identifiant :</label>
					<label>Nom d'utilisateur :</label>
					<label>Mots de passe :</label>
					<label>Confirmation de mot de passe:</label>
				</div>
				<div class="input">
					<input type="text" id="id" name="id" value="<?php echo $id;?>" required />
					<input type="text" id="username" name="name" value="<?php echo $name;?>" required />
					<input type="password" id="pw" name="pw" value="<?php echo $pw;?>" required />
					<input type="password" id="pw2" name="pw2" type="password" value="<?php echo $pw2;?>" required />
				</div>
				<div class="button">
					<input type="submit" value="S'incrire" />
				</div>
			</form>
		</section>
		<?php include "./includes/footer.inc.php"?>
	</body>
</html>