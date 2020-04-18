<?php
require_once('init.php');
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

<body>
        
<header>
        <!-- En-tête de la page -->
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

        <!-- Lien pour inclure le bandeau du menu -->
        <?php
            include "menu.php";
        ?>
</header>

<div class="div-header">
    <br>
    <div class="container">
        <div class="py-5 text-center">
                <h2>Liste des adhérents</h2>
                <p class="lead">Vous pouvez consulter la liste des adhérents et valider des lignes de frais.</p>
        </div>

        <main role="main" class="col-md-0 ml-sm-auto col-lg-0 px-5">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>N° Licence</th>
                            <th>Date de naissance</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Note de frais</th>
                        </tr>
                    </thead>
                    <?php
                            $dao = new controleurDAO();
                            $rows = $dao->findAllAdherents();

                            //compteur d'adhérents


                            foreach ($rows as $row){
                            echo '<tr>';
                                echo '<td>'.$row['id_utilisateur'].'</td>';
                                echo '<td>'.$row['numero_licence'].'</td>';
                                echo '<td>'.$row['date_naissance'].'</td>';
                                echo '<td>'.$row['nom_responsable'].'</td>';
                                echo '<td>'.$row['prenom_responsable'].'</td>';
                                echo "<td><a href='noteAdherent.php?id_utilisateur=".$row['id_utilisateur']."' title ='Consulter la note de frais'><img src='img/ndf_ico.png' /></a></td>"; // Cliquer sur l'icone 'Note de Frais' pour récupérer la note de frais de l'adhérent sélectionné
                            echo '</tr>';
                            }
                    ?>
                </table>
            </div>
        </main>

    </body>
</html>
