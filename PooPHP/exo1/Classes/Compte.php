<?php

Class Compte{

	private string $_libelle;
	private float $_soldeini;
	private string $_devise;
	private Titulaire $_titulaire;

	public function __construct(string $libelle, float $soldeini, string $devise, Titulaire $titulaire){
		$this->_libelle = $libelle;
		$this->_soldeini = $soldeini;
		$this->_devise = $devise;
		$this->_titulaire = $titulaire;
		$this->_titulaire->ajouterCompte($this);
	}

	// Getter / Setter

	public function getLibelle(){
		return $this->_libelle;
	}

	public function setLibelle(string $libelle){
		$this->_libelle = $libelle;
	}

	public function getSoldeini(){
		return $this->_soldeini;
	}

	public function setSoldeini(float $soldeini){
		$this->_soldeini = $soldeini;
	}

	public function getDevise(){
		return $this->_devise;
	}

	public function setDevise(string $devise){
		$this->_devise = $devise;
	}

	public function getTitulaire(){
		return $this->_titulaire;
	}

	public function setTitulaire(Titulaire $titulaire){
		$this->_titulaire= $titulaire;
	}

	// Méthode pour créditer un compte

	public function crediterCompte(float $montant){
		$this->_soldeini+=$montant;
	}

	// Méthode pour débiter un compte

	public function debiterCompte(float $montant){
		$this->_soldeini-=$montant;
	}

	// Méthode pour effectuer un virement ( compte débiter vers compte a verser + somme )

	public function virement(Compte $compte, float $montant){
		$this->_soldeini-=$montant;
		$compte->_soldeini+=$montant;
	}

	// toString

	public function __toString(){
		return "Libellé: ".$this->getLibelle()."<br/>Solde du compte: ".$this->getSoldeini()." ".$this->getDevise()."<br/> Titulaire: ".$this->getTitulaire()->getNom()." ".$this->getTitulaire()->getPrenom();
	}

}