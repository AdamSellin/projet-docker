<?php

			// Démarrage de l'environnement de session
			session_start() ;

			// Redirection si l'utilisateur n'est pas authorisé
			if (!isset($_SESSION['access']) || ($_SESSION['access'] != 'oui')) {
				header("Location:login.php") ;
				exit();
			}

			$idParent = $_SESSION['identifiant'] ;
		?> 
		
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Ajouter contact</title>
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
        
		<div class= text>
            
		    <form class="plain" enctype="multipart/form-data" action="processAddContact.php" method="post" class="page">
    			<div class= "row">
                    <div class="column">
    				<h1>INFORMATIONS CONTACT</h1>
    				    <p class="text">Nom *</p>
    			    	<input type="text" placeholder="Dupont" name="nom" required>
    			    	<p class="text">Prénom *</p>
    			    	<input type="text" placeholder="Jean" name="prenom" required>
                        <p class="text">E-mail *</p>
    			    	<input type="text" placeholder="jean.dupont@monmail.fr" name="email">
                        <p class="text">Date de naissance *</p>
    			    	<input type="date" placeholder="JJ/MM/AAAA" name="date_naissance" required>
    			    	<p class="text">Téléphone *</p>
						<input type="text" placeholder="0606060606" name="telephone" required>
						<input type="hidden" name="idParent" value="<?php echo $idParent; ?>">
			        </div>
			        </div>
                    <div class="blank right"> 
    				    <input type="submit" value="CONFIRMER" name="button">
    				    <input type="reset" value="VIDER">
    				</div>
			</form>
		</div>
	</body>

	<footer>
		<p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
