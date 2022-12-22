                                                                <!-- Projet : Reservation de Salle 
                                                                Date : 12/12/2022
                                                                Auteur : Mehdi Romdhani -->
<?php
require_once('asset/connect.php');
//echo "<br>";
session_start();
$id_client=$_SESSION['id'];

$current_date=new dateTime('now');
$current=$current_date->format('Y-m-d');

echo "<br>";

$request_sql='SELECT debut,fin FROM reservations';
$query_sql=mysqli_query($connect,$request_sql);
$tab_sql=mysqli_fetch_all($query_sql,MYSQLI_ASSOC);

//var_dump($tab_sql);

@$submit=$_POST['submit'];

if(isset($submit)){

    
    $titre=htmlspecialchars($_POST['titre']);
    $date=$_POST['date'];

    $testdate = new DateTime($_POST['date']);
    //var_dump($testdate->format('D'));

  
    $heure_debut=$date.' '.$_POST['debut'];
    $heure_fin=$date.' ' .$_POST['fin'];
    $description=htmlspecialchars($_POST['description']);
    $id_client=$_SESSION['id'];

    $mess_week="";
    $mess_date="";
    $mess_error="";

    $valid=true;
   

          if($testdate->format('D') == 'Sat' || $testdate->format('D') == 'Sun'){
            $valid=false;
            $mess_week="le week on est close";
          }else{

              if(empty($titre) && empty($description)){
                  
                  $mess_error = "Veuillez remplir tous les champs"; 
          
              }elseif(!empty($titre) && empty($description)){

                $mess_error = "Ajouter une description"; 
                
              }else{
                  
                  $req="INSERT INTO `reservations` (`titre`, `description`,`debut`,`fin`,`id_client`) VALUES('$titre','$description','$heure_debut','$heure_fin','$id_client')";
                  $query=mysqli_query($connect,$req);
                   
              }
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

<?php include('include/header.php'); ?>
<h1>Reservation</h1>

<div class="container-form">
    <form action="" method="POST">
        <caption>Formulaire de Reservation</caption>
        <br>
        <br>
        <p>Utilisateur : <?= ucwords($_SESSION['login']) ?></p>
        <br>
        
        <label for="titre">Titre</label>
        <br>
        <br>
        <input type="text" name="titre" placeholder="nom de votre reservation">
        <br>
        <br>
        <label for="heure_debut">Heure de début</label>
        <br>
        <br>
        <select name="debut" id="debut">
            <?php for($i=8; $i<20; $i++){?>
            <?= "<option>".$i."</option>" ?>
            <?php } ?>
        </select>
        <br>
        <br>
        <label for="heure_fin">Heure de fin</label>
        <br>
        <br>
        <select name="fin" id="fin">
            <?php for($i=8; $i<20; $i++){?>
            <?= "<option>".$i."</option>" ?>
            <?php } ?>
        </select>
        <br>
        <br>
        <label for="date">Date : </label>
        <br>
        <br>
        <input type="date" id="date" name="date" min="<?= $current ?>">
        <br>
        <br>
        <label for="description">Description</label>
        <br>
        <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Reserver">
        <br>
        <br>
        <?= @$mess_error ?>
        <?= @$mess_week ?>
       
       
    </form>
</div>
                

   
</body>
</html>                                                             