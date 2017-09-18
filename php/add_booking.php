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
        if (!isset($_POST["betrag"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="verwendungszweckOption">Verwendungszweck</label><select name="verwendungszweckOption"><?php getVerwendungszweckOption(); ?></select>
                <label for="betrag">Betrag</label><input name="betrag" type="number" step="0.01" required placeholder="53.55">
                <label for="userFrom">Abgehendes Konto</label><select name="userFrom"><?php getUserOption(); ?></select>
                <label for="userTo">Zugehendes Konto</label><select name="userTo"><?php getUserOption(); ?></select>
                <label for="comment">Anmerkung</label> <input type="text" name="comment" size="43" required placeholder="Dient zur Ergänzung des Verwendungszweckes.">
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            $zweck=$_POST["verwendungszweckOption"];
            $betrag=$_POST["betrag"];
            $von=$_POST["userFrom"];
            $zu=$_POST["userTo"];
            $anmerkung=$_POST["comment"];
            $loguser=$_SESSION["userid"];
            addBuchung($zweck, $betrag, $von, $zu, $loguser, $anmerkung);
            echo "Die Buchung wurde erfolgreich durchgeführt.";
            echo "<a href=\"add_booking.php\">weitere Buchung?</a>";
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>