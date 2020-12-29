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
		    
		    /*$req1 = $linkpdo->prepare('SELECT `photo` FROM `profils` WHERE `identifiant` = "'.$_POST['id'].'"');
		    $req1 -> execute();
		    $data = $req1 -> fetch();
		    unlink($data['photo']);*/
		    
		    // echo $_POST['id'];
		    
		    //Traitement de la suppression
			$req = $linkpdo->prepare('DELETE FROM `profils` WHERE `identifiant` = "'.$_POST['id'].'"') ;
			//Exécution de la requête
			$req->execute() ;
			//Traitement de la suppression
			$request = $linkpdo->prepare('DELETE FROM `contacts` WHERE `idParent` = "'.$_POST['id'].'"') ;
			//Exécution de la requête
			$request->execute() ;
			echo '<div class="text">' ;
			echo '<h1>SUPRESSION</h1>' ;
			echo "<p>Profil supprimé.</p>" ;
		    echo '</div>' ;
		    
		?>

	</body>

	<footer>
		<p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
