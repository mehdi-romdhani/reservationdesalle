<?php
session_start();
require_once('asset/connect.php');
//echo"<br>";

 
$req="SELECT * FROM clients ";
$req2=mysqli_query($connect,$req);
$tab_result=mysqli_fetch_all($req2,MYSQLI_ASSOC);

/* foreach($tab_result as $tab){

    echo $tab['id'].'<br>';
} */


if (isset($_POST['connect']))
$connexion=$_POST['connect'];

if(isset($connexion)){

    $login= htmlspecialchars($_POST['login']);
    $password=$_POST['password'];
    $mess_error="";
    
    if(empty($login) && empty($password)){
        
        $mess_error="Veuillez remplir tout les champs";
        
    }elseif(!empty($login) && !empty($password)){
        
        
        $req="SELECT * FROM clients WHERE login='$login'";
        $req2=mysqli_query($connect,$req);
        $tab_result=mysqli_fetch_all($req2,MYSQLI_ASSOC);
        
        //var_dump($password, $tab_result);
         
        foreach($tab_result as $user){

                $id_=intval($user['id']);
                var_dump($user);
                
               if(password_verify($password,$user['password'])){
                
                $_SESSION['login']=$login;
                $_SESSION['id']=$id_;
                header('location: index.php');
                die();

            }

            
        
        }



    }else{

        $mess_error="recommencez";
    }
}

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
   
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!-- Titre Page -->
    <title>Cinéma Les Petits Artistes </title>
</head>
<body>

<?php include('include/header.php'); ?>
    

<div class="container-connexion">
    <form action="" method="POST">
        <label for="login">Login</label>
        <br>
        <br>
        <input type="text" name="login">
        <br>
        <br>
        <label for="password">Mot de Passe</label>
        <br>
        <br>
        <input type="password" name="password">
        <br>
        <br>
        <button type="submit" name="connect">Connexion</button>
        <br>
        <br>
        <?= @$mess_error ?>
    </form>
</div>
</body>
</html>     

