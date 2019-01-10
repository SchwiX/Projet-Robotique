<?php
header('Content-Type: application/json');
session_start();
require("./../config/config.inc.php");
require_once(WAY."/includes/autoload.inc.php");

$per = new Personne();


if($per->check_mail($_POST['mail_per'])){ //Vérifie si un email existe dans la base de données
    if($per->check_login($_POST['mail_per'],$_POST['password_per'])){ //Vérifie si la combinaison email-password existe bien dans la base de données
        $tab['reponse'] = true;
    }else{
        $tab['message']['texte'] = "Combinaison invalide !";
        $tab['message']['type'] = "danger";
    }
}else{
   $tab['message']['texte'] = "Combinaison invalide !";
   $tab['message']['type'] = "danger";
}

echo json_encode($tab);
?>