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
		<form class="row" method="post">
		    <div class="col-lg-5 col-md-12">
                <h2 class="col-md-12">Rechercher le film : </h2>			
                <div class="col-lg-10 col-md-12">
                    <input class="col-lg-12" type="text" placeholder="Ex : Deadpool" name="film">
                    <input type="hidden" name="idFilm">
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="col-lg-5 col-md-12">
                <h2 class="col-md-12">Rechercher le vin : </h2>			
                <div class="col-lg-10 col-md-12">
                    <input class="col-lg-12" type="text" placeholder="Ex : Saint Julien" name="film">
                    <input type="hidden" name="idVin">
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="col-lg-2 col-md-12">
                <h2 class="col-md-12">&nbsp;</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Large modal</button>
            </div>
		</form>
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4">.col-md-4</div>
                  <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
                  <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
                </div>
                <div class="row">
                  <div class="col-sm-9">
                    Level 1: .col-sm-9
                    <div class="row">
                      <div class="col-xs-8 col-sm-6">
                        Level 2: .col-xs-8 .col-sm-6
                      </div>
                      <div class="col-xs-4 col-sm-6">
                        Level 2: .col-xs-4 .col-sm-6
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
