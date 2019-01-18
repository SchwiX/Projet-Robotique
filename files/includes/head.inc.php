<!doctype html>
<html lang="fr">

<head>
    <!--meta http-equiv="Content-Security-Policy" content="default-src 'self' ;style-src https://* 'unsafe-inline'; img-src https://* ;  child-src 'none'; "-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Roberta</title>

    <!-- Font pour les images -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- JQuery validate -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="<?php echo URL; ?>/css/global.css">

    <!-- Ressources personnelles -->
    <link href="<?php echo URL; ?>/css/global.css" rel="stylesheet">
    <script src="<?php echo URL; ?>js/functions.js"></script>
    <!-- css utilisée dans tout le site -->

    <link href="<?php echo URL; ?>/includes/head_css.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['id'])) {
        ?>  
        <nav class="navi">
            <div class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a class="navbar-brand" href="<?php echo URL; ?>"><div class="robot"><i class="fas fa-robot robot"></i> Projet-Robotique</div></a>
                <div class="" id="navbarsExample03 white">
                    <!-- TODO : A FIXER LES CLASSES -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Droits d'accès<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--<li><a class="dropdown-item" href="<?php //echo URL; ?>droits/attribution_fnc_per.php">Attribution fonctions</a></li>
                                <li><a class="dropdown-item" href="<?php //echo URL; ?>droits/attribution_aut_fnc.php">Attribution autorisations</a></li>-->
                                <li><a class="dropdown-item" href="<?php echo URL; ?>droits/fonctions.php">Fonctions</a></li>
                                <li><a class="dropdown-item" href="<?php echo URL; ?>droits/autorisations.php">Autorisations</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personnes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo URL; ?>personne/show_personne.php">Liste des personnes</a></li>
                                <li><a class="dropdown-item" href="<?php echo URL; ?>personne/add_personne.php">Ajouter une personne</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cours<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo URL; ?>cours/affichage_cours.php">Liste & modification des cours</a></li>
                                <li><a class="dropdown-item" href="<?php echo URL; ?>cours/add_cours.php">Ajouter un cours</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>logout.php">Déconnection</a></li>
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
