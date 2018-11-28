<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
if(is_post_request()) {

  // Handle form values sent by new.php

  $staff = [];
  $staff['Name'] = $_POST['name'] ?? '';
  $staff['Role'] = $_POST['role'] ?? '';
  $staff['Pass'] = $_POST['password'] ?? '';
   
   $hashed_password = password_hash($staff['Pass'], PASSWORD_BCRYPT);
   
   $sql = "INSERT INTO Staff ";
    $sql .= "(Name,Role,Pass) ";
    $sql .= "VALUES (";
    $sql .= "'" . $staff['Name'] . "',";
    $sql .= "'" . $staff['Role'] . "',";
    $sql .= "'" . $hashed_password . "'";
    $sql .= ")";

    if(mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);    
        redirect_to(url_for('./staff/index.php'));
    } else {
      
      echo mysqli_error($db);
      db_disconnect($db);
      //redirect_to(url_for('./members/new.php'));
      
    }
    
}else{
    redirect_to(url_for('./staff/index.php'));
}

?>
