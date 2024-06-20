<?php
require_once 'Utilisateur.php';
require_once 'cours.php';
require_once 'categorie.php';

class Administrateur extends Utilisateur {
    private static $idCounter = 1; 
    protected $id;
    private $utilisateurs;
    private $categories;

    public function __construct($nom, $prenom, $email) {
        parent::__construct($nom, $prenom, $email);
        $this->id = self::$idCounter++;
        $this->utilisateurs = [];
        $this->categories = [];
    }

    public function getId() {
        return $this->id;
    }

    public function creerEtudiant($nom, $prenom, $email, $resultatsBac) {
        $etudiant = new Etudiant($nom,$prenom,$email,$resultatsBac);
        $this->utilisateurs[] = $etudiant;
        echo "\n Etudiant " . $nom . ", crée avec succes !";
    }
    public function creerFormateur($nom, $prenom, $email, Universite $Universite) {
        $formateur = new Formateur($nom,$prenom,$email,$Universite->getId());
        $this->utilisateurs[] = $formateur;
        echo "\n Formateur " . $nom . ", crée avec succes !";
    }
    public function creerUniversite($nom, $email, $adress) {
        $universite = new Universite($nom,$email,$adress);
        $this->utilisateurs[] = $universite;
        echo "\n Universite " . $nom . ", crée avec succes !";
    }

    public function modifierEtudiant(Etudiant $etudiant, $nom,$prenom,$email,$resultatsBac) {
        $etudiant->setNom($nom);
        $etudiant->setPrenom($prenom);
        $etudiant->setEmail($email);
        $etudiant->setResultatsBac($resultatsBac);
        echo "\nEtudiant " .$nom . "est modifié !";
    }
    public function modifierFormateur(Formateur $formateur, $nom,$prenom,$email, Universite $universite) {
        $formateur->setNom($nom);
        $formateur->setPrenom($prenom);
        $formateur->setEmail($email);
        $formateur->setIdUniversite($universite->getId());
        echo "\nFormateur " .$nom . "est modifié !";
    }
    public function modifierUniversite(Universite $universite, $nom,$email,$adress) {
        $universite->setNom($nom);
        $universite->setEmail($email);
        $universite->setAdress($adress);
        echo "\Universite " .$nom . "est modifié !";
    }

    public function supprimerEtudiant(array &$etudiants, $idEtudiant) {
        foreach ($etudiants as $key => $e) {
            if ($e->getId() == $idEtudiant) {
                unset($etudiants[$key]);
                break;
            }
        }
    }
    
    public function supprimerFormateur(array $formateurs,$idFormateurs) {
        foreach ($formateurs as $key => $f) {
            if ($f->getId() === $idFormateurs) {
                unset($formateurs[$key]);
                break;
            }
        }
    }
    public function supprimerUniversite(array $universites,$idUniversites) {
        foreach ($universites as $key => $u) {
            if ($u->getId() === $idUniversites) {
                unset($universites[$key]);
                break;
            }
        }
    }

    public function attribuerRole(Utilisateur $utilisateur, $role) {
        $utilisateur->setRole($role);
    }
    public function attribuerPermission(Utilisateur $utilisateur, $permission) {
        $utilisateur->setPermissions($permission);
    }

    public function validerCours(Cours $cours) {
        $cours->setValide(1);
    }

    public function ajouterCategorie(Categorie $categorie) {
        $this->categories[] = $categorie;
    }

    // public function modifierCategorie(Categorie $ancienneCategorie, Categorie $nouvelleCategorie) {
    //     foreach ($this->categories as &$cat) {
    //         if ($cat === $ancienneCategorie) {
    //             $cat = $nouvelleCategorie;
    //         }
    //     }
    // }

    // public function supprimerCategorie(Categorie $categorie) {
    //     foreach ($this->categories as $key => $cat) {
    //         if ($cat === $categorie) {
    //             unset($this->categories[$key]);
    //             break;
    //         }
    //     }
    // }

    public function consulterStatistiques(array $universites, array $cours, array $candidatures) {
        echo "\n------------------------\nStatistiques d'utilisation:\n";
        echo "\nNombre de cours et inscriptions : " ;
        foreach ($cours as $c) {
            echo "\nCours : " . $c->getTitre() . ", Nombre d'inscriptions : ".count($c->getEtudiants());
        }
        echo "\nNombre de candidatures aux universites : " ;
        foreach ($universites as $u) {
            $nbrCandidatures =0;
            foreach ($candidatures as $c) {
                if($u->getId() === $c->getProgramme()->getUniversite()->getId()){
                    $nbrCandidatures ++;
                }
            }
            echo "\nUniversite : " . $u->getNom() . ", Nombre de candidatures : ".$nbrCandidatures. "\n";
        }
    }

    public function genererRapportMensuel(array $etudiant,array $candidatures,array $cours,array $formateurs,array $programmes,array $universites ,$mois) {
        echo "\n Rapport du mois " . $mois. " : \n";
        echo "\nUniversites : ". count($universites);
        echo "\nCandidatures : ". count($candidatures);
        echo "\netudiant : ". count($etudiant);
        echo "\ncours : ". count($cours);
        echo "\nformateurs : ". count($formateurs);
        echo "\nprogrammes : ". count($programmes);
    }
}

