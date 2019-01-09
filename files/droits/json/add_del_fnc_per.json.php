<?php

$aut = "ADM_USR";
header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require(WAY . "./includes/secure.inc.php");

//print_r($_POST);

$id_per = $_POST['id_per'];
$id_fnc = $_POST['id_fnc'];
$status = $_POST['status'];
$tab['id_auth'] = $_POST['id_auth'];

$user = new Personne($id_per);

sleep(1);

if ($status === "true") {
    $tab['reponse'] = $user->add_fnc($id_fnc);
    $tab['operation'] = "add";
} else {
    $tab['reponse'] = $user->del_fnc($id_fnc);
    $tab['operation'] = "del";
}

if ($tab['reponse']) {
    $tab['message']['type'] = "success";
    if ($tab['operation'] === "add") {
        $tab['message']['texte'] = "L'ajout de la fonction a bien été enregistré";
    } else {
        $tab['message']['texte'] = "Le retrait de la fonction a bien été enregistré";
    }
} else {
    $tab['message']['type'] = "danger";
    if ($tab['operation'] === "add") {
        $tab['message']['texte'] = "L'ajout de la fonction n'a pas pu se faire";
    } else {
        $tab['message']['texte'] = "Le retrait de la fonction n'a pas pu se faire";
    }
}

echo json_encode($tab);
?>