<?php
    require_once('admin_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ERITEL Travel | Gestion des utilisateurs</title>
</head>
<body>
    <div class="container">
        <section class="contact">
            <form action="" method="POST" enctype="multipart/form-data" class="box">
                <div class="left_right">
                    <div class="right">
                        <input type="text" class="box-input" name="lname" placeholder="Nom user" required />
                        <label for=""></label>
                        <input type="text" class="box-input" name="fname" placeholder="Prénom user" required />
                    </div>
                    <div class="left">
                        <select class="box-input" name="type" id="type" >
                            <option value="" disabled selected>Type</option>
                            <option value="admin">Administrateur</option>
                            <option value="user">Utilisateur</option>
                        </select>
                        <label for=""></label>
                        <input type="email" class="box-input" name="email" placeholder="Email user" required />
                    </div>
                </div>
                <input type="submit" name="submit" value="Enregistrer" class="button" />
            </form>
            <h2>Il y a <?php echo $nbrUser ?> <span class="title-nbr">utilisateurs</span> au total inscrits sur le site</h2> 
            <!-- Affichage sous forme de tableau la liste des utilisateurs  -->
            <table class="table"> 
                <thead>
                    <tr>   
                        <th>Nom</th>
                        <th>Prénon</th>
                        <th>Rôle</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user=$resultatUser->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $user['lname'] ?></td>
                        <td><?php echo $user['fname'] ?></td>
                        <td><?php echo $user['type'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <!-- Pour chaque entrée je realise des actions de modification. -->  
                        <td>
                            <a href="/Users/edit?idUser=<?php echo $user['id']; ?>"><span>Modifier</span></a>
                        </td>
                        <!-- Pour chaque entrée je realise des actions de suppression -->
                        <td>
                            <a href="/RegisterController/deleteUser?id=<?php echo $user['id'] ;?>">
                                <span class="">Supprimer</span>
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <a class="title" href="/AddUserController/userAdd"><span class="glyphicon glyphicon-plus"></span>Ajouter User</a>
            <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
        </section>
    </div>
</body>
</html>