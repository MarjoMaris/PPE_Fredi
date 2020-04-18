<?php

/**
 * Classe Lignes
 *
 * @author Marjorie :D
 */
class Lignes
{
	////////////////////
	//// Attributs ////
	////////////////////
    private $id_ligne;
    private $date_frais;
    private $id_motif;
    private $lib_trajet;
    private $nb_km;
    private $total_km;   
	  private $cout_peage;
	  private $cout_repas;
    private $cout_hebergement; 
    private $code_statut; 
    private $total_ligne;
    private $annee;
    private $id_note;


   	//////////////////
	// Constructeur //
	/////////////////

    public function __construct(array $tableau = null)
    {
        if ($tableau != null) {
            $this->fill($tableau);
        }
	}
	
	//////////////////
	///// Getter ///// 
	//////////////////


	function getId_ligne() {
		return $this->id_ligne;
	}
    
    function getDate_frais() {
		  return $this->date_frais;
	  }
    
    function getId_motif() {
      return $this->id_motif;
    }
   
    function getLib_trajet() {
		return $this->lib_trajet;
	  }  
    
    function getNb_km() {
      return $this->nb_km;
    }
      
    function getTotal_km() {
      return $this->total_km;
    }  

    function getCout_peage() {
		  return $this->cout_peage;
    }
      
    function getCout_repas() {
		  return $this->cout_repas;
    } 
    
    function getCout_hebergement() {
		  return $this->cout_hebergement;
    }
      
    function getCode_statut() {
		  return $this->code_statut;
    } 
    
    function getTotal_ligne() {
		  return $this->total_ligne;
    } 
    
    function getAnnee() {
		  return $this->annee;
    } 
    
    function getId_note() {
		  return $this->id_note;
	  } 
	//////////////////
	///// Setter /////
	//////////////////
    
	  function setId_ligne($id_ligne) {
		  $this->id_ligne = $id_ligne;
	  }
    
    function setDate_frais($date_frais) {
		  $this->date_frais = $date_frais;
    }
    
    function setId_motif($id_motif) {
		  $this->id_motif = $id_motif;
	  }
    
    function setLib_trajet($lib_trajet) {
	    $this->lib_trajet = $lib_trajet;
	  }  
    
    function setNb_km($nb_km) {
      $this->nb_km = $nb_km;
    }
      
    function setTotal_km($total_km) {
      $this->total_km = $total_km;
    }
        

    function setCout_peage($cout_peage) {
		  $this->cout_peage = $cout_peage;
    }
      
    function setCout_repas($cout_repas) {
		  $this->cout_repas = $cout_repas;
    } 
    
    function setCout_hebergement($cout_hebergement) {
		  $this->cout_hebergement = $cout_hebergement;
    }
      
    function setCode_statut($code_statut) {
		  $this->code_statut = $code_statut;
    } 
    
    function setTotal_ligne($total_ligne) {
		  $this->total_ligne = $total_ligne;
    } 

    function setAnnee($annee) {
		  $this->annee = $annee;
    } 

    function setId_note($note) {
		  $this->note = $note;
    } 
    /**
     * Hydrateur
     * Alimente les propriétés à partir d'un tableau
     * @param array $tableau
     */
    public function fill(array $tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $methode = 'set' . $cle;
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Retourne un tableau du contenu de l'objet
     *
     * @return array
     */
    public function dump()
    {
        return get_object_vars($this);
    }

    /**
     * Affiche la liste des propriétés de l'objet courant
     *
     * @return string les propriétés sous la forme d'une liste à puce HTML
     */
    public function afficher()
    {
        $tableau = $this->dump();
        $html = '<ul>';
        foreach ($tableau as $cle=>$valeur) {
            $html .= '<li>' . $cle . ' = '.$valeur. '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}

// Classe Lignes
