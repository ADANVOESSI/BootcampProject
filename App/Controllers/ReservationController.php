<?php
namespace App\Controllers;
use Core\View;
use App\Models\ReservationModel;

class ReservationController extends \Core\Controller {

   
    private $reservationModel;
    private $id;
    private $hotel;
    private $date_Arr;
    private $date_sort;
    private $adult;
    private $child;
    private $room;
    private $nbr_room;
    private $userID;


    // Vérifier si les champs ou l'un des champs est vide

    public function emptyInputs() {
        if(empty($this->hotel) || empty($this->date_Arr) || empty($this->date_sort) || empty($this->adult) || empty($this->child) || empty($this->room) || empty($this->nbr_room)){
            header("Location:/Users/hotels?msg=ChampsVide");
            exit();
        } else{
            return false;
        }
    }



    // Affichage de toutes les réservations enregistrées

    public function showReservation() {
        $this->reservationModel = new ReservationModel();
        $resultatReservation= $this->reservationModel->showReservation();
        $tabCount = $this->reservationModel->countReservation();
        $nbrReservation = $tabCount["countR"]; 
        require_once('../App/Views/Admin/reservation.php');
    }



    // Affichage de toutes les réservations enregistrées par l'utilisateur

    public function afficheReservation() {
        session_start();
        $this->reservationModel = new ReservationModel();
        $userID = $_SESSION["user_id"];
        $this->userID = $userID;
        $resultatReservation = $this->reservationModel->afficheReservation($this->userID);
        $tabCount = $this->reservationModel->countReservationUser($this->userID);
        $nbrReservation = $tabCount["countR"]; 
        require_once('../App/Views/Users/afficheReservation.php');
    }
    

    // Réservation faite par l'utilisateur

    public function insertReservation() {
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["reserve"])) {
            session_start();
            $this->reservationModel = new ReservationModel();
            $hotel = $_POST["hotel"];
            $date_Arr = $_POST["date_Arr"];
            $date_sort = $_POST["date_sort"];
            $adult = $_POST["adult"];
            $child = $_POST["child"];
            $room = $_POST["room"];
            $nbr_room = $_POST["nbr_room"];
            $userID = $_SESSION["user_id"];
            
            $this->hotel = $hotel;
            $this->date_Arr = $date_Arr;
            $this->date_sort = $date_sort;
            $this->adult = $adult;
            $this->child = $child;
            $this->room = $room;
            $this->nbr_room = $nbr_room;
            $this->userID = $userID;

            $this->emptyInputs();
            $this->reservationModel->insertReservation($this->hotel, $this->date_Arr, $this->date_sort, $this->adult, $this->child, $this->room, $this->nbr_room, $this->userID);
            header('Location: /ReservationController/afficheReservation');
        } else {
            header("Location:/Users/hotels?msg=error");
            exit();
        }
    }

}