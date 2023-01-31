<?php

namespace App\Controllers;
use App\Models\RegisterModel;

class ProfileController{ 

        public $connexion;

        public static function getUser(){

            $connexion = RegisterModel::getUser();

            $_SESSION ['user_id']= $connexion['id'];
            $_SESSION ['user_lname'] = $connexion['lname'];
            $_SESSION ['user_fname'] = $connexion['fname'];
            $_SESSION ['user_email'] = $connexion['email'];
            $_SESSION ['user_type'] = $connexion['type'];
            $_SESSION ['user_image'] = $connexion['image'];
            

            if ($connexion === false) {
                echo 'Aucune donnée recupérer';
            }
          
        }
}
