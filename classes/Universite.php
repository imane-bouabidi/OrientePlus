<?php
require_once 'programme.php';
require_once 'candidature.php';

class Universite
{
    private static $idCounter = 1; 

    private $id;
    private $nom;
    private $email;
    private $adress;

    private $programmes;
    private $date;

    public function __construct($nom, $email, $adress)
    {
        $this->id = self::$idCounter++;
        $this->nom = $nom;
        $this->email = $email;
        $this->adress = $adress;
        $this->programmes = [];
        $this->date = new DateTime();

    }

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAdress()
    {
        return $this->adress;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function ajouterProgramme($nom, $description, $duree, $critereAdmission)
    {
        $programme = new Programme($nom, $description, $duree, $this, $critereAdmission);
        $this->programmes[] = $programme;
        return $programme;
    }
    public function modifierProgramme(Programme $programme, Programme $programmeUpdate)
    {
        $update = null;
        foreach ($this->programmes as &$p) {
            if ($p === $programme) {
                $p->setDescription($programmeUpdate->getDescription());
                $p->setDuree($programmeUpdate->getDuree());
                $p->setCritereAdmission($programmeUpdate->getCritereAdmission());
                $update = 1;
                break;
            }
        }
        if ($update) {
            echo "Programme Updated successfuly ! \n";
        }else{
            echo "Programme not found for this university ! \n";
        }
    }
    public function supprimerProgramme(Programme $programme)
    {
        foreach ($this->programmes as $key => $p) {
            if ($p === $programme) {
                unset($this->programmes[$key]);
                break;
            }
        }
    }

    public function communiquerCriteres(array $programmes)
    {
        foreach ($programmes as $programme) {
            echo "Programme : " . $programme->getNom() . ", Description : " . $programme->getDescription() . ", Universite : " . $programme->getUniversite() . ", Durée : " . $programme->getDuree() . "\n";
        }
    }

    public function consulterProgrammes()
    {
        foreach ($this->programmes as $programme) {
            echo $programme->getNom() . "\n";
        }
    }

    public function ConsulterCandidatures(array $candidatures)
    {
        foreach ($candidatures as $candidature) {
            if($candidature->getProgramme()->getUniversite()->getId() == $this->getId()){
                echo "Candidature de l'etudiant : " . $candidature->getIdEtudiant() . " pour le programme: " . $candidature->getProgramme()->getNom() . "\n";
            }
        }
    }

    public function gererDecisions(Candidature $candidature, $decision)
    {
        if($candidature->getProgramme()->getUniversite()->getId() == $this->getId()){
            $candidature->setDecision($decision);
        }
    }
    public function communiquerDecisions(array $candidatures)
    {
        echo "\nListe des Condidatures avec decisions : \n";
        foreach ($candidatures as $candidature) {
            echo "Candidature de: " . $candidature->getEtudiant()->getNom() . " pour le programme: " . $candidature->getProgramme()->getNom() . ", Decision : " . $candidature->getDecision() . "\n";
        }
    }

}
?>