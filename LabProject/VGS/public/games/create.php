<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {

  // Handle form values sent by new.php

  $game = [];
  $game['Title'] = $_POST['title'] ?? '';
  $game['Genre'] = $_POST['genre'] ?? '';
  $game['FormatOfGame'] = $_POST['format'] ?? '';
  $game['Value'] = $_POST['value'] ?? '';
  $game['Release_Year'] = $_POST['released_date'] ?? '';
  $game['Description'] = $_POST['description'] ?? '';
  $game['isAvailable'] =  $_POST['isAvailable']=="1" ? '1' : '0';
  $game['image'] = $_POST['image'] ?? '';
  $game['ratings'] = $_POST['ratings'] ?? '';
   
   $sql = "INSERT INTO Games ";
    $sql .= "(Title,Genre,Release_Year,Description,FormatOfGame,Value,isAvailable,image,ratings) ";
    $sql .= "VALUES (";
    $sql .= "'" . $game['Title'] . "',";
    $sql .= "'" . $game['Genre'] . "',";
    $sql .= "'" . $game['Release_Year'] . "',";
    $sql .= "'" . $game['Description'] . "',";
    $sql .= "'" . $game['FormatOfGame'] . "',";
    $sql .= "'" . $game['Value'] . "',";
    $sql .= "'" . $game['isAvailable'] . "',";
    $sql .= "'" . $game['image'] . "',";
    $sql .= "'" . $game['ratings'] . "'";
    $sql .= ")";

    if(mysqli_query($db, $sql)) {
        $newID = mysqli_insert_id($db);    
        redirect_to(url_for('./games/show.php?id=' . $newID));
    } else {
      
      echo mysqli_error($db);
      db_disconnect($db);
      //redirect_to(url_for('./games/new.php'));
      
    }
    
}else{
    redirect_to(url_for('./games/index.php'));
}

?>
