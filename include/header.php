

<?php if(!isset($_SESSION['login'])){?>

    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </nav>
    </header>
    
    
<?php }elseif($_SESSION['login']=='admin'){ ?>
    
     <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="reservation-form.php">Reservation</a></li>
                <li><a href="reservation.php">Votre Reservation</a></li>
                <li><a href="profil.php">Profil</a></li>

                <li><a href="admin.php">Admin</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>

<?php }else{ ?>


<header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="reservation-form.php">Reservation</a></li>
                <li><a href="reservation.php">Votre Reservation</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>

 <?php } ?>