<?php
session_start();
session_destroy();
require("./config/config.inc.php");
header('Location: '.URL.'login.php');
exit;
?>