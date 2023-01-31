<?php

    require_once 'connexion.php';

    if(isset($_POST['enregistrer'])){

    $id = $_POST['id'];
    $lname = $_POST['lname'];
    $lname = htmlspecialchars($lname);
    $niveau = $_POST['niveau'];
    $niveau = htmlspecialchars($niveau);

    $guideUp = $connexion->prepare("UPDATE `guide` SET nameGuide = ?, niveau = ? WHERE idGuide = ?");
    $guideUp->execute([$lname, $niveau, $id]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERITEL Travel | Edit Guid</title>
    <link rel="stylesheet" href="../../ressources/css/styleForm.css">
</head>
<body>
	<div class="containe">
		<h1 class="box-logo box-title">ERITEL <span>Travel</span></h1>
		<h1 class="box-title">Formulaire de modification !</h1>

        <?php
      $getId = $_GET['idG'];
      $request = $connexion->prepare("SELECT * FROM `guide` WHERE idGuide = ?");
      $request->execute([$getId]);
      if($request->rowCount() > 0){
         while($guide = $request->fetch(PDO::FETCH_ASSOC)){ 
   ?>
		<form action="/GuideController/updateGuide" method="POST" enctype="multipart/form-data" class="box">
			<input type="hidden" class="box-input" name="id" placeholder="Id" required value="<?= $guide['idGuide']; ?>" />
			<input type="text" class="box-input" name="lname" placeholder="Nom" required value="<?= $guide['nameGuide']; ?>" />
			
            <select class="box-input" name="niveau" id="type" >
                <option value="" disabled selected><?= $guide['niveau']; ?></option>
                <option value="Niveau 0">Niveau 0</option>
                <option value="Niveau 1">Niveau 1</option>
                <option value="Niveau 2">Niveau 2</option>
                <option value="Niveau 3">Niveau 3</option>
                <option value="Niveau 4">Niveau 4</option>
                <option value="Niveau 5">Niveau 5</option>
            </select>
			<input type="submit" name="enregistrer" value="Enregistrer" class="box-button" />
		</form>
        <?php
                }
            }
        ?>

		<p class="box-register"><a href="/GuideController/showGuid">Annuler les modifications</a></p>

	</div>
</body>
</html>