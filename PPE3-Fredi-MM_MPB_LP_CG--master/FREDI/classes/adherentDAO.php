<?php 
class adherentDAO extends DAO{

function __construct(){

    parent::__construct();

}

function inscription(adherent $newAdherent){

    try {
        // Insertion
        $sql = 'INSERT INTO adherent (date_naissance, code_sexe, adresse1, adresse2, adresse3, numero_licence, prenom_responsable, nom_responsable) VALUES (:date_naissance, :code_sexe, :adresse1, :adresse2, :adresse3, :numero_licence, :prenom_responsable, :nom_responsable) WHERE id_utilisateur = :id_utilisateur';
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
        'date_naissance' => $newAdherent->get_date_naissance(),
        'code_sexe' => $newAdherent->get_code_sexe(),   
        'adresse1' => $newAdherent->get_adresse1(),
        'adresse2' => $newAdherent->get_adresse2(),
        'adresse3' => $newAdherent->get_adresse3(),
        'numero_licence' => $newAdherent->get_numero_licence(),
        'prenom_responsable' => $newAdherent->get_prenom_responsable(),
        'nom_responsable' => $newAdherent->get_nom_responsable(),
        ));

        $sth->closeCursor();

    } catch(PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    header('Location: index.php');
}

function find($id){

        
    $sql= 'SELECT * FROM adherent WHERE id_utilisateur = :id';
    $sth = $this->pdo->prepare($sql);
    $sth->execute(array(
        ':id' => $id
    ));
    $rows = $sth->fetch(PDO::FETCH_ASSOC);

    return $rows;
}
}
