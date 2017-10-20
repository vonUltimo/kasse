<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.3 (18-08-2017)
 * */
session_start();
require_once "db_request.php";

$id=getIt("user", "email", $_POST["login"], "id");
$usergroup=getIt("user", "id", $id, "gruppe");
$pw_hash=getIt("user", "email", $_POST["login"], "passwort");
$verify=password_verify($_POST["passwort"],$pw_hash);


if ($verify == 1) {
    $email = $_POST["login"];
    $_SESSION["userid"] = $id;
    $_SESSION["usergroup"] = $usergroup;
    echo session_status();
    if($usergroup==1){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./admin.php\">";
    }elseif ($usergroup==5){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./kw.php\">";
    }elseif ($usergroup==10){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./kw.php\">";
    }elseif ($usergroup==15){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./am.php\">";
    }elseif ($usergroup==20){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./pm.php\">";
    }else{
        echo "<meta http-equiv=\"refresh\" content=\"; URL=./guest.php\">";
    }
} else {
    echo "Die angegeben Login Daten sind nicht korrekt, sie werden zur Startseite weitergeleitet.";
    echo "<meta http-equiv=\"refresh\" content=\"5; URL=../index.php\">";
}