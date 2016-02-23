<?php $this->layout('layout-back', ['title' => 'Association']) ?>

<?php $this->start('main_content') ?>

<div class="background">
<!-- DEBUT RECHERCHE -->
<div class="recherche">
	<div class="container-fluid">
    <?php foreach($resultats as $value): ?>
        <div class="row resultats">
            <div class="image-res-seach">
            <!-- IMAGE -->
            <p><?= (isset($value->poster->href)) ? '<a href="selection-film?id=<?=$value->code.$userPrefs ?>"><img height="100px" src="'.$value->poster->href.'" /></a>' : '' ?></p>
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
                <a href="#" class="btn btn-default">C'est ce film !</a>
            </div>
        </div>
    <?php endforeach; ?>

    <h1>Association Film & Vin</h1>
    <h2>Rechercher le film : </h2>

		<form class="row">			
			<div class="col-lg-8 col-md-12">
				<input class="col-lg-12" type="text" placeholder="Ex : Deadpool" name="film">
			</div>
			<div class="col-lg-2 col-md-12">
				<input class="col-lg-12" type="submit" value="Chercher" />
			</div>
			<div class="col-lg-2"></div>
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
</div>
<!-- FIN RECHERCHE -->

<?php $this->stop('main_content') ?>
