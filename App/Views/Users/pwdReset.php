<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Update Pass Word</title>
    <link rel="stylesheet" href="../../ressources/css/styleForm.css">
</head>
<body>
	<div class="containe">
		<h1 class="box-logo box-title">ERITEL <span>Travel</span></h1>
		<h1 class="box-title">Initialisation du Mot de Pass !</h1>

		<form class="box" action="/RegisterController/pwdReset" method="post">
        <label for="email" class="control-label">Saisir email de récuperation</label>
			<input type="email" class="box-input" name="email" placeholder="Email" required />
			<input type="submit" name="envoyer" value="Envoyer" class="box-button"/>
		</form>

		<p class="box-register"> <a href="/Users/logout">Retour</a></p>

	</div>
</body>
</html>