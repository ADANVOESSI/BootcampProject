<?php 
    session_start();
    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
    header('location:/login');
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tourism_ERITEL Travel | Header Admin</title>
        <link rel="stylesheet" href="../../ressources/css/styles.css">
    </head>
    <body>
        <header>
            <div class="logo">
                <a href=""><?php echo $_SESSION['user_lname'] .' '. $_SESSION['user_fname']; ?></a>
            </div>
            <?php 
                if ($admin_id) { ?>
                    <ul id="menu" class="menu">
                        <li><a href="/TouristeController/showTourist">Touristes</a></li>|
                        <li><a href="/GuideController/showGuid">Guides</a></li>|
                        <li><a href="/RegisterController/showUser">Utilisateurs</a></li>|
                        <li><a href="/Users/logout"><span class=""></span>Deconnection</a></li>
                    </ul>
                <?php } ?>
      
            <a href="/ReservationController/showReservation" class="btn_reservation reservation">Gestion des reservations</a>
            <div id="responsive_menu" class="responsive_menu"></div>
        </header>

        <script src="/ressources/js/header.js"></script>
    </body>
</html>