<?php $this->layout('layout', ['title' => 'Cave']) ?>

<?php $this->start('main_content') ?>

<h1>Votre cave</h1>
<div class="container-fluid">
		<div>
			<h3>Vos bouteilles à la cave</h3>
			<?php 
				echo '<pre>';
				//var_dump($userCave);
				echo '</pre>';

				foreach($userCave as $key => $value) : ?>
					<div class="row">
						<div class="col-md-4">
							<h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle']?></h4>
							<p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="300px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
						</div>

						<div class="col-md-4">
							<h4><?=ucfirst($value['name']) ?></h4>
							<h5><?=ucfirst($value['appellation']) ?></h5>
							<a class="btn btn-info" href="../public/ajouter-commentaire" role="button">Noter et Commenter l'association</a>

						</div>

						<div class="col-md-4">
							<h4>Commentaire</h4>
							<quote><?= (isset($value['comment'])) ? ucfirst($value['comment']) : '' ?></quote>
							<h3>Note de l'association : <?=ucfirst($value['note']) ?></h3>
						</div>
					</div>
					<hr>
				<?php endforeach; ?>
		</div>
</div>




<?php $this->stop('main_content') ?>
