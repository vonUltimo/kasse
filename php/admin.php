<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] = 1) {

    require_once "db_request.php";
    require_once "kasse_header.php";
    $user = getUser($_SESSION["userid"]);
    $head = file_get_contents('htmlx/head.html');
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <?php
    echo $head;
    kasse_header();
   ?>

    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>