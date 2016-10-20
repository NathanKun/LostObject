<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Objets perdus - Index</title>
		<link rel="stylesheet" href="index.css">
	</head>
	
	<body>
	<?php include('/includes/header.inc.php'); ?>
	
	<section>
		<div class="input">
			<label>Identifiant :</label>
			<label>Mots de pass :</label>
		</div>
		<div class="input">
			<input type="password" required>
			<input type="text" required>
		</div>
		<div class="button">
			<input type="button" value="Se connecter">
		</div>
		<div class="link">
			<a href="register">Créer un compte</a>
		</div>
	</section>
	
	<?php include('/includes/footer.int.php') ?>
	
	</body>
</html>