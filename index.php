<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kasse</title>
    <link rel="stylesheet" href="css/skeleton.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/lib.js"></script>
</head>
<body>


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
    <!--    <h4 class="">Bitte melden Sie sich an:</h4>
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
        </form>-->
    <p class="offset-by-one">

        <?php
        include 'php/db_abfragen.php';
        getUser();
        ?>

    </p>
</div>
</body>
</html>