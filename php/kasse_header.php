<?php
/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jpnemeth3012@gmail.com>
 * Version: 0.1
 */
function kasse_header(){
    echo "
    <div class=\"container\">
    <header>
        <img class=\"header-img\" src=\"/kasse/pics/logo.png\"><br/>
        <div>
            <div class=\"dropdown\">
                <button class=\"button-primary\">Auswertungen</button>
                <div class=\"dropdown-content\">";
                if ($_SESSION['usergroup'] < 2){ echo "
                    <a href='get_booking.php'>Buchung</a>
                    <a href=\"get_konto.php\">Kontostand anzeigen</a>
                    <a href=\"#\">getIt</a>
                    <a href=\"#\">delBuchung</a>
                    ";};
                echo "
                </div>
            </div>
            <div class=\"dropdown\">
                <button class=\"button-primary\">Eingaben</button>
                <div class=\"dropdown-content\">
                    <a href=\"#\">3</a>
                    <a href=\"#\">3</a>
                    <a href=\"#\">3</a>
                    <a href=\"#\">3</a>
                </div>
            </div>
            <div class=\"dropdown\">
                <button class=\"button-primary\">Nutzerverwaltung</button>
                <div class=\"dropdown-content\">
                    <a href=\"memberlist.php\">Mitgliederliste anzeigen</a>
                    <a href=\"#\">4</a>
                    <a href=\"#\">4</a>
                    <a href=\"#\">4</a>
                </div>
            </div>
            <div class=\"dropdown\">
                <a href=\"/kasse/php/logout.php\">
                    <button class=\"button-primary\" id=\"logout\"><strong>Logout</strong></button>
                </a>
            </div>
        </div>
    </header>
</div>
<br/>
";}
