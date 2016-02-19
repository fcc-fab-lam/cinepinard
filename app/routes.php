<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home'], // vers la page accueil
		['GET|POST', '/inscription', 'Default#signup', 'signup'],
		['GET|POST', '/resultats-recherche', 'Default#searchResults', 'search-results'], // profil utilsateur
		['GET|POST', '/a-propos','Default#aboutUs', 'about-us'], // qui sommes-nous
		['GET|POST', '/selection-film', 'Default#selectionMovie', 'selection-movie'], // film selectionné
		['GET|POST', '/profil-utilisateur', 'Users#userProfil', 'user-profil'], // Profil de l'utilisateur
		['GET|POST', '/desactiver-compte', 'Users#disableAccount', 'disable-acccount'], // Desactiver un compte
		['GET|POST', '/modification-profil', 'Users#updateProfil', 'update-profil'], // Modif profil de l'utilisateur
		['GET|POST', '/votre-cave', 'Users#cave', 'cave'], // liste des choix de l'utilisateur(cave)
		['GET|POST', '/ajouter-commentaire', 'Users#addComments', 'add-comments'], // Ajouter un commentaire
		['GET|POST', '/association-film-vin', 'Admin#associationMovieWine', 'association-movie-wine'], // association 1 film et 1 vin
		['GET|POST', '/ajout-fiche-vin', 'Admin#addWine', 'add-wine'], // creation fiche vin
		['GET|POST', '/ajout-genre-vin', 'Admin#addWineGenre', 'add-wine-genre'], // Ajout genre de vin
		['GET|POST', '/ajout-genre-film', 'Admin#addMovieGenre', 'add-movie-genre'], // Ajout genre de film
		['GET|POST', '/association-genres', 'Admin#associationGenres', 'association-genres'], // Association 1 genre de film et 1 genre de vin 
		['GET|POST', '/liste-associations-non-moderees', 'Admin#listNotModeratedAssociations', 'list-not-moderated-associations'], // Liste des associations non-modérées 
		['GET|POST', '/liste-commentaires-non-moderees', 'Admin#listNotModeratedComments', 'list-not-moderated-comments'], // Liste des commentaires non-moderés 
		['GET|POST', '/formulaire-moderation', 'Admin#moderationForm', 'moderation-form'], // Formulaire de moderation		
		['GET|POST', '/login', 'Default#login', 'login'], // Connexion
		['GET|POST', '/logout', 'Default#logout', 'logout'], // Déconnexion 		
	);