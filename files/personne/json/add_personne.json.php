<?php
//$aut="ADM_USR";
//header('Content-Type: application/json');
//session_start();
require("./../../config/config.inc.php");
require_once(WAY . "./includes/secure.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

//print_r($_POST);
$per = new Personne();


    if ($ent->check_no_doublon($_POST['nom_per'])) {

    $id = $per->add($_POST);
    $per->set_id_per($id);

    if ($per->init()) {
        $tab['reponse'] = true;
        $tab['message']['texte'] = "";
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
    


//print_r($_POST);

echo json_encode($tab);
?>