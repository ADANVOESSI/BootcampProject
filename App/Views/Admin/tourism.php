<?php 
    require_once('admin_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion de touristes</title>
</head>
<body>
    <div class="container">
        <section class="contact">
            <form action="" method="POST" enctype="multipart/form-data" class="box">
                <div class="left_right">
                    <div class="left">
                        <input type="text" class="box-input" name="lname" placeholder="Nom" required />
                        <label for=""></label>
                        <input type="text" class="box-input" name="fname" placeholder="Prénom" required />
                    </div>
                    <div class="right">
                        <select class="box-input" name="civilite" id="type" >
                            <option value="" disabled selected>Civilité</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>
			<input type="submit" name="submit" value="Enregistrer" class="button" />
        </form>
        <h2>Il y a <?php echo $nbrTouriste ?> <span class="title-nbr">touristes</span> au total en cours</h2>
        <!-- Affichage sous forme de tableau de la requete lancé plus haut -->
        <table class="table"> 
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Guide</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody> 
                <?php while($tourisme=$resultatTourisme->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                    <td><?php echo $tourisme['lname'] ?></td>
                    <td><?php echo $tourisme['fname'] ?></td>
                    <td><?php echo $tourisme['nameGuide'] ?></td>
                    <td>
                        <img src="../../ressources/assets/<?php echo $tourisme['image'] ?>" alt="" width="50px" height="40px">
                    </td>
                    <!-- Pour chaque entrée,on realise des actions de modification. -->
                    <td>
                        <a href="/Users/editTourism?id=<?php echo $tourisme['id'] ?>"><span>Modifier</span></a>
                    </td>
                    <!-- Pour chaque entrée,on realise des actions de suppression -->
                    <td>
                        <a href="/TouristeController/deleteTouriste?id=<?php echo $tourisme['id'] ?>">
                            <span>Supprimer</span>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <a class="title" href="/TouristeController/addTourist">Ajouter Touriste</a>
        <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
    </section>
</div>
</body>
</html>