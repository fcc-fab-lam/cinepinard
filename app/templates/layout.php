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
    <?php
    if($title == 'Accueil'){
    ?>
        <div class="container-accueil">
    <?php
    }
    else{
    ?>
        <div class="container-principal">
    <?php
    }
    ?>
        <!-- HEADER -->
        <div class="container-fluid">
            <header class="row">
                <!-- PARTIE GAUCHE DU HEADER -->
                <nav class="col-lg-6 col-md-12 col-sm-12">
                    <h1 class="brand"><a href="<?=$this->url('home') ?>">Wine Screen</a></h1>
                    <ul class="list-inline menu">
<?php       require('../app/routes.php'); // on recupere requiert le fichier routes pour avoir accés à la variable $w_routes contenant toutes les routes
            foreach($w_routes as $value) : // on boucle sur le tableau des routes 
                if($value['5'] == 'front') : // si la route est prévue pour le front
                    if($value['6'] == '2') : // si la route est prevu pour tous les utilisateurs ?>
                        <li><a href="<?=$this->url($value['3']) ?>"<?=($_SERVER['W_ROUTE_NAME'] == $value['3']) ? ' class="active"' : '' ?>><?=$value['4'] ?></a></li>
<?php               endif;
                endif;
            endforeach; 

            if(!empty($w_user)) : // si l'utilisateur est connecté on affiche un lien vers le back ?>
                        <li><a href="<?=$this->url('user-profil') ?>">Mon compte</a></li>
<?php       endif; ?>
                    </ul>
                </nav>

                <!-- PARTIE DROITE DU HEADER -->
                <div class="col-lg-6 col-md-12 col-sm-12 connexion">

            <!-- si l'utilisateur n'est pas connecté on affiche un lien vers l'inscription et la connexion -->

<?php       if(empty($w_user)) : ?>
                    <div class="login">
                    <!-- CONNEXION -->
                        <!-- Trigger the modal with a button -->
                        <button type="button" id="btn-modal-login" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Connexion</button>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title mt-connexion">Connexion</h2>
                                    </div>

                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <form method="post" class="form-horizontal" action="<?=$this->url('login') ?>">
                                            <div class="form-group">
                                                <label class="col-sm-5" for="email">Email</label>
                                                <input class="col-sm-7" type="email" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-5" for="password">Mot de passe</label>
                                                <input class="col-sm-7" type="password" id="password" name="password">
                                                <div class="mdp-forget pull-right"><a href="<?=$this->url('forget-password') ?>">Mot de passe oublié ?</a></div>
                                            </div>
                                            <!-- Champs cachés -->
                                            <input type="hidden" value="<?=$_SERVER['W_ROUTE_NAME'] ?>" name="currentPage">
                                            <?php if($_SERVER['W_ROUTE_NAME'] == 'selection-movie') : ?>
                                            <input type="hidden" value="<?=$_GET['id'] ?>" name="idFilm">
                                            <?php if(!empty($this->e($vin1))) : ?>
                                            <input type="hidden" value="<?=$this->e($vin1) ?>" name="idVin1">
                                            <?php endif; ?>
                                            <?php if(!empty($this->e($vin2))) : ?>
                                            <input type="hidden" value="<?=$this->e($vin2) ?>" name="idVin2">
                                            <?php endif; ?>
                                            <?php if(!empty($this->e($vin3))) : ?>
                                            <input type="hidden" value="<?=$this->e($vin3) ?>" name="idVin3">
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-default" value="Connexion" />
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Fin du Modal -->

                        <!-- INSCRIPTION -->
                        <a href="<?=$this->url('signup') ?>" id="btn-modal-signup" class="btn btn-info btn-md<?=($_SERVER['W_ROUTE_NAME'] == 'signup') ? ' active' : '' ?>">Inscription</a>
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
        <footer>WineScreen &copy; <?php echo date('Y'); ?></footer>

        <!-- JQUERY CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <!-- BOOTSTRAP CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- lance le script add-wine-genre-->
        <?= $this->section('scripts') ?>
</body>
</html>

