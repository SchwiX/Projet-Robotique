<?php

$aut = "USR_USR";
header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require(WAY . "./includes/secure.inc.php");

$aut = new Autorisation();


if ($aut->check_no_doublon($_POST['code_aut'])) {
    $id = $aut->add_usr_and_adm_auto($_POST);

    $aut->set_id_aut($id['ADM']);

    if ($aut->init()) {
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Les autorisations ADM_" . $_POST['code_aut'] . " et USR_" . $_POST['code_aut'] . " ont bien été ajoutée";
        $tab['message']['type'] = "success";
    } else {
        $tab['reponse'] = false;
        $tab['message']['texte'] = "Un problème est survenu";
        $tab['message']['type'] = "danger";
    }
} else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cette autorisation existe déjà dans la base";
    $tab['message']['type'] = "danger";
}
//print_r($_POST);
echo json_encode($tab);
?>