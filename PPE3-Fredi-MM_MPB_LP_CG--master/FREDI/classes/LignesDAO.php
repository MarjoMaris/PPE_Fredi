<?php

class LignesDAO extends DAO {

    /**
    * Constructeur
    */

    function __construct() {
        parent::__construct();
    }

    /** 
    * Lecture d'une ligne par son ID
    * @param int ID de le ligne
    * @return \Lignes
    */

    public function find($id)
    {
        $sql = "SELECT * FROM ligne_de_frais WHERE id_ligne= :id_ligne";
        try {
            $params = array(":id_ligne" => $id);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $lignes=null;
        if ($row) {
            $lignes = new Lignes($row);
        }
        // Retourne l'objet métier
        return $lignes;
    } // function find()
  
    /**
    * Lecture de tous les lignes
    * @return array
    */
    public function findAll()
    {
        $sql = "SELECT * FROM ligne_de_frais";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_lignes = array();
        foreach ($rows as $row) {
            $les_lignes[] = new Lignes($row);
        }
        // Retourne un tableau d'objets "lignes"
        return $les_lignes;
    } // function findAll()
 
    /**
    * Ajout d'une ligne
    * @param \lignes
    * @return int Nombre de mises à jour
    */

   public function insert(lignes $lignes){

        $sql =  "INSERT INTO ligne_de_frais(date_frais, id_motif, lib_trajet, nb_km, cout_peage, cout_repas, cout_hebergement, annee, total_ligne) 
        VALUES (:date_frais, :id_motif, :lib_trajet, :nb_km, :cout_peage, :cout_repas, :cout_hebergement,:annee, :total_ligne)";
        $params = array(

            ":date_frais" => $lignes->getDate_frais(), 
            ":id_motif" => $lignes->getId_motif(), 
            ":lib_trajet" => $lignes->getLib_trajet(),
            ":nb_km" => $lignes->getNb_km(),   
            ":cout_peage" => $lignes->getCout_peage(), 
            ":cout_repas" => $lignes->getCout_repas(), 
            ":cout_hebergement" => $lignes->getCout_hebergement(),
            ":annee" => $lignes->getAnnee(),
            ":total_ligne" => $lignes->getTotal_ligne(),
            //":total_km" => $lignes->getTotal_km()
        );     


       
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    
    }

     /**
  * Modification d'une ligne
  * @param \lignes
  * @return int Nombre de mises à jour
  */

    function update(lignes $lignes){
        $sql = "UPDATE ligne_de_frais 
                SET id_ligne=:id_ligne,
                    date_frais=:date_frais,
                    lib_trajet=:lib_trajet,
                    cout_peage=:cout_peage,
                    cout_repas=:cout_repas,
                    cout_hebergement=:cout_hebergement,
                    nb_km=:nb_km,
                    total_km=:total_km,
                    total_ligne=:total_ligne,
                    code_statut=:code_statut,
                    id_motif=:id_motif,
                    annee=:annee,
                    id_note=:id_note
                WHERE id_ligne=:id_ligne";

        $params = array(
            ":id_ligne" => $lignes->getId_ligne(), 
            ":date_frais" => $lignes->getDate_frais(),  
            ":lib_trajet" => $lignes->getLib_trajet(),  
            ":cout_peage" => $lignes->getCout_peage(), 
            ":cout_repas" => $lignes->getCout_repas(), 
            ":cout_hebergement" => $lignes->getCout_hebergement(), 
            ":nb_km" => $lignes->getNb_km(),  
            ":total_km" => $lignes->getTotal_km(),
            ":total_ligne" => $lignes->getTotal_ligne(),
            ":code_statut" => $lignes->getCode_statut(),
            ":id_motif" => $lignes->getId_motif(),
            ":annee" => $lignes->getAnnee(),
            ":id_note" => $lignes->getId_note()
        );     

        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    }

     /**
  * Suppression d'une ligne
  * @param int ID d'unr ligne
  * @return int Nombre de mises à jour
  */

    function delete($id){
        $sql = "DELETE FROM ligne_de_frais 
                WHERE id_ligne=:id_ligne";

            $params = array(
                ":id_ligne"=>$id
            );     

            try {
                $sth = $this->executer($sql, $params);
                $nb = $sth->rowcount();
            } catch (PDOException $e) {
                die("Erreur lors de la requête SQL : " . $e->getMessage());
            }
            return $nb;
            }
    
}