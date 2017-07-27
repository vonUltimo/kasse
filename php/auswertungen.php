<?php
/**
 * Hier kommen die Auswertungen, wie Rechnungen, Übersichten,.. rein.
 * @author Sven Haberzettl <von.ultimo@gmail.com>
 * @author Jan Nemeth <jan.nemeth@web.de>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * */

include_once "lib.php";
include_once "db_abfragen.php";
require_once ("fpdf181/fpdf.php");

function getRechnung($id){
    /**
     * Gibt eine vollständige Rechnung für den übergebenen user als PDF aus
     * die Doku findest du auf www.fpdf.de
     * NICHT FERTIG
     */
    //erster Test  --> läuft überhaupt nicht schön...
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Hallo Welt!');
    $pdf->Output("D");
}