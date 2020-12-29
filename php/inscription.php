<?php
/*
			// Démarrage de l'environnement de session
			session_start() ;

			// Redirection si l'utilisateur n'est pas authorisé
			if (!isset($_SESSION['access']) || ($_SESSION['access'] != 'oui')) {
				header("Location:login.php") ;
				exit();
			}
*/
		?> 
		
<!DOCTYPE HTML>
<html lang="fr-FR">
   <head>
   		<title>Inscription</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css">
   </head>
		
	<body>
		
        <script type="text/javascript" src="verifpassword.js"></script>
        
		<div class= text>
            
		    <form class="plain" enctype="multipart/form-data" action="processInscription.php" method="post" class="page" onSubmit="return validation(mdp, confirmationMdp)">
    			<div class= "row"><div class="column">
    				<h1>COMPTE</h1>
    				    <h3>Identifiant *</h3>
    				    <input type="text" placeholder="jeandupon31" name="identifiant" required>
    			    	<h3>Mot de passe *</h3>
    			    	<input type="password" placeholder="Mot de passe..." name="mdp" value="" required>
    			    	<h3>Confirmation mot de passe *</h3>
    			    	<input type="password" placeholder="Confirmation mot de passe..." name="confirmationMdp" value="" required>
    			    	<h3>E-mail *</h3>
    			    	<input type="text" placeholder="jean.dupont@monmail.fr" name="email" required>
                    </div>
                    <div class="column">
    				<h1>INFORMATIONS</h1>
    				    <h3>Nom *</h3>
    			    	<input type="text" placeholder="Dupont" name="nom" required>
    			    	<h3>Prénom *</h3>
    			    	<input type="text" placeholder="Jean" name="prenom" required>
    			      	<h3>Date de naissance *</h3>
    			    	<input type="date" placeholder="JJ/MM/AAAA" name="date_naissance" required>
    			    	<h3>Téléphone *</h3>
    			    	<input type="text" placeholder="0606060606" name="telephone" required>
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
