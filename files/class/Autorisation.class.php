<?php

Class Autorisation EXTENDS Projet {

    private $id_aut;
    private $nom;
    private $code;
    private $description;

    public function __construct($id = null) {
        if ($id) {
            $this->set_id_aut($id);
            $this->init();
        }
        parent::__construct($id);
    }

    /**
     * Initialisation de l'objet (l'id doit être setté)
     * @return boolean
     */
    public function init() {
        $query = "SELECT * FROM t_autorisations WHERE id_aut=:id_aut";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_aut'] = $this->get_id_aut();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_aut']);
            $this->set_code($tab['code_aut']);
            $this->set_description($tab['desc_aut']);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    function add_usr_and_adm_auto($tab) {
        $args['nom_aut'] = $tab['nom_aut'];
        $args['code_aut'] = "ADM_" . $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_adm_aut'];

        // Ajout de l'autorisation admin
        $id['ADM'] = $this->add($args);


        $args['code_aut'] = "USR_" . $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_usr_aut'];

        // Ajout de l'autorisation user
        $id['USR'] = $this->add($args);

        return $id;
    }

    /**
     * Ajoute une autorisation dans la base de données
     * @param array tableau avec les propriétés de l'autorisation
     * @return int id de la autorisation ajoutée
     */
    public function add($tab) {

        $query = "INSERT INTO t_autorisations SET "
                . "nom_aut = :nom_aut, "
                . "code_aut = :code_aut, "
                . "desc_aut = :desc_aut ";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($tab);
        } catch (Exception $e) {
            //echo $e;
            return false;
        }
        return $this->pdo->lastInsertId();
    }

    public function del($nom_aut, $code_aut) {

        //Selectionne les deux elements dans la base (USR et ADM)
        $query = 'SELECT id_aut '
                . 'FROM `t_autorisations` '
                . 'WHERE nom_aut="' . $nom_aut . '" AND code_aut LIKE "%' . substr($code_aut, 4) . '"';

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            $tab_id = $stmt->fetchAll();
        } catch (Exception $e) {
            return false;
        }

        //Supprime les deux autorisations avec les liens (t_aut_fnc)
        foreach ($tab_id AS $id) {
            $query = "DELETE FROM t_autorisations "
                    . "WHERE id_aut=" . $id['id_aut'];

            $query2 = "DELETE FROM t_aut_fnc "
                    . "WHERE id_aut=" . $id['id_aut'];

            try {
                $stmt = $this->pdo->prepare($query);
                $stmt->execute();

                $stmt = $this->pdo->prepare($query2);
                $stmt->execute();
            } catch (Exception $e) {
                //echo $e;
                return false;
            }
        }

        return true;
    }

    /* public function del($id_aut) {

      //Requetes
      $query = "DELETE FROM t_autorisations "
      . "WHERE id_aut=" . $id_aut;

      $query2 = "DELETE FROM t_aut_fnc "
      . "WHERE id_aut=" . $id_aut;

      try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      $stmt = $this->pdo->prepare($query2);
      $stmt->execute();
      } catch (Exception $e) {
      return false;
      }

      return true;
      } */

    /**
     * Récupère la totalité de enregistrements de la table autorisations dans l'ordre fourni 
     * @param string $order ordre à utiliser (par défaut :  nom
     * @return array tableau des autorisations
     */
    public function get_all($order = "nom_aut") {

        $args[":order"] = $order;

        $query = "SELECT * FROM t_autorisations ORDER BY :order";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetchAll();
            return($tab);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Récupère la totalité de enregistrements de la table autorisations dans l'ordre fourni 
     * @param string $order ordre à utiliser (par défaut :  nom
     * @return array tableau des autorisations
     */
    public function get_all_ADM() {

        $query = 'SELECT * FROM t_autorisations GROUP BY code_aut HAVING code_aut LIKE "ADM%"';

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $tab = $stmt->fetchAll();
            return($tab);
        } catch (Exception $e) {
            return false;
        }
    }

    public function check_no_doublon($code_aut) {

        $query = "SELECT * FROM t_autorisations WHERE code_aut LIKE \"%" . $code_aut . "\"";

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
    public function set_id_aut($id_aut) {
        $this->id_aut = $id_aut;
    }

    /**
     * Get la propriété id de la class
     * @return string $nom 
     */
    public function get_id_aut() {
        return $this->id_aut;
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
     * Set la propriété code de la class
     * @param string $code 
     */
    public function set_code($code) {
        $this->code = $code;
    }

    /**
     * Get le code nom de la class
     * @return string $code 
     */
    public function get_code() {
        return $this->code;
    }

    /**
     * Set la propriété description de la class
     * @param string $description 
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
