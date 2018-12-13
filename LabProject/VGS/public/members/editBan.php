<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$id = $_GET['id'] ?? '1'; // PHP > 7.0
if(is_post_request()) {

  $ban = [];
  $ban['Reason'] = mysqli_real_escape_string($db,$_POST['reason']) ?? '';
  $ban['Start'] = mysqli_real_escape_string($db,$_POST['start']) ?? '';
  $ban['End'] = mysqli_real_escape_string($db,$_POST['end']) ?? '';

    $sql = "UPDATE Bans SET ";
    $sql .= "Reason='" . $ban['Reason'] . "', ";
    $sql .= "Start_Date='" . $ban['Start'] . "', ";
    $sql .= "End_Date='" . $ban['End'] . "' ";
    $sql .= "WHERE Ban_ID='" . $id . "'";

    $result = mysqli_query($db, $sql);

    if($result) {
      mysqli_free_result($result);
      redirect_to(url_for('./members/index.php') );
    } else {
      // UPDATE failed
      mysqli_free_result($result);
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

    
}

    $sql = "SELECT * FROM Bans ";
    $sql.= "WHERE Ban_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $ban = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<br>
<h3>Edit Ban</h3>
<hr/>

<form action="<?php echo url_for('./members/editBan.php?id= '. h(u($ban['Ban_ID'])) ); ?>" method="post">
  <div class="form-row">
   
   <div class="form-group col-md-5">
      <label for="name">Reason*</label>
      <textarea class="form-control" name="reason" rows="5" cols="100" method="post" required><?php echo h($ban['Reason']);  ?></textarea>
    </div>
   </div>
   
   <div class="form-row">
   <div class="form-group col-md-3">
      <label for="tel">Start Date*</label>
      <input type="date" class="form-control" name="start" placeholder="Start Date" value="<?php echo h($ban['Start_Date']); ?>" required method="post">
    </div>
  
  <div class="form-group col-md-3">
      <label for="enddate">End Date</label>
      <input type="date" class="form-control" name="end" placeholder="End Date" value="<?php echo h($ban['End_Date']); ?>" required method="post">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>


<?php include(SHARED_PATH . '/footer.php'); ?>