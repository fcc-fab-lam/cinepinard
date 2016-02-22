<?php $this->layout('layout-back', ['title' => 'Commentaires']) ?>

<?php $this->start('main_content') ?>
			
<div class="container-fluid">

	<div class="col-md-8">
		<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Votre association</h3>
			  </div>

		    <h4><?=$filmInfos['movie']['title'] ?></h4>
            <p><img height="100px" src="<?=$filmInfos['movie']['poster']['href'] ?>"></p>

            <h4><?=$vinInfos['name'] ?></h4>
            <h5><?=$vinInfos['appellation'] ?></h5>
		</div>

		<form class="" method="post">
			<div class="form-group">
				<label for="comment">Votre commentaire</label>
				<textarea id="comment" name="comment" class="form-control"><?php echo $recupComment['comment']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="note">Note</label>
				<input type="number" class="form-control" name ="note" id="note" step="1" value="<?php echo $recupComment['note']; ?>" min="0" max="10"/>
				<input type="hidden" name="idAsso" value="<?php echo $recupComment['id']; ?>"/>
			</div>
			<input type="submit" value="valider" class="btn btn-default"/>
		</form>
	</div>
	<div class="col-md-4">
		<

	</div>
</div>



<?php $this->stop('main_content') ?>
