<?php
include 'Database.php';

class Works extends Database
{

  function upload_picture($filename)
  {

    $filename = $this->conn->real_escape_string($filename);
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($filename);
    //a simple updating query for img
    $sql = "INSERT INTO pictures(picture_url) VALUES('$target_file')";
    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('unable to upload photo' . $this->conn->connect_error);
    } else {
      return $this->conn->insert_id;
    }
  }

  function selest_picture($filename)
  {
    $filename = $this->conn->real_escape_string($filename);
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($filename);

    $sql = "SELECT picture_id FROM pictures WHERE picture_url = '$target_file'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $container = array();
      while ($row = $result->fetch_assoc()) {
        $container[] = $row;
      }
      return $container[0]['picture_id'];
    } else {
      return 0;
    }
  }

  function upload_works($title, $detail, $category, $user_id, $date)
  {

    $sql = "INSERT INTO works(work_title, detail, category_id, user_id, nice, added_date) VALUES('$title', '$detail', '$category', '$user_id', 0, '$date')";
    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to upload works' . $this->conn->error);
    } else {
      echo "successfull";
      return $this->conn->insert_id;
    }
  }

  function insert_works_pictures($work_id, $picture_id)
  {
    $sql = "INSERT INTO works_pictures(work_id, picture_id) VALUES('$work_id', '$picture_id')";
    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to upload works' . $this->conn->error);
    } else {
      echo "successfull";
    }
  }

  function display_works()
  {
    $sql = "SELECT works.work_id, works.work_title, works.detail, pictures.picture_url, categories.category_name, works.user_id, users.user_name FROM works LEFT OUTER JOIN works_pictures ON works.work_id = works_pictures.work_id LEFT OUTER JOIN pictures ON works_pictures.picture_id = pictures.picture_id INNER JOIN categories ON works.category_id = categories.category_id INNER JOIN users ON works.user_id = users.user_id GROUP BY works.work_id ORDER BY works.work_id DESC";

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

  function search_works($search_word)
  {
    $search_word = $this->conn->real_escape_string($search_word);
    $sql = "SELECT works.work_id, works.work_title, works.detail, pictures.picture_url, categories.category_name, works.user_id, users.user_name FROM works LEFT OUTER JOIN works_pictures ON works.work_id = works_pictures.work_id LEFT OUTER JOIN pictures ON works_pictures.picture_id = pictures.picture_id INNER JOIN categories ON works.category_id = categories.category_id INNER JOIN users ON works.user_id = users.user_id WHERE works.work_title LIKE '%$search_word%' GROUP BY works.work_id ORDER BY works.work_id DESC";

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

  function display_works_detail($work_id)
  {
    $sql = "SELECT works.work_id, works.work_title, works.detail, pictures.picture_url, categories.category_name, works.user_id, users.user_name, works.nice, works.added_date FROM works LEFT OUTER JOIN works_pictures ON works.work_id = works_pictures.work_id LEFT OUTER JOIN pictures ON works_pictures.picture_id = pictures.picture_id INNER JOIN categories ON works.category_id = categories.category_id INNER JOIN users ON works.user_id = users.user_id WHERE works.work_id = '$work_id'";

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

  function update_works_detail($work_id, $title, $detail, $category)
  {
    $sql = "";

    if ($category == 0) {
      $sql = "UPDATE works SET work_title = '$title', detail = '$detail' WHERE work_id = '$work_id'";
    } else {
      $sql = "UPDATE works SET work_title = '$title', detail = '$detail', category_id = '$category' WHERE work_id = '$work_id'";
    }

    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to update nice' . $this->conn->error);
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function display_users_works($user_id)
  {
    $sql = "SELECT works.work_id, works.work_title, works.detail, pictures.picture_url, categories.category_name, works.user_id, users.user_name, works.nice, works.added_date FROM works LEFT OUTER JOIN works_pictures ON works.work_id = works_pictures.work_id LEFT OUTER JOIN pictures ON works_pictures.picture_id = pictures.picture_id INNER JOIN categories ON works.category_id = categories.category_id INNER JOIN users ON works.user_id = users.user_id WHERE works.user_id = '$user_id' ORDER BY works.work_id DESC";

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

  function upload_comments($comment_value, $date, $user_id)
  {
    $comment_value = $this->conn->real_escape_string($comment_value);
    $sql = "INSERT INTO comments(comment_value, comment_date, user_id) VALUES('$comment_value', '$date', '$user_id')";
    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to upload works' . $this->conn->error);
    } else {
      echo "successfull";
      return $this->conn->insert_id;
    }
  }

  function insert_works_comments($work_id, $comment_id)
  {
    $sql = "INSERT INTO works_comments(work_id, comment_id) VALUES('$work_id', '$comment_id')";
    $result = $this->conn->query($sql);

    echo $sql;

    if ($result == FALSE) {
      die('failed to upload works' . $this->conn->error);
    } else {
      echo "successfull";
    }
  }

  function display_works_comments($work_id)
  {
    $sql = "SELECT comments.comment_id, comments.comment_value, comments.comment_date, comments.user_id, users.user_name FROM comments, works_comments, users WHERE works_comments.comment_id = comments.comment_id AND comments.user_id = users.user_id AND works_comments.work_id = '$work_id'";

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

  function resize_picture($filename)
  {
    list($width, $hight) = getimagesize($filename);
    $baseImage = imagecreatefromjpeg($filename);
    $image = imagecreatetruecolor(100, 100);


    imagecopyresampled($image, $baseImage, 0, 0, 0, 0, 800, 600, $width, $hight);

    imagejpeg($image, $filename);
  }

  function list_categories()
  {
    $sql = "SELECT category_name From categories;";

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

  function countup_nice($work_id)
  {
    $sql = "UPDATE works SET nice = nice + 1 WHERE work_id = '$work_id'";
    $result = $this->conn->query($sql);

    if ($result == FALSE) {
      die('failed to update nice' . $this->conn->error);
    } else {
      return;
    }
  }
}
