<?php
$mysqli;

function connect() {
    global $mysqli;
    require 'config/config.php';
    if( isset( $mysqli ) ) {
        return;
    }

    $mysqli = new mysqli("localhost", $db_user, $db_user_pw, $db);

    $mysqli->query("SET NAMES 'utf8'");
    if ($mysqli->connect_errno) {
        echo "MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return null;
    }
    //echo $mysqli->host_info . "<br>\n";
    return $mysqli;
}

function getUser(){
    global $mysqli;
    $sql = "SELECT * FROM user";
    connect();
    $erg=  $mysqli->query($sql);
    print_r($erg);

}

function getBuchung(){

}

function getKontostand($user){

}
?>