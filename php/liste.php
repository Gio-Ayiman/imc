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
                        print_r("<tbody><tr><td data-label='Date'>".$res['temps'] . "</td>"."<td data-label='Nom'>". $res['nom'] . "</td>" . "<td data-label='Indice'>" . $res['indice'] . "</td>" . "<td data-label='Statut'>". $res['statut']."</td>"."<td name='Supprimer'>"."<a href='./liste.php' class='clear-line' id=$id>"."</a>"."</td>"."</tr></tbody>"
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

    