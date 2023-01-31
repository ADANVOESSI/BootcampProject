<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism_ERITEL Travel | Header</title>
    <link rel="stylesheet" href="ressources/css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<header>

    <div class="logo">
        <a href="Accueil.php"><span>ERITEL</span> Travel</a>
    </div>

    <ul id="menu" class="menu">
        <li><a href="/Users/Accueil">Acceuil</a></li>|
        <li><a href="/Users/About">à propos</a></li>|
        <li><a href="/Users/Sites">sites</a></li>|
        <li><a href="/Users/Contact">contact</a></li>
    </ul>

    <div class="dropdown">
        <p>
            <i onclick="dropdownFunction()" class="material-icons dropbtn" style="font-size:36px">account_circle</i>
            <span>
                <?php
                if (isset($_SESSION["user_id"])) {
                    echo $_SESSION['user_lname']; 
                }else {
                    echo '';
                }
                ?>
            </span>
        </p> 
        <div id="myDropdown" class="dropdown-content">
        <?php if (isset($_SESSION["user_id"])) : ?>
            <a href="/Users/logout">Déconnexion</a>
            <a href="/Admin/index">Admin</a>
            <?php else : ?>
                <a href="/Users/login">Connexion</a>
                <?php endif; ?>
        </div>
    </div>

    <a href="/Users/hotels" class="btn_reservation reservation">Réserver un Hôtel</a>
    <div id="responsive_menu" class="responsive_menu"></div>

</header>

    <script src="/ressources/js/header.js"></script>

</body>
</html>