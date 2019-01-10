<?php
session_start();
session_destroy();
require("./config/config.inc.php");
header('Location: '.URL.'/accueil/index.php');
exit;
?>