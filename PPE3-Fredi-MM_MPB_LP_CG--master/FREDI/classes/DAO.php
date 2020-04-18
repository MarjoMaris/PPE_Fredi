<?php 
class DAO{

    protected $pdo=null;

    function __construct() {
        // On récupère les paramètres de la base à partir des constantes de init.php
        $user=DB_USER;
        $password=DB_PASSWORD;
        $host=DB_HOST;
        $name=DB_NAME;
        // On construit le DSN
        $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
        // Création de la connexion
        try {
        $pdo = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND =>
        "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo("<p>Erreur lors de la connexion : " . $e->getMessage().'<p>');
        }
        $this->pdo = $pdo;
        
    }

    /**
    * Exécute une requête SQL avec ou sans requête préparée
    * 
    * @param string Requête SQL
    * @param array Paramètres de la requête
    * @return PDOStatement Résultat de la requête
    */
    protected function executer($sql, $params = null) {
        try {
            if ($params == null) {
                $sth = $this->pdo->query($sql);   // exécution directe
            } else {
                $sth = $this->pdo->prepare($sql); // requête préparée
                $sth->execute($params);
            }
        } catch (PDOException $e) {
            die("Erreur lors de la requête SQL : " . $e->getMessage()."\nSQL : ".$sql);
        }
        return $sth;  // Renvoie le handler du résultat de la requête de la requête SQL 
    }
}