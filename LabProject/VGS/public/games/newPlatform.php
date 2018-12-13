<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php require_Secretary_login(); ?>

<!--Create a new platform and stores it inside the Constants table-->

<?php
if(is_post_request()) {

  // Handle form values sent by new.php

  $platform = [];
  $platform['new'] = mysqli_real_escape_string($db,$_POST['new']) ?? '';

   $sql = "INSERT INTO Constants ";
    $sql .= "(Platform) ";
    $sql .= "VALUES (";
    $sql .= "'" . $platform['new'] . "'";
    $sql .= ")";

    if(mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);    
        redirect_to(url_for('./games/platforms.php'));
    } else {
      
      echo mysqli_error($db);
      db_disconnect($db);
      //redirect_to(url_for('./games/new.php'));
      
    }
    
}else{
    redirect_to(url_for('./games/platforms.php'));
}

?>
