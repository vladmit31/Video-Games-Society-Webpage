<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$id = $_GET['id'] ?? '1'; // PHP > 7.0
if(is_post_request()) {

  $member = [];
  $member['Name'] = mysqli_real_escape_string($db,$_POST['name']) ?? '';
  $member['Tel'] = mysqli_real_escape_string($db,$_POST['tel']) ?? '';
  $member['Email'] = mysqli_real_escape_string($db,$_POST['email']) ?? '';
  $member['Extensions_Made'] = mysqli_real_escape_string($db,$_POST['extensions_made']) ?? '';
   
  $sql = "UPDATE Members SET ";
    $sql .= "Name='" . $member['Name'] . "',";
    $sql .= "Tel='" . $member['Tel'] . "',";
    $sql .= "Email='" . $member['Email'] . "',";
    $sql .= "Extensions_Made='" . $member['Extensions_Made'] . "' ";
    $sql .= "WHERE Member_ID='" . $id . "'";

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

    $sql = "SELECT * FROM Members ";
    $sql.= "WHERE Member_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<br>
<h3>Edit Member</h3>
<hr/>

<form action="<?php echo url_for('./members/edit.php?id= '. h(u($member['Member_ID'])) ); ?>" method="post">
  <div class="form-row">
   
   <div class="form-group col-md-5">
      <label for="name">Name*</label>
      <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo h($member['Name']); ?>" method="post" required>
    </div>
   
   <div class="form-group col-md-5">
      <label for="tel">Tel</label>
      <input type="text" class="form-control" name="tel" placeholder="Tel" value="<?php echo h($member['Tel']); ?>" method="post">
    </div>
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-5">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo h($member['Email']); ?>" method="post">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="extensions_made">Extensions Made</label>
      <select name="extensions_made" class="form-control" method="post">
      
      <?php if( ($member['Extensions_Made']) == '0'){ ?>
              <option selected="selected" value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>        
        <?php } ?>
         <?php if( ($member['Extensions_Made']) == '1'){ ?>
              <option value="0">0</option>
              <option selected="selected" value="1">1</option>
              <option value="2">2</option>        
        <?php } ?>
          <?php if( ($member['Extensions_Made']) == '2'){ ?>
              <option value="0">0</option>
              <option value="1">1</option>
              <option selected="selected" value="2">2</option>        
        <?php } ?>
     
      </select>
    </div>
    </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>

<?php include(SHARED_PATH . '/footer.php'); ?>