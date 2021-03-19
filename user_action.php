<?php

include "classes/users.php";
$user_obj = new Users;

if (isset($_POST["Login_user"])) {
  $email = $_POST["email"];
  $pass = $_POST['pass'];

  $user_obj->login_user($email, $pass);
}

if (isset($_POST["Registration_user"])) {
  // $id = $_POST["id"];
  $name = $_POST["name"];
  $profile = $_POST["profile"];
  $email = $_POST["email"];
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $date = date("Y-m-d");

  $user_obj->register_user($name, $profile, $email, $pass, $date);
}

if (isset($_GET['logout'])) {
  $user_obj->logout_user();
}
