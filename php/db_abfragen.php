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
            echo "id: " . $row["id"] . " - Name: " . $row["vorname"] . " " . $row["nachname"] . " - E-Mail:  " . $row["email"] . "<br>";
        }
    } else {
        echo "Keine Inhalte";
    }
    $database->close();
}

function getUserT()
    /**
     * gibt alle Nuter mit <td>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM user;';
    $result = $database->query($sql);
    echo "
    <tr>
        <th>id</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>  
        <th>Zinsbefreit</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>".
                "<td>".$row["id"] ."</td>".
                "<td>".$row["vorname"] ."</td>".
                "<td>".$row["nachname"] ."</td>".
                "<td>".$row["email"] ."</td>".
                "<td>".boolZuTest($row["zinsen"]) ."</td>".
                "</tr>";
        }
    } else {
        echo "Keine Inhalte";
    }
    $database->close();
}

function boolZuTest($in)
{
    if ($in == 0) {
        return "Nein";
    } else {
        return "Ja";
    }
}

function getBuchung()
{

}

function getKontostand($user)
{
    $database = connect();
    $sql = 'SELECT kontostand FROM user WHERE id IS' . $user . ';';
    $result = $database->query($sql);
    echo $result;
    $database->close();
}

?>