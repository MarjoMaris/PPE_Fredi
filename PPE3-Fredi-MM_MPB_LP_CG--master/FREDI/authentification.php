<?php 
$submit = isset($_POST['submit']) ? 1 : 0;
$mdpoublie = isset($_POST['mdpoublie']) ? 1 : 0;
$email = isset($_POST["idconnect"]) ? $_POST["idconnect"] : '';
$mdp = isset($_POST['mdpconnect']) ? $_POST["mdpconnect"] : '';
$idIncorrecte = isset($_GET['idIncorrecte']) ? 1 : '';

include "init.php";

if ($submit == 1) {


    $dao = new utilisateurDAO();
    $dao->connexion($email, $mdp);

    //header("Location: index.php");

}elseif($mdpoublie == 1) {

    $dao = new utilisateurDAO();
    $dao->mdpRecup($email);

}elseif($submit == 0 || $_GET['log'] == 2 || $_GET['log'] == 3 || $idIncorrecte == 1) {

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <!-- se réfère au css ; type d'encodage : charset utf8 car compact et facilement lisible-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Titre onglet de la page -->
    <title>FREDI</title>
    <link rel="stylesheet" type ="text/css" href="./css/FREDI.css">
    <script src="script.js"></script>
    <link rel="icon" type="image/jpg" href="includes/ressources/favicon/favicon M2L.jpg"/> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <!-- en tete de la page -->
        <div class="div-header">
            <?php 
                if (isset($_SESSION['prenom'])) {
                    echo "<i>Bienvenue, ".$_SESSION['prenom']."</i>";
                } else {
                    echo "<i>Bienvenue, jeune Padawan</i>";
                }
            ?>  
            <br> 
            <a href="index.php"> <img class="div-logo" src="img/FREDI2.png" alt="Logo FREDI" /></a>
        </div>

        <!-- lien pour inclure le bandeau du menu -->
        <?php
            include "menu.php";
        ?>

    </header>


    <div class="div-body">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Se connecter</h2>
                <?php
                    if ($idIncorrecte == 1) {
                        echo "<p class='lead' style='color:red;'>Votre email ou mot de passe est incorrect</p>";
                    }
                ?>
                <p class="lead">Rentrez vos informations pour permettre de vous authentifier.</p>
            </div>
            <main role="main" class="container">
            <div class="jumbotron">
                <div class="col-md-6 order-md-4">
                    <form class="needs-validation" action="#" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="idconnect">Email</label>
                            <input type="text" class="form-control" name="idconnect" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Entrez votre email
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mdpconnect">Mot de passe</label>
                            <input type="password" class="form-control" name="mdpconnect" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Entrez votre mot de passe
                            </div>
                        </div>
                    </div>
                <hr class="mb-6">
                <button class="btn btn-lg" type="submit" name="submit">Valider</button>
                <button class="btn btn-lg" type="submit">Retour</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <button class="btn btn-lg" type="submit" name="mdpoublie">Mot de passe oublié</button>             
            </form>
            </div>
        </div>
        
        </div>
        </main>
        </div>
    </div>

</body>
<?php
}
?>
</html>
