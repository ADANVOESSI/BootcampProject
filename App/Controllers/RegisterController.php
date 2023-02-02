<?php
namespace App\Controllers;
use Core\View;
use App\Models\RegisterModel;
use App\Models\MessageModel;

class RegisterController extends \Core\Controller {

    private $registerModel;

    private $id;
    private $idg;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $passwordConfirm;
    private $result;
    private $type;


    // Vérification d'email avant l'ajout

    public function verifyControl() {
    $this->registerModel = new RegisterModel();
      $res = $this->registerModel->verify($this->email);
      $count = count($res);
       if($count>0) {
        header("Location:/register?msg=UserExistant&lname=$this->lname&fname=$this->fname");
        exit();
        } 
        else {
            $insert = $this->registerModel->insertUser($this->lname, $this->fname, $this->email, $this->password);
            header("Location:/login");
               exit();
        }
    }


    // Vérification des champs vides avant l'ajout

    public function emptyInputs() {
        if(empty($this->lname) || empty($this->fname) || empty($this->email) || empty($this->password) || empty($this->passwordConfirm)){
            header("Location:/Users/register?msg=ChampsVide&lname=$this->lname&lname=$this->fname&email=$this->email");
            exit();
        } 
            else{
            return false;
        }
    }


    // Vérifier si les deux mots de pass sont identiques

    public function verifyPassword() {
        if ($this->password !== $this->passwordConfirm) {
            header("Location:/Users/register?msg=MotDePasseNonIdentique&lname=$this->lname&fname=$this->fname&email=$this->email");
            exit();
       } 
       return false;
    }



    // Vérifier si l'email repond au format normal

    public function verifyEmail() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header("Location:/Users/register?msg=CeUtilisateur Existe&lname=$this->lname");
            exit();
        }
        return false;
    }


    // Function d'insertion avant tout contrôle et vérification

    public function getting() {        
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["submit"])) {

            $lname = htmlspecialchars(trim(ucwords($_POST["lname"])));
            $fname = htmlspecialchars(trim(strtoupper($_POST["fname"])));
            $email = htmlspecialchars(trim($_POST["email"]));
            $password = htmlspecialchars(trim($_POST["password"]));
            $passwordConfirm = htmlspecialchars(trim($_POST["password_confirm"]));
            
            $this->lname = $lname;
            $this->fname = $fname;
            $this->email = $email;
            $this->password = $password;
            $this->passwordConfirm = $passwordConfirm;
                        
            $this->verifyPassword();
            $this->verifyEmail();
            $this->emptyInputs();
            $this->verifyControl();
        } 
        else {
            header("Location:/Users/register.php?msg=error");
            exit();
        }
    }



    public function verifyLoginControl() {
        $this->registermodel = new RegisterModel();
        $result = $this->registermodel->verify($this->email);
        $count = count($result);

       if($count > 0) {
           $password = password_verify($this->password, $result[0]["password"]);

           if($password === true & $result[0]["type"] === "admin") {
                $_SESSION['admin_id'] = $result[0]['id'];
                $connexion = ProfileController::getUser();
                header("Location:/Users/accueil");
                exit();
            } elseif($password === true & $result[0]["type"] !== "admin") {
                $connexion = ProfileController::getUser();

                header("Location:/Users/accueil");
                exit();
            } else {
               header("Location:/Users/login?password_error");
               exit();
           }
        } else {
            header("Location:/Users/login?msg=user_not_found&email=$this->email");
            exit();
        }
    }


    // Affichage des l'utilisateurs côté administrateur

    public function showUser(){
        $this->registermodel = new RegisterModel();
        $resultatUser = $this->registermodel->showUser();
        $tabCount = $this->registermodel->countUser();
        $nbrUser = $tabCount["countUser"];
        require_once('../App/Views/Admin/users.php');
    }




    // Affichage des messages des utilisateurs côté administrateur

    public function showMessage(){
        $this->registerModel = new MessageModel();
        $resultatMessage = $this->registerModel->showMessage();
        $tabCount = $this->registerModel->countMessage();
        $nbrMessage = $tabCount["countM"];
        require_once('../App/Views/Admin/message.php');
    }


    // Authentification pour la connexion

    public function login() {
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["connecter"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            session_start();
            $_SESSION ['user_email']= $email;

            $this->email = $email;
            $this->password = $password;
        
            $this->verifyLoginControl();
        } 
        else {
            header("Location:/Users/login?msg=error");
            exit();
        }
    }



    // Suppression des utilisateurs par l'administrateur

    public function deleteUserAction() {
        $this->registerModel = new RegisterModel();
        
        $this->idg = $_GET['id'];
        if($idg = isset($_GET['id'])){

            $this->registerModel->deleteUser($this->idg);
            echo 'La suppression éffectuée avec succè !';
            
            header('location:/RegisterController/showUser');
        }else{
            echo 'Erreur de suppression';
            header('location:/Admin/index');
        }
    }



    // Mise à jour des utilisateurs par l'administrateur

    public function updateUserAction() {
        $this->registerModel = new RegisterModel();
            
        if(isset($_POST['enregistrer'])){

            $id = $_POST['id'];
            $lname = htmlspecialchars(trim(strtoupper($_POST["lname"])));
            $fname = htmlspecialchars(trim(ucwords($_POST["fname"])));
            $email = htmlspecialchars(trim($_POST["email"]));
            $type = htmlspecialchars(trim($_POST['type']));
            
            $this->lname = $lname;
            $this->fname = $fname;
            $this->email = $email;
            $this->type = $type;
            $this->id = $id;
                
            $request = $this->registerModel->updateProfile($this->fname, $this->lname, $this->type, $this->email, $this->id);

            header('Location:/RegisterController/showUser');

        }
    }

   
    // Changement de mot de pass si oublié et envoie de mail pour la réinitialisation du mot de pass

    public function pwdResetAction() {
        $this->registerModel = new RegisterModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']))
            $this->email = $_POST['email'];
            else
            $this->email = "";
            if ($this->registerModel) {
                $result = $this->registerModel->verify($this->email);
                
                $id = $result['id'];
                $pwd = "1234";
                $result = $this->registerModel->updatePass($pwd, $id);
                $to = $this->email;
                
                $subject = "INITIALISATION DE MOT DE PASSE";

                $txt = "Votre nouveau mot de passe de ERITEL Travel est :$pwd";

                $headers = "From: ERITEL Travel" . "\r\n" . "CC: eriteltechnologie@gmail.com";

                mail($to, $subject, $txt, $headers);
                
                header('Location: /Users/confirmPassWord');
            } else {
                header('Location: /RegisterController/pwdReset?msg=L\'Email est incorrecte!!!');
            }
        }
    }
        
}