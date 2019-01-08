<!doctype html>
<html lang="fr">
    <head>
        <!--meta http-equiv="Content-Security-Policy" content="default-src 'self' ;style-src https://* 'unsafe-inline'; img-src https://* ;  child-src 'none'; "--> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Roberta</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!--- JQuery validate -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
        <link href="./css/css.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <?php
            if (isset($_SESSION['id'])) {
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo URL; ?>">Game Center</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Droits d'accès<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo URL; ?>droits/attribution_fnc_per.php">Attribution fonctions</a></li>
                                        <li><a href="<?php echo URL; ?>droits/attribution_aut_fnc.php">Attribution autorisations</a></li>
                                        <li><a href="<?php echo URL; ?>droits/fonctions.php">Fonctions</a></li>
                                        <li><a href="<?php echo URL; ?>droits/autorisations.php">Autorisations</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo URL; ?>modules/index.php">Modules ICT</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Examens<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo URL; ?>Convocations/index.php">Convocations</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo URL; ?>chat/index.php">Chat</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo URL; ?>logout.php">Déconnection</a></li>
                            </ul>
                        </div>
                    </div>                    
                </nav>
                <?php
            }
            ?>
            <!-- Zone de notification -->
            <div class="alert" id="alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong class="bold"></strong><span class="message"></span>
            </div>