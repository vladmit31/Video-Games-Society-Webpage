<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
if(is_post_request()) {

  // Handle form values sent by new.php
  $rentals = [];
  $rentals['member'] = $_POST['member'] ?? '';
  $rentals['game'] = $_POST['game'] ?? '';
  $rentals['start'] = $_POST['start'] ?? '';
  $rentals['end'] = $_POST['end'] ?? '';
  $rentals['extension'] = $_POST['extension']=="1" ? '1' : '0';
    
    $resultM = find_member_by_name($rentals['member']);
    $memberID = mysqli_fetch_assoc($resultM);
    
    $resultG = find_game_by_title($rentals['game']);
    $gameID = mysqli_fetch_assoc($resultG);

   $sql = "INSERT INTO Rentals ";
    $sql .= "(Member_ID,Game_ID,Start_Date, Returned_Date,Extension_Made) ";
    $sql .= "VALUES (";
    $sql .= "" . $memberID['Member_ID'] . ",";
    $sql .= "" . $gameID['Game_ID'] . ",";
    $sql .= "'" . $rentals['start'] . "',";
    $sql .= "'" . $rentals['end'] . "',";
    $sql .= "'" . $rentals['extension'] . "'";
    $sql .= ")";

    if(mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);    
        redirect_to(url_for('./rentals/index.php'));
    } else {
      
      echo mysqli_error($db);
      db_disconnect($db);
      //redirect_to(url_for('./members/new.php'));
      
    }
    
}else{
    redirect_to(url_for('./rentals/index.php'));
}

?>
