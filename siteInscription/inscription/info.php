<?php
require_once "inscrits/fonctionsBD.inc.php";
$conn = connexionBase();
echo "Le total de personnes est de " . getTotalOfPersons();
echo "<br>";
echo "Le total de rendez-vous est de " . getTotalOfRdv();
