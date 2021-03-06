<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<!-- DEBUT FORMULAIRE D'INSCRIPTION -->
<div class="main-inscription">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<h1 class="col-md-6 profil-title">Inscription</h1>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 profil-utilisateur">
				<form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-sm-3" for="lastname">Nom :</label>
						<div class="col-sm-9">
							<input type="text" id="lastname" name="lastname" value="<?php if(isset($post['lastname'])){echo $post['lastname'];} ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="firstname">Prénom :</label>
						<div class="col-sm-9">
							<input type="text" id="firstname" name="firstname" value="<?php if(isset($post['firstname'])){echo $post['firstname'];} ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="nickname">Pseudo :</label>
						<div class="col-sm-9">
							<input type="text" id="nickname" name="nickname" value="<?php if(isset($post['nickname'])){echo $post['nickname'];} ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="email">Email :</label>
						<div class="col-sm-9">
							<input type="email" id="email" name="email" value="<?php if(isset($post['email'])){echo $post['email'];} ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="password">Mot de passe :</label>
						<div class="col-sm-9">
							<input type="password" id="password" name="password" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="password2">Confirmation :</label>
						<div class="col-sm-9">
							<input type="password" id="password2" name="password2" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3" for="photo">Photo de profil :</label>
						<div class="col-sm-9">
							<input type="file" id="photo" name="photo" />
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Préférences :</label>
						<div class="col-sm-9 preferences-signup">
					<?php foreach($categories as $value):
		            ?>
						<label for="<?=$value['id']; ?>"><input type="checkbox" id="<?=$value['id']; ?>" name="preferences[]" value="<?=$value['id']; ?>" /><span></span><?= ucfirst($value['name']); ?></label>
					<?php endforeach; ?>
						</div>
					</div>
		 			
		 			<div class="checkbox majeur">
						<div class="col-sm-offset-3 col-sm-9"><label class="control-label"><input type="checkbox" id="majeur" name="majeur" /><span></span>Je confirme être majeur</label></div>
					</div>

					<br/>

		 			<div class="checkbox">
			 			<div class="control-label col-sm-3"></div>
						<input class="btn btn-default" type="submit" value="Je m'inscris !" />
					</div>
				</form>
			<?php
				if($showErr){
					echo '<div class="showErr">';
					echo implode('<br/>', $err);
					echo '</div>';
				}
				if($formValid){
					echo 'Inscription réussie';
				}
			?>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
<!-- FIN FORMULAIRE D'INSCRIPTION -->

<?php $this->stop('main_content') ?>
