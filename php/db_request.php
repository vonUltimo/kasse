<?php
/**
 * Hier werden sämtlichen Datenbankabfragen geschrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */

include_once "lib.php";

function getEntrys($table)
{
    /*
     * Gibt die Anzahl der Einträge für die übergebene Tabelle zurück
     *
     */
    $database = connect();
    $sql = "SELECT COUNT(*) FROM $table";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["COUNT(*)"];
    $database->close();
    return $out;
}

function getUserTable()
    /**
     * gibt alle Nutzer mit <td>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM user;';
    $result = $database->query($sql);
    echo "
    <table>
    <tr>
        <th>id</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>  
        <th>Kontostand</th>
        <th>Zinsbefreit</th>
        <th>Hausbewohner</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
                "<td>" . $row["id"] . "</td>" .
                "<td>" . $row["vorname"] . "</td>" .
                "<td>" . $row["nachname"] . "</td>" .
                "<td>" . $row["email"] . "</td>" .
                "<td>" . $row["kontostand"] . "&nbsp€" . "</td>" .
                "<td>" . boolZuText($row["zinsen"]) . "</td>" .
                "<td>" . boolZuText($row["hausbewohner"]) . "</td>" .
                "</tr>";
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</table>";
    $database->close();
}

function getUserOption()
    /**
     * gibt alle Nutzer mit <option>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM user;';
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<option value=".$row["id"].">" . $row["vorname"] ." ".$row["nachname"] ."</option>" ;
        }
    } else {
        echo "Keine Inhalte";
    }
    $database->close();
}

function getUserOptionS($user){
    /*
     * --NICHT FERTIG##
     */
    $database = connect();
    $sql = "select * from user;";
    $result = $database->query($sql);
    $out = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["id"]==$user) {
                $out .= "<option selected value=" . $row["id"] . ">" . $row["vorname"]  ." ". $row["nachname"]. "</option>\n";
            }else{
                $out .= "<option value=" . $row["id"] . ">" . $row["vorname"]  ." ". $row["nachname"]. "</option>\n";
            }
        }
    } else {
        $out="";
    }
    $database->close();
    return $out;
}
function getVereinSelectOption()
    /**
     * gibt alle Vereine mit <select><option>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM verein;';
    $result = $database->query($sql);
    echo "<select name=\"vereinoption\">\n";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<option value=".$row["VNummer"].">" . $row["VName"] ."</option>" ;
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</select>";
    $database->close();
}

function getVereinOption($verein)
    /**
     * gibt alle Vereine mit <option>Tags aus.
     */
{
$database = connect();
    $sql = 'SELECT * FROM verein;';
    $result = $database->query($sql);
    $out="";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["VNummer"]==$verein) {
                $out .= "<option selected value=" . $row["VNummer"] . ">" . $row["VName"] . "</option>";
            }else{
                $out .= "<option value=" . $row["VNummer"] . ">" . $row["VName"] . "</option>";
            }
        }
    } else {
        $out="";
    }
    $database->close();
    return $out;
}

function getVerwendungszweckOptionS($zweck){

    $database = connect();
    $sql = 'SELECT * FROM verwendungszweck;';
    $result = $database->query($sql);
    $out="";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["zwecknummer"]==$zweck) {
                $out .= "<option selected value=" . $row["zwecknummer"] . ">" . $row["Beschreibung"] . "</option>";
            }else{
                $out .= "<option value=" . $row["zwecknummer"] . ">" . $row["Beschreibung"] . "</option>";
            }
        }
    } else {
        $out="";
    }
    $database->close();
    return $out;

}

function getUserGroupOption()
    /**
     * gibt alle Nutzergruppen mit <option>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM usergroup WHERE gid > 2;';
    $result = $database->query($sql);
    echo "<select name=\"usergroupOption\">\n";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<option value=".$row["gid"].">" . $row["gname"] ."</option>" ;
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</select>";
    $database->close();
}


function getGruppeOption($gruppe)
    /**
     * gibt alle Vereine mit <option>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM usergroup;';
    $result = $database->query($sql);
    $out="";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["gid"]== $gruppe) {
                $out .= "<option selected value=" . $row["gid"] . ">" . $row["gname"] . "</option>";
            } else {
                $out .= "<option value=" . $row["gid"] . ">" . $row["gname"] . "</option>";
            }
        }
    } else {
        $out="";
    }
    $database->close();
    return $out;
}

function getVerwendungszweckOption()
    /**
     * gibt alle Verwendungszwecke mit <option>Tags aus.
     */
{
    $database = connect();
    $sql = 'SELECT * FROM verwendungszweck;';
    $result = $database->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<option value=".$row["zwecknummer"].">" . $row["Beschreibung"] ."</option>" ;
        }
    } else {
        echo "Keine Inhalte";
    }
    $database->close();
}

