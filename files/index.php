<?php
$currentCookieParams = session_get_cookie_params();
session_set_cookie_params(
        0, //expires at end of session  
        $currentCookieParams['path'], //path  
        $currentCookieParams['domain'], //domain  
        $secure = true, // secure
        $httponly = true // httponly
);
session_start();
$aut = "USR_USR";
require("./config/config.inc.php");
require_once(WAY . "./includes/secure.inc.php");
require_once(WAY . "/includes/head.inc.php");
?>
<div class="container">
    <div class="header">
        <h3>Bienvenue <?php echo $_SESSION['name'] ?></h3>
        <div>
            Bonjour ici vous pouvez gérer les personnes et les cours
        </div>
    </div>
</div>
</body>
</html>