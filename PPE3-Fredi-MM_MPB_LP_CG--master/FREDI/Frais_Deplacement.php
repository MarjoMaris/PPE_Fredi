
<?php
require_once "init.php";
// Crée le tableau d'objets métier "Bureau"
$les_lignes=array();
$dao = new LignesDAO(); 
$les_lignes = $dao->findAll(); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
        <link rel="stylesheet" type ="text/css" href="Css/FREDI.css">
        <title>FREDI - Frais de déplacement</title>
    </head>
    <header>

                <!-- en tete de la page -->
                <div class="header-div">

                    <?php if (isset($_SESSION['prenom'])) {
                        echo "<i>Bienvenue, ".$_SESSION['prenom']."</i>";
                        } else {
                            echo "<i>Bienvenue, jeune Padawan</i>";
                        }
                    ?>  

            <br> 
            <a href="index.php"> <img class="div-logo" src="img/FREDI2.png" alt="Logo FREDI" /></a>

                </div>

                <!-- lien pour inclure le bandeau du menu -->
                <?php include "menu.php";?>
            
    </header>
    <body>
        <br/><br/><br/>
        <h2> Frais de déplacement</h2>
        <img src="img/frais2.png" width="500" height="150" class="frais"/>
        <br/><br/>
        <p>
            <a href="Creation_LDF.php" class="btn btn-secondary my-2">Ajouter LDF</a> 
        </p>
        <main role="main" class="col-md-0 ml-sm-auto col-lg-0 px-5">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Id</th>     
                            <th>Date</th>
                            <th>Motif</th>
                            <th>Trajet</th>
                            <th>Kms parcourus</th>
                            <th>Cout Trajet</th>
                            <th>Péages</th>
                            <th>Repas</th>
                            <th>Hébergement</th>
                            <th>Total</th>
                            <th>Validée</th>
                            <th>Controlée</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php

                            foreach ($les_lignes as $lignes){
                            echo '<tr>';
                                echo '<td>'.$lignes->getId_ligne().'</td>';
                                echo '<td>'.$lignes->getDate_frais().'</td>';
                                echo '<td>'.$lignes->getId_motif().'</td>';
                                echo '<td>'.$lignes->getLib_trajet().'</td>';
                                echo '<td>'.$lignes->getNb_km().'</td>';
                                echo '<td>'.$lignes->getTotal_km().'</td>';
                                echo '<td>'.$lignes->getCout_peage().'</td>';
                                echo '<td>'.$lignes->getCout_repas().'</td>';
                                echo '<td>'.$lignes->getCout_hebergement().'</td>';
                                echo '<td>'.$lignes->getTotal_ligne().'</td>';
                                echo '<td>'.$lignes->getCode_statut().'</td>';
                                echo '<td>'.$lignes->getCode_statut().'</td>';
                                echo '<td>[<a href="Modification_LDF.php?id='.$lignes->getId_ligne().'">Modifier</a>]<br>
                                          [<a href="Suppression_LDF.php?id='.$lignes->getId_ligne().'">Supprimer</a>]
                                      </td>';
                            echo '</tr>';
                            }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>