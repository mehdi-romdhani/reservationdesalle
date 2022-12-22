<?php


include('asset/connect.php');

$req="SELECT * FROM reservations WHERE id='$_GET[id]'";

$query=mysqli_query($connect,$req);

$fetch=mysqli_fetch_all($query,MYSQLI_ASSOC);

var_dump($fetch);