function getBuchung($anzahl, $user, $richtung)
    /**
     * gibt die $anzahl letzten Buchungen von $user mit <td>Tags aus.
     * Richtung: 0=von user, 1= an user, 2 oder mehr=mit user
     */
{
    if ($richtung == 0) {
        $sql = "SELECT * FROM buchung WHERE user_von=$user ORDER BY datum DESC LIMIT $anzahl;";
    } elseif ($richtung == 1) {
        $sql = "SELECT * FROM buchung WHERE user_zu=$user ORDER BY datum DESC LIMIT $anzahl;";
    } else {
        $sql = "SELECT * FROM buchung WHERE user_von=$user OR user_zu=$user ORDER BY datum DESC LIMIT $anzahl;";
    }
    $database = connect();
    $result = $database->query($sql);
    echo "
    <table>
    <tr>
        <th>Bebucht von</th>
        <th>Gebucht an</th>
        <th>Betrag</th>  
        <th>Gebucht am</th>
        <th>Verwendungszweck</th>
        <th>Anmerkung</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
                "<td>" . getUser($row["user_von"]) . "</td>" .
                "<td>" . getUser($row["user_zu"]) . "</td>" .
                "<td>" . $row["betrag"] . " €" . "</td>" .
                "<td>" . $row["datum"] . "</td>" .
                "<td>" . getVerwendungszweck($row["zwecknummer"]) . "</td>" .
                "<td>" . $row["anmerkung"] . "</td>" .
                "</tr>";
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</table>";
    $database->close();
}

function getBuchungToDel()
    /**
     * --NICHT FERTIG--
     */
{
    $sql = "SELECT * FROM buchung WHERE zum_loeschen_vorgemerkt != '1' ORDER BY buchungsnummer DESC LIMIT 10;";
    $database = connect();
    $result = $database->query($sql);
    echo "
    <form method=\"post\" action=".htmlspecialchars($_SERVER["PHP_SELF"]) .">
    <table>
    <tr>
        <th>Löschen?</th>
        <th>Bebucht von</th>
        <th>Gebucht an</th>
        <th>Betrag</th>  
        <th>Gebucht am</th>
        <th>Verwendungszweck</th>
        <th>Anmerkung</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
                "<td><input type='checkbox' name='".$row["buchungsnummer"]."' value='".$row["buchungsnummer"]."'></td>" .
                "<td>" . getUser($row["user_von"]) . "</td>" .
                "<td>" . getUser($row["user_zu"]) . "</td>" .
                "<td>" . $row["betrag"] . " €" . "</td>" .
                "<td>" . $row["datum"] . "</td>" .
                "<td>" . getVerwendungszweck($row["zwecknummer"]) . "</td>" .
                "<td>" . $row["anmerkung"] . "</td>" .
                "</tr>";
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</table> <br><input type='submit'></form>";
    $database->close();
}

function getBuchungDel()
    /**
     * --NICHT FERTIG--
     */
{
    $sql = "SELECT * FROM buchung ORDER BY zum_loeschen_vorgemerkt DESC LIMIT 10;";
    $database = connect();
    $result = $database->query($sql);
    echo "
    <form method=\"post\" action=".htmlspecialchars($_SERVER["PHP_SELF"]) .">
    <table>
    <tr>
        <th>Löschen?</th>
        <th>Bereits vorgemerkt</th>
        <th>Bebucht von</th>
        <th>Gebucht an</th>
        <th>Betrag</th>  
        <th>Gebucht am</th>
        <th>Verwendungszweck</th>
        <th>Anmerkung</th>
    </tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
                "<td><input type='checkbox' name='".$row["buchungsnummer"]."' value='".$row["buchungsnummer"]."'></td>" .
                "<td>" . boolZuText($row["zum_loeschen_vorgemerkt"]) . "</td>" .
                "<td>" . getUser($row["user_von"]) . "</td>" .
                "<td>" . getUser($row["user_zu"]) . "</td>" .
                "<td>" . $row["betrag"] . "&nbsp€" . "</td>" .
                "<td>" . $row["datum"] . "</td>" .
                "<td>" . getVerwendungszweck($row["zwecknummer"]) . "</td>" .
                "<td>" . $row["anmerkung"] . "</td>" .
                "</tr>";
        }
    } else {
        echo "Keine Inhalte";
    }
    echo "</table> <br><input type='submit'></form>";
    $database->close();
}

