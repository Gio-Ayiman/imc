<?php include("connex.php");

    $id = intval($_GET['q']);

    $sql = "DELETE FROM liste WHERE id=$id";
    $conn->exec($sql);

    header('Location: ../index.php');
    exit;
    
    $conn = null;
    