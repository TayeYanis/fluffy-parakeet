<?php

class Artiste extends Humain {
    public $specialite;
    public $photo;
    public $id;

    public function __construct($nom, $prenom, $datenaissance, $specialite, $photo, $id) {
        parent:: __construct($nom, $prenom, $datenaissance);
        $this->specialite = $specialite;
        $this->photo = $photo;
        $this->id = $id;
    }
    
}

?>