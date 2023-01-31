<?php
namespace App\Models;
use App\Models\Connexion;
use PDO;


class GuideModel extends Connexion {

    private $connexion;
    private $lname;
    private $niveau;
    private $idg;
    private $idGuide;


    // Insertion ou ajout de guide
    public function insertGuide($lname, $niveau) {
        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->niveau = $niveau;
        $request = "INSERT INTO `bd_project`.guide VALUES(NULL, :lname, :niveau)";
        $connect = $connexion->prepare($request);
        $connect->execute([
            ":lname" => $this->lname,
            ":niveau" => $this->niveau
        ]);
    }


// Affichage de Guide au niveau de l'administrateur

  public function showGuide()
  {
    $connexion = new Connexion ;
    $conn = $connexion->connexion();    
        
    $requete = "SELECT * FROM guide";
    $resultatG = $conn->query($requete);
    return $resultatG;
  }


//   Compteur de Guide

  public function countGuid(){
    $connexion = new Connexion ;
    $conn = $connexion->connexion(); 
    $requeteCount ="SELECT count(*) countG FROM guide";
    $resultatCount=$conn->query($requeteCount);
    $tabCount = $resultatCount->fetch();
    return $tabCount;
  }

    // Suppression de guide par l'administrateur

    public function deleteGuide($idGuide) {
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $request=$conn->prepare('DELETE FROM `guide` WHERE idGuide = :idGuide');
        $request->bindParam('idGuide', $_GET['idGuide']);
        $request->execute();
    }


    // Mise à jour du guide par l'administrateur

    public function updateGuide($lname, $niveau, $idGuide) {

        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->idGuide = $idGuide;
        $this->niveau = $niveau;
        $sql = "UPDATE `bd_project`.guide SET nameGuide = ?, niveau = ? WHERE idGuide = ?";
        $connect = $connexion->prepare($sql);
        $connect->execute([$this->lname, $this->niveau, $this->idGuide]);
    }
   
}