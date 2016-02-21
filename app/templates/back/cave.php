<?php $this->layout('layout-back', ['title' => 'Cave']) ?>

<?php $this->start('main_content') ?>

<h1>Votre cave</h1>
<div class="container-fluid">
		<div>
			<h3>Vos bouteilles à la cave</h3>
			<?php if(!empty($userCave)) : ?>
                <?php foreach($userCave as $key => $value) : ?>
                        <div class="row">
                            <div class="col-md-4">
                                <h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle']?></h4>
                                <p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="300px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
                            </div>

                            <div class="col-md-4">
                                <h4><?=ucfirst($value['wi.name']) ?></h4>
                                <h5><?=ucfirst($value['wi.appellation']) ?></h5>
                                <a class="btn btn-info" href="<?php echo $this->url('add-comments') ?>?id=<?php echo $value['id'] ?>" role="button">Noter et Commenter l'association</a>

                            </div>

                            <div class="col-md-4">
                                <h4>Commentaire</h4>
                                <quote><?= (isset($value['unc.comment'])) ? ucfirst($value['unc.comment']) : '' ?></quote>
                                <h3>Note de l'association : <?=ucfirst($value['unc.note']) ?></h3>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else : ?>
                <p>La cave est vide !</p>
                <?php endif; ?>
		</div>
</div>

<?php $this->stop('main_content') ?>
