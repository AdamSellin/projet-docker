<?php

    //Connexion au serveur MySQL
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    $database = "docker_contact";
    
    try {
        $linkpdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }
    
    //Récupération de la variable id
    $id = $_GET['id'];
    
    //Requête qui récupère les infomations du contact
    $req = $linkpdo->prepare("SELECT * FROM `contacts` WHERE `id` = $id");
    $req -> execute();
    
    $data = $req->fetch();
    $id = $data['id'];
    $email = $data['email'];
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $date_naissance = $data['date_naissance'];
    $telephone = $data['telephone'];
            
            
?> 
		
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Consultation contact</title>
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
		
		<div class="text">
        <h1>INFORMATIONS</h1>
            <div class="row infos">
                <div class="column">
                    <div class="photo">
                    <img src='img/avatar_anonymous.png'/>
                    </div>
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
            <div class="blank"></div>
            <div class="right"> 
            <form action="editContact.php" method="post">
                <input type='hidden' name='id' value="<?php echo $id ;?>">
                <input type="submit" value="MODIFIER" name="modifier">
                <a href='suppContact.php?id="<?php echo $id; ?>"'><input type="button" value="SUPPRIMER" name="supprimer"></a>
            </form>
            </div>
		            
		</div>
		
		
	</body>

	<footer>
		<p class="foot">Site créé par Baptiste LEVANNIER, Margaux RUSSEIL et Emilie OLIVIE</p>
	</footer>
</html>
