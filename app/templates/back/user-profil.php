<?php $this->layout('layout-back', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<div class="container-fluid main-user-profil">
	<h1 class="col-md-offset-1 profil-title">Votre profil</h1>
	<div class="row">

		<div class="col-md-offset-1 col-md-3">
			<img src="<?php echo $userInfos['photo'];?>" alt="avatar" class="img-circle" />
		</div>

		<div class="col-md-4">
			<h3 class=""><?php echo $userInfos['nickname']; ?></h3>
			<h4><?php echo $userInfos['firstname'].' '.$userInfos['lastname']; ?></h4>
			<p><?php echo $userInfos['email']; ?></p>
			<p><?php echo $userInfos['phone_number']; ?></p>
			<a class="btn btn-default btn-profil-modif" href="http://localhost/cinepinard/public/modification-profil">Modifier le profil</a>
		</div>

		<div class="col-md-4">
			<h3>Vos préférences :</h3>
				<ul>
					<?php 
						foreach ($userPrefs as $key => $value) {
							echo '<li>'.ucfirst($value['name']).'</li>';
						}
					?>
				</ul>

			<h3>Votre adresse :</h3>
			<p class=""><?php echo $userInfos['address'].'<br>'.$userInfos['postcode'].' '.ucfirst($userInfos['town']).' - '.strtoupper($userInfos['country']);?></p>

			<h3>Votre adresse de livraison :</h3>
			<p><em><?php echo strtoupper($userInfos['delivery_name']);?></em></p>
			<p class=""><?php echo $userInfos['delivery_address'].'<br>'.$userInfos['delivery_postcode'].' '.ucfirst($userInfos['delivery_town']).' - '.strtoupper($userInfos['delivery_country']);?></p>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
