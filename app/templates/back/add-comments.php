<?php $this->layout('layout-back', ['title' => 'Commentaires']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
	<div class="row">
		<form method="post">
			<label for="email">Votre commentaire</label>
			<br>
			<textarea></textarea>

			<label for="note">Note</label>
			<input type="number" step="1" value="0" min="0" max="10">

			<input type="submit" value="valider" />
		</form>		
	</div>
</div>
aéaé


<?php $this->stop('main_content') ?>
