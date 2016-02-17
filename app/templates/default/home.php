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
<div>
	<div>Recherche</div>
	<form method="post" action="">
		<label for="film">Par film</label>
		<input type="text" id="film" name="film">

		<div>J'aime :
			<label><input type="checkbox" id="preferences1" name="preferences1" value="1" />Vin blanc</label>
			<label><input type="checkbox" id="preferences2" name="preferences2" value="2" />Vin rouge</label>
			<label><input type="checkbox" id="preferences3" name="preferences3" value="3" />Vin rosé</label>
			<label><input type="checkbox" id="preferences4" name="preferences4" value="4" />Bière</label>
			<label><input type="checkbox" id="preferences5" name="preferences5" value="5" />Autre</label>
		</div>

		<input type="submit" value="recherche" />
	</form>
</div>
<!-- FIN RECHERCHE -->
<?php $this->stop('main_content') ?>
