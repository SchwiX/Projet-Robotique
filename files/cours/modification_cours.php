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
    <!-- Custom styles for this template -->
    <link href="./css/css.css" rel="stylesheet">
    <?php require "./../config/config.inc.php"; ?>
    <?php require_once WAY . '/includes/autoload.inc.php'; ?>
    <?php
    $pdo = new PDO("mysql:dbname=" . BASE_NAME . ";host=" . SQL_HOST, SQL_USER, SQL_PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8",
                    PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC));
    ?>
    

</head>

<body>

    <div class="container">
        <div class="">
            <div class="h3">
                Liste de tous les cours
            </div>
            <div class="body">
                <form id="aff_cours_form" method="post" action="./modification_cours.php">
                    <table>
                        <div class="form-group row">   
                        <div class="h4">
                            Veuillez choisir l'option :
                            <select id="order" name="order">
                                <optgroup label="Ordrer par">
                                <option value="nom_cou" selected>Nom du cours</option>
                                <option value="mat">Matière du cours</option>
                                <option value="heure_debut">Heure du début du cours</option>
                                <option value="ref_prof">Enseignant du cours</option>
                                <option value="ref_salle_classe">Classe du cours</option>
                                </optgroup>
                            </select>
                        </div>
                            <div class="col-sm-offset-8 col-sm-2">
                            <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Afficher">
                            <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Afficher">
                        </div>
                        </div>
                        </table>
                        <div class="form-group row">
                        <table>
                        <form id="suppModif" method="post" action="./suppModif.php">
                        <?php
                        /*function affichage_all_cours($order){
                        
                        $query_affichage = "SELECT * FROM cours order BY " . $order;
                        return $query_affichage;
                        }*/
                        //$query_affichage_colonnes = "SHOW columns from cours";
                        
                        if($_POST){
                            $affichage = "SELECT * FROM cours order BY " . $_POST['order'];
                            //$affichage = "SELECT * FROM cours";
                            $stmt = $pdo->prepare($affichage);
                            $stmt->execute();
                            $tab_affichage = $stmt->fetchALL();
                            echo "<tr><th>Nom du cours</th><th>Matière enseignée</th><th>Heure du début de la leçon</th><th>Professeur</th><th>Salle de classe</th></tr>";
                            foreach($tab_affichage AS $affichage){
                                echo "<tr>";
                                echo "<td>" . $affichage['nom_cour'] . "</td>";
                                echo "<td>" . $affichage['mat_cour'] . "</td>";
                                echo "<td>" . $affichage['hrs_debut'] . "</td>";
                                echo "<td>" . $affichage['ref_prof'] . "</td>";
                                echo "<td>" . $affichage['ref_salle'] . "</td>";
                                echo "<td>" . "<input type=\"submit\" value=\"Modifier\" name=\"modif\">";
                                echo "<td>" . "<input type=\"submit\" value=\"Supprimer\"" . "href=\"suppModif.php?id=\"" . $affichage['id_cou'] . "\">" . "</td>";
                                echo "</tr>";
                            }
                        }
                            
                        
                        /*
                        $query_prof = "SELECT id_prof, nom_prof, prenom_prof FROM prof";
                                    $stmt = $pdo->prepare($query_prof);
                                    $stmt->execute();
                                    $tab_prof = $stmt->fetchALL();
                                    
                                    foreach($tab_prof AS $prof){
                                    echo "<option name=\"" . $prof['id_prof'] . "\" id=\"" . $prof['id_prof'] . "\">" . $prof['nom_prof'] . " " . $prof['prenom_prof'] . "</option>";
                        */
                        
                        
                      ?>                             
                        </form>    
                    </table>
                    </div>
                    
                    <!-- Zone de notification -->
                    <!--<div class="alert" id="alert">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong class="bold"></strong><span class="message"></span>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
</body>