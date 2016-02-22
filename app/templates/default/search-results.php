<?php $this->layout('layout', ['title' => 'Résultats de recherche']) ?>

<?php $this->start('main_content') ?>
<div class="container-fluid background-recherche">
	<?php
	
	$userPrefs = '';

	if(!empty($erreur)){
		echo $erreur;
	}
	else{
		foreach($preferences as $value){
			$userPrefs .= '&preferences[]='.$value;
		}
		foreach($resultats as $value): ?>
			<div class="row resultats">
				<div class="image-res-seach">
				<!-- IMAGE -->
				<p><?= (isset($value->poster->href)) ? '<a href="selection-film?id=<?=$value->code.$userPrefs ?>"><img height="200px" src="'.$value->poster->href.'" /></a>' : '' ?></p>
				</div>
				<div class="descriptif-res-search">
					<!-- TITRE ORIGINAL OU FRANCAIS -->
					<h4><?= (isset($value->title)) ? $value->title : $value->originalTitle ?></h4>

					<!-- REALISATEUR -->
					<p>Réalisateur : <?= (isset($value->castingShort->directors)) ? $value->castingShort->directors : 'Inconnu' ?></p>

					<!-- ACTEURS -->
					<p>Acteurs : <?= (isset($value->castingShort->actors)) ? $value->castingShort->actors : 'Inconnu' ?></p>

					<!-- ANNEE DE PRODUCTION -->
					<p>Année : <?= (isset($value->productionYear)) ? $value->productionYear : 'Inconnu' ?></p>
					<!-- Call to action choix du film -->
					<a href="selection-film?id=<?=$value->code.$userPrefs ?>">Choisir ce film</a>
				</div>
			</div>
		<?php endforeach; 
	} // Fin du else ?>
</div>

<?php $this->stop('main_content') ?>
