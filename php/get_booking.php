<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] < 16) {

    require_once "db_request.php";
    require_once "kasse_header.php";
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
        <?php if (!isset($_POST["quantity"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="quantity">Anzahl</label> <input name="quantity" value="5" type="number" min="1">
                <label for="useroption">Nutzer</label><select name="useroption"><?php getUserOption() ?></select>
                <label for="direction">Richtung</label>
                <input type="radio" name="direction" value="0"> abgehende Buchungen
                <input type="radio" name="direction" value="1"> eingehende Buchungen
                <input type="radio" name="direction" value="2"> alle Buchungen
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            $anzahl = $_POST["quantity"];
            $user = $_POST["useroption"];
            $richtung = $_POST["direction"];
            getBuchung($anzahl, $user, $richtung);
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>