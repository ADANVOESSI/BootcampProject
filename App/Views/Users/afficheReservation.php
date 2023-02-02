<?php 
    // require_once('../App/Views/Admin/admin_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des réservations</title>
    <link rel="stylesheet" href="../../ressources/css/styles.css">
</head>
<body>
    <div class="container">
        <section class="contact">
            <?php
                if ($nbrReservation > 0) { ?>
                    <h2>Vous avez <span class="title-nbr"> <?php echo $nbrReservation ?> reservation(s)</span> au total en cours</h2>
                    <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
                    <table class="table"> 
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Hôtel</th>
                                <th>Date Arrivée</th>
                                <th>Date de retour</th>
                                <th>Nbr Adult</th>
                                <th>Nbr Enfant</th>
                                <th>Type chambre</th>
                                <th>Nbr chambre</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php while($reservation = $resultatReservation->fetch(PDO::FETCH_ASSOC)){?>
                            <tr>
                                <td><?php echo $_SESSION['user_lname'] ?></td>
                                <td><?php echo $_SESSION['user_fname'] ?></td>
                                <td><?php echo $_SESSION['user_email'] ?></td>
                                <td><?php echo $reservation['hotel'] ?></td>
                                <td><?php echo $reservation['date_Arr'] ?></td>
                                <td><?php echo $reservation['date_sort'] ?></td>
                                <td><?php echo $reservation['adult'] ?></td>
                                <td><?php echo $reservation['child'] ?></td>
                                <td><?php echo $reservation['room'] ?></td>
                                <td><?php echo $reservation['nbr_room'] ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <h3 class='title_echo'>Vous pouvez de même faire une autre réservation en cliquant   <a href="/Users/hotels" class="title"> ici</a></h3>
                <?php } else { 

                    echo "<h1 class='title_echo'>Vous n'avez fait auncune réservation alors  <a href='/Users/hotels'><span class='title'>cliquez ici </span></a> pour en faire une. Nous vous remercions !</h1>";

               }?>
               
            
            
            <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
        </section>
    </div>
</body>
</html>