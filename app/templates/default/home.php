<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- DEBUT CONNEXION / LOG IN -->
<div>
	<div>Connexion</div>
	<form method="post" action="">
		<label for="email">Email</label>
		<input type="email" id="email" name="email">

		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">

		<input type="submit" value="connexion" />
	</form>
	<?php
		if($showErr){
			echo '<div class="erreurs">';
			echo implode('<br/>', $err);
			echo '</div>';
		}
		if($formValid){
			echo 'Vous êtes bien connecté';
		}
	?>
</div>
<!-- FIN CONNEXION / LOG IN -->
<!-- DEBUT RECHERCHE -->

<!-- FIN RECHERCHE -->
<?php $this->stop('main_content') ?>
