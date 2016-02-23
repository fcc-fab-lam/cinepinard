<?php $this->layout('layout-back', ['title' => 'Modifications de profil']) ?>

<?php $this->start('main_content') ?>

<!-- DEBUT FORMULAIRE CHANGEMENT DE PROFIL -->
<div class="container-fluid">
	<h1 class="col-md-offset-1 profil-title">Modifier votre profil</h1>
	<div class="row">
	<?php 
		foreach ($userPrefs as $value) {
			$userCat[] = $value['categorie_id'];
		}
	?>
		<div class="col-md-1"></div>
		<form role="form" class="col-md-10 form-horizontal profil-utilisateur" method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-5" for="lastname">Modifier votre nom :</label>
				<div class="col-sm-7">
					<input type="text" id="lastname" name="lastname" value="<?php echo $userInfos['lastname']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5" for="firstname">Modifier votre prénom :</label>
				<div class="col-sm-7">
					<input type="text" id="firstname" name="firstname" value="<?php echo $userInfos['firstname']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5" for="nickname">Modifier votre pseudo :</label>
				<div class="col-sm-7">
					<input type="text" id="nickname" name="nickname" value="<?php echo $userInfos['nickname']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" for="email">Modifier votre email :</label>
				<div class="col-sm-7">
					<input type="email" id="email" name="email" value="<?php echo $userInfos['email']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5" for="photo">Modifier votre photo de profil :</label>
				<div class="col-sm-7">
					<img src="<?php echo $userInfos['photo'];?>" alt="avatar">
					<input type="file" id="photo" name="photo" value="<?php echo $userInfos['photo']; ?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-5">Modifier vos préférences :</label>
				<div class="col-sm-7">
					<?php foreach($categories as $value):?>
						<label><input type="checkbox" name="preferences[]" value="<?php echo $value['id'];?>" <?php if(in_array($value['id'], $userCat)){ echo 'checked="checked"';}?>/><span></span><?php echo $value['name'];?></label>
					<?php endforeach; ?>
				</div>
			</div>

 			<div class="checkbox">
	 			<div class="control-label col-sm-5"></div>
				<input class="btn btn-default" type="submit" value="Valider" />
			</div>
		</form>
		<div class="col-md-1"></div>
		<?php
			if(isset($showErr) && $showErr){
				echo '<div class="erreurs">';
				echo implode('<br/>', $err);
				echo '</div>';
			}
			if(isset($formValid) && $formValid){
				echo 'Modifications enregistrées';
			}
		?>
	</div>
</div>


<!-- FIN FORMULAIRE -->

<?php $this->stop('main_content') ?>
