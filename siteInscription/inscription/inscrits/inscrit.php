<?php
require_once "fonctionsBD.inc.php";
$conn = connexionBase();

$jourFiltre = filter_input(INPUT_POST, 'filtre');

$jours = ["mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];

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
            <?php
            echo '<select name="filtre" id="filtre" onchange="changeDayView()">';

            foreach ($jours as $value) {

                # if the current month the user has selected is the same month as the
                # one in $value on this iteration, mark this option as the selected option.
                if ($jourFiltre == $value) {
                    $sel = 'selected';
                } else {
                    # this option is not selected
                    $sel = '';
                }

                # create the option, and mark it as selected if needed.
                echo "<option value=\"$value\" $sel>$value</option>";
            }

            echo '</select>'; ?>
            <!--<select name="filtre" id="filtre" onchange="changeDayView()">
                <option value="mardi">mardi</option>
                <option value="mercredi">mercredi</option>
                <option value="jeudi">jeudi</option>
                <option value="vendredi">vendredi</option>
                <option value="samedi">samedi</option>
                <option value="dimanche">dimanche</option>
            </select>-->
            <table>
                <th>Id rendez-vous</th>
                <th>Nom de réservation</th>
                <th>Heure de réservation</th>
                <th>Jour de réservation</th>
                <?php
                //Affiche chaque nom de la reservation de la table inscrit 
                $rdv = $conn->query("SELECT * FROM inscrits INNER JOIN rdv ON inscrits.idRdv = rdv.idRdv WHERE rdv.jour = '$jourFiltre'");
                if ($rdv->rowCount() > 0) {
                    while ($row = $rdv->fetchAll()) {
                        for ($i = 0; $i < count($row); $i++) { ?> <tr>
                                <td><?= $row[$i]['idRdv']; ?></td>
                                <td><?= $row[$i]['nomReservation'] ?></td>
                                <td><?= $row[$i]['heure'] ?></td>
                                <td><?= $row[$i]['jour'] ?></td>
                                <td><a href="delete.php?idRdv=<?= $row[$i]['idRdv']; ?>">Supprimer</a></td>
                                <td><a href="update.php?idRdv=<?= $row[$i]['idRdv']; ?>">Modifier</a></td>
                            </tr> <?php
                                }
                            }
                        } ?>
            </table>
            <input type="submit" id="submitButton" value="test" hidden>
        </form>
        <a href="../index.php" class="back">Retour</a>
    </main>
    <script>
        function changeDayView() {
            submitButton.click();
        }
    </script>
</body>

</html>