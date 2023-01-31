<?php
namespace App\Controllers;
use Core\View;
use App\Models\TouristeModel;

class TouristeController extends \Core\Controller {

    private $touristeModel;

    private $id;
    private $fname;
    private $lname;
    private $civilite;
    private $image;
    private $idg;
    

    public function emptyInputs() {

        if(empty($this->lname) || empty($this->fname) || empty($this->civilite)){
            header("Location:/TouristeController/addTourist?msg=ChampsVide&lname=$this->lname&lname=$this->fname&email=$this->civilite");
            exit();
        } else{
            return false;
        }
    }


    // Affichage du touriste

    public function showTourist() {
        $this->touristeModel = new TouristeModel();
        $resultatTourisme = $this->touristeModel->showTourist();
        $tabCount = $this->touristeModel->countTourist();
        $nbrTouriste = $tabCount["countT"]; 
        require_once('../App/Views/Admin/tourism.php');
    }
    


    // Insertion du touriste

    public function getting() {

        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["envoyer"])) {
            $this->touristeModel = new TouristeModel();
            $lname = $_POST["lname"];
            $fname = $_POST["fname"];
            $civilite = $_POST["civilite"];
            $idg = $_POST["idg"];
            
            $this->lname = $lname;
            $this->fname = $fname;
            $this->civilite = $civilite;
            $this->idg = $idg;
            $this->emptyInputs();
            $this->touristeModel->insertTouriste($this->lname, $this->fname, $this->civilite, 'User.png', $this->idg);
            header('Location: /TouristeController/showTourist');
        } 
        else {
            header("Location:/TouristeController/addTourist?msg=error");
            exit();
        }
    }



    public function addTouristAction() {
      View::render("Admin/add_tourist.php");
    }



    // Suppression du touriste par l'administrateur

    public function deleteTouristeAction() {
        $this->touristeModel = new TouristeModel();
        $this->id = $_GET['id'];
        if($id = isset($_GET['id'])){
            $this->touristeModel->deleteTouriste($this->id);
            header('Location:/TouristeController/showTourist');

        }else{
            echo 'Erreur de suppression';
            header('location:/TouristeController/showTourist?msg=Erreur de suppression');
        }
    }


    // Mise à jour du touriste par l'administrateur

    public function updateTouristAction() {
        $this->touristeModel = new TouristeModel();
        if(isset($_POST['enregistrer'])){

            $id = $_POST['id'];
            $lname = htmlspecialchars(trim(strtoupper($_POST["lname"])));
            $fname = htmlspecialchars(trim($_POST["fname"]));
            $email = htmlspecialchars(trim($_POST["email"]));
            $civilite = htmlspecialchars(trim($_POST['civilite']));
            
            $this->lname = $lname;
            $this->fname = $fname;
            $this->email = $email;
            $this->civilite = $civilite;
            $this->id = $id;

            $request = $this->touristeModel->updateTouriste($this->lname, $this->fname, $this->civilite, $this->id);
            header('Location:/TouristeController/showTourist');
        }
    }
    
}