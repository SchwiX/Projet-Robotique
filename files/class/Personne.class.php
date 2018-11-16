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
