<?php

$host="127.0.0.1";
$username="root";
$passwd="";
$db_name="reservationsalle";

$connect= mysqli_connect($host,$username,$passwd,$db_name);

if(!$connect){
    die('connextion echoué'.mysqli_connect_error());
}

?>