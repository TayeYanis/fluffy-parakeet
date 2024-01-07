<?php

Class Humain {
    public $nom;
    public $prenom;
    public $dateNaissance;

    public function __construct($nom, $prenom, $dateNaissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function sePresente() {
        return "Je m'appelle $this->prenom $this->nom et je suis né le $this->dateNaissance";
    }
}
?>