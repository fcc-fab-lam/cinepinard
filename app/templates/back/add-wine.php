<?php $this->layout('layout-back', ['title' => 'Ajouter un vin']) ?>

<?php $this->start('main_content') ?>
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			<fieldset>

			<!-- Form Name -->
			<legend>Form Name</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="name">Inscrire le nom complet :</label>  
			  <div class="col-md-6 col-lg-6">
			  <input id="name" name="name" placeholder="placeholder" class="form-control input-md" type="text">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="appellation">Inscrire l'appellation:</label>  
			  <div class="col-md-6 col-lg-6">
			  <input id="appellation" name="appellation" placeholder="placeholder" class="form-control input-md" type="text">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="country">Inscrivez le pays :</label>  
			  <div class="col-md-6 col-lg-6">
			  <input id="country" name="country" placeholder="placeholder" class="form-control input-md" type="text">
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="description">Saisir votre description :</label>
			  <div class="col-md-6 col-lg-6">                     
			    <textarea class="form-control" id="description" name="description"></textarea>
			  </div>
			</div>

			<!-- File Button --> 
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="photo">Telecharger l'image du vin :</label>
			  <div class="col-md-6 col-lg-6">
			    <input id="photo" name="photo" class="input-file" type="file">
			  </div>
			</div>

			<!-- Select genre du vin -->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="genre_id">Choisissez un genre : </label>
			  <div class="col-md-6 col-lg-6">
			    <select id="genre_id" name="genre_id" class="form-control">
			    	<option value="">Choisir un genre de vin</option>
				<?php foreach ($listeGenreVin as $key => $value) : ?>
					<option value="<?php echo $value['id'] ?>" /><?php echo ucfirst($value['name']) ?></option>
				<?php endforeach; ?>
			    </select>
			  </div>
			</div>

			<!-- Select categorie du vin -->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="categorie_id">Choisissez une catégorie: </label>
			  <div class="col-md-6 col-lg-6">
			    <select id="categorie_id" name="categorie_id" class="form-control">
			    	<option value="">Choisir un genre de vin</option>
				<?php foreach ($categories as $key => $value) : ?>
					<option value="<?php echo $value['id'] ?>" /><?php echo ucfirst($value['name']) ?></option>
				<?php endforeach; ?>
			    </select>
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-6 col-lg-6 control-label" for="singlebutton"></label>
			  <div class="col-md-6 col-lg-6">
			    <button id="singlebutton" name="singlebutton" class="btn btn-primary" type="submit">Valider</button>
			  </div>
			</div>

			</fieldset>
			</form>
			<?php
			
			if($showErr){
				echo '<div class="erreurs">';
				echo implode('<br/>', $err);
				echo '</div>';
			}
			if($formValid) {
				echo " Envoyé avec succés";
				}

			?>



<?php $this->stop('main_content') ?>
