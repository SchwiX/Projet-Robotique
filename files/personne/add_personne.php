    <?php
    session_start();
    $aut = "USR_USR";
    require("./../config/config.inc.php");
    require(WAY . "./includes/secure.inc.php");
    require_once(WAY . '/includes/autoload.inc.php');
    require_once(WAY . '/includes/head.inc.php');
    ?>
            <div class="">
                <div class="h3">
                    Ajouter une personne
                </div>
                <div class="body">
                    <form id="add_per_form">
                        <div>
                            <div class="form-group row">
                                <label for="nom_per" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom_per" name="nom_per" placeholder="Nom">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom_per" class="col-sm-2 col-form-label">Prenom</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prenom_per" name="prenom_per" placeholder="Prénom">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_per" class="col-sm-2 col-form-label">Date de naissance</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="date_per" name="date_per" placeholder="Date de naissance">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel_per" class="col-sm-2 col-form-label">Téléphone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="tel_per" name="tel_per" placeholder="Téléphone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="addr_per" class="col-sm-2 col-form-label">Adresse</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="adresse_per" name="adresse_per" placeholder="Adresse">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lieu_per" class="col-sm-2 col-form-label">Ville</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lieu_per" name="lieu_per" placeholder="Mail">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="npa_per" class="col-sm-2 col-form-label">NPA</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="npa_per" name="npa_per" placeholder="NPA">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mail_per" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mail_per" name="mail_per" placeholder="Mail">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pass_per" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass_per" name="pass_per" placeholder="Password">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="conf_pass_per" class="col-sm-2 col-form-label">Confirmation password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="conf_pass_per" name="conf_pass_per" placeholder="Password">
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
                        </div>
                    </form>
                </div>    
            </div>

    </body>
    <script src="./js/add_personne.js"></script>