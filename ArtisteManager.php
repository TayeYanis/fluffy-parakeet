<?php

class ArtisteManager {

        private $serveur;
        private $bd;
        private $user;
        public $pass;
        public $connexion;

    public function __construct ($serv, $b, $u, $p) {
        $this-> serveur=$serv;
        $this-> bd=$b;
        $this-> user=$u;
        $this-> pass=$p;


        $this->connexion = new PDO ('mysql:host='.$this->serveur.';dbname='.$this->bd.';charset=utf8', $this->user, $this->pass);
    }

    public function addArtiste ($artisteAjoute) {
        $req="INSERT INTO Artiste(nom,prenom,datenaissance,specialite,image)
                VALUES ( '".$artisteAjoute->nom ."','". $artisteAjoute->prenom ."','".
                $artisteAjoute->dateNaissance ."','". $artisteAjoute->specialite ."','".
                $artisteAjoute->photo ."');";
        $this->connexion->query($req);
        return ($this->connexion->lastInsertId());
    }

    public function getById ($lid) {
        $req="SELECT * FROM Artiste WHERE id = ".$lid;
        $recupdata = $this->connexion->query ( $req);
        $recupartiste = $recupdata->fetch();
        $lartiste = new Artiste ( $recupartiste ['nom'], $recupartiste['prenom'], $recupartiste['datenaissance'], $recupartiste['specialite'], $recupartiste['image'], $recupartiste['id']);
        return ( $lartiste);
    }

    public function getAll () {
        $req="SELECT * FROM Artiste";
        $result= $this->connexion->query($req);
        while($recupartiste = $result->fetch(PDO::FETCH_ASSOC)) {
            $tab[]= new Artiste($recupartiste['nom'], $recupartiste['prenom'], $recupartiste['datenaissance'], $recupartiste['specialite'], $recupartiste['image'] ,$recupartiste['id']);
        }
        return $tab;
    }
    

    public function afficheAll() {
        $str= "<table border='1'>";
        $str = "<table><tr><th>Home</th><th>Prenom</th><th>Date de naissance</th><th>Specialite</th><th>Image</th></tr>";
        $tous= $this->getAll();
        foreach ($tous as $lartiste) {
            $str .="<tr>";
            $str .="<td>".$lartiste->nom."</td>";
            $str .="<td>".$lartiste->prenom."</td>";
            $str .="<td>".$lartiste->dateNaissance."</td>";
            $str .="<td>".$lartiste->specialite."</td>";
            $str .="<td>".$lartiste->photo."</td>";
            $str .="<td><a href='modifier.php?=id=".$lartiste->id."'>modifier</a></td>";
            $str .="<tr/>";
        }
        $str .="</table>";
        return $str;
    }


}

?>