<?php

require_once "init.php";

// Instanciation des DAO
$lignesDAO = new LignesDAO();

// Récupère l'ID dans l'URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Lecture du formulaire
$submit = isset($_POST['submit']);

if ($submit) {
    // Crée un objet lignes à l'image des données

    $date_annee = substr($_POST['date_frais'], 0, 4);

    $date_frais = isset($_POST['date_frais']) ? $_POST['date_frais'] : null;
    $lib_trajet = isset($_POST['lib_trajet']) ? $_POST['lib_trajet'] : null;
    $cout_peage = isset($_POST['cout_peage']) ? $_POST['cout_peage'] : null;
    $cout_repas = isset($_POST['cout_repas']) ? $_POST['cout_repas'] : null;
    $cout_hebergement = isset($_POST['cout_hebergement']) ? $_POST['cout_hebergement'] : null;
    $nb_km = isset($_POST['nb_km']) ? $_POST['nb_km'] : null;
    $total_km = isset($_POST['total_km']) ? $_POST['total_km'] : null;
    $total_ligne = ($cout_hebergement+$cout_peage+$cout_repas+$total_km);
    $code_statut = isset($_POST['code_statut']) ? $_POST['code_statut'] : null;
    $id_motif = isset($_POST['id_motif']) ? $_POST['id_motif'] : null;
    $annee = $date_annee;
    $id_note = isset($_POST['id_note']) ? $_POST['id_note'] : null;


    $lignes = new Lignes(array(
      'date_frais'=>$date_frais,
      'lib_trajet'=>$lib_trajet,
      'cout_peage'=>$cout_peage,
      'cout_repas'=>$cout_repas, 
      'cout_hebergement'=>$cout_hebergement, 
      'nb_km'=>$nb_km,
      'total_km'=>$total_km,
      'total_ligne'=>$total_ligne,
      'code_statut'=>$code_statut,
      'id_motif'=>$id_motif,
      'annee'=>$annee,
      'id_note'=>$id_note
      
    ));

    // Ajoute l'enregistrement dans la BD
    $lignesDAO->insert($lignes);
    // Redirection vers la liste des lignes
    header('Location: Frais_Deplacement.php');
} else {
    
    // Formulaire non soumi
    // Initialise l'objet métier
    $lignes = new Lignes();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Création LDF</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
        <link rel="stylesheet" type ="text/css" href="Css/FREDI.css">
    </head>
    <body>
        <?php include "menu.php";?>
        <br> 
                <div class="header-div">

                    <?php if (isset($_SESSION['prenom'])) {
                        echo "<i>Bienvenue, ".$_SESSION['prenom']."</i>";
                        } else {
                            echo "<i>Bienvenue, jeune Padawan</i>";
                        }
                    ?>  
                </div>
                <br> 
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="img/FREDI2.png" alt="" width="100" height="100">
                    <h2>Création d'une ligne de frais</h2>
                    <p class="lead">Rentrez vos informations pour permettre de créer votre ligne.</p>
                </div>
        <?php require_once "lignesForm.php";?>
    </body>
</html>