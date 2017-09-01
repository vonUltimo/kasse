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