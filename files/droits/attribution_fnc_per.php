<?php
session_start();
$aut = "USR_USR";
require_once("./../config/config.inc.php");
require_once(WAY . "./includes/secure.inc.php");
require_once(WAY . "/includes/head.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
?>

<div class="col-md-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            Attribution des fonctions
        </div>
        <div class="panel-body">
            <div class="tab_en-tete"></div>
            
            <?php
            $fnc = new Fonction(); //Crée la fonction

            $tab_fnc = $fnc->get_all(); //Retourne toutes les fonctions 

            $tab_per_fnc = $fnc->get_tab_per_all_fnc();
            ?>


            <table class="table table-bordered fnc_per loading_td">
               <tr>
                  <th>Nom, prénom</th>
                  <?php
                  foreach($tab_fnc as $fonction){
                     echo "<th>";
                     echo $fonction['nom_fnc'];
                     echo "</th>";
                  }
                  ?>
               </tr>
               <?php
               $per = new Personne();
               $tab_per = $per->get_all();
               
               
               
              // echo "<pre>";
               //int_r($tab_per);
               //echo "</pre>";
               foreach ($tab_per as $personne) {
                  echo "<tr>";
                  echo "<td>";
                  echo $personne['nom_per']." ".$personne['prenom_per'];
                  echo "</td>";
                  
                  foreach ($tab_fnc as $fonction){
                     echo "<td>";
                     echo "<input type=\"checkbox\" id=\"auth_".$personne['id_per']."_".$fonction['id_fnc']."\" class=\"form-control auth\" id_fnc=\"".$fonction['id_fnc']."\" id_per=\"".$personne['id_per']."\" ";
                     if(isset($tab_per_fnc[$fonction['id_fnc']])){
                        if(in_array($personne['id_per'],$tab_per_fnc[$fonction['id_fnc']])){
                           echo " checked=\"checked\" ";
                        }
                     }
                        echo " >";
                        echo "</td>";
                    }


                    echo "</tr>";
                }
                ?>
            </table>
        </div>

    </div>    
</div>

</div>
<script src="./js/attribution_fnc_per.js"></script>