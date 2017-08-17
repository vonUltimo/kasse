<?php
/**
 * Hier werden wir den geschützten Bereich erstellen.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */
session_start();
if(!isset($_SESSION["userid"])){
    echo "Haha, netter versuch ;-)";
    echo "<meta http-equiv=\"refresh\" content=\"3; URL=../index.php\">";
};
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    include "db_abfragen.php";
    include "db_eingaben.php";
    $user = $_SESSION["userid"];
    $usergrp = getUserGroupId($user);

    ?>
    <meta charset="UTF-8">
    <title>Kasse f&uumlr: <?php echo getUser($user) ?></title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/lib.js"></script>
</head>

<body>
<div class="container">
    <h2>-<?php echo getUserGroup($usergrp); ?>-</h2>
    <h4>Hallo <?php echo getUser($user) ?>!<br/> Dein Kontostand beträgt derzeit: <strong><?php echo getKontostand($user) ?></strong> </h4>

    <div class="offset-by-one">
            <button class="button">Alle Nutzer anzeigen</button>
            <button class="button">Einen Nutzer hinzufügen</button>
            <button class="button-primary">E-Mail an alle schreiben</button>
            <button class="button">NixName</button>
        </form>
    </div>
    <div class="offset - by - one" id="ausgabe">


    </div>
</div>
</body>
</html>