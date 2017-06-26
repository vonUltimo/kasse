<?php
$mysqli;
function connect() {
    global $mysqli;
    require 'config/info.php';
    if( isset( $mysqli ) ) {
        return;
    }

    $mysqli = new mysqli("localhost", $user, $pwd, $db);

    $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo "MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return null;
    }
    //echo $mysqli->host_info . "<br>\n";
    return $mysqli;
}

function getUser(){

}

function getBuchung(){

}

function getKontostand($user){

}
?>