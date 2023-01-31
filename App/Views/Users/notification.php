<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Notification</title>
    <link rel="stylesheet" href="../../ressources/css/styleForm.css">
</head>
<body>

	<div class="containe">
        
        <h1 class="box-logo box-title">ERITEL <span>Travel</span></h1>
        <h1 class="box-title">Félicitation à vous Mme/Mr <?php echo $_SESSION['user_lname'].' '.$_SESSION['user_fname']; ?> pour votre confiance que vous avez afin de procéder à une réservation</h1>
        <h1 class="box-title">Nous vous enverrons de mail pour la notification de votre réservation faite !</h1>

		<p class="box-register">Vous allez <a href="/Users/hotels">cliquez ici</a> pour revenir</p>

	</div>
</body>
</html>