<?php
			// Démarrage de l'environnement de session
			session_start() ;

			// Redirection si l'utilisateur n'est pas authorisé
			if (!isset($_SESSION['access']) || ($_SESSION['access'] != 'oui')) {
				header("Location:login.php") ;
				exit();
			}
		?> 
		
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Supprimer profil</title>
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
            
		    <?php
		    //Connexion au serveur MySQL
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "docker_contact";
            
            try {
                $linkpdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            } catch(PDOException $e) {    
                echo "Connection failed: " . $e->getMessage();
            }
            
			$id = $_SESSION['identifiant'] ;
			
		?>
		
		<form class="login" method="post" action="processSuppProfile.php">
			<div class="blank"><h1>SUPPRESSION</h1></div>
			<div class="centered formb">
				<div class="blank"></div>
				<p class="textform">Voulez-vous supprimer votre profil ?</p>
				<input type='hidden' name='id' value="<?php echo $id ;?>">
				<div class="blank">
				    <input type="submit" value="SUPPRIMER" name="button" />
				</div>
				<div class="blank">
				</div>
			</div>
		</form>
		
	</body>

	<footer>
		<p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
