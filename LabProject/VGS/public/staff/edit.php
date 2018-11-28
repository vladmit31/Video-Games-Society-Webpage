<?php require_once('../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$id = $_GET['id'] ?? '1'; // PHP > 7.0
if(is_post_request()) {

  // Handle form values sent by edit.php
    
  $staff = [];
  $staff['Name'] = $_POST['name'] ?? '';
  $staff['Role'] = $_POST['role'] ?? '';

   
  $sql = "UPDATE Staff SET ";
    $sql .= "Name='" . $staff['Name'] . "',";
    $sql .= "Role='" . $staff['Role'] . "' "; 
    $sql .= "WHERE Staff_ID='" . $id . "'";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      redirect_to(url_for('./staff/index.php') );
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

    
}

    $sql = "SELECT * FROM Staff ";
    $sql.= "WHERE Staff_ID='" . $id . "'";
    
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>

<br>
<h3>Edit Staff</h3>
<hr/>

<form action="<?php echo url_for('./members/edit.php?id= '. h(u($staff['Staff_ID'])) ); ?>" method="post">
  <div class="form-row">

   <div class="form-group col-md-5">
      <label for="name">Name*</label>
      <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo h($staff['Name']); ?>" method="post" required>
    </div>

  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="role">Role</label>
      <select name="role" class="form-control" method="post">
      
      <?php if( ($staff['Role']) == ''){ ?>
              <option selected="selected" value=""></option>
              <option value="Secretary">Secretary</option>
              <option value="Volunteer">Volunteer</option>        
        <?php } ?>
         <?php if( ($staff['Role']) == 'Secretary'){ ?>
              <option value="0">0</option>
              <option selected="selected" value="Secretary">Secretary</option>
              <option value="2">2</option>        
        <?php } ?>
          <?php if( ($staff['Role']) == 'Volunteer'){ ?>
              <option value=""></option>
              <option value="Secretary">Secretary</option>
              <option selected="selected" value="Volunteer">Volunteer</option>        
        <?php } ?>
     
      </select>
    </div>
    </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

<hr/>

<?php include(SHARED_PATH . '/footer.php'); ?>