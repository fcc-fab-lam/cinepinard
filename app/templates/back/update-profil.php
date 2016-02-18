<?php $this->layout('layout', ['title' => 'Modifications de profil']) ?>

<?php $this->start('main_content') ?>

<!-- DEBUT FORMULAIRE CHANGEMENT DE PROFIL -->
<div class="container-fluid">
	<div class="row">
	<?php var_dump($userPrefs[0]);?>
		<form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-3" for="lastname">Nom :</label>
				<div class="col-sm-7">
					<input type="text" id="lastname" name="lastname" value="<?php echo $userInfos['lastname']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="firstname">Prénom :</label>
				<div class="col-sm-7">
					<input type="text" id="firstname" name="firstname" value="<?php echo $userInfos['firstname']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="nickname">Pseudo :</label>
				<div class="col-sm-7">
					<input type="text" id="nickname" name="nickname" value="<?php echo $userInfos['nickname']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="email">Email :</label>
				<div class="col-sm-7">
					<input type="email" id="email" name="email" value="<?php echo $userInfos['email']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="photo">Photo de profil :</label>
				<div class="col-sm-7">
					<input type="file" id="photo" name="photo" value="<?php echo $userInfos['photo']; ?>" />
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
			if($formValid){
				echo 'Inscription réussie';
			}
		?>
	</div>
</div>


<!-- FIN FORMULAIRE -->

<?php $this->stop('main_content') ?>
