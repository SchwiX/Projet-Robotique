<?php

header("Content-Type: application/json");
session_start();
require "./../../config/config.inc.php";
require_once WAY . '/includes/autoload.inc.php';

$cou = new Cours();

if ($cou->check($_POST['nom_cour'])) {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Ce nom de cours est déjà utilisé !";
    $tab['message']['type'] = "danger";
} else {
    $id_cou = $cou->add($_POST);
    $cou->set_id_cou($id_cou);
    if ($cou->init()) {
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Le cours a été ajouté avec succès !";
        $tab['message']['type'] = "success";
        
    }
}

echo json_encode($_POST);
?>