    <?php
    require "./../config/config.inc.php";
    require_once WAY . '/includes/autoload.inc.php';
    require_once WAY . '/includes/head.inc.php';
    
    $Cour = new Cours();
    
    $cour_ac = $Cour->get_cour_from_id($_POST['id']);
    
    $select = ' selected="selected" ';
    ?>  
            <div class="">
                <div class="h3">
                    Modifier un cours
                </div>
                <div class="body">
                    <form id="modif_cours_form">
                        <div>
                            <div class="form-group row">
                                <label for="nom_cour" class="col-sm-2 col-form-label">Nom du cours</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nom_cour" name="nom_cour" placeholder="Nom du cours" value="<?php echo $cour_ac['nom_cour'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mat_cour" class="col-sm-2 col-form-label">Matière</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mat_cour" name="mat_cour" placeholder="Matière enseignée" value="<?php echo $cour_ac['mat_cour'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hrs_debut" class="col-sm-2 col-form-label">Heure de début</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="hrs_debut" name="hrs_debut" placeholder="Début" value="<?php echo $cour_ac['hrs_debut'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hrs_fin" class="col-sm-2 col-form-label">Heure de fin</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="hrs_fin" name="hrs_fin" placeholder="Début" value="<?php echo $cour_ac['hrs_fin'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_prof" class="col-sm-2 col-form-label">Professeur</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="ref_prof" name="ref_prof">
                                        <?php
                                        $Arr_Prof = $Cour->get_profs();
                                        foreach ($Arr_Prof AS $prof) {
                                            if($prof['id_prof'] == $cour_ac['ref_prof']){
                                                echo "<option value=\"" . $prof['id_prof']."\"". $select .">" . $prof['nom_per'] . " " . $prof['prenom_per'] . "</option>";
                                            }else{
                                                echo "<option value=\"" . $prof['id_prof'] . "\">" . $prof['nom_per'] . " " . $prof['prenom_per'] . "</option>";
                                            }
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
                                            if($classe['id_cla'] == $cour_ac['ref_classe']){
                                                echo "<option value=\"" . $classe['id_cla']."\"". $select .">" . $classe['nom_cla'] . "</option>";
                                            }else{
                                                echo "<option value=\"" . $classe['id_cla'] . "\">" . $classe['nom_cla'] . "</option>";
                                            }
                                        }
                                        ?>
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
                                            if($sal['id_salle'] == $cour_ac['ref_salle']){
                                                echo "<option value=\"" . $sal['id_salle']."\"". $select .">" . $sal['nom_salle'] . ", " . $sal['lieu_salle'] . "</option>";
                                            }else{
                                                echo "<option value=\"" . $sal['id_salle'] . "\">" . $sal['nom_salle'] . ", " . $sal['lieu_salle'] . "</option>";
                                            }
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
    <script src="./js/modif_cours.js"></script>