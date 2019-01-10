<?php
session_start();
$aut="USR_USR";
require("./../config/config.inc.php");
//require(WAY . "./includes/secure.inc.php");
require_once(WAY . "/includes/head.inc.php");
?>
<div class="row">
    <div class="header">
        <h3>Autorisations</h3>
    </div>
</div>

<!-- Parties ouvertes -->
<div class="col-md-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            Ajouter une autorisation
        </div>
        <div class="panel-body">
            <form id="add_autorisation_form">
                <!-- Nom -->
                <div class="form-group row">
                    <label for="nom_aut" class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nom_aut" name="nom_aut" placeholder="Nom de l'autorisation">
                    </div>
                </div>

                <!-- Code -->
                <div class="form-group row">
                    <label for="code_aut" class="col-sm-3 col-form-label">Code de l'autorisation</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="code_aut" name="code_aut" placeholder="XXX">
                    </div>
                </div>

                <!-- Description Administrateur -->
                <div class="form-group row">
                    <label for="desc_adm_aut" class="col-sm-3 col-form-label">Description de l'autorisation pour un administrateur</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="desc_adm_aut" name="desc_adm_aut" rows="5" placeholder="Description" ></textarea>
                    </div>
                </div>

                <!-- Description utilisateur -->
                <div class="form-group row">
                    <label for="desc_usr_aut" class="col-sm-3 col-form-label">Description de l'autorisation pour un  utilisateur</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="desc_usr_aut" name="desc_usr_aut" rows="5" placeholder="Description" ></textarea>
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

            <hr>

            <form id="del_autorisation_form">
                <div class="form-group row">
                    <label for="del_aut" class="col-sm-3 col-form-label">Supprimer l'autorisation</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="del_aut" name="aut">
                            <option></option>
                            <?php
                            $autorisation = new Autorisation();
                            $tab_aut = $autorisation->get_all_ADM();
                            foreach ($tab_aut AS $aut) {
                                echo '<option code_aut="' . $aut['code_aut'] . '" value="' . $aut['nom_aut'] . '">' . substr($aut['code_aut'], 4) . ' => ' . $aut['nom_aut'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" class="form-control btn btn-danger submit" value="Supprimer">
                    </div>
                </div>

            </form>

        </div>
    </div>    
</div>

</div>
<script src="./js/autorisations.js"></script>