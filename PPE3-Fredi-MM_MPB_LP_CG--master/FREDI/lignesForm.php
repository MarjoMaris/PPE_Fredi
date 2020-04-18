<?php

// Si l'action n'est pas fournie, on la crée avec la valeur par défaut (le formulaire s'appelle lui-même) 
if (!isset($action)) {
  $action = '#';
}
// Si l'ID n'est pas fourni, on ne la passe pas dans la query string de l'URL
$query_string=null;
if ($lignes->getId_ligne() !=""){
  $query_string = "?id=".$lignes->getId_ligne();
}
// Empèche la saisie dans le formulaire si le booléen $is_disabled est à vrai
$disabled="";
if (isset($is_disabled) && $is_disabled==true) {
  $disabled="disabled";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>
    <body>


        <!-- HTML - Formulaire Creation d'une LDF -->
        <div class="container">

            <main role="main" class="container">
                <div class="jumbotron">
        
                    <div class="col-md-6 order-md-4">
                        <h4 class="mb-3 md-3">Formulaire : </h4>
                        <form class="needs-validation" method="post" action="<?php echo $action.$query_string; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="date_frais" id="date_frais" value="<?php echo $lignes->getDate_frais(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10 mb-3">
                                        <label>Motif</label>
                                        <select class="custom-select d-block w-100" name="id_motif" id="id_motif" value="<?php echo $lignes->getId_motif(); ?>" <?php echo $disabled; ?>>
                                            <option value="1">1 - Réunion</option>
                                            <option value="2">2 - Compétition Régionale</option>
                                            <option value="3">3 - Compétition Nationnale</option>
                                            <option value="4">4 - Compétition Internationnale</option>
                                            <option value="5">5 - Stage</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Trajet</label>
                                        <input type="text" class="form-control" name="lib_trajet" id="lib_trajet" value="<?php echo $lignes->getLib_trajet(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Kms Parcourus ( Km )</label>
                                        <input type="number" step="0.01" class="form-control" name="nb_km" id="nb_km" value="<?php echo $lignes->getNb_km(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Péage ( € )</label>
                                        <input type="number" step="0.01" class="form-control" name="cout_peage" id="cout_peage" value="<?php echo $lignes->getCout_peage(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Repas ( € )</label>
                                        <input type="number" step="0.01" class="form-control" name="cout_repas" id="cout_repas" value="<?php echo $lignes->getCout_repas(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Hébergement ( € )</label>
                                        <input type="number" step="0.01" class="form-control" name="cout_hebergement" id="cout_hebergement" value="<?php echo $lignes->getCout_hebergement(); ?>" <?php echo $disabled; ?>>
                                    </div>
                                </div>

                                <hr class="mb-6">
                                <p><input type="submit" class="btn btn-lg" name="submit" value="Valider"></p>
                         </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
