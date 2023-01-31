<?php 
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
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
    <link rel="stylesheet" href="../../ressources/css/styles.css">
    <title>ERITEL Travel | Hôtels Partenaires</title>
</head>
<body>
    <div class="container">
        <section class="hotel contact">
            <h1 class="title">Hôtels parteneaires</h1>
            <p>Bienvenu <span><?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname'] ?></span> !</p>
            <h3>Vous verrez ici quelques de nos hôtels partenaires et vous serez libre de choisir et faire votre réservation avec des réductions.</h3>
            <h2>Novotel Bénin</h2>
            <div class="toflex">

                <figure>
                    <img src="../../ressources/assets/image1.jpg" alt="image1">
                    <figcaption>
                        <div class="contour">
                            <p>$80.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image2.jpg" alt="image2">
                    <figcaption>
                        <div class="contour">
                            <p>$75.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image4.jpg" alt="image4">
                    <figcaption>
                        <div class="contour">
                            <p>$85.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/cov.jpg" alt="cov">
                    <figcaption>
                        <div class="contour">
                            <p>$90.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                
            </div>
            <h2>Golden Tulip</h2>
            <div class="toflex">

                <figure>
                    <img src="../../ressources/assets/image1.jpg" alt="image1">
                    <figcaption>
                        <div class="contour">
                            <p>$80.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image2.jpg" alt="image2">
                    <figcaption>
                        <div class="contour">
                            <p>$75.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image4.jpg" alt="image4">
                    <figcaption>
                        <div class="contour">
                            <p>$85.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/cov.jpg" alt="cov">
                    <figcaption>
                        <div class="contour">
                            <p>$90.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                
            </div>
            <h2>AZALAÏ Hôtel</h2>
            <div class="toflex">

                <figure>
                    <img src="../../ressources/assets/image1.jpg" alt="image1">
                    <figcaption>
                        <div class="contour">
                            <p>$80.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image2.jpg" alt="image2">
                    <figcaption>
                        <div class="contour">
                            <p>$75.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image4.jpg" alt="image4">
                    <figcaption>
                        <div class="contour">
                            <p>$85.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/cov.jpg" alt="cov">
                    <figcaption>
                        <div class="contour">
                            <p>$90.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                
            </div>
            <h2>Hôtel du Lac</h2>
            <div class="toflex">

                <figure>
                    <img src="../../ressources/assets/image1.jpg" alt="image1">
                    <figcaption>
                        <div class="contour">
                            <p>$80.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image2.jpg" alt="image2">
                    <figcaption>
                        <div class="contour">
                            <p>$75.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/image4.jpg" alt="image4">
                    <figcaption>
                        <div class="contour">
                            <p>$85.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                <figure>
                    <img src="../../ressources/assets/cov.jpg" alt="cov">
                    <figcaption>
                        <div class="contour">
                            <p>$90.00 / Nuit</p>
                        </div>
                    </figcaption>
                </figure>
                
            </div>

            <form action="/ReservationController/insertReservation" method="POST" enctype="multipart/form-data">
                <div class="left_right">
                    <div class="left">
						<label for="">Hôtel :</label>
						<select class="box-input" name="hotel" id="hotel" >
							<option value="" disabled selected>Hôtel</option>
							<option value="azalai">AZALAÏ Hôtel</option>
							<option value="golden tulip">Golden Tulip</option>
							<option value="hotel du lac">Hôtel du Lac</option>
							<option value="novotel">Novotel</option>
						</select>  
                        <label for="">Date Arrivée :</label>
						<input type="date" class="box-input" name="date_Arr" placeholder="Date d'arrivée" required />
                        <label for="">Date de sortie :</label>
						<input type="date" class="box-input" name="date_sort" placeholder="Date de sortie" required />
                        <label for="">Adultes :</label>
                        <input type="number" class="box-input" min="1" name="adult" placeholder="Nombre Adulte" required>
                    </div>
                    <div class="right">
                        <label for="">Enfants :</label>
                        <input type="number" class="box-input" min="0" name="child" placeholder="Nombre Enfants" required>
                        <label for="">Chambre :</label>
						<select class="box-input" name="room" id="type" >
							<option value="" disabled selected>Chambre</option>
							<option value="$10.00 - $20.00">$10.00 - $20.00</option>
							<option value="$21.00 - $30.00">$21.00 - $30.00</option>
							<option value="$31.00 - $45.00">$31.00 - $45.00</option>
							<option value="$50.00 - $65.00">$50.00 - $65.00</option>
							<option value="$70.00 - $85.00">$70.00 - $85.00</option>
							<option value="$90.00 - ">$90.00 - </option>
						</select>  
						<label for="">nbr de Chambre :</label>
						<input type="number" class="box-input" min="1" name="nbr_room" placeholder="Nombre de chambre" required />
                    </div>
                </div>
			    <input type="submit" name="reserve" value="réserver" class="button" />
            </form>

            <a class="title right-title" href="/Users/accueil"><span class="glyphicon glyphicon-plus"></span>Retour sur le site</a>
            <a class="title lefit" href="/Users/logout"><span class="glyphicon glyphicon-plus"></span>Se déconnecter</a>
        </section>
    </div>
    
</body>
</html>