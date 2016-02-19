<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- DEBUT CONNEXION / LOG IN -->
<div>
	<div>Connexion</div>
	<form method="post">
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
<div>
	<div>Recherche d'un film</div>
	<form action="resultats-recherche">
		<input type="text" placeholder="Titre de votre film ..." name="film">

		<div>J'aime :
			<?php foreach($categories as $value): ?>
				<label><input type="checkbox" name="preferences[]" value="<?=$value['id']; ?>" /><?=$value['name']; ?></label>
			<?php endforeach; ?>
		</div>

		<input type="submit" value="recherche" />
	</form>
	<?php if(isset($_SESSION['listErr'])) : ?>
		<div class="erreurs">
			<?php 
				echo implode('<br/>', $_SESSION['listErr']);
				unset($_SESSION['listErr']);
			 ?>
		</div>
	<?php endif; ?>
</div>
<!-- FIN RECHERCHE -->
<?php $this->stop('main_content') ?>
