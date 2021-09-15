<?php
define("HEURE_DEBUT", 9);
define("HEURE_FIN", 20);

function afficherTableauHeures(){
    $tableauMinutes = ["00", "20", "40"];
    echo "<table>";
    for($i=HEURE_DEBUT; $i<=HEURE_FIN; $i++){
        echo "<tr>";
        foreach ($tableauMinutes as $value) {
            echo "<td id=\"".$i."h".$value."\" onclick='heureChoisie(\"".$i . "h" . $value . "\", this)'>". $i ."h" . $value ."</td>";
        }
        echo "</tr>";
    }


    echo "</table>";
}
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
    <header>
        <h1>INSCRIPTION ESCAPE GAME</h1>
        <p>Jour : 
            <select name="jour">
                <option value="">mardi</option>
                <option value="">mercredi</option>
                <option value="">jeudi</option>
                <option value="">vendredi</option>
                <option value="">samedi</option>
                <option value="">dimanche</option>
            </select>
        </p>
    </header>
    <main>       
            <?php afficherTableauHeures();?>
    </main>
    <script>
    function heureChoisie(heure, sender){
       let button = document.getElementByClass("td");
       let ancienneHeureChoisi = button.getAttribute("value").split('_')[1]; //en cas de changement
        if(ancienneHeureChoisi != "" && ancienneHeureChoisi != null){
            document.getElementById(ancienneHeureChoisi).setAttribute("class", "");
            button.setAttribute("value", "submit_");
        }
        sender.setAttribute("class", "selected");
        let value = "submit_"+heure;
        button.setAttribute("value", value);
    }

</script>
</body>
</html>