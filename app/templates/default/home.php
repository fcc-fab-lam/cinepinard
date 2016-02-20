<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="background"></div>
<!-- DEBUT RECHERCHE -->
<div class="recherche">
	<div class="container-fluid">
		<div class="row searchfilm">
		<h1>Recherche d'un film</h1>
			<form action="resultats-recherche">
				<input type="text" placeholder="Ex : Deadpool" name="film">

				<div class="preferences">J'aime :
					<?php 
                        foreach($categories as $value): 
                            $userCat = array();
                            foreach ($userPrefs as $value) {
                                $userCat[] = $value['categorie_id'];
                            };
                    ?>
						<label><input type="checkbox" name="preferences[]" value="<?=$value['id']; ?>" <?php if(in_array($value['id'], $userCat)){echo 'checked="checked"';} ?> /><?=$value['name']; ?></label>
					<?php endforeach; ?>
				</div>

				<input type="submit" value="recherche" />
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
</div>
<!-- FIN RECHERCHE -->
<?php $this->stop('main_content') ?>
