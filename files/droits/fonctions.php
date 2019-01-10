<?php
session_start();
$aut="USR_USR";
require("./../config/config.inc.php");
require(WAY . "./includes/secure.inc.php");
require_once(WAY . "/includes/head.inc.php");
?>
<div class="container">
    <div class="row">
        <div class="header">
            <h3>Fonctions</h3>
        </div>
    </div>

    <!-- Parties ouvertes -->
    <div class="col-md-12">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                Ajouter une fonction
            </div>
            <div class="panel-body">
                <form id="add_fonction_form">
                    <!-- Nom -->
                    <div class="form-group row">
                        <label for="nom_fnc" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom_fnc" name="nom_fnc" placeholder="Nom de la fonction">
                        </div>
                    </div>

                    <!-- Abréviation -->
                    <div class="form-group row">
                        <label for="abr_fnc" class="col-sm-2 col-form-label">Abreviation de la fonction</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abr_fnc" name="abr_fnc" placeholder="Abreviation">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label for="desc_fnc" class="col-sm-2 col-form-label">Description de la fonction</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc_fnc" name="desc_fnc" rows="5" placeholder="Description"></textarea>
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

                <form id="del_fonction_form">
                    <div class="form-group row">
                        <label for="del_fnc" class="col-sm-2 col-form-label">Supprimer la fonction</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="del_fnc" name="fnc">
                                <option></option>
                                <?php
                                $fonction = new Fonction();
                                $tab_fnc = $fonction->get_all();
                                foreach ($tab_fnc AS $fnc) {
                                    echo '<option value="' . $fnc['id_fnc'] . '">' . $fnc['nom_fnc'] . '</option>';
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
<script src="./js/fonctions.js"></script>
