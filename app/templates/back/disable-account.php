<?php $this->layout('layout', ['title' => 'Desactiver un compte']) ?>

<?php $this->start('main_content') ?>


<p>Voulez-vous vraiment effacer votre compte ?</p>

<form role="form" class="form-horizontal" method="post" action="" enctype="multipart/form-data">	
 	<input type="radio" name="disable" value="oui" id="oui" />
 	<label for="oui">Oui</label><br /> 

 	<input type="radio" name="disable" value="non" id="non" />
 	<label for="non">non</label><br />

 	<input class="btn btn-default" type="submit" value="Validation" />
 	
</form>

 	<?php
 	// envoyer les erreurs si il y en a
		if($showErr){
			echo '<div class="erreurs">';
			echo implode('<br/>', $err);
			echo '</div>';
		}
	?>

<?php $this->stop('main_content') ?>
