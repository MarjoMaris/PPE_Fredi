<?php
require_once('init.php');

$annee = isset($_POST['annee']) ? $_POST['annee'] : '';
$forfait_km = isset($_POST['forfait_km']) ? $_POST['forfait_km'] : '';
$code_statut = isset($_POST['code_statut']) ? $_POST['code_statut'] : '';
$submit = isset($_POST['submit']);

if($submit) {
    $periode = new PeriodeDAO();
    $periode->insertPeriode($annee, $forfait_km, $code_statut);
}
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
    <script src="script.js"></script>
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


    <div class="div-header">
        <br>
        <div class="container">
            <div class="py-5 text-center">
                <h2>Créer une période</h2>
                <p class="lead">Rentrez les informations nécessaires.</p>
            </div>
            <main role="main" class="container">
            <div class="jumbotron">
                <div class="col-md-6 order-md-4">
                    <form class="needs-validation" action="#" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                             <! -- case du formulaire pour l'année civile -->
                            <label for="annee">Année Civile</label>
                            <input type="text" class="form-control" name="annee" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Entrez votre identifiant
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                             <! -- case du formulaire pour le forfait KM -->
                            <label for="forfait_km">Forfait KM</label>
                            <input type="text" class="form-control" name="forfait_km" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Entrez votre mot de passe
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                        <div class="row">   
                            <div class="col-md-6 mb-2">
                                <! -- case du formulaire pour le code statut -->
                                <label for="code_statut">Status de la période</label>
                                <select class="custom-select d-block w-100" name="code_statut" value="" required>
                                    <option value="En cours">En cours</option>
                                    <option value="Cloturee">Cloturée</option>
                                </select>
                                <div class="invalid-feedback">
                                    Choisissez un statut 
                                </div>
                            </div>
                            </div>
                <hr class="mb-6">
                <button class="btn btn-lg" type="submit" name="submit">Valider</button>
            </form>
            </div>
        </div>
        
        </div>
        </main>
        </div>

    </div>

</body>
</html>
