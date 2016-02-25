<?php $this->layout('layout', ['title' => 'Redéfinir un mot de passe']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2"></div>
		<h1 class="col-sm-8 profil-title">Définir un nouveau mot de passe</h1>
		<div class="col-sm-2"></div>
	</div>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 profil-utilisateur">

			<div class="col-sm-2"></div>
			<div class="col-sm-8">

				<?php

				if($tokenValid){

				?>

				<form method="post">

				  	<div class="form-group">
						<label class="col-sm-7 control-label" for="password">Votre nouveau mot de passe :</label>  
						<div class="col-sm-5">
						<input id="password" name="password" class="form-control input-md" type="password" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-7 control-label" for="password">Confirmez votre nouveau mot de passe :</label>  
						<div class="col-sm-5">
						<input id="password2" name="password2" class="form-control input-md" type="password" />
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-7"></div>
					  	<div class="col-sm-5"><input class="btn btn-primary" type="submit" value="Envoyer" /></div>
					</div>

				</form>

				<?php

				}
				if($showErr){
					echo '<div class="showErr">';
					echo implode('<br/>', $err);
					echo '<div>';
				}
				if($formValid){
					echo '<div style="color:green; margin-left:15px;">';
					echo 'Votre mot de passe a bien été mis à jour';
					echo '</div>';
				}

				?>

			</div>
			<div class="col-sm-2"></div>
		</div>
		<div class="col-sm-2"></div>
	</div>

</div>


<?php $this->stop('main_content') ?>