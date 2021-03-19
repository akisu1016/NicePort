<?php
include 'Database.php';

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
        http_response_code(301);
        header("Location: ./index.php");
        exit;
      } else {
        echo "failed";
      }
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

  public function register_user($user_name, $user_profile, $mail_address, $password, $added_date)
  {
    if ($this->check_user($mail_address)) {
      $sql = "INSERT INTO users(user_name, user_profile, mail_address, password, added_date) VALUES('$user_name', '$user_profile', '$mail_address', '$password', '$added_date')";

      $result = $this->conn->query($sql);

      if ($result == TRUE) {
        http_response_code(301);
        header("Location: ./login.php");
        exit;
      } else {
        die('ERROR: ' . $this->conn->error);
      }
    } else {
    }
  }

  // public function display_books()
  // {
  //   $sql = "SELECT * FROM books";
  //   $result = $this->conn->query($sql);

  //   if ($result->num_rows > 0) {
  //     $container = array();
  //     while ($row = $result->fetch_assoc()) {
  //       $container[] = $row;
  //     }
  //     return $container;
  //   } else {
  //     return FALSE;
  //   }
  // }

  // public function delete_book($id)
  // {
  //   $sql = "DELETE FROM books WHERE book_id = '$id'";
  //   $return = $this->conn->query($sql);

  //   if ($return == TRUE) {
  //     header('location.Read.php');
  //   } else {
  //     die('ERROR: ' . $this->conn->error);
  //   }
  // }

  // public function get_one_data($id)
  // {
  //   $sql = "SELECT * FROM books WHERE book_id = '$id'";
  //   $result = $this->conn->query($sql);

  //   if ($result == FALSE) {
  //     echo "no data found";
  //   } else {
  //     return $result->fetch_assoc();
  //   }
  // }

  // public function update_book($id, $bkName, $bkGenre, $bkAuthor, $bk_date)
  // {

  //   $sql = "UPDATE books SET book_name = '$bkName', book_genre = '$bkGenre', book_author = '$bkAuthor', date_added = '$bk_date' WHERE book_id = '$id'";

  //   $result = $this->conn->query($sql);

  //   if ($result == TRUE) {
  //     echo "book update succcesfully";
  //   } else {
  //     die('ERROR: ' . $this->conn->error);
  //   }
  // }
}
