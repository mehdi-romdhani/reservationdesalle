<?php
require_once('asset/connect.php');



@$submit=$_POST['submit'];

if(isset($submit)){
    
    $login=strip_tags($_POST['login']);
    $passwd=$_POST['password'];
    $conf_passwd=$_POST['confpassword'];
    echo "<br>";
    var_dump($passwd);
    echo "<br>";
    var_dump($conf_passwd);
    
    $mess_error="";

    if(empty($login) && empty($passwd)){
        $mess_error="Veuillez saisir tous les champs";
    }elseif(!empty($login) && empty($passwd)){
        $mess_error="Veuillez saisir un mot de passe";
    }elseif(!empty($login) && $passwd!=$conf_passwd){
        $mess_error="Veuillez saisir le même de mot de passe";
    }elseif(!empty($login) && $passwd==$conf_passwd){

        $req_log="SELECT login,password FROM clients WHERE login='$login'";
        $req_log2=mysqli_query($connect,$req_log);
        $tab_log=mysqli_fetch_assoc($req_log2);
        $login_use=$tab_log['login'];

        if($login==$login_use){

            $mess_error="ce login est deja utilisé";

        }else{

/*             INSCRIPTION BDD
 */            $passwd=password_hash($_POST['password'],PASSWORD_DEFAULT);

            $req="INSERT INTO clients(`login`,`password`) VALUES('$login','$passwd')";
            $insertion_bdd=mysqli_query($connect,$req);
            
            header('location: connexion.php');

        }
    }else{
        $mess_error="Recommencez";
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
    <!-- CSS only -->
    <!-- Titre Page -->
    <title>Cinéma Les Petits Artistes </title>
</head>
<body>

<?php include('include/header.php')?>

<div class="container-form">
    <form action="" method="POST">
        <label for="login">Login</label>
        <br>
        <br>
        <input type="text" name="login" placeholder="Login">
        <br>
        <br>
        <label for="Password">Mot de Passe</label>
        <br>
        <br>
        <input type="password" name="password" placeholder="Mot de Passe">
        <br>
        <br>
        <label for="confmotdepasse">Confirmation de Mot de Passe</label>
        <br>
        <br>
        <br>
        <input type="password" name="confpassword" placeholder="ConfirmationMot de Passe">
        <br>
        <br>
        
        <button type="submit" name="submit">Inscription</button>
        <br>
        <?= @$mess_error ?>

    </form>
</div>

</body>
</html>