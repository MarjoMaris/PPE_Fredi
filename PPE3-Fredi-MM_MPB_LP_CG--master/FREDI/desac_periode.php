<?php
require_once "init.php";

$periodeDAO = new PeriodeDAO();

$periode = $periodeDAO->findAll();


$annee = isset($_GET['annee']) ? $_GET['annee'] : null;

// Lecture du formulaire
$submit = isset($_POST['submit']);
$return = isset($_POST['return']);

if ($submit) {
    $code_statut = isset($_POST['code_statut']) ? $_POST['code_statut'] : null;
    $annee = isset($_POST['annee']) ? $_POST['annee'] : null;
    
    $periode = new Periode(array(
      'code_statut'=>$code_statut,
      'annee'=>$annee
  ));
   
    $periodeDAO->updateStatut($periode);
    
    header('Location: consult_periode.php');
} else {
    
    $periode = $periodeDAO->find($annee);
}

if ($return) {
    header('Location: consult_periode.php');
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
<?php 
$id = $_GET['id'];
$code = $_GET['code']; ?>

    <div class="div-header">
        <br>
        <div class="container">
            <div class="py-5 text-center">
                <h2>Modifier la période <?php echo $id ?></h2>
                <p class="lead">Rentrez les informations nécessaires.</p>
            </div>
            <main role="main" class="container">
            <div class="jumbotron">
                <div class="col-md-6 order-md-4">
                    <form class="needs-validation" action="#" method="post" novalidate>
                    
                    <hr class="mb-4">
                        <div class="row">   
                            <div class="col-md-6 mb-2">
                                <!--case du formulaire pour le code statut, il est directement remis dans la case pour la modification-->
                                <label for="code_statut">Status de la période</label>
                                <input type="text" class="form-control" name="annee" placeholder="" value="<?php echo $id ?>"hidden required>
                                <select class="custom-select d-block w-100" name="code_statut" required>
                                <option>Cloturée</option>
                                </select>
                                <div class="invalid-feedback">
                                    Choisissez un statut 
                                </div>
                            </div>
                            </div>
                <hr class="mb-6">
                <button class="btn btn-lg" type="submit" name="submit">Valider</button>
                <button class="btn btn-lg" type="submit" name="return">Retour</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;               
            </form>
            </div>
        </div>
        
        </div>
        </main>
        </div>

    </div>

</body>
</html>


