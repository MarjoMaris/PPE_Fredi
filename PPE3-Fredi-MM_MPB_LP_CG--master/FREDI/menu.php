<!-- insertion style css du menu -->
<link rel="stylesheet" href="./css/menu.css">

<?php
    $type = isset($_SESSION['type']) ? $_SESSION['type'] : NULL;
    $connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : FALSE;
    echo "<nav>";

        echo '<label for="menu-mobile" class="menu-mobile">Menu</label>';
        echo '<input type="checkbox" id="menu-mobile" role="button">';
        
        echo "<ul>";
            //rubrique accueil
            echo '<li class="menu-accueil"><a href="./index.php">FREDI</a></li>';
            if ($type == 3){
            //rubrique bordereau
            echo '<li class="menu-bordereau"><a href="#">Mon bordereau</a>';

                echo '<ul class="submenu">';
                    //sous-rubrique création ligne de frais
                    echo '<li class="item"><a href="Creation_LDF.php">Créer une ligne de frais</a></li>';
                    //sous-rubrique consultation ligne de frais
                    echo '<li class="item"><a href="Frais_Deplacement.php">Consulter les lignes de frais</a></li>';
                echo "</ul>";

            echo "</li>";
            }
            if ($type == 2){
                //rubrique bordereau
                echo '<li class="menu-bordereau"><a href="#">Mon bordereau</a>';
    
                    echo '<ul class="submenu">';
                        //sous-rubrique consultation ligne de frais
                        echo '<li class="item"><a href="Frais_Deplacement.php">Consulter les lignes de frais</a></li>';
                    echo "</ul>";
    
                echo "</li>";
                }
            if ($type == 1){
                //rubrique periode
                echo '<li class="menu-periode"><a href="#">Les périodes</a>';
    
                    echo '<ul class="submenu">';
                        //sous-rubrique création periode
                        echo '<li class="item"><a href="creer_periode.php">Créer une période</a></li>';
                        //sous-rubrique consultation periode
                        echo '<li class="item"><a href="consult_periode.php">Consulter les périodes</a></li>';
                    echo "</ul>";
    
                echo "</li>";
            }

            //rubrique question
            echo '<li class="menu-questions"><a href="#">Aide</a>';
                echo '<ul class="submenu">';
                    //sous-rubrique FAQ
                    echo '<li class="item"><a href="./faq.php">FAQ</a></li>';
                echo "</ul>";
            echo "</li>";

            //rubrique utilisateur
            echo '<li class="menu-contact"><a href="#">Mon compte</a>';
                echo '<ul class="submenu">';
                    //sous-rubrique connexion
                    echo '<li class="item"><a href="./authentification.php">Se connecter</a></li>';
                    //sous-rubrique inscription
                    echo '<li class="item"><a href="./identification.php">S\'inscrire</a></li>';
                    if ($connected == TRUE){
                    //sous-rubrique deconnexion
                    echo '<li class="item"><a href="./deconnexion.php">Se déconnecter</a></li>';
                    }
                echo "</ul>";
            echo "</li>";

        echo "</ul>";
        
    echo "</nav>";
?>
