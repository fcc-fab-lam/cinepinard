<?php $this->layout('layout', ['title' => 'Film Sélectionné']) ?>

<?php $this->start('main_content') ?>
<?php 
	if(isset($err)){
		echo 'erreur';
	}
	else{
		echo '<pre>';
		var_dump($filmInfos);
		var_dump($genres);
		var_dump($categories);
		var_dump($vins);
		echo '</pre>';
	}
?>

<?php $this->stop('main_content') ?>
