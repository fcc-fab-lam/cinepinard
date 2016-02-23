<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<!-- BOOTSTRAP CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
    <div class="container-principal">
        <!-- DEBUT CONNEXION / LOG IN -->
        <div class="container-fluid">
            <header class="row">
                <nav class="col-lg-4 col-md-12 col-sm-12">
                    <ul class="list-inline menu">
<?php       require('../app/routes.php'); // on recupere requiert le fichier routes pour avoir accés à la variable $w_routes contenant toutes les routes
            foreach($w_routes as $value) : // on boucle sur le tableau des routes 
                if($value['5'] == 'front') : // si la route est prévue pour le front
                    if($value['6'] == '2') : // si la route est prevu pour tous les utilisateurs ?>
                        <li><a href="<?=$this->url($value['3']) ?>"<?=($_SERVER['W_ROUTE_NAME'] == $value['3']) ? ' class="active"' : '' ?>><?=$value['4'] ?></a></li>
<?php               endif;
                endif;
            endforeach; 
            if(empty($w_user)) : // si l'utilisateur n'est pas connecté on affiche un lien vers l'inscription ?>
                        <li><a href="<?=$this->url('signup') ?>"<?=($_SERVER['W_ROUTE_NAME'] == 'signup') ? ' class="active"' : '' ?>>Inscription</a></li>
<?php       endif;
            if(!empty($w_user)) : // si l'utilisateur est connecté on affiche un lien vers le back ?>
                        <li><a href="<?=$this->url('user-profil') ?>">Gérer mon profil</a></li>
<?php       endif; ?>
                    </ul>
                </nav>
                <div class="col-lg-8 col-md-12 col-sm-12 connexion">
<?php       if(empty($w_user)) : ?>
                    <div class="login">
                        <form method="post" action="<?=$this->url('login') ?>">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password">
                            <input type="submit" value="connexion" />
                            <input type="hidden" value="<?=$_SERVER['W_ROUTE_NAME'] ?>" name="currentPage">
                        </form>
                    </div>
<?php       else : ?>
                    <div class="login">
                        <div class="islogin">
                            Bonjour <span class="bold"><?=$w_user['nickname'] ?></span>
                            <a href="<?=$this->url('logout') ?>">Se déconnecter</a>
                        </div>
                    </div>
<?php       endif; ?>
                </div>
            </header>
        </div>
        <!-- FIN CONNEXION / LOG IN -->
		<main>
			<?= $this->section('main_content') ?>
		</main>
    <!-- FIN DU CONTAINER PRINCIPAL -->
    </div>
		<footer>
		</footer>

		<!-- JQUERY CDN -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- BOOTSTRAP CDN -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- lance le script add-wine-genre-->
		<?= $this->section('scripts') ?>
</body>
</html>