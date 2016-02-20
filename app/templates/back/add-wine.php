<?php $this->layout('layout-back', ['title' => 'Ajouter un vin']) ?>

<?php $this->start('main_content') ?>

<form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-3" for="name">Inscrire le nom complet du vin :</label>
				<div class="col-sm-7">
					<input type="text" id="name" name="name" value="" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="appellation">Inscrire le nom de l'appellation:</label>
				<div class="col-sm-7">
					<input type="text" id="appelation" name="appellation" value="" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="pays"> Inscrivez le pays de votre vin :</label>
				<div class="col-sm-7">
					<input type="text" id="pays" name="pays" value="" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="photo">Telecharger l'image du vin :</label>
				<div class="col-sm-7">
					<img src="" alt="nom du vin">
					<input type="file" id="photo" name="photo" value="" />
				</div>
			</div>

			<select name="wines_genre">
				<option value="">Choisissez un genre : </option>
			<?php foreach ($listGenreVin as $key => $value) : ?>
				<option value="<?php echo $value['id'] ?>" /><?php echo ucfirst($value['name']) ?></option>
			<?php endforeach; ?>

<?php $this->stop('main_content') ?>
