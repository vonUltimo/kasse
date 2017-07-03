<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    include "php/db_abfragen.php";
    include "php/db_eingaben.php";
    ?>
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

    <div class="offset-by-one">

        <p>
            Der Kontostand von <?php echo getUser(2); ?> beträgt: <?php echo getKontostand(2); ?>. Die letzte Buchung
            war: <?php echo getVerwendungszweck(1); ?>
            <br/>
            Anmelden du dich musst!<br/>
            <?php echo getUserGroup(64)?>
        </p>
    </div>
</body>
</html>