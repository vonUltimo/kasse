<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    include "php/db_abfragen.php";
    include "php/db_eingaben.php";
    include "php/auswertungen.php";
    ?>
    <meta charset="UTF-8">
    <title>Kasse</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container">
    <section class="one">
        <img class="value-img" src="pics/logo.png" alt="Logo" width="30%">
        <h3>Bitte anmelden:</h3>
    </section>
</div>
<div class="container">
    <form>
        <div class="row">
            <div class="six columns">
                <label for="login">Login / E-Mail</label>
                <input class="u-full-width" placeholder="test@web.de" id="exampleEmailInput" type="email">
            </div>
            <div class="six columns">
                <label for="passwort">Passwort</label>
                <input class="u-full-width" id="passwort" type="password" placeholder="Passwort">
            </div>
        </div>
        <input class="button-primary" value="Absenden" type="submit">
    </form>
</div>
</body>
</html>