<?php 
class controleurDAO extends DAO{

function __construct(){

    parent::__construct();

}

function findAllAdherents(){

    $sql= 'SELECT * FROM adherent';
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function getNoteAdherent($id_utilisateur){
    // Retourne la note de l'utilisateur pour la période ouverte
    $sql= 'SELECT * FROM note WHERE code_statut = "0" AND id_utilisateur = :id_utilisateur';
    $sth = $this->pdo->prepare($sql);
    $sth->execute(array(
        ':id_utilisateur' => 'id_utilisateur'
    ));
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}

function getId_note(){

    $sql= 'SELECT id_note FROM note';
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}


} //fin class
