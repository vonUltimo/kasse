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
        if (!isset($_POST["email"])) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="vorname">Vorname</label><input name="vorname" type="text" required placeholder="Max">
                <label for="nachname">Nachname</label><input name="nachname" type="text" required placeholder="Mustermann">
                <label for="email">E-Mail</label><input name="email" type="email" required placeholder="max@mustermann.de">
                <label for="passwort">Passwort</label><input name="passwort" type="password" required placeholder="passwort123">
                <label for="passwort2">Passwort wiederholen</label><input name="passwort2" type="password" required placeholder="passwort123">
                <label for="vereinoption">Verein</label> <?php getVereinSelectOption(); ?>
                <label for="usergroupOption">Nutzergruppe</label> <?php getUserGroupOption(); ?>
                <label for="hausbewohner">Hausbewohner</label>
                <select name="hausbewohner">
                    <option value="0">Nein</option>
                    <option value="1">Ja</option>
                </select>
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            if ($_POST["passwort"] != $_POST["passwort2"]) {
                die("Passwörter stimmen nicht überein!
                <br />
                <button onclick=\"goBack()\">Zurück</button>
                <script>
                    function goBack() {
                    window.history.back();
                    }
                </script> 
                ");
            };
            $vorname = $_POST["vorname"];
            $nachname = $_POST["nachname"];
            $email = $_POST["email"];
            $passwort = $_POST["passwort"];
            $verein = $_POST["vereinoption"];
            $usrgrp = $_POST["usergroupOption"];
            $hausbewohner = $_POST["hausbewohner"];
            addUser($vorname, $nachname, $email, $passwort, $verein, $usrgrp, $hausbewohner);
            echo "Der Benutzer " . $_POST["vorname"] . " " . $_POST["nachname"] . " wurde erfolgreich angelegt.";
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>