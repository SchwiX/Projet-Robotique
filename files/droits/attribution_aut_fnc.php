<?php
session_start();
$aut = "USR_USR";
require './../config/config.inc.php';
require WAY . '/includes/secure.inc.php';
require_once WAY . '/includes/head.inc.php';
require_once WAY . '/includes/autoload.inc.php';
?>
<div class="container">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Attribution des autorisations
            </div>
            <div class="panel-body">
                <?php
                $aut = new Autorisation();
                $tab_aut = $aut->get_all();

                $fnc = new Fonction();
                $tab_fnc = $fnc->get_all();

                $tab_aut_fnc = $fnc->get_tab_aut_all_fnc();
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Autorisations</th>
                        <?php
                        foreach ($tab_fnc AS $fonction) {
                            echo '<th>' . $fonction['nom_fnc'] . '</th>';
                        }
                        ?>
                            </tr>
                            <?php
                            foreach ($tab_aut AS $aut) {
                                echo '<tr> <td> <b>';

                                if(substr($aut['code_aut'], 0, 3) == "ADM"){
                                    echo 'Administrateur - ';
                                }else{
                                    echo 'Utilisateur - ';
                                }

                                echo $aut['nom_aut'] . "</b><br>";
                                echo $aut['desc_aut'] . '</td>';

                                foreach ($tab_fnc AS $fonction) {
                                    echo '<td style="text-align:center;">' . '<input type="checkbox" id="auth_'.$aut['id_aut'].'_'.$fonction['id_fnc'].'" class="form-control auth" id_fnc="' . $fonction['id_fnc'] . '" id_aut="' . $aut['id_aut'] . '"';

                                    if (isset($tab_aut_fnc[$fonction['id_fnc']])) {
                                        if (in_array($aut['id_aut'], $tab_aut_fnc[$fonction['id_fnc']])) {
                                            echo ' checked="checked" ';
                                        }
                                    }

                                    echo '> ';
                                }

                                echo '</tr>';
                            }
                            ?>
                </table>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>

<script src="./js/attribution_aut_fnc.js"></script>
