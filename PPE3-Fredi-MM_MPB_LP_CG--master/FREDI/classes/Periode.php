<?php

class periode {

    private $annee;
    private $forfait_km;
    private $code_statut;

    public function __construct(array $row)
    {
        $this->annee = $row['annee'];
        $this->forfait_km = $row['forfait_km'];
        $this->code_statut = $row['code_statut'];
    }

    //Annee

    public function getAnnee(){
		return $this->annee;
	}

	public function setAnnee($annee){
		$this->annee = $annee;
	}

    //Forfait_km

	public function getForfait_km(){
		return $this->forfait_km;
	}

	public function setForfait_km($forfait_km){
		$this->forfait_km = $forfait_km;
    }
    
    //Code_Statut

	public function getCode_statut(){
		return $this->code_statut;
	}

	public function setCode_statut($code_statut){
		$this->code_statut = $code_statut;
	}

}