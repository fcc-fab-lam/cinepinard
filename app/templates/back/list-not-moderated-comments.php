<?php $this->layout('layout-back', ['title' => 'Commentaires non modérées']) ?>

<?php $this->start('main_content') ?>

<h1>Liste des commentaires non-modérées</h1>

<?php var_dump($listNotModeratedComments); ?>


<?php $this->stop('main_content') ?>
