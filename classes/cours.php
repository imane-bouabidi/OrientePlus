<?php
class Cours {
    private static $idCounter = 1; 
    protected $id;
    private $titre;
    private $contenu;
    private $valide;
    private $idFormateur;
    private $etudiants;
    private array $progressEtudiants;
    private Categorie $categorie;
    private $date;
    
    public function __construct($titre, $contenu,$idFormateur,Categorie $categorie) {
        $this->id = self::$idCounter++;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->idFormateur = $idFormateur;
        $this->valide = 0;
        $this->etudiants = [];
        $this->categorie = $categorie;
        $this->date = new DateTime();

    }

    public function getId() {
        return $this->id;
    }
    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }
    
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    public function getCategorie() {
        return $this->categorie;
    }
    public function getProgressEtudiants($id) {
        return $this->progressEtudiants[$id];
    }
    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setValide($valide) {
        $this->valide = $valide;
    }

    public function getValide() {
        return $this->valide;
    }

    public function getEtudiants()
    {
        return $this->etudiants;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function getEtudiantById($id)
    {
        foreach ($this->etudiants as $e) {
            if($e->getId()=== $id){
                return $e;
            }
        }
    }

    public function addEtudiants(Etudiant $etudiant)
    {
        $this->etudiants[] = $etudiant;
        $this->progressEtudiants[$etudiant->getId()] = 0;
    }
    public function updateProgressEtudiant(Etudiant $etudiant, $progress)
    {
        $this->progressEtudiants[$etudiant->getId()] = $progress;
    }
}
?>
