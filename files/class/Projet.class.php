<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projet
 *
 * @author cp-15cht
 */
class Projet {
    protected $pdo;

    public function __construct($id = null){
        
      $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD, 
                           array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
      if($id){
         $this->init($id);
      }
        
   }
   
   
    /**
     * Renvoie la liste de toutes les parties ouvertes par jeu ou de tous les jeux
     * @param int $id_jeu id du jeu [optionnel]
     * @return tableau des parties ouvertes ou false
     */
    public function get_open_parties($id_jeu = null, $from_time = null){
        
        $query = "SELECT *,UNIX_TIMESTAMP(PRT.date_ouverture_prt) AS date_ouverture_prt, COUNT(JOU.id_per) AS nb_jou "
                    ."FROM t_parties PRT  "
                    ."LEFT JOIN t_joueurs JOU ON PRT.id_prt=JOU.id_prt  "
                    ."JOIN t_jeux JEU ON JEU.id_jeu=PRT.id_jeu  "
                    ."WHERE PRT.fin_prt IS NULL  ";
        
        $args[':order'] = "date_ouverture_prt";

        if($id_jeu !== null){
            $query .= " AND id_jeu=:id_jeu GROUP BY PRT.id_prt ";
            $args[':id_jeu'] = $id_jeu;
        }
        
        if($from_time !== null){
            $query .= " AND UNIX_TIMESTAMP(PRT.date_ouverture_prt) > :from_time ";
            $args[':from_time'] = $from_time;
        }
        
        $query .= " GROUP BY PRT.id_prt ";
        $query .= " ORDER BY :order DESC";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetchAll();
            //print_r($tab);
         
        } catch (Exception $e) {
            return false;
        }
        return $tab;
    }
    
    /**
     * Renvoie la liste de toutes les parties qui ont débutées par jeu ou de tous les jeux
     * @param int $id_jeu id du jeu [optionnel]
     * @return tableau des parties débutées ou false
     */
    public function get_run_parties($id_jeu = null, $from_time = null){
        
        $query = "SELECT *,UNIX_TIMESTAMP(PRT.db_prt) AS db_prt, COUNT(JOU.id_per) AS nb_jou "
                    ."FROM t_parties PRT  "
                    ."LEFT JOIN t_joueurs JOU ON PRT.id_prt=JOU.id_prt  "
                    ."JOIN t_jeux JEU ON JEU.id_jeu=PRT.id_jeu  "
                    ."WHERE PRT.fin_prt IS NULL  ";
        
        $args[':order'] = "db_prt";

        if($id_jeu !== null){
            $query .= " AND id_jeu=:id_jeu GROUP BY PRT.id_prt ";
            $args[':id_jeu'] = $id_jeu;
        }
        
        if($from_time !== null){
            $query .= " AND UNIX_TIMESTAMP(PRT.db_prt) > :from_time ";
            $args[':from_time'] = $from_time;
        }
        
        $query .= " GROUP BY PRT.id_prt ";
        $query .= " ORDER BY :order DESC";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetchAll();
            //print_r($tab);
         
        } catch (Exception $e) {
            return false;
        }
        return $tab;
    }
    
    public function get_last_modif_open_parties($last_modif,$id_jeu = null){
        if($id_jeu === null){
            $query = "SELECT * FROM t_parties WHERE fin_prt IS NULL AND UNIX_TIMESTAMP(MAX(time_last_action_jou))ORDER BY :order DESC";
            $args[':order'] = "date_ouverture_prt";
        }else{
            $query = "SELECT * FROM t_parties WHERE fin_prt IS NULL AND id_jeu=:id_jeu  ORDER BY :order DESC";
            $args[':order'] = "date_ouverture_prt";
            $args[':id_jeu'] = $id_jeu;
        }
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $tab = $stmt->fetchAll();
            //print_r($tab);
         
        } catch (Exception $e) {
            return false;
        }
        return $tab;
    }
}
?>