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
        <header class="container-fluid">
            <nav>
                <ul>
                    <li><a href="<?=$this->url('home') ?>">Accueil</a></li>
                    <?php require('../app/routes.php'); // on recupere requiert le fichier routes pour avoir accés à la variable $w_routes contenant toutes les routes ?>
                        <?php foreach($w_routes as $value) : // on boucle sur le tableau des routes ?>
                            <?php if($value['5'] == 'back') : // si la route est prévue pour le back ?>
                                <?php if($value['6'] == '2') : // si la route est prevu pour tous les utilisateurs ?>
                                    <li><a href="<?=$this->url($value['3']) ?>"><?=$value['4'] ?></a></li>
                                <? elseif($value['6'] == '1' && $w_user['role_id'] == 1) : // si la route est prévue pour les administrateurs  ?>
                                    <li><a href="<?=$this->url($value['3']) ?>"><?=$value['4'] ?></a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                </ul>
            </nav>
                    Bonjour <?=$w_user['nickname'] ?>
                    <a href="<?=$this->url('logout') ?>">Se déconnecter</a>
            </div>
        </header>

		<main>
			<?= $this->section('main_content') ?>
		</main>

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