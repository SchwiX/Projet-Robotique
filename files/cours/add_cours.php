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

        <?php
        require "./../config/config.inc.php";
        require_once(WAY . "/includes/autoload.inc.php");
        ?>
        <?php
        $Cour = new Cours();

        $pdo = new PDO("mysql:dbname=" . BASE_NAME . ";host=" . SQL_HOST, SQL_USER, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        ?>


    </head>

    <body>

        <div class="container">
            <div class="">
                <div class="h3">
                    Ajouter un cours
                </div>
                <div class="body">
                    <form id="add_cours_form">
                        <div>
                            <div class="form-group row">
                                <label for="nom_cour" class="col-sm-2 col-form-label">Nom du cours</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom_cour" name="nom_cour" placeholder="Nom du cours">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mat_cour" class="col-sm-2 col-form-label">Matière</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mat_cour" name="mat_cour" placeholder="Matière enseignée">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hrs_debut" class="col-sm-2 col-form-label">Heure de début</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="hrs_debut" name="hrs_debut" placeholder="Début">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hrs_fin" class="col-sm-2 col-form-label">Heure de fin</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="hrs_fin" name="hrs_fin" placeholder="Début">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_prof" class="col-sm-2 col-form-label">Professeur</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="ref_prof" name="ref_prof">
                                        <?php
                                        $Arr_Prof = $Cour->get_profs();

                                        foreach ($Arr_Prof AS $prof) {
                                            echo "<option value=\"" . $prof['id_prof'] . "\">" . $prof['nom_per'] . " " . $prof['prenom_per'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_classe" class="col-sm-2 col-form-label">Classes</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="ref_classe" name="ref_classe">
                                        <?php
                                        $Arr_classes = $Cour->get_classes();

                                        foreach ($Arr_classes AS $classe) {
                                            echo "<option value=\"" . $classe['id_cla'] . "\">" . $classe['nom_cla'] . "</option>";
                                        }
                                        ?>
                                        <!--<option value="3">test</option>-->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_salle" class="col-sm-2 col-form-label">Salle de classe</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="ref_salle" name="ref_salle">
                                        <?php
                                        $Arr_salles = $Cour->get_salles();

                                        foreach ($Arr_salles AS $sal) {
                                            echo "<option value=\"" . $sal['id_salle'] . "\">" . $sal['nom_salle'] . ", " . $sal['lieu_salle'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Bouton submit et reset -->
                        <div class="form-group row">
                            <div class="col-sm-offset-8 col-sm-2">
                                <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Ajouter">
                            </div>
                            <div class="col-sm-2">
                                <input type="reset" class="form-control btn btn-warning" id="reset_conf" value="Annuler">
                            </div>
                        </div>

                        <!-- Zone de notification -->
                        <div class="alert" id="alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong class="bold"></strong><span class="message"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="./js/add_cours.js"></script>