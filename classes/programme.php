<?php
class Programme {
    private static $idCounter = 1; 
    private $id;
    private $nom;
    private $description;
    private $duree;
    private Universite $Universite; 
    private $critereAdmission;
    private $date;
    public function __construct($nom, $description, $duree,Universite $Universite, $critereAdmission) {
        $this->id = self::$idCounter++;
        $this->nom = $nom;
        $this->description = $description;
        $this->duree = $duree;
        $this->Universite = $Universite; 
        $this->critereAdmission = $critereAdmission;
        $this->date = new DateTime();

    }


    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function getUniversite() {
        return $this->Universite; 
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
    }

    public function setUniversite( $Universite) {
        $this->Universite = $Universite; 
    }

    public function getCritereAdmission() {
        return $this->critereAdmission;
    }

    public function setCritereAdmission($critereAdmission) {
        $this->critereAdmission = $critereAdmission;
    }

    public function getDate()
    {
        return $this->date;
    }
}
?>
