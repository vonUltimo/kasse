<?php
/**
 * Hier werden sämtlichen Datenbankabfragen gescrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */


include "lib.php";


function getUser($id)
    /*
     * gibt den Nutzer mit der übergebenen id zurück.
     * *** NICHT FERTIG ***
     */
{
    $database = connect();
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = $database->query($sql);
    $database->close();
    return $result;
}

function getUserTable()
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
        <th>Kontostand</th>
        <th>Zinsbefreit</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
                "<td>" . $row["id"] . "</td>" .
                "<td>" . $row["vorname"] . "</td>" .
                "<td>" . $row["nachname"] . "</td>" .
                "<td>" . $row["email"] . "</td>" .
                "<td>" . $row["kontostand"] . " €" . "</td>" .
                "<td>" . boolZuText($row["zinsen"]) . "</td>" .
                "</tr>";
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
    /*
      * gibt den Kontostand des Nutzers mit der übergebenen id zurück.
     * *** NICHT FERTIG ***
     */
{
    $database = connect();
    $sql = "SELECT kontostand FROM user WHERE id=$user;";
    $result = $database->query($sql);
    $out = $result->fetch_assoc(); // wie kann ich diesen wert auslesen???
    $database->close();
    echo "läuft";
    return $out;
}

?>