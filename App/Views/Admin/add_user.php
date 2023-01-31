<?php 
    require_once 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Add User</title>
</head>
<body>
    <main>
        <div class="container">

            <section class="contact">
                <h1 class="title">Ajout Utilisateur | <a href="/RegisterController/showUser">Retour</a></h1>
                <form action="/AddUserController/getting" method="POST" enctype="multipart/form-data">
                    <div class="left_right">
                        <div class="left">
                            <label for="">Nom :</label>
							<input type="text" class="box-input" name="lname" placeholder="Nom user" required />
                            <label for="">Prénom :</label>
							<input type="text" class="box-input" name="fname" placeholder="Prénom user" required />
							<label for="">Civilité :</label>
							<select class="box-input" name="type" id="type" >
								<option value="" disabled selected>Type</option>
								<option value="admin">Administrateur</option>
								<option value="user">Utilisateur</option>
							</select>   
                        </div>
                        <div class="right">
							<label for="">Email user :</label>
							<input type="email" class="box-input" name="email" placeholder="Email user" required />
							<label for="">Password user :</label>
							<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
                        </div>
                    </div>
			        <input type="submit" name="submit" value="Enregistrer" class="button" />
                </form>
            </section>
        </div>
    </main>
</body>
</html>