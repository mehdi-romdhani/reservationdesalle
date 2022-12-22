<?php 

include('asset/connect.php');
session_start();

/* if($_POST['submit']){
    
    
    $req=$connect->query("UPDATE utilisateurs SET login='$newlog',password='$passwd' WHERE login='$log'");
    $_SESSION['login']=$newlog;
    $maj_profil="Vous venez de modifier les données de votre profil : ".$sess;
     session_destroy();
     header('refresh:3 index.php');
} */

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
<h1>Profil</h1>

        <div class="container-profil">
            <form action="" method="POST">
                <label for="log">Votre login</label>
                <br>
                <input type="text" name="log" value="<?php $_SESSION['login']?>">
                <br>
                <label for="login">New login</label>
                <br>
                <input type="text" name="login" value="<?php $_SESSION['login']?>">
                <br>
                <label for="new_pass">New Password</label>
                <br>
                <input type="password" name="old_pass">
                <br>
                <label for="new_pass">Confirm Passwd</label>
                <br>
                <input type="password" name="password">
                <br>
                <br> 
                <button name="submit">Change!</button>
            </form>
        </div>
   
</body>
</html>                                                             


