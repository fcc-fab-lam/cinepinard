<?php $this->layout('layout-back', ['title' => 'Ajout à la cave']) ?>

<?php $this->start('main_content') ?>
<h1>Ajout à la cave</h1>
<?php if(isset($err)) : ?>
<p class="text-danger"><?=implode('<br>', $err) ?></p>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h4><?= (isset($filmInfos['movie']['title'])) ? $filmInfos['movie']['title'] : $filmInfos['movie']['originalTitle']?></h4>
        <p><?= (isset($filmInfos['movie']['poster']['href'])) ? '<img height="300px" src="'.$filmInfos['movie']['poster']['href'].'" />' : '' ?></p>
    </div>

    <div class="col-md-4">
        <h4><?=ucfirst($vinInfos['name']) ?></h4>
        <h5><?=ucfirst($vinInfos['appellation']) ?></h5>
    </div>
    <div class="col-md-2"></div>
</div>
<a href="<?=$this->url('selection-movie') ?>?id=<?=$filmInfos['movie']['code'] ?>">Voir une autre proposition pour ce film</a>
<a href="<?=$this->url('home') ?>">Chercher un autre film</a>
<?php endif; ?>
<?php $this->stop('main_content') ?>