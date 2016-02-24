<?php $this->layout('layout-back', ['title' => 'Commentaires non modérées']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
		<div>
            <?php var_dump($post); ?>
			<?php if(!empty($listNotModeratedComments)) : ?>
			<h3>Commentaires en attente de validation</h3>
                <?php foreach($listNotModeratedComments as $value) : ?>
                        <div class="row" id="asso-<?=$value['id'] ?>">
                            <div class="col-md-4">
                                <h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle']?></h4>
                                <p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="300px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
                            </div>

                            <div class="col-md-4">
                                <h4><?=ucfirst($value['name']) ?></h4>
                                <h5><?=ucfirst($value['appellation']) ?></h5>
                                
                                <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal<?=$value['id'] ?>">Modérer cette évalution</button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="" method="post">
                                            <div class="bg-danger modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-danger text-center" id="myModalLabel">Modérer le commentaire</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                        <!-- TITRE ORIGINAL OU FRANCAIS -->
                                                        <h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle'] ?></h4>
                                                        <!-- AFFICHE -->
                                                        <p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="100px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <!-- NOM DU VIN -->
                                                        <h4><?= (!empty($value['name'])) ? $value['name'] : 'Nom inconnu' ?></h4>
                                                        <!-- APPELLATION -->
                                                        <p>Appellation : <?= (!empty($value['appellation'])) ? $value['appellation'] : 'Inconnue' ?></p>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1"> </div>
                                                    <div class="col-md-10">
                                                        <div class="thumbnail">
                                                            
                                                            <div class="caption">
                                                                <img src="<?php echo $value['photo']; ?>" height="100px" class="img-circle" alt="photo <?php echo $value['nickname']; ?>">
                                                                <h3><?php echo $value['nickname']; ?> (<?php echo $value['email']; ?>)</h3>
                                                                <p><?php echo $value['comment']; ?></p>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $value['note']; ?>" aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $value['note']*10; ?>%;">
                                                                    <?php echo $value['note']; ?>/10
                                                                    </div>
                                                                </div>                                                      
                                                            </div>                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"> </div>


                                                <!--
                                                    <div class="col-md-1"> </div>
                                                    <div class="form-group col-md-10">
                                                        <label for="comment" class="control-label">Votre commentaire</label>
                                                        <textarea disabled="disabled" id="comment" name="comment" class="input-md form-control" rows="8"><?php echo $value['comment']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-1"> </div>
                                                    <div class="col-md-4"> </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="note">Note</label>
                                                        <input type="number" class="form-control" name ="note" id="note" step="1" value="<?php echo $value['note']; ?>" min="0" max="10"/>
                                                        <input type="hidden" name="idAsso" value="<?php echo $value['id']; ?>"/>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" class="form-inline">
                                                    <input type="hidden" name="idAsso" value="<?php echo $value['id'];?>">
                                                    <input type="submit" class="btn btn-danger"  value="Supprimer" name="3">
                                                    <input type="submit" class="btn btn-warning"  value="Refuser" name="2">
                                                    <input type="submit" class="btn btn-success"  value="Valider" name="1">
                                                </form>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h4>Commentaire</h4>
                                <quote><?=ucfirst($value['comment']) ?></quote>
                                <h3>Note de l'association : <?=ucfirst($value['note']) ?></h3>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach; ?>

                    <?php if($nbTotalPages > 1): ?>
                        <div class="center-block text-center">
                            <ul class="pagination">
                            <?php for($i=1; $i<=$nbTotalPages; $i++):?>
                                <li<?=($i == $currentPage) ? ' class="active"' : '';?>>
                                    <a href="<?=$this->url('list-not-moderated-comments', ['showPage'=> $i]);?>"><?=$i;?></a>
                                </li>
                            <?php endfor; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                <?php else : ?>
                <h3>Aucun  !</h3>
                <?php endif; ?>
		</div>
</div>


<?php $this->stop('main_content') ?>