<?php 
include "DAO.php";

class utilisateurDAO extends DAO{

function __construct(){

    parent::__construct();

}

function find($id){

        
    $sql= 'SELECT * FROM utilisateur WHERE id_utilisateur = :id';
    $sth = $this->pdo->prepare($sql);
    $sth->execute(array(
        ':id' => $id
    ));
    $rows = $sth->fetch(PDO::FETCH_ASSOC);

    return $rows;
}

function inscription(utilisateur $newUtilisateur){
    
    $pass_hache = password_hash($newUtilisateur->get_password(), PASSWORD_DEFAULT);

    try {
        // Insertion
        $sql = 'INSERT INTO utilisateur (prenom, nom, email, password, id_type_utilisateur, code_statut) VALUES (:prenom, :nom, :email, :pass_hache, :id_type_utilisateur, :code_statut)';
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
        'prenom' => $newUtilisateur->get_prenom(),
        'nom' => $newUtilisateur->get_nom(),   
        'email' => $newUtilisateur->get_email(),
        'pass_hache' => $pass_hache,
        'id_type_utilisateur' => $newUtilisateur->get_id_type_utilisateur(),
        'code_statut' => $newUtilisateur->get_code_statut()
        ));

        $sth->closeCursor();

    } catch(PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    header('Location: index.php');
}

function mdpRecup($email){

    $newMdp = file_get_contents('https://api.motdepasse.xyz/create/?include_digits&include_lowercase&include_special_characters&password_length=12&quantity=1');

    $mdpArray = json_decode($newMdp, true, 512, JSON_BIGINT_AS_STRING); 
    $mdp = $mdpArray['passwords'][0];
    $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
    
    //  Changement de mdp de l'utilisateur
    $sql = 'UPDATE utilisateur SET password = :password WHERE email = :email;';

    try {
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            ':email' => $email,
            ':password' => $pass_hache
        ));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    mail($email, "Nouveau mot de passe", "Voici votre nouveau mot de passe temporaire : ".$mdp);

    header('Location : authentification.php');
}

function select_id($email){
    
    //  Récupération de l'id en rapport avec le nom 
    $sql = "SELECT id_utilisateur FROM utilisateur WHERE email = :email";

    try {
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            ':email' => $email
        ));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
    }
}   
    
function connexion($email, $password){
    
    //  Récupération de l'utilisateur et de son pass hashé
    $sql = "SELECT * FROM utilisateur WHERE email = :email";

    try {
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            ':email' => $email
        ));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        throw new Exception("Erreur lors de la requête SQL : ".$ex->getMessage());
    }

    $isPasswordCorrect = password_verify($password, trim($row['password']));

    if($row == NULL) {
        // return 'Ce compte existe pas';
        header('Location: authentification.php?idIncorrecte=1');
    } else {
        if($isPasswordCorrect) {
            //Creation de la session et des variables de sessions
            session_start();
            $_SESSION['id_user'] = $row['id_utilisateur'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['email'] = $row['id_type_utilisateur'];
            $_SESSION['type'] = $row['id_type_utilisateur'];
            $_SESSION['connected'] = TRUE;
            //Redirection une fois connecté
            header('Location: index.php');
        } else {
            header('Location: authentification.php?idIncorrecte=1');
        }
    }
}

function deconnexion($id){
    
    try {    
        $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id";
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            ':id' => $id
        )); 
        $nb = $sth->rowcount();  

    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
}
}
