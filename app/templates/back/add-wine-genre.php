<?php $this->layout('layout', ['title' => 'Genre de vin']) ?>

<?php $this->start('main_content') ?>

	<h1>Ajouter un genre de vin</h1>

	<!-- formulaire -  validation -->
	<p> Souhaitez-vous vraiment ajouter un genre de vin ?</p>

	<a id="showForm" class="btn btn-default" href="">oui</a>

	<!-- js on click show formulaire -->
	<a class="btn btn-default" href="<?= $this->url("user-profil")?>">non </a>


	<!-- mettre le id = 'name'; en CSS Display-none-->

	<form id="oui" role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
 		<p> Ajouter un genre de vin </p>

 		<label for="name">Genre de Vin</label><br />
 		<input type="text" name="name" placeholder="genre" id="name" />

		<input class="btn btn-default" type="submit" value="Validation" />

		<?php
	 		// envoyer les erreurs si il y en a
			if($showErr){
				echo '<div class="erreurs">';
				echo implode('<br/>', $err);
				echo '</div>';
			}
			if($formValid) {
				echo " Envoyé avec succés";
				}
		?>
	</form>
		<!-- il faut que le nouveau genre apparraise partout où il est appellé-->


</form>
<?php $this->stop('main_content') ?>

<!-- lance le script de cette page uniquement -->
<?php $this->start('scripts') ?>
		<script>
			$(function() {
				$('#showForm').click(function(ev) {
					ev.preventDefault();
					$('form#oui').toggle();
				})
			})
		</script>
<?php $this->stop('scripts') ?>