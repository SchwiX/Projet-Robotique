<?php
$aut = "ADM_FNC";

header("Content-Type: application/json");
session_start();
require './../../config/config.inc.php';
require_once WAY . '/includes/autoload.inc.php';
require WAY . '/includes/secure.inc.php';

$id_aut = $_POST['id_aut'];
$id_fnc = $_POST['id_fnc'];
$status = $_POST['status'];
$tab['id_auth'] = $_POST['id_auth'];

sleep(1);

$fnc = new Fonction($id_fnc);

if($status === "true"){
    $tab["reponse"] = $fnc->add_aut($id_aut);
    $tab["operation"] = "add";
}else{
    $tab["reponse"] = $fnc->del_aut($id_aut);
    $tab["operation"] = "del";
}

if($tab['reponse']){
    $tab['message']['type'] = "success";
    if($tab['operation'] === "add"){
        $tab['message']['texte'] = "L'ajout de l'autorisation a bien été enregistré.";
    }else{
        $tab['message']['texte'] = "Le retrait de l'autorisation a bien été enregistré.";
    }
}else{
    $tab['message']['type'] = "danger";
    if($tab['operation'] === "add"){
        $tab['message']['texte'] = "L'ajout de l'autorisation n'a pas pu se faire, contacter votre administrateur.";
    }else{
        $tab['message']['texte'] = "Le retrait de l'autorisation n'a pas pu se faire, contacter votre administrateur.";
    }
}

echo json_encode($tab);
?>