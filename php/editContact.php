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
   		<title>Modifier contact</title>
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
			
			$idParent = $_SESSION['identifiant'] ;

			//Récupérer les informations du contact
			$request = $linkpdo->prepare('SELECT * FROM `contacts` WHERE `id`="'.$_POST['id'].'" ') ;
        	$request -> execute() ;
            $data = $request->fetch();
            $id = $data['id'];
            $email = $data['email'];
            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $date_naissance = $data['date_naissance'];
            $telephone = $data['telephone'];
		 ?>
        
		<div class= text>
            
		    <form class="plain" enctype="multipart/form-data" action="processEditContact.php" method="post" class="page">
    			<div class= "row">
                    <div class="column">
    				<h1>INFORMATIONS CONTACT</h1>
    				    <p class="text">Nom *</p>
    			    	<input type="text" value="<?php echo $nom; ?>" name="nom" required>
    			    	<p class="text">Prénom *</p>
    			    	<input type="text" value="<?php echo $prenom; ?>" name="prenom" required>
                        <p class="text">E-mail *</p>
    			    	<input type="text" value="<?php echo $email; ?>" name="email" required>
    			      	<p class="text">Date de naissance *</p>
    			    	<input type="date" value="<?php echo $date_naissance; ?>" name="date_naissance" required>
    			    	<p class="text">Téléphone *</p>
    			    	<input type="text" value="<?php echo $telephone; ?>" name="telephone" required>
						<input name="id" type="hidden" value="<?php echo $id; ?>">
						<input name="idParent" type="hidden" value="<?php echo $idParent; ?>">
			        </div>
			        </div>
                    <div class="blank right"> 
    				    <input type="submit" value="CONFIRMER" name="button">
    				</div>
			</form>
		</div>
		
	</body>

	<footer>
		<p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