function getVerwendungszweck($zwecknummer)
    /*
       * gibt den Namen des Verwendungszweckes mit der übergebenen zwecknummer zurück.
      */
{
    $database = connect();
    $sql = "SELECT * FROM verwendungszweck WHERE zwecknummer=$zwecknummer;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["Beschreibung"];
    $database->close();
    return $out;
}

function getKontostand($user)
    /*
      * gibt den Kontostand des Nutzers mit der übergebenen id zurück.
     */
{
    $database = connect();
    $sql = "SELECT kontostand FROM user WHERE id=$user;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["kontostand"];
    $database->close();
    return $out . " €";
}

function getUserGroup($gid)
    /*
      * gibt die Gruppe zu der übergebenen gid zurück.
     */
{
    $database = connect();
    $sql = "SELECT * FROM usergroup WHERE gid=$gid;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["gname"];
    $database->close();
    if ($out != null) {
        return $out;
    }
    return "Diese Gruppe existiert nicht!";
}

function getIt($table, $zeile, $zeilenwert, $spalte)
{
    /**
     * Univerlase Funktion um einen einzelnen Wert abzufragen.
     *Gibt Wert der spalte $spalte aus Tabelle $table where $zeile=$zeilenwert
     */
    $database = connect();
    $sql = "SELECT * FROM $table WHERE $zeile " . "=" . " '$zeilenwert';";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["$spalte"];
    $database->close();
    return $out;
}

function getUserGroupId($id)
    /*
      * gibt die Gruppenummer zu der übergebenen Nutzer ID zurück.
     */
{
    $database = connect();
    $sql = "SELECT * FROM user WHERE id=$id;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["gruppe"];
    $database->close();
    return $out;
}

function getVName($id)
    /*
      * gibt den Namen des Vereins mit der übergebenen id zurück.
     */
{
    $database = connect();
    $sql = "SELECT * FROM verein WHERE VNummer=$id;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["VName"];
    $database->close();
    return $out;
}

function getUser($user)
    /*
      * gibt den Namen des Nutzers mit der übergebenen id zurück.
     */
{
    $database = connect();
    $sql = "SELECT * FROM user WHERE id=$user;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["vorname"] . " " . $row["nachname"];
    $database->close();
    if ($out != " ") {
        return $out;
    }
    return "Dieser Nutzer existiert nicht!";
}

function getLastBuchung(){
    $database = connect();
    $sql = "SELECT MAX(buchungsnummer) AS nr FROM buchung;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row["nr"];
    $database->close();
    return $out;
}

function getUserID($prename,$lastname)
    /*
      * gibt die ID eines bestimmten Benutzers wieder.
     * --NICHT FERTIG--
     */
{
    $database = connect();
    $sql = "SELECT * FROM user WHERE vorname=$prename AND nachname=$lastname;";
    $result = $database->query($sql);
    $row = $result->fetch_assoc();
    $out = $row['id'];
    $database->close();
    if ($out != " ") {
        return $out;
    }
    return "Dieser Nutzer existiert nicht!";
}

function getEmail($verein)
{
    /*
     * Gibt alle EMail-Adressen der Nutzer des Vereins $verein als kommagetrennten String zurück.
     * -- NICHT FERTIG --
     */
    $out = "";
    $database = connect();
    $sql = "SELECT email FROM user WHERE gruppe=$verein";
    $result = $database->query($sql);
    while ($row = $result->fetch_assoc()) {
        $out .= $row["email"] . ", ";
    }
    $database->close();
    return $out;
}

function delBuchung($buchungsid)
{
    /*
     * Löscht den übergebenen Datensatz.
     *
     * --NICHT FERTIG---
     */
    $database = connect();
        $betrag = getIt('buchung', 'buchungsnummer', $buchungsid, 'betrag');
        $userVon = getIt('buchung', 'buchungsnummer', $buchungsid, 'user_von');
        $userZu = getIt('buchung', 'buchungsnummer', $buchungsid, 'user_zu');
        $copy = "INSERT INTO geloescht SELECT * FROM buchung WHERE zum_loeschen_vorgemerkt = 1;"; //vorgemerkte in geloescht kopieren.
        $database->query($copy);
        $zurueckVon="UPDATE user SET kontostand = kontostand + $betrag WHERE id= $userVon";
        $zurueckZu="UPDATE user SET kontostand = kontostand - $betrag WHERE id= $userZu";
        $database->query($zurueckVon);
        $database->query($zurueckZu);
        $sql = "DELETE FROM buchung WHERE buchungsnummer=$buchungsid;";
        $database->query($sql);

        $database->close();

}