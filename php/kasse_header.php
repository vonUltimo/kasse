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
                <button class=\"button-primary\">Ausgaben</button>
                <div class=\"dropdown-content\">";
                if ($_SESSION['usergroup'] < 2){ echo "
                    <a href='get_booking.php'>Buchung anzeigen</a>
                    <a href=\"get_konto.php\">Kontostand anzeigen</a>
                    ";};
                echo "
                </div>
            </div>
            <div class=\"dropdown\">
                <button class=\"button-primary\">Eingaben</button>
                <div class=\"dropdown-content\">
                    <a href=\"add_booking.php\">Buchung anlegen</a>
                </div>
            </div>
            <div class=\"dropdown\">
                <button class=\"button-primary\">Nutzerverwaltung</button>
                <div class=\"dropdown-content\">
                    <a href=\"memberlist.php\">Mitgliederliste anzeigen</a>
                    <a href=\"addUser.php\">Nutzer hinzufügen</a>
                    <a href=\"updateUser.php\">Nutzer aktualisieren</a>     
                </div>
            </div>";
            if ($_SESSION['usergroup'] <= 10){
                echo "
            <div class=\"dropdown\">
                <button class=\"button-primary\">Datenbankverwaltung</button>
                <div class=\"dropdown-content\">
                    <a href=\"addPurpose.php\">Verwendungszweck hinzufügen</a>
                    <a href=\"addClub.php\">Verein hinzufügen</a>
                    <a href=\"delBooking.php\">Buchung löschen</a>
                </div>
            </div>";}
            echo "
            <div class=\"dropdown\">
                <a href=\"/kasse/php/logout.php\">
                    <button class=\"button-primary\" id=\"logout\"><strong>Logout</strong></button>
                </a>
            </div>
        </div>
    </header>
</div>";}
