<?php $this->layout('layout', ['title' => 'Résultats de recherche']) ?>

<?php $this->start('main_content') ?>
<div>
	<?php
	foreach($resultats as $value): ?>

		<!-- TITRE ORIGINAL OU FRANCAIS -->
		<h4><?= (isset($value->title)) ? $value->title : $value->originalTitle ?></h4>

		<!-- REALISATEUR -->
		<p>Réalisateur : <?= (isset($value->castingShort->directors)) ? $value->castingShort->directors : 'Inconnu' ?></p>

		<!-- ACTEURS -->
		<p>Acteurs : <?= (isset($value->castingShort->actors)) ? $value->castingShort->actors : 'Inconnu' ?></p>

		<!-- ANNEE DE PRODUCTION -->
		<p>Année : <?= (isset($value->productionYear)) ? $value->productionYear : 'Inconnu' ?></p>

		<!-- IMAGE -->
		<p><?= (isset($value->poster->href)) ? '<img height="300px" src="'.$value->poster->href.'" />' : '' ?></p>

		<!-- Call to action choix du film -->
		<a href="selection-film?id=<?=$value->code ?>">Choisir ce film</a>

	<?php endforeach; ?>
</div>

<?php $this->stop('main_content') ?>
