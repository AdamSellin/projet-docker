# Projet-Docker
Projet docker d'une application de contact

## Description
Une application de contacts. L’utilisateur doit s’identifier pour pouvoir accéder à une interface où il pourra retrouver tous les contacts qu’il aura ajoutés auparavant. Cette liste de contacts sera sous forme de tableau où il sera aussi possible de supprimer ou modifier le contact.
Pour ce qui est de l’identification, l’utilisateur aura dû créer un compte au préalable avec un identifiant unique, un mot de passe, son nom et son prénom.

## Choses mises en place
* PHP 7.4-apache
* MySQL
* Adminer

## Choses à faire
* Trouver comment mettre en place des Dockerfile pour une ou les images
* Ajouter le code de l'application
* Vérifier que lorsqu'on ferme le container, le contenu de la base de données est enregistré

## Installation
```
docker-compose up -d
```

## Prérequis
* Installer Docker
* Aide pour l'installation de docker
 - window : https://docs.docker.com/docker-for-windows/install/
 - mac : https://docs.docker.com/docker-for-mac/install/
 - ubuntu :  https://docs.docker.com/engine/install/ubuntu/

