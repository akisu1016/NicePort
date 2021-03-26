<?php
include_once 'Database.php';

class Users extends Database
{

  public function login_user($mail_address, $password)
  {
    session_start();
    $sql = "SELECT * FROM users WHERE mail_address = '$mail_address'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $container = array();
      while ($row = $result->fetch_assoc()) {
        $container[] = $row;
      }

      if (password_verify($password, $container[0]['password'])) {
        $_SESSION['user_id'] = $container[0]['user_id'];
        $_SESSION['user_name'] = $container[0]['user_name'];
        return 1;
      } else {
        return 2;
      }
    } else {
      return 3;
    }
  }

  public function logout_user()
  {
    session_start();
    $_SESSION = array();
    session_destroy();
    http_response_code(301);
    header("Location: ./index.php");
    exit;
  }


  public function check_user($mail_address)
  {
    $sql = "SELECT * FROM users WHERE mail_address = '$mail_address'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function get_user($user_id)
  {
    $sql = "SELECT user_id, user_name, user_icon, user_profile, mail_address From users WHERE user_id = '$user_id'";

    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $container = array();
      while ($row = $result->fetch_assoc()) {
        $container[] = $row;
      }
      return $container;
    } else {
      return FALSE;
    }
  }

  public function register_user($user_name, $user_icon, $user_profile, $mail_address, $password, $added_date)
  {

    $user_name = $this->conn->real_escape_string($user_name);
    $user_profile = $this->conn->real_escape_string($user_profile);

    if ($this->check_user($mail_address)) {
      $sql = "INSERT INTO users(user_name, user_icon, user_profile, mail_address, password, added_date) VALUES('$user_name', '$user_icon', '$user_profile', '$mail_address', '$password', '$added_date')";

      $result = $this->conn->query($sql);

      if ($result == TRUE) {
        header("Location: ./login.php");
        exit;
      } else {
        die('ERROR: ' . $this->conn->error);
      }
    } else {
    }
  }

  public function edit_user($user_name, $user_icon, $user_profile, $mail_address, $user_id)
  {
    $user_name = $this->conn->real_escape_string($user_name);
    $user_profile = $this->conn->real_escape_string($user_profile);

    $sql = "UPDATE users SET user_name = '$user_name', user_icon = '$user_icon', user_profile = '$user_profile', mail_address = '$mail_address' WHERE user_id = '$user_id'";

    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to update user' . $this->conn->error);
      return FALSE;
    } else {
      echo "success";
      return TRUE;
    }
  }
}
