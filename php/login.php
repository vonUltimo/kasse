<?php
/**
 * Hier werden wir das Login-Script schreiben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.11 (14-08-2017)
 * */
require_once "db_abfragen.php";
$html_ausgabe = 1; // 0 = Ausgangszustand, 1 = richtiger Login, 2 = falscher Login
if ($html_ausgabe == 2) {
    echo "Login ungültig!";
    echo "<meta http-equiv=\"refresh\" content=\"3; URL=../index.php\">";
} elseif ($html_ausgabe == 1) {
    $email = $_POST["login"];
    $_SESSION["userid"] = getIt("user", "email", "$email", "id");
    print_r($_SESSION);
    //echo "<meta http-equiv=\"refresh\" content=\"1; URL=protected.php\">";
} else {
    echo $html_ausgabe;
}