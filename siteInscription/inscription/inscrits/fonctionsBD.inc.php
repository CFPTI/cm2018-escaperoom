<?php
require_once "constante.php";

function connexionBase(){
    static $connexionBase = null;
    try{
        if($connexionBase === null){
            $connexionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $dbb = new PDO($connexionString, DB_USER,DB_PASS);
        }
    }catch(PDOException $error){
        die("Erreur: ". $error -> getMessage());
    }
    return $dbb;
}
//recupère les nom des groupes de la table "inscits"
function getInscrits(){
    $query=connexionBase()->prepare("SELECT nomReservation , jour,heure FROM inscrits INNER JOIN rdv ON inscrits.idRdv = rdv.idRdv ");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
//recuppère le jour et l'heure de la table "rdv"
function getTime(){
    $query=connexionBase()-> prepare("SELECT jour,heure FROM rdv");
    $query->execute();
    return $query-> fetchAll(PDO::FETCH_ASSOC);
}
?>