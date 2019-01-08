<?php
header("Content-Type: application/json");
session_start();
require "./../../config/config.inc.php";
require_once WAY . '/includes/autoload.inc.php';

$cou = new Cours();

if (isset($_POST)) {
    $del_cour = $cou->del($_POST['id_cou']);
    
    if($del_cour){
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