<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] < 3){

    require_once "db_request.php";
    require_once "kasse_header.php";

    $user = getUser($_SESSION["userid"]);
    $head = file_get_contents('htmlx/head.html');
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <?php
    echo $head;?>
    <body>
    <?php kasse_header(); ?>

        <div>
            <h5>Hallo <?php echo $user; ?>, dein Kontostand bertägt:
                <strong class="betrag"><?php echo getKontostand($_SESSION["userid"]); ?></strong></h5>
        </div>
        <br/>
        <div class="container">
            <?php getUserTable(); ?>
        </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>