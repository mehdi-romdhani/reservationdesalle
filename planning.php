<?php



require_once('asset/connect.php');

session_start();



$sql = 'SELECT reservations.id AS eventID, reservations.description, reservations.titre, reservations.debut, reservations.fin, reservations.id_client, clients.id, clients.login FROM reservations INNER JOIN clients ON clients.id=reservations.id_client';
$req = mysqli_query($connect, $sql);
$tab_assoc = mysqli_fetch_all($req, MYSQLI_ASSOC);



$sql2 = 'SELECT clients.login, reservations.description, reservations.titre, reservations.id_client FROM clients INNER JOIN reservations ON clients.id=reservations.id_client';
$req2 = mysqli_query($connect, $sql2);
$tab_des = mysqli_fetch_all($req2, MYSQLI_ASSOC);
//var_dump($tab_des);


$sql2 = 'SELECT clients.login, reservations.description, reservations.titre, reservations.id_client FROM clients INNER JOIN reservations ON clients.id=reservations.id_client';
$req2 = mysqli_query($connect, $sql2);
$tab_des = mysqli_fetch_all($req2, MYSQLI_ASSOC);

$sq3='DELETE FROM reservations WHERE '




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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <!-- CSS only -->
    <!-- Titre Page -->
    <title>Cinéma Les Petits Artistes </title>
</head>

<body>

    <?php include('include/header.php'); ?>
    <h1>PLANNING</h1>
    <button><a href="planning.php?date=">last week</a></button>
    <button><a href="planning.php?date=">next week</a></button>


    <div class="container-planning">

        <table>
        
            <thead>

                <tr>
                    <td>Horaires</td>
                    <!-- Instance de lobjet date  -->
                    <?php $date = new dateTime('this week'); ?>
                    

                    <?php for ($i = 0; $i < 7; $i++) : ?>
                        <th>
                            <?php echo $date->format('D-j-F-Y'); ?>
                            
                        </th>
                        <?php $date->modify("+1 day "); ?>

                    <?php endfor; ?>


                </tr>

            </thead>


            <tbody>

                <?php for ($j = 0; $j < 12; $j++) : ?>

                    <tr>

                         <?php $date = new dateTime("last monday + 8 hours +$j hours"); ?>
                        <?php echo "<td>".$date->format('H')."H </td>" ?>
                        

                      
                        
                        
                        <?php for ($i = 0; $i < 7; $i++) : ?>
                            
                            
                            
                            <td>
                                


                                <?php

                                $day_book = false;
                               
                                //var_dump($date);
                                foreach ($tab_assoc as $tab) {
                                    
                                    $date1=new dateTime($tab['debut']);
                                    $date2=new dateTime($tab['fin']);
                                    
                                    if ($date->format('Y-m-d H')>=$date1->format('Y-m-d H')&&$date->format('Y-m-d H')<=$date2->format('Y-m-d H') ) {
                                        $day_book = true;
                                        
                                 
                                        if(isset($_SESSION['login'])){
                                            
                                            echo "<a href='reservation.php?id=".$tab['eventID']."'>";
                                            echo  "Faite par : ".$tab['login']."<br>";
                                            echo "Titre Résa : " .$tab['titre']."<br>";
                                            echo "Description :" . $tab['description'];
                                            echo "</a>";
                                            echo "<br>";
                                            if($tab['id_client']==$tab['id']){

                                                echo "<button><a href=''>SUPP</button></a>";
                                            }
                                            
                                        }else{

                                            echo  "Faite par : ".$tab['login']."<br>";
                                            echo "Titre Résa : " .$tab['titre']."<br>";
                                        }
                                        
                                    }
                                }
                                ?>
<?php

                                            //var_dump($date->format('D'));

                                        if($date->format('D') == 'Sat' || $date->format('D') == 'Sun') { ?>
                                                        
                                            <div style='color: red;height:100%;'>
                                            <?php echo 'Close';?>
                                             </div>
                                             <?php
                                        }elseif(isset($_SESSION['login']) && $day_book == false) {

                                           
                                            echo "<a class='reservation' href='reservation-form.php?date=".$date->format('Y-m-d H')."'>Reserver</a>";
                                            
                                        }elseif(!isset($_SESSION['login']) && $day_book == false){
                                            echo "Reserver ? Veuillez vous". " <a href='connexion.php'>Connecter</a>";
                                        }
                              
                                        

                                
                                
                                        //$date_modif = $date->modify('+1 day');
                                //affiche nom de la reservation ; 
                                $date->modify('+1 day');

                                ?>


                                  
                            </td>

                        <?php endfor; ?>

                    </tr>

                <?php endfor; ?>


            </tbody>
        </table>
    </div>




</body>

</html>