<?php
$host = 'localhost';
$uname = 'kasse_user';
$pw = 'K4b5xBnPrFGM4TRZ';
$db = 'Kasse';
$test = 'ein Test';

function connect()
{
    //require 'config/config.php';
    $databaseobject = new mysqli('localhost', 'kasse_user', 'K4b5xBnPrFGM4TRZ', 'Kasse');
    if ($databaseobject->connect_error) {
        die("Verbindung zu Datenbank felhlgeschlagen: " . $databaseobject->connect_error);
    }
    return $databaseobject;
}


function getUser()
{
    $db = connect();
    $sql_abfrage = 'SELECT * FROM user;';
    $result = $db->query($sql_abfrage);
}

function getBuchung()
{
}

function getKontostand($user)
{
}

?>