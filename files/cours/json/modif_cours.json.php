<?php

header("Content-Type: application/json");
session_start();
require "./../../config/config.inc.php";
require_once WAY . '/includes/autoload.inc.php';

$cou = new Cours();

if (isset($_POST)) {
    $modif_cour = $cou->modif($_POST['id_cou'], $_POST);
    
    if($modif_cour){
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Le cours a été ajouté avec succès !";
        $tab['message']['type'] = "success";
    }else{
        $tab['reponse'] = false;
        $tab['message']['texte'] = "Ce nom de cours est déjà utilisé !";
        $tab['message']['type'] = "danger";
    }
}

echo json_encode($_POST);
?>