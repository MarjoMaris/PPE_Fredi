<?php
require_once('init.php');


$periode = new PeriodeDAO();
$rows = $periode->findAll();

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
    <br>
    <h1 align="center">Consultation des périodes</h1>
    <br>
    
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Annee</th>
            <th>Nombre de Kilomètres</th>
            <th>Période Cloturée</th>
            <th></th>
            <th></th>
            </thead>
        </tr>

        <?php
        

        foreach($rows as $row) {

            $code_statut = $row->getCode_statut();

            echo '<tr><td>'.$row->getAnnee().'</td>';
            echo '<td>'.$row->getForfait_km().'</td>';
            echo '<td>'.$code_statut.'</td>';
            if ($code_statut == 'Cloturée') {
                echo '<td></td>';
                echo '<td></td>';
                    
            } else {
                echo '<td>[<a href="modif_periode.php?id='.$row->getAnnee().'&km='.$row->getForfait_km().'&code='.$row->getCode_statut().'">Modifier</a>]';
                echo '<td>[<a href="desac_periode.php?id='.$row->getAnnee().'&code='.$row->getCode_statut().'">Désactiver</a>]';
            }
            
        }
        ?>
    </table>

    
    
</body>

</html>
