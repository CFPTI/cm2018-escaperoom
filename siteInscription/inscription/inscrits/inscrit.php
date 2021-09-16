<?php
require_once "fonctionsBD.inc.php";
$conn = connexionBase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Liste des inscrits</h1>
    <main>
        <form action="" method="post">
            <table>
                <th>Id rendez-vous</th>
                <th>Nom de réservation</th>
                <th>Heure de réservation</th>
                <th>Jour de réservation</th>
                <?php
                //Affiche chaque nom de la reservation de la table inscrit 
                $rdv = $conn->query("SELECT * FROM inscrits INNER JOIN rdv ON inscrits.idRdv = rdv.idRdv ORDER BY jour");
                if ($rdv->rowCount() > 0) {
                    while ($row = $rdv->fetchAll()) {
                        for ($i = 0; $i < count($row); $i++) { ?> <tr>
                                <td><?= $row[$i]['idRdv']; ?></td>
                                <td><?= $row[$i]['nomReservation'] ?></td>
                                <td><?= $row[$i]['heure'] ?></td>
                                <td><?= $row[$i]['jour'] ?></td>
                                <td><a href="delete.php?idRdv=<?= $row[$i]['idRdv']; ?>">Supprimer</a></td>
                            </tr> <?php
                                }
                            }
                        } ?>
            </table>
        </form>
        <a href="../index.php" class="back">Retour</a>
    </main>
</body>

</html>