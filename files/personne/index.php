<?php

require("./../config/config.inc.php");

require_once(WAY . "/includes/autoload.inc.php");

?>

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
        
    </head>

    <body>
        <?php
        
        $per = new Personne();
        $personnes = $per->get_all();
        
//        echo '<pre>';
//        print_r($personnes);
//        echo '</pre>';
        
        ?>
        <div class="container">
            <div class="">
                <div class="h3">
                    AFFICHAGE DES PERSONNES
                </div>
                <div class="body">
                    <table class="table">
              <thead class="thead-black">
                <tr>
                  <th scope="col">Name & Surname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">NPA</th>
                  <th scope="col">Date de Naissance</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($personnes as $personne){
                    echo "<tr>";
                    echo "<td>".$personne['nom_per']." ".$personne['prenom_per']."</td>";
                    echo "<td>".$personne['mail_per']."</td>";
                    echo "<td>".$personne['adresse_per']."</td>";
                    echo "<td>".$personne['npa_per']." ".$personne['lieu_per']."</td>";
                    echo "<td>".$personne['date_per']."</td>";
                    echo "</tr>";
                }
                ?>
              </tbody>
            </table>
                    
                </div>
            </div>    
        </div>

    </body>
    <script src="./js/add_personne.js"></script>