<?php 
    require_once 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Add Tourist</title>
</head>
<body>
    <main>
        <div class="container">
            <section class="contact">
                <h1 class="title">Ajout Touriste | <a href="/TouristeController/showTourist">Retour</a></h1>
                <form action="/TouristeController/getting" method="POST" enctype="multipart/form-data">
                    <div class="left_right">
                        <div class="left">
                            <label for="">Nom :</label>
							<input type="text" class="box-input" name="lname" placeholder="Nom touriste" required />
                            <label for="">Prénom :</label>
							<input type="text" class="box-input" name="fname" placeholder="Prénom touriste" required />
                        </div>
                        <div class="right">
							<label for="">Civilité :</label>
							<select class="box-input" name="civilite" id="type" >
								<option value="" disabled selected>Civilité</option>
								<option value="M">Masculin</option>
								<option value="F">Féminin</option>
							</select>   
							<label for="">Id tourist :</label>
							<input type="text" class="box-input" name="idg" placeholder="Id tourist" required />
                        </div>
                    </div>
			        <input type="submit" name="envoyer" value="Enregistrer" class="button" />
                </form>
            </section>
        </div>
    </main>
</body>
</html>