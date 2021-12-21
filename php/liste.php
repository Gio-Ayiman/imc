<html>
    <link rel="stylesheet" href="../css/style.css">
    <body id="liste-body">
    
    <?php require 'connex.php';

        $stmt = $conn->prepare("SELECT annee, nom, indice, statut FROM liste");
        $stmt->execute();
        $result = $stmt->fetchAll();

        echo "<div id='div-table'><table id='myTable'><thead><tr><th>Annee</th><th>Nom</th><th>Indice</th><th>Statut</th></tr></thead>";

        foreach($result as $res) {
        echo "<tbody><td>".$res['annee'] . "</td>"."<td>". $res['nom'] . "</td>" . "<td>" . $res['indice'] . "</td>" . "<td>". $res['statut']."</td>";
        };

        echo "</table></div>";

        $conn = null;
    ?>
    <div id="div-button-back"><a href="../index.php" id="link-back">Retour à l'acceuil</a></div>
    </body>        
</html>

    