    <?php
    session_start();
    $aut = "USR_USR";
    require("./../config/config.inc.php");
    require(WAY . "./includes/secure.inc.php");
    require_once(WAY . '/includes/autoload.inc.php');
    require_once(WAY . '/includes/head.inc.php');

    $Cour = new Cours();
    ?>
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
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="./js/add_cours.js"></script>