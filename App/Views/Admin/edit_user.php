<?php
    require_once 'connexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Register</title>
    <link rel="stylesheet" href="../../ressources/css/styleForm.css">
</head>
<body>
	<div class="containe">
		<h1 class="box-logo box-title">ERITEL <span>Travel</span></h1>
		<h1 class="box-title">Veuillez vous inscrire !</h1>

        <?php
      $getId = $_GET['idUser'];
      $request = $connexion->prepare("SELECT * FROM `user` WHERE id = ?");
      $request->execute([$getId]);
      if($request->rowCount() > 0){
         while($user = $request->fetch(PDO::FETCH_ASSOC)){ 
   ?>
		<form action="/RegisterController/updateUser" method="POST" enctype="multipart/form-data" class="box">
			<input type="hidden" class="box-input" name="id" placeholder="Id" required value="<?= $user['id']; ?>" />
			<input type="text" class="box-input" name="lname" placeholder="Nom" required value="<?= $user['lname']; ?>" />
			<input type="text" class="box-input" name="fname" placeholder="Prénom" required value="<?= $user['fname']; ?>" />
            <select class="box-input" name="type" id="type" >
                <option value="" disabled selected><?= $user['type']; ?></option>
                <option value="admin">Administrateur</option>
                <option value="user">Utilisateur</option>
            </select>
			<input type="email" class="box-input" name="email" placeholder="Email" required value="<?= $user['email']; ?>" />
			<input type="submit" name="enregistrer" value="Enregistrer" class="box-button" />
		</form>
        <?php
         }
      }
   ?>

		<p class="box-register"><a href="/RegisterController/showUser">Annuler les modifications</a></p>

	</div>
</body>
</html>