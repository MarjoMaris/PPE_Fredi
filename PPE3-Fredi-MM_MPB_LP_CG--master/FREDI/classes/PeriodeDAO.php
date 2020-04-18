<?php
require_once('periode.php');
require_once('DAO.php');

class PeriodeDAO extends DAO
{
    //constructeur
    public function __construct()
    {
        parent::__construct();
    }

    //Retourne toutes les periodes
    public function findAll()
    {
        $sql = "SELECT * FROM periode";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
        }

        $periode = array();
        foreach ($rows as $row) {
            $periode[] = new periode($row);
        }

        return $periode;
    }

    //Récupération de l'année pour la page
    public function find($annee)
    {
        $sql = "select * from periode where annee= :annee";
        try {
            $params = array(":annee" => $annee);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $periode=null;
        if ($row) {
            $periode = new Periode($row);
        }
        
        return $periode;
    }

    //Ajoute un periode
    public function insertPeriode($annee, $forfait_km, $code_statut) {
        $sql = "INSERT INTO periode (annee, forfait_km, code_statut) ";
        $sql .= "VALUES (:annee, :forfait_km, :code_statut)";

        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute(array(
                ':annee' => $annee,
                ':forfait_km' => $forfait_km,
                ':code_statut' => $code_statut
            ));
        } catch (PDOException $ex) {
            throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
        }

        header('Location: Consult_periode.php');
    }

    //Gère la modification de période
    public function update(periode $periode)
    {
        $sql = "update periode set annee=:annee, forfait_km=:forfait_km where annee=:annee";
        $params = array(
          ":annee" => $periode->getAnnee(),
          ":forfait_km" => $periode->getForfait_km()
        );
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;  
        header('Location: consult_periode.php');
    }

    //Suppression de l'année
    public function delete($annee)
    {
        $sql = "delete from periode where annee= :annee";
        $params = array(
        ":annee" => $annee
        );
        try {
            $sth = $this->executer($sql, $params); 
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;  
        }

        public function updateStatut(periode $periode)
    {
        $sql = "update periode set code_statut=:code_statut where annee=:annee";
        $params = array(
          ":code_statut" => $periode->getCode_statut(),
          ":annee" => $periode->getAnnee()
        );
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;  
        header('Location: consult_periode.php');
    }
}
