<?php
    require "./../config/config.inc.php";
    require_once WAY . '/includes/autoload.inc.php';
    require_once WAY . '/includes/head.inc.php';

    $Cour = new Cours();
    ?>
            <div class="">
                <div class="h3">
                    Liste de tous les cours
                </div>
                <div class="body">
                    <form id="aff_cours_form" method="post" action="./affichage_cours.php">
                        <table>
                            <div class="form-group row">   
                                <div class="h4">
                                    Veuillez choisir l'option :
                                    <select id="order" name="order">
                                        <optgroup label="Ordrer par">
                                            <option value="nom_cour" selected>Nom du cours</option>
                                            <option value="mat_cour">Matière du cours</option>
                                            <option value="hrs_debut">Heure du début du cours</option>
                                            <option value="hrs_fin">Heure de fin du cours</option>
                                            <option value="ref_prof">Enseignant du cours</option>
                                            <option value="ref_salle">Classe du cours</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-sm-offset-8 col-sm-2">
                                    <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Afficher">
                                </div>
                            </div>
                        </table>
                    </form>
                    <div class="form-group row">
                        <table>
                            
                                <?php
                                if ($_POST) {
                                    $arr_cours = $Cour->get_cour($_POST['order']);
                                    echo "<tr><th>Nom du cours</th><th>Matière enseignée</th><th>Heure du début de la leçon</th><th>heure de la fin du cours</th><th>Professeur</th><th>Salle de classe</th></tr>";
                                    foreach ($arr_cours AS $cou) {
                                        echo "<tr>";
                                        echo "<td>" . $cou['nom_cour'] . "</td>";
                                        echo "<td>" . $cou['mat_cour'] . "</td>";
                                        echo "<td>" . $cou['hrs_debut'] . "</td>";
                                        echo "<td>" . $cou['hrs_fin'] . "</td>";
                                        echo "<td>" . $cou['ref_prof'] . "</td>";
                                        echo "<td>" . $cou['ref_salle'] . "</td>";
                                        echo '<input type="hidden" name="id" value="' . $cou['id_cou'] . '">';
                                        
                                        //Modification
                                        echo "<td>";
                                        echo '<form id="modif_form" method="post" action="'. URL .'cours/modif_cours.php">';
                                        echo '<input type="hidden" id="id_cou" name="id_cou" value="' . $cou['id_cou'] . '">';
                                        echo "<input type=\"submit\" value=\"Modifier\">";
                                        echo "</form>";
                                        echo "</td>";
                                        
                                        //Suppression
                                        echo "<td>";
                                        echo '<form id="del_form">';
                                        echo '<input type="hidden" id="id_cou" name="id_cou" value="' . $cou['id_cou'] . '">';
                                        echo '<input type="submit" id="submit_conf" value="Supprimer">';
                                        echo "</form>";
                                        echo "</td>";
                                        
                                        echo "</tr>";
                                    }
                                }
                                ?>                             
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="./js/aff_cours.js"></script>
</html>