<?php
/**
 * Hier werden sämtlichen Datenbankeingaben gescrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */

include_once "lib.php";
include_once "db_request.php";

function addBuchung($zweck, $betrag, $von, $zu, $logid, $anmerkung)
    /*
     *
     */
{
    $bnr = getEntrys("buchung") + 1;
    $kontostandVon=getIt("user", "id",$von, "kontostand");
    $kontostandZu=getIt("user", "id",$zu, "kontostand");
    $database = connect();
    $buchung= "INSERT INTO buchung (buchungsnummer, zwecknummer, datum, betrag, user_von, user_zu, log, anmerkung) 
            VALUES ('$bnr', '$zweck', NOW(), '$betrag', '$von', '$zu', '$logid', '$anmerkung');";
    $abgang= "UPDATE user SET kontostand = $kontostandVon-$betrag WHERE id=$von;";
    $zugang= "UPDATE user SET kontostand = $kontostandZu+$betrag WHERE id=$zu";
    $database->query($abgang);
    $database->query($zugang);
    $database->query($buchung);
    $database->close();

}

function addVerwendungszweck($beschreibung)
    /*
     * Fügt einen neuen Eintrag mit der übergebenen Beschreibung in die Tabelle verwendungszweck ein.
     */
{
    $database = connect();
    $id = getEntrys('verwendungszweck') + 1;
    $sql = "INSERT INTO `verwendungszweck` (`Beschreibung`, `zwecknummer`) VALUES ('$beschreibung',$id);";
    $database->query($sql);
    $database->close();
}

function addUser($vorname, $nachname, $email, $passwort, $verein, $usrgrp, $hausbewohner)
{
    /**
     * Fügt einen Nutzer mit den übergebenen Parametern in die Tabelle user ein.
     */
    $pw_hash=password_hash($passwort, PASSWORD_DEFAULT);
    $database = connect();
    $id = getEntrys('user') + 1;
    $sql = "INSERT INTO user (id, vorname, nachname, email, kontostand, zinsen, passwort, verein, gruppe, hausbewohner) 
            VALUES  ('$id', '$vorname', '$nachname', '$email', '0', '0', '$pw_hash', '$verein', '$usrgrp', '$hausbewohner');";
    $database->query($sql);
    $database->close();

}

function addPurpose($purpose){
    /*
     */
    $database = connect();
    $id = getEntrys('verwendungszweck') + 1;
    $sql="INSERT INTO verwendungszweck VALUES ('$id', '$purpose');";
    $database->query($sql);
    $database->close();
}

function addClub($club){
    /*
     */
    $database = connect();
    $id = getEntrys('verein') + 1;
    $sql="INSERT INTO verein VALUES ('$id', '$club');";
    $database->query($sql);
    $database->close();
}

function getUserUpdate($user){
    /*
     * -_NICHT FERTIG--
     */
    $database = connect();
    $sql = "SELECT * FROM user WHERE id=$user;";
    $result = $database->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo
                "<label for='id'>ID</label><input name='id' type='text' max='5' value='" . $row["id"] . "'>"
            ;
        }
    $database->close();
}