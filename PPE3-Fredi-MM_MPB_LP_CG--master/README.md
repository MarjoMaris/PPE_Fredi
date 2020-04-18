Projet FREDI PP3 de Marjorie Luc Matisse Corentin 

Prérequis :

Ouvrir XAMPP-control, si vous ne l’avez pas veuillez le télécharger via l’adresse suivante : https://www.apachefriends.org/fr/index.html . Puis veuillez l’installer. Lancer le XAMPP-control et cliquez sur « Start » pour les modules Apache et MySQL.

Récupérer le dossier « FREDI » contenant les fichiers du site internet et déposez le dans le dossier « projet » que vous devez créer dans le dossier suivant : xampp/htdocs/

Rendez-vous sur votre navigateur, rentrez « localhost » et cliquez sur la rubrique « phpMyAdmin ». Créez une nouvelle base de donnée via l’option proposé sur la gauche de votre écran. Donnez le nom « fredi » à votre base de donnée et sélectionnez l’option « utf8_general_ci » dans la liste déroulante, puis cliquez sur « Créer ».

Ensuite, allez sur l’onglet « SQL » et copier le contenu du fichier « fredi-structure.sql » dans la fenêtre de saisie puis cliquez sur « exécuter ». Réitérez La chose avec le contenu du fichier « fredi-data.sql » en décochant la case " Activer la vérification des clés étrangères".

Une fois ces étapes remplis vous pouvez vous rendre sur le site via votre navigateur en tapant dans la barre de recherche « localhost/projet/FREDI ».
