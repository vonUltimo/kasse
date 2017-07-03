<?php
/**
 * Hier kommen alle allegemeingültigen Funktionen rein.
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

function boolZuText($in)
{
    if ($in == 0) {
        return "Nein";
    } else {
        return "Ja";
    }
}