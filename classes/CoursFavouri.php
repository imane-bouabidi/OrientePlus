<?php
require_once 'cours.php';

class CoursFavori {
    private $cours;

    public function __construct(Cours $cours) {
        $this->cours = $cours;
    }

    public function getCours() {
        return $this->cours;
    }
}
?>
