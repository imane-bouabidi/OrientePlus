<?php
require_once 'Utilisateur.php';

class Message {
    private static $idCounter = 1;
    private $id;
    private Etudiant $etudiant;
    private Cours $cours;
    private $contenu;
    private $date;

    public function __construct(Utilisateur $etudiant, Cours $cours, $contenu) {
        $this->id = self::$idCounter++;
        $this->etudiant = $etudiant;
        $this->cours = $cours;
        $this->contenu = $contenu;
        $this->date = new DateTime();
    }

    public function getEtudiant() {
        return $this->etudiant;
    }

    public function getCours() {
        return $this->cours;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getDate() {
        return $this->date;
    }
}
?>
