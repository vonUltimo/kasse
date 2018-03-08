<?php
/**
 * @author Ultimo <von.ultimo@gmail.com>
 * Version: 0.11
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
        } elseif (!isset($_POST["email"])) {
            $_SESSION["updateUser"] = $_POST["user"];
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <?php getUserUpdate($_SESSION["updateUser"]); ?>
                <input name="user" type="hidden">
                <input class="button-primary" type="submit" value="Nutzer aktualisieren">
            </form>
            <?php

        } else {
            if ($_POST["passwort"] == $_POST["passwort2"]) {
                $id = $_SESSION["updateUser"];
                $vorname = $_POST["vorname"];
                $nachname = $_POST["nachname"];
                $email = $_POST["email"];
                $zinsen = $_POST["zinsen"];
                $hausbewohner = $_POST["hausbewohner"];
                $passwort = $_POST["passwort"];
                $verein = $_POST["verein"];
                $gruppe = $_POST["gruppe"];
                updateUser($id, $vorname, $nachname, $email, $zinsen, $hausbewohner, $passwort, $verein, $gruppe);
                echo "Der Nutzer " . $_POST["vorname"] . " " . $_POST["nachname"] . " wurde erfolgreich aktualisiert.";
            } else {
                echo "Passwörter stimmen nicht überein!
                    <br/>
                    <button onclick=\"goBack()\">Zurück</button>
                <script>
                    function goBack() {
                    window.history.back();
                    }
                </script>                 
                ";
            }
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>