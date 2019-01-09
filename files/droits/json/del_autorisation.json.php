<?php

$aut = "ADM_AUT";
header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require(WAY . "./includes/secure.inc.php");

$aut = new Autorisation();

if ($aut->del($_POST['nom_aut'], $_POST['code_aut'])) {
    $tab['reponse'] = true;
    $tab['message']['texte'] = "L'autorisation à bien été supprimée";
    $tab['message']['type'] = "success";
} else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Un problème est survenu";
    $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>