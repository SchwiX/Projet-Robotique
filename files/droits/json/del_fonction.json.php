<?php

$aut = "ADM_FNC";
header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require(WAY . "./includes/secure.inc.php");

$fnc = new Fonction();

if ($fnc->del($_POST['id_fnc'])) {
    $tab['reponse'] = true;
    $tab['message']['texte'] = "La fonction à bien été supprimée";
    $tab['message']['type'] = "success";
} else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Un problème est survenu";
    $tab['message']['type'] = "danger";
}
//print_r($_POST);
echo json_encode($tab);
?>