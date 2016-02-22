<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="background"></div>
<!-- DEBUT RECHERCHE -->
<div class="recherche">
	<div class="container-fluid">
		<h1>Recherche d'un film</h1>
		<form action="resultats-recherche" class="row">
			
			<div class="col-lg-4 col-md-12">
				<input class="col-lg-12" type="text" placeholder="Ex : Deadpool" name="film">
			</div>

			<div class="preferences col-lg-6 col-md-12">
				<h2>J'aime :</h2>
				<?php 
	                foreach($categories as $value): 
	                    $userCat = array();
	                    foreach ($userPrefs as $value) {
	                        $userCat[] = $value['categorie_id'];
	                    };
	            ?>
					<label><input type="checkbox" name="preferences[]" value="<?=$value['id']; ?>" <?php if(in_array($value['id'], $userCat)){echo 'checked="checked"';} ?> /><?= ucfirst($value['name']); ?></label>
				<?php endforeach; ?>
			</div>

			<div class="col-lg-2 col-md-12">
				<input class="col-lg-12" type="submit" value="Je bois !" />
			</div>
		</form>

		<?php if(isset($_SESSION['listErr'])) : ?>
			<div class="erreurs">
				<?php 
					echo implode('<br/>', $_SESSION['listErr']);
					unset($_SESSION['listErr']);
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- FIN RECHERCHE -->
<?php $this->stop('main_content') ?>
