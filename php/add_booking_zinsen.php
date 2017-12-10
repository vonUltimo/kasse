<?php
session_start();
if ($_SESSION["usergroup"] < 6) {

    require_once "db_request.php";
    require_once "kasse_header.php";
    require_once "db_input.php";
    $head = file_get_contents('htmlx/head.html');
    $user = getUser($_SESSION["userid"]);
    ?>

    <!DOCTYPE html>
    <html lang="de">
    <?php
    echo $head;
    ?>
    <body>
    <?php
    kasse_header();
    ?>
    <div class="container">
        <?php
        if (!isset($_POST["comment"])) { ?>
            <h4>Wenn Sie unten "Ja" eingeben, werden f&uumlr alle nicht zinsbefreiten Mitglieder Zinsen gebucht.</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <label for="comment">Sicher?</label> <input type="text" name="comment" size="43" placeholder="Ja">
                <input class="button-primary" type="submit">
            </form>
            <?php
        } else {
            if ($_POST["comment"]== "Ja"){
                add_booking_Zinsen();
                echo "Zinsen wurden erfolgreich gebucht!";
            }else{
                echo "Sie m&uumlssen das Wort \"Ja\" eintragen!";
            }
        } ?>
    </div>
    </body>
    </html>
    <?php
} else {
    die('<meta http-equiv="refresh" content="0;URL=/kasse/index.php">');
}
?>