<?php
/**
 * Hier werden wir das Login-Script schreiben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.1 (14-08-2017)
 * */
session_start();
$html_ausgabe = 0;

if (!isset($_SESSION["username"]) && !isset($_GET["page"])) {
    $html_ausgabe = 0;
}
if ($_GET["page"] == "log") {
    $user = $_POST["user"];
    $passwort = $_POST["passwort"];

    if ($user == "test" && $passwort == "passwort") {
        $_SESSION["username"] = $user;
        $html_ausgabe = 1;
    } else {
        $html_ausgabe = 2;
    }

}