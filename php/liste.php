<html>
    <link rel="stylesheet" href="../css/style.css">
    <body id="liste-body">
    
    <?php require 'connex.php';

        $stmt = $conn->prepare("SELECT id, temps, nom, indice, statut FROM liste ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(); ?>


    <div id="div-table">
        <table id="myTable">
            <thead>
                <th>Date</th>
                <th>Nom</th>
                <th>Indice</th>
                <th>Statut</th>
                <th>Supprimer</th>
            </thead>
                <?php
                    foreach($result as $res) {
                        $id = $res['id'];
                        print_r("<tbody><td>".$res['temps'] . "</td>"."<td>". $res['nom'] . "</td>" . "<td>" . $res['indice'] . "</td>" . "<td>". $res['statut']."</td>"."<td>"."<button class='clear-line' id=$id>"."</button>"."</td>"."</tbody>"
                    );
                    };
                        $conn = null;
                ?>
        </table>
    </div>
    <div id="div-button-back"><a href="../index.php" id="link-back">Retour à l'acceuil</a></div>
    </body>        
    <script src="../scripts/main.js"></script>
</html>

    