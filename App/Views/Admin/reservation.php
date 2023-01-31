<?php 
    require_once('admin_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des réservations</title>
</head>
<body>
    <div class="container">
        <section class="contact">
            <h2>Il y a <?php echo $nbrReservation ?> <span class="title-nbr">reservations</span> au total en cours</h2>
            <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
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
                    <?php while($reservation=$resultatReservation->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $reservation['lname'] ?></td>
                        <td><?php echo $reservation['fname'] ?></td>
                        <td><?php echo $reservation['email'] ?></td>
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
            <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
        </section>
    </div>
</body>
</html>