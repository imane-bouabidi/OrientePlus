<?php
require_once 'Etudiant.php';
require_once 'programme.php';

class Candidature {
    private static $idCounter = 1; 
    private $id;
    private $idEtudiant;
    private $Programme;
    private $decision;
    private $date;


    public function __construct($idEtudiant, Programme $Programme) {
        $this->id = self::$idCounter++;
        $this->idEtudiant = $idEtudiant;
        $this->Programme = $Programme;
        $this->decision = 'en attente';
        $this->date = new DateTime();

    }

    public function getIdEtudiant() {
        return $this->idEtudiant;
    }

    public function getProgramme() {
        return $this->Programme;
    }

    public function getDecision() {
        return $this->decision;
    }

    public function setDecision($decision) {
        $this->decision = $decision;
    }
    public function getDate()
    {
        return $this->date;
    }
}
?>

