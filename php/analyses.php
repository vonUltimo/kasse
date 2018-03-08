<?php
/**
 * @author Ultimo <von.ultimo@gmail.com>
 * Version: 0.11
 */
include_once "lib.php";
include_once "db_request.php";
require ("fpdf181/fpdf.php");

function getRechnung($id){
    /**
     * Gibt eine vollständige Rechnung für den übergebenen user als PDF aus
     * die Doku findest du auf www.fpdf.de
     * NICHT FERTIG
     */
    //erster Test  --> läuft überhaupt nicht schön...
    echo "newTab";
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Hallo Welt!');
    $pdf->Output("D");
    echo "closeTab";
}

function getRechnungVerein($id){
    /**
     * Gibt eine vollständige Rechnung für den übergebenen Verein als PDF aus
     *
     * NICHT FERTIG
     */
}