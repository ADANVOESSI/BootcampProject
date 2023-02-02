<?php

namespace App\Controllers;

use \Core\View;

class Users extends \Core\Controller {
  
  public function accueilAction() {
    View::render("Users/Accueil.php");
  }

  public function aboutAction() {
    View::render("Users/About.php");
  }

  public function contactAction() {
    View::render("Users/Contact.php");
  }

  public function siteAction() {
    View::render("Users/Sites.php");
  }

  public function registerAction() {
    View::render("Users/register.php");
  }

  public function pwdResetAction() {
    View::render("Users/pwdReset.php");
  }

  public function confirmPassWordAction() {
    View::render("Users/confirmPassWord.php");
  }

  
  public function tourismAction() {
    View::render("Admin/tourism.php");
  }

  public function guideAction() {
    View::render("Admin/guide.php");
  }
  
  public function userAction() {
    View::render("Admin/users.php");
  }

  public function addUserAction() {
    View::render("Admin/add_user.php");
  }

  public function deleteUserAction() {
    View::render("Admin/delete_user.php");
  }

  public function editAction() {
    View::render("Admin/edit_user.php");
  }

  public function editTourismAction() {
    View::render("Admin/edit_tourist.php");
  }
  
  public function hotelsAction() {
    View::render("Users/hotels.php");
  }

  public function modifyGuidAction() {
    View::render("Admin/edit_guide.php");
  }
  
  public function loginAction() {
    View::render("Users/login.php");
  }

  public function logoutAction() {
    View::render("Users/logout.php");
  }
  
  public function sitesAction() {
    View::render("Users/Sites.php");
  }

  public function reservationAction() {
    View::render("Admin/reservation.php");
  }

  public function notificationAction() {
    View::render("Users/notification.php");
  }

  protected function before() {

  }

  protected function after() {

  }
}
