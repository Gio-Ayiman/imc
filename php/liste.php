<?php 
require 'connex.php';

    $stmt = $conn->prepare("SELECT annee, nom, indice, statut FROM liste");
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo "<table><thead><tr><th>Annee</th><th>Nom</th><th>Indice</th><th>Statut</th></tr></thead>";

    foreach($result as $res) {
       echo "<tbody><td>".$res['annee'] . "</td>"."<td>". $res['nom'] . "</td>" . "<td>" . $res['indice'] . "</td>" . "<td>". $res['statut']."</td>";
    };

    echo "</table>";

    $conn = null;
?>
    <html>
        <a href="/imc/index.php">Retour à l'acceuil</a>
    </html>

    