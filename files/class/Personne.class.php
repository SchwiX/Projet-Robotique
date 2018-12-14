<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personne
 *
 * @author cp-15cht
 */
class Personne {

    private $id_per;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $news_letter;

    public function __construct($id = null) {

        parent::__construct();

        if ($id) {
            $this->set_id_per($id);
            $this->init();
        }
    }

    //Initialisation
    public function init() {
        $query = "SELECT * FROM t_personnes WHERE id_per=:id_per";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_per'] = $this->get_id_per();

            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_per']);
            $this->set_prenom($tab['prenom_per']);
            $this->set_email($tab['email_per']);
            $this->set_password($tab['password_new_per']);
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

}

    //Ajout d'une personne dans la base
    public function add($tab) {
        //$tab d'arguments
        $args['nom_per'] = $tab['nom_per'];
        $args['prenom_per'] = $tab['prenom_per'];
        $args['date_per'] = $tab['date_per'];
        $args['tel_per'] = $tab['tel_per'];
        $args['addr_per'] = $tab['addr_per'];
        $args['lieu_per'] = $tab['lieu_per'];
        $args['npa_per'] = $tab['npa_per'];
        $args['mail_per'] = $tab['mail_per'];

        //requête
        $query = "INSERT INTO personnes SET "
                . "nom_per = :nom_per, "
                . "prenom_per = :prenom_per, "
                . "date_per = :date_per, "
                . "tel_per = :tel_per, "
                . "addr_per = :addr_per, "
                . "lieu_per = :lieu_per, "
                . "npa_per = :npa_per, "
                . "mail_per = :mail_per ";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
        } catch (Exception $e) {
            return false;
        }
        return $this->pdo->lastInsertId();
    }

public function check_no_doublon($nom_per) {

        $query = "SELECT * FROM personnes WHERE  = :";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':nom_per'] = $nom_per;

            $stmt->execute($args);
            $tab = $stmt->fetch();
            if (is_array($tab)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }



function set_id_per($id_per) {
        $this->id_per = $id_per;
    }



















