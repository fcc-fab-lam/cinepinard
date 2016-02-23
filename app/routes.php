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
		['GET|POST', '/association-film-vin', 'Admin#associationMovieWine', 'association-movie-wine', 'Associer un film et un vin', 'back', 2], // association 1 film et 1 vin
		['GET|POST', '/ajout-fiche-vin', 'Admin#addWine', 'add-wine', 'Rajouter un vin', 'back', 2], // creation fiche vin
		['GET|POST', '/ajout-genre-vin', 'Admin#addWineGenre', 'add-wine-genre', 'Rajouter un genre de vin', 'back', 1], // Ajout genre de vin
		['GET|POST', '/association-genres', 'Admin#associationGenres', 'association-genres', 'Associer les genres', 'back', 1], // Association 1 genre de film et 1 genre de vin 
		['GET|POST', '/liste-associations-non-moderees', 'Admin#listNotModeratedAssociations', 'list-not-moderated-associations', 'Modérer les associations film/vin', 'back', 1], // Liste des associations non-modérées 
		['GET|POST', '/liste-commentaires-non-moderees', 'Admin#listNotModeratedComments', 'list-not-moderated-comments', 'Modérer les commentaires', 'back', 1], // Liste des commentaires non-moderés 
		['GET|POST', '/login', 'Default#login', 'login', 'Connexion', '', 2], // Connexion
		['GET|POST', '/logout', 'Default#logout', 'logout', 'Déconnexion', '', 2], // Déconnexion 		
	);