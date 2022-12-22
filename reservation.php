                                                                <!-- Projet : Reservation de Salle 
                                                                Date : 12/12/2022
                                                                Auteur : Mehdi Romdhani -->
                                                                <?php
require_once('asset/connect.php');
echo "<br>";
session_start();
$id_client=$_SESSION['id'];
//echo $id_client;



include('asset/connect.php');

$req="SELECT * FROM reservations WHERE id='$_GET[id]'";

$query=mysqli_query($connect,$req);

$fetch=mysqli_fetch_all($query,MYSQLI_ASSOC);





?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de Style -->
    <link rel="stylesheet" href="asset/style.css">
    <!-- Font GOOGLE API -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <!-- CSS only -->
    <!-- Titre Page -->
    <title>Cinéma Les Petits Artistes </title>
</head>
<body>

<?php include('include/header.php'); ?>
<!-- <h1>Reservation</h1> -->

<div class="container-our-reservation" style="color: white">
    
    <h1>Votre Reservation : <?= ucwords($_SESSION['login'])?></h1>
    <?php foreach($fetch as $tab):?>
    <p><?="Clients : ". $tab['titre'] ?></p>
    <p><?= "Description : " .$tab['description'] ?></p>
    <p><?= "Date de debut: " .$tab['debut'] ?></p>
    <p><?= "Date de fin: " .$tab['fin'] ?></p>
    <p><?= "ID client: " .$tab['id_client'] ?></p>





    <?php endforeach; ?>
    
</div>
                

   
</body>
</html>                                                             