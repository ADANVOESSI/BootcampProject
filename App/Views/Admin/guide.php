<?php 
    require_once("admin_header.php");
 ?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERITEL Travel | Gestion des Guides</title>
    </head>
    <body>
        <div class="container">
            <!-- Section guide -->
            <section class="contact">
                <form action="" method="POST" enctype="multipart/form-data" class="box">
                    <div class="left_right">
                        <div class="left">
                            <input type="text" class="box-input" name="lname" placeholder="Nom guide" required />
                        </div>
                        <div class="right">
                            <select class="box-input" name="niveau" id="type" >
                                <option value="" disabled selected>Niveau</option>
                                <option value="Niveau 0">Niveau 0</option>
                                <option value="Niveau 1">Niveau 1</option>
                                <option value="Niveau 2">Niveau 2</option>
                                <option value="Niveau 3">Niveau 3</option>
                                <option value="Niveau 4">Niveau 4</option>
                                <option value="Niveau 5">Niveau 5</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="envoyer" value="Enregistrer" class="button"/>
                </form>
                <h2>Il y a <?php echo $nbrGuide ?><span class="title-nbr"> guides</span> au total</h2>
                <!-- Affichage sous forme de tableau la liste de tous les guides -->
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Niveau</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($guide = $resultatG->fetch(PDO::FETCH_ASSOC)){?>
                        <tr>
                            <td><?php echo $guide['idGuide'] ?></td>
                            <td><?php echo $guide['nameGuide'] ?></td>
                            <td><?php echo $guide['niveau'] ?></td>
                            <td>
                                <a href="/Users/modifyGuid?idG=<?php echo $guide['idGuide'] ?>"><span>Modifier</span></a>
                            </td>
                            <td>
                                <a href="/GuideController/deleteGuide?idGuide=<?php echo $guide['idGuide'] ?>">
                                    <span>Supprimer</span>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a class="title" href="/GuideController/guideAdd">Ajouter Guide</a>   
                <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
            </section>
        </div>
    </body>
</html>