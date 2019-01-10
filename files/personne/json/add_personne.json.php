<?php

header('Content-Type: application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");


$per = new Personne();

print_r($_POST);

if ($per->check_no_doublon($_POST['nom_per'])) {

    $id = $per->add($_POST);
    $per->set_id_per($id);

    if ($per->init()) {
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Ajouté";
        $tab['message']['type'] = "success";
    } else {
        $tab['reponse'] = false;
        $tab['message']['texte'] = "Un problème est survenu";
        $tab['message']['type'] = "danger";
    }
} else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Existe déjà.";
    $tab['message']['type'] = "danger";
}


echo json_encode($tab);
?>