<?php
class Utilisateur {
    protected $nom;
    protected $prenom;
    protected $email;
    protected $role;
    protected $permissions;

    public function __construct($nom, $prenom, $email) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->role = 'utilisateur';
        $this->permissions = [];
    }


    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }
    public function getPermissions() {
        return $this->permissions;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }
    public function setPermissions($permission) {
        $this->permissions = $permission;
    }
}
?>
