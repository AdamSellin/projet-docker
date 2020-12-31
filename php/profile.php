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
   		<title>Profil</title>
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
            $servername = "db";
            $username = "root";
            $password = "root123";
            $database = "docker_contact";
            
            try {
                $linkpdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            } catch(PDOException $e) {    
                echo "Connection failed: " . $e->getMessage();
            }

			//Récupérer les informations de l'utilisateur
			$request = $linkpdo->prepare('SELECT * FROM `profils` WHERE `identifiant`="'.$_SESSION['identifiant'].'" ') ;
        	$request -> execute() ;
            
            $data = $request->fetch();
            $id = $data['identifiant'];
            $email = $data['email'];
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $date_naissance = $data['date_naissance'];
            $telephone = $data['telephone'];
		 ?>
		 
		 <div class= text>
    				<h1>INFORMATIONS</h1>
    				<div class="row">
    				    <div class="column">
    				        <div class="photo">
							<img src='img/avatar_anonymous.png'/>
							</div>
							<h3>Identifiant</h3>
							<input type="text" name="identifiant" value="<?php echo $id; ?>" disabled>
							<h3>E-mail</h3>
							<input type="text" name="email" value="<?php echo $email; ?>" disabled>
    			    	    
    				    </div>
    				    <div class="column">
    				    <h3>Nom</h3>
    			    	<input type="text" name="nom" value="<?php echo $nom; ?>" disabled>
    			    	<h3>Prénom</h3>
    			    	<input type="text" name="prenom" value="<?php echo $prenom; ?>" disabled>
    			      	<h3>Date de naissance</h3>
    			    	<input type="date" name="date_naissance" value="<?php echo $date_naissance; ?>" disabled>
    			    	<h3>Téléphone</h3>
    			    	<input type="text" name="telephone" value="<?php echo $telephone; ?>" disabled>
				    	</div>
    			    </div>
    			    <div class="blank profile"></div>
                    <div class="right"> 
                    <form action="editProfile.php" method="post">
                        <input type='hidden' name='id' value="<?php echo $id ;?>">
    				    <input type="submit" value="MODIFIER" name="modifier">
    				    <a href='suppProfile.php'><input type="button" value="SUPPRIMER" name="supprimer"></a>
    				</form>
    				</div>
		</div>
		</div>
	</body>

	<footer>
		<p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
