                                                                <!-- Projet : Reservation de Salle 
                                                                Date : 12/12/2022
                                                                Auteur : Mehdi Romdhani -->
                                                                <?php
require_once('asset/connect.php');
echo "<br>";
session_start();


echo "<pre>";

$date=new dateTime('this week');
$form=$date->format('d/F/Y');
var_dump($date);

echo "</pre>";



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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Titre Page -->
    <title>Cinéma Les Petits Artistes </title>
</head>
<body>

<?php include('include/header.php'); ?>
<h1>PLANNING</h1>

<table>
    <thead>

        
    <tr>
        <th>horaires</th>
        <?php $date=new dateTime('this week'); ?>
        
        <?php for($i=0; $i<7; $i++):?>
        
            <th><?= $date->format('D-m-y');
            $date->modify('next day');?></th>
        <?php endfor ?>
    </tr>
    </thead>
    <tbody>

        <?php for($i=0; $i<12; $i++):?>
          <?php $date=new dateTime("this week midnight +8 hours +$i hours"); ?>   
         <tr>
           
            <td><?= $date->format('H');?></td>

        </tr>
        <?php endfor ?>


    </tbody>
</table>




</body>
</html>                                                             