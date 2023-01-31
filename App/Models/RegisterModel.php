<?php
namespace App\Models;
use App\Models\Connexion;
use PDO;

class RegisterModel extends Connexion {

    private $connexion;

    private $id;
    private $idg;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $type;


    // Vérification de l'email avant l'ajout ou inscription de l'utilisateur
    public function verify($email) {
        $this->email = $email;
        $connexion = $this->connexion();
        $request = "SELECT * FROM `bd_project`.user WHERE email = ?;";
        $connect = $connexion->prepare($request);
        $connect->execute([$this->email]);
        $result = $connect->fetchAll();
        return $result;
    }



    // Affichage de l'utilisateur niveau administrateur

    public function showUser(){
        $connexion = $this->connexion();
        $requeteUser = "SELECT * FROM user";
        $resultatUser = $connexion->query($requeteUser);
        return $resultatUser;
        
    }


    // Compteur du nombre utilisateur
    
    public function countUser(){
        $connexion = $this->connexion();
        $requeteCount ="SELECT count(*) countUser FROM user";
        $resultatCount=$connexion->query($requeteCount);
        $tabCount = $resultatCount->fetch(PDO::FETCH_ASSOC);
        return $tabCount;
    }


    // Vérification de l'id de l'utilisateur avant l'ajout

    public function verifyId($id) {
        $this->id = $id;
        $connexion = $this->connexion();
        $request = "SELECT * FROM `bd_project`.user WHERE id = ?;";
        $connect = $connexion->prepare($request);
        $connect->execute([$this->id]);
        $result = $connect->fetch();
        return $result;
    }



    // Inscription de l'utilisateur

    public function insertUser($lname, $fname, $email, $password) {
        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->fname = $fname;
        $this->email = $email;
        $this->password = $password;
        $request = "INSERT INTO `bd_project`.user VALUES(NULL, :lname, :fname, 'user', :email, :password)";        
        $connect = $connexion->prepare($request);
        $connect->execute([
            ":lname" => $this->lname,
            ":fname" => $this->fname,
            ":email" => $this->email,
            ":password" => password_hash($this->password, PASSWORD_DEFAULT) 
        ]);
    }



    // Ajout de l'utilisateur par l'administrateur

    public function addUser($lname, $fname, $type, $email, $password) {
        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->fname = $fname;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
        $request = "INSERT INTO `bd_project`.user VALUES(NULL, :lname, :fname, :type, :email, :password)";     
        $connect = $connexion->prepare($request);
        $connect->execute([
            ":lname" => $this->lname,
            ":fname" => $this->fname,
            ":type" => $this->type,
            ":email" => $this->email,
            ":password" => password_hash($this->password, PASSWORD_DEFAULT) 
        ]);
    }


    // Sélection de tous les utilisateurs et leur affichage niveau administrateur

    public static function getUser(){
        $connexion = new Connexion ;
        $conn = $connexion->connexion();      
        $user_email = $_SESSION ['user_email'];
        $select_profile = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
        $select_profile->execute([$user_email]);
        if($select_profile->rowCount() > 0){
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            return $fetch_profile;
        }
        return false;
    }


    // Mise à jour de l'utilisateur par l'administrateur

    public function updateProfile($fname, $lname, $type, $email, $id) {

        $connexion = $this->connexion();
        $this->lname = $lname;
        $this->fname = $fname;
        $this->email = $email;
        $this->id = $id;
        $this->type = $type;
        $sql = "UPDATE `bd_project`.user SET fname = ?, lname = ?, type = ?, email = ? WHERE id = ?";
        $connect = $connexion->prepare($sql);
        $connect->execute([$this->fname,$this->lname,$this->type,$this->email,$this->id]);
    }


    
    // Mise à jour du mot de pass

    public function updatePass($password, $id) {
        $connexion = $this->connexion();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        $this->id = $id;
        $sql = "UPDATE `bd_project`.user SET password = ? WHERE id = ?";
        $update_pass = $connexion->prepare($sql);
        $update_pass->execute([$this->password, $this->id]);
    }


    // Suppression de l'utilisateur

    public function deleteUser($id) {
        $connexion = new Connexion ;
        $conn = $connexion->connexion();
        $request=$conn->prepare('DELETE FROM `user` WHERE id = :id');
        $request->bindParam('id', $_GET['id']);
        $request->execute();
        
    }
   
}