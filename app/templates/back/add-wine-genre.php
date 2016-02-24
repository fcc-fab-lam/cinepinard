<?php $this->layout('layout-back', ['title' => 'Genre de vin']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">

	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8"><h1 class="profil-title">Ajouter un genre de vin</h1></div>
		<div class="col-sm-2"></div>
	</div>

	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 profil-utilisateur">
			<!-- formulaire -  validation -->

			<!-- NON NECESSAIRE
			<div class="confirm-add">
				<p> Souhaitez-vous vraiment ajouter un genre de vin ?</p>
				<a id="showForm" class="btn btn-default" href="">oui</a>
				<a class="btn btn-default" href="<?//= $this->url("user-profil")?>">non </a>
			</div>
			-->

			<!-- mettre le id = 'name'; en CSS Display-none-->

			<form id="oui" role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">

		 		<label for="name">Genre de vin</label><br />
		 		 <!-- ne vide pas le champs du formulaire -->
		 		<?php $name = '';if(!empty($post['name'])){$name = $post['name'];} ?>
		 		<input class="input-genre-vin" type="text" name="name" placeholder="" id="name" value="<?=$name ?>" /><br /><br />

				<!-- Select categorie du vin -->
                <label for="id_categorie">Catégorie de vins associée : </label><br />
                <select id="id_categorie" name="id_categorie">
                    <option value="">Choisir une catégorie de vin</option>
                <?php foreach ($categories as $key => $value) :
                    $selected = '';if(!empty($post['id_categorie']) && $post['id_categorie'] == $value['id']){$selected = ' selected="selected"';}
                    ?>
                    <option value="<?php echo $value['id'] ?>"<?=$selected ?>><?php echo ucfirst($value['name']) ?></option>
                <?php endforeach; ?>
                </select>

				<p class="confirm-add"><span class="bold">Genre(s) de film associé(s)</span></p>

				<?php			
					 
					foreach ($listGenreFilm as $key => $value){
                        $check = '';if(!empty($movies_genre) && in_array($value['id'], $movies_genre)){$check = ' checked="checked"';}
						echo '<div class="genres-film-list"><label><input type="checkbox" value="'.$value['id'].'" name="movies_genre[]"'.$check.' /><span></span>'.$value['name'].'</label></div>'  ;
						}

			 		// envoyer les erreurs si il y en a
					if($showErr){
						echo '<div class="bg-danger">';
						echo implode('<br/>', $err);
						echo '</div>';
					}
					if($formValid) {
						echo '<p class="bg-success"> Envoyé avec succés</p>';
						}
				?>

				<br/><br/>

				<input class="btn btn-default" type="submit" value="Validation" />
			</form>

		</div>
		<div class="col-sm-2"></div>

	</div>
</div>
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