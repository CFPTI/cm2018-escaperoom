<?php
require_once "constante.php";

function connexionBase()
{
    static $connexionBase = null;
    try {
        if ($connexionBase === null) {
            $connexionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $dbb = new PDO($connexionString, DB_USER, DB_PASS);
        }
    } catch (PDOException $error) {
        die("Erreur: " . $error->getMessage());
    }
    return $dbb;
}
//recupère les nom des groupes de la table "inscits"
function getInscrits()
{
    $query = connexionBase()->prepare("SELECT idInscrit ,nbPersonne,heureDebut,heureFin,jour FROM inscrits");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    
}
//recuppère le jour et l'heure de la table "rdv"


function addInscrit($nbPersonne, $heureDebut, $heureFin,$jour)
{
    $conn = connexionBase();
    $query = $conn->prepare('INSERT INTO inscrits (nbPersonne,heureDebut,heureFin,jour) VALUES (:nbPersonne,:heureDebut,:heureFin,:jour)');
    $query->bindParam(':nbPersonne', $nbPersonne, PDO::PARAM_INT);
    $query->bindParam(':heureDebut', $heureDebut, PDO::PARAM_STR);
    $query->bindParam(':heureFin', $heureFin, PDO::PARAM_STR);
    $query->bindParam(':jour', $jour, PDO::PARAM_STR);
    $query->execute();
}