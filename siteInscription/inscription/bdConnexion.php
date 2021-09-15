<?php

const DB_HOST = 'localhost';
const DB_NAME = '';
const DB_USER = 'root';
const DB_PASSWORD = '';

function getConnexion()
{
    static $db = NULL;
    try {
        if ($db == NULL) {
            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));
        }
    } catch (PDOException $e) {
        echo "DB connection error, see logs.";
        var_dump($e);
        error_log($e->getMessage());
    }
    return $db;
}

$conn = getConnexion();

?>