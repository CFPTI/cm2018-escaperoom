<?php
require_once "fonctionsBD.inc.php";
$listRegistered = getInscrits();
$results = "";
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
    <?php
    //Affiche chaque nom de la reservation de la table inscrit
    $results = "<table>";
    foreach($listRegistered as $registered){
        $results .= "<tr>";
        $results .= "<td>".$registered["nomReservation"]."-".$registered["jour"]." ".$registered["heure"]."</td><br>";
        $results .="</tr>";
    }
    $results .= "</table>";
    echo $results;
    ?>
    <a href="../index.php" class="back">Retour</a>
    </main>
</body>
</html>