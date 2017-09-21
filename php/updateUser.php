<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] < 3) {

    require_once "db_request.php";
    require_once "kasse_header.php";
    require_once "db_input.php";
    $head = file_get_contents('htmlx/head.html');
    $user = getUser($_SESSION["userid"]);
    ?>

    <!DOCTYPE html>
    <html lang="de">
    <?php
    echo $head;
    ?>
    <body>
    <?php
    kasse_header();
    ?>
    <div class="container">
        <?php
        if (!isset($_POST["user"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="user">Welcher Nutzer soll geändert werden?</label><select
                    name="user"><?php getUserOption(); ?></select>
                <input class="button-primary" type="submit">
            </form>
            <?php
        }elseif(!isset($_POST["email"])){
            //--NICHT FERTIG--
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                    <input name="email" type="email" PLACEHOLDER="TESST">
                    <input class="button-primary" type="submit">
                </form>

                <?php

            print_r($_POST);
        } else {

            echo "Erfolg";
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>