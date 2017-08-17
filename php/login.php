<?php
/**
 * Hier werden wir das Login-Script schreiben.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.2 (15-08-2017)
 * */
session_start();
require_once "db_abfragen.php";

$id=getIt("user", "email", $_POST["login"], "id");
$pw_hash=getIt("user", "email", $_POST["login"], "passwort");
$verify=password_verify($_POST["passwort"],$pw_hash);


if ($verify == 1) {
    $email = $_POST["login"];
    $_SESSION["userid"] = $id;
    echo "richtig :-)";
    echo session_status();
    print_r($_SESSION["userid"]);
    echo "<meta http-equiv=\"refresh\" content=\"; URL=protected.php\">";
} else {
    echo "Login falsch, Idiot!";
    echo "<meta http-equiv=\"refresh\" content=\"3; URL=../index.php\">";
}