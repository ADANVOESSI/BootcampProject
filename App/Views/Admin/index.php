    <?php
		require_once('admin_header.php');
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERITEL Travel | HOME Admin</title>
        <!-- <link rel="stylesheet" href="../../ressources/css/styleForm.css"> -->

    </head>
<body>
    <div class="container">
        <section class="index">
            <h1>Bienvenue <?php echo $_SESSION['user_lname'] .' '. $_SESSION['user_fname']; ?> !</h1>
            <p>C'est votre espace administrateur.</p>
            <ul>
                <li><a href="/AddUserController/userAdd">Add user</a></li>
                <li><a href="/RegisterController/showUser">Update user</a></li>
                <li><a href="/RegisterController/showUser">Delete user</a></li>
                <li><a href="/RegisterController/showMessage">Messages</a></li>
                <li><a href="/Users/logout">Déconnexion</a></li>
            </ul>

            <a class="title-index" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Aller sur le site</a>
        </section>
	</div>
</body>
</html>