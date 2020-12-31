<?php
	//Démarrage de l'environnement de session
	session_start() ;

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


	//Initialisation des variables de session si l'utilisateur a validé le formulaire
	if (isset($_POST['button']) && ($_POST['button'] == 'CONNEXION')) {
		if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['passwd']) && !empty($_POST['passwd'])) {
			$select = $linkpdo->query("SELECT identifiant, mdp FROM `profils` WHERE `identifiant`= '".$_POST['login']."'") ;
				$data = $select->fetch() ;
				$identifiant = $data['identifiant'] ;
				$passwd = $data['mdp'] ;
			if ($_POST['login'] == $identifiant && $_POST['passwd'] == $passwd) {
				$_SESSION['access'] = 'oui' ;
				$_SESSION['identifiant'] = $identifiant ;
				header("Location:index.php") ;
			} else {
				$_SESSION['access'] = 'retente' ;
			}
		}
	}

?>

<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Login</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css">
   </head>
	<body>

		<form class="login" method="post" action="login.php">
			<div class="centered">
				<div class="blank"></div>

				<div class="blank"></div>
				<h3>IDENTIFIANT</h3>
				<input class="ilogin" type="text" name="login" />
				<div class="blank"></div>
				<h3>MOT DE PASSE</h3>
				<input class="ilogin" type="password" name="passwd" /> <br /> <br />
				<a href="mdpoublie.php">Mot de passe oublié ?</a> <br />
				<a href="inscription.php">Pas de compte ? Inscrivez-vous.</a> <br />
				<div class="blank"></div>
				<div class="formb">
				<input type="submit" value="CONNEXION" name="button" />
				</div>
				<div class="blank"></div>
			</div>
		</form>

	</body>
</html>

