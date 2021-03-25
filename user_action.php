<?php

include "classes/users.php";
$user_obj = new Users;

if (isset($_POST["Login_user"])) {
  $email = $_POST["email"];
  $pass = $_POST['pass'];

  $flg = $user_obj->login_user($email, $pass);

  if ($flg === 1) {
    header("Location: ./index.php", 301);
    exit;
  } elseif ($flg === 2) {
    header("Location: ./login.php?error=p", 301);
  } else {
    header("Location: ./login.php?error=e", 301);
    exit;
  }
}

if (isset($_POST["Registration_user"])) {

  $name = $_POST["name"];
  $profile = $_POST["profile"];
  $email = $_POST["email"];
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
  $date = date("Y-m-d");
  $user_icon = "";

  if (is_uploaded_file($_FILES["user_icon"]["tmp_name"])) {
    $filename = $_FILES['user_icon']['name'];
    $target_dir = 'uploads/icons/';
    $target_file = $target_dir . basename($filename);

    move_uploaded_file($_FILES['user_icon']['tmp_name'], $target_file);
    $user_icon = $target_file;
  }

  $user_obj->register_user($name, $user_icon, $profile, $email, $pass, $date);
}

if (isset($_POST["edit_user"])) {
  $name = $_POST["user_name"];
  $profile = $_POST["user_profile"];
  $email = $_POST["mail_address"];
  $user_id = $_POST["user_id"];
  $user_icon = "";

  if (is_uploaded_file($_FILES["user_icon"]["tmp_name"])) {
    $filename = $_FILES['user_icon']['name'];
    $target_dir = 'uploads/icons/';
    $target_file = $target_dir . basename($filename);

    move_uploaded_file($_FILES['user_icon']['tmp_name'], $target_file);
    $user_icon = $target_file;
  }

  $result = $user_obj->edit_user($name, $user_icon, $profile, $email, $user_id);

  echo $result;
  exit;
}

if (isset($_GET['logout'])) {
  $user_obj->logout_user();
}
