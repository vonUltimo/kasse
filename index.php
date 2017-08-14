<?php
//require_once "php/login.php";
require_once "php/db_abfragen.php";
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container">
    <section class="one">
        <img class="value-img" src="pics/logo.png" alt="Logo" width="30%">
        <h3>Herzlich willkommen bei der neuen supertollen Kasse von <?php echo getVName(0) ?></h3>
    </section>
</div>
<div class="container">
    <form method="post" action="php/login.php?page=log">
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