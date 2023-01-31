<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Login</title>
    <link rel="stylesheet" href="../../ressources/css/styleForm.css">
</head>
<body>
	<div class="containe">
		<h1 class="box-logo box-title">ERITEL <span>Travel</span></h1>
		<h1 class="box-title">Connectez-vous pour continuer !</h1>

		<form class="box" action="/RegisterController/login" method="post">
			<input type="email" class="box-input" name="email" placeholder="Votre email" required />
			<input type="password" class="box-input" name="password" placeholder="Votre mot de pass" required />
			<input type="submit" name="connecter" value="Se connecter" class="box-button"/>
		</form>

		<p class="box-register"> <a href="/Users/register">S'inscrire</a>  |  <a href="/Users/pwdReset">Mot de pass oublié ?</a></p>

	</div>
</body>
</html>