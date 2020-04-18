<?php
/**
 * po34a : supprimer un bureau
 */
require_once "init.php";

// Instanciation des DAO
$lignesDAO = new LignesDAO();

// Récupère l'ID dans l'URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Lecture du formulaire
$submit = isset($_POST['submit']);
if ($submit) {
    // Formulaire soumi
    // Supprime l'enregistrement dans la BD
    $lignesDAO->delete($id);
    // Redirection vers la liste des bureaux
    header('Location: Frais_Deplacement.php');
} else {
    // Formulaire non soumi : lit l'objet métier
    $lignes = $lignesDAO->find($id);
    $is_disabled=true; // Empèche toute saisie
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Suppression LDF</title>
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
                <h2>Suppression d'une ligne de frais</h2>
            </div>
  <?php require_once "lignesForm.php"; ?>
</body>

</html>