<?php
require_once 'classes/Utilisateur.php';
require_once 'classes/Etudiant.php';
require_once 'classes/Formateur.php';
require_once 'classes/Administrateur.php';
require_once 'classes/Universite.php';
require_once 'classes/programme.php';
require_once 'classes/cours.php';
require_once 'classes/categorie.php';
require_once 'classes/candidature.php';
require_once 'classes/CoursFavouri.php';
require_once 'classes/Messagerie.php';

$admin = new Administrateur("Admin", "Admin", "admin@gmail.com");

$universite1 = new Universite("UIT","uit@gmail.com","kenitra, Maroc");
$universite2 = new Universite("UIZ","uiz@gmail.com","Agadir, Maroc");

$universites = [$universite1,$universite2];
$programme1 = $universite1->ajouterProgramme("Informatique", "Description du programme", "4 ans", 12);
$programme2 = $universite1->ajouterProgramme("Informatique", "Description du programme", "4 ans",13);
$programme3 = $universite2->ajouterProgramme("Informatique", "Description du programme", "4 ans",11);
// $programme2 = $universite2->ajouterProgramme(2, "math", "Description du programme", "3 ans");

$etudiant = new Etudiant("test", "prenom", "test@gmail.com", 15);
// $etudiantUpdate = new Etudiant(1,"test update", "prenom", "test@gmail.com", 19);
// $etudiant->recommanderUniversites($universites);

$users =[$etudiant,$admin];
// $etudiant->consulterUniversites([$universite1, $universite2]);

// $recommendations = $etudiant->recommanderUniversites([$universite1, $universite2]);
// echo "Recommandations:\n";
// foreach ($recommendations as $universite) {
//     echo $universite->getNom() . "\n";
// }

// $etudiant->envoyerCandidature($programme1,$universite1);

// $etudiant->consulterCandidatures();
$categorie1 = new Categorie("Informatique", "Cours informatique");

$cours1 = new Cours("Cours de PHP", "Apprenez PHP POO",1,$categorie1);
$cours2 = new Cours("Cours de JavaScript", "Apprenez JavaScript",1,$categorie1);
// $cours3 = new Cours(3,"Cours de JavaScript", "Apprenez JavaScript");

$cours = [$cours1, $cours2];
// $etudiant->ajouterCoursFavori($cours1);
// $etudiant->ajouterCoursFavori($cours2);
// $etudiant->consulterCoursFavoris();
$etudiant->consulterCours($cours);

$admin->validerCours($cours1);
$etudiant->consulterCours($cours);

$users = [$admin ,$etudiant];

$candidature1 = $etudiant->envoyerCandidature($programme1);
$candidature2 = $etudiant->envoyerCandidature($programme2);
$candidature3 = $etudiant->envoyerCandidature($programme3);

$candidatures = [$candidature1,$candidature2,$candidature3];

$admin->consulterStatistiques($universites,$cours,$candidatures);



$formateur = new Formateur("yathine", "ba7azo", "yathine@gmail.com",1);

$admin->creerEtudiant("ikghz","lkhjzf","lohzed","lkjzqe");

$admin->attribuerPermission($etudiant,"yyyyyyyyy");

$etudiant2 = new Etudiant("kjh","oh","lkhjezf",12);
$etudiant3 = new Etudiant("kjyyy","oh","lkhjezf",12);
echo "\n ID : " . $etudiant->getId();
echo "\n ID : " . $etudiant2->getId();
echo "\n ID : " . $etudiant3->getId();

$etudiants = [$etudiant,$etudiant2,$etudiant3];

// foreach ($etudiants as $etudiant) {
//     echo "\netudiants avant :".$etudiant->getId() ;
// }
// $admin->supprimerEtudiant($etudiants,1);
// foreach ($etudiants as $etudiant) {
//     echo "\netudiants apres :".$etudiant->getId();
// }


// foreach ($etudiant->getCoursSuivis() as $c) {
//     echo "\nCours Suivis :". $c->getTitre();
// }
// foreach ($cours1->getEtudiants() as $e) {
//     echo "\nEtudiant qui Suis :". $cours1->getTitre() ."est : ".$e->getNom();
// }

$formateur->ajouterCours($cours1);
$etudiant->suivreCours($cours1);
$formateur->suivreEtudiants($cours1,$etudiant);
$formateurs = [$formateur];

$programmes = [$programme1,$programme2,$programme3];
$admin->genererRapportMensuel($etudiants,$candidatures,$cours,$formateurs,$programmes,$universites,06);
// $formateur->ajouterCours($cours1);
// // $formateur->ajouterCours($cours2);
// $formateur->consulterCours();

// $admin->validerCours($cours1);

// $formateur->consulterCours();

// $etudiant->modifierProfile($etudiantUpdate);

// $categorie2 = new Categorie("Mathematiques", "Cours mathematiques");

// $admin->ajouterCategorie($categorie1);
// $admin->ajouterCategorie($categorie2);

// $admin->consulterStatistiques();

// $admin->genererRapportMensuel();

