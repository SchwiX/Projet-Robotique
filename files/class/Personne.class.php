<?php

class Personne extends Projet {

    private $id_per;
    private $nom;
    private $prenom;
    private $adresse;
    private $lieu;
    private $npa;
    private $mail;
    private $password;
    private $tel;

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
            $this->set_mail($tab['mail_per']);
            $this->set_password($tab['password_new_per']);
        } catch (Exception $e) {
            return false;
        }
        return true;
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

    //Ajout d'une personne dans la base
    public function add($tab) {
        //$tab d'arguments
        $args['nom_per'] = $tab['nom_per'];
        $args['prenom_per'] = $tab['prenom_per'];
        $args['adresse_per'] = $tab['adresse_per'];
        $args['lieu_per'] = $tab['lieu_per'];
        $args['npa_per'] = $tab['npa_per'];
        $args['mail_per'] = $tab['mail_per'];
        $args['pass_per'] = $tab['pass_per'];
        $args['date_per'] = $tab['date_per'];
        $args['tel_per'] = $tab['tel_per'];

        //requête
        $query = "INSERT INTO personnes SET "
                . "nom_per = :nom_per, "
                . "prenom_per = :prenom_per, "
                . "adresse_per = :adresse_per, "
                . "lieu_per = :lieu_per, "
                . "npa_per = :npa_per, "
                . "mail_per = :mail_per, "
                . "pass_per = :pass_per, "
                . "date_per = :date_per, "
                . "tel_per = :tel_per ";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
        } catch (Exception $e) {
            return false;
        }
        return $this->pdo->lastInsertId();
    }

    function modify($id, $tab) {
        $args['id_per'] = $id;

        $args['nom_per'] = $tab['nom_per'];
        $args['prenom_per'] = $tab['prenom_per'];
        $args['date_per'] = $tab['date_per'];
        $args['tel_per'] = $tab['tel_per'];
        $args['addr_per'] = $tab['addr_per'];
        $args['lieu_per'] = $tab['lieu_per'];
        $args['npa_per'] = $tab['npa_per'];
        $args['mail_per'] = $tab['mail_per'];

        $query = "UPDATE `personnes` "
                . "SET `nom_per` = :nom_per, `prenom_per` = :prenom_per, "
                . "`date_per` = :date_per, `tel_per` = :tel_per, "
                . "`addr_per` = :addr_per, `lieu_per` = :lieu_per, "
                . "`npa_per` = :npa_per, `mail_per` = :mail_per"
                . "WHERE `personnes`.`id_per` = :id_per";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function get_all() {
        $query = "SELECT * FROM personnes";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $tab = $stmt->fetchAll();
            return $tab;
        } catch (Exception $exc) {
            return false;
        }
    }

    public function check_no_doublon($nom_per) {
        $query = "SELECT * FROM personnes WHERE  nom_per = :nom_per";
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

    public function check_mail($mail) {
        $query = "SELECT mail_per FROM personnes WHERE mail_per = :mail LIMIT 1";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":mail" => $mail));
            $tab = $stmt->fetch();
            if (strtolower($tab["mail_per"]) == $mail) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public function check_login($mail, $password) {
        $query = "SELECT id_per, pass_per, nom_per FROM personnes WHERE mail_per = :mail";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":mail" => $mail));
            $tab = $stmt->fetch();
            if ($password == $tab['pass_per']) {
                $_SESSION['id'] = $tab['id_per'];
                $user_browser_ip = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];
                $_SESSION['login_string'] = $tab['pass_per'] . $user_browser_ip;
                $_SESSION['mail'] = strtolower($mail);
                $_SESSION['name'] = $tab['nom_per'];
                return true;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public function check_connect($id) {
        $query = "SELECT id_per, pass_per, nom_per FROM personnes WHERE id_per = :id";
        
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":id" => $id));
            $tab = $stmt->fetch();

            if (isset($_SESSION['id'], $_SESSION['mail'], $_SESSION['login_string'])) {
                $user_browser_ip = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'];
                $test_string = $tab['pass_per'] . $user_browser_ip;
                if ($test_string == $_SESSION['login_string']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public function check_aut($aut_list) {
        $tab_aut = explode(";", $aut_list);

        $tab_aut_per = $this->get_all_aut();

        foreach ($tab_aut AS $aut) {
            if (in_array($aut, $tab_aut_per)) {
                return true;
            }
        }
        return false;
    }

    public function get_all_aut() {

        $query = "SELECT DISTINCT code_aut FROM autorisations AUT "
                . "JOIN aut_fnc AUF ON AUT.id_aut=AUF.ref_aut "
                . "JOIN fnc_per FNP ON AUF.ref_fnc =FNP.ref_fnc "
                . "WHERE FNP.ref_per = :id_per";

        $args[":id_per"] = $this->get_id_per();

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($args);
        $tab = $stmt->fetchAll();
        $new_tab = array();
        foreach ($tab as $aut) {
            $new_tab[] = $aut['code_aut'];
        }
        return ($new_tab);
    }

    function get_id_per() {
        return $this->id_per;
    }

    function get_nom() {
        return $this->nom;
    }

    function get_prenom() {
        return $this->prenom;
    }

    function get_adresse() {
        return $this->adresse;
    }

    function get_lieu() {
        return $this->lieu;
    }

    function get_npa() {
        return $this->npa;
    }

    function get_mail() {
        return $this->mail;
    }

    function get_password() {
        return $this->password;
    }

    function get_tel() {
        return $this->tel;
    }

    function set_id_per($id_per) {
        $this->id_per = $id_per;
    }

    function set_nom($nom) {
        $this->nom = $nom;
    }

    function set_prenom($prenom) {
        $this->prenom = $prenom;
    }

    function set_adresse($adresse) {
        $this->adresse = $adresse;
    }

    function set_lieu($lieu) {
        $this->lieu = $lieu;
    }

    function set_npa($npa) {
        $this->npa = $npa;
    }

    function set_mail($mail) {
        $this->mail = $mail;
    }

    function set_password($password) {
        $this->password = $password;
    }

    function set_tel($tel) {
        $this->tel = $tel;
    }

}
