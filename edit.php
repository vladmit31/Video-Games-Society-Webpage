<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
$id = $_GET['id'] ?? ''; // PHP > 7.0
if($id == '')  redirect_to(url_for('./rentals/index.php') );
if(is_post_request()) {

  $rental = [];
  $rental['Member_ID'] = $_POST['member_id'] ?? '';
  $rental['Game_ID'] = $_POST['game_id'] ?? '';
  $rental['Start_Date'] = $_POST['start_date'] ?? '';
  $rental['Returned_Date'] = $_POST['return_date'] ?? '';
  $rental['Extensions_Made'] = $_POST['extensions_made'] ?? '';

  $sql = "UPDATE Rentals SET ";
    $sql .= "Member_ID='" . $rental['Member_ID'] . "', ";
    $sql .= "Game_ID='" . $rental['Game_ID'] . "', ";
    $sql .= "Start_Date='" . $rental['Start_Date'] . "', ";
    $sql .= "Returned_Date='" . $rental['Returned_Date'] . "', ";
    $sql .= "Extensions_Made='" . $rental['Extensions_Made'] . "'";
    $sql .= "WHERE Rental_ID='" . $id . "'";

      $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      redirect_to(url_for('./rentals/show.php?id=' . $id) );
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

}

   $sql = "SELECT * FROM Rental ";
    $sql.= "WHERE Rental_ID='" . $id . "'";

    $result = mysqli_query($db, $sql);

    confirm_result_set($result);

    $rental = mysqli_fetch_assoc($result);

    if($rental==null)
        redirect_to(url_for('./rental/index.php') );

    mysqli_free_result($result);

?>


<br>
<h3>Edit Rental</h3>
<hr/>

<form action="<?php echo url_for('./rentals/edit.php?id= '. h(u($rental['Rental_ID'])) ); ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="member_id">Member*</label>
      <?php>
      $result = find_all_members();
      echo "<select name = 'member_id'>";
      while($row = mysql_fetch_array($result)){
          echo "<option value='" . $row['Member_ID'] ."'>" . $row['Name'] . "</option>";
      }
      echo "</select>";
      <?>
    </div>

   <div class="form-group col-md-5">
      <label for="game_id">Game</label>
      <?php>
      $result = find_all_games();
      echo "<select name = 'game_id'>";
      while($row = mysql_fetch_array($result)){
          echo "<option value='" . $row['Game_ID'] ."'>" . $row['Title'] . "</option>";
      }
      echo "</select>";
      <?>
    </div>
  </div>

  <div class="form-group col-md-2">
      <label for="start_date">Start Date</label>
      <input type="date" class="form-control" name="start_date" value="<?php echo h($rental['Start_Date']); ?>" placeholder="YYYY-MM-DD" required>
    </div>
  <div class="form-group col-md-2">
      <label for="return_date">Return Date</label>
      <input type="date" class="form-control" name="return_date" value="<?php echo h($rental['Returned_Date']); ?>" placeholder="YYYY-MM-DD" required>
    </div>
  <div class="form-row">
        <div class="form-group col-m-2">
            <input type="checkbox" name="extensions_made" value="1" method="post"
                <?php if( ($rental['Extensions_Made']) == '1') echo 'checked';
                ?>
            >Available<br>
        </div>
    </div>


  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>
<?php include(SHARED_PATH . '/footer.php'); ?>
