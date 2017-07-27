<?php
/**
 * Hier werden sämtlichen Datenbankeingaben gescrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */

include_once "lib.php";
include_once "db_abfragen.php";

function addBuchung()
    /*
     *
     * --NICHT FERTIG--
     */
{
    $bnr = getEntrys("buchung") + 1;
    $database = connect();
    $sql = "INSERT INTO buchungen (buchungsnummer, zwecknummer, datum, betrag, user_von, user_nach, log) VALUES ($bnr, )";
    $database->close();

}

function addVerwendungszweck($beschreibung)
    /*
     * Fügt einen neuen Eintrag mit der übergebenen Beschreibung in die Tabelle verwendungszweck ein.
     */
{
    $database = connect();
    $id=getEntrys('verwendungszweck')+1;
    $sql = "INSERT INTO `verwendungszweck` (`Beschreibung`, `zwecknummer`) VALUES ('$beschreibung',$id);";
    $database->query($sql);
    $database->close();
}

function addUser($nachname, $vorname, $email, $passwort, $verein, $usrgrp)
{
    /**
     * Fügt einen Nutzer mit den übergebenen Parametern in die Tabelle user ein.
     * --NICHT FERTIG--
     */
    $database = connect();
    $id=getEntrys('user')+1;

}