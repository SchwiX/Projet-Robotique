<!doctype html>
<html lang="fr">

<head>
    <?php require "./../config/config.inc.php"; ?>
    <?php require_once WAY . '/includes/autoload.inc.php'; ?>
    <?php
    $pdo = new PDO("mysql:dbname=" . BASE_NAME . ";host=" . SQL_HOST, SQL_USER, SQL_PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8",
                    PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC));
    ?>
</head>

<body>
<?php
if isset($_POST['modif']){
    $id_modif = htmlentities($_POST['modif']);
    $query_modif = "SELECT * FROM cours WHERE id_cou=$id_modif";
    $stmt = $pdo->prepare($query_modif);
    $stmt->execute();
    $tab_modif = $stmt->fetchALL();
    echo "<form id=\"modif\" method=\"post\" action=\"suppModiff\">";
    foreach($tab_modif AS $modif){
        echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_nom_cour\" class=\"col-sm-2 col-form-label\">" . $modif['nom_cou'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<input type=\"text\" class=\"form-control\" id=\"modif_nom_cou\" name=\"modif_nom_cou\" placeholder=\"Nouvelle entrée pour le nom du cours\">";
            echo "</div>";
            echo "</div>";
        
            echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_mat_cour\" class=\"col-sm-2 col-form-label\">" . $modif['mat_cour'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<input type=\"text\" class=\"form-control\" id=\"modif_mat_cour\" name=\"modif_mat_cour\" placeholder=\"Nouvelle entrée pour la matière du cours\">";
            echo "</div>";
            
            echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_hrs_debut\" class=\"col-sm-2 col-form-label\">" . $modif['hrs_debut'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<input type=\"time\" class=\"form-control\" id=\"modif_hrs_debut\" name=\"modif_hrs_debut\" placeholder=\"Nouvelle entrée pour l'heure du début du cours\">";
            echo "</div>";
        
            echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_hrs_fin\" class=\"col-sm-2 col-form-label\">" . $modif['hrs_fin'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<input type=\"time\" class=\"form-control\" id=\"modif_hrs_fin\" name=\"modif_hrs_fin\" placeholder=\"Nouvelle entrée pour l'heure de la fin du cours\">";
            echo "</div>";
        
            /*echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_ref_prof\" class=\"col-sm-2 col-form-label\">" . $modif['reF_prof'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<select>";
            $query_prof = "SELECT id_cla, nom_cla FROM ref_prof";
            $stmt = $pdo->prepare($query_prof);
            $stmt->execute();
            $tab_classe = $stmt->fetchALL();                        
            foreach($tab_classe AS $classe){
            echo "<option name=\"" . $classe['id_cla'] . "\" id=\"" . $classe['id_cla'] . "\">" . $classe['nom_cla'] . "</option>";
            }
            echo "</select>";
            //echo "<input type=\"text\" class=\"form-control\" id=\"modif_ref_prof\" name=\"modif_ref_prof\" placeholder=\"Nouvelle entrée pour la sélection du professeur\">";
            echo "</div>";*/
            
            echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_ref_classe\" class=\"col-sm-2 col-form-label\">" . $modif['ref_classe'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<select>";
            $query_classe = "SELECT id_cla, nom_cla FROM classe";
            $stmt = $pdo->prepare($query_classe);
            $stmt->execute();
            $tab_classe = $stmt->fetchALL();                        
            foreach($tab_classe AS $classe){
            echo "<option name=\"" . $classe['id_cla'] . "\" id=\"" . $classe['id_cla'] . "\">" . $classe['nom_cla'] . "</option>";
            }
            echo "</select>";
            //echo "<input type=\"time\" class=\"form-control\" id=\"modif_hrs_fin\" name=\"modif_hrs_fin\" placeholder=\"Nouvelle entrée pour l'heure de la fin du cours\">";
            echo "</div>";
        
            echo "<div class=\"form-group row\">";
            echo "<label for=\"modif_ref_salle\" class=\"col-sm-2 col-form-label\">" . $modif['ref_salle'] . "</label>";
            echo "<div class=\"col-sm-10\">";
            echo "<select>";
            $query_salle_classe = "SELECT id_salle, nom_salle, lieu_salle FROM salle";
            $stmt = $pdo->prepare($query_salle_classe);
            $stmt->execute();
            $tab_salle_classe = $stmt->fetchALL();                        
            foreach($tab_salle_classe AS $salle){
            echo "<option name=\"" . $salle['id_salle'] . "\" id=\"" . $salle['id_salle'] . "\">" . $salle['nom_salle'] . ", " . $salle['lieu_salle'] . "</option>";
            }
            
            echo "<div class=\"form-group row\">";
            echo "<div class=\"col-sm-offset-8 col-sm-2\">";
            echo "<input type=\"submit\" class=\"form-control btn btn-primary submit\" id=\"modif_conf\" value=\"Modifier\">";
            echo "</div>";
            echo "<div class=\"col-sm-2\">";
            echo "<input type=\"reset\" class=\"form-control btn btn-warning\" id=\"reset_conf\" value=\"Annuler\">";
            echo "</div>";
            echo "</div>"; 
            }
    echo "</form>";
}
                        
if isset($_GET){                            
include_once 'modification_cours.php';
$id = htmlentities($_GET['id']);                       
$query_delete = "DELETE * FROM cours where id_cou=$id";    
}
?> 

                    
                    <!-- Zone de notification -->
                    <!--<div class="alert" id="alert">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong class="bold"></strong><span class="message"></span>
                    </div>-->
</body>