<?php $this->layout('layout-back', ['title' => 'Association']) ?>

<?php $this->start('main_content') ?>

<div class="background"></div>
<!-- DEBUT RECHERCHE -->
<div class="recherche">
	<div class="container">

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
