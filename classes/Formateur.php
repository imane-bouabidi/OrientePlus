<?php
require_once 'Utilisateur.php';
require_once 'cours.php';

class Formateur extends Utilisateur {
    private static $idCounter = 1; 
    protected $id;
    private $idUniversite;
    private $cours;
    private $date;

    public function __construct($nom, $prenom, $email,$idUniversite) {
        parent::__construct($nom, $prenom, $email);
        $this->id = self::$idCounter++;
        $this->idUniversite = $idUniversite;
        $this->cours = [];
        $this->date = new DateTime();

    }
    public function getId() {
        return $this->id;
    }

    public function setIdUniversite($id){
        $this->idUniversite = $id;
    }
    public function getIdUniversite(){
        return $this->idUniversite;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function ajouterCours(Cours $cours) {
        $this->cours[] = $cours;
    }
    // public function ajouterCours($titre, $contenu,Categorie $categorie) {
    //     $this->cours[] = new Cours($titre,$contenu,$this->getId(),$categorie);
    // }

    public function modifierCours(Cours $CoursO, $titre,$contenu, Categorie $categorie) {
        foreach ($this->cours as &$c) {
            if ($c === $CoursO) {
                $c->setTitre($titre);
                $c->setContenu($contenu);
                $c->setCategorie($categorie);
            }
        }
    }

    public function supprimerCours($id) {
        foreach ($this->cours as $key => $c) {
            if ($c->getId() === $id) {
                unset($this->cours[$key]);
                break;
            }
        }
    }

    public function consulterCours() {
        foreach ($this->cours as $cours) {
            echo $cours->getTitre() . ", " . $cours->getContenu(). ", " . $cours->getValide() . "\n";
        }
    }

    public function suivreEtudiants(Cours $cours,Etudiant $etudiant) {
        if (in_array($cours, $this->cours)){
            echo "\n progres de l'etudiaant " .$etudiant->getNom() . ", est : ". $cours->getProgressEtudiants($etudiant->getId());
        }else{
            echo "\ncours pas trouve pour ce formateur !";
        }
    }

    public function messagerieEtudiants(array $etudiants) {
    }
}
?>
