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

		<form action="/RegisterController/getting" method="POST" enctype="multipart/form-data" class="box">
			<input type="text" class="box-input" name="lname" placeholder="Prénom" required />
			<input type="text" class="box-input" name="fname" placeholder="Nom" required />
			<input type="email" class="box-input" name="email" placeholder="Email" required />
			<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
			<input type="password" class="box-input" name="password_confirm" placeholder="Confirmer le mot de passe" required />
			<input type="submit" name="submit" value="S'inscrire" class="box-button" />
		</form>

		<p class="box-register">Déjà inscrit? <a href="/Users/login">Connectez-vous ici</a></p>

	</div>
</body>
</html>