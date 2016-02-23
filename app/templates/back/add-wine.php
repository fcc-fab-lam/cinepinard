<?php $this->layout('layout-back', ['title' => 'Ajouter un vin']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-sm-2"></div>
		<div class="col-md-8 col-sm-8">
		<h1 class="profil-title">Ajouter un vin</h1>
		</div>
		<div class="col-md-2 col-sm-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2 col-sm-2"></div>
		<div class="col-md-8 col-sm-8">
			<div class="profil-utilisateur">
				
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
				<fieldset>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="name">Nom du vin :</label>  
				  <div class="col-md-8 col-lg-8">
				  <input id="name" name="name" placeholder="Domaine de Pecoula" class="form-control input-md" type="text">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="appellation">Appellation :</label>  
				  <div class="col-md-8 col-lg-8">
				  <input id="appellation" name="appellation" placeholder="Montbazillac" class="form-control input-md" type="text">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="country">Pays d'origine :</label>  
				  <div class="col-md-8 col-lg-8">
				  <input id="country" name="country" placeholder="France" class="form-control input-md" type="text">
				  </div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="description">Description :</label>
				  <div class="col-md-8 col-lg-8">                     
				    <textarea class="form-control" id="description" name="description"></textarea>
				  </div>
				</div>

				<!-- File Button --> 
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="photo">Telecharger l'image du vin :</label>
				  <div class="col-md-8 col-lg-8">
				    <input id="photo" name="photo" class="input-file" type="file">
				  </div>
				</div>

				<!-- Select genre du vin -->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="genre_id">Choisissez un genre : </label>
				  <div class="col-md-8 col-lg-8">
				    <select id="genre_id" name="genre_id" class="form-control">
				    	<option value="">Choisir un genre de vin</option>
					<?php foreach ($listeGenreVin as $key => $value) : ?>
						<option value="<?php echo $value['id'] ?>"><?php echo ucfirst($value['name']) ?></option>
					<?php endforeach; ?>
				    </select>
				  </div>
				</div>

				<!-- Select categorie du vin -->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="categorie_id">Choisissez une catégorie: </label>
				  <div class="col-md-8 col-lg-8">
				    <select id="categorie_id" name="categorie_id" class="form-control">
				    	<option value="">Choisir un genre de vin</option>
					<?php foreach ($categories as $key => $value) : ?>
						<option value="<?php echo $value['id'] ?>"><?php echo ucfirst($value['name']) ?></option>
					<?php endforeach; ?>
				    </select>
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 col-lg-4 control-label" for="singlebutton"></label>
				  <div class="col-md-8 col-lg-8">
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
			<div class="col-md-2 col-sm-2"></div>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
