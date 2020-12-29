
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Inscription</title>
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

            //Traitement du formulaire de saisie
            if (isset($_POST['identifiant']) && !empty($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['date_naissance']) && !empty($_POST['date_naissance']) && isset($_POST['telephone']) && !empty($_POST['telephone'])){
                
                //Insertion avec recherche de doublon dans la table profils
                $req = $linkpdo->prepare('SELECT * FROM `profils` WHERE `identifiant`=:lid AND `mdp`=:lemdp AND `email`=:lemail AND `nom`=:lenom AND `prenom`=:lepnom AND `date_naissance`=:ladatenaissance AND `telephone`=:letelephone');

                $req->execute(array('lid' => $_POST['identifiant'], 'lemdp' => $_POST['mdp'], 'lemail' => $_POST['email'], 'lenom' => $_POST['nom'], 'lepnom' => $_POST['prenom'], 'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone']));

                if ($req->execute(array('lid' => $_POST['identifiant'], 'lemdp' => $_POST['mdp'], 'lemail' => $_POST['email'], 'lenom' => $_POST['nom'], 'lepnom' => $_POST['prenom'], 'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone']))) {
                    
                    $res = $req->fetch() ;
                
                    if ($res == '') {
                    
                        $req = $linkpdo->prepare('INSERT INTO `profils` (`identifiant`, `mdp`, `email`, `nom`, `prenom`, `date_naissance`, `telephone`) VALUES (:lid, :lemdp, :lemail, :lenom, :lepnom, :ladatenaissance, :letelephone)') ;
                        $req->execute(array('lid' => $_POST['identifiant'], 'lemdp' => $_POST['mdp'], 'lemail' => $_POST['email'], 'lenom' => $_POST['nom'],  'lepnom' => $_POST['prenom'],'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone']));
                        
                        //print_r($req->errorInfo());
                        echo '<p class="texteAjout">Votre profil a bien été créé.</p>' ;
                    } else {
                        echo '<p class="texteAjout">Le profil existe déjà</p>' ;
                    }
                    
                }

                //Insertion avec recherche de doublon dans la table contacts
                $req = $linkpdo->prepare('SELECT * FROM `contacts` WHERE `email`=:lemail AND `nom`=:lenom AND `prenom`=:lepnom AND `date_naissance`=:ladatenaissance AND `telephone`=:letelephone AND `idParent`=:lidparent');

                $req->execute(array('lemail' => $_POST['email'], 'lenom' => $_POST['nom'], 'lepnom' => $_POST['prenom'], 'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone'], 'lidparent' => $_POST['identifiant']));

                if ($req->execute(array('lemail' => $_POST['email'], 'lenom' => $_POST['nom'], 'lepnom' => $_POST['prenom'], 'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone'], 'lidparent' => $_POST['identifiant']))) {
                    
                    $res = $req->fetch() ;
                
                    if ($res == '') {
                    
                        $req = $linkpdo->prepare('INSERT INTO `contacts` (`email`, `nom`, `prenom`, `date_naissance`, `telephone`, `idParent`) VALUES (:lemail, :lenom, :lepnom, :ladatenaissance, :letelephone, :lidparent)') ;
                        $req->execute(array('lemail' => $_POST['email'], 'lenom' => $_POST['nom'],  'lepnom' => $_POST['prenom'],'ladatenaissance' => $_POST['date_naissance'], 'letelephone' => $_POST['telephone'], 'lidparent' => $_POST['identifiant']));
                        
                        //print_r($req->errorInfo());
                        echo '<p class="texteAjout">Vous avez été ajouté en tant que contact.</p>' ;
                    } else {
                        echo '<p class="texteAjout">Le contact existe déjà</p>' ;
                    }
                }
            }
?>
	</body>

	<footer>
        <p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
	</footer>
</html>
