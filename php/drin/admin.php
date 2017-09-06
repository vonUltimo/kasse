<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] != 1) {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
require_once "../db_abfragen.php";
$user = getUser($_SESSION["userid"]);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kasse für <?php echo $user; ?></title>
    <script src="/kasse/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/kasse/css/skeleton.css">
    <link rel="stylesheet" href="/kasse/css/custom.css">
    <script src="/kasse/js/lib.js"></script>
</head>
<body>
<div class="container">
    <header>
        <img class="header-img" src="/kasse/pics/logo.png"><br/>
        <ul class="dropdown">
            <li>
                <button class="button-primary">Abfragen</button>
            </li>
            <li>
                <button class="button-primary">Auswertungen</button>
            </li>
            <li>
                <button class="button-primary">Eingaben</button>
            </li>
            <li>
                <button class="button-primary">Nutzerverwaltung</button>
            </li>
            <li>
                <a href="/kasse/php/logout.php">
                    <button class="button-primary" id="logout"><strong>Logout</strong></button>
                </a>
            </li>
        </ul>
    </header>
    <br/>
    <div>
        <h5>Hallo <?php echo $user; ?>, dein Kontostand bertägt:
            <strong class="betrag"><?php echo getKontostand($_SESSION["userid"]); ?></strong></h5>
    </div>
    <div class="eingabe-buttons" id="Abfragen">
        <button>getBuchung()</button>
        <button>getKontostand()</button>
        <button>getIt</button>
        <button>delBuchung</button>
    </div>
    <div class="eingabe-buttons" id="Auswertungen">
        <button>addBuchung()</button>
        <button>addVerwendungszweck()</button>
    </div>
    <div class="eingabe-buttons" id="Eingaben">
        Test3
        <br/>
    </div>
    <div class="eingabe-buttons" id="Nutzerverwaltung">
        <button onclick="getUserTable();">getUserTable()</button>
        <button>addUser()</button>
        <br/>
    </div>
    <div class="eingabe-formular">
        <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
            <label>
                wasd
            </label>
        </form>
    </div>
    <div class="container" id="Ausgabe">
        <?php
        getUserTable();
        ?>
    </div>

</div>

</body>
</html>
