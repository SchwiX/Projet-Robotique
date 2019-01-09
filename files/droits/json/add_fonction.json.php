<?php

$aut = "USR_USR";
header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require(WAY . "./includes/secure.inc.php");

$fnc = new Fonction();

if ($fnc->check_no_doublon($_POST['nom_fnc'], $_POST['abr_fnc'])) {
    $id = $fnc->add($_POST);

    $fnc->set_id_fnc($id);
    if ($fnc->init()) {
        $tab['reponse'] = true;
        $tab['message']['texte'] = "La fonction " . $fnc->get_nom() . " (" . $fnc->get_abreviation() . ") à bien été ajoutée";
        $tab['message']['type'] = "success";
    } else {
        $tab['reponse'] = false;
        $tab['message']['texte'] = "Un problème est survenu";
        $tab['message']['type'] = "danger";
    }
} else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cette fonction existe déjà dans la base";
    $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>