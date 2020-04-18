<?php 
class adherent{

    private $date_naissance;
    private $code_sexe;
    private $adresse1;
    private $adresse2;
    private $adresse3;
    private $numero_licence;
    private $prenom_responsable;
    private $nom_responsable;

    function __construct($rows) {

        foreach ($rows as $cle => $valeur){
            $methode = 'set_'.$cle;
            if (method_exists($this, $methode)){
                $this->$methode($valeur);
            }
        }

    }

    private function set_date_naissance($date_naissance){

        $this->date_naissance = $date_naissance;
    }
    
    private function set_code_sexe($code_sexe){

        $this->code_sexe = $code_sexe;
    }

    private function set_adresse1($adresse1){

        $this->adresse1 = $adresse1;
    }

    private function set_adresse2($adresse2){

        $this->adresse2 = $adresse2;
    }

    private function set_adresse3($adresse3){

        $this->adresse3 = $adresse3;
    }

    private function set_numero_licence($numero_licence){

        $this->numero_licence = $numero_licence;
    }

    private function set_prenom_responsable($prenom_responsable){

        $this->prenom_responsable = $prenom_responsable;
    }

    private function set_nom_responsable($nom_responsable){

        $this->nom_responsable = $nom_responsable;
    }

    function get_date_naissance(){

        return $this->date_naissance;
    }
    
    function get_code_sexe(){

        return $this->code_sexe;
    }

    function get_adresse1(){

        return $this->adresse1;
    }

    function get_adresse2(){
        
        return $this->adresse2;
    }

    function get_adresse3(){

        return $this->adresse3;
    }

    function get_numero_licence(){

        return $this->numero_licence;
    }

    function get_prenom_responsable(){

        return $this->prenom_responsable;
    }

    function get_nom_responsable(){

        return $this->nom_responsable;
    }
}