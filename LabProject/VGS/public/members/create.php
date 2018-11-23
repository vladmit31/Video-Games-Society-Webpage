<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
if(is_post_request()) {

  // Handle form values sent by new.php

  $member = [];
  $member['Name'] = $_POST['name'] ?? '';
  $member['Tel'] = $_POST['tel'] ?? '';
  $member['Email'] = $_POST['email'] ?? '';
  $member['Extensions_Made'] = $_POST['extensions_made'] ?? '';
   
   $sql = "INSERT INTO Members ";
    $sql .= "(Name,Tel,Email,Extensions_Made) ";
    $sql .= "VALUES (";
    $sql .= "'" . $member['Name'] . "',";
    $sql .= "'" . $member['Tel'] . "',";
    $sql .= "'" . $member['Email'] . "',";
    $sql .= "'" . $member['Extensions_Made'] . "',";
    $sql .= ")";

    if(mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);    
        redirect_to(url_for('./members/index.php'));
    } else {
      
      echo mysqli_error($db);
      db_disconnect($db);
      //redirect_to(url_for('./members/new.php'));
      
    }
    
}else{
    redirect_to(url_for('./members/index.php'));
}

?>
