<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<!-- DEBUT FORMULAIRE D'INSCRIPTION -->
<div class="container-fluid">
	<div class="row">
		<form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="lastname">Nom :</label>
				<div class="col-sm-7">
					<input type="text" id="lastname" name="lastname" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="firstname">Prénom :</label>
				<div class="col-sm-7">
					<input type="text" id="firstname" name="firstname" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="nickname">Pseudo :</label>
				<div class="col-sm-7">
					<input type="text" id="nickname" name="nickname" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="email">Email :</label>
				<div class="col-sm-7">
					<input type="email" id="email" name="email" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="password">Mot de passe :</label>
				<div class="col-sm-7">
					<input type="password" id="password" name="password" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="password2">Confirmation de mot de passe :</label>
				<div class="col-sm-7">
					<input type="password" id="password2" name="password2" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="photo">Photo de profil :</label>
				<div class="col-sm-7">
					<input type="file" id="photo" name="photo" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3">Préférences :</label>
				<div class="col-sm-9">
					<label><input type="checkbox" id="preferences1" name="preferences1" />Vin blanc</label>
					<label><input type="checkbox" id="preferences2" name="preferences2" />Vin rouge</label>
					<label><input type="checkbox" id="preferences3" name="preferences3" />Vin rosé</label>
					<label><input type="checkbox" id="preferences4" name="preferences4" />Bière</label>
					<label><input type="checkbox" id="preferences5" name="preferences5" />Autre</label>
				</div>
			</div>
 			
 			<div class="checkbox">
 				<div class="control-label col-sm-2"></div>
				<label class="control-label col-sm-3"><input type="checkbox" id="majeur" name="majeur" />Je confirme être majeur</label>
			</div>

			<br/>

 			<div class="checkbox">
	 			<div class="control-label col-sm-3"></div>
				<input class="btn btn-default" type="submit" value="Je m'inscris !" />
			</div>
		</form>
		<?php
			if($showErr){
				echo '<div class="erreurs">';
				echo implode('<br/>', $err);
				echo '</div>';
			}
		?>
	</div>
</div>

<!-- FIN FORMULAIRE D'INSCRIPTION -->

<?php $this->stop('main_content') ?>
