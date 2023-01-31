<?php
namespace App\Controllers;
use Core\View;
use App\Models\RegisterModel;

class AddUserController extends \Core\Controller {

    /**
     * $registerModel
     */
    public $registerModel;

    public $id;
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $type;
    
    /**
     * sanitaze()
     */
    public function sanitaze($data) {
        $reg = preg_replace("/\s+/", " ", $data);

        $reg = preg_replace("/^\s*/", "", $reg);
        $data = $reg;
        return $data;
    }

    public function userAddAction() {
        View::render("Admin/add_user.php");
      }

    /**
     * verifyControl()
     */
    public function verifyControl() {
    $this->registerModel = new RegisterModel();
      $res = $this->registerModel->verify($this->email);
      $count = count($res);
       if($count>0) {
        header("Location:/Users/addUser?msg=UserExistant&lname=$this->lname&fname=$this->fname");
        exit();
        } 
        else {
            $insert = $this->registerModel->addUser($this->lname, $this->fname, $this->type, $this->email, $this->password);
            header("Location:/RegisterController/showUser");
               exit();
        }
    }

    public function emptyInputs() {

        if(empty($this->lname) || empty($this->fname) || empty($this->type) || empty($this->email) || empty($this->password)){
            header("Location:/Users/addUser?msg=ChampsVide&lname=$this->lname&lname=$this->fname&type=$this->type&email=$this->email");
            exit();
        } 
            else{
            return false;
        }

    }

    /**
     * verifyPassword()
     */
    public function verifyPassword() {
        
        if ($this->password !== $this->passwordConfirm) {
            header("Location:/register?msg=MotDePasseNonIdentique&lname=$this->lname&fname=$this->fname&email=$this->email");
            exit();
       } 
       return false;

    }

    /**
     * verifyEmail()
     */
    public function verifyEmail() {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            header("Location:/register?msg=CeUtilisateur Existe&lname=$this->lname");
            exit();
        }
        return false;
        
    }
    
    /**
     * getting()
     */
    public function getting() {

        
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["submit"])) {

            $fname = htmlspecialchars(trim(strtoupper($_POST["lname"])));
            $lname = htmlspecialchars(trim(ucwords($_POST["fname"])));
            $email = htmlspecialchars(trim($_POST["email"])) ;
            $type = $_POST["type"];
            $password = htmlspecialchars(trim($_POST["password"])) ;
            
            $this->lname = $lname;
            $this->fname = $fname;
            $this->type = $type;
            $this->email = $email;
            $this->password = $password;
            echo $lname.$fname.$email;
                        
            $this->verifyEmail();
            $this->emptyInputs();
            $this->verifyControl();
        } 
        else {
            header("Location:/register.php?msg=error");
            exit();
        }
    }

    public function verifyLoginControl() {
        $this->registermodel = new RegisterModel();
        $result = $this->registermodel->verify($this->email);
        $count = count($result);

       if($count>0) {
           $password = password_verify($this->password, $result[0]["password"]);

           if($password === true & $result[0]["type"] === "admin") {
            //    session_start();
                $_SESSION['admin_id'] = $result[0]['id'];
                $connexion = ProfileController::getUser();
                //    header("Location:/admin_home?msg=dashboard_admin");
                header("Location:/Admin/index?msg=Page admin");
                exit();
            } 
            
            elseif($password === true & $result[0]["type"] !== "admin") {
                $connexion = ProfileController::getUser();

                header("Location:/Users/hotels");
                exit();
            }

             else {
                $message= 'password_error';
               
               header("Location:/Users/login?");
               exit();
           }
        } 
        else {
            header("Location:/login?msg=user_not_found&email=$this->email");
            exit();
        }
    }

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
            header("Location:/login?msg=error");
            exit();
        }
    }

    /**
     * verifyControl()
     */
    public function deleteUserAction() {
        
        if($id = isset($_GET['id'])){

            $this->deleteUser($id);

            echo 'La suppression éffectuée avec succè !';
           
            header('location:/Admin/users');
        }else{
            echo 'Erreur de suppression';
            header('location:/Admin/index');
        }
    }
    
}