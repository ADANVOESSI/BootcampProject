<?php
namespace App\Models;
use App\Models\Connexion;
use PDO;


class ReservationModel extends Connexion {

    public $connexion;

    public $id;
    public $hotel;
    public $date_Arr;
    public $date_sort;
    public $adult;
    public $child;
    public $room;
    public $nbr_room;
    public $userID;


    // Affichage de toutes les réservations dans la base

    public function showReservation(){
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $requeteReservation =  "SELECT user.lname, user.fname, user.email, reservation.hotel, reservation.date_Arr, reservation.date_sort, reservation.adult, reservation.child, reservation.room, reservation.nbr_room FROM user INNER JOIN reservation ON user.id = reservation.userID";

        $resultatReservation = $conn->query($requeteReservation);
        return $resultatReservation;
    }

    
    // Compteur des réservations niveau administrateur

    public function countReservation(){
        $connexion = new Connexion ;
        $conn = $connexion->connexion();

        $requeteCount ="SELECT count(*) countR FROM reservation";   
        $resultatCount=$conn->query($requeteCount);
        $tabCount = $resultatCount->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }



    // Insertion et confirmation des réservations

    public function insertReservation($hotel, $date_Arr, $date_sort, $adult, $child, $room, $nbr_room, $userID) {
        $connexion = $this->connexion();

        $this->hotel = $hotel;
        $this->date_Arr =$date_Arr;
        $this->date_sort = $date_sort;
        $this->adult = $adult;
        $this->child = $child;
        $this->room = $room;
        $this->nbr_room = $nbr_room;
        $this->userID = $userID;

        $request = "INSERT INTO `bd_project`.reservation VALUES(NULL, :hotel, :date_Arr, :date_sort, :adult, :child, :room, :nbr_room, :userID)";
        
        $connect = $connexion->prepare($request);
        $connect->execute([
            ":hotel" => $this->hotel,
            ":date_Arr" => $this->date_Arr,
            ":date_sort" => $this->date_sort,
            ":adult" => $this->adult,
            ":child" => $this->child,
            ":room" => $this->room,
            ":nbr_room" => $this->nbr_room,
            ":userID" => $this->userID
        ]);

    }


    // Afficher toutes les réservations faites par un utilisateur dans sa section

    public function afficheReservation($userID)
    {
        $connexion = new Connexion ;
        $this->userID = $userID;
        $conn = $connexion->connexion();
        $requeteReservation =  "SELECT * FROM `bd_project`.reservation WHERE userID = ? ";
        $resultatReservation = $conn->prepare($requeteReservation);
        $resultatReservation->execute([$this->userID]);
        return $resultatReservation;
    }
    
    
    // Compteur des réservations d'un utilisateur
    
    public function countReservationUser($userID){
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $this->userID = $userID;

        $requeteCount ="SELECT count(*) countR FROM reservation WHERE userID = ?";   
        $resultatCount=$conn->prepare($requeteCount);
        $resultatCount->execute([$this->userID]);
        $tabCount = $resultatCount->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }
   
}