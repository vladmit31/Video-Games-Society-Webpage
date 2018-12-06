<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$id = $_GET['id'] ?? '1'; // PHP > 7.0
if(is_post_request()) {

  $ban = [];
  $ban['Reason'] = $_POST['reason'] ?? '';
  $ban['Start'] = $_POST['start'] ?? '';
  $ban['End'] = $_POST['end'] ?? '';
    
    $sql = "INSERT INTO Bans ";
    $sql .= "(Rental_ID, Reason, Start_Date, End_Date)";
    $sql .= "VALUES(";
    $sql .= "" . $id . ", ";
    $sql .= "'" . $ban['Reason'] . "', ";
    $sql .= "'" . $ban['Start'] . "', ";
    $sql .= "'" . $ban['End'] . "' ";
    $sql .= ")";


    $result = mysqli_query($db, $sql);

    if($result) {
      mysqli_free_result($result);
      redirect_to(url_for('./rentals/index.php') );
    } else {
      // UPDATE failed
      mysqli_free_result($result);
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
    
}

    $sql = "SELECT * FROM Rentals ";
    $sql.= "WHERE Rental_ID ='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $rental = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<br>
<h3>New Ban</h3>
<hr/>

<form action="<?php echo url_for('./rentals/newBan.php?id='. h(u($rental['Rental_ID'])) ); ?>" method="post">
    <div class="form-row">
   
   <div class="form-group col-md-5">
      <label for="reason">Reason*</label>
      <textarea class="form-control" name="reason" rows="5" cols="100" method="post" required></textarea>
    </div>
   </div>
   
   <div class="form-row">
   <div class="form-group col-md-3">
      <label for="start">Start Date*</label>
      <input type="date" class="form-control" name="start" placeholder="Start Date" required method="post">
    </div>
  
  <div class="form-group col-md-3">
      <label for="enddate">End Date</label>
      <input type="date" class="form-control" name="end" placeholder="End Date" required method="post">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Ban</button>
</form>

<hr/>


<?php include(SHARED_PATH . '/footer.php'); ?>