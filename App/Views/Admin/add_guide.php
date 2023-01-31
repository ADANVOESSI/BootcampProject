<?php 
    require_once 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Add Guide</title>
</head>
<body>
    <main>
        <div class="container">
            <section class="contact">
                <h1 class="title">Ajout Guide | <a href="/GuideController/showGuid">Retour</a></h1>
                <form action="/GuideController/getting" method="POST" enctype="multipart/form-data">
                    <div class="left_right">
                        <div class="left">
                            <label for="">Nom :</label>
                            <input type="text" class="box-input" name="lname" placeholder="Nom guide" required />
                        </div>
                        <div class="right">
                            <label for="">Niveau :</label>
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
			        <input type="submit" name="envoyer" value="Enregistrer" class="button" />
                </form>
            </section>
        </div>
    </main>
</body>
</html>