<?php $this->layout('layout-back', ['title' => 'Ajout à la cave']) ?>

<?php $this->start('main_content') ?>
<h1>Ajout à la cave</h1>
<?php if(isset($err)){echo '<p class="error">'.implode('<br>', $err).'</p>';} ?>
<?php var_dump($insertValues); ?>
<?php $this->stop('main_content') ?>