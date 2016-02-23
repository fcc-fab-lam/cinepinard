<?php $this->layout('layout', ['title' => 'Film Sélectionné']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">

<?php 
	if(isset($err)){
		echo 'erreur';
	}
	else{
?>  
    <div class="row container-film">
        <div class="col-md-1"></div>
        <div class="col-md-10 resultat-film">

        <div class="col-md-3">
        <!-- AFFICHE -->
        <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="240px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
		<!-- TITRE ORIGINAL OU FRANCAIS -->
		<h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>

		<!-- REALISATEUR -->
		<p>Réalisateur : <?= (isset($filmInfos['movie']['castingShort']['directors'])) ? $filmInfos['movie']['castingShort']['directors'] : 'Inconnu' ?></p>

		<!-- ACTEURS -->
		<p>Acteurs : <?= (isset($filmInfos['movie']['castingShort']['actors'])) ? $filmInfos['movie']['castingShort']['actors'] : 'Inconnu' ?></p>

		<!-- ANNEE DE PRODUCTION -->
		<p>Année : <?= (isset($filmInfos['movie']['productionYear'])) ? $filmInfos['movie']['productionYear'] : 'Inconnu' ?></p>
        </div>
<?php
	}
?>
    <div class="col-md-9 reco-vin">
	<!-- CONSEIL VIN POUR FILM SELECTIONE -->
	<h1 class="reco-title">Notre conseil pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($propositionVin[0]['name'])) ? $propositionVin[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($propositionVin[0]['appellation'])) ? $propositionVin[0]['appellation'] : 'Inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($propositionVin[0]['country'])) ? $propositionVin[0]['country'] : 'Inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($propositionVin[0]['description'])) ? $propositionVin[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($propositionVin[0]['image'])) ? '<img height="300px" src="'.$propositionVin[0]['image'].'" />' : '' ?></p>
    
    <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-md choisir-ce-vin" data-toggle="modal" data-target="#myModal1">Choisir ce vin</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="bg-danger modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php           if(!empty($w_user)) : ?>
                    <h4 class="modal-title text-danger" id="myModalLabel">Êtes vous sûr de vouloir ajouter cette association à la cave ?</h4>
<?php           else : ?>
                    <h4 class="modal-title text-danger text-center" id="myModalLabel">La fonction d'ajout à la cave est réservée aux utilisateurs connectés</h4>
<?php           endif; ?>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- TITRE ORIGINAL OU FRANCAIS -->
                            <h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>
                            <!-- AFFICHE -->
                            <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="300px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- NOM DU VIN -->
                            <h4><?= (!empty($propositionVin[0]['name'])) ? $propositionVin[0]['name'] : 'Nom inconnu' ?></h4>
                            <!-- APPELLATION -->
                            <p>Appellation : <?= (!empty($propositionVin[0]['appellation'])) ? $propositionVin[0]['appellation'] : 'Inconnue' ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
<?php               if(!empty($w_user)) : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $propositionVin[0]['id']]) ?>" class="btn btn-success">Oui</a>
<?php               else : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
<?php               endif; ?>
                </div>
            </div>
        </div>
    </div>
    
	<?php if(!empty($perfectMatch)) : ?>

	<!-- VIN PARFAIT POUR FILM SELECTIONE -->
	<h1>Vin parfait pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($perfectMatch[0]['name'])) ? $perfectMatch[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($perfectMatch[0]['appellation'])) ? $perfectMatch[0]['appellation'] : 'Inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($perfectMatch[0]['country'])) ? $perfectMatch[0]['country'] : 'Inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($perfectMatch[0]['description'])) ? $perfectMatch[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($perfectMatch[0]['image'])) ? '<img height="300px" src="'.$perfectMatch[0]['image'].'" />' : '' ?></p>
    
    <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-md choisir-ce-vin" data-toggle="modal" data-target="#myModal2">Choisir ce vin</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="bg-danger modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php           if(!empty($w_user)) : ?>
                    <h4 class="modal-title text-danger" id="myModalLabel">Êtes vous sûr de vouloir ajouter cette association à la cave ?</h4>
<?php           else : ?>
                    <h4 class="modal-title text-danger text-center" id="myModalLabel">La fonction d'ajout à la cave est réservée aux utilisateurs connectés</h4>
