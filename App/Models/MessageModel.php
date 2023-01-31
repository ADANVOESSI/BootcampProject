<?php
namespace App\Models;
use App\Models\Connexion;
use PDO;

class MessageModel extends Connexion {

  public $connexion;

    public $id;
    public $message;
    public $number;
    public $lname;
    public $email;
    public $subject;
    public $type;

  public static function getAll() {
    
  }

  public function insertMessage($lname, $subject, $email, $number, $message) {
    $connexion = $this->connexion();
    $this->lname = $lname;
    $this->subject = $subject;
    $this->email = $email;
    $this->number = $number;
    $this->message = $message;
    $request = "INSERT INTO `bd_project`.message VALUES(NULL, :name, :object, :email, :number, :message)";        
    $connect = $connexion->prepare($request);
    $connect->execute([
      ":name" => $this->lname,
      ":object" => $this->subject,
      ":email" => $this->email,
      ":number" => $this->number,
      ":message" => $this->message]);
  }


  // Affichage de tous les messages dans la base de données côté administrateur
  public function showMessage()
  {
      $connexion = new Connexion ;
      $conn = $connexion->connexion();
      $requeteMessage =  "SELECT * FROM message ";

      $resultatMessage = $conn->query($requeteMessage);
      return $resultatMessage;
  }

  
  // Compteur de tous les messages dans la base de données

  public function countMessage(){
      $connexion = new Connexion ;
      $conn = $connexion->connexion();

      $requeteCount ="SELECT count(*) countM FROM message";   
      $resultatCount=$conn->query($requeteCount);
      $tabCount = $resultatCount->fetch(PDO::FETCH_ASSOC);
      return $tabCount;
  }

}