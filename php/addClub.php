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
        if (!isset($_POST["club"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="club">Neuen Verein anlegen</label><input name="club" type="text" required placeholder="TSV Friedberg e.V.">
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            $club = $_POST["club"];
            addClub($club);
            echo "Der Verwendungszweck " . $_POST["club"] . " wurde erfolgreich angelegt.";
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>