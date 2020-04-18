<?php  
    class utilisateur{

        private $id_utilisateur;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $code_statut;
        private $id_type_utilisateur;

        function __construct($rows) {

            foreach ($rows as $cle => $valeur){
                $methode = 'set_'.$cle;
                if (method_exists($this, $methode)){
                    $this->$methode($valeur);
                }
            }
    
        }

        private function set_id_utilisateur($id_utilisateur){

            $this->id_utilisateur = $id_utilisateur;
        }
        
        private function set_nom($nom){
    
            $this->nom = $nom;
        }
    
        private function set_prenom($prenom){
    
            $this->prenom = $prenom;
        }
    
        private function set_email($email){
    
            $this->email = $email;
        }
    
        private function set_password($password){
    
            $this->password = $password;
        }
    
        private function set_code_statut($code_statut){
    
            $this->code_statut = $code_statut;
        }
    
        private function set_id_type_utilisateur($id_type_utilisateur){
    
            $this->id_type_utilisateur = $id_type_utilisateur;
        }

        function get_id_utilisateur(){

            return $this->id_utilisateur;
        }
        
        function get_nom(){
    
            return $this->nom;
        }
    
        function get_prenom(){
    
            return $this->prenom;
        }
    
        function get_email(){
            
            return $this->email;
        }
    
        function get_password(){
    
            return $this->password;
        }
    
        function get_code_statut(){
    
            return $this->code_statut;
        }
    
        function get_id_type_utilisateur(){
    
            return $this->id_type_utilisateur;
        }
    }
?>