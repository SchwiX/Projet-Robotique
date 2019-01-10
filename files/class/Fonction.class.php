<?php

Class Fonction EXTENDS Projet {

    //Administrateur de la plateforme, bénéficie de tous les accès

    private $id_fnc;
    private $nom;
    private $abreviation;
    private $description;

    public function __construct($id = null) {

        parent::__construct($id);

        if ($id) {
            $this->set_id_fnc($id);
            $this->init();
        }
        //
    }

    /**
     * Initialisation de l'objet (l'id doit être setté)
     * @return boolean
     */
    public function init() {
        $query = "SELECT * FROM t_fonctions WHERE id_fnc=:id_fnc";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_fnc'] = $this->get_id_fnc();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_fnc']);
            $this->set_abreviation($tab['abr_fnc']);
            $this->set_description($tab['desc_fnc']);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * Ajoute une fonction dans la base de données
     * @param array tableau avec les propriétés de la fonction
     * @return int id de la fonction ajoutée
     */
    public function add($tab) {

        //Requete
        $query = "INSERT INTO t_fonctions SET "
                . "nom_fnc = :nom_fnc, "
                . "abr_fnc = :abr_fnc, "
                . "desc_fnc = :desc_fnc ";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($tab);
        } catch (Exception $e) {
            //echo $e;
            return false;
        }
        // retourne le dernier id inséré
        return $this->pdo->lastInsertId();
    }

    public function del($id_fnc) {

        //Requetes
        $query = "DELETE FROM t_fonctions "
                . "WHERE id_fnc=" . $id_fnc;

        $query2 = "DELETE FROM t_aut_fnc "
                . "WHERE id_fnc=" . $id_fnc;

        $query3 = "DELETE FROM t_fnc_per "
                . "WHERE id_fnc=" . $id_fnc;

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            $stmt = $this->pdo->prepare($query2);
            $stmt->execute();

            $stmt = $this->pdo->prepare($query3);
            $stmt->execute();
        } catch (Exception $e) {
            //echo $e;
            return false;
        }
        // retourne le dernier id inséré
        return true;
    }

    /**
     * Récupère la totalité de enregistrements de la table fonction dans l'ordre fourni 
     * @param string $order ordre à utiliser (par défaut :  nom
     * @return array tableau des fonctions
     */
    public function get_all($order = "nom_fnc") {

        $args[":order"] = $order;

        $query = "SELECT * FROM t_fonctions ORDER BY :order";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetchAll();
            return($tab);
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_tab_per_all_fnc() {
        $query = "Select * FROM t_fnc_per ORDER BY id_fnc";

        try {
            $stmt = $this->pdo->prepare($query);
            if ($stmt->execute()) {
                $tab = $stmt->fetchAll();
                $tab_fnc_per = Array();
                foreach ($tab as $row) {//Row example id_fnc : 1 , id_per : 104
                    //Une fonction peut avoir plusieurs personnes 
                    $tab_fnc_per[$row['id_fnc']][] = $row['id_per'];
                    //Ajoute un tableau de chaques fonctions dans $tab_fnc_per
                    //Et dans le tableau de chaques fonctions on va mettre l'id de la personne associée à la fonction
                    /*
                      Array
                      (
                      [1 (id_fnc) ] => Array
                      (
                      [0] => 104 (id_per)
                      [1] => 105
                      )
                      [2 (id_fnc) ] => Array
                      (
                      [0] => 106 (id_per)
                      [1] => 107
                      )

                      )
                     */
                }
                return $tab_fnc_per;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * ajoute une autorisation à la fonction
     * @param int $id_aut id de la autorisation
     * @return boolean Vrai =  autorisation ajoutée Faux = autorisation non ajoutée
     */
    public function add_aut($id_aut) {
        $query = "INSERT INTO t_aut_fnc SET "
                . "id_aut=:id_aut, "
                . "id_fnc=:id_fnc";

        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_fnc'] = $this->get_id_fnc();
            $args[':id_aut'] = $id_aut;
            if ($stmt->execute($args)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Rerire une autorisation à la fonction
     * @param int $id_aut id de la autorisation
     * @return boolean Vrai =  autorisation retirée Faux = autorisation non retirée
     */
    public function del_aut($id_aut) {
        $query = "DELETE FROM t_aut_fnc WHERE id_aut=:id_aut AND id_fnc=:id_fnc";

        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_fnc'] = $this->get_id_fnc();
            $args[':id_aut'] = $id_aut;
            $stmt->execute($args);
            if ($stmt->execute($args)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function get_tab_aut_all_fnc() {
        $query = "Select * FROM t_aut_fnc ORDER BY id_fnc";

        try {
            $stmt = $this->pdo->prepare($query);
            if ($stmt->execute()) {
                $tab = $stmt->fetchAll();
                $tab_fnc_per = Array();
                foreach ($tab as $row) {
                    $tab_fnc_per[$row['id_fnc']][] = $row['id_aut'];
                }
                return $tab_fnc_per;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function check_no_doublon($nom_fnc, $abr_fnc) {

        $query = 'SELECT * FROM t_fonctions WHERE nom_fnc="' . $nom_fnc . '" OR abr_fnc="'.$abr_fnc.'"';

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

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

    /**
     * ToString
     */
    public function __toString() {
        $str = "\n<pre>\n";
        foreach ($this AS $key => $val) {
            if ($key != "pdo") {
                $str .= "\t" . $key;
                $lengh_key = strlen($key);
                for ($i = strlen($key); $i < 20; $i++) {
                    $str .= "&nbsp;";
                }
                $str .= "=>&nbsp;&nbsp;&nbsp;" . $val . "\n";
            }
        }
        $str .= "\n</pre>";
        return $str;
    }

    /**
     * Set la propriété id de la class
     * @param string $nom 
     */
    public function set_id_fnc($id_fnc) {
        $this->id_fnc = $id_fnc;
    }

    /**
     * Get la propriété id de la class
     * @return string $nom 
     */
    public function get_id_fnc() {
        return $this->id_fnc;
    }

    /**
     * Set la propriété nom de la class
     * @param string $nom 
     */
    public function set_nom($nom) {
        $this->nom = $nom;
    }

    /**
     * Get la propriété nom de la class
     * @return string $nom 
     */
    public function get_nom() {
        return $this->nom;
    }

    /**
     * Set la propriété abréviation de la class
     * @param string $abreviation 
     */
    public function set_abreviation($abreviation) {
        $this->abreviation = $abreviation;
    }

    /**
     * Get la abréviation nom de la class
     * @return string $abreviation 
     */
    public function get_abreviation() {
        return $this->abreviation;
    }

    /**
     * Set la propriété abréviation de la class
     * @param string $abreviation 
     */
    public function set_description($description) {
        $this->description = $description;
    }

    /**
     * Get la description nom de la class
     * @return string $description 
     */
    public function get_description() {
        return $this->description;
    }

}
