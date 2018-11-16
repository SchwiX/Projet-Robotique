<!doctype html>
<html lang="fr">
    <head>
        <!--meta http-equiv="Content-Security-Policy" content="default-src 'self' ;style-src https://* 'unsafe-inline'; img-src https://* ;  child-src 'none'; "--> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>ICT-JB</title>

        <!-- css utilisée dans tout le site -->
        <link rel="stylesheet" href="<?php echo URL; ?>/css/global.css">

        <!-- css spécifique à chaque module (dossier) -->
        <link rel="stylesheet" href="css/module.css">

        <!--- css de bootatrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!--- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

        <!--- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!--- JQuery validate -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

        <!--- Librairie js personnelle -->
        <script src="<?php echo URL; ?>js/functions.js"></script>
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