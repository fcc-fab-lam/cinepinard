<?php $this->layout('layout', ['title' => 'Film Sélectionné']) ?>

<?php $this->start('main_content') ?>

<?php 
	if(isset($err)){
		echo 'erreur';
	}
	else{
?>
		<!-- TITRE ORIGINAL OU FRANCAIS -->
		<h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>

		<!-- REALISATEUR -->
		<p>Réalisateur : <?= (isset($filmInfos['movie']['castingShort']['directors'])) ? $filmInfos['movie']['castingShort']['directors'] : 'Inconnu' ?></p>

		<!-- ACTEURS -->
		<p>Acteurs : <?= (isset($filmInfos['movie']['castingShort']['actors'])) ? $filmInfos['movie']['castingShort']['actors'] : 'Inconnu' ?></p>

		<!-- ANNEE DE PRODUCTION -->
		<p>Année : <?= (isset($filmInfos['movie']['productionYear'])) ? $filmInfos['movie']['productionYear'] : 'Inconnu' ?></p>

		<!-- IMAGE -->
		<p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="300px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
<?php
	}
?>
	<!-- CONSEIL VIN POUR FILM SELECTIONE -->
	<h1>Notre conseil pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($propositionVin[0]['name'])) ? $propositionVin[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($propositionVin[0]['appellation'])) ? $propositionVin[0]['appellation'] : 'Appellation inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($propositionVin[0]['country'])) ? $propositionVin[0]['country'] : 'Provenance inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($propositionVin[0]['description'])) ? $propositionVin[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($propositionVin[0]['image'])) ? '<img height="300px" src="'.$propositionVin[0]['image'].'" />' : '' ?></p>

	<!-- MODERATION -->
	<p>Moderation : <?= (!empty($propositionVin[0]['modération'])) ? $propositionVin[0]['modération'] : 'Pas de modération pour cette recommandation' ?></p>

<?php $this->stop('main_content') ?>