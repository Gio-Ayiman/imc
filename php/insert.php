<?php require 'connex.php';

    // $date = new Datetime
    $nom = $_POST['nom'];
    $indice = $_POST['indice'];
    $statut = $_POST['statut'];
    $mail = $_POST['mail'];
    
    $sql = "INSERT INTO liste (nom, indice, statut, mail) VALUES ('$nom', $indice, '$statut', '$mail')";
    $conn->exec($sql);
    
    $conn = null;


    
    
      
      