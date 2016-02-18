<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>

<h1>Votre profil</h1>

<div class="container-fluid">
	<div class=row>
		<div class="col-md-8">
			<img src="<?php echo $userInfos['photo'];?>" alt="avatar" class="img-circle">
			<h3 class="bg-primary"><?php echo $userInfos['nickname']; ?></h3>
			<h4><?php echo $userInfos['firstname'].' '.$userInfos['lastname']; ?></h4>
			<p><?php echo $userInfos['email']; ?></p>
			<p><?php echo $userInfos['phone_number']; ?></p>
			<h3>Vos préférences</h3>
				<ul>
					<?php 
						foreach ($userPrefs as $key => $value) {
							echo '<li>'.ucfirst($value['name']).'</li>';
						}
					?>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Votre adresse :</h4>
				<p class="bg-info"><?php echo $userInfos['address'].'<br>'.$userInfos['postcode'].' '.ucfirst($userInfos['town']).' - '.strtoupper($userInfos['country']);?></p>
				<br>
				<h4>Votre adresse de Livraison :</h4>
				<p><em><?php echo strtoupper($userInfos['delivery_name']);?></em></p>
				<p class="bg-info"><?php echo $userInfos['delivery_address'].'<br>'.$userInfos['delivery_postcode'].' '.ucfirst($userInfos['delivery_town']).' - '.strtoupper($userInfos['delivery_country']);?></p>
			</div>
	</div>
</div>

<?php $this->stop('main_content') ?>
