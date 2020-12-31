<?php
// Démarrage de l'environnement de session
session_start() ;

// Redirection si l'utilisateur n'est pas authorisé
if (!isset($_SESSION['access']) || ($_SESSION['access'] != 'oui')) {
    header("Location:login.php") ;
}?>
<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
    <title>Liste contacts</title>
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

    // Requete pour afficher les contacts par ordre alphabétique du prénom
    $req = $linkpdo->prepare('SELECT * FROM `contacts` WHERE `idParent`=:lidparent ORDER BY `prenom`') ;
    $req -> execute(array('lidparent' => $idParent));
    // Affichage du résultat
    echo "<div class='tableau'>" ;
    echo "<table>" ;
    echo "<tr>" ;
    echo "<th>Prénom</th>" ;
    echo "<th>Nom</th>" ;
    echo "<th>Email</th>" ;
    echo "<th>Date de naissance</th>" ;
    echo "<th>Téléphone</th>" ;
    echo "<th>Afficher contact</th>" ;
    echo "</tr>" ;
    while ($data = $req->fetch()) {
        echo "<tr>" ;
        echo "<td>".$data['prenom']."</td>" ;
        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['email']."</td>";
        echo "<td>".$data['date_naissance']."</td>";
        echo "<td>".$data['telephone']."</td>";
        echo "<td><a href='contact.php?id=".$data['id']."'>Consulter</a></td>";
        echo "</tr>" ;

    }
    echo "</table>" ;
    echo "</div>" ;

    ?>



</body>

<footer>
    <p class="foot">Site créé par Adam SELLIN et Margaux RUSSEIL</p>
</footer>
</html>
