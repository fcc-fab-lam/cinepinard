<?php $this->layout('layout-back', ['title' => 'Cave']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid">
		<div>
            <div class="row">
                <div class="col-md-1"></div>
                <h3 class="col-md-10 profil-title">Vos bouteilles à la cave</h3>
                <div class="col-md-1"></div>
            </div>
			<?php if(!empty($userCave)) : ?>
                <?php foreach($userCave as $value) : ?>
                        <div class="row" id="asso-<?=$value['id'] ?>">
                            <div class="col-md-1"></div>
                            <div class="col-md-10 bouteille-cave">
                                <div class="col-md-4">
                                    <h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle']?></h4>
                                    <p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="220px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
                                </div>

                                <div class="col-md-4">
                                    <h4><?=ucfirst($value['name']) ?></h4>
                                    <h5><?=ucfirst($value['appellation']) ?></h5>
                                    
                                    <!-- MODAL POUR CHOISIR CETTE ASSOCIATION -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?=$value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="" method="post">
                                                <div class="bg-danger modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-danger text-center" id="myModalLabel">Ajouter votre commentaire et votre note</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <!-- TITRE ORIGINAL OU FRANCAIS -->
                                                            <h4><?= (isset($value['infosFilm']['movie']['title'])) ? $value['infosFilm']['movie']['title'] : $value['infosFilm']['movie']['originalTitle'] ?></h4>
                                                            <!-- AFFICHE -->
                                                            <p><?= (isset($value['infosFilm']['movie']['poster']['href'])) ? '<img height="100px" src="'.$value['infosFilm']['movie']['poster']['href'].'" />' : '' ?></p>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <!-- NOM DU VIN -->
                                                            <h4><?= (!empty($value['name'])) ? $value['name'] : 'Nom inconnu' ?></h4>
                                                            <!-- APPELLATION -->
                                                            <p>Appellation : <?= (!empty($value['appellation'])) ? $value['appellation'] : 'Inconnue' ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1"> </div>
                                                        <div class="form-group col-md-10">
                                                            <label for="comment" class="control-label">Votre commentaire</label>
                                                            <textarea id="comment" name="comment" class="input-md form-control" rows="8"><?php echo $value['comment']; ?></textarea>
                                                        </div>
                                                        <div class="col-md-1"> </div>
                                                        <div class="col-md-4"> </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="note">Note</label>
                                                            <input type="number" class="form-control" name ="note" id="note" step="1" value="<?php echo $value['note']; ?>" min="0" max="10"/>
                                                            <input type="hidden" name="idAsso" value="<?php echo $value['id']; ?>"/>
                                                        </div>
                                                        <div class="col-md-4"> </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-success">Envoyer</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <?php 
                                    switch($value['moderation']){
                                        case '0':
                                            echo '<h4><span class="label label-info">Commentaire non-modéré</span></h4>';
                                            break;                                        
                                        case '1':
                                            echo '<h4><span class="label label-success">Commentaire validé</span></h4>';
                                            break;
                                        case '2':
                                            echo '<h4><span class="label label-warning">Commentaire refusé</span></h4>';
                                            break;
                                        case '3':
                                            echo '<h4><span class="label label-danger">Commentaire supprimé</span></h4>';
                                            break;
                                        
                                        default:
                                            break;
                                    }
                                    ?> 
                                    <quote><?=ucfirst($value['comment']) ?></quote>
                                    <h3>Note de l'association : <?=ucfirst($value['note']) ?></h3>
                                    <?php if ($value['moderation'] != 1) : ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal<?=$value['id'] ?>">Evaluer cette association</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    <?php endforeach; ?>

                    <?php if($nbTotalPages > 1): ?>
                        <div class="center-block text-center">
                            <ul class="pagination">
                            <?php for($i=1; $i<=$nbTotalPages; $i++):?>
                                <li<?=($i == $currentPage) ? ' class="active"' : '';?>>
                                    <a href="<?=$this->url('cave', ['showPage'=> $i]);?>"><?=$i;?></a>
                                </li>
                            <?php endfor; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                <?php else : ?>
                    <div class="col-md-1"></div>
                    <h3 class="col-md-10" style="color:white;">La cave est vide !</h3>
                    <div class="col-md-1"></div>
                <?php endif; ?>
		</div>
</div>

<?php $this->stop('main_content') ?>
<?php $this->start('scripts') ?>
<!-- script pour renvoi à la section de l'association modifiée -->
<?php $this->stop('scripts') ?>
