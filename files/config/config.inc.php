<?php 

/*********************** Consignes globales ***********************************/
// Force ou désactive l'affichage des erreurs PHP et SQL
define("DISPLAY_ERROR", 1);

// Type d'erreur à afficher
error_reporting(E_ALL);
ini_set('display_errors', DISPLAY_ERROR);


/*********************** Chemin d'accès ***************************************/
//echo getcwd();
define("WAY","C:/xampp/htdocs/Projet-Robotique/files/");
define("URL","http://localhost/Projet-Robotique/files/");


/*********************** Base de données **************************************/
// Host
define("SQL_HOST","localhost");

// Nom de la base de données
define("BASE_NAME","roberta_18");

// Utilisateur de base de données
define("SQL_USER","root");

// Mot de passe
define("SQL_PASSWORD","");?>