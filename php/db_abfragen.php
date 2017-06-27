<?php
$host = 'localhost';
$uname = 'kasse_user';
$pw = 'K4b5xBnPrFGM4TRZ';
$db = 'Kasse';
$mysqliO='';

function connect()
{
    //require 'config/config.php';
    global $mysqliO;
    $mysqliO = new mysqli('localhhost', 'kasse_user', 'K4b5xBnPrFGM4TRZ', 'Kasse');
    if ($mysqliO->connect_error) {
        die("Verbindung zu Datenbank felhlgeschlagen: " . $mysqliO->connect_error);
    }
    return $mysqliO;
}


function getUser()
    /*
     * gibt alle Nutzer zurück.
     */
{
    $db = connect();
    $sql = 'SELECT * FROM user;';
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["vorname"]. " " . $row["nachname"]. $row["email"]."<br>";
        }
    } else {
        echo "0 results";
    }
    $db->close();
}

function getBuchung()
{
}

function getKontostand($user)
{

}

?>