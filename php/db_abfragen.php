<?php
/**
 * Hier werden sämtlichen Datenbankabfragen gescrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */


function connect()
{
    if (isset($mysqli)) {
        return;
    }
    $mysqli = new mysqli('127.0.0.1', 'kasse_user', 'K4b5xBnPrFGM4TRZ', 'Kasse');
    if ($mysqli->connect_error) {
        die("Verbindung zu Datenbank felhlgeschlagen: " . $mysqli->connect_error);
    }
    return $mysqli;
}


function getUser()
    /*
     * gibt alle Nutzer als Liste über echo aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM user;';
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["vorname"] . " " . $row["nachname"] ." - E-Mail:  ". $row["email"] . "<br>";
        }
    } else {
        echo "Keine Inhalte";
    }
    $database->close();
}

function getBuchung()
{
}

function getKontostand($user)
{

}

?>