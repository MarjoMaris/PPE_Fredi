<?php

class NoteDAO extends DAO {

    /**
    * Constructeur
    */

    function __construct() {
        parent::__construct();
    }

    /** 
    * Lecture d'une Note par son ID
    * @param int ID de le Note
    * @return \Note
    */

    public function find($id)
    {
        $sql = "SELECT * FROM note WHERE id_note= :id_note";
        try {
            $params = array(":id_note" => $id);
            $sth=$this->executer($sql, $params);
            $row = $sth->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $note=null;
        if ($row) {
            $note = new Note($row);
        }
        // Retourne l'objet métier
        return $note;
    } // function find()
  
    /**
    * Lecture de tous les noteS
    * @return array
    */
    public function findAll()
    {
        $sql = "SELECT * FROM note";
        try {
            $sth=$this->executer($sql);
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        $les_notes = array();
        foreach ($rows as $row) {
            $les_notes[] = new Note($row);
        }
        // Retourne un tableau d'objets "note"
        return $les_notes;
    } // function findAll()
 
    /**
    * Ajout d'une note
    * @param \note
    * @return int Nombre de mises à jour
    */

   public function insert($id_recuperer){

        $sql = "INSERT INTO note(id_utilisateur) VALUES(:id_utilisateur)";
        $params = array(":id_utilisateur" => $id_recuperer );     
        try {
            $sth = $this->executer($sql, $params);
            $nb = $sth->rowcount();
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage());
        }
        return $nb;
    
    }

}