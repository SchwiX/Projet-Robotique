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

    <div class="container">
        <div class="">
            <div class="h3">
                Ajouter un cours
            </div>
            <div class="body">
                <form id="add_cours_form">
                    <div>
                        <div class="form-group row">
                            <label for="nom_cou" class="col-sm-2 col-form-label">Nom du cours</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nom_cou" placeholder="Nom du cours">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mat" class="col-sm-2 col-form-label">Matière</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mat" placeholder="Matière enseignée">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="heure_debut" class="col-sm-2 col-form-label">Heure de début</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="heure_debut" placeholder="Début">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="heure_fin" class="col-sm-2 col-form-label">Heure de fin</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="heure_fin" placeholder="Début">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ref_prof" class="col-sm-2 col-form-label">Professeur</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="ref_prof">
                                    <option>foreach de la table des personnes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ref_classe" class="col-sm-2 col-form-label">Classes</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="ref_classe">
                                    <option>foreach de la table des classes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ref_classe" class="col-sm-2 col-form-label">Salle de classe</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="ref_classe">
                                    <option>foreach de la table des salles</option>
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
                </form>
            </div>
        </div>
    </div>

</body>
<script src="./js/add_cours.js"></script>
