<?php

include "classes/works.php";
$work_obj = new Works;
date_default_timezone_set('Asia/Tokyo');

if (isset($_POST['UpLoad_works'])) {

  session_start();

  $title = $_POST["title"];
  $detail = $_POST["detail"];
  $category = $_POST["category"];
  $user_id = $_SESSION['user_id'];
  $date = date("Y-m-d");

  $work_id = $work_obj->upload_works($title, $detail, $category, $user_id, $date);

  if (isset($_FILES["userfile"])) {
    for ($i = 0; $i < count($_FILES["userfile"]["name"]); $i++) {
      if (is_uploaded_file($_FILES["userfile"]["tmp_name"][$i])) {
        $filename = $_FILES['userfile']['name'][$i];
        $target_dir = 'uploads/';
        $target_file = $target_dir . basename($filename);

        move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $target_file);
        // $work_obj->resize_picture($target_file);
        $work_obj->insert_works_pictures($work_id, $work_obj->upload_picture($filename));
      }
    }
  }

  header('location:index.php');
}

if (isset($_POST['upload_comment'])) {
  session_start();
  $work_id = $_GET['work_id'];
  $user_id = $_SESSION['user_id'];
  $value = $_POST["comment"];
  $date = date("Y-m-d H:i:s");

  $comment_id = $work_obj->upload_comments($value, $date, $user_id);
  $work_obj->insert_works_comments($work_id, $comment_id);

  header("location:work_detail.php?work_id=$work_id");
}

if (isset($_POST['count'])) {
  $work_id = $_POST["work_id"];
  $count = $_POST['count'];
  $count++;

  $work_obj->countup_nice($work_id);
  echo $count;
  exit;
}

if (isset($_POST['edit_work'])) {
  $work_id = $_POST["work_id"];
  $category = $_POST["edit_category"];
  $title = $_POST["edit_title"];
  $detail = $_POST["edit_detail"];

  $result = $work_obj->update_works_detail($work_id, $title, $detail, $category);

  echo $result;
  exit;
}

if (isset($_POST['delete_work'])) {
  $work_id = $_POST["work_id"];

  $result = $work_obj->delete_works($work_id);

  echo $result;
  exit;
}
