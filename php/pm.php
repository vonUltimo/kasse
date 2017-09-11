<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
session_start();
if ($_SESSION["usergroup"] = 4) {

    require_once "db_request.php";
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
    <div class="container" align="center">
        <header>
            <img class="header-img" src="/kasse/pics/logo.png"><br/>
            <div>
                <div class="dropdown">
                    <button class="button-primary">Auswertungen</button>
                    <div class="dropdown-content">
                        <a href="#">getBuchung()</a>
                        <a href="#">getKontostand()</a>
                        <a href="#">getIt</a>
                        <a href="#">delBuchung</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="button-primary">Eingaben</button>
                    <div class="dropdown-content">
                        <a href="#">3</a>
                        <a href="#">3</a>
                        <a href="#">3</a>
                        <a href="#">3</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="button-primary">Nutzerverwaltung</button>
                    <div class="dropdown-content">
                        <a href="memberlist.php">Mitgliederliste anzeigen</a>
                        <a href="#">4</a>
                        <a href="#">4</a>
                        <a href="#">4</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="/kasse/php/logout.php">
                        <button class="button-primary" id="logout"><strong>Logout</strong></button>
                    </a>
                </div>
            </div>
        </header>
        <br/>
        <div>
            <h5>Hallo <?php echo $user; ?>, dein Kontostand bertägt:
                <strong class="betrag"><?php echo getKontostand($_SESSION["userid"]); ?></strong></h5>
        </div>
        <br/>
    </div>

    </body>
    </html>
    <?php
}else{
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>