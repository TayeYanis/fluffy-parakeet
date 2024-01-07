<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seance 12 - Manipulation de base de données</title>
</head>
<body>
<h1>Manipulation de base de données et d'Artiste</h1>
<?php
    include 'Humain.php';
    include 'Artiste.php';
    include 'ArtisteManager.php';
    $am = new ArtisteManager('mariadb', 'demowp', 'demowp', '123456');
    $artiste1 = new Artiste( 'bubububub', 'zazazazaza', '01/01/1000', 'Auteur', 'doyle.jpg', 0);
    echo "<h> la creation de l'artist1 marche: " . $artiste1->sePresente() . "</h>";
        $id = $am->addArtiste($artiste1);
        echo '<p>Artiste ajouté avec l\'id numéro '.$id.'</p>';
        $artiste2 = $am->getById($id);
        echo '<p>'.$artiste2->sePresente().'</p>';
    
    echo "<h1>Affichage de tous les artistes</h1>";
    echo $am->afficheAll();
?>
</body>
</html>