<?php           endif; ?>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- TITRE ORIGINAL OU FRANCAIS -->
                            <h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>
                            <!-- AFFICHE -->
                            <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="300px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- NOM DU VIN -->
                            <h4><?= (!empty($perfectMatch[0]['name'])) ? $perfectMatch[0]['name'] : 'Nom inconnu' ?></h4>
                            <!-- APPELLATION -->
                            <p>Appellation : <?= (!empty($perfectMatch[0]['appellation'])) ? $perfectMatch[0]['appellation'] : 'Inconnue' ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
<?php               if(!empty($w_user)) : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $perfectMatch[0]['id']]) ?>" class="btn btn-success">Oui</a>
<?php               else : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
<?php               endif; ?>
                </div>
            </div>
        </div>
    </div>
   
	<!-- COMMENTAIRE UTILISATEUR -->
	<p><?= (!empty($perfectMatch[0]['comment'])) ? $perfectMatch[0]['comment'] : '' ?></p>

	<?php endif; ?>


	<?php if(!empty($usersProposition)) : ?>

	<!-- PROPOSITION VIN DES UTILISATEURS POUR FILM SELECTIONE -->
	<h1>Nos utilisateurs proposent pour ce film :</h1>

	<!-- NOM DU VIN -->
	<h4><?= (!empty($usersProposition[0]['name'])) ? $usersProposition[0]['name'] : 'Nom inconnu' ?></h4>

	<!-- APPELLATION -->
	<p>Appellation : <?= (!empty($usersProposition[0]['appellation'])) ? $usersProposition[0]['appellation'] : 'Inconnue' ?></p>

	<!-- PROVENANCE -->
	<p>Provenance : <?= (!empty($usersProposition[0]['country'])) ? $usersProposition[0]['country'] : 'Inconnue' ?></p>

	<!-- DESCRIPTION -->
	<p>Description : <?= (!empty($usersProposition[0]['description'])) ? $usersProposition[0]['description'] : 'Pas de description pour cette recommandation' ?></p>

	<!-- IMAGE -->
	<p><?= (!empty($usersProposition[0]['image'])) ? '<img height="300px" src="'.$usersProposition[0]['image'].'" />' : '' ?></p>

    
    <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">Choisir ce vin</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="bg-danger modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php           if(!empty($w_user)) : ?>
                    <h4 class="modal-title text-danger" id="myModalLabel">Êtes vous sûr de vouloir ajouter cette association à la cave ?</h4>
<?php           else : ?>
                    <h4 class="modal-title text-danger text-center" id="myModalLabel">La fonction d'ajout à la cave est réservée aux utilisateurs connectés</h4>
<?php           endif; ?>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- TITRE ORIGINAL OU FRANCAIS -->
                            <h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>
                            <!-- AFFICHE -->
                            <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="300px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <!-- NOM DU VIN -->
                            <h4><?= (!empty($usersProposition[0]['name'])) ? $usersProposition[0]['name'] : 'Nom inconnu' ?></h4>
                            <!-- APPELLATION -->
                            <p>Appellation : <?= (!empty($usersProposition[0]['appellation'])) ? $usersProposition[0]['appellation'] : 'Inconnue' ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
<?php               if(!empty($w_user)) : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    <a href="<?=$this->url('add-to-cave', ['idFilm' => $filmInfos['movie']['code'], 'idVin' => $usersProposition[0]['id']]) ?>" class="btn btn-success">Oui</a>
<?php               else : ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
<?php               endif; ?>
                </div>
            </div>
        </div>
    </div>
  
 		<!-- COMMENTAIRE UTILISATEUR -->
	<p><?= (!empty($usersProposition[0]['comment'])) ? $usersProposition[0]['comment'] : '' ?></p>

	<?php endif; ?>
   <!-- FIN DU COL-MD-9 SECONDAIRE -->
    </div>
    <!-- FIN DU COL-MD-10 PRINCIPAL -->
    </div>

    <div class="col-md-1"></div>
    <!-- FIN DU ROW -->
    </div>
<!-- FIN DU CONTAINER FLUID -->
</div>

<?php $this->stop('main_content') ?>