<?php
namespace App\Controllers;
use Core\View;
use App\Models\guideModel;

class GuideController extends \Core\Controller {


    private $guideModel;
    private $id;
    private $fname;
    private $lname;
    private $civilite;
    private $niveau;
    private $idg;
    private $idGuide;
    

    
    public function emptyInputs() {
        if(empty($this->lname) || empty($this->niveau)){
            header("Location:/GuideController/guideAdd?msg=ChampsVide&lname=$this->lname&lname=$this->niveau");
            exit();
        } 
            else{
            return false;
        }
    }
    

    // Insertion de guide par l'administrateur

    public function getting() {
        if($_SERVER["REQUEST_METHOD"] === "POST" & isset($_POST["envoyer"])) {
            $this->guideModel = new GuideModel();
            $lname =htmlspecialchars(strip_tags(trim($_POST["lname"])));
            $niveau = $_POST["niveau"];
            $this->lname = $lname;
            $this->niveau = $niveau;
            $this->emptyInputs();
            $this->guideModel->insertGuide($this->lname, $this->niveau);
            header('Location:/GuideController/showGuid');
        } 
        else {
            header("Location:/GuideController/guideAdd?msg=error");
            exit();
        }
    }


    public function guideAddAction() {
      View::render("Admin/add_guide.php");
    }



    // Affichage de guide (Niveau administrateur)

    public function showGuid() {
        $this->guideModel = new GuideModel();
        $resultatG = $this->guideModel->showGuide();
        $count = $this->guideModel->countGuid();
        $nbrGuide = $count["countG"]; 
        require_once('../App/Views/Admin/guide.php');
    }


    // Suppression du guide (Niveau administrateur)

    public function deleteGuideAction() {
        $this->guideModel = new GuideModel();
        
        $this->idGuide = $_GET['idGuide'];
        if($idGuide = isset($_GET['idGuide'])){

            $this->guideModel->deleteGuide($this->idGuide);
            echo 'La suppression éffectuée avec succè !';
            
            header('Location:/GuideController/showGuid');
        }else{
            echo 'Erreur de suppression';
            header('location:/Admin/index');
        }
    }


    // Mise à jour du guide

    public function updateGuideAction() {
        $this->guideModel = new GuideModel();            
        if(isset($_POST['enregistrer'])){

            $idGuide = $_POST['id'];
            $lname = htmlspecialchars(trim(ucwords($_POST["lname"])));
            $niveau = htmlspecialchars(trim($_POST['niveau']));
            
            $this->lname = $lname;
            $this->niveau = $niveau;
            $this->idGuide = $idGuide;
                
            $request = $this->guideModel->updateGuide($this->lname, $this->niveau, $this->idGuide);
            header('Location:/GuideController/showGuid');

        }
    }
    
}