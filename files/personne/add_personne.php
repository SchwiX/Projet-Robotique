<!doctype html>
<html lang="fr">
    <head>
        <!--meta http-equiv="Content-Security-Policy" content="default-src 'self' ;style-src https://* 'unsafe-inline'; img-src https://* ;  child-src 'none'; "--> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Roberta</title>

        <!-- css utilisée dans tout le site -->

        <!-- css spécifique à chaque module (dossier) -->
        <link rel="stylesheet" href="css/style.css">

        <!--- css de bootatrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--- JQuery -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!--- JQuery validate -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>

    </head>
    <body>

        <div class="col-md-12">
            <div class="panel panel-primary ">
                <div class="panel-heading h3">
                    Ajouter une personne
                </div>
                <div class="panel-body">
                    <form id="add_per_form">
                        <div>
                            <div class="form-group row">
                                <label for="nom_per" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom_per" value="email@example.com">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom_per" class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom_per" value="email@example.com">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mail_per" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mail_per" value="email@example.com">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass_per" placeholder="Password">
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
    <script src="./js/add_personne.js"></script>