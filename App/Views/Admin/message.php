<?php 
    require_once('admin_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion des méssages</title>
</head>
<body>
    <div class="container">
        <section class="contact">
            <h2>Il y a <?php echo $nbrMessage ?> <span class="title-nbr">méssages</span> au total</h2>
            <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
            <table class="table"> 
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Object</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php while($message=$resultatMessage->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $message['name'] ?></td>
                        <td><?php echo $message['object'] ?></td>
                        <td><?php echo $message['email'] ?></td>
                        <td><?php echo $message['number'] ?></td>
                        <td><?php echo $message['message'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
        </section>
    </div>
</body>
</html>