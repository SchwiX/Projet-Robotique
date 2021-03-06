<?php
    session_start();
    $aut = "USR_USR";
    require("./../config/config.inc.php");
    require(WAY . "./includes/secure.inc.php");
    require_once(WAY . '/includes/autoload.inc.php');
    require_once(WAY . '/includes/head.inc.php');
    $per = new Personne();
    $personnes = $per->get_all();
    ?>
<div class="container">
    <div class="h3">
        Affichage personne
    </div>
    <div class="body">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom & Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">NPA</th>
                    <th scope="col">Date de Naissance</th>
                </tr>
            </thead>
            <?php
            foreach($personnes as $personne){
                echo "<tr>";
                echo "<td>".$personne['nom_per']." ".$personne['prenom_per']."</td>";
                echo "<td>".$personne['mail_per']."</td>";
                echo "<td>".$personne['adresse_per']."</td>";
                echo "<td>".$personne['npa_per']." ".$personne['lieu_per']."</td>";
                echo "<td>".$personne['date_per']."</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

</body>
<script src="./js/add_personne.js"></script>

</html>
