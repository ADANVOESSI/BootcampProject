<?php

namespace App\Controllers;
use App\Models\MessageModel;
use \Core\View;

class Contact extends \Core\Controller {

    public $contactModel;

    public $id;
    public $number;
    public $subject;
    public $lname;
    public $email;
    public $message;
    public $passwordConfirm;
    public $result;


    public function contactAction() {
      // echo "Hello from the index action in the Home controller";
      View::render("Users/Contact.php", [
      'name' => 'Eric',
      'colours' => ['red', 'green', 'yellow']
      ]);
    }

  public function aboutAction() {
    View::render("Actuality/about.php");
  }

  public function messageAction() {
    $this->contactModel = new MessageModel();
    
    if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["valider"])) {

      $lname = htmlspecialchars(trim($_POST["lname"])) ;
      $email = htmlspecialchars(trim($_POST["email"])) ;
      $subject = htmlspecialchars(trim($_POST["subject"])) ;
      $number = htmlspecialchars(trim($_POST["number"])) ;
      $message = htmlspecialchars(trim($_POST["message"])) ;
      
      $this->lname = $lname;
      $this->subject = $subject;
      $this->email = $email;
      $this->number = $number;
      $this->message = $message;
                  
      $this->emptyInputs();
      $insert = $this->contactModel->insertMessage($this->lname, $this->subject, $this->email, $this->number, $this->message);

      header("Location:/");
    } 
    else {
      header("Location:/Contact?msg=error");
      exit();
    }

    if(!empty($_POST["valider"])) {
    
      $toEmail = "watsonadanvoessi@gmail.com";
      $mailHeaders = "From: " . $lname . "<". $email .">\r\n";

      if(mail($toEmail, $subject, $message, $mailHeaders)) {
          $mail_msg = "Vos informations de contact ont été reçues avec succés.";
          $type_mail_msg = "success";
      }else{
          $mail_msg = "Erreur lors de l'envoi de l'e-mail.";
          $type_mail_msg = "error";
      }
    }
  }

public function emptyInputs() {
  if(empty($this->lname) || empty($this->subject) || empty($this->email) || empty($this->number) || empty($this->message)){
      header("Location:/register?msg=ChampsVide&lname=$this->lname&lname=$this->number&email=$this->email");
      exit();
  } 
      else{
      return false;
  }
}

  protected function before() {
    // echo "(before)";
  }

  /**
   * After filter
   * 
   * @return void
   */
  protected function after() {
    // echo "(after)";
  }
}
