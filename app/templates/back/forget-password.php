<?php $this->layout('layout', ['title' => 'Mot de passe oublié']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2"></div>
		<h1 class="col-sm-8 profil-title">Récupérer votre mot de passe</h1>
		<div class="col-sm-2"></div>
	</div>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 profil-utilisateur">
			<p class="recup-mdp">Renseignez l'adresse email utilisée lors de votre inscription. Nous vous enverrons un email pour mettre à jour votre mot de passe.</p>
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form method="post">

				  		<div class="col-sm-10"><input id="email" name="email" placeholder="" class="form-control input-md" type="email" /></div>
					  	<div class="col-sm-2"><input class="btn btn-primary" type="submit" value="Envoyer" /></div>

				</form>

				<?php
					if($showErr){
						echo '<div class="showErr">';
						echo implode('<br/>', $err);
						echo '<div>';

					}

					if($formValid){
						echo '<div class="formValid">';
						echo 'Un mail vient de vous être envoyé !';
						echo '<div>';
					}
				?>

			</div>
			<div class="col-sm-2"></div>
		</div>
		<div class="col-sm-2"></div>
	</div>

</div>


<?php $this->stop('main_content') ?>