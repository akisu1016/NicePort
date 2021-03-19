<?php

class Database
{
  private  $serever_name = "localhost";
  private  $user_name = "root";
  private  $password = "";
  private  $db_name = "nice_port";
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->serever_name, $this->user_name, $this->password, $this->db_name);

    if ($this->conn->connect_error) {
      echo "ERROR: connecting to database failed";
    } else {
      return $this->conn;
    }
  }
}
