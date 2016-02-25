<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home', 'Accueil', 'front', 2], // Vers la page accueil
		['GET|POST', '/inscription', 'Default#signup', 'signup', 'Inscription', '', 2],
		['GET|POST', '/resultats-recherche', 'Default#searchResults', 'search-results', 'Resultats de la recherche', '', 2], // profil utilsateur
		['GET|POST', '/a-propos','Default#aboutUs', 'about-us', 'Qui sommes nous ?', 'front', 2], // Qui sommes-nous
		['GET|POST', '/selection-film', 'Default#selectionMovie', 'selection-movie', 'Film sélectionné', '', 2], // film selectionné
		['GET|POST', '/mise-en-cave/[:idFilm]/[:idVin]', 'Users#addToCave', 'add-to-cave', 'Mettre à la cave', '', 2], // Mettre en cave
		['GET|POST', '/profil-utilisateur', 'Users#userProfil', 'user-profil', 'Profil utilisateur', 'back', 2], // Profil de l'utilisateur
		['GET|POST', '/desactiver-compte', 'Users#disableAccount', 'disable-account', 'Désactiver le compte', '', 2], // Desactiver un compte
		['GET|POST', '/modification-profil', 'Users#updateProfil', 'update-profil', 'Modifier mon profil', '', 2], // Modif profil de l'utilisateur

		['GET|POST', '/ma-cave/[i:showPage]?', 'Users#cave', 'cave', 'Ma cave', 'back', 2], // liste des choix de l'utilisateur(cave)
		['GET|POST', '/association-film-vin', 'Admin#associationMovieWine', 'association-movie-wine', 'Ajouter un Perfect Match', 'back', 2], // association 1 film et 1 vin
		['GET|POST', '/ajout-fiche-vin', 'Admin#addWine', 'add-wine', 'Ajouter un vin', 'back', 2], // creation fiche vin
		['GET|POST', '/ajout-genre-vin', 'Admin#addWineGenre', 'add-wine-genre', 'Ajouter un genre de vin', 'back', 1], // Ajout genre de vin
		['GET|POST', '/liste-commentaires-non-moderees/[i:showPage]?', 'Admin#listNotModeratedComments', 'list-not-moderated-comments', 'Modéreration', 'back', 1], // Liste des commentaires non-moderés 
		['GET|POST', '/login', 'Default#login', 'login', 'Connexion', '', 2], // Connexion
		['GET|POST', '/logout', 'Default#logout', 'logout', 'Déconnexion', '', 2], // Déconnexion
		['GET|POST', '/mot-de-passe-oublie', 'Default#forgetPassword', 'forget-password', 'Mot de passe oublié', '', 2], // Mot de passe oublié 


		##########
		#
		# Je suis pas sur d'avoir capté tout les paramètres supplémentaires.. 
		# et j'avais la flemme de chercher dans le code :-)
		#
		##########
		['GET', '/ajax/[wines|movies:type]/[:search]', 'Ajax#getJson', 'ajax', '', 'back', 0], // Retourne un JSON des vins ou des films
	);