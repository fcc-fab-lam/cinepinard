<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
            <!-- INFO SITE -->
<div id="carousel-caption">
	<h1>Des films à boire</h1>
	<p>Choisissez un film et un type de vin<br/> On s'occupe de vous recommander la meilleure bouteille !</p>
</div>
<div id="carousel-homepage" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img src="assets/img/sl1.jpg" class="img-responsive" alt="">
        </div>
        <div class="item">
            <img src="assets/img/sl2.jpg" class="img-responsive" alt="">
        </div>
        <div class="item">
            <img src="assets/img/sl3.jpg" class="img-responsive" alt="">
        </div>
        <div class="item">
            <img src="assets/img/sl4.jpg" class="img-responsive" alt="">
        </div>
    </div>
 </div>

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
				<?php foreach($categories as $value): 
	                    $userCat = array();
                        if(isset($_SESSION['userPrefs'])){
                            foreach ($_SESSION['userPrefs'] as $value1) {
                                $userCat[] = $value1;
                            };
                        }
	            ?>
					<label for="<?=$value['id']; ?>"><input type="checkbox" id="<?=$value['id']; ?>" name="preferences[]" value="<?=$value['id']; ?>" <?php if(in_array($value['id'], $userCat)){echo 'checked="checked"';} ?> /><span></span><?= ucfirst($value['name']); ?></label>
				<?php endforeach; ?>
			</div>

			<div class="col-lg-2 col-md-12">
				<input class="col-lg-12" type="submit" value="Dégustez !" />
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

<?php $this->start('scripts') ?>
    <script>
    function calcSlider() {
    	$slider = $('#carousel-homepage');

    	// height du slider = viewport height - header height  - footer height
    	sliderH = $(window).height() - $('header').height() - $('.recherche').height();
    	$slider.height(sliderH);

    /*	$('#carousel-homepage img').each(function() {
	    	if ($slider.width()/sliderH >= $(this).width()/$(this).height()) {
	    		$(this).width($slider.width())
	    		$(this).css('height', 'auto')
	    	}
			else {
				 $(this).height(sliderH)
	    		$(this).css('width', 'auto')
			}
    	})*/
    }
    $(window).on('resize', calcSlider);
    $(function() {
    	calcSlider();
	    $('.carousel').carousel({
	      interval: 2000
	    })
    })
    </script>
<?php $this->stop('scripts') ?>

