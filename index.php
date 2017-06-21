<?php
include 'php/login.php';
include 'php/protected.php';

// Hier kommt der PHP-Code rein :-)

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kasse</title>
    <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
<?php
echo "$testausgabe";
?>

<div class="container">
    <h3 class="title">Herzlich willkommen!</h3>
    <form>
        <div class="row">
            <div class="six columns">
                <label for="EmailLogin">Deine E-Mail-Adresse</label>
                <input class="u-full-width" type="email" placeholder="x@thuri.de" id="EmailLogin">
            </div>
            <div class="six columns">
                <label for="passwort">Dein Passwort</label>
                <input class="u-full-width" type="password" id="passwort">
            </div>
        </div>
        <label class="eingeloggt_bleiben">
            <input type="checkbox">
            <span class="label-body">Möchtest du eingeloggt bleiben?</span>
        </label>
        <input class="button-primary" type="button" value="Senden">
    </form>
</div>
</body>
</html>