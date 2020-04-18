<head>

    <!-- se réfère au css ; type d'encodage : charset utf8 car compact et facilement lisible-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Titre onglet de la page -->
    <title>FREDI</title>
    <link rel="stylesheet" type ="text/css" href="CSS/menu.css">
    <link rel="stylesheet" type ="text/css" href="CSS/FREDI.css">
    <script src="script.js"></script>
    <link rel="icon" type="image/jpg" href="./FREDI2.jpg"/> 

</head>

<body>

    <header>
        <!-- en tete de la page -->
        <div class="header-div">

            <?php if (isset($_SESSION['pseudo'])) {
                echo "<i>Bienvenue, ".$_SESSION['pseudo']."</i>";
                } else {
                    echo "<i>Bienvenue, jeune Padawan</i>";
                }
            ?>  

            <table>
                <!-- titre de la page -->
                <tr>
                    <td>
                    <a href="index_admin.php"> <img class="left-logo" src="./img/#" alt="Logo FREDI" /></a>
                    </td>
                    <td>
                        <h1>FREDI</h1>
                    </td>
                    <td>
                    <a href="index_admin.php"><img class="right-logo" src="./img/#" alt="Logo FREDI" /></a>
                    </td>
                </tr>
            </table> 

        </div>

        <!-- lien pour inclure le bandeau du menu -->
        <?php
            include "menu.php";
        ?>

    </header>


    <div class="body-div">

    </div>

</body>
</html>