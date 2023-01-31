<?php
namespace App\Models;
use App\Models\Connexion;
use PDO;


class TouristeModel extends Connexion {

    private $connexion;
    private $id;
    private $fname;
    private $lname;
    private $civilite;
    private $image;
    private $idg;
    


    // Affichage du tourist (Niveau administrateur)

    public function showTourist()
    {
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $requeteTourisme =  "SELECT tourisme.id, tourisme.lname, tourisme.fname, tourisme.image, tourisme.civilite, guide.nameGuide FROM tourisme, guide WHERE tourisme.idGuide = guide.idGuide";
        $resultatTourisme= $conn->query($requeteTourisme);
        return $resultatTourisme;
    }


    // Compteur de tourist

    public function countTourist(){
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $requeteCount ="SELECT count(*) countT FROM tourisme";   
        $resultatCount=$conn->query($requeteCount);
        $tabCount = $resultatCount->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }


    // Insertion de touristes (Niveau administration)

    public function insertTouriste($lname, $fname, $civilite, $image, $idg) {
        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->fname = $fname;
        $this->civilite = $civilite;
        $this->image = $image;
        $this->idg = $idg;
        $request = "INSERT INTO `bd_project`.tourisme VALUES(NULL, :lname, :fname, :civilite, :image, :idg)";
        $connect = $connexion->prepare($request);
        $connect->execute([
            ":lname" => $this->lname,
            ":fname" => $this->fname,
            ":civilite" => $this->civilite,
            ":image" => 'User.png',
            ":idg" => $this->idg
        ]);
    }



    // Mise à jour du touriste par l'administrateur

    public function updateTouriste($fname, $lname, $civilite, $id) {
        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->fname = $fname;
        $this->email = $email;
        $this->id = $id;
        $this->civilite = $civilite;
        $sql = "UPDATE `bd_project`.tourisme SET fname = ?, lname = ?, civilite = ? WHERE id = ? ";
        $connect = $connexion->prepare($sql);
        $connect->execute([$this->fname, $this->lname, $this->civilite, $this->id]);
    }



    // Suppression du touriste par l'administrateur

    public function deleteTouriste($id) {
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $request=$conn->prepare('DELETE FROM `tourisme` WHERE id = :id');
        $request->bindParam('id', $_GET['id']);
        $request->execute();
    }
   
}