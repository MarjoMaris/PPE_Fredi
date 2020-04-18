<?php 
include "init.php";

$submit = isset($_POST['submit']) ? 1 : 0;

if ($submit == 1) {

    $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "Anonymous";
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : NULL;
    $email = isset($_POST["email"]) ? $_POST["email"] : NULL;
    $password = isset($_POST["password"]) ? $_POST["password"] : NULL;  
    $date_naissance = isset($_POST["date_naissance"]) ? $_POST["date_naissance"] : NULL;
    $code_sexe = isset($_POST["code_sexe"]) ? $_POST["code_sexe"] : NULL;
    $adresse1 = isset($_POST["adresse1"]) ? $_POST["adresse1"] : NULL;
    $adresse2 = isset($_POST["adresse2"]) ? $_POST["adresse2"] : "";  
    $adresse3 = isset($_POST["adresse3"]) ? $_POST["adresse3"] : "";  
    $numero_licence = isset($_POST["numero_licence"]) ? $_POST["numero_licence"] : NULL;  
    $prenom_responsable = isset($_POST["prenom_responsable"]) ? $_POST["prenom_responsable"] : $_POST["prenom"];  
    $nom_responsable = isset($_POST["nom_responsable"]) ? $_POST["nom_responsable"] : $_POST["nom"];
    $code_statut = 1;  
    $id_type_utilisateur = 3;
    $newUtilisateur = new utilisateur(array(
        'prenom' => $prenom,
        'nom' => $nom,
        'email' => $email,
        'password' => $password,
        'code_statut' => $code_statut,
        'id_type_utilisateur' => $id_type_utilisateur
    ));

    $dao = new utilisateurDAO();
    $dao->inscription($newUtilisateur);

    $newAdherent = new adherent(array(
        'date_naissance' => $date_naissance,
        'code_sexe' => $code_sexe,
        'adresse1' => $adresse1,
        'adresse2' => $adresse2,
        'adresse3' => $adresse3,
        'numero_licence' => $numero_licence,
        'prenom_responsable' => $prenom_responsable,
        'nom_responsable' => $nom_responsable
    ));
    
    $dao2 = new adherentDAO();
    $dao2->inscription($newAdherent);
    
    $id_recuperer = $dao->select_id($newUtilisateur->get_id_utilisateur());

    var_dump($id_recuperer);

    $dao = new NoteDAO();

    $dao->insert($id_recuperer);

}else {
    
    
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
                <h2>S'inscrire</h2>
                <p class="lead">Rentrez vos informations pour permettre de vous identifier.</p>
            </div>
            <main role="main" class="container">
                <div class="jumbotron">
        
                    <div class="col-md-6 order-md-4">
                        <form class="needs-validation" action="identification.php" method="post" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez votre prénom 
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez votre nom
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date">Date de naissance</label>
                                    <input type="date" class="form-control" name="date_naissance" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez votre date de naissance
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">   
                                <div class="col-md-6 mb-2">
                                    <label for="genre">Genre</label>
                                    <select class="custom-select d-block w-100" name="code_sexe" required>
                                    <option>Homme</option>
                                    <option>Femme</option>
                                    <option>Autre</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Choisissez un genre 
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez votre email
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" name="password" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez un mot de passe 
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row"> 
                                <div class="col-md-6 mb-2">
                                    <label for="adresse1">Adresse 1</label>
                                    <input type="text" class="form-control" name="adresse1" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez votre adresse 
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="adresse2">Adresse 2</label>
                                    <input type="text" class="form-control" name="adresse2" placeholder="" value="">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="adresse3">Adresse 3</label>
                                    <input type="text" class="form-control" name="adresse3" placeholder="" value="">
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">   
                                <div class="col-md-6 mb-2">
                                    <label for="statut">Statut de l'adhérent</label>
                                    <select class="custom-select d-block w-100" name="statut" required>
                                    <option>Majeur</option>
                                    <option>Mineur</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Choisissez un statut 
                                    </div>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-2">
                                    <label for="numero_licence">Numéro de licence</label>
                                    <input type="text" class="form-control" name="numero_licence" required>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <p>/!\ Si le licencié est majeur, veuillez saisir votre propre prenom et nom de famille :</p>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prenomresponsable">Prénom du responsable légal</label>
                                    <input type="text" class="form-control" name="prenom_responsable" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Entrez le prénom du responsable légal
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nomresponsable">Nom du responsable légal</label>
                                    <input type="text" class="form-control" name="nom_responsable" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                    Entrez le nom du responsable légal
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-6">
                            <button class="btn btn-lg" type="submit">Retour</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<?php 
}
?>
