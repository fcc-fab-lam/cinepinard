<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home'],// vers la page accueil
		['GET|POST', '/inscription', 'Users#signup', 'signup'],
		['GET|POST', '/resultats-recherche', 'Default#searchResults', 'search-results'],// profil utilsateur
		['GET|POST', '/a-propos','Default#aboutUs', 'about-us'],// qui sommes-nous
		['GET|POST', '/selection-film[:id]', 'Default#selectionMovie', 'selection-movie'], // film selectionné
		['GET|POST', '/profil-utilisateur', 'Back#userProfil', 'user-profil'], // Profil de l'utilisateur
		['GET|POST', '/modification-profil', 'Back#updateProfil', 'update-profil'], // Modif profil de l'utilisateur
		['GET|POST', '/votre-cave', 'Back#cave', 'cave'], // liste des choix de l'utilisateur(cave)
		['GET|POST', '/ajouter-commmentaire', 'Back#addComments', 'add-comments'], // Ajouter un commentaire
		['GET|POST', '/association-film-vin', 'Back#associationMovieWine', 'association-movie-wine'], // association 1 film et 1 vin
		['GET|POST', '/ajout-fiche-vin', 'Back#addWine', 'add-wine'], // creation fiche vin
		['GET|POST', '/ajout-genre-vin', 'Back#addWineGenre', 'add-wine-genre'], // Ajout genre de vin
		['GET|POST', '/ajout-genre-film', 'Back#addMovieGenre', 'add-movie-genre'], // Ajout genre de film
		['GET|POST', '/association-genres', 'Back#associationGenres', 'association-genres'], // Association 1 genre de film et 1 genre de vin 
		['GET|POST', '/liste-associations-non-moderees', 'Back#listNotModeratedAssociations', 'list-not-moderated-associations'], // Liste des associations non-modérées 
		['GET|POST', '/liste-commentaires-non-moderees', 'Back#listNotModeratedComments', 'list-not-moderated-comments'], // Liste des commentaires non-moderés 
		['GET|POST', '/formulaire-moderation', 'Back#moderationForm', 'moderation-form'], // Formulaire de moderation  
		['GET|POST', '/desactiver-compte', 'Back#disableAccount', 'disable-acccount'], // Desactiver un compte
	);