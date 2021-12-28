<?php require 'connex.php';

    // $date = new Datetime
    $nom = $_POST['nom'];
    $indice = $_POST['indice'];
    $statut = $_POST['statut'];
    
    $sql = "INSERT INTO liste (nom, indice, statut) VALUES ('$nom', $indice, '$statut')";
    $conn->exec($sql);
    
    $conn = null;


    
    
      
      