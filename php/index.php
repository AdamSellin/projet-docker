<?php

// Démarrage de l'environnement de session
session_start() ;

// Redirection si l'utilisateur n'est pas authorisé
if (!isset($_SESSION['access']) || ($_SESSION['access'] != 'oui')) {
    header("Location:login.php") ;
}

?>
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Accueil</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css">
   </head>

	<body>
    	<nav>
		  <ul>
		  	<li class="deroulant"><a href="index.php">Accueil</a></li>
		  	<li class="deroulant"><a href="contacts.php">Contacts</a></li>
		    <li class="deroulant"><a href="addContact.php">Ajouter un contact</a></li>
		    <li class="deroulant"><a href="profile.php">Profil</a></li>
		    <li class="logout"><a href="deconnexion.php">Déconnexion</a></li>
		  </ul>
		</nav>

		<h1>Bienvenue sur votre carnet de contact</h1>
		<p class="texteIndex"> Pour consulter/rechercher ou ajouter un contact, utilisez le menu ! </p>
    
	</body>

    <footer>
        <p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
    </footer>
    
</html>