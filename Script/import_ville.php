<?php
    $file = fopen('villes_france.csv', 'r');
    $i = 0;
    while ($data[$i] = fgetcsv($file, 1024, ',')) {
        $i++;
    }

   $bddOkazou = new PDO('mysql:host=localhost;dbname=okazou;charset=utf8', 'root', '');
        
    for ($i= 0; $i < count($data); $i++) {
        $req = $bddOkazou->prepare("INSERT INTO ville (nom, nom_reel, longitude, latitude) VALUES(:nom, :nom_reel, :longitude, :latitude)");

        $req->bindParam(':nom', $data[$i][4], PDO::PARAM_STR);
        $req->bindParam(':nom_reel', $data[$i][5], PDO::PARAM_STR);
        $req->bindParam(':longitude', $data[$i][21], PDO::PARAM_STR);
        $req->bindParam(':latitude', $data[$i][22], PDO::PARAM_STR);

        $req->execute();
    }
    
?>