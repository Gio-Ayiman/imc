<?php 

    require 'connex.php';
    
    $date = $_POST['annee'];
    $nom = $_POST['nom'];
    $indice = $_POST['indice'];
    $statut = $_POST['statut'];
    $age = $_POST['age'];
    
    $sql = "INSERT INTO liste (annee, nom, indice, statut) VALUES ($date, '$nom', $indice, '$statut')";
    $conn->exec($sql);
    
    $conn = null;

    // header('Location: /imc/index.php');
    // exit;

    
    
      
      