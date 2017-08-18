<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.3 (18-08-2017)
 * */
session_start();
require_once "db_abfragen.php";

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
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/admin.php\">";
    }elseif ($$usergroup==2){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/kw.php\">";
    }elseif ($$usergroup==3){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/member.php\">";
    }elseif ($$usergroup==4){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/ah.php\">";
    }elseif ($$usergroup==5){
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/gw.php\">";
    }else{
        echo "<meta http-equiv=\"refresh\" content=\"; URL=drin/guest.php\">";
    }
} else {
    echo "Login falsch, Idiot!";
    echo "<meta http-equiv=\"refresh\" content=\"3; URL=../index.php\">";
}