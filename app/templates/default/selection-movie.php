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
    
    <!-- LIEN POUR CHOISIR CETTE ASSOCIATION -->
    <p><a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $propositionVin[0]['id']]) ?>">Choisir ce vin avec ce film</a></p>
    
	<?php if(!empty($perfectMatch)) : ?>

	<!-- VIN PARFAIT POUR FILM SELECTIONE -->
	<h1>Vin parfait pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($perfectMatch[0]['name'])) ? $perfectMatch[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($perfectMatch[0]['appellation'])) ? $perfectMatch[0]['appellation'] : 'Appellation inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($perfectMatch[0]['country'])) ? $perfectMatch[0]['country'] : 'Provenance inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($perfectMatch[0]['description'])) ? $perfectMatch[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($perfectMatch[0]['image'])) ? '<img height="300px" src="'.$perfectMatch[0]['image'].'" />' : '' ?></p>

    <!-- LIEN POUR CHOISIR CETTE ASSOCIATION -->
    <p><a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $perfectMatch[0]['id']]) ?>">Choisir ce vin avec ce film</a></p>
 
	<!-- COMMENTAIRE UTILISATEUR -->
	<p><?= (!empty($perfectMatch[0]['comment'])) ? $perfectMatch[0]['comment'] : '' ?></p>

	<?php endif; ?>


	<?php if(!empty($usersProposition)) : ?>

	<!-- PROPOSITION VIN DES UTILISATEURS POUR FILM SELECTIONE -->
	<h1>Nos utilisateurs proposent pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($usersProposition[0]['name'])) ? $usersProposition[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($usersProposition[0]['appellation'])) ? $usersProposition[0]['appellation'] : 'Appellation inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($usersProposition[0]['country'])) ? $usersProposition[0]['country'] : 'Provenance inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($usersProposition[0]['description'])) ? $usersProposition[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($usersProposition[0]['image'])) ? '<img height="300px" src="'.$usersProposition[0]['image'].'" />' : '' ?></p>


    <!-- LIEN POUR CHOISIR CETTE ASSOCIATION -->
    <p><a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $usersProposition[0]['id']]) ?>">Choisir ce vin avec ce film</a></p>
 
	<!-- COMMENTAIRE UTILISATEUR -->
	<p><?= (!empty($usersProposition[0]['comment'])) ? $usersProposition[0]['comment'] : '' ?></p>

	<?php endif; ?>

<?php $this->stop('main_content') ?>