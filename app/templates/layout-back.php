<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<!-- BOOTSTRAP CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <div class="container-principal">
        <header class="container-fluid header">
        <div class="row">

            <!-- PARTIE GAUCHE DU HEADER -->
            <div class="col-lg-3 col-md-12"><h1 class="brand"><a href="<?=$this->url('home') ?>">Wine Screen</a></h1></div>

            <!-- PARTIE CENTRALE DU HEADER -->
            <nav class="col-lg-6 col-md-12">
                <ul class="list-inline titles-header">
<?php   require('../app/routes.php'); // on requiert le fichier routes pour avoir accés à la variable $w_routes contenant toutes les routes 
        foreach($w_routes as $value) : // on boucle sur le tableau des routes 
            if($value['5'] == 'back') : // si la route est prévue pour le back 
                if($value['6'] == 2) : // si la route est prevu pour tous les utilisateurs ?>
                    <li><a href="<?=$this->url($value['3']) ?>"<?=($value['3'] == $_SERVER['W_ROUTE_NAME']) ? ' class="active"' : '' ?>><?=$value['4'] ?></a></li>
<?php           else : 
                    if($value['6'] == 1 && $w_user['role_id'] == 1) : // si la route est prévue pour les administrateurs  ?>
                    <li><a href="<?=$this->url($value['3']) ?>"<?=($value['3'] == $_SERVER['W_ROUTE_NAME']) ? ' class="active"' : '' ?>><?=$value['4'] ?></a></li>
<?php               endif; 
                endif;
            endif; 
        endforeach; ?>
                </ul>
            </nav>

            <!-- PARTIE DROITE DU HEADER -->
            <div class="col-lg-3 col-md-12">
                <div class="islogin login-back">
                    Bonjour <span class="bold"><?=$w_user['nickname'] ?></span>
                    <a href="<?=$this->url('logout') ?>">Se déconnecter</a>
                </div>
            </div>
        </div>
        </header>

		<main>
			<?= $this->section('main_content') ?>
		</main>
    </div>
    
        <footer>
            <div class="col-md-6 apropos">
                <a href="<?=$this->url('about-us') ?>">Qui sommes-nous ?</a>
            </div>
            <div class="col-md-6 copyright">
                WineScreen &copy; <?php echo date('Y'); ?>
            </div>
        </footer>

	<!-- JQUERY CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- BOOTSTRAP CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- lance le script add-wine-genre-->
		<?= $this->section('scripts') ?>
</body>
</html>