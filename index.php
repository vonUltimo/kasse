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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<?php echo "$hashwert"; ?><br/>
<?php echo "$hashwert"; ?><br/>
<?php echo "$hashwert"; ?><br/>
<?php echo "$hashwert"; ?><br/>

<script>
    $(document).ready(function () {


        $("input").click(function () {
            $(this).fadeOut(1200);
            $(this).fadeIn(1500);
        });

    })
</script>

<div class="container">
    <h3 class="title">Herzlich willkommen!</h3>
    <h4 class="">Bitte melden Sie sich an:</h4>
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
    <table class="offset-by-one">
        <tr>
            <th>Datum der Buchung</th>
            <th>Art der Buchung</th>
            <th>gebuchter Betrag</th>
        </tr>
        <tr>
            <td>14.2.2017</td>
            <td>Einzahlung</td>
            <td>120,00€</td>
        </tr>
        <tr>
            <td>18.2.2017</td>
            <td>Getränkeabrechnung vom 16.2.17</td>
            <td>28,62€</td>
        </tr>
    </table>
</div>
</body>
</html>