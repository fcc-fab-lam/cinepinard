<?php 
$vin1 = '';
$vin2 = '';
$vin3 = '';

if(isset($propositionVin[0]['id'])){ $vin1 = $propositionVin[0]['id'];};
if(isset($perfectMatch[0]['id'])){ $vin2 = $perfectMatch[0]['id'];};
if(isset($usersProposition[0]['id'])){ $vin3 = $usersProposition[0]['id'];};
?>
<?php $this->layout('layout', ['title' => 'Film Sélectionné', 'vin1' => $vin1, 'vin2' => $vin2, 'vin3' => $vin3]) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">

<?php 
	if(isset($err)){
		echo 'erreur';
	}
	else{
?>  
    <div class="row">
        <div class="col-md-1"></div>
        <h1 class="col-md-10 profil-title">Notre conseil pour ce film :</h1>
        <div class="col-md-1"></div>
    </div>

    <div class="row container-film">
        <div class="col-md-1"></div>
        <div class="col-md-10">
<?php
	}
?>
        	<!-- CONSEIL VIN POUR FILM SELECTIONE -->
                <article class="row">
                    <!-- RESUME DU FILM -->
                    <div class="col-md-6 table2" id="panneaufilm">
                        <!-- AFFICHE -->
                        <div class="row">
                            <div class="col-md-4">
                            <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="240px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
                            </div>
                            <div class="col-md-8 descriptif-film">
                                <!-- TITRE ORIGINAL OU FRANCAIS -->
                                <h4 class="text-uppercase"><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle'] ?></h4>

                                <!-- REALISATEUR -->
                                <p><span class="bold">Réalisateur : </span><?= (isset($filmInfos['movie']['castingShort']['directors'])) ? $filmInfos['movie']['castingShort']['directors'] : 'Inconnu' ?></p>

                                <!-- ACTEURS -->
                                <p><span class="bold">Acteurs : </span><?= (isset($filmInfos['movie']['castingShort']['actors'])) ? $filmInfos['movie']['castingShort']['actors'] : 'Inconnu' ?></p>

                                <!-- ANNEE DE PRODUCTION -->
                                <p><span class="bold">Année : </span><?= (isset($filmInfos['movie']['productionYear'])) ? $filmInfos['movie']['productionYear'] : 'Inconnu' ?></p>

                                <p><span class="bold">Résumé : </span><?= (isset($filmInfos['movie']['synopsisShort'])) ? $filmInfos['movie']['synopsisShort'] : 'Inconnu' ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="vin<?=$propositionVin[0]['categorie_id']?> col-md-6 table2">
                        <!-- IMAGE -->
                        <p><img height="300px" src="assets/img/vin-<?=$propositionVin[0]['categorie_id']?>.png" /></p>

                    	<!-- NOM DU VIN -->
                    	<h4 class="titre-vin"><?= (!empty($propositionVin[0]['name'])) ? $propositionVin[0]['name'] : 'Nom inconnu' ?></h4>

                    	<!-- APPELLATION -->
                    	<p><span class="bold">Appellation : </span><?= (!empty($propositionVin[0]['appellation'])) ? $propositionVin[0]['appellation'] : 'Inconnue' ?></p>

                    	<!-- PROVENANCE -->
                    	<p><span class="bold">Provenance : </span><?= (!empty($propositionVin[0]['country'])) ? $propositionVin[0]['country'] : 'Inconnue' ?></p>

                    	<!-- DESCRIPTION -->
                    	<p><span class="bold">Description : </span><?= (!empty($propositionVin[0]['description'])) ? $propositionVin[0]['description'] : 'Pas de description pour cette recommandation' ?></p>
                        
                        <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-md choisir-ce-vin" data-toggle="modal" data-target="#myModal1">Choisir ce vin</button>
                    </div>

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
                    </div><!-- FIN MODAL -->
                </article>
            </div><!-- FIN COL MD 10 -->

            <!-- PERFECT MATCH -->
                    <div class="vin<?=$perfectMatch[0]['categorie_id']?> col-md-6 table2">
                        <!-- IMAGE -->
                        <p><img height="300px" src="assets/img/vin-<?=$perfectMatch[0]['categorie_id']?>.png" /></p>

                        <!-- NOM DU VIN -->
                        <h4 class="titre-vin"><?= (!empty($perfectMatch[0]['name'])) ? $perfectMatch[0]['name'] : 'Nom inconnu' ?></h4>

                        <!-- APPELLATION -->
                        <p><span class="bold">Appellation : </span><?= (!empty($perfectMatch[0]['appellation'])) ? $perfectMatch[0]['appellation'] : 'Inconnue' ?></p>

                        <!-- PROVENANCE -->
                        <p><span class="bold">Provenance : </span><?= (!empty($perfectMatch[0]['country'])) ? $perfectMatch[0]['country'] : 'Inconnue' ?></p>

                        <!-- DESCRIPTION -->
                        <p><span class="bold">Description : </span><?= (!empty($perfectMatch[0]['description'])) ? $perfectMatch[0]['description'] : 'Pas de description pour cette recommandation' ?></p>
                        
                        <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-md choisir-ce-vin" data-toggle="modal" data-target="#myModal1">Choisir ce vin</button>
                    </div>

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
                    </div><!-- FIN MODAL -->
                </article>
            </div><!-- FIN COL MD 10 -->

            <!-- FIN PERFECT MATCH -->
    <div class="col-md-1"></div>

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