<?php
session_start();
date_default_timezone_set('Europe/Paris');
require_once "inscrits/fonctionsBD.inc.php";
if (filter_has_var(INPUT_POST,"heureDebut")) {    
    $nbPerson = filter_input(INPUT_POST, 'nbPerson', FILTER_VALIDATE_INT);    
    $jour = filter_input(INPUT_POST, 'jour', FILTER_SANITIZE_STRING);
    $heureDebut = date('H:i');
    $_SESSION["nbPersonne"] =  $nbPerson;
    $_SESSION["heureDebut"] =  $heureDebut;
    $_SESSION["jour"] =  $jour;    
}
if (filter_has_var(INPUT_POST,"heureFin")) {
    $heureFin = date('H:i');
    addInscrit($_SESSION["nbPersonne"] ,$_SESSION["heureDebut"],$heureFin, $_SESSION["jour"]);
}
$getInscrits = getInscrits();
$results = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription a l'escape game</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="index.php" method="post">
        <header>
            <h1>INSCRIPTION ESCAPE GAME</h1>
            <img class="logo" src="img/logo.png" alt="logo" >           
            <p>
                Nombre de personnes :
                <input type="number" name="nbPerson" >
                <br>
                Le jour :
                <input type="text" name="jour" >            
            </p>             
        </header>       
            <button name="heureDebut" value="submit_" id="submit">
                Debut
            
            </button>
            <br>
            <button name="heureFin" value="submit_" id="submit">Fin</button>        
<table>
    <tr>
        <td>Id</td>
        <td>Nombre de personnes</td>
        <td>Heure de debut</td>
        <td> Heure de fin</td>
        <td>jour</td>
    </tr>

    <?php 
    foreach($getInscrits as $inscrit){
    $results .="<tr> <td>" .$inscrit["idInscrit"]."</td> <td>".$inscrit["nbPersonne"]."</td> <td> ".$inscrit["heureDebut"]." </td> <td>". $inscrit["heureFin"]."</td> <td> ".$inscrit["jour"]."</td> </tr>";
    }
    echo $results;    
    ?>
    
    </table>
    
        </main>
    </form>
</body>

</html>