/**
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @version 0.1 (25-06-2017)
 *
 * Hier schreiben wir die JavaScript Funktionen.
 * */

src="jquery-3.2.1.min";

$(document).ready(function(){
    $("td:contains('-')").filter(":contains('€')").addClass('neg');
    $(".button-primary").click(function () {
        // Selector"alles danach" finden
        $(".eingabe-buttons").hide();
        $(".eingabe-formular").hide();
        $("#Ausgabe").hide();
    });
        //schleife für verschiedene Buttons *HIER*
    $(".button-primary:contains('Abfragen')").click(function () {
        $("#Abfragen").css("display","table");
    });
    $(".button-primary:contains('Auswertungen')").click(function () {
        $("#Auswertungen").css("display","table");
    });
    $(".button-primary:contains('Eingaben')").click(function () {
        $("#Eingaben").css("display","table");
    });
    $(".button-primary:contains('Nutzerverwaltung')").click(function () {
        $("#Nutzerverwaltung").css("display","table");
    });
    /*___________________Formular____________________ */

});


function getUserTable() {
    // NICHT FERTIG ich arbeite noch dran
    $.ajax({
      url: "/kasse/php/db_abfragen.php",
        data: "",
        success: function (data) {
            $("#Ausgabe").html(erg);
        }
    })
}