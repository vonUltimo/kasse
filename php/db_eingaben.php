<?php
/**
 * Hier werden sämtlichen Datenbankeingaben gescrieben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */

//include "lib.php";
//include "db_abfragen.php";

function addBuchung()
{
}

function addVerwendungszweck($beschreibung)
    /*
     * Fügt einen neuen Eintrag mit der übergebenen Beschreibung in die Tabelle verwendungszweck ein.
     * --NICHT FRETIG--
     */
{
    $database=connect();
    $sql="INSERT INTO `verwendungszweck` (`Beschreibung`, `zwecknummer`) VALUES ('$beschreibung', 'get');";
}

function addUser($nachname, $vorname, $email, $passwort, $verein, $usrgrp){
    /**
     * Fügt einen Nutzer mit den übergebenen Parametern in die Tabelle user ein.
     * --NICHT FERTIG--
     */

}