<?php

/**
 * Classe Note
 *
 * @author Marjorie :D
 */
class Note
{
	////////////////////
	//// Attributs ////
	////////////////////
    private $id_note;
    private $date_remise;
    private $total;
    private $code_statut;
    private $id_utilisateur;

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


	function getId_note() {
		return $this->id_note;
	}
    
    function getDate_remise() {
		  return $this->date_remise;
	  }
    
    function getTotal() {
      return $this->total;
    }

    function getCode_statut() {
        return $this->code_statut;
    }

    function getId_utilisateur() {
        return $this->id_utilisateur;
    }
   
	//////////////////
	///// Setter /////
	//////////////////
    
	function setId_note($id_note) {
		$this->id_note = $id_note;
	}
    
    function setDate_remise($date_remise) {
		$this->date_remise = $date_remise;
    }
    
    function setTotal($total) {
		$this->total = $total;
    }
    
    function setCode_statut($code_statut) {
		$this->code_statut = $code_statut;
    }
    
    function setId_utilisateur($id_utilisateur) {
		$this->id_utilisateur = $id_utilisateur;
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
