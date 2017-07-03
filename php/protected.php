<?php
/**
 * Hier werden wir den geschützten Bereich erstellen.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */
$user = 1;
$usrgrp = 1;
?>

    <!DOCTYPE html>
    <html lang="de">
<head>
    <?php
    include "db_abfragen.php";
    include "db_eingaben.php";
    ?>
    <meta charset="UTF-8">
    <title>Kasse f&uumlr: <?php echo getUser($user) ?></title>
    <link rel="stylesheet" href="../css/skeleton.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/lib.js"></script>
</head>

<body>
<div class="container">
    <title></title>

    <div class="offset-by-one">
        <button class="button">getUserTable()</button>
        <button class="button">Button Button</button>
        <button class="button-primary">button-primary</button>
    </div>
    <div class="offset - by - one" id="ausgabe">



    </div>
</div>
</body>
<?php

switch ($usrgrp) {
    case (1):
        echo getUserGroup($usrgrp);
        break;
    case (2):
        echo "Mitglied";
        break;
    default:
        echo "Du bist kein registrierter Nutzer!";
        break;
}

?>