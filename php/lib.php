<?php

function getZinsen($hausbewohner){
    // Gibt die Zinsen entsprechend der uebergebenen Variable zurueck.
    if ($hausbewohner==0)
        return 0.15;
    elseif ($hausbewohner==1)
        return 0.05;
    else
        return "Kein gueltiger Wert";
}

function connect()
{
    if (isset($mysqli)) {
        return;
    }
    $mysqli = new mysqli('localhost', 'kasse_user', 'K4b5xBnPrFGM4TRZ', 'Kasse');
    if ($mysqli->connect_error) {
        die("Verbindung zu Datenbank felhlgeschlagen: " . $mysqli->connect_error);
    }
    return $mysqli;
}

function boolZuText($in)
{
    if ($in == 0) {
        return "Nein";
    }
    return "Ja";

}