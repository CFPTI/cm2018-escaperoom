<?php
require_once "inscrits/fonctionsBD.inc.php";
$conn = connexionBase();
echo "Le total de personnes est " . getTotalOfPersons();
