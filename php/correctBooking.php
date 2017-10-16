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
        if (!isset($_POST["zwecknummer"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <?php getCorrectBooking(); ?>
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            $zweck=$_POST["zwecknummer"];
            $betrag=$_POST["betrag"];
            $von=$_POST["userFrom"];
            $zu=$_POST["userTo"];
            $anmerkung=$_POST["comment"];
            $loguser=$_SESSION["userid"];
            correctBuchung($zweck, $betrag, $von, $zu, $loguser, $anmerkung);
            echo "Die Korrektur wurde erfolgreich durchgeführt.";
            } ?>
    </div>
    </body>
    </html>
    <?php
    } else {
        die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
    }
?>