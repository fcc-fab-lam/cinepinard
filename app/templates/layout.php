<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<!-- BOOTSTRAP CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
        <header>            
		<?php if(empty($w_user)) : ?>
		<div class="formulaire">
			<form method="post" action="<?=$this->url('login') ?>">
				<label for="email">Email</label>
				<input type="email" id="email" name="email">

				<label for="password">Mot de passe</label>
				<input type="password" id="password" name="password">

				<input type="submit" value="connexion" />
				<input type="hidden" value="" name="currentPage">
			</form>
			<?php else : ?>
                Bonjour <?=$w_user['nickname'] ?>
                <a href="<?=$this->url('logout') ?>">Se déconnecter</a>
			<?php endif; ?>
		</div>
        </header>

		<main>
			<?= $this->section('main_content') ?>
		</main>

		<footer>
		</footer>

		<!-- JQUERY CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- BOOTSTRAP CDN -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- lance le script add-wine-genre-->
		<?= $this->section('scripts') ?>
</body>
</html>