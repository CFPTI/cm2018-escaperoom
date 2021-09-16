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
</head>
<body>
    <h1>Liste des inscrits</h1>
    <?php
    //Affiche chaque nom de la reservation de la table inscrit
    foreach($listRegistered as $registered){
        $results .= $registered["nomReservation"]."-".$registered["jour"]." ".$registered["heure"]."<br>";
    }
    echo $results;
    ?>
</body>
</html>