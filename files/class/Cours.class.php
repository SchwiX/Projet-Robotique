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
    private $nom_cou;
    private $mat;
    private $heure_debut;
    private $heure_fin;
    private $ref_prof;
    private $ref_classe;
    private $ref_salle_classe;

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

            $this->set_nom_cou($tab['nom_cou']);
            $this->set_mat($tab['mat']);
            $this->set_heure_debut($tab['heure_debut']);
            $this->set_heure_fin($tab['heure_fin']);
            $this->set_ref_prof($tab['ref_prof']);
            $this->set_ref_classe($tab['ref_classe']);
            $this->set_ref_salle_classe($tab['ref_salle_classe']);
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
        $args['nom_cou'] = $tab['nom_cou'];
        $args['mat'] = $tab['mat'];
        $args['heure_debut'] = $tab['heure_debut'];
        $args['heure_fin'] = $tab['heure_fin'];
        $args['ref_prof'] = $tab['ref_prof'];
        $args['ref_classe'] = $tab['ref_classe'];
        $args['ref_salle_classe'] = $tab['ref_salle_classe'];

        //requête
        $query = "INSERT INTO cours SET "
                . "nom_cou = :nom_cou, "
                . "mat = :mat, "
                . "heure_debut = :heure_debut, "
                . "heure_fin = :heure_fin, "
                . "ref_prof = :ref_prof, "
                . "ref_classe = :ref_classe, "
                . "ref_salle_classe = :ref_salle_classe";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
        } catch (Exception $e) {
            return false;
        }
        return $this->pdo->lastInsertId();
    }
    
    
    public function check($nom_cou) {
        $query = "SELECT nom_cou FROM cours WHERE nom_cou=:nom_cou LIMIT 1";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":nom_cou" => strtolower($nom_cou)));
            $tab = $stmt->fetch();

            if ($tab["nom_cou"] == strtolower($nom_cou)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }
    

public function check_no_doublon($nom_cou) {

        $query = "SELECT * FROM cours WHERE nom_cou = :nom_cou LIMIT 1"; //probablement une faute ici
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':nom_cou'] = $nom_cou;

            $stmt->execute($args);
            $tab = $stmt->fetch();
            if ($tab["nom_cou"] == strtolower($nom_cou)) {
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
    
    function set_nom_cou($nom_cou){
        $this->nom_cou = $nom_cou;
    }
    
    function set_mat($mat){
        $this->mat = $mat;
    }
    
    function set_heure_debut($heure_debut){
        $this->heure_debut = $heure_debut;
    }
    
    function set_heure_fin($heure_fin){
        $this->heure_fin = $heure_fin;
    }
    
    function set_ref_prof($ref_prof){
        $this->ref_prof = $ref_prof;
    }
    
    function set_ref_classe($ref_classe){
        $this->ref_classe = $ref_classe;
    }
    
    function set_ref_salle_classe($ref_salle_classe){
        $this->ref_salle_classe = $ref_salle_classe;
    }
    
function get_id_cou(){
    return $this->id_cou;
}
}

















