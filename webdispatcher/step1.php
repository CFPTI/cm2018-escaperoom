<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
/*
  Author      : Guillaume Pin
  Date        : 25.09.2018
  Description : data management
*/
require("pdo.php");
validFirstStep();
$result = "step1 validated";
$resultJSON = json_encode($result);

print_r($resultJSON);
?>
