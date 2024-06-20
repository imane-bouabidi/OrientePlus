<?php
require_once 'Utilisateur.php';
require_once 'CoursFavouri.php';
require_once 'candidature.php';

class Etudiant extends Utilisateur {
    private static $idCounter = 1; 
    protected $id;
    private $resultatsBac;
    private $coursSuivis;
    private $coursFavoris;
    private $candidatures;
    private $date;

    public function __construct($nom, $prenom, $email, $resultatsBac) {
        parent::__construct($nom, $prenom, $email);
        $this->id = self::$idCounter++;
        $this->resultatsBac = $resultatsBac;
        $this->coursFavoris = [];
        $this->candidatures = [];
        $this->date = new DateTime();

    }

    public function getId() :int {
        return $this->id;
    }
    public function getCoursSuivis() {
        return $this->coursSuivis;
    }
    public function getResultatsBac() {
        return $this->resultatsBac;
    }

    public function setResultatsBac($resultatsBac) {
        $this->resultatsBac = $resultatsBac;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function modifierProfile(Etudiant $etudiant){
        $this->setNom($etudiant->getNom());
        $this->setPrenom($etudiant->getPrenom());
        $this->setEmail($etudiant->getEmail());
        $this->setResultatsBac($etudiant->getResultatsBac());

        echo "Profil de mise à jours : " . $this->getNom() . ", " . $this->getPrenom(). ", " . $this->getEmail() . ", " . $this->getResultatsBac() . PHP_EOL;
    }

    public function consulterCours(array $cours) {
        echo "Les cours disponibles : " . "\n";
        foreach ($cours as $c) {
            if( $c->getValide() == 1){
                echo "Titre du cours : " . $c->getTitre() . ", Cours : " . $c->getContenu();
            }
        }
    }

    public function suivreCours(Cours $cours)
    {
        $this->coursSuivis[] = $cours;
        $cours->addEtudiants($this);
    }

    public function ajouterCoursFavori(Cours $cours) {
        $this->coursFavoris[] = $cours;
    }

    public function consulterCoursFavoris() {
        foreach ($this->coursFavoris as $coursFavori) {
            echo $coursFavori->getTitre() . "\n";
        }
    }

    public function envoyerCandidature(Programme $programme) {
        $c = new Candidature($this->getId(), $programme);
        $this->candidatures[] = $c;
         echo "\n Condidature envoyée !";
         return $c;
    }

    public function consulterUniversites(array $universites) {
        foreach ($universites as $universite) {
            if ($universite->getCritereAdmission() <= $this->resultatsBac) {
                echo $universite->getNom() . "\n";
            }
        }
    }

    public function recommanderUniversites(array $universites) {
        foreach ($universites as $universite) {
            if ($universite->getCritereAdmission() <= $this->resultatsBac) {
                echo $universite->getNom() . "\n";
            }
        }
    }
    public function envoyerMessage(Cours $cours,$contenu) {
        $message = new Message($this,$cours,$contenu);
        return $message;
    }
}
?>
