<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cours
 *
 * @author cp-16mer
 */
class Cours EXTENDS Projet{

    private $id_cou;
    private $nom_cour;
    private $mat_cour;
    private $hrs_debut;
    private $hrs_fin;
    private $ref_prof;
    private $ref_classe;
    private $ref_salle;

    public function __construct($id = null) {

        parent::__construct();

        if ($id) {
            $this->set_id_cou($id);
            $this->init();
        }
    }

    //Initialisation
    public function init() {
        $query = "SELECT * FROM cours WHERE id_cou=:id_cou";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_cou'] = $this->get_id_cou();

            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom_cou($tab['nom_cour']);
            $this->set_mat($tab['mat_cour']);
            $this->set_heure_debut($tab['hrs_debut']);
            $this->set_heure_fin($tab['hrs_fin']);
            $this->set_ref_prof($tab['ref_prof']);
            $this->set_ref_classe($tab['ref_classe']);
            $this->set_ref_salle_classe($tab['ref_salle']);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    
    
    
    
    
    public function __toString(){
        $str = "\n<pre>\n";
        foreach($this AS $key => $val){
            if($key != "pdo"){
                $str .= "\t".$key;
                $lengh_key = strlen($key);
                for($i=strlen($key);$i<20;$i++){
                    $str .= "&nbsp;";
                }
                $str .= "=>&nbsp;&nbsp;&nbsp;".$val."\n";
            }
        }
        $str .= "\n</pre>";
        return $str;
    }


    //Ajout d'un cours dans la base
    public function add($tab) {
        //$tab d'arguments
        $args['nom_cour'] = $tab['nom_cour'];
        $args['mat_cour'] = $tab['mat_cour'];
        $args['hrs_debut'] = $tab['hrs_debut'];
        $args['hrs_fin'] = $tab['hrs_fin'];
        $args['ref_prof'] = $tab['ref_prof'];
        $args['ref_classe'] = $tab['ref_classe'];
        $args['ref_salle'] = $tab['ref_salle'];

        //requête
        $query = "INSERT INTO cours SET "
                . "nom_cour = :nom_cour, "
                . "mat_cour = :mat_cour, "
                . "hrs_debut = :hrs_debut, "
                . "hrs_fin = :hrs_fin, "
                . "ref_prof = :ref_prof, "
                . "ref_classe = :ref_classe, "
                . "ref_salle = :ref_salle";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
        } catch (Exception $e) {
            return false;
        }
        return $this->pdo->lastInsertId();
    }
    
    
    public function check($nom_cour) {
        $query = "SELECT nom_cour FROM cours WHERE nom_cour=:nom_cour LIMIT 1";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":nom_cour" => strtolower($nom_cour)));
            $tab = $stmt->fetch();

            if ($tab["nom_cour"] == strtolower($nom_cour)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
    

public function check_no_doublon($nom_cour) {

        $query = "SELECT * FROM cours WHERE nom_cour = :nom_cour LIMIT 1";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':nom_cour'] = $nom_cour;

            $stmt->execute($args);
            $tab = $stmt->fetch();
            if ($tab["nom_cour"] == strtolower($nom_cour)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }


function set_id_cou($id_cou) {
        $this->id_cou = $id_cou;
    }
    
    function set_nom_cou($nom_cour){
        $this->nom_cour = $nom_cour;
    }
    
    function set_mat($mat_cour){
        $this->mat_cour = $mat_cour;
    }
    
    function set_heure_debut($hrs_debut){
        $this->hrs_debut = $hrs_debut;
    }
    
    function set_heure_fin($hrs_fin){
        $this->hrs_fin = $hrs_fin;
    }
    
    function set_ref_prof($ref_prof){
        $this->ref_prof = $ref_prof;
    }
    
    function set_ref_classe($ref_classe){
        $this->ref_classe = $ref_classe;
    }
    
    function set_ref_salle_classe($ref_salle){
        $this->ref_salle = $ref_salle;
    }
    
function get_id_cou(){
    return $this->id_cou;
}
}

















